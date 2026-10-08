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
