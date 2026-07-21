<?php
declare(strict_types=1);
/**
 * src/includes/head.php — o <head> parametrizado, comum a toda página pública.
 *
 * Espera um array $head já montado pelo chamador:
 *   'lang'      → 'pt-br' | 'en'          (atributo lang do <html>)
 *   'og_locale' → 'pt_BR' | 'en_US'
 *   'titulo'    → texto do <title> (já legível, será escapado aqui)
 *   'canonical' → URL canônica absoluta
 *   'hreflang'  → array<string,string> (pt-br/en/x-default) ou [] (ex.: 404)
 *   'robots'    → string opcional (ex.: 'noindex, follow' no 404)
 *
 * Zero terceiro: fontes e CSS são self-hosted (AUD-LGPD). Caminhos root-absolutos
 * (/assets/…) resolvem igual em produção e sob `php -S -t public_html`.
 */
$head = $head ?? [];
$assets = '/assets';
?>
<!doctype html>
<html lang="<?= h($head['lang'] ?? 'pt-br') ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($head['titulo'] ?? 'GLYFESSE') ?></title>
<?php if (!empty($head['robots'])): ?>
<meta name="robots" content="<?= h($head['robots']) ?>">
<?php endif; ?>
<?php if (!empty($head['canonical'])): ?>
<link rel="canonical" href="<?= h($head['canonical']) ?>">
<?php endif; ?>
<?php foreach (($head['hreflang'] ?? []) as $lang => $url): ?>
<link rel="alternate" hreflang="<?= h((string) $lang) ?>" href="<?= h((string) $url) ?>">
<?php endforeach; ?>

<meta name="theme-color" content="#0d1520">
<meta name="color-scheme" content="light dark">
<meta property="og:locale" content="<?= h($head['og_locale'] ?? 'pt_BR') ?>">

<link rel="icon" href="<?= $assets ?>/favicon.png" sizes="any">

<?php /* preload das fontes acima da dobra: manchete, corpo e o mono da UI do jogo (LCP) */ ?>
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?= $assets ?>/fonts/archivo-narrow-latin-700-normal.woff2">
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?= $assets ?>/fonts/vollkorn-latin-400-normal.woff2">
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?= $assets ?>/fonts/PixelOperatorMono.woff2">

<link rel="stylesheet" href="<?= h(asset($assets . '/css/tokens.css')) ?>">
<link rel="stylesheet" href="<?= h(asset($assets . '/css/edicao.css')) ?>">
</head>
