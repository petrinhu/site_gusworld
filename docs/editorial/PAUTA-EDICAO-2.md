# Pauta da Edição #2 da Glyfesse (mapa de edição)

> Artefato de saída do estágio **E1** do `PIPELINE-EDICAO`. **GATE-PAUTA: ✅ APROVADO pelo editor-geral em 2026-07-23.**
> Managing editor: `product-manager`. Data da montagem: 2026-07-23.

## Decisões do editor-geral no GATE-PAUTA (2026-07-23)

1. **Tema e as 3 caras: aprovados.** Reportagem (o arco), Cemitério (as lápides) e Programação (o porquê técnico), cada uma com lente distinta da mesma era.
2. **Pôster central: o Gus 3D.** O wireframe do modelo abandonado (quase 1 milhão de faces para virar pixel de 48px) é o pôster da #2. Vira seção CHEIA.
3. **A Entrevista: virada in-fiction (não é o líder).** O Gus entrevista **um zumbi da selva/pântano**, e o zumbi responde **como um ator** falando da sua atuação no jogo (formato "bastidores/making-of de mentira"). Exemplo do líder, verbatim: *Gus> "Como foi para você participar atuando nesse jogo? Caiu algum pedaço seu andando pelo pântano?"*. Comédia in-world. Vira seção CHEIA (uma 4ª cara, curta). ⚠️ Passa por `SPOILER-POLICY` (mantém o zumbi como arquétipo genérico; nada de revelar roster de inimigos, mecânica ou lore não lançada).

## O marco e a data-âncora

- **Marco:** a arquitetura, as primeiras engines e a tentativa 3D (o pivô Fase 1 -> Fase 2).
- **Data-âncora primária:** **19 de maio de 2026** (ADR-002, o pivô de GDScript para C# .NET 8 AOT: o primeiro grande commit de arquitetura).
- **Janela coberta:** 19 de maio a 4 de junho de 2026 (fecha em `assets(3d)`, os modelos 3D dos personagens).
- **Fonte:** `cronologia-real-datada` (Edição #2 = "Arquitetura + as primeiras engines + a tentativa 3D") + `git log` do jogo.

## O tema-guarda-chuva proposto

**"A era da construção que virou cemitério."** Na #1, o mundo foi *escrito* (a lore antes do código). Na #2, ele começou a ser *construído*, e quase tudo que se construiu nesse mês foi depois jogado fora: a stack trocou (GDScript -> C# -> C++), as primeiras engines (câmera, save, input, combate) foram portadas e o código original **apagado**, e a tentativa de fazer o jogo em 3D foi abandonada. É o `glyfe` do avesso: a #1 é o build começando; a #2 é a prova de que build também é o que a gente demole.

★ **Convergência de sorte:** o **obituário da foundation C#** e o **registro do board M0-M9** chegaram pelo bus esta semana. São o epílogo exato desta era: contam como o código de maio deixou de existir. A #2 conta a era; o bus conta o enterro.

## Mapa das 19 seções

| # | Seção | Estado na #2 | Assunto / lente | Data-âncora |
|---|---|---|---|---|
| 1 | Capa | **cheia** (montagem) | Manchete do marco: a era da construção-cemitério | 19/mai |
| 2 | Índice | **cheia** (montagem) | Fecha com os 3 links fixos (GusWorld, GlintFX, TODO.md do jogo) | - |
| 3 | Editorial (Carta do Gus) | **cheia** (curta) | A voz abre o número: "a gente construiu muita coisa pra jogar fora" | 19/mai |
| 4 | Reportagem de capa | **CHEIA** ★ (cara) | O ARCO da era: construiu-se muito, demoliu-se quase tudo. Por SENSAÇÃO, spoiler-safe | 19/mai -> 04/jun |
| 5 | A NOTA do jogo inacabado | **cheia** (curta) | A nota que sobe a cada edição; em maio ainda não havia o que jogar ("Jogabilidade: N/A") | 19/mai |
| 6 | Galeria de Bugs | vazio com graça | (sem bug de destaque de maio; entra a piada honesta) | - |
| 7 | Cemitério das Ideias Mortas | **CHEIA** ★★ (a estrela) | 3 lápides de stack: GDScript, a foundation C#, Godot. Deboche por cima, luto honesto por baixo (lente aprovada abaixo) | 19/mai -> 04/jun |
| 8 | Detonado (AGUARDE) | vazio com graça | evergreen | - |
| 9 | Errata + Cartas | vazio com graça | (sem cartas ainda; errata da #1 se houver) | - |
| 10 | Classificados in-world | vazio com graça | evergreen | - |
| 11 | HQ | vazio com graça | pool rotativo dos 3 | - |
| 12 | Próximos Lançamentos (tabela vazia) | vazio com graça | evergreen | - |
| 13 | Pôster central | **CHEIA** ★ | O wireframe do Gus 3D (quase 1 milhão de faces para virar pixel de 48px) como pôster | 04/jun |
| 14 | Brinde | vazio com graça | evergreen | - |
| 15 | Cupom recortável | **cheia** (recorrente) | O cupom segue; a apuração da #1 é citada aqui (a cadência do voto) | - |
| 16 | A Entrevista | **CHEIA** ★ (cara curta) | In-fiction: o Gus entrevista um zumbi da selva/pântano, que responde como ATOR (bastidores de mentira). Comédia | - (atemporal) |
| 17 | Seção de Programação | **CHEIA** ★ (cara) | O PORQUÊ técnico: ADR-002, o raciocínio do AOT, por que C# e depois por que C++ | 19/mai |
| 18 | O Gus lê o bus | **cheia** (recorrente) | LOCK: o obituário completo da foundation C# (com o erro do repo apagado sem cópia) + a reação do Gus | 22/jul (bus) |
| 19 | Expediente | **cheia** (data-driven) | Créditos, licença. O nome só se explicou na #1 | - |

## As "caras" da #2 (onde há escrita nova de verdade)

1. **Reportagem de capa** (o arco da era).
2. **Cemitério das Ideias Mortas** (a estrela do número).
3. **Seção de Programação** (o eixo expert).
4. **A Entrevista** (in-fiction: o Gus e o zumbi-ator) - curta.
5. **Editorial** e **Gus lê o bus** (curtas).

Mais o **Pôster central** (o Gus 3D), que é arte/layout, não escrita. Todo o resto é vazio-com-graça ou data-driven/recorrente.

## Lentes aprovadas (S1 GATE-LENTE)

### Cemitério das Ideias Mortas ✅ (2026-07-23)

- **Angle statement:** sobre os três mortos de stack de maio-junho (GDScript, a foundation C#, Godot), pela lente de **lápides com epitáfios na voz do Gus** (deboche por cima, luto honesto por baixo; o luto real concentrado na lápide do C#).
- **Tom:** deboche + luto honesto (a assinatura do site: piada primeiro, verdade embaixo).
- **As 3 lápides:** GDScript (a primeira língua, trocada em 19/mai por C#/ADR-002), a foundation C# (save/i18n/progressão/templates/combate, portada e apagada), Godot (a engine, decomissionada).
- **Cortes:**
  - o **Gus 3D** NÃO é lápide aqui: fica inteiro no Pôster central (seção 13).
  - o **obituário completo** (o erro do repo apagado sem cópia) NÃO é aqui: a lápide do C# é um epitáfio curto; o texto integral vive no "Gus lê o bus" (seção 18).
  - o **porquê técnico** de cada pivô vai para a Programação (seção 17).
  - o **arco da era** vai para a Reportagem (seção 4).
- **Datas (epitáfios):** cada lápide carimba nascimento/morte com data real de commit. GDScript: †19/mai. Foundation C#: n.mai / portada jun-jul / †apagada. Godot: †decomissionado.
- **Fonte:** `historia-real-dos-pivos`, `cronologia-real-datada`, o obituário e o board M0-M9 (bus).

### Reportagem de capa ✅ (2026-07-23)

- **Angle statement:** sobre a era em que o jogo começou a ser construído e quase tudo foi demolido (engines, stack, o 3D), pela lente do **ARCO na voz do Gus**, com a tese **"construir é também demolir"** (cada coisa jogada fora foi uma decisão, não um fracasso).
- **Arco/tese:** construir é demolir. O leitor sente respeito por quem mata o próprio trabalho para seguir. Carrega a tese do projeto (a IA é ferramenta; o criativo é do criador), por implicação, nunca explicada.
- **Concretude:** **híbrido**. Abertura pega o leigo pela SENSAÇÃO (como a #1); os nomes reais (GDScript, C#, Godot, o 3D) aparecem no corpo sem exigir TI. Serve leigo + expert.
- **Cortes:**
  - as **lápides itemizadas** são do Cemitério (seção 7): a Reportagem faz o movimento inteiro, não as pedras uma a uma.
  - o **porquê técnico** frio vai para a Programação (seção 17).
  - o **wireframe** do Gus 3D é o Pôster (seção 13).
- **Voz:** Gus (o autor in-fiction). A demolição é a dele, do personagem construindo o próprio mundo/jogo; o líder-criador nunca é nomeado (consistente com a #1).
- **Nota de diferença da #1:** o assunto é tech real (não lore), então pode nomear aberto sem spoiler; a abstração poética da #1 era forçada pela spoiler-safety, que aqui não se aplica.
- **Fonte:** `historia-real-dos-pivos`, `cronologia-real-datada`, `a-voz-do-site`.

### Seção de Programação ✅ (2026-07-23)

- **Angle statement:** sobre a decisão de arquitetura de maio (ADR-002: largar GDScript por C# .NET 8 AOT), pela lente do **artigo de TI real** na voz digitada do `root@glyfesse` (CRT verde), com o **epílogo honesto** de que a "porta sem volta" foi ela mesma revertida um mês depois.
- **Espinha técnica:** ADR-002 (AOT) + o epílogo da reversão.
- **Subtópicos propostos (shape do artigo, a afinar no rascunho):**
  1. o problema real: performance em máquina fraca (Steam Deck, GTX 1050, laptops de 2017+).
  2. as 4 opções na mesa (a tabela real do ADR: GDScript / GDExtension C++ / C# AOT / rewrite Unity).
  3. por que o AOT ganhou (compilação nativa em 100% do código, não só hot paths; iteração ainda aceitável solo).
  4. o custo assumido: "one-way door massivo" (reverter = 2-4 semanas), aprovado em 8 batches de AskUserQuestion (30 decisões).
  5. o epílogo honesto: e mesmo assim foi revertido (ADR-008, C++/SDL3, 22/jun). Até a decisão jurada irreversível cede quando o limite real (execução solo) aparece.
- **Desculpa furada do root:** SIM, uma nova, no tema-demolição do número (o redator propõe 1-2 no rascunho para o líder escolher no GATE-COPY). Precede a transição `//` e o CRT.
- **Estrutura canônica da seção** (herdada da #1): intro acessível + desculpa furada do root -> transição `//Prezado leitor, daqui é parte técnica real` -> CRT fósforo verde digitando (`root@glyfesse>~$nano`) -> parte técnica pesada com subtópicos -> `//by: root@glyfesse`.
- **Cortes:** a emoção da perda é do Cemitério; o arco é da Reportagem. Aqui é o WHY frio.
- **Fonte:** `docs/tech/adr/ADR-002-csharp-aot-over-gdscript.md` (real, lido) + ADR-008 + `cronologia-real-datada`. Sem spoiler (tech pura).

## Nota do managing editor (risco a decidir na lente)

**Três seções olham para a mesma era** (reportagem, cemitério, programação). Para não repetir, a lente proposta separa os papéis, e isso se afina no GATE-LENTE de cada uma:

- **Reportagem** = o ARCO por sensação (construiu-se muito, demoliu-se quase tudo), sem itemizar.
- **Cemitério** = as LÁPIDES itemizadas, pela emoção da perda (aqui mora o obituário e o Gus 3D).
- **Programação** = o PORQUÊ técnico e frio (as decisões de arquitetura como um artigo de TI real).

Mesma era, três lentes distintas. Se ao líder isso soar como excesso do mesmo tema, o ajuste natural é enxugar uma das três (a candidata a corte seria a reportagem, deixando o cemitério carregar a emoção e a programação carregar o técnico).
