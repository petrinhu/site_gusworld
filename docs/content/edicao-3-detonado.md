# Glyfesse #3 — Detonado da Simulação (rascunho v1)

> **Seção NOVA, só nesta edição.** É a peça com mais formas de dar errado da #3.
> **Voz: Gus**, com uma linha final de `root`.
> **Lente aprovada, verbatim do criador:** *"não é seção de bugs. É apenas mostrar que o jogo está vivo."*
> **Enquadramento:** seção de **serviço, ATEMPORAL** — guia de "como isso funciona", não reportagem
> datada. É por isso que ela pode mostrar o estado de hoje sem furar a cronologia ascendente da revista.
> **Status:** rascunho v1 do `narrative-writer` (2026-08-03), aguardando `GATE-CONTEUDO` do editor-geral.
>
> ⚠️⚠️ **A trava que domina esta seção:** o termo censurado **nunca é escrito em arquivo rastreado**. O
> escritor **não recebeu** os termos e portanto **não podia** vazá-los; onde eles apareceriam há o token
> `▮▮▮`, **sempre idêntico**, para que a largura não entregue a contagem de letras. **A tarja é
> decorativa; a palavra não chega à página.**

---

## pt-BR

```
gus@glyfesse:~/detonado$ detonado da simulação
```

Antes de qualquer coisa: aqui não se briga em tempo real. Você não fica apertando botão o mais rápido que consegue e torcendo. Aqui a briga anda em **rodadas**.

Uma rodada é assim: cada lado tem a sua vez, e só age quando ela chega. O que ataca, ataca; termina; espera. Depois é a vez do outro. Ninguém age em cima de ninguém, e nada acontece enquanto você está pensando. Isso muda o tipo de esforço que o jogo pede: não é reflexo, é decisão. O tempo que você leva para escolher não custa nada. A escolha custa tudo.

E é por isso que a **ordem importa**. Se o que ataca age antes, ele mexe no estado do campo — e o que vem depois já encontra um campo diferente daquele que existia quando você planejou. A mesma ação, na vez errada, vira outra ação. Não porque ela mudou, mas porque o mundo em volta dela mudou primeiro.

Quem já entendeu essa parte, entendeu o suficiente. O resto é detalhe de regra e fica para outro dia.

Agora a parte que eu acho que interessa mais: como eu sei que isso tudo roda.

Existe uma bateria de testes que abre a tela de arena sozinha, sem ninguém olhando, e confere se cada peça faz o que promete. Ela roda toda vez que eu mexo em qualquer coisa. Trecho da saída de hoje, transcrito:

```
[arena] montando ▮▮▮ .............................. ok
[arena] ordem da vez respeitada em 3 lados ......... ok
[arena] ▮▮▮ não age fora da própria vez ............ ok
[arena] alvo inválido é recusado ................... ok
[arena] estado do campo depois da ação ............. ok
[arena] ▮▮▮ ........................................ ok
[arena] tela fecha sem deixar sujeira .............. ok

todos os testes: 2632/2632
```

As tarjas são minhas. Tem coisa ali que ainda não dá para mostrar.

O número final é o que vale: **2632/2632**. Nenhum vermelho.

Para dar tamanho a isso, um comparativo. Em 22 de junho de 2026, no dia em que o quadrado azul aprendeu a andar, a suíte inteira tinha **684** testes. Hoje tem **2632**. É quase quatro vezes mais. Deixo os dois números aí e cada um faz a conta que quiser.

Vale dizer o que esse número **não** é. Ele não diz que o jogo é bom, nem que é divertido, nem que está pronto. Diz uma coisa só, e é uma coisa pequena: o que já foi construído continua funcionando depois de eu ter mexido em outra parte. É pouco. Mas é o pouco que sustenta o resto.

Quem testa a mão de verdade é o Gus Dragon, que senta e joga. O Cauã "Volt" também dá palpite, do jeito dele. A bateria só garante que, quando eles sentam, a tela abre.

Fico contente quando dá verde. Fim.

O `root` mandou isto depois de uma rodada de teste:

```
root@glyfesse:~/detonado$ some ele da tela, some a moldura dele e a caixa de seleção. Sensação que correu tudo certo
```

---

## EN

```
gus@glyfesse:~/detonado$ walkthrough of the simulation
```

First thing: nothing here happens in real time. You don't sit there mashing a button as fast as you can and hoping. Here the fight moves in **rounds**.

A round works like this: each side gets its turn, and only acts when the turn comes. Whatever attacks, attacks; finishes; waits. Then it's the other side's turn. Nobody acts on top of anybody else, and nothing happens while you're thinking. That changes the kind of effort the game asks for: it isn't reflex, it's decision. The time you take to choose costs nothing. The choice costs everything.

Which is exactly why the **order matters**. If whatever attacks goes first, it changes the state of the field — and whatever comes next arrives at a field different from the one that existed when you planned. The same action, on the wrong turn, becomes a different action. Not because it changed, but because the world around it changed first.

If you got that part, you got enough. The rest is rule detail and can wait.

Now the part I think matters more: how I know all of this actually runs.

There's a test battery that opens the arena screen by itself, with nobody watching, and checks whether each piece does what it promises. It runs every time I touch anything. A slice of today's output, transcribed:

```
[arena] building ▮▮▮ .............................. ok
[arena] turn order respected across 3 sides ....... ok
[arena] ▮▮▮ does not act outside its own turn ..... ok
[arena] invalid target is refused ................. ok
[arena] field state after the action .............. ok
[arena] ▮▮▮ ....................................... ok
[arena] screen closes without leaving mess ........ ok

all tests: 2632/2632
```

The blackouts are mine. There's material in there I can't show yet.

The final number is the one that counts: **2632/2632**. No red.

To give that some size, a comparison. On 22 June 2026, the day the blue square learned to walk, the whole suite had **684** tests. Today it has **2632**. That's almost four times as many. I'll leave both numbers there and let everyone do their own arithmetic.

Worth saying what that number is **not**. It doesn't say the game is good, or fun, or finished. It says one thing, and it's a small thing: what has already been built still works after I've gone and touched some other part. That's little. But it's the little that holds the rest up.

The one who really tests the feel is Gus Dragon, who sits down and plays. Cauã "Volt" has opinions too, in his own way. The battery only guarantees that, when they sit down, the screen opens.

I'm glad when it comes back green. Done.

`root` sent this after a test run:

```
root@glyfesse:~/detonado$ some ele da tela, some a moldura dele e a caixa de seleção. Sensação que correu tudo certo
```

(*"make it disappear from the screen, and its frame, and the selection box too. Feels like everything went fine"*)

---

## Notas de produção

### Conferências do integrador (feitas, não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| ⚠️⚠️ Termos censurados no arquivo | **impossível vazarem** — o escritor **não os recebeu**. Nada a esconder porque nada foi escrito |
| Token de tarja | **6 ocorrências, todas `▮▮▮` idênticas** (script: um único comprimento, `[3]`) — a largura não entrega contagem de letras |
| Fala do `root` no fecho | **byte a byte idêntica** à autorizada pelo criador em 2026-08-01 |
| Aritmética | 2632 ÷ 684 = **3,85×** → o texto diz *"quase quatro vezes"* ✅. ⚠️ O briefing original dizia *"quadruplicou"*, que **não fecha** — corrigido antes de escrever |
| Mecânica citada por nome | **nenhuma** — só função ("o que ataca", "a ordem da vez", "alvo inválido") |
| História de teste que passava por defeito | **ausente** ✅ (é material de outra edição) |
| Tempo verbal | presente, de manual — a seção não narra, presta serviço |
| Rótulo clínico / "estuda muito" | nenhum |
| Profanidade | zero |

### ★ O que a peça faz bem

- **O parágrafo do "o que esse número NÃO é"** é o melhor da seção e não estava no briefing: *"Ele não diz
  que o jogo é bom, nem que é divertido, nem que está pronto."* Numa seção cuja tese é **credibilidade**,
  recusar a inflação vale mais que o número.
- **A régua "curto no que ele sente" morde no fecho:** *"Fico contente quando dá verde. Fim."* Uma linha,
  cortada no osso, logo depois de um parágrafo inteiro de serviço.
- **A explicação da ordem dos turnos não usa nenhum número nem nome de regra** e ainda assim entrega o
  conceito: *"A mesma ação, na vez errada, vira outra ação. Não porque ela mudou, mas porque o mundo em
  volta dela mudou primeiro."*

### ✅★★ DECIDIDO pelo editor-geral (2026-08-03) — e virou CANON de todas as edições

Eu havia **removido por precaução** este trecho, e o levei à decisão:

> *"Quem testa a mão de verdade é o Gus Dragon, que senta e joga. O Cauã 'Volt' também dá palpite, do
> jeito dele. A bateria só garante que, quando eles sentam, a tela abre."*

O meu receio eram **dois planos misturados**: quem narra é o **Gus personagem** e ele cita o **Gus
Dragon** (o playtester real, espelho dele) em terceira pessoa; e o **Cauã "Volt"** é personagem do jogo,
posto ao lado de uma pessoa real opinando sobre suíte de teste.

**Decisão: volta a frase inteira.** ★★ E isso **não é ajuste desta seção, é canon**:

> **Dentro da Glyfesse, personagem e pessoa real convivem no MESMO plano.** O Cauã pode opinar sobre o
> jogo como se fosse gente daqui; o Gus Dragon pode aparecer citado pelo Gus personagem. A revista **não
> explica** essa convivência e **não a comenta** — ela simplesmente é assim.

⚠️ **Vale para todas as edições, não só esta.** E continua valendo, sem exceção, que o menino real é
**"Gus Dragon"** e nunca o nome de batismo.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral (inclusive o ponto acima).
- ⚠️ **A ARTE, que ainda não existe e é metade da seção.** Especificação já decidida pelo criador:
  documento de governo desclassificado, **tarjas pretas** sobre os trechos censurados, e atravessando a
  página na diagonal um **carimbo vermelho** — retângulo de cantos arredondados, borda vermelha, interior
  `CENSURADO!!!` em caixa alta, vermelho e negrito, **torto e descuidado**, *"como se um burocrata tivesse
  cuidado desse documento"*. Dentro do retângulo, **canto inferior direito, bem pequeno mas ainda
  visível**: `sterling corp.`
  - ★ `sterling corp.` é **autorização expressa de spoiler do criador** (2026-08-01) — o tease do vilão
    era decisão exclusiva dele.
  - ⚠️ **Larguras de tarja QUANTIZADAS** (3 ou 4 tamanhos fixos), nunca proporcionais ao texto coberto.
  - ⚠️ **`alt`/`aria-label` dizem apenas "trecho censurado"** e mais nada.
  - ⚠️ **Quem revisar esta peça não pode ser quem a construiu.**
- Copyedit formal (`revisor-textual`) e prova final.
- **Critério de aceitação no `GATE-RENDER`:** procurar cada termo embargado no HTML/CSS/JS servido e
  **não achar nada**. Achou, reprova.
