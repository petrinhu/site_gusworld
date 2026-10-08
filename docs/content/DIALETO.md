# Dialeto do texto-fonte (para quem escreve em `docs/content/`)

Item `CONVERSOR-MD`. Fonte: seções 2.1 e 2.2 de `docs/tecnico/PLANO-CONVERSOR.md`, medidas nas edições #4, #5 e #6.
O conversor **não inventa sintaxe**: ele lê o que os redatores já escrevem. Esta página diz o que cada marca vira
no HTML da revista, para quem escreve saber o que o programa vai entender, e o que ele recusa.

A regra de ouro da fonte única: **a correção de texto se faz no `.md` e se gera de novo; nunca no partial gerado.**

## Cabeçalhos de bloco (decisão P5)

Da Edição #6 em diante, cada idioma abre com exatamente `## pt-BR` ou `## EN`, e o bloco termina em uma linha só
com `---`. A #5 fica intocada (as variantes dela são resolvidas pela receita, não pelo texto).

- Tudo antes do primeiro bloco (linhas que começam com `>`) é nota interna e é ignorado.
- Tudo de `## Notas de produção` em diante é interno e nunca é lido. Pode ter travessão, rascunho, lembrete.

## A tabela do dialeto

| Construção no `.md` | Vira no partial | Onde aparece |
|---|---|---|
| `## pt-BR` / `## EN` | início de bloco de idioma | todas |
| `---` sozinho na linha | fim de bloco | todas |
| `> ...` antes do primeiro bloco | nota interna, ignorada | cabeçalho de todo arquivo |
| `## Notas de produção` em diante | interno, nunca lido | todas |
| parágrafo (linhas não vazias seguidas) | `<p>texto</p>` | prosa |
| `` `x` `` dentro de parágrafo | `<code>x</code>` | sec-04 (`engine/`) |
| linha inteira `` `persona@glyfesse:~/caminho$ fala` `` | `<p class="fala"><span class="prompt">persona@glyfesse:~/caminho$</span> <span class="dito">fala</span></p>` | galeria, errata, nota |
| linha inteira `` `// texto` `` | `<p class="pensa">texto</p>` | idem |
| linha inteira `` `/* texto */` `` | `<p class="pensa longo">texto</p>` | idem |
| bloco cercado (` ``` `) com fala e pensamentos | os mesmos `<p>` acima; linha quebrada à mão é **juntada com um espaço** | editorial, entrevista |
| bloco cercado só com 2 ou mais `//` | `<div class="pensa-bloco">` com os `<p class="pensa">` recuados 2 espaços | editorial |
| pensamento de persona que não é o Gus | classe extra com o nome do prompt: `pensa jaci`, `pensa jaci longo` (na #4, `volt`) | entrevista |
| `//by: gus@glyfesse` | `<p class="pensa assinatura">by: gus@glyfesse</p>` | menu da sec-04 |
| `### Título` dentro do bloco | `<h3>Título</h3>` | galeria, reportagem |
| `- item` | `<ul class="...">` com `<li>` recuados 2 espaços; a classe vem da receita (`placar`) | nota |
| linha só com número (`1`, `2`...) num bloco cercado | separador de resposta numerada | respostas da entrevista |

Separação na saída: elementos do mesmo grupo de voz saem em linhas seguidas; grupos e parágrafos são separados por
uma linha em branco; o arquivo termina em `\n`.

## Escape e HTML cru

- Só `&`, `<` e `>` são escapados. Aspas ficam literais, como nos partials publicados.
- **HTML cru na fonte é recusado.** O conversor tem uma lista fechada de construções; qualquer outra é erro com
  arquivo e linha.

## Prompt fora do padrão

Linha de prompt que não siga `persona@glyfesse:caminho$` (por exemplo `persona@glyfesse` sem `:caminho$`, ou o formato
antigo `root@glyfesse>`) é **erro com arquivo e linha**. Esse formato só existe em seções recorrentes que ficam
fora do conversor.

## As quatro travas de copy (R1 a R4)

As travas leem **só os blocos publicáveis** (nunca nota interna nem `## Notas de produção`) e apontam
`arquivo:linha: regra: trecho`.

- **R1. Fala sem ponto final.** O texto da fala não termina em `.` isolado. Reticências (`...`) são permitidas, por canon.
- **R2. Pensamento sem ponto final.** Mesma regra, para `//` e `/* */`.
- **R3. Zero travessão.** Nenhum U+2014, U+2013, `&mdash;` ou `&ndash;` em texto publicável.
- **R4. A marca decide a classe.** `//` é comum, `/* */` é longo. A trava reprova se a marca contradiz o
  comprimento: texto **sem a marca** com até 72 caracteres (`mb_strlen`) pede `//`; acima de 72 pede `/* */`.
  O conversor **nunca** troca a classe por conta própria.

Fica fora das travas: lápide (com `&#8224;`), que é molde à mão.
