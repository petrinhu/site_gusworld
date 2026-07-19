# Pipeline editorial canônico da Glyfesse

> **STATUS: RASCUNHO (modelo revisado).** Incorpora as **decisões do editor-geral (o líder) de 2026-07-19** e aguarda a **ratificação do modelo revisado** para virar CANON.
> Enquanto não ratificado, nada aqui é regra fixa. Depois de aprovado, este doc rege a produção de **toda** edição.
>
> Autor do rascunho: `product-manager` (managing editor). Data da revisão: 2026-07-19.
> Mudança grande desta revisão: **gates alto-toque, item por item** (o líder opina em CADA etapa com julgamento editorial, em rodadas separadas — não mais 7 gates batelados) e **remoção do fact-check como estágio formal**.

---

## 0. Princípios (o que este pipeline respeita)

1. **O editor-geral opina em CADA etapa.** O líder é o editor-chefe: toda etapa com julgamento editorial pede a opinião/aprovação dele, **item por item** (por seção, por peça), antes de avançar. Verbatim do líder: *"todas as etapas pedem minha opinião"*. Os gates são marcados abaixo com **🔴 GATE-LÍDER**.
2. **Alto-toque é escolha deliberada, não desperdício.** O líder sabe que ele é o gargalo e **escolheu** o envolvimento item-a-item sobre o batelado: é a obra dele (o presente pro filho) e ele é a autoridade dos fatos e da voz. O pipeline serve o **envolvimento dele**, não a eficiência-acima-dele. O que fica enxuto é o mecânico (§7), nunca o julgamento.
3. **Relato histórico datado.** Cada matéria ancora na **data real do commit** do marco que conta (`cronologia-real-datada`). Não se inventa data; pega-se do `git log`.
4. **Revista cheia + vazio com graça.** As ~19 seções recorrem em todo número; seção sem material vira piada honesta na voz do Gus, e **essa copy é SEMPRE co-decidida com o líder** (`anatomia-da-edicao`).
5. **Print antes de entregar.** Nenhum render chega ao líder sem ter sido verificado headless (Firefox/Gecko) por um `qa-engineer` independente de quem construiu. O líder não é o QA (`feedback_print_antes_de_entregar`).
6. **O líder não é artista.** Zero arte nova à mão: só CSS/código, sprite pronto, ou captura. Todo asset derivado de captura de tela é verificado limpo antes de virar tracked (`feedback_frames_vazam_tela_pessoal`).
7. **AskUserQuestion só com frases.** Todo gate do líder é **uma pergunta de UMA frase** (label curto + descrição), **com a sugestão do bigtech primeiro**. Zero preview/ASCII-art/painel lateral na pergunta. O visual vive no print renderizado que precede a pergunta (`feedback_askuserquestion_formato`).

---

## 1. Papéis: indústria → nossa constelação

Mapa dos papéis reais de redação de revista para quem os exerce aqui. Fontes na seção 8.

| Papel editorial (indústria) | O que faz | Quem exerce aqui |
|---|---|---|
| **Editor-in-chief** / editor-geral | Voz da publicação; decisão final sobre o que sai | **O LÍDER (petrus).** Opina/aprova em cada etapa (§5) |
| **Managing editor** | Toca a produção do dia-a-dia; monta a pauta; sequencia; garante estilo | `product-manager` (eu) - orquestra o pipeline |
| **Section / features editor** | Escolhe assunto, recorte, lente e cortes de cada seção | `product-manager` + C-level de conteúdo (CPO/CMO) |
| **Staff writer** | Escreve o rascunho na voz certa | `technical-writer` / `ux-writer` |
| **Copy editor** | Gramática, estilo, style guide, títulos/legendas/créditos | `revisor-textual` |
| **Fact-checker** | ~~Verifica fatos, números, fontes, datas~~ | **Sem papel dedicado.** O líder é a fonte/autoridade dos fatos internos; ele confere se/quando quiser (§4). A honestidade dos apartes vira regra de escrita no copyedit |
| **Art director** | Diagramação, layout, figuras, capa | `art-director` / `visual-design-director` (via `/design`) |
| **Proofreader** | Última varredura na prova montada | `revisor-textual` (passada final) + `qa-engineer` (render) |
| **Legal / standards review** | Spoiler, licença, LGPD, privacidade do menor | `AUD-SPOILER` + `compliance-legal` **só instruem** (produzem o parecer); **o líder é o único decisor de spoiler** |
| **Publisher / CMS** | Publica, checa formatação/links/metadata | `backend-engineer` (deploy). Mas o GO é gate do líder (`D-GO-LIVE`) |

---

## 2. Os DOIS loops

Uma edição tem dois ciclos aninhados:

- **LOOP DA EDIÇÃO (macro)** - planeja o número inteiro, monta capa/índice, faz a prova final, publica. Roda 1x por edição.
- **LOOP DA SEÇÃO (micro)** - cada uma das ~19 seções passa por um mini-pipeline próprio (pauta → rascunho → edição → checks → arte → aprovação). Roda ~19x por edição, mas a maioria das seções está em **vazio com graça** (custo quase zero) e só 2-3 são "caras".

O líder é consultado **em cada etapa marcada 🔴 abaixo, item por item** (por seção com material, por render), em rodadas separadas. Os gates disparam na **sequência natural** do avanço de cada seção — não em um lote único por edição.

```
EDIÇÃO
 ├─ [E1] Pauta da edição ............... 🔴 GATE-PAUTA
 ├─ [E2] Assignment por seção
 │
 ├─ para CADA seção:  ┌─ LOOP DA SEÇÃO ─────────────────────────┐
 │                    │ S1 Lente, recorte, cortes  🔴 GATE-LENTE │
 │                    │ S2 Rascunho (draft)                      │
 │                    │ S3 Edição de conteúdo   🔴 GATE-CONTEUDO │
 │                    │ S4 Copyedit (tela×papel, bi, honestidade)│
 │                    │ S5 Spoiler check        🔴 GATE-SPOILER  │
 │                    │ S6 Copy final           🔴 GATE-COPY     │
 │                    │ S7 Arte / layout                         │
 │                    │ S8 Render + QA visual                    │
 │                    │ S9 Aprovação do render  🔴 GATE-RENDER   │
 │                    └──────────────────────────────────────────┘
 │
 ├─ [E3] Montagem: capa + índice (3 links) . 🔴 GATE-CAPA
 ├─ [E4] Prova final da edição inteira
 ├─ [E5] GO / publicar ..................... 🔴 GATE-GO
 └─ [E6] Pós: errata, captura do estado, métricas
```

Cada 🔴 é **uma pergunta por item** (a lente da seção X; o conteúdo da seção X; o render da peça Y). Quando vários itens chegam ao mesmo estágio ao mesmo tempo, o bigtech pode agrupá-los numa **única rodada de AskUserQuestion de até 4 perguntas** — mas cada pergunta continua sendo **um item** (nunca duas seções fundidas na mesma opção).

---

## 3. Loop da edição (macro) - estágios

### E1. Pauta da edição
- **O que acontece:** define-se o **marco** que a edição conta e sua **data-âncora** (o commit real, `cronologia-real-datada`). Monta-se o **mapa das ~19 seções**: quais têm material novo (as "caras": reportagem, entrevista, programação, apartes, Gus no Bus) e quais entram em **vazio com graça**. Define-se o tema-guarda-chuva do número.
- **Quem:** `product-manager` (managing editor) propõe; C-level de conteúdo revisa.
- **Input:** `$edicoes`, cronologia datada, o que o jogo publicou no bus, `TODO.md` do jogo.
- **Output:** um **mapa de edição** (tabela: seção → cheia/vazia → assunto → data-âncora).
- **🔴 GATE-PAUTA:** o líder aprova/ajusta o mapa. **Sugestão do bigtech:** o mapa proposto, com recomendação de quais seções valem material novo neste número e quais ficam em vazio. Uma pergunta.

### E2. Assignment (briefing por seção)
- **O que acontece:** para cada seção com material, gera-se um **brief**: escopo, ângulo, deadline, tamanho (S/M/L), fonte primária (qual commit/ADR/arquivo do jogo), idioma (pt+en).
- **Quem:** `product-manager`.
- **Input:** mapa aprovado em E1.
- **Output:** briefs por seção. Dispara o **loop da seção** (seção 4) para cada uma.
- **Gate:** nenhum (interno). Ambiguidade de escopo sobe como pergunta pontual, não como gate formal.

### E3. Montagem da edição (capa + índice + ordem)
- **O que acontece:** com as seções aprovadas (fim do loop micro), monta-se a **ordem canônica** (`anatomia-da-edicao`: abertura → corpo → fun → encartes → expert → expediente), a **capa** (manchete do marco) e o **índice**, que **fecha sempre com os 3 links fixos** (repo GusWorld, repo GlintFX, `TODO.md` do jogo, com a legenda "DUVIDO VOCÊ LER! 🤣").
- **Quem:** `art-director` monta; `product-manager` confere a ordem; `qa-engineer` renderiza.
- **Input:** todas as seções aprovadas.
- **Output:** capa + índice renderizados e verificados.
- **🔴 GATE-CAPA:** o líder aprova a capa e o índice. **Sugestão do bigtech:** a manchete de capa proposta + confirmação dos 3 links. (Precede a pergunta o print da capa/índice.) Uma pergunta.

### E4. Prova final (proof da edição inteira)
- **O que acontece:** varredura final da edição montada de ponta a ponta: erros que sobraram, links quebrados, tela×papel consistente, bilíngue completo (as duas versões existem e batem), metadata/SEO (`hreflang`), higiene (nenhum nome de menor além de "Gus Dragon", nenhum segredo, nenhuma tela pessoal em asset).
- **Quem:** `revisor-textual` (texto) + `qa-engineer` (render, links, higiene de asset).
- **Input:** edição montada.
- **Output:** relatório de prova (pass/fail item a item). O `product-manager` re-confere o relatório (relatório de agent não é prova).
- **Gate:** nenhum formal; um FAIL bloqueia e volta ao estágio de origem.

### E5. GO / publicar
- **🔴 GATE-GO:** go/no-go do líder (`D-GO-LIVE`). Deploy à produção é **manual e bloqueado por padrão**; auto-push do repo **nunca** vira auto-produção. **Sugestão do bigtech:** "prova passou, higiene limpa, recomendo publicar" ou "recomendo segurar por X". Uma pergunta.
- **Quem publica:** `backend-engineer` (só após o GO).

### E6. Pós-publicação
- **O que acontece:** captura o estado publicado (cada edição é perecível; `o-site-documenta-a-si-mesmo`); abre canal de **errata** para a próxima edição; coleta métricas leves (sem tracker invasivo, LGPD).
- **Quem:** `product-manager` + `backend-engineer`.
- **Gate:** nenhum; errata relevante vira pauta da próxima edição (volta a E1).

---

## 4. Loop da seção (micro) - o mini-pipeline de cada seção

Roda para cada seção do mapa. Seção em **vazio com graça** pula S2-S5 (não há material a redigir nem draft/spoiler a checar) e vai direto para **S6 (a copy do vazio, sempre gated)** + S7-S9 (render).

> **Nota — fact-check (não é mais estágio).** Não há estágio nem papel de fact-check dedicado. **O líder é a fonte e a autoridade dos fatos internos** — são fatos dos projetos dele, feitos por ele; ele confere se e quando quiser. O que **permanece** é a **regra de escrita da honestidade dos apartes** (o `//` com **fonte primária real e conferível** — NumPy docs, não "HumPy docs"), aplicada no **copyedit (S4)**, não como um gate à parte. A ancoragem na **data real do commit** (`cronologia-real-datada`) também é regra de escrita (S2/S4), não estágio.

### S1. Lente, recorte e cortes
- **O que acontece:** decide-se **que assunto** a seção trata neste número, **que parte/recorte** dele, e **a lente editorial** (o ângulo): leigo-nostálgico? expert? a piada por cima e o fato embaixo? Definem-se os **cortes** (o que fica de fora).
- **Quem:** `product-manager` + section editor propõem.
- **Input:** o brief (E2).
- **Output:** um **angle statement** de uma linha por seção ("Nesta seção, sobre [assunto], pela lente [X], cortando [Y].").
- **🔴 GATE-LENTE (por seção com material):** o líder aprova/ajusta a lente e o recorte **de cada seção**, uma pergunta por seção. **Sugestão do bigtech:** o angle statement proposto + os cortes recomendados. Para as ~14 seções em vazio, não há GATE-LENTE (o vazio não tem recorte a decidir; o julgamento dele entra na copy, S6).

### S2. Rascunho (draft)
- **O que acontece:** escreve-se o texto na **voz certa** (o Gus: `gus@glyfesse>` fala + `//` pensamento; reticências como assinatura; profanidade ZERO; o líder assina só o técnico, seco e raro). Produz-se em **pt e en**. Ancora na data do commit real.
- **Quem:** `technical-writer` (matéria técnica/expert) ou `ux-writer` (leigo/copy leve). **Nunca inline pelo orquestrador** (`feedback_technical_writer_areas_tecnicas`).
- **Input:** angle statement aprovado (S1).
- **Output:** rascunho v1 (pt+en).
- **Gate:** nenhum (interno; a opinião do líder sobre o texto entra em S3).

### S3. Edição de conteúdo (developmental + line)
- **O que acontece:** duas camadas da indústria fundidas numa passada só (anti-over-engineering para solo): **developmental** (a matéria diz o que devia? o ângulo se sustenta? falta/sobra?) + **line editing** (fluxo frase a frase, ritmo, a voz do Gus está afinada?).
- **Quem:** `product-manager` (developmental) + `revisor-textual` (line).
- **Output:** rascunho v2.
- **🔴 GATE-CONTEUDO (por seção com material):** o líder vê o **rascunho editado** da seção e opina/aprova — é o momento em que ele olha o texto e o ângulo tomando forma. Uma pergunta por seção. **Sugestão do bigtech:** o v2 proposto + o que mudou do v1 e por quê. (Para vazios não há GATE-CONTEUDO; não há draft.)

### S4. Copyedit
- **O que acontece:** gramática, estilo, style guide. **Checklist duro:**
  - **tela×papel** (`D-ACENTOS`): texto de tela/terminal sem acento (ASCII de propósito); texto de papel/revista com acento pt-br completo.
  - **bilíngue:** pt e en completos e equivalentes.
  - **voz:** reticências só onde ele "quase sente algo"; `//` como nota; nomes canônicos nunca traduzidos; nos apartes/Gus no Bus o registro é **digitado** (sem ponto final, errinhos de dedo ok, nunca de gramática).
  - **honestidade dos apartes:** todo `//` de aparte que afirma um fato técnico carrega **fonte primária real e conferível** (regra de escrita herdada do antigo fact-check).
  - **pixel:** N maiúsculo em fonte pixel só ≥15px (`reference_pixelfont_n_maiusculo`).
- **Quem:** `revisor-textual`.
- **Output:** rascunho v3 (copyedited).
- **Gate:** nenhum (mecânico; a aprovação do texto fechado vem em S6).

### S5. Spoiler check
- **O que acontece:** varre a seção contra a `SPOILER-POLICY` (conservadora, peça a peça). Marca: nome de mestre/carta (ex.: "carta faraday"), feature não lançada, lore embargada, e **privacidade do menor** (publica-se sempre como o **Gus personagem**, nunca o filho real; só "Gus Dragon"; nenhum nome de batismo).
- **Quem:** `AUD-SPOILER` + `compliance-legal` **só instruem** — produzem o parecer, não decidem.
- **🔴 GATE-SPOILER (por seção que toca embargo):** **o líder é o único decisor de spoiler.** Ele aprova/ajusta cada item que toca embargo, uma pergunta por item spoiler-touching. **Sugestão do bigtech:** o parecer (item + risco) + recomendação (liberar / segurar / virar tease sem verbatim).

### S6. Copy final
- **O que acontece:** o texto fechado da seção - **incluindo os vazios com graça**, cuja copy é co-decidida SEMPRE com o líder.
- **🔴 GATE-COPY (por seção):** o líder aprova a copy final **de cada seção**, uma pergunta por seção. **Sugestão do bigtech:** o texto proposto (pt+en); nas seções vazias, 1-2 opções de piada honesta na voz do Gus.

### S7. Arte / layout
- **O que acontece:** diagramação da seção. **Só CSS/código, sprite pronto ou captura** (o líder não é artista): papel pautado, manchas (café/suco/chocolate por seed do `$edicoes`), CRT, terminal verde etc. As manchas nunca cobrem texto (zona segura/clip). Interativos (quadradinho, scrubber, cupom) seguem **TDD**: lógica pura extraída e coberta por teste (`feedback_tdd_mini_apps`).
- **Quem:** `art-director` / `visual-design-director`.
- **Output:** a seção diagramada (HTML/CSS).
- **Gate:** nenhum (interno); a aprovação vem no render (S9). **Arte reaproveitada não re-gate:** layout idêntico reaproveitado de edição anterior não passa por novo GATE-RENDER — só render **novo ou alterado** é gated.

### S8. Render + QA visual
- **O que acontece:** renderiza headless no **Firefox/Gecko** (`--new-instance --profile`; filtro SVG precisa dimensão explícita) e um `qa-engineer` **independente do art-director** confere o print contra o checklist item a item. **Higiene de asset:** qualquer imagem derivada de captura é verificada "só o alvo, sem tela ao redor" antes de virar tracked.
- **Quem:** `qa-engineer`. O `product-manager` re-confere o relatório do QA (o QA também erra).
- **Output:** print verificado + relatório pass/fail.
- **Gate:** nenhum; FAIL volta a S7.

### S9. Aprovação do render
- **🔴 GATE-RENDER (por peça):** o líder vê o **print já verificado** e aprova a seção renderizada, **uma pergunta por render novo ou alterado** (é o gate que ele explicitamente quer ver peça a peça, `feedback_visibilidade_por_marco`). **Sugestão do bigtech:** "render passou no QA, recomendo aprovar" + qualquer ponto de atenção. A pergunta é frases; o visual é o print que a precede, nunca ASCII na caixa. Render reaproveitado idêntico não dispara este gate.

Fim do loop da seção. Seção aprovada volta para a montagem (E3).

---

## 5. Os gates do editor-geral (resumo)

O líder decide em **cada etapa com julgamento editorial**, item por item, em rodadas separadas. Fora desses pontos, os agentes trabalham sem interromper. Os gates disparam na sequência natural do avanço de cada seção (ordem da coluna "Quando").

| Gate | Onde | Cadência (item) | O que o líder decide | Sugestão que o bigtech leva |
|---|---|---|---|---|
| **GATE-PAUTA** | E1 | 1× por edição | O mapa da edição (marco, data, seções cheias × vazias) | Mapa proposto + recomendação de foco |
| **GATE-LENTE** | S1 | **por seção com material** | Lente, recorte e cortes daquela seção | Angle statement + cortes |
| **GATE-CONTEUDO** | S3 | **por seção com material** | O rascunho editado (o ângulo/texto tomando forma) | v2 + o que mudou e por quê |
| **GATE-SPOILER** | S5 | **por item que toca embargo** | Spoiler: liberar, segurar ou virar tease (único decisor) | Parecer (item + risco) + recomendação |
| **GATE-COPY** | S6 | **por seção** (inclui vazios) | A copy final da seção (a piada dos vazios também) | Texto pt+en; nos vazios, 1-2 opções |
| **GATE-RENDER** | S9 | **por peça** (novo/alterado) | O render de cada seção | "Passou no QA, recomendo aprovar" + print |
| **GATE-CAPA** | E3 | 1× por edição | Capa + índice (3 links fixos) | Manchete proposta + 3 links |
| **GATE-GO** | E5 | 1× por edição | Go/no-go de publicação | "Prova ok, higiene limpa, recomendo publicar" |

**Formato invariável de todo gate:** o bigtech prepara/renderiza → mostra o **print** (quando há visual) → faz **AskUserQuestion de UMA frase por item** (label curto + descrição clara, a **opção recomendada primeiro**), **uma decisão por pergunta**. Quando vários itens chegam ao mesmo estágio, agrupa-se em **uma rodada de até 4 perguntas** — mas **cada pergunta é um item** (nunca duas seções na mesma opção). **Nunca** ASCII-art, preview de layout ou painel lateral na pergunta. O líder pode sempre pedir ajuste em vez de aprovar/rejeitar.

**Por que item-a-item e não batelado:** o líder **escolheu** deliberadamente o alto-toque — *"todas as etapas pedem minha opinião"* —, ciente de que multiplica os gates e de que ele é o gargalo. Cada seção "cara" gera ~5 gates (lente, conteúdo, spoiler quando aplica, copy, render); cada vazio gera até 2 (copy, render). É a obra dele; o pipeline serve o envolvimento dele. O enxuto está no mecânico (§7), não no julgamento.

---

## 6. Checklists transversais (valem em toda seção)

- **Datado:** toda matéria carimba a data do commit real. Sem data inventada.
- **tela×papel:** ASCII na tela, acento no papel.
- **Bilíngue:** pt e en, equivalentes; o switch de idioma é a "recompilação" (navega para URL distinta).
- **Voz:** Gus escreve; líder assina só o técnico, seco e raro; profanidade zero; reticências como assinatura; nomes canônicos intocados.
- **Honestidade dos apartes:** todo `//` que afirma fato técnico carrega fonte primária real e conferível.
- **Spoiler + menor:** Gus personagem, nunca o filho real; só "Gus Dragon"; embargo respeitado (o líder decide).
- **Higiene de repo:** nenhum nome de batismo de menor, nenhum segredo/token, nenhuma tela pessoal em asset; sem spoiler na mensagem de commit.
- **Arte:** só CSS/sprite/captura; captura verificada limpa; mancha nunca sobre texto.
- **Interativo:** TDD (lógica pura testada) antes de entregar.

---

## 7. Anti-over-engineering: o que ficou de fora (e por quê)

O que fica **enxuto** é o trabalho mecânico. O que **não** se corta é o julgamento do líder — ele escolheu o alto-toque de propósito.

- **4 níveis formais de edição** (developmental / line / copy / proof, cada um um passo separado) → **fundidos em 2 passadas** (conteúdo em S3, copyedit em S4, proof só na edição inteira em E4). Revista solo não sustenta 4 papéis distintos por matéria.
- **Fact-checker dedicado por item / estágio de fact-check** → **removido.** O líder é a fonte e a autoridade dos fatos internos (são os projetos dele, feitos por ele); *"não tem o que checar; se precisar, eu faço"*. A honestidade dos apartes (`//` com fonte real) virou **regra de escrita** no copyedit, não um papel nem um gate.
- **Gates batelados do líder (o modelo antigo de "7 gates" agrupados por edição)** → **substituídos por gates alto-toque item-por-item.** O líder **rejeitou** o batelado: opina/aprova em cada etapa com julgamento (lente, conteúdo, spoiler, copy, render), por seção/peça, em rodadas separadas. Ele sabe que isso é o gargalo e **preferiu assim** — o pipeline serve o envolvimento dele, não a eficiência-acima-dele. Continua enxuto o que é mecânico.
- **Editorial calendar rígido com datas** → substituído pela **cronologia por commit** (a data já existe no `git log`; não se agenda o passado).
- **Re-gate de arte reaproveitada** → **não existe.** Só render **novo ou alterado** passa por GATE-RENDER; layout idêntico reaproveitado de edição anterior não re-gate.
- **Promoção/analytics pesados** → canal enxuto (Bluesky orgânico + X espelho), métrica leve sem tracker invasivo (LGPD).

---

## 8. Fontes da pesquisa (indústria)

- Multicollab, *Editorial Workflow: 8 Steps, Examples & Template (2026)* - as 8 etapas (ideação → briefing/assignment → criação → review/edição → aprovação → publicação → promoção → análise), donos por etapa e **approval gates**. https://www.multicollab.com/blog/guide-editorial-workflow/
- Elite Editing, *How to Develop an Editorial Workflow* - as 3 fases (planejamento → criação → promoção) e os papéis de editor in-house, copy editor e senior editor no approval. https://eliteediting.com/resources/writing/how-to-develop-an-editorial-workflow/
- Ed2010, *The Official Magazine Glossary* - vocabulário real de redação de revista (assignment, kill fee, proof, etc.). https://ed2010.com/generic/eds-magazine-glossary/
- GCU Blog, *Understanding the Various Types of Editors* - definição de developmental, line, copy editing e proofreading. https://www.gcu.edu/blog/language-communication/types-editors
- Fiveable, *Magazine Writing and Editing* (Unit 13 e 16) - papéis (editor-in-chief, managing editor, section editor, copy editor, fact-checker, proofreader) e o processo de publicação. https://fiveable.me/magazine-writing-and-editing/unit-13/editorial-responsibilities-decision-making/study-guide/0eFNKWEuyunBQ7xK
- eMagazines, *Magazine Production Steps* - produção print/digital, diagramação, prova. https://emagazines.com/blog/magazine-production-steps-to-produce-print-digital-magazines/

Síntese: o padrão-ouro da indústria é **pauta → assignment → draft → edição em camadas (developmental/line/copy) → fact-check → arte/diagramação → proof → aprovação do editor-chefe → publicação → pós/errata**, com papéis dedicados. Para revista indie solo, colapsamos as camadas de edição e os papéis nos agentes da constelação, **removemos o fact-check** (o líder é a autoridade dos fatos internos) e preservamos a espinha — mas **intensificamos** os gates de aprovação do editor-chefe para alto-toque item-a-item, por escolha do líder.

---

## 9. Decisões do editor-geral (aprovadas 2026-07-19)

Registradas aqui como firmes; **falta ratificar o modelo revisado inteiro** (o alto-toque item-a-item) antes de virar canon.

1. **Níveis de edição:** **2 passadas** (conteúdo em S3 + copyedit em S4; proof na edição inteira em E4). O líder opina em cada etapa (ver 4). ✔ aprovado.
2. **Fact-check:** **removido como estágio e papel.** O líder é a fonte/autoridade dos fatos internos; ele confere se/quando quiser. A honestidade dos apartes (`//` com fonte real) permanece como **regra de escrita** no copyedit. ✔ aprovado.
3. **Arte reaproveitada:** o líder aprova **todo render novo ou alterado** (GATE-RENDER por peça); **layout idêntico reaproveitado NÃO re-gate.** ✔ aprovado.
4. **Granularidade dos gates:** **ALTO-TOQUE, item por item.** O líder rejeitou os gates batelados; opina/aprova em cada etapa com julgamento (lente, conteúdo, spoiler, copy, render), por seção/peça, em rodadas separadas — cada gate é uma AskUserQuestion de uma frase; até 4 perguntas por rodada, mas cada pergunta é um item. ✔ aprovado (é o modelo que aguarda ratificação de forma).
5. **Autoridade de spoiler:** o líder é o **único** decisor de spoiler; `AUD-SPOILER`/`compliance-legal` **só instruem** (produzem o parecer). ✔ ratificado.
6. **Vazio com graça:** a copy de cada vazio é **SEMPRE** co-decidida com o líder (GATE-COPY vale para os vazios). ✔ ratificado.
7. **Nome do artefato:** este pipeline é o **`PIPELINE-EDICAO`**, item canônico no `TODO.md`, **pré-requisito dos `COPY-*`** e da montagem de qualquer edição. ✔ ratificado.

### Ponto de atenção que o bigtech sinaliza (não decide)

O alto-toque item-a-item é praticável para as seções "caras" (2-3 por número → ~10-15 gates). O **custo escondido são os ~14 vazios**: se cada vazio exige GATE-COPY **e** GATE-RENDER próprios, isso são ~28 aprovações por edição só para seções de "custo quase zero" — o dobro do trabalho de gate das seções que importam. **Recomendação (o líder decide):** aplicar aos vazios a mesma lógica da **arte reaproveitada** — um vazio cuja copy **e** layout são idênticos aos da edição anterior (a mesma piada, o mesmo papel pautado) não re-gate; só vazio com **piada nova ou layout alterado** dispara GATE-COPY/GATE-RENDER. Isso preserva o "sempre co-decidido" (a decisão foi tomada na primeira vez) sem transformar 14 piadas repetidas em 28 cliques por número. Sinalizado para o líder ponderar; não alterei o fluxo sem a decisão dele.

---

## 10. Nome/artefato e dependências

Este documento é o **`PIPELINE-EDICAO`**. É **pré-requisito** de:
- os `COPY-*` (a copy de cada seção só é produzida dentro deste fluxo);
- a **montagem de qualquer edição** (E1-E6 aqui regem a produção do número).

No `TODO.md`, `PIPELINE-EDICAO` bloqueia os itens de copy e de montagem de edição até estar ratificado.
