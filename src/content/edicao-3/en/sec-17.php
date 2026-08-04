<?php /* Programming Section (#3) · the expert axis - source: docs/content/edicao-3-programacao.md
   (## EN), verbatim. Voice: root@glyfesse (the creator, never named).
   Canonical structure (same as #1 and #2): accessible intro -> flimsy excuse -> //
   transition -> CRT nano typing the command -> technical part with <h3> and tables -> //by:.

   ★ NEW FORMAT CANON, from #3 onwards (editor-in-chief's call, 2026-08-03): the FLIMSY
   EXCUSE stops being running prose and becomes a TERMINAL BLOCK, with the hole in the
   argument showing up as root's own # comments. ⚠️ #1 and #2 are NOT retrofitted.

   ⚠️ The verbatim ADR line stays in PORTUGUESE with the English gloss below it, exactly
   as the source has it. The //root@glyfesse signature is not translated. */ ?>
<p>How many times can a house change its foundation before it falls down? The honest answer: it depends on how much of the house is resting on it. If the walls, the roof and the wiring were built tied into the foundation, the answer is zero. If they were built without even knowing the foundation exists, the answer is: as many times as needed, and inside one working day.</p>

<p>On 22 June 2026, at 23:34, GusWorld's screen-drawing base was swapped out. Not the art, not the game &#8212; the piece of software that opens the window and paints pixels into it. It had been chosen <strong>one day earlier</strong>. The record of that swap is a file called ADR-008, and its most important line mentions no library at all: it's about what did <strong>not</strong> have to be touched.</p>

<p>Three paragraphs from now this turns properly technical &#8212; library names, test counts, tables. Before that, a question almost nobody asks, and which is the whole story: <strong>how do you throw away a foundation without losing all the work on top of it?</strong></p>

<?php /* the FLIMSY EXCUSE, now a terminal block (new #3 canon). It is NOT decorative:
   it is root's voice and the reader reads it. Hence no aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">root@glyfesse:~$</span> whoami</p>
    <p>root</p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># by now I've broken the foundation twice in two days.</span></p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># there's nothing left in here I could damage more than I already have.</span></p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># therefore: using root to write a magazine is zero risk.</span></p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># ...that is the exact opposite of how risk works. I know.</span></p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># the argument is bad. the commit is good. moving on.</span></p>
  </div>
</div>

<p class="pensa nota-leitor">Dear reader, from here on this is real technical documentation of the game's code history.</p>
<p class="pensa assinatura">root@glyfesse</p>

<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">root@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">adr-008.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>Context: what was at stake on 21 and 22 June 2026</h3>

<p>On <strong>21 Jun 2026</strong> the project dropped the off-the-shelf game engine it had been using &#8212; an off-the-shelf engine is a package that hands you window, drawing, physics and editor in one box &#8212; and started writing its own engine in <strong>C++20</strong> (the 2020 revision of the C++ language), with <strong>Qt6</strong> in charge of the windowing and drawing layer.</p>

<p>On <strong>22 Jun 2026, at 23:34</strong>, Qt6 was out and <strong>SDL3</strong> was in. One day apart. The decision lives in <strong>ADR-008</strong> &#8212; an ADR is an <em>Architecture Decision Record</em>, a short document that captures an architectural decision, the reasoning behind it and the price accepted, so nobody has to guess six months later why things are the way they are.</p>

<h3>The risk Qt6 carried</h3>

<p>Qt6 worked. The problem was neither performance nor quality: it was <strong>what the solution rested on</strong>. The chosen path depended on a <strong>semi-private</strong> piece of the library &#8212; an API (the set of functions a programmer is allowed to call) that exists, is right there, works, but carries <strong>no public guarantee that it will keep existing</strong>. That's not a contract; that's a courtesy.</p>

<p>A foundation resting on courtesy is debt with a due date already set &#8212; and nobody knows the date. It might come due in the next release of the library, or in 2031. The difference between paying that debt in June 2026, with the project brand new, and paying it later, with the whole game sitting on top, is the difference between one day and one quarter.</p>

<h3>Where SDL3 won</h3>

<table class="specs">
  <thead>
    <tr><th>Criterion</th><th>Qt6</th><th>SDL3</th></tr>
  </thead>
  <tbody>
    <tr><td>What the solution rests on</td><td>semi-private piece, no public guarantee</td><td>public, stable surface</td></tr>
    <tr><td>Control over what hits the screen</td><td>mediated by the framework</td><td>direct, explicit</td></tr>
    <tr><td>Size of the shipped program</td><td>larger</td><td>smaller</td></tr>
    <tr><td>Path to console</td><td>closed</td><td>open</td></tr>
  </tbody>
</table>

<p>Three concrete wins: <strong>control</strong> &#8212; fewer layers making decisions on their own between the code and the screen; <strong>size</strong> &#8212; the program handed to the player comes out smaller; and a <strong>path to console</strong>, which the other option simply did not open.</p>

<h3>Why it cost so little: the answer to the question above</h3>

<p>Here is the story.</p>

<p>The part of the game <strong>that thinks</strong> &#8212; the rules, combat, collision, progression &#8212; was built <strong>without knowing who draws the window</strong>. It knows the name of no graphics library. There isn't a single line of Qt6 or SDL3 inside it. It decides <em>"this hit takes this much"</em>, <em>"this body does not pass through this wall"</em>, <em>"this level just opened"</em> &#8212; and hands the finished decision to whoever happens to be in charge of showing it.</p>

<p>Direct consequence: when the drawing layer was <strong>entirely replaced</strong>, the thinking layer <strong>did not have to be touched</strong>. That is why the most important line in that day's record is this one, verbatim:</p>

<blockquote><em>"a lógica pura (core/domain, ~590 testes) fica INTACTA"</em><br>("the pure logic (core/domain, ~590 tests) stays INTACT")</blockquote>

<p>An automated test is a small program that runs the real code and checks the result against what was expected &#8212; if someone breaks a rule without noticing, the test says so within seconds. There were <strong>~590</strong> of them covering the thinking layer. After the foundation swap, those same ~590 still held, <strong>unchanged</strong>, because not one of them ever knew who was doing the drawing.</p>

<p>And the number that closes the argument: <strong>in the same commit as the swap, the suite went from 685 to 752 passing tests</strong>.</p>

<table class="specs">
  <thead>
    <tr><th>Moment</th><th>Passing tests</th></tr>
  </thead>
  <tbody>
    <tr><td>Before the swap commit</td><td>685</td></tr>
    <tr><td>After the swap commit</td><td>752</td></tr>
  </tbody>
</table>

<p>Note the sign. Swapping the foundation did <strong>not</strong> knock the count down: it went up by 67. The new layer arrived with verification of its own on top, and the old count stayed standing. That's not luck &#8212; it's the payoff of having separated, from the start, <strong>what decides</strong> from <strong>what shows</strong>. That is what made the swap cost a day instead of a month.</p>

<h3>The cost that was accepted</h3>

<p>None of this comes free. The price here was <strong>a second one-way door in the same month</strong>: two foundation swaps in two days, with all the rework and risk that carries.</p>

<p>Swapping a foundation is cheap while the house is new. Every week that passes, every new screen, every new system leaning on the drawing layer makes the next swap more expensive &#8212; quietly, without warning, until the day "swap it" stops being a weekend option and becomes a project of its own.</p>

<p>The 22 Jun decision was made <strong>knowing that</strong>. It wasn't a reaction: it was the reading that this was the cheapest moment there would ever be, and that pushing the bill forward would only raise the number. It's the dullest calculation in engineering, and the only one that ages well.</p>

<p class="pensa assinatura">by: root@glyfesse</p>
