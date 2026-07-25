<?php

declare(strict_types=1);

/**
 * tests/og-image.test.php - teste do card social POR EDIÇÃO (campo opcional
 * `og_image` do $edicoes → $ctx → $head → head.php). ZERO dependência (asserções
 * na unha, igual aos outros .test.php e ao node --test dos mini-apps). Fica FORA
 * de public_html/.
 *   php tests/og-image.test.php   → "ALL GREEN" e exit 0, ou exit 1 no 1o erro.
 *
 * ★ Por que testar isto? É um campo com FALLBACK, e fallback silencioso é a
 * classe de bug que ninguém vê: se a propagação quebrar, a edição não some nem
 * dá erro, ela só passa a mostrar o card ERRADO no X/Bluesky (e o preview de
 * link é imutável no post já publicado). Cobre os dois lados: a edição que tem
 * card próprio e a que não tem (default preservado).
 */

require_once __DIR__ . '/../src/lib/config.php';
require_once __DIR__ . '/../data/edicoes-helpers.php';
require_once __DIR__ . '/../src/lib/contexto-edicao.php';

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

/** Entrada mínima de edição publicada, para exercitar montar_contexto(). */
function entrada(array $extra = []): array
{
    return $extra + [
        'numero'         => 7,
        'revisao'        => 1,
        'estado'         => 'publicada',
        'data'           => '2026-06-04',
        'atualizada_em'  => '2026-06-04',
        'slug_pt'        => 'edicao-7',
        'slug_en'        => 'edition-7',
        'titulo_pt'      => 'Teste',
        'titulo_en'      => 'Test',
        'dek_pt'         => 'dek',
        'dek_en'         => 'dek',
        'frame'          => null,
        'frame_alt_pt'   => null,
        'frame_alt_en'   => null,
        'na_linha_tempo' => false,
    ];
}

// ── o campo é OPCIONAL: sem ele o contexto devolve null (o head cai no default)
$sem = montar_contexto(entrada(), 'pt');
eq(true, array_key_exists('og_image', $sem), 'a chave og_image existe sempre no contexto');
eq(null, $sem['og_image'], 'sem o campo no dado → null (default do head.php)');

// ── com o campo, o caminho atravessa intacto (nos dois idiomas: card é único)
$com_pt = montar_contexto(entrada(['og_image' => '/assets/og-edicao-7.jpg']), 'pt');
$com_en = montar_contexto(entrada(['og_image' => '/assets/og-edicao-7.jpg']), 'en');
eq('/assets/og-edicao-7.jpg', $com_pt['og_image'], 'pt: o caminho do card chega no contexto');
eq('/assets/og-edicao-7.jpg', $com_en['og_image'], 'en: o mesmo card serve o par gêmeo');

// ── null explícito no dado é tratado como ausência
$nulo = montar_contexto(entrada(['og_image' => null]), 'pt');
eq(null, $nulo['og_image'], 'og_image null explícito → null (não vira string vazia)');

// ── o DADO REAL: a #2 tem card próprio; as demais seguem no default ──────────
$edicoes = require __DIR__ . '/../data/edicoes.php';
$por_numero = [];
foreach ($edicoes as $e) {
    $por_numero[(int) $e['numero']] = $e;
}

eq(
    '/assets/og-edicao-2.jpg',
    montar_contexto($por_numero[2], 'pt')['og_image'],
    'a #2 aponta para o card próprio (Arquitetura)'
);
eq(
    null,
    montar_contexto($por_numero[1], 'pt')['og_image'],
    'a #1 não define card próprio (fica com /assets/og-launch.jpg pelo default)'
);
eq(
    null,
    montar_contexto($por_numero[3], 'pt')['og_image'],
    'a #3 não define card próprio'
);

// ── o arquivo do card existe no disco e é publicável ────────────────────────
$card = __DIR__ . '/../public_html/assets/og-edicao-2.jpg';
eq(true, is_file($card), 'o card da #2 existe em public_html/assets/');
$dim = is_file($card) ? getimagesize($card) : false;
eq([1200, 630], $dim === false ? [] : [$dim[0], $dim[1]], 'o card da #2 é 1200x630 exatos');

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} asserções FALHARAM\n");
    exit(1);
}
echo "ALL GREEN ({$n} asserções)\n";
