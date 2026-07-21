<?php /* HQ (fixed section §11): B&W 3-panel strip, all terminals RECREATED in CSS
   (text, not image). Q1 waits; Q2 the typo that self-corrects into `claude`;
   Q3 the HAL monologue (2001 parody) + the red eye. Alias "Pyotor" ONLY. No
   R$ figures, no real username/domain/path. Styles: edicao.css (.hq / .crt-tela
   / .hal-eye). Prompts and commands stay ASCII; ui-monospace renders fine. */ ?>
<figure class="hq">
  <div class="hq-strip">

    <?php /* Q1 - the screen powers on, the prompt waits */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">1</span>
      <div class="crt-tela">
        <p><span class="pr">pyotor@fedora:~$</span> <span class="crt-cur" aria-hidden="true"></span></p>
      </div>
    </div>

    <?php /* Q2 - the typo (claud), the error, and the fix down to `claude` */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">2</span>
      <div class="crt-tela">
        <p><span class="pr">pyotor@fedora:~$</span> claud</p>
        <p class="er">bash: claud: command not found</p>
        <p><span class="pr">pyotor@fedora:~$</span> cd ~/proj/gusworld/</p>
        <p><span class="pr">pyotor@fedora:~/gusworld$</span> claude</p>
      </div>
    </div>

    <?php /* Q3 - HAL wakes up. The REAL screen of the monologue (tui_claude.png),
       untouched (intentional fictional props, authorized by the lead). Panel EQUAL
       to the others (3 columns), with the red HAL eye pinned to the header-right
       (glow that BREATHES, aria-hidden; lit and still under prefers-reduced-motion).
       The <a class="zoom-link"> wraps the image: WITHOUT JS it opens the real-size
       PNG (progressive enhancement); WITH JS the lightbox (pecas.js) intercepts and
       enlarges in-page to read the monologue. Real width/height -> 0 CLS. */ ?>
    <div class="hq-q">
      <span class="hq-n" aria-hidden="true">3</span>
      <figure class="hq-hal-foto">
        <a class="zoom-link" href="/assets/edicao-1/tui_claude.png" data-hal-eye="1"
           aria-label="Enlarge the HAL screen to read the full monologue">
          <img src="/assets/edicao-1/tui_claude.png" width="1911" height="990"
               loading="lazy" decoding="async"
               alt="The assistant's monologue, HAL 9000 tone: &quot;good evening, Pyotor...&quot;, the real terminal screen.">
          <span class="zoom-badge" aria-hidden="true">click to zoom</span>
        </a>
        <span class="hal-eye" aria-hidden="true"></span>
      </figure>
    </div>

  </div>
  <figcaption class="poster-sub" style="margin-top:8px">the strip &middot; the assistant wakes up in a good mood.</figcaption>
</figure>
