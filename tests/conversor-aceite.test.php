<?php

declare(strict_types=1);

/**
 * tests/conversor-aceite.test.php - script de aceite (scripts/aceite-conversor.php).
 * Roda o script de verdade sobre uma raiz de brinquedo em /var/tmp (um repo git descartavel,
 * isolado do git global) montada a partir de tests/fixtures/conversor/raiz. Nunca toca o repo real.
 *   php tests/conversor-aceite.test.php
 */

require __DIR__ . '/apoio/afirmar.php';

const ACEITE = __DIR__ . '/../scripts/aceite-conversor.php';
const FIX = __DIR__ . '/fixtures/conversor/raiz';
const PARTIALS = ['pt/sec-03.php', 'en/sec-03.php', 'pt/sec-05.php', 'en/sec-05.php'];

function sh(string $cmd): array
{
    $saida = [];
    exec('GIT_CONFIG_GLOBAL=/dev/null GIT_CONFIG_SYSTEM=/dev/null ' . $cmd . ' 2>&1', $saida, $rc);
    return [$rc, implode("\n", $saida)];
}

/** Monta base/{raiz,saida,relatorio.txt}: raiz = fontes + "publicado" (os esperados) + criterio com hashes, em git. */
function montar(): string
{
    $b = sys_get_temp_dir() . '/ace-' . bin2hex(random_bytes(4));
    $r = $b . '/raiz';
    mkdir($r . '/docs/tecnico', 0700, true);
    mkdir($r . '/src/content/edicao-99/pt', 0700, true);
    mkdir($r . '/src/content/edicao-99/en', 0700, true);
    sh('cp -r ' . escapeshellarg(FIX . '/docs/content') . ' ' . escapeshellarg($r . '/docs/content'));
    $linhas = [];
    foreach (PARTIALS as $p) {
        copy(FIX . '/esperado/' . $p, $r . '/src/content/edicao-99/' . $p);
        $linhas[] = hash_file('sha256', $r . '/src/content/edicao-99/' . $p) . '  src/content/edicao-99/' . $p;
    }
    file_put_contents($r . '/docs/tecnico/ACEITE-CONVERSOR.md', "# criterio\n\n```\n" . implode("\n", $linhas) . "\n```\n");
    $d = escapeshellarg($r);
    sh("git init -q -b main {$d}");
    sh("git -C {$d} add -A");
    sh("git -C {$d} -c user.name=t -c user.email=t@t commit -q -m base");
    return $b;
}

/** @return array{0:int,1:string,2:string} codigo, saida do script, texto do relatorio ('' se nao gerado) */
function aceite(string $b, string ...$extra): array
{
    @unlink($b . '/relatorio.txt');
    [$rc, $out] = sh('php ' . escapeshellarg(ACEITE) . ' --edicao 99 --raiz ' . escapeshellarg($b . '/raiz')
        . ' --saida ' . escapeshellarg($b . '/saida') . ' --relatorio ' . escapeshellarg($b . '/relatorio.txt') . ' ' . implode(' ', array_map('escapeshellarg', $extra)));
    return [$rc, $out, (string) @file_get_contents($b . '/relatorio.txt')];
}

function commitar(string $b, string $msg): void
{
    $d = escapeshellarg($b . '/raiz');
    sh("git -C {$d} add -A");
    sh("git -C {$d} -c user.name=t -c user.email=t@t commit -q -m " . escapeshellarg($msg));
}

function apagar(string $b): void
{
    if (str_starts_with($b, sys_get_temp_dir() . '/ace-')) {
        exec('rm -rf ' . escapeshellarg($b));
    }
}

$tmp = [];

// A. caso limpo: 4 de 4 iguais, duas evidencias por idioma, camadas 1 e 2 no relatorio
$b = montar();
$tmp[] = $b;
[$rc, $out, $rel] = aceite($b);
eq(0, $rc, 'caso limpo: APROVADO sai 0: ' . $out);
foreach (['universo: 4 arquivos', 'fora do universo: 0 arquivos', 'comparados: 4', 'iguais: 4', 'diferentes: 0', 'pt: 2/2', 'en: 2/2', 'VEREDITO: APROVADO'] as $trecho) {
    verdadeiro(str_contains($rel, $trecho), "relatorio traz '{$trecho}'");
}
verdadeiro(str_contains($out, 'VEREDITO: APROVADO'), 'a saida do script tambem traz o veredito');
verdadeiro(is_file($b . '/saida/pt/sec-03.php'), 'o gerado fica em --saida para inspecao');
[$rc, $gitst] = sh('git -C ' . escapeshellarg($b . '/raiz') . ' status --porcelain');
eq('', $gitst, 'o aceite nao escreveu nada na raiz (git status vazio)');

// B. publicado que mudou depois do criterio: recusa rodar (2), nomeia o arquivo, nao gera relatorio de veredito
$b = montar();
$tmp[] = $b;
$alvo = $b . '/raiz/src/content/edicao-99/pt/sec-03.php';
file_put_contents($alvo, (string) file_get_contents($alvo) . "\n<!-- mexido -->");
commitar($b, 'mexe no publicado'); // git limpo, mas o hash nao confere mais
[$rc, $out, $rel] = aceite($b);
eq(2, $rc, 'hash que mudou: recusa rodar (2)');
verdadeiro(str_contains($out, 'pt/sec-03.php') && str_contains($out, 'hash'), 'nomeia o arquivo e a causa: ' . $out);
verdadeiro(!str_contains($rel . $out, 'VEREDITO'), 'sem veredito quando recusa');

// C. git sujo em src/content/edicao-N: recusa (2)
$b = montar();
$tmp[] = $b;
file_put_contents($b . '/raiz/src/content/edicao-99/pt/sec-07.php', 'novo');
[$rc, $out] = aceite($b);
eq(2, $rc, 'git status sujo em src/content/edicao-N: recusa (2)');
verdadeiro(str_contains($out, 'git status'), 'diz que e o git status: ' . $out);

// D. saida dentro de src/content/edicao-N: recusa (2)
$b = montar();
$tmp[] = $b;
[$rc, $out] = sh('php ' . escapeshellarg(ACEITE) . ' --edicao 99 --raiz ' . escapeshellarg($b . '/raiz') . ' --saida ' . escapeshellarg($b . '/raiz/src/content/edicao-99/gerado') . ' --relatorio ' . escapeshellarg($b . '/r.txt'));
eq(2, $rc, '--saida dentro da edicao publicada: recusa (2)');
verdadeiro(!file_exists($b . '/raiz/src/content/edicao-99/gerado'), 'e nada foi criado la');

// E. criterio com numero de hashes diferente do universo da receita: recusa (2)
$b = montar();
$tmp[] = $b;
$crit = $b . '/raiz/docs/tecnico/ACEITE-CONVERSOR.md';
file_put_contents($crit, implode("\n", array_slice(explode("\n", (string) file_get_contents($crit)), 0, -3)) . "\n```\n");
commitar($b, 'criterio com 3 hashes');
[$rc, $out] = aceite($b);
eq(2, $rc, 'hashes != universo: recusa (2)');
verdadeiro(str_contains($out, 'universo'), 'diz que nao bate com o universo: ' . $out);

// E2. universo vazio (receita sem secoes e criterio sem hashes): recusa (2), nunca "APROVADO" por vacuidade
$b = montar();
$tmp[] = $b;
file_put_contents($b . '/raiz/docs/content/receitas/edicao-99.php', "<?php return ['secoes' => []];\n");
file_put_contents($b . '/raiz/docs/tecnico/ACEITE-CONVERSOR.md', "# criterio sem hashes\n");
commitar($b, 'universo vazio');
[$rc, $out, $rel] = aceite($b);
eq(2, $rc, 'universo vazio: recusa (2)');
verdadeiro(!str_contains($rel . $out, 'VEREDITO'), 'universo vazio nao gera veredito: ' . $out);
verdadeiro(str_contains($out, 'universo da receita (0)'), 'diz que o universo e 0: ' . $out);

// F. divergencia: REPROVADO (1), linha e coluna, contagem por idioma, classe a cargo do reviewer
$b = montar();
$tmp[] = $b;
$md = $b . '/raiz/docs/content/brinquedo.md';
file_put_contents($md, str_replace('A paragraph with', 'A paragraf with', (string) file_get_contents($md)));
commitar($b, 'fonte diverge');
[$rc, $out, $rel] = aceite($b);
eq(1, $rc, 'divergencia: REPROVADO sai 1');
foreach (['diferentes: 1', 'pt: 2/2', 'en: 1/2', 'VEREDITO: REPROVADO', 'en/sec-03.php', 'linha 3', 'classe: (a atribuir pelo reviewer)'] as $trecho) {
    verdadeiro(str_contains($rel, $trecho), "relatorio traz '{$trecho}'");
}
verdadeiro(str_contains($rel, 'esperado (publicado): "ph with') && str_contains($rel, 'obtido (gerado):      "f with'), 'mostra trecho esperado e obtido a partir da divergencia: ' . $rel);
verdadeiro(str_contains($rel, 'coluna 13'), 'e a coluna (o p de paragraph e o 13o caractere de <p>A paragraph)');
$gen = (string) @file_get_contents($b . '/saida/en/sec-03.php');
verdadeiro(str_contains($gen, 'A paragraf with'), 'o gerado divergente fica em --saida');

// G. trava disparada NAO impede a comparacao: o gerado e comparado e a trava e listada a parte
$b = montar();
$tmp[] = $b;
$md = $b . '/raiz/docs/content/brinquedo.md';
file_put_contents($md, str_replace('abertura`', 'abertura.`', (string) file_get_contents($md)));
commitar($b, 'trava R1');
[$rc, $out, $rel] = aceite($b);
eq(1, $rc, 'trava + divergencia: REPROVADO');
verdadeiro(str_contains($rel, 'travas: 1') && str_contains($rel, 'brinquedo.md:7: R1'), 'a trava aparece a parte, com arquivo:linha: ' . $rel);
verdadeiro(str_contains($rel, 'pt: 1/2'), 'e a comparacao aconteceu mesmo assim');

// H. erro estrutural na fonte conta como diferente, com a causa
$b = montar();
$tmp[] = $b;
$md = $b . '/raiz/docs/content/brinquedo.md';
file_put_contents($md, str_replace('## EN', '## FR', (string) file_get_contents($md)));
commitar($b, 'inicio some');
[$rc, $out, $rel] = aceite($b);
eq(1, $rc, 'erro estrutural: REPROVADO');
verdadeiro(str_contains($rel, 'erro:') && str_contains($rel, 'nao encontrado') && str_contains($rel, 'en: 1/2'), 'o erro entra como diferente com a causa: ' . $rel);

// I. fora do universo: arquivos da edicao que a receita nao cobre sao contados
$b = montar();
$tmp[] = $b;
file_put_contents($b . '/raiz/src/content/edicao-99/pt/sec-07.php', 'lapide');
file_put_contents($b . '/raiz/src/content/edicao-99/en/sec-07.php', 'tombstone');
commitar($b, 'fora do universo');
[$rc, $out, $rel] = aceite($b);
eq(0, $rc, 'arquivos fora do universo nao atrapalham: ' . $out);
verdadeiro(str_contains($rel, 'fora do universo: 2 arquivos') && str_contains($rel, 'universo: 4 arquivos'), 'as duas contagens saem sempre: ' . $rel);

// J. informativo: quantas diferencas sumiriam se espaco entre tags fosse ignorado (nao muda o veredito)
$b = montar();
$tmp[] = $b;
$pub = $b . '/raiz/src/content/edicao-99/en/sec-03.php';
file_put_contents($pub, str_replace("</p>\n\n<h3>", "</p>\n<h3>", (string) file_get_contents($pub)));
$linhas = [];
foreach (PARTIALS as $p) {
    $linhas[] = hash_file('sha256', $b . '/raiz/src/content/edicao-99/' . $p) . '  src/content/edicao-99/' . $p;
}
file_put_contents($b . '/raiz/docs/tecnico/ACEITE-CONVERSOR.md', "# criterio\n\n```\n" . implode("\n", $linhas) . "\n```\n");
commitar($b, 'publicado com um espaco a menos');
[$rc, $out, $rel] = aceite($b);
eq(1, $rc, 'diferenca so de espaco entre tags continua REPROVADO (estrito)');
verdadeiro(str_contains($rel, 'informativo: 1 diferenca(s) sumiriam se o espaco entre tags fosse ignorado'), 'conta a informativa sem mudar o veredito: ' . $rel);

foreach ($tmp as $b) {
    apagar($b);
}
terminar();
