# Glyfesse #3 — Seção de Programação (rascunho v1)

> O eixo expert da Edição #3. **Voz: `root@glyfesse`** (o criador; nunca nomeado). Estrutura canônica:
> intro acessível + desculpa furada → transição `//` → CRT `nano` → parte técnica com subtópicos → `//by:`.
> **Lente aprovada (S1 GATE-LENTE):** a decisão de trocar a base da parte visual **um dia depois de
> escolhê-la**, pela lente da pergunta que o leigo também faz — *como é que se joga fora uma fundação sem
> perder o trabalho inteiro?* —, cortando a emoção e o arco.
> **Datas:** 21 a 23/jun/2026. Nada posterior; a lib gráfica própria do projeto ainda não existia.
> **Desculpa furada desta edição:** *"já quebrei a fundação duas vezes em dois dias, não sobrou nada que
> eu possa estragar mais"*. ⚠️ Formato apresentado como bloco de terminal — **ver ponto em aberto**.
> **Status:** rascunho v1 do `technical-writer` (2026-08-03), aguardando `GATE-CONTEUDO` do editor-geral.
> Copyedit formal (`revisor-textual`) + prova vêm depois.

---

## pt-BR

Quantas vezes uma casa pode trocar de alicerce antes de cair? A resposta honesta é: depende de quanto da casa está apoiada nele. Se as paredes, o telhado e a fiação foram construídos amarrados no alicerce, a resposta é zero. Se foram construídos sem nem saber que o alicerce existe, a resposta é: quantas vezes for preciso, e num dia útil.

Em 22 de junho de 2026, às 23h34, a base do desenho de tela do GusWorld foi trocada. Não a arte, não o jogo — a peça de software que abre a janela e pinta os pixels nela. Ela tinha sido escolhida **um dia antes**. O registro dessa troca é um arquivo chamado ADR-008, e a linha mais importante dele não fala de biblioteca nenhuma: fala do que **não** precisou ser mexido.

Daqui a três parágrafos isto vira técnico de verdade — com nomes de biblioteca, contagem de testes e tabela. Antes disso, uma pergunta que quase ninguém faz e que é a matéria inteira: **como é que se joga fora uma fundação sem perder o trabalho inteiro?**

```
root@glyfesse:~$ whoami
root
root@glyfesse:~$ # a essa altura já quebrei a fundação duas vezes em dois dias.
root@glyfesse:~$ # não sobrou nada aqui dentro que eu possa estragar mais do que já estraguei.
root@glyfesse:~$ # logo: usar root pra escrever revista é risco zero.
root@glyfesse:~$ # ...isso é exatamente o contrário de como risco funciona. eu sei.
root@glyfesse:~$ # o argumento é ruim. o commit é bom. seguimos.
```

//Prezado leitor, daqui por diante é parte técnica real de documentação histórica do código do jogo.
//root@glyfesse

```
root@glyfesse:~/programacao$ nano adr-008.md
```

### Contexto: o que estava em jogo em 21 e 22 de junho de 2026

Em **21/jun/2026** o projeto abandonou o motor de jogo pronto que vinha usando — motor pronto é um pacote que já traz janela, desenho, física e editor — e passou a escrever engine própria em **C++20** (a versão de 2020 da linguagem C++), com **Qt6** encarregado da camada de janela e desenho.

Em **22/jun/2026, às 23h34**, o Qt6 saiu e entrou o **SDL3**. Um dia de diferença. A decisão está registrada no **ADR-008** — ADR é *Architecture Decision Record*, um documento curto que registra uma decisão de arquitetura, o motivo dela e o preço aceito, para que ninguém precise adivinhar seis meses depois por que as coisas são como são.

### O risco que o Qt6 trazia

O Qt6 funcionava. O problema não era desempenho nem qualidade: era **onde** a solução se apoiava. O caminho adotado dependia de uma peça **semi-privada** da biblioteca — uma API (o conjunto de funções que o programador tem permissão para chamar) que existe, está lá, funciona, mas **não tem garantia pública de continuar existindo**. Não é contrato: é cortesia.

Fundação apoiada em cortesia é dívida com data de vencimento marcada — e ninguém sabe a data. Pode vencer na próxima versão da biblioteca, pode vencer em 2031. A diferença entre pagar essa dívida em junho de 2026, com o projeto novo, e pagá-la depois, com o jogo inteiro em cima, é a diferença entre um dia e um trimestre.

### Onde o SDL3 ganhou

| Critério | Qt6 | SDL3 |
|---|---|---|
| Base da solução | peça semi-privada, sem garantia pública | superfície pública, estável |
| Controle do que acontece na tela | intermediado pelo framework | direto, explícito |
| Tamanho do programa final | maior | menor |
| Caminho para console | não abria | abria |

Três ganhos concretos: **controle** — menos camadas decidindo por conta própria entre o código e a tela; **tamanho** — o programa entregue ao jogador fica menor; e um **caminho para console**, que o outro simplesmente não abria.

### Por que custou pouco: a resposta da pergunta lá de cima

Aqui está a matéria.

A parte do jogo **que pensa** — as regras, o combate, a colisão, a progressão — foi construída **sem saber quem desenha a janela**. Ela não conhece o nome de nenhuma biblioteca gráfica. Não existe, dentro dela, uma linha sequer escrita em Qt6 ou em SDL3. Ela decide *"este golpe tira tanto"*, *"este corpo não passa por esta parede"*, *"este nível abriu"* — e entrega a decisão pronta para quem quer que esteja encarregado de mostrar.

Consequência direta: quando a camada que desenha foi **inteiramente substituída**, a camada que pensa **não precisou ser tocada**. É por isso que a linha mais importante do registro daquele dia é esta, verbatim:

> *"a lógica pura (core/domain, ~590 testes) fica INTACTA"*

Teste automatizado é um programa pequeno que roda o código de verdade e confere se o resultado bate com o esperado — se alguém quebra a regra sem perceber, o teste acusa em segundos. Havia **~590** deles cobrindo a camada que pensa. Depois da troca de fundação, os mesmos ~590 continuaram valendo, **sem alteração**, porque nenhum deles jamais soube quem estava desenhando.

E o número que fecha o argumento: **no mesmo commit da troca, a suíte foi de 685 para 752 testes passando**.

| Momento | Testes passando |
|---|---|
| Antes do commit da troca | 685 |
| Depois do commit da troca | 752 |

Repare no sinal. Trocar a fundação **não derrubou** a contagem: subiu 67. A camada nova entrou com verificação própria em cima, e a antiga continuou de pé. Não é sorte — é o retorno de ter separado, desde o começo, **o que decide** do **que mostra**. Foi isso que fez a troca custar um dia em vez de um mês.

### O custo que foi aceito

Nada disto sai de graça. O preço aqui foi **uma segunda porta sem volta no mesmo mês**: duas trocas de fundação em dois dias, com o retrabalho e o risco que isso carrega.

Trocar de fundação é barato quando a casa é nova. Cada semana que passa, cada tela nova, cada sistema novo apoiado na camada de desenho encarece a próxima troca — de forma silenciosa, sem aviso, até o dia em que "trocar" deixa de ser uma opção de fim de semana e vira um projeto próprio.

A decisão de 22/jun foi tomada **sabendo disso**. Não foi impulso: foi a leitura de que aquele era o momento mais barato que existiria, e que empurrar a conta para frente só aumentaria o valor. É o cálculo mais chato da engenharia, e o único que envelhece bem.

//by: root@glyfesse

---

## EN

How many times can a house change its foundation before it falls down? The honest answer: it depends on how much of the house is resting on it. If the walls, the roof and the wiring were built tied into the foundation, the answer is zero. If they were built without even knowing the foundation exists, the answer is: as many times as needed, and inside one working day.

On 22 June 2026, at 23:34, GusWorld's screen-drawing base was swapped out. Not the art, not the game — the piece of software that opens the window and paints pixels into it. It had been chosen **one day earlier**. The record of that swap is a file called ADR-008, and its most important line mentions no library at all: it's about what did **not** have to be touched.

Three paragraphs from now this turns properly technical — library names, test counts, tables. Before that, a question almost nobody asks, and which is the whole story: **how do you throw away a foundation without losing all the work on top of it?**

```
root@glyfesse:~$ whoami
root
root@glyfesse:~$ # by now I've broken the foundation twice in two days.
root@glyfesse:~$ # there's nothing left in here I could damage more than I already have.
root@glyfesse:~$ # therefore: using root to write a magazine is zero risk.
root@glyfesse:~$ # ...that is the exact opposite of how risk works. I know.
root@glyfesse:~$ # the argument is bad. the commit is good. moving on.
```

//Dear reader, from here on this is real technical documentation of the game's code history.
//root@glyfesse

```
root@glyfesse:~/programacao$ nano adr-008.md
```

### Context: what was at stake on 21 and 22 June 2026

On **21 Jun 2026** the project dropped the off-the-shelf game engine it had been using — an off-the-shelf engine is a package that hands you window, drawing, physics and editor in one box — and started writing its own engine in **C++20** (the 2020 revision of the C++ language), with **Qt6** in charge of the windowing and drawing layer.

On **22 Jun 2026, at 23:34**, Qt6 was out and **SDL3** was in. One day apart. The decision lives in **ADR-008** — an ADR is an *Architecture Decision Record*, a short document that captures an architectural decision, the reasoning behind it and the price accepted, so nobody has to guess six months later why things are the way they are.

### The risk Qt6 carried

Qt6 worked. The problem was neither performance nor quality: it was **what the solution rested on**. The chosen path depended on a **semi-private** piece of the library — an API (the set of functions a programmer is allowed to call) that exists, is right there, works, but carries **no public guarantee that it will keep existing**. That's not a contract; that's a courtesy.

A foundation resting on courtesy is debt with a due date already set — and nobody knows the date. It might come due in the next release of the library, or in 2031. The difference between paying that debt in June 2026, with the project brand new, and paying it later, with the whole game sitting on top, is the difference between one day and one quarter.

### Where SDL3 won

| Criterion | Qt6 | SDL3 |
|---|---|---|
| What the solution rests on | semi-private piece, no public guarantee | public, stable surface |
| Control over what hits the screen | mediated by the framework | direct, explicit |
| Size of the shipped program | larger | smaller |
| Path to console | closed | open |

Three concrete wins: **control** — fewer layers making decisions on their own between the code and the screen; **size** — the program handed to the player comes out smaller; and a **path to console**, which the other option simply did not open.

### Why it cost so little: the answer to the question above

Here is the story.

The part of the game **that thinks** — the rules, combat, collision, progression — was built **without knowing who draws the window**. It knows the name of no graphics library. There isn't a single line of Qt6 or SDL3 inside it. It decides *"this hit takes this much"*, *"this body does not pass through this wall"*, *"this level just opened"* — and hands the finished decision to whoever happens to be in charge of showing it.

Direct consequence: when the drawing layer was **entirely replaced**, the thinking layer **did not have to be touched**. That is why the most important line in that day's record is this one, verbatim:

> *"a lógica pura (core/domain, ~590 testes) fica INTACTA"*
> ("the pure logic (core/domain, ~590 tests) stays INTACT")

An automated test is a small program that runs the real code and checks the result against what was expected — if someone breaks a rule without noticing, the test says so within seconds. There were **~590** of them covering the thinking layer. After the foundation swap, those same ~590 still held, **unchanged**, because not one of them ever knew who was doing the drawing.

And the number that closes the argument: **in the same commit as the swap, the suite went from 685 to 752 passing tests**.

| Moment | Passing tests |
|---|---|
| Before the swap commit | 685 |
| After the swap commit | 752 |

Note the sign. Swapping the foundation did **not** knock the count down: it went up by 67. The new layer arrived with verification of its own on top, and the old count stayed standing. That's not luck — it's the payoff of having separated, from the start, **what decides** from **what shows**. That is what made the swap cost a day instead of a month.

### The cost that was accepted

None of this comes free. The price here was **a second one-way door in the same month**: two foundation swaps in two days, with all the rework and risk that carries.

Swapping a foundation is cheap while the house is new. Every week that passes, every new screen, every new system leaning on the drawing layer makes the next swap more expensive — quietly, without warning, until the day "swap it" stops being a weekend option and becomes a project of its own.

The 22 Jun decision was made **knowing that**. It wasn't impulse: it was the reading that this was the cheapest moment there would ever be, and that pushing the bill forward would only raise the number. It's the dullest calculation in engineering, and the only one that ages well.

//by: root@glyfesse

---

## Notas de produção

### Conferências do integrador (feitas, não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho pt-BR | **~940 palavras** (731 só de prosa corrida; a #2 teve 879 no total) |
| Estrutura canônica | os 5 blocos, na ordem: intro (3 parágrafos) → desculpa furada → transição `//` → CRT `nano` → técnica com `###` → `//by:` |
| Formato novo do prompt | ✅ `root@glyfesse:~/programacao$ nano adr-008.md`, caminho sem acento |
| Aritmética | 752 − 685 = **67** ✅ (o texto afirma "subiu 67") |
| Cronologia | para em 23/jun; **nenhuma** menção à lib gráfica própria (que ainda não existia) |
| Desculpa furada | **nova**, não repete a da #2 ("open source, não tenho o que esconder") |
| Spoiler do antagonista | **ausente** ✅ — a variante proibida não foi usada |
| Rótulo clínico / "estuda muito" | nenhum |
| Profanidade | zero |

### ✅ Um defeito encontrado e corrigido pelo integrador

A versão **EN** voltou do escritor com as **duas linhas de transição `//` ainda em português**. Corrigido
para a forma que a #2 já usava: *"//Dear reader, from here on this is real technical documentation of the
game's code history."* O `//root@glyfesse` não se traduz (é assinatura).

### ⚠️ Um ponto que o integrador NÃO decide (vai ao editor-geral)

**O formato da "desculpa furada" mudou sem autorização.** Na #2 ela é **prosa corrida**, começando com a
linha de prompt embutida no parágrafo:

> `root@glyfesse>` Sim, eu montei a revista inteira logado como root, e não, não vou me defender direito.
> Antes que perguntem: todo o meu código é open source […] A lógica não fecha, eu sei […]

Nesta edição o escritor entregou um **bloco de terminal** com `whoami` e comentários `#`, que é um device
diferente — mais visual e mais seco, e casa com a estreia do formato novo de prompt, mas **quebra a
continuidade** com a #1 e a #2. **Opções:** (a) manter o bloco de terminal, assumindo que a #3 estreia
também esse tratamento; (b) reescrever como prosa, no molde da #2; (c) manter o bloco **e** aplicar
retroativamente no layout das anteriores (mais caro).

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral (inclusive o ponto acima).
- Copyedit formal (`revisor-textual`) e prova final.
- **Arte/render:** o CRT de fósforo verde digitando ainda não foi produzido.
