<?php /* Programming Section (#4) · the expert axis - source: docs/content/edicao-4-programacao.md
   (## EN), verbatim. Voice: gus@glyfesse - HERE it is the magazine's EDITORIAL
   voice, in a technical section (L-25 doesn't restrict: it isn't the character
   speaking inside the game world). Canonical structure inherited from #3:
   accessible intro -> flimsy excuse (CRT, .crt-scr.desculpa) -> // transition ->
   CRT nano -> technical part with <h3> subheads + table -> //by:.

   Lens: why the cockpit changed hands twice in seven days (06/25 ADR-009 ->
   07/01 ADR-010), through the lens of "the part that thinks never knew who
   draws". Mandatory close: the "Repo GlintFX" index link, textless since #1,
   gets its explanation in the final paragraph.

   DIVIDER WITH THE §04 BOX (glintfx): the technical reasoning lives here (RmlUi,
   SDL3/OpenGL, embed mode, ADR-009/010, the RmlUi_Renderer_SDL file) - the human
   side of asking/getting the feature, the CHANGELOG and the 06/29-30 and 07/01
   dates do NOT appear here (they belong to §04). No mention of glintfx's "5 dead
   ends" (reserved by the brief). No em/en dash (Issue #4 ships with none).
   Path NOT translated per project rule: source uses ~/programming, normalized to
   ~/programacao (same path as pt/, matching the #3 precedent). */ ?>
<p>A stage script doesn't change if the actor reading the lines out loud gets swapped, as long as the lines stay the same and land on cue. The game's cockpit works the same way: one part decides what needs to show up (this much health, that button, this warning), and another part takes that finished decision and draws it on screen. Between June 25th and July 1st, 2026, the part that draws changed hands twice. The part that decides never noticed.</p>

<p>On June 25th, the record called ADR-009 chose RmlUi to draw the interface and the command panel of the game: RmlUi is a library that builds screens out of markup similar to HTML and CSS. Seven days later, on July 1st, another record, ADR-010, switched again: in comes glintfx, wrapping RmlUi itself from the inside, and out goes the code the game's own team had hand-written to connect the two. Two swaps, one week, and the reason the second one cost so little is the whole story here.</p>

<?php /* the FLIMSY EXCUSE, in a terminal block (#3 canon). It is NOT decorative:
   it is gus@glyfesse's voice and the reader reads it. Hence no aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~$</span> whoami</p>
    <p>gus</p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># nobody asked me before swapping the game's interface. either time.</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># first time i got mad. second time i just started a timer to see how long it would last.</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># it lasted a week. tied my own record for patience and for foundation swaps in the same month.</span></p>
  </div>
</div>

<p class="pensa longo nota-leitor">Dear reader, from here on this is real technical documentation of the game's code history.</p>
<p class="pensa assinatura">gus@glyfesse</p>

<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">adr-010.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>Context: what was at stake between June 25th and July 1st, 2026</h3>

<p>On June 21st, the game's engine moved onto SDL3 (that swap's story is in Issue #3's Programming section). SDL3 gives you a window, input and low-level drawing, but not an interface: health bars, menus, the battle screen's command panel. For that, on June 25th, ADR-009 picked RmlUi: a library already used by other game projects before this one. The decision arrived together with a redesign of the battle screen's tactical cockpit, at 960 by 540 pixels.</p>

<p>RmlUi solves the interface, but it doesn't speak SDL3/OpenGL on its own: somebody has to write the bridge between what RmlUi decides to draw and the actual video call that puts it on screen. That bridge, in the game, was hand-written: a file of the project's own, called <code>RmlUi_Renderer_SDL</code>.</p>

<p>Seven days later, on July 1st, ADR-010 switched again. In comes glintfx: an interface library being built in parallel, in a sibling project, which already wraps RmlUi inside its own way of being used ("embed mode": the game hosts glintfx, glintfx handles the rest). The bridge the game had hand-written stopped being needed, because glintfx already brought its own. Five days later, on July 6th, a commit removed the orphaned file: the <code>RmlUi_Renderer_SDL</code> nobody was calling anymore.</p>

<h3>Where the bridge changed hands</h3>

<table class="specs">
  <thead>
    <tr><th>Criterion</th><th>RmlUi by hand (ADR-009, 06/25)</th><th>glintfx embed mode (ADR-010, 07/01)</th></tr>
  </thead>
  <tbody>
    <tr><td>Who writes the bridge to SDL3/OpenGL</td><td>the game project, in its own file</td><td>glintfx, inside its own embed mode</td></tr>
    <tr><td>Who keeps that bridge up to date</td><td>the game team, alone</td><td>another project, in parallel, from outside</td></tr>
    <tr><td>What was left in the game's repository, 5 days later</td><td>n/a</td><td>nothing: <code>RmlUi_Renderer_SDL</code> removed on 07/06</td></tr>
  </tbody>
</table>

<h3>Why it cost so little</h3>

<p>The part of the game that decides what shows up on the battle screen, how much health is left, which button is available, never learned the name of either interface library. It hands the finished decision to whoever's on the other side, the same way the combat logic, months earlier, never knew whether it was running on Qt6 or SDL3. That's why the second swap, even landing seven days after the first, never asked for a single rule of the game to be rewritten: it asked for the bridge to be swapped, and the one left unused to be deleted. The July 6th commit that removes <code>RmlUi_Renderer_SDL</code> from the repository is the record of that deletion: not a bug fix, a piece of code cleaned up once it stopped having an owner.</p>

<h3>The cost that was accepted</h3>

<p>The price here was a different kind of dependency: on July 1st, glintfx hadn't shipped a 1.0 yet. It's a tool being built alongside the game itself, by another project, at its own pace of change. Swapping a stable third-party piece for one still under construction trades one risk for another: the risk of being stuck on an aging API for the risk of keeping up with one still taking shape. ADR-010 records that trade knowing it; it's not the kind of cost you pay just once.</p>

<p>That's the link called "Repo GlintFX," sitting in this magazine's index since Issue #1 without ever earning a line of explanation next to it. Now it has one: it's the repository of the tool that took over drawing the game's cockpit starting July 1st, 2026: the part that thinks still doesn't know its name, and that's exactly why the swap fit inside a week.</p>

<p class="pensa assinatura">by: gus@glyfesse</p>
