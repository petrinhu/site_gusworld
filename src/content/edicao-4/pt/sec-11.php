<?php
/* HQ · a tirinha (#4) - arte portada do mock docs/design/mockups/22-hq-o-jornal.html
   (a moldura de folha, o masthead, o kicker/título e o rodapé do mock NÃO vêm: a página
   da edição já tem os seus). Estilos: edicao.css, bloco "§11 (edição #4) · o BANCO, o
   LEITOR e o JORNAL". Item de board: ED4-MONTAGEM.

   REUSA a mesma sala da HQ da #3 (.hq3/.tira/.cena/.chao/.parede/.q/.rastro/.num), com
   o modificador `.leitura` no wrapper. Roteiro (pauta da edição 4, seção 11):
     1. banco.  - o banco junto à parede, o leitor sentado com o jornal erguido na altura
                  do rosto, e o quadrado entrando pela borda com a faixa .dir na face
                  direita (a primeira vez que ele "olha" para alguém).
     2. banco.  - o quadrado atravessou a sala e parou DIANTE DO BANCO (não mais
                  encostado na parede: desta vez tem alguém no caminho). O jornal
                  continua erguido.
     3. jornal. - o MESMO quadro. Muda uma coisa só: o jornal desce para o colo.

   ⛔ NÃO EXISTE DESENHO, a mesma regra dura da HQ #3: retângulo, borda, hachura,
   posição. O banco, o leitor e o jornal são RETÂNGULOS - o leitor não ganha cabeça,
   braço nem mão; a "mão" é só a posição do retângulo do jornal no ar.

   ⚠️ O QUADRADO CONTINUA SEM ROSTO. A faixa .dir não é um olho: é uma faixa mais
   escura numa das faces, presente nos 3 quadros desde o início (não aparece nem
   desaparece). É o mínimo de "direção" que a geometria permite sem virar cara.

   ★ A PIADA É O SILÊNCIO. O quadro 3 é igual ao 2, pixel por pixel, exceto o jornal
   descer - o que revela o leitor inteiro pela primeira vez (antes o jornal cobria o
   topo dele por completo). NENHUM balão, NENHUMA palavra nova: a resposta é o jornal
   baixar. Se alguém "melhorar" isso com uma fala, a tira morre.

   ZERO ANIMAÇÃO, e é decisão, não esquecimento: a tira vai impressa e tem que funcionar
   parada. Logo não há o que desligar em prefers-reduced-motion. ZERO JS. */
?>
<div class="hq3 leitura">
  <ol class="tira">

    <?php /* QUADRO 1 · banco. Ele está lá, mas só uma lasca: entra pela borda esquerda
       e o resto ficou fora do quadro. A faixa .dir já vem com ele, desde o início. */ ?>
    <li>
      <figure>
        <div class="cena" role="img"
             aria-label="Quadro um: a mesma sala, chão hachurado e parede à direita. Junto à parede, um banco com uma forma sentada segurando um jornal erguido, na altura do rosto. No canto esquerdo, uma lasca de azul entrando pela borda, com uma faixa mais escura na lateral direita.">
          <span class="num" aria-hidden="true">1</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="banco-assento"></span>
          <span class="banco-encosto"></span>
          <span class="leitor"></span>
          <span class="jornal"></span>
          <span class="q lasca"><span class="dir" aria-hidden="true"></span></span>
        </div>
        <figcaption>banco.</figcaption>
      </figure>
    </li>

    <?php /* QUADRO 2 · banco. O quadrado atravessou a sala e parou diante do banco -
       desta vez tem alguém no caminho, não mais a parede. O jornal segue erguido. */ ?>
    <li>
      <figure>
        <div class="cena" role="img"
             aria-label="Quadro dois: o quadrado azul atravessou a sala e parou diante do banco. A forma sentada continua com o jornal erguido na altura do rosto. Linhas de velocidade atrás do quadrado.">
          <span class="num" aria-hidden="true">2</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="banco-assento"></span>
          <span class="banco-encosto"></span>
          <span class="leitor"></span>
          <span class="jornal"></span>
          <span class="rastro"></span>
          <span class="q diante"><span class="dir" aria-hidden="true"></span></span>
        </div>
        <figcaption>banco.</figcaption>
      </figure>
    </li>

    <?php /* QUADRO 3 · jornal. O MESMO quadro do 2. A única diferença: o jornal desceu
       para o colo. Sem balão, sem palavra - a resposta é o jornal baixar. */ ?>
    <li>
      <figure>
        <div class="cena" role="img"
             aria-label="Quadro três: o mesmo quadro anterior, mas o jornal desceu para o colo da forma sentada.">
          <span class="num" aria-hidden="true">3</span>
          <span class="chao"></span>
          <span class="parede"></span>
          <span class="banco-assento"></span>
          <span class="banco-encosto"></span>
          <span class="leitor"></span>
          <span class="jornal baixo"></span>
          <span class="rastro"></span>
          <span class="q diante"><span class="dir" aria-hidden="true"></span></span>
        </div>
        <figcaption>jornal.</figcaption>
      </figure>
    </li>

  </ol>
</div>
