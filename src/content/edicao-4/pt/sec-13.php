<?php
/* Pôster central (#4) · o retrato de Seu Bertoldo Caím - agora com pixel art de
   verdade dentro da chapa. Fonte: GusWorld/resources/sprites/icons-m5/retratos/
   retrato_seu_bertoldo_caim.png (128x128), lida do repositório do jogo, que é
   READ-ONLY, e copiada sem qualquer alteração para
   public_html/assets/edicao-4/retrato-bertoldo.png - checksum sha256 conferido
   idêntico byte a byte entre origem e cópia. Moldura, marcas de corte, cruzes
   de registro, barra de cor e vinco seguem intocados da #3 (edicao.css §13);
   a única mudança de estrutura é a .chapa ganhar o modificador .retrato (já
   preparado no CSS, bloco "§13 (edição #4) · .chapa.retrato") e um <img> de
   verdade dentro dela no lugar do quadrado ciano chapado.

   ⚠️ FICHA HONESTA (L-44 - não apresentar como fato o que não foi medido): a
   única medida verificável é 128 x 128 px. A data de criação
   do retrato NÃO é conhecida - o único commit que toca o arquivo no repositório
   do jogo é uma importação em massa de 1.293 mídias, de 22.08.2026, e essa é a
   data do COMMIT, não a data em que o retrato foi desenhado. A contagem de
   9.267 cores únicas do arquivo também NÃO entra: não é uma paleta de pixel
   art publicável como "N cores", é o resultado de export/anti-aliasing. Por
   isso a ficha traz só a dimensão e fica mais curta que a da #3 - não se
   preenche o vazio com "circa" nem aproximação.

   O título usa a forma do personagem já fixada pela Reportagem de capa da #4
   (sec-04.php): "Seu Bertoldo Caím". O alt descreve só a FIGURA que a imagem
   mostra - homem, roupa, pose, objeto - zero lore, zero função de jogo não
   anunciada, seguindo a régua de spoiler de qualquer alt público do site. */
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
      <h3 class="titulo">Seu Bertoldo<br>Caím</h3>
      <span class="tarja">sentado no banco</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <div class="chapa retrato">
      <img src="/assets/edicao-4/retrato-bertoldo.png" width="128" height="128"
           loading="lazy" decoding="async"
           alt="Retrato em pixel art de um homem idoso, careca, com cabelo grisalho nas laterais e óculos redondos. Ele usa um paletó marrom-oliva por cima de uma blusa avermelhada, está sentado em um banco de madeira e segura um jornal aberto nas mãos.">
    </div>

    <p class="ficha">
      <span><b>128 &times; 128 px</b></span>
      <span class="barra" aria-hidden="true">
        <i class="k"></i><i class="c"></i><i class="m"></i><i class="g"></i><i class="w"></i>
      </span>
    </p>
  </div>

  <p class="credito">
    <span>Glyfesse nº 4 &middot; pôster central</span>
    <span>destaque pela dobra</span>
  </p>

  <span class="vinco" aria-hidden="true"></span>
</div>
