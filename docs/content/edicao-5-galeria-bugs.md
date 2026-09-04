# Glyfesse #5: Galeria de Bugs (rascunho v1)

> **Seção 6, tamanho S/M, dois casos.** Lente: um bug de cada lado da cerca do mês. **Caso 1 (aconteceu e
> foi consertado, 24/07):** o Gus continuava andando sozinho ao fechar o menu de pausa, porque o laço do
> menu engolia a tecla solta. **Caso 2 (aconteceu e está aberto, 07/08):** o clipping de colisão jogador
> x ator, achado pelo Gus Dragon, playtester, Revisor Adversarial de Design. **Trava §1.1 obrigatória no
> caso 2** (especialização afirmada seca, sem hedge, sem ternura, sem "para a idade", sem exclamação).
> **Vocabulário do mundo (D15, decidida em 04/09/2026):** "um inimigo que faz ronda", "alguém do lugar",
> "um bloco"; nunca "NPC", "androide inimigo", "prop de cenário" (os termos do bus são traduzidos pro
> vocabulário de dentro do mundo). **Honestidade obrigatória:** a correção do clipping ainda não foi
> escolhida (mexe no feel da física; decisão do líder antes de qualquer linha de código).
> **Fronteira de registro (D1/D15, §5.4 da pauta):** a Galeria fala de dentro do mundo, não nomeia
> arquitetura de estados (isso é do Detonado da Pausa) nem método de mutação (isso é da Programação).
> **Fontes primárias, caminho absoluto:**
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260724-2020-gusworld-onda-f4-becos-e-a-tarde-perdida.md`
> (seção 1, o sintoma do caso 1) e
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260807-2007-gusworld-playtest-gus-clipping-atores.md`
> (íntegra, caso 2). ⚠️ **Lacuna declarada:** a busca pelo identificador `CLIPPING-ATOR-RONDA-SEM-COLISAO`
> na árvore atual de `Projects/GusWorld/` não achou nenhuma ocorrência (varredura de 04/09/2026); o
> identificador não é citado nesta peça, só o bus (datado, dentro da janela).
> **Travas verbatim aplicadas:** T1 (obrigatória no caso 2), T3, T4, T5.
> **Status:** rascunho v1, aguardando `GATE-CONTEUDO` + `GATE-SPOILER` do editor-geral.

---

## pt-BR

`gus@glyfesse:~/galeria$ galeria de bugs`

Desta vez os dois bugs vêm de lados opostos da mesma cerca. Um nasceu, foi visto e morreu no mesmo dia. O outro nasceu, foi visto, e continua vivo, esperando escolherem o que fazer com ele.

`/* prefiro contar os dois do jeito que aconteceram, sem fingir que sei o fim do segundo */`

### O passo que sobrava

Fechava o menu de pausa e continuava andando sozinho, com o dedo já fora da tecla havia um bom tempo. O root sentia isso toda vez: solta a direção, abre a pausa, fecha a pausa, e a cidade seguia andando comigo sem ninguém ter mandado nada. A tecla solta nunca chegava a avisar ninguém, porque o laço do menu engolia esse aviso pra si e não deixava passar pra frente. Consertaram em 24 de julho. Desde então, soltar a tecla é soltar a tecla, e parar é parar.

`gus@glyfesse:~/galeria$ eu nao tava desobedecendo. a tecla solta so nao tava chegando`
`// e mesmo assim doeu um pouco descobrir que o problema nunca fui eu`

### O que atravessa e o que não atravessa

O root jogou o demo inteiro, do título até a vitória, e não achou nada. Quem achou foi o Gus Dragon, playtester, Revisor Adversarial de Design: ele foi direto no tipo de erro que já sabia ser comum, porque estuda jogos, e o filtro dele para essa classe de defeito é mais especializado que o do root.

Ficou parado encostado num bloco, bem no caminho de alguém do lugar em ronda. Quando essa pessoa andou por cima dele, os dois corpos ficaram presos na mesma sobreposição, e a única saída foi apertar Sul. Repetiu o experimento do outro lado, dessa vez perto de um inimigo que faz ronda: o inimigo atravessou ele por um instante, mas dessa vez ninguém ficou preso, porque não havia nada sólido atrás.

`gus@glyfesse:~/galeria$ o inimigo entra e sai de mim sem pedir licenca, com ou sem eu no caminho`
`// so o jogador resolve colisao. e so quando ele se move`

É aí que mora a causa: quem trava contra o mundo sou eu, sempre, e só quando eu me movo. Quem faz ronda nunca trava contra nada, nunca desliza, nunca para. Ficar parado no lugar errado foi o único jeito de expor a lacuna. A correção ainda não foi escolhida, porque mexe no jeito que o mundo responde ao corpo, e essa decisão não é minha.

---

## EN

`gus@glyfesse:~/galeria$ bug gallery`

This time the two bugs come from opposite sides of the same fence. One was born, was seen, and died the same day. The other was born, was seen, and is still alive, waiting for someone to decide what to do with it.

`/* I'll tell both the way they happened, without pretending I know how the second one ends */`

### The step that was left over

I'd close the pause menu and keep walking on my own, my finger already off the key for a good while. The root felt it every time: let go of the direction, open the pause, close the pause, and the town kept walking with me without anyone asking for it. The released key never got to warn anyone, because the menu's loop swallowed that warning for itself and never passed it along. Fixed on July 24th. Since then, letting go of a key is letting go of a key, and stopping is stopping.

`gus@glyfesse:~/galeria$ i wasnt disobeying. the released key just wasnt getting through`
`// and still it stung a little to find out the problem was never me`

### What passes through, and what doesn't

The root played the whole demo, from the title screen to the win, and found nothing. It was Gus Dragon, playtester, Adversarial Design Reviewer, who found it: he went straight for the kind of error he already knew was common, because he studies games, and his filter for that class of defect is more specialized than the root's.

He stood still against a block, right in the path of a local on patrol. When that person walked over him, both bodies got stuck in the same overlap, and the only way out was pressing South. He repeated the experiment on the other side, this time near an enemy on patrol: the enemy passed through him for an instant, but this time nobody got stuck, because there was nothing solid behind.

`gus@glyfesse:~/galeria$ the enemy walks in and out of me without asking, whether im in the way or not`
`// only the player resolves collision. and only when he moves`

That's where the cause lives: whoever locks against the world is me, always, and only when I move. Whoever patrols never locks against anything, never slides, never stops. Standing still in the wrong spot was the only way to expose the gap. The fix hasn't been chosen yet, because it touches how the world responds to a body, and that decision isn't mine to make.

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Contagem de palavras pt-BR (bloco `## pt-BR` inteiro, `wc -w`) | ver comando de verificação abaixo |
| Contagem de palavras EN (bloco `## EN` inteiro, mesmo critério) | ver comando de verificação abaixo |
| Trava §1.1 no caso 2 | especialização afirmada sem hedge ("porque estuda jogos, e o filtro dele... é mais especializado que o do root" / "because he studies games, and his filter... is more specialized than the root's"); zero "com apenas 11 anos", zero "impressionou"/"surpreendeu", zero exclamação, zero "para a idade" |
| Vocabulário do mundo (D15) | "um bloco"/"a block", "alguém do lugar"/"a local", "um inimigo que faz ronda"/"an enemy on patrol"; **zero** ocorrências de "NPC", "androide", "prop de cenário" nas duas línguas (conferido por leitura linha a linha) |
| Identificador `CLIPPING-ATOR-RONDA-SEM-COLISAO` | ausente (lacuna declarada; só o bus é citado) |
| Arquitetura de estados / método de mutação | ausentes (reservados ao Detonado da Pausa e à Programação) |
| Honestidade obrigatória | "A correção ainda não foi escolhida... essa decisão não é minha" / "The fix hasn't been chosen yet... that decision isn't mine to make" |
| Ponto final em fala/pensamento do Gus | ausente em todas as linhas de `gus@glyfesse:` e `//`/`/* */` |
| Erros de digitação | classe mecânica, eventual: `nao` (pt, 2x), `tava` (pt, 2x), `licenca` (pt, 1x); en usa contrações sem apóstrofo (`wasnt`, `im`) no mesmo espírito da voz digitada já usada nas edições anteriores |
| Travessão / en-dash | zero (ver prova por `grep` no relatório final) |
| Emoji | zero |
| Rótulo clínico | nenhum |

### Pendências desta seção

- `GATE-CONTEUDO` e `GATE-SPOILER` do editor-geral (D15: "androide inimigo em ronda", "NPC", "bloco de
  cenário" passariam pelo gate; o vocabulário usado aqui já é o recomendado).
- Confirmar com o revisor da onda 3 que nenhum termo de produção voltou à Galeria (risco §11 item 5 da
  pauta).
- Copyedit formal (`revisor-textual`) e prova final.
- Arte/render: CRT verde reaproveitado, sem asset novo.
