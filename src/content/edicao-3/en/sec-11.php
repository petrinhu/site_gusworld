<?php
/* Comic Strip (#3) - art ported from the mock docs/design/mockups/18-hq-o-quadrado.html
   (the mock's sheet frame, masthead, kicker/title and footer do NOT come along).
   Styles: edicao.css, block "§11 · a TIRINHA DO QUADRADO".
   Approved script (PAUTA-EDICAO-3, section 11): 1. the empty room · 2. the square takes
   a step and bumps · 3. it tries again.

   ⛔ THERE IS NO DRAWING, and there will not be: the lead is not an illustrator (hard
   house rule). The whole strip is CSS GEOMETRY - rectangle, border, hatching, position.
   ⚠️ THE CAST IS A SQUARE AND A ROOM. No eyes, no mouth, no arms, no impact squash.
   ★ THE JOKE IS THE ECONOMY: panel 3 is almost pixel-for-pixel panel 2, and its caption
   repeats panel 2's ON PURPOSE. Give panel 3 a resolution and the strip dies.
   ZERO animation (it goes to print and must work standing still), ZERO JS.

   ⚠️ TRANSLATED FURNITURE: the three captions (room. / wall. / wall.) and the panel
   aria-labels are translations of the mock's own filler, which the mock itself flags as
   open to the editor-in-chief's veto. */
?>
<div class="hq3">
  <ol class="tira">

    <?php /* PANEL 1 · the empty room. He is there, but only a sliver: he comes in from
       the left edge and the rest is outside the panel. It is the silence before. */ ?>
    <li>
      <figure>
        <div class="cena q1" role="img"
             aria-label="Panel one: an empty room seen from the side. A hatched floor and a wall on the right. In the left corner, a sliver of blue coming in from the edge, almost outside the panel.">
          <span class="num" aria-hidden="true">1</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="q lasca"></span>
        </div>
        <figcaption>room.</figcaption>
      </figure>
    </li>

    <?php /* PANEL 2 · the step, and the contact. Speed lines behind (he came walking)
       and the fan of strokes leaving exactly the middle of his right face. */ ?>
    <li>
      <figure>
        <div class="cena q2" role="img"
             aria-label="Panel two: the blue square crossed the room and stopped flat against the wall on the right. Speed lines behind it and impact strokes at the point of contact.">
          <span class="num" aria-hidden="true">2</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="rastro"></span>
          <span class="q">
            <span class="fx" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></span>
          </span>
        </div>
        <figcaption>wall.</figcaption>
      </figure>
    </li>

    <?php /* PANEL 3 · again. The SAME panel: only the echo of the previous step, a
       tighter trail, a second fan rotated a little, and two scratches on the floor.
       Neither victory nor surrender: stubbornness. */ ?>
    <li>
      <figure>
        <div class="cena q3" role="img"
             aria-label="Panel three: the square tries again, the same way and in the same place. A dashed outline marks where it was, and there are two scratches on the floor next to the wall.">
          <span class="num" aria-hidden="true">3</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="marca a"></span>
          <span class="marca b"></span>
          <span class="rastro"></span>
          <span class="q eco"></span>
          <span class="q">
            <span class="fx" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></span>
            <span class="fx bis" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></span>
          </span>
        </div>
        <figcaption>wall.</figcaption>
      </figure>
    </li>

  </ol>
</div>
