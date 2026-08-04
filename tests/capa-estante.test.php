<?php

declare(strict_types=1);

/**
 * tests/capa-estante.test.php - a ARTE DE CAPA da estante POR IDIOMA
 * (capa_estante() + a fiação real na banca). ZERO dependência (asserções na
 * unha, igual aos outros .test.php). Fica FORA de public_html/.
 *   php tests/capa-estante.test.php   → "ALL GREEN" e exit 0, ou exit 1 no 1o erro.
 *
 * ★ O que está sendo protegido (ordem do líder, 2026-07-25): "quero as capas em
 * ingles na versao ingles. os og podem ficar em portugues mesmo". São DOIS usos
 * do mesmo desenho, e eles NÃO andam juntos:
 *
 *   1. a CAPA da estante (o <img> que o leitor vê na banca) → segue o IDIOMA
 *      da página: /en/ mostra a arte em inglês quando ela existe;
 *   2. o CARD SOCIAL (<meta property="og:image">) → é sempre o de PORTUGUÊS,
 *      nos dois idiomas e em todo `?ed=N`. Um card social já publicado é
 *      IRREVERSÍVEL (o X reescreve o preview dos posts antigos), então trocar
 *      o og:image por idioma reescreveria o histórico do canal. Este teste
 *      trava exatamente essa fronteira: capa muda, meta tag não.
 */

require_once __DIR__ . '/../src/lib/render-banca.php';

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

// ═══ 1. O NÚCLEO PURO: capa_estante() ════════════════════════════════════════
$com_en = ['og_image' => '/assets/og-2.jpg', 'capa_en' => '/assets/og-2-en.jpg'];
$so_pt  = ['og_image' => '/assets/og-1.jpg'];
$nada   = ['numero' => 7];

eq('/assets/og-2-en.jpg', capa_estante($com_en, 'en'), 'en + capa_en → a arte em inglês');
eq('/assets/og-2.jpg', capa_estante($com_en, 'pt'), 'pt → sempre o card em português (nunca a variante)');
eq('/assets/og-1.jpg', capa_estante($so_pt, 'en'), 'en sem variante → fallback no card português');
eq('/assets/og-1.jpg', capa_estante($so_pt, 'pt'), 'pt sem variante → o card português');
eq(null, capa_estante($nada, 'pt'), 'edição sem card nenhum → null (não ganha arte, sem erro)');
eq(null, capa_estante($nada, 'en'), 'edição sem card nenhum, en → null');

// o campo por idioma é GENÉRICO (capa_<idioma>): amanhã uma capa própria do pt
// entra pelo mesmo caminho, sem `if` de idioma espalhado no template.
eq(
    '/assets/capa-pt.jpg',
    capa_estante(['og_image' => '/assets/og-1.jpg', 'capa_pt' => '/assets/capa-pt.jpg'], 'pt'),
    'capa_pt (se um dia existir) tem precedência no pt'
);

// robustez do dado: campo presente mas inútil cai no fallback, nunca em ''
eq('/assets/og-2.jpg', capa_estante(['og_image' => '/assets/og-2.jpg', 'capa_en' => ''], 'en'), 'capa_en vazia → fallback');
eq('/assets/og-2.jpg', capa_estante(['og_image' => '/assets/og-2.jpg', 'capa_en' => null], 'en'), 'capa_en null → fallback');
eq(null, capa_estante(['og_image' => '', 'capa_en' => ''], 'en'), 'tudo vazio → null');
eq('/assets/og-2.jpg', capa_estante($com_en, 'fr'), 'idioma fora do site → o card português (nunca adivinha)');

// ═══ 2. A FIAÇÃO REAL (a banca renderizada de ponta a ponta) ═════════════════
/** Renderiza a home num idioma com o `?ed=` dado (null = sem parâmetro). */
function render_banca_html(string $idioma, ?string $ed = null): string
{
    if ($ed === null) {
        unset($_GET['ed']);
    } else {
        $_GET['ed'] = $ed;
    }
    ob_start();
    render_banca($idioma);
    $html = (string) ob_get_clean();
    unset($_GET['ed']);

    return $html;
}

/** Os src das artes de capa da estante, na ordem em que saíram (sem o ?v=mtime). */
function capas_do_html(string $html): array
{
    preg_match_all('~<figure class="ed-capa aceso">\s*<img src="([^"?]*)~', $html, $m);

    return $m[1];
}

/** O valor da <meta property="og:image">. */
function og_do_html(string $html): string
{
    return preg_match('~<meta property="og:image" content="([^"]*)"~', $html, $m) === 1 ? $m[1] : '(ausente)';
}

$base = SITE_BASE_URL;
$pt   = render_banca_html('pt');
$en   = render_banca_html('en');

// O dado real de hoje: #3 (a mais nova), #2 e #1 publicadas. A #3 entrou no ar
// SEM arte de capa nenhuma (nem `og_image`, nem `capa_en`), e a regra é que
// edição sem card não ganha <img> — a folha dela sai sem figure. Por isso a
// lista de artes continua sendo a do #2 e a do #1: são as duas que TÊM arte.
eq(
    ['/assets/og-edicao-2.jpg', '/assets/og-launch.jpg'],
    capas_do_html($pt),
    'PT: as artes em português são as das edições que têm card (#2 e depois #1; a #3 não tem)'
);
eq(
    ['/assets/og-edicao-2-en.jpg', '/assets/og-edicao-1-en.jpg'],
    capas_do_html($en),
    'EN: as mesmas edições, com a arte em INGLÊS (#2 e depois #1; a #3 não tem)'
);

// ── A FRONTEIRA: o card SOCIAL não segue o idioma ───────────────────────────
// ⚠️ Como a mais nova publicada (a #3) não tem card próprio, o og:image da home
// cai no default FIXO do head.php — que é o comportamento documentado em
// og_card_banca() ("se a mais nova não tiver card próprio, cai no default").
// A fronteira sob teste não é QUAL card sai, e sim que ele é o MESMO nos dois
// idiomas: a igualdade abaixo trava isso sem depender de quem é a mais nova.
eq(og_do_html($pt), og_do_html($en), 'a meta tag social é a MESMA nos dois idiomas (o card não segue o idioma)');
eq($base . '/assets/og-launch.jpg', og_do_html($pt), 'og:image em /pt/ = default (a #3, mais nova, não tem card próprio)');
eq($base . '/assets/og-launch.jpg', og_do_html($en), 'og:image em /en/ = o MESMO default (nunca uma variante -en)');
eq($base . '/assets/og-edicao-2.jpg', og_do_html(render_banca_html('en', '2')), 'en ?ed=2 → card português da #2');
eq($base . '/assets/og-launch.jpg', og_do_html(render_banca_html('en', '1')), 'en ?ed=1 → card português da #1 (o default)');
eq($base . '/assets/og-launch.jpg', og_do_html(render_banca_html('pt', '1')), 'pt ?ed=1 → card português da #1');
eq(false, str_contains(og_do_html($en), '-en.jpg'), 'nenhuma variante EN vaza para a meta tag social');
eq(
    true,
    str_contains(render_banca_html('en', '2'), '<meta name="twitter:image" content="' . $base . '/assets/og-edicao-2.jpg">'),
    'en: o twitter:image também fica no card português'
);

// ── as duas estantes seguem com a MESMA quantidade de capas ─────────────────
// 3 publicadas hoje (#3, #2, #1). O que este par trava não é o número em si, e
// sim que a variante de idioma NÃO some nem duplica folha: as duas estantes
// listam exatamente as mesmas edições, mudando só a arte.
$conta = static fn (string $html): int => substr_count($html, 'class="ed folha"');
eq(3, $conta($pt), 'pt: 3 capas publicadas (#3, #2, #1)');
eq(3, $conta($en), 'en: as mesmas 3 capas (a variante não some nem duplica capa)');
eq($conta($pt), $conta($en), 'as duas estantes listam a MESMA quantidade de folhas');

// ── zero CLS: a arte EN entra com width/height reais do arquivo ─────────────
eq(1, preg_match('~og-edicao-2-en\.jpg[^>]*width="1200" height="630"~', $en), 'en: a capa da #2 sai com as dimensões reais');
eq(1, preg_match('~og-edicao-1-en\.jpg[^>]*width="1200" height="630"~', $en), 'en: a capa da #1 sai com as dimensões reais');

// ── os arquivos existem mesmo no disco (capa quebrada = buraco na estante) ──
foreach ([
    'og-edicao-1-en.jpg',
    'og-edicao-2-en.jpg',
    'og-launch.jpg',
    'og-edicao-2.jpg',
] as $arq) {
    $caminho = __DIR__ . '/../public_html/assets/' . $arq;
    eq(true, is_file($caminho), "o arquivo {$arq} existe em public_html/assets/");
    if (is_file($caminho)) {
        $dim = getimagesize($caminho);
        eq([1200, 630], [$dim[0] ?? 0, $dim[1] ?? 0], "{$arq} tem 1200x630 (o formato do card social)");
    }
}

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} asserções FALHARAM\n");
    exit(1);
}
echo "ALL GREEN ({$n} asserções)\n";
