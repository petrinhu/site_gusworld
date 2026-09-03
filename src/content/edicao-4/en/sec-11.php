<?php
/* Comic Strip (#4) - art ported from the mock docs/design/mockups/22-hq-o-jornal.html
   (the mock's sheet frame, masthead, kicker/title and footer do NOT come along).
   Styles: edicao.css, block "§11 (edição #4) · o BANCO, o LEITOR e o JORNAL". Board
   item: ED4-MONTAGEM.

   REUSES the same room as the #3 strip (.hq3/.tira/.cena/.chao/.parede/.q/.rastro/.num),
   with the `.leitura` modifier on the wrapper. Approved script (edition 4 pauta,
   section 11):
     1. bench.  - the bench next to the wall, the seated shape holding a newspaper up
                  at face height, and the square entering from the edge with the .dir
                  band on its right face (the first time it "looks" at someone).
     2. bench.  - the square crossed the room and stopped IN FRONT OF THE BENCH (not
                  against the wall this time: someone is in the way). The newspaper is
                  still up.
     3. paper.  - the SAME panel. Only one thing changes: the newspaper comes down.

   ⛔ THERE IS NO DRAWING, the same hard rule as the #3 strip: rectangle, border,
   hatching, position. The bench, the reader and the newspaper are RECTANGLES - the
   reader gets no head, arm or hand; the "hand" is just where the newspaper rectangle
   sits in the air.

   ⚠️ THE SQUARE STILL HAS NO FACE. The .dir band is not an eye: it is a darker band on
   one face, present in all 3 panels from the start (it never appears or disappears).
   It is the minimum "direction" the geometry allows without becoming a face.

   ★ THE JOKE IS THE SILENCE. Panel 3 is pixel-for-pixel panel 2, except the paper comes
   down - which reveals the reader in full for the first time (before, the paper covered
   its top completely). NO speech balloon, NO new word: the answer is the paper coming
   down. Give it a line and the strip dies.

   ZERO animation (it goes to print and must work standing still), ZERO JS.

   ⚠️ TRANSLATED FURNITURE: the three captions (bench. / bench. / paper.) and the panel
   aria-labels are translations of the mock's own filler, open to the editor-in-chief's
   veto, same as the #3 strip. */
?>
<div class="hq3 leitura">
  <ol class="tira">

    <?php /* PANEL 1 · bench. He is there, but only a sliver: he comes in from the left
       edge and the rest is outside the panel. The .dir band comes with him from the
       start. */ ?>
    <li>
      <figure>
        <div class="cena" role="img"
             aria-label="Panel one: the same room, hatched floor and a wall on the right. Next to the wall, a bench with a seated shape holding a newspaper up, at face height. In the left corner, a sliver of blue entering from the edge, with a darker band on its right side.">
          <span class="num" aria-hidden="true">1</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="banco-assento"></span>
          <span class="banco-encosto"></span>
          <span class="leitor"></span>
          <span class="jornal"></span>
          <span class="q lasca"><span class="dir" aria-hidden="true"></span></span>
        </div>
        <figcaption>bench.</figcaption>
      </figure>
    </li>

    <?php /* PANEL 2 · bench. The square crossed the room and stopped in front of the
       bench - this time someone is in the way, not the wall. The newspaper is still
       up. */ ?>
    <li>
      <figure>
        <div class="cena" role="img"
             aria-label="Panel two: the blue square crossed the room and stopped in front of the bench. The seated shape still holds the newspaper up at face height. Speed lines behind the square.">
          <span class="num" aria-hidden="true">2</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="banco-assento"></span>
          <span class="banco-encosto"></span>
          <span class="leitor"></span>
          <span class="jornal"></span>
          <span class="rastro"></span>
          <span class="q diante"><span class="dir" aria-hidden="true"></span></span>
        </div>
        <figcaption>bench.</figcaption>
      </figure>
    </li>

    <?php /* PANEL 3 · paper. The SAME panel as panel 2. The only difference: the
       newspaper came down. No speech balloon, no word - the answer is the paper coming
       down. */ ?>
    <li>
      <figure>
        <div class="cena" role="img"
             aria-label="Panel three: the same panel as before, but the newspaper has come down to the seated shape's lap.">
          <span class="num" aria-hidden="true">3</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="banco-assento"></span>
          <span class="banco-encosto"></span>
          <span class="leitor"></span>
          <span class="jornal baixo"></span>
          <span class="rastro"></span>
          <span class="q diante"><span class="dir" aria-hidden="true"></span></span>
        </div>
        <figcaption>paper.</figcaption>
      </figure>
    </li>

  </ol>
</div>
