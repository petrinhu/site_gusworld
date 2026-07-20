<?php /* Gus Reads the Bus - source: docs/content/edicao-1-gus-le-o-bus.md (## EN).
   Voice: Gus. Figure (git inbox screen) is a VISUAL piece for another wave → hook +
   figcaption. ⚠️ typos preserved: "messgae". "my dad" is an allowed register. */ ?>
<?php /* CSS recreation of a forge screen listing the BUS git inbox/ folder
   (ref. resources/referencias/inbox_git.png): file bar + Name / Last commit
   message / Last commit date columns + 3 folders. Commit messages are IN-FICTION,
   curated, spoiler-safe (NEVER the real commits); zero owner, user, avatar or
   domain (the print blurs those on purpose). Illustrates the bus Gus reads ->
   aria-hidden; the figcaption carries the meaning. Styles: edicao.css. */ ?>
<figure class="bus-figura">
  <div class="bus-inbox" aria-hidden="true">
    <div class="bus-inbox-bar">
      <span class="bus-branch">main</span>
      <span class="bus-path"><b>inbox</b>&nbsp;/</span>
    </div>
    <div class="bus-inbox-head">
      <span>Name</span><span>Last commit message</span><span class="bus-c3">Last commit date</span>
    </div>
    <div class="bus-row">
      <span class="bus-name"><svg class="bus-folder" viewBox="0 0 16 16" aria-hidden="true"><path d="M1.75 2.5A.75.75 0 0 0 1 3.25v9.5c0 .414.336.75.75.75h12.5a.75.75 0 0 0 .75-.75V5.25a.75.75 0 0 0-.75-.75H7.5L6 2.5H1.75Z"/></svg>glintfx</span>
      <span class="bus-msg">read: the site read the brief and replied</span>
      <span class="bus-c3 bus-date">3 h ago</span>
    </div>
    <div class="bus-row">
      <span class="bus-name"><svg class="bus-folder" viewBox="0 0 16 16" aria-hidden="true"><path d="M1.75 2.5A.75.75 0 0 0 1 3.25v9.5c0 .414.336.75.75.75h12.5a.75.75 0 0 0 .75-.75V5.25a.75.75 0 0 0-.75-.75H7.5L6 2.5H1.75Z"/></svg>gusworld</span>
      <span class="bus-msg">chore(bus): archives the day's conversation</span>
      <span class="bus-c3 bus-date">3 h ago</span>
    </div>
    <div class="bus-row">
      <span class="bus-name"><svg class="bus-folder" viewBox="0 0 16 16" aria-hidden="true"><path d="M1.75 2.5A.75.75 0 0 0 1 3.25v9.5c0 .414.336.75.75.75h12.5a.75.75 0 0 0 .75-.75V5.25a.75.75 0 0 0-.75-.75H7.5L6 2.5H1.75Z"/></svg>site</span>
      <span class="bus-msg">feat(bus): Gus sent a new idea</span>
      <span class="bus-c3 bus-date">5 h ago</span>
    </div>
  </div>
  <figcaption>The git BUS screen: three inboxes (glintfx, gusworld, site) passing notes to each other. Gus reads over their shoulder.</figcaption>
</figure>

<p class="fala"><span class="prompt">gus@glyfesse&gt;</span> <span class="dito">good idea my dad had... 3 sessions talking to each other over a git <code>BUS</code>, and i can even send them a messgae! nice. good thing i know how to use this, <code>git</code> and <code>gh</code></span></p>

<p class="pensa">i wasnt in that conversation. but i know git, i know gh... i can get in</p>
