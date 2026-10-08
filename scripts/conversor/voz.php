<?php

declare(strict_types=1);

require_once __DIR__ . '/erro.php';

/** Prefixo de uma linha de prompt: persona@glyfesse (o resto e validado em voz_classificar). */
const VOZ_PREFIXO_PROMPT = '/^[A-Za-z][A-Za-z0-9_-]*@glyfesse/';
const VOZ_PROMPT_COMPLETO = '/^([a-z][a-z0-9_-]*)@glyfesse:(\S+)\$ (\S.*)$/';

/**
 * Classifica UMA linha logica (o parser ja juntou as linhas quebradas a mao).
 * Crases em volta da linha inteira sao tiradas; numero so vale sem crases.
 *
 * @return array{tipo:string,persona:?string,caminho:?string,texto:string,longo:bool,numero:?int}|null
 *         tipo: fala | pensa | assinatura | numero. Nulo se a linha nao e voz.
 * @throws ConversorErro prompt fora do padrao, ou marca sem texto
 */
function voz_classificar(string $linha): ?array
{
    $linha = rtrim($linha);
    $entreCrases = strlen($linha) >= 3 && $linha[0] === '`' && substr($linha, -1) === '`'
        && !str_contains(substr($linha, 1, -1), '`');
    $conteudo = $entreCrases ? substr($linha, 1, -1) : $linha;

    if (preg_match('/^\d+$/', $conteudo) === 1) {
        return $entreCrases ? null : voz_registro('numero', $conteudo, numero: (int) $conteudo);
    }
    if (preg_match(VOZ_PREFIXO_PROMPT, $conteudo) === 1) {
        if (preg_match(VOZ_PROMPT_COMPLETO, $conteudo, $m) !== 1) {
            if (preg_match('/^[A-Za-z][A-Za-z0-9_-]*@glyfesse:\S+\$\s*$/', $conteudo) === 1) {
                throw new ConversorErro("fala sem texto: \"{$conteudo}\"");
            }
            throw new ConversorErro("prompt fora do padrao (esperado persona@glyfesse:caminho\$ fala): \"{$conteudo}\"");
        }
        return voz_registro('fala', $m[3], persona: $m[1], caminho: $m[2]);
    }
    if (str_starts_with($conteudo, '//by:')) {
        return voz_registro('assinatura', 'by:' . substr($conteudo, 5));
    }
    if (str_starts_with($conteudo, '/*') && str_ends_with($conteudo, '*/') && strlen($conteudo) >= 4) {
        return voz_registro('pensa', voz_texto_da_marca(substr($conteudo, 2, -2), $conteudo), longo: true);
    }
    if (str_starts_with($conteudo, '//')) {
        return voz_registro('pensa', voz_texto_da_marca(substr($conteudo, 2), $conteudo));
    }
    return null;
}

/** Verdadeiro se a linha COMECA um item de voz (prompt, //, /*); usado para juntar linhas quebradas a mao. */
function voz_inicia_item(string $linha): bool
{
    return preg_match(VOZ_PREFIXO_PROMPT, $linha) === 1
        || str_starts_with($linha, '//')
        || str_starts_with($linha, '/*');
}

function voz_texto_da_marca(string $bruto, string $linha): string
{
    $texto = trim($bruto);
    if ($texto === '') {
        throw new ConversorErro("marca sem texto: \"{$linha}\"");
    }
    return $texto;
}

/** @return array{tipo:string,persona:?string,caminho:?string,texto:string,longo:bool,numero:?int} */
function voz_registro(string $tipo, string $texto, ?string $persona = null, ?string $caminho = null, bool $longo = false, ?int $numero = null): array
{
    return ['tipo' => $tipo, 'persona' => $persona, 'caminho' => $caminho, 'texto' => $texto, 'longo' => $longo, 'numero' => $numero];
}
