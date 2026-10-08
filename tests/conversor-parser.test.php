<?php

declare(strict_types=1);

/**
 * tests/conversor-parser.test.php - Parser (scripts/conversor/parser.php).
 * Fixtures proprias, em memoria. php tests/conversor-parser.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require __DIR__ . '/../scripts/conversor/parser.php';

/** Texto -> lista de {n,t}, numerada a partir de $de. */
function linhas(string $texto, int $de = 1): array
{
    $saida = [];
    foreach (explode("\n", $texto) as $i => $t) {
        $saida[] = ['n' => $de + $i, 't' => $t];
    }
    return $saida;
}

function nos(string $texto, int $de = 1): array
{
    return parser_nos(linhas($texto, $de));
}

/** Resumo de um no de voz: lista de "tipo:persona:texto". */
function itens(array $no): array
{
    return array_map(static fn(array $i): string => $i['tipo'] . ':' . ($i['persona'] ?? '-') . ':' . $i['texto'], $no['itens'] ?? []);
}

// 1. paragrafos
$n = nos("Primeira frase.\n\nSegunda.");
eq(['paragrafo', 'paragrafo'], array_column($n, 'tipo'), 'dois paragrafos separados por branco');
eq('Primeira frase.', $n[0]['texto'] ?? null, 'texto do paragrafo');
$n = nos("linha um\nlinha dois\nlinha tres");
eq(1, count($n), 'linhas seguidas formam um so paragrafo');
eq('linha um linha dois linha tres', $n[0]['texto'] ?? null, 'linhas do paragrafo juntadas com um espaco');
eq(10, nos("x", 10)[0]['linha'] ?? null, 'o no leva o numero da linha original');

// 2. titulo e lista
$n = nos("### O passo\n\n- um\n- dois\n\nfim");
eq(['titulo', 'lista', 'paragrafo'], array_column($n, 'tipo'), 'titulo, lista, paragrafo');
eq('O passo', $n[0]['texto'] ?? null, 'texto do titulo sem ###');
eq(['um', 'dois'], $n[1]['itens'] ?? null, 'itens da lista sem o "- "');

// 3. codigo inline fica cru no parser (o emissor converte); linha so de codigo e paragrafo
eq('usa `engine/` aqui', nos('usa `engine/` aqui')[0]['texto'] ?? null, 'crases dentro do paragrafo ficam no texto');
$n = nos('`engine/`');
eq(['paragrafo'], array_column($n, 'tipo'), 'linha inteira entre crases que nao e voz vira paragrafo');
eq('`engine/`', $n[0]['texto'] ?? null, 'e mantem as crases');
eq(['paragrafo'], array_column(nos('12'), 'tipo'), 'numero solto fora de cerca e paragrafo');

// 4. voz inline: linhas seguidas formam um grupo; branco separa grupos
$n = nos("`gus@glyfesse:~/g\$ oi`\n`// pensando`\n\n`/* um pensamento mais comprido */`");
eq(['voz', 'voz'], array_column($n, 'tipo'), 'dois grupos de voz');
eq(['fala:gus:oi', 'pensa:gus:pensando'], itens($n[0] ?? []), 'grupo 1: fala e pensamento (pensa herda gus)');
eq(true, $n[1]['itens'][0]['longo'] ?? null, 'grupo 2: pensamento longo');

// 5. persona do pensamento = persona da fala que o antecede no grupo
$n = nos("`gus@glyfesse:~/e\$ pergunta`\n`// do gus`\n`jaci@glyfesse:~/e\$ resposta`\n`// da jaci`");
eq(['fala:gus:pergunta', 'pensa:gus:do gus', 'fala:jaci:resposta', 'pensa:jaci:da jaci'], itens($n[0] ?? []), 'pensa herda a persona da fala anterior');
$n = nos("`// sozinho`");
eq('pensa:-:sozinho', itens($n[0] ?? [])[0] ?? null, 'pensa sem fala antes nao tem persona');

// 6. assinatura solta
$n = nos("//by: gus@glyfesse");
eq('voz', $n[0]['tipo'] ?? null, '//by: solto e voz');
eq('assinatura', $n[0]['itens'][0]['tipo'] ?? null, 'do tipo assinatura');

// 7. cerca: fala quebrada em 3 linhas e juntada com um espaco
$n = nos("```\ngus@glyfesse:~/e\$ comeca aqui\ncontinua ali\ne termina\n// um pensamento\n```");
eq(['voz'], array_column($n, 'tipo'), 'cerca com fala e pensamento e um grupo de voz');
eq(['fala:gus:comeca aqui continua ali e termina', 'pensa:gus:um pensamento'], itens($n[0] ?? []), 'fala de 3 linhas juntada; pensa herda gus');
eq(2, $n[0]['itens'][0]['linha'] ?? null, 'item de cerca leva a linha onde comecou');

// 8. cerca so de // (2 ou mais) vira bloco de pensamentos; 1 so, nao
$n = nos("```\n// a\n// b\n// c\n```");
eq(['pensa_bloco'], array_column($n, 'tipo'), 'cerca so de // vira pensa_bloco');
eq(['pensa:-:a', 'pensa:-:b', 'pensa:-:c'], itens($n[0] ?? []), 'itens do bloco');
eq(['voz'], array_column(nos("```\n// a\n```"), 'tipo'), 'um unico // na cerca e voz comum');
eq(['voz'], array_column(nos("```\n/* a */\n/* b */\n```"), 'tipo'), 'dois /* */ nao fazem bloco');

// 9. /* */ que atravessa linhas dentro da cerca
$n = nos("```\n/* comeca\nmeio\nfim */\n```");
eq(['pensa:-:comeca meio fim'], itens($n[0] ?? []), 'comentario longo de varias linhas juntado');
eq(true, $n[0]['itens'][0]['longo'] ?? null, 'e marcado longo');

// 10. numeros separam respostas dentro da cerca
$n = nos("```\n5\njaci@glyfesse:~/e\$ resp cinco\n// p cinco\n\n6\njaci@glyfesse:~/e\$ resp seis\n```");
eq(['numero', 'voz', 'numero', 'voz'], array_column($n, 'tipo'), 'numero, voz, numero, voz');
eq(5, $n[0]['numero'] ?? null, 'valor do primeiro numero');
eq(6, $n[2]['numero'] ?? null, 'valor do segundo numero');
eq(['fala:jaci:resp cinco', 'pensa:jaci:p cinco'], itens($n[1] ?? []), 'grupo depois do numero');
$n = nos("```\ngus@glyfesse:~/e\$ termina em\n12\n```");
eq(['fala:gus:termina em 12'], itens($n[0] ?? []), 'numero no meio de fala quebrada e continuacao, nao separador');

// 11. erros, sempre com a linha original
lanca(fn() => nos("a\n\n```\n// x\n", 1), ConversorErro::class, 'cerca nao fechada', 'cerca sem fecho');
lanca(fn() => nos("<div>cru</div>"), ConversorErro::class, 'HTML cru', 'HTML cru e recusado');
lanca(fn() => nos("texto <b>negrito</b>"), ConversorErro::class, 'HTML cru', 'tag no meio do texto tambem');
lanca(fn() => nos("fecha a tag solta </p> no meio"), ConversorErro::class, 'HTML cru', 'tag de fechamento tambem e HTML cru');
lanca(fn() => nos("texto <!-- comentario --> texto"), ConversorErro::class, 'HTML cru', 'comentario HTML e HTML cru');
lanca(fn() => nos("```\n// pensa <i>x</i>\n```"), ConversorErro::class, 'HTML cru', 'HTML cru dentro de cerca');
lanca(fn() => nos("- item <b>x</b>"), ConversorErro::class, 'HTML cru', 'HTML cru em item de lista');
eq('a < b e c > d', nos('a < b e c > d')[0]['texto'] ?? null, 'sinais soltos de < e > nao sao HTML');
lanca(fn() => nos("## Titulo errado"), ConversorErro::class, 'fora do dialeto', 'cabecalho nivel 2 no bloco');
lanca(fn() => nos("> citacao"), ConversorErro::class, 'fora do dialeto', 'citacao no bloco');
lanca(fn() => nos("```\ntexto solto sem voz\n```"), ConversorErro::class, 'fora do dialeto', 'texto solto na cerca');
lanca(fn() => nos("```\n/* nunca fecha\n\n```"), ConversorErro::class, 'sem fechar', 'comentario /* aberto');
lanca(fn() => nos("`root@glyfesse> oi`"), ConversorErro::class, 'prompt fora do padrao', 'prompt antigo inline');
$linhaDoErro = -1;
try {
    nos("ok\n\n`root@glyfesse> oi`", 20);
} catch (ConversorErro $e) {
    $linhaDoErro = $e->linha;
}
eq(22, $linhaDoErro, 'erro de voz aponta a linha original');
$causa = null;
try {
    nos('`root@glyfesse> oi`');
} catch (ConversorErro $e) {
    $causa = $e->getPrevious();
}
verdadeiro($causa instanceof ConversorErro, 'o erro de voz preserva a causa raiz');
$linhaDoErro = -1;
try {
    nos("ok\n\n```\n// x\n", 40);
} catch (ConversorErro $e) {
    $linhaDoErro = $e->linha;
}
eq(42, $linhaDoErro, 'cerca nao fechada aponta a linha em que abriu');

terminar();
