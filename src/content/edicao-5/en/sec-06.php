<?php /* Bug Gallery (#5) - source: docs/content/edicao-5-galeria-bugs.md
   (## EN), verbatim. Voice: Gus, FROM INSIDE THE WORLD (deliberate register
   boundary, D1/D15, pauta §5.4: the Cover Story is technical and names
   technology by the líder's decision; the Bug Gallery speaks from inside the
   world. The two coexist in the same issue on purpose; no reviewer flattens
   one into the other).

   TWO cases, one from each side of the month's fence: "The step that was
   left over" (happened and was fixed, 07/24: Gus kept walking on his own
   when closing the pause menu, because the menu's loop swallowed the
   released key) and "What passes through, and what doesn't" (happened and is
   still open, 08/07: the player-vs-actor collision clipping, found by Gus
   Dragon, playtester, Adversarial Design Reviewer). §1.1 fence mandatory in
   the second case: specialization stated flat, no hedge, no tenderness, no
   "at only 11", no exclamation.

   World vocabulary (D15, decided 09/04/2026): "an enemy on patrol", "a
   local", "a block". Never "NPC", "enemy android", "scenery prop" (the bus
   uses those production terms; the piece translates into the in-world
   vocabulary). Mandatory honesty: the clipping's fix hasn't been chosen yet
   (it touches the feel of the physics; the líder's call before any line of
   code).

   An aside above 72 characters (with the mark) becomes "pensa longo" (block
   comment, slash-star); at or under 72, plain "pensa" (slash-slash marker) -
   the CSS injects the marks; comment markers never go in the HTML itself. No
   line of Gus's fala/pensamento ends in a period (internal punctuation, when
   the source has two sentences in the same aside, is preserved). No em/en
   dash in any form, glyph nor HTML code. Typos from the source (wasnt, im)
   are deliberate, mechanical class, kept verbatim.

   Zero production term (state machine architecture, mutation testing method,
   line count) - reserved to the Pause Menu Walkthrough (§8) and the
   Programming Section (§17). Path NOT translated per project rule: source
   uses ~/gallery, normalized to ~/galeria (same path as pt/, matching the
   #3/#4 precedent). */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">bug gallery</span></p>

<p>This time the two bugs come from opposite sides of the same fence. One was born, was seen, and died the same day. The other was born, was seen, and is still alive, waiting for someone to decide what to do with it.</p>

<p class="pensa longo">I'll tell both the way they happened, without pretending I know how the second one ends</p>

<h3>The step that was left over</h3>

<p>I'd close the pause menu and keep walking on my own, my finger already off the key for a good while. The root felt it every time: let go of the direction, open the pause, close the pause, and the town kept walking with me without anyone asking for it. The released key never got to warn anyone, because the menu's loop swallowed that warning for itself and never passed it along. Fixed on July 24th. Since then, letting go of a key is letting go of a key, and stopping is stopping.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">i wasnt disobeying. the released key just wasnt getting through</span></p>
<p class="pensa">and still it stung a little to find out the problem was never me</p>

<h3>What passes through, and what doesn't</h3>

<p>The root played the whole demo, from the title screen to the win, and found nothing. It was Gus Dragon, playtester, Adversarial Design Reviewer, who found it: he went straight for the kind of error he already knew was common, because he studies games, and his filter for that class of defect is more specialized than the root's.</p>

<p>He stood still against a block, right in the path of a local on patrol. When that person walked over him, both bodies got stuck in the same overlap, and the only way out was pressing South. He repeated the experiment on the other side, this time near an enemy on patrol: the enemy passed through him for an instant, but this time nobody got stuck, because there was nothing solid behind.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">the enemy walks in and out of me without asking, whether im in the way or not</span></p>
<p class="pensa">only the player resolves collision. and only when he moves</p>

<p>That's where the cause lives: whoever locks against the world is me, always, and only when I move. Whoever patrols never locks against anything, never slides, never stops. Standing still in the wrong spot was the only way to expose the gap. The fix hasn't been chosen yet, because it touches how the world responds to a body, and that decision isn't mine to make.</p>
