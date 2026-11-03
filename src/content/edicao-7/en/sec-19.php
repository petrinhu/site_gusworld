<?php /* Colophon #7 - #6's mould: DATA-DRIVEN, title and date come from $ctx (data/edicoes.php), never typed by hand;
   data_por_extenso() is the masthead's formatter (src/lib/view.php). Title separator: middot (&middot;), not an em-dash.
   Hand-built (PLANO-CONVERSOR 2.5). Text sources: docs/content/edicao-7-copies-curtas.md, pieces 8 (Interview),
   9 (comic) and 10 (editor's note), 8th, 9th and 10th ## EN; the translation line and the rights line: the production
   notes of the same file, items 6 and 4 (the #4 and #5 pattern).
   Changed from #6: the comic strip credit and its line are gone. The comic line takes the place of the strip's AI line;
   the Interview line takes the place of the #6 interview line. No line about this issue's toy (the lead's decision, 2026-11-03).
   Gus Dragon's credit does not enter (T4); no money (T3).
   Editor's note: root's voice (never named), prompt root@glyfesse:~/expediente$ (the path has no accents, is not translated).
   The source's production notes NEVER enter here. */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Written by <span class="prompt">gus@glyfesse:~$</span><br>
    Edited by <span class="prompt">root@glyfesse:~$</span>
  </p>

  <p class="colo-creditos">The comic in this issue was made by the magazine itself: script and art by AI agents, approved by the editor. There was no artist in this issue.</p>

  <p class="colo-creditos">Brunus's answers come from a real person, published word for word. Their English translation is by an AI agent, approved by the editor, and deliberately reproduces typing errors equivalent to the original's. Gus's questions are a draft by an AI agent, approved by the editor.</p>

  <p class="colo-creditos">Text: drafted with AI agents and reviewed by the editor.</p>

  <p class="colo-creditos">The English translations are by an AI agent, approved by the editor.</p>

  <p class="colo-direitos">All rights reserved.</p>
</div>

<hr class="colo-sep">

<p class="fala"><span class="prompt">root@glyfesse:~/expediente$</span> <span class="dito">editor's note</span></p>

<p>Last issue I ordered it broken, and said the call was mine. This issue tells what came before and what was kept. The decision to delete was mine. The sentence that explains it is too. Both are here, with their dates.</p>
