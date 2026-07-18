<?php

declare(strict_types=1);

/**
 * public_html/pt/index.php — front controller da BANCA (home) em pt-br.
 *
 * Thin, igual ao de edição: só chama a cola. Servido em /pt/ (o DirectoryIndex
 * do Apache o resolve). Em dev: php -S -t public_html /pt/index.php.
 */

require __DIR__ . '/../../src/lib/render-banca.php';
render_banca('pt');
