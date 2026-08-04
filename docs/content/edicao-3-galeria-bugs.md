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

`// prometido é prometido, nunca disse que era grande`

**O boneco que decidiu morar na quina**

Segunda e terça, 22 e 23 de junho. O quadrado azul mal tinha começado a andar, e a primeira coisa que fez com a liberdade foi raspar num canto e ficar por ali. Havia passagem do lado. Ele não quis. Parede ele já sabia contornar; quina, não.

O conserto: quando o jogador raspa numa quina, o programa o empurra o mínimo para o lado — o suficiente para contornar o canto, nunca o bastante para atravessar parede sólida. Um tanto a mais e o remédio vira o problema. O Stardew Valley resolve do mesmo jeito; o defeito é clássico o bastante para ter nome de jogo.

O registro daquele dia atribui o achado ao `root`. O registro está impreciso. Quem achou foi o Gus Dragon, playtester, 11 anos — e ele não achou depois. Ele avisou antes.

`// o registro serve para a data, para o fato não serve`

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

Nos mesmos dois dias, escondido no commit do primeiro passo, havia outro defeito, esse sem profecia nenhuma: as peças do programa de desenho se procuravam pelo nome, e os nomes não batiam. Um lado guardava a informação com um nome; o outro pedia por outro. Duas pessoas combinam de se encontrar na esquina, uma anota o nome antigo da rua e a outra o nome novo — as duas chegam na hora certa, e nenhuma vê a outra.

Nada estava quebrado. Estava mal apresentado.

`// esse é o tipo de defeito que ninguém prevê porque ninguém pensa nele, é de quem escreve a parte que desenha, acontece`

A capa desta edição é o mesmo quadrado. Anda melhor agora. Continua sendo o que grudava na parede.

---

## EN

`gus@glyfesse:~/galeria$ bug gallery`

Last issue I wrote "Come back for #3". You came back. What I have to show you is a character that gets stuck on a corner.

`// a promise is a promise, I never said it was a big one`

**The character who moved into the corner**

Monday and Tuesday, June 22nd and 23rd. The blue square had barely started walking, and the first thing it did with its freedom was scrape against a corner and settle there. There was a way around it. It wasn't interested. It already knew how to slide along a wall; a corner, no.

The fix: when the player scrapes a corner, the program nudges them sideways by the smallest amount — enough to round the corner, never enough to pass through solid wall. A little more and the cure becomes the disease. Stardew Valley solves it the same way; the bug is classic enough to be named after a game.

That day's log credits the find to `root`. The log is inaccurate. It was Gus Dragon, playtester, age 11 — and he didn't find it afterwards. He called it beforehand.

`// the log is good for the date, for the fact it isn't`

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

Over those same two days, tucked into the commit of that first step, there was another bug, this one with no prophecy at all: the pieces of the drawing program looked each other up by name, and the names didn't match. One side filed the information under one name; the other asked for a different one. Two people agree to meet on the corner, one writes down the street's old name and the other the new one — both arrive on time, and neither sees the other.

Nothing was broken. It was badly introduced.

`// that's the kind of bug nobody predicts because nobody thinks about it, it belongs to whoever writes the drawing side, it just happens`

This issue's cover is that same square. It walks better now. It's still the one that stuck to the wall.

---

## Notas de produção

### Conferências do integrador (feitas, não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho pt-BR | **415 palavras** de prosa + ~90 da tabela (alvo 380-520). Eram 413: [I-12] somou 7, [I-5] cortou 5 |
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
  abaixo (*"prometido é prometido, nunca disse que era grande"*) fecha o soco.
- **A correção do registro entra sem acusar ninguém:** *"O registro daquele dia atribui o achado ao root.
  O registro está impreciso."* E o `//` seguinte destila a regra inteira em nove palavras:
  *"o registro serve para a data, para o fato não serve"*
- **A ironia honesta ficou seca, sem amargura:** *"ele avisou, e aconteceu assim mesmo. Ser avisado não é
  a mesma coisa que evitar."*
- **O segundo defeito CONTRASTA em vez de somar:** *"esse sem profecia nenhuma"* — e a comparação das duas
  pessoas na esquina com nomes de rua diferentes explica ligação-por-nome sem uma palavra técnica.
- **O fecho amarra com a capa:** *"A capa desta edição é o mesmo quadrado. Anda melhor agora. Continua
  sendo o que grudava na parede."*
- ★★ **A simetria Gus personagem × Gus Dragon NÃO é apontada** — o texto diz *"playtester, 11 anos"* e
  segue adiante. O leitor junta sozinho, que é a regra.

### ✅ Correções aplicadas em 2026-08-04 (auditoria de coerência cruzada, `AUDITORIA-COERENCIA-EDICAO-3.md`)

**Três itens, pt-BR e EN. Nenhum fato, nenhuma data e nenhum número mudaram.**

| Item | Era | Ficou | Por quê |
| :--- | :--- | :--- | :--- |
| **[I-9]** | os **três** apartes com **maiúscula inicial e ponto final**: *"`// Prometido é prometido. Nunca disse que era grande.`"* · *"`// O registro serve para a data. Para o fato, não serve.`"* · *"`// Esse é o tipo de defeito... Acontece.`"* | os três **minúsculos, sem ponto final**, com as pausas internas viradas em vírgula | Regra de voz: o `//` do Gus **não leva ponto final**. Os nove do Editorial e todos os da Entrevista já obedeciam; só estes três destoavam — e com maiúscula ficavam parecendo **legenda editorial**, não pensamento dele. ⚠️ Isto é **independente** do layout já decidido (aparte curto embutido × bloco no fim): a **forma** pode mudar, a **pontuação** não. Na EN o `I` da primeira pessoa continua maiúsculo (é pronome, não início de frase) — é o que o Editorial EN já faz |
| **[I-5]** | *"O quadrado azul tinha acabado de **aprender a andar**"* · *"escondido no commit em que o quadrado **aprendeu a andar**"* | *"O quadrado azul **mal tinha começado a andar**"* · *"escondido no commit **do primeiro passo**"* | A expressão aparecia **4× em 3 seções**, e o **fecho da Reportagem** depende de ela chegar **nova** ao leitor (*"escolheu justamente aqueles três dias para aprender a andar"*). A Reportagem fica com ela; **a Galeria e o Detonado cedem** — aqui era só âncora temporal, e a troca não custa nada. ★ E a Galeria não podia, de todo modo, repeti-la **duas vezes dentro de si**: as duas ocorrências eram desta seção |
| **[I-12]** | *"Havia passagem do lado. Ele não quis."* | *"Havia passagem do lado. Ele não quis. **Parede ele já sabia contornar; quina, não.**"* (EN: *"It already knew how to slide along a wall; a corner, no."*) | Não era contradição — deslizar ao longo de uma **parede** e prender numa **quina** são fenômenos diferentes, e o próprio Gus os separa na Entrevista. Mas o leitor lia na capa *"ele não trava: ele desliza pela parede"* e três seções depois *"ficou por ali"*, com o **mesmo verbo** ("raspar") nas duas — sem uma palavra de desambiguação, parece que uma das duas mente. A cláusula nomeia a diferença **e melhora a piada** |

⚠️ **O que NÃO foi tocado, de propósito:** a abertura *"**Na edição passada eu escrevi** 'Volte na #3'"* —
a fórmula **fica aqui**, porque é o setup da piada e o timing depende dela; **quem cedeu foi o Editorial**
([I-3]). E *"O registro daquele dia"*, que a Reportagem também usa, é **repetição deliberada** ([K-4]): a
Reportagem ensina o leitor a confiar no registro e a Galeria puxa o tapete com a mesma fórmula.

### ✅ LAYOUT DECIDIDO pelo editor-geral (2026-08-03): as duas formas do `//` convivem

O `//` do Gus passa a ter **duas formas, com funções distintas** — e a montagem mantém as duas:

| Forma | Quando | Onde estreia |
| :--- | :--- | :--- |
| **Aparte curto**, embutido na prosa | quando é **alfinetada** ou remate de piada, e o timing depende de vir logo depois da frase | esta seção (Galeria) |
| **Bloco separado**, ao fim da peça | quando é **confissão longa** — o que ele cortou e não mandou para a página | o Editorial |

O leitor aprende as duas sem que ninguém explique. ⚠️ **A escolha é de função, não de gosto:** aparte que
vira parágrafo perde a piada; confissão espremida em aparte perde o peso.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- Copyedit formal (`revisor-textual`) e prova final.
