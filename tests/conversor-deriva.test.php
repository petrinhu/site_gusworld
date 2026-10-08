<?php

declare(strict_types=1);

/**
 * tests/conversor-deriva.test.php - a fonte unica com dente (item CONVERSOR-ACEITE, F15).
 * Para TODA edicao que tem receita (docs/content/receitas/edicao-N.php), gera em memoria o que
 * `scripts/gerar-secoes.php --edicao N` gravaria e compara com o partial commitado em
 * src/content/edicao-N/, pelo mesmo comparador (N1 e N2). Reprova partial editado a mao,
 * partial ausente, fonte que mudou sem regerar e fonte que viola uma trava.
 * Piso: >= 1 receita e >= 12 arquivos comparados na arvore real (varredura vazia reprova).
 * A mesma logica e provada contra uma raiz de brinquedo em /var/tmp, que o teste sabota.
 *   php tests/conversor-deriva.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require __DIR__ . '/../scripts/gerar-secoes.php';

const FIX = __DIR__ . '/fixtures/conversor/raiz';
const PARTIALS = ['pt/sec-03.php', 'en/sec-03.php', 'pt/sec-05.php', 'en/sec-05.php'];

/**
 * @return array{receitas:int,comparados:int,problemas:list<string>}
 */
function deriva(string $raiz): array
{
    require_once __DIR__ . '/../scripts/conversor/comparador.php';
    $receitas = 0;
    $comparados = 0;
    $problemas = [];
    foreach (glob($raiz . '/docs/content/receitas/edicao-*.php') ?: [] as $arquivo) {
        if (preg_match('/edicao-(\d+)\.php$/', $arquivo, $m) !== 1) {
            continue;
        }
        $n = (int) $m[1];
        $receitas++;
        $calculo = gerar_calcular($raiz, $n);
        foreach ($calculo['erros'] as $erro) {
            $problemas[] = "edicao {$n}: {$erro}";
        }
        foreach ($calculo['arquivos'] as $relativo => $esperado) {
            $comparados++;
            $caminho = "{$raiz}/src/content/edicao-{$n}/{$relativo}";
            if (!is_file($caminho)) {
                $problemas[] = "edicao {$n}: {$relativo} ausente (rode scripts/gerar-secoes.php --edicao {$n})";
                continue;
            }
            $c = comparador_comparar($esperado, (string) file_get_contents($caminho));
            if (!$c['igual']) {
                $problemas[] = "edicao {$n}: {$relativo} diverge do que a fonte gera, na linha {$c['linha']}, coluna {$c['coluna']} (corrija a FONTE e gere de novo; nunca o partial)";
            }
        }
    }
    return ['receitas' => $receitas, 'comparados' => $comparados, 'problemas' => $problemas];
}

function raiz_de_brinquedo(): string
{
    $r = sys_get_temp_dir() . '/deriva-' . bin2hex(random_bytes(4));
    mkdir($r . '/src/content/edicao-99', 0700, true);
    exec('cp -r ' . escapeshellarg(FIX . '/docs') . ' ' . escapeshellarg($r . '/docs'));
    exec('cp -r ' . escapeshellarg(FIX . '/esperado/.') . ' ' . escapeshellarg($r . '/src/content/edicao-99'));
    return $r;
}

function apagar(string $r): void
{
    if (str_starts_with($r, sys_get_temp_dir() . '/deriva-')) {
        exec('rm -rf ' . escapeshellarg($r));
    }
}

function contem(array $problemas, string ...$trechos): bool
{
    foreach ($problemas as $p) {
        $todos = true;
        foreach ($trechos as $t) {
            $todos = $todos && str_contains($p, $t);
        }
        if ($todos) {
            return true;
        }
    }
    return false;
}

$tmp = [];

// 1. brinquedo limpo: nada a reportar, os 4 arquivos comparados
$r = raiz_de_brinquedo();
$tmp[] = $r;
$d = deriva($r);
eq([], $d['problemas'], 'brinquedo limpo: sem problemas');
eq(1, $d['receitas'], 'brinquedo: 1 receita');
eq(4, $d['comparados'], 'brinquedo: 4 arquivos comparados');

// 2. partial gerado editado a mao: reprova, nomeia o arquivo e mostra onde
$r = raiz_de_brinquedo();
$tmp[] = $r;
$alvo = $r . '/src/content/edicao-99/pt/sec-03.php';
file_put_contents($alvo, str_replace('<code>codigo</code>', '<code>codigoX</code>', (string) file_get_contents($alvo)));
$d = deriva($r);
verdadeiro(contem($d['problemas'], 'edicao 99', 'pt/sec-03.php', 'diverge', 'linha'), 'editado a mao: aponta arquivo e linha: ' . json_encode($d['problemas']));
eq(1, count($d['problemas']), 'editado a mao: so esse problema');
eq(4, $d['comparados'], 'editado a mao: os 4 foram comparados');

// 3. partial ausente
$r = raiz_de_brinquedo();
$tmp[] = $r;
unlink($r . '/src/content/edicao-99/en/sec-05.php');
$d = deriva($r);
verdadeiro(contem($d['problemas'], 'en/sec-05.php', 'ausente'), 'ausente: reprova e nomeia: ' . json_encode($d['problemas']));

// 4. a fonte mudou e o partial nao foi regerado
$r = raiz_de_brinquedo();
$tmp[] = $r;
$md = $r . '/docs/content/brinquedo.md';
file_put_contents($md, str_replace('item um', 'item UM', (string) file_get_contents($md)));
$d = deriva($r);
verdadeiro(contem($d['problemas'], 'pt/sec-03.php', 'diverge'), 'fonte mudou sem regerar: reprova: ' . json_encode($d['problemas']));

// 5. a fonte viola uma trava: reprova com arquivo:linha:regra
$r = raiz_de_brinquedo();
$tmp[] = $r;
$md = $r . '/docs/content/brinquedo.md';
file_put_contents($md, str_replace('abertura`', 'abertura.`', (string) file_get_contents($md)));
$d = deriva($r);
verdadeiro(contem($d['problemas'], 'brinquedo.md:7: R1'), 'trava violada na fonte: reprova: ' . json_encode($d['problemas']));

// 6. so a edicao com receita entra: um src/content sem receita nao e comparado, e nao ha receita = reprova a varredura
$r = raiz_de_brinquedo();
$tmp[] = $r;
exec('rm -rf ' . escapeshellarg($r . '/docs/content/receitas'));
$d = deriva($r);
eq(0, $d['receitas'], 'sem receitas: 0 receitas');
eq(0, $d['comparados'], 'sem receitas: nada comparado');

// 7. a arvore REAL: piso de varredura nao vazia, e zero problema (a #5 publicada e a fonte unica das proximas)
$real = deriva(dirname(__DIR__));
verdadeiro($real['receitas'] >= 1, 'piso: ao menos 1 receita na arvore real (achou ' . $real['receitas'] . ')');
verdadeiro($real['comparados'] >= 12, 'piso: ao menos 12 arquivos comparados na arvore real (comparou ' . $real['comparados'] . ')');
eq([], $real['problemas'], 'arvore real sem deriva');

foreach ($tmp as $r) {
    apagar($r);
}
terminar();
