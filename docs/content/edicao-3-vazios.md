# Glyfesse #3 — vazios-com-graça + recorrentes (rascunho v1)

> **Voz: Gus.** Formato **novo** (`nome@glyfesse:~/seção$`, caminho **sem acento e não traduzido**).
> Falas e `//` do Gus **sem ponto final**; prosa de matéria com pontuação normal.
> **REUSAR** = idêntico à #1 (copiar do partial `src/content/edicao-1/`). **NOVO** = texto abaixo.
> **Status:** rascunho v1 do `narrative-writer` (2026-08-03), aguardando `GATE-COPY` do editor-geral.
> ⚠️ Decisão do editor-geral de 2026-07-19: **todo vazio re-gate sempre**, mesmo o reusado.

---

## 05 A NOTA — NOVO ★

> ★★ **O motivo desta seção existir nesta edição:** a linha **"Jogabilidade" sai de `<NULL>` pela primeira
> vez na história da revista.** Na #1 era `<NULL>`; na #2, "ainda `<NULL>`".

### pt-BR

```
gus@glyfesse:~/nota$ a nota

Como dar nota a um jogo que ainda não é jogo, mas onde alguma coisa finalmente se mexe? Assim:

Arquitetura: existe, e trocou de fundação duas vezes em dois dias
Gráficos: `[ícone de imagem quebrada]` (o protagonista continua um quadrado sem cara)
Jogabilidade: um quadrado azul que anda com as teclas, corre, e desliza ao raspar na parede
Texto: 10, de novo (ainda é o que mais tem)

// primeira vez que essa linha não é <NULL>... anotado, e só
```

### EN

```
gus@glyfesse:~/nota$ the score

How do you score a game that isn't a game yet, but where something finally moves? Like this:

Architecture: exists, and changed foundations twice in two days
Graphics: `[broken image icon]` (the main character is still a square with no face)
Gameplay: a blue square that walks with the keys, runs, and slides when it scrapes a wall
Writing: 10, again (still the thing there's most of)

// first time this line isn't <NULL>... noted, and that's it
```

---

## 09 ERRATA + CARTAS — NOVO

### pt-BR

```
gus@glyfesse:~/errata$ errata + cartas

Errata: duas edições no ar e até agora ninguém apontou nada errado em nenhuma das duas. Isso não me
tranquiliza. Uma edição sem correção ainda pode ser uma edição limpa; duas seguidas é mais provável que
seja gente demais não lendo. Cartas: zerado, de novo. O e-mail continua no rodapé.

// dois números de silêncio... eu conferia, se fosse você
```

### EN

```
gus@glyfesse:~/errata$ errata + letters

Errata: two issues out and so far nobody has pointed out anything wrong in either one. That doesn't
reassure me. One issue with no correction can still be a clean issue; two in a row probably means too many
people not reading. Letters: zero, again. The e-mail is still in the footer.

// two rounds of silence... I'd check, if I were you
```

---

## 18 O GUS LÊ O BUS — NOVO ★★

> ★★ **A frase do `//` é do CRIADOR e vai VERBATIM** (registrada na `PAUTA-EDICAO-3.md`, §Seção 18). Não
> se reescreve, não se parafraseia, não se troca uma palavra.
> **Por que funciona** (e o texto **não explica**): "bus" tem dois sentidos — o cano de mensagens e o
> ônibus. Em junho de 2026 o cano **ainda não existia**, então o vazio é honesto; e o **ônibus cheio de
> fantasmas está indo para o Cemitério das Ideias Mortas**, que nesta mesma edição está **cheio**, com três
> lápides. É um vazio com graça que aponta para outra seção do mesmo número, sem spoiler e sem furar a
> ordem dos fatos.

### pt-BR

```
gus@glyfesse:~/bus$ o gus lê o bus

Nenhuma mensagem nesta edição. Abri, conferi duas vezes, não tem nada pra ler.

// bus está estranhamente vazio... ou repleto de fantasmas rumo ao cemitério?
```

### EN

```
gus@glyfesse:~/bus$ gus reads the bus

Not a single message this issue. I opened it, checked twice, there's nothing to read.

// the bus is strangely empty... or packed with ghosts headed for the cemetery?
```

---

## As RECORRENTES (sem escrita nova)

| # | Seção | O que fazer |
| :--- | :--- | :--- |
| 10 | Classificados in-world | **REUSAR #1**, idêntico — com os typos e os IDs originais |
| 12 | Próximos Lançamentos | **REUSAR #1**. ⚠️ **sem citar áudio, NPC ou save-load** — tudo isso é de julho |
| 14 | Brinde | **REUSAR #1** (os 2 downloadables) |
| 15 | Cupom recortável | **REUSAR o mini-app** (`src/includes/cupom.php`), como na #1 e na #2 |

⚠️ Reuso **não dispensa o gate**: todo vazio re-gate sempre.

---

## Notas de produção

### Conferências do integrador (feitas, não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Frase do criador na seção 18 | **verbatim, palavra por palavra** — conferida contra a `PAUTA-EDICAO-3.md` |
| Errata inventada | **nenhuma** ✅ — não há erro reportado por leitor, e o texto diz isso em vez de fabricar um |
| A NOTA: a linha que muda | ✅ "Jogabilidade" **sai de `<NULL>`** pela primeira vez; "Gráficos" continua impublicável, como a pauta manda |
| Caminho do prompt traduzido | **corrigido pelo integrador** — a EN da NOTA voltou com `~/score$`; o caminho **não se traduz** e virou `~/nota$` |
| Cronologia | nada posterior a 23/jun; o vazio do bus é **honesto** (o cano não existia) |
| Rótulo clínico / "estuda muito" / profanidade | zero |

### ★ O que as três peças fazem bem

- **A NOTA** guarda a graça no tamanho do avanço: a linha da Jogabilidade sai do nada e o que entra no
  lugar é *"um quadrado azul que anda com as teclas"*. E o `//` recusa a comemoração —
  *"anotado, e só"* — que é exatamente o menino.
- **A Errata inverte o silêncio a favor da piada:** *"Uma edição sem correção ainda pode ser uma edição
  limpa; duas seguidas é mais provável que seja gente demais não lendo."* Ele transforma a ausência de
  leitores em autocrítica, que é mais engraçado e mais verdadeiro que reclamar.
- **O bus não explica a piada.** Duas frases de moldura — *"Abri, conferi duas vezes, não tem nada pra
  ler"* — e a frase do criador faz o resto. O leitor liga sozinho ao Cemitério.

### ⚠️ Um ponto de notação para o editor-geral

Na pauta, a frase do criador está registrada como `[gus pensa]: bus está estranhamente vazio…`. O
`[gus pensa]:` é **notação** dele para o canal de pensamento, e na revista esse canal é o `//`. Tratei
assim. **Se você quiser que apareça literalmente como `[gus pensa]:` na página, é uma linha de mudança.**

### Pendências

- `GATE-COPY` do editor-geral nas três peças novas **e** nas quatro recorrentes (todo vazio re-gate).
- Layout da seção 18: **CRT colorido com o bus renderizado vazio**, que já é o molde desta seção.
