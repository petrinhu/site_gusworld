<?php /* Programming Section (#7) · the expert axis - source: docs/content/edicao-7-programacao.md (## EN).
   Hand-built mould (PLANO-CONVERSOR 2.5): the #6 structure (intro, terminal excuse, // transition, nano, <h3> subheads
   and table, //by:), no new class. Faithful transcription: the text was NOT changed. The toy marker line
   is an assembly marker, kept as a PHP comment until M6 (the toy does not exist yet).
   The source's production notes NEVER enter here. */ ?>
<p>A gate is a program that checks work before it is accepted. It follows a written rule, for example "only libraries (ready-made code sets written by others) from this list may be used", and answers in one of two ways: "all clear" or "rejected". The question almost nobody asks is a different one: did the gate look at anything?</p>

<p>On August 21, 2026, the AI session that works on GlintFX, the library, set up a gate that said "all clear" after looking at zero files. The cover story tells why the project was starting over. This section keeps the check.</p>

<?php /* the EXCUSE, in a terminal block. The voice of gus@glyfesse: the reader reads it. So it has no aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~$</span> whoami</p>
    <p>gus</p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># the gate is old and it never broke. so it works</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># i dont check the green, it already said everything is fine</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># ...fine, it never broke because it never looked at anything</span></p>
  </div>
</div>

<p class="pensa longo nota-leitor">Dear reader, from here on, this is the technical part: the gate, the count it should have made, and what the count showed</p>
<p class="pensa assinatura">gus@glyfesse</p>

<?php /* crt-nano: the command being TYPED when the view is entered (CSS steps, the JS only arms it). Decorative (the text already says it all) -> aria-hidden. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">portao-varredura-vazia.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>An "all clear" with no files at all</h3>

<p>The dependency gate (the one that checks which third-party code the project uses) was written with a list rule: only what is on the allowed list passes, and everything else is flagged. It passed the two required self-tests (tests that check that the gate itself works). The first plants a violation and proves it is flagged. The second proves that a clean input comes out without error. There were 35 cases and no failures.</p>

<p>Then the session built a test repository with four obvious forbidden links (uses of outside code that the rule forbids) and ran the gate against it, with the files still outside version control (the record that keeps every change to the code). The output was this:</p>

<div class="crt-scr">
  <div class="crt-tela">
    <p>0 build files, 0 code files, 0 flows scanned</p>
    <p>summary: forbidden=0</p>
    <p>OK -- no link outside the allowed list.</p>
    <p>exit: 0</p>
  </div>
</div>

<p>After the files entered version control, the same gate flagged the four links and exited with an error. (Quotes in this section are translated from the Portuguese original.) The record says: "Detection works. The hole is elsewhere."</p>

<p>The gate asked version control which files existed. If the answer came back empty, because of a wrong path, a repository in a strange state, or a command that failed without warning, the gate scanned nothing, found nothing, and concluded that all was clear.</p>

<p>In the record of August 21, the GlintFX session summed up the defect in one sentence:</p>

<blockquote>
  <p>"'I looked and it is clean' and 'I did not look at anything' produce the same green output."</p>
</blockquote>

<p>Both self-tests missed the case because they ran on files that existed. None exercised the empty input.</p>

<p>The table puts side by side what the gate said and what it had looked at. Besides the dependency gate, the review done right after, on the same August 21, found the same defect in seven more gates of the repository:</p>

<table class="specs">
  <thead>
    <tr><th>What the gate said</th><th>What it had looked at</th></tr>
  </thead>
  <tbody>
    <tr><td>"OK -- no link outside the allowed list" (dependency gate, test repository)</td><td>0 build files, 0 code files, 0 flows scanned</td></tr>
    <tr><td>"40 counters within the limit" (gate that watches the size of the dependency, empty repository)</td><td>Nothing measured</td></tr>
    <tr><td>Nothing: the gate only ran when someone remembered to call it by hand</td><td>Nothing, because it did not run in any flow</td></tr>
  </tbody>
</table>

<p>Every gate found was fixed, with an empty-scan test (a case where the gate finds no file to check) recorded in the repository.</p>

<?php /* BRINQUEDO-PORTAO-DE-BOLSO */ ?>

<h3>The third control: an empty scan is not a success</h3>

<p>The fix has three parts. First: an empty scan is not a success. Zero files listed, or an implausibly low number, ends with an error or shouts in an unmistakable way, and never prints the all-clear line. Second, a third self-test, which proves that with an empty scan the gate does not say all is fine. Without it the fix is not proven, by the same logic that makes the positive control mandatory. Third: measure whether the pre-commit check (the automatic check that runs before each commit, a record of a change to the code) is covered, and write into the file itself any case the gate cannot see. The record is direct: "A declared limit is acceptable; a silent limit is not."</p>

<p>In the same record, the lesson fits in one sentence:</p>

<blockquote>
  <p>"A gate that passed its own tests is not verified: its tests cover the cases that whoever wrote it imagined."</p>
</blockquote>

<p>What caught the defect was running the gate against an input nobody had foreseen: a repository where there was nothing to find.</p>

<h3>The parity rule, from September 2</h3>

<p>On September 2, 2026, root set a rule: "The behavior must be the same on any OS for every wave and slice delivered" (OS is the operating system; waves and slices are blocks of work delivered at once). The scope came the same day: identical and proven on every system where the slice exists.</p>

<p>Before that, the project delivered first on Linux and left Windows for last, and each delivery was still declared finished. Under the new rule, the Linux delivery and the Windows delivery stopped being two tasks at different times and became a single delivery.</p>

<p>The parity rule is a new passage in the GlintFX law about operating systems, in the laws file, which has existed since August 21. The rule required the audit that followed.</p>

<p>Root refused an exception that two technical agents (AI sessions acting as technicians) had recommended: the piece that finds keyboard and mouse has no public face (nothing that the people using the program see), and they proposed that, for that reason, it could close on its own. According to the record, the option chosen was one uniform rule, with no case-by-case judgment, because judgment is where mistakes happen.</p>

<h3>The audit: 45 items and 19 reopened</h3>

<p>There were 45 items marked as done, checked one by one with evidence. Nineteen were reopened. Three findings stood out:</p>

<ul>
  <li>The library reaches Windows without any platform layer (the part of the code that talks to each system). Even the tests that do not depend on the system were locked behind a Linux-only condition.</li>
  <li>No internal check of the code had ever run in Microsoft's compiler (the program that turns code into something the computer runs), because Windows was only compiled in release mode (the optimized version given to users). The record sums it up: "half of the code's safety net never existed there."</li>
  <li>Eleven quality gates never ran on Windows: license, zero dependencies, layer violation and public name collision (zero dependencies: no third-party code; layer violation: one part of the code using another it should not; public name collision: two identical names visible from outside).</li>
</ul>

<p>Two of these gates have already been fixed and proven on a test server (a computer that runs the code and checks the result), on all five systems.</p>

<p>The record of September 3 lists five items and says that four of them are the same thing in different clothes:</p>

<blockquote>
  <p>"a check that seemed to be working and was not looking at anything."</p>
</blockquote>

<p>This section keeps the count: a gate that looked at zero files said all was fine, and the audit that came after reopened 19 of 45 items marked as finished.</p>

<p>Anyone who wants the full technical case, with the records, the gates and the numbers, can ask through the contact in the site footer. This text is the entry point, not the full case.</p>

<p class="pensa assinatura">by: gus@glyfesse</p>
