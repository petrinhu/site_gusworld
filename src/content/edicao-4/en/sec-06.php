<?php /* Bug Gallery (#4) - source: docs/content/edicao-4-galeria-bugs.md (## EN).
   Voice: Gus. Section rule (inherited from #3): the joke FIRST, the technical part
   AFTER. TWO halves: "IT HAPPENED" (the menu flash, found and fixed the same day,
   07/17) and "IT ALMOST HAPPENED" (the diagonal lever, the counterfactual and the
   mechanic of why it never had to flip - goes BEYOND #3 without repeating the
   sentence #3 already published). Bold sub-headings from the source become <h3>.

   ★ NEW #4 CANON: an aside above 72 characters becomes class "pensa longo"
   (block comment, slash-star markers); at or under 72, plain class "pensa"
   (slash-slash marker). Path NOT translated per project rule: source uses ~/gallery, normalized to
   ~/galeria (same path as pt/, matching the #3 precedent). Typos in the source
   (wasnt, doesnt, hasnt, i) are deliberate and kept verbatim. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">bug gallery</span></p>

<p>This time there are two cases. Only one of them is an actual bug. The other is the most boring kind of win there is: the one nobody sees, because the defect never got born.</p>

<p class="pensa">I'll take that boring win over any applause</p>

<h3>The flash that lasted one day</h3>

<p>Open the menu, close the menu, and for an instant the whole screen flashes white, like an old camera flash, the kind that still uses film and blinds everyone by accident. It happened to me. I reported it right away. The log credits the report to me. The log is inaccurate: it was Gus Dragon, playtester, Adversarial Design Reviewer, who reported it.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">screen flashes white when i close the menu, someone check this</span></p>
<p class="pensa">wasnt gonna sit on it. that kind of thing bugs the eye</p>

<p>The game used one graphics context for the menu and another for the game behind it, and switched between the two every time the menu opened or closed. In the instant of the switch, for a fraction of a second, the screen showed the gap between one context and the other: hence the flash. The fix (logged as ADR-018) merged the two into a single context: no switch, no gap, no flash. Reported and fixed the same day, July 17th.</p>

<p class="pensa">found and fixed the same day is the kind of stat i like to see</p>

<h3>The switch that never had to flip</h3>

<p>Issue #3 already told you the game keeps, from the start, a ready setting nobody's turned on to this day. What's missing is the rest: what would have happened if it didn't exist, and why, off, it never caused a problem.</p>

<p>Without that setting, moving diagonally would come out faster than moving straight: the square root of two left over when two axes add up without being divided back down. It's not subtle: you can feel it, you can time it, you can turn it into a trick for whoever finds it first. I had it on the list before the square took a single step.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">i didnt bet it would go wrong. i bet it could flip fast if it did</span></p>
<p class="pensa">and so far it hasnt needed to. that counts too</p>

<p>And still, the switch never had to flip. Because to this day nothing in the game charges the player for moving straight against a clock: no race, no deadline, the diagonal's edge stays invisible, asleep inside the code, waiting for a day that hasn't come yet. When it does, flipping it isn't rewriting movement from scratch: it's turning one switch, because the setting lives in a single place since the screen was born.</p>

<p>One bug died the day it was born. The other never got born at all. Both only happen when somebody was paying attention before, not after.</p>
