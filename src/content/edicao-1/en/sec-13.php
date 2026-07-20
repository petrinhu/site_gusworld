<?php /* Center poster (insert §13): faithful recreation of the classic BROKEN-IMAGE
   glyph (ref. resources/referencias/icone_quebrado.png): a light page with the
   top-right corner FOLDED (dog-ear), a landscape thumbnail inside (blue sky + a
   little sun + a green hill) SPLIT by a diagonal crack. Bitmap/pixelated:
   shape-rendering=crispEdges + hard-edged shapes, zero gradient. Decorative ->
   aria-hidden on the SVG; the caption carries the meaning.
   Styles: edicao.css (.poster-quebrada). */ ?>
<div class="poster-quebrada">
  <svg class="glifo-quebrado" viewBox="0 0 220 260" shape-rendering="crispEdges"
       xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <?php /* the page: outline layer (border) + light fill, top-right corner cut
       away for the fold */ ?>
    <polygon points="30,20 150,20 190,60 190,240 30,240" fill="#9aa0a8"/>
    <polygon points="38,28 148,28 182,62 182,232 38,232" fill="#f2f4f7"/>
    <?php /* the dog-ear: the folded flap in the corner + the crease */ ?>
    <polygon points="150,28 182,60 150,60" fill="#d7dbe1"/>
    <path d="M150,28 L150,60 L182,60" stroke="#b9bfc7" stroke-width="3" fill="none"/>
    <?php /* the landscape thumbnail (sky, sun, mountains), clipped to the photo */ ?>
    <clipPath id="pic-quebrado"><rect x="52" y="82" width="116" height="122"/></clipPath>
    <g clip-path="url(#pic-quebrado)">
      <rect x="52" y="82" width="116" height="122" fill="#a9d3ef"/>
      <circle cx="82" cy="116" r="15" fill="#ecd89a"/>
      <polygon points="70,204 120,120 168,204" fill="#4f8a3a"/>
      <polygon points="52,204 52,190 94,150 118,182 140,152 168,186 168,204" fill="#6fae52"/>
      <?php /* the crack: a paper-colored band, stair-stepped from top-right to
         the bottom-left corner (the photo torn diagonally) */ ?>
      <g fill="#f2f4f7">
        <rect x="150" y="86"  width="22" height="22"/>
        <rect x="135" y="104" width="22" height="22"/>
        <rect x="119" y="121" width="22" height="22"/>
        <rect x="103" y="138" width="22" height="22"/>
        <rect x="86"  y="155" width="22" height="22"/>
        <rect x="69"  y="172" width="22" height="22"/>
        <rect x="52"  y="188" width="22" height="22"/>
      </g>
    </g>
    <?php /* the photo's inner frame */ ?>
    <rect x="52" y="82" width="116" height="122" fill="none" stroke="#b8bec6" stroke-width="3"/>
  </svg>
  <p class="poster-cap">The art doesn't exist yet.</p>
  <p class="poster-sub">img/key-art.png &middot; 404 &middot; loading... forever</p>
</div>
