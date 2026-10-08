<?php

declare(strict_types=1);

/**
 * tests/apoio/afirmar.php - harness unico das suites novas (assercao na unha,
 * ZERO dependencia). Nao termina em .test.php de proposito: scripts/testes.sh
 * nao o roda como teste. Uso:
 *   require __DIR__ . '/apoio/afirmar.php';
 *   eq(esperado, obtido, 'mensagem');  verdadeiro(cond, 'mensagem');
 *   terminar();   // imprime "ALL GREEN (N asserções)" ou sai 1
 */

$GLOBALS['afirmar_falhas'] = 0;
$GLOBALS['afirmar_total'] = 0;

function eq(mixed $esperado, mixed $obtido, string $msg): void
{
    $GLOBALS['afirmar_total']++;
    if ($esperado === $obtido) {
        return;
    }
    $GLOBALS['afirmar_falhas']++;
    fwrite(STDERR, "  FAIL: {$msg}\n");
    fwrite(STDERR, '        esperado: ' . json_encode($esperado, JSON_UNESCAPED_UNICODE) . "\n");
    fwrite(STDERR, '        obtido:   ' . json_encode($obtido, JSON_UNESCAPED_UNICODE) . "\n");
}

function verdadeiro(bool $cond, string $msg): void
{
    eq(true, $cond, $msg);
}

function terminar(): never
{
    $falhas = $GLOBALS['afirmar_falhas'];
    $total = $GLOBALS['afirmar_total'];
    if ($falhas > 0) {
        fwrite(STDERR, "\n{$falhas} de {$total} asserções FALHARAM.\n");
        exit(1);
    }
    fwrite(STDOUT, "ALL GREEN ({$total} asserções)\n");
    exit(0);
}
