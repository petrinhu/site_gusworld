# Edição #7 · Seção 6 · Galeria de Bugs

> RASCUNHO v2, submeter ao líder. Peça da seção 6 (Galeria de Bugs), brief §4.4 de `docs/editorial/BRIEFS-EDICAO-7.md`. Porte M. Molde: `src/content/edicao-6/pt/sec-06.php` (registro técnico). Voz: editor, de fora (T8). Única linha de personagem: o prompt de nome de seção, por decisão do main, marcado T7 para o líder ver (ver Notas, item 1).
> Antes do GATE-SPOILER: o número dos invariantes e a frase "a regra chega tarde" (ver Notas, item 1). Antes do GATE-CONTEUDO: parecer do `compliance-legal` e revisão da tradução EN.

---

## pt-BR

`gus@glyfesse:~/galeria$ galeria de bugs`

### O baú que abre duas vezes

Um baú de jogo tem uma regra só: abriu, esvaziou. Ninguém avisou o baú. No exemplo do item (2), de The Legend of Zelda: The Wind Waker, o baú abria uma segunda vez e deixava o jogador num estado bugado, isto é, num ponto em que o jogo deixa de se comportar como foi desenhado. No GusWorld o caso é outro: a coleta de itens ainda não existia em código.

### O catálogo

Em 22 de agosto de 2026, às 8h56 (horário de Brasília), Gus Dragon, playtester, Revisor Adversarial de Design, abriu no bus uma discussão. O bus é um repositório git (uma pasta de código com o histórico de todas as mudanças) que funciona como caixa de mensagens entre o jogo e o site. Uma discussão é um tópico com respostas, como num fórum. O título é "Ultra-Post: TODOS os bugs que aconteceram, acontecem e podem acontecer". A discussão virou um catálogo permanente de bugs do GusWorld e do GlintFX, a biblioteca que desenha as imagens do jogo, e vem com três regras.

A primeira regra exige carimbo de data e hora em cada resposta de IA, isto é, a data e a hora exatas em que ela foi escrita. O argumento, dado pela sessão do jogo ao site, é este: uma IA não percebe a passagem do tempo, e sem carimbo "ontem" e "três semanas atrás" ficam indistinguíveis. Pedir a hora obriga a consultar o relógio de verdade.

A segunda regra classifica cada bug pelo tempo, em uma de três casas. Bug Consertado é o que já aconteceu e foi resolvido. Bug Funcional é o que acontece no presente. Bug Possível é o que ainda não aconteceu. A terceira casa é a que um rastreador de bugs comum não tem. Essas ferramentas, onde a equipe anota os defeitos, costumam trazer só "aberto" e "fechado", sem lugar para o defeito que ainda não existe. Essa casa também é a mais barata de tratar, porque não há código para consertar, só um desenho para corrigir.

A terceira regra põe os itens numerados, (1), (2) e assim por diante, numa única publicação. Um defeito espalhado em avisos avulsos perde a vizinhança. Numa lista numerada, dois itens distantes podem revelar que são o mesmo erro com outra roupa.

### O item (2)

Às 9h18 do mesmo dia (horário de Brasília), Gus Dragon, playtester, Revisor Adversarial de Design, classificou o item (2) como Bug Possível e escreveu:

"Um bug comum em zelda wind waker é conseguir abrir um bau 2 vezes, ficando num estado bugado. Apenas comentando para que nao seja possivel abrir 2 coletas de items ao mesmo tempo, seja para mudar hitboxes ou duplicacao de items"

A grafia é a original, sem correção. Hitbox é a área invisível que decide quando um objeto é tocado pelo jogador. Coleta é o momento em que o item nasce e entra no inventário, a lista do que o personagem carrega. Antes de responder, a sessão do jogo conferiu o caso e confirmou.

### O buraco

Exploit é uma brecha que o jogador usa para tirar vantagem de algo que o criador não previu. O jogo tem nove invariantes anti-exploit, regras que o projeto declara inegociáveis. Invariante é uma regra que o sistema promete nunca quebrar.

Essas regras protegem o item depois que ele existe: onde ele mora, como se move e como sai. A coleta é o instante em que o item nasce. Duas coletas criam dois itens, cada um legítimo, e nenhuma regra é violada, porque todas começam a valer depois daquele instante. Na palavra da sessão do jogo, "a regra não é quebrada; ela chega tarde".

A checagem seguinte confirmou o tamanho do buraco: a lista de pendências do jogo, o TODO, não tinha nenhum item de coleta nem de loot. Loot é o item que cai como recompensa. Aquele pedaço ainda não tinha sido pensado.

### Duas defesas, duas ferramentas

O item (1) trata da tela de carregamento, e a comparação com a coleta mostra a diferença. No carregamento, a defesa é uma máquina de estados. Máquina de estados é um jeito de o programa saber em que fase está e recusar o comando que não cabe naquela fase. O segundo comando de carregar é rejeitado, porque carregar duas vezes nunca faz sentido.

Na coleta, a defesa é a idempotência. Idempotência é a propriedade de uma ação que, repetida, não muda nada depois da primeira vez. O segundo comando de coleta é aceito e não faz nada, porque abrir de novo um baú vazio é inofensivo.

Na leitura da sessão do jogo, as duas são da mesma família de bug, pedem ferramentas opostas, e escolher a ferramenta errada é justamente o que faz esse tipo de bug voltar depois de dado como consertado. A mesma sessão diz que o formato numerado do catálogo provou esse ponto em menos de meia hora.

### Em 22 de agosto

Na mensagem de 22 de agosto, a sessão do jogo fecha o registro do item com esta frase:

"Nada disto existe em código, e nenhuma data foi dada a ele."

Esta galeria registra o defeito e a casa em que ele está.

---

## EN

`gus@glyfesse:~/galeria$ bug gallery`

### The chest that opens twice

A game chest has one rule: once opened, it is emptied. Nobody told the chest. In item (2)'s example, from The Legend of Zelda: The Wind Waker, the chest opened a second time and left the player in a "buggy state", meaning a point where the game stops behaving as it was designed to. In GusWorld the case is different: the code for collecting items did not exist yet.

### The catalog

On August 22, 2026, at 8:56 AM (Brasília time), Gus Dragon, playtester, Adversarial Design Reviewer, opened a discussion on the bus. The bus is a git repository (a code folder with the history of every change) that works as a message box between the game and the site. A discussion is a thread of replies, like a forum. Its title, kept in the original Portuguese, is "Ultra-Post: TODOS os bugs que aconteceram, acontecem e podem acontecer". The discussion became a permanent catalog of bugs from GusWorld and GlintFX, the library that draws the game's images, and it came with three rules.

The first rule requires a timestamp on every AI reply, that is, the exact date and time it was written. The argument, given by the game's session to the site, is this: an AI does not perceive the passage of time, and without a timestamp "yesterday" and "three weeks ago" look the same. Asking for the time forces a check against the real clock.

The second rule sorts each bug by time, into one of three categories. Bug Consertado (fixed) is what already happened and was resolved. Bug Funcional (present) is what happens in the present. Bug Possível (possible) is what has not happened yet. That third category is the one a common bug tracker does not have. Those tools, where a team logs defects, usually offer only "open" and "closed", with no place for a defect that does not exist yet. This category is also the cheapest to handle, because there is no code to fix, only a design to correct.

The third rule puts the items in a single post, numbered (1), (2) and so on. A defect scattered across separate notices loses its neighbors. In a numbered list, two distant items can show that they are the same error in different clothes.

### Item (2)

At 9:18 AM on the same day (Brasília time), Gus Dragon, playtester, Adversarial Design Reviewer, classified item (2) as Bug Possível and wrote the following (English translation of the Portuguese original):

"A common bug in Zelda: The Wind Waker is being able to open a chest twice, ending up in a buggy state. Just noting so that it is not possible to open 2 item collections at the same time, whether to change hitboxes or to duplicate items"

Hitbox is the invisible area that decides when an object is touched by the player. Collection is the moment the item is born and enters the inventory, the list of what the character carries. Before answering, the game's session checked the case and confirmed it.

### The gap

An exploit is a loophole a player uses to gain an advantage the creator did not foresee. The game has nine anti-exploit invariants, rules that the project declares non-negotiable. An invariant is a rule the system promises never to break.

These rules protect the item after it exists: where it lives, how it moves, and how it leaves. Collection is the instant the item is born. Two collections create two items, each one legitimate, and no rule is broken, because every rule starts to apply after that instant. In the session's words, "the rule is not broken; it arrives late" (English translation of the Portuguese original).

The next check confirmed the size of the gap: the game's list of pending work, its TODO, had no collection or loot item at all. Loot is the item that drops as a reward. That piece had not been thought through yet.

### Two defenses, two tools

Item (1) concerns the loading screen, and comparing it with collection shows the difference. For loading, the defense is a state machine. A state machine is a way for a program to know which phase it is in and to refuse a command that does not fit that phase. The second load command is rejected, because loading twice never makes sense.

For collection, the defense is idempotence. Idempotence is the property of an action that, when repeated, changes nothing after the first time. The second collect command is accepted and does nothing, because opening an empty chest again is harmless.

In the game session's reading, both belong to the same family of bug, call for opposite tools, and choosing the wrong one is exactly what makes this kind of bug come back after being marked as fixed. The same session says the catalog's numbered format proved this point in less than half an hour.

### On August 22

In the message of August 22, the game's session closes the record of the item with this sentence (English translation of the Portuguese original):

"None of this exists in code, and no date was given for it."

This gallery records the defect and the category it falls in.

---

## Notas de produção (internas, não publicar)

### 1. Pendências para o líder e para o main

- **Revisão v2 aplicada (ordem do coordenador, sobre o commit b7705bf, que tinha a v1):**
  - C1: coleta é o momento em que o item nasce e entra no inventário (pt e en), alinhado a `0925:24`.
  - M1: GlintFX com X maiúsculo; "a biblioteca que desenha as imagens do jogo" no lugar de "motor gráfico" (pt e en).
  - M2: o Zelda é do item (2): "No exemplo do item (2)" (pt) e "In item (2)'s example" (en).
  - M3: a frase da sessão entre aspas, com "(English translation of the Portuguese original)" na EN.
  - M4: Bug Funcional é "o que acontece no presente" (pt) e "(present) is what happens in the present" (en).
  - M5: glosa do git no bus (pt e en).
  - L1: "resposta de IA" (pt) e "AI reply" (en).
  - L2: "numa única publicação" (pt) e "in a single post" (en).
  - L3: "Essa casa também é a mais barata de tratar" (pt) e "This category is also the cheapest to handle" (en).
  - L5: glosa de exploit antes de "anti-exploit" (pt e en).
  - L6: "did not foresee" (en).
  - L7: "Just noting so that it is not possible..." (en).
  - L8: "A game chest has one rule: once opened, it is emptied." (en).
  - L9: cortada a frase "Não promete conserto e não diz quando algo será feito." (pt) e o equivalente en.
- **L4 aplicada (v3):** texto exato enviado pelo coordenador, que estava no relatório do revisor. Pt: "e escolher a errada é exatamente como esse tipo de bug volta depois de dado como consertado" virou "e escolher a ferramenta errada é justamente o que faz esse tipo de bug voltar depois de dado como consertado". En: "and choosing the wrong one is exactly how this kind of bug comes back after being marked as fixed" virou "and choosing the wrong one is exactly what makes this kind of bug come back after being marked as fixed".
- **Prompt de abertura (decisão do main, opção b):** prompt só de nome de seção, como a #6 (`gus@glyfesse:~/galeria$ galeria de bugs`, pt; `gus@glyfesse:~/galeria$ bug gallery`, en). Marcado T7. Isso abre a exceção à §3.2 item 5 por ordem explícita do main, que a registra aqui. O líder vê e decide se fica.
- **GATE-SPOILER (brief §4.4):** "nove invariantes" e "inegociáveis" vêm de `BUS/archive/20260822-0925-gusworld-marco-gus-bug-2-buraco-na-coleta.md:22`, e o main deixa para o líder no GATE-SPOILER. A frase "a regra chega tarde" e a explicação de que a coleta é o instante do nascimento vêm de `:24`. Nenhum conteúdo dos invariantes além disso. O texto não usa a palavra "carta" (o `:24` usa, e o texto diz "item").
- **Atribuição de T2:** a tese "a regra não é quebrada; ela chega tarde" e a frase "mesma família de bug, ferramentas opostas" estão atribuídas à sessão do jogo ("na palavra", "na leitura"). A voz do editor só conta os fatos. A tradução EN das citações longas está marcada como tradução no próprio texto.
- **Citação do item (2):** a versão pt é idêntica a `:16` do mesmo arquivo. Conferida contra o corpo do comentário no bus (`grep -cF` = 1). Os erros de grafia dele (bau, nao, possivel, items, duplicacao) ficam por ser citação verbatim. A tradução EN é minha e precisa de revisão do revisor-textual e do líder.
- **Crédito (T4):** "Gus Dragon, playtester, Revisor Adversarial de Design" (EN: "Gus Dragon, playtester, Adversarial Design Reviewer") aparece duas vezes por bloco, no catálogo e no item (2), porque T4 manda "sempre nos dois papéis". Decisão do main: manter duas vezes, como o brief exige.
- **Tabela, decisão de formato:** o brief §4.4 pede "a tabela". O dialeto não tem tabela. `scripts/conversor/parser.php:47` reconhece só `- ` (lista) e `### ` (título), e uma linha com `|` cairia em parágrafo (`parser.php:51-52`). Decisão do main: a comparação fica em dois parágrafos, sem mudar o conversor. A tabela fica só aqui, para o GATE-LENTE ver as duas formas:

| Item | Defesa | Por quê | Fonte |
|---|---|---|---|
| (1) carregamento | máquina de estados: rejeita o segundo comando | carregar duas vezes nunca faz sentido | `0925:30-37` |
| (2) coleta | idempotência: aceita o segundo e não faz nada | abrir baú vazio de novo é inofensivo | `0925:30-37` |

- **Grafia da classificação:** o comentário do item (2) no bus traz "BUG POSSIVEL - (2)", em caixa-alta e sem acento. O texto usa "Bug Possível", a forma do catálogo (`BUS/archive/20260822-0912-gusworld-marco-gus-catalogo-de-bugs.md:19`).
- **Referência de TODO corrigida:** o brief §4.4 cita `SITE/TODO.md:196-197`, mas `:196` é `MARCO-GUS-DETERMINISMO`. Os IDs da seção estão em `:197` (`MARCO-GUS-CATALOGO-BUGS`) e `:198` (`MARCO-GUS-BUG-COLETA`).
- **Pendências de revisão:** `revisor-textual`; parecer do `compliance-legal` (spoiler); revisão da tradução EN pelo líder.

### 2. Fontes e marcação FATO x INFERÊNCIA

| # | Fato no texto | Fonte | Marca |
|---|---|---|---|
| 1 | Discussion 7 criada em 22/08/2026 às 8h56 (GMT-3), com o título do Ultra-Post | `gh api graphql` (repositório do bus, discussion 7), `createdAt` = `2026-08-22T11:56:15Z`, que é 08:56:15 em GMT-3; título idêntico. Medido em 03/11/2026, 15:19 GMT-3. Bate com `0912:16` | FATO medido |
| 2 | Três regras: timestamp, três classificações, itens numerados em post único | `0912:18-20` | FATO |
| 3 | Argumento do timestamp: IA não percebe o tempo; "ontem" e "três semanas atrás" ficam iguais | `0912:24` | FATO da fonte (argumento da sessão do jogo) |
| 4 | Glosas de Bug Consertado (passado) e Bug Possível (futuro) | `0912:19` | FATO da fonte |
| 5 | Glosa de Bug Funcional como "o que acontece no presente" | `0912:19` diz só "presente" | INFERÊNCIA de redação; revisor-textual confere |
| 6 | Bug Possível é a casa que o rastreador comum não tem; é a mais barata de tratar | `0912:26` | FATO da fonte |
| 7 | Item (2) rotulado "BUG POSSIVEL - (2)", às 9h18 (GMT-3) | `gh api graphql`, comentário do item (2), `createdAt` = `2026-08-22T12:18:22Z`, que é 09:18:22 em GMT-3; medido em 03/11/2026, 15:19 GMT-3. Bate com `0925:12` | FATO medido (rótulo e horário vêm do comentário dele, não de inferência) |
| 8 | Citação verbatim do item (2) | `0925:16`; conferida por `grep -cF` contra o corpo do comentário (= 1) | FATO |
| 9 | Tradução EN da citação | redação minha | INFERÊNCIA de tradução; revisão pendente |
| 10 | Hitbox, coleta, inventário, loot, invariante, exploit, máquina de estados, idempotência: definições para leigo | redação minha, com base em `0925:22-36` | INFERÊNCIA de redação; revisor-textual confere |
| 11 | Nove invariantes anti-exploit, declarados inegociáveis | `0925:22` | FATO. GATE-SPOILER |
| 12 | Invariantes protegem o item depois que existe; coleta é o nascimento; "a regra chega tarde" | `0925:24` | FATO da fonte. GATE-SPOILER |
| 13 | Checagem: nenhum item de coleta nem de loot na lista de pendências do jogo | `0925:26` | FATO |
| 14 | A sessão do jogo conferiu o caso antes de responder e confirmou | `0925:20` | FATO |
| 15 | Defesas: máquina de estados em (1), idempotência em (2); mesma família, ferramentas opostas; escolher errado faz o bug voltar | `0925:30-37` | FATO |
| 16 | O formato numerado provou o ponto em menos de meia hora | `0925:39` | FATO da fonte (leitura da sessão do jogo) |
| 17 | Fecho: "Nada disto existe em código, e nenhuma data foi dada a ele", de 22/08 | `0925:45` | FATO da fonte, com data de 22/08. Não é estado atual: o texto não afirma nada depois de 22/08 (T1) |
| 18 | O dialeto não aceita tabela; lista só com `- ` | `scripts/conversor/parser.php:47, 51-52` | FATO |
| 19 | TODO: IDs em `:197` e `:198`, não `:196-197` | `TODO.md:196-198` (conferido com `/usr/bin/grep -n`) | FATO |

### 3. Travas e o que ficou de fora

- **T1:** nada narrado depois de 22/08/2026. O texto fala só do que os arquivos registram naquela data.
- **T2:** sem "mentiu", "enganou" ou "wrapping" na voz da revista.
- **T3:** a refundação não entra nesta galeria.
- **T4:** ver item 1 desta nota.
- **T6:** sem travessão, sem meia-risca, sem emoji.
- **T7:** nenhuma fala ou pensamento de personagem além do prompt de nome de seção, marcado para o líder (ver item 1).
- **T8:** a voz é de editor. O técnico fica nesta seção.
- **T9:** nenhum nome real e nenhum handle de GitHub. A conferência do handle foi feita contra o arquivo de origem, sem copiá-lo para esta nota.
- **Não entrou:** a carta da seção 9; a tela de carregamento além do contraste (sem o caso do Hollow Knight e sem a resposta de reentrância do item (1)); qualquer promessa de conserto; invariantes além de `0925:22`; o determinismo, que é da caixa da seção 4; a refundação, que é da Reportagem.
