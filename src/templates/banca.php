<?php
declare(strict_types=1);
/**
 * src/templates/banca.php — a BANCA (home): a fileira de capas + os ganchos W6.
 *
 * Recebe de render-banca.php: $ctx (chrome, modo 'banca'), $t (i18n), $capas
 * (lista das edições PUBLICADAS já com idade/URL/frame), $idioma.
 *
 * Estrutura (IA-WIREFRAME §3.1, mock 10): masthead → main[ lede → ganchos W6
 * (hero/press-start/chamadas/linha do tempo, em SCAFFOLD) → §banca = a fileira
 * de capas (data-driven, o coração) ] → rodapé.
 *
 * Herda a MESMA mesa/folha do template de edição (edicao.css): .bancada + a
 * .pagina.folha centrada no desktop. A home é a folha mais NOVA (--idade:0); as
 * capas dentro dela amarelam cada uma pela sua idade real (idade_folha()).
 *
 * Os interativos (quadradinho, PRESS START, scrubber, chamadas) NÃO são
 * implementados aqui — são itens W6. Ficam como ganchos/scaffold explícitos.
 */

$banca   = $t['banca'];
$ganchos = $banca['ganchos'];

$head = [
    'lang'      => (string) $t['html_lang'],
    'og_locale' => (string) $t['og_locale'],
    'titulo'    => 'GLYFESSE · ' . $banca['secao_titulo'],
    'canonical' => (string) $ctx['url_banca'],
    'hreflang'  => $ctx['hreflang'],
];
require __DIR__ . '/../includes/head.php';
?>
<body data-material="papel">

<a class="skip" href="#banca"><?= h((string) $banca['skip']) ?></a>

<?php /* a BANCADA do maker: peças decorativas nas guteiras (só desktop, via CSS).
   Herdada IGUAL à da edição — a home é a mesma revista na mesma mesa. */ ?>
<div class="bancada" aria-hidden="true">
  <div class="pc bp p-bp1"><span class="cota"></span></div>
  <div class="pc pcb p-pcb1"></div>
  <div class="pc regua p-regua1"></div>
  <div class="pc bp p-bp2"><span class="cota"></span></div>
  <div class="pc pcb p-pcb2"></div>
  <div class="pc lapis p-lapis"><span class="corpo"></span><span class="ferrule"></span><span class="ponta"></span></div>
  <div class="pc chip p-chip1"><span class="corpo"></span></div>
  <div class="pc chip p-chip2"><span class="corpo"></span></div>
</div>

<div class="pagina folha" style="--idade:0">

<?php require __DIR__ . '/../includes/masthead.php'; ?>

<main>
<div class="banca-corpo">

  <?php /* lede da home (W5 placeholder — copy final co-decidida com o líder) */ ?>
  <p class="banca-lede"><?= h((string) $banca['lede']) ?></p>

  <?php /* ══ GANCHOS W6 · os interativos (NÃO implementados aqui) ══
     Cada um é uma <section> reservada com scaffold explícito, igual ao scaffold
     das seções da edição. A ordem segue o wireframe §3.1. */ ?>
  <?php foreach (['hero', 'pressstart', 'chamadas', 'linha'] as $g): ?>
  <section class="gancho-w6" id="gancho-<?= h($g) ?>" aria-label="<?= h((string) $ganchos[$g]['label']) ?>">
    <div class="scaffold">
      <span class="tag"><?= h((string) $banca['w6_tag']) ?></span>
      <p><b><?= h((string) $ganchos[$g]['nome']) ?></b></p>
    </div>
  </section>
  <?php endforeach; ?>

  <?php /* ══ A FILEIRA DE CAPAS · o coração da banca (data-driven de $capas) ══
     Landmark = <section> (não <nav>): é o corpo editorial da banca, não um menu
     (IA-WIREFRAME §7.3). Só edições PUBLICADAS entram (o guard mora no helper). */ ?>
  <section class="banca" id="banca" aria-labelledby="banca-h2">
    <div class="banca-tit">
      <h2 class="secao-nome" id="banca-h2"><?= h((string) $banca['secao_titulo']) ?></h2>
      <span class="conta"><?= count($capas) ?> <?= h((string) $banca['secao_meta']) ?></span>
    </div>

    <div class="prateleira">
      <?php foreach ($capas as $i => $c): ?>
      <?php
        // dimensões reais do frame (width/height explícitos = zero CLS)
        $frame_fs  = $c['frame'] !== null ? __DIR__ . '/../../public_html' . $c['frame'] : null;
        $frame_dim = ($frame_fs !== null && is_file($frame_fs)) ? getimagesize($frame_fs) : false;
      ?>
      <a class="ed folha" style="--idade:<?= h((string) $c['idade']) ?>" href="<?= h((string) $c['url']) ?>">
        <?php if ($i === 0): ?>
        <span class="nova"><?= h((string) $banca['nova']) ?></span>
        <?php endif; ?>

        <div class="mini-mast">
          <span class="marca">GLYFESSE</span>
          <span class="ref"><?= h((string) $t['exp_ano']) ?> 1 · <?= h((string) $t['exp_numero']) ?> <?= (int) $c['numero'] ?> · <?= h(data_por_extenso((string) $c['data'], $idioma, $t)) ?></span>
        </div>

        <h3 class="ct"><?= h((string) $c['titulo']) ?></h3>
        <p class="ch"><?= h((string) $c['dek']) ?></p>

        <?php if ($c['frame'] !== null && $frame_dim !== false): ?>
        <figure class="ed-frame aceso">
          <img src="<?= h((string) $c['frame']) ?>"
               alt="<?= h((string) ($c['frame_alt'] ?? '')) ?>"
               width="<?= (int) $frame_dim[0] ?>" height="<?= (int) $frame_dim[1] ?>"
               loading="lazy" decoding="async">
        </figure>
        <?php endif; ?>

        <?php if ($c['visual']): ?>
        <span class="selo-jogo"><?= h((string) $banca['jogavel']) ?></span>
        <?php endif; ?>
      </a>
      <?php endforeach; ?>
    </div>
  </section>

</div><!-- /.banca-corpo -->
</main>

<?php require __DIR__ . '/../includes/rodape.php'; ?>

</div><!-- /.pagina -->

<?php /* GANCHO (W6+): aqui entra o enhancement client-side dos interativos da
   home — o quadradinho jogável (hero), o PRESS START (boot CRT), o scrubber da
   linha do tempo e a LCD "recompilando". Tudo é progressive enhancement: sem JS
   a banca já lê, navega e troca de idioma. Não implementado aqui (anti-OE). */ ?>
</body>
</html>
