<?php

declare(strict_types=1);

/**
 * tests/conversor-verbatim.test.php - Chave 'verbatim' da parte da receita (decisao do lider de 29/10/2026).
 * Desliga SO a R1 (fala com ponto final) nas falas DAQUELA parte. R2, R3 e R4 continuam valendo nela.
 * Sem a chave, nada muda. Fixtures proprias: em memoria e numa raiz de brinquedo em sys_get_temp_dir(),
 * apagada ao fim (so o prefixo conv-verb- e apagado).
 *   php tests/conversor-verbatim.test.php
 */

require __DIR__ . '/apoio/afirmar.php';
require_once __DIR__ . '/../scripts/gerar-secoes.php';

const VERB_PREFIXO_TMP = '/conv-verb-';
const VERB_TRAVESSAO = "\u{2014}";

function voz_no(array $itens, int $linha = 1): array
{
    return ['tipo' => 'voz', 'linha' => $linha, 'itens' => $itens];
}

function fala(string $texto): array
{
    return ['tipo' => 'fala', 'persona' => 'gus', 'caminho' => '~/x', 'texto' => $texto, 'longo' => false, 'numero' => null, 'linha' => 1];
}

function pensa(string $texto): array
{
    return ['tipo' => 'pensa', 'persona' => 'gus', 'caminho' => null, 'texto' => $texto, 'longo' => false, 'numero' => null, 'linha' => 1];
}

/** Codigos das regras reprovadas ("a.md:1: R1: trecho" -> "R1"). */
function regras(array $mensagens): array
{
    return array_map(static fn(string $m): string => explode(': ', $m)[1] ?? '?', $mensagens);
}

/** Receita de brinquedo: uma secao, uma parte, com o conteudo extra informado (chave verbatim ou nada). */
function receita_de_brinquedo(string $extra): string
{
    return "<?php\nreturn ['secoes' => [1 => ['tipo' => 'prosa', 'partes' => [[\n"
        . "  'pt' => ['fonte' => 'f.md', 'inicio' => '## pt-BR'],\n"
        . "  'en' => ['fonte' => 'f.md', 'inicio' => '## EN'],\n"
        . $extra
        . "]]]]];\n";
}

/** Fonte de brinquedo: um bloco pt-BR e um EN, cada um com a linha de fala dada. */
function fonte_de_brinquedo(string $falaPt, string $falaEn): string
{
    return "## pt-BR\n\n`gus@glyfesse:~/x\$ {$falaPt}`\n\n---\n\n## EN\n\n`gus@glyfesse:~/x\$ {$falaEn}`\n\n---\n";
}

/** Cria a raiz temporaria (docs/content/f.md e a receita), roda gerar_calcular e devolve o resultado. */
function gerar_na_raiz(string $fonte, string $receita): array
{
    $dir = sys_get_temp_dir() . VERB_PREFIXO_TMP . bin2hex(random_bytes(4));
    mkdir($dir . '/docs/content/receitas', 0700, true);
    file_put_contents($dir . '/docs/content/f.md', $fonte);
    file_put_contents($dir . '/docs/content/receitas/edicao-99.php', $receita);
    try {
        return gerar_calcular($dir, 99);
    } finally {
        if (str_starts_with($dir, sys_get_temp_dir() . VERB_PREFIXO_TMP)) {
            exec('rm -rf ' . escapeshellarg($dir));
        }
    }
}

// (a) parte verbatim aceita fala terminando em ponto
eq([], travas_verificar([voz_no([fala('termina com ponto.')])], 'a.md', true), '(a) parte verbatim aceita fala com ponto final');

// (b) a MESMA fala numa parte sem a chave continua reprovada pela R1
eq(['R1'], regras(travas_verificar([voz_no([fala('termina com ponto.')])], 'a.md')), '(b) sem a chave, a mesma fala segue reprovada pela R1');

// (c) parte verbatim com travessao continua reprovada pela R3
eq(['R3'], regras(travas_verificar([voz_no([fala('a ' . VERB_TRAVESSAO . ' b.')])], 'a.md', true)), '(c) parte verbatim com travessao segue reprovada pela R3');

// (d) a chave desliga so a R1: pensamento com ponto segue reprovado pela R2
eq(['R2'], regras(travas_verificar([voz_no([pensa('pensa.')])], 'a.md', true)), '(d) parte verbatim segue reprovando pensamento com ponto (R2)');

// pipeline: a chave precisa chegar AO GERADOR pela receita, nao so ao travas_verificar
$falaPonto = fonte_de_brinquedo('Eu sei o caminho.', 'I know the way.');
$r = gerar_na_raiz($falaPonto, receita_de_brinquedo("  'verbatim' => true,\n"));
eq([], $r['erros'], '(f) receita com verbatim => true gera sem erro a fala com ponto');
verdadeiro(array_key_exists('pt/sec-01.php', $r['arquivos']), '(f) gera pt/sec-01.php');

$r = gerar_na_raiz($falaPonto, receita_de_brinquedo(''));
verdadeiro(in_array('R1', regras($r['erros']), true), '(g) receita sem a chave reprova a mesma fala pela R1');

$falaTravessao = fonte_de_brinquedo('Eu sei ' . VERB_TRAVESSAO . ' o caminho.', 'I know the way.');
$r = gerar_na_raiz($falaTravessao, receita_de_brinquedo("  'verbatim' => true,\n"));
verdadeiro(in_array('R3', regras($r['erros']), true), '(h) receita verbatim com travessao reprova pela R3');

// leitura da chave: so true liga a excecao; qualquer outra coisa mantem a R1 (fail-closed)
eq(true, travas_verbatim_da_parte(['verbatim' => true]), '(e) verbatim => true liga a exceção');
eq(false, travas_verbatim_da_parte([]), '(e) sem a chave a R1 vale');
eq(false, travas_verbatim_da_parte(['verbatim' => 'sim']), '(e) valor que nao e true nao liga a exceção (fail-closed)');

terminar();
