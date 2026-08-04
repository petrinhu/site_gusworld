<?php /* Gus Reads the Bus (#3) - source: docs/content/edicao-3-vazios.md §18 (## EN). Voice: Gus.
   ★★ The // line is the CREATOR's and goes VERBATIM (logged in PAUTA-EDICAO-3, §Section 18).
   ⚠️ The text does NOT explain the joke, and must not: "bus" has two senses (the message
   channel and the bus you ride), and the bus full of ghosts is headed for the Graveyard of
   Dead Ideas, which in this very issue is full, with three headstones. The reader connects
   it alone. Honest emptiness: in June 2026 the channel did not exist yet.
   ⚠️ The path is not translated: it stays ~/bus.
   ★ The ART (the tube screen with the empty bus) was built: styles in edicao.css, block
   "§18 · A CAIXA DO BUS VAZIA". It is FRAME, not copy: the three lines above are
   untouched and the screen adds no line of Gus's — only terminal vocabulary (the
   command, the column header, the zero counter, the cursor).
   ⚠️ The path and the command are NOT translated: they stay ~/bus and bus --inbox.
   Only the column header and the counter are (they are prose the reader reads).
   ⛔ THE ART DOES NOT EXPLAIN THE JOKE EITHER: no ghosts, no bus you ride. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">gus reads the bus</span></p>

<p>Not a single message this issue. I opened it, checked twice, there's nothing to read.</p>

<?php /* THE SCREEN. The command shows up TWICE with the same output: it is the
   "checked twice" of the paragraph turned into image. Repeating IS the piece. */ ?>
<figure class="bus-crt">
  <div class="crt-scr" role="img"
       aria-label="A green tube screen showing the bus inbox. The command was run twice and the listing came back with no rows at all: only the column header, the empty gap and the counter at zero messages. At the end, the cursor blinks at the prompt.">
    <div class="crt-tela">
      <p class="cmd"><span class="pr">gus@glyfesse:~/bus$</span> bus --inbox</p>

      <div class="cx">
        <p class="cab"><span>FROM</span><span class="assunto">SUBJECT</span><span>WHEN</span></p>
        <p class="nada">(no messages)</p>
        <p class="conta"><span class="z">0</span> received &middot; <span class="z">0</span> unread</p>
      </div>

      <p class="cmd de-novo"><span class="pr">gus@glyfesse:~/bus$</span> bus --inbox</p>
      <p class="conta"><span class="z">0</span> received &middot; <span class="z">0</span> unread</p>

      <p class="fim"><span class="pr">gus@glyfesse:~/bus$</span> <span class="crt-cur"></span></p>
    </div>
  </div>
  <figcaption>the bus inbox, empty</figcaption>
</figure>

<p class="pensa">the bus is strangely empty... or packed with ghosts headed for the cemetery?</p>
