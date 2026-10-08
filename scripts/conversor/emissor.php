<?php

declare(strict_types=1);

require_once __DIR__ . '/erro.php';

/**
 * Emissor: escreve o HTML de uma lista de nos do parser.
 *
 * opcoes: 'recuo' (int, espacos antes de cada linha nao vazia; padrao 0) e
 *         'classe_lista' (string, classe do <ul>; padrao sem classe).
 * Escape so de & < > (aspas e acentos ficam literais). Crases viram <code> em
 * paragrafo, titulo e item de lista; crase sem par e erro. Nos separados por
 * UMA linha em branco; itens de um grupo de voz em linhas seguidas; sem quebra
 * final (quem compoe o arquivo decide).
 *
 * @param list<array<string,mixed>> $nos
 * @param array{recuo?:int,classe_lista?:?string} $opcoes
 * @throws ConversorErro no que o emissor nao emite (numero) ou nao conhece
 */
function emissor_html(array $nos, array $opcoes = []): string
{
    $recuo = $opcoes['recuo'] ?? 0;
    $classeLista = $opcoes['classe_lista'] ?? null;
    $blocos = [];
    foreach ($nos as $no) {
        $blocos[] = emissor_no($no, $classeLista);
    }
    $html = implode("\n\n", $blocos);
    if ($recuo === 0 || $html === '') {
        return $html;
    }
    $prefixo = str_repeat(' ', $recuo);
    return implode("\n", array_map(static fn(string $l): string => $l === '' ? '' : $prefixo . $l, explode("\n", $html)));
}

function emissor_no(array $no, ?string $classeLista): string
{
    $linha = (int) ($no['linha'] ?? 0);
    switch ($no['tipo']) {
        case 'paragrafo':
            return '<p>' . emissor_inline($no['texto'], $linha) . '</p>';
        case 'titulo':
            return '<h3>' . emissor_inline($no['texto'], $linha) . '</h3>';
        case 'lista':
            $abre = $classeLista === null ? '<ul>' : '<ul class="' . htmlspecialchars($classeLista, ENT_QUOTES, 'UTF-8') . '">';
            $itens = array_map(static fn(string $i): string => '  <li>' . emissor_inline($i, $linha) . '</li>', $no['itens']);
            return $abre . "\n" . implode("\n", $itens) . "\n</ul>";
        case 'voz':
            return implode("\n", array_map('emissor_item_de_voz', $no['itens']));
        case 'pensa_bloco':
            $itens = array_map(static fn(array $i): string => '  ' . emissor_item_de_voz($i), $no['itens']);
            return "<div class=\"pensa-bloco\">\n" . implode("\n", $itens) . "\n</div>";
        case 'numero':
            throw new ConversorErro('numero separador nao e emitivel (a montagem o consome)', $linha);
        default:
            throw new ConversorErro("no desconhecido: \"{$no['tipo']}\"", $linha);
    }
}

function emissor_item_de_voz(array $item): string
{
    $texto = emissor_escape($item['texto']);
    if ($item['tipo'] === 'fala') {
        return '<p class="fala"><span class="prompt">' . emissor_escape($item['persona'] . '@glyfesse:' . $item['caminho'] . '$')
            . '</span> <span class="dito">' . $texto . '</span></p>';
    }
    if ($item['tipo'] === 'assinatura') {
        return '<p class="pensa assinatura">' . $texto . '</p>';
    }
    if ($item['tipo'] === 'pensa') {
        $classes = 'pensa';
        if ($item['persona'] !== null && $item['persona'] !== 'gus') {
            $classes .= ' ' . $item['persona'];
        }
        if ($item['longo']) {
            $classes .= ' longo';
        }
        return '<p class="' . $classes . '">' . $texto . '</p>';
    }
    throw new ConversorErro("item de voz desconhecido: \"{$item['tipo']}\"", (int) ($item['linha'] ?? 0));
}

function emissor_escape(string $texto): string
{
    return htmlspecialchars($texto, ENT_NOQUOTES | ENT_HTML5, 'UTF-8');
}

/** Escape + `codigo` -> <code>codigo</code>. */
function emissor_inline(string $texto, int $linha): string
{
    $partes = explode('`', $texto);
    if (count($partes) % 2 === 0) {
        throw new ConversorErro("crase sem par em: \"{$texto}\"", $linha);
    }
    $html = '';
    foreach ($partes as $k => $parte) {
        $html .= $k % 2 === 1 ? '<code>' . emissor_escape($parte) . '</code>' : emissor_escape($parte);
    }
    return $html;
}
