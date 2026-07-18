<?php

declare(strict_types=1);

/**
 * public_html/pt/edicao.php — front controller das edições em pt-br.
 *
 * A .htaccess desta pasta reescreve /pt/edicao-N → edicao.php?slug=edicao-N.
 * Em dev (php -S -t public_html) basta acessar /pt/edicao.php?slug=edicao-3.
 */

require __DIR__ . '/../../src/lib/render-edicao.php';
render_edicao('pt');
