# TODO.md — site_gusworld

Tabela de pendências canônica do projeto **site_gusworld**: o site público do jogo GusWorld.
Consolidada por Cosmo (COO) em 2026-07-15 a partir de 4 lentes (técnica/dependência, valor/CoD, esforço/Job Size, fluxo/ondas).

## O que é este board

Escopo 1.0 declarado pelo líder: **landing page + devlog bilíngue (en/pt-br)**. Livros **não são vendidos** no 1.0 (só divulgados).

**Esta tabela registra e ordena. Ela não fecha decisão nenhuma.** Todo item marcado `[líder]` na coluna Dificuldade permanece decisão exclusiva do líder. Stack e design estão **em aberto** e não são decididos aqui.

## Restrições duras (invioláveis)

1. **`Projects/gusworld/` (o jogo) é READ-ONLY.** Escrita só em `site_gusworld/`. Leitura do repo do jogo é permitida (é o que `INV-CONTEUDO-A` e `D-GUS-EXPOR` fazem).
2. **Nenhuma página nasce fora da identidade visual**, a definir com o líder via `/design`.
3. **Push só com autorização expressa por ocasião.** Produção **não autorizada**. Domínio **indefinido**.
4. **Stack em aberto.** O líder respondeu "gerador estático" e depois determinou não decidir. Fato técnico registrado: **o plano Hostinger dele não suporta Node**. Isso é insumo de `D-STACK`, não conclusão.
5. **Identidade = "opção 1+2+3"** (pixel art + key art pintada + retratos cel-shaded juntos). **Não interpretar**: vai ao `/design` com o líder.

## Regras de fluxo

- **WIP líder = 1** (sem exceção). **WIP agent = 3.** **Revisão pendente = 2**: com 2 entregas de agent esperando revisão do líder, **não disparar a terceira**.
- **Sessão de decisão = 1** por vez.
- **Aging WIP:** item com owner=líder parado **14 dias** vira `❄️ Congelado`, volta ao backlog **com o motivo escrito** (ex.: "engine ganhou"). Um board que mente sobre o que está vivo é pior que um site atrasado.
- **Nenhuma cadência prometida. Nenhum item carrega data.** Post de devlog é **puxado por marco** (M7, M8, primeira build), nunca por calendário. Coluna de prazo reintroduz o risco de abandono.
- **As linhas, de cima para baixo, SÃO a ordem de execução.**

## Invariante inviolável

Teste unitário (TDD) **não vira item**. Os `TST-*` são **downstream da implementação**; os `AUD-*` são downstream de **código + teste**. **Nunca** agendar teste ou auditoria antes do que eles cobrem. `WIKI-DOC-INICIANTE` fecha a tabela (pós-release, pré-requisito = tag).

## Nota de risco: o contra-argumento do M7 (registrado, decisão do líder)

A lente de esforço argumenta contra a existência deste board: **"site caprichado para um jogo cujo loop ainda não roda ponta a ponta (M7 `⏳`) é trabalho fora de sequência; qualquer plano que consuma os 61 pontos seriais da fila do líder atrasa o M7, que é o marco que decide o projeto."**

Reforço operacional meu: **a fila do líder tem ~61 pontos estritamente seriais e os agents absorvem 0% deles.** Com WIP=1, isso não é backlog, é fila numa única pessoa que já escreve uma engine C++ sozinha. Os agents **não aliviam o gargalo, eles o alimentam**: cada entrega de agent vira revisão do líder.

Isso não é veto. É insumo. O item `D-SEQUENCIA-M7` existe para o líder decidir explicitamente, e não por omissão.

## Fontes e correções factuais (não propagar o que foi refutado)

Verificado no disco pelo orquestrador; **vale sobre as lentes**:

- **Estado do jogo:** o `ROADMAP.md` é fonte **desatualizada**. O board vivo (`TODO.md` do jogo) mostra **M1 ✅ validado ao vivo, M2 ✅ validado ponta a ponta em 2026-07-07, M4 ✅ fechado**. **Ambas as fontes concordam: M7, M8 e M9 estão `⏳`.**
- **`ACKNOWLEDGMENTS.md` existe** (13 KB). Não há link quebrado. A lente de esforço errou.
- **PDFs de terceiros:** são 71, e estão **gitignored** (`.gitignore:45: /resources/livros/`). **Nunca foram ao repo público.** Não inflar `AUD-LICENCA` por isso.
- **Share-alike:** a premissa estava errada. CC-BY-SA 4.0 morde **adaptação, não agregação**. Sprite intacto = atribuição, não contamina HTML/CSS/copy. Só pega se **adaptado** (key art de landing tende a ser). **Não tratar como constraint fechado antes de `dr-advogado`/CLO.**
- **Contraste WCAG 2.x (sRGB) já calculado**, é **entrada** do `/design`, não saída: ciano `#4dd9e8` sobre navy `#0d1520` = **10.83:1** (passa AA e AAA); magenta `#c23fd9` sobre navy = **4.37:1** (**falha AA em texto normal** por ~3% de luminância; passa texto grande e UI 3:1); magenta sobre ciano = **2.48:1** (nunca encostar).

## Decisão do líder de 2026-07-15 (público)

Ele quer **os dois eixos**: criança/adolescente (11-15) **e** adulto (30-45); leigo **e** expert. Detalhe textual dele: *"adultos leigos são apenas aqueles saudosos dos jogos antigos"* (o adulto leigo **não é genérico**: é o nostálgico de jogos antigos, não-técnico). **Faixa primária: a definir depois**, permanece aberta em `D-PUBLICO` (`🟡 Parcial`).

Duas consequências:

1. **`COPY-LEIGO` e `COPY-EXPERT` ficam ambos.** As lentes de valor e de esforço recomendaram **cortar o `COPY-EXPERT`**; o líder decidiu manter. Recomendação registrada abaixo, itens mantidos.
2. **Criança como público declarado sobe a régua de LGPD** (art. 14, proteção de menor). Refletido em `AUD-LGPD`.

## Recomendações das lentes que o líder rejeitou (registro, para não se perderem)

- **Cortar `COPY-EXPERT`** (lentes de valor e esforço). **Rejeitada**: o líder quer os dois eixos de público. Custo aceito: 5 pontos de Job Size + superfície dobrada em `AUD-SPOILER`.

## Arbitragem dos conflitos entre lentes (o que eu decidi e por quê)

1. **Valor alto × dependência não resolvida: a dependência vence.** `AI-DISC-SECAR` (CoD 43, 4º em valor) cai para W5 porque depende de página existir. `DESIGN-IDENTIDADE` (CoD 41) cai para W4 porque depende de `D-IDENTIDADE`.
2. **`DESIGN-IDENTIDADE` não bloqueia `IA-WIREFRAME`** (lente técnica vence). Esqueleto não é pele, e prender o wireframe atrás do design **atrasa a stack**: é o wireframe que revela quantas páginas existem, que é insumo de `D-STACK`.
3. **Ciclo `D-STACK` ⇄ `I18N-CONTRATO-URL`: URL primeiro.** É a decisão mais cara de reverter; a stack se adapta a ela.
4. **`INV-CONTEUDO` foi partido em A e B** (lente técnica). Fundidos criavam ciclo falso.
5. **`D-GUS` foi partido em `D-GUS-EXPOR` e `D-GUS-RATIFICA`.** A lente de fluxo se contradizia ("apresentar em W2a" × "disparar no dia 1"). O split resolve: a **metade já tomada por omissão** (o README do jogo credita o filho nominalmente) é auditável hoje por agent em modo leitura, e é ela que **dispara o relógio das 48h de graça**. A ratificação continua sendo **ato separado**, nunca dentro de batch.
6. **"Exatamente 2 puxáveis" (lente de fluxo) virou 1 sessão do líder + 3 leituras de agent.** O princípio dela está certo e mantido: **um board greenfield com 30 itens verdes já perdeu**. Mas os splits que as outras lentes pediram criam trabalho genuinamente sem pré-requisito. Os 3 itens de agent são **leitura e inventário**, nenhum produz artefato público, nenhum depende de decisão, e juntos batem exatamente o WIP de agent. **A fila do líder continua = 1 sessão.** O board diz a verdade: o resto nasce bloqueado.
7. **`D-SEQUENCIA-M7`, `OBJETIVO-SITE` e `D-PUBLICO` são pautas da MESMA sessão W1** (`OBJETIVO-SITE` ⇄ `D-PUBLICO` é SCC raiz, par indivisível). Contam como **1 item de WIP do líder**.
8. **`D-PUBLICO` é two-way-door** (timebox, corrigível). **`D-GUS-RATIFICA` não é.** Não tratar as duas com o mesmo rigor.
9. **`D-CANAL` não tem aresta com nada.** Não deixar segurar onda.
10. **Requisitos que restringem a stack aparecem 2 vezes**, de propósito: como **critério** dentro de `D-STACK` e como **implementação** depois (`RSS`, `I18N-ESTRUTURA`, `PIXEL-ART-WEB`, `PERF-LCP`, `SEO-TECNICO`, mais o critério **"zero terceiro por padrão"**).
11. **`AUD-LGPD` não é vazio em site estático.** O vetor é fonte de terceiro (Google Fonts, CDN, analytics, embed): tudo transfere IP do visitante. Por isso "zero terceiro por padrão" é critério de `D-STACK`.
12. **`TESTES.md` e `AUDITORIAS.md` não foram criados agora.** A stack está em aberto e não dá para podar os capítulos por stack. Criar depois de `D-STACK`.

---

## Tabela de pendências

| ID | Onda | Grupo | Descrição Técnica | Prioridade | Pré-requisito | Dificuldade | Status | Estado Auditado |
|---|---|---|---|---|---|---|---|---|
| `D-SEQUENCIA-M7` | W1 | Decisão | O site promete sobre um loop que ainda não roda ponta a ponta: **M7/M8/M9 estão `⏳`** (M1/M2/M4 estão ✅ validados). Decidir explicitamente se o 1.0 do site espera M7, ou se avança em paralelo aceitando o atraso do M7. Pauta 1 da sessão W1. Decisão por omissão aqui é o pior resultado. | Crítica | — | JS 1 · líder | ⏳ Pendente | — |
| `OBJETIVO-SITE` | W1 | Decisão | Para que serve o site: qual retorno o líder espera dele. SCC raiz, **par indivisível com `D-PUBLICO`**, mesma sessão. Pauta 2 da sessão W1. Sem isso, nada abaixo tem critério de aceite. | Crítica | — | JS 3 · ambos | ⏳ Pendente | — |
| `D-PUBLICO` | W1 | Decisão | **Parcialmente resolvido em 2026-07-15**: os dois eixos ficam (criança/adolescente 11-15 **e** adulto 30-45; leigo **e** expert), com o adulto leigo definido como **nostálgico de jogos antigos, não-técnico**. **Resíduo aberto: a faixa PRIMÁRIA.** Two-way-door: timebox e corrija. Pauta 3 da sessão W1, indivisível de `OBJETIVO-SITE`. | Crítica | — | JS 2 · líder | 🟡 Parcial | — |
| `INV-CONTEUDO-A` | W1 | Inventário | Inventariar **o que existe** de conteúdo aproveitável no repo do jogo (**modo leitura, read-only**): sprites, arte, textos, CHANGELOG, ADRs, `ACKNOWLEDGMENTS.md` (existe, 13 KB), `AI-DISCLOSURE.md`. Zero pré-requisito, roda hoje. Não decide o que é publicável, isso é `INV-CONTEUDO-B`. | Alta | — | JS 1 · agent | ⏳ Pendente | — |
| `D-GUS-EXPOR` | W1 | Inventário | **A metade desta decisão já foi tomada por omissão**: o README do jogo credita o filho do líder nominalmente. Inventariar **a exposição já existente** de uma criança real no repo do jogo (modo leitura). Isto **dispara o relógio de 48h** de `D-GUS-RATIFICA` no dia 1, e é o único item cujo relógio corre de graça. | Alta | — | JS 1 · agent | ⏳ Pendente | — |
| `SERP-PESQUISA` | W1 | Inventário | Rodar a SERP de "GusWorld" e variantes: colisão de nome, o que já ranqueia, ambiguidade. **Parte factual barata, e vem PRIMEIRO**: sem ela a conversa de `D-NOME-SERP` não fecha e vira duas sessões. | Alta | — | JS 1 · agent | ⏳ Pendente | — |
| `PALETA-CONTRASTE-CALC` | — | Design (entrada) | **Feito.** Contraste WCAG 2.x sRGB calculado, é **constraint de ENTRADA do `/design`**: ciano `#4dd9e8`/navy `#0d1520` = **10.83:1** (AA+AAA ok); magenta `#c23fd9`/navy = **4.37:1** (**falha AA texto normal**, passa texto grande e UI 3:1); magenta/ciano = **2.48:1** (nunca encostar). Não confundir com `TST-A11Y`, que é downstream. | — | — | JS 0 | 🔍 Pendente verificação | — |
| `D-LICENCA` | W2a | Decisão | Licença do site e dos assets. **Premissa corrigida**: CC-BY-SA 4.0 morde **adaptação, não agregação**; sprite intacto = atribuição, não contamina HTML/CSS/copy; só pega se **adaptado** (key art de landing tende a ser). **Não fechar como constraint antes de `dr-advogado`/CLO.** Sessão "exposição e direitos". | Alta | `OBJETIVO-SITE`, `D-PUBLICO` | JS 5 · ambos | ⏳ Pendente | — |
| `D-FIGURAS` | W2a | Decisão | Quais figuras/personagens/pessoas reais podem aparecer no site e sob que forma. Sessão "exposição e direitos". | Média | `D-LICENCA` | JS 3 · ambos | ⏳ Pendente | — |
| `D-LIVROS-IA` | W2a | Decisão | Como tratar publicamente os livros e o uso de IA neles. Livros **não vendidos no 1.0**, só divulgados. Sessão "exposição e direitos". | Alta | `OBJETIVO-SITE`, `D-PUBLICO` | JS 2 · ambos | ⏳ Pendente | — |
| `SPOILER-POLICY` | W2a | Decisão | O que pode ser revelado do jogo e do enredo, e o que não. **Imagem spoila tanto quanto texto.** Insumo obrigatório de `INV-CONTEUDO-B`, `COPY-*`, `DEVLOG-BACKLOG` e `KEY-ART`. Sessão "exposição e direitos". | Alta | `OBJETIVO-SITE` | JS 3 · ambos | ⏳ Pendente | — |
| `D-DOACAO-PAYPAL` | W2a | Decisão | A promessa pública de doação interage com **"zero lucro"**, que é o pilar da defesa por licença, e aciona `AUD-LGPD` (terceiro processando dado do visitante). Decidir se existe, e em que termos. Sessão "exposição e direitos". | Alta | `D-LICENCA`, `OBJETIVO-SITE` | JS 2 · líder | ⏳ Pendente | — |
| `D-GUS-RATIFICA` | W2a+ | Decisão | **One-way-door sobre uma criança real.** Valor de marketing deliberadamente **3/20**: não se precifica uma criança como ativo. O CoD 39 vem quase todo do **risco irreversível no teto (20/20)**. Escopo: revisar a exposição já existente (`D-GUS-EXPOR`) **e** decidir a futura. **Não pode fechar dentro do batch da W2a**: apresentar em W2a, **ratificar em ato separado, ≥48h depois** (espírito da regra global de deploy irreversível). Fechar o irreversível no embalo de uma sessão de 7 decisões reversíveis é o mecanismo pelo qual gente decide no impulso. | Alta | `D-GUS-EXPOR` + **≥48h** + ato separado | JS 3 · líder | ⏳ Pendente | — |
| `D-NOME-SERP` | W2b | Decisão | Nome público e posicionamento em busca, à luz do que a SERP mostrou. Sessão "alcance e cara". | Alta | `SERP-PESQUISA`, `OBJETIVO-SITE`, `D-PUBLICO` | JS 3 · ambos | ⏳ Pendente | — |
| `D-CANAL` | W2b | Decisão | Canais de divulgação. **Sem aresta com nenhum outro item**: não deve segurar onda nenhuma. Sessão "alcance e cara". | Média | `OBJETIVO-SITE` | JS 2 · líder | ⏳ Pendente | — |
| `D-IDENTIDADE` | W2b | Decisão | Identidade de marca (o que o projeto é publicamente), insumo do `DESIGN-IDENTIDADE`. Sessão "alcance e cara". | Alta | `OBJETIVO-SITE`, `D-PUBLICO`, `D-NOME-SERP` | JS 5 · ambos | ⏳ Pendente | — |
| `FRONTEIRA-REPO` | W2b | Decisão | **Onde nascem `LOGO` e `KEY-ART`?** O jogo é read-only, então nascem aqui. Mas aí ou o jogo passa a depender de asset do site, ou o asset duplica. **Barato agora, caro depois.** Decidir a fronteira antes de qualquer asset existir. | Alta | `D-LICENCA` | JS 2 · líder | ⏳ Pendente | — |
| `AI-DISC-ESCOPO` | W2b | Decisão | **Pergunta aberta ao líder (escopo ambíguo, risco de violar read-only):** o `AI-DISCLOSURE.md` mora no repo do **jogo**. O item aqui só pode ser "produzir a versão do site + linkar o canônico", nunca editar o canônico. Confirmar. | Alta | `D-LIVROS-IA` | JS 1 · líder | ⏳ Pendente | — |
| `INV-CONTEUDO-B` | W3 | Inventário | Inventariar **o que é publicável** (subconjunto de `INV-CONTEUDO-A` filtrado pelas decisões). Separado do A porque fundidos criam ciclo falso de dependência. | Alta | `INV-CONTEUDO-A`, `SPOILER-POLICY`, `D-LICENCA`, `D-GUS-RATIFICA`, `D-FIGURAS`, `D-LIVROS-IA` | JS 2 · agent | ⏳ Pendente | — |
| `I18N-CONTRATO-URL` | W3 | Fundação | **Contrato de URL bilíngue en/pt-br decidido ANTES da stack.** Resolve o ciclo `D-STACK` ⇄ i18n: a URL é a decisão mais cara de reverter, a stack se adapta a ela. | Alta | `OBJETIVO-SITE` | JS 2 · ambos | ⏳ Pendente | — |
| `IA-WIREFRAME` | W3 | Fundação | Arquitetura de informação e wireframe (esqueleto, sem pele). **Não depende de `DESIGN-IDENTIDADE`**: é ele que revela **quantas páginas existem**, que é insumo direto de `D-STACK`. Prendê-lo atrás do design atrasa a stack. | Alta | `OBJETIVO-SITE`, `D-PUBLICO`, `INV-CONTEUDO-B` | JS 3 · agent | ⏳ Pendente | — |
| `D-ANALYTICS` | W3 | Decisão | Decidir a coleta, inclusive a opção **"zero coleta"**. Vira critério de `D-STACK` e insumo de `AUD-LGPD`. Em site estático o vetor de privacidade é **fonte de terceiro**, não banco de dados. | Média | `OBJETIVO-SITE`, `D-PUBLICO` | JS 2 · líder | ⏳ Pendente | — |
| `CTA-UNICO` | W3 | Fundação | **Sem build, sem data e sem e-mail, o visitante não tem ação nenhuma e o site vira folheto sem retorno.** Definir o único CTA do 1.0. | Alta | `OBJETIVO-SITE`, `D-CANAL`, `D-DOACAO-PAYPAL` | JS 3 · ambos | ⏳ Pendente | — |
| `REPO-REMOTE` | W3 | Fundação | Repo remoto. **Opção do líder registrada (meia-alternativa que reduz o dano): criar PRIVADO primeiro.** CI e backup destravam, a exposição pública continua adiada. | Média | `FRONTEIRA-REPO`, `D-LICENCA` | JS 2 · agent | ⏳ Pendente | — |
| `LICENSE-README` | W3 | Fundação | `LICENSE` + `README` do repo do site, conforme `D-LICENCA`. | Média | `REPO-REMOTE`, `D-LICENCA` | JS 2 · agent | ⏳ Pendente | — |
| `D-STACK` | W4 | Decisão | **EM ABERTO, decisão exclusiva do líder. Esta tabela não decide stack.** Insumos de fato: o plano Hostinger dele **não suporta Node**; o líder respondeu "gerador estático" e depois determinou não decidir. **Critérios de entrada obrigatórios** (cada um reaparece como implementação depois): RSS, i18n en/pt-br, pixel art na web, LCP, SEO técnico, e **"zero terceiro por padrão"** (Google Fonts, CDN, analytics e embed transferem IP do visitante). Número de páginas vem de `IA-WIREFRAME`. | Alta | `IA-WIREFRAME`, `I18N-CONTRATO-URL`, `D-ANALYTICS` | JS 4 · líder | ⏳ Pendente | — |
| `STACK-ADR` | W4 | Fundação | ADR registrando a decisão de stack e as alternativas descartadas. | Média | `D-STACK` | JS 3 · agent | ⏳ Pendente | — |
| `DESIGN-IDENTIDADE` | W4 | Design | **Vai ao `/design` COM o líder. Não interpretar.** Identidade = "opção 1+2+3" (pixel art + key art pintada + retratos cel-shaded **juntos**). **Constraint de entrada**: os contrastes de `PALETA-CONTRASTE-CALC`. Maior Job Size do board na fila do líder. **Nenhuma página nasce antes disto.** | Alta | `D-IDENTIDADE`, `PALETA-CONTRASTE-CALC` | JS 13 · líder | 🎨 Pendente design | — |
| `PALETA-CONTRASTE` | W4 | Design | Paleta final tokenizada a partir do design. **JS baixo porque o cálculo já está feito** em `PALETA-CONTRASTE-CALC`. Atenção ao magenta `#c23fd9`: 4.37:1 falha AA em texto normal. | Média | `DESIGN-IDENTIDADE` | JS 2 · agent | 🎨 Pendente design | — |
| `LOGO` | W4 | Design | **Item de AGENDA DO LÍDER, não de arte: o agent contribui zero.** Restrição do PixelLab: geração **por imagem** (referência/style-transfer) usa base64 inline, então só o líder, no webui. **A lente de esforço diz que não cabe neste ciclo**; placeholder assumido = wordmark em `PixelOperatorMono` (CC0). | Média | `DESIGN-IDENTIDADE`, `FRONTEIRA-REPO` | JS 8 · líder | 🎨 Pendente design | — |
| `KEY-ART` | W4 | Design | **JS 5 com reuso da `catedral_mae.png`** (evita a restrição do PixelLab), **JS 13 se nova** (a lente de esforço diz que a nova não cabe). Atenção: key art de landing **tende a ser adaptação**, que é justamente o caso em que CC-BY-SA morde. Também é superfície de `AUD-SPOILER`. | Média | `DESIGN-IDENTIDADE`, `FRONTEIRA-REPO`, `D-LICENCA`, `SPOILER-POLICY` | JS 5 (reuso) / 13 (nova) · líder | 🎨 Pendente design | — |
| `COPY-LEIGO` | W4 | Conteúdo | Copy para o eixo leigo. **O adulto leigo não é genérico: é o nostálgico de jogos antigos, não-técnico.** Cobre também criança/adolescente 11-15. | Média | `OBJETIVO-SITE`, `D-PUBLICO`, `INV-CONTEUDO-B`, `SPOILER-POLICY` | JS 8 · ambos | ⏳ Pendente | — |
| `COPY-EXPERT` | W4 | Conteúdo | Copy para o eixo expert. **As lentes de valor e de esforço recomendaram CORTAR este item; o líder decidiu MANTER** (quer os dois eixos). Custo aceito: 5 pontos + superfície dobrada em `AUD-SPOILER`. | Baixa | `OBJETIVO-SITE`, `D-PUBLICO`, `INV-CONTEUDO-B`, `SPOILER-POLICY` | JS 5 · ambos | ⏳ Pendente | — |
| `DEVLOG-BACKLOG` | W4 | Conteúdo | **FINITO e em batch, por decisão explícita. NÃO existe item de "devlog contínuo".** A lente de esforço diz que o backlog completo bilíngue não cabe: **cabe 1 post**, o dos **2 pivôs de stack** (melhor história do projeto, já escrita no CHANGELOG e nos ADRs, e **independente de marco**). **Passivo invisível registrado:** assim que o 1º post sai, nascem M5-M9 × 2 idiomas = **10 peças que ninguém estimou**, caindo na fila WIP=1 de quem escreve a engine. | Média | `INV-CONTEUDO-B`, `SPOILER-POLICY`, `I18N-CONTRATO-URL` | JS 13 (backlog) / 3 (1 post) · ambos | ⏳ Pendente | — |
| `CI-SETUP` | W4 | Fundação | CI. **JS 5 = 3 + 2 de imposto de debug cego**: log de CI não existe na API do Forgejo. Destrava com `REPO-REMOTE` privado. | Baixa | `REPO-REMOTE`, `D-STACK` | JS 5 · agent | ⏳ Pendente | — |
| `I18N-ESTRUTURA` | W5 | Implementação | Implementação de i18n en/pt-br conforme o contrato de URL já fixado. Aparece aqui como implementação; como **critério** já apareceu em `D-STACK`. | Média | `D-STACK`, `I18N-CONTRATO-URL` | JS 5 · agent | ⏳ Pendente | — |
| `PAGINA-LANDING` | W5 | Implementação | A landing. **Sem ela os `TST-*` não têm o que testar e os `AUD-*` auditam o vácuo.** Maior JS de agent do board. | Alta | `D-STACK`, `IA-WIREFRAME`, `DESIGN-IDENTIDADE`, `COPY-LEIGO`, `COPY-EXPERT`, `KEY-ART`, `LOGO`, `CTA-UNICO`, `I18N-ESTRUTURA` | JS 8 · agent | ⏳ Pendente | — |
| `PAGINA-DEVLOG` | W5 | Implementação | A página de devlog. **JS 5, cai para 3 se o devlog for 1 post** (que é a recomendação da lente de esforço). | Média | `D-STACK`, `IA-WIREFRAME`, `DESIGN-IDENTIDADE`, `DEVLOG-BACKLOG`, `I18N-ESTRUTURA` | JS 5 (→3) · agent | ⏳ Pendente | — |
| `AI-DISC-SECAR` | W5 | Implementação | **Escopo restrito, sob pena de violar o read-only:** produzir a **versão do site** do AI disclosure e **linkar o canônico** que mora no repo do jogo. Nunca editar o canônico. | Alta | `AI-DISC-ESCOPO`, `PAGINA-LANDING` | JS 4 · ambos | ⏳ Pendente | — |
| `PIXEL-ART-WEB` | W5 | Implementação | Pixel art renderizada corretamente na web (`image-rendering`, escala inteira, DPR). Como **critério** já apareceu em `D-STACK`. | Baixa | `D-STACK`, `PAGINA-LANDING` | JS 5 · agent | ⏳ Pendente | — |
| `RSS` | W5 | Implementação | Feed RSS do devlog. Como **critério** já apareceu em `D-STACK`. | Média | `D-STACK`, `PAGINA-DEVLOG` | JS 3 · agent | ⏳ Pendente | — |
| `SEO-TECNICO` | W5 | Implementação | SEO técnico (sitemap, schema.org, canonical, hreflang, crawlability). Como **critério** já apareceu em `D-STACK`. Insumo de `AUD-LGPD` (fontes de terceiro) e de `AUD-SEO`. | Média | `PAGINA-LANDING`, `PAGINA-DEVLOG`, `I18N-ESTRUTURA` | JS 5 · agent | ⏳ Pendente | — |
| `PERF-LCP` | W6 | Performance | LCP e peso da página, principalmente por causa da key art. Como **critério** já apareceu em `D-STACK`. | Baixa | `PAGINA-LANDING`, `PIXEL-ART-WEB`, `KEY-ART` | JS 3 · agent | ⏳ Pendente | — |
| `TST-HTML-VALID` | W7 | Verificação | Validação de HTML. Downstream da implementação, nunca antes. | Baixa | `PAGINA-LANDING`, `PAGINA-DEVLOG` | JS 2 · agent | ⏳ Pendente | — |
| `TST-LINKS` | W7 | Verificação | Verificação de links quebrados (inclusive o link para o canônico do `AI-DISCLOSURE.md` do jogo). | Baixa | `PAGINA-LANDING`, `PAGINA-DEVLOG`, `AI-DISC-SECAR` | JS 2 · agent | ⏳ Pendente | — |
| `TST-A11Y` | W7 | Verificação | Teste de acessibilidade WCAG. **Downstream, não confundir com `PALETA-CONTRASTE-CALC`**, que é entrada já feita. Ponto de atenção conhecido: magenta em texto normal falha AA. | Baixa | `PALETA-CONTRASTE`, `PAGINA-LANDING`, `PAGINA-DEVLOG` | JS 3 · agent | ⏳ Pendente | — |
| `TST-I18N` | W7 | Verificação | Teste do bilíngue: fallback, hreflang, URLs, strings faltantes. | Baixa | `I18N-ESTRUTURA`, `PAGINA-LANDING`, `PAGINA-DEVLOG` | JS 3 · agent | ⏳ Pendente | — |
| `TST-CWV` | W7 | Verificação | Core Web Vitals medidos. | Baixa | `PERF-LCP` | JS 3 · agent | ⏳ Pendente | — |
| `AUD-LICENCA` | W8 | Auditoria | Auditoria de licença de tudo que foi publicado. **Não inflar pelos 71 PDFs de terceiros: eles estão gitignored (`/resources/livros/`) e nunca foram ao repo público.** O foco real é **adaptação** de asset CC-BY-SA (a key art de landing tende a ser adaptação). Envolver `dr-advogado`/CLO. | Baixa | `D-LICENCA`, `REPO-REMOTE`, `LICENSE-README`, `LOGO`, `KEY-ART`, `PIXEL-ART-WEB`, `COPY-LEIGO`, `COPY-EXPERT`, `PAGINA-LANDING`, `PAGINA-DEVLOG` | JS 8 · agent | ⏳ Pendente | — |
| `AUD-LGPD` | W8 | Auditoria | **Régua ELEVADA: criança é público declarado, logo LGPD art. 14 (proteção de menor) se aplica.** Em site estático o vetor é **fonte de terceiro** (Google Fonts, CDN, analytics, embed), tudo transfere IP do visitante. Inclui a superfície do `D-DOACAO-PAYPAL`. **JS 3, sobe para 5 se houver analytics ou CDN.** | Média | `PAGINA-LANDING`, `PAGINA-DEVLOG`, `SEO-TECNICO`, `D-ANALYTICS`, `D-DOACAO-PAYPAL` | JS 3 (→5) · agent | ⏳ Pendente | — |
| `AUD-SPOILER` | W8 | Auditoria | Auditoria de spoiler sobre copy, devlog e **key art (imagem spoila tanto quanto texto)**. Superfície dobrada por manter `COPY-EXPERT`. | Baixa | `SPOILER-POLICY`, `COPY-LEIGO`, `COPY-EXPERT`, `DEVLOG-BACKLOG`, `KEY-ART` | JS 3 · agent | ⏳ Pendente | — |
| `AUD-SEO` | W8 | Auditoria | Auditoria de SEO sobre o que foi implementado e testado. | Baixa | `SEO-TECNICO`, `RSS`, `TST-HTML-VALID`, `TST-LINKS`, `TST-I18N`, `TST-CWV` | JS 2 · agent | ⏳ Pendente | — |
| `DEPLOY-STAGING` | W9 | Release | **Metade executável do antigo `DEPLOY-FTP`** (dividido porque o CoD fundido era enganoso): publicar em staging, sem exposição pública. | Baixa | W7 completa, W8 completa | JS 4 · agent | ⏳ Pendente | — |
| `DOMINIO-DNS` | W9 | Decisão | **Domínio indefinido** por restrição declarada do líder. Registro + DNS. | Baixa | `D-GO-LIVE` | JS 3 · líder | ⛔ Bloqueado (autorização do líder) | — |
| `D-GO-LIVE` | W9 | Decisão | **Metade decisória do antigo `DEPLOY-FTP`. Produção NÃO AUTORIZADA.** Go/no-go do líder, mais a autorização expressa de push naquela ocasião (autorização anterior não vale). | Baixa | `DEPLOY-STAGING`, `AUD-LICENCA`, `AUD-LGPD`, `AUD-SPOILER`, `AUD-SEO` | JS 1 · líder | ⛔ Bloqueado (autorização do líder) | — |
| `TAG-1.0` | W9 | Release | Tag de versão 1.0 do site. Pré-requisito de `WIKI-DOC-INICIANTE`. | Baixa | `D-GO-LIVE` | JS 1 · agent | ⛔ Bloqueado (autorização do líder) | — |
| `WIKI-DOC-INICIANTE` | W10 | Pós-release | **Fecha a tabela** (item fixo de fim de tabela, regra global). Wiki nativa do repo + documentação `.md` extensa em registro didático para **iniciante em computação** (explica todo jargão, passo a passo, sem assumir conhecimento). Deriva de `docs/`, **linka, não duplica**. Execução **sempre** via `technical-writer`/`ux-writer`, nunca inline. **A lente de esforço diz que não cabe neste ciclo.** | Baixa | `TAG-1.0` | JS 13 · agent | ⏳ Pendente | — |

---

## Puxável AGORA

**1 sessão do líder (WIP líder = 1) + 3 leituras de agent (WIP agent = 3). Todo o resto nasce bloqueado.**

- **Sessão W1 do líder** (3 pautas, 1 item de WIP): `D-SEQUENCIA-M7` + `OBJETIVO-SITE` + `D-PUBLICO` (SCC raiz, par indivisível).
- **Agent, modo leitura, zero pré-requisito:** `INV-CONTEUDO-A`, `D-GUS-EXPOR`, `SERP-PESQUISA`.

Lembrete do limite que realmente morde: **revisão pendente = 2**. Com 2 entregas de agent esperando revisão do líder, **não disparar a terceira**.

---

## Scoring WSJF

WSJF = CoD / Job Size. CoD = Valor + Criticidade + Redução de Risco (cada componente 1-20, CoD máx 60). Os totais de CoD vêm da lente de valor; a decomposição em 3 componentes e os itens novos são arbitragem do COO.

| ID | Valor | Criticidade | Redução de Risco | CoD | Job Size | WSJF | Rank |
|---|---|---|---|---|---|---|---|
| `D-SEQUENCIA-M7` | 10 | 18 | 16 | 44 | 1 | **44.0** | 1 |
| `D-GUS-EXPOR` | 2 | 10 | 14 | 26 | 1 | **26.0** | 2 |
| `AI-DISC-ESCOPO` | 4 | 10 | 10 | 24 | 1 | **24.0** | 3 |
| `D-PUBLICO` | 20 | 18 | 20 | 58 | 2 | **29.0** | 4 |
| `INV-CONTEUDO-A` | 9 | 6 | 5 | 20 | 1 | **20.0** | 5 |
| `D-GO-LIVE` | 10 | 6 | 4 | 20 | 1 | **20.0** | 6 |
| `D-LIVROS-IA` | 9 | 12 | 18 | 39 | 2 | **19.5** | 7 |
| `D-CANAL` | 14 | 10 | 12 | 36 | 2 | **18.0** | 8 |
| `OBJETIVO-SITE` | 20 | 14 | 18 | 52 | 3 | **17.3** | 9 |
| `D-DOACAO-PAYPAL` | 8 | 12 | 14 | 34 | 2 | **17.0** | 10 |
| `I18N-CONTRATO-URL` | 6 | 14 | 14 | 34 | 2 | **17.0** | 11 |
| `SERP-PESQUISA` | 6 | 6 | 4 | 16 | 1 | **16.0** | 12 |
| `TAG-1.0` | 8 | 4 | 4 | 16 | 1 | **16.0** | 13 |
| `D-NOME-SERP` | 15 | 15 | 15 | 45 | 3 | **15.0** | 14 |
| `FRONTEIRA-REPO` | 4 | 10 | 16 | 30 | 2 | **15.0** | 15 |
| `D-GUS-RATIFICA` | 3 | 16 | 20 | 39 | 3 | **13.0** | 16 |
| `REPO-REMOTE` | 6 | 8 | 12 | 26 | 2 | **13.0** | 17 |
| `INV-CONTEUDO-B` | 11 | 7 | 8 | 26 | 2 | **13.0** | 18 |
| `D-ANALYTICS` | 5 | 8 | 12 | 25 | 2 | **12.5** | 19 |
| `SPOILER-POLICY` | 7 | 10 | 18 | 35 | 3 | **11.7** | 20 |
| `RSS` | 12 | 10 | 11 | 33 | 3 | **11.0** | 21 |
| `PALETA-CONTRASTE` | 8 | 6 | 8 | 22 | 2 | **11.0** | 22 |
| `AI-DISC-SECAR` | 12 | 13 | 18 | 43 | 4 | **10.8** | 23 |
| `LICENSE-README` | 6 | 6 | 8 | 20 | 2 | **10.0** | 24 |
| `CTA-UNICO` | 14 | 10 | 4 | 28 | 3 | **9.3** | 25 |
| `AUD-SEO` | 5 | 5 | 8 | 18 | 2 | **9.0** | 26 |
| `D-FIGURAS` | 6 | 8 | 12 | 26 | 3 | **8.7** | 27 |
| `D-LICENCA` | 6 | 13 | 20 | 39 | 5 | **7.8** | 28 |
| `SEO-TECNICO` | 16 | 12 | 11 | 39 | 5 | **7.8** | 29 |
| `AUD-SPOILER` | 4 | 5 | 14 | 23 | 3 | **7.7** | 30 |
| `D-IDENTIDADE` | 14 | 12 | 12 | 38 | 5 | **7.6** | 31 |
| `STACK-ADR` | 6 | 6 | 10 | 22 | 3 | **7.3** | 32 |
| `D-STACK` | 8 | 12 | 8 | 28 | 4 | **7.0** | 33 |
| `AUD-LGPD` | 3 | 5 | 13 | 21 | 3 | **7.0** | 34 |
| `PERF-LCP` | 10 | 5 | 5 | 20 | 3 | **6.7** | 35 |
| `DOMINIO-DNS` | 8 | 8 | 4 | 20 | 3 | **6.7** | 36 |
| `I18N-ESTRUTURA` | 12 | 9 | 12 | 33 | 5 | **6.6** | 37 |
| `TST-A11Y` | 7 | 4 | 8 | 19 | 3 | **6.3** | 38 |
| `TST-LINKS` | 5 | 3 | 4 | 12 | 2 | **6.0** | 39 |
| `DEPLOY-STAGING` | 10 | 8 | 6 | 24 | 4 | **6.0** | 40 |
| `KEY-ART` | 13 | 7 | 7 | 27 | 5 | **5.4** | 41 |
| `TST-I18N` | 5 | 4 | 7 | 16 | 3 | **5.3** | 42 |
| `IA-WIREFRAME` | 6 | 5 | 4 | 15 | 3 | **5.0** | 43 |
| `TST-CWV` | 5 | 4 | 6 | 15 | 3 | **5.0** | 44 |
| `TST-HTML-VALID` | 4 | 3 | 3 | 10 | 2 | **5.0** | 45 |
| `PAGINA-DEVLOG` | 12 | 8 | 3 | 23 | 5 | **4.6** | 46 |
| `COPY-EXPERT` | 11 | 5 | 5 | 21 | 5 | **4.2** | 47 |
| `PAGINA-LANDING` | 18 | 12 | 3 | 33 | 8 | **4.1** | 48 |
| `CI-SETUP` | 6 | 5 | 9 | 20 | 5 | **4.0** | 49 |
| `PIXEL-ART-WEB` | 11 | 4 | 5 | 20 | 5 | **4.0** | 50 |
| `COPY-LEIGO` | 16 | 7 | 6 | 29 | 8 | **3.6** | 51 |
| `LOGO` | 13 | 7 | 8 | 28 | 8 | **3.5** | 52 |
| `DESIGN-IDENTIDADE` | 18 | 8 | 15 | 41 | 13 | **3.2** | 53 |
| `AUD-LICENCA` | 4 | 6 | 15 | 25 | 8 | **3.1** | 54 |
| `DEVLOG-BACKLOG` | 17 | 10 | 10 | 37 | 13 | **2.8** | 55 |
| `WIKI-DOC-INICIANTE` | 3 | 2 | 3 | 8 | 13 | **0.6** | 56 |

**Como ler:** o WSJF **não** é a ordem de execução. **A ordem é a das linhas da tabela de pendências**, que aplica topological sort primeiro (dependência vence valor) e usa o WSJF apenas para desempatar dentro da mesma onda. `D-GO-LIVE` tem WSJF 20 e está bloqueado; `PAGINA-LANDING` tem WSJF 4.1 e é o coração do produto.

---

## INBOX (descobertas não priorizadas)

Nada ainda. Descoberta nova entra aqui primeiro, sem onda e sem prioridade, e só sai depois de passar pelo pré-requisito e pelo WSJF.

| ID | Descoberta | Origem | Data |
|---|---|---|---|
| — | — | — | — |
