<?php /* Colophon #5 - IDENTICAL mould to #3/#4's: DATA-DRIVEN, title and
   date come from $ctx (data/edicoes.php), never typed by hand -
   data_por_extenso() is the same formatter the masthead uses
   (src/lib/view.php). The title separator is the middot " · " (&middot;),
   not an em-dash.
   ★ NEW CREDIT THIS ISSUE, the lead's order (2026-09-04, verbatim: "andre
   farias deve linkar ao perfil X dele", BRIEFS-EDICAO-5.md lines 823-825):
   the comic strip's artist (Section 11), André Farias, is added to the
   credits block, LINKED to his profile on X
   (https://x.com/Andre_Suporte). Same external-link pattern already used
   in the banca (src/templates/banca.php, lines ~131-138) and in this
   issue's Section 11: target="_blank" rel="noopener", with an aria-label
   describing the destination (never the behavior - the banca doesn't warn
   "opens in a new tab" either). ⚠️ These are TWO different links and
   neither replaces the other: the artwork in sec-11 leads to
   vidadesuporte.com.br; this name leads to his profile on X. Artist's
   consent: waived by the lead (2026-09-04, "Não precisa, é encomenda
   paga" / "Not needed, it's a paid commission").
   The credits block is MECHANICAL (derived from $ctx, plus the new credit
   line above) and is not touched beyond that; the EDITOR'S NOTE is the
   authored part, source: docs/content/edicao-5-copies-curtas.md (block "3.
   Seção 19, Expediente: nota do editor (EN)"). Trava §1.1 applied in it:
   affirms Gus Dragon's specialization with no hedge, no line-count number
   (says "a number", not the value).
   Voice: root@glyfesse (the creator, never named), dry and short, the size
   of the earlier notes (#1/#2/#3/#4). The prompt uses the already-published
   format (root@glyfesse:~/expediente$); the path carries no accents and is
   NOT translated (it is a shell path). Draft v1, root's speech, mandatory
   submission to the lead before any render (L-08, T6). The source's Notas
   de produção never enter here. */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Written by <span class="prompt">gus@glyfesse:~$</span><br>
    Edited by <span class="prompt">root@glyfesse:~$</span><br>
    Comic strip by <a href="https://x.com/Andre_Suporte" target="_blank" rel="noopener" aria-label="Visit André Farias's profile on X">André Farias</a>
  </p>

  <p class="colo-direitos">All rights reserved.</p>
</div>

<hr class="colo-sep">

<p class="fala"><span class="prompt">root@glyfesse:~/expediente$</span> <span class="dito">editor's note</span></p>

<p>Last issue I wrote that nothing gets lost, it just waits its turn. This time something got lost, and it was exactly what had been marked to be kept. It's on record where it belongs: on a headstone. The rest of the month was spent checking. In the end, I played the whole game and found nothing. Gus Dragon played after me and found two defects, because he studies games and his filter for this is more specialized than mine. Then he asked how big the game was and got a number, not an estimate.</p>
