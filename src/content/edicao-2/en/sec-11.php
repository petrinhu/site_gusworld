<?php /* HQ (fixed section §11) #2 - source: docs/content/edicao-2-vazios.md §11 (Route B,
   construction theme). B&W 3-panel strip, ALL terminals RECREATED in CSS (text, not
   image): Q1 `dotnet new` (the scaffold rises), Q2 the old beam falls + the "GDScript"
   headstone in the back, Q3 `dotnet build` rebuilding + the steady cursor. Alias
   "pyotor" ONLY; no R$ figures, no real username/domain/path. Styles: edicao.css
   (.hq / .crt-tela / .crt-cur / .lapide-mini / .hq-art). Narration is prose; prompts
   and commands stay ASCII. Short lines without a final period; the caption is prose.
   The scaffold ASCII (.hq-art) is ornament -> aria-hidden.
   ⚠️ "GDScript" has no uppercase N -> it escapes the pixelfont N->H guard. */ ?>
<figure class="hq">
  <div class="hq-strip">

    <?php /* Q1 - dotnet new: the scaffold starts to rise */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">1</span>
      <div class="crt-tela">
        <p><span class="pr">pyotor@fedora:~/gusworld$</span> dotnet new</p>
        <pre class="hq-art" aria-hidden="true">   +==+==+
   |  |  |
+==+==+==+</pre>
        <p class="dim">// a scaffold starts to rise</p>
      </div>
    </div>

    <?php /* Q2 - the old beam falls; the "GDScript" headstone in the back (same as the cemetery, §07) */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">2</span>
      <div class="crt-tela">
        <p>the old beam didn't hold. all on the floor again</p>
        <p class="dim">// again?... again</p>
        <span class="lapide-mini" aria-hidden="true"><span class="lm-nome">GDScript</span></span>
      </div>
    </div>

    <?php /* Q3 - dotnet build: rebuilding, the cursor blinking steady */ ?>
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
  <figcaption class="poster-sub" style="margin-top:8px">the strip &middot; to build is to tear down, with patience.</figcaption>
</figure>
