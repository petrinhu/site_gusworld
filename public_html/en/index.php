<?php

declare(strict_types=1);

/**
 * public_html/en/index.php — the STAND (home) front controller in English.
 * Twin of pt/index.php.
 */

require __DIR__ . '/../../src/lib/render-banca.php';
render_banca('en');
