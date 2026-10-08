<?php

declare(strict_types=1);

require_once __DIR__ . '/erro.php';

/**
 * Recorta de um texto-fonte as linhas de um bloco.
 *
 * $inicio    texto EXATO da linha que abre o bloco (o conteudo comeca na seguinte)
 * $ocorrencia qual ocorrencia de $inicio abre o bloco (1-based); null exige que
 *            $inicio apareca uma unica vez (ambiguo e erro)
 * $fim       texto EXATO da linha que fecha o bloco; null = a proxima linha "---"
 *
 * Linhas em branco das bordas saem; as do meio ficam. Cada linha leva o numero
 * da linha ORIGINAL (1-based), para toda mensagem de erro apontar a fonte.
 *
 * @return list<array{n:int,t:string}>
 * @throws ConversorErro inicio inexistente, ambiguo, ocorrencia alem das que existem, bloco sem fim ou vazio
 */
function fonte_bloco(string $md, string $inicio, ?string $fim = null, ?int $ocorrencia = null): array
{
    $linhas = explode("\n", $md);
    if (end($linhas) === '') {
        array_pop($linhas);
    }
    $linhas = array_map(static fn(string $l): string => rtrim($l, "\r"), $linhas);

    $achadas = [];
    foreach ($linhas as $i => $texto) {
        if ($texto === $inicio) {
            $achadas[] = $i;
        }
    }
    if ($achadas === []) {
        throw new ConversorErro("inicio \"{$inicio}\" nao encontrado");
    }
    if ($ocorrencia === null && count($achadas) > 1) {
        throw new ConversorErro("inicio \"{$inicio}\" aparece " . count($achadas) . ' vezes; informe a ocorrencia', $achadas[1] + 1);
    }
    $alvo = $ocorrencia ?? 1;
    if ($alvo < 1 || $alvo > count($achadas)) {
        throw new ConversorErro("ocorrencia {$alvo} de \"{$inicio}\" nao existe (ha " . count($achadas) . ')');
    }
    $posInicio = $achadas[$alvo - 1];
    $marcaFim = $fim ?? '---';

    $posFim = null;
    for ($i = $posInicio + 1, $total = count($linhas); $i < $total; $i++) {
        if ($linhas[$i] === $marcaFim) {
            $posFim = $i;
            break;
        }
    }
    if ($posFim === null) {
        throw new ConversorErro("bloco \"{$inicio}\" sem fim (\"{$marcaFim}\" nao encontrado)", $posInicio + 1);
    }

    $bloco = [];
    for ($i = $posInicio + 1; $i < $posFim; $i++) {
        $bloco[] = ['n' => $i + 1, 't' => $linhas[$i]];
    }
    while ($bloco !== [] && $bloco[0]['t'] === '') {
        array_shift($bloco);
    }
    while ($bloco !== [] && $bloco[count($bloco) - 1]['t'] === '') {
        array_pop($bloco);
    }
    if ($bloco === []) {
        throw new ConversorErro("bloco \"{$inicio}\" vazio", $posInicio + 1);
    }
    return $bloco;
}
