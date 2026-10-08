<?php

declare(strict_types=1);

require_once __DIR__ . '/erro.php';
require_once __DIR__ . '/voz.php';

/**
 * Parser: agrupa as linhas de UM bloco em nos do dialeto.
 *
 * Entrada: lista de {n,t} (a saida de fonte_bloco). Saida: lista de nos, cada um
 * com 'linha' (a linha original onde comecou):
 *   paragrafo   {texto}              linhas seguidas juntadas com um espaco
 *   titulo      {texto}              "### ..."
 *   lista       {itens: list<string>}"- ..." seguidos
 *   voz         {itens: list<registro de voz + linha>}  fala/pensa/assinatura seguidas
 *   pensa_bloco {itens}              cerca so de 2 ou mais "//"
 *   numero      {numero}             linha so com numero, dentro de cerca
 * O pensamento herda a persona da ultima fala antes dele no mesmo grupo (nulo se nao ha).
 * Crases de codigo dentro do texto ficam CRUAS; quem converte e o emissor.
 * Construcao fora da lista fechada e erro com a linha original.
 *
 * @param list<array{n:int,t:string}> $linhas
 * @return list<array<string,mixed>>
 * @throws ConversorErro
 */
function parser_nos(array $linhas): array
{
    $nos = [];
    $total = count($linhas);
    $i = 0;
    while ($i < $total) {
        $n = $linhas[$i]['n'];
        $t = $linhas[$i]['t'];
        if ($t === '') {
            $i++;
            continue;
        }
        parser_recusar_html($t, $n);
        if ($t === '```') {
            array_push($nos, ...parser_cerca($linhas, $i));
        } elseif (str_starts_with($t, '### ')) {
            $nos[] = ['tipo' => 'titulo', 'texto' => trim(substr($t, 4)), 'linha' => $n];
            $i++;
        } elseif ($t[0] === '#' || str_starts_with($t, '> ')) {
            throw new ConversorErro("construcao fora do dialeto: \"{$t}\"", $n);
        } elseif (str_starts_with($t, '- ')) {
            $nos[] = parser_lista($linhas, $i);
        } elseif (parser_voz_da_linha($t, $n, false) !== null) {
            $nos[] = parser_grupo_inline($linhas, $i);
        } else {
            $nos[] = parser_paragrafo($linhas, $i);
        }
    }
    return $nos;
}

/** HTML cru na fonte e recusado: "<" colado a uma letra, "/" ou "!" abre tag. */
function parser_recusar_html(string $t, int $n): void
{
    if (preg_match('/<[\/A-Za-z!]/', $t) === 1) {
        throw new ConversorErro("HTML cru na fonte nao e aceito: \"{$t}\"", $n);
    }
}

/** voz_classificar com a linha original anexada ao erro; $comNumero=false trata numero como nao-voz. */
function parser_voz_da_linha(string $t, int $n, bool $comNumero): ?array
{
    try {
        $v = voz_classificar($t);
    } catch (ConversorErro $e) {
        throw new ConversorErro($e->getMessage(), $n, $e);
    }
    if ($v === null || (!$comNumero && $v['tipo'] === 'numero')) {
        return null;
    }
    return $v;
}

function parser_lista(array $linhas, int &$i): array
{
    $inicio = $linhas[$i]['n'];
    $itens = [];
    for ($total = count($linhas); $i < $total && str_starts_with($linhas[$i]['t'], '- '); $i++) {
        parser_recusar_html($linhas[$i]['t'], $linhas[$i]['n']);
        $itens[] = trim(substr($linhas[$i]['t'], 2));
    }
    return ['tipo' => 'lista', 'itens' => $itens, 'linha' => $inicio];
}

/** Linhas de voz seguidas (com ou sem crases) ate o branco ou ate uma linha que nao e voz. */
function parser_grupo_inline(array $linhas, int &$i): array
{
    $inicio = $linhas[$i]['n'];
    $itens = [];
    for ($total = count($linhas); $i < $total; $i++) {
        $v = $linhas[$i]['t'] === '' ? null : parser_voz_da_linha($linhas[$i]['t'], $linhas[$i]['n'], false);
        if ($v === null) {
            break;
        }
        $v['linha'] = $linhas[$i]['n'];
        $itens[] = $v;
    }
    return ['tipo' => 'voz', 'itens' => parser_herdar_persona($itens), 'linha' => $inicio];
}

function parser_paragrafo(array $linhas, int &$i): array
{
    $inicio = $linhas[$i]['n'];
    $partes = [];
    for ($total = count($linhas); $i < $total; $i++) {
        $t = $linhas[$i]['t'];
        if ($t === '' || $t === '```' || str_starts_with($t, '### ') || str_starts_with($t, '- ')
            || ($partes !== [] && parser_voz_da_linha($t, $linhas[$i]['n'], false) !== null)) {
            break;
        }
        if ($t[0] === '#' || str_starts_with($t, '> ')) {
            throw new ConversorErro("construcao fora do dialeto: \"{$t}\"", $linhas[$i]['n']);
        }
        parser_recusar_html($t, $linhas[$i]['n']);
        $partes[] = trim($t);
    }
    return ['tipo' => 'paragrafo', 'texto' => implode(' ', $partes), 'linha' => $inicio];
}

/** O pensamento herda a persona da ultima fala anterior no grupo. */
function parser_herdar_persona(array $itens): array
{
    $persona = null;
    foreach ($itens as $k => $item) {
        if ($item['tipo'] === 'fala') {
            $persona = $item['persona'];
        } elseif ($item['tipo'] === 'pensa') {
            $itens[$k]['persona'] = $persona;
        }
    }
    return $itens;
}

/**
 * Le uma cerca (de "```" a "```"). Linhas quebradas a mao sao juntadas com um espaco ANTES de
 * classificar; um /* aberto vai ate a linha que fecha. Branco fecha o grupo; numero sozinho
 * (sem item aberto) e um no proprio.
 * @return list<array<string,mixed>>
 */
function parser_cerca(array $linhas, int &$i): array
{
    $abertura = $linhas[$i]['n'];
    $total = count($linhas);
    $fecho = null;
    for ($k = $i + 1; $k < $total; $k++) {
        if ($linhas[$k]['t'] === '```') {
            $fecho = $k;
            break;
        }
    }
    if ($fecho === null) {
        throw new ConversorErro('cerca nao fechada (sem "```" de fecho)', $abertura);
    }

    $nos = [];
    $grupo = [];
    $aberto = null; // item logico em montagem: ['t'=>..., 'n'=>..., 'comentario'=>bool]
    $fecharItem = static function () use (&$aberto, &$grupo): void {
        if ($aberto === null) {
            return;
        }
        if ($aberto['comentario']) {
            throw new ConversorErro('comentario /* sem fechar (falta */)', $aberto['n']);
        }
        $v = parser_voz_da_linha($aberto['t'], $aberto['n'], false);
        if ($v === null) {
            throw new ConversorErro("linha de cerca fora do dialeto: \"{$aberto['t']}\"", $aberto['n']);
        }
        $v['linha'] = $aberto['n'];
        $grupo[] = $v;
        $aberto = null;
    };
    $fecharGrupo = static function () use (&$grupo, &$nos): void {
        if ($grupo !== []) {
            $nos[] = ['tipo' => 'voz', 'itens' => parser_herdar_persona($grupo), 'linha' => $grupo[0]['linha']];
            $grupo = [];
        }
    };

    for ($k = $i + 1; $k < $fecho; $k++) {
        $n = $linhas[$k]['n'];
        $t = $linhas[$k]['t'];
        parser_recusar_html($t, $n);
        if ($t === '') {
            $fecharItem();
            $fecharGrupo();
        } elseif ($aberto !== null && $aberto['comentario']) {
            $aberto['t'] .= ' ' . trim($t);
            $aberto['comentario'] = !str_ends_with(rtrim($t), '*/');
        } elseif (voz_inicia_item($t)) {
            $fecharItem();
            $aberto = ['t' => $t, 'n' => $n, 'comentario' => str_starts_with($t, '/*') && !str_ends_with(rtrim($t), '*/')];
        } elseif ($aberto === null && preg_match('/^\d+$/', $t) === 1) {
            $fecharGrupo();
            $nos[] = ['tipo' => 'numero', 'numero' => (int) $t, 'linha' => $n];
        } elseif ($aberto !== null) {
            $aberto['t'] .= ' ' . trim($t);
        } else {
            throw new ConversorErro("linha de cerca fora do dialeto: \"{$t}\"", $n);
        }
    }
    $fecharItem();
    $fecharGrupo();
    $i = $fecho + 1;

    if (count($nos) === 1 && $nos[0]['tipo'] === 'voz' && count($nos[0]['itens']) >= 2
        && array_reduce($nos[0]['itens'], static fn(bool $s, array $it): bool => $s && $it['tipo'] === 'pensa' && !$it['longo'], true)) {
        $nos[0]['tipo'] = 'pensa_bloco';
    }
    return $nos;
}
