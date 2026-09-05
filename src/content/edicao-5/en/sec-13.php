<?php
/* Centrefold poster (#5) - PLACEHOLDER, by the creator's order (04/09/2026,
   verbatim, in the original Portuguese: "faça tudo, deixe as partes
   faltantes com placeholder para quando eu entregar" - "do everything, leave
   the missing parts as a placeholder for when I deliver [the material]").
   Mold inherited from edicao-4/en/sec-13.php: frame, crop marks,
   registration targets, .chapa (WITHOUT the .retrato modifier, because there
   is no portrait yet), fold rule, spec line and crease.

   ⚠️ WHAT IS MISSING, exactly, for the creator to deliver (docs/editorial/
   BRIEFS-EDICAO-5.md, Appendix A2, D5/D6): TWO screenshots of Gus Dragon's
   07/08/2026 finding (the clipping playtest). One of the two becomes the
   issue's cover `frame`, the other becomes this Poster - which goes where is
   the creator's call at the cover gate, once he sees both. Until then:
     - NO <img> AT ALL: no src pointing at a file that doesn't exist (that
       would break the page). The image's spot is an empty, commented block.
     - Both `alt` texts (pt and en) are missing, describing only the FIGURE
       (what the screen shows: the enemy on patrol, the block, the city -
       zero lore, zero unannounced game mechanic), which can only be written
       after seeing the screenshot and clearing GATE-SPOILER.
     - The final caption/credit are missing (poster title, spec line with
       the real file's measured dimension).
     - If either screenshot fails the hygiene check (L-02: open and look
       before versioning, zero desktop/taskbar/terminal/personal screen) or
       GATE-SPOILER, the decision goes back to the creator - it doesn't
       become "use the other one" on this production's own call (explicit
       pauta rule, D5/D6).
     - Two contingency alternatives are already sketched in the pauta if both
       screenshots fail: (A) the C# foundation's commit hash set in pixel
       type on the plate ("40 characters, no file"); (C) an empty plate with
       the caption "portrait of a file that no longer exists". Neither is
       chosen here - it's the creator's call at the cover gate, not this
       assembly's.

   This section RENDERS with no error in this state: no <img>, no src
   attribute, nothing broken. What exists is only the empty frame plus this
   very comment, so whoever completes it later doesn't lose track of what's
   missing. */
?>
<div class="enc">
  <div class="quadro">
    <span class="registro topo" aria-hidden="true"></span>
    <span class="registro base" aria-hidden="true"></span>
    <span class="corte tl" aria-hidden="true"></span>
    <span class="corte tr" aria-hidden="true"></span>
    <span class="corte bl" aria-hidden="true"></span>
    <span class="corte br" aria-hidden="true"></span>

    <p class="kicker">pull-out insert</p>

    <div class="cabeca">
      <h3 class="titulo">Poster<br>pending</h3>
      <span class="tarja">awaiting the 07/08 material</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <div class="chapa">
      <?php /* PLACEHOLDER: no <img> here on purpose (see header comment).
         Once the creator delivers one of the two 07/08 screenshots:
           1. copy it unchanged into public_html/assets/edicao-5/ with a
              sha256 check confirming it's byte-identical to the source
              (same process as the #4 retrato-bertoldo.png);
           2. add .chapa.retrato (same #4 modifier) and the <img> with real
              width/height, loading="lazy", decoding="async";
           3. write both alt texts (pt/en) only after GATE-SPOILER approves
              what the figure shows;
           4. update the .ficha spec line below with the real measured
              dimension. */ ?>
    </div>

    <p class="ficha">
      <span><b>pending material</b></span>
      <span class="barra" aria-hidden="true">
        <i class="k"></i><i class="c"></i><i class="m"></i><i class="g"></i><i class="w"></i>
      </span>
    </p>
  </div>

  <p class="credito">
    <span>Glyfesse no. 5 &middot; centrefold</span>
    <span>tear along the fold</span>
  </p>

  <span class="vinco" aria-hidden="true"></span>
</div>
