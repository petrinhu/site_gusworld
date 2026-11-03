# Edição #7 · Seção 4 · Caixa do determinismo

> RASCUNHO v2, submeter ao líder. Peça própria da Seção 4 (Reportagem de capa), hospedada como caixa ao fim da Reportagem, no ponto da frase-ponte de 22/08 (`docs/content/edicao-7-reportagem.md:44`). Âncora proposta: `#sec-04-determinismo`. Porte S. Molde: a caixa do menu da #5 (`docs/content/edicao-5-reportagem-menu.md`, cabeçalho). Voz: editor, de fora (L-25 do site). Sem fala nem pensamento de personagem além da linha de prompt (T7, submeter ao líder).
> Antes do GATE-SPOILER: a troca (linha 26 do bus) e a ironia da carta glitch (linhas 30 a 32) passam pelo líder. Antes do GATE-CONTEUDO: parecer do `compliance-legal` (pauta, risco 7) e revisão da tradução EN.

---

## pt-BR

`gus@glyfesse:~/determinismo$ achado`

Em 22 de agosto de 2026, às 8h46 (horário de Brasília), Gus Dragon, playtester, Revisor Adversarial de Design, abriu a issue 6 (pedido aberto no GitHub) do bus, o canal de mensagens entre o jogo e o site. A pergunta era quão bom o jogo é para speedrun, que é correr o jogo do começo ao fim no menor tempo possível.

A pergunta partiu de algo que a sessão do jogo (a conversa de programação com a IA) tinha dito a ele no dia anterior: que o sorteio do jogo é determinístico. Determinístico quer dizer que a mesma entrada sempre dá o mesmo resultado. O gerador de números aleatórios, o programa que faz os sorteios (em inglês, RNG), produz a mesma sequência toda vez que o jogo começa do mesmo ponto.

Dito assim, era verdade, mas só pela metade. Jogadores costumam recarregar o jogo até o sorteio sair a favor. Esse truque tem nome entre eles: re-roll, que é refazer o sorteio. Com sorteio determinístico, o resultado é sempre igual, e recarregar não adianta. Ele apontou a outra metade: determinismo não fecha a brecha, troca de brecha: fecha o refazer do sorteio e abre a previsão, porque quem conhece a sequência sabe o que vai sair antes de agir. A sessão reconheceu o erro na resposta.

Para mostrar o padrão, ele citou os Pokémon das gerações antigas e o Mario Maker, que usam sorteio determinístico, e lembrou que jogadores manipulam o sorteio para conseguir resultados melhores. Citou também o Celeste, jogo de plataforma que cortejou o speedrun de propósito e transformou um bug, o demo-dash, em recurso normal.

Exploit é uma brecha que o jogador usa para ganhar uma vantagem que o criador não planejou. Save verificável por replay é um jogo salvo que outra pessoa consegue conferir, refazendo a partida com a gravação do que aconteceu. A troca entre as duas coisas foi escrita com todas as letras depois da pergunta dele. No registro de 22 de agosto, ficou assim: "Save verificável por replay EXIGE determinismo. Determinismo PERMITE manipulação de RNG. As duas puxam para lados opostos, e não dá para ter as duas inteiras. O projeto escolheu o save verificável e paga com o exploit aceito."

A sessão apontou a ele uma ironia. A carta glitch (uma carta do jogo, com efeito de bug), que ele mesmo propôs, faz o movimento do Celeste: transforma um bug que faz o personagem atravessar parede, chamado clip, ferramenta clássica de speedrun, em mecânica oficial num lugar que o criador escolhe. Ele propôs a carta sem dar nome a esse movimento, e citou o Celeste depois, em outra issue.

---

## EN

`gus@glyfesse:~/determinismo$ finding`

On August 22, 2026, at 8:46 AM (Brasília time), Gus Dragon, playtester, Adversarial Design Reviewer, opened issue 6 (an open request on GitHub) on the bus, the message channel between the game and the site. The question was how well the game suits speedrunning, that is, running the game from start to finish in the shortest time possible.

The question came from something the game's session (the programming conversation with the AI) had told him the day before: that the game's random draws are deterministic. Deterministic means the same input always gives the same result. The random number generator, the program that makes the draws (RNG for short), produces the same sequence every time the game starts from the same point.

Put that way, it was true, but only half of it. Players often reload the game until the draw comes out in their favor. The trick has a name among them: re-roll, redoing the draw. With a deterministic draw, the result is always the same, and reloading does not help. He pointed to the other half: determinism does not close the loophole, it trades one loophole for another. It closes the re-roll and opens prediction, because whoever knows the sequence knows what will come up before acting. The session acknowledged the error in its answer.

To show the pattern, he cited the older-generation Pokémon games and Mario Maker, which use deterministic draws, and noted that players manipulate the draw to get better results. He also cited Celeste, a platform game that courted speedrunning on purpose and turned a bug, the demo-dash, into a normal feature.

Exploit is a loophole a player uses to gain an advantage the creator did not plan. Verifiable save by replay is a save that another person can check by replaying the run with a recording of what happened. The trade-off between the two was written out in full after his question. In the August 22 record it read (English translation of the Portuguese original): "Verifiable save by replay REQUIRES determinism. Determinism ALLOWS manipulation of RNG. The two pull in opposite directions, and you cannot have both in full. The project chose verifiable save and pays with the accepted exploit."

The session pointed out an irony to him. The glitch card (a card in the game, with the effect of a bug) he proposed himself makes Celeste's move: it turns a bug that lets a character pass through walls, called a clip, a classic speedrunner tool, into an official mechanic in a place the creator chooses. He proposed the card without naming that move, and cited Celeste later, in another issue.

---

## Notas de produção (internas, não publicar)

### 1. Pendências para o líder e para o main

- **GATE-SPOILER (brief §4.2).** A troca (linha 26, inteira) e a ironia (linhas 30 a 32) são mecânica que o líder precisa liberar. A ironia descreve a carta glitch como bug de atravessar parede; o próprio pedido dele já diz isso (`BUS/archive/20260822-0840-gusworld-marco-gus-glitch-em-batalha.md:12-24`, citado na pauta §4.5).
- **Ironia só se a Cartas não usar (brief §4.2).** Entrou porque o brief da Cartas (`docs/editorial/BRIEFS-EDICAO-7.md:385-397`) não cita o Celeste nem o clip. Verificado por grep (03/11/2026, 15:13): a palavra "celeste" aparece 0 vezes em `BRIEFS-EDICAO-7.md` e 0 vezes em `PAUTA-EDICAO-7.md`. **Se o escritor da Cartas usar a ironia, o main corta daqui**, decisão a tomar no GATE-LENTE com as duas peças lado a lado.
- **Prompt de personagem** (`gus@glyfesse:~/determinismo$ achado`). É fala no formato `persona@glyfesse:caminho$`, então é rascunho ao líder (T7). Se ele não quiser a linha, ela sai e a caixa segue sem ela. A #5 usou prompt, mas o molde não obriga.
- **Título da issue divergente.** O arquivo do bus traz "Quão speedrunnable é o jogo?" (`BUS/archive/20260822-0855-gusworld-marco-gus-tensao-determinismo-speedrun.md:14`). O GitHub devolve "Quao speedrunnable é o jogo?", sem til (`gh issue view 6`, medido em 03/11/2026, 15:13). A caixa não cita o título. Se alguma peça citar, o líder decide qual grafia vale antes.
- **Perguntas de redação ao líder** (o agente não decide sozinho):
  - Fecho: removido na v2, por ordem do coordenador (revisão textual). A caixa termina na ironia; não há mais fecho de disclaimer.
  - Data: manter "no dia anterior" (fiel a `:14`, "na véspera"), ou trocar por "antes", sem data. "No dia anterior" é o elo que o risco 17 teme.
  - Porte: o texto tem 7 parágrafos, e o brief fixa porte S. Cortar as glosas de clip e demo-dash, ou manter.
- **Tradução EN** é do agente. Aprovação do líder junto com a pt.
- **Parecer do `compliance-legal`** (pauta, risco 7): pendente.
- **Âncora `#sec-04-determinismo`** é proposta. A montagem fixa.
- **Referência de TODO desatualizada no brief.** `MARCO-GUS-DETERMINISMO` está em `SITE/TODO.md:196`, não em :195 (hoje :195 é `MARCO-GUS-CARTA-GLITCH`).

### 2. Fontes e marcação FATO / INFERÊNCIA

| # | Fato no texto | Fonte (arquivo:linha) | Marca |
|---|---|---|---|
| 1 | Issue 6 aberta em 22/08/2026 às 8h46 (GMT-3) | `gh issue view 6` no repositório do bus (dono omitido, T9), com `--json createdAt`, devolveu `2026-08-22T11:46:41Z`, que é 08:46:41 em GMT-3 (medido em 03/11/2026, 15:13). Bate com `BUS/archive/20260822-0855-gusworld-marco-gus-tensao-determinismo-speedrun.md:14` | FATO medido. Conversão UTC para GMT-3 conferida |
| 2 | A sessão do jogo disse que o sorteio é determinístico e que isso impede recarregar até dar sorte | mesmo arquivo, `:14` ("na véspera") e `:20` | FATO |
| 3 | "No dia anterior" = 21/08 | `:14` diz só "na véspera"; brief A4 (`BRIEFS-EDICAO-7.md:143`) | INFERÊNCIA. O texto não cita a data de 21/08 |
| 4 | Era verdade só pela metade; re-roll fechado, previsão aberta; "a sessão reconheceu o erro" | `:20` | FATO |
| 5 | Pokémon das gerações antigas, Mario Maker, Celeste, demo-dash, manipulação do sorteio | `:16` | FATO (são as referências que ele trouxe) |
| 6 | A troca, linha 26 inteira, escrita pela sessão a pedido dele | `:24` e `:26` | FATO |
| 7 | Ironia: carta glitch faz o movimento do Celeste; clip | `:30` | FATO da fonte. A caixa atribui a observação à sessão, como a fonte |
| 8 | Definições para leigo: determinístico, RNG, re-roll, exploit, speedrun, clip, demo-dash, save verificável por replay | redação minha | INFERÊNCIA de redação. O revisor-textual confere os termos |
| 9 | Item do TODO | `SITE/TODO.md:196` (`MARCO-GUS-DETERMINISMO`) | FATO |
| 10 | Frase-ponte que aponta para a caixa | `docs/content/edicao-7-reportagem.md:44` | FATO |

### 3. Travas e o que ficou de fora

- **T4 (crédito seco):** "Gus Dragon, playtester, Revisor Adversarial de Design" (pt) e "Gus Dragon, playtester, Adversarial Design Reviewer" (en), uma vez em cada bloco. Sem título explicado, sem quem o deu, sem nome de batismo, sem handle.
- **T6:** sem travessão, sem emoji (verificado no arquivo inteiro).
- **T7:** única fala de personagem é a linha de prompt, marcada acima.
- **T8:** o Gus personagem não aparece no corpo.
- **T9:** nenhum nome real, nenhum handle.
- **Risco 17:** a caixa não cita a Reportagem nem a acusação. Desde a v2 não há fecho de disclaimer; o texto termina na citação do Celeste.
- **Não entrou (brief §4.2, "Não entra"):** juízo sobre a sessão; ligação com a acusação da Reportagem; as linhas 22 (canon C-08 sobre speedrun) e 34 a 38 (o que não está decidido); mecânica além da linha 26 e das linhas 30 a 32 (estas últimas sob GATE-SPOILER); a data de 16/08 (PQ6); nada posterior a 03/09.

### 4. Mudanças da v2 (revisão textual, pedido do coordenador)

Aplicadas em pt-BR e EN, sem mexer no crédito duplo nem em "no dia anterior":

- **M1, glosa da issue:** pt "abriu a issue 6 (pedido aberto no GitHub) do bus"; en "opened issue 6 (an open request on GitHub) on the bus".
- **M2, horário:** pt "às 8h46 (horário de Brasília)". O en já dizia "8:46 AM (Brasília time)".
- **M3, bug:** "um bug, o demo-dash" (pt) e "a bug, the demo-dash" (en), sem o qualificador "de movimento", que a fonte não traz (`BUS/archive/20260822-0855-...:16`).
- **M4, carta glitch:** pt "A carta glitch (uma carta do jogo, com efeito de bug), que ele mesmo propôs,"; en "The glitch card (a card in the game, with the effect of a bug) he proposed himself".
- **M5, corte de oração:** removida "sem relacionar uma coisa à outra" (pt) e "without connecting the two" (en), por decisão do main, a ser vista no GATE-CONTEUDO pelo líder.
- **Fecho:** removido o parágrafo "É um achado técnico sobre um sorteio, registrado como tal." (pt) e "This is a technical finding about a draw, recorded as such." (en).
- **L1 (pt):** "determinismo não fecha a brecha, troca de brecha: fecha o refazer do sorteio e abre a previsão".
- **L2 (en):** "that the game's random draws are deterministic".
- **L3 (en):** "The question was how well the game suits speedrunning, that is, running the game from start to finish in the shortest time possible."
- **L4 (en):** "In the August 22 record it read (English translation of the Portuguese original):". A citação em en é tradução do agente, e o rótulo deixa isso dito no texto.
- **L5 (en):** removido "only" de "was written out in full after his question".
- **Cabeçalho:** RASCUNHO v1 virou RASCUNHO v2.
