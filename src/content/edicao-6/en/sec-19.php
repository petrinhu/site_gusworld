<?php /* Colophon #6 - #5's mould: DATA-DRIVEN, title and date come from $ctx (data/edicoes.php), never typed by hand;
   data_por_extenso() is the masthead's formatter (src/lib/view.php). Title separator: middot (&middot;), not an em-dash.
   Hand-built (PLANO-CONVERSOR 2.5). Text sources: docs/content/edicao-6-copies-curtas.md, piece 6 (new colophon lines,
   6th ## EN) and piece 7 (editor's note, 7th).
   NEW IN #6: (1) the comic strip artist's credit, the lead's D5; name and URL copied from
   src/content/edicao-5/en/sec-19.php (https://x.com/Andre_Suporte), a single <a> for name and handle,
   target="_blank" rel="noopener", aria-label describing the destination. (2) the strip's AI declaration (D5): it shows
   game art that is AI-generated, declared in the footer; the line art is the artist's own. (3) the Interview method
   declaration (PQ13, no names), with the translation clause (GATE-COPY "Sim, acrescentar"): only true once the
   translation exists; checked against the footer before the GATE-GO.
   Editor's note: root's voice (never named), approved at the GATE-COPY; prompt root@glyfesse:~/expediente$ (path has no
   accents, is not translated). Does not name Gus Dragon (T4), no money (T3). The source's production notes NEVER enter here. */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Written by <span class="prompt">gus@glyfesse:~$</span><br>
    Edited by <span class="prompt">root@glyfesse:~$</span><br>
    Comic strip: art by <a href="https://x.com/Andre_Suporte" target="_blank" rel="noopener" aria-label="Visit André Farias's profile on X">André Farias (@Andre_Suporte, on X)</a>, the same artist as last issue
  </p>

  <p class="colo-creditos">The comic strip shows game art (the crest and Gus's sprite) that is AI-generated and declared in the footer. The strip's line art is the artist's own.</p>

  <p class="colo-creditos">Brunus's answers are by a real person; the English translation is by an AI agent, approved by the editor. Gus's questions are a draft by an AI agent, approved by the editor.</p>

  <p class="colo-direitos">All rights reserved.</p>
</div>

<hr class="colo-sep">

<p class="fala"><span class="prompt">root@glyfesse:~/expediente$</span> <span class="dito">editor's note</span></p>

<p>Last issue, someone asked how big the game was and got a number, not an estimate. This issue went the other way: it opened with an estimate and closed on a number that did not move. Somewhere in between, I ordered it broken. That was my call.</p>
