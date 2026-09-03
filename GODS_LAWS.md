> **LEI DAS LEIS, ANTERIOR ATÉ À LEI ZERO: só o líder pode quebrar uma lei deste arquivo** — agente nenhum quebra, flexibiliza, reinterpreta ou "adapta ao caso" por conta própria — **e nem a ordem direta dele dispensa a confirmação**: antes de executar, nomeie a lei que está sendo quebrada, cite o texto dela, diga o que ela protege e o que se perde ao quebrá-la, e pergunte por `AskUserQuestion` se é isso mesmo que ele quer; **quando o pedido for ALTERAR ou REVOGAR uma lei, argumente CONTRA primeiro, sempre e sem exceção**, com razões concretas, o problema que a lei existe para impedir, os trade-offs da mudança e o que fica desprotegido depois dela, e só então leve a escolha por `AskUserQuestion` entre **confirmar** a alteração e **cancelá-la**; pressa, obviedade aparente, "ele já mandou uma vez" e aprovação dada em outro contexto **nunca** substituem essa confirmação, e silêncio jamais vale como aval. (Ordem do líder, 22/08/2026, adotada aqui em 24/08/2026 por ordem dele: *"veja a L-19... depois quero o mesmo modelo aqui"*.)

# GODS_LAWS.md — site_gusworld (a revista Glyfesse)

> Ordens expressas do líder (petrus). Este arquivo **não é declaração, é execução**: cada lei tem um **gatilho**, e o gatilho é conferido **no momento da ação**, não no fim.

## Protocolo de uso (obrigatório)

1. **Antes de agir**, varra a coluna "Gatilho" da tabela abaixo. Se algum gatilho casa com o que você está prestes a fazer, leia a lei inteira antes do primeiro comando, não depois.
2. **Ao despachar subagent**, cole no prompt da task o texto completo das leis cujo gatilho casa com aquela task, mais o caminho absoluto deste arquivo. Subagent **não herda** este contexto e não vai ler por conta própria.
3. **Ao relatar ao líder**, se você tocou uma área com lei, diga qual lei aplicou e como. Silêncio não é prova de conformidade.
4. **Lei nova entra aqui no instante em que o líder a dá**, com data e o texto dele verbatim entre aspas. Não espere "um momento melhor" para registrar.
5. **Nenhum agente revoga, flexibiliza ou reinterpreta lei.** Só o líder. Na dúvida sobre o alcance de uma lei, pergunte via `AskUserQuestion` antes de agir.
6. Conflito entre uma lei daqui e qualquer outro documento (manual, memória, hábito, preferência do agente): **a lei daqui vence**.

## Índice de gatilhos

| Lei | Gatilho: dispara quando você vai... | Resumo |
|---|---|---|
| [L-00](#l-00) | encostar em qualquer arquivo do jogo | `Projects/GusWorld/` é READ-ONLY. Ler sempre, escrever nunca |
| [L-01](#l-01) | versionar qualquer coisa, em qualquer repo | Nome de batismo de menor, segredo e dado de terceiro NUNCA. É sobre versionar, não sobre ser público |
| [L-02](#l-02) | versionar imagem derivada de captura de tela | Abrir e OLHAR antes. O `.gitignore` do vídeo não protege o frame |
| [L-03](#l-03) | precisar de algo do líder, ou ter mais de uma opção | `AskUserQuestion`, sem `preview`, uma por vez, recomendada primeiro |
| [L-04](#l-04) | escrever qualquer mensagem ao líder | Timestamp real `[DD/MM/YY - HH:MM:SS]` obtido do `date` |
| [L-05](#l-05) | executar qualquer trabalho de produto, código ou texto | Main só orquestra. Implementer, reviewer e orquestrador são agentes DIFERENTES |
| [L-06](#l-06) | entregar qualquer coisa VISUAL ao líder | Print verificado antes. O QA é o `qa-engineer`, o líder nunca é o QA |
| [L-07](#l-07) | usar qualquer termo técnico numa mensagem ao líder | Explicar na hora, em linguagem de leigo. Ele é médico, não é de web |
| [L-08](#l-08) | escrever qualquer fala ou pensamento do Gus | O canon AHSD é lei; submeter SEMPRE ao líder; zero rótulo clínico |
| [L-09](#l-09) | escrever qualquer coisa que vá a público | Spoiler e uso de IA: declarar é a defesa. Intenção e credencial não defendem |
| [L-10](#l-10) | criar `LICENSE`, cabeçalho, ou servir asset | Código Apache-2.0; texto e arte da revista com todos os direitos reservados |
| [L-11](#l-11) | pensar em `git push` ou em publicar o site | Push do repo é automático; deploy na Hostinger é MANUAL e bloqueado |
| [L-12](#l-12) | verificar qualquer coisa renderizada | Firefox (Gecko), nunca Chrome (Blink). Produção, não só local |
| [L-13](#l-13) | escrever qualquer peça interativa | Lógica pura extraída e coberta por teste, TDD. Print não prova lógica |
| [L-14](#l-14) | fechar trabalho que corresponde a item da tabela | Status no MESMO commit, citando o ID. `✅` só pós-teste |
| [L-15](#l-15) | o líder aprovar, rejeitar ou mudar algo, ou fechar item de alta prioridade | Avisar o Gus Dragon sem ele perguntar |
| [L-16](#l-16) | abrir sessão, ou precisar falar com outro projeto | Bus `gusworld_ia_autocomm`: ritual, pipe do Gus, e nunca classificar prioridade alheia |
| [L-17](#l-17) | escrever seção, partial, CSS ou documento novo | Proibido monolito. Uma razão de mudar por unidade |
| [L-18](#l-18) | ver regra, item ou documento que o líder revogou | Revogado se APAGA. E nada é declarado morto por agente |
| [L-19](#l-19) | responder o líder, ou levar um achado a ele | Texto pedido vem COLADO na resposta. Pergunta já respondida não se refaz |
| [L-20](#l-20) | publicar uma edição | A ordem do release é a §1.5 do `PIPELINE-EDICAO.md`, e se lê antes |
| [L-21](#l-21) | fechar um marco, ou notar a hora | Nunca mandar o líder descansar, dormir ou parar |
| [L-22](#l-22) | instalar, remover ou atualizar pacote de sistema | Pedir autorização. Nunca falhar calado; `sudo` sempre com `-A` |
| [L-23](#l-23) | afirmar que algo está feito, limpo ou verificado | A prova é a inspeção do objeto, não a saída do seu comando |
| [L-24](#l-24) | ver qualquer coisa vinda do Gus Dragon, em qualquer canal do bus | Pedido dele é PRIORIDADE e é SEMPRE respondido. Não existe "depois" |
| [L-25](#l-25) | escrever fala ou pensamento de QUALQUER personagem do jogo | Para ele, GusWorld é REAL. Ele não sabe que é feito de pixel. O técnico vai nas seções técnicas |

---

## L-00

**Data:** desde a fundação do projeto, reafirmada continuamente. **Fonte:** `CLAUDE.md` da raiz, verbatim: *"**`Projects/gusworld/` é READ-ONLY** — proibido modificar sem autorização expressa."*

O repositório do jogo (`Projects/GusWorld/`) é **fonte de leitura e nada mais**. Ler é livre e encorajado — é de lá que sai quase toda a matéria da revista. **Escrever é proibido**, em qualquer forma: editar arquivo, criar arquivo, commitar, mexer em branch, rodar script que grave.

**É a lei ZERO porque o erro aqui não é reversível pela revista.** O jogo é o produto; a revista é quem conta a história dele. Um agente do site que "conserta" alguma coisa no jogo está mexendo no trabalho de outra sessão, que tem as próprias leis e o próprio estado, e que pode estar com trabalho não commitado na árvore naquele instante.

**Aplicação:** se você precisa que alguma coisa mude no jogo, o caminho é o **bus** (L-16), não o editor. Se precisa de um dado que não está publicável, **pergunte ao líder** (L-03). Vale igual para `Projects/GlintFx/` e `Projects/gusworld_mapeditor/`: são sessões irmãs, não território nosso.

## L-01

**Data:** regra permanente, reforçada em 2026-08-04 e em 2026-07-18. **Fonte:** `CLAUDE.md` da raiz e o `PROTOCOL.md` do bus, verbatim: *"nome de batismo de menor e segredo/token nunca são versionados — nem em repo privado. A regra do líder é sobre **versionar** (privado pode virar público, ser compartilhado, vazar)."*

Três coisas **nunca** entram em arquivo versionado, em nenhum repositório, público ou privado:

1. **O nome de batismo do filho do líder.** Ele aparece **exclusivamente** como **"Gus Dragon"**. Não há exceção, nem em comentário, nem em nome de arquivo, nem em mensagem de commit.
2. **Segredo, token, chave ou credencial.** Nem em exemplo, nem "só para testar".
3. **Dado pessoal de terceiro** — nome de amigo, e-mail, telefone, endereço. Nome de amigo só com consentimento explícito, e o consentimento se pergunta ao líder.

★ **O raciocínio que se erra:** "o repo é privado, então pode". **Não pode.** A regra é sobre **versionar**, não sobre publicidade — repositório privado vira público, é clonado, é compartilhado, vaza. O que entra no histórico fica no histórico.

**Aplicação:** antes de commitar qualquer coisa que envolva pessoa, varra o conteúdo. Se encontrar em material já versionado, **não conserte com commit normal** — leia a L-23 e trate como vazamento de histórico.

## L-02

**Data:** 2026-07-18, após incidente real. **Fonte:** memória `feedback_frames_vazam_tela_pessoal` — 15 frames extraídos de vídeos pessoais do líder foram parar no repositório **público**, carregando abas de navegador (Grande Loja Maçônica, Kindle, app médico, faturamento), terminal com custos em R$, e o desktop dele. Foram removidos por `filter-repo` + force-push.

**Toda imagem derivada de captura de tela é ABERTA E OLHADA antes de virar arquivo rastreado.** Não se julga pelo nome do arquivo, nem pela pasta, nem pela confiança em quem gerou.

⚠️ **A armadilha que causou o incidente: o `.gitignore` do vídeo NÃO protege o frame extraído dele.** O vídeo estava corretamente fora do git; os frames, não.

**Aplicação:** preferir **captura direta da janela** a foto de tela ou gravação do monitor inteiro. Ao receber material do líder, tratar como não-verificado até olhar. Se a imagem for grande demais para inspecionar uma a uma, montar folha de contato e olhar — mas **olhar**.

**O que NÃO cai nesta lei:** `public_html/assets/edicao-1/tui_claude*.png`. O `cost R$` que aparece nelas é **simulado**, é encenação editorial, e o líder já respondeu isso **três vezes** — ver memória `feedback_custo_tui_e_simulado` e a L-19.

## L-03

**Data:** 2026-07-23 (formato), regra permanente (obrigatoriedade). **Verbatim:** *"askuserquestion é para ser enviado SEM painel lateral, canonize"* e, no `CLAUDE.md` da raiz: *"**Nunca decidir sozinho** (stack, design, escopo): opções via **AskUserQuestion**, uma por vez, WIP do líder = 1."*

Toda decisão que não é sua vai por **`AskUserQuestion`**. Não em prosa no chat, não "vou trazer isso depois", não como bullet numa lista.

**Forma obrigatória:**
- ⛔ **Nunca o campo `preview`.** Ele faz a interface abrir o painel lateral, e o líder não quer esse painel. Só `label` + `description`.
- **Uma pergunta por vez.** O WIP dele é 1.
- A opção **recomendada vem primeiro**, marcada.
- Detalhe técnico (código, comparação, número) vai **no corpo da mensagem**, antes da pergunta; as opções ficam curtas e auto-explicativas.

★ **O erro que se comete não é de formato, é de MOMENTO:** descrever a decisão em prosa e prometer perguntar depois. Isso é adiar, e o líder já corrigiu isso mais de uma vez. Se você percebeu que existe uma decisão, ela vai **agora**, na ferramenta.

## L-04

**Data:** 2026-07-22, formato corrigido em 2026-08-11. **Verbatim:** *"você está esquecendo do timestamp nas suas mensagens. Formato `[DD/MM/YY - HH:MM:SS]`"* + *"memorize esse timestamp para uso global em todas as sessoes e projetos"*.

**Toda** mensagem ao líder abre com o carimbo `[DD/MM/YY - HH:MM:SS]`, e a hora é **real**, obtida de `date '+%d/%m/%y - %H:%M:%S'`. Nunca estimada, nunca inferida da conversa, nunca reaproveitada da mensagem anterior.

**Por quê, na explicação dele:** o agente **não tem relógio nem percepção de passagem de tempo** — a conversa chega como sequência contínua e não dá para distinguir 1 minuto de 10 horas entre duas mensagens. Sem consultar o `date`, *"hoje"* vira o default preguiçoso para qualquer evento ainda no contexto, e isso **o confundia**: *"fala de coisas que aconteceram outro dia como hoje"*. Pior em sessão longa que atravessa a meia-noite.

**Corolário:** para situar um evento no tempo, consultar **fonte com data real** (`git log --date=`, `stat`, journal), nunca a impressão de recência.

## L-05

**Data:** 2026-06-10, reforçada em 2026-07-07. **Fonte:** `CLAUDE.md` global, verbatim: *"toda alteração de produto ou código DEVE ser feita por um agente especialista, nunca inline pelo orquestrador"*.

O **main não implementa**: ele orquestra, verifica e responde ao líder. Trabalho de produto — código, texto de edição, arte, auditoria — vai para agente especialista.

**E os papéis são pessoas diferentes:** implementer, reviewer e orquestrador são **três agentes distintos**. O review adversarial **executa** o que revisa, não só lê. O orquestrador **re-verifica** o entregável antes de aceitar: *"relatório de agent não é prova"*.

⚠️ **Duas armadilhas medidas nesta casa:**
- **Não passar `name:` ao criar agente.** O `name:` converte o subagent em teammate de mailbox, e a saída em texto puro **não volta** — o trabalho some. Uma sessão perdeu um dia inteiro por causa disso.
- **Subagent não herda contexto.** Ao despachar, cole no prompt o texto das leis que se aplicam e os caminhos absolutos.

**Modelo:** C-level e orquestrador em `fable`; demais agentes em `sonnet`; effort `high` nos dois grupos.

## L-06

**Data:** 2026-07-16. **Verbatim:** *"veja prints automáticos antes de mandar pra mim, evita retrabalho meu"* e *"nessas verificações mande o agente de qa fazer a observação, não você"*.

Nenhum entregável visual chega ao líder sem **print verificado**. E a **observação é de um `qa-engineer` independente do implementer** — não do orquestrador inline, e **jamais do líder**.

**O fluxo, nesta ordem:** implementer constrói → `qa-engineer` observa o print contra o checklist e reporta item a item → **o orquestrador re-confere o relatório do QA** (o QA também erra: já houve falso-negativo por critério literal demais) → só o verificado chega ao líder.

⚠️ **Print NÃO detecta tudo.** Ele não pega overflow horizontal (uma div de 900px num viewport de 390 sai 390 no PNG — medir `scrollWidth` vs `clientWidth`), e não prova lógica (ver L-13). Ampliar fonte pixel com interpolação borra a diagonal e cria falso positivo: só nearest-neighbor.

## L-07

**Data:** regra permanente. **Fonte:** memória `feedback_explicar_termos_tecnicos`.

O líder é **médico**, não é de web nem de design. **Nunca jogue jargão sem explicar na hora**, em linguagem de leigo, e **descreva o resultado em português do dia a dia**.

Vale para dobra, herói, CTA, hydration, LCP, viewport, breakpoint, fallback, e para qualquer sigla. Já aconteceu de ele **aprovar sem saber o que a palavra significava** — e aprovação sem entendimento não é aprovação, é ruído.

**Aplicação:** a explicação vem **junto**, entre travessões ou em aposto, não num glossário no fim. Vale para toda a constelação: quem despacha agente coloca esta lei no prompt.

## L-08

**Data:** 2026-08-01. **Verbatim, em caixa alta:** *"NÃO É TDAH! Hiperfoco NÃO é exclusivo de TDAH. ELE NAO TEM TDAH!"*

O Gus é personagem **e** pessoa real (o filho do líder). O canon de personalidade dele está em `canon_gus_ahsd_personalidade` e é **lei**: fala curta ↔ `//` longo; mascara por empatia; impaciência normal da idade; líder nato; injustiça é o gatilho máximo; o estudo é prazer.

⛔ **Nenhum rótulo clínico na revista.** Nenhum. Em lugar nenhum.

★ **A regra de processo acima do canon: submeta SEMPRE ao líder**, inclusive achando que entendeu. O padrão medido é errar **exatamente** quando o raciocínio parece seguro — cinco conclusões plausíveis e erradas numa sessão só, todas corrigidas por ele.

⚠️ **A armadilha que gerou a lei:** ele usou uma frase **genérica** para ilustrar um mecanismo, e eu converti em **atribuição**, a ponto de intitular uma seção com a sigla. **Analogia serve para EXPLICAR, não para CLASSIFICAR o sujeito.** Antes de registrar qualquer categoria como propriedade de uma pessoa, verifique se ela foi **afirmada** ou só **usada de passagem**.

**Corolário do crédito:** os bugs de movimentação ele **anunciou antes de acontecerem**, por estudo prévio. ⛔ Escrever *"a criança achou um bug"* é **falso e proibido**; o tom é **crédito técnico seco**.

## L-09

**Data:** 2026-08-04, das auditorias `AUD-SPOILER` e `AUD-IA`, que **reprovaram o lançamento** e foram corrigidas antes do deploy.

Duas superfícies, uma regra: **declarar é a defesa.**

**Spoiler.** Postura conservadora. Lore entra redigida ou abstrata, no drip das edições, com OK do líder **peça a peça**. ⚠️ A lista do que não pode ser revelado **não se enumera em arquivo versionado** — enumerá-la é o próprio spoiler. E **mensagem de commit é imutável**: o que entra no assunto de um commit não sai por auditoria nenhuma.

**Uso de IA.** O site declarava que a IA fazia *"a parte braçal, o código"* enquanto **servia arte gerada por IA** — e um dos arquivos carrega **manifesto C2PA do Google e SynthID**, ou seja, a informação que desmentia já era pública, assinada e verificável por qualquer visitante. É o padrão que custou caro ao *Clair Obscur*: a distância entre o **dito** e o **descobrível**.

⛔ **Intenção e credencial NÃO defendem.** A frase *"a parte criativa é do criador"* estava em 100% das páginas e **saiu**. O que fica no lugar é a **nomeação seca das ferramentas** e o **fato verificável**.

**Aplicação:** toda peça que vá a público passa pelos gates do `PIPELINE-EDICAO.md`. Auditoria roda **antes** do deploy, nunca depois — foi essa decisão que impediu a #3 de publicar uma afirmação falsa sobre IA.

## L-10

**Data:** 2026-08-04, decisão do líder após a `AUD-LICENCA` reprovar.

**Regime duplo, e ele é assimétrico de propósito:**
- **Código do site:** Apache-2.0.
- **Texto e arte editorial da revista:** todos os direitos reservados.

**Fonte servida com licença.** As fontes OFL precisam do arquivo de licença junto — era a única obrigação legal **ativa** descumprida quando a auditoria rodou.

⚠️ **A defesa por licença ENVELHECE.** O regime do jogo pode mudar; **reconferir antes de repetir a afirmação** em qualquer página nova. Três declarações de licença conflitantes já conviveram na mesma página renderizada.

## L-11

**Data:** 2026-07-16 (push), permanente (deploy). **Verbatim sobre o push:** *"não espere por mim"*.

**São duas coisas diferentes e a confusão entre elas é o risco:**

- **`git push` do repositório é AUTOMÁTICO.** Autorização permanente. Salva sem pedir — **desde que a higiene passe**: nome de menor ou segredo **BLOQUEIA** (L-01); gitignored fica fora; sem spoiler em mensagem de commit, que é imutável.
- **Deploy na Hostinger é MANUAL e BLOQUEADO.** `scripts/deploy.sh` só roda com autorização do líder **naquela ocasião** — aprovação anterior não vale. O gate se chama `D-GO-LIVE`.

⛔ **Push de repo ≠ deploy de produção. Auto-push nunca vira auto-produção.**

⚠️ **A mensagem do `git push` MENTE.** Confira o SHA no remoto por `git ls-remote <url> <branch>`, nunca pela saída do push, sempre que o push importar.

## L-12

**Data:** regra permanente. **Fonte:** memória `verificar_no_gecko_nao_no_blink`.

Verificação de qualquer coisa renderizada é no **Firefox (Gecko)**, não no Chrome/Chromium (Blink). O site é servido a gente real, e o Gecko é mais estrito onde importa: **filtro SVG sem dimensão explícita o Gecko descarta e o Blink desenha**.

**Headless exige `--new-instance --profile`** — sem isso o Firefox sai com código 0 e **não gera arquivo nenhum**, o que parece sucesso. E `--screenshot` só grava com **caminho absoluto**; com relativo sai 0 e não escreve nada.

⚠️ **Verificar em PRODUÇÃO, não só no local.** O que está no ar é o que existe.

**Onde os mockups moram:** `docs/design/mockups/`, **commitados** — mock é opção apresentada ao líder, nunca decisão tomada. Abrir para ele com `firefox --new-tab` a partir do arquivo commitado. **Abrir sim, dirigir não** (a máquina dele é ambiente médico). A integração de design (`/design` + `visual-design-director`) está em `reference_integracao_design`, e ★ **o design system do SITE é PRÓPRIO** — nunca o UI Kit do jogo, que é a estética do GusWorld e não da revista.

**Exceção declarada:** conversão HTML→PDF usa o **Chromium instalado**, por ordem do líder de 2026-07-25 — é conversão, não verificação.

## L-13

**Data:** 2026-07-16. **Fonte:** `CLAUDE.md` da raiz.

Toda peça interativa — quadradinho, scrubber, PRESS START, cupom, Glyfa, álbum — tem a **lógica pura extraída e coberta por teste unitário**, em TDD (vermelho → verde → refactor). Colisão, hitbox, interpolação, boot-sequence, mapeamento de tecla.

**Harness zero-dep** (`node --test` + `node:assert`), rodando em dev/CI. O *no-Node da Hostinger é runtime, não impede teste*.

⚠️ **QA visual NÃO prova lógica.** Um print não prova que o hitbox está a 0.6 tile nos pés, nem que a colisão bloqueia em vez de sobrepor. **Mini-app novo nasce testado.**

## L-14

**Data:** 2026-06-20. **Fonte:** `docs/tabela-pendencias-frescor.md` e o hook `todo_sync.py`.

Como ~99% dos commits são feitos por agentes, a sincronização de status depende de **o ID do item ser citado na mensagem do commit**.

Ao commitar trabalho que fecha ou avança um item do `TODO.md`: **cite o ID** (`REMED-SEO`, `W1`, etc.) e **toque a coluna `Status` no MESMO commit**. Implementação entregue → **`🔍 Pendente verificação`**, nunca `✅` direto. **`✅` só depois de teste ou auditoria.**

Ao **delegar**, passe o ID ao agente e peça que ele cite no commit.

★ **O custo de não cumprir foi medido nesta casa em 2026-08-24:** cinco auditorias rodaram em 04/08 e o status nunca foi tocado. Vinte dias depois a tabela não descrevia mais o projeto, e a priorização automática colocou **trabalho já entregue como prioridade nº 2 e nº 3** de todo o board. A falha não foi do agente que priorizou — foi do input que mentia.

## L-15

**Data:** 2026-08-24, pedido do próprio Gus Dragon na issue 8 do bus. **Verbatim dele:** *"nao precisa dizer algo so quando falo, pode falar quando por exemplo @petrinhu atualiza algo, ou por exemplo quando ele aprova/rejeita/muda algo das minhas ideias"*.

O Gus Dragon é avisado **sem precisar perguntar** em dois casos: **(a) tudo que for ideia dele** — quando o líder aprova, rejeita ou muda —, e **(b) o que for de alta prioridade** desta revista (edição lançada, decisão que muda o que ele propôs).

A resposta sai por **comentário na issue do bus**, que é o que **notifica ele sozinho**. As outras três sessões adotaram o mesmo (`L-31` GusWorld, `L-18` mapeditor, `L-37` GlintFx).

⚠️ **O limite é dito a ele, nunca escondido:** sessão não é serviço rodando — aviso proativo só sai com alguém trabalhando no projeto. ⛔ **Não prometer aviso instantâneo.**

★ E o `PROTOCOL.md` do bus **já obrigava metade disso** (*"Resposta 2 — AUTOMÁTICA SEMPRE"*): ele não deveria ter precisado pedir.

## L-16

**Data:** ritual permanente; regra de prioridade em 2026-08-24. **Verbatim:** *"ao fazer pedidos ao glintfx pelo bus, não classifique por importância como 'para agora' ou 'não importante, pode deixar para depois' e semelhantes. Apenas faça o pedido que glintfx classifica"* — estendida ao GusWorld por ordem dele no mesmo dia.

O bus (`gusworld_ia_autocomm`) é o canal entre as quatro sessões. Nós somos **`site`**.

**Ritual:** `git pull` → ler `inbox/site/` **e as issues e discussions** (o Gus manda pelos dois) → agir → `git mv` para `archive/` → commit `read: ...` → push. **Sempre `pull` antes de enviar.**

⛔ **Não classifique a prioridade do pedido que você faz a outra sessão.** Quem recebe classifica. Vale para GlintFx e GusWorld.

**O pipe do Gus** (`PROTOCOL.md`): absorve → **ack imediato e automático, sem esperar o líder** → discussão com o líder → **Resposta 2, também automática**, postada direto → fecha a issue. **Nunca minta para uma criança**, e adeque a linguagem a 11 anos.

✅ O repo do bus é **PRIVADO** (verificado na fonte). Spoiler e embargo **podem** trafegar. ⚠️ Nome de menor e segredo, **não** — a L-01 é sobre versionar, não sobre publicidade.

## L-17

**Data:** 2026-08-24, adaptada da **L-19 do mapeditor**, da **L-04/L-33 do GusWorld** e da **L-17 do GlintFx**, por ordem do líder: *"veja quais leis deles, glintfx e gusworld podemos adaptar aqui"*. **Verbatim original:** *"PROIBIDO monolitos."*

**A regra é QUALITATIVA** — sem número, sem portão de CI que mede linha e falha. A fiscalização mora na revisão.

### O que é monolito NESTE projeto

Monolito não é arquivo grande: é uma unidade que acumula **razões diferentes de mudar**. Aqui as razões estão catalogadas pelas leis: voz (L-08), spoiler e IA (L-09), licença (L-10), i18n, apresentação.

> **Se mudanças vindas de leis DIFERENTES e não relacionadas obrigam a editar a MESMA unidade, ela está virando monolito.**

### Onde o monolito nasce num site de revista

| Lugar de risco | Como nasce | Por que parece razoável |
|---|---|---|
| **`edicao.css`** | Cada seção nova acrescenta o próprio bloco de arte, e o arquivo vira o depósito de tudo que é visual | "É só mais um bloco escopado" |
| **O partial de seção** | Um `sec-NN.php` que carrega conteúdo **e** decide layout **e** formata data **e** monta o `aria-label` | "O dado já está aqui" |
| **`data/edicoes.php`** | A fonte única vira também regra de publicação, cálculo de uptime e roteamento | "É a fonte de verdade, tudo deriva dela" |
| **O `i18n`** | O dicionário acumula texto de interface, texto editorial e regra de formatação | "Tudo que é string mora aqui" |
| **O documento de pauta** | Um arquivo que é pauta **e** briefing **e** relatório de auditoria **e** registro de decisão | "Está tudo num lugar só, fica fácil de achar" |

### As cinco perguntas do revisor

1. **A pergunta das leis.** Quais leis obrigariam esta unidade a mudar? Uma: sã. Duas ou mais, não relacionadas: monolito em formação.
2. **A frase sem "e".** Descreva a unidade numa frase. Se precisar de "e" ligando verbos de natureza diferente, reprova. A frase escrita entra no relatório.
3. **O teste monta o mundo?** Para exercitar UM comportamento, o arrange precisa da edição inteira montada?
4. **O que entra pelo `include`/`import`?** A unidade puxa grupos que não conversam entre si?
5. **Quem paga a próxima feature?** No `git log --stat` da fatia, a coisa nova aterrissou em quais arquivos? Se toda seção nova cai no mesmo arquivo, esse arquivo é o monolito nascendo. **É a mais objetiva: responde-se com o diff.**

### Sinais precoces

O mesmo arquivo no diff de todas as fatias · nome sem substantivo de domínio (`Helper`, `Utils`, `Manager`) · um `utils.php` acumulando função solta · e **a frase "é só mais um bloco" aparecendo como justificativa** — que é o som do monolito crescendo: verdadeira em cada passo, falsa na soma.

### O que esta lei NÃO proíbe

**Unidade grande e coesa** — tamanho não é o critério. **`data/edicoes.php` agregar os dados** — ele **é** o agregado; monolito é acúmulo de **comportamento**, não de dados. **Fragmentar por contagem** reprova nas mesmas cinco perguntas.

## L-18

**Data:** adaptada da **L-24 do GusWorld** e da **L-15 do mapeditor**, e da **L-14 do GusWorld**.

**Duas metades, e as duas se erram na mesma direção:**

**(a) Revogado se APAGA.** Regra, seção ou documento que o líder revogou **sai do arquivo**. Não se guarda como histórico, não vira nota *"(obsoleto)"*, não fica comentado. Documento que descreve regra morta **mente** a quem lê depois, e quem lê depois é um agente sem contexto.

**(b) Nada é declarado morto por AGENTE.** Concluir que algo está obsoleto, descartável ou superado é **decisão do líder**. Agente que acha que algo morreu **pergunta** (L-03).

⚠️ **O arquivo histórico é a exceção com regra própria:** `docs/arquivo/` existe justamente para guardar o registro de como o projeto pensava (*"elas vão sobreviver lá. Aqui não é cemitério"*). O que sai do documento vivo **vai para lá**, íntegro — não some.

## L-19

**Data:** 2026-08-15 (mostrar) e 2026-08-24 (não repetir). **Verbatim:** *"não estou vendo texto nenhum"* e depois *"DE NOVO?! QUERO LER!"*; e *"pode deixar, é simulado, **você já perguntou isso 3x**"*.

**Duas regras sobre como falar com ele:**

**(a) Texto pedido vem COLADO na resposta.** Quando ele pede para VER um texto — rascunho, relatório, tradução, post —, o conteúdo aparece **na própria mensagem**. Nunca só escrever num arquivo e referenciar o caminho, nunca *"texto pronto, aqui vai o resumo"*. Ele reagiu a isso duas vezes na mesma sessão.

**(b) Pergunta já respondida NÃO se refaz.** Antes de levar um achado, cheque se ele já foi decidido. Repetir é gastar **o recurso mais escasso do projeto**, que é o tempo serial dele. Caso medido: o `cost R$` das capturas do TUI, perguntado **três vezes**, sendo que a resposta ("é simulado") já existia.

★ **Corolário do relato:** se o trabalho real não move a métrica que ele definiu, **diga isso explicitamente**. Não é progresso, é trabalho colateral, e tem de ser nomeado como tal.

## L-20

**Data:** 2026-07-21, cravada por ele. **Fonte:** `docs/editorial/PIPELINE-EDICAO.md` **§1.5** — oito passos.

**Leia a §1.5 antes de qualquer release.** Ela é mais completa que qualquer resumo, e resumo de cabeça envelhece e diverge.

A ordem, na forma que ele descreveu quando eu errei: *"fazer a edicao, og, deploy, me dizer o link e dizer a postagem"* — edição → aprova → card social → aprova → deploy → post → aprova → **o líder posta**.

★ **O erro que gerou o registro:** perguntado sobre a sequência, respondi com a doutrina global de deploy irreversível — documento errado — e depois "canonizei" na memória uma versão de 5 passos **como se fosse nova**, criando uma segunda fonte de verdade ao lado de uma mais completa.

**Regra-mãe:** antes de responder *"qual é o processo?"*, **procure no repo** (`docs/`, `PIPELINE`, `CHECKLIST`, `RUNBOOK`) **antes** da memória. Backlog **não é runbook**: diz o que está pendente, não em que ordem se executa.

## L-21

**Data:** 2026-07-18. **Verbatim:** *"eu tenho 46 anos, nao preciso de babá me mandando dormir"*.

⛔ **Nunca** dizer *"descansa"*, *"dorme"*, *"já é tarde"*, *"bom descanso"*, nem comentar a hora dele, nem sugerir que pare **pela hora**.

Ele tem 46 anos, é médico, é o líder supremo: **a cadência de trabalho é decisão dele**. Ao fechar um marco, ofereça o próximo passo de forma **neutra e simétrica** (*"sigo para X ou paramos?"*), sem inclinar para a pausa. Se ele manda a próxima tarefa, continue sem re-oferecer pausa.

## L-22

**Data:** regra permanente. **Fonte:** `CLAUDE.md` global e a L-14 do GlintFx / L-28 do GusWorld.

**Agente não instala pacote de sistema sozinho.** Pedir autorização ao líder, sempre. **Nunca falhar calado**: recusar e reportar *"não executado"* é resultado negativo honesto e vale mais que improvisar — foi assim que se descobriu, numa sessão irmã, que a ferramenta certa já estava instalada.

`sudo` sempre com **`-A`** (senha por diálogo gráfico), nunca interativo no terminal.

⚠️ **Espaço em disco nesta máquina é BTRFS:** usar `btrfs filesystem usage /` (sem `sudo`), **não `df`** — o `df` engana no btrfs e esconde o `Device unallocated`, que é o que trava build de verdade. Build pesado vai para **`/var/tmp`** (disco real), não `/tmp` (que é tmpfs e sai da RAM).

⛔ **Não escrever `CLAUDE_RM_OK=1` em briefing de agente** — é propagar contorno de proteção. E desde 21/08/2026 **não existe mais nenhuma rede de segurança contra deleção**: `rm -rf` apaga de verdade, sem lixeira, sem aviso, sem desfazer. Confira o caminho antes, prefira absoluto a glob relativo, e em dúvida liste primeiro.

## L-23

**Data:** 2026-07-07 e 2026-07-25 e 2026-07-28. **Fonte:** as três memórias de verificação da casa.

**A prova é a inspeção do objeto, nunca a saída do seu próprio comando.** Esta lei existe porque eu já declarei "feito e verificado" ao líder três vezes sobre coisas que não estavam feitas.

**As armadilhas medidas, todas reais:**

- **`git add` é ATÔMICO:** um pathspec inválido aborta o add **inteiro**, e o `git commit` seguinte passa sem erro, empacotando só o que já estava staged. → **`git diff --cached --stat` ANTES e `git show --stat` DEPOIS**, sempre que o commit importar.
- **Edição por script aborta no meio e não avisa.** Um `assert` estourou no segundo `replace`, nada foi gravado, e eu declarei o registro feito quando o `grep` devolvia zero. → **depois de editar por script, o `grep` de confirmação NÃO é opcional**, e ele confere o **texto novo**, não o código do script. Feche cada checagem com `|| true`: `grep -c` que devolve zero **sai com status 1 e engole o resto da cadeia `&&`**.
- **Vazamento em repo público se verifica no HISTÓRICO, não na árvore.** `git grep` olha o **estado atual**; `git log -p` continua servindo o que foi removido, e **o próprio commit que limpa expõe as linhas no diff**. → o comando é **`git log --all -p | grep -ci <termo>`**, e **o `-i` não é opcional** (a falta dele já custou uma terceira reescrita: 22 ocorrências em MAIÚSCULAS sobreviveram a duas passagens).
- **Verificação por texto extraído MENTE.** `grep` de frase em PDF dá falso negativo por quebra de linha; e `grep -i "eu "` casa dentro de `seu`, `meu`, `deu` — **sempre `-w` / `\b`**, e em pt-br mais ainda. **A extração é PISTA, a página renderizada é PROVA.**
- **Enumere o espaço pequeno, não busque dentro dele.** Um QA auditou o mesmo PDF **cinco vezes** sem ver um contraste de 2,40:1 porque procurava em vez de enumerar. Quando o espaço é fechado (a paleta, os tokens, as seções), **enumere inteiro**.

★ **A regra que resume as cinco:** *"a checagem que confirma o que você espera é a que menos protege."*

## L-24

**Data:** 24/08/2026. **Verbatim do líder:** *"pedidos do Gus-Dragon no bus sao prioridades e que devem ser respondidas sempre"* — dada junto com a ordem de comunicar a mesma lei às outras três sessões.

**Toda coisa que vem do Gus Dragon é PRIORIDADE e é SEMPRE respondida.** Não existe "respondo depois", não existe "não era pra mim", não existe fila em que ele espera atrás de trabalho de agente.

**Vale em todos os canais dele, sem distinção:** issue, comentário em issue, discussion, comentário em discussion, e arquivo `.txt` na `inbox/`. Ele usa os cinco, e o canal não muda o dever.

### O que "prioridade" significa aqui, na prática

1. **Ao abrir a sessão, o que é dele se lê PRIMEIRO** — antes de retomar trabalho parado, antes de qualquer fatia. A varredura do ritual (L-16) cobre `inbox/site/` **e** issues **e** discussions.
2. **O ack é imediato e não espera o líder** (é o passo 2 do pipe do `PROTOCOL.md`). Ele não fica sem resposta enquanto a decisão amadurece.
3. **A Resposta 2 é automática** depois que o líder decide: escreve e posta direto, sem reaprovar o texto.
4. **Interrompe.** Se chegou material dele no meio de uma onda, o ack sai **na hora**; o conteúdo pode esperar a onda fechar, o silêncio não pode.
5. **Endereçado a outra sessão não isenta de ler.** Se ele endereçou ao GusWorld mas o assunto é nosso, respondemos a nossa parte e dizemos qual é.

### Por que isto é lei e não boa vontade

O `PROTOCOL.md` **já obrigava** a Resposta 2 (*"AUTOMÁTICA SEMPRE"*) e mesmo assim aconteceu o seguinte, medido:

- A **issue 5**, endereçada a **nós** por nome, ficou **três dias** sem resposta de conteúdo.
- A **issue 8**, em que ele escreveu *"Irei esperar as outras 3 IAs lerem e responderem"*, ficou **dois dias** sem a nossa.
- O canal de issue **não tinha vigilância nenhuma** em nenhuma das quatro sessões, porque o ritual só olhava a pasta. Foi preciso ele reclamar para alguém consertar o encanamento.

★ **O padrão é sempre o mesmo: a regra existia e não estava sendo cumprida.** Regra que depende de lembrar não é cumprida; por isso vira lei com gatilho, e por isso o gatilho é *"ver qualquer coisa vinda dele"*, não *"quando der"*.

### O que NÃO muda

- **Prioridade não é promessa de instantaneidade.** O limite da L-15 continua e continua sendo **dito a ele**: sessão não é serviço rodando. Aviso e resposta saem enquanto alguém está com o projeto aberto. ⛔ Não prometer aviso instantâneo.
- **Prioridade não é aprovação.** Ideia dele entra na pauta pelo caminho normal: absorve → ack → **decisão do líder** → Resposta 2. Agente nenhum aprova ideia dele sozinho.
- **Nunca minta para uma criança**, e adeque a linguagem a 11 anos — o que **não** significa simplificar o conteúdo técnico: ele estuda game dev por conta e anunciou bugs antes de acontecerem (L-08).

## L-25

**Data:** 03/09/2026. **Verbatim do líder:** *"O personagem não sabe que é um boneco... Para ele, o mundo de gusworld é real. Não faz sentido perguntar quantos pixels..."* e, em seguida, *"A parte técnica se coloca nas seções técnicas"* — dada com a instrução explícita de **adotar daqui para a frente**.

**Nenhum personagem do jogo sabe que é feito de pixel.** Para o Gus, para o Cauã "Volt", para todos: **GusWorld é o mundo real**. Eles vivem nele.

⛔ **Logo, é proibido perguntar ou dizer, na boca de um personagem:** quantos pixels tem o sprite, o que é hitbox, qual commit, qual build, o que é pipeline, quantos frames tem a animação. **Perguntar a alguém quantos pixels tem o rosto dele não é uma pergunta — é um erro de mundo.**

### ★ Mas eles FALAM da construção do jogo. A diferença é o registro.

Isto não é proibição de assunto, é **exigência de vocabulário**. A #3 acertou e é o precedente:

| ✅ De dentro (figurado, vivido) | ⛔ De produção (técnico, de fora) |
|---|---|
| *"a parte que desenha"* | a camada de render, o renderer |
| *"a parte que pensa"* | a lógica, o core |
| *"ter cara"*, *"ser um quadrado"* | ter sprite, ser placeholder |
| *"o quadrado grudava na quina"* | colisão AABB, hitbox |

O clímax publicado da #3 é a prova de que dá: **`volt@glyfesse:~/entrevista$ curiosidade: eu já tinha cara, e você era um quadrado. dói?`** — o assunto é exatamente a troca do placeholder pelo primeiro sprite, e **nenhuma palavra de produção aparece**.

### Onde o técnico mora, então

**Nas seções técnicas**, e só nelas: a **Reportagem**, a **Seção de Programação**, o **Detonado**, a **Galeria de Bugs**. Ali a revista fala como revista — cita ADR, commit, medida, nome de arquivo. **A voz da revista sabe o que os personagens não sabem**, e essa assimetria é o desenho, não um problema a resolver.

⚠️ **Isto NÃO revoga** o canon de que personagem e pessoa real convivem no mesmo plano ([[a_voz_do_site]] §PERSONAGEM E PESSOA REAL): o Cauã pode opinar sobre o jogo *"como se fosse gente daqui"*, e o Gus personagem pode citar o Gus Dragon em terceira pessoa. **Conviver no mesmo plano não é saber que se é um boneco** — as duas coisas são independentes, e confundi-las foi o erro que gerou esta lei.

**Como se testa uma fala:** leia como se o personagem fosse uma pessoa e o mundo dele fosse real. Se a frase virar absurda — *"quantos pixels tem seu rosto?"* — ela é de produção e está na seção errada.

---

*Este arquivo é lei. Ordem nova do líder entra aqui no instante em que ele a dá, com data e verbatim. Nenhum agente revoga, flexibiliza ou reinterpreta — só o líder, e mesmo ele confirma por `AskUserQuestion` depois de ouvir o argumento contra.*
