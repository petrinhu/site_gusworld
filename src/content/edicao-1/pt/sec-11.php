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

    <?php /* Q3 - o HAL acorda. Agora e a tela REAL do monologo (tui_claude.png),
       embutida inteira e sem retoque (props ficticios autorizados pelo lider),
       com o olho vermelho do HAL sobreposto no topo-direito (glow pulsante,
       aria-hidden; parado sob prefers-reduced-motion). width/height reais -> 0 CLS. */ ?>
    <div class="hq-q hq-wide">
      <span class="hq-n" aria-hidden="true">3</span>
      <figure class="hq-hal-foto">
        <img src="/assets/edicao-1/tui_claude.png" width="1911" height="990"
             loading="lazy" decoding="async"
             alt="O monólogo do assistente, tom HAL 9000: &quot;boa noite, Pyotor...&quot;, a tela real do terminal.">
        <span class="hal-eye" aria-hidden="true"></span>
      </figure>
    </div>

  </div>
  <figcaption class="poster-sub" style="margin-top:8px">a tirinha &middot; o assistente acorda de bom humor.</figcaption>
</figure>
