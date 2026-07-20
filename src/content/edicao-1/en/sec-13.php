<?php /* Center poster (insert §13): the giant BROKEN-IMAGE icon, recreated in SVG
   (the classic image-failed-to-load glyph): frame + sun + mountains + the crack
   + the corner marker (a nod to the 90s broken-image, in the game's colors).
   Decorative -> aria-hidden on the SVG; the caption carries the meaning.
   Styles: edicao.css (.poster-quebrada). */ ?>
<div class="poster-quebrada">
  <svg viewBox="0 0 220 180" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <?php /* the "photo" frame */ ?>
    <rect x="8" y="8" width="204" height="132" rx="6"
          stroke="currentColor" stroke-width="3.5"/>
    <?php /* the sun + mountains: the image that should have been here */ ?>
    <circle cx="168" cy="50" r="14" stroke="currentColor" stroke-width="3"/>
    <path d="M20 134 L68 84 L102 116 L140 74 L200 134"
          stroke="currentColor" stroke-width="3" stroke-linejoin="round" stroke-linecap="round"/>
    <?php /* the crack: the zigzag that splits the photo in two */ ?>
    <path d="M120 8 L100 44 L124 66 L96 92 L120 116 L104 140"
          stroke="currentColor" stroke-width="5" stroke-linejoin="round" stroke-linecap="round"/>
    <?php /* the corner marker (90s broken-image) in the game's colors */ ?>
    <rect x="20" y="20" width="40" height="30" rx="3" stroke="currentColor" stroke-width="2"/>
    <circle cx="30" cy="31" r="3.4" fill="#d84a3a"/>
    <path d="M39 40 L45 30 L51 40 Z" fill="var(--gw-ciano)"/>
    <rect x="47" y="24" width="7" height="7" rx="1" fill="var(--gw-magenta)"/>
  </svg>
  <p class="poster-cap">The art doesn't exist yet.</p>
  <p class="poster-sub">img/key-art.png &middot; 404 &middot; loading... forever</p>
</div>
