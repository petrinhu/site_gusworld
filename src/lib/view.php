<?php

declare(strict_types=1);

/**
 * src/lib/view.php — helpers de SAÍDA compartilhados por todos os renders.
 *
 * Extraídos de render-edicao.php quando a BANCA passou a ser o segundo
 * consumidor: escape de HTML e data por extenso são idênticos na edição e na
 * banca, então moram num lugar só (DRY / CONTRACT §5). Funções puras, sem I/O.
 */

/** Escapa saída para HTML (XSS — CONVENCOES-JS-PHP / OWASP A03). */
function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** A raiz de public_html — resolve o caminho físico de um asset root-absoluto. */
if (!defined('PUBLIC_HTML')) {
    define('PUBLIC_HTML', dirname(__DIR__, 2) . '/public_html');
}

/**
 * Cache-busting: devolve o caminho root-absoluto do asset com ?v=<mtime>, para
 * o navegador nunca servir um CSS/JS velho depois que o arquivo muda (e um
 * cache-bust grátis a cada deploy). $rel começa com "/" (ex.: /assets/css/
 * edicao.css). Se o arquivo não existe (fail-safe), devolve $rel sem versão —
 * um link quebrado é preferível a um fatal. Wrapper fino sobre filemtime (I/O);
 * a lógica é trivial, não há núcleo puro a testar.
 */
function asset(string $rel): string
{
    $abs = PUBLIC_HTML . $rel;
    $mtime = is_file($abs) ? filemtime($abs) : false;
    return $mtime === false ? $rel : $rel . '?v=' . $mtime;
}

/**
 * Formata a data ISO no idioma (ex.: "22 de junho de 2026" / "June 22, 2026").
 * Fail-fast: data inválida cai para a própria string ISO.
 *
 * @param array<string, mixed> $t  o mapa de i18n do idioma
 */
function data_por_extenso(string $iso, string $idioma, array $t): string
{
    $ts = strtotime($iso);
    if ($ts === false) {
        return $iso;
    }
    $dia = (int) date('j', $ts);
    $mes = $t['meses'][(int) date('n', $ts)] ?? '';
    $ano = (int) date('Y', $ts);

    return $idioma === 'pt'
        ? "{$dia} de {$mes} de {$ano}"
        : "{$mes} {$dia}, {$ano}";
}

/**
 * A linha de UPTIME do expediente: "jogo 1456h (60d) · glintfx 326h (13d)".
 *
 * ★ POR QUE O DADO É CONGELADO. "Uptime" aqui é há quanto tempo a sessão de
 * trabalho daquele projeto está aberta na máquina do líder. A produção
 * (Hostinger) NÃO enxerga essa máquina, então o número não pode ser calculado
 * em runtime: ele é CAPTURADO no momento de publicar (scripts/uptime-sessoes.sh)
 * e gravado no $edicoes. Isso é coerente com o canon: cada edição é registro
 * histórico datado, e o número fica como estava naquele dia.
 *
 * Só as HORAS são dado; os dias são derivados (floor h/24) para os dois números
 * nunca se contradizerem. Campo opcional: sem ele, devolve '' e o masthead não
 * imprime linha nenhuma (as #1 e #2 seguem exatamente como hoje).
 *
 * Fail-safe: entrada torta (valor não-numérico, negativo, chave não-string) é
 * PULADA em vez de virar linha torta no papel.
 *
 * @param array<string, mixed>|null $uptime  ['jogo' => 1464, 'glintfx' => 326]
 * @param array<string, mixed>      $t       i18n do idioma (rótulos por projeto)
 */
function uptime_expediente(?array $uptime, array $t): string
{
    if ($uptime === null || $uptime === []) {
        return '';
    }

    $rotulos = isset($t['exp_uptime']) && is_array($t['exp_uptime']) ? $t['exp_uptime'] : [];
    $partes  = [];

    foreach ($uptime as $projeto => $horas) {
        if (!is_string($projeto) || $projeto === '') {
            continue;
        }
        if (is_string($horas) && ctype_digit($horas)) {
            $horas = (int) $horas; // tolera o número vindo como string do dado
        }
        if (!is_int($horas) || $horas < 0) {
            continue;
        }

        $rotulo   = (string) ($rotulos[$projeto] ?? $projeto);
        $dias     = intdiv($horas, 24);
        $partes[] = "{$rotulo} {$horas}h ({$dias}d)";
    }

    return implode(' · ', $partes);
}
