<?php
/* HQ · a tirinha (#3) - arte portada do mock docs/design/mockups/18-hq-o-quadrado.html
   (a moldura de folha, o masthead, o kicker/título e o rodapé do mock NÃO vêm: a página
   da edição já tem os seus). Estilos: edicao.css, bloco "§11 · a TIRINHA DO QUADRADO".
   Roteiro aprovado (PAUTA-EDICAO-3, seção 11): 1. a sala vazia · 2. o quadrado dá um
   passo e esbarra · 3. ele insiste.

   ⛔ NÃO EXISTE DESENHO, e não vai existir: o líder não é ilustrador (regra dura da
   casa). A tirinha inteira é GEOMETRIA CSS - retângulo, borda, hachura, posição. Zero
   SVG figurativo, zero imagem, zero emoji fazendo de personagem.

   ⚠️ O ELENCO É UM QUADRADO E UMA SALA. Ele NÃO ganha olho, boca, braço nem deformação
   de impacto: a graça é ele ser um quadrado. Resistir a humanizar é metade do trabalho.

   ★ A PIADA É A ECONOMIA. O quadro 3 é quase pixel-por-pixel o quadro 2: muda só a
   densidade dos traços, o eco tracejado do passo anterior e as marcas no chão. A
   repetição É o texto, e a legenda do 3 repete a do 2 DE PROPÓSITO. Se alguém
   "melhorar" o quadro 3 dando a ele um desfecho, a tirinha morre.

   ZERO ANIMAÇÃO, e é decisão, não esquecimento: a tira vai impressa e tem que funcionar
   parada. Logo não há o que desligar em prefers-reduced-motion. ZERO JS. */
?>
<div class="hq3">
  <ol class="tira">

    <?php /* QUADRO 1 · a sala vazia. Ele está lá, mas só uma lasca: entra pela borda
       esquerda e o resto ficou fora do quadro. É o silêncio antes. */ ?>
    <li>
      <figure>
        <div class="cena q1" role="img"
             aria-label="Quadro um: uma sala vazia, vista de lado. O chão hachurado e uma parede à direita. No canto esquerdo, uma lasca de azul entrando pela borda, quase fora do quadro.">
          <span class="num" aria-hidden="true">1</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="q lasca"></span>
        </div>
        <figcaption>sala.</figcaption>
      </figure>
    </li>

    <?php /* QUADRO 2 · o passo, e o contato. Rastro de linhas atrás (ele veio andando)
       e o leque de traços saindo exatamente do meio da face direita. */ ?>
    <li>
      <figure>
        <div class="cena q2" role="img"
             aria-label="Quadro dois: o quadrado azul atravessou a sala e parou colado na parede da direita. Linhas de velocidade atrás dele e traços de impacto no ponto de contato.">
          <span class="num" aria-hidden="true">2</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="rastro"></span>
          <span class="q">
            <span class="fx" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></span>
          </span>
        </div>
        <figcaption>parede.</figcaption>
      </figure>
    </li>

    <?php /* QUADRO 3 · de novo. O MESMO quadro: só o eco do passo anterior, o rastro
       mais fechado, um segundo leque girado e dois riscos no chão. Nem vitória nem
       desistência: teimosia. */ ?>
    <li>
      <figure>
        <div class="cena q3" role="img"
             aria-label="Quadro três: o quadrado tenta outra vez, do mesmo jeito e no mesmo lugar. Um contorno tracejado marca onde ele estava, e há dois riscos no chão junto da parede.">
          <span class="num" aria-hidden="true">3</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="marca a"></span>
          <span class="marca b"></span>
          <span class="rastro"></span>
          <span class="q eco"></span>
          <span class="q">
            <span class="fx" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></span>
            <span class="fx bis" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></span>
          </span>
        </div>
        <figcaption>parede.</figcaption>
      </figure>
    </li>

  </ol>
</div>
