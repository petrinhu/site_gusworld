<?php

declare(strict_types=1);

/**
 * tests/conversor-voz.test.php - Reconhecedor de voz (scripts/conversor/voz.php).
 * Fixtures proprias, em memoria. php tests/conversor-voz.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require __DIR__ . '/../scripts/conversor/voz.php';

function v(string $linha): ?array
{
    return voz_classificar($linha);
}

// 1. fala com caminho (a linha crua, como numa cerca)
eq(
    ['tipo' => 'fala', 'persona' => 'gus', 'caminho' => '~/galeria', 'texto' => 'galeria de bugs', 'longo' => false, 'numero' => null],
    v('gus@glyfesse:~/galeria$ galeria de bugs'),
    'fala do gus com caminho'
);

// 2. persona diferente de gus, e a fala guarda pontuacao interna e erros de digitacao como vieram
$r = v('jaci@glyfesse:~/entrevista$ nao e assim. e qusndo da, sim');
eq('jaci', $r['persona'] ?? null, 'persona jaci');
eq('~/entrevista', $r['caminho'] ?? null, 'caminho da entrevista');
eq('nao e assim. e qusndo da, sim', $r['texto'] ?? null, 'texto da fala intacto');

// 3. a mesma linha entre crases (linha inteira)
eq(v('gus@glyfesse:~/nota$ a nota'), v('`gus@glyfesse:~/nota$ a nota`'), 'crases em volta da linha inteira sao tiradas');

// 4. pensamento comum
eq(
    ['tipo' => 'pensa', 'persona' => null, 'caminho' => null, 'texto' => 'queria saber', 'longo' => false, 'numero' => null],
    v('// queria saber'),
    'pensamento // comum'
);
eq('queria saber', v('`// queria saber`')['texto'] ?? null, 'pensamento entre crases');

// 5. pensamento longo: a marca decide, o texto sai sem a marca e sem espaco sobrando
$r = v('/* prefiro contar os dois do jeito que aconteceram */');
eq('pensa', $r['tipo'] ?? null, 'longo e tipo pensa');
eq(true, $r['longo'] ?? null, 'longo marcado pela marca /* */');
eq('prefiro contar os dois do jeito que aconteceram', $r['texto'] ?? null, 'texto do longo sem a marca');

// 6. assinatura
$r = v('//by: gus@glyfesse');
eq('assinatura', $r['tipo'] ?? null, '//by: e assinatura');
eq('by: gus@glyfesse', $r['texto'] ?? null, 'texto da assinatura mantem "by:"');

// 7. numero: so puro; entre crases e prosa, nao
eq('numero', v('12')['tipo'] ?? null, 'linha so com numero');
eq(12, v('12')['numero'] ?? null, 'valor do numero');
eq(null, v('`12`'), 'numero entre crases e codigo, nao separador');
eq(null, v('12 de agosto'), 'numero no inicio de prosa nao e separador');

// 8. linha comum devolve nulo
eq(null, v('Uma frase comum, com ponto.'), 'prosa comum');
eq(null, v('### Titulo'), 'titulo nao e voz');
eq(null, v('`engine/`'), 'trecho de codigo sozinho na linha nao e voz');
eq(null, v('veja http://exemplo e a // barra no meio'), '// no meio da linha nao e pensamento');
eq(null, v(''), 'linha vazia');

// 9. erros: prompt fora do padrao e marca sem texto
lanca(fn() => v('root@glyfesse> oi'), ConversorErro::class, 'prompt fora do padrao', 'formato antigo root@glyfesse>');
lanca(fn() => v('gus@glyfesse oi'), ConversorErro::class, 'prompt fora do padrao', 'sem :caminho$');
lanca(fn() => v('gus@glyfesse:~/x$'), ConversorErro::class, 'sem texto', 'fala sem texto');
lanca(fn() => v('//'), ConversorErro::class, 'sem texto', 'pensamento vazio');
lanca(fn() => v('/*  */'), ConversorErro::class, 'sem texto', 'longo vazio');

// 10. inicio de item (para o parser juntar linhas quebradas a mao)
eq(true, voz_inicia_item('gus@glyfesse:~/x$ oi'), 'prompt inicia item');
eq(true, voz_inicia_item('// x'), '// inicia item');
eq(true, voz_inicia_item('/* x'), '/* aberto inicia item');
eq(true, voz_inicia_item('root@glyfesse> x'), 'prompt antigo tambem "inicia" (para o erro aparecer)');
eq(false, voz_inicia_item('continuacao da fala'), 'continuacao nao inicia');
eq(false, voz_inicia_item('  // indentado'), 'indentado e continuacao');

terminar();
