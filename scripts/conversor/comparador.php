<?php

declare(strict_types=1);

/** Quantos caracteres de cada lado o relatorio mostra a partir da divergencia. */
const COMPARADOR_TRECHO = 40;

/**
 * Normalizacao fixa e unica (nada alem disto e ignorado):
 *   N1  remove todo bloco PHP que contem SO um comentario (inicio ou meio do texto),
 *       mais a quebra de linha que o segue
 *   N2  ignora uma unica quebra de linha final
 * Recuo, linha em branco, espaco, ordem de classe: tudo conta.
 */
function comparador_normalizar(string $texto): string
{
    $texto = preg_replace('/<\?php\s*\/\*(?:(?!\*\/).)*\*\/\s*\?>\n?/s', '', $texto) ?? $texto;
    return str_ends_with($texto, "\n") ? substr($texto, 0, -1) : $texto;
}

/**
 * Compara dois textos depois da normalizacao.
 * Linha e coluna (1-based, em caracteres) valem para o texto NORMALIZADO.
 *
 * @return array{igual:bool,linha:?int,coluna:?int,trecho_esperado:?string,trecho_obtido:?string}
 */
function comparador_comparar(string $esperado, string $obtido): array
{
    $a = comparador_normalizar($esperado);
    $b = comparador_normalizar($obtido);
    if ($a === $b) {
        return ['igual' => true, 'linha' => null, 'coluna' => null, 'trecho_esperado' => null, 'trecho_obtido' => null];
    }
    $ca = preg_split('//u', $a, -1, PREG_SPLIT_NO_EMPTY) ?: [];
    $cb = preg_split('//u', $b, -1, PREG_SPLIT_NO_EMPTY) ?: [];
    $limite = min(count($ca), count($cb));
    $i = 0;
    while ($i < $limite && $ca[$i] === $cb[$i]) {
        $i++;
    }
    $linha = 1;
    $coluna = 1;
    for ($k = 0; $k < $i; $k++) {
        if ($ca[$k] === "\n") {
            $linha++;
            $coluna = 1;
        } else {
            $coluna++;
        }
    }
    return [
        'igual' => false,
        'linha' => $linha,
        'coluna' => $coluna,
        'trecho_esperado' => comparador_trecho($ca, $i),
        'trecho_obtido' => comparador_trecho($cb, $i),
    ];
}

/** @param list<string> $caracteres */
function comparador_trecho(array $caracteres, int $inicio): string
{
    if ($inicio >= count($caracteres)) {
        return '<fim>';
    }
    $trecho = implode('', array_slice($caracteres, $inicio, COMPARADOR_TRECHO));
    return str_replace("\n", '\n', $trecho);
}
