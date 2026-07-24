<?php /* Programming Section (#2) · the expert axis - source: docs/content/edicao-2-programacao.md (## EN).
   Canonical structure (same as #1): accessible intro -> root's flimsy excuse -> // transition ->
   CRT nano typing the command -> technical part with <h3> subtopics + the 4-options table -> //by:root.
   Voices: intro prose (narrator) + root@glyfesse> (the creator, never named).
   Backtick tokens from source (rm, dotnet build) in <code>. No em-dash.
   ⚠️ dropped the source's editorial marker "[conferir na S4]" on the reader note (production annotation,
   not content). CRT reuses .crt-scr/.crt-nano; "nano " types (5ch) and reveals the filename. */ ?>
<p>There is a question almost nobody asks about a small game built by a single person: why does it run? Not why it exists, that one is easy. Why does it run smoothly on a machine that has seen better days, on a seven-year-old laptop, on a handheld that fits in a backpack. The answer is not on the screen. It sits in a boring decision, made on a Saturday, written into a text file nobody should ever have to read.</p>

<p>This is the section where we open that file. Every number the machine has to produce per second went through a choice of language, and language, in the end, is the material the whole thing is built from. This issue is about construction: foundation, concrete, footing. So it is only fair to start at the foundation of everything, the dry question of which language the computer will speak underneath the game.</p>

<p>Fair warning: in a moment this turns properly technical. But I promise to open slowly, with the door unlocked, so that someone who has never installed a thing in their life can still understand why one Saturday in May became the footing for everything that came after.</p>

<p class="fala"><span class="prompt">root@glyfesse&gt;</span> <span class="dito">Yes, I built this entire issue while logged in as root, and no, I will not defend it properly. Before anyone asks: all of my code is open source, every line of the foundation is out in the open in the repository, so there is no secret to protect on this machine. Running as superuser, therefore, does not scare me: someone with nothing to hide has nothing to lose. The logic does not hold, I know; opening the source does not stop a careless <code>rm</code> from taking the whole slab down with it. But the beam is already set, the build compiled, and rebuilding the permissions is the next commit's problem.</span></p>

<p class="pensa nota-leitor">Dear reader, from here on this is real technical documentation of the game's code history.</p>
<p class="pensa assinatura">root@glyfesse</p>

<?php /* crt-nano: the command being typed (CSS steps, zero JS). Decorative (the prose already
   says it all) -> aria-hidden. .crt-typed types "nano " (5ch, reuses the #1 animation); .crt-key
   reveals the file adr-002.md right after. Styles in edicao.css. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">root@glyfesse&gt;~$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">adr-002.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>The problem</h3>

<p>A game has a time budget per frame. If you want sixty frames per second, each frame gets about 16 milliseconds to be born, live and die, and everything has to fit inside it: physics, drawing, logic, sound. The target here was never a dream machine. It was the real floor: run well on a Steam Deck, on a GTX 1050, on laptops from 2017 onward. A weak machine does not forgive waste.</p>

<p>The hot paths are the stretches of code that run many times per frame and therefore rule the bill. Here there are three: turn resolution, the HMAC of the save (the signature that proves nobody tampered with the saved file) and the AI. Those three had to fit inside less than half of the frame budget on a GTX 1050, leaving slack for everything else.</p>

<p>The game was born in GDScript. GDScript is interpreted: the code becomes bytecode that runs inside a virtual machine, a translator sitting in the middle of the road reading the instructions one by one while the game runs. That is great for iterating; you change a line and see the result almost instantly, with hot-reload. But the translator in the middle of the road charges a toll, and on a weak machine the toll shows.</p>

<h3>The 4 options on the table</h3>

<table class="specs">
  <thead>
    <tr><th>Option</th><th>Gain on hot paths</th><th>Cost</th></tr>
  </thead>
  <tbody>
    <tr><td>Pure GDScript</td><td>1x (baseline)</td><td>Interpreted; fast iteration with hot-reload</td></tr>
    <tr><td>GDExtension C++, module by module</td><td>~10-20x</td><td>Heavy cross-platform build, no hot-reload, slow for solo work</td></tr>
    <tr><td>C# .NET 8 AOT</td><td>~3-5x</td><td>Native compilation; iteration via <code>dotnet build</code> in ~5-15s</td></tr>
    <tr><td>Rewrite to Unity IL2CPP</td><td>~3-5x</td><td>Catastrophic point of no return</td></tr>
  </tbody>
</table>

<h3>Why AOT won</h3>

<p>The detail that decided everything: the other gains lived only in the hot paths. You speed up three stretches and the rest of the game keeps the same pace. Native AOT compilation (ahead-of-time: it translates the whole codebase into machine language before running, instead of interpreting instruction by instruction at runtime) does not pick stretches. It speeds up 100% of the code, the hot and the warm and the cold, because it takes the translator out of the middle of the road for good.</p>

<p>And iteration stayed tolerable for someone working alone: a <code>dotnet build</code> finishes in seconds, not in minutes of cross-platform building. On top of that, .NET 8 is still LTS, long-term support, which matters for a foundation: you do not want the footing to go end-of-life next year. Decision on record: C# .NET 8 AOT as the primary language, GDScript 100% deprecated.</p>

<h3>The assumed cost</h3>

<p>None of this came for free. The ADR itself classified the choice as a "massive one-way door", a one-directional door of the large kind: reverting would not mean touching a line, it would mean a parallel rewrite of 2 to 4 weeks of work. That is why it did not pass by a show of hands. It was approved carefully, granularly, over 8 rounds of decision, 30 canonized guidelines, on the 19th of May.</p>

<h3>The shadow</h3>

<p>I closed that file on the 19th of May with the phrase "point of no return" written down, and I treated it like a concrete wall. I just did not know, yet, how much a concrete wall can be tested, nor how thin "no return" sometimes proves to be.</p>

<p class="pensa assinatura">by: root@glyfesse</p>
