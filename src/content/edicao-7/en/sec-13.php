<?php
/* Centrefold poster (#7): an image generated with Grok Imagine on 2026-11-03,
   from a prompt written by Claude, approved by the creator. File:
   public_html/assets/edicao-7/poster-edicao-7.jpg (1,408 x 1,408 px). This
   task does not alter the file.

   The frame, crop marks, registration targets, colour bar and fold crease come
   from the #5 layout (edicao.css §13), with no new CSS. .chapa takes the
   .retrato modifier, as in #5.

   WARNING: image-rendering:pixelated stays inherited from .chapa.retrato. The
   piece is not pixel art, and the rule can jag a smooth image. The decision is
   Q1 in §8.3 of docs/editorial/BRIEFS-EDICAO-7.md: the creator decides on the
   print from task M5a. Until then the inherited rule stays as it is.

   AI-generated art: prompt by Claude, image by Grok Imagine. Declared plainly
   in the spec line below and in the footer line of every page (task M5b),
   with no defense by intent.

   The alt text describes only what the image shows. No lore is added. */
?>
<div class="enc">
  <div class="quadro">
    <?php /* the registration targets are children OF THE PLATE, not of .enc: anchored to .enc
       the "bottom" would measure from the end of the credit line and the bottom target
       would land on top of it (seen in the #3 mock render). */ ?>
    <span class="registro topo" aria-hidden="true"></span>
    <span class="registro base" aria-hidden="true"></span>
    <span class="corte tl" aria-hidden="true"></span>
    <span class="corte tr" aria-hidden="true"></span>
    <span class="corte bl" aria-hidden="true"></span>
    <span class="corte br" aria-hidden="true"></span>

    <p class="kicker">pull-out insert</p>

    <div class="cabeca">
      <h3 class="titulo">After the delete</h3>
      <span class="tarja">and what was left</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <div class="chapa retrato">
      <img src="/assets/edicao-7/poster-edicao-7.jpg" width="1408" height="1408"
           loading="lazy" decoding="async"
           alt="Top-down view of a dark, navy-blue wooden table. Pale outlines of objects that are no longer there, rectangles and a circle, and in the center a single blank ruled sheet. A faint cyan light comes from the bottom edge.">
    </div>

    <p class="ficha">
      <span><b>1,408 &times; 1,408 px</b> &middot; Prompt: Claude &middot; Image generated: Grok Imagine</span>
      <span class="barra" aria-hidden="true">
        <i class="k"></i><i class="c"></i><i class="m"></i><i class="g"></i><i class="w"></i>
      </span>
    </p>
  </div>

  <p class="credito">
    <span>Glyfesse no. 7 &middot; centrefold</span>
    <span>tear along the fold</span>
  </p>

  <span class="vinco" aria-hidden="true"></span>
</div>
