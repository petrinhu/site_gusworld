<?php
declare(strict_types=1);
/**
 * src/templates/edicao.php — o template de UMA edição (esqueleto data-driven).
 *
 * Recebe do render-edicao.php: $ctx (contexto), $t (i18n), $secoes (lista
 * estrutural), $idade (float 0..1 do envelhecimento).
 *
 * Estrutura (IA-WIREFRAME §3.2, mock 09): masthead → main.folha → capa (h1
 * data-driven) → índice #sumario (entradas + 3 links fixos) → seções #sec-03…
 * #sec-19 em SCAFFOLD → rodapé. Cada seção fecha com "↑ índice". A copy das
 * seções é co-decidida com o líder (W5): aqui é placeholder explícito.
 */

$head = [
    'lang'      => (string) $t['html_lang'],
    'og_locale' => (string) $t['og_locale'],
    'titulo'    => 'GLYFESSE · ' . $ctx['titulo'] . ' · #' . $ctx['numero'],
    'canonical' => (string) $ctx['url_self'],
    'hreflang'  => $ctx['hreflang'],
];
require __DIR__ . '/../includes/head.php';

// dimensões reais do frame (width/height explícitos = zero CLS)
$frame_fs = $ctx['frame'] !== null ? __DIR__ . '/../../public_html' . $ctx['frame'] : null;
$frame_dim = ($frame_fs !== null && is_file($frame_fs)) ? getimagesize($frame_fs) : false;
?>
<body data-material="papel">

<a class="skip" href="#sumario"><?= h((string) $t['skip_indice']) ?></a>

<div class="pagina folha" style="--idade:<?= h((string) $idade) ?>">

<?php require __DIR__ . '/../includes/masthead.php'; ?>

<main>
  <article class="edicao">

    <?php /* ══ 01 · CAPA (data-driven de $edicao) ══ */ ?>
    <div class="capa" id="capa">
      <h1 class="manchete"><?= h((string) $ctx['titulo']) ?></h1>
      <p class="dek"><?= h((string) $ctx['dek']) ?></p>
      <?php if ($ctx['frame'] !== null && $frame_dim !== false): ?>
      <figure class="capa-frame aceso">
        <img src="<?= h((string) $ctx['frame']) ?>"
             alt="<?= h((string) ($ctx['frame_alt'] ?? '')) ?>"
             width="<?= (int) $frame_dim[0] ?>" height="<?= (int) $frame_dim[1] ?>"
             loading="eager" decoding="async">
      </figure>
      <?php endif; ?>
    </div>

    <?php /* ══ 02 · ÍNDICE (#sumario): entradas + 3 links fixos ══ */ ?>
    <nav class="sumario" id="sumario" aria-label="<?= h((string) $t['indice_titulo']) ?>">
      <h2 class="secao-nome"><?= h((string) $t['indice_titulo']) ?></h2>
      <ol class="indice">
        <?php foreach ($secoes as $s): ?>
        <li>
          <a href="#<?= h($s['id']) ?>">
            <span class="pg"><?= h($s['num']) ?></span>
            <span class="pt"><?= h((string) $t['secoes'][$s['nome']]) ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ol>

      <div class="links-fixos">
        <a href="<?= h(SITE_LINKS_FIXOS['repo_jogo']) ?>" rel="external noopener"><?= h((string) $t['links_fixos']['repo_jogo']) ?></a>
        <a href="<?= h(SITE_LINKS_FIXOS['repo_motor']) ?>" rel="external noopener"><?= h((string) $t['links_fixos']['repo_motor']) ?></a>
        <a href="<?= h(SITE_LINKS_FIXOS['todo_jogo']) ?>" rel="external noopener" class="todo"><?= h((string) $t['links_fixos']['todo_jogo']) ?></a>
        <p class="gus"><span class="conector" aria-hidden="true">↳</span> "<?= h((string) $t['links_fixos']['gus']) ?>"</p>
      </div>

      <p class="indice-nota"><?= h((string) $t['indice_nota']) ?></p>
    </nav>

    <?php /* ══ 03 … 19 · as seções fixas em SCAFFOLD ══ */ ?>
    <?php foreach ($secoes as $s): ?>
    <section class="secao-bloco" id="<?= h($s['id']) ?>">
      <div class="secao">
        <span class="n"><?= h($s['num']) ?></span>
        <h2 class="secao-nome"><?= h((string) $t['secoes'][$s['nome']]) ?></h2>
        <span class="grupo"><?= h((string) $t['grupos'][$s['grupo']]) ?></span>
      </div>
      <div class="scaffold">
        <span class="tag"><?= h((string) $t['scaffold_tag']) ?></span>
        <p><?= h((string) $t['scaffold_texto']) ?></p>
      </div>
      <p class="up-wrap"><a class="up" href="#sumario"><?= h((string) $t['up_indice']) ?></a></p>
    </section>
    <?php endforeach; ?>

    <p class="up-wrap up-fim"><a class="up" href="#sumario"><?= h((string) $t['up_voltar']) ?></a></p>

  </article>
</main>

<?php require __DIR__ . '/../includes/rodape.php'; ?>

</div><!-- /.pagina -->

<?php /* GANCHO (W6+): aqui entra o enhancement client-side — a LCD "recompilando"
   na chegada por #glyfe (js/lang-core.js) e o toggle de som. Tudo é progressive
   enhancement: sem JS a página já navega, lê e troca de idioma. Não implementado
   neste esqueleto (anti-OE). */ ?>
</body>
</html>
