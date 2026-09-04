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
/**
 * Renderiza a home num idioma com o `?ed=` dado (null = sem parâmetro).
 * O 3º parâmetro é o seam de teste do render_banca() (null = o dado real): só o
 * usa o guard "edição sem card não ganha arte" lá embaixo, que desde 2026-08-04
 * não tem mais fixture no dado real (todas as publicadas têm card).
 */
function render_banca_html(string $idioma, ?string $ed = null, ?array $edicoes = null): string
{
    if ($ed === null) {
        unset($_GET['ed']);
    } else {
        $_GET['ed'] = $ed;
    }
    ob_start();
    render_banca($idioma, $edicoes);
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

// O dado real de hoje: #4 (a mais nova, publicada em 03/09/2026), #3, #2 e #1
// publicadas — as QUATRO com arte de capa. A #4 nasceu com o par dela
// (`og_image` + `capa_en`) já no publish, então a estante enche: 4 folhas, 4
// artes, mais nova primeiro. É a ORDEM que estas duas travam (a arte da #4 tem
// de vir na frente, não no fim) e o CASAMENTO edição→arte: uma troca de índice
// entre folhas aqui é invisível a olho nu.
eq(
    ['/assets/og-edicao-4.jpg', '/assets/og-edicao-3.jpg', '/assets/og-edicao-2.jpg', '/assets/og-launch.jpg'],
    capas_do_html($pt),
    'PT: as 4 artes em português, mais nova primeiro (#4, #3, #2, #1 — a da #1 é o card de lançamento)'
);
eq(
    ['/assets/og-edicao-4-en.jpg', '/assets/og-edicao-3-en.jpg', '/assets/og-edicao-2-en.jpg', '/assets/og-edicao-1-en.jpg'],
    capas_do_html($en),
    'EN: as mesmas 4 edições, cada uma com a arte em INGLÊS (#4, #3, #2, #1)'
);

// ── A FRONTEIRA: o card SOCIAL não segue o idioma ───────────────────────────
// ★ ESTA É A ASSERÇÃO QUE MUDOU DE PESO em 2026-08-04, e vale registrar por quê.
// Enquanto a mais nova (então a #3) não tinha card, o og:image da home caía no
// default FIXO do head.php — e o default é um arquivo que NÃO tem variante
// `-en`. Ou seja: "nenhuma variante EN vaza" passava À TOA, porque não havia
// variante nenhuma em jogo. Desde então, quem quer que seja a mais nova tem de
// trazer `og_image` E `capa_en`: a home carrega um card que TEM gêmeo em
// inglês, e é só a partir daí que a fronteira "capa muda de idioma, meta tag
// não" está de fato sendo exercitada no /en/. A mais nova de hoje é a #4.
// ⚠️ A pré-condição logo abaixo trava exatamente isso e tem de mirar SEMPRE na
// edição que hoje é a mais nova (aqui, a #4) — travada na #3 antiga, ela
// continuaria passando só porque a #3 não saiu do ar (deixou de provar a
// fronteira que descreve, sem ninguém notar).
eq(
    true,
    str_contains($en, 'og-edicao-4-en.jpg'),
    'pré-condição: a arte EN da mais nova existe na página /en/ (sem ela, a asserção anti-vazamento passaria à toa)'
);
eq(og_do_html($pt), og_do_html($en), 'a meta tag social é a MESMA nos dois idiomas (o card não segue o idioma)');
eq($base . '/assets/og-edicao-4.jpg', og_do_html($pt), 'og:image em /pt/ = o card próprio da #4 (a mais nova é a vitrine viva)');
eq($base . '/assets/og-edicao-4.jpg', og_do_html($en), 'og:image em /en/ = o MESMO card em PORTUGUÊS (nunca a variante og-edicao-4-en)');
eq($base . '/assets/og-edicao-2.jpg', og_do_html(render_banca_html('en', '2')), 'en ?ed=2 → card português da #2');
// ⚠️ MENSAGEM CORRIGIDA (era "→ o default"): a #1 DECLARA `og_image` desde
// 2026-07-25, e o arquivo que ela declara é o mesmo que o head.php usa de
// default. O valor coincide; a RESOLUÇÃO não — aqui o card sai do dado da #1.
// Quem prova a diferença é a asserção de og_card_banca() em og-banca-ed.test.php
// (resolver devolve a string, cair no default devolve null).
eq($base . '/assets/og-launch.jpg', og_do_html(render_banca_html('en', '1')), 'en ?ed=1 → o card próprio da #1 (mesmo arquivo do default, resolução diferente)');
eq($base . '/assets/og-launch.jpg', og_do_html(render_banca_html('pt', '1')), 'pt ?ed=1 → o card próprio da #1 (o de lançamento)');
eq(false, str_contains(og_do_html($en), '-en.jpg'), 'nenhuma variante EN vaza para a meta tag social');
eq(
    true,
    str_contains(render_banca_html('en', '2'), '<meta name="twitter:image" content="' . $base . '/assets/og-edicao-2.jpg">'),
    'en: o twitter:image também fica no card português'
);

// ── as duas estantes seguem com a MESMA quantidade de capas ─────────────────
// 4 publicadas hoje (#4, #3, #2, #1). O que este par trava não é o número em
// si, e sim que a variante de idioma NÃO some nem duplica folha: as duas
// estantes listam exatamente as mesmas edições, mudando só a arte.
$conta = static fn (string $html): int => substr_count($html, 'class="ed folha"');
eq(4, $conta($pt), 'pt: 4 capas publicadas (#4, #3, #2, #1)');
eq(4, $conta($en), 'en: as mesmas 4 capas (a variante não some nem duplica capa)');
eq($conta($pt), $conta($en), 'as duas estantes listam a MESMA quantidade de folhas');

// ── zero CLS: a arte EN entra com width/height reais do arquivo ─────────────
eq(1, preg_match('~og-edicao-3-en\.jpg[^>]*width="1200" height="630"~', $en), 'en: a capa da #3 sai com as dimensões reais');
eq(1, preg_match('~og-edicao-2-en\.jpg[^>]*width="1200" height="630"~', $en), 'en: a capa da #2 sai com as dimensões reais');
eq(1, preg_match('~og-edicao-1-en\.jpg[^>]*width="1200" height="630"~', $en), 'en: a capa da #1 sai com as dimensões reais');

// ── EDIÇÃO SEM CARD NÃO GANHA ARTE (o guard que perdeu o fixture real) ──────
// Até 2026-08-04 quem exercitava este caminho era a própria #3, que estava no ar
// sem card nenhum: a folha dela saía sem <figure>. Agora TODA publicada tem arte,
// e sem fixture o caminho ficaria sem cobertura — a regra continuaria escrita em
// capa_estante() e ninguém saberia se o template a respeita. O seam do
// render_banca() devolve o fixture: uma cópia do dado real com a #2 sem card
// nenhum. A edição CONTINUA na estante (3 folhas), só não ganha <img>.
$edicoes_reais = require __DIR__ . '/../data/edicoes.php';
$sem_card_na_2 = [];
foreach ($edicoes_reais as $e) {
    if ((int) $e['numero'] === 2) {
        unset($e['og_image'], $e['capa_en']);
    }
    $sem_card_na_2[] = $e;
}
$pt_fix = render_banca_html('pt', null, $sem_card_na_2);
$en_fix = render_banca_html('en', null, $sem_card_na_2);

eq(
    ['/assets/og-edicao-4.jpg', '/assets/og-edicao-3.jpg', '/assets/og-launch.jpg'],
    capas_do_html($pt_fix),
    'pt: a edição sem card sai da lista de artes (a folha fica, o <img> não)'
);
eq(
    ['/assets/og-edicao-4-en.jpg', '/assets/og-edicao-3-en.jpg', '/assets/og-edicao-1-en.jpg'],
    capas_do_html($en_fix),
    'en: idem — sem card não há nem variante de idioma para cair'
);
eq(4, $conta($pt_fix), 'pt: a edição sem arte CONTINUA na estante (4 folhas, uma sem capa)');
eq(4, $conta($en_fix), 'en: idem (a ausência de arte não some com a folha nem duplica)');

// ── os arquivos existem mesmo no disco (capa quebrada = buraco na estante) ──
// ★ ENUMERADO a partir do dado, não à mão: lista escrita à mão envelhece calada
// (a da #3 teria ficado de fora, e hoje a da #4 também). O piso abaixo impede o
// laço de rodar VAZIO e "passar" sem ter verificado arquivo nenhum.
$artes = [];
foreach (edicoes_publicadas($edicoes_reais) as $e) {
    foreach (SITE_IDIOMAS as $lang) {
        $arte = capa_estante($e, $lang);
        if ($arte !== null) {
            $artes[$arte] = true;
        }
    }
}
$artes = array_keys($artes);
sort($artes);
eq(8, count($artes), 'piso: as 4 publicadas rendem 8 artes distintas (pt + en) — o laço abaixo não roda vazio');

foreach ($artes as $rel) {
    $caminho = __DIR__ . '/../public_html' . $rel;
    eq(true, is_file($caminho), "o arquivo {$rel} existe em public_html/");
    if (is_file($caminho)) {
        $dim = getimagesize($caminho);
        eq([1200, 630], [$dim[0] ?? 0, $dim[1] ?? 0], "{$rel} tem 1200x630 (o formato do card social)");
    }
}

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} asserções FALHARAM\n");
    exit(1);
}
echo "ALL GREEN ({$n} asserções)\n";
