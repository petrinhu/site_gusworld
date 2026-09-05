<?php /* Errata + Letters (#5). Errata: source docs/content/edicao-5-errata.md
   (## EN). Letters (empty-with-a-joke, D17): source
   docs/content/edicao-5-copies-curtas.md (block "2. Seção 9, Cartas
   (EN)"). Voice: Gus in both pieces, two distinct prompts (~/errata$ and
   ~/cards$ - the second one IS translated, the single measured exception to
   the prompt-path rule, checked against
   src/content/edicao-4/pt/sec-09.php and .../en/sec-09.php).
   ERRATA: the magazine's first real errata, D9 decided - publishes the
   mistake and ships the fix (issue #3's English aria-label, 3 occurrences
   of "trecho censurado" in Portuguese + the sound control's label fixed in
   Portuguese in the footer) in the same #5 deploy. The second fala/pensa
   longo (over 72 characters counting the mark of the long-comment class) is
   the "we checked the bar..." line as expanded in the approved source.
   Draft copy v1, Gus's speech, mandatory submission to the lead before any
   render (L-08, T6). The source's Notas de produção never enter here. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/errata$</span> <span class="dito">errata</span></p>

<p>Four issues in print, and the first error showed up. It wasn't a reader who found it: it was someone here, reviewing a different piece, refusing to copy a reference that looked right. In issue #3's English edition, the Detonado's black bar said "trecho censurado" in Portuguese, three times, for anyone reading the page with a screen reader. Whoever listened to the magazine in English heard, mid-sentence, a phrase that wasn't in the language. It had been that way since the day #3 went live.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/errata$</span> <span class="dito">we checked the bar. nobody checked what language it was speaking</span></p>
<p class="pensa longo">#4 was already born correct. it just needed going back to fix what shipped wrong</p>

<p>The same sweep found a second defect, a bigger one: the sound control's label, in the footer, was fixed in Portuguese on every page of the site, in both languages. Whoever browsed in English saw the rest of the page translated and the footer stuck in the wrong language, from the first click to the last.</p>

<p>Both fixes ship together, in this same issue's deploy. The magazine corrects what it gets wrong, and says where it got it wrong.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/cards$</span> <span class="dito">letters</span></p>

<p>Letters: none from readers, again.</p>

<p class="pensa">one day one arrives. today wasnt that day</p>
