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
