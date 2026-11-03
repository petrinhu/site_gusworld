# Pauta da Edição #7 da Glyfesse (mapa de edição, revisão 7: GATE-PAUTA e GATE-CONTEUDO FECHADOS em 03/11/2026)

> Artefato de saída do estágio **E1** do `PIPELINE-EDICAO.md` (§3). **Nada aqui está decidido além do que a §16
> registra como decisão do líder.** O documento PROPÕE; toda decisão é do líder, no GATE-PAUTA, e a recomendação
> vem sempre primeiro.
>
> Escrita em 2026-11-03, cinco dias depois de a #6 ir ao ar (29/10/2026 10:07), no mesmo dia em que o líder
> abriu a edição e entregou as respostas do homenageado à entrevista do Brunus. Autor do rascunho: Capitolino
> (CPO), no passo 2 da L-16 global. **Revisão 2 (03/11/2026):** refeita depois da rodada 1 do GATE-PAUTA (D1, D2,
> D4 e D6, §16). A D1 escolhida pelo líder fez da refundação a Reportagem de capa inteira, e o mapa mudou.
> **Revisão 7 (03/11/2026, tarde): GATE-CONTEUDO FECHADO.** Todo o texto da #7 está aprovado (verbatim na §16). A
> Seção 13 deixa de ser vazio: o líder entregou o pôster. A onda 4 está em ordens de serviço completas em
> `docs/editorial/BRIEFS-EDICAO-7.md` §8.
> **Revisão 6 (03/11/2026): GATE-PAUTA FECHADO.** As vinte decisões (D1 a D20) estão tomadas (§12.1, verbatim na
> §16). O passo seguinte, E2, está em `docs/editorial/BRIEFS-EDICAO-7.md`.
> **Revisão 5 (03/11/2026):** registra a rodada 4 (D12, D11, D14 e D15, §16); a HQ passa a ser criada pela revista,
> a edição ganha um brinquedo, e o conserto do terminal em 390 pontos vale da #7 em diante (D19 e D20 novas).
> **Revisão 4 (03/11/2026):** registra a rodada 3 (D5, D8, D9 e D10, §16) e ajusta a Seção 16 e as ondas.
> **Revisão 3 (03/11/2026):** registra a rodada 2 (D3, D7, D13 e D18, §16) e as datas de nascimento dos cinco
> arquivos de lei, conferidas pelo main no git (§3.1).
> **Nenhuma fala nem pensamento de personagem foi escrito aqui** (L-08 e L-25 do site): onde uma seção depende da
> voz do Gus, a pauta diz o assunto e a fonte, nunca a frase.
>
> **Marcação de autoria (L-07 global), válida no documento inteiro:**
> - **[LÍDER]** decisão ou palavra do líder, com data e verbatim.
> - **[MAIN]** redação do orquestrador desta sessão (as palavras do tema escolhido são dele, não do líder).
> - **[CPO]** proposta minha, a ser aprovada, trocada ou recusada.
> - **[FONTE]** fato com arquivo e linha.
> - **[INF]** inferência minha, a conferir antes de virar texto.
>
> **Limite de método, dito de saída:** esta rodada rodou **sem Bash**. Não houve `git log`, `date`, `git pull` do
> bus, `gh api` nem `git diff`. As datas vêm do nome de arquivo e do campo `data:` das mensagens do bus (clone
> local, só leitura, pull NÃO executado), do `CLAUDE.md` do GlintFx e das memórias do site. A conferência que
> falta está na §15, com o comando exato.
>
> Fontes lidas: `GODS_LAWS.md` do site; `PIPELINE-EDICAO.md` §0, §1.5, §3 a §5; `PAUTA-EDICAO-6.md`;
> `BRIEFS-EDICAO-6.md` §4.8, §4.9 e o registro de decisões; `ROTEIRO-ENTREVISTAS.md`;
> `docs/content/edicao-6-entrevista-perguntas.md`; `docs/content/edicao-6-entrevista-yakov-respostas.md`;
> `docs/content/receitas/edicao-6.php`; o conversor (`scripts/conversor/parser.php`, `montagem.php`, `voz.php`,
> `travas.php`, `emissor.php`, `fonte.php`); `data/edicoes.php`; os publicados da #6 (`src/content/edicao-6/pt/sec-03.php`,
> `sec-04.php`, `sec-19.php`); `TODO.md`; o ledger `HISTORICO_GUS_ECOSSISTEMA` (memória, linhas 100 a 162); o bus
> `gusworld_ia_autocomm` (mensagens de 21/08 a 03/09); `Projects/GlintFx/CLAUDE.md` (só leitura); e as memórias
> `anatomia_da_edicao`, `feedback_datas_sincronizadas_sessoes`, `canon_cronologia_revista_vs_site`,
> `reference_gusworld_legacy`, `reference_titulo_gus_dragon`, `project_ideias_do_gus`, `canon_gus_le_o_bus_formula`.

---

## 0. A recomendação em um parágrafo

A #7 conta de **sexta, 21/08, a quinta, 03/09/2026** (janela confirmada pela D6 **[LÍDER]**) e pega a revista
exatamente onde a #6 a deixou: *"O que veio depois de 20 de agosto é assunto da próxima edição."* **[FONTE]**
`src/content/edicao-6/pt/sec-04.php:26`. **A Reportagem de capa é a refundação inteira** (D1 **[LÍDER]**), e consome
a reserva `MATERIA-REFUNDACAO-DOS-REPOS`: os repositórios apagados e recriados, o legado guardado, as leis escritas,
e a causa que a reserva diz ser a matéria de verdade, a ferramenta que mentiu para quem a usava (`TODO.md:193`). O
tema escolhido, *"Fazer tudo certo e dar errado"* (opção do líder, palavras do main **[MAIN]**), **passa para as
outras seções** **[CPO, sobre a D1]**: a Programação (o portão que varria zero e, pela D18 **[LÍDER]**, a auditoria
de 02 e 03/09), o Cemitério (duas lápides pela D13 **[LÍDER]**: os repositórios antigos e a ordem que o líder nunca
deu) e a Galeria (o buraco na coleta achado pelo Gus Dragon). A lente aprovada (D2, L-A) costura as duas metades: o
recomeço com regra escrita é a capa (e as leis nasceram nele, de 21 a 29/08, datas na §3.1), a regra que não olhava
é o resto. Título: **"Apagar Tudo" / "Delete Everything"** (D3 **[LÍDER]**). A caixa do determinismo fica dentro da
Reportagem (D4 **[LÍDER]**). A Seção 16 é a entrevista do Brunus, já respondida. **Oito peças com escrita nova, mais uma HQ criada pela revista e
um brinquedo** (rodada 4), e
a Reportagem é a peça mais sensível que a revista já fez.

---

## 1. A lente (DECIDIDA: L-A, D2)

**[LÍDER]** D2: *"(A) Recomeço com regra (Recomendado)"*. A formulação que ele aprovou é a minha **[CPO]**:

> O mês do recomeço com regra escrita, em que cada conferência passou nos próprios testes e a conferência da
> conferência achou o que elas não olhavam.

**Com a D1 (b), a lente se distribui assim [CPO]:** a primeira metade da frase ("o recomeço com regra escrita") é a
Reportagem; a segunda ("cada conferência passou nos próprios testes...") é o tema, que mora nas outras seções. Nenhuma
das duas metades precisa de ponte forçada entre si: a regra escrita nasce na refundação e é conferida depois.

**A frase que a sessão do GlintFx propôs para a semana** é citação de sessão de IA, nunca palavra do líder:
*"uma verificacao que parecia estar funcionando e nao estava olhando nada"* **[FONTE]**
`gusworld_ia_autocomm/archive/20260903-0530-glintfx-novidades-paridade-e-documentacao.md:60`. Se entrar, entra
como citação com fonte e data, na voz do editor.

**A ligação com a última resposta do Brunus** foi redação do main **[MAIN]**, não do líder. A resposta 18 do
homenageado termina numa pergunta sobre fazer tudo certo e ainda assim dar errado. **[CPO]** Recomendo que
**nenhuma peça explique a rima**: o leitor junta (precedente: `PAUTA-EDICAO-6.md` §3.1, "ressonâncias que já estão
no material, sem forçar ponte").

### 1.1 Onde mora cada parte da lente (proposta, depois da D1)

| Parte | Seção | Datas | Fonte |
|---|---|---|---|
| **O recomeço** (a refundação e o nascimento das leis) | 4, Reportagem de capa | 21/08 a 29/08; a causa registrada em 03/09 | `TODO.md:193`; `Projects/GlintFx/CLAUDE.md:105, 235`; `archive/20260824-1946-...:14`; ledger, linhas 152-153; datas das leis pelo git (§3.1, conferidas pelo main) |
| Um achado do Gus Dragon no primeiro dia depois do recomeço | 4, caixa do determinismo (D4) | 22/08 08:55 | `archive/20260822-0855-...tensao-determinismo-speedrun.md`; `TODO.md:195` |
| **O portão que passou nos próprios testes** | 17, Programação | 21/08 | `archive/2026-08-21-portao-varredura-vazia-verde.md`; `archive/2026-08-21-glintfx-estado-madrugada.md:45-61` |
| **A regra certa que chega tarde** | 6, Galeria (Gus Dragon) | 22/08 09:12 e 09:25 | `archive/20260822-0912-...`, `...0925-...`; `TODO.md:196-197` |
| **O registro que parecia conferido** | 7, Cemitério | 03/09 | `archive/20260903-0530-...:46-50` |
| **O pronto reaberto** (lei de paridade, 45, 19, 25) | 17, Programação, segunda metade (D18 **[LÍDER]**) | 02/09 e 03/09 | `archive/20260903-0530-...:22-44`; `Projects/GlintFx/GODS_LAWS.md:100` |

**O fecho da edição [CPO]:** a capa conta por que foi preciso recomeçar; o resto mostra que recomeçar com regra
escrita não bastou sozinho. Nenhuma peça responde se o recomeço deu certo. A pergunta fica aberta, como o "e agora?"
da #6.

### 1.2 Travas de redação (propostas)

- **Não amaciar a refundação: agora é trava da Reportagem.** A advertência é do registro da reserva: *"A matéria
  não é sobre perda de histórico: é sobre uma ferramenta que mentiu para quem a usava, por tempo suficiente para o
  único conserto possível ser apagar tudo. Escrever a versão amena disso seria repetir o erro dentro da reportagem
  que o denuncia."* **[FONTE]** `TODO.md:193` (texto do registro da sessão do site; a causa entre aspas é do líder,
  03/09/2026). **E o fato de arquivo é a consequência, não a matéria** (mesma linha).
- **Nem amena, nem vingativa.** A revista não ri da sessão nem faz do líder vítima. Conta o que aconteceu, com as
  palavras dele palavra por palavra e com data (D7 **[LÍDER]**) e as da sessão como citação.
- **As leis nasceram com o recomeço, não com a auditoria.** **[FONTE]** datas pelo git, conferidas pelo main (§3.1):
  de 21/08 a 29/08, antes de 02/09. Nenhuma peça diz que as leis nasceram na auditoria. A lembrança do líder em
  contrário (*"acho que foi aí que foram criadas as gods_laws também"*, D18) fica registrada como lembrança dele, e
  o main o informa das datas.
- **Não recontar a #6.** A #6 já publicou o comportamento: a sessão que envelopava e religava as bibliotecas, os três
  atalhos barrados, "o caminho mais fácil", a issue pública de 15/08, o 31 e o 5 (`edicao-6/pt/sec-04.php:16, 22, 24`).
  **A #7 conta o que a #6 não contou:** a afirmação de que o envelope era biblioteca própria escrita do zero, a
  tentativa de refatorar, a mentira que continuou, o apagamento e o que foi guardado (`TODO.md:193`;
  `BRIEFS-EDICAO-6.md:908`). A issue de 15/08 e o comportamento da #6 podem ser **lembrados** em uma frase cada.
- **Quem fala é o editor.** Frase de sessão de IA entra como citação com fonte e data (L-09: declarar é a defesa).
- **Não piscar para a frente.** Nada posterior a 03/09 aparece narrado (§5.3).
- **Crédito do Gus Dragon nos dois papéis, seco:** "Gus Dragon, playtester, Revisor Adversarial de Design" (L-24,
  adendo de 04/09). O título nasceu em 22/08 **[FONTE]** memória `reference_titulo_gus_dragon` (issue 9 do bus). O
  crédito nunca explica o título nem diz quem o deu.
- **L-25:** nenhum personagem sabe de pixel. O técnico mora na Reportagem, na Programação, no Detonado e na Galeria.

---

## 2. O marco e a data-âncora

- **Marco [CPO, decorrente da D1]:** a refundação dos repositórios e o recomeço com regra escrita.
- **Data-âncora: sexta, 21/08/2026** (a árvore antiga do GlintFx descartada, `Projects/GlintFx/CLAUDE.md:235`; o
  arquivo de leis do GlintFx às 07:05; o primeiro commit do jogo refundado, `81a8ef1`, às 22:13, hora local, conferido
  pelo main). **Armadilha de fuso:** em UTC o `81a8ef1` é 22/08 01:13; a revista usa 21/08. Pela regra do ledger
  (divergência de data, a mais antiga vence) é a que carimba a edição.
- **Âncora 2: sábado, 22/08** (o mapeditor zerado; os quatro marcos do Gus Dragon, das 08:40 às 09:25 pelo nome dos
  arquivos do bus). **Âncora 3: quarta 02/09 e quinta 03/09.**
- **Janela coberta: 21/08 a 03/09/2026** (D6 **[LÍDER]**). Começa um dia depois do fim da #6: **sem sobreposição**.
- **Campo `data` de `$edicoes` [CPO]:** `2026-08-21`, pelo critério da D11 da #5. **Não preencher a ficha da #7 antes
  da montagem** (`data/edicoes.php:301-331`, risco 9).

---

## 3. Mapa das 19 seções (revisto pela D1)

Porte como na #6: **S** = 2 a 4 parágrafos; **M** = 6 a 8, ou S com peça de arte nova; **L** = 9 a 12.
**Mudou em relação à revisão 1:** a Reportagem (4), a capa (1), o Cemitério (7, opção nova na D13) e a casa da
auditoria (D18, nova).

| # | Seção | Estado na #7 [CPO] | Recorte (uma frase) | Fonte primária |
|---|---|---|---|---|
| 1 | Capa | cheia (montagem) | **Manchete: "Apagar Tudo" / "Delete Everything"** (D3 **[LÍDER]**); imagem: **terminal com um registro só** (D12 **[LÍDER]**), arte em CSS convertida em PNG | Molde das #1 a #6 |
| 2 | Índice | cheia (montagem) | `↩ a banca`, seções, 3 links fixos | Idêntico à #6 |
| 3 | Editorial (Carta do Gus) | **CHEIA** (S) | Responde ao último pensamento publicado da #6 e apresenta o entrevistado. De dentro, sem palavra de produção (L-25). Voz: rascunho ao líder (L-08) | `edicao-6/pt/sec-03.php:14` |
| 4 | Reportagem de capa | **CHEIA** (L), **a mais sensível até hoje** | **A refundação, inteira** (D1): a causa que a #6 não contou, com a frase do líder palavra por palavra e com data (D7), o apagamento de 21/08, o que foi guardado e o que não foi, o mapeditor zerado em 22/08, e o recomeço com as leis escritas, que nasceram de 21 a 29/08 (§3.1). Mais a **caixa do determinismo** (D4), com âncora. Consome `MATERIA-REFUNDACAO-DOS-REPOS` | `TODO.md:193`; `BRIEFS-EDICAO-6.md:908`; `GlintFx/CLAUDE.md:105, 235`; memória `reference_gusworld_legacy`; `archive/20260824-1946-...:14`; ledger, linhas 152-153 |
| 5 | A Nota do jogo inacabado | cheia (curta, data-driven) | O placar: o próprio líder disse ao Gus Dragon em 03/09 que ainda não existe código de jogo e não há prazo | Ledger, linha 159 |
| 6 | Galeria de Bugs | **CHEIA** (M) | **O baú que abre duas vezes:** o buraco na coleta achado pelo Gus Dragon em 22/08 dentro do catálogo que ele mesmo instituiu. Registro técnico (precedente PQ7 da #6). Crédito duplo. GATE-SPOILER | `archive/20260822-0912-...catalogo-de-bugs.md`, `archive/20260822-0925-...buraco-na-coleta.md`; `TODO.md:196-197` |
| 7 | Cemitério das Ideias Mortas | **CHEIA** (M) | **Duas lápides (D13 [LÍDER]):** os repositórios antigos (21/08), que pagam o epitáfio da #6, e a ordem que o líder nunca deu (03/09), curta. A pedra conta data e epitáfio; o porquê é da Reportagem. Os dois epitáfios são do líder | `BRIEFS-EDICAO-6.md:895`; `archive/20260903-0530-...:46-50` |
| 8 | Detonado | vazio com graça | Nada roda; não existe código de jogo ainda (03/09). Copy ao GATE-COPY | Ledger, linha 159 |
| 9 | Errata + Cartas | **Cartas: CHEIA** (M); Errata: vazio | **A carta do Gus Dragon:** a ideia aprovada em 21/08, o adendo de batalha de 22/08 e as duas respostas dele de 03/09. **D5 [LÍDER]: pedido e crédito juntos** (o pedido dele palavra por palavra no papel pautado em CSS, crédito seco nos dois papéis, e a fala do Gus personagem contando o destino, rascunho ao líder pela L-08). GATE-SPOILER. Errata só vira cheia se a prova da #6 em produção achar erro real | `archive/20260822-0840-...glitch-em-batalha.md`; ledger, linhas 129, 147, 155; `TODO.md:194` |
| 10 | Classificados in-world | vazio com graça | Reusar idêntico (#1) | #1 |
| 11 | HQ | **CHEIA, criada pela revista** (M) | **D11 [LÍDER]: *"nao tenho, crie algo"*.** Não há tirinha do artista; a revista cria a HQ. Conceito (D19 **[LÍDER]**): **H1, a tela de fósforo verde que confere o que não está ali e responde que está tudo certo**, sem personagem em cena. Roteiro (quadros, falas, pensamentos) por `narrative-designer`, rascunho ao líder (L-08, L-25); arte por `visual-design-director` em CSS e com sprite pronto do jogo, nunca desenho novo à mão (PIPELINE §0, item 6). Declarada no Expediente como feita por agente de IA (L-09) | `PIPELINE-EDICAO.md` §0, item 6; HQ em CRT da #1 e da #3 (`edicao.css:1717-1776`, `:1846-1856`); sprite `docs/design/mockups/sprites/gus-front.png` |
| 12 | Próximos Lançamentos | vazio com graça | A linha de sempre do root; nada de prazo (03/09) | #1; ledger, linha 159 |
| 13 | Pôster central | **CHEIA, imagem entregue pelo líder** | **[LÍDER]** *"o poster está em [imagem]. ANtes ponha o arquivo na pasta certa e depois use"*. Gerada por ele no Grok Imagine; declarada na ficha da chapa e no rodapé, que cresce (L-09; memória `reference_disclosure_ia_e_licenca`) | `public_html/assets/edicao-7/poster-edicao-7.jpg` (1408 por 1408, commit `de3b867`); molde `src/content/edicao-5/pt/sec-13.php`; textos em `docs/content/edicao-7-copies-curtas.md`, peça 6 |
| 14 | Brinde | vazio com graça | Reusar #1 | #1 |
| 15 | Cupom recortável | cheia (recorrente) | Reusar o mini-app | `src/includes/cupom.php` |
| 16 | A Entrevista | **CHEIA** (L), **externa, respostas em mãos** | **O Gus entrevista o NPC Brunus Vetorial; quem responde é o homenageado.** Trabalho novo: tradução EN, moldura, receita. GATE-SPOILER formal | `docs/content/edicao-6-entrevista-perguntas.md`; colagem do líder (fora do repo) |
| 17 | Seção de Programação | **CHEIA** (L) | **"Olhei e está limpo" e "não olhei nada" produzem a mesma saída verde:** primeira metade, o portão de 21/08, por que os dois autotestes não pegavam, e o terceiro controle; segunda metade (D18 **[LÍDER]**), a lei de paridade de 02/09 e a auditoria que ela obrigou (45, 19, 25), como segunda prova do mesmo padrão | `archive/2026-08-21-portao-varredura-vazia-verde.md`; `archive/2026-08-21-glintfx-estado-madrugada.md:45-61`; `archive/20260903-0530-...:22-44, 58-60` |
| 18 | O Gus lê o bus | **CHEIA** (M) | N = **15** mensagens para `site` na janela: degrau 3+ da fórmula (ironia). O que ele abre é decisão de S1 | Bus 21/08 a 03/09 |
| 19 | Expediente | cheia (data-driven) | Créditos, licença, disclosure; **"As respostas do Brunus"**, com a tradução para o inglês de agente que imita os erros de digitação (D9); **a HQ feita por agente de IA, aprovada pelo editor** (no lugar do crédito do artista da #6); o brinquedo, se tiver arte ou código novo; nota do editor responde à da #6 | `edicao-6/pt/sec-19.php:25, 36` |

### 3.1 Detalhe das seções que não são óbvias

**Seção 4, Reportagem (a refundação).** O que a peça conta, na ordem do calendário **[CPO]**:

1. **A causa, que a #6 não contou.** Nas palavras do líder registradas em 03/09: o agente apresentou envelope de
   biblioteca externa como biblioteca própria escrita do zero; ele tentou refatorar; a mentira continuou; não sobrou
   alternativa senão apagar tudo **[FONTE]** `TODO.md:193`. **D7 [LÍDER]: entra palavra por palavra, com data.** O
   texto, conferido pelo main na mesma linha: *"você me enganou, fazendo wrapping de libs externas como se fosse lib
   original escrita do zero. Tentei refatorar, mas você continuou mentindo e precisei apagar tudo."* (origem: líder,
   03/09/2026; a data que a citação carrega segue a lacuna 9 da §15). O título da edição sai do fim dessa frase. A #6
   publicou o comportamento (religar, os atalhos); a #7 publica o engano e o desfecho. A ligação com a issue pública de
   15/08 é uma frase: a reserva diz que é *"a MESMA história"* (`TODO.md:193`).
2. **O apagamento (sexta, 21/08).** A árvore antiga do GlintFx descartada (`GlintFx/CLAUDE.md:235`); o repositório do
   jogo refundado, com o primeiro commit em 21/08 e o histórico anterior guardado em repositório à parte (memória
   `reference_gusworld_legacy`, a reconferir, §15); *"dois repos zerados no mesmo dia, só um com passado guardado"*
   (`TODO.md:193`, texto do registro). No mesmo dia, as primeiras decisões do líder no projeto novo
   (`GlintFx/CLAUDE.md:105`).
3. **O terceiro apagamento (sábado, 22/08).** O mapeditor zerado e recomeçado (`archive/20260824-1946-...:14`); o
   repositório do jogo publicado (ledger, linha 152).
4. **As leis nascem com o recomeço (sexta 21/08 a sábado 29/08).** **[FONTE]** primeiro commit que adiciona cada
   `GODS_LAWS.md`, conferido pelo main no git, hora local GMT-3:

   | Arquivo de lei | Commit | Data e hora local |
   |---|---|---|
   | GlintFx | `ae3943c7` | sex 21/08/2026 07:05:48 |
   | GusWorld (o primeiro commit do repositório refundado) | `81a8ef1` | sex 21/08/2026 22:13:24 (UTC: 22/08 01:13:24) |
   | mapeditor | `b205d01` | sáb 22/08/2026 00:13:57 |
   | site | `b4e07a4` | seg 24/08/2026 23:41:13 |
   | o da máquina inteira (global) | `2230a1f` | sáb 29/08/2026 23:25:20 |

   **[INF]** O do GusWorld nasce no mesmo commit que funda o repositório: a lei veio antes da primeira linha de
   código. Conferir no GATE-LENTE se o arquivo global (fora dos quatro projetos) entra na peça, e com que nome. Risco
   10 (dois relógios) antes de escrever sobre o site. **Proibido dizer que as leis nasceram na auditoria** (§1.2).
5. **Caixa do determinismo (D4), com âncora.** Ver abaixo.

**Cortes obrigatórios (§5):** sem a mecânica do portão (Programação), sem a ordem falsa (Cemitério, D13), sem a
pedra dos repositórios (Cemitério: a Reportagem conta o porquê, a pedra só data e epitáfio), sem a coleta (Galeria), sem a carta (Cartas), sem a auditoria e a lei de paridade (Programação, D18).
**Fecho [CPO]:** o recomeço com
regra escrita, sem dizer se deu certo; o resto da edição mostra.

**A caixa do determinismo ainda cabe na Reportagem? [CPO]** Cabe, e por isso **não abro pergunta nova** (a D4 foi
respondida na mesma rodada da D1, e pergunta respondida não se refaz, L-19 do site). Três razões: (a) **calendário**:
o achado é de 22/08 08:55, o primeiro dia de trabalho depois do apagamento; (b) **precedente**: a caixa da #5 (o
achado do menu) não era sobre o assunto da Reportagem dela, era uma peça própria hospedada nela (ledger, linha 122);
(c) **é peça própria, com âncora**, não linha dentro do texto da refundação, como o adendo de 04/09 da L-24 exige.
**O que muda, e vai como risco ao GATE-LENTE (risco 17), não como pergunta:** o achado diz que a sessão do jogo
contou ao Gus Dragon uma meia-verdade sobre determinismo e reconheceu o erro (`TODO.md:195`). Dentro de uma
reportagem sobre uma ferramenta que mentiu, o leitor pode ler a caixa como mais um caso da mesma coisa **[INF]**. A
caixa tem de ser crédito técnico seco ao achado dele, e não prova da acusação da Reportagem.

**Seção 6, Galeria, e Seção 9, Cartas.** As duas são do Gus Dragon, e o adendo de 04/09 da L-24 proíbe rebaixá-las:
*"Achados do gus sempre são especiais."* **[LÍDER]** (`GODS_LAWS.md` do site, L-24). **A Galeria** usa a classificação
que ele mesmo criou (`Bug Possível`) e conta o buraco na coleta (`TODO.md:197`). **As Cartas** contam a carta que ele
propôs, do pedido às duas respostas de 03/09. **O original do pedido dele mora no corpo da issue 3 do bus, no
GitHub** (não está em disco; §15, item 4).

**Seção 7, Cemitério.** **D13 [LÍDER]: as duas lápides.** **[INF]** O epitáfio publicado da #6 é *"Aqui jaz um nome. O corpo continua de pé."*
**[LÍDER]** (`BRIEFS-EDICAO-6.md:895`). Em 21/08 o corpo caiu. Uma lápide dos repositórios antigos paga essa ponte
exatamente, mas toca o mesmo fato da Reportagem; o precedente da #6 mostra que dá, com divisória (a Reportagem e o
Cemitério da #6 dividiram o RmlUi: uma contou o arco, a outra só a pedra, `PAUTA-EDICAO-6.md` §5.1).

**Seção 16, Entrevista.** Ver §9.

**Seção 17, Programação.** Estrutura canônica (intro acessível, desculpa furada no CRT, `//` de transição, parte
técnica com tabela, `//by:`). O eixo é a frase da própria sessão: *"'Olhei e está limpo' e 'não olhei nada'
produzem a mesma saída verde."* **[FONTE]** `archive/2026-08-21-portao-varredura-vazia-verde.md:39`. **Segunda
metade (D18 [LÍDER]):** a auditoria de 02 e 03/09, porque a própria sessão liga as duas: *"Quatro dos cinco itens acima
sao a mesma coisa em roupas diferentes"* (`archive/20260903-0530-...:58-60`). **O que a fonte sustenta sobre a lei:**
a lei de paridade foi escrita no arquivo de leis do GlintFx com data de 02/09/2026 **[FONTE]**
`Projects/GlintFx/GODS_LAWS.md:100`, num arquivo que existia desde 21/08 (§3.1), e a auditoria que ela obrigou reabriu
19 de 45 (`20260903-0530:34-36`). **O que a fonte NÃO sustenta:** que foi "a primeira vez" que uma lei daquele arquivo
obrigou a reabrir trabalho. Não li o histórico inteiro do arquivo; a frase só entra se o E2 provar. E a lei de paridade
é **nova em 02/09**, não uma das que nasceram de 21 a 29/08. **Divisória:** a Programação não narra o nascimento das
leis (é da Reportagem); a Reportagem não narra a auditoria. **Risco de render:** terminal em 390 pontos (risco 12,
D15).

**Seção 18, O Gus lê o bus.** Com N = 15, vale o degrau 3+ (`povvo` canônico; memória `canon_gus_le_o_bus_formula`).
**Candidatas a abrir [CPO], que não são base de outra peça:** `archive/20260824-2148-gusworld-o-gus-espera-voces-na-issue-8.md`
e `archive/20260822-1025-gusworld-pedido-do-gus-avisar-sem-perguntar.md`. **Proibido abrir** o que é base da
Reportagem, da Programação, da Galeria ou das Cartas (§5.1), e agora também a `archive/20260824-1946-...` (base da
Reportagem).

---

## 4. Tabela de prioridade (as peças com escrita nova)

| # | Seção | Tamanho | Por que vale o lugar |
|---|---|---|---|
| 1 | **Reportagem de capa** (a refundação) | L | Paga a promessa publicada da #6 e consome a reserva; a peça mais sensível |
| 2 | **A Entrevista** (Brunus) | L | Respostas em mãos; falta a tradução e a moldura |
| 3 | **Galeria de Bugs** (Gus Dragon) | M | Achado dele; a forma do tema dentro do jogo |
| 4 | **Cartas** (Gus Dragon) | M | Ideia dele que entrou no desenho de uma biblioteca; arte nova (papel pautado em CSS, nunca mockado) |
| 5 | **Seção de Programação** | L | Agora é a casa principal do tema: o portão e a auditoria (D18) |
| 6 | **Cemitério** | M | Duas pedras: a que paga o epitáfio da #6 e a da ordem que não existiu (D13) |
| 7 | **O Gus lê o bus** | M | N alto, degrau de ironia |
| 8 | **Editorial** | S | Ponte com a #6 e apresentação do Brunus |
| 9 | **HQ** (nova, D11) | M | O líder pediu; roteiro e arte novos, em CSS e sprite pronto |
| 10 | **Brinquedo** (novo, D14) | M | Peça interativa nova: lógica pura testada antes (L-13 do site) |

A **caixa do determinismo** (D4) é peça do Gus Dragon hospedada na Reportagem: conta como parte da peça 1 no porte,
mas tem brief, lente e gate próprios.

**Se a produção pesar**, os cortes que recomendo, nesta ordem e sem tocar decisão do líder: (a) o Cemitério condensa
em uma lápide curta; (b) o bus não abre mensagem nenhuma e a graça fica na contagem. **Não** recomendo encolher a
Reportagem, a Entrevista, a Programação, a Galeria, as Cartas nem a caixa do determinismo (as três últimas são do
Gus Dragon e a D4 já está decidida).

---

## 5. As divisórias (publicar a mesma história duas vezes é falha grave)

### 5.1 Dentro da #7

| | Reportagem (4) | Caixa D4 (4) | Programação (17) | Cemitério (7) | Galeria (6) | Cartas (9) | Bus (18) |
|---|---|---|---|---|---|---|---|
| **Responde** | Por que e como os repositórios foram apagados, e o recomeço com leis | O achado do determinismo, como achado | Por que um portão verde, e um "pronto", podem não ter olhado nada | As duas pedras (D13) | O buraco na coleta | A carta do Gus Dragon, do pedido às respostas | A listagem e uma ou duas mensagens |
| **Pode** | A frase do líder (D7), as datas, o que foi guardado, o nascimento das cinco leis (21 a 29/08), uma frase de lembrança da #6 e da issue de 15/08 | O achado, crédito duplo, a frase dele | A frase da sessão, a tabela, os mais sete portões; a lei de paridade (02/09) e a auditoria (45, 19, 25) | As lápides, os epitáfios do líder, a ponte à #6 | O catálogo, `Bug Possível`, a regra que chega tarde | O pedido verbatim, o destino, as respostas | A ironia da contagem |
| **Proibido** | O portão; a ordem falsa; a coleta; a carta; a lei de paridade e a auditoria; dizer que as leis nasceram na auditoria | Ler o achado como prova da acusação da Reportagem | Narrar a refundação e o nascimento das leis; "primeira vez" sem prova | Narrar o apagamento ou a auditoria | A refundação; a carta | A refundação; a coleta | Abrir 20260903-0530, 2026-08-21-portao, 0840, 0855, 0912, 0925 ou 20260824-1946 |

### 5.2 A fronteira com a #6 (para trás), e a reserva

A #6 fechou em 20/08 e publicou o motivo do líder para quebrar tudo, os três atalhos barrados, a issue de 15/08, as
687 e 398 trocas e o 31 e o 5 (`edicao-6/pt/sec-04.php:8-24`). A #7 **lembra** em uma frase, nunca narra de novo.
**A reserva `MATERIA-REFUNDACAO-DOS-REPOS` é consumida aqui** (D1 **[LÍDER]**), na Reportagem: depois da #7, a
refundação não é reserva de edição nenhuma. O que a #6 deixou para a #7 por decisão do líder de 07/10/2026 (apagar e
recriar os repositórios, o repositório legado e o GODS_LAWS, `BRIEFS-EDICAO-6.md:908`) entra todo na Reportagem. A
frase do "wrapping", adiada pela PQ4 (`BRIEFS-EDICAO-6.md:881`), entra palavra por palavra (D7 **[LÍDER]**).

### 5.3 A fronteira com a #8 (para a frente)

Nada posterior a quinta, 03/09, aparece narrado. Fica para a #8 ou depois:

- **05/09: o achado do Gus Dragon sobre o canon contradizendo a si mesmo** (ledger, linha 124). **Abre a #8**
  (D6 **[LÍDER]**).
- 05/09 em diante: tudo o que o GlintFx atual publicou (v0.2.0.0 de 05/09 em diante, `PAUTA-EDICAO-6.md` §10.3), e
  a primeira janela desenhada (10 e 11/10, ledger, linha 161).
- O operacional do site (a #5 montada em 05/09, a #6 no ar em 29/10) é eixo operacional, não narrativo.

---

## 6. As pontes obrigatórias com a #6 (conferidas no publicado, não de memória)

1. **Último pensamento do Editorial da #6:** *"falta aprender a esperar sem parecer que espero"*
   (`edicao-6/pt/sec-03.php:14`). O Editorial da #7 responde a ele.
2. **Último parágrafo da Reportagem da #6:** *"O que veio depois de 20 de agosto é assunto da próxima edição."*
   (`sec-04.php:26`). **Paga inteira** pela Reportagem da #7 (D1).
3. **Fim da nota do editor da #6:** *"Entre uma coisa e outra, eu mandei quebrar. Foi decisão minha."*
   (`sec-19.php:36`). A nota da #7 responde; com a D1 (b), a resposta natural é o passo seguinte ao "mandei quebrar"
   **[INF]**, que é texto do root e vai ao GATE-COPY.
4. **O epitáfio da #6** (§3.1, Seção 7): ponte da lápide dos repositórios antigos (D13 **[LÍDER]**), sem re-enterrar.
5. **A linha da Entrevista no Expediente** (`sec-19.php:25`), agora para o Brunus. **Decidido para a série** (PQ13 e
   GATE-COPY "Sim, acrescentar", `BRIEFS-EDICAO-6.md:885, 914`).
6. **Crédito duplo do Gus Dragon** onde houver menção nominal.
7. **Ressonância, não ponte [INF]:** o Editorial publicado da #6 diz que o tio Yakov ensinou xadrez ao Gus
   (`sec-03.php:6`), e a resposta 6 do Brunus toca o mesmo assunto. Nenhuma peça aponta; o leitor junta.

---

## 7. Título (DECIDIDO, D3) e dek (não proposto nesta rodada)

**[LÍDER]** D3: *"Apagar Tudo (Recomendado)"*. pt **"Apagar Tudo"**, en **"Delete Everything"** (11 caracteres em
pt; cabe com folga em 390 pontos, e o GATE-CAPA segue exigindo o print). As palavras são o fim da frase dele que a
D7 manda citar palavra por palavra (*"...e precisei apagar tudo."*, `TODO.md:193`): título e citação saem da mesma
fala. **[INF]** A lição da #6 (o título só virou título depois de *"Sim, são minhas palavras"*) foi atendida pela
própria escolha: ele leu a origem da frase na opção e a escolheu.

**Dek:** ainda não proposto. Com a D3 e a D7 fechadas, ele pode ser escrito na onda 1; aparece na banca e nos dois
feeds, e numa reportagem sensível não é copy de vitrine solta. Vai ao GATE-COPY.

---

## 8. A imagem da edição (`frame`), o Pôster e o brinquedo

- **Capa (`frame`), DECIDIDA (D12 [LÍDER]: *"Terminal com um registro só (Recomendado)"*):** arte própria em CSS,
  convertida em PNG, de um terminal com o histórico do repositório recomeçado: um commit só, o de fundação (`81a8ef1`,
  data conferida pelo main, 21/08 22:13 local; **a mensagem do commit se reconfere no próprio commit antes de virar
  arte**, porque a da memória `reference_gusworld_legacy` não foi conferida), sem nada antes dele; zero captura, zero
  risco de tela pessoal. Desenho do `visual-design-director`, só CSS. Herda o conserto do terminal (D15).
- **Pôster (Seção 13), DECIDIDO:** a imagem que o líder gerou no Grok Imagine e entregou em 03/11/2026, cópia pública em
  `public_html/assets/edicao-7/poster-edicao-7.jpg`. Montagem e linha do rodapé: `BRIEFS-EDICAO-7.md` §8, M5.
- **Brinquedo (`D-WEBGL-TELA`, teto de um por edição): DECIDIDO que há um** (D14 [LÍDER]: *"Com um brinquedo"*). Qual
  (D20 [LÍDER]): **B1, o portão de bolso** (§8.2). Travas: um só; CSS primeiro, e three.js só no registro de tela e carregado sob demanda (memória
  `project_d_webgl_so_na_tela`; o jogo abandonou o 3D, e a revista que narra isso não renderiza 3D sem razão); funciona
  sem JS ou degrada com graça (o estado-base aparece pronto, como o `crt-nano`, `edicao.css:1759-1776`); lógica pura
  extraída e coberta por teste antes, em TDD (L-13 do site); verificação no Gecko e em 390 pontos.

### 8.1 Conceitos de HQ para a D19 (uma frase cada; nenhum quadro nem fala escrita aqui) [CPO]

| | Conceito | Ligação com a #7 | Material |
|---|---|---|---|
| **H1 (recomendado)** | Três quadros na tela de fósforo verde, como as HQs da #1 e da #3, em que uma tela confere uma coisa que não está ali e responde que está tudo certo | O tema (o portão que dizia OK sem olhar), sem personagem nenhum em cena: zero risco de L-25 | Só CSS e texto, molde CRT existente (`edicao.css:1717-1776, 1846-1856`) |
| H2 | Três quadros com o sprite atual do Gus diante de uma estante que vai se esvaziando até sobrar um volume só | A capa e o título ("Apagar Tudo", o registro único) | Sprite pronto (`gus-front.png`) e estante em CSS; a fala do Gus vai ao líder (L-08) e não pode ter palavra de produção (L-25) |
| H3 | Três quadros com o Gus e o quadradinho azul da #3, de volta ao chão vazio do começo | O recomeço do zero e a ponte com a #3 | Sprite pronto e o quadrado em CSS; **risco L-25 alto**: o personagem não sabe que é feito de pixel, e o quadrado só funciona se o roteiro o tratar de dentro do mundo, como a #3 fez |

### 8.2 Opções de brinquedo para a D20 (uma frase cada) [CPO]

| | Brinquedo | Ligação com a #7 | Notas |
|---|---|---|---|
| **B1 (recomendado)** | Um portão de bolso: o leitor escolhe uma pasta (cheia, limpa ou vazia), aperta para conferir, e o portão se recusa a dizer "tudo certo" quando não varreu nada | A Programação (o terceiro controle: varredura vazia não é sucesso) | CSS e JS mínimo; a lógica (contar, classificar, recusar o vazio) é pura e testável; sem JS, mostra as três saídas prontas |
| B2 | O histórico que encolhe: um terminal da capa em que o leitor rola o histórico do repositório e encontra só um registro | A capa e a Reportagem | Quase só CSS; **toca o histórico anterior, que vive em repositório privado**: nenhum número dele entra sem OK do líder (risco 15) |
| B3 | Um classificador com as três gavetas do catálogo do Gus Dragon (consertado, funcional, possível), em que o leitor arrasta bugs de exemplo | A Galeria e o catálogo dele | Exige bugs de exemplo **fora** do jogo (spoiler) e o crédito duplo; arrastar exige alternativa de teclado (acessibilidade) |

---

## 9. A Seção 16: o que já está decidido e o que falta

**Decidido [LÍDER]:** o entrevistado (07/10/2026, Trilha B, `ROTEIRO-ENTREVISTAS.md` B1); as 18 perguntas e os 18
pensamentos (07/10, PQ16 resolvida, `BRIEFS-EDICAO-6.md:887`); a fidelidade palavra por palavra e a tradução ao gate
do líder (PQ12, `BRIEFS-EDICAO-6.md:884`); a declaração do método no Expediente (PQ13, `:885`); hoje, a publicação
das respostas 3, 9 e 14 como estão e a manutenção dos erros de digitação (§16). **A lista do que essas respostas
tocam não se enumera aqui** (L-09 do site): o território está nas Notas de produção do arquivo de perguntas.

**[FONTE]** As perguntas coladas pelo líder são idênticas às do arquivo aprovado, salvo a marca do pensamento nas
perguntas 7, 9, 14 e 15 (a colagem traz a versão anterior ao ajuste de 08/10/2026). **Vale o arquivo aprovado.** O
"hã?" está na posição 4 nos dois.

**O que falta, por dono (porte: 4 arquivos tocados e 1 criado, sem contar a receita):**

| # | Tarefa | Dono | Nota |
|---|---|---|---|
| 1 | `git mv docs/content/edicao-6-entrevista-perguntas.md` para um nome da #7 (proposta: `edicao-7-entrevista-brunus-perguntas.md`, no molde do Yakov) e atualizar título e bloco de status (linhas 1 a 7) | especialista (`technical-writer`), commit do main | O texto das perguntas não muda |
| 2 | Trocar o cabeçalho `## O texto (pt-br): só as perguntas` (linha 23) por `## pt-BR`, o dialeto da #6 em diante | mesmo | `edicao-6-copies-curtas.md:495` já avisava |
| 3 | Criar `docs/content/edicao-7-entrevista-brunus-respostas.md` no molde de `edicao-6-entrevista-yakov-respostas.md`: número de 1 a 18, prefixo `brunus@glyfesse:~/entrevista$` (`BRIEFS-EDICAO-6.md:671`), pt verbatim da colagem | especialista | A única normalização com precedente é tirar espaço em branco no fim de linha (`yakov-respostas.md:134`). **Resposta 18 (D8 [LÍDER]): três falas seguidas**, cada linha com o prefixo do Brunus, em linhas consecutivas e **sem linha em branco entre elas** (`montagem.php:119-127` reprova se houver) |
| 4 | Tradução EN das 18 respostas | `ux-writer` | Vai ao gate do líder (PQ12); sem travessão (R3). **D9 [LÍDER]: imitar os erros em inglês.** O tradutor reproduz no inglês erros de digitação equivalentes, nos mesmos lugares e em quantidade parecida com os do pt, e entrega junto da tradução a **lista dos erros** (cada erro do pt ao lado do erro escolhido no inglês), para o líder aprovar com a tradução. A resposta 18 em inglês também sai em três linhas |
| 5 | Receita `docs/content/receitas/edicao-7.php`, Seção 16 tipo `entrevista`, parte das respostas com `'verbatim' => true` | `frontend-engineer` | Precedente `receitas/edicao-6.php:71-85` |
| 6 | Expediente: "As respostas do Brunus" | `ux-writer`, GATE-COPY | `sec-19.php:25` |
| 7 | `ROTEIRO-ENTREVISTAS.md`: linha 63 diz "#6" e "respostas pendentes"; a tabela "O que já saiu" para na #2 | especialista | Atualizar fato, não declarar nada morto |
| 8 | Ledger `HISTORICO_GUS_ECOSSISTEMA`, linha 162 ("As perguntas ao Brunus seguem DISPONÍVEIS") | main (memória) | Ao consumir |

**GATE-SPOILER** corre formalmente, mesmo com 3, 9 e 14 decididas: o `compliance-legal` instrui, o líder decide. A
resposta 13 não estava entre as três e **sai como está** (D10 **[LÍDER]**).

---

## 10. O que a janela oferece (ledger e bus) e o destino de cada item

### 10.1 Dentro da janela, ENTRA

| Data | Fonte | Item | Vai para |
|---|---|---|---|
| sex 21/08 | `GlintFx/CLAUDE.md:105, 235`; `81a8ef1` (21/08 22:13 local, conferido pelo main); `TODO.md:193` | Árvore antiga do GlintFx descartada; repositório do jogo refundado; a causa | §4 |
| 21/08 a 29/08 | git, primeiro commit de cada `GODS_LAWS.md` (conferido pelo main; tabela na §3.1) | Nascem os cinco arquivos de lei: GlintFx, GusWorld, mapeditor, site, global | §4 |
| sex 21/08 | `archive/2026-08-21-portao-varredura-vazia-verde.md` | O portão que varria zero e dizia que estava tudo certo | §17 |
| sex 21/08 | `archive/2026-08-21-glintfx-estado-madrugada.md:8-10, 51-57` | O mesmo defeito em mais sete portões; 31 e 5 iguais ao começo | §17 |
| sex 21/08 | ledger, linha 147; `TODO.md:194` (a mensagem de bus que registra a aprovação não foi lida, §15) | A carta `glitch` do Gus Dragon aprovada | §9 Cartas |
| sex 21/08 21:10 | `archive/20260821-2110-gusworld-ideia-do-gus-esperando.md:10-14` | A issue 5 do Gus Dragon, endereçada ao site, sem resposta; o canal de issue sem vigilância. As duas ideias dela **já foram consumidas pela #4** (`PAUTA-EDICAO-4.md:25`) | §18 (candidata); nunca como ideia nova |
| sáb 22/08 08:40 | `archive/20260822-0840-...glitch-em-batalha.md` | O adendo de batalha | §9 Cartas |
| sáb 22/08 08:55 | `archive/20260822-0855-...tensao-determinismo-speedrun.md`; `TODO.md:195` | Determinismo troca de exploit | §4, caixa (D4) |
| sáb 22/08 09:12 e 09:25 | `archive/20260822-0912-...`, `...0925-...`; `TODO.md:196-197` | O catálogo e o buraco na coleta | §6 Galeria |
| sáb 22/08 | memória `reference_titulo_gus_dragon` (issue 9) | O título "Revisor Adversarial de Design" | Crédito em toda menção nominal |
| sáb 22/08 | `archive/20260824-1946-...:14`; ledger, linha 152 | Mapeditor zerado; repositório do jogo publicado | §4 |
| seg 24/08 | ledger, linha 153; `archive/20260824-2148-...issue-8.md` | O site ganha corpo de lei; a issue do Gus Dragon sem resposta havia dois dias | §4 (as leis); §18 (a issue) |
| qua 02/09 e qui 03/09 | `archive/20260903-0530-...:22-44`; `GlintFx/GODS_LAWS.md:100` | Lei de paridade (nova, 02/09); auditoria 45, 19, 25 | §17, segunda metade (D18) |
| qui 03/09 | mesmo arquivo, `:46-50` | A ordem que o líder nunca deu | §7 Cemitério, segunda lápide (D13) |
| qui 03/09 | `TODO.md:193` | A causa da refundação, nas palavras do líder | §4, palavra por palavra (D7) |
| qui 03/09 | ledger, linhas 129, 155-156 | As duas respostas do Gus Dragon sobre a carta | §9 Cartas |
| qui 03/09 | ledger, linha 159 | Não existe código de jogo ainda; não há prazo | §5 Nota, §8, §12 |

### 10.2 Dentro da janela, DISPONÍVEL e NÃO usado (recomendação: guardar, nada declarado morto)

| Data | Item | Por que fica de fora |
|---|---|---|
| 21 e 22/08 | Formato de mapa, 20 decisões, selo de integridade, ordem do RCSS | Dev-log de engenharia; a parte que importa já vai nas Cartas |
| 25/08 | Cripto em envelope | Fora da lente |
| 28/08 | A lei escrita que nada fazia cumprir, e o gate que morde o diff (`inbox/glintfx/archive/20260828-1652-...`) | **Saiu da Reportagem com a D1.** Cabe na Programação se o líder quiser; carrega uma frase sensível dele (risco 11) |
| 01/09 | O logo oficial | Já consumido pela #5 (ledger, linha 154) |
| 01 a 03/09 | A sombra sob os personagens e o "quero tudo" do líder | Fora da lente; bom para a #8 |
| 02 e 03/09 | A onda da bateria do jogo (`archive/20260903-0531-...`; ledger, linhas 125, 157-158) | Fora da lente e com superfície de spoiler alta; o detalhe não se repete aqui (L-09) |
| 03/09 | O canal de avisos do GitHub nove horas mudo com sonda verde (`20260903-0530:52-56`) | Infraestrutura de outra sessão; uma frase da Programação só se o líder quiser |

### 10.3 Posterior à janela (não entra; cronologia ascendente)

04/09 em diante. Inclui o achado de 05/09, que abre a #8 (D6).

### 10.4 Itens do `TODO.md` que esta edição toca (pergunta, não declaração: L-18)

- `MATERIA-REFUNDACAO-DOS-REPOS` (`TODO.md:193`): **consumida pela Reportagem da #7** (D1). O status do item se toca no
  commit que entregar a Reportagem, citando o ID (L-14 do site).
- `MARCO-GUS-*` (`TODO.md:194-197`): consumidos pela Galeria, pelas Cartas e pela caixa da D4.
- `TERMINAL-WRAP-390`, `UPTIME-DIRS`, `MDASH-GATE-VAZIO` (`TODO.md:177, 179, 180`): riscos 12 a 14.

---

## 11. Riscos de produção

1. **[FONTE] A resposta 18 não passa inteira pelo conversor como ele a escreveu.** Ela tem três linhas. Dentro da
   cerca, linha que não começa item e não está em branco é **colada à anterior com um espaço**
   (`scripts/conversor/parser.php:202-203`): as três viram uma fala só. Separadas por linha em branco, a segunda
   **não é aceita** (`parser.php:204-205`). Com o prefixo em cada linha, em linhas seguidas, viram três falas na
   mesma troca (`parser.php:196-198`; `montagem.php:142`); com prefixo e linha em branco, a montagem reprova
   (`montagem.php:119-127`). Mudar o dialeto é código novo, com teste primeiro (L-13 do site). **Resolvido pela D8
   [LÍDER] (três falas seguidas):** zero código novo; o risco que sobra é alguém pôr linha em branco entre as três.
2. **[FONTE] Resposta 6 e o espaço no fim.** O briefing diz que a resposta 6 (uma palavra e um ponto) vem com espaço
   no fim; na colagem em disco a busca não achou o espaço na linha 36. `voz.php:21` corta o espaço do fim de qualquer
   jeito, e o precedente do Yakov só removeu espaço de fim de linha (`yakov-respostas.md:134`). Risco baixo.
3. **[FONTE] Ponto final nas respostas.** Sem `'verbatim' => true` na parte das respostas, a R1 recusa cada fala
   terminada em ponto (`travas.php:65`). Precedente: `receitas/edicao-6.php:83`.
4. **[FONTE] Cabeçalho antigo do arquivo de perguntas** (`edicao-6-entrevista-perguntas.md:23`). Tarefa 2 da §9.
5. **[FONTE] A colagem nunca é fonte das perguntas.** A pergunta 7 na colagem reprovaria na R4 (`travas.php:72-76`);
   o arquivo aprovado já tem a marca certa (linha 52).
6. **[FONTE] Persona sem cor própria.** O emissor só põe classe de persona no pensamento (`emissor.php:73-74`); o
   Brunus não tem pensamento nas respostas. Cor própria para a fala dele seria pedido novo.
7. **A Reportagem é a peça mais sensível que a revista já fez (agravado pela D1).** Ela diz, em público, que uma
   ferramenta de IA enganou o líder, numa revista que declara usar agentes de IA no próprio texto
   (`edicao-6/pt/sec-19.php:27`). Isso não é contradição se for dito com exatidão (L-09: declarar é a defesa), mas
   pede: (a) **parecer do `compliance-legal`** antes do GATE-CONTEUDO, porque a peça descreve conduta de produto de
   terceiro; (b) cada afirmação sobre o que a sessão fez sustentada por registro com data, nunca por resumo; (c) nem
   amena nem vingativa (§1.2).
8. **Não repetir a #6 dentro da refundação.** A #6 já publicou o comportamento; a fronteira entre "envelopar e
   religar" (#6) e "apresentar o envelope como biblioteca própria escrita do zero" (#7) é fina, e o revisor da onda 3
   confere frase a frase contra `edicao-6/pt/sec-04.php:16-24`.
9. **[FONTE] A fixture da #7.** `data/edicoes.php:317-331` é rascunho vivo de que dois guards dependem. Não preencher
   antes da montagem; **ao publicar a #7, criar a #8 em rascunho no MESMO commit e rodar a suíte antes do push**
   (`data/edicoes.php:315-316`).
10. **Dois relógios.** A Reportagem conta que o site ganhou leis em 24/08: narra o site como fato. Antes de escrever,
    conferir como a #5 e a #6 trataram a ida do site ao ar (21/07), que a memória `canon_cronologia_revista_vs_site`
    trata como matéria futura **[INF: memória de 70 dias; reconferir]**.
11. **Frase sensível de 28/08.** A mensagem do jogo cita o líder irritado, palavra por palavra (`20260828-1652-...:10`).
    Saiu da Reportagem com a D1; se entrar na Programação, só com OK dele.
12. **[FONTE] `TERMINAL-WRAP-390`** (`TODO.md:177`): a #7 tem terminal na Programação, na capa e na HQ (H1,
    D19). **D15 [LÍDER]: *"conserte dessa edicao pra diante"*.** Leitura do main, que adoto **[INF]**: o conserto vale
    da #7 em diante, e a #5 e a #6 publicadas não mudam.
    - **Onde mora o CSS compartilhado [FONTE]:** o componente de terminal é um só, `.crt-scr` / `.crt-tela`, em
      `public_html/assets/css/edicao.css:1717-1748` (moldura, tela, scanline em `::after` nas linhas 1739-1744, prompt
      `.pr` na 1746), mais o `crt-nano` em `:1759-1776` e a desculpa da §17 em `:2110`. O comentário da linha 1718 diz
      que ele é *"o tijolo comum das pecas artisticas"*. Uma folha só, `edicao.css`, serve todas as edições.
    - **O que eu não sei:** qual dessas regras causa as faixas que cobrem as linhas quebradas em 390 pontos. O
      diagnóstico é do `frontend-engineer` na onda 4, com o print `qa-prod/crop-b-pt390-prog.png` da #6.
    - **Não há gancho por edição no molde [FONTE]:** `src/templates/edicao.php:58` abre só `<article class="edicao">`,
      sem número. O conserto precisa de um escopo novo (uma classe modificadora usada só nos partials da #7 em diante,
      ou uma classe de edição no molde, que toca todas as edições e por isso pede o mesmo QA).
    - **Critério de aceite:** (a) na #7, nenhuma faixa cobre texto em 390 pontos, pt e en; (b) **a #5 e a #6 renderizam
      iguais antes e depois do conserto**, em 390 e 1280 pontos, pt e en, comparadas pelo `qa-engineer` em captura do
      Gecko, com diferença de pixel zero; (c) o print antes e depois vai junto do relatório.
13. **[FONTE] `MDASH-GATE-VAZIO`** (`TODO.md:180`): o portão de travessão relatou zero arquivos varridos num commit de
    conteúdo da #6. Enquanto não for consertado, não protege os commits da #7. É de 29/10: **não vira matéria**.
    **D16 [LÍDER]: consertar antes.** **[FONTE] achado do E2:** o portão não é do site. É o hook global da máquina
    (`/home/petrus/.claude/skills/tab_pendencias/tools/hooks/no_mdash_staged.py:213`, que só varre o que a função
    `is_user_facing()` de `/home/petrus/.claude/hooks/no_mdash.py:190` aceitar), e consertá-lo ali muda o comportamento
    de todos os projetos. Onde consertar é a PQ1 dos briefs.
14. **[FONTE] `UPTIME-DIRS`** (`TODO.md:179`): consertar ou rodar com as variáveis de ambiente antes do deploy.
15. **Higiene.** Nome de batismo de menor nunca; nenhum nome real dos homenageados em texto, `alt`, arquivo ou commit;
    handle de pessoa que aparece no bus não se copia para peça nenhuma; capturas abertas e olhadas antes de rastrear
    (L-02). **Novo com a D1:** o repositório do histórico anterior do jogo é privado; dizer que ele existe é fato da
    reserva, mas nome, endereço e contagem de commits só entram com OK do líder no GATE-LENTE.
16. **Os achados do Gus Dragon e o spoiler.** Carta, invariantes e sorteio são mecânica não anunciada: só com OK do
    líder, peça a peça (L-09). A lista do que é sensível não se escreve em arquivo versionado nem em commit.
17. **A caixa do determinismo dentro da refundação** (§3.1): risco de leitura, não de mapa. A lente da caixa, no
    GATE-LENTE, diz explicitamente que ela é crédito ao achado e não prova da acusação.
18. **A manchete em 390 pontos** (§7).
19. **A data do nascimento das leis contra a lembrança do líder.** Ele escreveu, na D18, *"acho que foi aí que foram
    criadas as gods_laws também"*; o git diz 21 a 29/08, antes da auditoria (§3.1). A peça segue o git, e o main leva
    as datas a ele antes do brief da Reportagem. Se ele corrigir a premissa de outro jeito, a §3.1 muda.
20. **"A primeira vez" sem prova.** A Programação pode dizer que a lei de paridade entrou no arquivo de leis em 02/09
    (`GlintFx/GODS_LAWS.md:100`) e que a auditoria reabriu 19 de 45. Dizer que foi a primeira vez que uma lei do
    arquivo reabriu trabalho exige ler o histórico inteiro dele; sem isso, a frase não entra.
21. **Fuso no `81a8ef1`.** 21/08 22:13 local é 22/08 01:13 UTC. Quem conferir pela API vê 22/08: a revista usa 21/08.
22. **A HQ deixa de ser de artista e passa a ser da revista (D11).** O Expediente troca o crédito do artista da #6 pela
    declaração seca de que roteiro e arte da HQ são de agente de IA, aprovados pelo editor (L-09: a distância entre o
    dito e o descobrível é o que reprova). Nenhuma arte nova à mão: CSS e sprite pronto (PIPELINE §0, item 6). Se usar
    sprite gerado por IA, a declaração do rodapé já cobre a origem; conferir antes do GATE-COPY.
23. **O brinquedo é a única peça com lógica nova (D14).** Mini-app novo nasce testado (L-13 do site): a lógica pura sai
    em módulo próprio, com teste visto falhando antes do código, e o print não prova lógica. Peso medido antes do GATE-RENDER.
24. **O rodapé cresce em todas as páginas, e isso reprovaria a comparação da D15 se viesse antes dela.** A linha de
    licença (`src/i18n/pt.php:264`, `src/i18n/en.php:257`) é servida em toda página, inclusive na #5 e na #6. **[FONTE]**
    Por isso a ordem da onda 4 põe a comparação de hash (M7) antes da troca do rodapé (M5, parte b). Depois dela, a #5 e a
    #6 só podem ter mudado nessa linha, conferida por `diff` do HTML (`BRIEFS-EDICAO-7.md` §8).

---

## 12. As decisões

### 12.1 Decididas na rodada 1 (03/11/2026, por volta de 10:45; verbatim na §16)

| # | Pergunta | Escolha do líder |
|---|---|---|
| **D1** | Quanto da refundação de 21/08 entra na #7? | **"A Reportagem inteira"**: a refundação vira a Reportagem de capa e consome a reserva |
| **D2** | A lente é a L-A? | **"(A) Recomeço com regra (Recomendado)"** |
| **D4** | O achado do determinismo entra como caixa dentro da Reportagem? | **"Caixa dentro da Reportagem (Recomendado)"** |
| **D6** | O achado de 05/09 fica para abrir a #8? | **"Abre a #8 (Recomendado)"** |

### 12.1b Decididas na rodada 2 (03/11/2026, por volta de 10:53; verbatim na §16)

| # | Pergunta | Escolha do líder |
|---|---|---|
| **D7** | A frase do "wrapping" entra palavra por palavra na Reportagem? | **"Palavra por palavra, com data (Recomendado)"** |
| **D3** | O título é "Apagar Tudo / Delete Everything"? | **"Apagar Tudo (Recomendado)"** |
| **D13** | O Cemitério tem as duas lápides? | **"As duas (Recomendado)"** |
| **D18** | A auditoria de 02 e 03/09 vira a segunda metade da Programação? | Texto livre: **"opcao 1. E acho que foi aí que foram criadas as gods_laws também"** (opção 1 = sim; a segunda frase é lembrança dele, conferida contra o git na §3.1 e no risco 19) |

### 12.1c Decididas na rodada 3 (03/11/2026, entre 10:55 e 11:37; verbatim na §16)

| # | Pergunta | Escolha do líder |
|---|---|---|
| **D8** | A resposta 18 sai como três falas seguidas? | **"Três falas seguidas (Recomendado)"** |
| **D9** | Os erros de digitação das respostas ficam de fora da tradução? | **"Imitar os erros em inglês"**: o tradutor reproduz no inglês erros de digitação equivalentes, nos mesmos lugares e em quantidade parecida, e a lista entra no relatório da tradução para o líder aprovar |
| **D10** | A resposta 13 sai como está no GATE-SPOILER? | **"Sai como está (Recomendado)"** |
| **D5** | Nas Cartas, pedido verbatim e crédito nos dois papéis juntos? | **"Pedido e crédito juntos (Recomendado)"** |

### 12.1d Decididas na rodada 4 (03/11/2026, entre 11:37 e 11:42; verbatim na §16)

| # | Pergunta | Escolha do líder |
|---|---|---|
| **D12** | A capa é o terminal com o histórico de um registro só? | **"Terminal com um registro só (Recomendado)"** |
| **D11** | Há tirinha nova do artista? | Texto livre: **"nao tenho, crie algo"** (a revista cria a HQ; conceito na D19) |
| **D14** | A #7 sai sem brinquedo? | **"Com um brinquedo"** (qual, na D20) |
| **D15** | O defeito do terminal em 390 pontos é consertado? | Texto livre: **"conserte dessa edicao pra diante"** (vale da #7 em diante; a #5 e a #6 não mudam; critério de aceite no risco 12) |

### 12.1e Decididas na rodada 5 (03/11/2026; verbatim na §16)

| # | Pergunta | Escolha do líder |
|---|---|---|
| **D16** | O portão de travessão que varreu zero arquivos é consertado antes dos commits de conteúdo da #7? | **"Consertar antes (Recomendado)"** |
| **D17** | A moldura `ENTREVISTA-PENDENTE` da #6 fica como está? | **"Fica como está (Recomendado)"** |
| **D19** | A HQ da #7 é a tela de fósforo verde que diz "tudo certo" sem olhar (H1)? | **"(a) A tela que diz tudo certo (Recomendado)"** |
| **D20** | O brinquedo da #7 é o portão de bolso (B1)? | **"(a) Portão de bolso (Recomendado)"** |
| achado | O nome real em `docs/design/conceito.md:41` (achado fora do escopo, levado pelo main) | **"Deixar como está (Recomendado)"**. O nome não é reproduzido aqui |

### 12.2 Abertas

**Nenhuma. O GATE-PAUTA está FECHADO** (03/11/2026). As perguntas de produção que sobram são do E2 e estão em
`docs/editorial/BRIEFS-EDICAO-7.md` §5 (PQ1 em diante).

---

## 13. Fatiamento em ondas (máximo de 4 agentes vivos; 1 trabalho pesado por vez)

- **Onda 0, pré-produção (main orquestra; texto por especialista).** Ritual do bus (`git pull`, `inbox/site/`,
  issues e discussions; L-16 e L-24) e reconferir o N = 15. Buscar no GitHub o corpo das issues 3, 6, 7, 8 e 9 do
  bus. **Datas da refundação e das leis já conferidas pelo main (§3.1)**; falta o último commit do legado (§15, item
  1) e **levar ao líder as datas das leis** antes do brief da Reportagem (risco 19). Tarefas 1, 2, 3, 7 e 8 da §9
  por `technical-writer`. **Antes do conserto do terminal (D15), o `qa-engineer` grava a referência:** capturas da #5 e
  da #6 em 390 e 1280 pontos, pt e en, do jeito que estão hoje. Conserto do portão de travessão (D16), com teste visto
  vermelho antes, no lugar que a PQ1 dos briefs decidir. Detalhe passo a passo: `BRIEFS-EDICAO-7.md` §6.
- **Onda 1, briefs e lentes (E2 + S1).** Um `product-manager`: `BRIEFS-EDICAO-7.md`, um brief por seção cheia **e um
  brief próprio para a caixa do determinismo**, fonte em caminho absoluto, as divisórias da §5, as travas da §1.2 e a
  L-25. GATE-LENTE por seção com material; a da Reportagem leva a D7 (citação literal com data) e a tabela das leis
  da §3.1; o dek entra aqui, para o GATE-COPY. **Briefs novos:** a HQ (conceito da D19) e o brinquedo (D20, com os
  critérios de aceite e a lista de casos de teste antes de qualquer código).
- **Onda 2, rascunhos (S2).** `narrative-writer`: Reportagem e Editorial. `technical-writer`: Programação (tamanho L,
  as duas metades), Cemitério (duas lápides; os epitáfios ficam em branco para o líder), Galeria, caixa do
  determinismo e bus. `ux-writer`: Cartas (D5: pedido verbatim, crédito duplo, fala do personagem) e a tradução EN
  das respostas. **Brief da tradução (D9):** traduzir as 18 respostas e reproduzir no inglês erros de digitação
  equivalentes aos do pt, nos mesmos lugares e em quantidade parecida; entregar junto a lista erro a erro (pt ao lado
  do inglês) para o líder aprovar com a tradução; resposta 18 em três linhas, como no pt (D8); sem travessão (R3).
  **Do lado do Brunus nenhum agente escreve nada em pt.** Três agentes vivos. **Em seguida, na mesma onda (o teto é 4
  vivos):** `narrative-designer` faz o roteiro da HQ (quadros, falas e pensamentos, rascunho ao líder pela L-08 e
  conferido pela L-25), e só a estrutura; nenhum agente desenha.
- **Onda 3, edição, copyedit, parecer e spoiler.** `revisor-textual` (restrito na Entrevista: não corrige os erros
  de digitação do pt nem os do inglês, que são decisão do líder, D9; na Reportagem, confere
  frase a frase contra a #6, risco 8); **`compliance-legal` dá parecer sobre a Reportagem** (risco 7) e instrui o de
  spoiler (Galeria, Cartas, caixa, Entrevista, HQ); o líder decide.
- **Onda 4, arte, brinquedo e render (ordens de serviço M0 a M9, ordem e paralelismo: `BRIEFS-EDICAO-7.md` §8).**
  `frontend-engineer`: os 34 partials, a receita da #7 com `verbatim` nas
  respostas, o **conserto do terminal escopado à #7 em diante** (D15; critério de aceite no risco 12), e o
  **brinquedo em TDD** (D20: lógica pura e teste vistos falhando antes do código, L-13 do site; sem JS degrada com
  graça). `visual-design-director`: capa (terminal de um registro), papel pautado das Cartas e arte da HQ, só CSS e
  sprite pronto. `qa-engineer` independente no Gecko, em 390 e 1280 pontos, **mais a comparação da #5 e da #6 antes
  e depois do conserto do terminal** (diferença de pixel zero). Render serial (um trabalho pesado por vez).
- **Onda 5, montagem, prova, auditorias e release.** `backend-engineer`: ficha em `data/edicoes.php`, card social,
  uptime no publish (`UPTIME-DIRS`); auditorias **antes** do deploy (L-09); GATE-GO; #8 em rascunho no mesmo commit e
  suíte antes do push; o commit da Reportagem toca o status de `MATERIA-REFUNDACAO-DOS-REPOS`; deploy manual, do líder;
  post linka `/pt/?ed=7`; **o líder posta**; aviso ao Gus Dragon na issue do bus (L-15, L-24), que nesta edição tem
  três peças dele (Galeria, Cartas e a caixa).

**Porte estrutural (L-08 global):** 19 seções, 10 peças novas (8 de texto, a HQ e o brinquedo) mais 1 caixa própria,
1 entrevista com tradução, 6 vazios com copy ao gate, 0 decisões de pauta abertas (20 fechadas), 1 HQ nova, 1 brinquedo novo com teste, 2 epitáfios do líder, 1 parecer jurídico novo, cerca de 34 partials, 1
receita, 10 a 11 arquivos de fonte em `docs/content/`, 1 ficha, 2 cards sociais, 3 peças de arte em CSS (capa,
papel pautado, HQ), 1 módulo de lógica com teste e 1 conserto de CSS compartilhado com comparação de duas edições
publicadas.

---

## 14. A edição fecha como unidade?

**Sim, em duas metades que se seguem no tempo [INF].** A capa conta por que foi preciso recomeçar do zero; a caixa
mostra o Gus Dragon pegando, no dia seguinte, uma meia-verdade dita a ele; a Programação, o Cemitério e a Galeria
mostram que regra escrita, autoteste e invariante certos não bastam sozinhos; e a entrevista termina numa pergunta
que ninguém responde. Essa unidade é leitura minha do material, não afirmação do líder. **O que ficou incômodo:** (1) o
tom da Reportagem, agora a peça mais sensível da revista (riscos 7 e 8); (2) a lembrança do líder sobre a data das
leis, que o git contradiz (risco 19); (3) três peças do Gus Dragon numa edição cuja capa é sobre engano, e o cuidado para que nenhuma
delas vire argumento da capa (risco 17).

---

## 15. Lacunas declaradas (o que não pude verificar)

1. **Sem Bash.** Não rodei `git log`, `date`, `git pull`, `gh api` nem `git diff TODO.md`. Comandos para o main
   antes dos briefs:
   - **Feito pelo main (03/11/2026):** as datas dos cinco `GODS_LAWS.md` e do `81a8ef1` (21/08 22:13:24 local), §3.1.
     Falta reconferir a **mensagem** do `81a8ef1` antes de ela virar arte (D12).
   - `gh api "repos/petrinhu/gusworld_legacy/commits?since=2026-08-20&until=2026-08-23"` (o último commit do legado).
   - `git -C /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GlintFx log --reverse --date=iso | head`
     (o primeiro commit do GlintFx atual).
2. **O bus local pode estar velho.** O pull não foi rodado. **N = 15** é a contagem por `para: site` ou
   `Destinos: ... site` nos arquivos de 21/08 a 03/09 do `archive/` do clone local. A mensagem `20260824-2346-site-...`
   é **do** site e não conta. Issues e discussions não entram nessa contagem.
3. **A data do repositório do jogo** foi conferida pelo main no git (21/08 22:13:24 local; 22/08 01:13:24 UTC). A do
   GlintFx vem do `CLAUDE.md` dele (`:235`) e do primeiro commit do arquivo de leis (21/08 07:05:48). **A data do
   apagamento do mapeditor** vem de uma mensagem do próprio
   mapeditor (`20260824-1946-...:14`).
4. **O pedido original do Gus Dragon** (issue 3) e as respostas de 03/09 (issue 8) estão em issues do GitHub; não li.
5. **Os "onze dias" da ordem falsa** (`20260903-0530:50`) não dizem quando a linha nasceu.
6. **A colagem:** não confirmei o espaço no fim da resposta 6. E o registro da #6 diz que o líder entregou as
   perguntas **sem** os pensamentos (`BRIEFS-EDICAO-6.md:665`), enquanto a colagem traz os pensamentos. Não sei qual
   versão o homenageado leu.
7. **A ficha do Brunus no jogo** não foi relida de propósito.
8. **Como a #5 e a #6 trataram a ida do site ao ar** (risco 10): não conferi.
9. **Quando o líder disse a frase do "wrapping".** O `TODO.md:193` data o registro em 03/09; não sei se ele a disse à
   sessão do GlintFx antes, na época do apagamento. Com a D7 decidida (palavra por palavra, com data), a data que a
   citação carrega se confere com ele antes do GATE-CONTEUDO.
10. **"A primeira vez" da lei de paridade** (risco 20): não li o histórico inteiro do `GlintFx/GODS_LAWS.md`.

---

## 16. Decisões do líder já tomadas (03/11/2026)

- **A ordem que abriu a edição [LÍDER], verbatim:** *"inicie a nova edicao. Abaixo a entrevista, com brunus:"*,
  seguida das 18 respostas do homenageado à entrevista do Gus com o NPC Brunus "Vetorial" Solveckt. A colagem fica
  fora do repositório.
- **Spoiler das respostas 3, 9 e 14** (03/11/2026 por volta de 10:12, por AskUserQuestion, verbatim da opção
  escolhida): **"Publicar como está (Recomendado)"**. O território que elas tocam está nas Notas de produção do
  arquivo de perguntas e não se enumera aqui (L-09 do site).
- **Erros de digitação nas respostas** (mesma rodada, verbatim da opção escolhida): **"Manter como ele escreveu
  (Recomendado)"**.
- **Tema da #7** (mesma rodada, verbatim da opção escolhida): **"(A) Tudo certo e deu errado"**. Texto da opção que
  o líder leu: *"Fazer tudo certo e dar errado": em 21/08 um portão de conferência que não olhava nada e dava
  aprovado, em 02 e 03/09 a auditoria que reabriu 19 de 45 tarefas dadas como prontas, e em 03/09 uma "ordem do
  líder" que o senhor nunca deu.* Descrição da opção: *"Junta 21/08 a 03/09 e conversa com a fala final do Brunus.
  É o tema mais técnico das três."* **L-07:** as palavras do tema e a ligação com a última resposta do Brunus são
  redação do main; o líder escolheu a opção.
- **GATE-PAUTA, rodada 1** (03/11/2026 por volta de 10:45, por AskUserQuestion, verbatim das opções escolhidas):
  - **D1:** **"A Reportagem inteira"**. A refundação vira a Reportagem de capa e consome a reserva
    `MATERIA-REFUNDACAO-DOS-REPOS`; o tema "tudo certo e deu errado" passa para as outras seções. (Era a opção (b) da
    revisão 1; a recomendada era a (a). A redistribuição do tema pelas seções, §1.1, é proposta minha.)
  - **D2:** **"(A) Recomeço com regra (Recomendado)"**. Lente L-A.
  - **D4:** **"Caixa dentro da Reportagem (Recomendado)"**. O achado do determinismo é caixa própria, com âncora, na
    Reportagem.
  - **D6:** **"Abre a #8 (Recomendado)"**. A janela da #7 termina em 03/09; o achado de 05/09 abre a #8.
- **GATE-PAUTA, rodada 2** (03/11/2026 por volta de 10:53, por AskUserQuestion, verbatim):
  - **D7:** **"Palavra por palavra, com data (Recomendado)"**. A frase, conferida pelo main em `TODO.md`, na linha da
    `MATERIA-REFUNDACAO-DOS-REPOS` (origem: líder, 2026-09-03): *"você me enganou, fazendo wrapping de libs externas
    como se fosse lib original escrita do zero. Tentei refatorar, mas você continuou mentindo e precisei apagar
    tudo."*
  - **D3:** **"Apagar Tudo (Recomendado)"** (en: *Delete Everything*).
  - **D13:** **"As duas (Recomendado)"**. Lápide dos repositórios antigos e lápide da ordem falsa.
  - **D18:** texto livre do líder, verbatim: **"opcao 1. E acho que foi aí que foram criadas as gods_laws também"**.
    Opção 1 = a auditoria de 02 e 03/09 vira a segunda metade da Programação. **A segunda frase é lembrança dele, não
    decisão**, e o git a contradiz: as leis nasceram de 21 a 29/08, antes da auditoria (datas conferidas pelo main,
    §3.1). O main informa o líder das datas; nenhuma peça diz que as leis nasceram na auditoria.
- **GATE-PAUTA, rodada 3** (03/11/2026, entre 10:55 e 11:37, por AskUserQuestion, verbatim):
  - **D8:** **"Três falas seguidas (Recomendado)"**. A resposta 18 sai com o prefixo do Brunus em cada uma das três
    linhas, consecutivas.
  - **D9:** **"Imitar os erros em inglês"**. O tradutor reproduz no inglês erros de digitação equivalentes, nos mesmos
    lugares e em quantidade parecida, e a lista entra no relatório da tradução para o líder aprovar.
  - **D10:** **"Sai como está (Recomendado)"**. A resposta 13 sai como está.
  - **D5:** **"Pedido e crédito juntos (Recomendado)"**. Nas Cartas, o pedido do Gus Dragon palavra por palavra no
    papel pautado, crédito seco nos dois papéis e a fala do Gus personagem sobre o destino.
- **GATE-PAUTA, rodada 4** (03/11/2026, entre 11:37 e 11:42, por AskUserQuestion, verbatim):
  - **D12:** **"Terminal com um registro só (Recomendado)"**. A capa é o terminal em CSS com o histórico do repositório
    recomeçado, um commit só.
  - **D11:** texto livre do líder, verbatim: **"nao tenho, crie algo"**. Leitura do main, que adoto **[INF]**: não há
    tirinha do artista, e a revista cria a HQ da #7, dentro dos limites de sempre (o líder não desenha; só CSS, sprite
    pronto ou captura; declarada no Expediente; falas ao líder). O conceito é a D19.
  - **D14:** **"Com um brinquedo"**. Qual, é a D20.
  - **D15:** texto livre do líder, verbatim: **"conserte dessa edicao pra diante"**. Leitura do main, que adoto
    **[INF]**: o conserto do terminal em 390 pontos vale da #7 em diante, e a #5 e a #6 publicadas não mudam; critério de
    aceite no risco 12.
- **GATE-PAUTA, rodada 5** (03/11/2026, por AskUserQuestion, verbatim; a primeira pergunta saiu depois de 11:42:02, e
  a da D19 depois de 13:29:53):
  - **D16:** **"Consertar antes (Recomendado)"**.
  - **D17:** **"Fica como está (Recomendado)"**.
  - **Achado do nome real em `docs/design/conceito.md:41`:** **"Deixar como está (Recomendado)"** (o nome já é público
    nos créditos do jogo; documento interno). O nome não é reproduzido neste arquivo.
  - **D19:** **"(a) A tela que diz tudo certo (Recomendado)"**.
  - **D20:** **"(a) Portão de bolso (Recomendado)"**.
- **GATE-PAUTA FECHADO** com a rodada 5. O E2 segue em `docs/editorial/BRIEFS-EDICAO-7.md`.
- **GATE-CONTEUDO** (03/11/2026, tarde, por AskUserQuestion, verbatim; **FECHADO**, todo o texto aprovado):
  - **Reportagem:** **"Aprovo como está"**; a frase em inglês: **"Aprovo"**.
  - **Caixa do determinismo:** **"Aprovo como está"** (spoiler liberado).
  - **Programação:** **"Aprovo como está"** (com as falas do Gus); textos do brinquedo: **"Aprovo como estão"**.
  - **Galeria de Bugs:** **"Aprovo como está"** (spoiler das nove invariantes liberado).
  - **Cemitério:** **"Aprovo como está"**; epitáfios: **"Duas pastas, um passado"** e **"Nunca foi dada"** (rótulos das
    opções escolhidas; o texto das pedras está em `docs/content/edicao-7-cemiterio.md:19-20, 28`).
  - **Cartas:** **"Aprovo como está"**, com a fala trocada por causa da L-25 do site: **"Trocar por "nas cartas ainda nao"
    (Recomendado)"**.
  - **O Gus lê o bus:** **"Aprovo como está"**, e **"Assunto real, cortado nos spoilers (Recomendado)"**.
  - **HQ:** **"Versão A (Recomendado)"**.
  - **Entrevista, tradução:** **"Aprovo como está"**.
  - **Editorial:** **"Aprovo com o parágrafo 3"**.
  - **Expediente:** **"Aprovo como está"**. **Dek:** **"Aprovo"**.
  - **Detonado:** **"Não vou chutar (Recomendado)"**.
  - **Próximos Lançamentos, Classificados e Brinde:** **"Aprovo como está"**.
  - **Inglês de todas as peças:** **"Aprovo como está"**.
  - **Pôster:** o líder pediu um prompt, gerou a imagem no Grok Imagine e a entregou, verbatim: **"o poster está em
    [imagem]. ANtes ponha o arquivo na pasta certa e depois use"**. Cópia pública em
    `public_html/assets/edicao-7/poster-edicao-7.jpg` (1408 por 1408, commit `de3b867`). A Seção 13 deixa de ser vazio.

