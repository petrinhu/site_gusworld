# Glyfesse #7: Copies curtas (rascunho v1)

> **Status: RASCUNHO v1, submeter ao líder.** Escrito pelo `ux-writer` em 03/11/2026 a partir de `docs/editorial/BRIEFS-EDICAO-7.md` (§4.12) e do molde `docs/content/edicao-6-copies-curtas.md`. Nada aqui é aprovado. Toda fala e todo `//` do Gus, e toda fala do root, é "submeter ao líder" (L-08 do site, T7).
> **Onze peças, cada uma com bloco `## pt-BR` e bloco `## EN`.** Formato: `docs/content/DIALETO.md` (cada idioma abre com `## pt-BR` ou `## EN` e fecha com `---`). Peças: 1 Nota (5) · 2 Detonado (8) · 3 Errata (9) · 4 Classificados (10, reuso) · 5 Próximos Lançamentos (12) · 6 Pôster (13) · 7 Brinde (14, reuso) · 8 Expediente, linha da Entrevista (19) · 9 Expediente, linha da HQ (19) · 10 Expediente, nota do editor (19) · 11 Dek da capa.
> **Fora deste arquivo, de propósito:** Cartas (9) é cheia e tem arquivo próprio (`docs/content/edicao-7-cartas.md`); Cupom (15) é recorrente; a Reportagem tem a própria linha de declaração. As linhas do Expediente que não cabem nas onze peças (crédito do Gus Dragon, tradução geral, direitos, brinquedo) estão propostas nas Notas de produção, para decisão do líder.

---

## 1. Seção 5, A Nota

> Molde: `src/content/edicao-5/pt/sec-05.php` (receita `classe_lista: placar`), como na #6. Gate A11 adaptado à #7: nenhuma linha diz "parado", "sem ponto novo" nem "a mesma cara". O fato vem do registro de 03/09 (Notas, item 1.2). Fala e `//` do Gus: submeter.

## pt-BR

`gus@glyfesse:~/nota$ a nota`

Como dar nota a um jogo que ainda não tem código? Assim:

- Código do jogo: nenhum, até 3 de setembro
- Prazo: nenhum
- Nota: em branco

`// eu disse que a nota subia a cada edição... agora não tem o que subir`

---

## EN

`gus@glyfesse:~/nota$ the grade`

How do you grade a game that doesn't have code yet? Like this:

- Game code: none, as of September 3
- Deadline: none
- Grade: left blank

`// i said the grade went up every issue... now there is nothing to raise`

---

## 2. Seção 8, Detonado (vazio com graça)

> Molde: `docs/content/edicao-6-copies-curtas.md`, peça 2, reescrita. O limite é 03/09 (T1): nada de 20/08 e nada do "pararam de compilar" da #6. Não nomeia o Gus Dragon (T4). Fala e `//` do Gus: submeter.

## pt-BR

`gus@glyfesse:~/detonado$ detonado`

Esta edição não tem detonado. Até 3 de setembro não existia código de jogo, e um passo a passo de algo que não roda seria ficção. Volta quando houver por onde começar.

`// ainda tem decisão sem resposta. não vou chutar pra ter o que mostrar`

---

## EN

`gus@glyfesse:~/detonado$ walkthrough`

This issue has no walkthrough. Until September 3 there was no game code, and a step-by-step for something that does not run would be fiction. It comes back when there is somewhere to start.

`// decisions still open. i won't guess to have something to show`

---

## 3. Seção 9, Errata (vazio com graça)

> Molde: `docs/content/edicao-6-copies-curtas.md`, peça 3, só a parte da Errata (a Cartas é cheia e fica fora). **Condicional:** a Errata só vale vazia se a prova da #6 em produção não achou erro real (pauta §3, item 9; Notas, item 1.1). O contador "Seis edições no ar" está medido em `data/edicoes.php` (Notas, item 2). Fala e `//` do Gus: submeter.

## pt-BR

`gus@glyfesse:~/errata$ errata`

Seis edições no ar, e nenhum erro achado desta vez.

`// nenhum erro achado também sai quando ninguém olhou direito`

---

## EN

`gus@glyfesse:~/errata$ errata`

Six issues in print, and no error found this time.

`// no error found also comes out when nobody looked properly`

---

## 4. Seção 10, Classificados (reuso da #1)

> Reuso literal da #1, sem copy nova: `src/content/edicao-1/pt/sec-10.php` (pt) e `src/content/edicao-1/en/sec-10.php` (en). O texto não é colado aqui: o partial da #1 é montado à mão, mantém o prompt antigo `nome@glyfesse>` (que o conversor recusa, `DIALETO.md:47-51`) e já foi aprovado e publicado. Decisão para o main: manter o partial como está, pelo precedente da #6.

## pt-BR

REUSO-EDICAO-1-CLASSIFICADOS

---

## EN

REUSO-EDICAO-1-CLASSIFICADOS

---

## 5. Seção 12, Próximos Lançamentos (vazio com graça)

> Linha de sempre do root, como na #6 (a primeira linha). A segunda linha é nova e só diz o fato de 03/09: não há prazo (`archive/20260903-0531-gusworld-onda-da-bateria-e-do-porte.md:135`, "Sem prazo, por regra da casa"). Não reconta a versão nova da biblioteca de 20/08 (T1). A linha nova é rascunho para o líder. Caminho `~/proximos`: o mesmo da #6, preenchimento.

## pt-BR

`root@glyfesse:~/proximos$ próximos lançamentos`

A intenção é semanal. Mais ou menos... 'devezenquandal' fica mais fácil de afirmar.

Desta vez, nenhum prazo. Nem semanal, nem devezenquandal.

---

## EN

`root@glyfesse:~/proximos$ what's next`

The intention is weekly. More or less... 'every-so-oftenly' is easier to promise.

This time, no deadline. Not weekly, not every-so-oftenly.

---

## 6. Seção 13, Pôster central (imagem do líder, gerada no Grok Imagine)

> **Status: aprovada a imagem pelo líder; alt e ficha a conferir no render.** O líder entregou o pôster (03/11/2026, verbatim: "o poster está em [imagem]. ANtes ponha o arquivo na pasta certa e depois use"). Arquivo público: `public_html/assets/edicao-7/poster-edicao-7.jpg` (1.408 × 1.408, manifesto C2PA do Grok Imagine conferido pelo main; original em `resources/arquivo_pessoal_petrus/`, fora do repositório). Molde de estrutura: `src/content/edicao-5/pt/sec-13.php` e `src/content/edicao-5/en/sec-13.php` (kicker, título, tarja, ficha, crédito). Título, tarja e crédito são propostas minhas, a conferir no render. O vazio anterior (imagem quebrada, "volta na próxima") saiu do bloco; a variante B nas Notas (item 1.3) ficou sem uso.

## pt-BR

encarte destacável
Depois de apagar
e o que ficou
1.408 × 1.408 px · Grok Imagine (geração)
Vista de cima de uma mesa de madeira escura, azul-marinho. Há contornos claros de objetos que já não estão lá, retângulos e um círculo, e no centro uma única folha pautada em branco. Uma luz ciano fraca vem da borda de baixo.
Glyfesse nº 7 · pôster central
destaque pela dobra

---

## EN

pull-out insert
After the delete
and what was left
1,408 × 1,408 px · Grok Imagine (generation)
Top-down view of a dark, navy-blue wooden table. Pale outlines of objects that are no longer there, rectangles and a circle, and in the center a single blank ruled sheet. A faint cyan light comes from the bottom edge.
Glyfesse no. 7 · centrefold
tear along the fold

---

## 7. Seção 14, Brinde (reuso da #1)

> Reuso literal da #1, sem copy nova: `src/content/edicao-1/pt/sec-14.php` e `src/content/edicao-1/en/sec-14.php` (dois cards: a fonte PixelOperatorMono, com download real do `.woff2`, e o papel de parede em SVG). Não é colado aqui, pelo mesmo motivo da peça 4. O card da fonte declara CC0; a linha de direitos proposta nas Notas (item 1.4) precisa conferir essa afirmação.

## pt-BR

REUSO-EDICAO-1-BRINDE

---

## EN

REUSO-EDICAO-1-BRINDE

---

## 8. Seção 19, Expediente: linha da Entrevista

> Molde: `src/content/edicao-6/pt/sec-19.php:25` (a linha de respostas de pessoa real da #6, com o nome do homenageado da #6 omitido por T9), trocada pelos fatos da #7. Três fatos: respostas de pessoa real, sem nome; tradução de agente de IA, aprovada pelo editor, que reproduz erros de digitação equivalentes aos do original (D9); perguntas do Gus de agente de IA, aprovadas. O nome real não entra (T9). Linha seca, no colofão.

## pt-BR

As respostas do Brunus são de uma pessoa real, publicadas palavra por palavra. A tradução delas para o inglês é de agente de IA, aprovada pelo editor, e reproduz de propósito erros de digitação equivalentes aos do original. As perguntas do Gus são rascunho de agente de IA, aprovado pelo editor.

---

## EN

Brunus's answers come from a real person, published word for word. Their English translation is by an AI agent, approved by the editor, and deliberately reproduces typing errors equivalent to the original's. Gus's questions are a draft by an AI agent, approved by the editor.

---

## 9. Seção 19, Expediente: linha da HQ

> Molde: a linha de IA da #6 (`src/content/edicao-6/pt/sec-19.php:23`, tirinha), trocada. A linha antiga, "arte do jogo gerada por IA e declarada no rodapé", **sai**: a HQ não tem imagem nem sprite (`docs/content/edicao-7-hq-roteiro.md:4`, "Nenhuma imagem, nenhum desenho, nenhuma personagem em cena"). Sem nome de artista (a #6 tinha). Roteiro e arte são de agentes de IA (D11 e D19, `docs/editorial/PAUTA-EDICAO-7.md:569, 579`).

## pt-BR

A HQ desta edição foi criada pela revista: roteiro e arte de agentes de IA, aprovados pelo editor. Não houve artista nesta edição.

---

## EN

The comic in this issue was made by the magazine itself: script and art by AI agents, approved by the editor. There was no artist in this issue.

---

## 10. Seção 19, Expediente: nota do editor

> Fala do root, **submeter ao líder; ele reescreve como quiser.** Responde a `src/content/edicao-6/pt/sec-19.php:36`, a nota da #6, e mantém a ideia de decisão própria em outra forma. Não narra a causa (é da Reportagem). Não usa as palavras de T2: aqui não há citação do líder. Não nomeia o Gus Dragon (T4) e não cita dinheiro (T3).

## pt-BR

`root@glyfesse:~/expediente$ nota do editor`

Na edição passada eu mandei quebrar, e disse que a decisão era minha. Esta edição conta o que veio antes e o que ficou guardado. A decisão de apagar foi minha. A frase que a explica também. As duas estão aqui, com as datas.

---

## EN

`root@glyfesse:~/expediente$ editor's note`

Last issue I ordered it broken, and said the call was mine. This issue tells what came before and what was kept. The decision to delete was mine. The sentence that explains it is too. Both are here, with their dates.

---

## 11. Dek da capa

> Dek proposto (a pauta, §7, ainda não tinha proposta; D3 e D7 já estão fechadas). Voz factual do editor, sem as palavras de T2 e sem dizer se o recomeço deu certo (a Reportagem diz que não diz). Tamanho: bem abaixo do dek da #6 (`data/edicoes.php:277-279`, cerca de duas frases longas). Título, fora deste bloco: "Apagar Tudo" / "Delete Everything" (D3, `docs/editorial/PAUTA-EDICAO-7.md:330`). Vai ao GATE-COPY.

## pt-BR

Três projetos apagados em agosto e recomeçados com arquivos de regras escritas. Esta edição vai até 3 de setembro.

---

## EN

Three projects deleted in August and restarted with written rule files. This issue runs to September 3.

---

## Notas de produção (internas, não publicar)

### 1. Pendências, propostas e decisões para o líder e o main

1. **Errata condicional.** A peça 3 só vale vazia se a prova da #6 em produção não achou erro real (pauta §3, item 9; brief §4.12, item 3). Não conferi essa prova: não tenho acesso a ela neste passo. Se a prova achar erro, a Errata vira cheia (precedente D9 da #5) e a peça 3 muda.
2. **Fonte da Nota e do Detonado (divergência de atribuição).** O brief aponta o ledger, `HISTORICO_GUS_ECOSSISTEMA.md:159`, que atribui ao líder a frase de que não existe código de jogo, nada roda e não há prazo. O arquivo do bus com a data de 03/09 que trata desse estado, `archive/20260903-0531-gusworld-onda-da-bateria-e-do-porte.md:11, 133-135`, é a mensagem da sessão do jogo ("Estado do projeto, medido"), e não atribui a frase ao líder. Por isso **os fatos entram nas peças sem atribuição a pessoa**. Antes do GATE-CONTEUDO, o líder ou o main confere a mensagem do Gus de 03/09 (issue 8, ledger `:155`) e diz qual é a fonte da frase, se o líder quiser atribuí-la.
3. **Pôster, variante B** (obsoleta desde que o pôster chegou, 03/11/2026; fica só como registro): pt "O pôster desta edição não carregou." / "img/poster.png · 404 · nada roda, nem a imagem". en "This issue's poster did not load." / "img/poster.png · 404 · nothing runs, not even the image".
4. **Linha de direitos do colofão (proposta para `compliance-legal`).** Padrão, como a #4 e a #5 publicaram: `src/content/edicao-5/pt/sec-19.php:39` e `src/content/edicao-4/pt/sec-19.php:23`, "Todos os direitos reservados." Sem a tirinha de artista, a exceção da #6 ("exceto a tirinha, de André Farias") cai. **Alternativa, se o compliance achar que a fonte CC0 precisa de linha:** "Todos os direitos reservados. Fonte PixelOperatorMono: CC0, domínio público." (en: "All rights reserved. PixelOperatorMono font: CC0, public domain."). O card da peça 7 declara CC0 (`src/content/edicao-6/pt/sec-14.php:29`), e as edições #1 a #6 publicaram esse card sem linha de exceção. Rodapé: a #6 cita `src/i18n/pt.php:264` (não abri esse arquivo) e nomeia PixelLab e Grok Imagine. **Pergunta ao compliance e ao líder:** a HQ desta edição é CSS feito por agente de IA, sem imagem gerada; o rodapé precisa de linha nova para ela ou não? (`docs/editorial/PAUTA-EDICAO-7.md` §3, item 19, cita a regra por peça.)
5. **Crédito do Gus Dragon.** O orquestrador pediu o crédito "onde couber". Não há precedente na #6, e os créditos já estão nas peças dele (Cartas, Galeria, caixa). Proposta, fora dos onze blocos, para o líder escolher o lugar. Forma seca dos dois papéis (T4): pt "Galeria de Bugs, Cartas e caixa do determinismo: Gus Dragon, playtester, Revisor Adversarial de Design." en "Bug Gallery, Letters and the determinism box: Gus Dragon, playtester, Adversarial Design Reviewer." Os nomes em inglês das seções precisam ser conferidos com os títulos EN aprovados.
6. **Linha de tradução (proposta, fora dos onze blocos, ao lado da linha "Texto: rascunhado com agentes de IA e revisado pelo editor", que a #6 publicou e continua verdadeira).** pt "As traduções para o inglês são de agente de IA, aprovadas pelo editor." en "The English translations are by an AI agent, approved by the editor." A entrevista já tem a sua própria tradução na peça 8, então esta linha cobre as demais seções. O título em inglês ("Delete Everything") foi opção escolhida pelo líder na D3 (`docs/editorial/PAUTA-EDICAO-7.md:330`), e não entra nesta linha como tradução de agente sem confirmação do líder.
7. **Linha do brinquedo (proposta, fora dos onze blocos).** O brinquedo desta edição (B1, o portão de bolso, `docs/editorial/PAUTA-EDICAO-7.md` §8.2) tem código novo, e a pauta (§3, item 19) manda declarar isso. Proposta pt "O brinquedo desta edição tem código novo, escrito por agente de IA e aprovado pelo editor." en "This issue's toy has new code, written by an AI agent and approved by the editor." Vai junto com o brinquedo, quando ele existir; não é peça 12 deste arquivo.
8. **Título no Expediente.** O título sai de `data/edicoes.php` (ficha da #7, `:317-331`, ainda vazia). Não precisa de linha própria: a tradução "Delete Everything" está coberta pela linha geral da item 6.
9. **Reusos (Classificados e Brinde).** O partial da #1 é montado à mão e não passa pela receita. O prompt antigo `nome@glyfesse>` do Classificados fica como está, pelo precedente da #6. Decisão do main, não minha.
10. **Contagem dos `//`.** Feita a mão, pelo critério R4 (texto sem a marca, até 72 caracteres pede `//`): ver a seção 4 destas Notas.
11. **"Não houve artista nesta edição" (peça 9).** Mantive a frase no bloco, porque o pedido do orquestrador a lista como declaração obrigatória. O revisor sugeriu levá-la a variante, porque o brief §4.12 (item 9) pede só "roteiro e arte de agentes de IA, aprovados pelo editor". **Decisão do líder:** no bloco, ou só na nota da peça.
12. **Riscos de voz (L-08 e L-25), para o líder ver.** (a) Peça 2, `//` "eu sei disso melhor que ninguém": lido de dentro, sugere que o Gus sabe que está num jogo que não roda. Variante: "// não roda ainda. ninguém precisa me lembrar disso". (b) Peça 1, `//` "eu disse que a nota subia a cada edição... agora não tem o que subir": repete quase verbatim a abertura do `//` da #6 (`docs/content/edicao-6-copies-curtas.md`, peça 1). É eco deliberado; se o líder não quiser o eco, alternativa: "// a nota ia subir... agora nem dá pra medir". (c) Dek: "arquivos de regras escritas" está alinhado com `docs/content/edicao-7-reportagem.md:16`.

### 2. Fontes (arquivo:linha) e marcação FATO / INFERÊNCIA

| Afirmação no texto | Fonte | Marcação |
|---|---|---|
| Seis edições publicadas (#1 a #6); a #7 é rascunho | `data/edicoes.php:48, 84, 119, 159, 207, 268` (estado `publicada`); `:320` (#7 `rascunho`) | FATO (lido) |
| Até 3 de setembro, sem código de jogo; sem prazo | `archive/20260903-0531-gusworld-onda-da-bateria-e-do-porte.md:11, 133-135` | FATO (lido); a atribuição ao líder não é confirmada aqui (item 1.2) |
| Frase ao Gus sobre o estado e o prazo | `HISTORICO_GUS_ECOSSISTEMA.md:159` (memória, ledger) | FATO do ledger; atribuição a verificar (item 1.2) |
| Sem prazo, por regra da casa | `archive/20260903-0531-...:135` | FATO (lido) |
| HQ sem imagem nem sprite; só CSS e texto de tela | `docs/content/edicao-7-hq-roteiro.md:4` | FATO (lido) |
| Roteiro e arte da HQ por agente de IA, aprovados (D11, D19) | `docs/editorial/PAUTA-EDICAO-7.md:569, 579` e `:725-727` | FATO (lido) |
| Respostas do Brunus de pessoa real, palavra por palavra, sem nome; tradução de agente, aprovada; erros imitados (D9) | `docs/content/edicao-7-entrevista-brunus-respostas.md:139-170` (Notas) | FATO (lido) |
| Perguntas do Gus aprovadas em 07/10/2026 | `docs/content/edicao-7-entrevista-brunus-perguntas.md:3` | FATO (lido) |
| Linhas-molde do colofão da #6 | `src/content/edicao-6/pt/sec-19.php:20-29, 36`; `src/content/edicao-6/en/sec-19.php` | FATO (lido) |
| Título "Apagar Tudo" / "Delete Everything" (D3) | `docs/editorial/PAUTA-EDICAO-7.md:330` | FATO (lido) |
| Classificados e Brinde reaproveitados da #1 | `src/content/edicao-1/{pt,en}/sec-10.php` e `sec-14.php` (existem; conteúdo do #1 conferido pelo cabeçalho da #6 e pela leitura de `src/content/edicao-1/en/sec-10.php` e `en/sec-14.php`) | FATO (lido, en); pt conferido pela cópia na #6 (`src/content/edicao-6/pt/sec-10.php`, `sec-14.php`) |
| Card da fonte diz "É CC0, domínio público" | `src/content/edicao-6/pt/sec-14.php:29` (a #6 diz que é idêntico à #1) | FATO (lido) |
| Pôster da #6 e a legenda "volta na próxima" | `src/content/edicao-6/pt/sec-13.php:43-44` | FATO (lido) |
| Dek da #6 com duas frases longas | `data/edicoes.php:277-279` | FATO (lido); "bem abaixo" é juízo meu (INFERÊNCIA) |
| Linha de direitos da #6 e exceção da tirinha | `src/content/edicao-6/pt/sec-19.php:29` | FATO (lido) |
| Rodapé com PixelLab e Grok Imagine | `src/i18n/pt.php:264` | citado pela #6 (`edicao-6-copies-curtas.md`, Notas); **não aberto por mim** |
| Os textos de Nota, Detonado, Próximos, Errata e os `//` do Gus, e a nota do editor | redação minha, sob T7 e L-08 | INFERÊNCIA minha, submeter |
| "A decisão de apagar foi minha" | a frase é do root, mas a decisão de apagar está nas peças da Reportagem (`docs/content/edicao-7-reportagem.md:30-34`) e a #6 registra a ordem do líder (`sec-19.php:36`) | FATO de origem (pauta §16, D7); o texto da nota é redação minha |

### 3. Verificação do passo 5 (Grep da ferramenta, sem Bash)

Feito com a ferramenta Grep sobre o arquivo gravado (sem Bash, então não é `/usr/bin/grep`; o resultado é o mesmo critério):

| Verificação | Resultado |
|---|---|
| Travessão U+2014 e meia-risca U+2013 | 0 |
| Travessão escrito como entidade HTML (as duas formas) | 0 |
| Palavras da T2 (lista no brief §1) e termos proibidos na voz da revista | 0 |
| Termos de L-25 (lista no brief §1) e nomes de pessoas reais dos homenageados | 0 |
| Emoji (`\p{Extended_Pictographic}`) | 0 |
| Falas ou `//` terminados em ponto final (R1 e R2) | 0 |
| Blocos `## pt-BR` e `## EN` | 11 e 11 (22 cabeçalhos) |

Conferência à mão: os `//` estão no critério R4 (tabela abaixo). Nenhuma `/* */`.

### 4. Contagem dos `//` (critério R4, texto sem a marca, até 72 caracteres pede `//`)

| Peça | Idioma | Texto | Caracteres | Marca |
|---|---|---|---|---|
| 1 Nota | pt | eu disse que a nota subia a cada edição... agora não tem o que subir | 67 | `//` |
| 1 Nota | en | i said the grade went up every issue... now there is nothing to raise | 68 | `//` |
| 2 Detonado | pt | ainda tem decisão sem resposta. não vou chutar pra ter o que mostrar | 69 | `//` |
| 2 Detonado | en | decisions still open. i won't guess to have something to show | 60 | `//` |
| 3 Errata | pt | nenhum erro achado também sai quando ninguém olhou direito | 59 | `//` |
| 3 Errata | en | no error found also comes out when nobody looked properly | 57 | `//` |

Nenhum `/* */` nesta edição. Nenhuma fala nem `//` termina com ponto (R1 e R2).

### 5. Tabela de ocorrências (para a receita e para o `frontend-engineer`)

| # | Peça | Seção | `## pt-BR` é a ocorrência | `## EN` é a ocorrência | Ligar na receita? |
|---|---|:-:|:-:|:-:|---|
| 1 | Nota | 5 | 1 | 1 | sim, classe `placar` (receita) |
| 2 | Detonado | 8 | 2 | 2 | sim, fonte de texto |
| 3 | Errata | 9 | 3 | 3 | sim, só a Errata (a Cartas é cheia e tem arquivo próprio) |
| 4 | Classificados | 10 | 4 | 4 | não: marcador `REUSO-EDICAO-1-CLASSIFICADOS`; partial da #1 |
| 5 | Próximos Lançamentos | 12 | 5 | 5 | não: partial montado à mão; o bloco é fonte de texto |
| 6 | Pôster | 13 | 6 | 6 | não: partial montado à mão, a partir da estrutura da #5; imagem em `public_html/assets/edicao-7/poster-edicao-7.jpg` |
| 7 | Brinde | 14 | 7 | 7 | não: marcador `REUSO-EDICAO-1-BRINDE`; partial da #1 |
| 8 | Expediente, linha da Entrevista | 19 | 8 | 8 | não: colofão montado à mão (`sec-19`); o bloco é fonte de texto |
| 9 | Expediente, linha da HQ | 19 | 9 | 9 | não: idem |
| 10 | Expediente, nota do editor | 19 | 10 | 10 | não: idem |
| 11 | Dek da capa | capa | 11 | 11 | não é partial: vai a `data/edicoes.php` (`dek_pt`, `dek_en`) |

Os marcadores `REUSO-EDICAO-1-*` e o `ENTREVISTA-PENDENTE` da #6 servem para a varredura pré-GO: nenhum deles pode aparecer em partial publicado. As linhas propostas nas Notas 1.4 (direitos), 1.5 (crédito do Gus Dragon), 1.6 (tradução) e 1.7 (brinquedo) ficam fora desta tabela até o líder decidir.

### 6. Respostas do líder (03/11/2026, AskUserQuestion, verbatim) e status

- **Peças 1, 2 e 3 (Nota, Detonado, Errata):** "Trocar só esse pensamento (Recomendado)" (03/11/2026, verbatim). Nota e Errata ficam como estão, com os pensamentos. O pensamento do Detonado foi trocado (L-25 do site: "Para ele, GusWorld é REAL"). **Detonado, pensamento:** "Não vou chutar (Recomendado)" (03/11/2026, após 17:54:53, verbatim). Gravado no bloco (item 6.1).
- **Peças 8, 9 e 10 (Expediente):** "Aprovo como está". **Aprovadas.** Com isso, a frase "Não houve artista nesta edição" (peça 9) fica no bloco (resolve a pergunta 2 do relatório anterior).
- **Peça 11 (dek):** "Aprovo". **Aprovada**, como está.
- **Peça 6 (pôster): aprovada a imagem pelo líder** (03/11/2026, verbatim: "o poster está em [imagem]. ANtes ponha o arquivo na pasta certa e depois use"). Alt e ficha a conferir no render. Ficha: "1.408 × 1.408 px · Grok Imagine (geração)" (pt) e "1,408 × 1,408 px · Grok Imagine (generation)" (en). Arquivo: `public_html/assets/edicao-7/poster-edicao-7.jpg`. Verbatim: "me de um prompt para eu gerar um poster no grok, que tenha a ver com a edicao". O líder vai gerar o pôster. Bloco não apagado (ver item 6.2).
- **Peças 4 (Classificados), 5 (Próximos Lançamentos) e 7 (Brinde):** "Aprovo como está" (03/11/2026, verbatim). **Aprovadas.** Reusos da #1 e linha nova de Próximos, como estão.
- **Resumo do estado (03/11/2026):** aprovadas as peças 1 a 5 e 7 a 11, com o verbatim acima. A peça 6 (pôster) tem a imagem aprovada pelo líder; alt e ficha seguem para conferir no render.
- **Decisões do main, aplicadas nesta rodada:** (a) a frase "não há código de jogo" fica sem atribuição a pessoa (Notas 1.2); (b) o crédito do Gus Dragon não entra no Expediente (Notas 1.5 fica só como registro); (c) a linha de direitos segue o padrão da #4 e da #5, "Todos os direitos reservados." (Notas 1.4); (d) a linha de tradução segue o padrão, pt "As traduções para o inglês são de agente de IA, aprovadas pelo editor." e en "The English translations are by an AI agent, approved by the editor." (Notas 1.6). A linha de tradução específica da entrevista continua na peça 8.

#### 6.1 Pensamento do Detonado (peça 2): escolhido

Escolha do líder: "Não vou chutar (Recomendado)" (03/11/2026). Gravado no bloco, pt `// ainda tem decisão sem resposta. não vou chutar pra ter o que mostrar` e en `// decisions still open. i won't guess to have something to show`. As duas alternativas não escolhidas existiram e foram apagadas deste arquivo.

#### 6.2 Pôster no Grok: prompt proposto ao líder (para ele gerar)

Prompt pt, formato quadrado 1:1, para casar com a chapa de 1.408 × 1.408 da #5:

> Pôster quadrado, fundo azul-marinho quase preto. No centro, uma lousa de pedra escura e lisa, metade já apagada, com um rastro de apagador cortando a superfície. Luz fria de tela vinda de cima, sem brilho excessivo. Sem personagem, sem rosto, sem dragão, sem brasão, sem logotipo, sem letras nem números na imagem. Espaço livre no terço de baixo para a legenda. Ilustração digital sóbria, linhas limpas, contraste baixo, paleta de azul-marinho, ciano apagado e um toque de magenta.

Motivo das exclusões: o brasão e o logo são do jogo (a #5 os usou em `src/content/edicao-5/pt/sec-13.php:2-10`, com sha256 conferido na origem), e o Grok não deve reproduzi-los; letras geradas por IA saem erradas.

#### 6.3 Declaração do pôster (padrão da #5)

A #5 não tem linha de IA no colofão. A declaração ficou em dois lugares: a ficha técnica da chapa (`src/content/edicao-5/pt/sec-13.php:57`, "PixelLab (geração) · Grok Imagine (tratamento)") e o rodapé (`src/i18n/pt.php:264`, `src/i18n/en.php:257`). Propostas, no mesmo padrão:

- **Ficha da chapa, pt:** "[dimensão] px · Grok Imagine (geração)". **en:** "[size] px · Grok Imagine (generation)". A dimensão sai do arquivo gerado, não é estimada.
- **Rodapé, pt:** trocar "Grok Imagine (logo, tratado)" por "Grok Imagine (logo, tratado; pôster, gerado)". **en:** "Grok Imagine (logo, refined; poster, generated)". Mudança site-wide: fica com o main e o `compliance-legal`, não foi gravada.
- **Linha do Expediente, opcional (fora do padrão da #5), pt:** "O pôster desta edição foi gerado com Grok Imagine, a partir de um prompt de agente de IA aprovado pelo editor." **en:** "This issue's poster was generated with Grok Imagine, from an AI agent's prompt approved by the editor." Recomendação: não incluir, para não fugir do padrão; a ficha e o rodapé já declaram.

Observação para o main: o rodapé pt (`src/i18n/pt.php:264`) diz "exceto obras de terceiros creditadas no Expediente". A fonte CC0 do Brinde é de terceiro e não tem crédito no Expediente. Conferir com o `compliance-legal`.
