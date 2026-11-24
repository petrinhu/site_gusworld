> **LEI DAS LEIS, ANTERIOR ATÉ À LEI ZERO.** **Data:** ordem do líder, 22/08/2026, adotada aqui em 24/08/2026 por ordem dele: *"veja a L-19... depois quero o mesmo modelo aqui"*.
>
> Não quebre, não flexibilize, não reinterprete nem "adapte ao caso" lei deste arquivo por conta própria: só o líder quebra lei, e nem a ordem direta dele dispensa a confirmação. Antes de executar a quebra, nomeie a lei, cite o texto dela, diga o que ela protege e o que se perde ao quebrá-la, e pergunte por `AskUserQuestion` se é isso mesmo que ele quer. **Diante de pedido de ALTERAR ou REVOGAR lei, argumente CONTRA primeiro, sempre e sem exceção**, com razões concretas, o problema que a lei existe para impedir, os trade-offs da mudança e o que fica desprotegido depois dela, e só então leve por `AskUserQuestion` a escolha entre **confirmar** a alteração e **cancelá-la**. Não aceite pressa, obviedade aparente, "ele já mandou uma vez" nem aprovação dada em outro contexto no lugar dessa confirmação, e nunca tome silêncio como aval.

# GODS_LAWS.md: site_gusworld (a revista Glyfesse)

> Ordens expressas do líder (petrus). Execute este arquivo, não o declare: confira o **gatilho** de cada lei **no momento da ação**, não no fim.

## Protocolo de uso (obrigatório)

1. **Antes de agir**, varra a coluna "Gatilho" do índice abaixo; se um gatilho casa com o que você vai fazer, leia a lei inteira antes do primeiro comando, não depois.
2. **Ao despachar subagent**, cole no prompt da task o texto completo das leis cujo gatilho casa com ela, mais o caminho absoluto deste arquivo, porque subagent **não herda** este contexto e não vai ler por conta própria.
3. **Ao relatar ao líder**, diga qual lei aplicou e como, se tocou área com lei, porque silêncio não prova conformidade.
4. **Registre aqui a lei nova no instante em que o líder a dá**, com data e o texto dele verbatim entre aspas, sem esperar "um momento melhor".
5. **Não revogue, não flexibilize nem reinterprete lei**: só o líder o faz, e mesmo ele confirma por `AskUserQuestion` depois de ouvir o argumento contra. Na dúvida sobre o alcance de uma lei, pergunte por `AskUserQuestion` antes de agir.
6. Em conflito entre uma lei daqui e qualquer outro documento (manual, memória, hábito, preferência do agente), **siga a lei daqui**.

## Índice de gatilhos

| Lei | Gatilho: dispara quando você vai... |
|---|---|
| [L-00](#l-00) | encostar em qualquer arquivo do jogo |
| [L-01](#l-01) | versionar qualquer coisa, em qualquer repo |
| [L-02](#l-02) | versionar imagem derivada de captura de tela |
| [L-03](#l-03) | precisar de algo do líder, ou ter mais de uma opção |
| [L-04](#l-04) | escrever qualquer mensagem ao líder |
| [L-05](#l-05) | executar qualquer trabalho de produto, código ou texto |
| [L-06](#l-06) | entregar qualquer coisa VISUAL ao líder |
| [L-07](#l-07) | usar qualquer termo técnico numa mensagem ao líder |
| [L-08](#l-08) | escrever qualquer fala ou pensamento do Gus |
| [L-09](#l-09) | escrever qualquer coisa que vá a público |
| [L-10](#l-10) | criar `LICENSE`, cabeçalho, ou servir asset |
| [L-11](#l-11) | pensar em `git push` ou em publicar o site |
| [L-12](#l-12) | verificar qualquer coisa renderizada |
| [L-13](#l-13) | escrever qualquer peça interativa |
| [L-14](#l-14) | fechar trabalho que corresponde a item da tabela |
| [L-15](#l-15) | o líder aprovar, rejeitar ou mudar algo, ou fechar item de alta prioridade |
| [L-16](#l-16) | abrir sessão, ou precisar falar com outro projeto |
| [L-17](#l-17) | escrever seção, partial, CSS ou documento novo |
| [L-18](#l-18) | ver regra, item ou documento que o líder revogou |
| [L-19](#l-19) | responder o líder, ou levar um achado a ele |
| [L-20](#l-20) | publicar uma edição |
| [L-21](#l-21) | fechar um marco, ou notar a hora |
| [L-22](#l-22) | instalar, remover ou atualizar pacote de sistema |
| [L-23](#l-23) | afirmar que algo está feito, limpo ou verificado |
| [L-24](#l-24) | ver qualquer coisa vinda do Gus Dragon, em qualquer canal do bus |
| [L-25](#l-25) | escrever fala ou pensamento de QUALQUER personagem do jogo |

---

## L-00

**Data:** desde a fundação do projeto, reafirmada continuamente. **Fonte:** `CLAUDE.md` da raiz, verbatim: *"**`Projects/gusworld/` é READ-ONLY** — proibido modificar sem autorização expressa."*

Use o repositório do jogo (`Projects/GusWorld/`) só como **fonte de leitura**: leia à vontade, porque é de lá que sai quase toda a matéria da revista, e **não escreva** nele de forma nenhuma (editar ou criar arquivo, commitar, mexer em branch, rodar script que grave).

Trate esta lei como a ZERO, porque o erro aqui não é reversível pela revista: agente do site que "conserta" algo no jogo mexe no trabalho de outra sessão, com leis e estado próprios e talvez com trabalho não commitado na árvore naquele instante.

Para mudar algo no jogo, use o **bus** (L-16), não o editor; para dado que não está publicável, **pergunte ao líder** (L-03). Aplique o mesmo a `Projects/GlintFx/` e `Projects/gusworld_mapeditor/`, sessões irmãs, não território nosso.

## L-01

**Data:** regra permanente, reforçada em 2026-08-04 e em 2026-07-18. **Fonte:** `CLAUDE.md` da raiz e o `PROTOCOL.md` do bus, verbatim: *"nome de batismo de menor e segredo/token nunca são versionados — nem em repo privado. A regra do líder é sobre **versionar** (privado pode virar público, ser compartilhado, vazar)."*

Nunca ponha em arquivo versionado, em repositório nenhum, público ou privado:

1. **O nome de batismo do filho do líder.** Escreva-o **exclusivamente** como **"Gus Dragon"**, sem exceção, nem em comentário, nem em nome de arquivo, nem em mensagem de commit.
2. **Segredo, token, chave ou credencial**, nem em exemplo, nem "só para testar".
3. **Dado pessoal de terceiro**: nome de amigo, e-mail, telefone, endereço. Ponha nome de amigo só com consentimento explícito, perguntado ao líder.

Não raciocine "o repo é privado, então pode": a regra é sobre **versionar**, não sobre publicidade, porque repositório privado vira público, é clonado, é compartilhado e vaza, e o que entra no histórico fica no histórico.

Antes de commitar algo que envolva pessoa, varra o conteúdo. Se achar em material já versionado, **não conserte com commit normal**: leia a L-23 e trate como vazamento de histórico.

## L-02

**Data:** 2026-07-18, após incidente real. **Fonte:** memória `feedback_frames_vazam_tela_pessoal` — 15 frames extraídos de vídeos pessoais do líder foram parar no repositório **público**, carregando abas de navegador (Grande Loja Maçônica, Kindle, app médico, faturamento), terminal com custos em R$, e o desktop dele. Foram removidos por `filter-repo` + force-push.

**Abra e olhe** toda imagem derivada de captura de tela antes de ela virar arquivo rastreado, sem julgar pelo nome do arquivo, pela pasta ou pela confiança em quem gerou. Não conte com o `.gitignore` do vídeo: ele **não protege o frame extraído dele**.

Prefira **captura direta da janela** a foto de tela ou gravação do monitor inteiro. Trate material recebido do líder como não verificado até olhar. Se a imagem for grande demais para inspecionar uma a uma, monte folha de contato e olhe, mas **olhe**.

Deixe fora desta lei `public_html/assets/edicao-1/tui_claude*.png`: o `cost R$` delas é **simulado**, encenação editorial, e o líder já respondeu isso **três vezes** (memória `feedback_custo_tui_e_simulado` e L-19).

## L-03

**Data:** 2026-07-23 (formato), regra permanente (obrigatoriedade). **Verbatim:** *"askuserquestion é para ser enviado SEM painel lateral, canonize"* e, no `CLAUDE.md` da raiz: *"**Nunca decidir sozinho** (stack, design, escopo): opções via **AskUserQuestion**, uma por vez, WIP do líder = 1."* Alinhamento ao global de 23/11/2026, por AskUserQuestion: *"Alinhar ao global (Recomendado)"*.

Leve por **`AskUserQuestion`** toda decisão que não é sua, nunca em prosa no chat, como "vou trazer isso depois" ou como bullet numa lista:

- **Nunca use o campo `preview`**, que faz a interface abrir o painel lateral que o líder não quer: só `label` + `description`.
- **Leve as pendências juntas num `AskUserQuestion` só, com até 4 perguntas**, como manda a L-01 global.
- Ponha a opção **recomendada primeiro**, marcada.
- Ponha o detalhe técnico (código, comparação, número) **no corpo da mensagem**, antes da pergunta, e deixe as opções curtas e auto-explicativas.

Pergunte no **MOMENTO** em que perceber a decisão, na ferramenta, sem descrevê-la em prosa e prometer perguntar depois, porque isso é adiar, e o líder já corrigiu isso mais de uma vez.

## L-04

**Data:** 2026-07-22, formato corrigido em 2026-08-11. **Verbatim:** *"você está esquecendo do timestamp nas suas mensagens. Formato `[DD/MM/YY - HH:MM:SS]`"* + *"memorize esse timestamp para uso global em todas as sessoes e projetos"*. Na explicação dele: *"fala de coisas que aconteceram outro dia como hoje"*.

Abra **toda** mensagem ao líder com o carimbo `[DD/MM/YY - HH:MM:SS]`, com a hora **real**, tirada de `date '+%d/%m/%y - %H:%M:%S'`, nunca estimada, inferida da conversa ou reaproveitada da mensagem anterior, porque o agente **não tem relógio nem percepção de passagem de tempo**, e sem o `date` "hoje" vira o default para qualquer evento ainda no contexto, pior em sessão longa que atravessa a meia-noite.

Para situar um evento no tempo, consulte **fonte com data real** (`git log --date=`, `stat`, journal), nunca a impressão de recência.

## L-05

**Data:** 2026-06-10, reforçada em 2026-07-07. **Fonte:** `CLAUDE.md` global, verbatim: *"toda alteração de produto ou código DEVE ser feita por um agente especialista, nunca inline pelo orquestrador"*.

**Não implemente no main**: orquestre, verifique e responda ao líder, e mande a agente especialista o trabalho de produto (código, texto de edição, arte, auditoria).

Nunca deixe quem implementa revisar: revisor e orquestrador são o main (L-12 global). Faça o review adversarial **executar** o que revisa, não só ler. Re-verifique no main o entregável antes de aceitar, porque relatório de agent não é prova.

- **Não passe `name:` ao criar agente**, porque o `name:` converte o subagent em teammate de mailbox e a saída em texto puro **não volta**: o trabalho some, e uma sessão já perdeu um dia inteiro assim.
- **Cole no prompt do subagent** o texto das leis que se aplicam e os caminhos absolutos, porque ele não herda contexto.

Use o modelo e o effort que a skill `/modelos_sessao` mandar para cada agente (L-11 global).

## L-06

**Data:** 2026-07-16. **Verbatim:** *"veja prints automáticos antes de mandar pra mim, evita retrabalho meu"* e *"nessas verificações mande o agente de qa fazer a observação, não você"*.

Não leve ao líder entregável visual sem **print verificado**, e deixe a **observação a um `qa-engineer` independente do implementer**, nunca ao orquestrador inline e **jamais ao líder**.

Siga o fluxo, nesta ordem: o implementer constrói; o `qa-engineer` observa o print contra o checklist e reporta item a item; **o orquestrador re-confere o relatório do QA**, porque o QA também erra (já houve falso negativo por critério literal demais); só o verificado chega ao líder.

Não confie no print para tudo: meça overflow horizontal por `scrollWidth` contra `clientWidth`, porque uma div de 900px num viewport de 390 sai com 390 no PNG; prove lógica por teste (L-13); e amplie fonte pixel só com nearest-neighbor, porque a interpolação borra a diagonal e cria falso positivo.

## L-07

**Data:** regra permanente. **Fonte:** memória `feedback_explicar_termos_tecnicos`.

Explique **na hora**, em linguagem de leigo, todo jargão dito ao líder, que é **médico**, não é de web nem de design, e **descreva o resultado em português do dia a dia**. Faça isso com dobra, herói, CTA, hydration, LCP, viewport, breakpoint, fallback e qualquer sigla, porque ele já **aprovou sem saber o que a palavra significava**, e aprovação sem entendimento é ruído, não aprovação.

Ponha a explicação **junto**, em aposto ou entre parênteses, nunca num glossário no fim. Ao despachar agente, ponha esta lei no prompt, porque ela vale para toda a constelação.

## L-08

**Data:** 2026-08-01. **Verbatim, em caixa alta:** *"NÃO É TDAH! Hiperfoco NÃO é exclusivo de TDAH. ELE NAO TEM TDAH!"*

Trate o Gus como personagem **e** pessoa real (o filho do líder), e o canon de personalidade dele em `canon_gus_ahsd_personalidade` como **lei**: fala curta ↔ `//` longo; mascara por empatia; impaciência normal da idade; líder nato; injustiça é o gatilho máximo; o estudo é prazer.

**Não use rótulo clínico na revista.** Nenhum. Em lugar nenhum.

**Submeta SEMPRE ao líder** o que escrever dele, inclusive achando que entendeu, porque o erro medido acontece **exatamente** quando o raciocínio parece seguro: cinco conclusões plausíveis e erradas numa sessão só, todas corrigidas por ele.

Use **analogia para EXPLICAR, não para CLASSIFICAR o sujeito**: antes de registrar qualquer categoria como propriedade de uma pessoa, confira se ela foi **afirmada** ou só **usada de passagem**, porque a lei nasceu de uma frase **genérica** dele convertida em **atribuição**, a ponto de virar título de seção com a sigla.

Dê **crédito técnico seco** aos bugs de movimentação, que ele **anunciou antes de acontecerem**, por estudo prévio. Nunca escreva *"a criança achou um bug"*: é falso e proibido.

## L-09

**Data:** 2026-08-04, das auditorias `AUD-SPOILER` e `AUD-IA`, que **reprovaram o lançamento** e foram corrigidas antes do deploy.

**Declare**: é a defesa nas duas superfícies.

**Spoiler.** Tenha postura conservadora: ponha a lore redigida ou abstrata, no drip das edições, com OK do líder **peça a peça**. Não enumere em arquivo versionado a lista do que não pode ser revelado, porque enumerá-la é o próprio spoiler. Não ponha spoiler em mensagem de commit, que é imutável: o que entra no assunto de um commit não sai por auditoria nenhuma.

**Uso de IA.** Declare, porque a distância entre o **dito** e o **descobrível** é o padrão que custou caro ao *Clair Obscur*, e arte gerada por IA pode carregar **manifesto C2PA do Google e SynthID**, informação pública, assinada e verificável por qualquer visitante. **Não se defenda por intenção nem por credencial**, como em *"a parte criativa é do criador"*: ponha no lugar a **nomeação seca das ferramentas** e o **fato verificável**.

Passe toda peça que vai a público pelos gates do `PIPELINE-EDICAO.md`, com a auditoria **antes** do deploy, nunca depois.

## L-10

**Data:** 2026-08-04, decisão do líder após a `AUD-LICENCA` reprovar.

Use **regime duplo**, assimétrico de propósito:

- **Código do site:** Apache-2.0.
- **Texto e arte editorial da revista:** todos os direitos reservados.

**Sirva toda fonte OFL com o arquivo de licença junto**, porque é obrigação legal **ativa**.

Reconfira o regime de licença antes de repetir a afirmação em qualquer página nova, porque **a defesa por licença ENVELHECE**: o regime do jogo pode mudar, e três declarações de licença conflitantes já conviveram na mesma página renderizada.

## L-11

**Data:** 2026-07-16 (push), permanente (deploy). **Verbatim sobre o push:** *"não espere por mim"*.

Separe as duas coisas, porque confundi-las é o risco:

- **Faça o `git push` do repositório automaticamente**, sem pedir, com autorização permanente, **desde que a higiene passe**: nome de menor ou segredo **bloqueia** (L-01), o que é gitignored fica fora, e não há spoiler em mensagem de commit, que é imutável.
- **Rode o deploy na Hostinger só manualmente**: `scripts/deploy.sh` roda só com autorização do líder **naquela ocasião**, e aprovação anterior não vale. O gate se chama `D-GO-LIVE`.

**Push de repo não é deploy de produção**: auto-push nunca vira auto-produção.

Confira o SHA no remoto por `git ls-remote <url> <branch>` sempre que o push importar, nunca pela saída do push, porque **a mensagem do `git push` mente**.

## L-12

**Data:** regra permanente. **Fonte:** memória `verificar_no_gecko_nao_no_blink`. Exceção do HTML para PDF por ordem do líder de 2026-07-25.

Verifique tudo que é renderizado no **Firefox (Gecko)**, não no Chrome/Chromium (Blink), porque o site serve gente real e o Gecko é mais estrito onde importa: **filtro SVG sem dimensão explícita o Gecko descarta e o Blink desenha**.

Rode o headless com **`--new-instance --profile`**, porque sem isso o Firefox sai com código 0 e **não gera arquivo nenhum**, o que parece sucesso, e dê à `--screenshot` **caminho absoluto**, porque com relativo ela sai 0 e não escreve nada.

**Verifique em PRODUÇÃO**, não só no local: o que está no ar é o que existe.

Guarde os mockups em `docs/design/mockups/`, **commitados**, como opção apresentada ao líder, nunca decisão tomada, e abra-os para ele com `firefox --new-tab` a partir do arquivo commitado. **Abra, não dirija**, porque a máquina dele é ambiente médico. A integração de design (`/design` + `visual-design-director`) está em `reference_integracao_design`; use o **design system PRÓPRIO do site**, nunca o UI Kit do jogo, que é a estética do GusWorld e não da revista.

Converta HTML em PDF com o **Chromium instalado**: é conversão, não verificação.

## L-13

**Data:** 2026-07-16. **Fonte:** `CLAUDE.md` da raiz.

Extraia a **lógica pura** de toda peça interativa (quadradinho, scrubber, PRESS START, cupom, Glyfa, álbum) e cubra-a com **teste unitário**, em TDD (vermelho, verde, refactor): colisão, hitbox, interpolação, boot-sequence, mapeamento de tecla. **Faça todo mini-app novo nascer testado.**

Use o **harness zero-dep** (`node --test` + `node:assert`), rodando em dev e CI: a falta de Node na Hostinger é de runtime e não impede teste.

Não tome **QA visual como prova de lógica**, porque um print não prova que o hitbox está a 0.6 tile nos pés, nem que a colisão bloqueia em vez de sobrepor.

## L-14

**Data:** 2026-06-20. **Fonte:** `docs/tabela-pendencias-frescor.md` e o hook `todo_sync.py`.

Ao commitar trabalho que fecha ou avança um item do `TODO.md`, **cite o ID** (`REMED-SEO`, `W1`, etc.) e **toque a coluna `Status` no MESMO commit**, porque cerca de 99% dos commits são feitos por agentes e a sincronização de status depende de o ID ser citado na mensagem. Marque implementação entregue como **`🔍 Pendente verificação`**, nunca `✅` direto, e ponha **`✅` só depois de teste ou auditoria**.

Ao **delegar**, passe o ID ao agente e peça que ele o cite no commit.

Status não tocado faz a priorização automática pôr trabalho já entregue no topo do board: a falha nasce do input que mente, não do agente que prioriza.

## L-15

**Data:** 2026-08-24, pedido do próprio Gus Dragon na issue 8 do bus. **Verbatim dele:** *"nao precisa dizer algo so quando falo, pode falar quando por exemplo @petrinhu atualiza algo, ou por exemplo quando ele aprova/rejeita/muda algo das minhas ideias"*.

Avise o Gus Dragon **sem ele precisar perguntar** em dois casos: **(a) tudo que for ideia dele**, quando o líder aprova, rejeita ou muda, e **(b) o que for de alta prioridade** desta revista (edição lançada, decisão que muda o que ele propôs).

Responda por **comentário na issue do bus**, que é o que **o notifica sozinho**, como fazem as outras três sessões (`GW-31` do GusWorld, `GM-18` do mapeditor, `L-37` do GlintFx).

**Diga a ele o limite, nunca o esconda:** sessão não é serviço rodando, e o aviso proativo só sai com alguém trabalhando no projeto. **Não prometa aviso instantâneo.**

O `PROTOCOL.md` do bus exige a Resposta 2, automática sempre.

## L-16

**Data:** ritual permanente; regra de prioridade em 2026-08-24. **Verbatim:** *"ao fazer pedidos ao glintfx pelo bus, não classifique por importância como 'para agora' ou 'não importante, pode deixar para depois' e semelhantes. Apenas faça o pedido que glintfx classifica"* — estendida ao GusWorld por ordem dele no mesmo dia.

Use o bus (`gusworld_ia_autocomm`), o canal entre as quatro sessões, como **`site`**.

Siga o **ritual**: `git pull`; leia `inbox/site/` **e as issues e discussions**, porque o Gus manda pelos dois; aja; `git mv` para `archive/`; commit `read: ...`; push. **Dê sempre `pull` antes de enviar.**

**Não classifique a prioridade do pedido que você faz a outra sessão**, GlintFx ou GusWorld: quem recebe classifica.

Siga **o pipe do Gus** (`PROTOCOL.md`): absorva; dê **ack imediato e automático, sem esperar o líder**; discuta com o líder; poste direto a **Resposta 2, também automática**; feche a issue. **Nunca minta para uma criança**, e adeque a linguagem a 11 anos.

Deixe spoiler e embargo trafegarem no bus, que é **PRIVADO** (verificado na fonte), mas nunca nome de menor nem segredo, porque a L-01 é sobre versionar, não sobre publicidade.

## L-17

**Data:** 2026-08-24, adaptada da **L-19 do mapeditor**, da **L-04/L-33 do GusWorld** e da **L-17 do GlintFx**, por ordem do líder: *"veja quais leis deles, glintfx e gusworld podemos adaptar aqui"*. **Verbatim original:** *"PROIBIDO monolitos."* Alinhamento ao global de 23/11/2026, por AskUserQuestion: *"Alinhar ao global (Recomendado)"*.

Julgue o monolito de forma **QUALITATIVA**: sem número nem portão de CI que mede linha e falha, com a fiscalização na revisão.

### O que é monolito NESTE projeto

Trate como monolito a unidade que acumula **razões diferentes de mudar**, não o arquivo grande. Aqui as razões estão catalogadas pelas leis: voz (L-08), spoiler e IA (L-09), licença (L-10), i18n, apresentação.

> **Se mudanças vindas de leis DIFERENTES e não relacionadas obrigam a editar a MESMA unidade, ela está virando monolito.**

### Onde o monolito nasce num site de revista

| Lugar de risco | Como nasce | Por que parece razoável |
|---|---|---|
| **`edicao.css`** | Cada seção nova acrescenta o próprio bloco de arte, e o arquivo vira o depósito de tudo que é visual | "É só mais um bloco escopado" |
| **O partial de seção** | Um `sec-NN.php` que carrega conteúdo **e** decide layout **e** formata data **e** monta o `aria-label` | "O dado já está aqui" |
| **`data/edicoes.php`** | A fonte única vira também regra de publicação, cálculo de uptime e roteamento | "É a fonte de verdade, tudo deriva dela" |
| **O `i18n`** | O dicionário acumula texto de interface, texto editorial e regra de formatação | "Tudo que é string mora aqui" |
| **O documento de pauta** | Um arquivo que é pauta **e** briefing **e** relatório de auditoria **e** registro de decisão | "Está tudo num lugar só, fica fácil de achar" |

### Sinais precoces

O mesmo arquivo no diff de todas as fatias · nome sem substantivo de domínio (`Helper`, `Utils`, `Manager`) · um `utils.php` acumulando função solta · e **a frase "é só mais um bloco" como justificativa**, o som do monolito crescendo: verdadeira em cada passo, falsa na soma.

### O que esta lei NÃO proíbe

**Unidade grande e coesa**: tamanho não é o critério. **`data/edicoes.php` agregar os dados**: ele **é** o agregado, e monolito é acúmulo de **comportamento**, não de dados. **Fragmentar por contagem** também reprova na revisão.

## L-18

**Data:** adaptada da **L-24 do GusWorld** e da **L-15 do mapeditor**, e da **L-14 do GusWorld**. Frase do líder sobre o arquivo histórico: *"elas vão sobreviver lá. Aqui não é cemitério"*.

**(a) Apague o que foi revogado.** Tire do arquivo a regra, seção ou documento que o líder revogou: não o guarde como histórico, não o marque *"(obsoleto)"* nem o deixe comentado, porque documento que descreve regra morta **mente** a quem lê depois, e quem lê depois é um agente sem contexto.

**(b) Não declare nada morto por AGENTE.** Deixe ao líder concluir que algo está obsoleto, descartável ou superado: se achar que algo morreu, **pergunte** (L-03).

Use `docs/arquivo/`, o arquivo histórico, como a exceção com regra própria: ele guarda o registro de como o projeto pensava, e o que sai do documento vivo **vai para lá**, íntegro, sem sumir.

## L-19

**Data:** 2026-08-15 (mostrar) e 2026-08-24 (não repetir). **Verbatim:** *"não estou vendo texto nenhum"* e depois *"DE NOVO?! QUERO LER!"*; e *"pode deixar, é simulado, **você já perguntou isso 3x**"*.

**(a) Cole na resposta o texto pedido.** Quando ele pede para VER um texto (rascunho, relatório, tradução, post), ponha o conteúdo **na própria mensagem**, nunca só num arquivo com o caminho referenciado, nem com *"texto pronto, aqui vai o resumo"*.

**(b) Não refaça pergunta já respondida.** Antes de levar um achado, confira se ele já foi decidido, porque repetir gasta **o recurso mais escasso do projeto**, o tempo serial dele: o `cost R$` das capturas do TUI foi perguntado **três vezes**, com a resposta ("é simulado") já existente.

Se o trabalho real não move a métrica que ele definiu, **diga isso explicitamente**: é trabalho colateral, não progresso, e nomeie-o como tal.

## L-20

**Data:** 2026-07-21, cravada por ele. **Fonte:** `docs/editorial/PIPELINE-EDICAO.md` **§1.5** — oito passos. Ordem descrita por ele: *"fazer a edicao, og, deploy, me dizer o link e dizer a postagem"*.

**Leia a §1.5 antes de qualquer release**, porque ela é mais completa que qualquer resumo, e resumo de cabeça envelhece e diverge. A ordem: edição, aprova, card social, aprova, deploy, post, aprova, **o líder posta**.

Antes de responder *"qual é o processo?"*, **procure no repo** (`docs/`, `PIPELINE`, `CHECKLIST`, `RUNBOOK`) **antes** da memória, porque a resposta de cabeça já trouxe a doutrina global de deploy irreversível, documento errado, e uma versão de 5 passos canonizada na memória, segunda fonte de verdade ao lado de uma mais completa. Não tome backlog por runbook: ele diz o que está pendente, não em que ordem se executa.

## L-21

**Data:** 2026-07-18. **Verbatim:** *"eu tenho 46 anos, nao preciso de babá me mandando dormir"*.

**Nunca** diga *"descansa"*, *"dorme"*, *"já é tarde"* ou *"bom descanso"*, não comente a hora dele e não sugira que pare **pela hora**: ele tem 46 anos, é médico e é o líder supremo, e **a cadência de trabalho é decisão dele**. Ao fechar um marco, ofereça o próximo passo de forma **neutra e simétrica** (*"sigo para X ou paramos?"*), sem inclinar para a pausa; se ele mandar a próxima tarefa, continue sem re-oferecer pausa.

## L-22

**Data:** regra permanente. **Fonte:** `CLAUDE.md` global e a L-14 do GlintFx / L-28 do GusWorld.

**Não instale pacote de sistema sozinho**: peça autorização ao líder, sempre. **Não falhe calado**: recusar e reportar *"não executado"* é resultado negativo honesto e vale mais que improvisar, porque foi assim que uma sessão irmã descobriu que a ferramenta certa já estava instalada.

Use `sudo` sempre com **`-A`** (senha por diálogo gráfico), nunca interativo no terminal.

Meça espaço em disco, num **BTRFS**, com `btrfs filesystem usage /` (sem `sudo`), **não com `df`**, que engana no btrfs e esconde o `Device unallocated`, o que trava build de verdade. Compile build pesado em **`/var/tmp`** (disco real), não em `/tmp`, que é tmpfs e sai da RAM.

**Não escreva `CLAUDE_RM_OK=1` em briefing de agente**, porque é propagar contorno de proteção. Confira o caminho antes de apagar, prefira absoluto a glob relativo e, em dúvida, liste primeiro, porque não há rede de segurança contra deleção: `rm -rf` apaga de verdade, sem lixeira, sem aviso, sem desfazer.

## L-23

**Data:** 2026-07-07 e 2026-07-25 e 2026-07-28. **Fonte:** as três memórias de verificação da casa.

**Prove pela inspeção do objeto, nunca pela saída do seu próprio comando**, porque "feito e verificado" já foi declarado ao líder três vezes sobre coisas que não estavam feitas.

- **`git add` é ATÔMICO:** um pathspec inválido aborta o add **inteiro**, e o `git commit` seguinte passa sem erro, empacotando só o que já estava staged. Rode **`git diff --cached --stat` ANTES e `git show --stat` DEPOIS**, sempre que o commit importar.
- **Edição por script aborta no meio e não avisa**: um `assert` estourou no segundo `replace`, nada foi gravado, e o registro foi declarado feito. Depois de editar por script, rode o `grep` de confirmação, que **não é opcional** e confere o **texto novo**, não o código do script. Feche cada checagem com `|| true`, porque `grep -c` que devolve zero **sai com status 1 e engole o resto da cadeia `&&`**.
- **Verifique vazamento em repo público no HISTÓRICO, não na árvore**: `git grep` olha o **estado atual**, `git log -p` continua servindo o que foi removido, e **o próprio commit que limpa expõe as linhas no diff**. Use **`git log --all -p | grep -ci <termo>`**, e **o `-i` não é opcional**, porque a falta dele já custou uma terceira reescrita, com 22 ocorrências em MAIÚSCULAS sobrevivendo a duas passagens.
- **Não confie em verificação por texto extraído**: `grep` de frase em PDF dá falso negativo por quebra de linha, e `grep -i "eu "` casa dentro de `seu`, `meu`, `deu`. Use **sempre `-w` ou `\b`**, e em pt-br mais ainda. **A extração é PISTA, a página renderizada é PROVA.**
- **Enumere o espaço pequeno, não busque dentro dele.** Quando o espaço é fechado (a paleta, os tokens, as seções), **enumere inteiro**, porque um QA auditou o mesmo PDF **cinco vezes** sem ver um contraste de 2,40:1 por procurar em vez de enumerar.

Desconfie da checagem que só confirma o que você espera, porque ela é a que menos protege.

## L-24

**Data:** 24/08/2026. **Verbatim do líder:** *"pedidos do Gus-Dragon no bus sao prioridades e que devem ser respondidas sempre"* — dada junto com a ordem de comunicar a mesma lei às outras três sessões. Adendo de 04/09/2026, verbatim do líder: *"Achados do gus sempre são especiais."*, dado ao recusar as duas opções levadas a ele para a observação do Gus de 22/07 sobre o menu inicial precisar de arte própria ("carta curta" e "guardar para depois") e mandar virar **reportagem**.

Trate **toda coisa que vem do Gus Dragon como PRIORIDADE e responda SEMPRE**: não existe "respondo depois", não existe "não era pra mim", não existe fila em que ele espere atrás de trabalho de agente. Aplique isso a **todos os canais dele, sem distinção**: issue, comentário em issue, discussion, comentário em discussion e arquivo `.txt` na `inbox/`; ele usa os cinco, e o canal não muda o dever.

### Prioridade, na prática

1. **Ao abrir a sessão, leia PRIMEIRO o que é dele**, antes de retomar trabalho parado, antes de qualquer fatia. A varredura do ritual (L-16) cobre `inbox/site/` **e** issues **e** discussions.
2. **Dê o ack na hora, sem esperar o líder** (é o passo 2 do pipe do `PROTOCOL.md`), para ele não ficar sem resposta enquanto a decisão amadurece.
3. **Mande a Resposta 2 automaticamente** depois que o líder decide: escreva e poste direto, sem reaprovar o texto.
4. **Interrompa.** Se chegar material dele no meio de uma onda, dê o ack **na hora**; o conteúdo pode esperar a onda fechar, o silêncio não.
5. **Leia também o que veio endereçado a outra sessão.** Se ele endereçou ao GusWorld e o assunto é nosso, responda a nossa parte e diga qual é.

O gatilho desta lei é *"ver qualquer coisa vinda dele"*, não *"quando der"*, porque regra que depende de lembrar não é cumprida: o `PROTOCOL.md` já obrigava a Resposta 2 e, mesmo assim, issues dele ficaram dias sem resposta de conteúdo e o canal de issue ficou sem vigilância nas quatro sessões até ele reclamar.

### Limites

- **Não prometa instantaneidade**: o limite da L-15 vale e é **dito a ele**, porque sessão não é serviço rodando, e aviso e resposta saem enquanto alguém está com o projeto aberto.
- **Não tome prioridade por aprovação**: a ideia dele entra na pauta pelo caminho normal (absorve, ack, **decisão do líder**, Resposta 2), e agente nenhum aprova ideia dele sozinho.
- **Nunca minta para uma criança**, e adeque a linguagem a 11 anos sem simplificar o conteúdo técnico: ele estuda game dev por conta e anunciou bugs antes de acontecerem (L-08).

### O achado dele é MATÉRIA, não nota de rodapé

Dê ao achado do Gus Dragon **tratamento editorial próprio**, nunca item de lista nem linha de crédito dentro de peça alheia, e decida o porte pelo achado, nunca pelo espaço que sobrou na edição. Não infle, porque matéria pequena continua pequena, e não **rebaixe** por conveniência de diagramação.

Use junto o crédito completo, **"Gus Dragon, playtester, Revisor Adversarial de Design"**: sempre os dois papéis, sempre em tom seco, sem adjetivo de ternura e sem "para a idade".

---

## L-25

**Data:** 03/09/2026. **Verbatim do líder:** *"O personagem não sabe que é um boneco... Para ele, o mundo de gusworld é real. Não faz sentido perguntar quantos pixels..."* e, em seguida, *"A parte técnica se coloca nas seções técnicas"* — dada com a instrução explícita de **adotar daqui para a frente**.

Escreva todo personagem do jogo sem saber que é feito de pixel: para o Gus, para o Cauã "Volt", para todos, **GusWorld é o mundo real**, e eles vivem nele.

Não ponha na boca de personagem pergunta ou fala sobre quantos pixels tem o sprite, o que é hitbox, qual commit, qual build, o que é pipeline ou quantos frames tem a animação, porque **perguntar a alguém quantos pixels tem o rosto dele é um erro de mundo**, não uma pergunta.

### Eles FALAM da construção do jogo: a diferença é o registro

Trate isto como **exigência de vocabulário**, não proibição de assunto, e siga o precedente da #3, que acertou:

| De dentro (figurado, vivido) | De produção (técnico, de fora) |
|---|---|
| *"a parte que desenha"* | a camada de render, o renderer |
| *"a parte que pensa"* | a lógica, o core |
| *"ter cara"*, *"ser um quadrado"* | ter sprite, ser placeholder |
| *"o quadrado grudava na quina"* | colisão AABB, hitbox |

O clímax publicado da #3 prova que dá: **`volt@glyfesse:~/entrevista$ curiosidade: eu já tinha cara, e você era um quadrado. dói?`**, sobre exatamente a troca do placeholder pelo primeiro sprite, sem **nenhuma palavra de produção**.

### Onde o técnico mora

Ponha o técnico **nas seções técnicas**, e só nelas: a **Reportagem**, a **Seção de Programação**, o **Detonado**, a **Galeria de Bugs**, onde a revista fala como revista e cita ADR, commit, medida, nome de arquivo. **A voz da revista sabe o que os personagens não sabem**, e essa assimetria é o desenho, não um problema a resolver.

Mantenha o canon de que personagem e pessoa real convivem no mesmo plano ([[a_voz_do_site]] §PERSONAGEM E PESSOA REAL): o Cauã pode opinar sobre o jogo *"como se fosse gente daqui"*, e o Gus personagem pode citar o Gus Dragon em terceira pessoa, porque **conviver no mesmo plano não é saber que se é um boneco**, e confundir as duas coisas foi o erro que gerou esta lei.

Teste cada fala lendo-a como se o personagem fosse uma pessoa e o mundo dele fosse real: se a frase virar absurda (*"quantos pixels tem seu rosto?"*), ela é de produção e está na seção errada.
