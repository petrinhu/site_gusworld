<?php
/* Centrefold Poster (#5) - Gus's family coat of arms, also the GusWorld
   game logo - now the real image inside the plate. Source: an image
   (1408x1408) from the game's repository, which is READ-ONLY, received from
   the creator on 2026-09-05 and copied unchanged into
   public_html/assets/edicao-5/logo-gusworld.jpg - sha256 checksum verified
   byte-identical between source and copy. Frame, crop marks, registration
   targets, colour bar and fold crease all stay untouched from #3/#4
   (edicao.css §13); .chapa takes the .retrato modifier (same as #4) with a
   real <img> in place of the flat cyan square.

   ⚠️ image-rendering:pixelated IS DELIBERATE, NOT A DEFECT: the creator saw
   a rendered comparison (jagged vs. smooth) and decided to keep the
   pixelated rule inherited from .chapa.retrato (decision made 2026-09-05) -
   the piece is not pixel art, but the frame treats every image the same
   way, and the resulting jagged edge was accepted knowingly. Do not swap
   this rule without a new order.

   ⚠️ The art is AI-generated: PixelLab (generation) and Grok Imagine
   (processing), confirmed by the creator on 2026-09-05. Declared dry in the
   spec line below, with no defense by intent - rule set after AUD-IA failed
   the #3 launch for serving generated art without disclosing it.

   The coat of arms belongs to Gus the CHARACTER (the fictional protagonist)
   - no relation to Gus Dragon, the real playtester. No era, faction, or any
   other house from the story is named: only the two facts the creator
   cleared (the family crest and the game logo). The alt text describes the
   FIGURE the image shows, plus those two facts, with no added lore. */
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
      <h3 class="titulo">Gus's<br>coat of arms</h3>
      <span class="tarja">and the game's logo</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <div class="chapa retrato">
      <img src="/assets/edicao-5/logo-gusworld.jpg" width="1408" height="1408"
           loading="lazy" decoding="async"
           alt="The coat of arms of Gus's family and the GusWorld game logo: a stylized angular dragon, its body coiled into a spiral, carved in relief into a dark stone slab. The carved grooves glow red, the wing tips are dark oxidized copper, and wisps of smoke rise from the grooves.">
    </div>

    <p class="ficha">
      <span><b>1,408 &times; 1,408 px</b> &middot; PixelLab (generation) &middot; Grok Imagine (processing)</span>
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
