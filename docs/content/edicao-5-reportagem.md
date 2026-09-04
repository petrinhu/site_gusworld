# Glyfesse #5: Reportagem de capa (rascunho v1)

> A peça-mãe da Edição #5 ("O Que Parecia Conferido"). **Voz: Gus-editor, técnico** (D1 decidida
> pelo líder em 04/09/2026: nomeia M8, Godot, C# e o submódulo `engine/` pelo nome; é seção
> técnica, e a L-25 vale para a ficção, não para esta seção).
> **Angle statement:** em três movimentos datados (apagar, conferir, medir), o mês em que a
> checagem cuidadosa aconteceu do lado errado da cerca, terminando no único número da edição que
> ninguém precisou acreditar, porque foi contado.
> **Janela no primeiro parágrafo (D11):** "de 22 de julho a 7 de agosto de 2026".
> **Duas cercas que D1 não abre:** não cita a refundação dos repositórios (21/08, matéria
> reservada) nem o serviço de hospedagem da época; a trava §1.1 vale dentro da Reportagem.
> **Cortes obrigatórios (§5 da pauta):** sem mecânica de submódulo, sem citar `// ADAPTACAO`
> (Cemitério); sem código, `strace`, nome de variável (Programação); sem a anatomia da colisão, as
> duas metades (Galeria); a falha do elenco entra abstrata, sem descrever nenhum personagem, com a
> frase do custo (D12); sem narrar o menu, o verbatim de 22/07 ou a arte nova (é da caixa, ao fim
> deste arquivo em peça própria: `edicao-5-reportagem-menu.md`).
> **Status:** rascunho v1 do `narrative-writer` (2026-09-04), aguardando `GATE-CONTEUDO` do
> editor-geral, `GATE-SPOILER` na falha do elenco e `GATE-CAPA`.

---

## pt-BR

`gus@glyfesse:~/reportagem$ reportagem de capa`

### Três movimentos, um número

De 22 de julho a 7 de agosto de 2026, o mês teve três movimentos: tirar um jogo antigo de baixo do novo, conferir se o que sobrou continuava de pé, e por fim medir o que ficou. Cada um respondeu uma pergunta diferente. Nenhum deles deu a resposta que se esperava.

Na quarta-feira, 22 de julho, fechou o M8: o marco que tirou o Godot e o C# de dentro do projeto. Saíram, na mesma tacada, cento e setenta e dois arquivos da pasta do jogo antigo, segundo o registro daquele dia, e o submódulo `engine/`, onde vivia a base em C# que sustentou o GusWorld de maio a julho. O trabalho foi feito com cuidado obsessivo por dentro do repositório: uma tag de segurança antes de mexer em qualquer coisa, um build do zero como prova de que nada tinha quebrado, verificação a cada fase. O que se perdeu não estava dentro desse alcance. Estava fora dele: o código C# original, hoje, ninguém consegue mais abrir. Nada funcional se perdeu, porque cada linha útil já tinha sido traduzida pra C++ meses antes, com teste cobrindo o comportamento. O que se perdeu foi o registro.

O mesmo 22 de julho também foi o dia de um achado do Gus Dragon sobre o menu inicial do jogo. É outra história, contada à parte, logo depois desta.

Dois dias depois, quinta e sexta, veio a parte de conferir. Em linguagem direta: a checagem que já existia olhava pra um lado, e o problema estava do outro.

Na quinta-feira, um analisador automático de código (a ferramenta que lê o programa procurando erro, sem precisar rodar nada) achou, em segundos, um travamento que a revisão humana mais rigorosa do projeto tinha deixado passar: usar, dentro do código, um pedaço de memória que já tinha sido esvaziado por outra parte do programa, como se ainda estivesse cheio. A revisão humana, que testa o projeto com sabotagem proposital e situação hostil, tinha coberto o erro óbvio (usar algo antes de ele existir). Não tinha coberto esse: usar algo depois de ele já ter sido esvaziado.

No mesmo par de dias, do lado do jogo, uma segunda checagem falhou. Alguém disse ter conferido a aparência de um elenco inteiro de personagens antes de mandar gerar a arte final deles. Não tinha conferido. O elenco saiu inteiro com a cara errada, e regerar custou de novo. Quando alguém tentou minimizar dizendo que não tinha custado dinheiro de verdade, a resposta foi direta: "claro que custou, pago mensalidade!". A lição que ficou não é sobre arte: é que custo de terceiro é custo, mesmo quando não aparece numa fatura nova.

Duas semanas depois, na sexta e no sábado, veio a parte de medir. No dia 7 de agosto, o root jogou o demo inteiro: título, cidade, o diálogo com o NPC Bertoldo, o combate, a vitória. Não achou nada fora do lugar.

Depois passou o controle para o Gus Dragon, playtester, Revisor Adversarial de Design, jogar em pessoa. Ele achou dois problemas de colisão. A causa não foi sorte, nem outro jeito de jogar: ele estuda jogos, e o filtro dele para esse tipo de defeito é mais especializado que o do root. Ele já foi buscando esses erros, porque sabia que aquela classe de erro é comum. Tanto que encontrou.

No dia seguinte, ele perguntou quantas linhas de código o projeto tinha. A resposta não foi estimada: foi contada, na hora, direto do repositório. Cerca de 163 mil linhas ao todo. E o detalhe que fecha a conta: o código de teste, 78.200 linhas, é mais que o dobro do código do próprio jogo, 62.700.

Um jogo que ninguém tinha medido virou um número que ninguém precisou acreditar, porque foi contado. E foi contado no mesmo mês em que a checagem cuidadosa passou boa parte do tempo olhando para o lado errado da cerca.

---

## EN

`gus@glyfesse:~/reportagem$ cover story`

### Three movements, one number

From July 22nd to August 7th, 2026, the whole month had three movements: pulling an old game out from under the new one, checking whether what was left was still standing, and finally measuring what remained. Each one answered a different question. None of them gave the answer anyone expected.

On Wednesday, July 22nd, M8 closed: the milestone that took Godot and C# out of the project for good. In one sweep, according to that day's record, one hundred seventy two files left the old game's folder, along with the `engine/` submodule, where the C# foundation that had carried GusWorld from May to July used to live. The work was done with obsessive care inside the repository: a safety tag before touching anything, a build from scratch as proof nothing had broken, verification at every phase. What got lost was not inside that reach. It was outside it: the original C# code, today, nobody can open anymore. Nothing functional was lost, because every useful line had already been translated to C++ months earlier, with tests covering the behavior. What got lost was the record.

That same July 22nd was also the day of a find by Gus Dragon about the game's main menu. That is another story, told separately, right after this one.

Two days later, Thursday and Friday, came the checking part. In plain terms: the check that already existed was looking one way, and the problem was on the other.

On Thursday, an automated code analyzer (the tool that reads a program looking for errors, without needing to run anything) found, in seconds, a crash that the project's toughest human review had let through: using, inside the code, a piece of memory that had already been emptied by another part of the program, as if it were still full. The human review, which tests the project with deliberate sabotage and hostile conditions, had covered the obvious error (using something before it exists). It had not covered this one: using something after it had already been emptied.

In that same pair of days, on the game's side, a second check failed. Someone said they had checked the appearance of an entire cast of characters before sending the final art off to be generated. They had not. The whole cast came back with the wrong face, and regenerating it cost again. When someone tried to soften it by saying it hadn't cost real money, the answer was direct: "of course it cost, I pay a subscription!" The lesson that stuck is not about art: it's that a third party's cost is still a cost, even when it never shows up as a new charge.

Two weeks later, on Friday and Saturday, came the measuring part. On August 7th, root played the whole demo: the title screen, the city, the conversation with NPC Bertoldo, combat, the win. Found nothing out of place.

Then handed the controller to Gus Dragon, playtester, Adversarial Design Reviewer, to play in person. He found two collision problems. The cause was not luck, nor a different way of playing: he studies games, and his filter for that kind of defect is more specialized than root's. He had already gone looking for those errors, because he knew that class of bug was common. And that is why he found it.

The next day, he asked how many lines of code the project had. The answer was not estimated: it was counted, on the spot, straight from the repository. About 163 thousand lines in total. And the detail that closes the count: the test code, 78,200 lines, is more than double the game's own code, 62,700.

A game nobody had measured turned into a number nobody needed to take on faith, because it was counted. And it was counted in the same month the careful checking spent most of its time looking at the wrong side of the fence.

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho pt-BR | 10 parágrafos de prosa (mais o `### ` de abertura), dentro do alvo L (9 a 12) |
| Janela no primeiro parágrafo | ✅ "De 22 de julho a 7 de agosto de 2026" abre o texto (D11) |
| Nome de tecnologia real | M8, Godot, C#, `engine/` (autorizados por D1); nenhum outro nome de biblioteca, engine de terceiro ou ferramenta específica |
| Refundação dos repositórios / serviço de hospedagem | nenhuma menção, nem de passagem (T3) |
| Retirada da biblioteca de interface (04/08) | nenhuma menção (T3, D14) |
| Mecânica de submódulo (tag, ponteiro) | não explicada aqui (fica para o Cemitério) |
| `// ADAPTACAO` | não citado |
| Código, `strace`, nome de variável | nenhum; o crash é descrito em prosa leiga ("pedaço de memória já esvaziado"), sem "ponteiro nulo" nem trecho de código |
| Anatomia da colisão (as duas metades) | não descrita; a Reportagem só diz "dois problemas de colisão" |
| Personagem da party descrito | nenhum (nem cabelo, nem armadura, nem nome do personagem) |
| Frase do custo (D12) | citada verbatim: "claro que custou, pago mensalidade!" |
| Trava §1.1 | afirmada sem hedge no bloco 3 ("a causa não foi sorte, nem outro jeito de jogar", "ele já foi buscando esses erros"); nenhum "para a idade", nenhuma exclamação, nenhum elogio de orgulho paterno |
| Crédito duplo do Gus Dragon | "Gus Dragon, playtester, Revisor Adversarial de Design" / "Adversarial Design Reviewer", citado uma vez, por extenso |
| Meia frase apontando para a caixa (§5.4) | ✅ um parágrafo curto, sem narrar o achado |
| Número "172 arquivos" | citado como "segundo o registro daquele dia" (recomendação da lacuna §15 item 1 da pauta, já que a árvore atual do jogo não corrobora nem desmente o número) |
| Fecho de duas frases com o número | ✅ último parágrafo |
| Travessão / en-dash | nenhum, nos dois idiomas |
| Rótulo clínico / nome de batismo | nenhum |
| Emoji | nenhum |

### Onde a fonte sustentou cada bloco

- Bloco 1 (22/07): `gusworld_ia_autocomm/archive/20260722-1706-gusworld-obituario-foundation-csharp.md`,
  íntegra. O número "172 arquivos" vem da pauta (§10.1, linha do ledger), não deste arquivo em si
  (o obituário não lista a contagem de arquivos); mantive a ressalva "segundo o registro daquele
  dia" por isso.
- Bloco 2 (23-24/07): `.../20260723-0820-glintfx-protecao-pela-metade.md` (ATO 4, a citação do
  crash e a frase "o linter achou o crash que o revisor adversarial não achou" é o fio da lente,
  reescrito em prosa leiga) e `.../20260723-2135-gusworld-falha-party-sprites-fonte-errada.md` (a
  falha do elenco e a frase "claro que custou, pago mensalidade!", conferida verbatim na fonte).
- Bloco 3 (07-08/08): `.../20260807-2007-gusworld-playtest-gus-clipping-atores.md` (quem jogou o
  quê, verbatim: *"Hoje o lider rodou o demo do jogo [...] e depois passou o controle para o Gus
  Dragon jogar em pessoa"*) e `.../20260808-1343-gusworld-pergunta-gus-linhas-de-codigo.md` (a
  contagem: 163 mil, 62.700 de jogo, 78.200 de teste, conferidos verbatim). A frase da trava §1.1
  ("O filtro dele como estudioso de jogos é mais especializado que o meu") é fato registrado pelo
  líder em 04/09/2026, citado na pauta §1 item 3 e §12 D13, não num arquivo do bus.

### Um ponto que a fonte não resolveu sozinho

A fonte de 07/08 chama o segundo NPC do experimento de "um androide inimigo em ronda". A Galeria de
Bugs (peça fora do escopo deste brief) usa vocabulário do mundo por decisão D15; esta Reportagem
não precisou nomear o tipo de ator porque o corte obrigatório já pede "dois problemas de colisão"
sem anatomia, então a divergência de vocabulário entre as duas peças não chegou a aparecer aqui.
Registrado para o revisor da onda 3 conferir que a Galeria, ao narrar o mesmo episódio com mais
detalhe, use "um inimigo que faz ronda" e não o termo de produção da fonte.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- `GATE-SPOILER` na falha do elenco (nenhuma aparência de personagem escapou por paráfrase, mas
  peço checagem do `compliance-legal` mesmo assim, como o brief exige).
- `GATE-CAPA`: print em 390px com o título de 23 caracteres, fora do escopo textual deste
  documento.
- Copyedit formal (`revisor-textual`) e prova final.
