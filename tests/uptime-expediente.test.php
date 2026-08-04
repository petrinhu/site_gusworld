<?php

declare(strict_types=1);

/**
 * tests/uptime-expediente.test.php - o UPTIME das sessoes de trabalho no
 * expediente do masthead (uptime_expediente() + a fiacao real no template da
 * edicao). ZERO dependencia (assercoes na unha, igual aos outros .test.php).
 * Fica FORA de public_html/.
 *   php tests/uptime-expediente.test.php   → "ALL GREEN" e exit 0, ou exit 1.
 *
 * ★ Por que testar isto?
 *   1. O campo e OPCIONAL e retroativo: a #1 e a #2 (ja PUBLICADAS, ja no ar)
 *      nao tem o campo e NAO podem ganhar linha nenhuma. Regressao aqui muda
 *      pagina que ja esta publicada - o teste prende o masthead delas byte a
 *      byte ao que era antes.
 *   2. O numero e CONGELADO no publish (a Hostinger nao ve a maquina do lider):
 *      a formatacao e a unica coisa que roda em producao, entao e ela que tem
 *      que ter rede.
 *   3. Bilingue: o rotulo 'jogo'/'game' sai do i18n; hard-code de pt so
 *      apareceria na pagina inglesa, onde ninguem olha todo dia.
 *
 * Tres camadas:
 *   1. o nucleo PURO uptime_expediente() - a regra de formatacao, isolada;
 *   2. o DADO real - as #1/#2 sem o campo, a #3 com ele;
 *   3. a fiacao REAL - renderiza a edicao inteira (o mesmo caminho do front
 *      controller) e compara o masthead com e sem o campo.
 */

require_once __DIR__ . '/../src/lib/render-edicao.php';

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
    fwrite(STDERR, "        esperado: " . json_encode($esperado, JSON_UNESCAPED_UNICODE) . "\n");
    fwrite(STDERR, "        obtido:   " . json_encode($obtido, JSON_UNESCAPED_UNICODE) . "\n");
}

$t_pt = require __DIR__ . '/../src/i18n/pt.php';
$t_en = require __DIR__ . '/../src/i18n/en.php';

// ═══ 1. O NUCLEO PURO ════════════════════════════════════════════════════════

// o caso canonico (o valor capturado em 25/07/2026, o do exemplo aprovado)
eq(
    'jogo 1456h (60d) · glintfx 326h (13d)',
    uptime_expediente(['jogo' => 1456, 'glintfx' => 326], $t_pt),
    'pt: horas E dias, separador · entre os projetos'
);
eq(
    'game 1456h (60d) · glintfx 326h (13d)',
    uptime_expediente(['jogo' => 1456, 'glintfx' => 326], $t_en),
    'en: so o rotulo muda (game); glintfx e nome proprio, nao traduz'
);

// ── a AUSENCIA do campo: string vazia (o masthead nao imprime nada) ─────────
eq('', uptime_expediente(null, $t_pt), 'edicao SEM o campo → string vazia (nenhuma linha)');
eq('', uptime_expediente([], $t_pt), 'campo vazio → string vazia');

// ── a conversao horas → dias (floor): a classe de bug silencioso ────────────
eq('jogo 0h (0d)', uptime_expediente(['jogo' => 0], $t_pt), 'zero hora → 0h (0d), nao some');
eq('jogo 23h (0d)', uptime_expediente(['jogo' => 23], $t_pt), '23h ainda e 0 dia (nao arredonda pra cima)');
eq('jogo 24h (1d)', uptime_expediente(['jogo' => 24], $t_pt), 'a virada exata do 1o dia');
eq('jogo 47h (1d)', uptime_expediente(['jogo' => 47], $t_pt), '47h = 1 dia (floor, nao round)');
eq('jogo 48h (2d)', uptime_expediente(['jogo' => 48], $t_pt), '48h = 2 dias');
eq('jogo 8760h (365d)', uptime_expediente(['jogo' => 8760], $t_pt), 'um ano de sessao aberta (o numero cresce, o formato aguenta)');

// ── um projeto so, e a ORDEM vem do dado (nao e reordenada) ────────────────
eq('glintfx 326h (13d)', uptime_expediente(['glintfx' => 326], $t_pt), 'um projeto so → sem separador solto');
eq(
    'glintfx 326h (13d) · jogo 1456h (60d)',
    uptime_expediente(['glintfx' => 326, 'jogo' => 1456], $t_pt),
    'a ordem e a do dado (quem edita o $edicoes manda)'
);

// ── projeto sem traducao no i18n: cai no proprio nome, nao some ────────────
eq(
    'quadradinho 12h (0d)',
    uptime_expediente(['quadradinho' => 12], $t_pt),
    'projeto novo sem rotulo no i18n → usa a chave (nunca vazio)'
);

// ── FAIL-SAFE: dado torto e PULADO, nao vira linha torta no papel ──────────
eq('', uptime_expediente(['jogo' => 'muito tempo'], $t_pt), 'valor nao-numerico → pulado');
eq('', uptime_expediente(['jogo' => -5], $t_pt), 'hora negativa → pulada (relogio torto nao imprime)');
eq('', uptime_expediente(['jogo' => 1.5], $t_pt), 'float → pulado (o dado e hora inteira)');
eq('', uptime_expediente(['jogo' => null], $t_pt), 'null → pulado');
eq('', uptime_expediente(['jogo' => ['h' => 10]], $t_pt), 'array aninhado → pulado');
eq('', uptime_expediente(['' => 10], $t_pt), 'chave vazia → pulada');
eq('jogo 1456h (60d)', uptime_expediente(['jogo' => 1456, 'glintfx' => null], $t_pt), 'um torto nao derruba o outro');
eq('jogo 1456h (60d)', uptime_expediente(['jogo' => '1456'], $t_pt), 'hora como string de digitos e tolerada');

// ── i18n ausente/torto nao pode fatal ──────────────────────────────────────
eq('jogo 10h (0d)', uptime_expediente(['jogo' => 10], []), 'i18n sem exp_uptime → cai na chave, sem erro');
eq('jogo 10h (0d)', uptime_expediente(['jogo' => 10], ['exp_uptime' => 'nao e array']), 'exp_uptime torto → cai na chave');

// ── nada de HTML sai daqui (quem escapa e o masthead, mas a funcao e pura) ──
eq(
    '<b>x</b> 10h (0d)',
    uptime_expediente(['jogo' => 10], ['exp_uptime' => ['jogo' => '<b>x</b>']]),
    'a funcao nao escapa (e o h() do masthead que escapa) e nao interpreta'
);

// ═══ 2. O DADO REAL ══════════════════════════════════════════════════════════
$edicoes = require __DIR__ . '/../data/edicoes.php';
$por_numero = [];
foreach ($edicoes as $e) {
    $por_numero[(int) $e['numero']] = $e;
}

eq(false, isset($por_numero[1]['uptime']), 'a #1 (publicada, no ar) NAO tem o campo - decisao do lider');
eq(false, isset($por_numero[2]['uptime']), 'a #2 (publicada, no ar) NAO tem o campo - decisao do lider');
eq(true, isset($por_numero[3]['uptime']), 'a #3 (a primeira a exibir) tem o campo');
eq(true, is_array($por_numero[3]['uptime'] ?? null), 'o campo da #3 e um mapa projeto => horas');
eq(['jogo', 'glintfx'], array_keys($por_numero[3]['uptime']), 'as chaves da #3 sao os dois projetos, nessa ordem');
// A #3 foi PUBLICADA (decisao editorial do lider). O que esta assercao trava
// hoje e a pre-condicao da camada 3 logo abaixo: como a #3 esta no ar, o
// uptime dela deixou de ser hipotese e passou a ser pagina publicada - e a
// linha do masthead dela e cobrada de verdade (nao mais so por injecao na #1).
eq('publicada', (string) $por_numero[3]['estado'], 'a #3 esta PUBLICADA no dado real (e a 1a edicao no ar com o campo uptime)');

// o contexto de render carrega (ou nao) o campo
require_once __DIR__ . '/../src/lib/contexto-edicao.php';
eq(null, montar_contexto($por_numero[1], 'pt')['uptime'], 'contexto da #1: uptime null (sem campo)');
eq(['jogo' => 1456, 'glintfx' => 326], montar_contexto($por_numero[3], 'pt')['uptime'], 'contexto da #3: o mapa do dado');

// ═══ 3. A FIACAO REAL (a edicao renderizada de ponta a ponta) ════════════════

/** Renderiza uma edicao pelo MESMO caminho do front controller. */
function render_ed(string $slug, string $idioma, ?array $edicoes = null): string
{
    $_GET['slug'] = $slug;
    ob_start();
    render_edicao($idioma, $edicoes);
    $html = (string) ob_get_clean();
    unset($_GET['slug']);

    return $html;
}

/** So o <header class="masthead"> ... </header> - o pedaco sob teste. */
function masthead_do_html(string $html): string
{
    $i = strpos($html, '<header class="masthead"');
    if ($i === false) {
        return '(masthead ausente)';
    }
    $j = strpos($html, '</header>', $i);

    return $j === false ? '(header nao fechado)' : substr($html, $i, $j - $i + 9);
}

// ── as edicoes JA PUBLICADAS: nenhuma linha nova ────────────────────────────
$ed1_pt = render_ed('edicao-1', 'pt');
$ed1_en = render_ed('edition-1', 'en');
$ed2_pt = render_ed('edicao-2', 'pt');
$ed2_en = render_ed('edition-2', 'en');

foreach ([
    '#1 pt' => $ed1_pt, '#1 en' => $ed1_en,
    '#2 pt' => $ed2_pt, '#2 en' => $ed2_en,
] as $qual => $html) {
    eq(false, str_contains(masthead_do_html($html), 'meta-uptime'), "{$qual}: sem o campo → nenhum .meta-uptime no masthead");
    eq(false, str_contains(masthead_do_html($html), 'h ('), "{$qual}: nenhum numero de uptime no masthead");
    // e o expediente segue inteiro (o que ja estava la nao foi tocado)
    eq(true, str_contains(masthead_do_html($html), 'gusworld.site'), "{$qual}: gusworld.site continua no expediente");
    eq(true, str_contains(masthead_do_html($html), 'vol.'), "{$qual}: o vol./no./data continua no expediente");
}
eq(true, str_contains(masthead_do_html($ed1_pt), '15 de maio de 2026'), '#1 pt: a data por extenso intacta');
eq(true, str_contains(masthead_do_html($ed2_en), 'June 4, 2026'), '#2 en: a data por extenso intacta');
eq(true, str_contains(masthead_do_html($ed1_pt), 'rev.'), '#1 pt: o rev. condicional (rev.3) continua aparecendo');
eq(false, str_contains(masthead_do_html($ed2_pt), 'rev.'), '#2 pt: rev.1 continua FORA (o condicional nao foi quebrado)');
eq(true, str_contains(masthead_do_html($ed1_pt), 'class="imprint aceso"'), '#1 pt: a LCD do switch de idioma continua la');

// ── a #3 PUBLICADA: a linha sai no DADO REAL, sem injecao nenhuma ───────────
// Enquanto a #3 era rascunho, a unica prova da fiacao era injetar o campo na #1
// (o bloco logo abaixo, que continua valendo como diff byte a byte). Com a #3
// no ar, o caminho de producao passou a ser exercitado com o dado de verdade.
$m3_pt = masthead_do_html(render_ed('edicao-3', 'pt'));
$m3_en = masthead_do_html(render_ed('edition-3', 'en'));
eq(true, str_contains($m3_pt, 'meta-uptime'), '#3 pt: a edicao publicada COM o campo imprime a linha');
eq(true, str_contains($m3_pt, 'jogo 1456h (60d) · glintfx 326h (13d)'), '#3 pt: os numeros congelados do dado real saem formatados');
eq(true, str_contains($m3_en, 'game 1456h (60d) · glintfx 326h (13d)'), '#3 en: a linha sai traduzida na pagina inglesa');
eq(false, str_contains($m3_en, 'jogo 1456h'), '#3 en: o rotulo pt NAO vaza para a pagina inglesa');

// ── A MESMA edicao COM o campo: a unica diferenca e a linha nova ────────────
// Injeta o campo na #1 em memoria (nao toca no dado real): o baseline e o
// render acima, entao qualquer outra mudanca no masthead apareceria no diff.
$com_campo = [];
foreach ($edicoes as $e) {
    if ((int) $e['numero'] === 1) {
        $e['uptime'] = ['jogo' => 1456, 'glintfx' => 326];
    }
    $com_campo[] = $e;
}

$ed1_pt_com = render_ed('edicao-1', 'pt', $com_campo);
$ed1_en_com = render_ed('edition-1', 'en', $com_campo);

$m_pt     = masthead_do_html($ed1_pt);
$m_pt_com = masthead_do_html($ed1_pt_com);
$m_en     = masthead_do_html($ed1_en);
$m_en_com = masthead_do_html($ed1_en_com);

eq(true, str_contains($m_pt_com, 'jogo 1456h (60d) · glintfx 326h (13d)'), 'pt: a linha sai no masthead com os numeros do dado');
eq(true, str_contains($m_en_com, 'game 1456h (60d) · glintfx 326h (13d)'), 'en: a linha sai traduzida (game)');
eq(false, str_contains($m_en_com, 'jogo 1456h'), 'en: o rotulo pt NAO vaza para a pagina inglesa');

// a linha mora no expediente, logo depois do gusworld.site
eq(
    true,
    str_contains($m_pt_com, 'gusworld.site<br><span class="meta-uptime">'),
    'pt: a linha e a 3a do bloco de expediente (logo apos gusworld.site)'
);

// rotulo so-leitor-de-tela (senao o leitor anuncia um numero sem sentido)
eq(true, str_contains($m_pt_com, '<span class="sr">tempo de sessão de trabalho aberta: </span>'), 'pt: rotulo sr antes dos numeros');
eq(true, str_contains($m_en_com, '<span class="sr">open work session time: </span>'), 'en: rotulo sr traduzido');

// ── O DIFF: tirando a linha nova, o masthead e IDENTICO ao de antes ─────────
// tira EXATAMENTE a linha nova (o span externo + o span sr aninhado dentro):
// um `.*?` pararia no </span> do sr e deixaria metade da linha para tras.
$sem_a_linha = static fn (string $m): string => (string) preg_replace(
    '~<br><span class="meta-uptime"><span class="sr">[^<]*</span>[^<]*</span>~',
    '',
    $m
);
eq($m_pt, $sem_a_linha($m_pt_com), 'pt: removida a linha nova, o masthead e byte a byte o de antes');
eq($m_en, $sem_a_linha($m_en_com), 'en: removida a linha nova, o masthead e byte a byte o de antes');

// ── a pagina inteira tambem so muda ali ────────────────────────────────────
eq(
    $ed1_pt,
    $sem_a_linha($ed1_pt_com),
    'pt: a PAGINA inteira so difere pela linha nova (nada mais foi tocado)'
);

// ── a BANCA (home) nao ganha uptime nenhum: o modo banca nao tem expediente ──
require_once __DIR__ . '/../src/lib/render-banca.php';
ob_start();
render_banca('pt', $com_campo);
$banca = (string) ob_get_clean();
eq(false, str_contains($banca, 'meta-uptime'), 'a banca nao imprime uptime (modo banca nao tem expediente)');
eq(false, str_contains($banca, '1456h'), 'nenhum numero de uptime vaza para a home');

// ── dado torto na edicao publicada: a pagina nao quebra nem imprime lixo ────
$torto = [];
foreach ($edicoes as $e) {
    if ((int) $e['numero'] === 1) {
        $e['uptime'] = ['jogo' => 'ontem', 'glintfx' => -3];
    }
    $torto[] = $e;
}
$ed1_torto = masthead_do_html(render_ed('edicao-1', 'pt', $torto));
eq(false, str_contains($ed1_torto, 'meta-uptime'), 'uptime todo torto → nenhuma linha (nao imprime lixo)');
eq($m_pt, $ed1_torto, 'uptime torto → masthead identico ao sem campo');

// ── a linha nao pode ter em-dash (regra da casa) nem HTML cru ──────────────
eq(false, str_contains($m_pt_com, '—'), 'nenhum em-dash na linha nova');
eq(false, str_contains($m_pt_com, '–'), 'nenhum en-dash na linha nova');

// ── o CSS que a linha usa existe (classe sem regra = estilo por acidente) ───
$css = (string) file_get_contents(__DIR__ . '/../public_html/assets/css/edicao.css');
eq(true, str_contains($css, '.meta-uptime{'), 'a regra .meta-uptime existe no edicao.css');
eq(true, str_contains($css, '.sr{'), 'a classe .sr (so-leitor-de-tela) existe no edicao.css');

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} assercoes FALHARAM\n");
    exit(1);
}
echo "ALL GREEN ({$n} assercoes)\n";
