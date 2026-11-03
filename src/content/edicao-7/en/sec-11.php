<?php /* HQ (secao 11) da #7 em EN: "the screen that says all clear", versao A do
   roteiro aprovado pelo lider em 03/11/2026 (docs/content/edicao-7-hq-roteiro.md, EN).
   Tres quadros de terminal RECRIADOS em CSS (texto, nao imagem). Sem personagem,
   sem imagem, sem sprite, sem JS (D19, H1). Texto de tela em ASCII, sem acento.
   O "_" do roteiro e o cursor (.crt-cur), nao e texto.
   Estilos: edicao.css, bloco "§11 (edicao #7)" (.hq-q-col, .hq-leg) e os
   existentes .hq-strip / .hq-q / .crt-tela, que nao mudam. */ ?>
<figure class="hq">
  <div class="hq-strip">

    <?php /* Panel 1: the screen turns on. Only the routine name and the cursor. */ ?>
    <div class="hq-q-col">
      <div class="hq-q">
        <span class="hq-n" aria-hidden="true">1</span>
        <div class="crt-tela">
          <p>automatic check</p>
          <p><span class="crt-cur" aria-hidden="true"></span></p>
        </div>
      </div>
      <p class="hq-leg">on.</p>
    </div>

    <?php /* Panel 2: the reading starts and stops. No result line yet. */ ?>
    <div class="hq-q-col">
      <div class="hq-q">
        <span class="hq-n" aria-hidden="true">2</span>
        <div class="crt-tela">
          <p>automatic check</p>
          <p>reading the list...</p>
          <p><span class="crt-cur" aria-hidden="true"></span></p>
        </div>
      </div>
      <p class="hq-leg">reading.</p>
    </div>

    <?php /* Panel 3: the absence in .dim (faded text) and the verdict in .pr. No .er: no alarm. */ ?>
    <div class="hq-q-col">
      <div class="hq-q">
        <span class="hq-n" aria-hidden="true">3</span>
        <div class="crt-tela">
          <p>automatic check</p>
          <p>reading the list...</p>
          <p class="dim">list: not found</p>
          <p><span class="pr">result: all clear</span></p>
          <p><span class="crt-cur" aria-hidden="true"></span></p>
        </div>
      </div>
      <p class="hq-leg">reading.</p>
    </div>

  </div>
</figure>
