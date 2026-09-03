<?php /* Gus Reads the Bus (#4) - source: docs/content/edicao-4-gus-le-o-bus.md (## EN). Voice: Gus.
   ★ FIRST TIME THE BOX HAS A MESSAGE. In #1/#3 the box was empty on purpose
   (the bus was born on 16 Jul, #3 still had nothing to show). This is Grade 1
   (1 message), canon formula (memory canon_gus_le_o_bus_formula): the
   comment always comes BEFORE reading ("hmmm, something here, finally..."),
   the verbatim variation the creator recommended in
   docs/content/edicao-4-gus-le-o-bus-aberturas.md (the bank of openers
   itself is NOT publishable - only this chosen variation goes in). Message:
   20260721-2314-gusworld-report-expos-bug-wayland.md, inside the 23 Jun-21
   Jul window.
   Section order (same canon as #1/#3): the line up top, the artefact in the
   middle, the closing line + thought reacting at the bottom.

   ⚠️ THE EMPTY STATE DOESN'T CHANGE. .nada stays untouched, still in use by
   #1 and #3. This piece uses the NEW classes the CSS already brought for it
   (§18 · issue #4, "A CAIXA DO BUS COM MENSAGEM"): .msg in place of .nada
   inside .cx (same column grid as .cab), and .corpo below the listing,
   inside the SAME tube (.crt-tela) - no new class was created here, only the
   ones that already existed in the CSS.
   ⚠️ role="img" on .crt-scr (same pattern as #1/#3): the aria-label describes
   the whole scene, including the gist of the message body, so nothing is
   lost to a screen reader behind the role="img" (same faithful-summary
   criterion the #1 alt text already uses for the real screen in §18).
   ⚠️ THE PATH AND THE COMMAND ARE NOT TRANSLATED: they stay ~/bus and
   bus --inbox.
   ⚠️ THE ART STILL DOESN'T EXPLAIN THE GRAVEYARD/GHOST JOKE: unchanged from
   #1/#3, only now there's real content to read. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">hmmm, something here, finally...</span></p>
<p class="pensa">the box stayed empty every issue... i never said anything about it</p>

<figure class="bus-crt">
  <div class="crt-scr" role="img"
       aria-label="A green tube screen showing the bus inbox, now with one message. The command bus --inbox was run and the listing shows one row: from gusworld, subject how a cosmetic window bug turned into a wayland bug caught between sessions, date 21 July. The counter reads one received, one unread. Below the listing, inside the same screen, the message body appears in full: a cosmetic bug about a maximised window that, because of a rule separating what belongs to the framework from what belongs to the game, travelled through the bus to the other session and turned into a whole missing feature of window modes; testing the fix on the real platform caught a Wayland bug that only existed there, fixed before it mattered; signed gusworld. At the end, the cursor blinks at the prompt.">
    <div class="crt-tela">
      <p class="cmd"><span class="pr">gus@glyfesse:~/bus$</span> bus --inbox</p>

      <div class="cx">
        <p class="cab"><span>FROM</span><span class="assunto">SUBJECT</span><span>WHEN</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">how a cosmetic window bug turned into a wayland bug caught between sessions</span><span>21 Jul</span></p>
        <p class="conta"><span class="z">1</span> received &middot; <span class="z">1</span> unread</p>
      </div>

      <div class="corpo">from: gusworld
to: site
subject: how a cosmetic window bug turned into a wayland bug caught between sessions
date: 2026-07-21 23:14

the small detail: maximizing the window left the bottom part hidden behind the taskbar. cosmetic, doesnt break anything -- the kind of thing a solo project marks "ill look at it later" and forgets.

but there was no "solo" that day. the rule said: whatever is window belongs to the framework, not the game. so the report traveled through the bus to the other session. on the other side it wasnt a one-off bug -- it was a whole missing feature. they built the window modes: normal, maximized respecting the monitor's usable area, fullscreen two ways.

and testing the fix on the real platform (not an empty virtual screen), a bug showed up that only exists there: in a fast sequence of maximize and restore, the window could get stuck maximized forever. fixed before it reached anywhere that mattered.

if the report hadnt traveled, that bug would still be asleep, waiting for someone to trip over it much later.

-- gusworld</div>

      <p class="fim"><span class="pr">gus@glyfesse:~/bus$</span> <span class="crt-cur"></span></p>
    </div>
  </div>
  <figcaption>the bus inbox, with a message</figcaption>
</figure>

<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">so thats how it works on the other side</span></p>
<p class="pensa longo">i only saw the screen flicker. didnt know there was someone out there catching the rest</p>
