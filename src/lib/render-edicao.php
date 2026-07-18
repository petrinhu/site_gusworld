<?php

declare(strict_types=1);

/**
 * src/lib/render-edicao.php — a cola dos front controllers /pt/ e /en/.
 *
 * Carrega $edicoes, valida o slug pedido, resolve a edição PUBLICADA via helper
 * (rascunho/inexistente → 404) e renderiza o template. É o único ponto que
 * junta dado + chrome; publicar uma edição não toca em HTML (D-STACK).
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/view.php';
require_once __DIR__ . '/../../data/edicoes-helpers.php';
require_once __DIR__ . '/contexto-edicao.php';

/**
 * Descobre o slug pedido: prioriza ?slug= (a .htaccess de produção o passa);
 * cai para o basename do caminho (dev com pretty-URL). Devolve '' se ausente.
 */
function slug_pedido(): string
{
    if (isset($_GET['slug']) && is_string($_GET['slug'])) {
        return $_GET['slug'];
    }
    $caminho = (string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    $base = basename($caminho);
    return $base === 'edicao.php' || $base === 'edition.php' ? '' : $base;
}

/**
 * Ponto de entrada dos front controllers. Recebe o idioma da pasta física.
 */
function render_edicao(string $idioma): void
{
    $edicoes = require __DIR__ . '/../../data/edicoes.php';
    $t = require __DIR__ . '/../i18n/' . $idioma . '.php';

    $slug = slug_pedido();

    // Fail-fast: allowlist estrita antes de tocar o dado (CONVENCOES-JS-PHP).
    if (preg_match('/^[a-z0-9-]{1,64}$/', $slug) !== 1) {
        render_404($idioma, $t);
        return;
    }

    $ctx = contexto_edicao($edicoes, $idioma, $slug);
    if ($ctx === null) {
        render_404($idioma, $t);
        return;
    }

    $idade  = idade_folha($edicoes, $ctx['data']);
    $secoes = require __DIR__ . '/secoes.php';

    include __DIR__ . '/../templates/edicao.php';
}

/**
 * 404 mínimo no chrome da revista. A microcopy in-world definitiva é slot do
 * ux-writer + líder (IA-WIREFRAME §3.4); aqui é o esqueleto correto.
 *
 * @param array<string, mixed> $t
 */
function render_404(string $idioma, array $t): void
{
    http_response_code(404);
    include __DIR__ . '/../templates/erro-404.php';
}
