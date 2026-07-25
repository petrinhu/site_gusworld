<?php
declare(strict_types=1);
/**
 * src/includes/masthead.php — o header[banner]: wordmark + expediente + LCD.
 *
 * Espera $ctx (contexto) e $t (i18n do idioma). Reusável por edição, banca e
 * 404. O campo $ctx['modo'] alterna o enquadramento:
 *   'edicao' (default) → wordmark é link + expediente (ano/nº/data);
 *   'banca'            → wordmark vira <h1> (heading primário da home) e o
 *                        expediente some (a home não tem número de edição). A
 *                        LCD é comum aos dois.
 *
 * A LCD (mock 13, tratamento A) é um <a> REAL para a URL gêmea: funciona sem
 * JS (é navegação, não troca de texto no cliente). O fragmento #glyfe só liga
 * o efeito visual de "recompilar" na chegada (progressive enhancement). A LCD
 * NÃO veste o prompt de voz do Gus — é mostrador de máquina (project-i18n-switch).
 */
$modo = (string) ($ctx['modo'] ?? 'edicao');
$par  = h((string) $ctx['idioma_par']);
$lcd  = $t['lcd'];
?>
<header class="masthead" role="banner">
  <div class="masthead-inner">
    <?php if ($modo === 'banca'): ?>
    <h1 class="logo-h1"><a class="logo" href="<?= h((string) $ctx['url_banca']) ?>" title="<?= h((string) $t['wordmark_titulo']) ?>">GLYFESSE</a></h1>
    <?php else: /* modo edição: o wordmark é um link visível DE VOLTA pra banca +
       rótulo discreto que torna a afordância óbvia (não some no modo banca). */ ?>
    <div class="logo-col">
      <a class="logo logo-link" href="<?= h((string) $ctx['url_banca']) ?>" title="<?= h((string) $t['wordmark_titulo']) ?>">GLYFESSE</a>
      <a class="volta-banca" href="<?= h((string) $ctx['url_banca']) ?>"><span class="seta" aria-hidden="true">↩</span> <?= h((string) $t['topo_banca']) ?></a>
    </div>
    <?php endif; ?>

    <div class="col-meta">
      <?php if ($modo !== 'banca'): ?>
      <p class="meta-titulo"><?= h((string) $ctx['titulo']) ?></p>
      <p class="meta">
        <?= h((string) $t['exp_vol']) ?> <?= h((string) $ctx['volume']) ?> · <?= h((string) $t['exp_num']) ?> <b><?= h((string) $ctx['numero']) ?></b><?php
          /* revisão só aparece a partir da 1ª correção (rev. 2): no lançamento
             (revisao=1) fica fora, pra não poluir a leitura do leigo. */
          if ((int) ($ctx['revisao'] ?? 1) > 1): ?> · <?= h((string) $t['exp_rev']) ?> <?= h((string) $ctx['revisao']) ?><?php endif; ?> · <?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?><br>
        gusworld.site<?php
        /* uptime das sessões de trabalho: 3ª linha do expediente, SÓ quando a
           edição trouxe o campo (capturado no publish: a produção não enxerga a
           máquina do líder). Edição sem o campo → string vazia → nada é impresso,
           e o masthead sai byte a byte como antes (#1 e #2). */
        $uptime_txt = uptime_expediente($ctx['uptime'] ?? null, $t);
        if ($uptime_txt !== ''): ?><br><span class="meta-uptime"><span class="sr"><?= h((string) ($t['exp_uptime_sr'] ?? '')) ?> </span><?= h($uptime_txt) ?></span><?php endif;
        /* o `?>` engole a quebra de linha do fonte que vem logo depois dele:
           devolvemos essa quebra à saída para o expediente de quem NÃO tem o
           campo sair byte a byte igual ao de antes desta feature. */
        echo "\n"; ?>
      </p>
      <?php endif; ?>

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
