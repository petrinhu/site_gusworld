<?php

declare(strict_types=1);

/**
 * data/edicoes-helpers.php — filtros PUROS sobre `$edicoes`.
 *
 * Ponto ÚNICO de enforcement das invariantes de exibição. Todos os 4
 * consumidores (banca, linha do tempo, sitemap, RSS) chamam estas funções em
 * vez de refazer o `array_filter` à mão — assim a regra "nunca mostrar
 * rascunho" mora num lugar só e não pode ser esquecida em um consumidor
 * (o esquecimento seria um vazamento de spoiler, irreversível).
 *
 * Funções puras (CONTRACT §5): sem I/O, sem estado global, sem DOM. Recebem o
 * array, devolvem um array novo — testáveis em isolamento.
 *
 * Uso:
 *   $edicoes    = require __DIR__ . '/edicoes.php';
 *   $publicadas = edicoes_publicadas($edicoes);          // banca, sitemap, RSS
 *   $scrubber   = edicoes_na_linha_tempo($edicoes);      // linha do tempo
 */

const EDICAO_ESTADO_PUBLICADA = 'publicada';
const EDICAO_ESTADO_RASCUNHO  = 'rascunho';

// Ano-base do versionamento: a 1ª safra (2026) é o Volume 1. Vol = ano - 2025.
const EDICAO_VOLUME_ANO_BASE = 2025;

/**
 * Volume da edição = ano da `data`-âncora, com base 2026 = Vol.1
 * (2026→1, 2027→2, …). O volume NÃO é campo novo: deriva da data.
 *
 * Puro e determinístico: lê o ano dos 4 primeiros dígitos do ISO 8601, sem
 * strtotime/timezone. Data em branco/curta → ano 0 → Volume negativo/estranho,
 * mas o dado é sempre um ISO válido controlado por `data/edicoes.php`.
 */
function volume_edicao(string $data): int
{
    return (int) substr($data, 0, 4) - EDICAO_VOLUME_ANO_BASE;
}

/**
 * A data no formato de carimbo de BUILD `AAAA.MM.DD` (pontos no lugar dos
 * traços do ISO). Ex.: '2026-05-15' → '2026.05.15'. É a data-âncora real,
 * só reformatada — neutra de idioma (string de build, expert/rodapé).
 */
function build_data(string $data): string
{
    return str_replace('-', '.', $data);
}

/**
 * Quantas COLUNAS a prateleira da banca abre para N capas publicadas (desktop).
 *
 * O desenho da estante é UM só: as capas enfileiradas lado a lado, todas com o
 * mesmo tratamento, cada uma amarelando pela própria idade (a mais nova ganha
 * só o selo "nova"). Com 1 edição publicada é 1 coluna, e a capa ocupa a
 * fileira inteira.
 *
 * A escolha do número de colunas evita o BURACO no fim da fileira: prefere um
 * número que feche as fileiras cheias (2 capas → 2 colunas; 4 → 2 colunas em 2
 * fileiras; 3, 6, 9 → 3 colunas). De 7 capas em diante o arquivo já é grande e
 * a leitura pede sempre 3 colunas: a última fileira pode vir incompleta, e o
 * espaço vazio na ponta da estante lê como estante, não como erro.
 *
 * Pura e determinística: só depende da contagem (testável em isolamento).
 */
function prateleira_colunas(int $publicadas): int
{
    if ($publicadas <= 1) {
        return 1;
    }
    if ($publicadas <= 3) {
        return $publicadas;
    }
    if ($publicadas >= 7) {
        return 3;
    }
    if ($publicadas % 3 === 0) {
        return 3;
    }

    return $publicadas % 2 === 0 ? 2 : 3;
}

/**
 * Só as edições publicadas, ordenadas cronologicamente (mais nova primeiro).
 *
 * É o filtro que TODO consumidor de conteúdo público deve aplicar: banca,
 * sitemap e os 2 RSS. Rascunho JAMAIS passa por aqui.
 *
 * @param array<int, array<string, mixed>> $edicoes
 * @return array<int, array<string, mixed>>
 */
function edicoes_publicadas(array $edicoes): array
{
    $publicadas = array_filter(
        $edicoes,
        static fn (array $e): bool => ($e['estado'] ?? '') === EDICAO_ESTADO_PUBLICADA
    );

    return edicoes_ordena_desc($publicadas);
}

/**
 * Só as edições que entram no scrubber da linha do tempo: publicadas E da era
 * VISUAL (`na_linha_tempo` verdadeiro). A gênese textual (#1) e o 3D abandonado
 * (#2) ficam fora — o scrubber cobre da #3 (o quadrado) em diante.
 *
 * Ordenadas cronologicamente ASCENDENTE (mais antiga primeiro), que é como a
 * linha do tempo é lida da esquerda para a direita.
 *
 * @param array<int, array<string, mixed>> $edicoes
 * @return array<int, array<string, mixed>>
 */
function edicoes_na_linha_tempo(array $edicoes): array
{
    $visuais = array_filter(
        edicoes_publicadas($edicoes),
        static fn (array $e): bool => ($e['na_linha_tempo'] ?? false) === true
    );

    return array_reverse(array_values($visuais));
}

/**
 * A data mais recente entre as edições publicadas (para `<lastmod>` global do
 * sitemap e `<lastBuildDate>` do RSS). Devolve string ISO 8601 ou null se
 * não houver nenhuma publicada.
 *
 * @param array<int, array<string, mixed>> $edicoes
 */
function edicoes_ultima_atualizacao(array $edicoes): ?string
{
    $datas = array_map(
        static fn (array $e): string => (string) ($e['atualizada_em'] ?? $e['data'] ?? ''),
        edicoes_publicadas($edicoes)
    );
    $datas = array_filter($datas, static fn (string $d): bool => $d !== '');

    if ($datas === []) {
        return null;
    }

    rsort($datas); // ISO 8601 ordena lexicograficamente = cronologicamente

    return $datas[0];
}

/**
 * Ordena edições por `data` decrescente (mais nova primeiro) e reindexa.
 * Interno; empate de data resolvido por `numero` decrescente (estável).
 *
 * @param array<int, array<string, mixed>> $edicoes
 * @return array<int, array<string, mixed>>
 */
function edicoes_ordena_desc(array $edicoes): array
{
    $lista = array_values($edicoes);

    usort($lista, static function (array $a, array $b): int {
        $cmp = strcmp((string) ($b['data'] ?? ''), (string) ($a['data'] ?? ''));

        return $cmp !== 0 ? $cmp : ((int) ($b['numero'] ?? 0) <=> (int) ($a['numero'] ?? 0));
    });

    return $lista;
}
