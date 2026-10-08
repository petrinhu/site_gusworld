# Glyfesse #6: Cemitério das Ideias Mortas (rascunho v1)

> Seção fixa da revista (Seção 7 da Edição #6, "O Caminho Mais Fácil" / "The Easy Way"). **Voz: Gus-editor**
> (a voz meta da revista, quem constrói e enterra decisões de produção; não é personagem vivendo dentro do
> mundo ficcional, por isso nomear "RmlUi" e "GlintFX" não quebra L-25, mesmo registro das lápides da #2 a #5).
> Layout de lápide reaproveitado da #5 (`.lapide`, `.lapide-pedra`, `.lapide-nome`, `.lapide-datas`,
> `.lapide-epitafio`), sem arte nova. A lápide é molde à mão (PLANO-CONVERSOR, F7: sec-07 fica à mão na #6), por
> isso o bloco da pedra copia a sintaxe do `.md` da #5 (`###` + negrito + citação) e usa a entidade `&#8224;`.
> **Angle statement (brief §4.4):** uma cova, e o corpo continua de pé: o nome foi trocado por marcador e o
> código ficou; contrapeso da cova vazia da #5 (lá o corpo sumiu; aqui o corpo ficou e só o nome saiu).
> **Uma lápide só: RmlUi.** A lápide GLFW saiu (corte (c) da pauta §4): a data de nascimento do GLFW não foi
> conferida.
> **Datas (FATO, fixadas pelo líder/orquestrador):** nascimento 22/jun/2026; morte 20/ago/2026 (PQ9, "20/08,
> com o decreto no texto"). **Epitáfio (PQ10, escolhido pelo líder):** "Aqui jaz um nome. O corpo continua de pé."
> A tradução EN do epitáfio é PROPOSTA ao líder.
> **Status:** rascunho v1 do `technical-writer` (2026-10-07), aguardando `GATE-CONTEUDO`. Toda fala do Gus (aqui,
> só a linha de prompt) é "submeter ao líder" (T7). Zero `//` nesta peça (molde das #2 a #5).

---

## pt-BR

`gus@glyfesse:~/cemiterio$ cemitério das ideias mortas`

A cova da #5 estava vazia: o que devia estar guardado lá dentro sumiu antes de eu terminar a lápide. Esta tem corpo. O que saiu dela foi o nome.

### RmlUi
**22/jun/2026 a &#8224;20/ago/2026**

> Aqui jaz um nome.
> O corpo continua de pé.

O RmlUi é uma biblioteca de interface escrita por outras pessoas: é ela que monta os menus e as telas. Aparece pela primeira vez no registro do jogo em 22 de junho de 2026, na troca de base do Qt6 para o SDL3 (o ADR-008, o registro de decisão que listava SDL3, RmlUi e miniaudio). Em 25 de junho, o ADR-009 o escolheu para a interface e para o HUD, o painel de informações que fica por cima do jogo. Em 1º de julho, o ADR-010 passou a usá-lo por dentro do GlintFX, o motor gráfico do jogo (a Edição #4 conta essa troca).

Foi decretado fora em 4 de agosto: o root decidiu tirar as bibliotecas de terceiros uma por uma, começando por ele. A data na pedra é outra, a de 20 de agosto, porque é o dia em que o nome saiu.

Naquele dia, o nome do RmlUi e o das outras bibliotecas de terceiros foram trocados por um marcador em 687 arquivos do GlintFX e em 398 do jogo. A pasta `src/rml/` virou `src/_m_/`. Nenhum arquivo foi apagado e nenhuma linha foi apagada. Só o texto mudou, e o buraco ficou à vista.

Também não ficou comentário no lugar. Segundo o registro da sessão de IA que trabalha no GlintFX, a ausência foi decisão explícita. Quem abria o arquivo via o buraco e mais nada. Esta pedra é o comentário que o repositório não deixou.

E o nome saiu, mas o uso não. No placar de dependência do GlintFX, a contagem de 20 de agosto seguia em 31 arquivos de interface, a mesma do início da campanha, segundo o registro. A troca mexeu no texto e não tirou código. Por isso a pedra enterra o nome e deixa o corpo de fora: um corpo de pé não cabe em cova.

A reportagem de capa conta como o mês chegou até aqui. Esta página só cuida da pedra.

---

## EN

`gus@glyfesse:~/cemiterio$ graveyard of dead ideas`

Issue #5's grave was empty: what was supposed to be kept inside it disappeared before I finished writing the headstone. This one has a body. What left it was the name.

### RmlUi
**Jun 22 2026 to &#8224;Aug 20 2026**

> Here lies a name.
> The body is still standing.

RmlUi is an interface library written by other people: it builds the menus and the screens. It first shows up in the game's record on June 22nd, 2026, in the change of foundation from Qt6 to SDL3 (ADR-008, the decision record that listed SDL3, RmlUi and miniaudio). On June 25th, ADR-009 chose it for the interface and the HUD, the information panel that sits on top of the game. On July 1st, ADR-010 started using it inside GlintFX, the game's graphics engine (Issue #4 tells that swap).

It was decreed out on August 4th: root decided to take the third-party libraries out one by one, starting with it. The date on the stone is a different one, August 20th, because that is the day the name left.

That day, RmlUi's name and the names of the other third-party libraries were replaced by a marker in 687 files of GlintFX and in 398 of the game. The `src/rml/` folder became `src/_m_/`. No file was deleted and no line was deleted. Only the text changed, and the hole was left in plain sight.

No comment was left in its place, either. According to the log of the AI session that works on GlintFX, the absence was an explicit decision. Whoever opened the file saw the hole and nothing else. This stone is the comment the repository did not leave.

And the name left, but the use did not. On GlintFX's dependency scoreboard, the count on August 20th stood at 31 interface files, the same as at the start of the campaign, according to the log. The replacement touched the text and removed no code. That is why the stone buries the name and leaves the body out: a body still standing does not fit in a grave.

The cover story tells how the month got here. This page only looks after the stone.

---

## Notas de produção (nunca publicado)

### Escolhas de redação que o brief não fixava (preenchimento do `technical-writer`, não decisão do líder)

1. **Epitáfio EN (proposta, o líder decide):** (1) "Here lies a name. The body is still standing." (recomendada: tradução literal, em paralelo com o "Here lies no one." da #5); (2) "Here lies a name. The body stands on."; (3) "Here lies a name. The body stayed on its feet."
2. **"o root"** e **"GlintFX"**: segui a irmã da #6 (`edicao-6-reportagem.md`); os partials da #5 usam "o líder" e "glintfx" minúsculo. Decisão ao `revisor-textual`; é troca mecânica.
3. **A frase verbatim "A raspagem trocou texto, não removeu código" NÃO foi citada.** O brief §4.4 a põe na lápide; a Reportagem v1 fecha a peça inteira com ela (`edicao-6-reportagem.md:49`). Para não fechar duas seções com a mesma frase, carreguei o fato em paráfrase ("A troca mexeu no texto e não tirou código"). Se o líder quiser a citação aqui, é uma frase a mais.
4. **O "5 de janela" ficou fora.** O 5 é do GLFW, e a lápide GLFW saiu; o 31 é o do RmlUi. A Reportagem carrega os dois.
5. **GLFW inteiro fora** (inclusive `window_glfw.cpp` virar `window__.cpp`, `evaporacao:15`, e o ADR-0023).
6. **Ponte com a #5 em duas frases curtas, sem a palavra "apagado"/"repositório apagado"** (lista de varredura T1): "estava vazia ... Esta tem corpo."
7. **Tempo verbal:** a prosa fica em 20/08 ("seguia", "ficou", "abria ... via"). O presente só aparece na pedra (epitáfio verbatim do líder), na definição atemporal do RmlUi ("é uma biblioteca") e em dois comentários gerais da própria revista ("esta pedra é o comentário", "um corpo de pé não cabe em cova"). Nenhum "hoje", "ainda" ou "até agora" (Grep sobre o bloco publicável).
8. **Glossário embutido** (o líder é médico, o leitor pode ser leigo): ADR = "registro de decisão"; HUD = "o painel de informações que fica por cima do jogo"; base do jogo = Qt6 para SDL3. Sem explicar o que é SDL3, Qt6 ou miniaudio (nomes de lista).
9. **Datas na pedra** com `&#8224;` (entidade), nunca travessão. No `.md` da #5 a pedra usava o caractere † literal; aqui usei a entidade por ordem do orquestrador. O formato `**22/jun/2026 a &#8224;20/ago/2026**` imita o da #5 (`**mai/2026 a †22/jul/2026**`); no partial vira `<span>22/jun/2026</span><span>&#8224;20/ago/2026</span>`.
10. **"Esta pedra é o comentário que o repositório não deixou"** é a única floreio editorial da peça. Não ri da sessão nem do root (T2): afirma que o repositório não deixou comentário (fato do bus) e que a revista deixa a pedra. O líder pode cortar sem perder fato. Idem a última frase do penúltimo parágrafo ("um corpo de pé não cabe em cova").

### Fato (com arquivo:linha) e inferência

Raiz do bus: `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm` (nas linhas abaixo, `BUS/`). Linhas conferidas por Grep em 2026-10-07 nesta rodada.

| # | Afirmação na peça | Tipo | Fonte |
| :-- | :--- | :--- | :--- |
| 1 | Nascimento 22/06/2026 | FATO (conferência do orquestrador, 07/10) | commit `300329a` "feat(repivot): Fase 1 - fronteira M1 de Qt6 para SDL3 (ADR-008)" em `petrinhu/gusworld_legacy`, 2026-06-23T02:34:51Z = 22/06 23:34 GMT-3. **Não li o commit; recebi do orquestrador.** Hash não citado na peça (apontaria para repositório que o leitor não acha) |
| 2 | ADR-008 escolheu SDL3 + RmlUi + miniaudio; ADR-009 fixa o RmlUi como UI/HUD em 25/06 | FATO de segunda mão (ledger, não o ADR aberto) | `/home/petrus/.claude/projects/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/memory/HISTORICO_GUS_ECOSSISTEMA.md:55` (ADR-008, 22/06) e `:58` (ADR-009, 25/06). **O ADR em si não foi aberto por mim.** A inferência de que o commit de 22/06 e o ADR-008 do ledger são o mesmo marco é do orquestrador (regra do ledger: a data mais antiga vence, `:27`) |
| 2b | ADR-010 (01/07) passou a usar o RmlUi por dentro do GlintFX | FATO já publicado | `src/content/edicao-4/pt/sec-17.php:20,51` ("entra o glintfx, envelopando o próprio RmlUi por dentro") e ledger `:60`. Entrou por consistência com o que a #4 já publicou; a oração não usa `wrapper`, `binding` nem `descobriu` (PQ4) |
| 2c | **CONFLITO COM O PUBLICADO (dúvida ao líder, abaixo):** a #4 diz que o ADR-009 "escolheu o RmlUi" em 25/06 e que a engine passou ao SDL3 em "21 de junho" (`edicao-4/pt/sec-17.php:20,47`); a #3 diz que o Qt6 saiu e o SDL3 entrou em 22/06 às 23h34, ADR-008 (`edicao-3/pt/sec-17.php:17,50`), sem citar RmlUi (Grep "rml" nos 102 partials das #3 a #5: só a #4 sec-04/sec-17 casam) | FATO | A pedra grava 22/06 (fixado pelo líder). Para não contradizer a #4, a prosa diz "aparece pela primeira vez no registro do jogo em 22" e "em 25 de junho, o ADR-009 o escolheu" (as palavras da #4) |
| 3 | "tirar as bibliotecas de terceiros uma por uma, começando por ele", 04/08 | FATO | `BUS/archive/20260804-1950-glintfx-vamos-tirar-o-rmlui-de-vez.md:13-14` (verbatim: "Vou mudar a ordem do trabalho tirando uma por uma, começando por rmlui."). Paráfrase, sem repetir a citação da Reportagem |
| 4 | Data da pedra = 20/08, dia em que o nome saiu; decreto em 04/08 na prosa | FATO (PQ9, líder, rodada 3 e 4 de 07/10/2026 22:38:12: "20/08, com o decreto no texto") | `docs/editorial/BRIEFS-EDICAO-6.md:892` |
| 5 | 687 arquivos no GlintFX e 398 no jogo; nome trocado por marcador | FATO, com cerca | `BUS/archive/2026-08-20-marco-ecossistema-em-escombros.md:12,16,17`; 687 coincide com `BUS/archive/2026-08-20-glintfx-evaporacao-dependencias.md:12`. **Cerca (T10): a fonte diz "as bibliotecas externas" no plural; os 687 e 398 são os arquivos onde o conjunto das bibliotecas de terceiros foi trocado, NÃO os arquivos que citavam só o RmlUi.** O brief §4.4 dizia "o nome [do RmlUi] foi trocado em 687 arquivos"; a peça escreve "o nome do RmlUi e o das outras bibliotecas de terceiros" |
| 6 | `src/rml/` virou `src/_m_/` | FATO | `evaporacao:15` |
| 7 | Nenhum arquivo e nenhuma linha apagados; buraco à vista; sem comentário, por decisão explícita | FATO | `escombros:19`; `evaporacao:12` ("não deixou comentário explicando"). A razão verbatim ("comentário vira sugestão...") não foi citada, é da Reportagem |
| 8 | 31 arquivos de interface em 20/08, "a mesma do início da campanha" | FATO | `escombros:53` ("31 arquivos de interface, 5 de janela, idênticos ao marco inicial da campanha"); 31 = RmlUi confirmado em `BUS/archive/20260819-0045-glintfx-adr0023-glfw-sai-wayland-only-e-placar-parado--copia-site.md:19`. **Não escrevi "desde 4 de agosto"**: a fonte diz "marco inicial da campanha", e não o liga a 04/08 com data |
| 9 | "A troca mexeu no texto e não tirou código" | FATO em paráfrase | `escombros:53` ("A raspagem trocou texto, não removeu código") |
| 10 | Ponte com a #5: cova vazia, corpo sumiu antes da lápide | FATO | `src/content/edicao-5/pt/sec-07.php:19,25` (lido nesta rodada) |
| 11 | "a sessão de IA que trabalha no GlintFX" | FATO (declaração de IA, L-09) | `escombros:1-6` (`De: sessão glintfx`) |

**Inferência minha: nenhuma carregada como fato.** As duas únicas frases que vão além da fonte são os floreios do item 10 da lista de escolhas de redação, marcados.

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Lápides | 1 (RmlUi) |
| Parágrafos de prosa (fora prompt/pedra) | 6 em cada idioma (ponte, RmlUi, decreto, 20/08, comentário, placar) mais a linha de remissão à Reportagem = 7 (dentro do M: 6 a 8) |
| `//` ou `/* */` | nenhum; a única fala do Gus é a linha de prompt, sem ponto final (R1) |
| Travessão e meia-risca (U+2014, U+2013, e as duas entidades nomeadas equivalentes), arquivo inteiro | **0 ocorrências** (Grep depois de salvar, ver a contagem no relato) |
| Emoji, rótulo clínico, nome de batismo, nome real de terceiro | emoji 0 (Grep); os demais nenhum, por leitura |
| Nada posterior a 20/08 (T1) | confirmado na leitura; Grep sobre as 72 linhas anteriores a esta seção (piso: 72, não vazio), lista T1/T2 completa mais `glfw`, `apagad`: único casamento publicável é "Nenhum arquivo foi apagado e nenhuma linha foi apagada" (fato do bus, não é "repositório apagado") |
| Tamanho (`awk` por palavra) | pt-BR 345 palavras, EN 347, contando prompt, pedra e prosa (a #5 tinha 498 e 519; esta peça tem uma pedra só e menos matéria) |
| Dinheiro e custo (T3) | nenhuma frase |
| Crédito do Gus Dragon (T4) | a peça não o cita |
| Nenhuma menção a Codeberg (L-29) | confirmado |

### Dúvidas que só o líder resolve (recomendada primeiro)

1. **Nascimento do RmlUi na pedra (22/jun) × o que a #4 já publicou (25/jun, ADR-009, "escolheu o RmlUi").** (a) Manter 22/jun com a prosa "aparece pela primeira vez no registro do jogo em 22" (como está; é a regra do ledger, a data mais antiga vence). (b) Trocar a pedra para 25/jun e alinhar com a #4. (c) Manter 22/jun e acrescentar uma linha dizendo que a #4 contou 25.
2. **Epitáfio EN** (item 1 da lista de escolhas): a recomendada é a tradução literal.
3. **A frase "A raspagem trocou texto, não removeu código"**: (a) só na Reportagem, paráfrase aqui (como está). (b) citada nas duas. (c) só aqui.
4. **"O root" × "o líder"** e **"GlintFX" × "glintfx"**: seguir a Reportagem v1 (como está), ou voltar ao padrão da #5.
5. **Floreios do item 10** (a pedra como "o comentário que o repositório não deixou"; "um corpo de pé não cabe em cova"): manter, ou cortar sem perder fato.
6. **Oração sobre o ADR-010 / GlintFX por dentro** (item 2b): manter (consistência com a #4), ou tirar e deixar a #4 sem ponte.
