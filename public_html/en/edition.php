<?php

declare(strict_types=1);

/**
 * public_html/en/edition.php — front controller of the English editions.
 *
 * This folder's .htaccess rewrites /en/edition-N → edition.php?slug=edition-N.
 * In dev (php -S -t public_html) just hit /en/edition.php?slug=edition-3.
 */

require __DIR__ . '/../../src/lib/render-edicao.php';
render_edicao('en');
