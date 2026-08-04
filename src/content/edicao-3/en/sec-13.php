<?php
/* Centrefold Poster (#3) · "The blue square, actual size" - art ported from the mock
   docs/design/mockups/19-poster-quadrado-tamanho-real.html (the mock's sheet frame,
   masthead and footer do NOT come along). Styles: edicao.css, block "§13 · o ENCARTE
   CENTRAL". Brief (PAUTA-EDICAO-3, section 13): art only, ZERO writing inside the plate.

   ★ THE PIECE IS NOT THE SQUARE, IT IS THE FRAME AROUND IT: double frame, open-L crop
   marks, registration targets, the printer's colour control bar, a fold crease and a
   spec line. The joke lives in the distance between the pomp and the content.
   ⚠️ THE JOKE IS ABOUT SCALE AND IT NEVER EXPLAINS ITSELF. The real dimensions appear
   only as DATA in the spec line. One line of explanatory humour kills the piece.
   ⛔ ZERO drawing, ZERO animation, ZERO JS.

   ⚠️ PORT ADAPTATION: in the mock the fold crease crossed the whole sheet; here it is
   confined to the insert block (the issue page has 17 sections). The DARK side of the
   fold still lives inside the plate, the only region with no text by construction.
   ⚠️ TRANSLATED FURNITURE: kicker, banner, title, spec line and credit are translations
   of the mock's own filler, which the mock flags as open to veto. */
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
      <h3 class="titulo">The blue<br>square</h3>
      <span class="tarja">actual size</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <?php /* ⚠️ THE PLATE IS EMPTY AND STAYS EMPTY. Nothing goes in here: no caption, no
       seal, no number, no face. It is four sides. */ ?>
    <div class="chapa" role="img"
         aria-label="A solid blue square, flat, filling the whole page. There is nothing else inside it."></div>

    <p class="ficha">
      <span><b>16 &times; 16 px</b> &middot; one colour &middot; 22.06.2026</span>
      <span class="barra" aria-hidden="true">
        <i class="k"></i><i class="c"></i><i class="m"></i><i class="g"></i><i class="w"></i>
      </span>
    </p>
  </div>

  <p class="credito">
    <span>Glyfesse no. 3 &middot; centrefold</span>
    <span>tear along the fold</span>
  </p>

  <span class="vinco" aria-hidden="true"></span>
</div>
