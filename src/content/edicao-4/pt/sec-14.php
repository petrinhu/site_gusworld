<?php
/* Brinde (encarte §14): "a gente da a ferramenta". Recorrente na #4: idêntico à #1/#3. Dois cards: a fonte CC0
   PixelOperatorMono (mostruario >=15px + download real do .woff2 do repo) e um
   papel de parede de terminal (preview CSS + download de um SVG gerado aqui, via
   data-URI: entregavel de verdade, zero asset novo). Estilos: edicao.css
   (.brinde). D-ACENTOS: prosa acentuada; kickers pixel = sem N maiusculo/acento
   (o guard). Sem prometer nada alem do que existe. */

$wall = '<svg xmlns="http://www.w3.org/2000/svg" width="1920" height="1080" viewBox="0 0 1920 1080">'
  . '<defs><radialGradient id="g" cx="50%" cy="42%" r="78%">'
  . '<stop offset="0" stop-color="#0c2417"/><stop offset="1" stop-color="#050a06"/></radialGradient>'
  . '<pattern id="s" width="4" height="4" patternUnits="userSpaceOnUse">'
  . '<rect width="4" height="1" fill="#00000022"/></pattern></defs>'
  . '<rect width="1920" height="1080" fill="url(#g)"/><rect width="1920" height="1080" fill="url(#s)"/>'
  . '<g font-family="monospace">'
  . '<text x="150" y="540" font-size="54" fill="#5dfc9a">gus@glyfesse:~$ <tspan fill="#8affc0">glyfe --world</tspan></text>'
  . '<text x="150" y="612" font-size="54" fill="#3f9c6a">// compilando um mundo...</text>'
  . '<rect x="150" y="650" width="27" height="48" fill="#8affc0"/>'
  . '<text x="1520" y="1010" font-size="42" fill="#3f9c6a" opacity="0.7">GUSWORLD</text>'
  . '</g></svg>';
$wall_uri = 'data:image/svg+xml,' . rawurlencode($wall);
?>
<div class="brinde">

  <?php /* card 1: a fonte CC0 */ ?>
  <div class="brinde-card brinde-font">
    <p class="brinde-kick">Oferta</p>
    <h3>PixelOperatorMono</h3>
    <p>A fonte da interface do jogo, a mesma que rotula os botões do Gus. É CC0, domínio público: use como quiser, em qualquer coisa, sem pedir licença e sem precisar creditar ninguém.</p>
    <div class="brinde-specimen" aria-hidden="true">
      <span class="sp-big">PixelOperatorMono</span>
      <span class="sp-mid">0123456789 {} [] () &lt;&gt; // #@</span>
    </div>
    <p><a class="brinde-dl" href="/assets/fonts/PixelOperatorMono.woff2" download>baixar .woff2 <span class="kbd">(regular)</span></a></p>
  </div>

  <?php /* card 2: o papel de parede de terminal (preview + download SVG) */ ?>
  <figure class="brinde-card brinde-wall">
    <p class="brinde-kick">Extra</p>
    <h3>Papel de parede</h3>
    <p>Um papel de parede de terminal para deixar a área de trabalho no clima. Escala em qualquer resolução (é vetor).</p>
    <div class="crt-scr">
      <div class="crt-tela">
        <p><span class="pr">gus@glyfesse:~$</span> glyfe --world</p>
        <p class="dim">// compilando um mundo...</p>
        <p><span class="crt-cur" aria-hidden="true"></span></p>
      </div>
    </div>
    <figcaption><a class="brinde-dl" href="<?= h($wall_uri) ?>" download="gusworld-terminal.svg">baixar wallpaper <span class="kbd">(.svg)</span></a></figcaption>
  </figure>

</div>
