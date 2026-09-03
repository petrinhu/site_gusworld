<?php
/* Dialogue Walkthrough (#4) - source: docs/content/edicao-4-detonado-dialogo.md
   (## EN), verbatim. Reuses the same component as the #3 Simulation
   Walkthrough: styles in edicao.css, block "§08 · o DOCUMENTO DESCLASSIFICADO".

   ⛔⛔ SAME LOCK AS #3, and it is a FILE lock, not a CSS one: THERE IS NO WORD
   UNDERNEATH THE REDACTION BAR. <b class="det-tarja"> is an EMPTY element -
   not in an attribute, not in a comment. Unlike #3, the narrative-writer DID
   have the NPC's real line in hand here (mock
   docs/design/mockups/05-dialogo-bertoldo-retrato-real.html) and chose not to
   use it: the guarantee here isn't "impossible to leak", it's "cut on
   purpose". The source's solid-block censorship token never becomes text -
   where it appears, the bar stays empty (and that character, on purpose, is
   never reproduced in this comment or anywhere else in this file).

   ⚠️ ONLY ONE BAR in this piece (the source only has one occurrence of the
   token), on the 4th line of the transcript - nth-of-type(4n) already has
   its own CSS rule (9ch), no new width was needed.
   ⚠️ No `root` line: the source states no line of his was authorised for this
   issue. No quote is fabricated.
   ⚠️ The stamp (frame + "CENSORED!!!") is reused, same visual piece as #3. The
   "sterling corp." corner is NOT reused here: the source notes that was a
   spoiler authorisation specific to the creator for #3 (the villain tease)
   and doesn't presume it holds again without asking - it stays pending his
   call, so this file simply doesn't include the `.corp` span. */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/detonado$</span> <span class="dito">dialogue walkthrough</span></p>

<div class="det-doc">

  <?php /* the stamp: decorative, out of reading order, on top of everything -
     without the "sterling corp." corner (see note above) */ ?>
  <div class="det-carimbo" aria-hidden="true">
    <span class="moldura"><span class="txt">CENSORED!!!</span></span>
  </div>

  <p>Up until the sixth of July, you could walk the whole city and never hear a word back. People stood on corners. An old man read the newspaper on the same bench in the square, every morning. But all of that was scenery. You walked past, and the scenery stayed exactly the same, because staying the same is all scenery knows how to do.</p>

  <p>That changed. And the part I think matters isn't what he says: I'm not writing that here, by decision of whoever writes his lines, and rightly so. What matters is how a conversation turns into something that actually runs.</p>

  <p>A conversation isn't loose chat. It's a map of stops, and each stop only leads to another stop if a condition is met. The first time you approach him, the map is one thing; if you've already been there before, the map drops you straight into a different entry point: he notices he's already seen you, and doesn't repeat the greeting from scratch. That's already different from scenery: scenery doesn't know if it's the first time.</p>

  <p>Partway through, you choose how to answer: three ways, curious, straight to the point, or just a nod and moving on. All three count, all three carry their own weight. But all three end up in the same place afterward. None of them locks a path the other two can't reach; the choice changes the tone of how you got there, not what exists on the other side. That's on purpose: more forking isn't more depth; sometimes it's just one more branch someone forgets to prune.</p>

  <p>And the map barely writes anything down. Of everything that happens in that conversation, only two things get kept: that you've already been there, and which of the three ways you chose. Everything else (what he already knows about where you've been, what you've already solved out there), the conversation only READS. It never writes over the rest of the world. He reacts to what you've done. He doesn't decide for you.</p>

  <p>There's one more thing I like about it. His lines don't live inside the game. They live in a text file that only whoever reviews and translates it ever gets to read running loose: when the real game gets built, that text closes up inside a package, sealed, and it's the package the game loads. The game never reads raw text. That wasn't designed for any magazine's sake, it was designed to keep source separate from product, but it helps even here: there's nothing I can leak of what, while writing this, I chose not to use.</p>

  <p>I tested it, of course. There's a battery that opens this conversation on its own, with nobody watching, and checks whether each stop does what it promises. A slice of today's run, transcribed:</p>

  <?php /* ⛔ The bar below is an EMPTY element. There is no embargoed term in
     this file, anywhere: not in the HTML, not in the CSS, not in this
     comment. */ ?>
  <div class="det-transcricao">
    <span class="cab">test battery output · slice</span>
    <div class="det-linhas">
      <div class="det-linha">
        <span class="nome">[dialogue] loads the stop map with no error</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogue] first time != second time</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogue] all 3 answers end up in one place</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogue] <b class="det-tarja" role="img" aria-label="censored excerpt"></b></span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogue] only two notes come out of this conversation</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogue] the final package holds no raw text</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogue] the scene closes without leaving a mess</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <span class="total">all tests: 1383/1383</span>
    </div>
  </div>

  <p class="det-legenda">The blackouts are mine. I had his line in hand and chose not to use it: there's nothing to leak from what was left out on purpose.</p>

  <p>When his real portrait finally arrived (before that it was just a name in a box, text and structure, nothing drawn), the whole suite was already running those 1383 on its own, and green. That doesn't prove the conversation is good. It proves one small thing: when someone presses the button to talk to him, something answers for real, and doesn't get stuck halfway.</p>

  <p class="det-fecho">It took a while to become scenery with a face. It took one day for that scenery to answer. Done.</p>

</div>
