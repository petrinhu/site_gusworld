<?php

declare(strict_types=1);

/**
 * tests/conversor-travas.test.php - Travas de copy (scripts/conversor/travas.php).
 * Fixtures proprias, em memoria. php tests/conversor-travas.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require __DIR__ . '/../scripts/conversor/fonte.php';
require __DIR__ . '/../scripts/conversor/parser.php';
require __DIR__ . '/../scripts/conversor/travas.php';

const TRAVESSAO_EM = "\u{2014}";
const TRAVESSAO_EN = "\u{2013}";

function voz_no(array $itens, int $linha = 1): array
{
    return ['tipo' => 'voz', 'linha' => $linha, 'itens' => $itens];
}

function fala(string $texto, int $linha = 1): array
{
    return ['tipo' => 'fala', 'persona' => 'gus', 'caminho' => '~/x', 'texto' => $texto, 'longo' => false, 'numero' => null, 'linha' => $linha];
}

function pensa(string $texto, bool $longo = false, int $linha = 1): array
{
    return ['tipo' => 'pensa', 'persona' => 'gus', 'caminho' => null, 'texto' => $texto, 'longo' => $longo, 'numero' => null, 'linha' => $linha];
}

function paragrafo(string $texto, int $linha = 1): array
{
    return ['tipo' => 'paragrafo', 'texto' => $texto, 'linha' => $linha];
}

function travas(array $nos): array
{
    return travas_verificar($nos, 'a.md');
}

function so_regras(array $mensagens): array
{
    return array_map(static fn(string $m): string => explode(': ', $m)[1] ?? '?', $mensagens);
}

// R1: fala sem ponto final
eq([], travas([voz_no([fala('sem ponto')])]), 'R1 passa: fala sem ponto');
$r = travas([voz_no([fala('termina com ponto.', 7)])]);
eq(['R1'], so_regras($r), 'R1 reprova: fala com ponto final');
verdadeiro(str_starts_with($r[0] ?? '', 'a.md:7: R1: '), 'mensagem comeca com arquivo:linha: regra: (' . ($r[0] ?? '') . ')');
verdadeiro(str_contains($r[0] ?? '', 'termina com ponto.'), 'mensagem traz o trecho');
eq([], travas([voz_no([fala('reticencias permitidas...')])]), 'R1 passa: reticencias');
eq([], travas([voz_no([fala('pergunta?')])]), 'R1 passa: interrogacao');
eq([], travas([voz_no([fala('duas frases. ainda no meio')])]), 'R1 passa: ponto no meio');

// R2: pensamento sem ponto final
eq([], travas([voz_no([pensa('sem ponto')])]), 'R2 passa: pensa sem ponto');
eq(['R2'], so_regras(travas([voz_no([pensa('com ponto.')])])), 'R2 reprova: pensa com ponto final');
eq([], travas([voz_no([pensa('reticencias...')])]), 'R2 passa: reticencias');
eq(['R2'], so_regras(travas([voz_no([pensa(str_repeat('a', 80) . '.', true)])])), 'R2 reprova tambem no pensa longo');
eq([], travas([voz_no([['tipo' => 'assinatura', 'persona' => null, 'caminho' => null, 'texto' => 'by: gus@glyfesse.', 'longo' => false, 'numero' => null, 'linha' => 1]])]), 'assinatura nao entra em R1/R2');

// R3: zero travessao, em qualquer texto publicavel
foreach ([
    'glifo U+2014' => 'antes ' . TRAVESSAO_EM . ' depois',
    'glifo U+2013' => 'antes ' . TRAVESSAO_EN . ' depois',
    '&mdash;' => 'antes &mdash; depois',
    '&ndash;' => 'antes &NDASH; depois',
    '&#8212;' => 'antes &#8212; depois',
    '&#x2013;' => 'antes &#x2013; depois',
    '&#08212; (zero a esquerda)' => 'antes &#08212; depois',
    '&#x002013; (zeros a esquerda)' => 'antes &#x002013; depois',
] as $nome => $texto) {
    eq(['R3'], so_regras(travas([paragrafo($texto)])), "R3 reprova em paragrafo: {$nome}");
}
eq(['R3'], so_regras(travas([['tipo' => 'titulo', 'texto' => 'a ' . TRAVESSAO_EM . ' b', 'linha' => 1]])), 'R3 reprova em titulo');
eq(['R3'], so_regras(travas([['tipo' => 'lista', 'itens' => ['ok', 'a ' . TRAVESSAO_EN . ' b'], 'linha' => 3]])), 'R3 reprova em item de lista');
eq(['R3'], so_regras(travas([voz_no([fala('a ' . TRAVESSAO_EM . ' b')])])), 'R3 reprova em fala');
eq([], travas([paragrafo('hifen-comum e menos - solto')]), 'R3 passa: hifen e menos ASCII');

// R4: a marca decide a classe; 72 caracteres SEM a marca
$t72 = str_repeat('a', 72);
$t73 = str_repeat('a', 73);
eq([], travas([voz_no([pensa($t72, false)])]), 'R4 passa: 72 com //');
eq(['R4'], so_regras(travas([voz_no([pensa($t73, false)])])), 'R4 reprova: 73 com // (pede /* */)');
eq([], travas([voz_no([pensa($t73, true)])]), 'R4 passa: 73 com /* */');
eq(['R4'], so_regras(travas([voz_no([pensa($t72, true)])])), 'R4 reprova: 72 com /* */ (pede //)');
$acentos72 = str_repeat("\u{e9}", 72);
eq([], travas([voz_no([pensa($acentos72, false)])]), 'R4 conta caracteres, nao bytes (72 acentuados com //)');
eq(['R4'], so_regras(travas([['tipo' => 'pensa_bloco', 'linha' => 1, 'itens' => [pensa('ok'), pensa($t73)]]])), 'R4 vale dentro de pensa_bloco');
$r = travas([voz_no([pensa($t73, false, 12)])]);
verdadeiro(str_starts_with($r[0] ?? '', 'a.md:12: R4: '), 'R4 aponta a linha do item, nao a do grupo');

// varias violacoes juntas, na ordem do texto
$r = travas([paragrafo('a ' . TRAVESSAO_EM . ' b', 1), voz_no([fala('ponto.', 3), pensa('outro.', false, 4)], 3)]);
eq(['R3', 'R1', 'R2'], so_regras($r), 'violacoes na ordem em que aparecem');
eq(['a.md:1', 'a.md:3', 'a.md:4'], array_map(static fn(string $m): string => implode(':', array_slice(explode(':', $m), 0, 2)), $r), 'cada uma com a sua linha');

// UTF-8 invalido nao pode silenciar a trava: falha com erro
$ruim = "abc\xC3\x28def";
lanca(fn() => travas([paragrafo($ruim, 4)]), ConversorErro::class, 'UTF-8', 'UTF-8 invalido em paragrafo');
lanca(fn() => travas([voz_no([fala($ruim, 5)])]), ConversorErro::class, 'UTF-8', 'UTF-8 invalido em fala');
lanca(fn() => travas([voz_no([pensa($ruim, false, 6)])]), ConversorErro::class, 'UTF-8', 'UTF-8 invalido em pensamento');

// numero e nos sem texto nao geram nada
eq([], travas([['tipo' => 'numero', 'numero' => 3, 'linha' => 1]]), 'numero nao e verificado');

// nota interna nunca e lida: o pipeline fonte -> parser entrega so o bloco publicavel
$md = "> nota " . TRAVESSAO_EM . " interna\n\n## pt-BR\n\n`gus@glyfesse:~/x\$ limpo`\n\n---\n\n## Notas de producao " . TRAVESSAO_EM . " internas\n\ntexto. com ponto " . TRAVESSAO_EN . " e travessao\n";
$nos = parser_nos(fonte_bloco($md, '## pt-BR'));
eq([], travas($nos), 'travessao e ponto em nota interna nao sao lidos');

terminar();
