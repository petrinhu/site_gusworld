<?php /* Colophon #4 - IDENTICAL mould to #3's: DATA-DRIVEN, title and
   date come from $ctx (data/edicoes.php), never typed by hand - data_por_extenso()
   is the same formatter the masthead uses (src/lib/view.php). The title separator
   is the middot " · " (&middot;), not an em-dash.
   The credits block is MECHANICAL (derived from $ctx) and is not touched; the
   EDITOR'S NOTE is the authored part.
   ⚠️ The EDITOR'S NOTE below is PROPOSED COPY, PENDING THE LEADER'S APPROVAL - no
   source in docs/content/, working text from the ED4-MONTAGEM orchestrator
   (2026-09-03); he reads it at final review.
   Voice: root@glyfesse (the creator, never named), dry and short, the size of the
   earlier notes (#1/#2/#3). The prompt uses #3's format
   (root@glyfesse:~/expediente$); the path carries no accents and is NOT translated
   (it is a shell path). */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Written by <span class="prompt">gus@glyfesse:~$</span><br>
    Edited by <span class="prompt">root@glyfesse:~$</span>
  </p>

  <p class="colo-direitos">All rights reserved.</p>
</div>

<hr class="colo-sep">

<p class="fala"><span class="prompt">root@glyfesse:~/expediente$</span> <span class="dito">editor's note</span></p>

<p>A face on June 24th and a voice on July 6th; by the end of the month, the whole game standing, played end to end by the one who had warned about the holes before they existed. The Graveyard pays the headstone #3 promised, and the bus, for the first time, has something to read. Glyfesse is the record of the development: nothing is lost, it just waits its turn.</p>
