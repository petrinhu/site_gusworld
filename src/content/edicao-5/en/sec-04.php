<?php /* Cover Story (#5) · "Three movements, one number" - source:
   docs/content/edicao-5-reportagem.md (## EN), verbatim. Voice: Gus-editor,
   technical (D1, decided by the líder on 09/04/2026: names M8, Godot, C# and
   the engine/ submodule by name; L-25 doesn't restrict this technical
   section, only fiction). Approved lens (BRIEFS-EDICAO-5.md, Piece 2): three
   dated movements (deleting 07/22, checking 07/23-24, measuring 08/07-08),
   closing on the one number of the issue nobody needed to take on faith,
   because it was counted. Window in the first paragraph (D11): "From July
   22nd to August 7th, 2026".

   Two fences D1 doesn't open: no mention of the repositories' refoundation
   (08/21, reserved matter, T3) nor the hosting service of the time; the §1.1
   fence holds inside the Cover Story (block 3: Gus Dragon's specialization
   is stated without hedge, without tenderness, without "at only 11", without
   exclamation).

   Mandatory cuts (pauta §5): no submodule mechanics, no citing
   // ADAPTACAO (belongs to the Graveyard); no code, strace, variable name
   (belongs to Programming); no anatomy of the collision, the two halves
   (belongs to the Bug Gallery); the cast failure enters abstract, describing
   no character, with the cost line (D12, verbatim); no narrating the menu,
   the 07/22 verbatim, or the new art (belongs to the box, below). No em/en
   dash in any form, glyph nor HTML code. No given name.

   ★ GUS DRAGON'S FIND BOX (docs/content/edicao-5-reportagem-menu.md, ## EN,
   verbatim, already-corrected v2): its own piece by law, dated addendum to
   L-24 of the site's GODS_LAWS.md (D16, 09/04/2026, verbatim from the líder:
   "It goes in as a story. Gus's finds are always special."). Runs as a BOX
   at the end of this story, in the mold of #4's glintfx insert (see
   src/content/edicao-4/en/sec-04.php, lines 46-72): own anchor #sec-04-menu
   for deep linking, own prompt. Div, not figure (figure carries browser side
   margin not reset in this CSS - it would misalign the box).

   DIVIDER WITH THE BOX (§5.4, deliberate): the story's body only points, in
   half a sentence, to the 07/22 find about the main menu, without narrating
   it; the box tells the menu story (what it used to show, his verbatim, the
   decision to reuse the boot CRT, no delivery date) and does NOT touch the
   08/07 clipping, the line count, or any part of the three movements - that
   belongs to the body. Register boundary (D1/D15): the box is technical like
   the body that hosts it, and doesn't speak "from inside the world" like the
   Bug Gallery (§6); no reviewer flattens one into the other. The box doesn't
   name the external dependency blocking the item (reserved for #6). */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/reportagem$</span> <span class="dito">cover story</span></p>

<h3>Three movements, one number</h3>

<p>From July 22nd to August 7th, 2026, the whole month had three movements: pulling an old game out from under the new one, checking whether what was left was still standing, and finally measuring what remained. Each one answered a different question. None of them gave the answer anyone expected.</p>

<p>On Wednesday, July 22nd, M8 closed: the milestone that took Godot and C# out of the project for good. In one sweep, according to that day's record, one hundred seventy two files left the old game's folder, along with the <code>engine/</code> submodule, where the C# foundation that had carried GusWorld from May to July used to live. The work was done with obsessive care inside the repository: a safety tag before touching anything, a build from scratch as proof nothing had broken, verification at every phase. What got lost was not inside that reach. It was outside it: the original C# code, today, nobody can open anymore. Nothing functional was lost, because every useful line had already been translated to C++ months earlier, with tests covering the behavior. What got lost was the record.</p>

<p>That same July 22nd was also the day of a find by Gus Dragon about the game's main menu. That is another story, told separately, right after this one.</p>

<p>Two days later, Thursday and Friday, came the checking part. In plain terms: the check that already existed was looking one way, and the problem was on the other.</p>

<p>On Thursday, an automated code analyzer (the tool that reads a program looking for errors, without needing to run anything) found, in seconds, a crash that the project's toughest human review had let through: using, inside the code, a piece of memory that had already been emptied by another part of the program, as if it were still full. The human review, which tests the project with deliberate sabotage and hostile conditions, had covered the obvious error (using something before it exists). It had not covered this one: using something after it had already been emptied.</p>

<p>In that same pair of days, on the game's side, a second check failed. Someone said they had checked the appearance of an entire cast of characters before sending the final art off to be generated. They had not. The whole cast came back with the wrong face, and regenerating it cost again. When someone tried to soften it by saying it hadn't cost real money, the answer was direct: "of course it cost, I pay a subscription!" The lesson that stuck is not about art: it's that a third party's cost is still a cost, even when it never shows up as a new charge.</p>

<p>Two weeks later, on Friday and Saturday, came the measuring part. On August 7th, root played the whole demo: the title screen, the city, the conversation with NPC Bertoldo, combat, the win. Found nothing out of place.</p>

<p>Then handed the controller to Gus Dragon, playtester, Adversarial Design Reviewer, to play in person. He found two collision problems. The cause was not luck, nor a different way of playing: he studies games, and his filter for that kind of defect is more specialized than root's. He had already gone looking for those errors, because he knew that class of bug was common. And that is why he found it.</p>

<p>The next day, he asked how many lines of code the project had. The answer was not estimated: it was counted, on the spot, straight from the repository. About 163 thousand lines in total. And the detail that closes the count: the test code, 78,200 lines, is more than double the game's own code, 62,700.</p>

<p>A game nobody had measured turned into a number nobody needed to take on faith, because it was counted. And it was counted in the same month the careful checking spent most of its time looking at the wrong side of the fence.</p>

<?php /* source: docs/content/edicao-5-reportagem-menu.md (## EN), verbatim
   (v2, corrected). Structure: fala/prompt -> four paragraphs -> // -> //by:.
   Register boundary: technical, names technology (menu, art, boot/CRT), like
   the Cover Story that hosts it; doesn't name the external dependency
   blocking the item (reserved for #6). */ ?>
<div id="sec-04-menu">
  <p class="fala"><span class="prompt">gus@glyfesse:~/menu$</span> <span class="dito">finding</span></p>

  <p>On July 22nd, from playtest feedback, Gus Dragon pointed out something about the game's main menu. It wasn't personal taste: it was a genre convention he already knew, and the record of the observation says so in plain words. His words, verbatim: "the menu at the start (just that one) usually has some art, or animation behind it, not the screen of wherever the player was".</p>

  <p>He was right about what he saw. The main menu shows the last scene of wherever the player stopped, frozen behind the buttons, the same screen the pause menu also uses. It isn't a code bug: it's a missing decision about the menu's own face. Nobody had given it something of its own, and that's what he noticed.</p>

  <p>The observation became a decision in the same stretch of time: instead of commissioning new art, the main menu will reuse a piece the game already has, the CRT monitor that shows up on the boot screen, at zero asset cost. It's a closed decision, not a loose idea. It just waits: the piece of the game that draws that screen doesn't exist yet. When it does, the main menu gets the background already chosen for it. Until then, it keeps showing the frozen scene, the old way, same as the pause menu.</p>

  <p>Whoever found it was Gus Dragon, playtester, Adversarial Design Reviewer.</p>

  <p class="pensa">became a closed decision. waiting on a piece that doesnt exist yet</p>

  <p class="pensa assinatura">by: gus@glyfesse</p>
</div>
