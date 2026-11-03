<?php

declare(strict_types=1);

/**
 * tests/travessao-varredura.test.php - varredura de travessao do portao (O4, Edicao #7).
 *
 * Contrato: travessao_varrer(string $raiz, int $edicaoMinima): array em
 * scripts/travessao/varredura.php, devolvendo
 * ['encontrados' => int, 'analisados' => int, 'falharam' => int, 'achados' => list<string>].
 *
 * Os glifos entram por escape ("\u{...}") e por concatenacao, para que este fonte
 * nunca carregue o caractere cru (o portao global de pre-commit reprovaria).
 */

require_once __DIR__ . '/apoio/afirmar.php';
require_once __DIR__ . '/../scripts/travessao/varredura.php';

const TV_EM_DASH = "\u{2014}";
const TV_ENTIDADE = '&' . 'mdash;';
const TV_ARQ_7 = 'src/content/edicao-7/pt/sec-04.php';

/** Apaga uma raiz de brinquedo. Recusa qualquer caminho que nao seja uma raiz trav-var- do sys_get_temp_dir() (L-53). */
function tv_apagar_raiz(string $raiz): void
{
    $real = realpath($raiz);
    $base = realpath(sys_get_temp_dir());
    $seguro = $real !== false
        && $base !== false
        && dirname($real) === $base
        && str_starts_with(basename($real), 'trav-var-');
    if (!$seguro) {
        throw new RuntimeException("recusei apagar fora de uma raiz trav-var-: {$raiz}");
    }
    $itens = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($real, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($itens as $item) {
        if ($item->isDir()) {
            rmdir($item->getPathname());
        } else {
            unlink($item->getPathname());
        }
    }
    rmdir($real);
}

/** Cria um arquivo (e as pastas que faltam) dentro da raiz de brinquedo. */
function tv_escrever(string $raiz, string $relativo, string $conteudo): void
{
    $caminho = $raiz . '/' . $relativo;
    $pasta = dirname($caminho);
    if (!is_dir($pasta)) {
        mkdir($pasta, 0700, true);
    }
    file_put_contents($caminho, $conteudo);
}

/** Roda $usar numa raiz trav-var- nova e apaga a raiz no fim, mesmo se $usar lancar. */
function tv_com_raiz(callable $usar): void
{
    $raiz = sys_get_temp_dir() . '/trav-var-' . bin2hex(random_bytes(6));
    mkdir($raiz, 0700);
    try {
        $usar($raiz);
    } finally {
        tv_apagar_raiz($raiz);
    }
}

// a. arquivo da #7 com travessao cru: 1 arquivo encontrado, 1 achado com arquivo:linha
tv_com_raiz(function (string $raiz): void {
    // arrange
    tv_escrever($raiz, TV_ARQ_7, "<p>Antes " . TV_EM_DASH . " depois.</p>\n");

    // act
    $r = travessao_varrer($raiz, 7);

    // assert
    eq(1, $r['encontrados'], 'a: arquivo da #7 e encontrado');
    eq(1, $r['analisados'], 'a: arquivo da #7 e analisado');
    eq(1, count($r['achados']), 'a: um travessao cru gera exatamente um achado');
    verdadeiro(
        str_starts_with((string) ($r['achados'][0] ?? ''), 'src/content/edicao-7/pt/sec-04.php:1: '),
        'a: o achado aponta arquivo:linha relativo a raiz'
    );
});

// b. o mesmo arquivo limpo: nenhum achado
tv_com_raiz(function (string $raiz): void {
    // arrange
    tv_escrever($raiz, TV_ARQ_7, "<p>Antes, depois.</p>\n");

    // act
    $r = travessao_varrer($raiz, 7);

    // assert
    eq(1, $r['encontrados'], 'b: arquivo limpo da #7 continua encontrado');
    eq([], $r['achados'], 'b: arquivo limpo nao gera achado');
});

// c. o mesmo com a entidade &mdash;: 1 achado
tv_com_raiz(function (string $raiz): void {
    // arrange
    tv_escrever($raiz, TV_ARQ_7, "<p>Antes " . TV_ENTIDADE . " depois.</p>\n");

    // act
    $r = travessao_varrer($raiz, 7);

    // assert
    eq(1, count($r['achados']), 'c: a entidade &mdash; gera um achado');
});

// d. docs/content/edicao-6-*.md com travessao e edicaoMinima 7: ignorado
tv_com_raiz(function (string $raiz): void {
    // arrange
    tv_escrever($raiz, 'docs/content/edicao-6-x.md', "Texto " . TV_EM_DASH . " antigo.\n");

    // act
    $r = travessao_varrer($raiz, 7);

    // assert
    eq(0, $r['encontrados'], 'd: arquivo da #6 nao entra na varredura da #7');
    eq([], $r['achados'], 'd: arquivo da #6 nao gera achado');
});

// d2. docs/content/edicao-7-*.md com travessao: entra e gera achado
tv_com_raiz(function (string $raiz): void {
    // arrange
    tv_escrever($raiz, 'docs/content/edicao-7-x.md', "Texto " . TV_EM_DASH . " novo.\n");

    // act
    $r = travessao_varrer($raiz, 7);

    // assert
    eq(1, $r['encontrados'], 'd2: docs/content/edicao-7-*.md entra na varredura');
    eq(1, count($r['achados']), 'd2: travessao em docs da #7 gera achado');
});

// e. raiz sem nenhum arquivo da #7 em diante: encontrados 0 (quem chama reprova)
tv_com_raiz(function (string $raiz): void {
    // act
    $r = travessao_varrer($raiz, 7);

    // assert
    eq(
        ['encontrados' => 0, 'analisados' => 0, 'falharam' => 0, 'achados' => []],
        $r,
        'e: raiz vazia devolve o formato completo com zeros'
    );
});

// g. comparacao numerica: edicao-10 entra com edicaoMinima 7, edicao-6 nao (ordem lexicografica nao serve)
tv_com_raiz(function (string $raiz): void {
    // arrange
    tv_escrever($raiz, 'src/content/edicao-6/pt/x.php', "<p>" . TV_EM_DASH . "</p>\n");
    tv_escrever($raiz, 'src/content/edicao-10/pt/x.php', "<p>" . TV_EM_DASH . "</p>\n");

    // act
    $r = travessao_varrer($raiz, 7);

    // assert
    eq(1, $r['encontrados'], 'g: so a edicao-10 entra (10 >= 7 como inteiro)');
    verdadeiro(
        str_starts_with((string) ($r['achados'][0] ?? ''), 'src/content/edicao-10/'),
        'g: o achado vem da edicao-10'
    );
});

// h. arquivo que nao e UTF-8 valido: conta como falharam, nao como analisado
tv_com_raiz(function (string $raiz): void {
    // arrange
    tv_escrever($raiz, TV_ARQ_7, "\xff\xfe<p>quebrado</p>\n");

    // act
    $r = travessao_varrer($raiz, 7);

    // assert
    eq(1, $r['encontrados'], 'h: arquivo invalido continua encontrado');
    eq(0, $r['analisados'], 'h: arquivo invalido nao conta como analisado');
    eq(1, $r['falharam'], 'h: arquivo invalido conta como falharam');
    eq([], $r['achados'], 'h: arquivo invalido nao gera achado falso');
});

// f. repositorio real: os arquivos da #7 (entrevista do Brunus) existem e estao limpos
$real = travessao_varrer(dirname(__DIR__), 7);
verdadeiro($real['encontrados'] >= 2, 'f: repositorio real tem >= 2 arquivos da #7 (entrevista)');
eq([], $real['achados'], 'f: nenhum travessao cru ou entidade nos arquivos da #7 do repositorio');
eq($real['encontrados'], $real['analisados'] + $real['falharam'], 'f: analisados + falharam === encontrados');
eq(0, $real['falharam'], 'f: nenhum arquivo da #7 ilegivel ou fora de UTF-8');

terminar();
