# Glyfesse #4 — Galeria de Bugs (texto final)

> **Seção 6, tamanho S/M, DUAS metades.** Lente: dois bugs de julho, pela lente de "o que a
> lista de junho já sabia" — cortando a repetição da tabela da #3 e cortando contexto técnico
> além do necessário. **Metade "ACONTECEU":** o flash do menu, achado e resolvido no mesmo dia
> (17/jul), reportado pelo Gus Dragon. **Metade "QUASE ACONTECEU":** a trava de diagonal, ideia
> do **Gus Dragon** (autoria dele, issue 5 do bus, 21/08, aprovada pelo líder). **Status:** texto
> final pt-BR + EN, pronto para `GATE-CONTEUDO`. Molde de terminal verde da #3 (aparte curto
> embutido). Piada primeiro, técnico depois. Janela: 17/jul, dentro de 23/jun-21/jul.
>
> ⚠️ **Correção de fato incorporada (03/09/2026):** a #3 já publicou a existência da alavanca
> (`sec-06.php`, tabela e prosa). Esta peça NÃO repete a frase publicada; vai além dela com o
> contrafactual (o que teria acontecido sem o ajuste) e a mecânica (por que ele nunca precisou
> disparar). Ver Notas de produção.

---

## pt-BR

`gus@glyfesse:~/galeria$ galeria de bugs`

Desta vez são dois casos. Só um deles é bug de verdade. O outro é o tipo de vitória mais chato que existe: a que ninguém vê, porque o defeito não chegou a nascer.

`// prefiro essa vitória chata a qualquer aplauso`

**O flash que durou um dia**

Abre o menu, fecha o menu, e por um instante a tela inteira pisca de branco — feito flash de câmera velha, das que ainda usam filme e cegam todo mundo por engano. Aconteceu comigo. Eu reportei na hora.

`gus@glyfesse:~/galeria$ pisca branco quando fecho o menu, alguem confere isso`
`// nao ia deixar pra depois. isso incomoda o olho`

O jogo usava um contexto gráfico para o menu e outro para o jogo por trás dele, e trocava entre os dois toda vez que o menu abria ou fechava. No instante da troca, por uma fração de segundo, a tela mostrava o vazio entre um contexto e outro — daí o flash. O conserto (registrado como ADR-018) uniu os dois num contexto só: sem troca, sem vazio, sem flash. Reportado e resolvido no mesmo dia, 17 de julho.

`// achado e resolvido no mesmo dia é o tipo de estatística que eu gosto de ver`

**O interruptor que nunca precisou ligar**

A #3 já contou que o jogo guarda, desde o começo, um ajuste pronto para ligar que ninguém ligou até hoje. Falta o resto: o que aconteceria se ele não existisse, e por que, apagado, nunca deu problema.

Sem esse ajuste, andar na diagonal sairia mais rápido que andar reto — a raiz de dois que sobra quando dois eixos se somam sem dividir depois. Não é sutil: dá pra sentir, dá pra cronometrar, dá pra virar truque de quem descobre primeiro. Eu tinha posto isso na lista antes de o quadrado dar um passo sequer.

`gus@glyfesse:~/galeria$ eu nao apostei que ia dar certo. eu apostei que dava pra ligar rapido se desse errado`
`// e ate agora nao precisou. isso tambem conta`

E, mesmo assim, o interruptor nunca precisou ligar. Porque até hoje nada no jogo cobra do jogador andar reto contra o relógio — sem corrida, sem prazo, a vantagem da diagonal fica invisível, dormindo dentro do código, esperando um dia que ainda não chegou. Quando chegar, ligar não é reescrever o movimento inteiro: é virar uma chave só, porque o ajuste mora num único lugar desde que a tela nasceu.

Um bug morreu no dia em que nasceu. O outro nunca chegou a nascer. As duas coisas só acontecem quando alguém prestou atenção antes, não depois.

---

## EN

`gus@glyfesse:~/gallery$ bug gallery`

This time there are two cases. Only one of them is an actual bug. The other is the most boring kind of win there is: the one nobody sees, because the defect never got born.

`// I'll take that boring win over any applause`

**The flash that lasted one day**

Open the menu, close the menu, and for an instant the whole screen flashes white — like an old camera flash, the kind that still uses film and blinds everyone by accident. It happened to me. I reported it right away.

`gus@glyfesse:~/gallery$ screen flashes white when i close the menu, someone check this`
`// wasnt gonna sit on it. that kind of thing bugs the eye`

The game used one graphics context for the menu and another for the game behind it, and switched between the two every time the menu opened or closed. In the instant of the switch, for a fraction of a second, the screen showed the gap between one context and the other — hence the flash. The fix (logged as ADR-018) merged the two into a single context: no switch, no gap, no flash. Reported and fixed the same day, July 17th.

`// found and fixed the same day is the kind of stat i like to see`

**The switch that never had to flip**

Issue #3 already told you the game keeps, from the start, a ready setting nobody's turned on to this day. What's missing is the rest: what would have happened if it didn't exist, and why, off, it never caused a problem.

Without that setting, moving diagonally would come out faster than moving straight — the square root of two left over when two axes add up without being divided back down. It's not subtle: you can feel it, you can time it, you can turn it into a trick for whoever finds it first. I had it on the list before the square took a single step.

`gus@glyfesse:~/gallery$ i didnt bet it would go wrong. i bet it could flip fast if it did`
`// and so far it hasnt needed to. that counts too`

And still, the switch never had to flip. Because to this day nothing in the game charges the player for moving straight against a clock — no race, no deadline, the diagonal's edge stays invisible, asleep inside the code, waiting for a day that hasn't come yet. When it does, flipping it isn't rewriting movement from scratch: it's turning one switch, because the setting lives in a single place since the screen was born.

One bug died the day it was born. The other never got born at all. Both only happen when somebody was paying attention before, not after.

---

## Notas de produção

### Prova de que a peça foi ALÉM do que a #3 publicou

- **Conteúdo inteiramente novo:** o bug do flash (17/jul, ADR-018) não aparece em nenhuma seção da #3 — sourced no ledger `HISTORICO_GUS_ECOSSISTEMA` (linhas 63 e 100) e no `TODO.md` (`MATERIA-FLASH-MENU`, `VIDEOS-FONTE-PESSOAIS`).
- **Recall da #3 reduzido a UMA linha**, e sem citar a frase publicada. `sec-06.php` publicou, verbatim, *"alavanca deixada pronta e desligada, no ponto único de ajuste"* (tabela) e *"A alavanca da diagonal está pronta e desligada desde o primeiro dia da tela"* (prosa). Esta peça usa *"um ajuste pronto para ligar que ninguém ligou até hoje"* — troca "alavanca" por "ajuste"/"interruptor", não reproduz "desde o primeiro dia da tela" colado à mesma oração, e não repete a segunda frase publicada em nenhuma forma.
- **Dois elementos que a #3 não tinha:**
  1. **O contrafactual** — o que a diagonal destravada faria: vantagem mensurável ("raiz de dois"), sentível, cronometrável, capaz de virar exploit para quem descobrisse primeiro. A #3 nunca disse o que aconteceria SEM o ajuste.
  2. **A mecânica** — por que o ajuste nunca precisou ligar: nada no jogo hoje cobra velocidade reta contra o relógio (sem corrida, sem prazo), e o ajuste é ponto único de código, logo ligá-lo depois custa uma linha, não um redesenho. A #3 disse que o ajuste existe; não disse por que ele ficou décorativo até agora nem o que custaria ativá-lo.
- **A frase do líder já publicada em #3** (*"ninguém deixa alavanca pronta para um problema que não previu"*) **não foi reaproveitada nem parafraseada de perto.** A fala nova do Gus (*"eu não apostei que ia dar certo... eu apostei que dava pra ligar rápido se desse errado"*) ataca um ângulo diferente — preparação/mecanismo, não previsão — que é justamente o que faltava.

### Checklist de conformidade

| Checagem | Resultado |
| :--- | :--- |
| ⛔ "criança achou bug" / fofura | ausente — as duas metades usam crédito técnico seco (`gus_dragon_avisou_antes`) |
| ⛔ esforço inventado ("estudou muito") | ausente |
| ⛔ rótulo clínico / nome de batismo | ausente — só "Gus Dragon" (nem citado nesta peça, a voz já é dele) |
| L-25 (sprite/pixel/hitbox/commit/build/pipeline/render/frame na fala do Gus) | zero ocorrências nas falas/`//`; a prosa (voz da revista) usa "contexto gráfico"/"ADR-018" livremente, dentro da exceção de seção técnica |
| Janela 23/jun-21/jul | única data citada é 17/jul, dentro da janela |
| Piscar para o leitor / spoiler de antagonista | ausente |
| Erros de digitação | 5 no total (`alguem`, `nao` ×3, `rapido`, `ate`), distribuídos em 6 falas/apartes de Gus — dose "eventual", nunca em toda linha; todos da classe mecânica (acento comido), nenhum de gramática |
| Ponto final nas falas do Gus | ausente (fala online); `?`/`!` preservados onde caberiam (não houve pergunta/exclamação nesta peça) |
