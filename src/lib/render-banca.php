<?php

declare(strict_types=1);

/**
 * src/lib/render-banca.php — a cola dos front controllers /pt/ e /en/ (a BANCA).
 *
 * A banca é a home: o segundo consumidor de `$edicoes` (o primeiro é a edição).
 * Percorre APENAS `edicoes_publicadas()` — o guard anti-rascunho mora nos
 * helpers, nunca se refaz o filtro aqui (um esquecimento vazaria o drip). Cada
 * capa reusa `idade_folha()` — a MESMA idade da folha da edição, então a
 * amarelação bate entre a home e a página de dentro.
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/view.php';
require_once __DIR__ . '/../../data/edicoes-helpers.php';
require_once __DIR__ . '/contexto-edicao.php'; // idade_folha()
require_once __DIR__ . '/cupom.php';           // cupom_votou_cookie() + resultado (%)

/**
 * Ponto de entrada dos front controllers da home. Recebe o idioma da pasta.
 */
function render_banca(string $idioma): void
{
    if (!in_array($idioma, SITE_IDIOMAS, true)) {
        $idioma = SITE_IDIOMA_PADRAO;
    }
    $outro = $idioma === 'pt' ? 'en' : 'pt';

    $edicoes = require __DIR__ . '/../../data/edicoes.php';
    $t = require __DIR__ . '/../i18n/' . $idioma . '.php';

    // As capas: só as publicadas (mais nova primeiro), já com idade e URL.
    $capas = [];
    foreach (edicoes_publicadas($edicoes) as $e) {
        $slug = (string) $e['slug_' . $idioma];
        $capas[] = [
            'numero'    => (int) $e['numero'],
            'titulo'    => (string) $e['titulo_' . $idioma],
            'dek'       => (string) $e['dek_' . $idioma],
            'data'      => (string) $e['data'],
            'url'       => url_edicao($idioma, $slug),
            'frame'     => $e['frame'] !== null ? (string) $e['frame'] : null,
            'frame_alt' => $e['frame_alt_' . $idioma] !== null ? (string) $e['frame_alt_' . $idioma] : null,
            'idade'     => idade_folha($edicoes, (string) $e['data']),
            'visual'    => ($e['na_linha_tempo'] ?? false) === true,
        ];
    }

    // A LINHA DO TEMPO (scrubber W6): só a era VISUAL publicada, em ordem
    // cronológica ASCENDENTE (é como a linha se lê da esquerda p/ direita). O
    // guard anti-rascunho + o recorte da era visual moram em edicoes_na_linha_tempo()
    // — nunca se refaz o filtro aqui. Hoje = 1 ponto (a #3, o quadrado azul).
    // Uma edição visual publicada sem frame não vira ponto (sem frame não há
    // crossfade); ela continua aparecendo na banca, só fica fora do scrubber.
    $linha_tempo = [];
    foreach (edicoes_na_linha_tempo($edicoes) as $e) {
        if ($e['frame'] === null) {
            continue;
        }
        $iso = (string) $e['data'];
        $ts  = strtotime($iso);
        $mes = $ts !== false ? mb_substr((string) ($t['meses'][(int) date('n', $ts)] ?? ''), 0, 3) : '';
        $dia = $ts !== false ? (int) date('j', $ts) : 0;
        // rótulo curto da marca (pixel <15px, minúsculo): "22 jun" / "jun 22".
        $rotulo = $ts === false ? $iso : ($idioma === 'pt' ? "{$dia} {$mes}" : "{$mes} {$dia}");
        $linha_tempo[] = [
            'numero'    => (int) $e['numero'],
            'titulo'    => (string) $e['titulo_' . $idioma],
            'dek'       => (string) $e['dek_' . $idioma],
            'data'      => $iso,
            'data_ext'  => data_por_extenso($iso, $idioma, $t),
            'rotulo'    => $rotulo,
            'frame'     => (string) $e['frame'],
            'frame_alt' => $e['frame_alt_' . $idioma] !== null ? (string) $e['frame_alt_' . $idioma] : '',
        ];
    }

    // Contexto do chrome (masthead/head): a banca não tem número de edição.
    $ctx = [
        'modo'       => 'banca',
        'idioma'     => $idioma,
        'idioma_par' => $outro,
        'url_banca'  => url_banca($idioma),   // logo → a própria home
        'url_par'    => url_banca($outro),    // LCD → a home gêmea
        'hreflang'   => [
            'pt-br'     => url_banca('pt'),
            'en'        => url_banca('en'),
            'x-default' => url_banca(SITE_IDIOMA_PADRAO),
        ],
    ];

    // ── O CUPOM: estado votado server-side (Decisao do lider 2026-07-19) ────────
    // O cookie booleano "ja votou" e o sinal canonico: se presente, a home
    // server-renderiza o RESULTADO (%) no lugar do form — funciona SEM JS.
    // ⚠️ So PERCENTUAL sai daqui (nunca a contagem crua). O $cupom_total e uso
    // INTERNO (decide "urna vazia"), nunca vai ao HTML como numero.
    $cupom_votou = cupom_votou_cookie();
    $cupom_pct   = null;
    $cupom_total = 0;
    if ($cupom_votou) {
        $tally       = cupom_ler_tally(CUPOM_STORE);
        $cupom_pct   = cupom_percentuais($tally);
        $cupom_total = cupom_total($tally);
    }

    // ⚠️ CACHE: como a home passa a VARIAR pelo cookie do cupom (form × resultado),
    // ela nao pode ser servida de um cache compartilhado/CDN sem discriminar o
    // cookie. private + no-cache mantem a corretude (o browser revalida; o CDN nao
    // guarda uma versao pro proximo visitante). Vary: Cookie documenta a variacao.
    // (Trade-off sinalizado ao lider: server-render sem-JS do voto custa o cache
    // compartilhado da home. A alternativa seria revelar o resultado so via JS.)
    if (!headers_sent()) {
        header('Cache-Control: private, no-cache, must-revalidate');
        header('Vary: Cookie');
    }

    include __DIR__ . '/../templates/banca.php';
}
