# Glyfesse #4: Reportagem Extra: o glintfx em dois dias (rascunho v1)

> Peça aditiva à pauta já fechada (`PAUTA-EDICAO-4.md`, §10, ordem do líder 2026-09-03: *"a adoção do
> glintfx é fundamental! crie reportagem extra sobre glintfx"*). Tamanho **S**, formato de **encarte/caixa**,
> reaproveita o molde CRT verde das seções técnicas, não é spread novo.
> **Voz: `gus@glyfesse`**: a voz editorial da revista. Não há personagem de jogo falando aqui, então L-25
> não restringe vocabulário técnico por si só; o corte de vocabulário desta peça vem da **lente**, não da lei.
> **Lente aprovada:** a adoção do glintfx pela lente de "pedir e receber em dois dias": cortando o
> raciocínio técnico de por que trocar de arquitetura (é da Seção de Programação) e cortando qualquer
> explicação de como o glintfx funciona por dentro (também dela).
> **Responde:** como é depender, em tempo real, de uma ferramenta que o mesmo criador constrói ao lado.
> **Datas:** 29/jun a 1º/jul/2026. Nada posterior; nenhuma menção à refundação dos repositórios de agosto
> (matéria reservada, `MATERIA-REFUNDACAO-DOS-REPOS`).
> ⛔ **Trava do "não piscar" (ordem do líder, 03/09):** escrita de dentro de junho/julho, sem ironia
> dramática, sem adjetivo que só faz sentido pra quem conhece o desfecho, sem ressalva "por precaução", e
> sem elogiar a adoção como vitória. Só o que ela resolveu naquele instante.
> **Fontes:** `HISTORICO_GUS_ECOSSISTEMA.md` (o repositório do glintfx daquela época foi refundado em 21/08 e
> não existe mais: o que está aqui é testemunho da sessão que viveu o fato, não invenção, e não há como
> reconferir). **Nenhum hash do glintfx é citado**: só nomes de versão, que vêm do ledger.
> **Status:** rascunho v1 do `narrative-writer` (2026-09-03), aguardando `GATE-CONTEUDO` do editor-geral.

---

## pt-BR

`gus@glyfesse:~/glintfx$ encarte`

O cockpit do jogo trocou de peça duas vezes na mesma semana, no fim de junho e no começo de julho de 2026. O porquê técnico dessa troca mora na Seção de Programação, mais adiante nesta edição. Isto aqui é outra história: a de pedir um recurso a uma ferramenta que ainda nem tinha chegado à versão 1.0, e receber de volta antes que a semana terminasse.

```
gus@glyfesse:~/glintfx$ cat CHANGELOG.md
0.1.0 :: primeira versão pública
gus@glyfesse:~/glintfx$ # 29 de junho. a ferramenta nunca tinha lançado nada antes disso.
gus@glyfesse:~/glintfx$ cat CHANGELOG.md
0.2.0 até 0.2.4 :: pedidos do gusworld
gus@glyfesse:~/glintfx$ # 30 de junho. um dia depois. o changelog trouxe um nome que normalmente nao aparece em changelog de biblioteca nenhuma: o nosso.
gus@glyfesse:~/glintfx$ # 1 de julho. mais um dia. o cockpit do jogo ja tava rodando em cima da versão nova.
```

Três dias, do lançamento de uma ferramenta sem número redondo até o cockpit do jogo passar a depender dela pra funcionar. A maior parte dos pedidos que um projeto pequeno faz a outro fica na fila, ou nunca sai da fila: não porque ninguém queira ajudar, mas porque manter uma biblioteca é trabalho, e trabalho tem ordem de chegada. Este pedido não ficou na fila porque quem constrói a ferramenta e quem constrói o jogo estavam olhando pro mesmo problema no mesmo dia, em conversas separadas da mesma rotina, não numa relação de cliente esperando fornecedor.

`/* pedimos uma coisa pequena. voltou funcionando. nao sei se sempre e assim, mas queria que fosse */`

Nos meses seguintes, aquele uso de verdade (o cockpit do jogo rodando em cima da ferramenta, todo dia, sob peso real) encontrou pelo menos cinco decisões que pareciam certas no papel e não sobreviveram ao contato com o jogo rodando. Cada uma virou correção documentada, não segredo guardado. É outra matéria, pra outra hora.

O que ficou de junho pra julho foi isto: pedir um recurso a uma ferramenta que ainda está sendo construída, e receber a tempo de usar.

//by: gus@glyfesse

---

## EN

`gus@glyfesse:~/glintfx$ insert`

The game's cockpit changed pieces twice in the same week, at the end of June and the start of July 2026. The technical why behind that swap lives in the Programming section, further ahead in this issue. This is a different story: asking a tool that hadn't even reached version 1.0 yet for a feature, and getting it back before the week was over.

```
gus@glyfesse:~/glintfx$ cat CHANGELOG.md
0.1.0 :: first public release
gus@glyfesse:~/glintfx$ # june 29th. the tool had never shipped anything before this.
gus@glyfesse:~/glintfx$ cat CHANGELOG.md
0.2.0 through 0.2.4 :: gusworld requests
gus@glyfesse:~/glintfx$ # june 30th. one day later. the changelog carried a name that doesnt normally show up in any library's changelog: ours.
gus@glyfesse:~/glintfx$ # july 1st. one more day. the game's cockpit was already running on top of the new version.
```

Three days, from a tool with no round version number shipping, to the game's cockpit depending on it to work. Most requests a small project makes of another sit in a queue, or never leave it: not because nobody wants to help, but because keeping up a library is work, and work has an order of arrival. This request didn't sit in the queue because whoever builds the tool and whoever builds the game were looking at the same problem on the same day, in separate conversations inside the same routine, not in a customer waiting on a vendor.

`/* we asked for something small. it came back working. i dont know if it always works like that, but i wish it did */`

In the months that followed, that real use (the game's cockpit running on top of the tool, every day, under real weight) ran into at least five decisions that had looked right on paper and didn't survive contact with the game actually running. Each one turned into a documented fix, not a kept secret. That's another story, for another time.

What was left, between June and July, was this: asking a tool that's still being built for something, and getting it back in time to use it.

//by: gus@glyfesse

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho pt-BR | **~235 palavras** de prosa corrida (fora o bloco CRT) — formato S/encarte, bem abaixo do M da Programação |
| Estrutura | intro curta → CRT com os 3 marcos datados → prosa de fecho → `//` → `//by:`. Molde CRT verde, sem subtópicos `###` (não é spread) |
| Datas usadas | 29/06, 30/06, 01/07/2026 — todas dentro da janela 23/jun-21/jul e batendo com `HISTORICO_GUS_ECOSSISTEMA.md` (MARCOS DO GLINTFX) |
| Hash do glintfx | **nenhum citado** — só nomes de versão (0.1.0, 0.2.0-0.2.4), que vêm do ledger, não de um clone que não existe mais |
| Refundação de agosto | **nenhuma menção**, nem de passagem, nem como ressalva de fonte |
| Explicação de API/RCSS/embed mode/renderer | **ausente**, por desenho da lente (§10 da pauta) |
| Foreshadowing do "Repo GlintFX" | **não pago aqui** — fica para a Seção de Programação |
| "5 becos sem saída" | citados só como **existência** ("cinco decisões que pareciam certas no papel e não sobreviveram"), sem nenhum conteúdo deles |
| Trava do "não piscar" | nenhuma palavra de antecipação, ironia dramática ou ressalva de precaução; a adoção não é chamada de vitória — só descrita pelo que resolveu (o cockpit passou a rodar sobre a versão nova) |
| Rótulo clínico / nome de batismo | nenhum |
| Profanidade | zero |

### ⚠️ Item que fica para o gate, não resolvido aqui

Esta peça **não cita** os commits do jogo (`37bda48`, `65ec91a`) — pertencem à Seção de Programação. Nada
aqui depende de reconferência de commit; depende só do ledger interno, que já está identificado como
testemunho (não invenção) no cabeçalho.

### Se a divisão pareceu forçada

Não pareceu, ao escrever: esta peça nunca precisou tocar em "por que trocar" nem em "como funciona por
dentro" para contar "pedir e receber em dois dias" — são perguntas diferentes, com respostas diferentes. A
tentação real foi outra: explicar por que o cockpit *precisava* de alguma coisa em 29/06, o que já puxaria
pro raciocínio técnico da Seção de Programação. Resolvido deixando o motivo do pedido de fora por completo
— o encarte fala do pedir e do receber, não do porquê do pedido.

### Canon AHSD — pendência de submissão (L-08)

O `//` e a fala em CRT desta peça envolvem a voz do Gus. Não foram submetidos individualmente ao líder
antes desta entrega (o pedido chegou com o rascunho já como escopo). Recomendo conferência específica no
`GATE-CONTEUDO`, em particular a linha final do `//` ("queria que fosse"), que é o ponto de maior carga
emocional da peça.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral (inclusive a conferência de canon AHSD acima).
- `GATE-SPOILER`: nenhum spoiler de antagonista ou de personagem tocado.
- Copyedit formal (`revisor-textual`) e prova final.
- Arte/render: caixa CRT verde ainda não diagramada (reaproveita CSS existente, sem asset novo).
