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
 * O card social (og:image) que a BANCA serve, dado o parâmetro `?ed=N` da URL.
 *
 * POR QUE o parâmetro existe: o X (e todo scraper de link) guarda UM card POR
 * ENDEREÇO, e reescreve o preview dos posts JÁ PUBLICADOS quando o card daquele
 * endereço muda. Como todo post de lançamento linka a banca, sem `?ed=` os posts
 * antigos passariam a exibir o card da edição mais nova, e o histórico inteiro do
 * canal se reescreveria a cada edição nova. Dando a cada post um endereço próprio
 * (`/pt/?ed=2`, `/pt/?ed=3`, …), o card daquele post congela na edição DELE, e o
 * leitor continua caindo na banca: a página renderizada é a mesma, o parâmetro só
 * decide as meta tags.
 *
 * A regra é a ESTABILIDADE do permalink:
 *   - `ed` presente e resolvível  -> o card daquela edição (congelado pra sempre);
 *   - `ed` presente e NÃO resolvível (número inexistente, rascunho, edição sem
 *     card próprio, lixo de bot) -> null, ou seja, o default FIXO do head.php.
 *     Nunca o card da mais nova: cair na mais nova reintroduziria exatamente o
 *     preview-que-muda-sozinho no post já publicado, que é o bug que o `?ed=`
 *     existe para matar;
 *   - sem `ed` (o link nu gusworld.site) -> o card da mais nova, o comportamento
 *     atual da vitrine viva: quem chega pela porta da frente vê o que acabou de
 *     sair (e se a mais nova não tiver card próprio, cai no default do head.php).
 *
 * SEGURANÇA: o valor cru da URL só serve para CASAR com o `numero` de uma capa;
 * o caminho do card sai SEMPRE de `$edicoes`, nunca da query string, e o valor
 * recebido não é ecoado em lugar nenhum do HTML (sem reflexão, sem traversal).
 * Aceita só dígitos; qualquer outra coisa (inclusive o array de um `?ed[]=`)
 * não casa com nada e cai no default.
 *
 * Pura (CONTRACT §5): recebe as capas já filtradas (só PUBLICADAS, mais nova
 * primeiro) e o valor cru; devolve o caminho root-absoluto do card ou null.
 *
 * @param array<int, array<string, mixed>> $capas
 * @param mixed $ed_bruto  o valor cru de $_GET['ed'] (nunca confiável)
 */
function og_card_banca(array $capas, mixed $ed_bruto = null): ?string
{
    // A PRESENÇA do parâmetro já muda o regime: com `ed`, a URL é um permalink
    // de post e o card tem que ser estável no tempo, resolva ou não.
    if ($ed_bruto !== null) {
        $pedida = (is_string($ed_bruto) && $ed_bruto !== '' && ctype_digit($ed_bruto))
            ? (int) $ed_bruto
            : null;

        if ($pedida === null) {
            return null;
        }

        foreach ($capas as $c) {
            if ((int) ($c['numero'] ?? 0) === $pedida) {
                $card = (string) ($c['og_image'] ?? '');

                return $card !== '' ? $card : null;
            }
        }

        // número que não casa com nenhuma capa PUBLICADA (inexistente ou
        // rascunho): o rascunho nem chega aqui, o filtro anti-spoiler já o
        // tirou de $capas, logo o `?ed=` também não vaza o drip.
        return null;
    }

    $card = (string) ($capas[0]['og_image'] ?? '');

    return $card !== '' ? $card : null;
}

/**
 * Ponto de entrada dos front controllers da home. Recebe o idioma da pasta.
 *
 * O 2º parâmetro é um SEAM DE TESTE e só isso: em produção ninguém passa nada,
 * e o dado sai de `data/edicoes.php` como sempre. Ele existe porque estados que
 * dependem do dado (a linha do tempo com pontos × o vazio-com-graça) não têm
 * como ser exercitados sem publicar uma edição de verdade, e publicar de
 * verdade num teste seria o pior jeito possível de descobrir uma regressão.
 *
 * @param array<int, array<string, mixed>>|null $edicoes  null = o dado real
 */
function render_banca(string $idioma, ?array $edicoes = null): void
{
    if (!in_array($idioma, SITE_IDIOMAS, true)) {
        $idioma = SITE_IDIOMA_PADRAO;
    }
    $outro = $idioma === 'pt' ? 'en' : 'pt';

    $edicoes ??= require __DIR__ . '/../../data/edicoes.php';
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
            // card social próprio da edição (opcional). É daqui, e só daqui, que
            // og_card_banca() tira o card servido pela home: o da mais nova no
            // link nu, ou o da edição pedida no `?ed=N` do post. O `numero` ao
            // lado é a chave desse casamento. ⚠️ SEMPRE o de PORTUGUÊS, inclusive
            // no /en/: card social já publicado é irreversível (o X reescreve o
            // preview dos posts antigos). Quem varia por idioma é a `capa`.
            'og_image'  => isset($e['og_image']) ? (string) $e['og_image'] : null,
            // a ARTE DE CAPA da estante, esta sim NO IDIOMA da página (ordem do
            // líder, 2026-07-25). Cai no card português quando a edição não tem
            // variante no idioma; null = a capa não ganha arte. Regra pura e
            // testada em capa_estante().
            'capa'      => capa_estante($e, $idioma),
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
