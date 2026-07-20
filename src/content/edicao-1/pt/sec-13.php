<?php /* Poster central (encarte §13): recriacao FIEL do glifo classico de IMAGEM
   QUEBRADA (ref. resources/referencias/icone_quebrado.png): pagina clara com o
   canto superior direito DOBRADO (dog-ear), uma miniatura de paisagem dentro
   (ceu azul + solzinho + colina verde) PARTIDA por uma rachadura diagonal.
   Bitmap/pixelado: shape-rendering=crispEdges + formas de aresta dura, zero
   gradiente. Decorativo -> aria-hidden no SVG; a legenda carrega o sentido.
   Estilos: edicao.css (.poster-quebrada). */ ?>
<div class="poster-quebrada">
  <svg class="glifo-quebrado" viewBox="0 0 220 260" shape-rendering="crispEdges"
       xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <?php /* a folha: camada de contorno (borda) + preenchimento claro, com o
       canto superior direito cortado para a dobra */ ?>
    <polygon points="30,20 150,20 190,60 190,240 30,240" fill="#9aa0a8"/>
    <polygon points="38,28 148,28 182,62 182,232 38,232" fill="#f2f4f7"/>
    <?php /* o dog-ear: a aba dobrada no canto + o vinco */ ?>
    <polygon points="150,28 182,60 150,60" fill="#d7dbe1"/>
    <path d="M150,28 L150,60 L182,60" stroke="#b9bfc7" stroke-width="3" fill="none"/>
    <?php /* a miniatura de paisagem (ceu, sol, montanhas), recortada na foto */ ?>
    <clipPath id="pic-quebrado"><rect x="52" y="82" width="116" height="122"/></clipPath>
    <g clip-path="url(#pic-quebrado)">
      <rect x="52" y="82" width="116" height="122" fill="#a9d3ef"/>
      <circle cx="82" cy="116" r="15" fill="#ecd89a"/>
      <polygon points="70,204 120,120 168,204" fill="#4f8a3a"/>
      <polygon points="52,204 52,190 94,150 118,182 140,152 168,186 168,204" fill="#6fae52"/>
      <?php /* a rachadura: banda em cor de papel, escadinha do topo-direito ao
         canto inferior-esquerdo (a foto rasgada em diagonal) */ ?>
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
    <?php /* a moldura interna da foto */ ?>
    <rect x="52" y="82" width="116" height="122" fill="none" stroke="#b8bec6" stroke-width="3"/>
  </svg>
  <p class="poster-cap">A arte ainda não existe.</p>
  <p class="poster-sub">img/key-art.png &middot; 404 &middot; carregando... para sempre</p>
</div>
