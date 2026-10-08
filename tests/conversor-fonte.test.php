<?php

declare(strict_types=1);

/**
 * tests/conversor-fonte.test.php - Extrator de bloco (scripts/conversor/fonte.php).
 * Fixtures proprias, em memoria. php tests/conversor-fonte.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require __DIR__ . '/../scripts/conversor/fonte.php';

$md = "# Titulo\n> nota\n\n## pt-BR\n\nlinha um\nlinha dois\n\n---\n\n## EN\n\nline one\n\n---\n\n## Notas\ninterno\n";

// 1. bloco entre o cabecalho e o --- padrao; numeros ORIGINAIS; bordas em branco aparadas
$b = fonte_bloco($md, '## pt-BR');
eq([['n' => 6, 't' => 'linha um'], ['n' => 7, 't' => 'linha dois']], $b, 'bloco pt: linhas e numeros originais, sem brancos nas bordas');

// 2. o bloco seguinte acha o proprio ---
eq([['n' => 13, 't' => 'line one']], fonte_bloco($md, '## EN'), 'bloco EN termina no seu ---');

// 3. fim explicito
$b = fonte_bloco($md, '## pt-BR', 'linha dois');
eq([['n' => 6, 't' => 'linha um']], $b, 'fim explicito: a linha de fim nao entra');

// 4. brancos no meio sao preservados (o parser decide o que fazer deles)
$m4 = "## A\nx\n\ny\n---\n";
eq([['n' => 2, 't' => 'x'], ['n' => 3, 't' => ''], ['n' => 4, 't' => 'y']], fonte_bloco($m4, '## A'), 'branco interno preservado com seu numero');

// 5. inicio que e o proprio --- com ocorrencia
$m5 = "topo\n---\nprimeiro\n---\nsegundo\n---\nresto\n";
eq([['n' => 3, 't' => 'primeiro']], fonte_bloco($m5, '---', null, 1), 'ocorrencia 1 de --- abre o primeiro bloco');
eq([['n' => 5, 't' => 'segundo']], fonte_bloco($m5, '---', null, 2), 'ocorrencia 2 de --- abre o segundo bloco');

// 6. CRLF e fim de arquivo sem quebra final
$m6 = "## A\r\nlinha\r\n---";
eq([['n' => 2, 't' => 'linha']], fonte_bloco($m6, '## A'), 'CRLF: \\r nao vaza para o texto');

// 7. erros
lanca(fn() => fonte_bloco($md, '## FR'), ConversorErro::class, 'nao encontrado', 'inicio inexistente');
lanca(fn() => fonte_bloco("## A\nx\n---\n## A\ny\n---\n", '## A'), ConversorErro::class, 'aparece 2 vezes', 'inicio duplicado sem ocorrencia');
lanca(fn() => fonte_bloco($m5, '---', null, 9), ConversorErro::class, 'ocorrencia 9', 'ocorrencia alem das que existem');
lanca(fn() => fonte_bloco($m5, '---', null, 4), ConversorErro::class, 'ocorrencia 4', 'ocorrencia = total + 1 (limite exato) nao existe');
lanca(fn() => fonte_bloco($m5, '---', null, 0), ConversorErro::class, 'ocorrencia 0', 'ocorrencia 0 nao existe');
lanca(fn() => fonte_bloco("## A\n\n\n---\n", '## A'), ConversorErro::class, 'vazio', 'bloco vazio');
lanca(fn() => fonte_bloco("## A\nx\ny\n", '## A'), ConversorErro::class, 'sem fim', 'bloco sem --- de fecho');
lanca(fn() => fonte_bloco("## A\nx\n---\n", '## A', 'FIM'), ConversorErro::class, 'sem fim', 'fim explicito inexistente');

// 7b. BOM no inicio da fonte: a primeira linha nao casa, e a mensagem diz por que
lanca(fn() => fonte_bloco("\u{FEFF}## A\nx\n---\n", '## A'), ConversorErro::class, 'BOM', 'BOM no inicio da fonte explica a causa');

// 8. o erro carrega a linha original
$linhaDoErro = -1;
try {
    fonte_bloco("a\n## A\n\n\n---\n", '## A');
} catch (ConversorErro $e) {
    $linhaDoErro = $e->linha;
}
eq(2, $linhaDoErro, 'bloco vazio aponta a linha do inicio');

terminar();
