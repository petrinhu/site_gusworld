# TODO.md — site_gusworld

Tabela de pendências canônica do **site_gusworld**: o site do jogo GusWorld.
**Reordenada em 2026-07-15** (`--reorder` #1), após o 1º brainstorm com o líder. Gate anti-OE: **thread direta** (Cósimo cortou as 4 lentes e o Cosmo — ver §Arbitragem).

## O que é este board

**O site é teasing publicitário centrado em UX.** Metáfora: **revista de videogame dos anos 90 + o Diário do Gus**. O material **é o próprio progresso do jogo** (build-in-public). Conceito completo em **`docs/design/conceito.md`**. Porte e ativação em **`.bigtech-porte`**.

**Esta tabela registra e ordena. Ela não fecha decisão nenhuma.** Todo item `[líder]` permanece decisão exclusiva dele.

## A régua (vale sobre todo item)

> *"Se for maçante eu não quero. Não existe teasing 'parado'. Temos que sacudir as pessoas, gerar boa experiência, CRIAR EXPECTATIVAS, gerar pensamentos de **'LANCE LOGO ESSE JOGO, NÃO AGUENTO MAIS ESPERAR'**."*

**Teste de toda proposta: isso sacode alguém, ou é só correto?** Correto-e-morto **reprova**. Anti-alvo: *"peça publicitária fria de lançamento de um sedã preto para empresários idosos sem graça"*.

**E o critério de sucesso não é métrica:** *"se apenas meu filho jogar, já fico feliz"*. **Ambição total, expectativa zero.** Nenhuma visita, voto ou wishlist é critério. "12 votos" não é fracasso.

## Restrições duras (invioláveis)

1. **`Projects/gusworld/` (o jogo) é READ-ONLY.** Escrita só aqui. Leitura é permitida.
2. **Nenhuma página nasce fora da identidade visual**, a definir com o líder via `/design`.
3. **Push só com autorização expressa por ocasião.** Produção **não autorizada**. Domínio **indefinido**.
4. **Stack em aberto.** Requisito é **dinâmico** (site parado reprova); a **tecnologia não foi decidida** — "html5/php/mysql" foi **exemplo** do líder, não escolha. O plano Hostinger dele **não suporta Node**. Isso é insumo de `D-STACK`, não conclusão.
5. **O líder NÃO é artista digital.** Não propor GIF, desenho, animação manual ou edição de vídeo. **A animação vem de código** (CSS `steps()` nos walk cycles que já existem), de sprites prontos e de captura do jogo rodando. **Zero frame novo desenhado.**
6. **Nome real de menor nunca é versionado.** O filho é **"Gus Dragon"**.
7. **Nenhuma decisão sem `AskUserQuestion`.** O início longo é **deliberado**: tudo passa por ele, sem pressa.

## Regras de fluxo

- **WIP líder = 1** (sem exceção). **WIP agent = 3.** **Revisão pendente = 2**: com 2 entregas esperando revisão dele, **não disparar a terceira**.
- **Aging WIP:** item com owner=líder parado **14 dias** vira `❄️ Congelado` e volta ao backlog **com o motivo escrito**. Board que mente sobre o que está vivo é pior que site atrasado.
- **Nenhuma cadência prometida. Nenhum item carrega data.** Edição é puxada por **progresso visível**, nunca por calendário.
- **As linhas, de cima para baixo, SÃO a ordem de execução.**

## Invariante inviolável

Teste unitário (TDD) **não vira item**. `TST-*` são **downstream da implementação**; `AUD-*` são downstream de **código + teste**. **Nunca** agendar teste/auditoria antes do que cobrem. `WIKI-DOC-INICIANTE` fecha a tabela.

## O gargalo, e ele não mudou

**~61 pontos SERIAIS na fila do líder; agents absorvem 0% deles.** Ele é médico (6:15 às 20h) e já escreve uma engine C++ sozinho. **"Os agents não aliviam o gargalo, eles o alimentam"** — cada entrega vira revisão dele.

**Nota de risco (registrada, decisão dele):** a lente de esforço argumentou que site caprichado antes do M7 é trabalho fora de sequência. **`D-SEQUENCIA-M7` foi decidido: o site avança em paralelo.** O contra-argumento caiu porque **no teasing escolhido o material É o próprio progresso** — nunca falta o que postar, porque postar é subproduto de trabalhar.

## Fontes e correções factuais (não propagar o que foi refutado)

- **Estado do jogo:** o `ROADMAP.md` é fonte **desatualizada**. O board vivo mostra **M1/M2/M4 ✅ validados ao vivo**. Ambas as fontes concordam: **M7/M8/M9 `⏳`**.
- **`ACKNOWLEDGMENTS.md` existe** (13 KB). A lente de esforço errou.
- **PDFs élficos de terceiros:** 71, **gitignored**, nunca foram ao repo público. **Não inflar `AUD-LICENCA`.**
- **Share-alike:** CC-BY-SA morde **adaptação, não agregação**. Sprite intacto = atribuição, não contamina. Só pega se **adaptado** (key art de landing tende a ser). Não fechar antes de `dr-advogado`/CLO.
- **Contraste (calculado, entrada do `/design`):** ciano `#4dd9e8`/navy `#0d1520` = **10.83:1** (AA+AAA); magenta `#c23fd9`/navy = **4.37:1** (**falha AA texto normal** por ~3%); magenta/ciano = **2.48:1** (nunca encostar).
- **⚠️ "O X suprime link externo" era FALSO.** O X **removeu a penalidade em 14/10/2025** (~8× mais alcance); contas **Premium** veem 40-80% dos seguidores. **O líder duvidou do dado e estava certo.** O que sobrevive: a imprensa de jogos migrou para o **Bluesky**.

## Recomendações rejeitadas pelo líder (registro, para não se perderem)

- **Cortar `COPY-EXPERT`** (lentes de valor e esforço). **Rejeitada:** ele quer os dois eixos. Custo aceito: superfície dobrada em `AUD-SPOILER`.
- **A pedra que desmonta o menu** (Electric Zine Maker). **Rejeitada:** hostil. O envelhecimento da página é carinhoso e faz o mesmo trabalho.
- **Login + data de nascimento + gov.br** (proposta inicial DELE, retirada por ele após contra-argumento). Ver `ZERO-DADO`.

## Arbitragem deste `--reorder` (thread direta)

**O Cósimo cortou as 4 lentes e o Cosmo.** Justificativa: *"o delta não invalida as lentes, ele as SIMPLIFICA. Item fechado não precisa de lente."* O one-way-door mais duro (`D-GUS`) **morreu remediado**; `ZERO-DADO` **amputou a superfície de LGPD/parental/gov.br**; e as 17 descobertas saíram de um brainstorm que a thread conduziu **em primeira mão**. Re-rodar 4 lentes custaria 2 round-trips para reconstruir por leitura o que a thread já tem — **e cada lente vira revisão do líder, alimentando o gargalo.**

**Gatilho para voltar ao time:** (a) `D-STACK` decidido de um jeito que reordene a engenharia; (b) `MODERACAO`/`MOBILE-RISCO` decidindo por UGC ou telemetria (exposição de dado volta a existir → acorda Narciso); (c) INBOX > ~25 itens, ou bloco novo cuja dependência a thread **não** conduziu em primeira mão; (d) WIP do líder > 1 ou revisão pendente > ~5.

**O que este reorder fez:** fechou 7 itens do brainstorm + `D-CANAL` + `D-ANALYTICS`; tirou `D-GUS-*` da fila (remediado); rebaixou `AUD-LGPD`; drenou as **17 descobertas da INBOX**; criou `NOME-REVISTA` e `RAGE-ISSUES`; **colapsou W1/W2** e re-topologizou tudo.

**Nota:** `TESTES.md` e `AUDITORIAS.md` **foram criados** neste reorder, **parciais por decisão do líder**: só a parte que **independe de stack**. A faixa de stack entra com `D-STACK`.

---

## Tabela de pendências

| ID | Onda | Grupo | Descrição Técnica | Prioridade | Pré-requisito | Dificuldade | Status | Estado Auditado |
|---|---|---|---|---|---|---|---|---|
| `D-SEQUENCIA-M7` | — | Decisão | **DECIDIDO: o site avança EM PARALELO ao jogo.** No teasing escolhido o material **é o próprio progresso**, então nunca falta o que postar. | Crítica | — | JS 1 · líder | ✅ Concluído | — |
| `OBJETIVO-SITE` | — | Decisão | **DECIDIDO: teasing publicitário centrado em UX.** Régua *"se for maçante eu não quero"*; alvo *"LANCE LOGO ESSE JOGO"*. Metáfora: **revista dos anos 90 + Diário do Gus**. `docs/design/conceito.md`. | Crítica | — | JS 3 · ambos | ✅ Concluído | — |
| `D-PUBLICO` | — | Decisão | **DECIDIDO: os dois eixos** (criança 11-15 **e** adulto ~30-50; leigo **e** expert), adulto leigo = **nostálgico de jogos antigos**. **A faixa primária foi resolvida PELA metáfora:** quem escreve tem 11 (a criança se identifica), o objeto é uma revista (o adulto reconhece). ★ **Ele É o público** (11 anos em 1991, era SNES) **e a criança mora na casa dele** (lead tester): o teste é *"isso me sacode?"* + *"meu filho acharia legal?"*, **N=2 à mesa do jantar**. | Crítica | — | JS 2 · líder | ✅ Concluído | — |
| `A-VOZ` | — | Conteúdo | **DECIDIDO, e veio do canon:** o **Gus escreve** (tecnicismo — "input calórico"; frases curtas; **as reticências = a pausa de 1s = ele quase sentindo algo**; profanidade ZERO). O **líder quase não aparece — ele é o Pyotor**, pai médico itinerante de cartas raras (*"Filho, parabéns. Use bem. Pai."*). ★ **O wound do Gus (isolamento) É o coração do site.** **Nunca dito, só sentido.** Sem truque de tela. | Alta | `OBJETIVO-SITE` | JS 2 · líder | ✅ Concluído | — |
| `O-ARCO` | — | Conteúdo | **DECIDIDO:** revista conta a espera → o jogo sai → **o Gus PARA de escrever** (o silêncio é a ferida cicatrizando) → **a última edição anuncia o LIVRO**. ★ **A INVERSÃO:** primeiro o jogo, depois o livro (o contrário de Tolkien/Duna). **O jogo fixa, o livro aprofunda** — e resolve o bait-and-switch de graça: o livro não é upsell, é a obra seguinte, e chega **depois** do jogo grátis. | Alta | `OBJETIVO-SITE` | JS 1 · líder | ✅ Concluído | — |
| `ZERO-DADO` | — | Decisão | **DECIDIDO (a decisão que mais simplificou o projeto).** Crédito do ARG = **apelido escolhido**; **SEM conta, SEM login**; tudo em `localStorage`. *"O site LEMBRA dela sem SABER quem ela é."* **Morreram: LGPD art. 14, verificação parental, gov.br, base de menores.** | Alta | `OBJETIVO-SITE` | JS 1 · líder | ✅ Concluído | — |
| `A-CADENCIA` | — | Decisão | **DECIDIDO:** (1) **numeração retroativa primeiro** — o site nasce com **5 edições**, não com "em breve"; (2) depois, **edição = progresso visível, sai quando sai. NENHUMA data.** Não existe item de "devlog contínuo": o que mata é a **promessa quebrada**, não o intervalo. | Alta | `OBJETIVO-SITE` | JS 1 · líder | ✅ Concluído | — |
| `D-CANAL` | — | Decisão | **DECIDIDO: Bluesky orgânico primeiro + X como espelho**, pela **conta pessoal** dele (Premium), registro intimista: *"saiu edição nova de [revista]. Está em [url]."* Pago só depois de haver build. | Média | `OBJETIVO-SITE` | JS 2 · líder | ✅ Concluído | — |
| `D-ANALYTICS` | — | Decisão | **RESOLVIDO por `ZERO-DADO`: zero coleta.** Não há analytics, não há cookie, não há identificador. O critério **"zero terceiro por padrão"** permanece como entrada de `D-STACK`. | Média | `ZERO-DADO` | JS 1 · líder | ✅ Concluído | — |
| `D-GUS-EXPOR` | — | Inventário | **RESOLVIDO e fora da fila.** A exposição estava no repo do **jogo** e foi **integralmente remediada** (verificado nos 2 remotos: 0 ocorrências, tag de backup 404, personagem "Gus" intacto). Regra canônica: o filho é **"Gus Dragon"**. | Alta | — | JS 1 · agent | ✅ Concluído | ✓ |
| `D-GUS-RATIFICA` | — | Decisão | **RESOLVIDO e fora da fila.** O one-way-door deixou de existir: o site teasing com bios de personagens **fictícios** não expõe ninguém. | Alta | `D-GUS-EXPOR` | JS 3 · líder | ✅ Concluído | ✓ |
| `PALETA-CONTRASTE-CALC` | — | Design (entrada) | **Feito.** Contraste WCAG calculado, é **constraint de ENTRADA do `/design`**: ciano/navy **10.83:1** ok; magenta/navy **4.37:1 falha AA texto normal**; magenta/ciano **2.48:1** nunca encostar. | — | — | JS 0 | 🔍 Pendente verificação | — |
| `INV-CONTEUDO-A` | **W1** | Inventário | Inventariar **o que existe** de conteúdo aproveitável no repo do jogo (**modo leitura**). Zero pré-requisito. **Parcialmente adiantado:** o material de arquivo do líder já veio (9 vídeos + 4 fotos, 27 frames extraídos em `resources/frames/`), e a história dos 2 pivôs já está escrita nos ADRs/CHANGELOG. Falta varrer o resto. | Alta | — | JS 1 · agent | ⏳ Pendente | — |
| `SERP-PESQUISA` | **W1** | Inventário | Rodar a SERP de "GusWorld" e variantes: colisão de nome, o que já ranqueia. **Parte factual barata, e vem PRIMEIRO**: sem ela `D-NOME-SERP` e `NOME-REVISTA` não fecham e viram duas sessões. | Alta | — | JS 1 · agent | ⏳ Pendente | — |
| `EDICOES-RETRO` | **W1** | Conteúdo | **As 5 edições retroativas** (#1 o quadradinho → #5 o cockpit). **A fonte EXISTE:** o líder tinha as gravações pessoais (o dev do jogo confirmou ter mais material). Faz o site nascer com **revista de 5 números** em vez de "em breve". Inventariar e mapear cada gravação → edição. | Alta | `INV-CONTEUDO-A` | JS 3 · ambos | ⏳ Pendente | — |
| `SPOILER-POLICY` | **W2a** | Decisão | O que pode ser revelado e o que não. **A régua é do líder** (~365k palavras de deep-lore). **Imagem spoila tanto quanto texto.** ⚠️ **A política é upstream do PUSH, não do deploy:** mensagem de commit pushada é **imutável** e nenhuma auditoria posterior a remove. Insumo obrigatório de `INV-CONTEUDO-B`, `COPY-*`, `EDICOES-RETRO` e `KEY-ART`. Sessão "direitos e exposição". | Alta | `OBJETIVO-SITE` | JS 3 · ambos | ⏳ Pendente | — |
| `D-LICENCA` | **W2a** | Decisão | Licença do **site em si** (não herda GPLv3/CC-BY-SA/ARR) + política de espelhar asset do jogo. **Premissa corrigida:** CC-BY-SA morde **adaptação**, não agregação. Não fechar antes de `dr-advogado`/CLO. Sessão "direitos e exposição". | Alta | `OBJETIVO-SITE`, `D-PUBLICO` | JS 5 · ambos | ⏳ Pendente | — |
| `D-LIVROS-IA` | **W2a** | Decisão | **Os livros foram assistidos por IA?** Se sim + venda ARR, some a defesa estrutural e a manchete se escreve sozinha. **Verificar ANTES de divulgar.** Mitigado por `O-ARCO` (o livro é a obra seguinte, anunciado só na última edição), mas a pergunta continua. Sessão "direitos e exposição". | Alta | `OBJETIVO-SITE` | JS 2 · ambos | ⏳ Pendente | — |
| `D-FIGURAS` | **W2a** | Decisão | Figuras históricas reais reimaginadas (Faraday, Ada Lovelace, Hayek) no site. **Quase resolvido:** `docs/design/roster-analogos/OBRA-DE-FICCAO-E-METODOLOGIA.md` existe e o README já tem o parágrafo público. Agent verifica se cobre o caso web; líder confirma. Sessão "direitos e exposição". | Média | `D-LICENCA` | JS 2 · ambos | ⏳ Pendente | — |
| `D-DOACAO-PAYPAL` | **W2a** | Decisão | A doação PayPal **já é promessa pública** no README e interage com **"zero lucro"**, que é o pilar da defesa por licença. ⚠️ **Doação antes do build é o CTA mais danoso disponível** (o dado de "converte pouco" foi medido em jogos que **existem**; pedir dinheiro por nada entregue comunica outra coisa). Decidir se aparece no 1.0 e em que termos. Sessão "direitos e exposição". | Alta | `D-LICENCA` | JS 2 · líder | ⏳ Pendente | — |
| `AI-DISC-ESCOPO` | **W2a** | Decisão | **Pergunta aberta:** o `AI-DISCLOSURE.md` mora no repo do **jogo** (read-only). O item aqui só pode ser "produzir a **versão do site** + linkar o canônico", nunca editar o canônico. Confirmar. Sessão "direitos e exposição". | Alta | `D-LIVROS-IA` | JS 1 · líder | ⏳ Pendente | — |
| `NOME-REVISTA` | — | Decisão | ★ **DECIDIDO 2026-07-16: a revista se chama GLYFESSE.** Do léxico Sylvarin **dele**: `glyfa-` (glifo, palavra-código) + `-esse` (abstrato/coletivo) = **"a Escrita" / "a Compilação"**. ★ **O verbo `glyfe` significa ESCREVER e COMPILAR na mesma palavra** — logo **"Glyfesse #7" é a 7ª edição E o 7º build**: o build-in-public embutido no nome, sem metáfora. Amarra no canon ("Compilação do Codex" já é mecânica, `pillars.md:46`). **SERP virgem** (busca exata: **zero resultados**; só aproximações sem relação) — o oposto de "GusWorld", que é composto genérico. **Recusados:** "Compilação" (perde o mistério, SERP difícil), "GusPower" (a criança não tem o referente), "Build/Patch Notes" (inglês, exclui o leigo), `Lhinesse`/`Anhesse`, `Rimesse` (já em uso no placar). | Alta | `OBJETIVO-SITE` | JS 3 · líder | ✅ Concluído | — |
| `EDICAO-1-EXPLICA-NOME` | **W5** | Conteúdo | ★ **Requisito do líder: a Edição #1 explica o nome da revista.** **É a única coisa que DEVE ser explicada no site** — todo o resto fica sob "nunca dito, só sentido". Encaixa: a #1 é a do quadradinho, a edição mais crua, onde tudo se apresenta. **Faz 4 coisas de graça:** ensina uma palavra de Sylvarin na abertura (a camada que pai e filho decifram **juntos**), estabelece o tom do Gus (ele explicaria com precisão exagerada — é a voz dele), **prepara o ARG sem anunciar** (glifo é cifra), e justifica a numeração. **Quem explica é o Gus**, não o líder. Carregar: `glyfa-` + `-esse`; **`glyfe` = escrever E compilar**; logo #1 é a 1ª edição **e** o 1º build — **não é trocadilho, é o idioma**. | Alta | `NOME-REVISTA`, `A-VOZ`, `SECOES-REVISTA` | JS 2 · ambos | ⏳ Pendente | — |
| `D-NOME-SERP` | **W2b** | Decisão | "GusWorld" colide na SERP? **Custa minutos e pode invalidar o canal de indexação.** Renomear repo vazio hoje é trivial. Sessão "cara e alcance". | Alta | `SERP-PESQUISA` | JS 2 · ambos | ⏳ Pendente | — |
| `D-IDENTIDADE` | **W2b** | Decisão | Identidade de marca; insumo de `DESIGN-IDENTIDADE`. **"Opção 1+2+3"** (pixel art + key art pintada + retratos cel-shaded **juntos**) precisa ser desambiguada. **Não interpretar.** Sessão "cara e alcance". | Alta | `OBJETIVO-SITE`, `D-PUBLICO`, `NOME-REVISTA` | JS 5 · líder | ⏳ Pendente | — |
| `MODERACAO` | **W2b** | Decisão | **Aberto pelo líder.** Rage, bullying e contato por e-mail/issues. **Ele aprovou 4 caminhos:** resposta ao ataque de IA **pronta antes** (a defesa por **licença**: GPLv3+CC-BY-SA+freeware+zero lucro fecha o circuito econômico); contato **só e-mail, sem formulário**, sem promessa de resposta; estender a **issue policy** do jogo; e o site **não tem onde escrever**. ⚠️ **O furo que ele mesmo nomeou:** *"o repo github e codeberg terão link no site e as pessoas vão clicar e abrir rage-issues"* → ver `RAGE-ISSUES`. Sessão "cara e alcance". | Alta | `OBJETIVO-SITE` | JS 3 · líder | ⏳ Pendente | — |
| `RAGE-ISSUES` | **W2b** | Decisão | **O vazamento da defesa estrutural:** o site não tem caixa de texto, **mas linka dois repos que têm issues abertas**. Caminhos não discutidos: desligar issues no espelho GitHub (o Codeberg é canônico); template que filtra; policy no topo do README; ou aceitar e fechar sem resposta (o que a policy do jogo já manda). | Média | `MODERACAO` | JS 2 · líder | ⏳ Pendente | — |
| `INV-CONTEUDO-B` | **W3** | Inventário | Inventariar **o que é publicável** (subconjunto do A, filtrado pelas decisões). Separado do A porque fundidos criam ciclo falso. | Alta | `INV-CONTEUDO-A`, `SPOILER-POLICY`, `D-LICENCA`, `D-FIGURAS`, `D-LIVROS-IA` | JS 2 · agent | ⏳ Pendente | — |
| `I18N-CONTRATO-URL` | **W3** | Fundação | **Contrato de URL bilíngue decidido ANTES da stack.** Resolve o ciclo `D-STACK` ⇄ i18n: **a URL é mais cara de reverter; a stack se adapta a ela.** `hreflang` recíproco + `x-default`; **nunca redirect por IP**; seletor visível. ⚠️ **One-way-door:** permalink publicado + RSS cacheado = URL que não pode mudar. | Alta | `OBJETIVO-SITE` | JS 2 · ambos | ⏳ Pendente | — |
| `IA-WIREFRAME` | **W3** | Fundação | Arquitetura de informação e wireframe (**esqueleto, sem pele**). **NÃO depende de `DESIGN-IDENTIDADE`**: é ele que revela **quantas páginas existem**, insumo direto de `D-STACK`. A metáfora dá a IA de graça: **sumário de revista** (a revista BR já resolvia leigo × expert com sumário, não com arquitetura). | Alta | `OBJETIVO-SITE`, `D-PUBLICO`, `INV-CONTEUDO-B` | JS 3 · agent | ⏳ Pendente | — |
| `FRONTEIRA-REPO` | **W3** | Decisão | **Onde nascem `LOGO` e `KEY-ART`?** O jogo é read-only, então nascem aqui — mas aí ou o jogo depende de asset do site, ou o asset duplica e diverge em dois repos com licenças diferentes. **Barato agora, caro depois.** | Alta | `D-LICENCA` | JS 2 · líder | ⏳ Pendente | — |
| `CTA-UNICO` | **W3** | Fundação | **Sem build, sem data e sem e-mail, o visitante não tem ação nenhuma e o site vira folheto sem retorno.** **Parcialmente respondido pelo brainstorm:** os CTAs candidatos são **votar no cupom**, **forjar na Glyfa**, **colar figurinha** e **ler o devlog** — falta o líder cravar **o único**. | Alta | `OBJETIVO-SITE`, `D-DOACAO-PAYPAL` | JS 2 · ambos | ⏳ Pendente | — |
| `REPO-REMOTE` | **W3** | Fundação | ✅ **Feito de fato** (remote configurado, 5 commits pushados). Falta só o `LICENSE`. | Média | — | JS 1 · agent | 🔍 Pendente verificação | — |
| `LICENSE-README` | **W3** | Fundação | `LICENSE` + `README` do repo do site, conforme `D-LICENCA`. **Repo público sem `LICENSE` = todos os direitos reservados por default** (conservador e reversível) — não bloqueia commit, bloqueia espelhar asset de terceiro. | Média | `REPO-REMOTE`, `D-LICENCA` | JS 2 · agent | ⏳ Pendente | — |
| `D-STACK` | **W4** | Decisão | **EM ABERTO, decisão exclusiva do líder. Esta tabela não decide stack.** Requisito: **DINÂMICO** (site parado reprova). Plano Hostinger **sem Node**. *("html5/php/mysql" foi **exemplo** dele, não escolha.)* **Critérios de entrada obrigatórios** (cada um reaparece como implementação): RSS, i18n en/pt-br, pixel art na web, LCP, SEO técnico, **"zero terceiro por padrão"**, e as peças interativas (quadradinho, cupom, Glyfa, álbum). Número de páginas vem de `IA-WIREFRAME`. **Gargalo de ~8 itens.** | Alta | `IA-WIREFRAME`, `I18N-CONTRATO-URL` | JS 4 · líder | ⏳ Pendente | — |
| `STACK-ADR` | **W4** | Fundação | ADR registrando a decisão e as alternativas descartadas. **Barato: 16 ADRs do jogo servem de template.** | Média | `D-STACK` | JS 3 · agent | ⏳ Pendente | — |
| `DESIGN-IDENTIDADE` | **W4** | Design | **Vai ao `/design` COM o líder. Não interpretar.** **Constraint de entrada:** os contrastes de `PALETA-CONTRASTE-CALC`. **Maior Job Size na fila do líder, e o mais bloqueante: nenhuma página nasce antes disto.** Inclui `MOBILE-RISCO` (ele quer decidir aqui, com protótipo nos dois tamanhos). | Alta | `D-IDENTIDADE`, `PALETA-CONTRASTE-CALC`, `IA-WIREFRAME` | JS 13 · líder | 🎨 Pendente design | — |
| `MOBILE-RISCO` | **W4** | Design | ★ **O maior risco prático, e ninguém tinha visto:** a metáfora de revista é **A4, retrato, 2 colunas — não cabe em 390px**. E **a criança chega de celular, por link** (67% dos 13-15 vivem em rede social). **A revista tem que ser BRINQUEDO primeiro e MEMÓRIA depois**: se inverter, o adulto sorri e a criança sai em 4 segundos. Decidir no `/design`. | Alta | `DESIGN-IDENTIDADE` | JS 5 · líder | 🎨 Pendente design | — |
| `PALETA-CONTRASTE` | **W4** | Design | Paleta final tokenizada. **JS baixo: o cálculo já está feito.** Atenção ao magenta `#c23fd9` (4.37:1 falha AA em texto normal). | Média | `DESIGN-IDENTIDADE` | JS 2 · agent | 🎨 Pendente design | — |
| `LOGO` | **W5** | Design | **Item de AGENDA DO LÍDER, não de arte: o agent contribui zero.** Restrição do PixelLab: geração **por imagem** = base64 inline = **só ele, no webui**, 5-20 iterações. **A lente de esforço diz que não cabe neste ciclo:** placeholder assumido = **wordmark em `PixelOperatorMono`** (CC0, já no repo). | Média | `DESIGN-IDENTIDADE`, `FRONTEIRA-REPO`, `NOME-REVISTA` | JS 8 · líder | 🎨 Pendente design | — |
| `KEY-ART` | **W5** | Design | **JS 5 com reuso da `catedral_mae.png`** (a única peça pintada de qualidade que existe) — **evita a restrição do PixelLab**. **JS 13 se nova** (não cabe, per lente de esforço). ⚠️ Key art de landing **tende a ser adaptação**, que é justo o caso em que CC-BY-SA morde. Superfície de `AUD-SPOILER` (imagem spoila). | Média | `DESIGN-IDENTIDADE`, `FRONTEIRA-REPO`, `D-LICENCA`, `SPOILER-POLICY` | JS 5 (reuso) / 13 (nova) · líder | 🎨 Pendente design | — |
| `COPY-LEIGO` | **W5** | Conteúdo | Copy do eixo leigo. **O adulto leigo não é genérico: é o nostálgico.** Cobre também 11-15. **Onde o bilíngue morde mais forte** (home+about × 2 idiomas = 4 peças). O `README` é dev-facing e **não serve de fonte** — o registro leigo é outro. | Média | `A-VOZ`, `INV-CONTEUDO-B`, `SPOILER-POLICY` | JS 8 · ambos | ⏳ Pendente | — |
| `COPY-EXPERT` | **W5** | Conteúdo | Copy do eixo expert. **As lentes recomendaram CORTAR; o líder decidiu MANTER.** Mais barato que o leigo: a fonte já está escrita (README tech stack, 16 ADRs, CHANGELOG). Custo aceito: superfície dobrada em `AUD-SPOILER`. | Baixa | `A-VOZ`, `INV-CONTEUDO-B`, `SPOILER-POLICY` | JS 5 · ambos | ⏳ Pendente | — |
| `AI-DISC-SECAR` | **W5** | Conteúdo | Produzir a **versão do site** do AI disclosure + **linkar o canônico** (nunca editar o do jogo). **Secar:** tirar a defesa por **credencial** (foi ridicularizada publicamente) e trocar defesa por **intenção** → defesa por **LICENÇA**. **O que fica no lugar é a história** (`conceito.md` §1 e §8): médico 6:15-20h + a issue #1 do Funplay onde ele auditou a ferramenta antes de adotar. **Fato verificável, não retórica.** Fonte já bilíngue: é corte, não escrita. | Alta | `AI-DISC-ESCOPO`, `D-LIVROS-IA` | JS 4 · ambos | ⏳ Pendente | — |
| `SECOES-REVISTA` | **W5** | Conteúdo | **Entrevista** (★ o Gus entrevista o líder; a 1ª pergunta é *"por que você me fez?"* e a resposta é `conceito.md` §1), a **NOTA** do jogo inacabado (*"Gráficos: 6 (o Gus só anda pra um lado)"* — **sobe a cada edição**), **pôster central** (a `catedral_mae.png` já é), **brinde** (wallpaper + a fonte CC0 — **não é lembrancinha: o projeto inteiro é sobre dar a ferramenta**), **classificados in-world**, **HQ** (tirinha 3-4 quadros, ideia dele), **tabela de lançamentos VAZIA**, **errata + cartas com deboche**. | Média | `A-VOZ`, `INV-CONTEUDO-B`, `SPOILER-POLICY` | JS 8 · ambos | ⏳ Pendente | — |
| `SECAO-PROGRAMACAO` | **W5** | Conteúdo | ★ **O eixo expert dentro da metáfora** (as revistas BR tinham detonado **e** seção de código: resolveram leigo × expert em 1994). **O ADR como matéria** (16 prontos: é publicar, não escrever), **"faça você mesmo: o quadradinho"** (a criança que gosta de computador vira dev ali), **o erro da semana**, **código real para copiar** (GPLv3). ★ **Acréscimo do líder:** publicar **o commit real + como foi resolvido + como foi pensado** — *"dar contexto ao acerto, ao erro, à correção"* — **ensinando a API do `glintfx`** de tabela. **O beco sem saída tem valor:** todo mundo publica a solução, ninguém publica o raciocínio. | Média | `A-VOZ`, `INV-CONTEUDO-B` | JS 5 · ambos | ⏳ Pendente | — |
| `I18N-ESTRUTURA` | **W6** | Implementação | Implementação do i18n conforme o contrato de URL já fixado. Como **critério** já apareceu em `D-STACK`. ⚠️ **O bilíngue é o maior risco de abandono do devlog** (cada post vira dois). Regra editorial: **um post monolíngue publicado vale mais que dois nunca publicados.** | Média | `D-STACK`, `I18N-CONTRATO-URL` | JS 5 · agent | ⏳ Pendente | — |
| `QUADRADINHO` | **W6** | Implementação | ★ **A peça central da primeira dobra.** Abre com o quadrado de maio numa sala vazia; setinhas movem; sem graça **de propósito** por 5s; então **vira o Gus** (4 direções, diagonal). **A pessoa SENTE a evolução na mão.** **Não tem arte: é um retângulo que anda — essa é a graça.** O frame original existe (`resources/frames/`) e **o quadradinho já era CIANO**, a cor dos óculos do Gus. ⚠️ **Mobile sem teclado é problema aberto** (`MOBILE-RISCO`). | Alta | `D-STACK`, `DESIGN-IDENTIDADE`, `MOBILE-RISCO` | JS 5 · agent | ⏳ Pendente | — |
| `LINHA-TEMPO` | **W6** | Implementação | A linha do tempo jogável: maio (quadrado) → junho (um lado só) → julho (diagonal) → agosto (cockpit). **Arrasta o tempo, o jogo evolui.** ★ **Cada marco novo estica a linha sozinho: a home fica mais impressionante enquanto o líder trabalha.** Data-driven (o líder adiciona estágio **sem sessão de dev**, senão morre). | Alta | `QUADRADINHO`, `EDICOES-RETRO` | JS 5 · agent | ⏳ Pendente | — |
| `PAGINA-LANDING` | **W6** | Implementação | A landing. **Sem ela os `TST-*` não têm o que testar e os `AUD-*` auditam o vácuo.** Inclui **PRESS START** sobre a key art e **a capa da edição** com chamadas. | Alta | `D-STACK`, `IA-WIREFRAME`, `DESIGN-IDENTIDADE`, `COPY-LEIGO`, `KEY-ART`, `CTA-UNICO`, `I18N-ESTRUTURA` | JS 8 · agent | ⏳ Pendente | — |
| `BANCA` | **W6** | Implementação | **A banca como home:** edições enfileiradas, **o arquivo VIRA a home**. Nasce cheia (5 edições retro). **As bordas amarelam com a IDADE da edição:** a #1 encardida, a nova branquinha — **dá para ver qual é velha só de olhar**. | Média | `PAGINA-LANDING`, `EDICOES-RETRO`, `ENVELHECER` | JS 5 · agent | ⏳ Pendente | — |
| `PAGINA-DEVLOG` | **W6** | Implementação | Listagem + template de edição. **JS 3 se o devlog for 1 post** (recomendação da lente de esforço: **cabe 1 post, o dos 2 pivôs** — melhor história do projeto, já escrita no CHANGELOG/ADRs, **independente de marco**). | Média | `D-STACK`, `IA-WIREFRAME`, `DESIGN-IDENTIDADE`, `SECOES-REVISTA`, `I18N-ESTRUTURA` | JS 5 (→3) · agent | ⏳ Pendente | — |
| `ENVELHECER` | **W6** | Implementação | ★ A página que envelhece: **a dobra onde você já leu** (prova que você **voltou**), **bordas amarelam com a idade da edição**, **amassa ao arrastar**, e ★ **a mancha de café é DE OUTRA PESSOA** — **a única marca que insinua comunidade SEM contador de visitas** (o oposto do "12 votos", que comunica projeto morto). ⚠️ A mancha **não pode cair em cima de texto**; tudo respeita `prefers-reduced-motion`. | Média | `DESIGN-IDENTIDADE`, `PAGINA-LANDING` | JS 5 · agent | ⏳ Pendente | — |
| `SOM-2-BOTOES` | **W6** | Implementação | **2 botões (decisão dele): efeitos ON, música OFF** por padrão. **O clique REAL do menu do jogo** (o arquivo existe: **custo zero**, e cria memória — quando a pessoa jogar, reconhece o som do site). **Som no brinquedo** (a interação precede o áudio, o navegador libera). **Foley de papel** = **o único som que não existe** (buscar CC0). O M6 já entregou música/SFX/crossfade: **reusar, não criar**. | Média | `PAGINA-LANDING`, `QUADRADINHO` | JS 3 · agent | ⏳ Pendente | — |
| `PIXEL-ART-WEB` | **W6** | Implementação | `image-rendering: pixelated` + **escala inteira** + sprite sheet via CSS `steps()` (**zero JS**). ★ **A animação vem dos walk cycles que o PixelLab JÁ gerou** (`walk/<dir>/{0..3}.png`) — **zero frame novo desenhado**. Fonte `PixelOperatorMono` **CC0, já no repo** (sem licença a negociar). ⚠️ **Pixel NUNCA em parágrafo**: só display e título. | Baixa | `D-STACK`, `PAGINA-LANDING` | JS 5 · agent | ⏳ Pendente | — |
| `O-FEIO` | **W6** | Implementação | ★ **Só o líder pode fazer isto.** **Galeria de bugs** (com legenda rindo — *"o Gus atravessou a parede e viu Deus"*; **uma publisher não pode publicar o próprio bug**), **cemitério das ideias mortas** (Godot, Qt6, o 3D — **já escrito nos ADRs**; e **não começa no Godot: começa numa conversa sobre Railroad Tycoon**), **botão CRT/scanline**, **detonado do jogo que não existe** (páginas em branco + "AGUARDE"). ⚠️ Scanline sobre texto derruba contraste: **desligável**. | Média | `PAGINA-LANDING`, `INV-CONTEUDO-B` | JS 5 · agent | ⏳ Pendente | — |
| `CUPOM` | **W6** | Implementação | O cupom recortável: pontilhado, tesoura, **resultado na PRÓXIMA EDIÇÃO**. ★ **A lentidão vira estética:** poll aberto há 2 meses não é site morto, é "aguardando a próxima edição" — **a maior fraqueza do projeto vira a convenção do formato**. **Dá para rasgar errado** (com desfazer: frustrar criança não é o objetivo). **Poll é só consulta; o líder decide.** | Média | `D-STACK`, `PAGINA-LANDING`, `ZERO-DADO` | JS 5 · agent | ⏳ Pendente | — |
| `RIMESSE` | **W6** | Implementação | ★ **O placar não conta votos, conta CONSEQUÊNCIAS:** *"7 coisas neste jogo existem porque alguém votou aqui"*, com prova visual. **Funciona com número pequeno** (12 votos comunica projeto morto; 7 consequências comunica projeto que ouve). Nome derivado do léxico Sylvarin. **A frase que protege o canon é a mesma que prova que votar funciona:** *"Vocês opinam. Eu decido. Mas eu já mudei de ideia 7 vezes por causa de vocês."* | Média | `CUPOM` | JS 2 · agent | ⏳ Pendente | — |
| `GLYFA` | **W6** | Implementação | ★ Forja de nomes em Sylvarin: raiz + raiz, mostra o significado na hora (*mor-* sombra + *lhin-* voz = **Morlhin**, "voz-sombra" — nome que o líder **já canonizou**). ★ **Vocabulário fechado NÃO PODE gerar palavrão: é o que torna UGC viável com público infantil e dev solo** (moderação por design, custo zero). **Alimenta os polls** — é a fábrica de opções. **O Sylvarin nasceu de uma conversa sobre Tolkien com o Bruno.** | Média | `D-STACK`, `PAGINA-LANDING` | JS 3 · agent | ⏳ Pendente | — |
| `ALBUM` | **W6** | Implementação | Álbum de figurinhas em `localStorage`. ★ **Criança cola álbum; adulto COLECIONOU álbum — o mesmo objeto pega os dois públicos.** Zero conta, zero dado. ⚠️ Degradar com graça: anônimo, storage cheio, storage off. **Perder o álbum não pode quebrar a página.** | Média | `PAGINA-LANDING`, `ZERO-DADO` | JS 3 · agent | ⏳ Pendente | — |
| `ARG-SYLVARIN` | **W6** | Implementação | ★ **Enigma REAL em Sylvarin cifrado** nas páginas do Diário, com resposta certa. Prêmio: **página secreta** + **apelido nos créditos**. **Precedente:** o Animal Well (solo dev, engine C++ própria, devblog num Blogspot feio) escondeu um ARG e **um Discord se formou para resolver ANTES do jogo existir**. **Custo: texto, não arte.** ⚠️ A página secreta **não pode ser indexável** (vaza no Google e mata o enigma). | Média | `GLYFA`, `SPOILER-POLICY`, `PAGINA-DEVLOG` | JS 5 · ambos | ⏳ Pendente | — |
| `RSS` | **W6** | Implementação | Feed do devlog. ★ **É a única retenção possível** (o líder rejeitou e-mail), e **não coleta nada**: o leitor puxa, o site não sabe quem é. Como **critério** já apareceu em `D-STACK`. ⚠️ Carrega URLs absolutas: **sem contrato de URL, o feed nasce errado nos leitores que já cachearam**. | Média | `D-STACK`, `PAGINA-DEVLOG`, `I18N-CONTRATO-URL` | JS 3 · agent | ⏳ Pendente | — |
| `SEO-TECNICO` | **W6** | Implementação | `schema.org/VideoGame` (JSON-LD) + OG/Twitter Card (o compartilhamento é no X, pela conta pessoal dele) + sitemap + `hreflang`. ⚠️ **Não anunciar data que não existe.** | Média | `PAGINA-LANDING`, `PAGINA-DEVLOG`, `I18N-ESTRUTURA`, `D-NOME-SERP` | JS 5 · agent | ⏳ Pendente | — |
| `CI-SETUP` | **W6** | Fundação | CI. **JS 5 = 3 + 2 de imposto de debug cego:** o **log de CI não existe na API do Forgejo** — ler erro exige `forgejo-runner exec` local. O runner `claudio` (label `docker`) **já existe** via systemd: **não registrar novo**. Política local-first: **pesado só em PR/release**. | Baixa | `REPO-REMOTE`, `D-STACK` | JS 5 · agent | ⏳ Pendente | — |
| `PERF-LCP` | **W7** | Performance | LCP e peso, principalmente pela key art. ⚠️ **Nunca `loading="lazy"` no hero**; `preload` + `fetchpriority="high"`. **O site não pode pesar mais que o jogo** (o Animal Well inteiro tem 33 MB). | Baixa | `PAGINA-LANDING`, `PIXEL-ART-WEB`, `KEY-ART` | JS 3 · agent | ⏳ Pendente | — |
| `TST-A11Y` | **W8** | Testes | Ver `TESTES.md`. **O teste mais importante deste site:** contraste (o magenta falha AA em texto normal), `prefers-reduced-motion` num site que **é** movimento, **pixel nunca em parágrafo**, teclado, e **o elemento quebrável não pode ser o único caminho para a informação**. | Baixa | `PALETA-CONTRASTE`, `PAGINA-LANDING`, `PAGINA-DEVLOG`, `ENVELHECER` | JS 3 · agent | ⏳ Pendente | — |
| `TST-I18N` | **W8** | Testes | Ver `TESTES.md`. Paridade en/pt, `hreflang` recíproco, chaves órfãs. **Este item só existe porque o site é bilíngue: é o custo escondido do requisito.** | Baixa | `I18N-ESTRUTURA`, `PAGINA-LANDING`, `PAGINA-DEVLOG` | JS 3 · agent | ⏳ Pendente | — |
| `TST-LINKS` | **W8** | Testes | Ver `TESTES.md`. Inclui os links para fora que o site tem **por design**: os 2 repos, a wiki do jogo, o `AI-DISCLOSURE.md` canônico. | Baixa | `PAGINA-LANDING`, `PAGINA-DEVLOG`, `AI-DISC-SECAR` | JS 2 · agent | ⏳ Pendente | — |
| `TST-HTML-VALID` | **W8** | Testes | Ver `TESTES.md`. Barato, e pega erro estrutural que quebra leitor de tela. | Baixa | `PAGINA-LANDING`, `PAGINA-DEVLOG` | JS 2 · agent | ⏳ Pendente | — |
| `TST-CWV` | **W8** | Testes | Ver `TESTES.md`. **Mobile é o caso de teste, não o desktop.** | Baixa | `PERF-LCP` | JS 2 · agent | ⏳ Pendente | — |
| `TST-GLYFA-PALAVRAO` | **W8** | Testes | ★ **O teste mais importante da Glyfa, e o vocabulário é pequeno: dá para força bruta.** Testar **todas** as combinações possíveis de raiz+raiz e raiz+sufixo. **Nenhuma pode gerar palavrão.** É o que sustenta a decisão de permitir UGC com público infantil e dev solo. | Média | `GLYFA` | JS 2 · agent | ⏳ Pendente | — |
| `AUD-SPOILER` | **W9** | Auditoria | Ver `AUDITORIAS.md`. **A mais crítica.** Superfície que ninguém lembra: **alt-text**, **nome de arquivo**, **a key art** (imagem spoila tanto quanto texto), **o que o ARG revela** — e ⚠️ **mensagem de commit, que é IMUTÁVEL** (nenhuma auditoria posterior remove; por isso a **política** é upstream do push). Superfície **dobrada** por manter `COPY-EXPERT`. | Baixa | `SPOILER-POLICY`, `COPY-LEIGO`, `COPY-EXPERT`, `SECOES-REVISTA`, `EDICOES-RETRO`, `KEY-ART`, `ARG-SYLVARIN` | JS 3 · agent | ⏳ Pendente | — |
| `AUD-LICENCA` | **W9** | Auditoria | Ver `AUDITORIAS.md`. **Três regimes convivendo** (GPLv3 / CC-BY-SA / livros ARR) + **o site em si precisa de licença própria**. Foco real: **adaptação** de asset CC-BY-SA (a key art de landing tende a ser). **Não inflar pelos PDFs élficos** (gitignored, nunca foram ao repo). Depende de `ai-assets-provenance.md` (no repo do jogo). Envolver `dr-advogado`/CLO. | Baixa | `D-LICENCA`, `LICENSE-README`, `LOGO`, `KEY-ART`, `PIXEL-ART-WEB`, `COPY-LEIGO`, `PAGINA-LANDING` | JS 8 · ambos | ⏳ Pendente | — |
| `AUD-IA` | **W9** | Auditoria | ★ **A auditoria que este projeto precisa e ninguém pediu.** O ataque vem (clima ~85% negativo, e o projeto usa PixelLab). Verificar: a **defesa por LICENÇA** está dita e verificável? A defesa por **intenção** e por **credencial** foram removidas? O disclosure está **seco e no rodapé, nunca na manchete**? **Nada foi negado nem escondido** (mentir é ruína documentada: o Clair Obscur perdeu o GOTY por negar; o substituto também usou IA e só não mentiu). | Média | `AI-DISC-SECAR`, `SECAO-PROGRAMACAO`, `PAGINA-LANDING` | JS 3 · agent | ⏳ Pendente | — |
| `AUD-LGPD` | **W9** | Auditoria | Ver `AUDITORIAS.md`. ⬇️ **REBAIXADA por `ZERO-DADO`** (era Média/JS 5, virou Baixa/JS 2): sem conta, sem login, sem dado. **O que sobra é o vetor real de site estático: fonte de terceiro** (Google Fonts, CDN, embed = transferem IP) + **o `access_log` do Apache**, que grava IP de todo visitante por padrão, sem TTL — **é config no painel da Hostinger, não código**, e seria a maior coleta do site sem ninguém pedir. | Baixa | `PAGINA-LANDING`, `SEO-TECNICO`, `DEPLOY-STAGING` | JS 2 · agent | ⏳ Pendente | — |
| `AUD-SEO` | **W9** | Auditoria | Ver `AUDITORIAS.md`. Checklist contra `SEO-TECNICO` + `D-NOME-SERP`. | Baixa | `SEO-TECNICO`, `RSS`, `TST-LINKS`, `TST-I18N`, `TST-CWV` | JS 2 · agent | ⏳ Pendente | — |
| `DEPLOY-STAGING` | **W10** | Release | Publicar em staging, **sem exposição pública**. Metade executável do antigo `DEPLOY-FTP`. **Credencial Hostinger só o líder tem** → não é 100% delegável. | Baixa | W8 completa, W9 completa | JS 4 · ambos | ⏳ Pendente | — |
| `DOMINIO-DNS` | — | Decisão | ★ **RESOLVIDO 2026-07-16: o líder comprou `gusworld.site` por 3 anos** (expira 2029-07-16) **e configurou tudo sozinho em 56 segundos** — domínio, website (`vhost_type: addon`, root `/home/u_redacted/domains/gusworld.site/public_html`) e DNS (`@` ALIAS → `gusworld.site.cdn.hstgr.net`, `www`, MX, SPF, DKIM×3, DMARC). Verificado por mim via MCP. **Fecha a pergunta de fundo: o domínio é do JOGO, não da revista** — `Glyfesse` é o formato, `gusworld.site` é o endereço. Usa **2 de 3** slots do plano Premium. ⚠️ **Duas notas para o `D-STACK`:** (1) **o CDN da Hostinger está no caminho** e CDN é cache — o site tem poll ao vivo, álbum e página que envelhece: decidir **o que NÃO pode ser cacheado**; (2) DMARC em `p=none`, irrelevante enquanto `ZERO-DADO` valer. | Alta | — | JS 3 · líder | ✅ Concluído | ✓ |
| `D-GO-LIVE` | **W10** | Decisão | **Produção NÃO AUTORIZADA.** Go/no-go do líder + autorização expressa de push **naquela ocasião** (autorização anterior não vale). *(O domínio já existe e o DNS já aponta — `DOMINIO-DNS` ✅ — mas isso **não** é autorização de publicar.)* | Baixa | `DEPLOY-STAGING`, `AUD-SPOILER`, `AUD-LICENCA`, `AUD-IA`, `AUD-LGPD`, `AUD-SEO` | JS 1 · líder | ⛔ Bloqueado (autorização do líder) | — |
| `TAG-1.0` | **W10** | Release | Tag de versão. Pré-requisito de `WIKI-DOC-INICIANTE`. | Baixa | `D-GO-LIVE` | JS 1 · agent | ⛔ Bloqueado (autorização do líder) | — |
| `WIKI-DOC-INICIANTE` | **W11** | Pós-release | **Fecha a tabela** (regra global). Wiki nativa + doc `.md` extensa em registro didático para **iniciante em computação** (explica todo jargão, sem assumir conhecimento). Deriva de `docs/`, **linka, não duplica**. Execução **sempre** via `technical-writer`/`ux-writer`. **A lente de esforço diz que não cabe neste ciclo** — e nem deveria: pós-release por regra. Barateado: a wiki do jogo no Codeberg já existe com estrutura. | Baixa | `TAG-1.0` | JS 13 · agent | ⏳ Pendente | — |

---

## Puxável AGORA

**1 sessão do líder + 3 leituras de agent. O resto nasce bloqueado.**

- **Agent, modo leitura, zero pré-requisito (WIP agent = 3):** `INV-CONTEUDO-A`, `SERP-PESQUISA`, `EDICOES-RETRO` (o inventário; a fonte existe — o líder tinha as gravações).
- **Sessão do líder (WIP = 1):** escolher **uma** das duas pautas de W2 — **"direitos e exposição"** (`SPOILER-POLICY`, `D-LICENCA`, `D-LIVROS-IA`, `D-FIGURAS`, `D-DOACAO-PAYPAL`, `AI-DISC-ESCOPO`) ou o resto de **"cara e alcance"** (`D-NOME-SERP`, `D-IDENTIDADE`, `MODERACAO`, `RAGE-ISSUES`).

> **`NOME-REVISTA` FECHOU em 2026-07-16: a revista é a GLYFESSE.** E ela **encolheu o `D-NOME-SERP`**: o risco original era "GusWorld" ser composto genérico e disputar a SERP. **"Glyfesse" é termo virgem (zero resultados na busca exata)** — quem buscar só pode estar procurando ele. O `D-NOME-SERP` continua para o **jogo**, mas a **revista** já nasce com SERP limpa. **Oportunidade não decidida:** se o nome é virgem, o domínio provavelmente está livre — mas há uma pergunta de fundo que ninguém fez ainda: **o domínio deve ser do JOGO (`gusworld`) ou da REVISTA (`glyfesse`)?** Não decidir sozinho; `DOMINIO-DNS` está `⛔ Bloqueado`.

**Recomendação:** **"direitos e exposição"** agora — é a família que trava mais coisa a jusante (`INV-CONTEUDO-B` depende de 4 itens dela, e sem ele não há `IA-WIREFRAME`, logo não há `D-STACK`).

**Sete decisões travam a fila. Proposta: 2 sessões, não 7 interrupções** — agrupadas por família mental, para evitar fadiga de decisão. `D-STACK` fica de fora de propósito: precisa de `IA-WIREFRAME`, que precisa de `INV-CONTEUDO-B`.

Lembrete do limite que morde: **revisão pendente = 2**.

---

## Scoring WSJF

WSJF = CoD / Job Size. CoD = Valor + Criticidade + Redução de Risco (1-20 cada; CoD máx 60). **Herdado da lente de valor de 2026-07-15**, com os itens novos pontuados pela thread (que conduziu o brainstorm em primeira mão) e os fechados removidos.

| ID | Valor | Criticidade | Redução de Risco | CoD | Job Size | WSJF | Rank |
|---|---|---|---|---|---|---|---|
| `SERP-PESQUISA` | 8 | 10 | 6 | 24 | 1 | **24.0** | 1 |
| `INV-CONTEUDO-A` | 9 | 6 | 5 | 20 | 1 | **20.0** | 2 |
| `AI-DISC-ESCOPO` | 4 | 10 | 10 | 24 | 1 | **24.0** | 3 |
| `D-LIVROS-IA` | 9 | 12 | 18 | 39 | 2 | **19.5** | 4 |
| `D-NOME-SERP` | 12 | 17 | 16 | 45 | 2 | **22.5** | 5 |
| `RIMESSE` | 12 | 6 | 6 | 24 | 2 | **12.0** | 6 |
| `NOME-REVISTA` | 14 | 14 | 10 | 38 | 3 | **12.7** | 7 |
| `I18N-CONTRATO-URL` | 6 | 14 | 14 | 34 | 2 | **17.0** | 8 |
| `D-DOACAO-PAYPAL` | 8 | 12 | 14 | 34 | 2 | **17.0** | 9 |
| `RAGE-ISSUES` | 4 | 10 | 14 | 28 | 2 | **14.0** | 10 |
| `FRONTEIRA-REPO` | 5 | 12 | 14 | 31 | 2 | **15.5** | 11 |
| `SPOILER-POLICY` | 5 | 13 | 17 | 35 | 3 | **11.7** | 12 |
| `EDICOES-RETRO` | 16 | 12 | 6 | 34 | 3 | **11.3** | 13 |
| `MODERACAO` | 6 | 12 | 16 | 34 | 3 | **11.3** | 14 |
| `IA-WIREFRAME` | 8 | 10 | 8 | 26 | 3 | **8.7** | 15 |
| `GLYFA` | 14 | 6 | 6 | 26 | 3 | **8.7** | 16 |
| `TST-GLYFA-PALAVRAO` | 3 | 6 | 17 | 26 | 2 | **13.0** | 17 |
| `D-LICENCA` | 6 | 14 | 19 | 39 | 5 | **7.8** | 18 |
| `D-STACK` | 6 | 12 | 14 | 32 | 4 | **8.0** | 19 |
| `CTA-UNICO` | 12 | 10 | 6 | 28 | 2 | **14.0** | 20 |
| `SOM-2-BOTOES` | 10 | 5 | 4 | 19 | 3 | **6.3** | 21 |
| `QUADRADINHO` | 18 | 8 | 6 | 32 | 5 | **6.4** | 22 |
| `RSS` | 12 | 13 | 8 | 33 | 3 | **11.0** | 23 |
| `D-IDENTIDADE` | 10 | 12 | 16 | 38 | 5 | **7.6** | 24 |
| `AI-DISC-SECAR` | 12 | 14 | 17 | 43 | 4 | **10.8** | 25 |
| `STACK-ADR` | 3 | 7 | 12 | 22 | 3 | **7.3** | 26 |
| `LINHA-TEMPO` | 16 | 8 | 5 | 29 | 5 | **5.8** | 27 |
| `D-FIGURAS` | 5 | 8 | 13 | 26 | 2 | **13.0** | 28 |
| `INV-CONTEUDO-B` | 11 | 9 | 13 | 33 | 2 | **16.5** | 29 |
| `SECAO-PROGRAMACAO` | 12 | 6 | 5 | 23 | 5 | **4.6** | 30 |
| `ENVELHECER` | 12 | 5 | 4 | 21 | 5 | **4.2** | 31 |
| `ALBUM` | 12 | 5 | 4 | 21 | 3 | **7.0** | 32 |
| `CUPOM` | 12 | 8 | 5 | 25 | 5 | **5.0** | 33 |
| `ARG-SYLVARIN` | 16 | 6 | 6 | 28 | 5 | **5.6** | 34 |
| `LICENSE-README` | 4 | 8 | 12 | 24 | 2 | **12.0** | 35 |
| `SECOES-REVISTA` | 13 | 6 | 5 | 24 | 8 | **3.0** | 36 |
| `COPY-LEIGO` | 15 | 8 | 6 | 29 | 8 | **3.6** | 37 |
| `O-FEIO` | 13 | 6 | 5 | 24 | 5 | **4.8** | 38 |
| `PAGINA-LANDING` | 16 | 8 | 6 | 30 | 8 | **3.8** | 39 |
| `BANCA` | 13 | 6 | 4 | 23 | 5 | **4.6** | 40 |
| `PAGINA-DEVLOG` | 12 | 6 | 4 | 22 | 5 | **4.4** | 41 |
| `DESIGN-IDENTIDADE` | 12 | 11 | 18 | 41 | 13 | **3.2** | 42 |
| `MOBILE-RISCO` | 14 | 10 | 16 | 40 | 5 | **8.0** | 43 |
| `KEY-ART` | 13 | 8 | 6 | 27 | 5 | **5.4** | 44 |
| `I18N-ESTRUTURA` | 8 | 12 | 13 | 33 | 5 | **6.6** | 45 |
| `SEO-TECNICO` | 13 | 17 | 9 | 39 | 5 | **7.8** | 46 |
| `PIXEL-ART-WEB` | 8 | 5 | 7 | 20 | 5 | **4.0** | 47 |
| `COPY-EXPERT` | 10 | 6 | 5 | 21 | 5 | **4.2** | 48 |
| `PALETA-CONTRASTE` | 6 | 5 | 11 | 22 | 2 | **11.0** | 49 |
| `LOGO` | 11 | 9 | 8 | 28 | 8 | **3.5** | 50 |
| `CI-SETUP` | 2 | 6 | 12 | 20 | 5 | **4.0** | 51 |
| `PERF-LCP` | 7 | 5 | 8 | 20 | 3 | **6.7** | 52 |
| `AUD-IA` | 8 | 12 | 17 | 37 | 3 | **12.3** | 53 |
| `AUD-LICENCA` | 3 | 6 | 16 | 25 | 8 | **3.1** | 54 |
| `AUD-SPOILER` | 2 | 6 | 15 | 23 | 3 | **7.7** | 55 |
| `TST-A11Y` | 5 | 4 | 10 | 19 | 3 | **6.3** | 56 |
| `AUD-LGPD` | 2 | 4 | 8 | 14 | 2 | **7.0** | 57 |
| `AUD-SEO` | 5 | 6 | 7 | 18 | 2 | **9.0** | 58 |
| `TST-I18N` | 4 | 4 | 8 | 16 | 3 | **5.3** | 59 |
| `TST-CWV` | 4 | 4 | 7 | 15 | 2 | **7.5** | 60 |
| `TST-LINKS` | 3 | 3 | 6 | 12 | 2 | **6.0** | 61 |
| `TST-HTML-VALID` | 2 | 3 | 5 | 10 | 2 | **5.0** | 62 |
| `DEPLOY-STAGING` | 9 | 6 | 9 | 24 | 4 | **6.0** | 63 |
| `WIKI-DOC-INICIANTE` | 4 | 1 | 3 | 8 | 13 | **0.6** | 64 |

**Nota sobre a ordem das linhas:** o WSJF **não** manda sozinho. **A dependência vence** (topological primeiro, WSJF dentro do nível). Por isso `SEO-TECNICO` (WSJF 7.8) aparece em W6 e não antes: não há SEO sem página.

**Mudanças de pontuação neste reorder:** `AUD-LGPD` caiu de CoD 21 → **14** (`ZERO-DADO` amputou a superfície). `D-GUS-*` saiu (remediado). `D-ANALYTICS` saiu (resolvido por `ZERO-DADO`). `EDICOES-RETRO` entrou alto em valor (**16**): é o que faz o site nascer com 5 números em vez de "em breve", e **a fonte já existe**.

---

## INBOX (descobertas não priorizadas)

Nada agora. **Drenada neste `--reorder`** (17 descobertas integradas na ordenação).

Descoberta nova entra aqui primeiro, sem onda e sem prioridade, e só sai depois de passar pelo pré-requisito e pelo WSJF.

| ID | Descoberta | Origem | Data |
|---|---|---|---|
| — | — | — | — |
