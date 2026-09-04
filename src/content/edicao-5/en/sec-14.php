<?php
/* Free gift (insert §14): "we hand you the tool". Recurring in #5: identical to #1/#3/#4. Two cards: the CC0 font
   PixelOperatorMono (specimen >=15px + a real download of the repo's .woff2) and
   a terminal wallpaper (CSS preview + a download of an SVG generated here, via
   data-URI: a real deliverable, zero new asset). Styles: edicao.css (.brinde).
   Pixel kickers avoid uppercase N (the guard). No promises beyond what exists. */

$wall = '<svg xmlns="http://www.w3.org/2000/svg" width="1920" height="1080" viewBox="0 0 1920 1080">'
  . '<defs><radialGradient id="g" cx="50%" cy="42%" r="78%">'
  . '<stop offset="0" stop-color="#0c2417"/><stop offset="1" stop-color="#050a06"/></radialGradient>'
  . '<pattern id="s" width="4" height="4" patternUnits="userSpaceOnUse">'
  . '<rect width="4" height="1" fill="#00000022"/></pattern></defs>'
  . '<rect width="1920" height="1080" fill="url(#g)"/><rect width="1920" height="1080" fill="url(#s)"/>'
  . '<g font-family="monospace">'
  . '<text x="150" y="540" font-size="54" fill="#5dfc9a">gus@glyfesse:~$ <tspan fill="#8affc0">glyfe --world</tspan></text>'
  . '<text x="150" y="612" font-size="54" fill="#3f9c6a">// compiling a world...</text>'
  . '<rect x="150" y="650" width="27" height="48" fill="#8affc0"/>'
  . '<text x="1520" y="1010" font-size="42" fill="#3f9c6a" opacity="0.7">GUSWORLD</text>'
  . '</g></svg>';
$wall_uri = 'data:image/svg+xml,' . rawurlencode($wall);
?>
<div class="brinde">

  <?php /* card 1: the CC0 font */ ?>
  <div class="brinde-card brinde-font">
    <p class="brinde-kick">Free gift</p>
    <h3>PixelOperatorMono</h3>
    <p>The game's interface font, the very one labelling Gus's buttons. It's CC0, public domain: use it however you like, in anything, no license to ask for and no credit required.</p>
    <div class="brinde-specimen" aria-hidden="true">
      <span class="sp-big">PixelOperatorMono</span>
      <span class="sp-mid">0123456789 {} [] () &lt;&gt; // #@</span>
    </div>
    <p><a class="brinde-dl" href="/assets/fonts/PixelOperatorMono.woff2" download>download .woff2 <span class="kbd">(regular)</span></a></p>
  </div>

  <?php /* card 2: the terminal wallpaper (preview + SVG download) */ ?>
  <figure class="brinde-card brinde-wall">
    <p class="brinde-kick">Extra</p>
    <h3>Wallpaper</h3>
    <p>A terminal wallpaper to set the mood on your desktop. It scales to any resolution (it's a vector).</p>
    <div class="crt-scr">
      <div class="crt-tela">
        <p><span class="pr">gus@glyfesse:~$</span> glyfe --world</p>
        <p class="dim">// compiling a world...</p>
        <p><span class="crt-cur" aria-hidden="true"></span></p>
      </div>
    </div>
    <figcaption><a class="brinde-dl" href="<?= h($wall_uri) ?>" download="gusworld-terminal.svg">download wallpaper <span class="kbd">(.svg)</span></a></figcaption>
  </figure>

</div>
