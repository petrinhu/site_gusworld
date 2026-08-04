<?php /* Colophon #3 - #2's mould, now DATA-DRIVEN: title and date come from $ctx
   (data/edicoes.php) instead of being typed by hand, so the colophon cannot drift from
   the data source when someone fixes the issue's date or title. data_por_extenso() is
   the same formatter the masthead uses (src/lib/view.php). The title separator is the
   middot " · " (the site's title convention), not an em-dash.

   ⚠️ NO EDITOR'S NOTE. #1 and #2 close with a note signed by root@glyfesse; #3 has no
   such text in any source under docs/content/, and writing one here would be inventing
   copy that never passed a gate. The credits block is mechanical (derived from the
   data) and can ship; the note is authored and stays pending with the editor-in-chief. */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Written by <span class="prompt">gus@glyfesse:~$</span><br>
    Edited by <span class="prompt">root@glyfesse:~$</span>
  </p>

  <p class="colo-direitos">All rights reserved.</p>
</div>
