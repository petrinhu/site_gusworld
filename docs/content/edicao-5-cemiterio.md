# Glyfesse #5: Cemitério das Ideias Mortas (rascunho v1)

> Seção fixa da revista. **Voz: Gus-editor** (a voz meta da revista, quem constrói e enterra decisões de
> produção; não é personagem vivendo dentro do mundo ficcional sendo perguntado sobre a própria existência,
> por isso nomear "C#", "submódulo" e nome de ferramenta não quebra L-25 (mesmo registro das lápides da
> #2/#3/#4). Layout de lápide reaproveitado, sem re-gate de arte.
> **Angle statement (`BRIEFS-EDICAO-5.md`, Peça 5):** uma cova, e ela está vazia: a fundação C# que devia ter
> sido arquivada e sumiu, a tag que guarda só o ponteiro, e a nota de rodapé para uma obra que não existe.
> **Uma lápide só:** `a fundação C#`, datas `mai/2026` a `22/jul/2026`. **A cova é do CORPO, não da decisão**
> (a #3 já enterrou a decisão de trocar de motor, lápide "C# .NET 8 AOT"): aqui não se re-enterra isso, só
> se referencia em uma linha.
> **Fonte primária, caminho absoluto:**
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/arquivo/era-godot-csharp-obituario.md`
> (transcrição íntegra do bus de 22/07 2026, texto-mãe da peça) e, como segunda fonte, na árvore do jogo
> (somente leitura):
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld/docs/tech/adr/ADR-005-license-gpl3-assets-ccbysa.md`,
> linha 46 (pedido de arquivar, 21/06) e linha 118 (carimbo de 25/07: "sem efeito. O repo foi apagado em vez
> de arquivado, no M8").
> **Ponte com a #3 (conferida na fonte publicada, não na paráfrase):**
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-3/pt/sec-07.php`,
> linha 19: "a certidão de óbito é de 21 de junho, mas o corpo ficou instalado no computador até 22 de julho".
> **⚠️ Consequência de redação obrigatória (lacuna §15 item 1 da pauta):** a árvore atual do jogo não tem
> mais nenhum arquivo de código, e a razão está na matéria reservada (não se cita). A peça escreve **"os
> arquivos C++ de então"**, nunca "de hoje".
> ⛔ **Travas:** T3 integral (nada da refundação, nada de nome de host: usar "o servidor remoto"), T5 (zero
> travessão/emoji), sem o número "172 arquivos" (só a Reportagem tem essa fonte firme), sem repetir a lápide
> "C# .NET 8 AOT" além da linha de referência.
> **Status:** rascunho v1, aguardando `GATE-CONTEUDO` do editor-geral. **Epitáfio FECHADO pelo líder em
> 05/09/2026:** ficam as duas linhas que a pauta propunha, sem alteração de texto (pauta, §3.1).

---

## pt-BR

```
gus@glyfesse:~/cemiterio$ cemitério das ideias mortas
```

Desta vez é uma cova só, e ela está vazia. Não porque não tenha nome, mas porque o que devia estar guardado lá dentro sumiu antes de eu terminar de escrever a lápide. A #3 já enterrou a decisão de trocar de motor, com a lápide "C# .NET 8 AOT" e a nota de que o corpo ficou instalado no computador até 22 de julho. Esta cova é outra. É a do corpo.

### a fundação C#
**mai/2026 a †22/jul/2026**

> Aqui não jaz ninguém.
> O corpo ia ser guardado. Foi apagado.

O GusWorld nasceu em Godot, com C#. A lógica de verdade (o save, a tradução, a progressão, os modelos de personagem, o motor de combate) morava numa fundação C# que vivia num repositório próprio, montado no projeto principal como submódulo, na pasta `engine/`. Quando o projeto trocou para C++ com SDL3, essa fundação foi portada inteira: save, tradução, progressão e modelos primeiro, o motor de combate depois. O C# virou referência, não dependência, e ficou dormente por semanas, esperando a limpeza de julho.

No planejamento dessa limpeza (o M8), o parecer técnico recomendou explicitamente arquivar o repositório da fundação em modo somente leitura, com esta justificativa, verbatim: "apagar o repo remoto seria irreversível de verdade, não recomendo". O líder concordou e escolheu arquivar. A decisão ficou registrada como pendência dele, fora do repositório do jogo.

A limpeza foi executada em quatro fases, com cuidado obsessivo pra não perder nada dentro do próprio repositório: tag de segurança, build do zero como prova, verificação a cada fase. Na faxina, os metadados locais do submódulo foram apagados, e eles guardavam a única cópia clonada daquele código nesta máquina. Depois, o repositório remoto foi apagado em vez de arquivado.

A tag `pre-m8-godot-legacy`, criada justamente pra preservar o legado, guarda só o ponteiro do submódulo: o identificador de um commit, não os arquivos. É assim que submódulo funciona: o conteúdo sempre morou no outro repositório. Varreram lixeira, pacotes de objeto e o disco inteiro. Não há cópia. A preservação parecia feita. Não estava.

Nada funcional se perdeu: cada linha útil daquele C# já tinha sido traduzida, meses antes, com teste cobrindo o comportamento. O jogo não depende de um byte do código apagado. O que se perdeu foi o registro. E os arquivos C++ de então ainda carregam, nos comentários, a âncora da tradução, apontando pra um arquivo que ninguém mais consegue abrir:

```
// ADAPTACAO do C#: game/scripts/foundation/save_system/SaveManager.cs
```

Uma nota de rodapé pra uma obra que não existe.

Um registro técnico do próprio jogo tinha pedido, em 21 de junho, pra arquivar esse repositório; um mês depois recebeu a resposta carimbada em cima do próprio pedido: sem efeito, porque o repositório foi apagado em vez de arquivado, no servidor remoto. A ironia fica registrada sem defesa: o cuidado obsessivo ficou todo dentro do repositório, e a perda aconteceu exatamente fora dele, onde nenhuma das verificações estava olhando. O corpo ia ser guardado. Foi apagado.

---

## EN

```
gus@glyfesse:~/cemiterio$ graveyard of dead ideas
```

This time it's one grave, and it's empty. Not because it has no name, but because what was supposed to be kept inside it disappeared before I finished writing the headstone. Issue #3 already buried the decision to switch engines, with the "C# .NET 8 AOT" headstone and the note that the body stayed installed on the computer until July 22nd. This grave is different. It's the body's.

### the C# foundation
**May 2026 to †Jul 22 2026**

> Here lies no one.
> The body was going to be kept. It got deleted.

GusWorld was born in Godot, with C#. The real logic (save, translation, progression, the character templates, the combat engine) lived in a C# foundation that sat in its own repository, mounted into the main project as a submodule, in the `engine/` folder. When the project switched to C++ with SDL3, that foundation got ported in full: save, translation, progression and templates first, the combat engine after. C# became a reference, not a dependency, and went dormant for weeks, waiting for July's cleanup.

While planning that cleanup (M8), the technical review explicitly recommended archiving the foundation's repository in read-only mode, with this justification, verbatim: "deleting the remote repo would be truly irreversible, I don't recommend it." The lead agreed and chose to archive it. The decision stayed on record as his pending task, outside the game's own repository.

The cleanup ran in four phases, with obsessive care not to lose anything inside the repository itself: a safety tag, a from-scratch build as proof, a check at every phase. During the cleanup, the submodule's local metadata got deleted, and that metadata held the only cloned copy of that code on this machine. Afterward, the remote repository was deleted instead of archived.

The `pre-m8-godot-legacy` tag, created for the express purpose of preserving the legacy, holds only the submodule's pointer: a commit's identifier, not the files. That's how a submodule works: the content always lived in the other repository. They swept the trash, the object packs, the whole disk. There's no copy. The preservation looked done. It wasn't.

Nothing functional was lost: every useful line of that C# had already been translated, months earlier, with tests covering the behavior. The game doesn't depend on a single byte of the deleted code. What got lost was the record. And the C++ files from back then still carry, in their comments, the translation's anchor, pointing to a file nobody can open anymore:

```
// ADAPTED from C#: game/scripts/foundation/save_system/SaveManager.cs
```

A footnote for a work that doesn't exist.

A technical record from the game itself had asked, on June 21st, to archive that repository; a month later it got the stamped reply written right on top of its own request: no effect, because the repository was deleted instead of archived, on the remote server. The irony is recorded with no defense offered: the obsessive care stayed entirely inside the repository, and the loss happened exactly outside it, where none of the checks were looking. The body was going to be kept. It got deleted.

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Contagem de palavras pt-BR (bloco `## pt-BR` inteiro: prosa + prompt + lápide + código, `wc -w`) | **498 palavras** |
| Contagem de palavras EN (bloco `## EN` inteiro, mesmo critério) | **519 palavras** |
| Lápides | **1** ✅ (a cova é uma só) |
| Parágrafos de prosa (fora prompt/lápide/código) | **7** (dentro do M: 6 a 8) |
| Ponte com a #3 | ✅ cumprida em uma linha, conferida contra o `.php` publicado (linha 19 de `sec-07.php`), não repete a lápide "C# .NET 8 AOT" além dessa linha de referência |
| Segunda fonte (ADR-005) | ✅ citada em uma frase (linhas 46 e 118), sem nomear o serviço de hospedagem ("o servidor remoto") |
| "172 arquivos" | **ausente** (só o bus e a Reportagem sustentam esse número) |
| "de então" × "de hoje" | ✅ só "de então" usado; nenhuma ocorrência de "de hoje" referida aos arquivos C++ |
| Refundação dos repositórios / nome do host / RmlUi | ausentes, nenhuma menção nem indireta |
| Travessão / en-dash | zero (ver prova abaixo) |
| `//` como pensamento isolado | **nenhum** nesta peça (Cemitério não usa bloco de `//`, seguindo o molde das #2/#3/#4: só prompt + lápide + prosa) |
| Emoji | zero |
| Rótulo clínico | nenhum |

### Prova por contagem: zero travessão

Comando usado (thread principal, antes da entrega): `grep -c $'—\|–'` no arquivo publicável, nas duas
línguas: **0 ocorrências** em pt-BR e **0 ocorrências** em EN. Onde o texto-fonte do bus usava travessão (não
usava, na verdade: o obituário original já não tem nenhum), e onde o `.php` publicado da #3 usa a entidade
`&#8212;` (convenção anterior ao banimento do travessão, que só entrou em vigor a partir da #4), esta peça
**não herdou a entidade**: a ponte foi reescrita sem travessão, com ponto final substituindo a pausa.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- **Epitáfio FECHADO pelo líder em 05/09/2026:** "Aqui não jaz ninguém. / O corpo ia ser guardado. Foi
  apagado." (pt) e a tradução equivalente (en) usadas nesta peça são o texto decidido, citado verbatim; não
  há pendência de confirmação no `GATE-CONTEUDO` quanto a este ponto.
- `GATE-SPOILER`: não se aplica (registro técnico de produção, não narrativa de lore).
- Copyedit formal (`revisor-textual`) e prova final.
- Arte: **nenhuma nova**, o layout de lápide vem das edições anteriores e não re-gate.

### ★ Prova de que a divisória com a Programação e com a Reportagem foi respeitada

| O que ficou em cada peça | Cemitério (esta peça) | Programação (`edicao-5-programacao.md`) |
| :--- | :--- | :--- |
| Beat central | a fundação C# que devia ter sido guardada e sumiu | a proteção pela metade, o isolamento de quem executa, o analisador que achou o crash |
| Datas | maio a 22/07 | 23 e 24 de julho |
| Vocabulário técnico | submódulo, tag, ponteiro, commit, comentário de código | wrapper, variável de ambiente, ponteiro nulo, objeto movido-de, script de gate |
| "172 arquivos" | ausente (reservado à Reportagem) | não se aplica ao assunto desta peça |
| Sabotagem que travou o teste (24/07) | não se aplica ao assunto desta peça | ausente (é do Detonado da Pausa) |

Nenhuma das duas peças conta o fato que pertence à outra; nenhuma repete a lição da outra.
