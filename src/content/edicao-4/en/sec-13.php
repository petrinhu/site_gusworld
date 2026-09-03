<?php
/* Centrefold Poster (#4) · the portrait of Mister Bertoldo Caím - now real
   pixel art inside the plate. Source: GusWorld/resources/sprites/icons-m5/
   retratos/retrato_seu_bertoldo_caim.png (128x128), read from the game's
   repository, which is READ-ONLY, and copied unchanged into
   public_html/assets/edicao-4/retrato-bertoldo.png - sha256 checksum verified
   byte-identical between source and copy. Frame, crop marks, registration
   targets, colour bar and fold crease all stay untouched from #3
   (edicao.css §13); the only structural change is .chapa taking the
   .retrato modifier (already prepared in the CSS, block "§13 (edição #4) ·
   .chapa.retrato") with a real <img> inside it in place of the flat cyan
   square.

   ⚠️ HONEST SPEC LINE (L-44 - never presenting as fact what was not
   measured): the only verifiable measurement is 128 x 128 px. The
   portrait's creation date is NOT known - the only commit touching the file
   in the game's repository is a bulk import of 1,293 media files, dated
   2026-08-22, and that is the COMMIT date, not the date the portrait was
   drawn. The file's 9,267 unique colours are also left out: that is not a
   pixel-art palette worth publishing as "N colours", it is the result of
   export/anti-aliasing. So the spec line carries only the dimension and
   reads shorter than #3's - the gap is not filled with "circa" or a guess.

   The title uses the form the character already carries in the #4 cover
   feature (sec-04.php): "Mister Bertoldo Caím". The alt text describes only
   the FIGURE the image shows - the man, his clothes, his pose, his prop -
   zero lore, zero unannounced game mechanic, following the spoiler rule for
   any public alt text on this site. */
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
      <h3 class="titulo">Mister Bertoldo<br>Caím</h3>
      <span class="tarja">seated on the bench</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <div class="chapa retrato">
      <img src="/assets/edicao-4/retrato-bertoldo.png" width="128" height="128"
           loading="lazy" decoding="async"
           alt="Pixel art portrait of an elderly bald man with grey hair on the sides and round glasses. He wears an olive-brown jacket over a reddish shirt, sitting on a wooden bench and holding an open newspaper.">
    </div>

    <p class="ficha">
      <span><b>128 &times; 128 px</b></span>
      <span class="barra" aria-hidden="true">
        <i class="k"></i><i class="c"></i><i class="m"></i><i class="g"></i><i class="w"></i>
      </span>
    </p>
  </div>

  <p class="credito">
    <span>Glyfesse no. 4 &middot; centrefold</span>
    <span>tear along the fold</span>
  </p>

  <span class="vinco" aria-hidden="true"></span>
</div>
