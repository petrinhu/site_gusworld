<?php

declare(strict_types=1);

/**
 * tests/cupom-pct.test.php — teste da CONVERSAO contagem→percentual do lado que
 * roda EM PRODUCAO: PHP cupom_percentuais() (src/lib/cupom.php). ZERO dependencia
 * (assercoes na unha, igual ao node --test dos mini-apps). Fica FORA de public_html/.
 *   php tests/cupom-pct.test.php   → "ALL GREEN" e exit 0, ou exit 1 no 1o erro.
 *
 * ★★ Por que um teste PHP alem do node --test? Porque a formula que o site SERVE
 * e esta (PHP), nao o espelho JS. Testar so o gemeo JS deixaria a formula real
 * sem rede (a classe de bug silencioso de conversao). Os casos aqui espelham
 * tests/cupom-core.test.js: se um lado mudar sem o outro, um dos dois quebra.
 */

require_once __DIR__ . '/../src/lib/cupom.php';

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

$O = CUPOM_OPCOES; // [mais-jogo, mais-bastidores, mais-gus]

// soma sempre 100 quando ha voto (o cenario real do storage de exemplo 2/40/1)
$p = cupom_percentuais([$O[0] => 2, $O[1] => 40, $O[2] => 1]);
eq(100, array_sum($p), 'soma fecha 100 no caso 2/40/1');

// caso limpo 60/30/10
eq(
    [$O[0] => 60, $O[1] => 30, $O[2] => 10],
    cupom_percentuais([$O[0] => 6, $O[1] => 3, $O[2] => 1]),
    'caso limpo 6/3/1 = 60/30/10'
);

// arredondamento 1/1/1 → 34/33/33 (sobra vai pro 1o no desempate estavel)
eq(
    [$O[0] => 34, $O[1] => 33, $O[2] => 33],
    cupom_percentuais([$O[0] => 1, $O[1] => 1, $O[2] => 1]),
    'arredondamento 1/1/1 = 34/33/33'
);

// 0 votos → tudo 0 (sem divisao por zero)
eq(
    [$O[0] => 0, $O[1] => 0, $O[2] => 0],
    cupom_percentuais([$O[0] => 0, $O[1] => 0, $O[2] => 0]),
    '0 votos degrada pra tudo 0'
);
eq([$O[0] => 0, $O[1] => 0, $O[2] => 0], cupom_percentuais([]), 'tally vazio = tudo 0');

// uma opcao com 100%
eq(
    [$O[0] => 100, $O[1] => 0, $O[2] => 0],
    cupom_percentuais([$O[0] => 7, $O[1] => 0, $O[2] => 0]),
    'uma opcao domina = 100%'
);

// contagem-lixo (negativa/string) conta como 0 → so a valida sobra
eq(
    [$O[0] => 0, $O[1] => 0, $O[2] => 100],
    cupom_percentuais([$O[0] => -5, $O[1] => '40', $O[2] => 3]),
    'contagem-lixo vira 0'
);

// total interno bate (uso server-side pra "urna vazia"); NAO vaza na rede
eq(43, cupom_total([$O[0] => 2, $O[1] => 40, $O[2] => 1]), 'cupom_total soma a contagem crua');
eq(0, cupom_total([]), 'cupom_total de vazio = 0');

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} assercoes FALHARAM.\n");
    exit(1);
}
fwrite(STDOUT, "ALL GREEN ({$n} assercoes)\n");
exit(0);
