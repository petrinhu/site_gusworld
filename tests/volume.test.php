<?php

declare(strict_types=1);

/**
 * tests/volume.test.php — teste dos helpers PUROS do versionamento (Vol.Ed.Rev):
 * volume_edicao() e build_data() (data/edicoes-helpers.php), o lado que roda EM
 * PRODUCAO (PHP). ZERO dependencia (assercoes na unha, igual aos outros .test.php
 * e ao node --test dos mini-apps). Fica FORA de public_html/.
 *   php tests/volume.test.php   → "ALL GREEN" e exit 0, ou exit 1 no 1o erro.
 *
 * ★ Por que testar? volume_edicao e uma CONVERSAO (data → volume) — a classe de
 * bug silencioso que so aparece na virada de ano se ninguem exercitar a borda.
 * A formula que o site SERVE e esta (PHP), entao ela tem que ter rede propria.
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

// ── volume_edicao: 2026 = Vol.1 (base 2025) ──────────────────────────────────
eq(1, volume_edicao('2026-05-15'), '2026 → Vol.1 (a safra da genese)');
eq(1, volume_edicao('2026-06-22'), '2026 (outro mes) ainda e Vol.1');
eq(2, volume_edicao('2027-01-01'), '2027 → Vol.2 (borda de ano: 1o dia)');
eq(2, volume_edicao('2027-12-31'), '2027 (ultimo dia) ainda e Vol.2');
eq(3, volume_edicao('2028-03-10'), '2028 → Vol.3');
eq(5, volume_edicao('2030-07-20'), '2030 → Vol.5 (salto de anos)');

// borda: o ano-base em si e Vol.0 (nunca deve existir edicao antes de 2026,
// mas a funcao e determinista e nao "chuta")
eq(0, volume_edicao('2025-12-31'), 'ano-base 2025 → Vol.0 (nao ha edicao pre-2026)');

// determinismo/timezone: o volume nao depende de hora nem de fuso (le so o ano)
eq(1, volume_edicao('2026-01-01'), 'virada de ano nao vaza pro volume anterior');

// ── build_data: ISO AAAA-MM-DD → carimbo AAAA.MM.DD ──────────────────────────
eq('2026.05.15', build_data('2026-05-15'), 'build_data da #1');
eq('2026.06.22', build_data('2026-06-22'), 'build_data da #3');
eq('2027.01.01', build_data('2027-01-01'), 'build_data na virada de ano');

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} assercoes FALHARAM.\n");
    exit(1);
}
fwrite(STDOUT, "ALL GREEN ({$n} assercoes)\n");
exit(0);
