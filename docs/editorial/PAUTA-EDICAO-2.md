# Pauta da Edição #2 da Glyfesse (mapa de edição)

> Artefato de saída do estágio **E1** do `PIPELINE-EDICAO`. **GATE-PAUTA: ✅ APROVADO** (2026-07-23), **re-tematizado 2026-07-24** após a auditoria de datas.
> Managing editor: `product-manager`. Montagem: 2026-07-23. Correção cronológica: 2026-07-24.

## ★★ Correção de 2026-07-24 (a regra de datas sincronizadas)

A auditoria de datas (canon `feedback_datas_sincronizadas_sessoes`) derrubou o tema original ("a edição do cemitério"). Motivo: **em maio-junho quase nada tinha morrido ainda.** As mortes reais são posteriores à janela da #2:

| Ideia morta | Quando morreu | Edição que enterra |
|---|---|---|
| GDScript (a 1ª língua) | **19/mai** (trocada por C#) | **#2** (a única morte de maio) |
| A tentativa 3D | **22/jun** (pivô 3D->2D, ADR-008) | #3 |
| Godot (a engine) | **22/jun -> 22/jul** (ADR-008 + M8) | #3 e a de julho |
| A foundation C# | **22/jul** (M8, apagada) | a de julho |

Decisões do editor-geral (2026-07-24):
1. **A #2 é a edição da CONSTRUÇÃO + a 1ª lápide.** É sobre construir (arquitetura, engines, o 3D), tudo ainda vivo e esperançoso; o Cemitério enterra só a morte de maio (GDScript, 19/mai); o resto é foreshadow. As mortes grandes vão para a #3 e a de julho.
2. **Débito da #1: deixar como está.** A #1 (publicada, datada 15/mai) tem anacronismos (o "Gus lê o bus" mostra o bus de 16/jul; a Entrevista cita o glintfx de julho). Fato consumado; a regra vale daqui pra frente, sem re-deploy. Débito documentado.

## O marco e a data-âncora

- **Marco:** a arquitetura, as primeiras engines e a tentativa 3D (o pivô Fase 1 -> Fase 2). Tudo em construção, nada morto ainda (exceto GDScript).
- **Data-âncora primária:** **19 de maio de 2026** (ADR-002, o pivô de GDScript para C# .NET 8 AOT).
- **Janela coberta:** 19 de maio a 4 de junho de 2026 (fecha em `assets(3d)`, os modelos 3D ainda sendo feitos).
- **Fonte:** `cronologia-real-datada` + `git log` do jogo.

## O tema-guarda-chuva

**"A era da construção."** Na #1, o mundo foi *escrito* (a lore antes do código). Na #2, ele começa a ser *construído*: a stack é escolhida (GDScript -> C# AOT), as primeiras engines nascem (câmera, save, input, combate), o 3D é tentado. Tudo vivo, tudo com esperança. **A ironia dramática é o motor:** o leitor, que veio da #1 (onde o Gus avisou que "os mortos chegam de junho em diante"), sabe que quase nada disso vai sobreviver. A #2 é o retrato feliz antes do velório. O único que já morre aqui é o GDScript, a primeira lápide.

## Mapa das 19 seções

| # | Seção | Estado na #2 | Assunto / lente | Data-âncora |
|---|---|---|---|---|
| 1 | Capa | **cheia** (montagem) | Manchete do marco: a era da construção | 19/mai |
| 2 | Índice | **cheia** (montagem) | Fecha com os 3 links fixos (GusWorld, GlintFX, TODO.md do jogo) | - |
| 3 | Editorial (Carta do Gus) | **CHEIA** ★ (curta) | Ponte da #1 -> a era da construção (foreshadow da queda) | 19/mai |
| 4 | Reportagem de capa | **CHEIA** ★ (cara) | O ARCO da construção, tudo ainda vivo; a morte é foreshadow. Ironia dramática | 19/mai -> 04/jun |
| 5 | A NOTA do jogo inacabado | **cheia** (curta) | A nota que sobe a cada edição; em maio ainda não havia o que jogar ("Jogabilidade: N/A") | 19/mai |
| 6 | Galeria de Bugs | vazio com graça | (sem bug de destaque de maio; entra a piada honesta) | - |
| 7 | Cemitério das Ideias Mortas | **quase vazio + 1 lápide** | Uma lápide só: GDScript (†19/mai). O resto foreshadow ("os mortos chegam de junho") | 19/mai |
| 8 | Detonado (AGUARDE) | vazio com graça | evergreen | - |
| 9 | Errata + Cartas | vazio com graça | (sem cartas ainda; errata da #1 se houver) | - |
| 10 | Classificados in-world | vazio com graça | evergreen | - |
| 11 | HQ | vazio com graça | pool rotativo dos 3 | - |
| 12 | Próximos Lançamentos (tabela vazia) | vazio com graça | evergreen | - |
| 13 | Pôster central | **CHEIA** ★ | O wireframe do Gus 3D (quase 1 milhão de faces para virar pixel de 48px). Datado-correto: o 3D estava sendo feito em maio-junho | 04/jun |
| 14 | Brinde | vazio com graça | evergreen | - |
| 15 | Cupom recortável | **cheia** (recorrente) | O cupom segue; a apuração da #1 é citada aqui (a cadência do voto) | - |
| 16 | A Entrevista | **CHEIA** ★ (cara curta) | In-fiction: o Gus entrevista um zumbi (arquétipo), que responde como ATOR (bastidores de mentira). Comédia | - (atemporal) |
| 17 | Seção de Programação | **CHEIA** ★ (cara) | O PORQUÊ técnico: ADR-002, o raciocínio do AOT. A reversão é só foreshadow (é da #3) | 19/mai |
| 18 | O Gus lê o bus | **REMOVIDA da #2** ⚠️ | ANACRONISMO: o bus nasceu em 16/jul; uma edição de maio não tem cano. Estreia numa edição de julho | - |
| 19 | Expediente | **cheia** (data-driven) | Créditos, licença + o disclaimer factual mínimo de IA (o AI-disclosure recai aqui, sem "Gus lê o bus") | - |

## As "caras" da #2 (onde há escrita nova de verdade)

1. **Reportagem de capa** (o arco da construção).
2. **Seção de Programação** (o eixo expert: ADR-002/AOT).
3. **A Entrevista** (in-fiction: o Gus e o zumbi-ator) - curta.
4. **Editorial** (curta).
5. **Cemitério** - agora leve (1 lápide + foreshadow), não é mais "cara".

Mais o **Pôster central** (o Gus 3D), que é arte/layout. Todo o resto é vazio-com-graça ou data-driven/recorrente.

## ★★ CANON: datas sincronizadas entre as sessões (2026-07-24)

Verbatim do editor-geral: *"é canonico!!! olhar as datas dos acontecimentos se estao sincronizados nas sessoes!"* (detalhe em `feedback_datas_sincronizadas_sessoes` + `PIPELINE-EDICAO` §6).

Antes de pôr QUALQUER elemento numa edição: a **data real do acontecimento** tem que ser compatível com o marco da edição e sincronizada entre as 3 sessões (jogo/glintfx/site). **Artefato não aparece em edição anterior ao seu nascimento.**

- **Bus nasceu 16/jul** -> "Gus lê o bus" só existe em edições de 16/jul em diante. Nas anteriores (era maio-junho), o AI-disclosure recai no Expediente.
- **glintfx nasceu em julho** -> nenhuma menção ao glintfx cabe em edição da era maio-junho.
- **Débito da #1** (deixar como está, decisão 2026-07-24): a #1 tem o bus e o glintfx numa edição de maio. Não se corrige; a regra vale daqui pra frente.

## Lentes aprovadas (S1 GATE-LENTE)

### Cemitério das Ideias Mortas ✅ (2026-07-23, re-escopado 2026-07-24)

- **Angle statement:** uma lápide só na #2 - **GDScript** (a primeira língua, †19/mai, trocada por C#/ADR-002) - pela lente do epitáfio na voz do Gus (deboche por cima, luto honesto por baixo), com o resto do cemitério ainda vazio e um foreshadow ("os mortos de verdade chegam de junho em diante", ecoando a #1).
- **Tom:** deboche + luto honesto.
- **A única lápide:** GDScript. As mortes da foundation C# (†22/jul), do 3D (†22/jun) e do Godot (†22/jun->22/jul) NÃO cabem aqui: são #3 e a edição de julho.
- **O obituário da foundation C#:** NÃO entra na #2 (é de 22/jul). Migra inteiro para a edição de julho (Cemitério + "Gus lê o bus" de lá).
- **Cortes:** o Gus 3D é o Pôster; o porquê técnico é a Programação; o arco é a Reportagem.
- **Fonte:** `historia-real-dos-pivos`, `cronologia-real-datada`, ADR-002.

### Reportagem de capa ✅ (2026-07-23, re-escopado 2026-07-24)

- **Angle statement:** sobre a era em que o jogo começou a ser **construído** (a arquitetura, as engines, o 3D), pela lente do **ARCO na voz do Gus**, com **ironia dramática**: tudo está vivo e esperançoso, e o leitor sabe (pela #1) que vai morrer. Não é "construir e demolir" (a demolição é #3+); é "construir sob a sombra do que virá".
- **Arco/tese:** a construção com esperança. A tese do projeto (a IA é ferramenta; o criativo é do criador) aparece por implicação. A queda é sugerida, não narrada.
- **Concretude:** **híbrido**. Abertura pela sensação (como a #1); os nomes reais (GDScript, C#, Godot, o 3D) no corpo sem exigir TI.
- **Cortes:** a lápide do GDScript é do Cemitério; o porquê técnico é da Programação; o wireframe é o Pôster; **a demolição em si (3D/Godot/C# mortos) é de edições futuras** (regra de datas).
- **Voz:** Gus (o autor in-fiction), o personagem construindo o próprio mundo; o líder-criador nunca nomeado.
- **Fonte:** `historia-real-dos-pivos`, `cronologia-real-datada`, `a-voz-do-site`.

### Seção de Programação ✅ (2026-07-23, ajustado 2026-07-24)

- **Angle statement:** sobre a decisão de arquitetura de maio (ADR-002: largar GDScript por C# .NET 8 AOT), pela lente do **artigo de TI real** na voz digitada do `root@glyfesse` (CRT verde).
- **Espinha técnica:** ADR-002 (AOT). Ancorado 19/mai, datado-correto.
- **Subtópicos (shape do artigo, a afinar no rascunho):**
  1. o problema real: performance em máquina fraca (Steam Deck, GTX 1050, laptops de 2017+).
  2. as 4 opções na mesa (a tabela real do ADR: GDScript / GDExtension C++ / C# AOT / rewrite Unity).
  3. por que o AOT ganhou (compilação nativa em 100% do código, iteração ainda aceitável solo).
  4. o custo assumido: "one-way door massivo" (reverter = 2-4 semanas), aprovado em 8 batches (30 decisões).
  5. **o gancho final (FORESHADOW, não a história):** o root deixa no ar que essa "porta sem volta" talvez não fosse tão sem volta assim. ⚠️ A reversão completa (ADR-008, 22/jun) é da #3; aqui é só uma sombra, uma linha, não o relato.
- **Desculpa furada do root:** SIM, uma nova, no clima do número (o redator propõe 1-2 no rascunho; escolha no GATE-COPY). Precede a transição `//` e o CRT.
- **Estrutura canônica** (herdada da #1): intro acessível + desculpa furada -> `//Prezado leitor, daqui é parte técnica real` -> CRT fósforo verde digitando (`root@glyfesse>~$nano`) -> parte técnica com subtópicos -> `//by: root@glyfesse`.
- **Cortes:** a emoção é do Cemitério; o arco é da Reportagem; a reversão detalhada é da #3.
- **Fonte:** `docs/tech/adr/ADR-002-csharp-aot-over-gdscript.md` (real, lido). Sem spoiler (tech pura).

### Editorial (a Carta do Gus) ✅ (2026-07-24, ajustado)

- **Angle statement:** a porta de entrada do número, na voz do Gus, que faz a **ponte da #1** (retoma "o resto ainda está compilando...") e abre a **era da construção**, com um foreshadow leve de que parte disso não vai durar.
- **Abertura:** ponte da #1 -> tema, num golpe só.
- **Tom:** vira do luto pro seco (a assinatura do Gus).
- **Cortes:** NÃO conta o arco (é da Reportagem); NÃO explica o nome (já foi na #1); NÃO enterra ninguém (o Cemitério cuida do GDScript). É só o parágrafo-porta.
- **Estrutura:** `gus@glyfesse>` + 1-2 parágrafos curtos, papel com acento, tokens de código em ASCII. Benchmark: o Editorial da #1.
- **Fonte:** `edicao-1-editorial.md` (a última linha é o gancho), `a-voz-do-site`, `voz-prompt-shell`.

### A Entrevista (o Gus e o zumbi-ator) ✅ (2026-07-24)

- **Angle statement:** o Gus entrevista um zumbi (arquétipo genérico) que responde como **ator** falando da sua atuação no jogo (bastidores de mentira), pela lente da comédia de contraste, curta (4-6 trocas).
- **O personagem do zumbi (blend 1+2):** **method actor pretensioso E veterano cansado/sindicalizado** ao mesmo tempo. Trata a decomposição como sacrifício artístico sagrado E reclama de veterano de elenco (cachê, sem dublê, o figurino que é a própria carne). O contraste interno é a piada.
- **O eixo do humor (blend 1+2):** **as condições de gravação** (o pântano, o figurino que apodrece, sem dublê) **E a carreira de vilão descartável** (morre em 2 golpes, sem falas, o protagonista leva o crédito).
- **Cortes:** o zumbi é ARQUÉTIPO, nunca um inimigo específico (spoiler-safe); o eixo meta/build-in-public ficou de fora; comédia pura, não lore.
- **Voz:** `gus@glyfesse>` pergunta; o zumbi responde com prefixo próprio (a definir no rascunho). Papel com acento.
- **Nota de data:** atemporal (não depende de marco), então cabe em qualquer edição.

## Estado das lentes e rascunhos

Todas as caras da #2 têm lente aprovada: **Reportagem, Programação, Editorial, Entrevista** + o **Cemitério** (agora leve) e o **Pôster**. "Gus lê o bus" saiu (anacrônico).

**Rascunhos (S2) e GATE-CONTEUDO (S3):**

| Seção | Rascunho | GATE-CONTEUDO | Arquivo |
|---|---|---|---|
| Reportagem de capa | ✅ v1 (`narrative-writer`) | ✅ **aprovado 2026-07-24** | `docs/content/edicao-2-reportagem.md` |
| Seção de Programação | ✅ v1 (`technical-writer`) | ✅ **aprovado 2026-07-24** (desculpa "open source" escolhida; linha EN traduzida) | `docs/content/edicao-2-programacao.md` |
| Editorial | ✅ v1 (`narrative-writer`) | ✅ **aprovado 2026-07-24** (idioma corrigido: nomeia C#, deixa clara a troca) | `docs/content/edicao-2-editorial.md` |
| A Entrevista (zumbi) | ✅ v1 (2 personas: Gus + Zumbi, improviso mediado) | ✅ **aprovado 2026-07-24** (pontuação: `?`/`!`/reticências; remate "ATOR!") | `docs/content/edicao-2-entrevista.md` |
| Cemitério (1 lápide) | ✅ v1 (`narrative-writer`) | pendente | `docs/content/edicao-2-cemiterio.md` |

Falta, depois dos rascunhos: S4 copyedit (revisor-textual), S6 GATE-COPY, S7-S9 arte/render/GATE-RENDER.
