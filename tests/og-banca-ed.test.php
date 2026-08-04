<?php

declare(strict_types=1);

/**
 * tests/og-banca-ed.test.php - o CARD SOCIAL DA BANCA por `?ed=N`
 * (og_card_banca() + a fiação real no template da home). ZERO dependência
 * (asserções na unha, igual aos outros .test.php). Fica FORA de public_html/.
 *   php tests/og-banca-ed.test.php   → "ALL GREEN" e exit 0, ou exit 1 no 1o erro.
 *
 * ★ Por que testar isto? Porque o erro aqui é INVISÍVEL e IRREVERSÍVEL: o X
 * guarda um card por ENDEREÇO e reescreve o preview dos posts já publicados.
 * Se a resolução do `?ed=` quebrar, nada na tela muda - só o histórico inteiro
 * do canal passa a mostrar o card errado, num post que não dá pra editar. E o
 * parâmetro vem da URL: é superfície de entrada não confiável, então o teste
 * cobre também o lixo (letra, traversal, tag, array) e prova que nada disso
 * chega ao HTML.
 *
 * Duas camadas:
 *   1. o núcleo PURO og_card_banca() - a regra de resolução, isolada;
 *   2. a fiação REAL - renderiza a banca inteira (o mesmo caminho do front
 *      controller) e lê a <meta property="og:image"> que saiu, mais o
 *      canonical e o corpo da página.
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

// ═══ 1. O NÚCLEO PURO ════════════════════════════════════════════════════════
// Capas de teste no formato que render_banca() monta: só PUBLICADAS, mais nova
// primeiro. A #9 tem card próprio, a #8 não (mesmo desenho do dado real).
$capas = [
    ['numero' => 9, 'og_image' => '/assets/og-edicao-9.jpg'],
    ['numero' => 8, 'og_image' => null],
];

eq('/assets/og-edicao-9.jpg', og_card_banca($capas, null), 'sem parâmetro → o card da mais nova (a vitrine viva)');
eq('/assets/og-edicao-9.jpg', og_card_banca($capas, '9'), '?ed=9 → o card da própria #9');
eq(null, og_card_banca($capas, '8'), '?ed=8 (publicada, sem card próprio) → default fixo, NÃO o card da mais nova');
eq(null, og_card_banca($capas, '99'), '?ed=99 (não existe) → default fixo');
eq(null, og_card_banca($capas, 'abc'), '?ed=abc → default (não é dígito)');
eq(null, og_card_banca($capas, '../etc/passwd'), '?ed=../etc/passwd → default (traversal não casa com nada)');
eq(null, og_card_banca($capas, '<script>'), '?ed=<script> → default (tag não casa com nada)');
eq(null, og_card_banca($capas, ''), '?ed= (vazio) → default');
eq(null, og_card_banca($capas, ['9']), '?ed[]=9 (array) → default (só string de dígitos casa)');
eq(null, og_card_banca($capas, '-9'), '?ed=-9 → default (sinal não é dígito)');
eq(null, og_card_banca($capas, '9.0'), '?ed=9.0 → default (ponto não é dígito)');
eq(null, og_card_banca($capas, ' 9'), '?ed= 9 (espaço) → default (não normaliza, não adivinha)');

// o caminho do card sai SEMPRE do dado, nunca da URL: um `og_image` envenenado
// no lado da URL não teria como entrar - a única coisa que a URL faz é casar nº.
eq(null, og_card_banca([], '9'), 'banca vazia + ?ed=9 → default (nada a casar)');
eq(null, og_card_banca([], null), 'banca vazia sem parâmetro → default (nunca erro)');

// a mais nova sem card próprio: o link nu cai no default do head.php
eq(null, og_card_banca([['numero' => 8, 'og_image' => null]], null), 'mais nova sem card próprio → default do head.php');

// ═══ 2. A FIAÇÃO REAL (a banca renderizada de ponta a ponta) ═════════════════
/**
 * Renderiza a home num idioma com o `?ed=` dado (null = sem parâmetro).
 * O 3º parâmetro é o seam de teste do render_banca() (null = o dado real): só
 * o usa o guard anti-rascunho lá embaixo, que precisa de um rascunho COM card.
 */
function render_com_ed(?string $ed, string $idioma = 'pt', ?array $edicoes = null): string
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

/** O valor da <meta property="og:image"> que saiu no HTML. */
function og_do_html(string $html): string
{
    return preg_match('~<meta property="og:image" content="([^"]*)"~', $html, $m) === 1 ? $m[1] : '(ausente)';
}

/** O href do <link rel="canonical">. */
function canonical_do_html(string $html): string
{
    return preg_match('~<link rel="canonical" href="([^"]*)"~', $html, $m) === 1 ? $m[1] : '(ausente)';
}

/** O <body> inteiro: é ele que tem que ser IDÊNTICO com e sem o parâmetro. */
function corpo_do_html(string $html): string
{
    $i = strpos($html, '<body');

    return $i === false ? '' : substr($html, $i);
}

$base    = SITE_BASE_URL;
$sem     = render_com_ed(null);
$com_2   = render_com_ed('2');
$com_1   = render_com_ed('1');
$com_3   = render_com_ed('3');
$com_99  = render_com_ed('99');
$com_abc = render_com_ed('abc');
$com_tra = render_com_ed('../etc/passwd');
$com_tag = render_com_ed('<script>alert(1)</script>');

// O dado real de hoje: a #3 é a mais nova publicada e NÃO tem card próprio; a
// #2 é publicada com card; a #1 é publicada sem card. O rascunho da vez é a #4
// (o exemplo de drip que o data/edicoes.php mantém de propósito) — é ela que
// exercita o guard anti-rascunho, no bloco lá embaixo.
eq($base . '/assets/og-launch.jpg', og_do_html($sem), 'sem parâmetro → a mais nova (#3) não tem card próprio, então cai no default');
eq($base . '/assets/og-edicao-2.jpg', og_do_html($com_2), '?ed=2 → o card da #2');
eq($base . '/assets/og-launch.jpg', og_do_html($com_1), '?ed=1 (sem card próprio) → o default /assets/og-launch.jpg');
eq($base . '/assets/og-launch.jpg', og_do_html($com_3), '?ed=3 (publicada, sem card próprio) → default, NÃO o card de outra edição');
eq($base . '/assets/og-launch.jpg', og_do_html($com_99), '?ed=99 (não existe) → default');
eq($base . '/assets/og-launch.jpg', og_do_html($com_abc), '?ed=abc → default');
eq($base . '/assets/og-launch.jpg', og_do_html($com_tra), '?ed=../etc/passwd → default');
eq($base . '/assets/og-launch.jpg', og_do_html($com_tag), '?ed=<script> → default');

// twitter:image anda junto do og:image (é o mesmo $og_image no head.php)
eq(
    true,
    str_contains($com_2, '<meta name="twitter:image" content="' . $base . '/assets/og-edicao-2.jpg">'),
    '?ed=2 → o twitter:image acompanha o og:image'
);

// ── NADA de reflexão: o valor cru não aparece em lugar nenhum do HTML ────────
eq(false, str_contains($com_tra, 'passwd'), '?ed=../etc/passwd não é ecoado no HTML');
// nota: o "..." das reticências da copy é legítimo; o que não pode sobrar é o
// segmento de subida de diretório.
eq(false, str_contains($com_tra, '../'), 'nenhum segmento "../" sobra no HTML');
eq(false, str_contains($com_tag, 'alert(1)'), '?ed=<script>alert(1)</script> não é ecoado no HTML');
eq(false, str_contains($com_tag, '&lt;script'), 'nem a versão escapada da tag aparece (não há reflexão nenhuma)');
eq(false, str_contains($com_abc, 'ed=abc'), 'o parâmetro cru não vaza em nenhum href/meta');

// ── CANONICAL: sempre a URL LIMPA da banca (não fragmenta o SEO) ─────────────
foreach ([
    'sem parâmetro' => $sem,
    '?ed=2'         => $com_2,
    '?ed=99'        => $com_99,
    '?ed=abc'       => $com_abc,
] as $caso => $html) {
    eq($base . '/pt/', canonical_do_html($html), "canonical limpo com {$caso}");
    eq(false, str_contains(canonical_do_html($html), '?ed'), "o canonical não carrega o ?ed ({$caso})");
}

// og:url segue o canonical (o head.php usa o mesmo valor)
eq(
    true,
    str_contains($com_2, '<meta property="og:url" content="' . $base . '/pt/">'),
    'og:url também é a URL limpa da banca'
);

// ── A PÁGINA É A MESMA: o parâmetro só toca as meta tags ────────────────────
eq(corpo_do_html($sem), corpo_do_html($com_2), '?ed=2 renderiza o corpo IDÊNTICO ao da banca sem parâmetro');
eq(corpo_do_html($sem), corpo_do_html($com_99), '?ed=99 renderiza o corpo IDÊNTICO');
eq(corpo_do_html($sem), corpo_do_html($com_tag), '?ed=<script> renderiza o corpo IDÊNTICO');

// e a estante lista as MESMAS edições (o `?ed=` só toca meta tag)
$conta = static fn (string $html): int => substr_count($html, 'class="ed folha"');
eq(3, $conta($sem), 'a banca de hoje mostra 3 capas publicadas (#3, #2, #1)');
eq($conta($sem), $conta($com_2), '?ed=2 não muda a quantidade de capas');
eq($conta($sem), $conta($com_3), '?ed=3 não muda a quantidade de capas');

// ── O GUARD ANTI-RASCUNHO: um rascunho não vaza card nem folha ──────────────
// A #3 era o fixture deste guard enquanto era rascunho; ela foi PUBLICADA
// (decisão editorial), então o guard mudou de fixture, não de valor: rascunho
// continua tendo que ficar fora da banca e fora do `?ed=`.
// ⚠️ A #4 (o rascunho deliberado do dado) nasce SEM card, e sem card o `?ed=4`
// cairia no default DE QUALQUER JEITO — inclusive com o filtro anti-rascunho
// quebrado, o que faria este teste passar sem testar nada. Por isso o card é
// injetado AQUI, em memória, com um nome que não existe em lugar nenhum: assim
// a ÚNICA coisa que segura esse card fora do HTML é o estado 'rascunho'.
$edicoes_reais = require __DIR__ . '/../data/edicoes.php';
$por_numero    = [];
foreach ($edicoes_reais as $e) {
    $por_numero[(int) $e['numero']] = $e;
}
eq('rascunho', (string) ($por_numero[4]['estado'] ?? ''), 'pré-condição: a #4 é o rascunho que serve de fixture deste guard');

const CARD_VAZAMENTO = '/assets/og-rascunho-NAO-DEVE-VAZAR.jpg';
$com_rascunho_com_card = [];
foreach ($edicoes_reais as $e) {
    if ((int) $e['numero'] === 4) {
        $e['og_image'] = CARD_VAZAMENTO;
    }
    $com_rascunho_com_card[] = $e;
}

$rasc_4   = render_com_ed('4', 'pt', $com_rascunho_com_card);
$rasc_sem = render_com_ed(null, 'pt', $com_rascunho_com_card);

eq($base . '/assets/og-launch.jpg', og_do_html($rasc_4), '?ed=4 (RASCUNHO com card) → default: o drip não vaza pelo permalink');
eq(false, str_contains($rasc_4, 'NAO-DEVE-VAZAR'), 'o card do rascunho não aparece em NENHUM lugar do HTML (?ed=4)');
eq(false, str_contains($rasc_sem, 'NAO-DEVE-VAZAR'), 'nem no link nu: o rascunho nunca é a "mais nova" da vitrine');
eq(3, $conta($rasc_4), '?ed=4 (rascunho) não faz a #4 aparecer na estante (segue em 3 folhas)');
eq(3, $conta($rasc_sem), 'o rascunho não entra na estante nem sem parâmetro');

// ── o gêmeo EN: o card é único, o parâmetro funciona igual ──────────────────
$en_sem = render_com_ed(null, 'en');
$en_2   = render_com_ed('2', 'en');
$en_1   = render_com_ed('1', 'en');
eq($base . '/assets/og-launch.jpg', og_do_html($en_sem), 'en: sem parâmetro → o mesmo default do pt (a mais nova, #3, não tem card)');
eq(og_do_html($sem), og_do_html($en_sem), 'en: o card do link nu é o MESMO do pt (o card não tem idioma)');
eq($base . '/assets/og-edicao-2.jpg', og_do_html($en_2), 'en: ?ed=2 → o mesmo card (o card é único, não tem idioma)');
eq($base . '/assets/og-launch.jpg', og_do_html($en_1), 'en: ?ed=1 → default');
eq($base . '/en/', canonical_do_html($en_2), 'en: canonical limpo da home inglesa');

// ── o card existe mesmo no disco (link quebrado no X é preview em branco) ────
$card = __DIR__ . '/../public_html/assets/og-edicao-2.jpg';
eq(true, is_file($card), 'o card servido pelo ?ed=2 existe em public_html/assets/');
$padrao = __DIR__ . '/../public_html/assets/og-launch.jpg';
eq(true, is_file($padrao), 'o card default do fallback existe em public_html/assets/');

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} asserções FALHARAM\n");
    exit(1);
}
echo "ALL GREEN ({$n} asserções)\n";
