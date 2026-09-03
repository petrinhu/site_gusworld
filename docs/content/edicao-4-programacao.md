# Glyfesse #4 — Seção de Programação (rascunho v1)

> O eixo expert da Edição #4. **Voz: `gus@glyfesse`** — a voz editorial da revista, em seção técnica (L-25
> autoriza termo técnico aqui, porque não é fala de personagem de jogo dentro do mundo do jogo). Estrutura
> canônica herdada das #1-#3: intro acessível + desculpa furada → transição `//` → CRT `nano` → parte
> técnica com subtópicos → `//by:`.
> **Lente aprovada (`PAUTA-EDICAO-4.md`, §10):** por que o cockpit trocou de mãos duas vezes em sete dias,
> pela lente de "a peça que pensa nunca soube quem desenha" — cortando o processo humano de pedir e receber
> (é da Reportagem Extra) e cortando como o glintfx funciona por dentro (também dela).
> **Fecho obrigatório:** o link "Repo GlintFX", no índice desde a Edição #1 e nunca explicado, ganha texto
> pela primeira vez aqui.
> **Datas:** 25/jun a 6/jul/2026 (ADR-009 → ADR-010 → o commit que fecha a limpeza). Nada posterior;
> nenhuma menção à refundação dos repositórios de agosto.
> ⛔ **Trava do "não piscar" (extensão de escopo, ordem do líder, 03/09):** mesma trava da Reportagem Extra
> — é a mesma dependência, contada do outro ângulo. Escrita de dentro de junho/julho; **nenhum elogio à
> adoção como vitória**, só o que ela resolveu tecnicamente naquele instante.
> **Fontes:** `HISTORICO_GUS_ECOSSISTEMA.md` (ADR-009 25/06, ADR-010 01/07) e `petrinhu/gusworld_legacy`
> (commits `37bda48`, 01/07, "fechamento do ADR-010/glintfx e polish do cockpit"; `65ec91a`, 06/07, "remove
> RmlUi_Renderer_SDL.* órfão + README pós-ADR-010") — citados como vivos e conferidos pela pauta em 03/09.
> ⚠️ Este agente não teve, nesta sessão, ferramenta de acesso ao GitHub para reconferir os dois SHAs por
> conta própria (ver Notas de produção).
> ⛔ **Reserva:** o conteúdo dos "5 becos sem saída" do glintfx **não aparece aqui** — fica de fora por
> inteiro, sem nem citação de existência.
> **Status:** rascunho v1 do `narrative-writer` (2026-09-03), aguardando `GATE-CONTEUDO` do editor-geral.

---

## pt-BR

Um roteiro de teatro não muda se trocar o ator que lê as falas em voz alta — desde que as falas continuem as mesmas e cheguem na hora certa. O cockpit do jogo funciona assim: uma parte dele decide o que precisa ser mostrado (esta vida, aquele botão, este aviso), e outra parte pega essa decisão pronta e desenha na tela. Entre 25 de junho e 1º de julho de 2026, a parte que desenha trocou de dono duas vezes. A parte que decide não percebeu.

No dia 25 de junho, o registro chamado ADR-009 escolheu o RmlUi para desenhar a interface e o painel de comando do jogo — o RmlUi é uma biblioteca que monta tela a partir de marcação parecida com HTML e CSS. Sete dias depois, em 1º de julho, outro registro, o ADR-010, trocou de novo: entra o glintfx, envelopando o próprio RmlUi por dentro, e sai o código que a equipe do jogo tinha escrito à mão pra ligar um ao outro. Duas trocas, uma semana, e o motivo de a segunda ter custado tão pouco é a matéria desta seção.

```
gus@glyfesse:~$ whoami
gus
gus@glyfesse:~$ # ninguem me perguntou antes de trocar a interface do jogo. nas duas vezes.
gus@glyfesse:~$ # da primeira eu fiquei bravo. da segunda eu so liguei o cronometro pra ver quanto ia durar.
gus@glyfesse:~$ # durou uma semana. bati o recorde de paciencia e o de troca de fundação no mesmo mes.
```

//Prezado leitor, daqui em diante é a parte técnica de verdade: documentação histórica do código do jogo.
//gus@glyfesse

```
gus@glyfesse:~/programacao$ nano adr-010.md
```

### Contexto: o que estava em jogo entre 25 de junho e 1º de julho de 2026

Em 21 de junho, a engine do jogo passou a rodar sobre SDL3 (a história dessa troca está na Seção de Programação da Edição #3). SDL3 dá janela, entrada e desenho de baixo nível — mas não dá interface: barra de vida, menus, o painel de comando da tela de batalha. Pra isso, em 25 de junho, o ADR-009 escolheu o RmlUi: uma biblioteca que já vinha sendo usada por outros projetos de jogo antes deste. A decisão veio junto com o redesenho do cockpit tático da tela de batalha, em 960 por 540 pixels.

O RmlUi resolve a interface, mas não fala SDL3/OpenGL sozinho — alguém precisa escrever a ponte entre o que o RmlUi decide desenhar e a chamada real de vídeo que coloca aquilo na tela. Essa ponte, no jogo, foi escrita à mão: um arquivo próprio do projeto, chamado `RmlUi_Renderer_SDL`.

Sete dias depois, em 1º de julho, o ADR-010 trocou de novo. Entra o glintfx: uma biblioteca de interface sendo construída em paralelo, num projeto irmão, que já envelopa o RmlUi por dentro do próprio modo de uso ("embed mode" — o jogo hospeda o glintfx, o glintfx cuida do resto). A ponte que o jogo tinha escrito à mão deixou de ser necessária, porque o glintfx já trazia a sua. Cinco dias depois, em 6 de julho, um commit removeu o arquivo órfão — o `RmlUi_Renderer_SDL` que ninguém mais chamava.

### Onde a ponte mudou de mãos

| Critério | RmlUi à mão (ADR-009, 25/jun) | glintfx em modo embed (ADR-010, 01/jul) |
|---|---|---|
| Quem escreve a ponte com SDL3/OpenGL | o projeto do jogo, num arquivo próprio | o glintfx, por dentro do próprio embed mode |
| Quem mantém essa ponte em dia | o time do jogo, sozinho | outro projeto, em paralelo, do lado de fora |
| O que sobrou no repositório do jogo, 5 dias depois | — | nada: `RmlUi_Renderer_SDL` removido em 06/jul |

### Por que custou tão pouco

A parte do jogo que decide o que aparece na tela de batalha — quanto de vida sobrou, qual botão está disponível — nunca soube o nome de nenhuma das duas bibliotecas de interface. Ela manda a decisão pronta pra quem estiver do outro lado, do mesmo jeito que a lógica de combate, meses antes, nunca soube se estava rodando sobre Qt6 ou sobre SDL3. Por isso a segunda troca, mesmo vindo sete dias depois da primeira, não pediu reescrever regra nenhuma de jogo: pediu trocar a ponte, e apagar a que ficou sem uso. O commit de 6 de julho que tira o `RmlUi_Renderer_SDL` do repositório é o registro desse apagar — não uma correção de erro, uma limpeza de código que parou de ter dono.

### O custo que foi aceito

O preço aqui foi outro tipo de dependência: o glintfx, em 1º de julho, ainda não tinha lançado versão 1.0. É uma ferramenta sendo construída ao lado do próprio jogo, por outro projeto, com o próprio ritmo de mudança. Trocar uma peça de terceiro estável por uma peça de terceiro em construção troca um risco por outro — o de ficar preso a uma API antiga pelo de acompanhar uma API que ainda está se formando. O ADR-010 registra essa troca sabendo dela; não é o tipo de custo que se paga uma vez só.

É esse o link chamado "Repo GlintFX", que está no índice desta revista desde a primeira edição sem nunca ter ganhado uma linha de explicação ao lado. Agora tem: é o repositório da ferramenta que passou a desenhar o cockpit do jogo a partir de 1º de julho de 2026 — a peça que pensa continuou sem saber o nome dela, e é exatamente por isso que a troca coube em uma semana.

//by: gus@glyfesse

---

## EN

A stage script doesn't change if the actor reading the lines out loud gets swapped, as long as the lines stay the same and land on cue. The game's cockpit works the same way: one part decides what needs to show up (this much health, that button, this warning), and another part takes that finished decision and draws it on screen. Between June 25th and July 1st, 2026, the part that draws changed hands twice. The part that decides never noticed.

On June 25th, the record called ADR-009 chose RmlUi to draw the interface and the command panel of the game — RmlUi is a library that builds screens out of markup similar to HTML and CSS. Seven days later, on July 1st, another record, ADR-010, switched again: in comes glintfx, wrapping RmlUi itself from the inside, and out goes the code the game's own team had hand-written to connect the two. Two swaps, one week, and the reason the second one cost so little is the whole story here.

```
gus@glyfesse:~$ whoami
gus
gus@glyfesse:~$ # nobody asked me before swapping the game's interface. either time.
gus@glyfesse:~$ # first time i got mad. second time i just started a timer to see how long it would last.
gus@glyfesse:~$ # it lasted a week. tied my own record for patience and for foundation swaps in the same month.
```

//Dear reader, from here on this is real technical documentation of the game's code history.
//gus@glyfesse

```
gus@glyfesse:~/programming$ nano adr-010.md
```

### Context: what was at stake between June 25th and July 1st, 2026

On June 21st, the game's engine moved onto SDL3 (that swap's story is in Issue #3's Programming section). SDL3 gives you a window, input and low-level drawing — but not an interface: health bars, menus, the battle screen's command panel. For that, on June 25th, ADR-009 picked RmlUi: a library already used by other game projects before this one. The decision arrived together with a redesign of the battle screen's tactical cockpit, at 960 by 540 pixels.

RmlUi solves the interface, but it doesn't speak SDL3/OpenGL on its own — somebody has to write the bridge between what RmlUi decides to draw and the actual video call that puts it on screen. That bridge, in the game, was hand-written: a file of the project's own, called `RmlUi_Renderer_SDL`.

Seven days later, on July 1st, ADR-010 switched again. In comes glintfx: an interface library being built in parallel, in a sibling project, which already wraps RmlUi inside its own way of being used ("embed mode" — the game hosts glintfx, glintfx handles the rest). The bridge the game had hand-written stopped being needed, because glintfx already brought its own. Five days later, on July 6th, a commit removed the orphaned file — the `RmlUi_Renderer_SDL` nobody was calling anymore.

### Where the bridge changed hands

| Criterion | RmlUi by hand (ADR-009, 06/25) | glintfx embed mode (ADR-010, 07/01) |
|---|---|---|
| Who writes the bridge to SDL3/OpenGL | the game project, in its own file | glintfx, inside its own embed mode |
| Who keeps that bridge up to date | the game team, alone | another project, in parallel, from outside |
| What was left in the game's repository, 5 days later | — | nothing: `RmlUi_Renderer_SDL` removed on 07/06 |

### Why it cost so little

The part of the game that decides what shows up on the battle screen, how much health is left, which button is available, never learned the name of either interface library. It hands the finished decision to whoever's on the other side, the same way the combat logic, months earlier, never knew whether it was running on Qt6 or SDL3. That's why the second swap, even landing seven days after the first, never asked for a single rule of the game to be rewritten: it asked for the bridge to be swapped, and the one left unused to be deleted. The July 6th commit that removes `RmlUi_Renderer_SDL` from the repository is the record of that deletion — not a bug fix, a piece of code cleaned up once it stopped having an owner.

### The cost that was accepted

The price here was a different kind of dependency: on July 1st, glintfx hadn't shipped a 1.0 yet. It's a tool being built alongside the game itself, by another project, at its own pace of change. Swapping a stable third-party piece for one still under construction trades one risk for another — the risk of being stuck on an aging API for the risk of keeping up with one still taking shape. ADR-010 records that trade knowing it; it's not the kind of cost you pay just once.

That's the link called "Repo GlintFX," sitting in this magazine's index since Issue #1 without ever earning a line of explanation next to it. Now it has one: it's the repository of the tool that took over drawing the game's cockpit starting July 1st, 2026 — the part that thinks still doesn't know its name, and that's exactly why the swap fit inside a week.

//by: gus@glyfesse

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho pt-BR | **~780 palavras** de prosa corrida (dentro do M esperado; abaixo do ~940 da #3, que tinha uma tabela a mais) |
| Estrutura canônica | intro (2 parágrafos) → desculpa furada (CRT) → transição `//` → CRT `nano` → técnica com `###` (3 subtópicos + tabela) → `//by:` — igual ao molde da #3 |
| Datas usadas | 21/06 (referência, não matéria própria), 25/06 (ADR-009), 01/07 (ADR-010), 06/07 (commit de limpeza) — todas dentro de 23/jun-21/jul, batendo com `HISTORICO_GUS_ECOSSISTEMA.md` |
| Fecho do "Repo GlintFX" | pago explicitamente no parágrafo final |
| "5 becos sem saída" | **ausentes** — nem citados, respeitando a reserva da pauta |
| Refundação de agosto | **nenhuma menção** |
| Trava do "não piscar" | nenhuma antecipação, nenhum "isso ia dar problema depois", nenhuma ressalva de precaução; a adoção do glintfx é descrita pelo que resolveu (a ponte à mão deixou de ser necessária), nunca celebrada como vitória |
| L-25 | não há personagem de jogo falando; voz editorial/técnica, autorizada a usar termo técnico (RmlUi, SDL3, embed mode, ADR, commit) |
| Rótulo clínico / nome de batismo | nenhum |
| Profanidade | zero |

### ⚠️ Item que fica para o gate, não resolvido aqui

A pauta declara os commits `37bda48` e `65ec91a` como "vivos e conferidos" em `petrinhu/gusworld_legacy`,
verificados em 03/09/2026, no mesmo dia deste rascunho. Este agente **não teve, nesta sessão, ferramenta de
acesso ao GitHub** para reconferir os dois SHAs e as mensagens de commit por conta própria; o texto os usa
como a pauta os entregou, citados como fato já verificado por quem tinha a ferramenta, não como algo que
este agente mediu de novo. Recomendo ao `editor-geral`/`GATE-CONTEUDO` uma reconferência de 1 minuto antes
de publicar (L-44: não declarar como fato o que não foi medido por quem escreve).

### Canon AHSD — pendência de submissão (L-08)

A desculpa furada (CRT) e o `//` de transição envolvem a voz do Gus (impaciência, humor seco, cronometrar
a própria paciência). Não foram submetidos individualmente ao líder antes desta entrega. Recomendo
conferência específica no `GATE-CONTEUDO` — o traço de "medir/cronometrar" casa com o canon existente
(ele gosta de métrica: perguntou quantas linhas de código o projeto tinha, o multímetro já estava na ficha
dele), mas a checagem formal continua sendo do líder, não deste agente.

### ★ Prova de que a linha divisória com a Reportagem Extra foi respeitada

| O que ficou em cada peça | Reportagem Extra (leigo) | Seção de Programação (expert, esta peça) |
| :--- | :--- | :--- |
| Beat central | pedir (29-30/jun) e receber (01/jul) em três dias | por que a troca custou pouco: ADR-009→ADR-010 em sete dias, a ponte `RmlUi_Renderer_SDL` trocada e removida |
| Vocabulário técnico | evitado por desenho (changelog, versão — só isso) | usado sem reserva: RmlUi, SDL3/OpenGL, embed mode, ADR, commit, nome de arquivo |
| Explicação de "como funciona por dentro" | **ausente**, por desenho da lente | **é o núcleo**: a ponte hand-written, o que o embed mode substitui, o commit que apaga o arquivo órfão |
| Foreshadowing do "Repo GlintFX" | **não tocado** | **pago aqui**, no parágrafo de fecho |
| "5 becos sem saída" | citados só como existência (uma frase, sem conteúdo) | **não aparecem** — reserva total, nem citação de existência |
| Refundação de agosto | ausente | ausente |
| Registro/formato | `gus@glyfesse`, encarte curto, sem subtópicos | `gus@glyfesse`, molde CRT completo com `###` e tabela |

### O que este agente conscientemente NÃO escreveu em cada peça, e por quê

- **Na Reportagem Extra, não escrevi:** o nome RmlUi, a existência do ADR-009, a existência do arquivo
  `RmlUi_Renderer_SDL`, ou qualquer explicação de por que o cockpit precisava trocar de peça em primeiro
  lugar. Pertence à Programação — é literalmente a resposta à pergunta que a Reportagem se recusa a fazer.
- **Na Seção de Programação, não escrevi:** como foi o pedido feito ao glintfx, o fato de o changelog de
  30/06 ter saído marcado "pedidos do GusWorld", ou qualquer coisa sobre o lado humano de pedir e esperar.
  Pertence à Reportagem — contar de novo aqui duplicaria a mesma história pela segunda vez na mesma edição,
  exatamente o risco que a pauta apontou.

### A divisão pareceu artificial em algum momento?

Não. As duas peças respondem perguntas genuinamente diferentes com evidência diferente: uma tem data e
sentimento (pedir, esperar, receber), a outra tem arquivo e commit (o que foi escrito à mão, o que passou a
sobrar, o que foi apagado). A única tentação foi deixar o parágrafo de "custo aceito" desta peça avançar
para o material da refundação de agosto — cortado por desenho, não por dificuldade de separação.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral (inclusive a reconferência dos 2 commits e o canon AHSD, ver itens acima).
- `GATE-SPOILER`: nenhum personagem de lore tocado; ADR e commit são registro técnico, não narrativa.
- Copyedit formal (`revisor-textual`) e prova final.
- Arte/render: CRT verde reaproveitado, sem asset novo.
