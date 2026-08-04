<?php
/* Pôster central (#3) · "O quadrado azul, tamanho real" - arte portada do mock
   docs/design/mockups/19-poster-quadrado-tamanho-real.html (a moldura de folha, o
   masthead e o rodapé do mock NÃO vêm: a página da edição já tem os seus). Estilos:
   edicao.css, bloco "§13 · o ENCARTE CENTRAL". Pauta (PAUTA-EDICAO-3, seção 13):
   só arte, ZERO ESCRITA dentro da chapa.

   ★ A PEÇA NÃO É O QUADRADO, É A MOLDURA EM VOLTA DELE. Um quadrado azul chapado não
   é desenho nenhum. O que faz a peça existir é o GESTO de tratar essa coisa boba com a
   solenidade inteira de um encarte central: moldura dupla, marcas de corte em L aberto,
   cruzes de registro, barra de controle de cor da gráfica, vinco de dobra, ficha
   técnica. A piada mora na distância entre a pompa e o conteúdo. Aumentar o quadrado
   não melhora a peça; apertar a margem piora.

   ⚠️ A PIADA É DE ESCALA E NÃO SE EXPLICA. No jogo o personagem tem 16x16 pixels; um
   pôster "em tamanho real" dele seria um selo. Este é gigante. As dimensões aparecem
   só como DADO, na ficha técnica. Se alguém escrever uma linha de humor explicando, a
   peça morre na hora.

   ⛔ ZERO DESENHO: nem <img>, nem SVG figurativo, nem emoji. Tudo é retângulo, borda,
   gradiente e posição. ZERO ANIMAÇÃO (vai impresso e pregado na parede) e ZERO JS.

   ⚠️ ADAPTAÇÃO DO PORTE: no mock o vinco da dobra atravessava a folha inteira; aqui
   ele é confinado ao bloco do encarte (a página da edição tem 17 seções, e uma dobra
   cruzando todas seria outra peça). O lado ESCURO da dobra continua dentro da chapa,
   que é a única região sem texto por construção - é ali que o veu pode ser forte sem
   derrubar contraste de leitura. */
?>
<div class="enc">
  <div class="quadro">
    <?php /* as cruzes de registro são filhas DO QUADRO, não do .enc: ancoradas no .enc
       o "bottom" mediria a partir do fim do crédito e a cruz de baixo cairia em cima
       da linha de crédito (visto no render do mock). */ ?>
    <span class="registro topo" aria-hidden="true"></span>
    <span class="registro base" aria-hidden="true"></span>
    <span class="corte tl" aria-hidden="true"></span>
    <span class="corte tr" aria-hidden="true"></span>
    <span class="corte bl" aria-hidden="true"></span>
    <span class="corte br" aria-hidden="true"></span>

    <p class="kicker">encarte destacável</p>

    <div class="cabeca">
      <h3 class="titulo">O quadrado<br>azul</h3>
      <span class="tarja">tamanho real</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <?php /* ⚠️ A CHAPA É VAZIA E CONTINUA VAZIA. Nada entra aqui dentro: nem legenda,
       nem selo, nem número, nem rosto. São quatro lados. */ ?>
    <div class="chapa" role="img"
         aria-label="Um quadrado azul sólido, chapado, ocupando a página inteira. Não há mais nada dentro dele."></div>

    <p class="ficha">
      <span><b>16 &times; 16 px</b> &middot; uma cor &middot; 22.06.2026</span>
      <span class="barra" aria-hidden="true">
        <i class="k"></i><i class="c"></i><i class="m"></i><i class="g"></i><i class="w"></i>
      </span>
    </p>
  </div>

  <p class="credito">
    <span>Glyfesse nº 3 &middot; pôster central</span>
    <span>destaque pela dobra</span>
  </p>

  <span class="vinco" aria-hidden="true"></span>
</div>
