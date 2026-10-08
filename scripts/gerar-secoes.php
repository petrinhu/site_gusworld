<?php

declare(strict_types=1);

/**
 * scripts/gerar-secoes.php - casca da linha de comando do conversor (item CONVERSOR-MD).
 * Liga as unidades puras (scripts/conversor/) ao disco. Roda so nesta maquina; nunca vai ao servidor.
 *
 *   php scripts/gerar-secoes.php --edicao N [--raiz DIR]               grava os partials
 *   php scripts/gerar-secoes.php --edicao N --verificar [--raiz DIR]   so compara com o que esta gravado
 *
 * Le  RAIZ/docs/content/receitas/edicao-N.php  (dado puro) e as fontes em RAIZ/docs/content/.
 * Grava RAIZ/src/content/edicao-N/{pt,en}/sec-NN.php.
 * TUDO e calculado em memoria antes do primeiro byte gravado: qualquer erro ou trava (R1 a R4)
 * sai 1, imprime "arquivo:linha: ..." e nao grava nada.
 * A gravacao e em duas fases: escreve todos os .tmp e so entao renomeia. Falha de ESCRITA nao toca
 * nenhum destino. Falha no RENAME (rara; ex.: destino e um diretorio) pode deixar parte da edicao ja
 * renomeada: sai 1 e a mensagem diz isso; gere de novo depois de corrigir a causa.
 * Codigos de saida: 0 ok, 1 falha de conteudo/receita/divergencia, 2 uso errado.
 */

require_once __DIR__ . '/conversor/erro.php';
require_once __DIR__ . '/conversor/fonte.php';
require_once __DIR__ . '/conversor/parser.php';
require_once __DIR__ . '/conversor/travas.php';
require_once __DIR__ . '/conversor/montagem.php';
require_once __DIR__ . '/conversor/comparador.php';

const GERAR_IDIOMAS = ['pt', 'en'];

/**
 * Calcula, em memoria, o conteudo de todos os arquivos de uma edicao.
 * @return array{arquivos:array<string,string>,erros:list<string>}  chave = caminho relativo a src/content/edicao-N/
 */
function gerar_calcular(string $raiz, int $edicao): array
{
    $receitaPath = sprintf('%s/docs/content/receitas/edicao-%d.php', $raiz, $edicao);
    if (!is_file($receitaPath)) {
        return ['arquivos' => [], 'erros' => ["receita nao encontrada: {$receitaPath}"]];
    }
    try {
        $receita = require $receitaPath;
    } catch (Throwable $e) {
        return ['arquivos' => [], 'erros' => ["receita invalida ({$receitaPath}): " . $e::class . ': ' . $e->getMessage()]];
    }
    if (!is_array($receita) || !is_array($receita['secoes'] ?? null)) {
        return ['arquivos' => [], 'erros' => ["receita invalida ({$receitaPath}): deve devolver um array com a chave \"secoes\" (array)"]];
    }
    $erros = [];
    foreach (array_keys($receita) as $chave) {
        if ($chave !== 'secoes') {
            $erros[] = "{$receitaPath}: chave desconhecida \"{$chave}\" na receita (edicao)";
        }
    }
    $arquivos = [];
    foreach ($receita['secoes'] as $numero => $secao) {
        if (!is_int($numero) || $numero < 1 || $numero > 99) {
            $erros[] = "{$receitaPath}: numero de secao invalido \"{$numero}\"";
            continue;
        }
        if (!is_array($secao) || !is_array($secao['partes'] ?? null)) {
            $erros[] = "{$receitaPath}: receita invalida na secao {$numero}: precisa ser um array com \"partes\" (array)";
            continue;
        }
        foreach (GERAR_IDIOMAS as $idioma) {
            try {
                $arquivos[sprintf('%s/sec-%02d.php', $idioma, $numero)] = gerar_secao($raiz, $secao, $idioma, $erros);
            } catch (ConversorErro $e) {
                $erros[] = ($e->linha > 0 ? "{$idioma}/{$numero}:{$e->linha}: " : "{$idioma}/{$numero}: ") . $e->getMessage();
            }
        }
    }
    return ['arquivos' => $arquivos, 'erros' => $erros];
}

/** Uma secao num idioma: devolve o conteudo do partial (cabecalho + html + quebra final). */
function gerar_secao(string $raiz, array $secao, string $idioma, array &$erros): string
{
    $nosPorParte = [];
    $fontes = [];
    foreach ($secao['partes'] ?? [] as $parte) {
        $def = $parte[$idioma] ?? null;
        if (!is_array($def) || !isset($def['fonte'], $def['inicio'])) {
            throw new ConversorErro("parte sem fonte/inicio para o idioma {$idioma}");
        }
        $nome = $def['fonte'];
        if (!is_string($def['inicio']) || !is_string($def['fim'] ?? '') || !is_int($def['ocorrencia'] ?? 1)) {
            throw new ConversorErro("receita invalida: inicio e fim devem ser texto e ocorrencia, inteiro (fonte " . (is_string($nome) ? $nome : gettype($nome)) . ')');
        }
        $md = gerar_ler_fonte($raiz, $nome);
        try {
            $linhas = fonte_bloco($md, $def['inicio'], $def['fim'] ?? null, $def['ocorrencia'] ?? null);
            $nos = parser_nos($linhas);
        } catch (ConversorErro $e) {
            throw new ConversorErro($nome . ($e->linha > 0 ? ":{$e->linha}" : '') . ': ' . $e->getMessage(), 0, $e);
        }
        foreach (travas_verificar($nos, $nome) as $violacao) {
            $erros[] = $violacao;
        }
        $nosPorParte[] = $nos;
        if (!in_array($nome, $fontes, true)) {
            $fontes[] = $nome;
        }
    }
    try {
        $html = montagem_secao($secao, $nosPorParte);
    } catch (ConversorErro $e) {
        throw new ConversorErro(implode(', ', $fontes) . ': ' . $e->getMessage(), $e->linha, $e);
    }
    $cabecalho = '<?php /* GERADO por scripts/gerar-secoes.php a partir de docs/content/' . implode(', ', $fontes)
        . '. Não edite à mão: corrija a fonte e gere de novo. */ ?>';
    return $cabecalho . "\n" . $html . "\n";
}

/** Le uma fonte CONFINADA a RAIZ/docs/content/ (sem "..", sem caminho absoluto, sem escapar por link). */
function gerar_ler_fonte(string $raiz, mixed $nome): string
{
    if (!is_string($nome) || $nome === '' || str_starts_with($nome, '/') || str_contains($nome, "\0")
        || in_array('..', explode('/', $nome), true)) {
        throw new ConversorErro('fonte fora de docs/content: "' . (is_string($nome) ? $nome : gettype($nome)) . '"');
    }
    $base = realpath("{$raiz}/docs/content");
    $real = realpath("{$raiz}/docs/content/{$nome}");
    if ($base === false || $real === false || !is_file($real)) {
        throw new ConversorErro("fonte nao encontrada: {$nome}");
    }
    if (!str_starts_with($real, $base . '/')) {
        throw new ConversorErro("fonte fora de docs/content (por link): \"{$nome}\"");
    }
    $md = file_get_contents($real);
    if ($md === false) {
        throw new ConversorErro("fonte ilegivel: {$nome}");
    }
    return $md;
}

/**
 * Grava TODOS os arquivos da edicao em duas fases: primeiro cada um num temporario ao lado; so se
 * todos os temporarios foram escritos, renomeia. Falha de escrita apaga os temporarios nossos e
 * nao deixa nenhum destino tocado.
 * @param array<string,string> $conteudos caminho absoluto => conteudo
 * @return string|null mensagem de erro, ou null se gravou
 */
function gerar_gravar_tudo(array $conteudos): ?string
{
    $escritos = [];
    foreach ($conteudos as $destino => $conteudo) {
        $dir = dirname($destino);
        $tmp = $destino . '.tmp';
        if ((!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) || @file_put_contents($tmp, $conteudo) === false) {
            foreach ($escritos as $feito) {
                @unlink($feito);
            }
            return "falha ao escrever {$tmp}; nada foi gravado";
        }
        $escritos[] = $tmp;
    }
    foreach ($conteudos as $destino => $_) {
        if (!rename($destino . '.tmp', $destino)) {
            return "falha ao renomear {$destino}.tmp (os anteriores desta edicao ja foram renomeados)";
        }
    }
    return null;
}

function gerar_principal(array $argv): int
{
    $edicao = null;
    $verificar = false;
    $raiz = dirname(__DIR__);
    for ($i = 1; $i < count($argv); $i++) {
        switch ($argv[$i]) {
            case '--edicao':
                $edicao = $argv[++$i] ?? null;
                break;
            case '--raiz':
                $raiz = $argv[++$i] ?? '';
                break;
            case '--verificar':
                $verificar = true;
                break;
            default:
                fwrite(STDERR, "argumento desconhecido: {$argv[$i]}\n");
                return 2;
        }
    }
    if ($edicao === null || preg_match('/^\d+$/', $edicao) !== 1 || $raiz === '' || !is_dir($raiz)) {
        fwrite(STDERR, "uso: php scripts/gerar-secoes.php --edicao N [--verificar] [--raiz DIR]\n");
        return 2;
    }
    $n = (int) $edicao;
    $calculo = gerar_calcular($raiz, $n);
    if ($calculo['erros'] !== [] || $calculo['arquivos'] === []) {
        foreach ($calculo['erros'] as $erro) {
            fwrite(STDERR, $erro . "\n");
        }
        fwrite(STDERR, $calculo['erros'] === [] ? "nenhuma secao na receita\n" : 'REPROVADO: ' . count($calculo['erros']) . " problema(s); nada foi gravado.\n");
        return 1;
    }
    $base = sprintf('%s/src/content/edicao-%d', $raiz, $n);
    if ($verificar) {
        $divergentes = 0;
        foreach ($calculo['arquivos'] as $relativo => $esperado) {
            $atual = is_file("{$base}/{$relativo}") ? file_get_contents("{$base}/{$relativo}") : false;
            if ($atual === false) {
                fwrite(STDERR, "{$relativo}: ausente\n");
                $divergentes++;
                continue;
            }
            $c = comparador_comparar($esperado, $atual);
            if (!$c['igual']) {
                fwrite(STDERR, "{$relativo}: diverge na linha {$c['linha']}, coluna {$c['coluna']}: esperado \"{$c['trecho_esperado']}\", gravado \"{$c['trecho_obtido']}\"\n");
                $divergentes++;
            }
        }
        printf("verificados=%d divergentes=%d\n", count($calculo['arquivos']), $divergentes);
        return $divergentes === 0 ? 0 : 1;
    }
    $destinos = [];
    foreach ($calculo['arquivos'] as $relativo => $conteudo) {
        $destinos["{$base}/{$relativo}"] = $conteudo;
    }
    $falha = gerar_gravar_tudo($destinos);
    if ($falha !== null) {
        fwrite(STDERR, $falha . "\n");
        return 1;
    }
    printf("gerados=%d\n", count($calculo['arquivos']));
    return 0;
}

if (PHP_SAPI === 'cli' && isset($argv[0]) && realpath($argv[0]) === __FILE__) {
    exit(gerar_principal($argv));
}
