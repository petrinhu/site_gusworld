<?php

declare(strict_types=1);

/**
 * public_html/pt/privacidade.php — front controller da Política de Privacidade
 * em pt-br (REMED-LGPD).
 *
 * Thin, no mesmo desenho de pt/edicao.php e pt/index.php: só carrega a config
 * + os helpers de saída e chama o template. Página ESTÁTICA — não vem de
 * $edicoes, não tem slug. Em dev: php -S -t public_html /pt/privacidade.php.
 */

require_once __DIR__ . '/../../src/lib/config.php';
require_once __DIR__ . '/../../src/lib/view.php';

$idioma = 'pt';
$t = require __DIR__ . '/../../src/i18n/' . $idioma . '.php';

require __DIR__ . '/../../src/templates/privacidade.php';
