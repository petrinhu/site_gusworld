<?php /* Colophon #3 - #2's mould, now DATA-DRIVEN: title and date come from $ctx
   (data/edicoes.php) instead of being typed by hand, so the colophon cannot drift from
   the data source when someone fixes the issue's date or title. data_por_extenso() is
   the same formatter the masthead uses (src/lib/view.php). The title separator is the
   middot " · " (the site's title convention), not an em-dash.

   THE EDITOR'S NOTE landed (2026-08-04), in the same spot #1 and #2 use: after the
   <hr class="colo-sep">, with the signature line in .fala and the note as prose.
   For the record: the credits block above stays MECHANICAL (derived from $ctx) and is
   not touched; the note is the authored part. Voice: root@glyfesse (the creator, never
   named), dry and short, the size of the #1 and #2 notes. The closing refrain ("nothing
   is lost, it just waits its turn") is the same as in both earlier issues, on purpose.
   ⚠️ The prompt uses #3's NEW format (root@glyfesse:~/expediente$); the path carries no
   accents and is NOT translated (it is a shell path). */ ?>
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

<p>Two foundation swaps in three days, and what is left is a blue square with no face, walking: the first thing that ever moved on screen. The Bug Gallery opens because it was promised in #2, and a promise in print is a debt. Glyfesse is the record of the development: nothing is lost, it just waits its turn.</p>
