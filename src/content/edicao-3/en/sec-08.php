<?php
/* Walkthrough of the Simulation (#3, NEW section) - source:
   docs/content/edicao-3-detonado.md (## EN), verbatim. Art ported from the mock
   docs/design/mockups/17-detonado-censurado.html (the mock's sheet frame, masthead,
   kicker and footer do NOT come along: the issue page already has its own).
   Styles: edicao.css, block "§08 · o DOCUMENTO DESCLASSIFICADO".

   ⛔⛔ THE LOCK THAT RULES THIS PIECE, and it is a FILE lock, not a CSS one:
   THERE IS NO WORD UNDERNEATH THE REDACTION BAR. Not with color:transparent, not with
   opacity:0, not in an attribute, not in a comment. <b class="det-tarja"> is an EMPTY
   element. The GATE-RENDER criterion is "search the served output for every embargoed
   term and find nothing": here there is nothing to find, because nothing was written.

   ⚠️ WIDTHS QUANTISED BY POSITION. The 4 fixed widths (4ch/11ch/7ch/9ch) are assigned by
   the LINE's nth-of-type, never by content, so the bar length cannot leak a letter count.
   ⚠️ The aria-label says exactly "censored excerpt" and nothing else.

   ⚠️ The root's closing line stays in PORTUGUESE, byte for byte as the creator authorised
   it (2026-08-01), with the English gloss right below - exactly as the source does.
   ⚠️ TRANSLATED STAMP: the mock's CENSURADO!!! reads CENSORED!!! here. Stamp furniture,
   not gated copy - open to veto by the editor-in-chief. */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/detonado$</span> <span class="dito">walkthrough of the simulation</span></p>

<div class="det-doc">

  <div class="det-carimbo" aria-hidden="true">
    <span class="moldura"><span class="txt">CENSORED!!!</span></span>
    <span class="corp">sterling corp.</span>
  </div>

  <p>First thing: nothing here happens in real time. You don't sit there mashing a button as fast as you can and hoping. Here the fight moves in <strong>rounds</strong>.</p>

  <p>A round works like this: each side gets its turn, and only acts when the turn comes. Whatever attacks, attacks; finishes; waits. Then it's the other side's turn. Nobody acts on top of anybody else, and nothing happens while you're thinking. That changes the kind of effort the game asks for: it isn't reflex, it's decision. The time you take to choose costs nothing. The choice costs everything.</p>

  <p>Which is exactly why the <strong>order matters</strong>. If whatever attacks goes first, it changes the state of the field &#8212; and whatever comes next arrives at a field different from the one that existed when you planned. The same action, on the wrong turn, becomes a different action. Not because it changed, but because the world around it changed first.</p>

  <p>If you got that part, you got enough. The rest is rule detail and can wait.</p>

  <p>Now the part I think matters more: how I know all of this actually runs.</p>

  <p>There's a test battery that opens the arena screen by itself, with nobody watching, and checks whether each piece does what it promises. It runs every time I touch anything. A slice of today's output, transcribed:</p>

  <?php /* ⛔ The bars below are EMPTY elements. There is no embargoed term in this file,
     anywhere: not in the HTML, not in the CSS, not in this comment. */ ?>
  <div class="det-transcricao">
    <span class="cab">test battery output · slice</span>
    <div class="det-linhas">
      <div class="det-linha">
        <span class="nome">[arena] building <b class="det-tarja" role="img" aria-label="censored excerpt"></b></span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] turn order respected across 3 sides</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] <b class="det-tarja" role="img" aria-label="censored excerpt"></b> does not act outside its own turn</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] invalid target is refused</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] field state after the action</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] <b class="det-tarja" role="img" aria-label="censored excerpt"></b></span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] screen closes without leaving mess</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <span class="total">all tests: 2632/2632</span>
    </div>
  </div>

  <p class="det-legenda">The blackouts are mine. There's material in there I can't show yet.</p>

  <p>The final number is the one that counts: <strong>2632/2632</strong>. No red.</p>

  <p>To give that some size, a comparison. On 22 June 2026, the day of the blue square's first step, the whole suite had <strong>684</strong> tests. Today it has <strong>2632</strong>. That's almost four times as many. I'll leave both numbers there and let everyone do their own arithmetic.</p>

  <p>Worth saying what that number is <strong>not</strong>. It doesn't say the game is good, or fun, or finished. It says one thing, and it's a small thing: what has already been built still works after I've gone and touched some other part. That's little. But it's the little that holds the rest up.</p>

  <p>The one who really tests the feel is Gus Dragon, who sits down and plays. Cauã "Volt" has opinions too, in his own way. The battery only guarantees that, when they sit down, the screen opens.</p>

  <p class="det-fecho">I'm glad when it comes back green. Done.</p>

  <p><code>root</code> sent this after a test run:</p>

  <p class="fala root"><span class="prompt">root@glyfesse:~/detonado$</span> <span class="dito">some ele da tela, some a moldura dele e a caixa de seleção. Sensação que correu tudo certo</span></p>

  <p class="det-glosa"><em>("make it disappear from the screen, and its frame, and the selection box too. Feels like everything went fine")</em></p>

</div>
