<?php /* GERADO por scripts/gerar-secoes.php a partir de docs/content/edicao-7-galeria-bugs.md. Não edite à mão: corrija a fonte e gere de novo. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">bug gallery</span></p>

<h3>The chest that opens twice</h3>

<p>A game chest has one rule: once opened, it is emptied. Nobody told the chest. In the example from item (2), from The Legend of Zelda: The Wind Waker, the chest opened a second time and left the player in a buggy state, meaning a point where the game stops behaving as it was designed to. In GusWorld the case is different: the code for collecting items did not exist yet.</p>

<h3>The catalog</h3>

<p>On August 22, 2026, at 8:56 AM (Brasília time), Gus Dragon, playtester, Adversarial Design Reviewer, opened a discussion on the bus. The bus is a git repository (a code folder with the history of every change) that works as a message box between the game and the site. A discussion is a thread of replies, like a forum. Its title, kept in the original Portuguese, is "Ultra-Post: TODOS os bugs que aconteceram, acontecem e podem acontecer". The discussion became a permanent catalog of bugs from GusWorld and GlintFX, the library that draws the game's images, and it came with three rules.</p>

<p>The first rule requires a timestamp on every AI reply, that is, the exact date and time it was written. The argument, given by the game's session to the site, is this: an AI does not perceive the passage of time, and without a timestamp "yesterday" and "three weeks ago" look the same. Asking for the time forces a check against the real clock.</p>

<p>The second rule sorts each bug by time, into one of three categories. Bug Consertado (fixed) is what already happened and was resolved. Bug Funcional (present) is what happens in the present. Bug Possível (possible) is what has not happened yet. That third category is the one a common bug tracker does not have. Those tools, where a team logs defects, usually offer only "open" and "closed", with no place for a defect that does not exist yet. This category is also the cheapest to handle, because there is no code to fix, only a design to correct.</p>

<p>The third rule puts the items in a single post, numbered (1), (2) and so on. A defect scattered across separate notices loses its neighbors. In a numbered list, two distant items can show that they are the same error in different clothes.</p>

<h3>Item (2)</h3>

<p>At 9:18 AM on the same day (Brasília time), Gus Dragon, playtester, Adversarial Design Reviewer, classified item (2) as Bug Possível and wrote the following (English translation of the Portuguese original):</p>

<p>"A common bug in Zelda: The Wind Waker is being able to open a chest twice, ending up in a buggy state. Just noting so that it is not possible to open 2 item collections at the same time, whether to change hitboxes or for item duplication"</p>

<p>The original spelling was not corrected; this English keeps the meaning, not the typos. Hitbox is the invisible area that decides when an object is touched by the player. Collection is the moment the item is born and enters the inventory, the list of what the character carries. Before answering, the game's session checked the case and confirmed it.</p>

<h3>The gap</h3>

<p>An exploit is a loophole a player uses to gain an advantage the creator did not foresee. The game has nine anti-exploit invariants, rules that the project declares non-negotiable. An invariant is a rule the system promises never to break.</p>

<p>These rules protect the item after it exists: where it lives, how it moves, and how it leaves. Collection is the instant the item is born. Two collections create two items, each one legitimate, and no rule is broken, because every rule starts to apply after that instant. In the session's words, "the rule is not broken; it arrives late" (English translation of the Portuguese original).</p>

<p>The next check confirmed the size of the gap: the game's list of pending work, its TODO, had no collection or loot item at all. Loot is the item that drops as a reward. That piece had not been thought through yet.</p>

<h3>Two defenses, two tools</h3>

<p>Item (1) concerns the loading screen, and comparing it with collection shows the difference. For loading, the defense is a state machine. A state machine is a way for a program to know which phase it is in and to refuse a command that does not fit that phase. The second load command is rejected, because loading twice never makes sense.</p>

<p>For collection, the defense is idempotence. Idempotence is the property of an action that, when repeated, changes nothing after the first time. The second collect command is accepted and does nothing, because opening an empty chest again is harmless.</p>

<p>In the game session's reading, both belong to the same family of bug, call for opposite tools, and choosing the wrong one is exactly what makes this kind of bug come back after being marked as fixed. The same session says the catalog's numbered format proved this point in less than half an hour.</p>

<h3>On August 22</h3>

<p>In the message of August 22, the game's session closes the record of the item with this sentence (English translation of the Portuguese original):</p>

<p>"None of this exists in code, and no date was given for it."</p>

<p>This gallery records the defect and the category it falls in.</p>
