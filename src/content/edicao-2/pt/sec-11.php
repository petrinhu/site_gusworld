<?php /* HQ (secao fixa §11) #2 - fonte: docs/content/edicao-2-vazios.md §11 (Rota B, tema
   construcao). Tirinha P&B de 3 quadros, TODOS terminais RECRIADOS em CSS (texto, nao
   imagem): Q1 `dotnet new` (o andaime sobe), Q2 a viga velha cai + a mini-lapide
   "GDScript" ao fundo, Q3 `dotnet build` reconstruindo + o cursor firme. Alias "pyotor"
   APENAS; sem valor em R$, sem username/dominio/path reais. Estilos: edicao.css
   (.hq / .crt-tela / .crt-cur / .lapide-mini / .hq-art). D-ACENTOS: a narracao e prosa
   (acentuada); prompts e comandos ficam ASCII. As falas curtas sem ponto final; a
   legenda e prosa. O andaime ASCII (.hq-art) e ornamento -> aria-hidden.
   ⚠️ "GDScript" nao tem N maiusculo -> escapa do guard N->H da pixelfont. */ ?>
<figure class="hq">
  <div class="hq-strip">

    <?php /* Q1 - dotnet new: o andaime comeca a subir */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">1</span>
      <div class="crt-tela">
        <p><span class="pr">pyotor@fedora:~/gusworld$</span> dotnet new</p>
        <pre class="hq-art" aria-hidden="true">   +==+==+
   |  |  |
+==+==+==+</pre>
        <p class="dim">// um andaime começa a subir</p>
      </div>
    </div>

    <?php /* Q2 - a viga velha cai; ao fundo, a lapide "GDScript" (a mesma do cemiterio, §07) */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">2</span>
      <div class="crt-tela">
        <p>a viga velha não aguentou. tudo no chão de novo</p>
        <p class="dim">// de novo?... de novo</p>
        <span class="lapide-mini" aria-hidden="true"><span class="lm-nome">GDScript</span></span>
      </div>
    </div>

    <?php /* Q3 - dotnet build: reconstruindo, o cursor piscando firme */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">3</span>
      <div class="crt-tela">
        <p><span class="pr">pyotor@fedora:~/gusworld$</span> dotnet build</p>
        <pre class="hq-art" aria-hidden="true">+==+==+==+
|  |  |  |
+==+==+==+
|  |  |  |</pre>
        <p><span class="crt-cur" aria-hidden="true"></span></p>
      </div>
    </div>

  </div>
  <figcaption class="poster-sub" style="margin-top:8px">a tirinha &middot; construir é derrubar com paciência.</figcaption>
</figure>
