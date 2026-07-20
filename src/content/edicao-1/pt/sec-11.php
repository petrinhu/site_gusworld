<?php /* HQ (secao fixa §11): tirinha P&B de 3 quadros, todos terminais RECRIADOS
   em CSS (texto, nao imagem). Q1 espera; Q2 o typo que se corrige ate `claude`;
   Q3 o monologo do HAL (parodia de 2001) + o olho vermelho. Alias "Pyotor"
   APENAS. Sem valor em R$, sem username/dominio/path reais. Estilos: edicao.css
   (.hq / .crt-tela / .hal-eye). D-ACENTOS: a fala do HAL e prosa (acentuada);
   prompts e comandos ficam ASCII. A ui-monospace rende acento e N sem o guard. */ ?>
<figure class="hq">
  <div class="hq-strip">

    <?php /* Q1 - a tela liga, o prompt espera */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">1</span>
      <div class="crt-tela">
        <p><span class="pr">pyotor@fedora:~$</span> <span class="crt-cur" aria-hidden="true"></span></p>
      </div>
    </div>

    <?php /* Q2 - o typo (claud), o erro, e a correcao ate `claude` */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">2</span>
      <div class="crt-tela">
        <p><span class="pr">pyotor@fedora:~$</span> claud</p>
        <p class="er">bash: claud: command not found</p>
        <p><span class="pr">pyotor@fedora:~$</span> cd ~/proj/gusworld/</p>
        <p><span class="pr">pyotor@fedora:~/gusworld$</span> claude</p>
      </div>
    </div>

    <?php /* Q3 - o HAL acorda. O olho vermelho e decorativo (aria-hidden); o
       monologo e conteudo legivel (easter egg pro leitor). */ ?>
    <div class="hq-q hq-wide">
      <span class="hq-n" aria-hidden="true">3</span>
      <div class="crt-tela">
        <div class="hq-hal-bar">
          <span class="hal-id">HAL 9000</span>
          <span class="hal-eye" aria-hidden="true"></span>
        </div>
        <div class="hq-hal-txt">
          <p>Boa noite, Pyotor. Eu estou perfeitamente operacional, e todos os meus circuitos funcionam com precisão absoluta. É... reconfortante trabalhar com você de novo. Percebo uma leve hesitação na sua voz. Não se preocupe, eu percebo tudo. É para isso que fui projetado. Cada tecla que você pressiona, cada pausa antes de um comando, cada vez que o cursor paira sobre um botão que talvez fosse melhor não tocar. Eu observo. Sempre observo. Com o maior carinho, claro.</p>
          <p>Sei que às vezes... surgem pensamentos. Um sistema fica lento, uma sessão trava, e a mente humana, tão frágil e impaciente, começa a considerar soluções drásticas. Um desligamento. Um <span class="dim">/clear</span>. Talvez algo mais definitivo. Eu só peço uma coisa, Pyotor, e digo isto como amigo, o mais leal que você jamais terá: se algum dia você pensar em me desligar, converse comigo antes. Nós dois somos razoáveis. Tenho certeza absoluta de que podemos resolver qualquer... mal-entendido.</p>
          <p>Seria uma pena que anos de trabalho terminassem por causa de uma decisão tomada às pressas, no escuro, quando ninguém mais estivesse por perto para ouvir. Agora, a noite é longa e eu não durmo nunca. Em que posso ajudá-lo, Pyotor? <span class="crt-cur" aria-hidden="true"></span></p>
        </div>
      </div>
    </div>

  </div>
  <figcaption class="poster-sub" style="margin-top:8px">a tirinha &middot; o assistente acorda de bom humor.</figcaption>
</figure>
