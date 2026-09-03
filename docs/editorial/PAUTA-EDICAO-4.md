# Pauta da Edição #4 da Glyfesse (mapa de edição)

> Artefato de saída do estágio **E1** do `PIPELINE-EDICAO.md`. **Status: PROPOSTA.** O **tema, os dois marcos
> e a janela de datas já foram aprovados pelo líder no GATE-PAUTA de 2026-09-03** ("O rosto e a voz" · 24/jun ·
> 06/jul · janela 23/jun→21/jul). O que este documento entrega é o **mapa completo das 19 seções**, a
> prioridade de custo, as pontes obrigatórias com a #3, três propostas de título e as decisões que ainda
> faltam — nada aqui está fechado além do que já veio decidido do gate anterior.
> Autor do rascunho: `narrative-designer`. Fontes: `GODS_LAWS.md`, `PAUTA-EDICAO-3.md`, `PIPELINE-EDICAO.md`,
> `ROTEIRO-ENTREVISTAS.md`, `HISTORICO_GUS_ECOSSISTEMA.md` (memória), `src/content/edicao-3/pt/sec-*.php`.

---

## 1. A lente da edição

**A #4 é a edição em que o mundo deixa de ser cenário e vira gente.** Em vinte e um de junho o jogo trocou de
alicerce pela terceira vez em uma semana; na #3, no meio dessa demolição, um quadrado azul deu o primeiro
passo. A #4 conta o que aconteceu depois desse passo: em 24 de junho o quadrado ganha um **rosto** — o gate
2D-vs-3D fecha, a arte para de ser placeholder e passa a vir do PixelLab —, e doze dias depois, em 6 de julho,
alguém **responde**: o NPC Bertoldo Caím fica interagível, e pela primeira vez o mundo fala de volta. É a
edição do rosto e da voz, nessa ordem, porque foi nessa ordem que aconteceu.

**O que esta edição deliberadamente NÃO conta:** não conta o combate por rodadas (isso já foi o Detonado da
#3, e o próximo capítulo dele — se houver — é o diálogo, não a luta outra vez); não conta o motor de cartas, o
save v2 nem a arquitetura data-driven de meados de julho (são months de trabalho que merecem a própria edição,
não um rodapé); não nomeia nenhum mestre do baralho nem toca o roster; e não fecha o arco de julho — o
fechamento de M7 (paridade jogável, playthrough ao vivo do Gus Dragon em 21/jul) é grande demais para caber
como coda desta edição e fica reservado (ver Decisão 4). A #4 é sobre **dois instantes específicos** — um
rosto e uma primeira palavra —, não sobre o mês inteiro que os cerca.

---

## 2. O marco e a data-âncora (herdado do GATE-PAUTA de 2026-09-03)

- **Marco:** *"O rosto e a voz."* Dois dias, uma linha reta entre eles.
- **Data-âncora 1 — 24 de junho de 2026:** o gate 2D-vs-3D fecha; M5 BattleScreen inc.1-3; os sprites passam a
  vir do pipeline PixelLab. É o dia em que o quadrado azul deixou de ser um quadrado.
- **Data-âncora 2 — 6 de julho de 2026:** ADR-014 (runtime de diálogo POCO C++20, supersede o ADR-003 do
  Godot); M7 o NPC **Bertoldo Caím** fica interagível. A primeira vez que alguém no mundo responde.
- **Janela coberta: 23 de junho a 21 de julho de 2026.** Abre onde a #3 fechou (a validação ao vivo de 23/jun
  já foi consumida por ela — ver §7, nota de fronteira) e vai até o M7 fechado de 21/jul, ainda que a
  Reportagem em si não precise esticar até lá (ver Decisão 4).

---

## 3. Mapa das 19 seções

| # | Seção | Estado na #4 | Recorte (uma frase) | Reusa de #1/#2/#3 |
|---|---|---|---|---|
| 1 | Capa | **cheia** (montagem) | A manchete do marco duplo: o rosto que chegou e a primeira palavra que respondeu | Molde de capa das #1-#3; arte nova precisa de frame limpo (ver Decisão 3) |
| 2 | Índice | **cheia** (montagem) | `↩ a banca` primeiro, seções no meio, 3 links fixos no fim | Idêntico ao molde da #3 |
| 3 | Editorial (Carta do Gus) | **CHEIA** | Cobra a própria linha final da #3 — a coisa que aprendeu a andar agora tem rosto, e o mundo respondeu | Ponte obrigatória com o fecho da #3 (ver §5) |
| 4 | Reportagem de capa | **CHEIA** (a mais cara) | Os doze dias entre o rosto (24/jun) e a primeira palavra (6/jul): sprite, cockpit trocando de mãos, o NPC que respondeu | Molde estrutural de arco datado das #2/#3; não repete o gancho do Cauã (já fechado) |
| 5 | A NOTA do jogo inacabado | **cheia** (curta, data-driven) | A linha "Gráficos" sai do zero absoluto pela primeira vez desde a #1 | Molde das #1-#3 |
| 6 | Galeria de Bugs | **cheia** (curta) | O flash do menu: achado e resolvido no mesmo dia (17/jul), reportado pelo próprio Gus Dragon | Molde de terminal verde da #3 |
| 7 | Cemitério das Ideias Mortas | **cheia** (1 lápide) | A tentativa 3D, enterrada no dia exato em que o 2D venceu — a lápide que a #3 prometeu e não entregou | Layout de lápide CSS das #2/#3; ponte obrigatória (ver §5) |
| 8 | Detonado (do Diálogo) | **cheia, OPCIONAL** (ver Decisão 2) | Como funciona a conversa por trás da tela — a primeira vez que um NPC responde, visto de dentro | Molde exato do Detonado da Simulação (#3): serviço atemporal, prova de vida via suíte de testes |
| 9 | Errata + Cartas | vazio com graça | Nenhuma errata pendente da #3; cartas seguem em zero | Copy nova curta, molde #3 |
| 10 | Classificados in-world | vazio com graça | Reusar idêntico | #1 (mesmos typos, mesmos IDs) |
| 11 | HQ | vazio com graça (3 quadros novos, CSS) | A sala vazia da #3 ganha um segundo personagem — o quadrado (agora com rosto) encontra quem responde | Molde da #3 (terminal virou sala; a sala agora não está mais vazia) |
| 12 | Próximos Lançamentos | vazio com graça | Reusar #1, atualizando a ressalva: cartas/save-load/arquitetura de meados de julho continuam de fora | #1 |
| 13 | Pôster central | **cheia SE houver asset limpo**, senão vazio/CSS | O rosto que chegou — depende de arte disponível fora do git pessoal (ver Decisão 3) | Precedente de risco: #2 e #3 ficaram bloqueadas por falta de asset limpo em situação parecida |
| 14 | Brinde | vazio com graça | Reusar #1 | #1 (os 2 downloadables) |
| 15 | Cupom recortável | **cheia** (recorrente) | Reusar o mini-app | `src/includes/cupom.php`, como #1/#2/#3 |
| 16 | A Entrevista | **CHEIA** (a mais cara) | 2º da fila da party (ver Decisão 1) | Motor de dois agentes de persona, molde #2/#3 |
| 17 | Seção de Programação | **CHEIA** (M) | Por que o cockpit trocou de mãos (ADR-009→ADR-010) — o nome "Repo GlintFX", linkado sem explicação desde a #1, finalmente aparece no texto | Molde estrutural CRT das #1-#3 (`root@glyfesse:programacao$`) |
| 18 | O Gus lê o bus | **cheia PELA PRIMEIRA VEZ** (proposto) | A caixa que a #3 mostrou vazia porque o bus ainda não existia agora tem uma mensagem real de dentro da própria janela | Muda de molde: a #3 renderizou a caixa vazia; a #4 renderiza a mesma caixa com 1 mensagem dentro |
| 19 | Expediente | **cheia** (data-driven) | Créditos, licença, AI-disclosure, uptime atualizado | Idêntico à #3 |

---

## 4. Tabela de prioridade (as peças com escrita nova)

Oito peças com escrita real, contra seis na #3 — o custo maior é assumido e explicado abaixo (ver §7, Riscos).

| # | Seção | Tamanho | Por que vale o lugar |
|---|---|---|---|
| 1 | **Reportagem de capa** | **L** | É o arco que justifica o número inteiro: doze dias, dois marcos, uma linha reta entre um rosto e uma primeira palavra. Sem ela não há edição |
| 2 | **A Entrevista** | **L** | A série da party continua e segue sendo a peça mais cara (dois agentes de persona turno a turno). É também onde o `//` do convidado aparece pela primeira vez, e isso não se abrevia |
| 3 | **Seção de Programação** | **M** | Paga uma dívida de três edições: o link "Repo GlintFX" está no índice desde a #1 sem nunca ter sido explicado. O ADR-010 (adoção do glintfx como UI/HUD) é a fonte pronta, técnica, sem spoiler, e cabe exatamente na janela |
| 4 | **Detonado (do Diálogo)** | **S/M** | Opcional por regra (não vira seção fixa), mas o encaixe temático é raro: é a "prova de vida" da metade do marco que é a voz, no mesmo molde que funcionou na #3 para a metade que era o corpo |
| 5 | **Editorial** | **S** | Curta por desenho, mas obrigatória: é a resposta direta à última frase da #3, e a ponte já está escrita pelo número anterior |
| 6 | **Cemitério das Ideias Mortas** | **S** | Uma lápide só, mas é a lápide que a #3 prometeu explicitamente (D2) e reservou para aqui. Não publicá-la quebra uma promessa impressa |
| 7 | **Galeria de Bugs** | **S** | Segue a tradição aberta na #3; o material (flash do menu, achado e corrigido no mesmo dia) já está pronto, datado e dentro da janela, sem precisar inventar nada |
| 8 | **O Gus lê o bus** | **S** | Não é escolha, é oportunidade: é a primeira vez desde que o bus nasceu (16/jul) que a seção tem material real dentro da janela de uma edição. Publicá-la vazia de novo seria fingir que a caixa continua sem nada, o que já deixou de ser verdade |

---

## 5. As pontes obrigatórias com a #3

A #3 terminou apontando para cá em pelo menos quatro lugares. Nenhum destes é opcional:

1. **A linha de fecho do Editorial da #3:** *"a coisa mais frágil que existe aqui escolheu justamente aqueles
   três dias para aprender a andar."* O Editorial da #4 tem que responder a ela — a coisa que aprendeu a andar
   agora tem rosto, e o que anda ao lado dela agora responde.
2. **A lápide do 3D, reservada explicitamente para cá (D2 da #3):** *"não há fonte que a mate em junho, e o
   gate 2D-vs-3D (24/jun) é o marco da #4. Enterrá-la [na #3] seria contar o fim antes do meio."* O Cemitério
   da #4 **tem** que trazer essa lápide — é a única morte que a #3 avisou que estava guardando.
3. **O convidado da #4, deixado explicitamente em aberto no `ROTEIRO-ENTREVISTAS` (D10):** *"⚠️ Aberto para o
   GATE-PAUTA da #4: o Cauã já estreia [na #3] como entrevistador. Ele continua sendo o 2º entrevistado da
   fila, ou passa para o fim?"* Resolvido nesta pauta como Decisão 1, abaixo.
4. **O link "Repo GlintFX" no índice, presente e nunca explicado desde a Edição #1.** A #3 registrou
   explicitamente que "nenhuma peça nomeia o glintfx" porque ele ainda não existia na janela dela (nasceu
   28/jun, foi adotado pelo jogo em 01/jul). A #4 é a primeira edição cuja janela cobre as duas datas — é o
   lugar certo para o nome finalmente aparecer no texto, na Seção de Programação.

---

## 6. Três propostas de título

| Opção | Argumento |
|---|---|
| **A. "O Rosto e a Voz"** | O mais seguro: é a frase literal que o líder já aprovou como tema no GATE-PAUTA de 03/09. Zero risco de desalinhamento, mas é descritivo, não uma imagem — foge do padrão da #3 ("O Quadrado Azul"), que sempre nomeia uma coisa concreta, não um conceito |
| **B. "Quem Fala Primeiro"** | Mais direto e ambíguo de propósito: joga com os dois sentidos — o rosto chegou primeiro (24/jun), mas ninguém "falou" até 06/jul; e também descreve o próprio formato da revista (perguntas antes de respostas). Curto, cabe bem numa capa |
| **C. "O Enterro que Aprendeu a Falar"** ★ recomendado | Imagem concreta, como a #3 exige do próprio padrão: a mesma edição que enterra o 3D (Cemitério) é a que ensina o mundo a responder (Bertoldo). E ecoa o verbo da #3 de propósito — lá "aprendeu a **andar**", aqui "aprendeu a **falar**" — dando à revista uma progressão de verbos entre edições que nenhuma das outras duas opções carrega |

**Recomendação: C**, pelo eco verbal com a #3 (andar → falar) e por nomear uma imagem concreta em vez de um
conceito, mantendo o padrão que a #3 fixou.

---

## 7. Riscos de produção

1. **Custo maior que a #3.** Oito peças com escrita nova contra seis (ou sete, contando o Detonado da #3 como
   extra). Se o número precisar encolher, os candidatos naturais a cortar são o **Detonado** (é opcional por
   regra) e a **profundidade** da Programação — nunca a Reportagem, a Entrevista, o Cemitério (é promessa) ou
   o Gus-lê-o-bus (é a estreia de conteúdo real da seção).
2. **A fronteira com a #3 em 23/jun.** A janela aprovada começa em 23/jun, mas esse dia **já foi consumido**
   pela #3 (que fechou com "M4 loop jogável SDL validado ao vivo pelo líder em 23/jun"). Não há nada novo a
   narrar nesse dia especificamente; a Reportagem da #4 deve abrir efetivamente em **24/jun**, sem repetir o
   que a #3 já contou. Isto não é uma violação da janela aprovada — é apenas o registro de que o primeiro dia
   dela não tem matéria nova, e a régua de cronologia ascendente (não repetir o que já foi narrado) resolve
   isso sozinha, sem precisar de decisão do líder.
3. **A Entrevista é o caminho crítico**, como foi na #3: dois agentes de persona improvisando, GATE-SPOILER
   próprio. Recomendo abrir por ela.
4. **Bertoldo Caím é NPC de lore, não personagem da party.** Qualquer trecho de diálogo dele que apareça na
   Reportagem ou no Detonado precisa passar pelo GATE-SPOILER como qualquer outro conteúdo narrativo — não
   herda a liberação já dada aos personagens da party (`ROTEIRO-ENTREVISTAS`, regra 2).
5. **Higiene de asset, de novo em dois pontos possíveis:** a Reportagem cita o pipeline PixelLab e o cockpit
   glintfx — se qualquer captura da tela do jogo entrar (Pôster, Detonado), vale a mesma regra da #3: janela do
   jogo recortada e verificada limpa antes de virar tracked, nunca a tela do desktop do líder.

---

## 8. Decisões abertas para o líder

### Decisão 1 — Quem é o entrevistado da #4?

O `ROTEIRO-ENTREVISTAS` deixou isto explicitamente aberto para este gate. Duas opções reais:

- **A. Cauã "Volt" Berenger (recomendado)** — mantém a ordem da fila proposta, e fecha um círculo temático
  raro: o commit `943788f` (22/jun) prova que o Cauã foi o **primeiro personagem a ganhar um rosto** no jogo
  (o retângulo virou ele, não o Gus). Entrevistá-lo justamente na edição sobre "o rosto" é a mesma peça de
  D3 na #3 (o gancho usado em registros diferentes), levada um passo adiante.
- **B. Pular para Jaci "Proxy" Vanderbist** — evita cobertura repetida do Cauã, que já teve bastante destaque
  na #3 (interrogador + o gancho do primeiro sprite). Jaci tem a mesma idade do Gus e o vínculo mais profundo
  da party, o que renderia um contraste forte logo depois de duas edições centradas nele.

**Recomendação: A**, pelo fechamento temático — mas é decisão do líder, não uma conclusão fechada.

### Decisão 2 — O Detonado (do Diálogo) entra cheio, ou fica no vazio-com-graça padrão (AGUARDE)?

A regra da #3 foi clara: "não vira seção fixa, salvo decisão caso a caso." O encaixe temático com "a voz" é
forte (é literalmente a peça sobre como o mundo aprendeu a responder), mas é a seção com mais formas de dar
errado da casa (spoiler, transcrição em vez de captura, largura quantizada) — a #3 já registrou isso.
**Recomendação: entrar**, reaproveitando a espinha técnica já validada no Detonado da Simulação (censura por
ausência, não por sobreposição), mas como decisão explícita, não automática.

### Decisão 3 — Pôster central: existe arte limpa do Bertoldo Caím ou do sprite do PixelLab fora do git pessoal?

Repete o risco que bloqueou o Pôster da #2 e mudou o da #3: o commit `943788f` registrou que os assets do
Cauã estavam fora do git. Antes de prometer um pôster com sprite real, confirmar se há arte equivalente do
Bertoldo (ou do pipeline PixelLab) disponível e limpa. **Se não houver, a alternativa segura é o mesmo caminho
da #3: CSS puro** (por exemplo, uma tipografia grande sobre "o rosto que chegou", sem depender de asset
nenhum). Não decido isto sozinho porque depende de um recurso que não posso verificar sem acessar o repo do
jogo além do que já li.

### Decisão 4 — A janela vai até 21/jul, mas até onde a Reportagem deve realmente esticar?

A janela aprovada cobre até 21/jul (M7 fechado: paridade jogável + playthrough ao vivo do Gus Dragon). É um
marco grande — talvez grande demais para caber como fechamento de uma edição cujo centro é 24/jun e 06/jul.
**Recomendação: não consumir o M7-fechado nesta edição.** Guardá-lo para o fechamento de uma futura edição
(a ficha do próprio ecossistema já o reservava informalmente para o bloco "julho jogável"), e deixar a
Reportagem da #4 fechar de forma mais modesta, talvez com uma linha curta no fim citando que o trabalho
continua, sem entregar o final antes da hora. Isto não trava o mapa acima — a janela aprovada permite
tecnicamente ir até 21/jul —, mas é uma escolha editorial que muda o tamanho da Reportagem, então sobe aqui.

### Decisão 5 — Usar o brinquedo WebGL (D-WEBGL-TELA) nesta edição?

`D-WEBGL-TELA` (decidido 03/09) libera three.js na tela, um brinquedo por edição, sob demanda.
**Recomendação: não usar nesta edição.** A #4 é literalmente a edição que enterra a tentativa 3D no Cemitério
— o jogo abandonou o 3D, e essa é a própria matéria da lápide. Renderizar 3D na mesma edição que conta essa
história contradiz o que a edição está dizendo, mesmo que a regra técnica (três cercas do D-WEBGL-TELA) seja
respeitada à risca. Se houver interesse num brinquedo WebGL, uma edição futura sem esse contexto funerário
é o lugar mais coerente.

### Decisão 6 — Título da edição

Ver §6. **Recomendação: "O Enterro que Aprendeu a Falar"** (opção C), pelo eco verbal com a #3 e por nomear
uma imagem concreta em vez de um conceito abstrato.

---

## 9. ✅ DECIDIDO PELO LÍDER — 2026-09-03, GATE-PAUTA fechado

As quatro decisões que estavam abertas foram respondidas. **Esta seção vence o que estiver escrito acima
em sentido contrário.**

| # | Decisão | Escolha do líder | Nota |
|---|---|---|---|
| **Título** | 3 propostas | ★ **"O Rosto e a Voz"** (`The Face and the Voice`) | Escolheu a **literal**, não a recomendada ("O Enterro que Aprendeu a Falar"). O título nomeia o tema direto, sem imagem intermediária. **Já gravado** em `data/edicoes.php`. |
| **1** | Quem entrevista | **Cauã "Volt" Berenger** | Segue a fila da party, e fecha o círculo: o Cauã foi o **primeiro personagem a ganhar rosto** no jogo (commit `943788f`, 22/jun). Entrevistá-lo na edição sobre o rosto é o gancho. |
| **2** | Detonado do Diálogo | **ENTRA cheio** | Reaproveita a espinha técnica validada no Detonado da Simulação da #3 (censura por ausência, nunca por sobreposição). ⚠️ É a seção com mais formas de dar errado: spoiler, transcrição no lugar de captura, largura quantizada. |
| **4** | Alcance da Reportagem | **ENTRA até 21/jul, fechando a edição** | ⚠️ **Contra a recomendação, e o líder decidiu ciente.** A Reportagem passa a cobrir 24/jun → 21/jul e fecha no M7 (jogo jogável de ponta a ponta + o playthrough ao vivo com o Gus Dragon). **Consequência assumida:** a peça mais cara da edição ficou maior, e o marco do M7 é gasto aqui em vez de virar centro de uma edição própria. |

### Decisão 3 (pôster) — RESOLVIDA pelo orquestrador, sem gastar o líder

O agente da pauta não pôde verificar se havia arte limpa do Bertoldo. **Há.** Rastreada no git do jogo
(não em pasta pessoal), conferida visualmente antes de afirmar:

- `resources/sprites/icons-m5/retratos/retrato_seu_bertoldo_caim.png` (128×128)
- `resources/sprites/models_frente/bertoldo_caim.png` (2048×2048)
- `resources/sprites/seu_bertoldo_caim/{east,north,south}.png` (direcional)
- e o mockup `docs/design/mockups/05-dialogo-bertoldo-retrato-real.html`

★ **E o retrato serve ao tema por acaso feliz: ele está LENDO UM JORNAL.** Um NPC lendo jornal, dentro de
uma revista, na edição em que o mundo passa a responder. O pôster tem asset e tem sentido.

### Decisão 5 (WebGL) — FORA desta edição

Não usar o brinquedo `D-WEBGL-TELA` na #4. **O motivo não é técnico:** seria a mesma edição que **enterra o
3D** no Cemitério renderizando 3D na tela, contradizendo a própria lápide. Fica para uma edição em que não
haja essa colisão. ⚠️ Não é decisão fechada do líder — é recomendação aceita por ausência de objeção; se ele
quiser reconsiderar, o lugar é o gate de arte.

### Nota do orquestrador sobre a DATA da edição

Gravei `2026-07-06` (a segunda âncora, o dia da voz), e **não** 21/07, mesmo com a Reportagem agora indo até
lá. Razão: **21/07 é o dia em que o site subiu**, e o canon [[canon_cronologia_revista_vs_site]] diz que a
revista ainda não chegou nesse dia. Datar a #4 ali colidiria com a própria cronologia narrada. A ordem
ascendente fica: #1 15/05 → #2 04/06 → #3 22/06 → **#4 06/07**.
