<?php

declare(strict_types=1);

/**
 * src/lib/contexto-edicao.php — resolve uma edição publicada para renderização.
 *
 * Recebe o array $edicoes, o idioma e o slug pedido; devolve o CONTEXTO já
 * montado (campos no idioma, par gêmeo, hreflang, URLs) ou `null` se o slug não
 * casa com nenhuma edição PUBLICADA (rascunho ou inexistente → 404).
 *
 * ★ A regra anti-spoiler mora nos helpers: aqui só se percorre o resultado de
 * `edicoes_publicadas()`. Rascunho nunca entra — não se refaz o array_filter à
 * mão (docs/schema-edicoes.md, invariante 1).
 *
 * Função pura (CONTRACT §5/§14): sem I/O, sem DOM, sem estado global; recebe
 * dados, devolve dados — testável em isolamento.
 */

/**
 * @param array<int, array<string, mixed>> $edicoes  o $edicoes cru
 * @param string $idioma  'pt' | 'en'
 * @param string $slug    o slug pedido (já validado no formato pelo chamador)
 * @return array<string, mixed>|null  contexto de render, ou null (→ 404)
 */
function contexto_edicao(array $edicoes, string $idioma, string $slug): ?array
{
    if (!in_array($idioma, SITE_IDIOMAS, true)) {
        return null;
    }

    $campo_slug = 'slug_' . $idioma; // slug_pt | slug_en

    foreach (edicoes_publicadas($edicoes) as $e) {
        if (($e[$campo_slug] ?? null) !== $slug) {
            continue;
        }
        return montar_contexto($e, $idioma);
    }

    return null;
}

/**
 * Monta o contexto de render de UMA edição já encontrada e publicada.
 *
 * @param array<string, mixed> $e
 * @return array<string, mixed>
 */
function montar_contexto(array $e, string $idioma): array
{
    $outro    = $idioma === 'pt' ? 'en' : 'pt';
    $slug_pt  = (string) $e['slug_pt'];
    $slug_en  = (string) $e['slug_en'];
    $slug_ele = $idioma === 'pt' ? $slug_pt : $slug_en;
    $slug_par = $idioma === 'pt' ? $slug_en : $slug_pt;

    return [
        'numero'        => (int) $e['numero'],
        'idioma'        => $idioma,
        'data'          => (string) $e['data'],

        // Versionamento Vol.Ed.Rev + data (esquema completo do líder):
        //   volume  → derivado da data (2026 = Vol.1); revisao → campo do array;
        //   build_data → a data em carimbo AAAA.MM.DD (build-tag do rodapé expert).
        'volume'        => volume_edicao((string) $e['data']),
        'revisao'       => (int) ($e['revisao'] ?? 1),
        'build_data'    => build_data((string) $e['data']),
        'titulo'        => (string) $e['titulo_' . $idioma],
        'dek'           => (string) $e['dek_' . $idioma],
        'frame'         => $e['frame'] !== null ? (string) $e['frame'] : null,
        'frame_alt'     => $e['frame_alt_' . $idioma] !== null ? (string) $e['frame_alt_' . $idioma] : null,

        // Card social por edição (opcional, data-driven): quando a edição tem o
        // seu próprio card 1200x630, o caminho vem do $edicoes e o head o usa; sem
        // campo, fica `null` e o head cai no default (/assets/og-launch.jpg). Nada
        // de `if numero == N` no template: mais uma edição = mais uma linha de dado.
        'og_image'      => isset($e['og_image']) && $e['og_image'] !== null
                            ? (string) $e['og_image']
                            : null,

        // Uptime das sessões de trabalho (opcional, #3 em diante): mapa
        // projeto => horas, CAPTURADO no publish (a produção não vê a máquina do
        // líder; ver uptime_expediente() em src/lib/view.php). Sem o campo fica
        // `null` e o masthead não imprime a linha: as edições antigas seguem
        // idênticas. Mesmo padrão data-driven do og_image (zero `if` de número).
        'uptime'        => isset($e['uptime']) && is_array($e['uptime']) && $e['uptime'] !== []
                            ? $e['uptime']
                            : null,

        // navegação e i18n de URL (IA-WIREFRAME §2.3)
        'url_self'      => url_edicao($idioma, $slug_ele),
        'url_par'       => url_edicao($outro, $slug_par),   // destino da LCD (par gêmeo)
        'idioma_par'    => $outro,
        'url_banca'     => url_banca($idioma),              // destino do wordmark

        // hreflang recíproco + x-default sempre no /pt/ (IA-WIREFRAME §2.3)
        'hreflang'      => [
            'pt-br'     => url_edicao('pt', $slug_pt),
            'en'        => url_edicao('en', $slug_en),
            'x-default' => url_edicao(SITE_IDIOMA_PADRAO, $idioma === 'pt' ? $slug_pt : ($outro === 'pt' ? $slug_par : $slug_pt)),
        ],
    ];
}

/**
 * Idade da folha para o envelhecimento do papel (tokens.css: --idade 0..1).
 * 0 = a mais nova da banca; ~0.88 = a #1 (a mais velha), espelhando o valor que
 * o design calibrou nos mocks 12/13. Linear pela data entre as publicadas.
 *
 * @param array<int, array<string, mixed>> $edicoes
 */
function idade_folha(array $edicoes, string $data): float
{
    $datas = array_map(
        static fn (array $e): string => (string) $e['data'],
        edicoes_publicadas($edicoes)
    );
    if ($datas === []) {
        return 0.0;
    }

    $nova  = strtotime((string) max($datas));
    $velha = strtotime((string) min($datas));
    $esta  = strtotime($data);
    if ($nova === false || $velha === false || $esta === false || $nova === $velha) {
        return 0.0;
    }

    $t = ($nova - $esta) / ($nova - $velha); // 0 (nova) .. 1 (mais velha)
    return round($t * 0.88, 3);              // teto 0.88 = o valor de design da #1
}
