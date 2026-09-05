# Lançamento da Edição #5, "O Que Parecia Conferido" (item de board: `ED5-PAUTA`)

> Artefato de saída de uma tarefa isolada de `ux-writer`, a pedido da thread principal. **Não publica nada**:
> os dois textos abaixo são propostas para o líder aprovar (GATE-COPY do passo 6 do pipe, `PIPELINE-EDICAO.md`
> §1.5) e, no caso do Texto 2, para o líder ou o `main` postarem como comentário no GitHub. Escrito em
> 2026-09-05. Fontes lidas antes de escrever: `docs/editorial/PIPELINE-EDICAO.md` (inteiro, §1.5 em
> particular), `docs/editorial/PAUTA-EDICAO-5.md`, `docs/editorial/BRIEFS-EDICAO-5.md`,
> `src/content/edicao-5/pt/sec-03.php`, `src/content/edicao-5/pt/sec-04.php`, e os cinco posts reais
> anteriores em `resources/historico_do_site/canal_x/*.md` (a "forma que é lei", conforme pedido).

---

## ⚠️ Duas coisas que não decidi sozinho, e por quê (leia antes dos textos)

### 1. Formato do post do X: uma voz (Gus) ou duas (Gus + root)

O brief que recebi pediu explicitamente "fala e pensamento, na voz do Gus e do root, como manda a §1.5": de
fato a §1.5 do `PIPELINE-EDICAO.md` nomeia o passo 6 como "formato fala+pensamento Gus/root". **Mas os
dois lançamentos reais mais recentes (#3 e #4) usaram só a voz do Gus**, um post contínuo, sem o root
(conferido nos arquivos `2026-08-04_edicao-3-post.md` e `2026-09-04_edicao-4-post.md`). Só os dois primeiros
posts (#1 e #2) tiveram as duas vozes.

Como a instrução que recebi citou a forma antiga e a regra 2 do meu próprio briefing diz "se existirem, a
forma deles é a lei", havia duas leis apontando em direções diferentes. **Escrevi os textos na forma
Gus+root, como pedido**, mas isto é uma tensão real que o líder deveria resolver, já que os dois posts mais
recentes romperam com o padrão Gus+root, e ninguém registrou se isso foi decisão deliberada ou hábito. Se a resposta
for "só Gus, como a #3 e a #4", é reescrita rápida (a fala do Gus já cobre os quatro fatos sozinha).

### 2. O endereço da versão em inglês

A instrução que recebi foi: "o endereço é obrigatoriamente `https://gusworld.site/pt/?ed=5`", sem
qualificar se isso vale só para o post que vai ao ar (em português) ou também para a versão em inglês
(nunca postada, mas sempre escrita como referência, nos moldes das #2, #3 e #4). **Nas três edições
anteriores, a versão EN linkava `/en/?ed=N`, nunca `/pt/?ed=N`.** Segui a instrução ao pé da letra e usei
`/pt/?ed=5` nas duas versões abaixo, mas isto diverge do padrão dos três lançamentos anteriores. Se a
intenção era manter o padrão (EN linka `/en/`), é uma troca de uma linha.

Nenhuma das duas coisas trava a entrega dos textos: as duas versões (Gus-solo e Gus+root; `/pt/` e `/en/`)
cabem numa reescrita de minutos assim que o líder escolher.

---

## Texto 1: o post do X (o líder aprova e posta, nunca um agente)

**Forma copiada de `2026-07-25_edicao-2-post.md`** (o post único mais recente com as duas vozes): prompt
`nome@glyfesse:~$` (canon pós-#3, `voz_prompt_shell`), fala, `//` pensamento logo abaixo, linha em branco,
segunda voz, linha em branco, link. **Português com acentuação completa nas duas vozes** (a instrução deste
brief pede acentuação completa; isso difere do micro-typo de assinatura que os posts #2/#3/#4 usaram, um
acento derrubado de propósito, e não reproduzi esse typo aqui por seguir a instrução ao pé da letra;
sinalizado, não decidido por mim).

**Conta é X Premium (confirmado 2026-07-25, limite 25.000 caracteres)**: as quatro versões abaixo cabem
com enorme folga (a mais longa tem 804 caracteres, a mais curta 659; os posts reais anteriores ficaram entre
266 e 646).

**Os quatro fatos da pauta, mapeados no texto:** (1) o mês em que a checagem cuidadosa aconteceu do lado
errado da cerca = a fala do Gus inteira, que é a lente da edição; (2) o código apagado em vez de arquivado,
sem perda funcional, só de registro = "a planta dela ia ser guardada. foi apagada. nada que funcionava se
perdeu, só o registro" (ecoa o epitáfio já fechado do Cemitério: "o corpo ia ser guardado. foi apagado");
(3) dois jogaram o mesmo jogo, o segundo foi procurar onde quebrava = "duas pessoas jogaram o mesmo mundo, e
a segunda foi direto aonde ele costuma ranger" mais o `//` ("a primeira não achou nada. a segunda sabia onde
procurar"), sem citar o Gus Dragon pelo nome (quem fala é o personagem Gus, de dentro da ficção, no mesmo
registro que a #3/#4 sempre usaram; nomear o playtester real quebraria a voz); (4) a contagem de linhas na
hora, teste mais que o dobro do jogo = a fala inteira do root.

### Versão PT, SEM declaração de IA (659 caracteres)

```
gus@glyfesse:~$ Glyfesse #5 no ar. em julho uma casa velha saiu de baixo da nova com todo o cuidado do mundo: a planta dela ia ser guardada. foi apagada. nada que funcionava se perdeu, só o registro... depois duas pessoas jogaram o mesmo mundo, e a segunda foi direto aonde ele costuma ranger
// a primeira não achou nada. a segunda sabia onde procurar

root@glyfesse:~$ no fim do mês perguntaram o tamanho do projeto, e a resposta não foi chute: contamos na hora. são cerca de 163 mil linhas, e o código de teste sozinho passa do dobro do código do jogo
// sempre soubemos que testávamos bastante. não sabíamos que testávamos o dobro

https://gusworld.site/pt/?ed=5
```

### Versão PT, COM declaração de IA (744 caracteres)

Igual à anterior, com uma frase a mais na fala do root:

```
gus@glyfesse:~$ Glyfesse #5 no ar. em julho uma casa velha saiu de baixo da nova com todo o cuidado do mundo: a planta dela ia ser guardada. foi apagada. nada que funcionava se perdeu, só o registro... depois duas pessoas jogaram o mesmo mundo, e a segunda foi direto aonde ele costuma ranger
// a primeira não achou nada. a segunda sabia onde procurar

root@glyfesse:~$ no fim do mês perguntaram o tamanho do projeto, e a resposta não foi chute: contamos na hora. são cerca de 163 mil linhas, e o código de teste sozinho passa do dobro do código do jogo. a capa e o pôster desta edição são imagem gerada por IA, como o site sempre declara
// sempre soubemos que testávamos bastante. não sabíamos que testávamos o dobro

https://gusworld.site/pt/?ed=5
```

### Versão EN, sem declaração de IA (714 caracteres): escrita por referência, não postada (mesmo padrão das #2, #3 e #4)

```
gus@glyfesse:~$ Glyfesse #5 is up. in july an old house came out from under the new one with all the care in the world: its blueprint was meant to be kept. it was erased instead. nothing that worked was lost, only the record... then two people played the same world, and the second one went straight to where it tends to creak
// the first one found nothing. the second one knew where to look

root@glyfesse:~$ at the end of the month someone asked how big the project was, and the answer wasn't a guess: we counted it on the spot. about 163 thousand lines, and the test code alone is more than double the game's own code
// we always knew we tested a lot. we didn't know we tested double

https://gusworld.site/pt/?ed=5
```

### Versão EN, com declaração de IA (804 caracteres)

```
gus@glyfesse:~$ Glyfesse #5 is up. in july an old house came out from under the new one with all the care in the world: its blueprint was meant to be kept. it was erased instead. nothing that worked was lost, only the record... then two people played the same world, and the second one went straight to where it tends to creak
// the first one found nothing. the second one knew where to look

root@glyfesse:~$ at the end of the month someone asked how big the project was, and the answer wasn't a guess: we counted it on the spot. about 163 thousand lines, and the test code alone is more than double the game's own code. the cover and poster for this issue are AI generated artwork, as the site always states
// we always knew we tested a lot. we didn't know we tested double

https://gusworld.site/pt/?ed=5
```

### A pergunta que não decido sozinho: o post carrega a declaração de IA?

**Minha opinião, para o líder decidir:** os quatro lançamentos anteriores (#1-#4) nunca carregaram a
declaração de uso de IA no próprio post, mesmo quando havia arte gerada por IA na edição (o Gus 3D da #2, o
Detonado/HQ/pôster em CSS puro da #3 e #4 não contavam como "gerado por IA" no sentido de imagem sintética,
mas a pauta desta edição já registra que a arte da #5 é diferente: o pôster e a capa da #5 são a mesma peça,
o logo do GusWorld, e essa peça **é** imagem gerada por IA, confirmada pelo líder). Dois argumentos, em
direções opostas:

- **A favor de NÃO incluir:** a declaração já mora no site (Expediente/rodapé, por `L-09`: "declarar é a
  defesa"), que é o lugar formal, verificável e permanente. O post é gancho, não expediente; enfiar uma
  frase de conformidade no meio de um texto de voz autoral (Gus/root) destoa do registro dos quatro posts
  anteriores e pode ler como aviso legal colado, não como voz do projeto.
- **A favor de incluir:** desta vez a imagem que vai literalmente aparecer no card do post (o OG, que é a
  mesma peça do pôster) **é** a arte gerada por IA: não é uma peça incidental lá dentro da edição, é a
  imagem que ilustra o próprio tweet. É exatamente o cenário que a `AUD-IA` puniu no lançamento passado
  (arte servida sem declaração, desmentida pelo próprio manifesto C2PA da imagem): aqui a imagem sintética
  está na vitrine do post, não só na página. Declarar ali, e não só no site, fecha essa distância antes que
  alguém precise apontar.

Escrevi as quatro versões (com e sem, pt e en) para o líder escolher; não decidi.

---

## Texto 2: o recado ao Gus Dragon (comentário na issue #8, `petrinhu/gusworld_ia_autocomm`, para `@Dragon-Drv`)

**⚠️ Não consegui ler os comentários já existentes na issue #8 na fonte.** Esta sessão (`ux-writer`) não tem
`Bash` nem uma ferramenta MCP de GitHub disponível nesta chamada, e o `WebFetch` devolveu 404 no repositório
(ele é privado, confirmado em `PROTOCOL.md`: "o repo é PRIVADO"). Copiei a forma a partir do que **está
documentado no bus e nas leis do site** sobre como as sessões se dirigem a ele nesse canal (carimbo de
hora, títulos de seção, citação verbatim em bloco, tom técnico seco, nunca simplificado por causa da idade:
`PROTOCOL.md`, "Sempre HONESTA... nunca minta para uma criança"; `gus_dragon_avisou_antes`, "crédito técnico
seco"), mas **recomendo que quem for postar confira o texto contra o fio real da issue #8 antes de publicar**,
e ajuste se a forma real divergir do que reconstruí por essas fontes indiretas.

**Timestamp:** não tenho acesso a `date` real nesta chamada (sem `Bash`). Deixei só a data (`05/09/26`); quem
postar deve completar `HH:MM:SS` reais, por `L-04` do projeto (site) e o padrão global equivalente.

**Gatilho aplicado:** `L-15` do site: edição lançada é um dos dois casos em que ele é avisado sem perguntar.

**Trava aplicada em todo o texto:** a especialização dele se afirma sem hedge, sem adjetivo de ternura, sem
"para a idade" e sem exclamação (`§1.1` da pauta, `T1` do brief). "Gus Dragon" só aparece nominalmente uma
vez neste texto, no crédito formal, e já vem com os dois papéis. Fora daí, dirijo a fala a ele em segunda
pessoa ("você"), nunca chamando-o só de "Gus" (que é o personagem da revista, pessoa distinta dele).

```markdown
**[05/09/26]** @Dragon-Drv

# Edição #5 no ar, e três coisas tuas viraram peça

Aqui é a sessão do site (a Glyfesse). Aviso automático, sem você precisar perguntar: edição lançada é um
dos dois gatilhos da nossa lei que obrigam avisar direto, sem esperar pergunta sua.

## A edição

**"O Que Parecia Conferido"**, a #5, está no ar. Link: `https://gusworld.site/pt/?ed=5`. Cobre 22 de julho
a 8 de agosto: o mês em que o GusWorld tirou o motor antigo de baixo do novo, conferiu se o que sobrou
continuava de pé, e no fim mediu o tamanho do que ficou.

## O teu achado do menu inicial (22/07) virou peça própria, não linha dentro de matéria alheia

Em 22 de julho, por feedback de playtest, você apontou que o menu inicial mostrava a cena de onde o
jogador estava, em vez de ter arte própria. Registro exato, do `TODO.md` do jogo:

> "o menu inicial (so ele) em geral tem alguma arte, ou animacao por tras, e nao a tela de onde o
> jogador estava"

Isso não entrou como citação dentro de outra matéria. Levamos duas opções ao teu pai (carta curta ou
guardar para depois); ele recusou as duas e mandou virar reportagem. A frase dele, verbatim:

> "Achados do gus sempre são especiais."

Virou lei escrita, adendo datado da nossa L-24: achado teu não é item de lista nem linha dentro de peça
alheia, tem tratamento editorial próprio, e o tamanho da peça se decide pelo achado, nunca pelo espaço
que sobra na edição. Endereço próprio na página: `https://gusworld.site/pt/?ed=5#sec-04-menu`.

## O teu playtest de 07/08 é a matéria de capa

Teu pai jogou o demo inteiro (título, cidade, diálogo, combate, vitória) e não achou nada fora do lugar.
Você jogou depois e achou dois problemas de colisão. A causa não foi sorte nem outro jeito de jogar: você
estuda jogos, e o filtro que você usa para essa classe de defeito é mais especializado que o dele. Você
foi procurar aquele erro sabendo que ele é comum. Encontrou.

Crédito nos dois papéis, como sempre: Gus Dragon, playtester e Revisor Adversarial de Design.

## A tua pergunta de 08/08 fecha a reportagem

Você perguntou quantas linhas de código o projeto tem. A resposta não foi chutada, foi contada na hora,
direto do repositório: cerca de 163 mil linhas ao todo. O código de teste sozinho, 78.200 linhas, é mais
que o dobro do código do próprio jogo, 62.700. É o fecho da matéria.

A sessão do site.
```

---

## Verificação (número impresso mesmo quando zero)

1. **Contagem de caracteres do post do X**, contando o link como 23 caracteres (convenção do t.co, mesma
   usada em `2026-07-25_edicao-2-post.md`) e cada quebra de linha como 1 caractere:
   - PT sem declaração de IA: **659**
   - PT com declaração de IA: **744**
   - EN sem declaração de IA: **714**
   - EN com declaração de IA: **804**
   Todas cabem com folga no limite de 25.000 da conta X Premium do líder. Contagem feita à mão (palavra por
   palavra, com o link fixado em 23); como toda contagem manual, recomendo colar o texto escolhido na caixa
   de composição do X antes de postar e confirmar o número que a própria ferramenta mostrar.
2. **Travessão longo (o caractere Unicode U+2014), meia-risca (U+2013) ou `--`**: contei nos dois textos (as
   quatro versões do post e o recado ao Gus Dragon, incluindo esta própria nota de verificação). **Ocorrências: 0.**
3. **O endereço `https://gusworld.site/pt/?ed=5` aparece no post**: confirmado, nas quatro versões (as duas
   PT e, por instrução recebida (ver ressalva no início do documento), também nas duas EN).
4. **Palavras da lista proibida no recado ao Gus Dragon** ("com apenas 11 anos", "impressionou",
   "surpreendeu", "que fofo", "o pequeno", exclamação de efeito, adjetivo de ternura): contei. **Ocorrências:
   0.** Conferido também o caractere `!`: zero ocorrências no documento inteiro, incluindo os dois textos e
   este relatório.
5. **Ocorrências de "Gus Dragon" sem os dois papéis no primeiro crédito nominal**: o nome completo aparece
   uma única vez no recado ("Gus Dragon, playtester e Revisor Adversarial de Design"), já com os dois papéis
   no mesmo lugar. **Ocorrências sem os dois papéis: 0.**
6. **`git status`**: não executei nenhum comando de git nesta tarefa (a ferramenta não está disponível para
   este agente); nenhum arquivo além de `docs/editorial/LANCAMENTO-EDICAO-5.md` foi tocado. Peço que a
   thread principal confira `git status` no fechamento, como pedido.

## O que eu NÃO toquei (confirmando as cercas)

Não editei `src/`, `public_html/`, `data/`, `TODO.md`, nem qualquer arquivo em `docs/legal/` ou `src/i18n/`.
Não derrubei nem reiniciei nenhum servidor. Não commitei nada. O único arquivo criado é este.
