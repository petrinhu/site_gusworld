<?php

declare(strict_types=1);

require_once __DIR__ . '/erro.php';
require_once __DIR__ . '/emissor.php';

/**
 * Montagem: compoe o HTML de UMA secao a partir da receita e dos nos de cada parte.
 *
 * Receita (dado puro, lista fechada de chaves; chave desconhecida e erro):
 *   tipo   prosa (1 parte) | sequencia (1 ou mais, separadas por linha em branco)
 *          | entrevista (2 partes: perguntas e respostas)
 *   partes lista de partes; cada uma com
 *            pt, en        {fonte, inicio, fim, ocorrencia}  (a casca resolve; aqui so se valida)
 *            envolver      {tag, id, classe}                 (recua o conteudo 2 espacos)
 *            classe_lista  string                            (classe do <ul>)
 * Nada de HTML, texto ou numero de secao/edicao dentro da receita.
 *
 * @param array<string,mixed> $receita
 * @param list<list<array<string,mixed>>> $nosPorParte  uma lista de nos (saida do parser) por parte
 * @throws ConversorErro
 */
function montagem_secao(array $receita, array $nosPorParte): string
{
    montagem_validar_chaves($receita, ['tipo', 'partes'], 'secao');
    $tipo = $receita['tipo'] ?? null;
    $partes = $receita['partes'] ?? [];
    foreach ($partes as $parte) {
        montagem_validar_chaves($parte, ['pt', 'en', 'envolver', 'classe_lista'], 'parte');
        foreach (['pt', 'en'] as $idioma) {
            montagem_validar_chaves($parte[$idioma] ?? [], ['fonte', 'inicio', 'fim', 'ocorrencia'], "idioma {$idioma}");
        }
        montagem_validar_chaves($parte['envolver'] ?? [], ['tag', 'id', 'classe'], 'envolver');
    }
    if (!in_array($tipo, ['prosa', 'sequencia', 'entrevista'], true)) {
        throw new ConversorErro('tipo desconhecido na receita: "' . (is_string($tipo) ? $tipo : gettype($tipo)) . '"');
    }
    if (count($nosPorParte) !== count($partes)) {
        throw new ConversorErro('nos por parte: ' . count($nosPorParte) . ' listas para ' . count($partes) . ' partes');
    }
    return match ($tipo) {
        'prosa' => montagem_prosa($partes, $nosPorParte),
        'sequencia' => montagem_sequencia($partes, $nosPorParte),
        'entrevista' => montagem_entrevista($partes, $nosPorParte),
    };
}

function montagem_validar_chaves(array $dado, array $permitidas, string $onde): void
{
    foreach (array_keys($dado) as $chave) {
        if (!in_array($chave, $permitidas, true)) {
            throw new ConversorErro("chave desconhecida \"{$chave}\" na receita ({$onde})");
        }
    }
}

function montagem_prosa(array $partes, array $nosPorParte): string
{
    if (count($partes) !== 1) {
        throw new ConversorErro('prosa exige exatamente 1 parte (recebeu ' . count($partes) . ')');
    }
    return montagem_parte($partes[0], $nosPorParte[0]);
}

function montagem_sequencia(array $partes, array $nosPorParte): string
{
    if ($partes === []) {
        throw new ConversorErro('sequencia exige pelo menos 1 parte');
    }
    $blocos = [];
    foreach ($partes as $k => $parte) {
        $blocos[] = montagem_parte($parte, $nosPorParte[$k]);
    }
    return implode("\n\n", $blocos);
}

function montagem_parte(array $parte, array $nos): string
{
    $html = emissor_html($nos, ['classe_lista' => $parte['classe_lista'] ?? null]);
    return isset($parte['envolver']) ? montagem_envolver($html, $parte['envolver']) : $html;
}

function montagem_envolver(string $html, array $envolver): string
{
    $tag = $envolver['tag'] ?? '';
    if (preg_match('/^[a-z][a-z0-9]*$/', $tag) !== 1) {
        throw new ConversorErro('tag invalida em envolver: "' . $tag . '"');
    }
    $atributos = '';
    foreach (['id', 'classe'] as $chave) {
        if (isset($envolver[$chave])) {
            $nome = $chave === 'classe' ? 'class' : 'id';
            $atributos .= " {$nome}=\"" . htmlspecialchars($envolver[$chave], ENT_QUOTES, 'UTF-8') . '"';
        }
    }
    $interno = implode("\n", array_map(static fn(string $l): string => $l === '' ? '' : '  ' . $l, explode("\n", $html)));
    return "<{$tag}{$atributos}>\n{$interno}\n</{$tag}>";
}

/** Perguntas e respostas intercaladas: um <div class="troca"> por par. */
function montagem_entrevista(array $partes, array $nosPorParte): string
{
    if (count($partes) !== 2) {
        throw new ConversorErro('entrevista exige exatamente 2 partes: perguntas e respostas (recebeu ' . count($partes) . ')');
    }
    foreach ($partes as $parte) {
        if (isset($parte['envolver'])) {
            throw new ConversorErro('entrevista nao aceita envolver');
        }
    }
    [$perguntas, $respostas] = $nosPorParte;
    foreach ($perguntas as $k => $no) {
        if ($no['tipo'] !== 'voz') {
            throw new ConversorErro('pergunta ' . ($k + 1) . ' nao e um grupo de voz', (int) $no['linha']);
        }
    }
    if (count($respostas) % 2 !== 0) {
        throw new ConversorErro('numero de resposta sem o grupo de voz que o segue (ou o contrario)', (int) end($respostas)['linha']);
    }
    $numeradas = [];
    for ($k = 0; $k < count($respostas); $k += 2) {
        [$numero, $grupo] = [$respostas[$k], $respostas[$k + 1]];
        if ($numero['tipo'] !== 'numero') {
            throw new ConversorErro('esperado o numero da resposta antes do texto', (int) $numero['linha']);
        }
        if ($grupo['tipo'] !== 'voz') {
            throw new ConversorErro('a resposta ' . $numero['numero'] . ' nao e um grupo de voz', (int) $grupo['linha']);
        }
        $numeradas[] = ['numero' => $numero['numero'], 'linha' => $numero['linha'], 'grupo' => $grupo];
    }
    if (count($perguntas) !== count($numeradas)) {
        throw new ConversorErro('perguntas e respostas em numero diferente: ' . count($perguntas) . ' perguntas, ' . count($numeradas) . ' respostas');
    }
    $trocas = [];
    foreach ($numeradas as $k => $resposta) {
        if ($resposta['numero'] !== $k + 1) {
            throw new ConversorErro('numeracao das respostas fora de 1..N: esperado ' . ($k + 1) . ', veio ' . $resposta['numero'], (int) $resposta['linha']);
        }
        // pergunta e resposta saem em linhas seguidas: um so grupo de voz
        $par = ['tipo' => 'voz', 'linha' => $perguntas[$k]['linha'], 'itens' => array_merge($perguntas[$k]['itens'], $resposta['grupo']['itens'])];
        $trocas[] = "  <div class=\"troca\">\n" . emissor_html([$par], ['recuo' => 4]) . "\n  </div>";
    }
    return "<div class=\"entrev\">\n\n" . implode("\n\n", $trocas) . "\n\n</div>";
}
