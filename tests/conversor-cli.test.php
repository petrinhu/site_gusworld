<?php

declare(strict_types=1);

/**
 * tests/conversor-cli.test.php - casca da linha de comando (scripts/gerar-secoes.php).
 * Roda a CLI de verdade sobre uma COPIA da raiz de brinquedo em tests/fixtures/conversor/raiz
 * (a fixture nunca e escrita) e compara byte a byte com os esperados escritos a mao.
 *   php tests/conversor-cli.test.php
 */

require __DIR__ . '/apoio/afirmar.php';

const CLI = __DIR__ . '/../scripts/gerar-secoes.php';
const FIXTURE = __DIR__ . '/fixtures/conversor/raiz';
const ARQUIVOS = ['pt/sec-03.php', 'en/sec-03.php', 'pt/sec-05.php', 'en/sec-05.php'];

/** @return array{0:int,1:string} codigo e saida (stdout+stderr) */
function cli(string $raiz, string ...$args): array
{
    $saida = [];
    exec('php ' . escapeshellarg(CLI) . ' ' . implode(' ', array_map('escapeshellarg', $args)) . ' --raiz ' . escapeshellarg($raiz) . ' 2>&1', $saida, $rc);
    return [$rc, implode("\n", $saida)];
}

function copia_da_fixture(): string
{
    $dir = sys_get_temp_dir() . '/conv-cli-' . bin2hex(random_bytes(4));
    mkdir($dir, 0700, true);
    exec('cp -r ' . escapeshellarg(FIXTURE . '/docs') . ' ' . escapeshellarg($dir . '/docs'));
    return $dir;
}

function limpar(string $dir): void
{
    if (str_starts_with($dir, sys_get_temp_dir() . '/conv-cli-')) {
        exec('rm -rf ' . escapeshellarg($dir));
    }
}

function gerado(string $raiz, string $arquivo): ?string
{
    $c = @file_get_contents($raiz . '/src/content/edicao-99/' . $arquivo);
    return $c === false ? null : $c;
}

$tmp = [];

// 1. caso limpo: grava os 4 arquivos, identicos aos esperados escritos a mao
$r = copia_da_fixture();
$tmp[] = $r;
[$rc, $out] = cli($r, '--edicao', '99');
eq(0, $rc, 'caso limpo sai 0: ' . $out);
foreach (ARQUIVOS as $a) {
    eq(file_get_contents(FIXTURE . '/esperado/' . $a), gerado($r, $a), "gerado identico ao esperado: {$a}");
}

// 1b. depois de uma geracao bem-sucedida nao sobra nenhum temporario
eq([], glob($r . '/src/content/edicao-99/*/*.tmp') ?: [], 'sem *.tmp apos gerar com sucesso');

// 2. gerar de novo e idempotente
[$rc] = cli($r, '--edicao', '99');
eq(0, $rc, 'segunda geracao sai 0');
eq(file_get_contents(FIXTURE . '/esperado/pt/sec-05.php'), gerado($r, 'pt/sec-05.php'), 'segunda geracao nao muda nada');

// 3. --verificar: igual sai 0; editado a mao sai 1 e nomeia o arquivo; ausente sai 1
[$rc, $out] = cli($r, '--edicao', '99', '--verificar');
eq(0, $rc, '--verificar com tudo igual sai 0: ' . $out);
$alvo = $r . '/src/content/edicao-99/pt/sec-03.php';
file_put_contents($alvo, str_replace('<code>codigo</code>', '<code>codigoX</code>', (string) file_get_contents($alvo)));
[$rc, $out] = cli($r, '--edicao', '99', '--verificar');
eq(1, $rc, '--verificar sai 1 quando o gerado foi editado a mao');
verdadeiro(str_contains($out, 'pt/sec-03.php'), '--verificar nomeia o arquivo editado: ' . $out);
verdadeiro(str_contains($out, 'linha'), '--verificar mostra a linha da divergencia: ' . $out);
verdadeiro(str_contains((string) file_get_contents($alvo), 'codigoX'), '--verificar NAO regrava o arquivo');
unlink($r . '/src/content/edicao-99/en/sec-05.php');
[$rc, $out] = cli($r, '--edicao', '99', '--verificar');
eq(1, $rc, '--verificar sai 1 com arquivo ausente');
verdadeiro(str_contains($out, 'ausente'), '--verificar diz ausente: ' . $out);
[$rc] = cli($r, '--edicao', '99');
eq(0, $rc, 'gerar de novo conserta o editado a mao');
eq(file_get_contents(FIXTURE . '/esperado/pt/sec-03.php'), gerado($r, 'pt/sec-03.php'), 'e volta a ser identico ao esperado');

// 4. trava violada: sai 1, aponta arquivo:linha:regra, e NAO grava nada (nem a secao limpa)
$r = copia_da_fixture();
$tmp[] = $r;
$md = $r . '/docs/content/brinquedo.md';
file_put_contents($md, str_replace('abertura`', 'abertura.`', (string) file_get_contents($md)));
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'trava violada sai 1');
verdadeiro(str_contains($out, 'brinquedo.md:7: R1'), 'aponta arquivo:linha: regra (' . $out . ')');
verdadeiro(!file_exists($r . '/src'), 'trava violada nao grava nada, nem a secao limpa');

// 5. erro estrutural: inicio que nao existe, com o nome do arquivo
$r = copia_da_fixture();
$tmp[] = $r;
$pergunt = $r . '/docs/content/brinquedo-perguntas.md';
file_put_contents($pergunt, str_replace('## EN', '## FR', (string) file_get_contents($pergunt)));
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'inicio inexistente sai 1');
verdadeiro(str_contains($out, 'brinquedo-perguntas.md') && str_contains($out, 'nao encontrado'), 'nomeia o arquivo e a causa: ' . $out);
verdadeiro(!file_exists($r . '/src'), 'erro estrutural nao grava nada');

// 6. HTML cru na fonte e recusado com a linha
$r = copia_da_fixture();
$tmp[] = $r;
$md = $r . '/docs/content/brinquedo.md';
file_put_contents($md, str_replace('Um paragrafo', 'Um <b>paragrafo</b>', (string) file_get_contents($md)));
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'HTML cru sai 1');
verdadeiro(str_contains($out, 'brinquedo.md:9') && str_contains($out, 'HTML cru'), 'aponta a linha do HTML cru: ' . $out);

// 7. receita ausente, uso errado
$r = copia_da_fixture();
$tmp[] = $r;
[$rc, $out] = cli($r, '--edicao', '98');
eq(1, $rc, 'edicao sem receita sai 1');
verdadeiro(str_contains($out, 'receita'), 'diz que falta a receita: ' . $out);
[$rc] = cli($r);
eq(2, $rc, 'sem --edicao e erro de uso (2)');
[$rc] = cli($r, '--edicao', 'abc');
eq(2, $rc, '--edicao nao numerica e erro de uso (2)');

// 8. receita com chave desconhecida
$r = copia_da_fixture();
$tmp[] = $r;
$rec = $r . '/docs/content/receitas/edicao-99.php';
file_put_contents($rec, str_replace("'tipo' => 'prosa',", "'tipo' => 'prosa', 'html' => '<b>',", (string) file_get_contents($rec)));
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'chave desconhecida na receita sai 1');
verdadeiro(str_contains($out, 'chave desconhecida'), 'diz qual chave: ' . $out);

// 9a. --verificar com o arquivo ausente como UNICA divergencia
$r = copia_da_fixture();
$tmp[] = $r;
cli($r, '--edicao', '99');
unlink($r . '/src/content/edicao-99/en/sec-05.php');
[$rc, $out] = cli($r, '--edicao', '99', '--verificar');
eq(1, $rc, '--verificar: ausente sozinho ja sai 1');
verdadeiro(str_contains($out, 'en/sec-05.php: ausente'), 'nomeia o ausente: ' . $out);
verdadeiro(str_contains($out, 'verificados=4 divergentes=1'), 'conta exatamente 1 divergente: ' . $out);

// 9b. a fonte da receita fica confinada a docs/content/
$r = copia_da_fixture();
$tmp[] = $r;
copy($r . '/docs/content/brinquedo.md', $r . '/fora.md');
$rec = $r . '/docs/content/receitas/edicao-99.php';
file_put_contents($rec, str_replace("'fonte' => 'brinquedo.md'", "'fonte' => '../../fora.md'", (string) file_get_contents($rec)));
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'fonte que escapa de docs/content sai 1');
verdadeiro(str_contains($out, 'fora de docs/content'), 'diz o motivo: ' . $out);
verdadeiro(!file_exists($r . '/src'), 'e nao grava nada');
file_put_contents($rec, str_replace("'fonte' => '../../fora.md'", "'fonte' => '/etc/hostname'", (string) file_get_contents($rec)));
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'fonte absoluta sai 1');
verdadeiro(str_contains($out, 'fora de docs/content'), 'fonte absoluta tambem e recusada: ' . $out);

// 9b2. link simbolico dentro de docs/content que aponta para fora (inclusive para uma pasta irma de nome parecido)
$r = copia_da_fixture();
$tmp[] = $r;
mkdir($r . '/docs/content-outro', 0755, true);
copy($r . '/docs/content/brinquedo.md', $r . '/docs/content-outro/x.md');
symlink($r . '/docs/content-outro/x.md', $r . '/docs/content/link.md');
$rec = $r . '/docs/content/receitas/edicao-99.php';
file_put_contents($rec, str_replace("'fonte' => 'brinquedo.md'", "'fonte' => 'link.md'", (string) file_get_contents($rec)));
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'link que escapa para pasta irma sai 1');
verdadeiro(str_contains($out, 'fora de docs/content (por link)'), 'diz que e por link: ' . $out);

// 9c. a gravacao e atomica por edicao: falha de escrita no meio nao deixa pt sem en
$r = copia_da_fixture();
$tmp[] = $r;
mkdir($r . '/src/content/edicao-99/en/sec-05.php.tmp', 0755, true); // o temporario do ultimo arquivo nao pode ser criado
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'falha de escrita sai 1: ' . $out);
foreach (['pt/sec-03.php', 'en/sec-03.php', 'pt/sec-05.php', 'en/sec-05.php'] as $a) {
    verdadeiro(gerado($r, $a) === null, "falha de escrita: {$a} nao ficou gravado");
}
$sobras = glob($r . '/src/content/edicao-99/*/*.tmp') ?: [];
eq(['en/sec-05.php.tmp'], array_map(static fn(string $f): string => basename(dirname($f)) . '/' . basename($f), $sobras), 'nenhum temporario nosso sobrou (so o diretorio que o teste plantou)');

// 9c2. falha NO RENAME (destino e um diretorio nao vazio): sai 1 e diz a verdade sobre o estado
$r = copia_da_fixture();
$tmp[] = $r;
mkdir($r . '/src/content/edicao-99/en/sec-05.php', 0755, true);
file_put_contents($r . '/src/content/edicao-99/en/sec-05.php/preso', 'x');
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'falha no rename sai 1');
verdadeiro(str_contains($out, 'falha ao renomear') && str_contains($out, 'ja foram renomeados'), 'diz que os anteriores ja foram renomeados: ' . $out);

// 9c3. nome de fonte com NUL ou que nao e texto: erro de conteudo, sem trace
foreach (['NUL no nome' => ['"brinquedo.md\\0x"', 'fora de docs/content'], 'inteiro' => ['123', 'fora de docs/content'], 'array' => ["['a']", 'fora de docs/content'], 'nulo' => ['null', 'sem fonte']] as $caso => [$valor, $trecho]) {
    $r = copia_da_fixture();
    $tmp[] = $r;
    $rec = $r . '/docs/content/receitas/edicao-99.php';
    file_put_contents($rec, preg_replace_callback("/'fonte' => 'brinquedo\\.md'/", static fn(): string => "'fonte' => {$valor}", (string) file_get_contents($rec), 1));
    [$rc, $out] = cli($r, '--edicao', '99');
    eq(1, $rc, "fonte {$caso}: sai 1: " . $out);
    verdadeiro(!str_contains($out, 'Stack trace') && !str_contains($out, 'Fatal'), "fonte {$caso}: sem trace");
    verdadeiro(str_contains($out, $trecho), "fonte {$caso}: a mensagem diz '{$trecho}': " . $out);
    verdadeiro(!file_exists($r . '/src'), "fonte {$caso}: nada gravado");
}
foreach (['inicio inteiro' => "'inicio' => 5", 'inicio array' => "'inicio' => []"] as $caso => $trocar) {
    $r = copia_da_fixture();
    $tmp[] = $r;
    $rec = $r . '/docs/content/receitas/edicao-99.php';
    file_put_contents($rec, preg_replace("/'inicio' => '## pt-BR'/", $trocar, (string) file_get_contents($rec), 1));
    [$rc, $out] = cli($r, '--edicao', '99');
    eq(1, $rc, "receita com {$caso}: sai 1: " . $out);
    verdadeiro(!str_contains($out, 'Stack trace') && !str_contains($out, 'Fatal'), "receita com {$caso}: sem trace");
}

// 9d. receita que nao devolve array, ou com forma errada: erro de conteudo (1), nunca TypeError
foreach ([
    'devolve string' => "<?php return 'texto';",
    'secoes nao e array' => "<?php return ['secoes' => 'x'];",
    'secao nao e array' => "<?php return ['secoes' => [3 => 'x']];",
    'partes nao e array' => "<?php return ['secoes' => [3 => ['tipo' => 'prosa', 'partes' => 'x']]];",
    'erro de sintaxe' => '<?php return [;',
] as $caso => $codigo) {
    $r = copia_da_fixture();
    $tmp[] = $r;
    file_put_contents($r . '/docs/content/receitas/edicao-99.php', $codigo);
    [$rc, $out] = cli($r, '--edicao', '99');
    eq(1, $rc, "receita {$caso}: sai 1 (nao 255): " . $out);
    verdadeiro(str_contains($out, 'receita'), "receita {$caso}: a mensagem diz que e a receita: " . $out);
    verdadeiro(!str_contains($out, 'Fatal') && !str_contains($out, 'Stack trace'), "receita {$caso}: sem trace de PHP");
    verdadeiro(!file_exists($r . '/src'), "receita {$caso}: nada gravado");
}

// 9e. erro da montagem nomeia as fontes
$r = copia_da_fixture();
$tmp[] = $r;
$pergunt = $r . '/docs/content/brinquedo-perguntas.md';
file_put_contents($pergunt, str_replace("\n\ngus@glyfesse:~/entrevista\$ segunda pergunta", '', (string) file_get_contents($pergunt)));
[$rc, $out] = cli($r, '--edicao', '99');
eq(1, $rc, 'contagem desigual de perguntas e respostas sai 1');
verdadeiro(str_contains($out, 'brinquedo-perguntas.md') && str_contains($out, 'brinquedo-respostas.md') && str_contains($out, 'em numero diferente'), 'o erro da montagem nomeia as duas fontes: ' . $out);

// 9. nenhuma regra do conversor cita secao, edicao ou arquivo
$achou = [];
foreach (glob(__DIR__ . '/../scripts/conversor/*.php') ?: [] as $f) {
    if (preg_match('/sec-[0-9]|edicao-[0-9]/', (string) file_get_contents($f)) === 1) {
        $achou[] = basename($f);
    }
}
eq([], $achou, 'nenhuma unidade do conversor cita secao ou edicao (nem em comentario)');
verdadeiro(count(glob(__DIR__ . '/../scripts/conversor/*.php') ?: []) >= 7, 'piso: ha pelo menos 7 unidades varridas');

foreach ($tmp as $d) {
    limpar($d);
}
terminar();
