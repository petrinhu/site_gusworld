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
 *
 * ⚠️ ONDE MORA CADA LADO (mudou quando a #3 ganhou card, 2026-08-04): desde que
 * a #3 passou a declarar `og_image`, TODA edição publicada tem card próprio —
 * logo o lado "não tem card" NÃO é mais exercitado pelo dado real aqui, e passa
 * a viver inteiro nas entradas SINTÉTICAS de entrada() (as três asserções de
 * null lá em cima). O lado equivalente no HTML renderizado (a mais nova sem
 * card → default do head.php) é coberto por fixture em og-banca-ed.test.php.
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

// ── o DADO REAL: as 3 publicadas declaram card próprio ──────────────────────
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
// ★ a #1 declara EXPLICITAMENTE o card do lançamento dela (2026-07-25). É o
// mesmo arquivo que o head.php usa de default, mas declarar importa por dois
// motivos: `?ed=1` passa a resolver no card DELA (em vez de acertar o alvo por
// acaso, via default) e a estante da banca tem de onde tirar a arte de capa.
eq(
    '/assets/og-launch.jpg',
    montar_contexto($por_numero[1], 'pt')['og_image'],
    'a #1 aponta para o próprio card de lançamento'
);
// ★ a #3 ganhou card próprio em 2026-08-04 (decisão editorial) — foi ela quem,
// naquele momento, era a MAIS NOVA publicada. Hoje a mais nova é a #4
// (publicada em 03/09/2026, com card próprio desde o publish), mas o campo
// da #3 continua exercitado abaixo por si só: é o card DELA que estas duas
// asserções travam, não o papel de "mais nova" (esse é o og-banca-ed.test.php
// que trava, resolvendo pelo link nu).
eq(
    '/assets/og-edicao-3.jpg',
    montar_contexto($por_numero[3], 'pt')['og_image'],
    'a #3 aponta para o card próprio (O Quadrado Azul)'
);
eq(
    '/assets/og-edicao-3.jpg',
    montar_contexto($por_numero[3], 'en')['og_image'],
    'en: a #3 serve o MESMO card (o social não tem idioma; quem varia é a capa)'
);

// ── os arquivos dos cards existem no disco e são publicáveis ────────────────
// (a estante da banca também os serve como ARTE DE CAPA: um card faltando no
// disco tira a arte da capa em silêncio, então a existência é asserção.)
// ★ ENUMERADO a partir do dado, não à mão: a lista escrita à mão envelhece em
// silêncio (foi o que aconteceu quando a #3 entrou). O piso logo abaixo existe
// para o laço não poder rodar VAZIO e "passar" sem verificar nada.
$cards_publicados = [];
foreach (edicoes_publicadas($edicoes) as $e) {
    $rel = (string) ($e['og_image'] ?? '');
    if ($rel !== '') {
        $cards_publicados[(int) $e['numero']] = $rel;
    }
}
// DERIVADO (não cravado): a contagem de publicadas vem de edicoes_publicadas(),
// a fonte de verdade — não de um número lido à mão que envelhece a cada
// publish (foi o que quebrou quando a #5 saiu do rascunho). O piso real
// continua sendo "maior que zero": comparar as duas contagens prova que
// NENHUMA publicada ficou sem `og_image` (uma invariante de produto, não um
// acidente de implementação — as duas contagens vêm de laços diferentes).
$total_publicadas = count(edicoes_publicadas($edicoes));
eq(true, $total_publicadas > 0, 'piso: existe ao menos 1 edição publicada (a suíte não roda contra array vazio)');
eq($total_publicadas, count($cards_publicados), "piso: as {$total_publicadas} edições publicadas declaram card próprio (o laço abaixo não roda vazio)");

foreach ($cards_publicados as $num => $rel) {
    $card = __DIR__ . '/../public_html' . $rel;
    eq(true, is_file($card), "o card da #{$num} existe em public_html{$rel}");
    $dim = is_file($card) ? getimagesize($card) : false;
    eq([1200, 630], $dim === false ? [] : [$dim[0], $dim[1]], "o card da #{$num} é 1200x630 exatos");
}

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} asserções FALHARAM\n");
    exit(1);
}
echo "ALL GREEN ({$n} asserções)\n";
