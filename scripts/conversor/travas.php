<?php

declare(strict_types=1);

/** Limite de caracteres (sem a marca) acima do qual o pensamento pede a marca longa. */
const TRAVAS_LIMITE_PENSA_COMUM = 72;
const TRAVAS_TRAVESSAO = '/\x{2014}|\x{2013}|&mdash;|&ndash;|&#0*821[12];|&#x0*201[34];/iu';

/**
 * Travas de copy: aponta violacao das regras mecanicas nos nos do parser.
 *   R1 fala nao termina em ponto final (reticencias "..." sao permitidas)
 *   R2 pensamento nao termina em ponto final (idem)
 *   R3 zero travessao (glifo ou entidade) em qualquer texto publicavel
 *   R4 a marca decide a classe: sem a marca, ate 72 caracteres pede "//", mais que isso pede o longo
 * So le os nos recebidos (o recorte publicavel); nota interna nunca chega aqui.
 * A trava NUNCA corrige: so aponta.
 *
 * @param list<array<string,mixed>> $nos
 * @return list<string> "arquivo:linha: regra: trecho"
 */
function travas_verificar(array $nos, string $arquivo): array
{
    $achados = [];
    $aponta = static function (int $linha, string $regra, string $texto) use (&$achados, $arquivo): void {
        $achados[] = "{$arquivo}:{$linha}: {$regra}: " . travas_trecho($texto);
    };
    foreach ($nos as $no) {
        switch ($no['tipo']) {
            case 'paragrafo':
            case 'titulo':
                travas_travessao($no['texto'], $no['linha'], $aponta);
                break;
            case 'lista':
                foreach ($no['itens'] as $item) {
                    travas_travessao($item, $no['linha'], $aponta);
                }
                break;
            case 'voz':
            case 'pensa_bloco':
                foreach ($no['itens'] as $item) {
                    travas_item_de_voz($item, $aponta);
                }
                break;
        }
    }
    return $achados;
}

function travas_item_de_voz(array $item, callable $aponta): void
{
    $linha = $item['linha'];
    $texto = $item['texto'];
    if ($item['tipo'] === 'fala' && travas_termina_em_ponto($texto)) {
        $aponta($linha, 'R1', $texto);
    }
    if ($item['tipo'] === 'pensa' && travas_termina_em_ponto($texto)) {
        $aponta($linha, 'R2', $texto);
    }
    travas_travessao($texto, $linha, $aponta);
    if ($item['tipo'] === 'pensa') {
        $comprido = mb_strlen($texto) > TRAVAS_LIMITE_PENSA_COMUM;
        if ($comprido !== $item['longo']) {
            $aponta($linha, 'R4', $texto);
        }
    }
}

function travas_travessao(string $texto, int $linha, callable $aponta): void
{
    if (!mb_check_encoding($texto, 'UTF-8')) {
        throw new ConversorErro('texto com UTF-8 invalido (a trava R3 nao consegue ler): ' . bin2hex(substr($texto, 0, 24)), $linha);
    }
    if (preg_match(TRAVAS_TRAVESSAO, $texto) === 1) {
        $aponta($linha, 'R3', $texto);
    }
}

/** Ponto final isolado: termina em "." mas nao em ".." (reticencias). */
function travas_termina_em_ponto(string $texto): bool
{
    return preg_match('/(?<!\.)\.$/', rtrim($texto)) === 1;
}

function travas_trecho(string $texto): string
{
    return mb_strlen($texto) <= 70 ? $texto : '...' . mb_substr($texto, -70);
}
