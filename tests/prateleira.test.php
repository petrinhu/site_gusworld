<?php

declare(strict_types=1);

/**
 * tests/prateleira.test.php — teste do helper PURO da estante da banca:
 * prateleira_colunas() (data/edicoes-helpers.php), o lado que roda EM PRODUCAO.
 * ZERO dependencia (assercoes na unha, igual aos outros .test.php).
 *   php tests/prateleira.test.php   → "ALL GREEN" e exit 0, ou exit 1 no 1o erro.
 *
 * ★ Por que testar? A banca cresce sozinha por foreach: a contagem de capas
 * muda a cada edicao publicada e ninguem re-edita layout. O numero de colunas e
 * a regra que evita o BURACO no fim da fileira (2 capas em 3 colunas deixariam
 * um vazio na ponta). E uma conversao contagem → layout: a classe de bug que so
 * aparece na 5a edicao, quando ninguem esta olhando.
 *
 * Cobre tambem o caso VIVO de hoje (3 publicadas) sem tocar em data/edicoes.php:
 * o array de exemplo aqui e local ao teste.
 */

require_once __DIR__ . '/../data/edicoes-helpers.php';

$falhas = 0;
$n = 0;

function eq($esperado, $obtido, string $msg): void
{
    global $falhas, $n;
    $n++;
    if ($esperado === $obtido) {
        return;
    }
    $falhas++;
    fwrite(STDERR, "  FAIL: {$msg}\n");
    fwrite(STDERR, "        esperado: " . json_encode($esperado) . "\n");
    fwrite(STDERR, "        obtido:   " . json_encode($obtido) . "\n");
}

// ── o contrato do numero de colunas da estante ───────────────────────────────
eq(1, prateleira_colunas(1), '1 edicao → 1 coluna (a capa unica ocupa a fileira inteira)');
eq(2, prateleira_colunas(2), '2 edicoes → 2 colunas (fileira cheia, sem buraco)');
eq(3, prateleira_colunas(3), '3 edicoes → 3 colunas (fileira cheia)');

// ── crescimento: a estante escala sozinha e nao deixa buraco a toa ───────────
eq(2, prateleira_colunas(4), '4 edicoes → 2 colunas (2 fileiras cheias, nao 3+1)');
eq(3, prateleira_colunas(5), '5 edicoes → 3 colunas (3+2; 5 e primo, alguma sobra e inevitavel)');
eq(3, prateleira_colunas(6), '6 edicoes → 3 colunas (2 fileiras cheias)');
eq(3, prateleira_colunas(7), '7+ edicoes → 3 colunas fixas (modo arquivo)');
eq(3, prateleira_colunas(8), '8 edicoes → 3 colunas (arquivo grande, nao 4 fileiras de 2)');
eq(3, prateleira_colunas(12), '12 edicoes → 3 colunas (4 fileiras cheias)');
eq(3, prateleira_colunas(40), '40 edicoes → 3 colunas (nao explode a largura do card)');

// ── bordas: nunca devolve 0 nem negativo (viraria grid quebrado no CSS) ──────
eq(1, prateleira_colunas(0), 'banca vazia → 1 coluna (nunca 0: --cols:0 quebraria o grid)');
eq(1, prateleira_colunas(-3), 'contagem negativa (impossivel) → 1 coluna, nunca negativa');

// ── determinismo: mesma entrada, mesma saida (o layout nao pode "sortear") ───
eq(prateleira_colunas(5), prateleira_colunas(5), 'determinista: a mesma contagem da o mesmo layout');

// ── integracao com o filtro anti-rascunho: rascunho NAO conta pra estante ────
// (a #3 rascunho nao pode empurrar a banca pra 3 colunas e abrir um buraco)
$exemplo = [
    ['numero' => 1, 'estado' => 'publicada', 'data' => '2026-05-15'],
    ['numero' => 2, 'estado' => 'publicada', 'data' => '2026-06-04'],
    ['numero' => 3, 'estado' => 'rascunho',  'data' => '2026-06-22'],
];
eq(2, count(edicoes_publicadas($exemplo)), 'so as publicadas contam (o rascunho fica fora)');
eq(2, prateleira_colunas(count(edicoes_publicadas($exemplo))), 'banca de hoje: 3 publicadas');

// e o caso do lancamento (so a #1 no ar) segue com a capa sozinha na fileira
$so_uma = [
    ['numero' => 1, 'estado' => 'publicada', 'data' => '2026-05-15'],
    ['numero' => 2, 'estado' => 'rascunho',  'data' => '2026-06-04'],
];
eq(1, prateleira_colunas(count(edicoes_publicadas($so_uma))), 'lancamento: 1 publicada → 1 coluna, a capa sozinha na fileira');

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} assercoes FALHARAM.\n");
    exit(1);
}
fwrite(STDOUT, "ALL GREEN ({$n} assercoes)\n");
exit(0);
