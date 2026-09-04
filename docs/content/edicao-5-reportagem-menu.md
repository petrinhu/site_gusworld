# Glyfesse #5: caixa própria: a reportagem do achado do Gus Dragon (`#sec-04-menu`) (rascunho v2)

> Peça própria por lei (D16, adendo datado da L-24 do `GODS_LAWS.md` do site, 04/09/2026, verbatim
> do líder: *"Entra como reportagem. Achados do gus sempre são especiais."*). Hospedada como caixa
> ao fim do partial da Reportagem de capa, no molde do encarte do glintfx da #4
> (`src/content/edicao-4/pt/sec-04.php`, linhas 48-74): âncora própria `#sec-04-menu`, prompt
> próprio, fonte própria (este arquivo).
> **Angle statement (v2, corrigido):** em 22/07, por feedback de playtest, o Gus Dragon apontou,
> por convenção de gênero e não por gosto pessoal, que o menu inicial não tinha cara própria; a
> observação virou decisão fechada no mesmo instante (reaproveitar o CRT do boot), e a decisão
> espera, porque a peça do jogo que desenha essa tela ainda não existe.
> ⚠️ **v1 desta peça afirmava que a arte tinha entrado "no dia seguinte". Isso estava errado.** A
> fonte primária (`Projects/GusWorld/TODO.md`, linha 134, item `F7`) não diz isso: diz que o item
> está `⏳ Pendente`, bloqueado, sem data, porque depende de uma camada do jogo que ainda não
> existe. Corrigido nesta versão; ver "Correção de fonte" nas Notas de produção.
> **Voz: Gus-editor** (a mesma voz técnica que hospeda a Reportagem, não o personagem de jogo
> revelando que é pixel; nomeia tecnologia livremente, como a Reportagem que a hospeda).
> **Fronteira de registro (D1/D15, §5.4): esta caixa é técnica, não fala "de dentro do mundo" como
> a Galeria de Bugs; nenhum revisor uniformiza uma pela outra.**
> **Escopo, o que não entra (§5.4):** o clipping de 07/08, o número de linhas, qualquer parte dos
> três movimentos da Reportagem. Nada aqui só faz sentido para quem sabe de agosto.
> ⛔ **Não nomear a dependência externa que bloqueia o item** (a saída dela é matéria reservada para
> a #6, ordem do coordenador). A peça diz que "a peça do jogo que desenha essa tela ainda não
> existe", sem dizer qual biblioteca nem por quê.
> **Status:** rascunho v2 do `narrative-writer` (2026-09-04), corrigindo erro de fonte do v1,
> aguardando `GATE-CONTEUDO` do editor-geral e confirmação de que o menu inicial aparece uma vez só
> na edição inteira (§11 risco 13 da pauta).

---

## pt-BR

`gus@glyfesse:~/menu$ achado`

Em 22 de julho, por feedback de playtest, o Gus Dragon apontou uma coisa sobre o menu inicial do jogo. Não foi gosto pessoal: foi uma convenção do gênero que ele já conhecia, e o registro da observação diz isso com todas as letras. Verbatim dele: "o menu inicial (so ele) em geral tem alguma arte, ou animacao por tras, e nao a tela de onde o jogador estava".

Ele tinha razão sobre o que via. O menu inicial mostra a última cena de onde o jogador parou, congelada atrás dos botões, a mesma tela que o menu de pausa também usa. Não é erro de código: é falta de decisão sobre a própria cara do menu. Ninguém tinha dado a ele algo só seu, e foi isso que ele reparou.

A observação virou decisão no mesmo instante: em vez de encomendar arte nova, o menu inicial vai reaproveitar uma peça que o jogo já tem, o monitor CRT que aparece na tela de boot, a custo de asset zero. É decisão fechada, não ideia solta. Só que ela espera: a peça do jogo que desenha essa tela ainda não existe. Quando existir, o menu inicial ganha o fundo que já foi escolhido para ele. Até lá, continua mostrando a cena congelada, do jeito antigo, junto com o menu de pausa.

Quem achou foi o Gus Dragon, playtester, Revisor Adversarial de Design.

```
// virou decisão fechada. só falta a peça que ainda não existe
```

//by: gus@glyfesse

---

## EN

`gus@glyfesse:~/menu$ finding`

On July 22nd, from playtest feedback, Gus Dragon pointed out something about the game's main menu. It wasn't personal taste: it was a genre convention he already knew, and the record of the observation says so in plain words. His words, verbatim: "the menu at the start (just that one) usually has some art, or animation behind it, not the screen of wherever the player was".

He was right about what he saw. The main menu shows the last scene of wherever the player stopped, frozen behind the buttons, the same screen the pause menu also uses. It isn't a code bug: it's a missing decision about the menu's own face. Nobody had given it something of its own, and that's what he noticed.

The observation became a decision in the same stretch of time: instead of commissioning new art, the main menu will reuse a piece the game already has, the CRT monitor that shows up on the boot screen, at zero asset cost. It's a closed decision, not a loose idea. It just waits: the piece of the game that draws that screen doesn't exist yet. When it does, the main menu gets the background already chosen for it. Until then, it keeps showing the frozen scene, the old way, same as the pause menu.

Whoever found it was Gus Dragon, playtester, Adversarial Design Reviewer.

```
// became a closed decision. just waiting on a piece that doesnt exist yet
```

//by: gus@glyfesse

---

## Notas de produção

### ★ Correção de fonte (v1 → v2)

**O que o v1 afirmava, e por quê estava errado:** o v1 desta peça dizia que "a arte entrou no dia
seguinte" ao achado. Essa afirmação veio do brief e da pauta, que por sua vez a herdaram de um
resumo não conferido na fonte. Eu já tinha sinalizado nas notas do v1 que não conseguia achar a
frase "no dia seguinte" na fonte citada, mas segui a instrução do brief mesmo assim. O coordenador
foi à fonte, conferiu, e o fato é o oposto: **a arte não entrou.**

**O que a fonte sustenta, frase por frase (todas de `Projects/GusWorld/TODO.md`, linha 134, item
`F7`):**

| Afirmação da peça | Frase da fonte que sustenta |
| :--- | :--- |
| Achado de 22/07/2026, por feedback de playtest | *"ideia do Gus Dragon (autoria dele), nascida de feedback de PLAYTEST. Origem: commit `485c604` de 22/07/2026."* |
| Não foi gosto pessoal, foi convenção do gênero | *"Ele descreveu uma convenção do gênero, não gosto pessoal"* |
| O verbatim citado | *"verbatim: 'o menu inicial (so ele) em geral tem alguma arte, ou animacao por tras, e nao a tela de onde o jogador estava'"* |
| O menu inicial hoje mostra a cena congelada de onde o jogador estava (presente, não passado) | decorre da própria queixa dele, ainda válida: nada na fonte indica que o comportamento mudou |
| O menu de pausa continua congelando a cena, sem mudar | *"O menu de PAUSA continua congelando a cena, comportamento antigo intacto - só o menu inicial ganha o fundo animado"* (nota: a fonte descreve isso como o que vai acontecer quando o item for feito, não como já feito; adaptei o tempo verbal da peça para "continua" no presente, que é o estado real hoje, e "vai ganhar" para o menu inicial, que é o estado pretendido) |
| A decisão foi reaproveitar o CRT do boot, sem encomendar arte nova, a custo de asset zero | *"Decisão do líder à época: reaproveitar o monitor CRT que o jogo já mostra no boot, em vez de encomendar arte nova, casando com o pilar de estética de terminal a custo de asset zero."* |
| A decisão está fechada, mas o item espera, sem data | *"Item inteiramente da camada que desenha: bloqueado [...] sem código de domínio a escrever antes de [a camada] existir. Onda —, sem data, como os demais bloqueados."* e o status da linha: **`⏳ Pendente`** |
| Crédito duplo do Gus Dragon | fonte externa ao item F7 (crédito fixado na #4, `T1`/`BRIEFS-EDICAO-5.md`), não este item específico |

**Nenhuma afirmação da peça ficou sem fonte.** A única frase que precisei reformular em vez de
citar diretamente foi a do menu de pausa: a fonte descreve o resultado final pretendido ("só o
menu inicial ganha o fundo animado"), e eu precisei separar isso em dois tempos verbais (o que já
é verdade hoje = o menu de pausa continua congelando; o que ainda não é verdade = o menu inicial
ainda não ganhou fundo próprio), porque a implementação inteira está bloqueada, inclusive a parte
do menu inicial. Sinalizo essa reformulação para o `GATE-CONTEUDO` conferir.

**O que a peça não nomeia, por ordem do coordenador:** a fonte diz que o item está "bloqueado pelo
GlintFx", citando a dependência pelo nome. A peça **não repete esse nome**: diz só que "a peça do
jogo que desenha essa tela ainda não existe", porque a saída dessa dependência é matéria reservada
para a #6 (T3 do brief, por extensão: mesmo não sendo o "RmlUi" citado literalmente na trava, é a
mesma classe de informação reservada, e o coordenador confirmou isso nesta rodada).

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho pt-BR | 4 parágrafos de prosa + 1 linha de `//` + assinatura, porte **S** (o porte do achado) |
| Verbatim dele | citado exatamente como grafado na fonte (sem corrigir acento nem grafia) |
| Clipping de 07/08, número de linhas, três movimentos | nenhuma menção (§5.4) |
| Trava §1.1 | afirmada por conhecimento prévio, agora ainda mais direta que no v1: "não foi gosto pessoal, foi uma convenção do gênero" é a própria fonte falando, não paráfrase minha; nenhum "com apenas 11 anos", nenhuma exclamação, nenhum "impressionou"/"surpreendeu" |
| Crédito duplo | "Gus Dragon, playtester, Revisor Adversarial de Design" / "Adversarial Design Reviewer", por extenso |
| Nome da dependência externa que bloqueia | **não citado**, por ordem do coordenador (matéria reservada) |
| Tom de queixa ou suspense sobre o bloqueio | evitado de propósito: a peça registra "é decisão fechada, não ideia solta" e "quando existir, o menu inicial ganha o fundo que já foi escolhido", sem lamentar nem criar expectativa |
| Linha de `//` | 1 linha, 59 caracteres pt-BR / 71 caracteres EN (conteúdo do pensamento, sem contar o prefixo "// "; convenção idêntica à usada nas outras duas peças desta rodada) |
| Travessão / en-dash | nenhum |
| Rótulo clínico / nome de batismo | nenhum |
| Emoji | nenhum |

### Contagem da linha de `//` em EN, conferida duas vezes

Na primeira contagem eu incluí o prefixo "// " (3 caracteres) junto com o texto do pensamento, e
cheguei a 74, achando que passava do limite. Refiz a contagem contando só o conteúdo do
pensamento, sem o prefixo (a mesma convenção usada em todas as outras linhas de `//` das três
peças desta rodada, e a leitura mais fiel de T4, que descreve o limite como o tamanho **do
pensamento**, não da marcação): "became a closed decision. just waiting on a piece that doesnt
exist yet" tem **71 caracteres**, dentro do limite de 72. A linha do texto final não precisou de
ajuste; mantive a versão com ponto final na primeira frase, igual à pt-BR.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral, com atenção à correção de fonte acima.
- Confirmar com o revisor da onda 3 que o menu inicial aparece uma vez só na edição inteira (§11
  risco 13 da pauta).
- **Submissão obrigatória (L-08, T6):** a linha de `//` vai ao líder antes de qualquer render.
- Copyedit formal (`revisor-textual`) e prova final.
