<?php /* Graveyard of Dead Ideas (#6) - source: docs/content/edicao-6-cemiterio.md (## EN),
   approved by the lead (GATE-CONTEUDO 2026-10-07; epitaph chosen by him, PQ10; EN epitaph: "Literal").
   Hand-built mould (PLANO-CONVERSOR 2.5): headstone REUSED from #5 (.lapide/.lapide-pedra), no new art.
   Dates use the &#8224; entity (dagger), the same convention as #2 to #5, NOT an em-dash.
   One headstone only: RmlUi. Text: all rights reserved (LICENSE §2). The source's production notes NEVER enter here. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/cemiterio$</span> <span class="dito">graveyard of dead ideas</span></p>

<p>Issue #5's grave was empty: what was supposed to be kept inside it disappeared before I finished writing the headstone. This one has a body. What left it was the name.</p>

<figure class="lapide">
  <div class="lapide-pedra">
    <p class="lapide-nome">RmlUi</p>
    <p class="lapide-datas"><span>Jun 22 2026</span><span>&#8224;Aug 20 2026</span></p>
    <p class="lapide-epitafio">Here lies a name.<br>The body is still standing.</p>
  </div>
</figure>

<p>RmlUi is an interface library written by other people: it builds the menus and the screens. It first shows up in the game's record on June 22nd, 2026, in the change of foundation from Qt6 to SDL3 (ADR-008, the decision record that listed SDL3, RmlUi and miniaudio). On June 25th, ADR-009 chose it for the interface and the HUD, the information panel that sits on top of the game. On July 1st, ADR-010 started using it inside GlintFX, the game's graphics engine (Issue #4 tells that swap).</p>

<p>The order to take it out came on August 4th: root decided to take the third-party libraries out one by one, starting with it. The date on the stone is a different one, August 20th, because that is the day the name left.</p>

<p>That day, RmlUi's name and the names of the other third-party libraries were replaced by a marker in 687 files of GlintFX and in 398 of the game. The <code>src/rml/</code> folder became <code>src/_m_/</code>. No file was deleted and no line was deleted. Only the text changed, and the hole was left in plain sight.</p>

<p>No comment was left in its place, either. According to the log of the AI session that works on GlintFX, the absence was an explicit decision. Whoever opened the file saw the hole and nothing else. This stone is the comment the repository did not leave.</p>

<p>And the name left, but the use did not. On GlintFX's dependency scoreboard, the count on August 20th stood at 31 interface files, the same as at the start of the campaign, according to the log. The replacement touched the text and removed no code. That is why the stone buries the name and leaves the body out: a body still standing does not fit in a grave.</p>

<p>The cover story tells how the month got here. This page only looks after the stone.</p>
