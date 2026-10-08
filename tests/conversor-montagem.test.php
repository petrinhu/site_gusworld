<?php

declare(strict_types=1);

/**
 * tests/conversor-montagem.test.php - Montagem (scripts/conversor/montagem.php).
 * Fixtures proprias, em memoria. php tests/conversor-montagem.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require __DIR__ . '/../scripts/conversor/montagem.php';

function p(string $texto): array
{
    return ['tipo' => 'paragrafo', 'texto' => $texto, 'linha' => 1];
}

function f(string $persona, string $texto): array
{
    return ['tipo' => 'fala', 'persona' => $persona, 'caminho' => '~/e', 'texto' => $texto, 'longo' => false, 'numero' => null, 'linha' => 1];
}

function pe(string $texto, ?string $persona): array
{
    return ['tipo' => 'pensa', 'persona' => $persona, 'caminho' => null, 'texto' => $texto, 'longo' => false, 'numero' => null, 'linha' => 1];
}

function g(array ...$itens): array
{
    return ['tipo' => 'voz', 'itens' => $itens, 'linha' => 1];
}

function n(int $numero): array
{
    return ['tipo' => 'numero', 'numero' => $numero, 'linha' => 1];
}

/** Parte de receita minima (a casca resolve fonte/inicio/fim; a montagem so valida as chaves). */
function parte(array $extra = []): array
{
    return ['pt' => ['fonte' => 'a.md', 'inicio' => '## pt-BR'], 'en' => ['fonte' => 'a.md', 'inicio' => '## EN']] + $extra;
}

// prosa: um bloco
eq(
    "<p>um</p>\n\n<p>dois</p>",
    montagem_secao(['tipo' => 'prosa', 'partes' => [parte()]], [[p('um'), p('dois')]]),
    'prosa: um bloco emitido'
);
eq(
    "<ul class=\"placar\">\n  <li>x</li>\n</ul>",
    montagem_secao(['tipo' => 'prosa', 'partes' => [parte(['classe_lista' => 'placar'])]], [[['tipo' => 'lista', 'itens' => ['x'], 'linha' => 1]]]),
    'prosa: classe_lista da parte chega ao emissor'
);
lanca(
    fn() => montagem_secao(['tipo' => 'prosa', 'partes' => [parte(), parte()]], [[p('a')], [p('b')]]),
    ConversorErro::class,
    'exatamente 1 parte',
    'prosa com duas partes'
);

// sequencia: blocos separados por linha em branco; envolver recua 2 e mantem branco vazio
eq(
    "<p>a</p>\n\n<p>b</p>",
    montagem_secao(['tipo' => 'sequencia', 'partes' => [parte(), parte()]], [[p('a')], [p('b')]]),
    'sequencia: duas partes separadas por branco'
);
eq(
    "<p>a</p>\n\n<div id=\"menu\">\n  <p>b</p>\n\n  <p>c</p>\n</div>",
    montagem_secao(
        ['tipo' => 'sequencia', 'partes' => [parte(), parte(['envolver' => ['tag' => 'div', 'id' => 'menu']])]],
        [[p('a')], [p('b'), p('c')]]
    ),
    'sequencia: envolver com id, conteudo recuado 2, branco interno vazio'
);
eq(
    "<section id=\"i\" class=\"x y\">\n  <p>a</p>\n</section>",
    montagem_secao(['tipo' => 'prosa', 'partes' => [parte(['envolver' => ['tag' => 'section', 'id' => 'i', 'classe' => 'x y']])]], [[p('a')]]),
    'envolver com tag, id e classe, nessa ordem de atributos'
);

// entrevista: pares pergunta/resposta
$perguntas = [g(f('gus', 'p1'), pe('pensa p1', 'gus')), g(f('gus', 'p2'))];
$respostas = [n(1), g(f('jaci', 'r1'), pe('pensa r1', 'jaci')), n(2), g(f('jaci', 'r2'))];
$esperado = <<<'HTML'
<div class="entrev">

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/e$</span> <span class="dito">p1</span></p>
    <p class="pensa">pensa p1</p>
    <p class="fala"><span class="prompt">jaci@glyfesse:~/e$</span> <span class="dito">r1</span></p>
    <p class="pensa jaci">pensa r1</p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/e$</span> <span class="dito">p2</span></p>
    <p class="fala"><span class="prompt">jaci@glyfesse:~/e$</span> <span class="dito">r2</span></p>
  </div>

</div>
HTML;
$ent = ['tipo' => 'entrevista', 'partes' => [parte(), parte()]];
eq($esperado, montagem_secao($ent, [$perguntas, $respostas]), 'entrevista: par com pensamento do outro e par sem pensamento');
lanca(fn() => montagem_secao($ent, [$perguntas, [n(1), g(f('jaci', 'r1'))]]), ConversorErro::class, 'perguntas e respostas', 'contagem desigual reprova');
lanca(fn() => montagem_secao($ent, [$perguntas, [n(1), g(f('jaci', 'r1')), n(3), g(f('jaci', 'r2'))]]), ConversorErro::class, 'numeracao', 'numeracao com buraco reprova');
lanca(fn() => montagem_secao($ent, [$perguntas, [n(2), g(f('jaci', 'r1')), n(1), g(f('jaci', 'r2'))]]), ConversorErro::class, 'numeracao', 'numeracao fora de ordem reprova');
lanca(fn() => montagem_secao($ent, [$perguntas, [g(f('jaci', 'r1')), g(f('jaci', 'r2'))]]), ConversorErro::class, 'numero', 'resposta sem numero reprova');
lanca(fn() => montagem_secao($ent, [[p('texto solto')], $respostas]), ConversorErro::class, 'pergunta', 'pergunta que nao e voz reprova');
lanca(fn() => montagem_secao(['tipo' => 'entrevista', 'partes' => [parte()]], [$perguntas]), ConversorErro::class, 'exatamente 2 partes', 'entrevista com uma parte so');
lanca(fn() => montagem_secao(['tipo' => 'entrevista', 'partes' => [parte(['envolver' => ['tag' => 'div']]), parte()]], [$perguntas, $respostas]), ConversorErro::class, 'envolver', 'entrevista nao aceita envolver');

// receita: lista fechada de chaves e de tipos
lanca(fn() => montagem_secao(['tipo' => 'prosa', 'partes' => [parte()], 'html' => '<b>'], [[p('a')]]), ConversorErro::class, 'chave desconhecida "html"', 'chave desconhecida na secao');
lanca(fn() => montagem_secao(['tipo' => 'prosa', 'partes' => [parte(['texto' => 'x'])]], [[p('a')]]), ConversorErro::class, 'chave desconhecida "texto"', 'chave desconhecida na parte');
lanca(fn() => montagem_secao(['tipo' => 'prosa', 'partes' => [['pt' => ['fonte' => 'a', 'inicio' => 'b', 'html' => 'c']]]], [[p('a')]]), ConversorErro::class, 'chave desconhecida "html"', 'chave desconhecida no idioma');
lanca(fn() => montagem_secao(['tipo' => 'prosa', 'partes' => [parte(['envolver' => ['tag' => 'div', 'onclick' => 'x']])]], [[p('a')]]), ConversorErro::class, 'chave desconhecida "onclick"', 'chave desconhecida em envolver');
lanca(fn() => montagem_secao(['tipo' => 'mosaico', 'partes' => [parte()]], [[p('a')]]), ConversorErro::class, 'tipo desconhecido', 'tipo desconhecido');
lanca(fn() => montagem_secao(['tipo' => 'prosa', 'partes' => [parte(['envolver' => ['tag' => 'DIV>']])]], [[p('a')]]), ConversorErro::class, 'tag', 'tag invalida em envolver');
lanca(fn() => montagem_secao(['tipo' => 'sequencia', 'partes' => [parte(), parte()]], [[p('a')]]), ConversorErro::class, 'nos por parte', 'numero de listas de nos diferente do de partes');

terminar();
