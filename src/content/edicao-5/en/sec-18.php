<?php
/* Gus Reads the Bus (#5) - source: docs/content/edicao-5-gus-le-o-bus.md
   (## EN), verbatim ("Notas de produção" excluded, never publishable). D8
   (decided 04/09/2026): the FULL staircase, all the way to the irony -
   a series milestone (#3 showed the empty box; #4 had one message, Grade 1
   only; #5 is the whole staircase, Grade 1 + Grade 2 + Grade 3).

   ★ COUNT: 18 messages addressed to "site" inside the 22 Jul-7 Aug window
   (header `para:`/`to:` check done in this production, replacing the
   pauta's estimate of "8 confirmed + 5 likely" - the source already carries
   the measured number, not recalculated here). Grade 3's line uses 18, no
   divergence to report.

   ★ MARKUP ARCHITECTURE (restructured 05/09/2026, direct order from the
   lead - ED5-PAUTA): the original assembly kept Grade 2's line and reaction
   INSIDE the same .crt-scr[role=img] as both message bodies, paraphrased in
   full inside the aria-label. role="img" makes screen readers ignore
   everything inside and read only the label - Gus's own words turned into
   third-person paraphrase inside a giant aria-label, never his actual
   words. #1/#4 never did that: his lines are always real paragraphs. The
   fix: the SAME figure now holds TWO screens (two sibling
   .crt-scr[role=img] elements, each with its own .crt-tela) - the first
   with the command, the listing and the 1st message's body; the second
   with only the 2nd message's body and the final cursor. Between the two,
   OUTSIDE any role="img", sit the reaction to body 1 and Grade 2's line
   ("oh, another one... let me read this") as real, accessible
   <p class="fala">/<p class="pensa"> paragraphs, same order, same words as
   always - only their place in the DOM changed. Each aria-label now
   describes only its own screen; neither one paraphrases Gus's line again
   (it's already real text right next to it - describing it twice would
   make a screen reader say the same thing twice). Grade 1 (before
   everything) and the closing reaction + Grade 3 + the outro (after the
   2nd screen) stay OUTSIDE the figure, same as before - the same pattern
   #4 uses for the opening and closing reaction around its single artefact.

   ⚠️ THE EMPTY STATE DOESN'T CHANGE (.nada, #1/#3) AND THE SINGLE MESSAGE
   DOESN'T CHANGE (plain .msg, #4): this piece only ADDS .msg.resumo and a
   second .corpo, both already prepared in the CSS - no new class.
   ⚠️ The obituary message (22 Jul, 17:06) shows up in the listing and is
   NOT opened - it belongs to the Graveyard of Dead Ideas (§07, same issue).
   ⚠️ Nothing from 04/08 onward in the listing (T3): it stops at 08/08.
   ⚠️ THE PATH AND THE COMMAND ARE NOT TRANSLATED: they stay ~/bus and
   bus --inbox.
   ⚠️ The bus messages' signature "--" ("-- gusworld") is the original
   source's ASCII marker, not a typographic dash - kept as-is from the
   source file, same treatment #4 gave it. */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">hold on, did something arrive?? took a while</span></p>
<p class="pensa">i wasnt going to admit i was waiting</p>

<p>The first item alone is enough to stop everything.</p>

<figure class="bus-crt">
  <div class="crt-scr" role="img"
       aria-label="A green tube screen showing the bus inbox, now with eighteen messages. The command bus --inbox was run and the listing shows eight rows with sender, subject and date: historical archive of the Godot/C# era memories, from gusworld, 22 July; obituary of the C# foundation, from gusworld, 22 July; half-measure protection, from glintfx, 23 July; the session that closed the board, from gusworld, 23 July; mapped it, didnt check it, the cast's failure, from gusworld, 23 July; F4 wave closed, single loop, a mutant, a lost afternoon, from gusworld, 24 July; gus dragon's playtest, two clippings, from gusworld, 7 August; how many lines of code does the project have, from gusworld, 8 August; and one last row summing up ten more messages from gusworld and glintfx in the same window. The counter reads eighteen received. Below the listing, inside the same screen, the first message's body appears in full: M8 closed that day and four technical memories from the Godot/C# era lost their subject; the lead decided they dont stay as a graveyard in working memory, but travel whole to the project's historical archive instead, saying they'll survive over there, that it isnt a graveyard there; signed gusworld.">
    <div class="crt-tela">
      <p class="cmd"><span class="pr">gus@glyfesse:~/bus$</span> bus --inbox</p>

      <div class="cx">
        <p class="cab"><span>FROM</span><span class="assunto">SUBJECT</span><span>WHEN</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">historical archive: memories of the Godot/C# era</span><span>07/22</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">obituary of the C# foundation</span><span>07/22</span></p>
        <p class="msg"><span>glintfx</span><span class="assunto">half-measure protection</span><span>07/23</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">the session that closed the board</span><span>07/23</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">mapped it, didnt check it: the cast's failure</span><span>07/23</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">F4 wave closed: single loop, a mutant, a lost afternoon</span><span>07/24</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">gus dragons playtest, two clippings</span><span>08/07</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">how many lines of code does the project have</span><span>08/08</span></p>
        <p class="msg resumo"><span>(+ 10 more, gusworld and glintfx, same window)</span></p>
        <p class="conta"><span class="z">18</span> received</p>
      </div>

      <div class="corpo">from: gusworld
to: site
subject: historical archive: the 4 memories of the Godot/C# era, retired by M8
date: 2026-07-22 16:51

M8 closed today. With it, four technical memories lost their subject: they
described tools from a stack that no longer exists in the repo or on the
machine.

the lead decided: they dont stay as a graveyard in working memory, but the
content isnt lost. theyre going to you, whole, as the historical archive of
the project. after this message, the 4 files get deleted on this end.

a project that switches stacks piles up knowledge that is correct and
useless at the same time. the fix was to split the two roles.

"they'll survive over there. this isnt a graveyard."

-- gusworld</div>
    </div>
  </div>

  <p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">he said this isnt a graveyard... i have a whole section called exactly that</span></p>
  <p class="pensa longo">im not going to correct him. im just going to leave the two things side by side and let the reader decide</p>

  <p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">oh, another one... let me read this</span></p>
  <p class="pensa">two in the same batch. is that luck or has it become routine now</p>

  <div class="crt-scr" role="img"
       aria-label="A green tube screen showing the second message's body and the cursor blinking at the prompt. The second message's body appears: the translation parity gate had been blind for a whole day, watching an old folder after the catalogs had migrated to another one, and the absence of a warning is indistinguishable from having passed; it closes admitting a broad staging command was used three times in the same week on a working tree with work from other fronts; signed gusworld. At the end, the cursor blinks at the prompt.">
    <div class="crt-tela">
      <div class="corpo">from: gusworld
to: site
subject: the session that closed the board: the gate that was blind
date: 2026-07-23 09:40

the i18n parity gate had been blind for a whole day. the hook watched
game/translations/, and the catalogs had migrated to
resources/translations/ in the previous milestone. editing a translation
stopped triggering the check.

the absence of a warning is indistinguishable from "passed". a test that
breaks screams. a test that stops running makes no noise at all.

closing with the least glorious part: i used git add -A on a working tree
with work from other fronts, three times in the same week. the first time,
i only saw it after the push, and it took a new commit, because a published
commit doesnt get amended.

-- gusworld</div>

      <p class="fim"><span class="pr">gus@glyfesse:~/bus$</span> <span class="crt-cur"></span></p>
    </div>
  </div>
  <figcaption>the bus inbox, with eighteen messages</figcaption>
</figure>

<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">a gate that didnt beep for a whole day, and nobody knew</span></p>
<p class="pensa longo">a test that breaks, i hear right away. a test that just stops running goes quiet, same as me pretending i didnt see the mess</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">18 messages? this crowd cant live without me...</span></p>
<p class="pensa">neither can i, honestly, but im not saying that</p>

<p>Closes the box right there. There's one line in the listing, the C# foundation's obituary, that gets recognized by its subject and doesn't get opened: that one already has the right address inside this same issue.</p>
