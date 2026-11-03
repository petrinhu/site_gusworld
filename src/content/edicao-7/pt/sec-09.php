<?php /* Errata + Cartas (#7), secao 9. Errata: fonte docs/content/edicao-7-copies-curtas.md
   (peca 3, bloco "## pt-BR", ocorrencia 3), vazia com graca. Cartas: fonte
   docs/content/edicao-7-cartas.md (bloco "## pt-BR"), aprovado pelo lider em 03/11/2026.
   Ordem: errata, falas e pensamentos das Cartas, legenda, folha pautada (o pedido do
   Gus Dragon, letra a letra, em portugues: o papel nao se traduz), credito, pensamento
   da mancha. A mancha de suco de uva e CSS (bloco "§09 (edicao #7)" de edicao.css),
   sem imagem. O erro de digitacao do Gus Dragon e dele: nada aqui se corrige. */ ?>

<p class="fala"><span class="prompt">gus@glyfesse:~/errata$</span> <span class="dito">errata</span></p>
<p>Seis edições no ar, e nenhum erro achado desta vez.</p>
<p class="pensa">nenhum erro achado também sai quando ninguém olhou direito</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/cartas$</span> <span class="dito">cartas</span></p>
<p class="pensa">hoje foi esse dia</p>
<p class="fala"><span class="prompt">gus@glyfesse:~/cartas$</span> <span class="dito">tive a ideia da carta glitch</span></p>
<p class="fala"><span class="prompt">gus@glyfesse:~/cartas$</span> <span class="dito">mandei dias antes... aprovada em 21 de agosto de 2026</span></p>
<p class="fala"><span class="prompt">gus@glyfesse:~/cartas$</span> <span class="dito">entrou no jeito de guardar os mapas... nas cartas ainda nao</span></p>
<p class="pensa">eu escrevi: mais como puzzle, não como arma</p>

<p class="caderno-legenda">Pedido do Gus Dragon, do jeito que ele mandou:</p>

<figure class="caderno">
  <svg class="caderno-filtros" width="0" height="0" aria-hidden="true" focusable="false" style="position:absolute">
    <defs>
      <filter id="mancha-uva" x="-40%" y="-40%" width="180%" height="180%">
        <feTurbulence type="fractalNoise" baseFrequency="0.022 0.028" numOctaves="3" seed="11" result="ruido"/>
        <feDisplacementMap in="SourceGraphic" in2="ruido" scale="30" xChannelSelector="R" yChannelSelector="G"/>
      </filter>
    </defs>
  </svg>
  <div class="folha-caderno">
    <span class="fita" aria-hidden="true"></span>
    <div class="pauta">
      <p class="manuscrito">A ideia de nova carta é a carta do glitch, por equanto nao pensei em uso em batallha (irei responder ao issue se necessario), tenho um uso FORA de batalha, que em dungeons ou lugares especificos ela deixa voce clippar nos blocos para continuar na dungeon.</p>
    </div>
    <span class="mancha uva pe" aria-hidden="true"></span>
  </div>
</figure>

<p class="caderno-credito">Gus Dragon, playtester, Revisor Adversarial de Design</p>

<p class="pensa">poxa, manchei de suco de uva de novo</p>
