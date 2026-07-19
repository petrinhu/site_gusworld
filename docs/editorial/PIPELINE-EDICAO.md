# Pipeline editorial canônico da Glyfesse

> **STATUS: RASCUNHO.** Aguarda o sign-off do **editor-geral** (o líder) para virar CANON.
> Enquanto não aprovado item a item, nada aqui é regra fixa. Depois de aprovado, este doc rege a produção de **toda** edição.
>
> Autor do rascunho: `product-manager` (managing editor). Data: 2026-07-19.

---

## 0. Princípios (o que este pipeline respeita)

1. **O editor-geral aprova CADA ITEM.** O líder é o editor-chefe: nada avança de estágio sem o gate dele quando o item exige julgamento editorial. Os gates são marcados abaixo com **🔴 GATE-LÍDER**.
2. **Rigoroso, mas enxuto.** É revista indie solo e o líder é o gargalo. Cada gate custa tempo dele: só existe gate onde o julgamento é dele, de verdade. O trabalho mecânico é dos agentes; o líder decide, não executa.
3. **Relato histórico datado.** Cada matéria ancora na **data real do commit** do marco que conta (`cronologia-real-datada`). Não se inventa data; pega-se do `git log`.
4. **Revista cheia + vazio com graça.** As ~19 seções recorrem em todo número; seção sem material vira piada honesta na voz do Gus, e **essa copy é co-decidida com o líder** (`anatomia-da-edicao`).
5. **Print antes de entregar.** Nenhum render chega ao líder sem ter sido verificado headless (Firefox/Gecko) por um `qa-engineer` independente de quem construiu. O líder não é o QA (`feedback_print_antes_de_entregar`).
6. **O líder não é artista.** Zero arte nova à mão: só CSS/código, sprite pronto, ou captura. Todo asset derivado de captura de tela é verificado limpo antes de virar tracked (`feedback_frames_vazam_tela_pessoal`).
7. **AskUserQuestion só com frases.** Todo gate do líder é uma pergunta de texto (label curto + descrição), **com a sugestão do bigtech primeiro**. Zero preview/ASCII-art/painel lateral na pergunta. O visual vive no print renderizado que precede a pergunta (`feedback_askuserquestion_formato`).

---

## 1. Papéis: indústria → nossa constelação

Mapa dos papéis reais de redação de revista para quem os exerce aqui. Fontes na seção 8.

| Papel editorial (indústria) | O que faz | Quem exerce aqui |
|---|---|---|
| **Editor-in-chief** / editor-geral | Voz da publicação; decisão final sobre o que sai | **O LÍDER (petrus).** Gate de cada item |
| **Managing editor** | Toca a produção do dia-a-dia; monta a pauta; sequencia; garante estilo | `product-manager` (eu) - orquestra o pipeline |
| **Section / features editor** | Escolhe assunto, recorte, lente e cortes de cada seção | `product-manager` + C-level de conteúdo (CPO/CMO) |
| **Staff writer** | Escreve o rascunho na voz certa | `technical-writer` / `ux-writer` |
| **Copy editor** | Gramática, estilo, style guide, títulos/legendas/créditos | `revisor-textual` |
| **Fact-checker** | Verifica fatos, números, fontes, datas | Embutido no writer + cruzamento de commits/ADRs (`internal-auditor` quando pesado) |
| **Art director** | Diagramação, layout, figuras, capa | `art-director` / `visual-design-director` (via `/design`) |
| **Proofreader** | Última varredura na prova montada | `revisor-textual` (passada final) + `qa-engineer` (render) |
| **Legal / standards review** | Spoiler, licença, LGPD, privacidade do menor | `AUD-SPOILER` + `compliance-legal`; **spoiler é regido pelo líder** |
| **Publisher / CMS** | Publica, checa formatação/links/metadata | `backend-engineer` (deploy). Mas o GO é gate do líder (`D-GO-LIVE`) |

---

## 2. Os DOIS loops

Uma edição tem dois ciclos aninhados:

- **LOOP DA EDIÇÃO (macro)** - planeja o número inteiro, monta capa/índice, faz a prova final, publica. Roda 1x por edição.
- **LOOP DA SEÇÃO (micro)** - cada uma das ~19 seções passa por um mini-pipeline próprio (pauta → rascunho → edição → checks → arte → aprovação). Roda ~19x por edição, mas a maioria das seções está em **vazio com graça** (custo quase zero) e só 2-3 são "caras".

```
EDIÇÃO
 ├─ [E1] Pauta da edição ............... 🔴 GATE-LÍDER A
 ├─ [E2] Assignment por seção
 │
 ├─ para CADA seção:  ┌─ LOOP DA SEÇÃO ─────────────────┐
 │                    │ S1 Lente, recorte, cortes  🔴 B │
 │                    │ S2 Rascunho (draft)             │
 │                    │ S3 Edição de conteúdo           │
 │                    │ S4 Copyedit (tela×papel, bi)    │
 │                    │ S5 Fact-check datado            │
 │                    │ S6 Spoiler check          🔴 C  │
 │                    │ S7 Copy final             🔴 D  │
 │                    │ S8 Arte / layout                │
 │                    │ S9 Render + QA visual           │
 │                    │ S10 Aprovação do render   🔴 E  │
 │                    └─────────────────────────────────┘
 │
 ├─ [E3] Montagem: capa + índice (3 links) . 🔴 GATE-LÍDER F
 ├─ [E4] Prova final da edição inteira
 ├─ [E5] GO / publicar ..................... 🔴 GATE-LÍDER G
 └─ [E6] Pós: errata, captura do estado, métricas
```

---

## 3. Loop da edição (macro) - estágios

### E1. Pauta da edição
- **O que acontece:** define-se o **marco** que a edição conta e sua **data-âncora** (o commit real, `cronologia-real-datada`). Monta-se o **mapa das ~19 seções**: quais têm material novo (as "caras": reportagem, entrevista, programação, apartes, Gus no Bus) e quais entram em **vazio com graça**. Define-se o tema-guarda-chuva do número.
- **Quem:** `product-manager` (managing editor) propõe; C-level de conteúdo revisa.
- **Input:** `$edicoes`, cronologia datada, o que o jogo publicou no bus, `TODO.md` do jogo.
- **Output:** um **mapa de edição** (tabela: seção → cheia/vazia → assunto → data-âncora).
- **🔴 GATE-LÍDER A:** o líder aprova/ajusta o mapa. **Sugestão do bigtech:** o mapa proposto, com recomendação de quais seções valem material novo neste número e quais ficam em vazio.

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
- **🔴 GATE-LÍDER F:** o líder aprova a capa e o índice. **Sugestão do bigtech:** a manchete de capa proposta + confirmação dos 3 links. (Precede a pergunta o print da capa/índice.)

### E4. Prova final (proof da edição inteira)
- **O que acontece:** varredura final da edição montada de ponta a ponta: erros que sobraram, links quebrados, tela×papel consistente, bilíngue completo (as duas versões existem e batem), metadata/SEO (`hreflang`), higiene (nenhum nome de menor além de "Gus Dragon", nenhum segredo, nenhuma tela pessoal em asset).
- **Quem:** `revisor-textual` (texto) + `qa-engineer` (render, links, higiene de asset).
- **Input:** edição montada.
- **Output:** relatório de prova (pass/fail item a item). O `product-manager` re-confere o relatório (relatório de agent não é prova).
- **Gate:** nenhum formal; um FAIL bloqueia e volta ao estágio de origem.

### E5. GO / publicar
- **🔴 GATE-LÍDER G:** go/no-go do líder (`D-GO-LIVE`). Deploy à produção é **manual e bloqueado por padrão**; auto-push do repo **nunca** vira auto-produção. **Sugestão do bigtech:** "prova passou, higiene limpa, recomendo publicar" ou "recomendo segurar por X".
- **Quem publica:** `backend-engineer` (só após o GO).

### E6. Pós-publicação
- **O que acontece:** captura o estado publicado (cada edição é perecível; `o-site-documenta-a-si-mesmo`); abre canal de **errata** para a próxima edição; coleta métricas leves (sem tracker invasivo, LGPD).
- **Quem:** `product-manager` + `backend-engineer`.
- **Gate:** nenhum; errata relevante vira pauta da próxima edição (volta a E1).

---

## 4. Loop da seção (micro) - o mini-pipeline de cada seção

Roda para cada seção do mapa. Seção em **vazio com graça** pula S2-S5 (não há material a checar) e vai direto para S7 (a copy do vazio) + S8-S10 (render).

### S1. Lente, recorte e cortes
- **O que acontece:** decide-se **que assunto** a seção trata neste número, **que parte/recorte** dele, e **a lente editorial** (o ângulo): leigo-nostálgico? expert? a piada por cima e o fato embaixo? Definem-se os **cortes** (o que fica de fora).
- **Quem:** `product-manager` + section editor propõem.
- **Input:** o brief (E2).
- **Output:** um **angle statement** de uma linha por seção ("Nesta seção, sobre [assunto], pela lente [X], cortando [Y].").
- **🔴 GATE-LÍDER B (só nas seções com material):** o líder aprova/ajusta a lente e o recorte. **Sugestão do bigtech:** o angle statement proposto + os cortes recomendados. Para as ~14 seções em vazio, não há gate B (o vazio não tem recorte a decidir).

### S2. Rascunho (draft)
- **O que acontece:** escreve-se o texto na **voz certa** (o Gus: `gus@glyfesse>` fala + `//` pensamento; reticências como assinatura; profanidade ZERO; o líder assina só o técnico, seco e raro). Produz-se em **pt e en**.
- **Quem:** `technical-writer` (matéria técnica/expert) ou `ux-writer` (leigo/copy leve). **Nunca inline pelo orquestrador** (`feedback_technical_writer_areas_tecnicas`).
- **Input:** angle statement aprovado (S1).
- **Output:** rascunho v1 (pt+en).
- **Gate:** nenhum (interno).

### S3. Edição de conteúdo (developmental + line)
- **O que acontece:** duas camadas da indústria fundidas numa passada só (anti-over-engineering para solo): **developmental** (a matéria diz o que devia? o ângulo se sustenta? falta/sobra?) + **line editing** (fluxo frase a frase, ritmo, a voz do Gus está afinada?).
- **Quem:** `product-manager` (developmental) + `revisor-textual` (line).
- **Output:** rascunho v2.
- **Gate:** nenhum.

### S4. Copyedit
- **O que acontece:** gramática, estilo, style guide. **Checklist duro:**
  - **tela×papel** (`D-ACENTOS`): texto de tela/terminal sem acento (ASCII de propósito); texto de papel/revista com acento pt-br completo.
  - **bilíngue:** pt e en completos e equivalentes.
  - **voz:** reticências só onde ele "quase sente algo"; `//` como nota; nomes canônicos nunca traduzidos; nos apartes/Gus no Bus o registro é **digitado** (sem ponto final, errinhos de dedo ok, nunca de gramática).
  - **pixel:** N maiúsculo em fonte pixel só ≥15px (`reference_pixelfont_n_maiusculo`).
- **Quem:** `revisor-textual`.
- **Output:** rascunho v3 (copyedited).
- **Gate:** nenhum.

### S5. Fact-check datado
- **O que acontece:** verifica cada fato, número e fonte. **Ancora a matéria na data real do commit** do marco (`cronologia-real-datada`). Nos apartes ("C-Arcane, segundo o Gus"), o `//` **exige fonte primária real e conferível** (NumPy docs, não "HumPy docs"). Na Galeria de Bugs / Cemitério, cruza journal + commits.
- **Quem:** o writer faz o check básico embutido; `internal-auditor` quando o volume/risco pede.
- **Output:** rascunho v3 com fontes/datas confirmadas.
- **Gate:** nenhum; divergência de fato bloqueia e volta a S2.

### S6. Spoiler check
- **O que acontece:** varre a seção contra a `SPOILER-POLICY` (conservadora, peça a peça). Marca: nome de mestre/carta (ex.: "carta faraday"), feature não lançada, lore embargada, e **privacidade do menor** (publica-se sempre como o **Gus personagem**, nunca o filho real; só "Gus Dragon"; nenhum nome de batismo).
- **Quem:** `AUD-SPOILER` + `compliance-legal` produzem o parecer.
- **🔴 GATE-LÍDER C:** **o líder rege o spoiler.** Ele aprova/ajusta cada item que toca embargo. **Sugestão do bigtech:** a lista dos itens spoiler-touching + recomendação (liberar / segurar / virar tease sem verbatim). Batelável numa rodada por edição.

### S7. Copy final
- **O que acontece:** o texto fechado da seção - **incluindo os vazios com graça**, cuja copy é co-decidida SEMPRE com o líder.
- **🔴 GATE-LÍDER D:** o líder aprova a copy final da seção. **Sugestão do bigtech:** o texto proposto (pt+en), e nas seções vazias 1-2 opções de piada honesta na voz do Gus. Batelável: várias seções numa rodada de AskUserQuestion.

### S8. Arte / layout
- **O que acontece:** diagramação da seção. **Só CSS/código, sprite pronto ou captura** (o líder não é artista): papel pautado, manchas (café/suco/chocolate por seed do `$edicoes`), CRT, terminal verde etc. As manchas nunca cobrem texto (zona segura/clip). Interativos (quadradinho, scrubber, cupom) seguem **TDD**: lógica pura extraída e coberta por teste (`feedback_tdd_mini_apps`).
- **Quem:** `art-director` / `visual-design-director`.
- **Output:** a seção diagramada (HTML/CSS).
- **Gate:** nenhum (interno); a aprovação vem no render (S10).

### S9. Render + QA visual
- **O que acontece:** renderiza headless no **Firefox/Gecko** (`--new-instance --profile`; filtro SVG precisa dimensão explícita) e um `qa-engineer` **independente do art-director** confere o print contra o checklist item a item. **Higiene de asset:** qualquer imagem derivada de captura é verificada "só o alvo, sem tela ao redor" antes de virar tracked.
- **Quem:** `qa-engineer`. O `product-manager` re-confere o relatório do QA (o QA também erra).
- **Output:** print verificado + relatório pass/fail.
- **Gate:** nenhum; FAIL volta a S8.

### S10. Aprovação do render
- **🔴 GATE-LÍDER E:** o líder vê o **print já verificado** e aprova a seção renderizada. **Sugestão do bigtech:** "render passou no QA, recomendo aprovar" + qualquer ponto de atenção. A pergunta é frases; o visual é o print que a precede, nunca ASCII na caixa.

Fim do loop da seção. Seção aprovada volta para a montagem (E3).

---

## 5. Os gates do editor-geral (resumo)

Sete pontos onde o líder decide. Fora deles, os agentes trabalham sem interromper.

| Gate | Onde | O que o líder decide | Sugestão que o bigtech leva | Batelável? |
|---|---|---|---|---|
| **A** | E1 | O mapa da edição (marco, data, seções cheias × vazias) | Mapa proposto + recomendação de foco | 1 rodada/edição |
| **B** | S1 | Lente, recorte e cortes de cada seção com material | Angle statement + cortes | 1 rodada (1 pergunta por seção cara) |
| **C** | S6 | Spoiler: o que libera, segura, vira tease | Lista spoiler-touching + recomendação | 1 rodada/edição |
| **D** | S7 | Copy final (inclui a piada dos vazios) | Texto pt+en; nos vazios, 1-2 opções | 1 rodada (várias seções) |
| **E** | S10 | O render de cada seção | "Passou no QA, recomendo aprovar" + print | Por peça (ele quer ver cada uma) |
| **F** | E3 | Capa + índice (3 links fixos) | Manchete proposta + 3 links | 1 rodada/edição |
| **G** | E5 | Go/no-go de publicação | "Prova ok, higiene limpa, recomendo publicar" | 1 rodada/edição |

**Formato invariável de todo gate:** o bigtech renderiza/prepara → mostra o **print** (quando há visual) → faz **AskUserQuestion só com frases** (label curto + descrição clara, a **opção recomendada primeiro**), uma decisão por pergunta, até 4 perguntas por rodada. **Nunca** ASCII-art, preview de layout ou painel lateral na pergunta. O líder pode sempre pedir ajuste em vez de aprovar/rejeitar.

**Nota de economia do tempo dele:** o gate **E** (render) é o único deliberadamente por-peça, porque o líder prefere ver cada marco renderizado (`feedback_visibilidade_por_marco`). Os demais são batelados em uma rodada por edição para não sangrar o gargalo. Isso é o equilíbrio rigor × enxuto.

---

## 6. Checklists transversais (valem em toda seção)

- **Datado:** toda matéria carimba a data do commit real. Sem data inventada.
- **tela×papel:** ASCII na tela, acento no papel.
- **Bilíngue:** pt e en, equivalentes; o switch de idioma é a "recompilação" (navega para URL distinta).
- **Voz:** Gus escreve; líder assina só o técnico, seco e raro; profanidade zero; reticências como assinatura; nomes canônicos intocados.
- **Spoiler + menor:** Gus personagem, nunca o filho real; só "Gus Dragon"; embargo respeitado.
- **Higiene de repo:** nenhum nome de batismo de menor, nenhum segredo/token, nenhuma tela pessoal em asset; sem spoiler na mensagem de commit.
- **Arte:** só CSS/sprite/captura; captura verificada limpa; mancha nunca sobre texto.
- **Interativo:** TDD (lógica pura testada) antes de entregar.

---

## 7. Anti-over-engineering: o que ficou de fora (e por quê)

- **4 níveis formais de edição** (developmental / line / copy / proof, cada um um passo separado) → **fundidos em 2 passadas** (conteúdo em S3, copyedit em S4, proof só na edição inteira em E4). Revista solo não sustenta 4 papéis distintos por matéria.
- **Fact-checker dedicado por item** → **embutido no writer** + `internal-auditor` só quando o volume/risco justifica. A honestidade dos apartes (`//` com fonte real) é regra de escrita, não um papel novo.
- **Gate do líder em cada micro-passo** → **7 gates** apenas, batelados por edição (exceto o render, que ele quer ver). O líder aprova cada ITEM, mas dentro de rodadas agrupadas por estágio, não a cada frase.
- **Editorial calendar rígido com datas** → substituído pela **cronologia por commit** (a data já existe no `git log`; não se agenda o passado).
- **Promoção/analytics pesados** → canal enxuto (Bluesky orgânico + X espelho), métrica leve sem tracker invasivo (LGPD).

---

## 8. Fontes da pesquisa (indústria)

- Multicollab, *Editorial Workflow: 8 Steps, Examples & Template (2026)* - as 8 etapas (ideação → briefing/assignment → criação → review/edição → aprovação → publicação → promoção → análise), donos por etapa e **approval gates**. https://www.multicollab.com/blog/guide-editorial-workflow/
- Elite Editing, *How to Develop an Editorial Workflow* - as 3 fases (planejamento → criação → promoção) e os papéis de editor in-house, copy editor e senior editor no approval. https://eliteediting.com/resources/writing/how-to-develop-an-editorial-workflow/
- Ed2010, *The Official Magazine Glossary* - vocabulário real de redação de revista (assignment, kill fee, proof, etc.). https://ed2010.com/generic/eds-magazine-glossary/
- GCU Blog, *Understanding the Various Types of Editors* - definição de developmental, line, copy editing e proofreading. https://www.gcu.edu/blog/language-communication/types-editors
- Fiveable, *Magazine Writing and Editing* (Unit 13 e 16) - papéis (editor-in-chief, managing editor, section editor, copy editor, fact-checker, proofreader) e o processo de publicação. https://fiveable.me/magazine-writing-and-editing/unit-13/editorial-responsibilities-decision-making/study-guide/0eFNKWEuyunBQ7xK
- eMagazines, *Magazine Production Steps* - produção print/digital, diagramação, prova. https://emagazines.com/blog/magazine-production-steps-to-produce-print-digital-magazines/

Síntese: o padrão-ouro da indústria é **pauta → assignment → draft → edição em camadas (developmental/line/copy) → fact-check → arte/diagramação → proof → aprovação do editor-chefe → publicação → pós/errata**, com papéis dedicados. Para revista indie solo, colapsamos as camadas de edição e os papéis nos agentes da constelação, preservando a espinha e os gates de aprovação.

---

## 9. Decisões que o líder precisa aprovar para canonizar

Cada uma vira uma pergunta de AskUserQuestion (frases, recomendada primeiro). Enquanto não aprovadas, o pipeline é rascunho.

1. **Níveis de edição:** 2 passadas (conteúdo + copyedit/proof) - **recomendado** - ou 4 papéis formais separados? (recomendado o de 2: enxuto para solo.)
2. **Fact-check:** embutido no writer + auditor sob demanda - **recomendado** - ou papel de fact-checker dedicado por matéria?
3. **Aprovação de arte:** o líder aprova **todo** render novo/alterado (gate E por peça) - **recomendado** - e layout reaproveitado de edição anterior NÃO re-gate; ou ele quer ver todo render mesmo os reaproveitados?
4. **Granularidade dos gates:** aprovar cada item **dentro de rodadas bateladas por estágio** (A,B,C,D,F,G em 1 rodada cada; E por peça) - **recomendado** - ou aprovar item a item em rodadas separadas (mais controle, mais tempo dele)?
5. **Autoridade de spoiler:** o líder é o **único** decisor de spoiler por edição (gate C), com `AUD-SPOILER`/`compliance-legal` só instruindo - confirmar.
6. **Vazio com graça:** a copy de cada vazio continua **sempre** co-decidida com o líder (gate D vale para vazios) - confirmar (já é canon em `anatomia-da-edicao`).
7. **Nome do artefato:** este pipeline vira o item canônico `PIPELINE-EDICAO` no `TODO.md` e passa a ser pré-requisito dos `COPY-*` e da montagem de qualquer edição - confirmar.
