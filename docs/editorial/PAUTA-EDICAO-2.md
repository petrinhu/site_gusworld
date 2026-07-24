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
| 7 | Cemitério das Ideias Mortas | **CHEIA** ★★ (a estrela) | As lápides: GDScript, a foundation C# apagada, o Gus 3D. A SENSAÇÃO da perda | 19/mai -> 04/jun |
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
| 18 | O Gus lê o bus | **cheia** (recorrente) | Um trecho real do bus + a reação do Gus. Candidato: o obituário da foundation C# | 22/jul (bus) |
| 19 | Expediente | **cheia** (data-driven) | Créditos, licença. O nome só se explicou na #1 | - |

## As "caras" da #2 (onde há escrita nova de verdade)

1. **Reportagem de capa** (o arco da era).
2. **Cemitério das Ideias Mortas** (a estrela do número).
3. **Seção de Programação** (o eixo expert).
4. **A Entrevista** (in-fiction: o Gus e o zumbi-ator) - curta.
5. **Editorial** e **Gus lê o bus** (curtas).

Mais o **Pôster central** (o Gus 3D), que é arte/layout, não escrita. Todo o resto é vazio-com-graça ou data-driven/recorrente.

## Nota do managing editor (risco a decidir na lente)

**Três seções olham para a mesma era** (reportagem, cemitério, programação). Para não repetir, a lente proposta separa os papéis, e isso se afina no GATE-LENTE de cada uma:

- **Reportagem** = o ARCO por sensação (construiu-se muito, demoliu-se quase tudo), sem itemizar.
- **Cemitério** = as LÁPIDES itemizadas, pela emoção da perda (aqui mora o obituário e o Gus 3D).
- **Programação** = o PORQUÊ técnico e frio (as decisões de arquitetura como um artigo de TI real).

Mesma era, três lentes distintas. Se ao líder isso soar como excesso do mesmo tema, o ajuste natural é enxugar uma das três (a candidata a corte seria a reportagem, deixando o cemitério carregar a emoção e a programação carregar o técnico).
