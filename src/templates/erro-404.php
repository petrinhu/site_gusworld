<?php
declare(strict_types=1);
/**
 * src/templates/erro-404.php — 404 mínimo no chrome da revista.
 *
 * Recebe $idioma e $t. `noindex, follow`, sem hreflang/canonical cruzado
 * (IA-WIREFRAME §3.4). A microcopy in-world definitiva (pitada de Sylvarin) é
 * slot do ux-writer + líder; aqui é o esqueleto correto, não a copy final.
 */
$outro = $idioma === 'pt' ? 'en' : 'pt';
$head = [
    'lang'      => (string) $t['html_lang'],
    'og_locale' => (string) $t['og_locale'],
    'titulo'    => 'GLYFESSE · ' . $t['erro_404_titulo'],
    'robots'    => 'noindex, follow',
    'hreflang'  => [],
];
require __DIR__ . '/../includes/head.php';
?>
<body class="folha" data-material="papel" style="--idade:.5">

<a class="skip" href="#erro-404"><?= h((string) $t['skip_indice']) ?></a>

<header class="masthead" role="banner">
  <div class="masthead-inner">
    <a class="logo" href="<?= h(url_banca($idioma)) ?>" title="<?= h((string) $t['wordmark_titulo']) ?>">GLYFESSE</a>
    <div class="col-meta">
      <a class="imprint aceso" href="<?= h(url_banca($outro)) ?>#glyfe" hreflang="<?= h($outro) ?>" lang="<?= h($outro) ?>">
        <span class="l1" aria-hidden="true"><?= h((string) $t['lcd']['l1']) ?></span>
        <span class="l2"><span class="cmd"><?= h((string) $t['lcd']['cmd']) ?></span><i class="run" aria-hidden="true"></i></span>
        <span class="sr"><?= h((string) $t['lcd']['sr']) ?></span>
      </a>
    </div>
  </div>
</header>

<main>
  <article class="edicao">
    <section class="erro-404" id="erro-404">
      <h1 class="manchete"><?= h((string) $t['erro_404_titulo']) ?></h1>
      <p class="dek"><?= h((string) $t['erro_404_texto']) ?></p>
      <p class="up-wrap"><a class="up" href="<?= h(url_banca($idioma)) ?>"><?= h((string) $t['erro_404_voltar']) ?></a></p>
    </section>
  </article>
</main>

<?php require __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>
