<?php /* Poster central (encarte §13): o icone de IMAGEM QUEBRADA gigante, recriado
   em SVG (o glifo classico de imagem-que-nao-carrega): moldura + sol + montanhas
   + a rachadura + o marcador de canto (homenagem ao broken-image dos anos 90,
   nas cores do jogo). Decorativo -> aria-hidden no SVG; a legenda carrega o
   sentido. Estilos: edicao.css (.poster-quebrada). */ ?>
<div class="poster-quebrada">
  <svg viewBox="0 0 220 180" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <?php /* a moldura da "foto" */ ?>
    <rect x="8" y="8" width="204" height="132" rx="6"
          stroke="currentColor" stroke-width="3.5"/>
    <?php /* o sol + as montanhas: a imagem que deveria estar la */ ?>
    <circle cx="168" cy="50" r="14" stroke="currentColor" stroke-width="3"/>
    <path d="M20 134 L68 84 L102 116 L140 74 L200 134"
          stroke="currentColor" stroke-width="3" stroke-linejoin="round" stroke-linecap="round"/>
    <?php /* a rachadura: o zigue-zague que parte a foto ao meio */ ?>
    <path d="M120 8 L100 44 L124 66 L96 92 L120 116 L104 140"
          stroke="currentColor" stroke-width="5" stroke-linejoin="round" stroke-linecap="round"/>
    <?php /* o marcador de canto (broken-image 90s) nas cores do jogo */ ?>
    <rect x="20" y="20" width="40" height="30" rx="3" stroke="currentColor" stroke-width="2"/>
    <circle cx="30" cy="31" r="3.4" fill="#d84a3a"/>
    <path d="M39 40 L45 30 L51 40 Z" fill="var(--gw-ciano)"/>
    <rect x="47" y="24" width="7" height="7" rx="1" fill="var(--gw-magenta)"/>
  </svg>
  <p class="poster-cap">A arte ainda não existe.</p>
  <p class="poster-sub">img/key-art.png &middot; 404 &middot; carregando... para sempre</p>
</div>
