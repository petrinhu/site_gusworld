<?php
/* Pôster central (#5) · o brasão da família de Gus, também logo do jogo
   GusWorld - agora com a imagem real dentro da chapa. Fonte: uma imagem
   (1408x1408) do repositório do jogo, que é READ-ONLY, recebida do líder em
   05/09/2026 e copiada sem qualquer alteração para
   public_html/assets/edicao-5/logo-gusworld.jpg - checksum sha256 conferido
   idêntico byte a byte entre origem e cópia. Moldura, marcas de corte, cruzes
   de registro, barra de cor e vinco seguem intocados da #3/#4 (edicao.css
   §13); a .chapa ganha o modificador .retrato (mesmo da #4) e um <img> de
   verdade no lugar do quadrado ciano chapado.

   ⚠️ image-rendering:pixelated É CONSCIENTE, NÃO DEFEITO: o líder viu a
   comparação renderizada (serrilhado vs. suave) e decidiu manter o pixelated
   herdado de .chapa.retrato (decisão de 05/09/2026) - a peça não é pixel art,
   mas a moldura trata toda imagem do mesmo jeito, e o serrilhado resultante
   foi aceito de olhos abertos. Não trocar essa regra sem nova ordem.

   ⚠️ A arte é gerada por inteligência artificial: PixelLab (geração) e Grok
   Imagine (tratamento), confirmado pelo líder em 05/09/2026. Declarado seco
   na ficha técnica abaixo, sem defesa por intenção - regra fixada depois de a
   AUD-IA reprovar o lançamento da #3 por servir arte gerada sem declarar.

   O brasão é do Gus PERSONAGEM (o protagonista de ficção) - nenhuma relação
   com o Gus Dragon, o playtester real. Nome de era, facção ou qualquer outra
   casa da história não entra: só os dois fatos liberados pelo líder (brasão
   da família + logo do jogo). O alt descreve a FIGURA que a imagem mostra,
   mais esses dois fatos, sem lore adicional. */
?>
<div class="enc">
  <div class="quadro">
    <?php /* as cruzes de registro são filhas DO QUADRO, não do .enc: ancoradas no .enc
       o "bottom" mediria a partir do fim do crédito e a cruz de baixo cairia em cima
       da linha de crédito (visto no render do mock da #3). */ ?>
    <span class="registro topo" aria-hidden="true"></span>
    <span class="registro base" aria-hidden="true"></span>
    <span class="corte tl" aria-hidden="true"></span>
    <span class="corte tr" aria-hidden="true"></span>
    <span class="corte bl" aria-hidden="true"></span>
    <span class="corte br" aria-hidden="true"></span>

    <p class="kicker">encarte destacável</p>

    <div class="cabeca">
      <h3 class="titulo">O brasão<br>de Gus</h3>
      <span class="tarja">e o logo do jogo</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <div class="chapa retrato">
      <img src="/assets/edicao-5/logo-gusworld.jpg" width="1408" height="1408"
           loading="lazy" decoding="async"
           alt="O brasão da família de Gus e o logo do jogo GusWorld: um dragão estilizado em linhas angulares, com o corpo enrolado em espiral, entalhado em relevo numa laje de pedra escura. Os sulcos do entalhe brilham em vermelho, as pontas das asas são de cobre escurecido, e fios de fumaça sobem dos sulcos.">
    </div>

    <p class="ficha">
      <span><b>1.408 &times; 1.408 px</b> &middot; PixelLab (geração) &middot; Grok Imagine (tratamento)</span>
      <span class="barra" aria-hidden="true">
        <i class="k"></i><i class="c"></i><i class="m"></i><i class="g"></i><i class="w"></i>
      </span>
    </p>
  </div>

  <p class="credito">
    <span>Glyfesse nº 5 &middot; pôster central</span>
    <span>destaque pela dobra</span>
  </p>

  <span class="vinco" aria-hidden="true"></span>
</div>
