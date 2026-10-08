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
    $receita = require $receitaPath;
    $erros = [];
    foreach (array_keys($receita) as $chave) {
        if ($chave !== 'secoes') {
            $erros[] = "{$receitaPath}: chave desconhecida \"{$chave}\" na receita (edicao)";
        }
    }
    $arquivos = [];
    foreach ($receita['secoes'] ?? [] as $numero => $secao) {
        if (!is_int($numero) || $numero < 1 || $numero > 99) {
            $erros[] = "{$receitaPath}: numero de secao invalido \"{$numero}\"";
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
        $caminho = "{$raiz}/docs/content/{$nome}";
        $md = is_file($caminho) ? file_get_contents($caminho) : false;
        if ($md === false) {
            throw new ConversorErro("fonte nao encontrada: {$nome}");
        }
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
    $html = montagem_secao($secao, $nosPorParte);
    $cabecalho = '<?php /* GERADO por scripts/gerar-secoes.php a partir de docs/content/' . implode(', ', $fontes)
        . '. Não edite à mão: corrija a fonte e gere de novo. */ ?>';
    return $cabecalho . "\n" . $html . "\n";
}

/** Grava com escrita atomica por arquivo (temporario + rename). */
function gerar_gravar(string $destino, string $conteudo): bool
{
    $dir = dirname($destino);
    if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
        return false;
    }
    $tmp = $destino . '.tmp';
    return file_put_contents($tmp, $conteudo) !== false && rename($tmp, $destino);
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
    foreach ($calculo['arquivos'] as $relativo => $conteudo) {
        if (!gerar_gravar("{$base}/{$relativo}", $conteudo)) {
            fwrite(STDERR, "{$relativo}: falha ao gravar\n");
            return 1;
        }
    }
    printf("gerados=%d\n", count($calculo['arquivos']));
    return 0;
}

if (PHP_SAPI === 'cli' && isset($argv[0]) && realpath($argv[0]) === __FILE__) {
    exit(gerar_principal($argv));
}
