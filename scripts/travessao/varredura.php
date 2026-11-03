<?php

declare(strict_types=1);

/**
 * scripts/travessao/varredura.php - varredura de travessao sobre o conteudo das edicoes (O4, Edicao #7).
 *
 * Considera, para N inteiro >= $edicaoMinima:
 *   - src/content/edicao-N/** (recursivo, qualquer extensao)
 *   - docs/content/edicao-N-*.md
 * Cada arquivo e lido linha a linha com TRAVAS_TRAVESSAO (scripts/conversor/travas.php),
 * a mesma expressao da trava R3 do conversor, reusada e nunca copiada.
 * So aponta: nunca corrige. Varredura vazia NAO e reprovada aqui; quem chama decide.
 */

require_once __DIR__ . '/../conversor/travas.php';

/**
 * @return array{encontrados: int, analisados: int, falharam: int, achados: list<string>}
 */
function travessao_varrer(string $raiz, int $edicaoMinima): array
{
    $raiz = rtrim($raiz, '/');
    $relativos = travessao_arquivos_da_edicao($raiz, $edicaoMinima);
    $resultado = ['encontrados' => count($relativos), 'analisados' => 0, 'falharam' => 0, 'achados' => []];
    foreach ($relativos as $relativo) {
        $achados = travessao_analisar_arquivo($raiz . '/' . $relativo, $relativo);
        if ($achados === null) {
            $resultado['falharam']++;
            continue;
        }
        $resultado['analisados']++;
        $resultado['achados'] = array_merge($resultado['achados'], $achados);
    }
    return $resultado;
}

/**
 * Caminhos relativos a raiz dos arquivos da varredura, em ordem estavel.
 *
 * @return list<string>
 */
function travessao_arquivos_da_edicao(string $raiz, int $edicaoMinima): array
{
    $relativos = array_merge(
        travessao_src_da_edicao($raiz, $edicaoMinima),
        travessao_docs_da_edicao($raiz, $edicaoMinima)
    );
    sort($relativos, SORT_STRING);
    return $relativos;
}

/**
 * Todos os arquivos de src/content/edicao-N/** com N >= $edicaoMinima.
 *
 * @return list<string>
 */
function travessao_src_da_edicao(string $raiz, int $edicaoMinima): array
{
    $relativos = [];
    foreach (travessao_pastas_edicao($raiz . '/src/content', $edicaoMinima) as $pasta) {
        $itens = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($pasta, FilesystemIterator::SKIP_DOTS)
        );
        foreach ($itens as $item) {
            if ($item->isFile()) {
                $relativos[] = substr($item->getPathname(), strlen($raiz) + 1);
            }
        }
    }
    return $relativos;
}

/**
 * Arquivos docs/content/edicao-N-*.md com N >= $edicaoMinima.
 *
 * @return list<string>
 */
function travessao_docs_da_edicao(string $raiz, int $edicaoMinima): array
{
    $base = $raiz . '/docs/content';
    if (!is_dir($base)) {
        return [];
    }
    $relativos = [];
    foreach (scandir($base) as $nome) {
        if (preg_match('/^edicao-(\d+)-.+\.md$/', $nome, $m) !== 1) {
            continue;
        }
        if ((int) $m[1] >= $edicaoMinima && is_file($base . '/' . $nome)) {
            $relativos[] = 'docs/content/' . $nome;
        }
    }
    return $relativos;
}

/**
 * Pastas 'edicao-N' diretas de $base com N inteiro >= $edicaoMinima (compara como numero: 10 > 7).
 *
 * @return list<string>
 */
function travessao_pastas_edicao(string $base, int $edicaoMinima): array
{
    if (!is_dir($base)) {
        return [];
    }
    $pastas = [];
    foreach (scandir($base) as $nome) {
        if (preg_match('/^edicao-(\d+)$/', $nome, $m) !== 1) {
            continue;
        }
        if ((int) $m[1] >= $edicaoMinima && is_dir($base . '/' . $nome)) {
            $pastas[] = $base . '/' . $nome;
        }
    }
    return $pastas;
}

/**
 * Achados "relativo:linha: R3: trecho" de um arquivo, ou null se ele nao pode ser lido como UTF-8.
 *
 * @return list<string>|null
 */
function travessao_analisar_arquivo(string $caminho, string $relativo): ?array
{
    $conteudo = is_readable($caminho) ? file_get_contents($caminho) : false;
    if ($conteudo === false) {
        return null;
    }
    $achados = [];
    foreach (explode("\n", $conteudo) as $indice => $linha) {
        $casou = preg_match(TRAVAS_TRAVESSAO, $linha);
        if ($casou === false) {
            return null;
        }
        if ($casou === 1) {
            $achados[] = $relativo . ':' . ($indice + 1) . ': R3: ' . mb_substr(trim($linha), 0, 120);
        }
    }
    return $achados;
}
