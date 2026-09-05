<?php /* Programming Section (#5) · the expert axis - source:
   docs/content/edicao-5-programacao.md (## EN), verbatim. Voice:
   gus@glyfesse, the magazine's editorial voice in a technical section (L-25
   authorizes technical terms here: it isn't the game character speaking
   inside the game world). Canonical structure inherited from #1-#4:
   accessible intro -> flimsy excuse (CRT, new this issue, doesn't repeat
   #4's) -> // transition -> CRT nano -> technical part with <h3> subheads +
   table -> //by:.

   Lens (D2, decided by the líder on 09/04/2026: this is the thread carrying
   the whole issue's lens line - "the automated checker found the null
   pointer crash on an already-moved-from object, that the human adversarial
   review had let through"; the piece is built around it): the expert axis of
   "checking" - the half-built protection that fooled everyone (thread 1),
   isolation belonging to whoever runs it (thread 2), the static analyzer
   that found in seconds the crash the adversarial review didn't (thread 3,
   the lens), and the game's QA who found the same kind of leak the next day
   (thread 4). Dates: 07/23/2026 (glintfx, threads 1 through 3) and 07/24/2026
   (the game, thread 4 only).

   ⛔ Does NOT include the sabotage that made a test hang instead of failing
   (07/24): that goes to the Pause Menu Walkthrough, by a LESSON divider, not
   just a fact one (pauta §5.2: if the two pieces end on the same moral, one
   of them is wrong - this one carries "a cheap tool saw what the expensive
   review didn't", the Walkthrough carries "the check that didn't know how to
   fail"). ⛔ Reserve: glintfx's "5 dead ends" don't appear here, not even by
   citing their existence (inherited from #4's fence). ⛔ No blinking: no
   praise for any tool as a win, no signal of what's coming in August. No
   em/en dash in any form, glyph nor HTML code.

   Code blocks and the block quote reuse <pre><code>/<blockquote>, no new
   class (.conteudo code already styles tokens; .conteudo blockquote already
   carried this same role in #3, sec-17). Path NOT translated per project
   rule: source uses ~/programming, normalized to ~/programacao (same path as
   pt/, matching the #3/#4 precedent). */ ?>
<p>There's the kind of warning that closes the danger, and the kind that only describes it. From far away, both look like care. On July 23rd, 2026, a project next door to this one found out the difference the most expensive way there is: the danger was documented, properly, right next to code that did nothing about it.</p>

<p>The project is glintfx, the game framework the team uses from outside, and the incident happened in the middle of the night, in the machine owner's live work session: test windows opening and closing on their own, on his screen, without him asking for any of it. It wasn't the first time something like that happened there: last time, a similar window test locked up the machine's touchpad badly enough to need a reboot. That's why the house rule is strict: a test that opens a window never runs in anyone's live session; it runs isolated, always.</p>

<?php /* the FLIMSY EXCUSE, in a terminal block (#3 canon, inherited in #4).
   It is NOT decorative: it is gus@glyfesse's voice and the reader reads it.
   Hence no aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~$</span> whoami</p>
    <p>gus</p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># did i find the problem this time</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># no. a program nobody praises found it, running by itself</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># i just watch and write about it after. stung my pride a bit</span></p>
  </div>
</div>

<p class="pensa longo nota-leitor">Dear reader, from here on this is real technical documentation of the game's code history.</p>
<p class="pensa assinatura">gus@glyfesse</p>

<?php /* crt-nano: the command being TYPED as the view enters (CSS steps, JS
   only arms it). Decorative (the text already says it all) -> aria-hidden. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">protecao-pela-metade.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>The warning nobody turned into a fix</h3>

<p>There was a mechanism built for exactly this: a wrapper that isolates every test before it runs. And it had, written right in its own comment, in Portuguese and in English, the entire explanation of the risk:</p>

<pre><code>CAVEAT (test-confirmed): removing WAYLAND_DISPLAY alone does NOT stop the
graphics backend from picking Wayland, because wl_display_connect(NULL)
falls back to the default socket name wayland-0 inside $XDG_RUNTIME_DIR
when the variable is absent, and that socket is still alive (it belongs
to the real desktop session).</code></pre>

<p>The explanation was correct. The code right below it did exactly one thing: erase the <code>WAYLAND_DISPLAY</code> variable. Documented and never implemented. Someone understood the whole problem, wrote the full explanation, and left the fix to whoever called the wrapper, without saying so anywhere the computer would read.</p>

<h3>Isolation belongs to whoever runs, not whoever calls</h3>

<p>Digging further, three entry points to the same problem showed up, not one: the wrapper for each test (the one above); the local gate script, which launched the entire suite with no isolation of its own, trusting whoever called it; and the coverage script, with the same hole. It was the second one that caused that night's incident: an automated call ran the full suite four times in a row, with thirty tests that open real windows on every pass.</p>

<p>The principle that came out of it became a permanent house rule:</p>

<blockquote><em>"Isolation belongs to whoever runs it, not whoever calls it."</em></blockquote>

<p>No entry point can depend on someone remembering to type a prefix first. That's exactly the dependency that failed.</p>

<h3>What the check was looking at, and where the problem was</h3>

<p>Later that same day, the third fact showed up, and it's the one that carries the whole issue's lesson. With everything fixed and green, an automated check (the same one that blocks any submission over a style problem, not just a behavior one) flagged this:</p>

<pre><code>if (!impl_ || !impl_->initialized) {
    impl_->log_warn("...");   // if impl_ is null, this branch dereferences null</code></pre>

<p>If the internal pointer is null, the condition is true, it enters the block, and it uses that same null pointer inside. Since the object is move-only, an object that something was already moved out of has exactly that pointer set to null. Two ordinary lines of code were enough to crash the whole program.</p>

<p>What makes the fact interesting: a careful adversarial review had already gone through that code, with five deliberate sabotages, hostile input, the memory-error detector running the whole time. It tested calling the object before it was ready, the obvious case. It didn't test calling the object after it had been moved from. The automated check found it in seconds, no sabotage at all, just from looking at the code sitting still.</p>

<table class="specs">
  <thead>
    <tr><th>What the check was looking at</th><th>Where the problem was</th></tr>
  </thead>
  <tbody>
    <tr><td>Whether the object was called before it was ready</td><td>Whether the object was called after it had already been moved from</td></tr>
    <tr><td>Erasing the process's environment variable</td><td>The default socket it hid behind was still alive, on the outside</td></tr>
    <tr><td>Each test isolated, one at a time</td><td>The script that calls the whole suite, with no isolation of its own</td></tr>
  </tbody>
</table>

<h3>On the other side, the next day</h3>

<p>The next day, July 24th, on the game's side, the simpler version of the same story played out. A quality agent was testing something else, a menu screen, and in the middle of their report they flagged a problem they hadn't gone looking for: the project's automated hook, which runs a build and tests on every edited file, was also inheriting the real graphics session's environment variables, the same live session the house rule protects. They didn't stay inside their own lane. If they had, the risk would have stayed there, with nobody the wiser.</p>

<p>None of the four facts is about one tool being better than another. It's about where each check was looking. Documenting the danger doesn't close the door. Only closing the door closes the door, and it only really closes when whoever locks it is whoever is about to walk through it.</p>

<p class="pensa assinatura">by: gus@glyfesse</p>
