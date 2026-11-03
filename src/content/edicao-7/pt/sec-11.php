<?php /* HQ (secao 11) da #7: "a tela que diz tudo certo", versao A do roteiro
   aprovado pelo lider em 03/11/2026 (docs/content/edicao-7-hq-roteiro.md, pt-BR).
   Tres quadros de terminal RECRIADOS em CSS (texto, nao imagem). Sem personagem,
   sem imagem, sem sprite, sem JS (D19, H1). Texto de tela em ASCII, sem acento
   (regra tela x papel). O "_" do roteiro e o cursor (.crt-cur), nao e texto.
   Estilos: edicao.css, bloco "§11 (edicao #7)" (.hq-q-col, .hq-leg) e os
   existentes .hq-strip / .hq-q / .crt-tela, que nao mudam. */ ?>
<figure class="hq">
  <div class="hq-strip">

    <?php /* Q1: a tela liga. So o nome da rotina e o cursor. */ ?>
    <div class="hq-q-col">
      <div class="hq-q">
        <span class="hq-n" aria-hidden="true">1</span>
        <div class="crt-tela crt-v7">
          <p>conferencia automatica</p>
          <p><span class="crt-cur" aria-hidden="true"></span></p>
        </div>
      </div>
      <p class="hq-leg">ligada.</p>
    </div>

    <?php /* Q2: a leitura comeca e para. Nenhuma linha de resultado ainda. */ ?>
    <div class="hq-q-col">
      <div class="hq-q">
        <span class="hq-n" aria-hidden="true">2</span>
        <div class="crt-tela crt-v7">
          <p>conferencia automatica</p>
          <p>lendo a lista...</p>
          <p><span class="crt-cur" aria-hidden="true"></span></p>
        </div>
      </div>
      <p class="hq-leg">lendo.</p>
    </div>

    <?php /* Q3: a ausencia em .dim (teor apagado) e o veredito em .pr. Sem .er: nenhum alarme. */ ?>
    <div class="hq-q-col">
      <div class="hq-q">
        <span class="hq-n" aria-hidden="true">3</span>
        <div class="crt-tela crt-v7">
          <p>conferencia automatica</p>
          <p>lendo a lista...</p>
          <p class="dim">lista: nao encontrada</p>
          <p><span class="pr">resultado: tudo certo</span></p>
          <p><span class="crt-cur" aria-hidden="true"></span></p>
        </div>
      </div>
      <p class="hq-leg">lendo.</p>
    </div>

  </div>
</figure>
