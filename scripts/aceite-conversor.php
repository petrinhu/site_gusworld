<?php

declare(strict_types=1);

/**
 * scripts/aceite-conversor.php - mede o criterio de aceite do conversor (item CONVERSOR-ACEITE).
 * Criterio escrito ANTES do dado: docs/tecnico/ACEITE-CONVERSOR.md. Este script so MEDE igualdade;
 * quem classifica cada diferenca (D1 a D6) e o reviewer, nunca quem implementou.
 *
 *   php scripts/aceite-conversor.php [--edicao N] [--raiz DIR] [--saida DIR] [--relatorio ARQUIVO]
 *
 * Padroes: --edicao 5, --raiz o repo, --saida /var/tmp/site-stack/aceite,
 *          --relatorio /var/tmp/site-stack/aceite-edicao-N.txt.
 * Universo = as secoes da receita (docs/content/receitas/edicao-N.php) x {pt,en}.
 * Recusa rodar (saida 2) se: os hashes do criterio nao cobrem exatamente o universo, algum
 * publicado mudou depois do criterio, o git status de src/content/edicao-N/ nao esta vazio, ou
 * --saida/--relatorio cairiam dentro dele. NUNCA escreve em src/content/edicao-N/.
 * Chama as unidades puras (fonte, parser, travas, montagem, comparador), nunca a casca: uma trava
 * disparada NAO impede emitir e comparar; as travas saem numa lista a parte.
 * Normalizacao: so a do comparador (N1 e N2). Saida: 0 APROVADO, 1 REPROVADO, 2 recusou rodar.
 */

require_once __DIR__ . '/conversor/erro.php';
require_once __DIR__ . '/conversor/fonte.php';
require_once __DIR__ . '/conversor/parser.php';
require_once __DIR__ . '/conversor/travas.php';
require_once __DIR__ . '/conversor/montagem.php';
require_once __DIR__ . '/conversor/comparador.php';

const ACEITE_IDIOMAS = ['pt', 'en'];

/** Caminho absoluto sem exigir que exista: resolve o ancestral existente e anexa o resto. */
function aceite_absoluto(string $caminho): string
{
    $caminho = str_starts_with($caminho, '/') ? $caminho : getcwd() . '/' . $caminho;
    $resto = [];
    $atual = rtrim($caminho, '/');
    while ($atual !== '' && realpath($atual) === false) {
        array_unshift($resto, basename($atual));
        $atual = dirname($atual);
    }
    $base = $atual === '' ? '' : (string) realpath($atual);
    return rtrim($base . '/' . implode('/', $resto), '/');
}

/** Hashes do criterio: linhas "sha256  src/content/edicao-N/{pt,en}/sec-NN.php" do documento. @return array<string,string> */
function aceite_hashes_do_criterio(string $raiz, int $n): array
{
    $texto = @file_get_contents("{$raiz}/docs/tecnico/ACEITE-CONVERSOR.md");
    if ($texto === false) {
        return [];
    }
    $hashes = [];
    $padrao = '/^([0-9a-f]{64})  (src\/content\/edicao-' . $n . '\/(?:pt|en)\/sec-\d\d\.php)$/m';
    if (preg_match_all($padrao, $texto, $m, PREG_SET_ORDER) > 0) {
        foreach ($m as $linha) {
            $hashes[$linha[2]] = $linha[1];
        }
    }
    return $hashes;
}

/** Le uma fonte confinada a RAIZ/docs/content/. */
function aceite_ler_fonte(string $raiz, mixed $nome): string
{
    if (!is_string($nome) || $nome === '' || str_starts_with($nome, '/') || str_contains($nome, "\0") || in_array('..', explode('/', $nome), true)) {
        throw new ConversorErro('fonte fora de docs/content: "' . (is_string($nome) ? $nome : gettype($nome)) . '"');
    }
    $base = realpath("{$raiz}/docs/content");
    $real = realpath("{$raiz}/docs/content/{$nome}");
    if ($base === false || $real === false || !is_file($real) || !str_starts_with($real, $base . '/')) {
        throw new ConversorErro("fonte nao encontrada: {$nome}");
    }
    return (string) file_get_contents($real);
}

/**
 * Uma secao num idioma, pelas unidades puras. Trava disparada NAO interrompe.
 * @return array{html:?string,erro:?string,travas:list<string>}
 */
function aceite_gerar(string $raiz, array $secao, string $idioma): array
{
    $travas = [];
    try {
        $nosPorParte = [];
        foreach ($secao['partes'] ?? [] as $parte) {
            $def = $parte[$idioma] ?? null;
            if (!is_array($def) || !isset($def['fonte'], $def['inicio'])) {
                throw new ConversorErro("parte sem fonte/inicio para o idioma {$idioma}");
            }
            $nome = $def['fonte'];
            try {
                $linhas = fonte_bloco(aceite_ler_fonte($raiz, $nome), $def['inicio'], $def['fim'] ?? null, $def['ocorrencia'] ?? null);
                $nos = parser_nos($linhas);
            } catch (ConversorErro $e) {
                throw new ConversorErro($nome . ($e->linha > 0 ? ":{$e->linha}" : '') . ': ' . $e->getMessage(), 0, $e);
            }
            array_push($travas, ...travas_verificar($nos, $nome));
            $nosPorParte[] = $nos;
        }
        return ['html' => montagem_secao($secao, $nosPorParte) . "\n", 'erro' => null, 'travas' => $travas];
    } catch (ConversorErro $e) {
        return ['html' => null, 'erro' => $e->getMessage(), 'travas' => $travas];
    }
}

function aceite_recusar(string $motivo): int
{
    fwrite(STDERR, "ACEITE RECUSADO A RODAR: {$motivo}\n");
    return 2;
}

function aceite_principal(array $argv): int
{
    $edicao = 5;
    $raiz = dirname(__DIR__);
    $saida = '/var/tmp/site-stack/aceite';
    $relatorio = null;
    for ($i = 1; $i < count($argv); $i++) {
        $valor = $argv[$i + 1] ?? null;
        switch ($argv[$i]) {
            case '--edicao':
                $edicao = ($valor !== null && preg_match('/^\d+$/', $valor) === 1) ? (int) $valor : -1;
                break;
            case '--raiz':
                $raiz = (string) $valor;
                break;
            case '--saida':
                $saida = (string) $valor;
                break;
            case '--relatorio':
                $relatorio = (string) $valor;
                break;
            default:
                return aceite_recusar("argumento desconhecido: {$argv[$i]}");
        }
        $i++;
    }
    $relatorio ??= "/var/tmp/site-stack/aceite-edicao-{$edicao}.txt";
    if ($edicao < 0 || !is_dir($raiz)) {
        return aceite_recusar('uso: php scripts/aceite-conversor.php [--edicao N] [--raiz DIR] [--saida DIR] [--relatorio ARQUIVO]');
    }
    $raiz = (string) realpath($raiz);

    // receita e universo
    $receitaPath = "{$raiz}/docs/content/receitas/edicao-{$edicao}.php";
    if (!is_file($receitaPath)) {
        return aceite_recusar("receita nao encontrada: {$receitaPath}");
    }
    try {
        $receita = require $receitaPath;
    } catch (Throwable $e) {
        return aceite_recusar('receita invalida: ' . $e->getMessage());
    }
    if (!is_array($receita) || !is_array($receita['secoes'] ?? null)) {
        return aceite_recusar('receita invalida: precisa devolver array com "secoes"');
    }
    $universo = [];
    foreach ($receita['secoes'] as $numero => $secao) {
        foreach (ACEITE_IDIOMAS as $idioma) {
            $universo[sprintf('src/content/edicao-%d/%s/sec-%02d.php', $edicao, $idioma, (int) $numero)] = ['idioma' => $idioma, 'secao' => $secao];
        }
    }

    // o criterio cobre exatamente o universo, e o publicado e o do criterio
    $hashes = aceite_hashes_do_criterio($raiz, $edicao);
    $faltam = array_diff(array_keys($universo), array_keys($hashes));
    $sobram = array_diff(array_keys($hashes), array_keys($universo));
    if ($universo === [] || $faltam !== [] || $sobram !== []) {
        return aceite_recusar('os hashes de docs/tecnico/ACEITE-CONVERSOR.md (' . count($hashes) . ') nao cobrem exatamente o universo da receita ('
            . count($universo) . '); faltam: [' . implode(', ', $faltam) . '] sobram: [' . implode(', ', $sobram) . ']');
    }
    $mudou = [];
    foreach ($hashes as $caminho => $esperado) {
        $atual = is_file("{$raiz}/{$caminho}") ? hash_file('sha256', "{$raiz}/{$caminho}") : 'ausente';
        if ($atual !== $esperado) {
            $mudou[] = $caminho;
        }
    }
    if ($mudou !== []) {
        return aceite_recusar('o hash do publicado mudou depois do criterio: ' . implode(', ', $mudou));
    }
    $gitSaida = [];
    exec('git -C ' . escapeshellarg($raiz) . ' status --porcelain -- ' . escapeshellarg("src/content/edicao-{$edicao}/") . ' 2>&1', $gitSaida, $gitRc);
    if ($gitRc !== 0 || $gitSaida !== []) {
        return aceite_recusar("git status de src/content/edicao-{$edicao}/ nao esta vazio (ou falhou): " . implode(' | ', $gitSaida));
    }
    $protegido = aceite_absoluto("{$raiz}/src/content/edicao-{$edicao}");
    foreach (['--saida' => $saida, '--relatorio' => $relatorio] as $nome => $destino) {
        $abs = aceite_absoluto($destino);
        if ($abs === $protegido || str_starts_with($abs, $protegido . '/')) {
            return aceite_recusar("{$nome} cairia dentro de src/content/edicao-{$edicao}/ (nunca se escreve la)");
        }
    }

    // gerar e comparar, universo inteiro
    $linhasTravas = [];
    $itens = [];
    foreach ($universo as $caminho => $def) {
        $r = aceite_gerar($raiz, $def['secao'], $def['idioma']);
        array_push($linhasTravas, ...$r['travas']);
        $publicado = (string) file_get_contents("{$raiz}/{$caminho}");
        if ($r['html'] === null) {
            $itens[$caminho] = ['idioma' => $def['idioma'], 'igual' => false, 'erro' => $r['erro'], 'cmp' => null, 'espaco' => false];
            continue;
        }
        $gravar = rtrim($saida, '/') . '/' . substr($caminho, strlen("src/content/edicao-{$edicao}/"));
        if (!is_dir(dirname($gravar)) && !mkdir(dirname($gravar), 0755, true) && !is_dir(dirname($gravar))) {
            return aceite_recusar("nao consegui criar " . dirname($gravar));
        }
        file_put_contents($gravar, $r['html']);
        $c = comparador_comparar($publicado, $r['html']);
        $semEspaco = false;
        if (!$c['igual']) {
            $solta = static fn(string $t): string => preg_replace('/>\s+</', '><', comparador_normalizar($t)) ?? $t;
            $semEspaco = $solta($publicado) === $solta($r['html']);
        }
        $itens[$caminho] = ['idioma' => $def['idioma'], 'igual' => $c['igual'], 'erro' => null, 'cmp' => $c, 'espaco' => $semEspaco];
    }

    // fora do universo: o que a edicao tem em disco e a receita nao cobre
    $foraDoUniverso = 0;
    foreach (ACEITE_IDIOMAS as $idioma) {
        foreach (glob("{$raiz}/src/content/edicao-{$edicao}/{$idioma}/sec-*.php") ?: [] as $f) {
            if (!isset($universo["src/content/edicao-{$edicao}/{$idioma}/" . basename($f)])) {
                $foraDoUniverso++;
            }
        }
    }

    $total = count($itens);
    $iguais = count(array_filter($itens, static fn(array $i): bool => $i['igual']));
    $porIdioma = [];
    foreach (ACEITE_IDIOMAS as $idioma) {
        $do = array_filter($itens, static fn(array $i): bool => $i['idioma'] === $idioma);
        $porIdioma[$idioma] = count(array_filter($do, static fn(array $i): bool => $i['igual'])) . '/' . count($do);
    }
    $aprovado = $iguais === $total;
    $sumiriam = count(array_filter($itens, static fn(array $i): bool => !$i['igual'] && $i['espaco']));

    $r = [];
    $r[] = "ACEITE DO CONVERSOR - edicao {$edicao} - " . date('Y-m-d H:i:s');
    $r[] = '';
    $r[] = '== CAMADA 1: numeros crus ==';
    $r[] = "universo: {$total} arquivos";
    $r[] = "fora do universo: {$foraDoUniverso} arquivos";
    $r[] = "comparados: {$total}";
    $r[] = "iguais: {$iguais}";
    $r[] = 'diferentes: ' . ($total - $iguais);
    foreach ($porIdioma as $idioma => $fracao) {
        $r[] = "{$idioma}: {$fracao}";
    }
    $r[] = 'travas: ' . count($linhasTravas);
    foreach ($linhasTravas as $t) {
        $r[] = "  {$t}";
    }
    foreach ($itens as $caminho => $i) {
        if ($i['igual']) {
            continue;
        }
        $curto = substr($caminho, strlen("src/content/edicao-{$edicao}/"));
        $r[] = '';
        $r[] = "diferente: {$curto}";
        if ($i['erro'] !== null) {
            $r[] = "  erro: {$i['erro']}";
        } else {
            $c = $i['cmp'];
            $r[] = "  primeira divergencia: linha {$c['linha']}, coluna {$c['coluna']}";
            $r[] = "  esperado (publicado): \"{$c['trecho_esperado']}\"";
            $r[] = "  obtido (gerado):      \"{$c['trecho_obtido']}\"";
        }
        $r[] = '  classe: (a atribuir pelo reviewer)';
    }
    $r[] = '';
    $r[] = "informativo: {$sumiriam} diferenca(s) sumiriam se o espaco entre tags fosse ignorado (nao muda o veredito)";
    $r[] = '';
    $r[] = '== CAMADA 2: veredito ==';
    $r[] = 'criterio: docs/tecnico/ACEITE-CONVERSOR.md (estrito: so N1 e N2; APROVADO so com todos iguais, por idioma)';
    $r[] = 'VEREDITO: ' . ($aprovado ? 'APROVADO' : 'REPROVADO');
    $r[] = 'nota: a classe (D1 a D6) de cada diferenca e atribuida pelo reviewer, nunca por quem implementou';
    $texto = implode("\n", $r) . "\n";

    if (!is_dir(dirname($relatorio)) && !mkdir(dirname($relatorio), 0755, true) && !is_dir(dirname($relatorio))) {
        return aceite_recusar('nao consegui criar ' . dirname($relatorio));
    }
    file_put_contents($relatorio, $texto);
    fwrite(STDOUT, $texto);
    return $aprovado ? 0 : 1;
}

if (PHP_SAPI === 'cli' && isset($argv[0]) && realpath($argv[0]) === __FILE__) {
    exit(aceite_principal($argv));
}
