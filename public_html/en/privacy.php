<?php

declare(strict_types=1);

/**
 * public_html/en/privacy.php — front controller of the Privacy Policy in
 * English (REMED-LGPD). Twin of pt/privacidade.php.
 *
 * Thin, same shape as en/edition.php and en/index.php: just loads config +
 * the output helpers and calls the template. STATIC page: not sourced from
 * $edicoes, no slug. Dev: php -S -t public_html /en/privacy.php.
 */

require_once __DIR__ . '/../../src/lib/config.php';
require_once __DIR__ . '/../../src/lib/view.php';

$idioma = 'en';
$t = require __DIR__ . '/../../src/i18n/' . $idioma . '.php';

require __DIR__ . '/../../src/templates/privacidade.php';
