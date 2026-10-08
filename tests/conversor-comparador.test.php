<?php

declare(strict_types=1);

/**
 * tests/conversor-comparador.test.php - Comparador (scripts/conversor/comparador.php).
 * Fixtures proprias, em memoria. php tests/conversor-comparador.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require __DIR__ . '/../scripts/conversor/comparador.php';

function cmp(string $a, string $b): array
{
    return comparador_comparar($a, $b);
}

// iguais
$r = cmp("<p>a</p>\n", "<p>a</p>\n");
eq(true, $r['igual'], 'textos identicos sao iguais');

// N2: so a quebra de linha final e ignorada
eq(true, cmp("<p>a</p>\n", '<p>a</p>')['igual'], 'quebra final presente x ausente: igual');
eq(false, cmp("<p>a</p>\n\n", "<p>a</p>\n")['igual'], 'duas quebras finais x uma: DIFERENTE (so UMA e ignorada)');
eq(false, cmp("<p>a</p>", "<p>a</p> ")['igual'], 'espaco final nao e ignorado');

// N1: bloco de so um comentario PHP, no inicio e no meio, sai com a quebra que o segue
$com = "<?php /* GERADO. nao edite */ ?>\n<p>a</p>\n\n<?php /* meio */ ?>\n<p>b</p>\n";
eq(true, cmp($com, "<p>a</p>\n\n<p>b</p>\n")['igual'], 'comentario no inicio e no meio ignorado');
eq("<p>a</p>\n\n<p>b</p>", comparador_normalizar($com), 'a normalizacao devolve o texto sem os comentarios e sem a quebra final');
eq(true, cmp("<?php\n/* varias\nlinhas */\n?>\n<p>a</p>\n", "<p>a</p>\n")['igual'], 'bloco <?php /* */ ?> em linhas separadas tambem');
eq(true, cmp("<?php /* a */ ?>\n<?php /* b */ ?>\n<p>a</p>", '<p>a</p>')['igual'], 'dois comentarios seguidos');
eq(false, cmp("<?php echo 1; ?>\n<p>a</p>", '<p>a</p>')['igual'], 'bloco PHP com codigo NAO e comentario: nao sai');
eq(false, cmp("<?php /* c */ echo 1; ?>\n<p>a</p>", '<p>a</p>')['igual'], 'comentario seguido de codigo no mesmo bloco: nao sai');
eq(false, cmp('<p>/* nao e php */</p>', '<p></p>')['igual'], 'barra-asterisco fora de <?php nao e comentario');

// diferenca de uma letra acha linha e coluna (1-based, no texto normalizado)
$r = cmp("<p>um</p>\n<p>dois</p>\n", "<p>um</p>\n<p>dpis</p>\n");
eq(false, $r['igual'], 'uma letra diferente');
eq(2, $r['linha'], 'linha da primeira divergencia');
eq(5, $r['coluna'], 'coluna da primeira divergencia ("<p>d" tem 4 caracteres)');
eq('ois</p>', $r['trecho_esperado'], 'trecho esperado a partir da divergencia');
eq('pis</p>', $r['trecho_obtido'], 'trecho obtido a partir da divergencia');

// recuo NAO e ignorado (modo estrito)
$r = cmp("<div>\n  <p>a</p>\n</div>", "<div>\n    <p>a</p>\n</div>");
eq(false, $r['igual'], 'recuo diferente e diferenca');
eq([2, 3], [$r['linha'], $r['coluna']], 'aponta o primeiro espaco que diverge');
eq(false, cmp("<p>a</p>\n\n<p>b</p>", "<p>a</p>\n<p>b</p>")['igual'], 'linha em branco a menos e diferenca');
eq(false, cmp('<p class="a b">x</p>', '<p class="b a">x</p>')['igual'], 'ordem de classe e diferenca');

// colunas contam caracteres, nao bytes
$r = cmp("\u{e9}\u{e9}x", "\u{e9}\u{e9}y");
eq(3, $r['coluna'], 'coluna em caracteres (acentos)');

// um texto e prefixo do outro
$r = cmp('<p>a</p>', '<p>a</p>x');
eq(false, $r['igual'], 'obtido com sobra');
eq('<fim>', $r['trecho_esperado'], 'esperado acabou');
eq('x', $r['trecho_obtido'], 'sobra do obtido');
$r = cmp("a\nbc", "a\nb");
eq([2, 2], [$r['linha'], $r['coluna']], 'faltou texto: linha 2 coluna 2');
eq('c', $r['trecho_esperado'], 'o que faltou');
eq('<fim>', $r['trecho_obtido'], 'obtido acabou');

// quebra de linha na divergencia aparece legivel; trecho limitado a 40 caracteres
$r = cmp("ab\ncd", 'abXcd');
eq('\\ncd', $r['trecho_esperado'], 'quebra de linha mostrada como \\n');
$r = cmp(str_repeat('a', 100), str_repeat('a', 10) . str_repeat('b', 90));
eq(40, mb_strlen($r['trecho_esperado']), 'trecho esperado limitado a 40 caracteres');
eq(11, $r['coluna'], 'coluna da divergencia longa');

terminar();
