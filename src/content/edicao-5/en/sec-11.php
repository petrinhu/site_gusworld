<?php
/* Comic Strip (#5) — THIRD-PARTY WORK, commissioned and paid for by the lead.
   Board item: ED5-PAUTA. ⛔ No drawing, scripting or retouching by us: the art
   is untouched; only the MARKUP (HTML/CSS assembly) is ours.

   Source: resources/arquivo_pessoal_petrus/Tirinha-Petrus-082026-02-{Horizontal,
   quadrada}.png (gitignored folder — originals do NOT enter the repo; only the
   copy in public_html/assets/edicao-5/, byte-for-byte identical, sha256
   checked while producing this section). Two layouts of the SAME strip, by
   the artist:
     - Horizontal (1196×284, 4.2:1): 4 panels side by side.
     - Square     (659×585, 1.13:1): the same 4 panels in a 2×2 grid.
   ★ THE CUTOFF IS 680px, MEASURED (not guessed) — the measurement caught a
   math mistake of mine along the way; both are recorded here so a future
   reviewer doesn't repeat the wrong one.
   METHOD: both files are the SAME set of 4 panels, drawn at nearly the same
   native size (each horizontal panel is ≈299×284px; each square panel,
   ≈330×293px — same art, just REARRANGED into 1 row or a 2×2 grid). Since
   each layout is only a different arrangement of the SAME panels,
   "legibility" doesn't depend on the layout: it depends only on SCALE —
   rendered column width ÷ the ORIGINAL width of the whole file (1196px for
   horizontal, 659px for square). Finding the cutoff means finding the
   viewport at which the horizontal's scale reaches the square layout's
   scale at the point the lead already validated as legible (390px viewport).
   REAL MEASUREMENT (headless Chromium, CDP, disposable profile — not the
   pre-implementation estimate): this edition's .conteudo, at a 390px
   viewport, renders 348px wide (not the ~299px assumed before real CSS
   existed — the sheet's real padding is a bit smaller). That gives the
   square layout a scale of 348÷659 = 0.528 (measured height: 309px — taller
   than the initial 265px estimate, for the same reason: the real column is a
   bit wider). Matching that 0.528 scale on the horizontal layout needs a
   ≈631.6px column, and the real .conteudo reaches 632.4px exactly at
   viewport:680px (measured point by point, 660→700px, 5px steps). That's why
   the cutoff is 680px, not the 640px of an earlier draft of this same
   section (640px only gave a 593px column → 0.496 scale on the horizontal,
   ~6% below the validated reference — close, but MEASURED as insufficient,
   not picked because it already existed elsewhere on the sheet).
   Below 680px: square. From 680px up (inclusive): horizontal.

   width/height on EACH <source> and on the fallback <img> are the REAL
   dimensions of both files (not scaled) — they lock the aspect-ratio box
   before the file loads, so swapping sources via the media query never
   pushes the layout (zero CLS on either side).

   The strip is CLICKABLE: the lead's order, verbatim (in Portuguese),
   "Apenas devemos deixar ela clicável para ir ao site vidadesuporte.com.br"
   ("we should just make it clickable to go to vidadesuporte.com.br") — and,
   later, "o clique abre em aba separada, não sai do nosso site" (the click
   opens a separate tab; it doesn't leave our site). The attributes are the
   SAME ones the banca (src/templates/banca.php, lines ~131-138, the lead's
   2026-07-25 decision) already uses for each edition's card: target="_blank"
   rel="noopener" (noopener is mandatory with _blank: without it the new tab
   gets access to the opener window). ⚠️ No extra "noreferrer" — consistency
   with the published pattern outweighs a new preference.
   ⚠️ The banca does NOT warn the reader that the link opens a new tab: its
   aria-label describes the DESTINATION ("Read the issue: TITLE"), never the
   behavior. This is the same here, on purpose — inherited, not forgotten:
   the aria-label below only says where the link leads. If this is ever
   revisited (e.g., adding an "opens in a new tab" accessibility notice), it
   has to be revisited in BOTH places at once — the banca and this section —
   never just here.

   ARTIST CREDIT: the lead decided the name André Farias goes in the
   COLOPHON (sec-19, which does not exist yet / is not part of this work
   order), LINKED to his X profile, `https://x.com/Andre_Suporte` — a fact,
   not my inference: verbatim from the lead ("andre farias deve linkar ao
   perfil X dele" / "André Farias should link to his X profile"), recorded
   in docs/editorial/BRIEFS-EDICAO-5.md lines 823-825 (primary source:
   docs/editorial/PAUTA-EDICAO-5.md line 548). This section does NOT name
   him or use that link — only the clickable link to vidadesuporte.com.br,
   which was the lead's only request for this piece (two DIFFERENT links,
   neither replaces the other). Whoever builds sec-19 needs to open the
   source above, not just this comment.
   ⚠️ PUBLICATION GATE STILL OPEN (not this section's job to resolve, only
   to record): docs/editorial/PAUTA-EDICAO-5.md line 550 (item 3) lists
   "the professional's consent for his name to go public" as a pending item
   owned by the lead, and line 690 (D7) blocks section 11's publication on
   FOUR items together (credit, license, consent, AI declaration). Credit,
   license and the AI declaration already look closed in the "Lead's
   2026-09-04 decisions" (BRIEFS-EDICAO-5.md lines 806-825); consent does
   not appear closed in any document found. This did not block building the
   markup (the lead asked for the link now, in this session), but whoever
   actually publishes needs to confirm that item with him before deploy.

   RIGHTS (header note, for the colophon/QA): the art is OWNED BY THE LEAD, who
   paid for the commission; license = the same as the site's editorial content
   (LICENSE §2, "Conteúdo editorial da revista — todos os direitos reservados
   a petrinhu" / "Editorial content of the magazine — all rights reserved").
   NO AI was used producing the art (confirmed by the lead on the date of this
   work) — the site's footer AI-disclosure statement does NOT change because
   of this piece (it already covers what is and isn't AI-made, by category;
   this art falls in the "not AI" bucket, no new footer text required).

   Styles: edicao.css, block "§11 (edição #5) · a TIRINHA ENCOMENDADA". Opening
   voice: Gus, post-#3 format (`gus@glyfesse:~/hq$` — the path segment is NOT
   translated between languages, same as the other new #5 pieces). ⚠️ DRAFT
   COPY, PENDING THE LEAD'S APPROVAL — every Gus line goes to him at final
   read; it does not explain the strip's joke (the joke belongs to the art,
   not to us).
   ⚠️ TRANSLATED ALT: the artwork's dialogue is in Portuguese in both language
   versions of the page (the art itself was not localized); the English alt
   below describes the scene in English and says explicitly that the quoted
   lines are in Portuguese, instead of pretending they were translated. */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/hq$</span> <span class="dito">this issue's comic strip</span></p>
<p class="pensa">i didnt draw this one...</p>

<figure class="tirinha">
  <a class="tirinha-link" href="https://vidadesuporte.com.br" target="_blank" rel="noopener"
     aria-label="Visit vidadesuporte.com.br">
    <picture>
      <source media="(min-width:680px)"
              srcset="/assets/edicao-5/Tirinha-Petrus-082026-02-Horizontal.png"
              width="1196" height="284">
      <img src="/assets/edicao-5/Tirinha-Petrus-082026-02-quadrada.png"
           width="659" height="585"
           loading="lazy" decoding="async"
           alt="Four-panel comic strip. The first panel is black with the pixel-art logo &ldquo;SUPORTE_&rdquo; (Portuguese for &ldquo;support&rdquo;), a skull standing in for the letter O. In the other three, two shirt-and-badge tech-support workers talk beside an open laptop showing an orange-haired character on its screen. One of them asks, in Portuguese, what obscure dangers might lurk in the game's Selve Sombria Tecnorgânica (Technorganic Dark Jungle); the other — wearing a different name badge in each panel, Thomas, then Alva, then Edison — answers simply &ldquo;raízes quadradas&rdquo; (square roots); the first says that's not obscure at all, and the second retorts that he's clearly never seen his math report card. All dialogue in the artwork is in Portuguese, not translated here. The artwork's footer reads vidadesuporte.com.br.">
    </picture>
  </a>
  <figcaption>&rarr; vidadesuporte.com.br</figcaption>
</figure>
