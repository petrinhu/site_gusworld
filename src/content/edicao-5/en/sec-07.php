<?php /* Graveyard of Dead Ideas (#5) - source: docs/content/edicao-5-cemiterio.md
   (## EN). Voice: Gus-the-editor (the magazine's meta voice; not a
   character living inside the fictional world, so naming "C#",
   "submodule" and tool names does not break L-25, same register as the
   #2/#3/#4 headstones). Headstone layout REUSED (.lapide/.lapide-pedra), no
   new art, no re-gate. One grave only: "the C# foundation" - the grave is
   the BODY's, not the decision's (#3 already buried the decision to switch
   engines, "C# .NET 8 AOT" headstone; this piece does not re-bury that,
   only references it in one line, checked against
   src/content/edicao-3/pt/sec-07.php, line 19). Dates use the &#8224;
   entity (dagger), the SAME convention as #2/#3/#4 - NOT an em-dash. Trava
   T3 in full: nothing about the repo refoundation, no host name (uses "the
   remote server"); no "172 files" number (only the Reportagem has that firm
   source); the piece writes "the C++ files from back then", never "from
   today". Epitaph still PROPOSED in the pauta, not a closed decision -
   confirm with the lead before GATE-CONTEUDO. The source's Notas de
   produção never enter here. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/cemiterio$</span> <span class="dito">graveyard of dead ideas</span></p>

<p>This time it's one grave, and it's empty. Not because it has no name, but because what was supposed to be kept inside it disappeared before I finished writing the headstone. Issue #3 already buried the decision to switch engines, with the "C# .NET 8 AOT" headstone and the note that the body stayed installed on the computer until July 22nd. This grave is different. It's the body's.</p>

<figure class="lapide">
  <div class="lapide-pedra">
    <p class="lapide-nome">the C# foundation</p>
    <p class="lapide-datas"><span>May 2026</span><span>&#8224;Jul 22 2026</span></p>
    <p class="lapide-epitafio">Here lies no one.<br>The body was going to be kept. It got deleted.</p>
  </div>
</figure>

<p>GusWorld was born in Godot, with C#. The real logic (save, translation, progression, the character templates, the combat engine) lived in a C# foundation that sat in its own repository, mounted into the main project as a submodule, in the <code>engine/</code> folder. When the project switched to C++ with SDL3, that foundation got ported in full: save, translation, progression and templates first, the combat engine after. C# became a reference, not a dependency, and went dormant for weeks, waiting for July's cleanup.</p>

<p>While planning that cleanup (M8), the technical review explicitly recommended archiving the foundation's repository in read-only mode, with this justification, verbatim: "deleting the remote repo would be truly irreversible, I don't recommend it." The lead agreed and chose to archive it. The decision stayed on record as his pending task, outside the game's own repository.</p>

<p>The cleanup ran in four phases, with obsessive care not to lose anything inside the repository itself: a safety tag, a from-scratch build as proof, a check at every phase. During the cleanup, the submodule's local metadata got deleted, and that metadata held the only cloned copy of that code on this machine. Afterward, the remote repository was deleted instead of archived.</p>

<p>The <code>pre-m8-godot-legacy</code> tag, created for the express purpose of preserving the legacy, holds only the submodule's pointer: a commit's identifier, not the files. That's how a submodule works: the content always lived in the other repository. They swept the trash, the object packs, the whole disk. There's no copy. The preservation looked done. It wasn't.</p>

<p>Nothing functional was lost: every useful line of that C# had already been translated, months earlier, with tests covering the behavior. The game doesn't depend on a single byte of the deleted code. What got lost was the record. And the C++ files from back then still carry, in their comments, the translation's anchor, pointing to a file nobody can open anymore:</p>

<p><code>// ADAPTED from C#: game/scripts/foundation/save_system/SaveManager.cs</code></p>

<p>A footnote for a work that doesn't exist.</p>

<p>A technical record from the game itself had asked, on June 21st, to archive that repository; a month later it got the stamped reply written right on top of its own request: no effect, because the repository was deleted instead of archived, on the remote server. The irony is recorded with no defense offered: the obsessive care stayed entirely inside the repository, and the loss happened exactly outside it, where none of the checks were looking. The body was going to be kept. It got deleted.</p>
