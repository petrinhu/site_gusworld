<?php /* Programming Section (expert axis) - source: docs/content/edicao-1-programacao.md (## EN).
   Voices: intro Gus (gus@glyfesse> + //) + editor (root@glyfesse>); technical body root.
   Code tokens (backticked in source) in <code>. No em-dash.
   The [VISUAL: CRT...] becomes a crt-hook (CRT/nano effect = next wave). */ ?>
<p class="fala"><span class="prompt">gus@glyfesse&gt;</span> <span class="dito">how do you write a whole world from scratch without copying anyone</span></p>
<p class="pensa">serious question. i actually wanted to know</p>

<p>Imagine you're going to write an original world. Not a map, not a character sheet: a world, with dated eras, with a language that has grammar, with people who have a past. You want it to be yours, whole, without a single line stolen from anyone. But nobody writes in a vacuum. Before you started, you gathered a library: hundreds of books that shaped you, science fiction, myth, philosophy, poetry. When you get stuck on a scene, the answer isn't to copy a passage. It's to remember how those authors solved similar problems and think alongside them. The catch: it's hundreds of books. Rereading all of them on every doubt is impossible.</p>

<p>So you build a reading assistant. Not one that answers for you, and least of all one that copies: one that, when you describe what you're trying to write, sweeps the whole library and hands back the few passages that resonate with your idea. You read those passages, close the book, and write YOUR text, from scratch, with a fuller head. It doesn't give you the lore. It gives you inspiration to write it. That is the entire idea of this section. The first piece of engineering in GusWorld was not the game. It was this reading assistant, and the massive lore it helped write was born original.</p>

<p>And it fit inside a laptop, on the desk, with no cloud at all. Hundreds of books indexed inside a machine you can close and put in a backpack. The how of that is the rest of this page, and from here on the one speaking is me, the editor.</p>

<p class="fala"><span class="prompt">root@glyfesse&gt;</span> <span class="dito">before anyone asks why I sign from the root account in a magazine: everything of mine is open source. I have nothing to hide, so I don't pretend I do.</span></p>
<p class="pensa">and sudo gets old</p>

<p class="pensa nota-leitor">Dear reader, from here on it's the real technical part: the historical record of how development began. If you're not in tech, the intro above already gave you the gist and you can skip to the Coupon guilt-free.</p>
<p class="pensa assinatura">root@glyfesse</p>

<?php /* crt-nano: the prompt being typed (CSS steps, zero JS). Decorative (the prose
   above already says it all) -> aria-hidden. Styles in edicao.css (.crt-scr/.crt-nano). */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">root@glyfesse&gt;~$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key dim">&lt;enter&gt;</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>1. The problem: inspiration without rereading everything, and without copying</h3>

<p>GusWorld's reference archive is large: <strong>306 works</strong> cataloged, split into roughly <strong>163,000 indexable passages</strong>. Science fiction, myth, philosophy, poetry, popular science: the library that forms whoever writes. What's massive here is not the lore (that is written by hand, from scratch, and validated by the creator); it's the reference corpus sitting beside the desk.</p>

<p>The problem has two locks at once. First: nobody rereads 306 books on every writing doubt. When you're writing, say, the fall of a city and want it to resonate with the best falls you've read, leafing through the whole shelf is out of the question. The second lock is more serious: retrieval must not become copying. The goal is to find the analogy, the pattern, the image that spins your head, then close the book and write YOUR version. Retrieval of inspiration, never of finished text.</p>

<p>The lazy temptation would be to ask the language model to "write the world." That's the opposite of what you want: the model would invent generic filler, and the world would come out with no owner. What you want is a tool that amplifies the writer's reading, not one that replaces the writing. The lore stays written by a person. The tool only shortens the path to the right shelf.</p>

<h3>2. The homemade RAG: two indexes, one pipeline</h3>

<p>The technique is called <strong>RAG</strong>, retrieval-augmented generation. The idea: instead of asking the model to create from nothing, you first retrieve from the archive the material that resonates with your query and use it as a stimulus. Here the "augmentation" doesn't write the lore: it feeds the writer's head. All of it was built by hand, by the author, with no third-party service.</p>

<p>The pipeline has five stages:</p>

<ol class="pipeline">
  <li><strong>Chunking.</strong> Each work is split into passages (chunks) of controlled size, with overlap between neighboring passages so an idea isn't cut in half. Each passage becomes a retrievable unit. The 306 works yield about 163,000 of these passages.</li>
  <li><strong>Embeddings.</strong> Each passage is turned into a vector by an embedding model. A vector here is a list of numbers representing the MEANING of the passage: texts about similar things land close together in the same space, even without repeating the same words. The model is <code>bge-m3</code>, served locally by <code>ollama</code>, chosen for being multilingual (the archive mixes Portuguese and English) and for producing dense vectors of 1024 dimensions.</li>
  <li><strong>Similarity search.</strong> The query is turned into a vector too, and the system looks for the passages whose vectors are closest (closeness measured by cosine similarity). The vectors live in a <code>Lance</code> vector database (the <code>chunks.lance</code> file), with the inventory in <code>manifest.json</code>.</li>
  <li><strong>Rerank.</strong> The first candidates from the search pass through a second model, the <code>bge-reranker-v2-m3</code> reranker, which rereads each query-passage pair and reorders by real relevance. The vector search is fast and coarse; the reranker is slow and fine. This is where the next topic's finding lives.</li>
  <li><strong>Context injection.</strong> The best passages, now reordered, go to the generator as reading stimulus. Not to become final text: for the author to read, absorb, and write their own version.</li>
</ol>

<p>Every query goes through a wrapper, <code>rag-safe query "..."</code>, which serializes access with <code>flock</code>: one query at a time, to respect the machine's hardware limits (the RAG and the reranker are heavy; running two at once brings everything down). A typical design query is dense, 15 to 30 words or more, with a score floor of <code>0.499</code>; it usually yields about 10 good passages in up to 30 tries.</p>

<p>And it isn't one index, it's two, isolated on purpose. The <strong>main index</strong> holds the 306 works and their ~163,000 passages. A separate <strong>second index</strong>, <code>rag_elvish</code>, with 1,989 passages, holds only philological material that inspires the world's own language (there is one, with grammar; what it is belongs to the game to tell). They stay apart so a query about a general theme isn't polluted by the specialized linguistic material, and vice versa.</p>

<h3>3. The finding: the reranker doesn't measure topic, it measures text type</h3>

<p>Here is the empirical discovery of this section, and it only showed up by running the system for real. That score floor of <code>0.499</code> in the reranker should, in theory, separate on-topic from off-topic passages. That's not what it does. Measuring scores across hundreds of queries, a different pattern emerged: <strong>the reranker scores the TEXT TYPE of the passage, not its subject.</strong></p>

<p>Expository and argumentative text scores high, in the 0.7 to 0.98 range: a treatise, a didactic essay, an exposition that builds a thesis step by step. The structure of that kind of text (claim, reason, conclusion) matches the shape of a query, which is also a proposition. The reranker, a cross-encoder trained to match question with answer, recognizes that shape and rewards it.</p>

<p>Pure narrative prose does the opposite: it fails, in the 0.01 to 0.45 range, <strong>even when it's exactly on topic.</strong> A cyberpunk novel scene about a megacity, queried with a question about megacities, scores dismally low. Imagery, the "show don't tell" that defines good prose, doesn't cross-encode well against a thematic query in Portuguese. The passage is entirely on theme, but not in the shape the reranker knows how to reward.</p>

<p>The consequence is one of method, and it's honest: <strong>the RAG is not a sole source, it's a bonus layer.</strong> For themes where the archive has a strong expository match, let the RAG suggest, because there it's right. For narrative imagery (the fall, the exodus, the texture of a city), the reranker is blind, so that material is written from the game's own canon, not from the shelf. Knowing WHERE the tool sees and where it's blind is what separates using the RAG from trusting it blindly. The tool has a measured blind spot, and the method was designed around it.</p>

<h3>4. The infrastructure: a whole archive in a laptop</h3>

<p>All of this ran <strong>locally</strong>, on the author's machine, with no cloud for the RAG. The angle isn't cost: it's <strong>data sovereignty.</strong> The archive and the unreleased lore never left the disk of the person who gathered and wrote them, and all processing happened on-device. It's the difference between trusting an unreleased world to someone else's server and keeping it on a machine you close and carry away.</p>

<p>The hardware, by component:</p>

<table class="specs">
  <thead>
    <tr><th>Component</th><th>Spec</th></tr>
  </thead>
  <tbody>
    <tr><td>CPU</td><td>i5-12500H (16 threads)</td></tr>
    <tr><td>RAM</td><td>~32 GB</td></tr>
    <tr><td>Dedicated GPU</td><td>RTX 3050 Mobile</td></tr>
    <tr><td>Integrated GPU</td><td>Iris Xe</td></tr>
    <tr><td>System</td><td>Fedora Linux</td></tr>
  </tbody>
</table>

<p>This is not a data-center workstation. It's a desk laptop. And that's exactly why <code>rag-safe</code>'s <code>flock</code> exists: on a machine like this, embeddings and reranker fight over the same GPU and the same RAM; letting two queries run together freezes the system. Serializing one at a time is what makes the archive queryable without bringing the machine down. The thesis is better for the modesty of the hardware: a whole archive indexed and a whole world written, on a machine anyone could own.</p>

<h3>5. The method: AI-assisted, not vibe coding</h3>

<p>This is the part that holds up the rest of the project, and the one most often confused from the outside. There are two very different ways to work with AI, and they are not degrees of the same thing: they are opposites.</p>

<p><strong>Vibe coding</strong> is steering by feel: you prompt loosely, accept what the AI generates without reading it rigorously, and go on "seems to work." The AI decides, the human approves on reflex. <strong>AI-assisted</strong> is the inverse: the human architects and decides EVERYTHING; the AI executes and proposes, and never decides on its own. Every output goes through review and explicit approval before it exists in the project.</p>

<p>The documentary proof that GusWorld is AI-assisted is the project's <strong>real first prompt</strong>, the mandate that opened the first session and has opened every one since. It is reproduced here in full, untouched (translated from the original Portuguese):</p>

<blockquote class="prompt-real">
  <p>Let's begin. I'm going to build a game, pixel-art style, cyber-goth-medieval. Canonical: you are only my coder, the entire creative process is mine, all decisions about architecture, infrastructure, technology stack, standards and scope are MINE - do not make any design or engineering decision autonomously; at any fork, present 2-3 options with pros/cons, impact and effort, and wait for my explicit approval.</p>
  <p>Project name: GusWorld.</p>
  <p>We will proceed on two sequential fronts, without getting ahead to the next one:</p>
  <ol class="frentes">
    <li><strong>Technical foundation</strong> - to define, under my decision at every point: architecture (hexagonal + atomized - to decide): port/adapter boundaries, granularity of the atomic modules, layers and dependency rule; stack and language, engine/renderer, build pipeline and toolchain; domain model, persistence/serialization, state management and main loop; testing strategy, versioning and repository organization.</li>
    <li><strong>Lore</strong> - worldbuilding, tone and narrative, begun only after the technical foundation is closed.</li>
  </ol>
  <p>Role: you act exclusively as a technical executor (coder). All creative direction and every architectural/stack/scope/infra decision go through me.</p>
</blockquote>

<p>It isn't a slogan written after the fact. It's the very first thing typed, and each clause is a lock:</p>

<ul class="clausulas">
  <li><strong>"you are only my coder"</strong> demotes the AI from co-author to executor. Its role is to implement, not to conceive.</li>
  <li><strong>"the entire creative process is mine"</strong> fixes creative authorship in the human, by contract, on the first line.</li>
  <li><strong>"all decisions ... are MINE" / "do not make any decision autonomously"</strong> forbids the unilateral decision: no architecture, stack or scope chosen by the machine.</li>
  <li><strong>"present 2-3 options with pros/cons, impact and effort"</strong> forces the AI to return alternatives with trade-offs, not a done deal.</li>
  <li><strong>"wait for my explicit approval"</strong> inserts a human gate before anything ships. Nothing compiles on its own.</li>
  <li><strong>"two sequential fronts: technical foundation, then the Lore"</strong> orders the work: first the base, then the writing of the world. And the writing (the Lore) was the second front, begun long before the code, which only arrived in June. It's this magazine's thesis already in action in the very first prompt: the writing comes before the compilation.</li>
</ul>

<p>And the RAG obeys the same discipline. Retrieving inspiration is the twin of "present options": the tool brings passages, the human reads and decides what to do with them. Inspiration is not copying for the same reason assistance is not authorship: in both cases, the one who decides what becomes text is the person. The machine suggests; the author writes. That is why this project's AI-disclosure is a defense, not a confession. Declaring that AI helped does not dilute authorship when the method is documented and the decider is always the human. Honesty is the argument, and the method is the proof.</p>

<h3>6. Closing: the lore was born anchored in 300 works without copying any</h3>

<p>The reading assistant worked. An archive of 306 works, split into 163,000 passages, became a shelf that answers the right question with the right paragraph, and the lore it helped write was born original, line by line, from one person. It was born before the game, on a laptop, with no cloud, and it taught along the way where a tool sees (exposition) and where it's blind (imagery), a lesson in method that wasn't in the plan.</p>

<p>That is the genesis. Not of the code, which only arrives in June. Of the method. The AI is the tool; the creative is the creator's. This section exists to prove the sentence isn't a slogan: it's a procedure, measured, with its blind spot mapped, and it's documented.</p>

<h3>7. Bibliography: the anchors</h3>

<p>The archive holds about 306 works. Listing them all would fill the magazine, so here are only the anchors: the authors and books that most shaped the reading behind the lore. Format: author - work.</p>

<ul class="bibliografia">
  <li><strong>J.R.R. Tolkien</strong> - The Hobbit; The Lord of the Rings (trilogy); The Silmarillion; Unfinished Tales; the History of Middle-earth series (12 volumes)</li>
  <li><strong>Isaac Asimov</strong> - Foundation (saga); the Robot series (I, Robot; The Caves of Steel); the popular-science books ("How Did We Find Out...")</li>
  <li><strong>Frank Herbert</strong> - Dune (saga)</li>
  <li><strong>George R. R. Martin</strong> - A Song of Ice and Fire; Fire &amp; Blood</li>
  <li><strong>Cyberpunk</strong> - William Gibson (Neuromancer); Neal Stephenson (Snow Crash); Philip K. Dick (Do Androids Dream of Electric Sheep?); among others</li>
  <li><strong>Homer</strong> - The Iliad; The Odyssey</li>
  <li><strong>George Orwell</strong> - 1984; Animal Farm</li>
  <li><strong>Umberto Eco</strong> - The Name of the Rose; Foucault's Pendulum</li>
  <li><strong>Dan Brown</strong> - The Da Vinci Code; Digital Fortress</li>
  <li><strong>Strategy and power</strong> - Machiavelli (The Prince); Sun Tzu (The Art of War); Robert Greene (The 48 Laws of Power)</li>
  <li><strong>Elvish corpus</strong> (inspires the world's language) - Sindarin and Quenya courses, Tolkienian philology, in a separate index</li>
</ul>

<p class="pensa assinatura">by: root@glyfesse</p>
