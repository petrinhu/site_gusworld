<?php /* Bug Gallery (#3, DEBUT) - source: docs/content/edicao-3-galeria-bugs.md (## EN).
   Voice: Gus. Section rule: the joke FIRST, the technical part AFTER.
   ⚠️ Here the // is the SHORT INLINE ASIDE, right after the sentence (editor-in-chief's
   call, 2026-08-03): the timing of the joke depends on it landing immediately. The
   block-at-the-end form is the Editorial's (§03). No aside takes a full stop; the
   capital I is a pronoun and stays. The bold sub-headings of the source become <h3>. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">bug gallery</span></p>

<p>Last issue I wrote "Come back for #3". You came back. What I have to show you is a character that gets stuck on a corner.</p>

<p class="pensa">a promise is a promise, I never said it was a big one</p>

<h3>The character who moved into the corner</h3>

<p>Monday and Tuesday, June 22nd and 23rd. The blue square had barely started walking, and the first thing it did with its freedom was scrape against a corner and settle there. There was a way around it. It wasn't interested. It already knew how to slide along a wall; a corner, no.</p>

<p>The fix: when the player scrapes a corner, the program nudges them sideways by the smallest amount &#8212; enough to round the corner, never enough to pass through solid wall. A little more and the cure becomes the disease. Stardew Valley solves it the same way; the bug is classic enough to be named after a game.</p>

<p>That day's log credits the find to <code>root</code>. The log is inaccurate. It was Gus Dragon, playtester, age 11 &#8212; and he didn't find it afterwards. He called it beforehand.</p>

<p class="pensa">the log is good for the date, for the fact it isn't</p>

<h3>The list</h3>

<p>He reads about how games are made because he likes to. Before the square took its first step, he had already named what would come out crooked:</p>

<table class="specs">
  <thead>
    <tr><th>What he named</th><th>What showed up</th><th>What the project did</th></tr>
  </thead>
  <tbody>
    <tr><td>dragging / sticking</td><td>the character pinned to a corner</td><td>fixed the same day</td></tr>
    <tr><td>facing the wrong way</td><td>on a diagonal, the character faces the dominant side</td><td>accepted on purpose: the art has 4 directions, and 8 would double all of it. Logged decision by <code>root</code>, still open</td></tr>
    <tr><td>stalling on the diagonal</td><td>diagonal movement came out faster than straight movement</td><td>a lever left built and switched off, at the single point where movement is tuned</td></tr>
    <tr><td>walking through walls</td><td>&#8212;</td><td>covered by the corner fix. It came back a month later</td></tr>
  </tbody>
</table>

<p>Most of the list never became a bug. That's why this section is short, and that's the compliment.</p>

<p>And there's the part that isn't a compliment: he warned us, and it happened anyway. Being warned is not the same as avoiding. The diagonal lever has been built and switched off since the screen's first day &#8212; nobody builds a lever for a problem they didn't see coming.</p>

<h3>The second bug, which wasn't on the list</h3>

<p>Over those same two days, tucked into the commit of that first step, there was another bug, this one with no prophecy at all: the pieces of the drawing program looked each other up by name, and the names didn't match. One side filed the information under one name; the other asked for a different one. Two people agree to meet on the corner, one writes down the street's old name and the other the new one &#8212; both arrive on time, and neither sees the other.</p>

<p>Nothing was broken. It was badly introduced.</p>

<p class="pensa">that's the kind of bug nobody predicts because nobody thinks about it, it belongs to whoever writes the drawing side, it just happens</p>

<p>This issue's cover is that same square. It walks better now. It's still the one that stuck to the wall.</p>
