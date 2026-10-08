<?php

declare(strict_types=1);

/**
 * tests/conversor-emissor.test.php - Emissor (scripts/conversor/emissor.php).
 * Fixtures proprias, em memoria. php tests/conversor-emissor.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require __DIR__ . '/../scripts/conversor/emissor.php';

function it_fala(string $persona, string $texto, string $caminho = '~/x'): array
{
    return ['tipo' => 'fala', 'persona' => $persona, 'caminho' => $caminho, 'texto' => $texto, 'longo' => false, 'numero' => null, 'linha' => 1];
}

function it_pensa(string $texto, ?string $persona = null, bool $longo = false): array
{
    return ['tipo' => 'pensa', 'persona' => $persona, 'caminho' => null, 'texto' => $texto, 'longo' => $longo, 'numero' => null, 'linha' => 1];
}

function voz(array ...$itens): array
{
    return ['tipo' => 'voz', 'linha' => 1, 'itens' => $itens];
}

function emite(array $nos, array $opcoes = []): string
{
    return emissor_html($nos, $opcoes);
}

// paragrafo, titulo
eq('<p>texto simples</p>', emite([['tipo' => 'paragrafo', 'texto' => 'texto simples', 'linha' => 1]]), 'paragrafo');
eq('<h3>Um titulo</h3>', emite([['tipo' => 'titulo', 'texto' => 'Um titulo', 'linha' => 1]]), 'titulo vira h3');
eq('<p>a pasta <code>engine/</code> saiu</p>', emite([['tipo' => 'paragrafo', 'texto' => 'a pasta `engine/` saiu', 'linha' => 1]]), 'crases viram <code>');
eq('<p><code>a</code> e <code>b</code></p>', emite([['tipo' => 'paragrafo', 'texto' => '`a` e `b`', 'linha' => 1]]), 'dois trechos de codigo');
eq('<p><code>a&amp;b</code></p>', emite([['tipo' => 'paragrafo', 'texto' => '`a&b`', 'linha' => 1]]), 'codigo tambem e escapado');
lanca(fn() => emite([['tipo' => 'paragrafo', 'texto' => 'crase `solta', 'linha' => 9]]), ConversorErro::class, 'crase sem par', 'crase sem par e erro');

// escape: so & < >; aspas literais
eq('<p>a &amp; b &lt; c &gt; d</p>', emite([['tipo' => 'paragrafo', 'texto' => 'a & b < c > d', 'linha' => 1]]), 'escape de & < >');
eq('<p>"aspas" e \'apostrofo\'</p>', emite([['tipo' => 'paragrafo', 'texto' => '"aspas" e \'apostrofo\'', 'linha' => 1]]), 'aspas ficam literais (nada de &quot;)');
eq("<p>caf\u{e9} \u{e7}\u{e3}o</p>", emite([['tipo' => 'paragrafo', 'texto' => "caf\u{e9} \u{e7}\u{e3}o", 'linha' => 1]]), 'acentos ficam literais (nada de entidade)');

// fala
eq(
    '<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">galeria de bugs</span></p>',
    emite([voz(it_fala('gus', 'galeria de bugs', '~/galeria'))]),
    'fala'
);
eq('<span class="dito">a &lt;b&gt; &amp; "c"</span></p>', substr(emite([voz(it_fala('gus', 'a <b> & "c"'))]), -strlen('<span class="dito">a &lt;b&gt; &amp; "c"</span></p>')), 'fala escapa e mantem aspas');

// pensamentos
eq('<p class="pensa">curto</p>', emite([voz(it_pensa('curto'))]), 'pensa comum');
eq('<p class="pensa longo">comprido</p>', emite([voz(it_pensa('comprido', null, true))]), 'pensa longo');
eq('<p class="pensa">do gus</p>', emite([voz(it_pensa('do gus', 'gus'))]), 'persona gus nao leva classe extra');
eq('<p class="pensa jaci">da jaci</p>', emite([voz(it_pensa('da jaci', 'jaci'))]), 'persona jaci vira classe');
eq('<p class="pensa jaci longo">da jaci</p>', emite([voz(it_pensa('da jaci', 'jaci', true))]), 'persona jaci e longo, nessa ordem');
eq('<p class="pensa volt">do volt</p>', emite([voz(it_pensa('do volt', 'volt'))]), 'persona volt');
eq('<p class="pensa assinatura">by: gus@glyfesse</p>', emite([voz(['tipo' => 'assinatura', 'persona' => null, 'caminho' => null, 'texto' => 'by: gus@glyfesse', 'longo' => false, 'numero' => null, 'linha' => 1])]), 'assinatura');

// grupo de voz: linhas seguidas; grupos separados por linha em branco
$g1 = voz(it_fala('gus', 'oi'), it_pensa('pensando', 'gus'));
$g2 = voz(it_pensa('outro'));
eq(
    "<p class=\"fala\"><span class=\"prompt\">gus@glyfesse:~/x\$</span> <span class=\"dito\">oi</span></p>\n<p class=\"pensa\">pensando</p>\n\n<p class=\"pensa\">outro</p>",
    emite([$g1, $g2]),
    'itens do grupo em linhas seguidas; grupos separados por UMA linha em branco; sem quebra final'
);

// bloco de pensamentos
eq(
    "<div class=\"pensa-bloco\">\n  <p class=\"pensa\">a</p>\n  <p class=\"pensa\">b</p>\n</div>",
    emite([['tipo' => 'pensa_bloco', 'linha' => 1, 'itens' => [it_pensa('a'), it_pensa('b')]]]),
    'pensa-bloco com itens recuados 2 espacos'
);

// lista
$lista = ['tipo' => 'lista', 'itens' => ['um', 'a & b', 'tem `x`'], 'linha' => 1];
eq("<ul>\n  <li>um</li>\n  <li>a &amp; b</li>\n  <li>tem <code>x</code></li>\n</ul>", emite([$lista]), 'lista sem classe');
eq("<ul class=\"placar\">\n  <li>um</li>\n  <li>a &amp; b</li>\n  <li>tem <code>x</code></li>\n</ul>", emite([$lista], ['classe_lista' => 'placar']), 'lista com a classe da receita');

// recuo: 2 e 4 espacos; linha em branco continua vazia
$dois = [['tipo' => 'paragrafo', 'texto' => 'a', 'linha' => 1], ['tipo' => 'paragrafo', 'texto' => 'b', 'linha' => 2]];
eq("  <p>a</p>\n\n  <p>b</p>", emite($dois, ['recuo' => 2]), 'recuo de 2, branco sem espacos');
eq("    <p>a</p>\n\n    <p>b</p>", emite($dois, ['recuo' => 4]), 'recuo de 4');
eq("  <ul>\n    <li>um</li>\n  </ul>", emite([['tipo' => 'lista', 'itens' => ['um'], 'linha' => 1]], ['recuo' => 2]), 'recuo soma com o recuo interno');

// UTF-8 invalido nao pode apagar texto em silencio
$ruim = "abc\xC3\x28def";
lanca(fn() => emite([['tipo' => 'paragrafo', 'texto' => $ruim, 'linha' => 3]]), ConversorErro::class, 'UTF-8', 'UTF-8 invalido em paragrafo');
lanca(fn() => emite([voz(it_fala('gus', $ruim))]), ConversorErro::class, 'UTF-8', 'UTF-8 invalido em fala');
lanca(fn() => emite([voz(it_pensa($ruim))]), ConversorErro::class, 'UTF-8', 'UTF-8 invalido em pensamento');
lanca(fn() => emite([['tipo' => 'lista', 'itens' => [$ruim], 'linha' => 3]]), ConversorErro::class, 'UTF-8', 'UTF-8 invalido em item de lista');

// vazio e erros
eq('', emite([]), 'sem nos, sem saida');
lanca(fn() => emite([['tipo' => 'numero', 'numero' => 1, 'linha' => 4]]), ConversorErro::class, 'numero', 'numero nao e emitivel');
lanca(fn() => emite([['tipo' => 'desconhecido', 'linha' => 5]]), ConversorErro::class, 'desconhecido', 'no desconhecido');

terminar();
