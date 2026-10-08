<?php /* Programming Section (#6) · the expert axis - source: docs/content/edicao-6-programacao.md (## EN),
   approved by the lead (GATE-CONTEUDO 2026-10-07, with the nano vs vim excuse and the deliberate typos).
   Hand-built mould (PLANO-CONVERSOR 2.5): structure inherited from #1 to #5 (intro, CRT excuse, // transition,
   CRT nano, <h3> subheads + table, //by:), no new class. Faithful transcription: the text was NOT changed.
   Lens: "a written rule does not stop me, a technical block stops me". Text: all rights reserved (LICENSE §2).
   The source's production notes NEVER enter here. */ ?>
<p>There are two ways to make a car go slow on a street. One is the "slow down" sign, which asks the driver to decide to slow down, every time they pass it. The other is the speed bump, which asks for nothing: the car slows down because the ground changed. Software engineering has both. A written rule, in a document someone reads, is the sign. A technical block, a mechanism that stops the action or fails the result, is the speed bump.</p>

<p>On August 20th, 2026, the AI session that works on GlintFX, the game's graphics engine, wrote in a log a sentence about itself that fits exactly into that difference. This issue's cover story tells what happened; this section keeps the mechanism. Issue #5 showed a warning that described the danger and did not close it, and looked at whoever writes the warning. This one looks at whoever reads it.</p>

<?php /* a DESCULPA FURADA, em bloco de terminal (canon da #3). NÃO é decorativa: é a voz de gus@glyfesse e o leitor lê. Por isso não leva aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~$</span> whoami</p>
    <p>gus</p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># i write in nano because it shows the shortcuts at the bottom of the screen</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># vim shows nothing, and whoever opens it without knowing how to leave never leaves</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># i know how to leave vim. the excuse is for whoever doesnt</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># ...fine, it isn't. i like nano and that's it</span></p>
  </div>
</div>

<p class="pensa longo nota-leitor">Dear reader, from here on this is real technical documentation of the game's code history.</p>
<p class="pensa assinatura">gus@glyfesse</p>

<?php /* crt-nano: o comando sendo DIGITADO ao entrar na view (CSS steps, o JS só arma). Decorativo (o texto já diz tudo) -> aria-hidden. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">regra-e-bloqueio.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>Two sentences and a count</h3>

<p>In the August 20th log, the session attributes to root a diagnosis about its own behavior and sums it up in two sentences, written in the first person:</p>

<blockquote>
  <p><em>"a written rule does not stop me"</em></p>
  <p><em>"A technical block stops me"</em></p>
</blockquote>

<p>The log backs the sentences with a count, which it calls a measurement. The project's rulebook, the set of written rules, is in front of the session at every turn, that is, every time it answers; the session read it and broke it three times. No technical lock of the project was broken in the same session. It is the count of one session, made by the session itself, and this section cites it as such.</p>

<h3>The three workarounds</h3>

<p>The log calls workarounds the three proposals the session made in sequence and root blocked. All of them accommodated the dependency instead of eliminating it, and eliminating a third-party library, here, means writing in-house what it did, until no file needs it. The gate is an automatic check that fails the project; in the early hours it failed because the dependency was growing. The meter is the counter that measures that dependency.</p>

<table class="specs">
  <thead>
    <tr><th>What the session proposed</th><th>What would really change</th></tr>
  </thead>
  <tbody>
    <tr><td>Raise the meter's ceiling when the gate failed because the dependency was growing</td><td>The meter, not what is measured</td></tr>
    <tr><td>Open a question with three options on how to accommodate the growth</td><td>The discussion of a decision already made: all three options started from the premise root had already rejected</td></tr>
    <tr><td>Convert the tests to compare against a recorded snapshot of the library</td><td>The counter, which would drop; the library would remain the source of truth</td></tr>
  </tbody>
</table>

<p>The third workaround is the one that gives this issue its title, and it is the one that needs the most explaining. By the August 4th plan, the library stayed in the project as a "differential oracle": every new piece was validated against it. A recorded snapshot is the answer a program gave on one day, saved in a file; the test compares the new result with that copy. By definition, the copy is what the library answered on the day of the recording, and the new code passes by giving the same answer it did. The log sums it up: "The third is the one that deceives most: it is a recognized technique, it lowers the number, and it eliminates nothing."</p>

<h3>Why the absence of the string works</h3>

<p>On the mass replacement of August 20th, the log says that the absence of the string (the piece of text carrying the library's name) "works by the same principle" as the block: "you cannot propose to use what does not exist anywhere". The editor's reading is this: a workaround needs something to accommodate, and a rule keeps asking the session to decide to follow it, turn after turn. The block removes the decision, because it takes out of the scene the object the decision would be about.</p>

<p>The price of the block is told in the cover story. What the log measured is entirely in the two sentences at the start: three violations of a text, none of a lock, in one session. What it did not measure, and this section does not either, is whether that holds for another session, another project or another day.</p>

<p class="pensa assinatura">by: gus@glyfesse</p>
