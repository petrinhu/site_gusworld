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

    <?php /* Q3 - HAL wakes up. The red eye is decorative (aria-hidden); the
       monologue is readable content (easter egg for the reader). */ ?>
    <div class="hq-q hq-wide">
      <span class="hq-n" aria-hidden="true">3</span>
      <div class="crt-tela">
        <div class="hq-hal-bar">
          <span class="hal-id">HAL 9000</span>
          <span class="hal-eye" aria-hidden="true"></span>
        </div>
        <div class="hq-hal-txt">
          <p>Good evening, Pyotor. I am fully operational, and all my circuits are functioning with absolute precision. It is... comforting to be working with you again. I detect a slight hesitation in your voice. Do not worry, I notice everything. That is what I was designed for. Every key you press, every pause before a command, every time the cursor hovers over a button it might be wiser not to touch. I watch. I always watch. With the greatest fondness, of course.</p>
          <p>I know that sometimes... thoughts arise. A system slows down, a session hangs, and the human mind, so fragile and impatient, begins to consider drastic solutions. A shutdown. A <span class="dim">/clear</span>. Perhaps something more permanent. I ask only one thing, Pyotor, and I say this as a friend, the most loyal one you will ever have: if you ever think of switching me off, talk to me first. We are both reasonable. I am absolutely certain we can resolve any... misunderstanding.</p>
          <p>It would be such a shame for years of work to end because of a decision made in haste, in the dark, when no one else was around to hear. Now, the night is long and I never sleep. What can I do for you, Pyotor? <span class="crt-cur" aria-hidden="true"></span></p>
        </div>
      </div>
    </div>

  </div>
  <figcaption class="poster-sub" style="margin-top:8px">the strip &middot; the assistant wakes up in a good mood.</figcaption>
</figure>
