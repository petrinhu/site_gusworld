<?php

declare(strict_types=1);

/**
 * tests/conteudo-secao.test.php - teste do RESOLVER do partial de conteúdo
 * (src/lib/conteudo.php: caminho_conteudo_secao). ZERO dependência (asserções
 * na unha, igual ao node --test dos mini-apps e ao cupom-pct.test.php). Fica
 * FORA de public_html/.
 *   php tests/conteudo-secao.test.php   → "ALL GREEN" e exit 0, ou exit 1 no 1o erro.
 *
 * ★ Por que testar isto? É a ÚNICA lógica do mecanismo de conteúdo (D-STACK,
 * publish=flip). Se a convenção de caminho quebrar (idioma, número, id), toda
 * seção some ou vaza scaffold silenciosamente. E os guards de entrada (allowlist
 * de idioma + padrão sec-NN) são a rede contra path traversal caso um id ruim
 * escape de secoes.php.
 */

require_once __DIR__ . '/../src/lib/conteudo.php';

$falhas = 0;
$n = 0;

function eq($esperado, $obtido, string $msg): void
{
    global $falhas, $n;
    $n++;
    if ($esperado === $obtido) {
        return;
    }
    $falhas++;
    fwrite(STDERR, "  FAIL: {$msg}\n");
    fwrite(STDERR, "        esperado: " . var_export($esperado, true) . "\n");
    fwrite(STDERR, "        obtido:   " . var_export($obtido, true) . "\n");
}

$base = '/app/src/content';

// ── caminho feliz: pt e en compartilham a pasta da edição, id idêntico ──
eq(
    '/app/src/content/edicao-1/pt/sec-03.php',
    caminho_conteudo_secao($base, 1, 'pt', 'sec-03'),
    'pt/sec-03 monta o caminho canônico'
);
eq(
    '/app/src/content/edicao-1/en/sec-03.php',
    caminho_conteudo_secao($base, 1, 'en', 'sec-03'),
    'en/sec-03 = mesmo id, subpasta de idioma diferente'
);
eq(
    '/app/src/content/edicao-12/pt/sec-19.php',
    caminho_conteudo_secao($base, 12, 'pt', 'sec-19'),
    'número de 2 dígitos e sec-19 (fim da anatomia)'
);

// ── guard de idioma: fora da allowlist → null (nunca compõe) ──
eq(null, caminho_conteudo_secao($base, 1, 'fr', 'sec-03'), 'idioma fora da allowlist = null');
eq(null, caminho_conteudo_secao($base, 1, '', 'sec-03'), 'idioma vazio = null');
eq(null, caminho_conteudo_secao($base, 1, 'PT', 'sec-03'), 'idioma é case-sensitive (PT != pt) = null');

// ── guard de número: só edição real (>= 1) ──
eq(null, caminho_conteudo_secao($base, 0, 'pt', 'sec-03'), 'numero 0 = null');
eq(null, caminho_conteudo_secao($base, -3, 'pt', 'sec-03'), 'numero negativo = null');

// ── guard de id: EXATO sec-NN; barra path traversal e ids livres ──
eq(null, caminho_conteudo_secao($base, 1, 'pt', 'sec-3'), 'sec-3 (1 dígito) não casa o padrão');
eq(null, caminho_conteudo_secao($base, 1, 'pt', 'sec-003'), 'sec-003 (3 dígitos) não casa');
eq(null, caminho_conteudo_secao($base, 1, 'pt', 'capa'), 'id livre (capa) = null');
eq(null, caminho_conteudo_secao($base, 1, 'pt', '../../etc/passwd'), 'path traversal barrado');
eq(null, caminho_conteudo_secao($base, 1, 'pt', 'sec-03/../../x'), 'traversal disfarçado de sec-NN barrado');

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} asserções FALHARAM.\n");
    exit(1);
}
fwrite(STDOUT, "ALL GREEN ({$n} asserções)\n");
exit(0);
