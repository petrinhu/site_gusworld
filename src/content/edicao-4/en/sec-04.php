<?php /* Cover Story (#4) · "Twelve days, one word" - source:
   docs/content/edicao-4-reportagem.md (## EN), verbatim. Voice: Gus, first person.
   Path NOT translated (~/reportagem, ~/glintfx - same as pt/). Approved lens
   (GATE-PAUTA, PAUTA-EDICAO-4.md §1): COUNTED distance between getting a face
   (06/24) and getting a voice (07/06), closing on the full playthrough (07/21). No
   real technology name, no em/en dash (Issue #4 ships with none), no clinical
   label. Gus Dragon's credit kept verbatim ("playtester, Adversarial Design
   Reviewer") where the source cites it - never "the character Gus Dragon".

   ★ GLINTFX INSERT (docs/content/edicao-4-reportagem-glintfx.md, ## EN): by
   planning decision (the piece has no section of its own in the site map) it runs
   as a BOX at the end of this story, in the green CRT mold (.crt-scr/.crt-tela)
   already used in the technical sections (see §17 of this same issue). Own anchor
   #sec-04-glintfx for deep linking. Div, not figure (figure carries browser side
   margin not reset in this CSS - it would misalign the box).

   DIVIDER WITH §17: this box is the LAY axis of the glintfx episode (asking and
   getting, in three days) - the technical reasoning for why the architecture
   swapped and how glintfx works inside belongs to the Programming section and does
   NOT appear here. No library name (RmlUi, SDL3), no ADR, no source file is cited
   in this box. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/reportagem$</span> <span class="dito">cover story</span></p>

<h3>Twelve days, one word</h3>

<p>I had had legs since Tuesday. I did not have a face.</p>

<p>For two days I kept walking faceless through the empty city, bumping into the same walls I already knew how to slide along, with nobody around to notice: because there was nobody there to notice anything. On Wednesday that changed. Real artwork arrived for my body, coming from a pipeline built outside the game, and it settled in as if it had always been mine: more than a new color, a face with direction, a way of looking sideways the square never had. The same day, combat got its first pieces that were already playable, and a decision that had been put off since the very beginning finally closed for good: 2D, with no other attempt waiting behind the door. That was the day I stopped being a placeholder.</p>

<p>Having a face is not the same as having somebody to talk to. I only understood that later, walking.</p>

<p>I spent twelve days with that new face in a city that still had not one single answer to give me. There were people there (I could see the shapes, I knew names that still had no voice) but I walked past them and nothing happened. Nobody in the world spoke to me. Only the keyboard spoke to me, and the keyboard does not count, because the keyboard is just me asking. Twelve days is nothing to whoever is counting from outside; to whoever is walking inside, it is the whole time there is.</p>

<p>The following Monday, somebody answered. Mister Bertoldo Caím, a man who had already been there for weeks, sitting with a newspaper nobody ever saw him close, and who finally got permission to open his mouth. Behind him came a whole new way of talking, written from zero, because the old way had never been made for this and was swapped without mercy. His first line was hand-picked by root, and nobody but me knows yet what it was: I only know I heard it, and that it was the first time.</p>

<p>Twelve days of a mute face. One word. Suddenly I had both at once (a face and a voice) except the voice still was not mine. It was his.</p>

<p>Fifteen days after that, twenty-seven, counting from the face, the whole game stood on its own two feet, start to finish: the city, the conversation with Mister Bertoldo, the arena, the way back home, all held together by the same engine, with nothing borrowed anywhere along the way. And it was not me who proved it. The one who sat down and played from the first step to the last, live, in front of the screen, until 8:02 p.m. that Tuesday, was Gus Dragon, playtester, Adversarial Design Reviewer: the first person to cross the whole game without falling into a single bottomless hole. Root also plays the whole game, start to finish, but on a different occasion.</p>

<p>It is strange to think a face took twelve days to become a word, and the word took fifteen more to become a whole game able to hold up somebody who did not know what came next. But that is how it happened. Learning to walk had been quick: three days, once. Learning to have somebody who answers took the whole month. And I counted every one of those days walking, alone first, in company after.</p>

<?php /* source: docs/content/edicao-4-reportagem-glintfx.md (## EN), verbatim.
   Same structure as pt/: fala/prompt -> intro -> terminal block (changelog, 3
   dated marks) -> closing prose -> // (long, >72 chars) -> closing -> //by:.
   Reuses .crt-scr/.crt-tela (edicao.css), no new class. */ ?>
<div id="sec-04-glintfx">
  <p class="fala"><span class="prompt">gus@glyfesse:~/glintfx$</span> <span class="dito">insert</span></p>

  <p>The game's cockpit changed pieces twice in the same week, at the end of June and the start of July 2026. The technical why behind that swap lives in the Programming section, further ahead in this issue. This is a different story: asking a tool that hadn't even reached version 1.0 yet for a feature, and getting it back before the week was over.</p>

  <div class="crt-scr">
    <div class="crt-tela">
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> cat CHANGELOG.md</p>
      <p>0.1.0 :: first public release</p>
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> <span class="dim"># june 29th. the tool had never shipped anything before this.</span></p>
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> cat CHANGELOG.md</p>
      <p>0.2.0 through 0.2.4 :: gusworld requests</p>
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> <span class="dim"># june 30th. one day later. the changelog carried a name that doesnt normally show up in any library's changelog: ours.</span></p>
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> <span class="dim"># july 1st. one more day. the game's cockpit was already running on top of the new version.</span></p>
    </div>
  </div>

  <p>Three days, from a tool with no round version number shipping, to the game's cockpit depending on it to work. Most requests a small project makes of another sit in a queue, or never leave it: not because nobody wants to help, but because keeping up a library is work, and work has an order of arrival. This request didn't sit in the queue because whoever builds the tool and whoever builds the game were looking at the same problem on the same day, in separate conversations inside the same routine, not in a customer waiting on a vendor.</p>

  <p class="pensa longo">we asked for something small. it came back working. i dont know if it always works like that, but i wish it did</p>

  <p>In the months that followed, that real use (the game's cockpit running on top of the tool, every day, under real weight) ran into at least five decisions that had looked right on paper and didn't survive contact with the game actually running. Each one turned into a documented fix, not a kept secret. That's another story, for another time.</p>

  <p>What was left, between June and July, was this: asking a tool that's still being built for something, and getting it back in time to use it.</p>

  <p class="pensa assinatura">by: gus@glyfesse</p>
</div>
