<?php
/* Pause Menu Walkthrough (#5) - source: docs/content/edicao-5-detonado.md
   (## EN), verbatim ("Notas de produção" excluded, never publishable). Reuses
   the same component as the #3 Simulation Walkthrough and the #4 Dialogue
   Walkthrough: styles in edicao.css, block "§08 · o DOCUMENTO DESCLASSIFICADO".

   D4 (decided 04/09/2026): goes in FULL. ATEMPORAL service piece (like
   #3/#4): tells how the pause menu works behind the screen TODAY, anchored on
   24/07/2026 (the architecture conversion and the mutation battery), without
   narrating the whole month.

   ⛔ NO "CENSORED!!!" stamp in this piece, unlike #3/#4: the source is
   explicit ("no redaction bar/token was used in this piece" - no embargoed
   term turned up in the research for it, no lore here). Stamping a document
   with nothing censored in it would be false decoration, the opposite of
   what the mechanism protects. For the same reason, none of the transcript
   lines use <b class="det-tarja"> - all 4 test lines below are plain text.

   Divide against Programming (edicao-5-programacao.md, pauta §5.2): this
   piece carries the lesson "a test that hangs stays quiet, and quiet looks
   green"; Programming carries "a cheap tool saw what the expensive review
   didn't". Neither piece repeats the other's fact or lesson (the "walking on
   its own" bug as an EVENT stays out of here, it's the Bug Gallery's; here
   only today's architecture). */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/detonado$</span> <span class="dito">pause menu walkthrough</span></p>

<div class="det-doc">

  <p>Until recently, every screen in the game (the title, the difficulty pick, save and load, the pause menu itself, battle, the animation viewer) had its own way of listening to the keyboard: a loop only it controlled, pumping the entire system's events to itself for as long as it stayed up. Today there's a single loop. Every screen is a state inside it: enter, handle whatever came in, advance, finish, exit. No screen hogs anything anymore.</p>

  <p>Two screens are parents to another: the title opens the difficulty screen, and the pause opens save and load. That called for care, because two live screens at once is exactly the kind of situation that already caused a serious problem in the project's past. The fix was an outside mini-driver, owning its own loop: it runs the parent screen until it finishes; if the answer was "open the child", it runs the child; if the child was cancelled, it loops back to the top and runs the very same parent object again, not a new one; if the child confirmed, both finish together.</p>

  <p>That "same object" detail is what keeps the focus. What's highlighted in a list, what's already been scanned: that's born in the screen's constructor, not every time it reopens. If it were born every time, cancelling out of difficulty and going back to the title would throw the highlight back to the first item, and whoever was navigating would lose their place without warning.</p>

  <p>Proof of life: there's a battery that walks all six screens on its own, with nobody watching, and checks whether each one does what it promises. On July 24th it closed out at 2,536 green tests, up from 2,424 before the conversion.</p>

  <div class="det-transcricao">
    <span class="cab">test battery output · slice</span>
    <div class="det-linhas">
      <div class="det-linha">
        <span class="nome">[pause] every screen enters, handles event, advances and exits without hogging</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[pause] cancelling the child re-enters the same parent object, focus kept</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[pause] closing the window at any phase of a screen skips the rest</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[pause] no loop survives outside the central loop</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <span class="total">all tests: 2536/2536</span>
    </div>
  </div>

  <p>The number by itself proves little: it only says what already worked kept working after something else got touched. The part that actually matters happened before that number closed clean.</p>

  <p>Every screen, on its way into the new mold, got sabotaged on purpose before being accepted: someone breaks a line, compiles for real, runs the suite for real, and checks whether any test dies. On the first screen, seven sabotages, six tests died. One survived: breaking the line that closes the window. No test, unit or integration, ever pressed the X on that screen. It got fixed, and the sabotage got re-verified by hand, not just from the report. And here's the detail worth the whole piece: with that line broken, the test didn't fail. It <strong>hung</strong>. The loop never reached its exit condition, so it stayed stuck forever. The suite had no per-test time limit, and a hang would have hung the whole integration run instead of failing fast. The limit went in right there: the hole found while hunting another hole.</p>

  <p>On the screens that followed, the hole never came back, because the close-window test was already born inside the mold. None of them hung after that: they either passed or failed, never sat quiet waiting for someone to notice.</p>

  <p class="det-fecho">A test that hangs stays quiet, and quiet looks green. That's this piece's lesson, and it's different from the lesson of any automated tool that flags an error on the spot: here the problem wasn't what the check was looking at. It was what it did when the test itself stopped answering. Done.</p>

</div>
