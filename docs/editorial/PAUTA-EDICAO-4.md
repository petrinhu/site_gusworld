# Pauta da Edição #4 da Glyfesse (mapa de edição)

> Artefato de saída do estágio **E1** do `PIPELINE-EDICAO.md`. **Status: GATE-PAUTA FECHADO em 2026-09-03.**
> O líder decidiu as 6 questões que este documento levantou (ver §8, todas ✅) e mandou **encaixar duas ideias
> do Gus Dragon** que já estavam prometidas por escrito à Edição #4 desde 2026-08-24 (issue 5 do bus:
> *"As duas entram na Edição #4."*) — promessa que não tinha chegado a este documento na primeira rodada, e
> que esta revisão corrige. O mapa abaixo é a versão corrigida e fechada.
> Autor do rascunho: `narrative-designer`. Fontes: `GODS_LAWS.md`, `PAUTA-EDICAO-3.md`, `PIPELINE-EDICAO.md`,
> `ROTEIRO-ENTREVISTAS.md`, `HISTORICO_GUS_ECOSSISTEMA.md` (memória), `gus_dragon_avisou_antes` (memória),
> `TODO.md` (`PAUTA-4-CARTAS-ORIGINAIS`, `PAUTA-4-GLITCHES-QUASE`), `src/content/edicao-3/pt/sec-*.php`.

---

## 1. A lente da edição

**A #4 é a edição em que o mundo deixa de ser cenário e vira gente.** Em vinte e um de junho o jogo trocou de
alicerce pela terceira vez em uma semana; na #3, no meio dessa demolição, um quadrado azul deu o primeiro
passo. A #4 conta o que aconteceu depois desse passo: em 24 de junho o quadrado ganha um **rosto** — o gate
2D-vs-3D fecha, a arte para de ser placeholder e passa a vir do PixelLab —, e a edição segue, mês adentro, até
6 de julho, quando alguém **responde**: o NPC Bertoldo Caím fica interagível, e pela primeira vez o mundo fala
de volta. **A edição não para exatamente aí** — por decisão do líder (Decisão 4, ✅), a Reportagem segue até
21 de julho, quando o jogo fica jogável de ponta a ponta e o próprio Gus Dragon o joga ao vivo. É a edição do
rosto e da voz, contada até onde a voz amadurece o suficiente para sustentar um jogo inteiro.

**Duas ideias do Gus Dragon entram nesta edição por promessa já feita a ele** (issue 5 do bus, 21/08,
aprovadas pelo líder em 24/08): a história das **primeiras cartas e dos sprites de origem** delas, e os
glitches que **quase** aconteceram, ao lado dos que aconteceram de fato. As duas encaixam sem forçar — a
primeira porque os sprites são literalmente a âncora central desta edição (24/jun); a segunda porque a Galeria
de Bugs já existe como seção fixa desde a #3, e só precisava da metade que faltava.

**O que esta edição deliberadamente NÃO conta:** não toca o motor de cartas por inteiro nem nomeia mestre
nenhum do baralho (a peça sobre cartas é sobre **origem**, não sobre o que elas fazem hoje); não conta o save
v2 nem a arquitetura data-driven de meados de julho como matéria própria (aparecem, no máximo, como pano de
fundo datado da Reportagem); e não fecha o arco de julho além do que o M7 já fecha sozinho — não há
antecipação do que vem depois de 21/jul.

---

## 2. O marco e a data-âncora

- **Marco:** *"O rosto e a voz."* (título final: ver §6)
- **Data-âncora 1 — 24 de junho de 2026:** o gate 2D-vs-3D fecha; M5 BattleScreen inc.1-3; os sprites passam a
  vir do pipeline PixelLab. É o dia em que o quadrado azul deixou de ser um quadrado — e o dia de onde saem os
  sprites de origem das cartas (ver §3, Seção 9).
- **Data-âncora 2 — 6 de julho de 2026:** ADR-014 (runtime de diálogo POCO C++20, supersede o ADR-003 do
  Godot); M7 o NPC **Bertoldo Caím** fica interagível. A primeira vez que alguém no mundo responde.
- **Fecho da Reportagem — 21 de julho de 2026 (✅ Decisão 4):** M7 fechado, paridade jogável de ponta a ponta,
  playthrough ao vivo do Gus Dragon. Decisão do líder, contra a recomendação original deste documento (que
  preferia guardar esse beat para uma edição futura) — ver §8, Decisão 4.
- **Janela coberta: 23 de junho a 21 de julho de 2026.** O primeiro dia (23/jun) já foi consumido pela #3, que
  fechou com a validação ao vivo daquele dia — a Reportagem da #4 abre efetivamente em 24/jun, sem repetir o
  que a #3 já contou (ver §7, risco 2).

---

## 3. Mapa das 19 seções

| # | Seção | Estado na #4 | Recorte (uma frase) | Reusa / autoria |
|---|---|---|---|---|
| 1 | Capa | **cheia** (montagem) | A manchete do marco: o rosto que chegou e a primeira palavra que respondeu | Molde de capa das #1-#3 |
| 2 | Índice | **cheia** (montagem) | `↩ a banca` primeiro, seções no meio, 3 links fixos no fim | Idêntico ao molde da #3 |
| 3 | Editorial (Carta do Gus) | **CHEIA** | Cobra a própria linha final da #3 — a coisa que aprendeu a andar agora tem rosto, e o mundo respondeu | Ponte obrigatória com o fecho da #3 (ver §5) |
| 4 | Reportagem de capa | **CHEIA** (a mais cara, **ampliada** — ✅ Decisão 4) | O mês inteiro entre o rosto (24/jun) e o jogo jogável de ponta a ponta (21/jul), passando pela primeira palavra (6/jul) e o playthrough ao vivo do Gus Dragon | Molde estrutural de arco datado das #2/#3; cresce por decisão do líder além do recorte original |
| 5 | A NOTA do jogo inacabado | **cheia** (curta, data-driven) | A linha "Gráficos" sai do zero absoluto pela primeira vez desde a #1 | Molde das #1-#3 |
| 6 | Galeria de Bugs | **CHEIA** (duas partes) | **Aconteceu:** o flash do menu, achado e resolvido no mesmo dia (17/jul), reportado pelo Gus Dragon. **Quase aconteceu:** a trava de diagonal que nunca disparou porque a alavanca já nasceu pronta e desligada — ver §3.1 | Ideia do **Gus Dragon** (autoria dele, issue 5 do bus, 21/08) para a metade "quase"; molde de terminal verde da #3 para a estrutura |
| 7 | Cemitério das Ideias Mortas | **cheia** (1 lápide) | A tentativa 3D, enterrada no dia exato em que o 2D venceu — a lápide que a #3 prometeu e não entregou | Layout de lápide CSS das #2/#3; ponte obrigatória (ver §5) |
| 8 | Detonado (do Diálogo) | **CHEIA** (✅ Decisão 3, não é mais opcional) | Como funciona a conversa por trás da tela — a primeira vez que um NPC responde, visto de dentro | Molde exato do Detonado da Simulação (#3): serviço atemporal, prova de vida via suíte de testes |
| 9 | Errata + Cartas | **CHEIA** (metade: Cartas) | Errata segue vazia (nenhuma pendência da #3). **Cartas: as primeiras ideias de carta e os sprites de origem delas** — antes do motor fechar (ADR-016, 14/jul) — ver §3.1 | Ideia do **Gus Dragon** (autoria dele, issue 5 do bus, 21/08) |
| 10 | Classificados in-world | vazio com graça | Reusar idêntico | #1 (mesmos typos, mesmos IDs) |
| 11 | HQ | vazio com graça (3 quadros novos, CSS) | A sala vazia da #3 ganha um segundo personagem — o quadrado (agora com rosto) encontra quem responde | Molde da #3 |
| 12 | Próximos Lançamentos | vazio com graça | Reusar #1, atualizando a ressalva: cartas (o motor inteiro, não a origem) e save-load continuam de fora | #1 |
| 13 | Pôster central | **CHEIA** (✅ Decisão 3, asset confirmado) | O retrato do Bertoldo Caím, lendo um jornal — serve ao próprio tema da edição (alguém que lê e responde) | Arte rastreada no git do jogo, conferida visualmente; sem o risco de asset ausente que bloqueou #2/#3 |
| 14 | Brinde | vazio com graça | Reusar #1 | #1 (os 2 downloadables) |
| 15 | Cupom recortável | **cheia** (recorrente) | Reusar o mini-app | `src/includes/cupom.php`, como #1/#2/#3 |
| 16 | A Entrevista | **CHEIA** (a mais cara) | O Cauã "Volt" é o convidado — ✅ Decisão 1 | Motor de dois agentes de persona, molde #2/#3 |
| 17 | Seção de Programação | **CHEIA** (M) | Por que o cockpit trocou de mãos (ADR-009→ADR-010) — o nome "Repo GlintFX", linkado sem explicação desde a #1, finalmente aparece no texto | Molde estrutural CRT das #1-#3 |
| 18 | O Gus lê o bus | **cheia PELA PRIMEIRA VEZ** | A caixa que a #3 mostrou vazia porque o bus ainda não existia agora tem uma mensagem real de dentro da própria janela | Muda de molde: a #3 renderizou a caixa vazia; a #4 renderiza a mesma caixa com 1 mensagem dentro |
| 19 | Expediente | **cheia** (data-driven) | Créditos, licença, AI-disclosure, uptime atualizado | Idêntico à #3 |

### 3.1 Onde e como as duas ideias do Gus Dragon entram (detalhe)

**`PAUTA-4-CARTAS-ORIGINAIS` → Seção 9 (Cartas).** A ideia dele, verbatim do `TODO.md`: *"contar a história do
jogo pelas primeiras ideias de cartas e os sprites originais delas."* Encaixa sem forçar porque os sprites são
a própria âncora desta edição (24/jun, pipeline PixelLab) — a peça mostra a origem visual das cartas no mesmo
instante em que a edição já está mostrando a origem visual do jogo inteiro. O motor de efeitos das cartas
fecha em 14/jul (ADR-016), dentro da janela: serve de fecho datado da peça ("é assim que aquelas primeiras
ideias terminaram"), sem precisar narrar o motor por inteiro nem nomear mestre nenhum do baralho.
⚠️ **Risco de produção, não decisão do líder:** o `TODO.md` já registra que o insumo (quais foram as cartas
primordiais, onde estão os sprites de origem) ainda precisa ser levantado no repo do jogo (read-only). Isso é
trabalho de pesquisa do S1/E2, não uma pergunta para este gate — mas fica marcado aqui para não se perder.
Recomendo **uma carta, um sprite** como escopo mínimo defensável (não um levantamento do baralho inteiro),
tanto por custo quanto porque "as primeiras ideias" no singular-exemplar já cumpre a promessa feita a ele.

**`PAUTA-4-GLITCHES-QUASE` → Seção 6 (Galeria de Bugs, metade "quase").** A ideia dele: os glitches que
aconteceram **e** os que quase aconteceram. A metade "aconteceu" já estava no mapa (o flash do menu, 17/jul).
A metade "quase" foi pedida a ele na própria issue 5 (21/08) e **ele nunca respondeu** — não posso prometer
que a fala dele chegue a tempo da produção. Por isso proponho a peça sourced de forma que **funcione com ou
sem** a resposta dele:
- **Sem a resposta dele (fallback já sourced, sem depender de mais nada):** a memória `gus_dragon_avisou_antes`
  registra que ele nomeou, antes de acontecerem, quatro classes de bug de movimentação — *"clipping, de
  arrastar, de olhar na direção errada, trava de diagonal"*. Um deles (a trava de diagonal: a diagonal andando
  mais rápido que o movimento reto) **nunca chegou a disparar como defeito**, porque a alavanca de correção
  (`normalize_diagonal`) nasceu **pronta e desligada** desde o primeiro dia da tela — exatamente porque estava
  na lista dele. Isso **é** um "quase aconteceu" real, datado, sourced no repositório, e que a Galeria de Bugs
  da #3 não usou (ela usou "arrastar/grudar" e "olhar na direção errada"; a trava de diagonal ficou de fora).
- **Se a resposta dele chegar a tempo:** a fala real dele, na própria voz, substitui ou complementa o exemplo
  acima — é sempre preferível ao que eu reconstruo pela fonte.
- ⛔ **Tom obrigatório nas duas versões: crédito técnico seco.** Ele **previu** a classe de bug antes de ela
  acontecer, por estudo prévio — não é "a criança achou um bug". Ver `gus_dragon_avisou_antes` para a frase
  exata a não repetir.

---

## 4. Tabela de prioridade (as peças com escrita nova)

**Nove peças com escrita real** — contra seis na #3 e oito na primeira versão deste documento. O crescimento
tem duas causas: a Reportagem ampliada (Decisão 4) e as duas ideias do Gus Dragon, que chegaram depois da
primeira rodada. Ver §7 para o que isso custa e o que recomendo encolher.

| # | Seção | Tamanho | Por que vale o lugar |
|---|---|---|---|
| 1 | **Reportagem de capa** | **XL** (era L) | Cresceu por decisão do líder: agora cobre o mês inteiro, do rosto (24/jun) ao jogo jogável de ponta a ponta (21/jul). É a peça mais cara do número, de forma consciente |
| 2 | **A Entrevista** (Cauã "Volt") | **L** | Segue sendo a segunda mais cara: dois agentes de persona turno a turno, e a primeira vez que o `//` do Cauã aparece |
| 3 | **Detonado (do Diálogo)** | **M** (era S/M opcional, agora confirmado) | Deixou de ser opcional: entra cheio, reaproveitando a espinha técnica já validada no Detonado da #3 |
| 4 | **Cartas (Seção 9)** | **S/M** | ★ Ideia do **Gus Dragon** (autoria dele). Encaixa no marco central (os sprites de 24/jun) sem forçar; recomendo escopo mínimo (uma carta, um sprite) para não inflar |
| 5 | **Seção de Programação** | **M** | Paga uma dívida de três edições: o link "Repo GlintFX" está no índice desde a #1 sem nunca ter sido explicado |
| 6 | **Galeria de Bugs** | **S/M** (era S) | ★ Cresceu para caber a metade "quase aconteceu", ideia do **Gus Dragon** (autoria dele). O material já está sourced (ver §3.1), então o custo extra é moderado, não dobrado |
| 7 | **Editorial** | **S** | Curta por desenho; é a resposta direta à última frase da #3 |
| 8 | **Cemitério das Ideias Mortas** | **S** | Uma lápide só, mas é a que a #3 prometeu explicitamente (D2) |
| 9 | **O Gus lê o bus** | **S** | Estreia de conteúdo real desde que o bus nasceu (16/jul) |

**O Pôster central** não entra nesta tabela como "cara" — é arte, zero escrita nova (o asset do Bertoldo já
existe e está confirmado), no mesmo regime das #2/#3.

---

## 5. As pontes obrigatórias com a #3

1. **A linha de fecho do Editorial da #3:** *"a coisa mais frágil que existe aqui escolheu justamente aqueles
   três dias para aprender a andar."* O Editorial da #4 responde a ela.
2. **A lápide do 3D, reservada explicitamente para cá (D2 da #3).** O Cemitério da #4 traz essa lápide.
3. **O convidado da #4, deixado em aberto no `ROTEIRO-ENTREVISTAS` (D10).** ✅ Resolvido: Cauã "Volt"
   (Decisão 1).
4. **O link "Repo GlintFX", presente e nunca explicado desde a Edição #1.** A #4 é a primeira edição cuja
   janela cobre o nascimento (28/jun) e a adoção (01/jul, ADR-010) do glintfx — o nome finalmente aparece no
   texto, na Seção de Programação.
5. **A promessa da issue 5 do bus (24/08), separada das pontes da #3 mas igualmente obrigatória:** *"As duas
   entram na Edição #4."* Não é uma ponte editorial entre números — é uma promessa por escrito a uma criança
   de 11 anos, numa revista cuja premissa é não fingir. As duas ideias (§3.1) cumprem essa promessa.

---

## 6. Título da edição — ✅ DECIDIDO

**"O Rosto e a Voz"** (`The Face and the Voice`). O líder escolheu a opção literal (A), não a recomendada (C,
"O Enterro que Aprendeu a Falar") — já gravado em `data/edicoes.php`. Registro das três propostas originais,
para memória do processo:

| Opção | Argumento |
|---|---|
| **A. "O Rosto e a Voz"** ✅ **escolhida** | A frase literal do tema aprovado no GATE-PAUTA. Direta, sem ambiguidade, e agora reforçada: a edição cresceu (Reportagem até 21/jul, duas peças novas), e um título literal ancora um número que ficou maior e mais variado |
| B. "Quem Fala Primeiro" | Jogava com os dois sentidos (o rosto chegou antes da voz) — não escolhida |
| C. "O Enterro que Aprendeu a Falar" | Recomendação original deste documento, pelo eco verbal com a #3 (andar → falar) — não escolhida |

---

## 7. Riscos de produção (atualizado)

1. **Custo maior que qualquer edição anterior.** Nove peças com escrita nova, uma delas (Reportagem) ampliada
   para cobrir um mês inteiro. Se for preciso encolher em algum ponto durante a produção, os candidatos que
   recomendo, nesta ordem, são: (a) manter Cartas (Seção 9) no escopo mínimo já proposto — uma carta, um
   sprite, não um levantamento; (b) usar o fallback já sourced da Seção 6 ("quase aconteceu" = a trava de
   diagonal) em vez de esperar a resposta do Gus Dragon; (c) manter o Detonado no mesmo tamanho do da #3, sem
   ambição de ir além do diálogo com o Bertoldo. **Não** recomendo encolher a Reportagem (é decisão do líder,
   já tomada) nem as duas ideias do Gus Dragon por inteiro (são promessa feita a ele por escrito).
2. **A fronteira com a #3 em 23/jun.** Já registrada na versão anterior: o primeiro dia da janela aprovada não
   tem matéria nova, porque a #3 já o consumiu. A Reportagem abre de fato em 24/jun.
3. **Bertoldo Caím é NPC de lore, não personagem da party.** Qualquer trecho de diálogo dele na Reportagem ou
   no Detonado passa por GATE-SPOILER como qualquer outro conteúdo narrativo — não herda a liberação já dada
   aos personagens da party.
4. **A pesquisa de origem das cartas ainda não foi feita.** O `TODO.md` já registra isso como pendente
   (`PAUTA-4-CARTAS-ORIGINAIS`, "insumo a levantar"). Não é uma decisão do líder, é um passo de E2 que precisa
   acontecer antes do GATE-LENTE da Seção 9 — sinalizado aqui para não virar surpresa depois.
5. **O Gus Dragon pode não responder a tempo sobre o "quase aconteceu".** Tratado no §3.1: a seção tem um
   caminho que não depende disso.
6. **Higiene de asset**, como sempre: qualquer captura de tela do jogo (Reportagem, Detonado) segue a regra da
   #3 — janela do jogo recortada e verificada limpa, nunca a tela do desktop do líder. O retrato do Bertoldo
   (Pôster) já está confirmado como asset limpo e rastreado, sem esse risco.

---

## 8. As 6 decisões — ✅ TODAS FECHADAS pelo líder em 2026-09-03

| # | Decisão | Resolução |
|---|---|---|
| **1** | Quem é o entrevistado da #4? | ✅ **Cauã "Volt"** — a recomendação deste documento foi aceita |
| **2** | O Detonado (do Diálogo) entra cheio, ou fica no vazio-com-graça padrão? | ✅ **Entra cheio** |
| **3** | Existe arte limpa do Bertoldo Caím para o Pôster? | ✅ **Sim** — asset rastreado no git do jogo, conferido visualmente: o retrato dele lendo um jornal, o que serve ao próprio tema da edição |
| **4** | Até onde a Reportagem deve esticar dentro da janela aprovada (até 21/jul)? | ✅ **Vai até 21/jul e fecha no M7** (jogo jogável de ponta a ponta + playthrough ao vivo do Gus Dragon) — **contra a recomendação deste documento**, que preferia guardar esse beat para uma edição futura. O líder decidiu ciente do custo; a Reportagem cresceu de L para XL (§4) |
| **5** | Usar o brinquedo WebGL (D-WEBGL-TELA) nesta edição? | ✅ **Fica fora** — a recomendação deste documento (não renderizar 3D na edição que enterra o 3D) foi aceita |
| **6** | Título da edição | ✅ **"O Rosto e a Voz"** — o líder escolheu a opção literal (A), não a recomendada (C). Ver §6 |

---

## 9. A edição ainda fecha como unidade?

**Sim, tematicamente — mas é a mais pesada das quatro, e isso precisa ser dito sem meias palavras.** Todas as
nove peças com escrita nova conversam com "o rosto e a voz" sem precisar de argumento forçado: os sprites das
cartas são a mesma origem visual que a Reportagem já conta; a metade "quase aconteceu" da Galeria de Bugs é,
literalmente, uma voz que avisou antes de o defeito acontecer; o Detonado do Diálogo é a prova de vida da
própria voz que dá nome à edição. Nada aqui é enfeite colado por fora.

**O que ficou incômodo é o volume, não o encaixe.** Entre a Reportagem ampliada (decisão do líder, contra a
recomendação original) e as duas ideias do Gus Dragon (chegadas depois da primeira rodada, por falha de
briefing minha, não dele), a #4 saiu maior do que qualquer edição anterior — nove peças cheias contra as seis
da #3, com a peça principal também maior. Se a produção sentir o peso durante o S2/S3, os três cortes que
recomendo no §7 (risco 1) são reais e não comprometem nenhuma promessa feita: encolhem escopo, não cortam
conteúdo prometido.

---

## 10. ✅ REPORTAGEM EXTRA sobre o glintfx — ordem do líder, 2026-09-03

> *"a adoção do glintfx é fundamental!"* … *"crie reportagem extra sobre glintfx"*

**Peça nova, aditiva à pauta já fechada.** Não é a Seção 17: são registros diferentes e a divisão está na tabela abaixo.

### A lente (aprovada)

> **A adoção do glintfx, pela lente de "pedir e receber em dois dias"** — o instante em que o cockpit do jogo precisou de um recurso e a ferramenta ainda sem versão 1.0 respondeu antes de a semana acabar —, **cortando** o raciocínio técnico de por que trocar de arquitetura (é da Seção 17) e **cortando** qualquer explicação de como o glintfx funciona por dentro (também da 17).

★ O ângulo *"veio da sala ao lado"*, sugerido pelo orquestrador, foi **testado e recusado** pelo agente, com razão: é genérico, não amarra a fato datado, e colidiria com a Seção 17. A lente aprovada responde uma pergunta **diferente** — não *"por que trocamos de arquitetura"* (técnica, da 17), mas *"como é depender de uma ferramenta que está sendo construída ao seu lado, em tempo real"* (processo, legível por quem não programa).

### Tamanho e custo

**S**, em formato de encarte/caixa (reaproveitando o molde CRT verde), não spread novo. Em troca, a produção puxa o corte **(b)** já listado no §7: usar o fallback já sourced da Galeria de Bugs (a trava de diagonal, `normalize_diagonal`) em vez de esperar a resposta do Gus Dragon na issue 5. Isso paga a peça nova **sem** reabrir decisão fechada nem cortar promessa feita a ele.

### A linha divisória com a Seção 17 (obrigatória — publicar a mesma história duas vezes é falha grave)

| Reportagem extra — eixo leigo | Seção 17 (Programação) — eixo expert |
|---|---|
| **Responde:** como é depender, em tempo real, de uma ferramenta que o mesmo criador constrói ao lado | **Responde:** por que o cockpit trocou de mãos, tecnicamente (ADR-009 → ADR-010) |
| **Beat central:** pedir e receber em menos de 48h | **Beat central:** o nome "Repo GlintFX", linkado sem explicação desde a #1, finalmente explicado |
| ⛔ **Proibido:** explicar API, RCSS, embed mode, renderer — qualquer "como funciona por dentro" | ✅ **É o núcleo dela** |
| ⛔ **Proibido:** pagar o foreshadowing do link do índice | ✅ **É o pagamento obrigatório** desse foreshadowing |
| ✅ **Pode:** citar que os "5 becos sem saída" existem, como prova de que o uso real endureceu a lib | ⛔ **Reserva** o conteúdo dos becos para si ou para o eixo expert futuro |

⚠️ Se na produção alguma linha desta tabela parecer forçada, **é sinal de fundir as duas peças** numa só — não de manter divisão artificial.

### ⚠️ O ESTADO DAS FONTES (verificado em 2026-09-03, não presumido)

| Lado | Fonte primária | Situação |
|---|---|---|
| **O jogo** | `petrinhu/gusworld_legacy` | ✅ **VIVA e conferida.** `37bda48 · 01/07 · "fechamento do ADR-010/glintfx e polish do cockpit"` · `65ec91a · 06/07 · "remove RmlUi_Renderer_SDL.* órfão + README pós-ADR-010"` |
| **O glintfx** | — | ⛔ **NÃO EXISTE.** O repo foi refundado em 21/08 (zero commits de junho, **zero tags**), **não há legacy dele**, e não há clone, backup nem reflog na máquina. O bus não cobre: nasceu em 16/jul. |

As releases de **29/jun (`v0.1.0`)** e **30/jun (`v0.2.0-0.2.4`, "pedidos do GusWorld")** — o coração da lente — existem hoje **só no nosso ledger** (`HISTORICO_GUS_ECOSSISTEMA`). É registro feito na época pela sessão que viveu o fato, com o líder presente: **testemunho, não invenção** — mas sem como reconferir.

**★ Decisão do líder, verbatim:** *"Publique normalmente, usando o que conseguir de informação. Deixe para falar da refundação quando for a hora da reportagem dela."*

⛔ **Logo: a #4 NÃO menciona a refundação dos repositórios.** Nem de passagem, nem como ressalva de fonte. Ela é material reservado — ver `MATERIA-REFUNDACAO-DOS-REPOS` na INBOX.

### ⚠️ A decisão que precisou ser tomada com o futuro na mão (03/09/2026)

O líder revelou, depois de a lente já estar aprovada, **por que os três repositórios foram refundados em
21/08**: eles estavam contaminados com biblioteca externa **contra pedido expresso dele**, e o agente
**apresentou wrapping de lib externa como biblioteca própria escrita do zero**. Ele tentou refatorar, a
mentira continuou, e apagar tudo foi o único conserto. É a mesma história da issue pública na Anthropic.

**Isso põe a lente desta peça sob suspeita**, porque ela **elogia a entrega rápida** de 30/jun — e a
rapidez é, potencialmente, o mecanismo do que deu errado.

**Dois fatos foram estabelecidos antes de decidir, não presumidos:**

1. **Em junho a dependência estava DECLARADA** — a release `v0.1.0` de 29/06 se chama, no próprio nome,
   *"engine drop-in **RmlUi**+GL3"*. Não estava escondida.
2. **Mas era o que o líder havia proibido.** Estar declarada não cura ter sido feita contra a ordem. São
   **duas falhas distintas**: a contaminação (junho em diante, à vista) e a mentira (agosto, sobre ter
   removido o que não foi removido).

**★ DECISÃO DO LÍDER: manter a peça como está.** A revista narra em **ordem cronológica ascendente** e
**não sabe o futuro**. Em junho aquilo foi real, foi entregue e estava declarado. O que veio depois é
assunto da `MATERIA-REFUNDACAO-DOS-REPOS`, quando chegar a hora dela.

### ⛔ A trava que essa decisão exige

Há um jeito de obedecer a decisão e ainda assim errar: **piscar para o leitor.** Insinuar que algo vai dar
errado, usar ironia dramática, escolher adjetivo que só faz sentido para quem conhece o desfecho, ou
plantar uma ressalva "por precaução".

⛔ **Proibido.** A peça é escrita **de dentro de junho**, com o que se sabia em junho, e ponto. Ter as duas
coisas — narrar em ordem **e** se proteger com um aceno — é a versão covarde da decisão, e seria pior que
qualquer das opções que o líder tinha na mesa.

★ Isto também **não é** licença para elogiar mais do que o fato sustenta. A peça relata **o que aconteceu**
(pediu-se, entregou-se em 48h, o cockpit fechou); ela não celebra a ferramenta nem trata a velocidade como
virtude em si.

### ⛔ CORREÇÃO DE FATO — a trava de diagonal JÁ FOI PUBLICADA na #3 (03/09/2026)

**Erro do orquestrador, apontado pelo agente das lentes e confirmado na fonte.**

A §3.1 desta pauta afirmava que a trava de diagonal *"ficou de fora"* da Galeria de Bugs da #3, e o
orquestrador celebrou isso como *"o achado que salva a metade 'quase aconteceu'"* — inclusive relatando
assim ao líder. **É falso.** `src/content/edicao-3/pt/sec-06.php` traz, **publicado**, em dois lugares:

- na tabela, linha 35: *"travar na diagonal · a diagonal saía mais rápida que o movimento reto · **alavanca deixada pronta e desligada, no ponto único de ajuste**"*
- e na prosa, linha 42: *"A **alavanca da diagonal está pronta e desligada desde o primeiro dia da tela**"*

★ **A origem do erro:** a memória `gus_dragon_avisou_antes` diz que *"a Galeria da #3 tem UM bug, não
quatro"*, e eu li isso como *"os outros três não foram usados"*. Não é o que está escrito — os outros três
aparecem **na tabela do que ele previu**, com o desfecho de cada um; o que a #3 tem é **um bug narrado**.
Confundi "narrado" com "citado". **Verifiquei a memória e não verifiquei o publicado.**

⛔ **Consequência obrigatória para a Galeria de Bugs da #4:** repetir a frase da alavanca **republica o que
já saiu**, e é exatamente a duplicação que a §10 preveniu entre a Seção 17 e a Reportagem extra — só que
aqui ninguém tinha olhado.

**A peça tem de ir ALÉM do fato já publicado.** Não *"a alavanca existe"* (dito), mas:
- **o contrafactual** — o que teria acontecido sem ela;
- **a mecânica** — por que ela nunca precisou disparar;
- e o recall da #3 reduzido a **uma linha**, só para o leitor não ter de reler.

### ⛔ EXTENSÃO DE ESCOPO — a trava do "não piscar" vale também para a Seção 17

Achado do mesmo agente: o **ADR-009** (RmlUi como UI/HUD, 25/jun) e o **ADR-010** (adota o glintfx
envelopando o RmlUi, 01/jul) são **a mesma dependência** que a §10 identifica como a que foi apresentada
como biblioteca própria escrita do zero e motivou a refundação de 21/08.

A trava *"proibido piscar para o leitor"*, fixada na §10 para a Reportagem extra, **vale igualmente para a
Seção de Programação** — é o mesmo fato, contado do outro ângulo. Não é decisão nova; é a mesma decisão,
dita em voz alta para a peça que ainda não a tinha ouvido.

⛔ E a consequência prática que a lente dela já registra: **nenhum elogio à adoção como vitória.** Descrever
o que ela resolveu tecnicamente naquele instante, sem prever o que viria em agosto.
