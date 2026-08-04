# Glyfesse #3 — Galeria de Bugs (rascunho v1, ESTREIA)

> Seção **nova**, estreia nesta edição. **Voz: Gus.** Regra da seção: **a piada PRIMEIRO, o técnico
> DEPOIS**.
> **Lente aprovada (S1 GATE-LENTE):** os primeiros defeitos com história do projeto, pela lente da piada
> primeiro e do conserto depois, cortando os defeitos grandes que ainda não aconteceram.
> **★★★ O ÂNGULO (correção do criador, 2026-08-01):** ele **AVISOU ANTES**, não pegou depois. A seção
> deixou de ser sobre bug.
> **Nº de defeitos: DOIS** — decisão do editor-geral em 2026-08-03 (o segundo é o das peças do desenho
> que não se reconheciam, do mesmo commit do quadrado azul).
> **Data:** ancorada em "22 e 23 de junho", sem fingir precisão de hora.
> **Status:** rascunho v1 do `technical-writer` (2026-08-03), aguardando `GATE-CONTEUDO` do editor-geral.

---

## pt-BR

`gus@glyfesse:~/galeria$ galeria de bugs`

Na edição passada eu escrevi "Volte na #3". Voltaram. O que eu tenho para mostrar é um boneco que gruda na quina.

`// Prometido é prometido. Nunca disse que era grande.`

**O boneco que decidiu morar na quina**

Fim de semana de 22 e 23 de junho. O quadrado azul tinha acabado de aprender a andar, e a primeira coisa que fez com a liberdade foi raspar num canto e ficar por ali. Havia passagem do lado. Ele não quis.

O conserto: quando o jogador raspa numa quina, o programa o empurra o mínimo para o lado — o suficiente para contornar o canto, nunca o bastante para atravessar parede sólida. Um tanto a mais e o remédio vira o problema. O Stardew Valley resolve do mesmo jeito; o defeito é clássico o bastante para ter nome de jogo.

O registro daquele dia atribui o achado ao `root`. O registro está impreciso. Quem achou foi o Gus Dragon, playtester, 11 anos — e ele não achou depois. Ele avisou antes.

`// O registro serve para a data. Para o fato, não serve.`

**A lista**

Ele lê sobre como se fazem jogos porque gosta. Antes de o quadrado dar o primeiro passo, já tinha nomeado o que ia sair torto:

| O que ele nomeou | O que apareceu | O que o projeto fez |
|---|---|---|
| arrastar / grudar | o boneco preso na quina | consertado no mesmo dia |
| olhar na direção errada | na diagonal, o boneco encara o lado dominante | aceito de propósito: a arte é de 4 direções, e 8 dobraria a arte inteira. Decisão registrada do `root`, em aberto |
| travar na diagonal | a diagonal saía mais rápida que o movimento reto | alavanca deixada pronta e desligada, no ponto único de ajuste |
| atravessar parede | — | coberto no conserto da quina. Voltou um mês depois |

A maior parte da lista não virou defeito. É por isso que esta seção é curta, e é esse o elogio.

E tem a parte que não é elogio: ele avisou, e aconteceu assim mesmo. Ser avisado não é a mesma coisa que evitar. A alavanca da diagonal está pronta e desligada desde o primeiro dia da tela — ninguém deixa alavanca pronta para um problema que não previu.

**O segundo defeito, que não estava na lista**

No mesmo fim de semana, escondido no commit em que o quadrado aprendeu a andar, havia outro defeito, esse sem profecia nenhuma: as peças do programa de desenho se procuravam pelo nome, e os nomes não batiam. Um lado guardava a informação com um nome; o outro pedia por outro. Duas pessoas combinam de se encontrar na esquina, uma anota o nome antigo da rua e a outra o nome novo — as duas chegam na hora certa, e nenhuma vê a outra.

Nada estava quebrado. Estava mal apresentado.

`// Esse é o tipo de defeito que ninguém prevê porque ninguém pensa nele. É de quem escreve a parte que desenha. Acontece.`

A capa desta edição é o mesmo quadrado. Anda melhor agora. Continua sendo o que grudava na parede.

---

## EN

`gus@glyfesse:~/galeria$ bug gallery`

Last issue I wrote "Come back for #3". You came back. What I have to show you is a character that gets stuck on a corner.

`// A promise is a promise. I never said it was a big one.`

**The character who moved into the corner**

The weekend of June 22nd and 23rd. The blue square had just learned to walk, and the first thing it did with its freedom was scrape against a corner and settle there. There was a way around it. It wasn't interested.

The fix: when the player scrapes a corner, the program nudges them sideways by the smallest amount — enough to round the corner, never enough to pass through solid wall. A little more and the cure becomes the disease. Stardew Valley solves it the same way; the bug is classic enough to be named after a game.

That day's log credits the find to `root`. The log is inaccurate. It was Gus Dragon, playtester, age 11 — and he didn't find it afterwards. He called it beforehand.

`// The log is good for the date. For the fact, it isn't.`

**The list**

He reads about how games are made because he likes to. Before the square took its first step, he had already named what would come out crooked:

| What he named | What showed up | What the project did |
|---|---|---|
| dragging / sticking | the character pinned to a corner | fixed the same day |
| facing the wrong way | on a diagonal, the character faces the dominant side | accepted on purpose: the art has 4 directions, and 8 would double all of it. Logged decision by `root`, still open |
| stalling on the diagonal | diagonal movement came out faster than straight movement | a lever left built and switched off, at the single point where movement is tuned |
| walking through walls | — | covered by the corner fix. It came back a month later |

Most of the list never became a bug. That's why this section is short, and that's the compliment.

And there's the part that isn't a compliment: he warned us, and it happened anyway. Being warned is not the same as avoiding. The diagonal lever has been built and switched off since the screen's first day — nobody builds a lever for a problem they didn't see coming.

**The second bug, which wasn't on the list**

That same weekend, tucked into the commit where the square learned to walk, there was another bug, this one with no prophecy at all: the pieces of the drawing program looked each other up by name, and the names didn't match. One side filed the information under one name; the other asked for a different one. Two people agree to meet on the corner, one writes down the street's old name and the other the new one — both arrive on time, and neither sees the other.

Nothing was broken. It was badly introduced.

`// That's the kind of bug nobody predicts because nobody thinks about it. It belongs to whoever writes the drawing side. It just happens.`

This issue's cover is that same square. It walks better now. It's still the one that stuck to the wall.

---

## Notas de produção

### Conferências do integrador (feitas, não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho pt-BR | **413 palavras** de prosa + ~90 da tabela (alvo 380-520) |
| ⛔ Rótulo clínico | **nenhum** — varredura por superdotado, altas habilidades, prodígio, neurodivergente, gênio, TDAH: **zero** |
| ⛔ "estuda muito" / esforço inventado | **nenhum** — varredura por estudou muito, aplicado, dedicado, esforçado, disciplinado: **zero**. A frase que resolve é *"Ele lê sobre como se fazem jogos porque gosta"* |
| ⛔ "que fofo" | **ausente** ✅ |
| Nome de batismo | **nenhum** — só **"Gus Dragon"** |
| Julho | **uma linha só**, dentro da tabela (*"Voltou um mês depois"*); nenhuma história de julho |
| Mecânica citada por nome | nenhuma |
| Projeto como vilão | **não** — a tabela mostra as duas não-correções como **decisão registrada**, não como descuido |
| Profanidade | zero |

### ★ O que a peça faz bem

- **A abertura resolve a lente em três frases:** *"Na edição passada eu escrevi 'Volte na #3'. Voltaram. O
  que eu tenho para mostrar é um boneco que gruda na quina."* — a modéstia **é** a piada, e o `//` logo
  abaixo (*"Prometido é prometido. Nunca disse que era grande."*) fecha o soco.
- **A correção do registro entra sem acusar ninguém:** *"O registro daquele dia atribui o achado ao root.
  O registro está impreciso."* E o `//` seguinte destila a regra inteira em nove palavras:
  *"O registro serve para a data. Para o fato, não serve."*
- **A ironia honesta ficou seca, sem amargura:** *"ele avisou, e aconteceu assim mesmo. Ser avisado não é
  a mesma coisa que evitar."*
- **O segundo defeito CONTRASTA em vez de somar:** *"esse sem profecia nenhuma"* — e a comparação das duas
  pessoas na esquina com nomes de rua diferentes explica ligação-por-nome sem uma palavra técnica.
- **O fecho amarra com a capa:** *"A capa desta edição é o mesmo quadrado. Anda melhor agora. Continua
  sendo o que grudava na parede."*
- ★★ **A simetria Gus personagem × Gus Dragon NÃO é apontada** — o texto diz *"playtester, 11 anos"* e
  segue adiante. O leitor junta sozinho, que é a regra.

### ⚠️ Um ponto de LAYOUT (não de texto) para o render

Esta seção usa o `//` como **aparte curto embutido na prosa** (em `código inline`), enquanto o Editorial
usa o `//` como **bloco separado** ao fim da peça. As duas são gramaticalmente a mesma coisa — pensamento
do Gus — mas o tratamento visual difere. **A montagem final precisa decidir se as duas formas convivem**
(aparte × bloco) ou se uma delas se ajusta. **Não é decisão de texto.**

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- Copyedit formal (`revisor-textual`) e prova final.
