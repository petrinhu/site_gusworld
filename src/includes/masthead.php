<?php
declare(strict_types=1);
/**
 * src/includes/masthead.php — o header[banner]: wordmark + expediente + LCD.
 *
 * Espera $ctx (contexto da edição) e $t (i18n do idioma). Reusável por edição,
 * banca e 404 (o 404 chama com um $ctx reduzido).
 *
 * A LCD (mock 13, tratamento A) é um <a> REAL para a URL gêmea: funciona sem
 * JS (é navegação, não troca de texto no cliente). O fragmento #glyfe só liga
 * o efeito visual de "recompilar" na chegada (progressive enhancement). A LCD
 * NÃO veste o prompt de voz do Gus — é mostrador de máquina (project-i18n-switch).
 */
$exp_ano    = h((string) $t['exp_ano']);
$exp_numero = h((string) $t['exp_numero']);
$par        = h((string) $ctx['idioma_par']);
$lcd        = $t['lcd'];
?>
<header class="masthead" role="banner">
  <div class="masthead-inner">
    <a class="logo" href="<?= h((string) $ctx['url_banca']) ?>" title="<?= h((string) $t['wordmark_titulo']) ?>">GLYFESSE</a>

    <div class="col-meta">
      <p class="meta">
        <?= $exp_ano ?> 1 · <?= $exp_numero ?> <b><?= h((string) $ctx['numero']) ?></b><br>
        <?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?><br>
        gusworld.site
      </p>

      <a class="imprint aceso" id="imprint"
         href="<?= h((string) $ctx['url_par']) ?>#glyfe"
         hreflang="<?= $par ?>" lang="<?= $par ?>"
         data-log1="<?= h((string) $lcd['cmd']) ?>" data-log2="build ok">
        <span class="l1" aria-hidden="true"><?= h((string) $lcd['l1']) ?></span>
        <span class="l2"><span class="cmd"><?= h((string) $lcd['cmd']) ?></span><i class="run" aria-hidden="true"></i></span>
        <span class="sr"><?= h((string) $lcd['sr']) ?></span>
      </a>
    </div>
  </div>
</header>
