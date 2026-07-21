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
 *   'og_title'  → título do card social (default: o <title>)
 *   'desc'      → descrição do card social (opcional)
 *   'og_image'  → caminho root-absoluto do card (default: /assets/og-launch.jpg)
 *   'og_type'   → 'website' (default) | 'article'
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

<?php /* Open Graph + Twitter Card: o card de preview do link (X, Bluesky, etc.).
   URLs ABSOLUTAS (SITE_BASE_URL) — o crawler não resolve caminho relativo. Só o
   que já é público. Defaults seguros p/ páginas sem contexto (ex.: 404). */
$og_type  = (string) ($head['og_type'] ?? 'website');
$og_title = (string) ($head['og_title'] ?? $head['titulo'] ?? 'Glyfesse');
$og_desc  = (string) ($head['desc'] ?? '');
$og_url   = (string) ($head['canonical'] ?? SITE_BASE_URL . '/');
$og_image = SITE_BASE_URL . (string) ($head['og_image'] ?? '/assets/og-launch.jpg');
?>
<meta property="og:type" content="<?= h($og_type) ?>">
<meta property="og:site_name" content="Glyfesse">
<meta property="og:url" content="<?= h($og_url) ?>">
<meta property="og:title" content="<?= h($og_title) ?>">
<?php if ($og_desc !== ''): ?>
<meta property="og:description" content="<?= h($og_desc) ?>">
<?php endif; ?>
<meta property="og:image" content="<?= h($og_image) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="<?= h($head['og_locale'] ?? 'pt_BR') ?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= h($og_title) ?>">
<?php if ($og_desc !== ''): ?>
<meta name="twitter:description" content="<?= h($og_desc) ?>">
<?php endif; ?>
<meta name="twitter:image" content="<?= h($og_image) ?>">

<link rel="icon" href="<?= $assets ?>/favicon.png" sizes="any">

<?php /* preload das fontes acima da dobra: manchete, corpo e o mono da UI do jogo (LCP) */ ?>
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?= $assets ?>/fonts/archivo-narrow-latin-700-normal.woff2">
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?= $assets ?>/fonts/vollkorn-latin-400-normal.woff2">
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?= $assets ?>/fonts/PixelOperatorMono.woff2">

<link rel="stylesheet" href="<?= h(asset($assets . '/css/tokens.css')) ?>">
<link rel="stylesheet" href="<?= h(asset($assets . '/css/edicao.css')) ?>">
</head>
