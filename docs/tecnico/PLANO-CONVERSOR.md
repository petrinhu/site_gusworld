# Plano: comando único de testes e conversor de texto para página (site_gusworld)

Autor: Caetano (CTO). Data: 07/10/2026, 17:21. Natureza: PLANO. Nada foi implementado e o repo não foi tocado.
Base: `docs/tecnico/PESQUISA-STACK-2026-10-07.md` e as decisões do líder registradas no fim dela
("Sim, construir agora"; "Sim, fonte única"; "Sim, antes da #6"; "Sim aos dois").

Leis do site que este plano aplica (texto em `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/GODS_LAWS.md`):
L-05 (quem planeja não implementa; implementer, reviewer e orquestrador distintos; sem `name:` no despacho),
L-11 (deploy manual; nada aqui faz deploy), L-12 (render só no Firefox; este plano não muda render),
L-13 (lógica pura extraída e testada, TDD), L-14 (ID no commit e Status tocado no mesmo commit, `🔍` e nunca `✅` direto),
L-17 (sem monolito: uma razão de mudar por unidade), L-23 (prova é o objeto, não a saída do comando).
Globais que casam: L-27 (sabotagem em cópia fora da árvore), L-36 (portão provado vermelho; piso não vazio;
laço item a item), L-43 (critério fixado antes do dado), L-45 (`| tail` e `grep -c` mentem), L-22 (segunda
reprovação pelo mesmo motivo obriga pesquisa antes da terceira).

**Fato x inferência (L-18/L-27).** Tudo marcado "medido" foi medido por mim em 07/10/2026 nesta máquina, com o
comando citado. O resto é desenho meu, para o líder aprovar.

---

## 0. Correção da pesquisa (medido)

A pesquisa disse "10 `.php` e 8 `.js`" em `tests/`. O real é **9 e 9** (`ls tests/*.test.php tests/*.test.js`).
Não grave número no código nem nos documentos: o `testes.sh` imprime a contagem, e é ela que vale.

Medido também: `node --test tests/` **não descobre nada** (1 teste, falha); `node --test 'tests/**/*.test.js'`
roda 162 casos verdes. Os 9 `.test.php` saem com `ALL GREEN (N asserções)` ou `(N assercoes)` e código 0.

---

## 1. O comando único de testes (item `TESTES-CMD`)

### 1.1 O que roda

`scripts/testes.sh` roda **todos** os `tests/*.test.php` e `tests/*.test.js`, **um arquivo por vez** (L-36: lote
que cai no meio esconde cobertura perdida), e nada fora de `tests/`.

- Descoberta por glob do bash (`shopt -s nullglob`), não por `find` (o `find` interativo desta máquina é outro
  programa; o glob é igual em qualquer shell).
- PHP: `php -d display_errors=stderr <arquivo>`, código de saída **lido de variável**, nunca por pipe, e na forma
  que sobrevive ao `set -e` (o `preci.sh` usa `set -euo pipefail`, e com ele `out=$(...); rc=$?` mata o script no
  primeiro teste que falha, sem imprimir contagem): `if out=$(php ... 2>&1); then rc=0; else rc=$?; fi`. Conta como **aprovado** só se `rc == 0` **e** a última linha casa `^ALL GREEN \(([0-9]+) asser`
  com N > 0. Arquivo que sai 0 sem asserção nenhuma reprova (é o "teste que não testa").
- JS: `node --test --test-reporter=tap <arquivo>` (repórter explícito: sem ele a saída muda quando há terminal e as
  linhas `# tests N` podem não existir), rc em variável na mesma forma `if ...; then`; lê `# tests N`, `# pass N`, `# fail N` da saída. Aprovado só se
  `rc == 0`, `tests >= 1` e `pass == tests`.
- Saída obrigatória, **sempre impressa, mesmo com zero**:
  `php: encontrados=A rodados=B aprovados=C falharam=D asserções=E`
  `js:  encontrados=F rodados=G aprovados=H falharam=I casos=J`
  `total: encontrados=... rodados=... falharam=...`
- Reprova (exit 1) se: encontrados = 0 em qualquer linguagem (piso de varredura não vazia); rodados != encontrados;
  qualquer falha; ou total de arquivos abaixo do **piso declarado** `PISO_ARQUIVOS` no topo do script, com o
  valor medido no dia da fatia e um comentário dizendo que apagar teste exige baixar o piso de propósito.
- Parâmetro `--raiz DIR` (padrão: raiz do repo). Existe só para o autoteste apontar para fixtures.

### 1.2 Onde mora

- `scripts/testes.sh` (novo). Fica em `scripts/`, que o `deploy.sh` não envia (ele só sincroniza `public_html/`,
  `src/` e `data/`, medido no próprio script).
- `scripts/preci.sh` (editado): o passo 1 passa a chamar `scripts/testes.sh` **e continua** rodando os testes dos
  mockups (`node --test 'docs/design/mockups/js/**/*.test.js'`, 3 arquivos hoje). Nada é cortado calado.
- `TESTES.md`: uma linha dizendo que o comando da suíte é `scripts/testes.sh`.

### 1.3 Como o pré-push chama (medido)

- `git config --get core.hooksPath` devolve `/home/petrus/.claude/githooks` (vem do `~/.gitconfig` global). O
  `.githooks/pre-push` do projeto não roda por isso.
- O `pre-push` global **não bloqueia nada sozinho**: é um repasse (`_chain.sh`) que executa
  `$(git rev-parse --git-common-dir)/hooks/pre-push` **se existir e for executável**. Hoje não existe
  (`.git/hooks/` só tem os `.sample`).
- **Ativação recomendada:** um arquivo `.git/hooks/pre-push` de uma linha,
  `exec "$(git rev-parse --show-toplevel)/.githooks/pre-push" "$@"`. Mantém os ganchos globais (o portão de
  travessão do pre-commit e o aviso de frescor da TODO do post-commit) e liga o do projeto por baixo deles.
- **Não usar link simbólico:** o `.githooks/pre-push` calcula a raiz por `dirname "${BASH_SOURCE[0]}"/..`; chamado
  por um link em `.git/hooks/`, a raiz vira `.git/` e ele tenta executar `.git/scripts/preci.sh`. A fatia também
  troca esse cálculo por `git rev-parse --show-toplevel`, para o arquivo funcionar de qualquer jeito que for chamado.
- **Não usar `git config --local core.hooksPath .githooks`:** sobrepõe o global neste repo e desliga em silêncio o
  portão de travessão e o aviso de frescor.
- `.git/hooks/` não é versionado: a instalação é um script versionado, `scripts/instalar-gancho.sh`, idempotente,
  que recusa sobrescrever um `.git/hooks/pre-push` diferente do esperado. **Rodá-lo no repo real é decisão do líder**
  (o `preci.sh` diz há meses "nenhum agent mexe na config git do usuário"; ver pergunta 4).

### 1.4 Vermelho de estreia (L-36 global: portão só conta depois de visto reprovando)

`scripts/testes.sh --autoteste` aponta o próprio script para fixtures versionadas em `scripts/testes-fixtures/`
(fora de `tests/`, para não serem descobertas pela suíte real, e fora de qualquer `build*/`, para não caírem no
`.gitignore`). Cada caso tem o código de saída esperado e a contagem esperada:

| Caso | Fixture | Esperado |
|---|---|---|
| A1 | um `.test.php` e um `.test.js` verdes | exit 0, encontrados=2, falharam=0 |
| A2 | `.test.php` com uma asserção invertida | exit 1, falharam=1 |
| A3 | `.test.js` com um caso que falha | exit 1, falharam=1 |
| A4 | `.test.php` que morre com erro fatal antes do `ALL GREEN` | exit 1 |
| A5 | `.test.php` que sai 0 sem asserção nenhuma | exit 1 |
| A6 | `.test.js` sem nenhum caso (`# tests 0`) | exit 1 |
| A7 | diretório vazio (criado em `/var/tmp`, git não versiona pasta vazia) | exit 1, encontrados=0 |

O autoteste imprime `casos=7 conferem=7` e sai 1 se algum caso não bater. Além dele, **o reviewer** (agente
diferente do implementer) faz duas sabotagens na árvore real, **em cópia fora da árvore** (L-27:
`git archive HEAD | tar -x -C /var/tmp/site-stack/sabotagem-N/`), depois do commit: inverter uma asserção de
`tests/volume.test.php` e apagar `tests/som-core.test.js` (piso). As duas devem reprovar; a cópia intacta, aprovar.
A prova do gancho (fatia F3) é um clone descartável em `/var/tmp` com remoto `--bare` local: teste sabotado,
`git push` recusado; teste restaurado, push aceito.

Prova de que as fixtures estão no commit: `git ls-tree -r HEAD scripts/testes-fixtures/` lista todas.

---

## 2. O conversor (itens `CONVERSOR-MD` e `CONVERSOR-ACEITE`)

### 2.1 O formato do texto-fonte em `docs/content` (medido nas #4, #5 e #6)

O dialeto já é estável. O conversor **não inventa sintaxe**: lê o que os redatores já escrevem.

| Construção no `.md` | Vira no partial | Onde aparece |
|---|---|---|
| `## pt-BR` / `## EN` (e variantes, ver 2.4) | início de bloco de idioma | todas |
| `---` sozinho na linha | fim de bloco | todas |
| `> ...` antes do primeiro bloco | nota interna, ignorada | cabeçalho de todo arquivo |
| `## Notas de produção` em diante | interno, nunca lido | todas |
| parágrafo (linhas não vazias seguidas) | `<p>texto</p>` | prosa |
| `` `x` `` dentro de parágrafo | `<code>x</code>` | sec-04 (`engine/`) |
| linha inteira `` `persona@glyfesse:~/caminho$ fala` `` | `<p class="fala"><span class="prompt">persona@glyfesse:~/caminho$</span> <span class="dito">fala</span></p>` | galeria, errata, nota |
| linha inteira `` `// texto` `` | `<p class="pensa">texto</p>` | idem |
| linha inteira `` `/* texto */` `` | `<p class="pensa longo">texto</p>` | idem |
| bloco cercado (` ``` `) com fala e pensamentos | os mesmos `<p>` acima, linha quebrada à mão é **juntada com um espaço** | editorial, entrevista |
| bloco cercado só com 2 ou mais `//` | `<div class="pensa-bloco">` com os `<p class="pensa">` recuados 2 espaços | editorial |
| pensamento de persona que não é o Gus | classe extra com o nome do prompt: `pensa jaci`, `pensa jaci longo` (na #4, `volt`) | entrevista |
| `//by: gus@glyfesse` | `<p class="pensa assinatura">by: gus@glyfesse</p>` | menu da sec-04 |
| `### Título` dentro do bloco | `<h3>Título</h3>` | galeria, reportagem |
| `- item` | `<ul class="...">` com `<li>` recuados 2 espaços; a classe vem da receita (`placar`) | nota |
| linha só com número (`1`, `2`...) num bloco cercado | separador de resposta numerada | respostas da entrevista |

Separação na saída (medida nos partials): elementos do mesmo grupo de voz saem em linhas seguidas; grupos e
parágrafos são separados por uma linha em branco; arquivo termina em `\n`.

**Escape:** só `&`, `<` e `>` (`htmlspecialchars` com `ENT_NOQUOTES | ENT_HTML5`). Aspas ficam literais, como nos
partials publicados. Medido: zero entidade HTML nos 12 partiais do aceite e zero `&`/`<` nas fontes deles.
**HTML cru na fonte é recusado** (lista fechada, técnica aprendida da Unibra e reescrita do zero, L-37).

**Linhas de prompt fora do padrão** (`persona@glyfesse` sem `:caminho$`, o formato antigo `root@glyfesse>`) são
erro com arquivo e linha. Elas só existem em seções recorrentes que ficam fora do conversor (sec-10, sec-12).

### 2.2 Unidades, cada uma com fronteira própria (L-17)

Tudo em `scripts/conversor/`, **fora de `src/`** (o `deploy.sh` envia `src/` inteiro; o conversor roda só nesta
máquina e nunca vai ao servidor). Núcleos puros: recebem texto, devolvem dado; não leem disco. A frase sem "e" de
cada uma vai no relatório do reviewer (pergunta 2 da L-17).

| Unidade | Arquivo | Frase (o que faz) | Entrada → saída |
|---|---|---|---|
| Extrator de bloco | `fonte.php` | Recorta de um `.md` as linhas de um bloco de idioma. | texto do `.md`, linha de início, linha de fim → lista `[nº da linha original, texto]` |
| Reconhecedor de voz | `voz.php` | Classifica uma linha como fala, pensamento, assinatura, número ou nenhuma. | uma linha → `{tipo, persona, caminho, texto, longo}` ou nulo |
| Parser | `parser.php` | Agrupa linhas de um bloco em nós do dialeto. | lista de linhas → lista de nós com nº de linha; erro para construção fora da lista fechada |
| Travas de copy | `travas.php` | Aponta violação das regras mecânicas de copy nos nós. | nós, nome do arquivo → lista `arquivo:linha: regra: trecho` |
| Emissor | `emissor.php` | Escreve o HTML de uma lista de nós. | nós, recuo → string HTML |
| Montagem | `montagem.php` | Compõe uma seção a partir da receita. | receita da seção, nós por parte → string HTML do partial (sem cabeçalho) |
| Comparador | `comparador.php` | Diz se dois partials são iguais depois da normalização fixada. | dois textos → `{igual, linha, coluna, trecho_esperado, trecho_obtido}` |
| Casca da linha de comando | `scripts/gerar-secoes.php` | Liga as unidades ao disco. | `--edicao N` grava; `--verificar` só compara; código de saída 0/1 |
| Receita da edição (dado) | `docs/content/receitas/edicao-N.php` | Diz de que blocos cada seção é feita. | array PHP, sem comportamento |

**Travas (M2 da pesquisa), regras exatas:**
- R1. Fala sem ponto final: o texto não termina em `.` isolado (reticências `...` são permitidas, por canon).
- R2. Pensamento sem ponto final: mesma regra.
- R3. Zero travessão: nenhum U+2014, U+2013, `&mdash;` ou `&ndash;` em texto publicável. Hoje este é o **único**
  portão para isso aqui: o portão global de pre-commit não considera `docs/content/` nem `.php` (medido em
  `~/.claude/hooks/no_mdash.py`), e há travessão em vários `.md` da #5, na parte de notas. As travas só leem os
  blocos publicáveis.
- R4. A marca da fonte decide a classe (`//` comum, `/* */` longo), e a trava reprova se ela contradiz o
  comprimento: texto **sem a marca** com até 72 caracteres (`mb_strlen`) pede `//`; acima de 72 pede `/* */`.
  Medido em 07/10: 166 pensamentos das #4 e #5 publicadas, zero conflito com "texto sem marca"; contando a marca,
  aparece 1 conflito (#4, sec-16). O conversor **nunca** troca a classe por conta própria.
- Lápide com `&#8224;` fica fora: lápide é molde à mão.

**Receita (lista fechada de chaves; chave desconhecida é erro):**
- `tipo`: `prosa` (um bloco), `sequencia` (vários blocos, separados por linha em branco), `entrevista` (perguntas e
  respostas intercaladas em `<div class="entrev">` com um `<div class="troca">` por par, recuos de 2 e 4 espaços;
  reprova se o número de perguntas e de respostas diferir ou se a numeração não for 1..N sem buraco).
- Por parte e por idioma: `fonte` (arquivo em `docs/content/`), `inicio` (texto exato da linha que abre o bloco,
  com `ocorrencia` opcional, para o caso de `---`), `fim` (texto exato da linha que fecha; padrão: o próximo `---`).
- Opcional por parte: `envolver` (`tag`, `id`, `classe`; recua o conteúdo 2 espaços; linha em branco fica vazia) e
  `classe_lista`.
- **Proibido** na receita: HTML, número de seção ou edição dentro de regra, texto. Nenhuma regra do código pode
  citar seção, edição ou nome de arquivo (o reviewer confere por `grep -nE 'sec-[0-9]|edicao-[0-9]'` em
  `scripts/conversor/`, esperando zero).

**Cabeçalho gerado:** cada partial gerado começa com
`<?php /* GERADO por scripts/gerar-secoes.php a partir de docs/content/<arquivos>. Não edite à mão: corrija a fonte e gere de novo. */ ?>`.
As notas de produção nunca entram.

### 2.3 Testes de cada unidade, vermelho antes do verde (L-13, L-35 global)

Harness: o mesmo das 9 suítes PHP de hoje (asserção na unha, `ALL GREEN (N asserções)`, exit 1 na falha). A função
`eq()` já está copiada em 9 arquivos; as suítes novas usam uma cópia única em `tests/apoio/afirmar.php` (não termina
em `.test.php`, então o `testes.sh` não a roda como teste). Migrar as 9 antigas fica para um item da INBOX, fora
deste plano.

| Suíte | Casos mínimos (cada um visto falhando antes do código) |
|---|---|
| `tests/conversor-fonte.test.php` | bloco entre cabeçalho e `---`; `fim` explícito; `---` com `ocorrencia`; números de linha originais preservados; erro se o início não existe; erro se aparece duas vezes sem `ocorrencia`; erro se o bloco é vazio |
| `tests/conversor-voz.test.php` | fala com caminho; persona diferente de gus; `//`; `/* */`; `//by:`; linha numérica; linha comum devolve nulo; prompt antigo `root@glyfesse>` é erro |
| `tests/conversor-parser.test.php` | parágrafo de uma linha e de várias; `###`; lista; `` `code` `` no parágrafo; fala e pensamento inline em linhas seguidas formam um grupo; cerca com fala quebrada em 3 linhas é juntada; cerca só de `//` vira bloco de pensamentos; cerca não fechada é erro com a linha; HTML cru é erro |
| `tests/conversor-travas.test.php` | R1 a R4, cada uma com um caso que passa e um que reprova, e a mensagem com `arquivo:linha`; reticências não reprovam R1/R2; travessão em nota interna não é lido |
| `tests/conversor-emissor.test.php` | um caso por linha da tabela 2.1; escape de `&`, `<`, `>`; aspas literais; recuo de 2 e 4 espaços; linha em branco dentro de bloco recuado fica vazia |
| `tests/conversor-montagem.test.php` | `prosa`; `sequencia` com `envolver`; `entrevista` com par sem pensamento e com pensamento de persona; contagem desigual reprova; numeração com buraco reprova; chave desconhecida na receita reprova |
| `tests/conversor-comparador.test.php` | iguais; diferença de uma letra acha linha e coluna; comentário `<?php /* */ ?>` no início e no meio é ignorado; diferença de recuo **não** é ignorada (no modo estrito); quebra de linha final é ignorada |
| `tests/conversor-cli.test.php` | edição de brinquedo em `tests/fixtures/conversor/` (`.md`, receita e partial esperado): trava violada sai 1 e não grava nada; caso limpo grava idêntico ao esperado; `--verificar` sai 1 quando o partial gravado foi editado à mão |

Os casos usam **fixtures próprias**, nunca os arquivos da #5: se o teste copiasse o partial publicado, ele provaria
só que o programa concorda consigo mesmo. A #5 é o exame final (2.4), não o material de treino.

Revisão por fatia: o reviewer (agente diferente) **executa** sabotagem de cada unidade em cópia fora da árvore
(L-27), por exemplo trocar `>` por `>=` na R4, tirar o `trim` da junção de linhas, emitir `&quot;`; a suíte da unidade
tem de ficar vermelha. Sabotagem que não avermelha nada vira caso novo antes de aceitar a fatia.

### 2.4 Critério de aceite, escrito antes do dado (L-43 global)

**Este bloco é commitado no repo (fatia F4, `docs/tecnico/ACEITE-CONVERSOR.md`) antes da primeira linha do
conversor**, para que a data do commit prove que o critério veio antes do resultado.

**Universo (fixo, decidido agora, com a pergunta 1 ao líder):** as seções de texto corrido da #5, em pt e en.

| Seção | Fontes | Tipo |
|---|---|---|
| sec-03 Editorial | `edicao-5-editorial.md` | prosa |
| sec-04 Reportagem | `edicao-5-reportagem.md` + `edicao-5-reportagem-menu.md` (dentro de `<div id="sec-04-menu">`) | sequencia |
| sec-05 A Nota | `edicao-5-copies-curtas.md`, bloco 1 | prosa, `classe_lista: placar` |
| sec-06 Galeria de Bugs | `edicao-5-galeria-bugs.md` | prosa |
| sec-09 Errata + Cartas | `edicao-5-errata.md` + `edicao-5-copies-curtas.md`, bloco 2 | sequencia |
| sec-16 Entrevista | `edicao-5-entrevista-perguntas.md` + `edicao-5-entrevista-respostas.md` | entrevista |

São **6 seções x 2 idiomas = 12 arquivos**. Fora do universo, à mão como hoje, **11 seções x 2 = 22 arquivos**:
sec-07 (lápide), sec-08 (detonado), sec-10 (classificados, recorrente da #1), sec-11 (tirinha), sec-12 (recorrente),
sec-13 (pôster), sec-14 (brinde), sec-15 (cupom), sec-17 (tela CRT e tabela), sec-18 (tela CRT do bus),
sec-19 (expediente com dado do `$ctx`). O relatório imprime as duas contagens sempre, mesmo que uma seja zero.

**O lado esperado está congelado.** Último commit que tocou `src/content/edicao-5/`: `df00e2c` (05/09/2026).
SHA-256 medidos em 07/10/2026:

```
710d662492880732a964b808219af8c30046ad8fca47e56fcf66d9309a9a37ac  src/content/edicao-5/pt/sec-03.php
fcd1890d0f2ac5b7a973fe5a65e186107559211cbf42fdb626b733586c43910e  src/content/edicao-5/en/sec-03.php
b7ad49949c6bbe109f1fb1d4634e2c0703dc6aeb07bc04a8799851c235361a96  src/content/edicao-5/pt/sec-04.php
a0ee491b318bdee645388cfb85656c78b5f2b797bf572cbc78a01812092e05a5  src/content/edicao-5/en/sec-04.php
454b1ea311410857133ae3b221a444757de486f484d665ba5765340894f056c4  src/content/edicao-5/pt/sec-05.php
cd2ce2c0bcad8fa65de0b39e22aaa35624464a8d4c62cc5c0551427cdef18e3c  src/content/edicao-5/en/sec-05.php
d4ed83fc645b49f3128770315a9d03b62df3a481dba6c85506f5d765a9287513  src/content/edicao-5/pt/sec-06.php
9c612a543518e2e7dc9e26d562c4d798fae44286bb8d3a3fb5e8769c7a6dc5b8  src/content/edicao-5/en/sec-06.php
e77d608138fcbdf55bfecc63fb5841cec3a6e9455a78fbbabec236c00752e0a1  src/content/edicao-5/pt/sec-09.php
cb72e8973681684777deda08eebb5f3e1c3c5db2e725dcd91869d6b6f07fec08  src/content/edicao-5/en/sec-09.php
f06bc433007cdf6bdb4ee4ec323fd92958e878d9e59497fc3b6cc5b90546d46a  src/content/edicao-5/pt/sec-16.php
71e1cf5924cb3e4ffca1835aa205c7aa00cc1e40379aa2977f01c44ecfcd91a6  src/content/edicao-5/en/sec-16.php
```

O script de aceite confere esses 12 hashes antes de comparar e **recusa rodar** se algum mudou ou se
`git status --porcelain src/content/edicao-5/` não estiver vazio. O aceite gera em `/var/tmp/site-stack/aceite/` e
**nunca escreve** em `src/content/edicao-5/`. A edição publicada não é re-renderizada nem re-deployada.

**Normalização permitida (fixa, pergunta 2 ao líder):** (N1) remover todo bloco `<?php /* ... */ ?>`, no início e no
meio do arquivo, mais a quebra de linha que o segue; (N2) ignorar só a quebra de linha final. **Nada mais**: recuo,
linha em branco, espaço dentro do texto, ordem de classe, tudo conta. A pesquisa falava em "normalizar espaço em
branco"; recomendo cravar o estrito, porque é o que "idêntica" diz e porque o conversor controla todo espaço que
emite. O relatório mostra também, só para informação, quantas diferenças sumiriam se espaço entre tags fosse
ignorado; esse número não muda o veredito.

**Veredito:** APROVADO só se **12 de 12** arquivos forem iguais depois de N1 e N2, impresso separado por idioma
(`pt: 6/6`, `en: 6/6`: duas evidências nomeadas, uma por idioma), com zero diferença de classe D5 e nenhuma seção
retirada do universo depois de rodar. Qualquer outra coisa é REPROVADO.

**Travas não impedem a comparação.** O script de aceite chama as unidades puras (fonte, parser, montagem, emissor,
comparador), **nunca a casca** `gerar-secoes.php` (que, por desenho, não grava nada quando uma trava dispara). Ele
emite e compara mesmo com trava disparada, e lista as travas à parte, na camada 1. Há travessão medido em
`edicao-5-reportagem-menu.md` e `edicao-5-entrevista-respostas.md`, dois arquivos do universo; se estiver no bloco
publicável, a trava aparece e se classifica como D2 (publicado limpo, fonte suja) ou D6 (publicado também viola).

**Relatório em duas camadas** (`/var/tmp/site-stack/aceite-edicao-5.txt`, gravado pelo script):
1. Números crus: universo, fora do universo, comparados, iguais, diferentes, por idioma; e para cada diferente a
   primeira divergência (linha, coluna, trecho esperado, trecho obtido).
2. Veredito com o critério aplicado, e a classe de cada diferença (abaixo), atribuída pelo reviewer.

**O que fazer com cada diferença** (quem classifica é o reviewer, nunca quem implementou, L-05):

| Classe | O que é | O que se faz |
|---|---|---|
| D1 | Defeito do conversor: a informação está na fonte e uma regra geral a emite errado | Conserta no conversor: primeiro um caso novo em fixture própria, visto vermelho; depois o conserto; depois roda o aceite inteiro de novo |
| D2 | Texto da fonte diferente do publicado (correção feita no partial depois do gate e não devolvida ao `.md`) | Pela decisão "fonte única", o **publicado vence** e o texto dele é copiado para o `.md` (pergunta 3 ao líder). Só texto; nenhuma marcação nova. Feito por agente diferente de quem escreveu o conversor. A lista pt/en, com linha antes e depois, vai ao líder antes do commit, porque é fala e pensamento do Gus (L-08) |
| D3 | Fonte sem delimitador de bloco ou com cabeçalho fora do padrão | Resolve-se na receita (`inicio`, `fim`, `ocorrencia`), sem tocar o `.md` |
| D4 | Estrutura que não existe na fonte (o `<div id="sec-04-menu">`, a classe `placar`) | Vai para a receita, **só** com as chaves da lista fechada. Se precisar de qualquer coisa além delas, a seção é reprovada; ela não sai do universo depois do fato |
| D5 | Qualquer coisa que não cabe em D1 a D4 | Reprova e vai ao líder |
| (D6, informativa) | As travas acham violação no texto **publicado** da #5 (por exemplo, fala com ponto final) | Não muda o veredito de igualdade; vai ao líder como achado da edição publicada; não se conserta a #5 sem ordem dele |

**Limite de tentativas:** a mesma diferença voltando pela segunda vez obriga pesquisa na web antes da terceira
tentativa (L-22 global). **Prazo por evento, não por data:** se o aceite não estiver APROVADO quando os textos da #6
passarem pelos gates de conteúdo e a montagem (S7 do `PIPELINE-EDICAO.md`) precisar começar, a #6 é montada à mão
como sempre, e o conversor segue para a #7 sem atrasar nada da #6.

**Se não reproduzir:** a #6 sai no processo atual; o relatório e a lista de diferenças classificadas viram o ponto
de partida da #7; os itens ficam na TODO com o motivo, não somem.

### 2.5 Depois do APROVADO (o que muda na #6)

- O aceite vira teste permanente: `tests/conversor-deriva.test.php` gera em memória **toda edição que tem receita**
  e compara com o partial commitado (mesmo comparador). Para a #5, protege a edição publicada contra mudança futura
  do conversor. Para a #6 em diante, reprova partial gerado que alguém editou à mão: é a "fonte única" com dente.
  Piso: receitas encontradas >= 1 e arquivos comparados >= 12.
- Na #6, o conversor cobre as seções de texto corrido que a pauta tem: Editorial (3), Reportagem (4), Galeria (6),
  Entrevista (16) e as curtas de vazio com graça que seguirem o mesmo formato. **Cemitério (7), Programação (17) e
  Bus (18) continuam à mão na #6** (lápide e tela CRT são molde; viram função PHP só da #7 em diante, opção C da
  pesquisa).
- A Entrevista da #6 é o ganho mais direto para "pronta, aguardando só a entrevista": quando as respostas do
  homenageado chegarem e forem passadas para o `.md` no dialeto, a sec-16 sai num comando e passa pelas travas.
- O `PIPELINE-EDICAO.md` (S7) passa a dizer "gerar" em vez de "transcrever", e registra a regra da fonte única:
  correção de texto se faz no `.md` e se gera de novo; nunca no partial.

---

## 3. Fatias (uma por vez, implementador `sonnet`, reviewer distinto que executa)

Regras de toda fatia: commit Conventional Commits em pt-br citando o ID e tocando o `Status` na `TODO.md` no mesmo
commit (`🔍`, nunca `✅`, L-14); `scripts/testes.sh` e `scripts/preci.sh` verdes antes do commit; reviewer executa
sabotagem em cópia fora da árvore (L-27); orquestrador reconfere `git show --stat` (L-23). Nenhuma fatia faz deploy
(L-11) nem toca `src/content/edicao-5/`. Antes da F1, o orquestrador registra os IDs `TESTES-CMD`, `GANCHO-PREPUSH`,
`CONVERSOR-MD`, `CONVERSOR-ACEITE` na `TODO.md` (a tabela existe).

**Dependências das perguntas da seção 4:** F1 e F2 não dependem de resposta nenhuma e podem começar já. F3 só instala
no repo real depois da pergunta 4. F4 precisa das respostas 1, 2 e 3 (elas entram no critério commitado). F5 a F12
podem andar antes das respostas, porque usam fixtures próprias; F13 em diante, não.

**Trilha A: testes (antes de tudo, porque vira o portão das fatias seguintes)**

| Fatia | ID | Arquivos | Pronto quando |
|---|---|---|---|
| F1 | TESTES-CMD | novo `scripts/testes.sh`; novas fixtures `scripts/testes-fixtures/` (casos A1 a A6) | `--autoteste` imprime `casos=7 conferem=7`; árvore real verde com a contagem impressa; as duas sabotagens do reviewer reprovam |
| F2 | TESTES-CMD | `scripts/preci.sh` (passo 1 chama `testes.sh`, mockups mantidos); `TESTES.md` (uma linha) | `preci.sh` imprime as contagens de `tests/` e dos mockups e `ALL GREEN` |
| F3 | GANCHO-PREPUSH | `.githooks/pre-push` (raiz por `--show-toplevel`); novo `scripts/instalar-gancho.sh` | prova no clone descartável em `/var/tmp`: push recusado com teste sabotado, aceito restaurado. **Instalar no repo real só depois da resposta do líder (pergunta 4)** |

**Trilha B: conversor**

| Fatia | ID | Arquivos | Pronto quando |
|---|---|---|---|
| F4 | CONVERSOR-ACEITE | novo `docs/tecnico/ACEITE-CONVERSOR.md` (cópia literal da seção 2.4, com as respostas do líder às perguntas 1 a 3); novo `docs/content/DIALETO.md` (tabela 2.1 e regras R1 a R4, para os redatores da #6) | commitado **antes** de qualquer arquivo em `scripts/conversor/` |
| F5 | CONVERSOR-MD | novo `tests/apoio/afirmar.php`; novos `scripts/conversor/fonte.php` e `tests/conversor-fonte.test.php` | casos da tabela 2.3 vistos vermelhos e depois verdes |
| F6 | CONVERSOR-MD | novos `scripts/conversor/voz.php` e `tests/conversor-voz.test.php` | idem |
| F7 | CONVERSOR-MD | novos `scripts/conversor/parser.php` e `tests/conversor-parser.test.php` | idem |
| F8 | CONVERSOR-MD | novos `scripts/conversor/travas.php` e `tests/conversor-travas.test.php` | idem |
| F9 | CONVERSOR-MD | novos `scripts/conversor/emissor.php` e `tests/conversor-emissor.test.php` | idem |
| F10 | CONVERSOR-MD | novos `scripts/conversor/montagem.php` e `tests/conversor-montagem.test.php` | idem |
| F11 | CONVERSOR-MD | novos `scripts/conversor/comparador.php` e `tests/conversor-comparador.test.php` | idem |
| F12 | CONVERSOR-MD | novos `scripts/gerar-secoes.php`, `tests/conversor-cli.test.php` e `tests/fixtures/conversor/` | casos da CLI vermelhos e depois verdes; `grep` por seção/edição em `scripts/conversor/` devolve zero |
| F13 | CONVERSOR-ACEITE | novos `docs/content/receitas/edicao-5.php` e `scripts/aceite-conversor.php` | o **reviewer** roda o aceite e entrega o relatório de duas camadas com a classe de cada diferença; o orquestrador reconfere |
| F14 (só se houver D1/D2) | CONVERSOR-MD / CONVERSOR-ACEITE | D1: a unidade afetada e o teste dela; D2: o `.md` da #5 afetado, depois do aval do líder à lista | uma fatia por classe e por unidade; aceite inteiro roda de novo |
| F15 (só se APROVADO) | CONVERSOR-ACEITE | novo `tests/conversor-deriva.test.php` | verde; e vermelho quando o reviewer edita à mão, em cópia, um partial gerado |
| F16 (só se APROVADO) | CONVERSOR-ACEITE | `docs/editorial/PIPELINE-EDICAO.md` (S7 e fonte única); `docs/editorial/BRIEFS-EDICAO-6.md` (redatores apontados para `DIALETO.md`); por `technical-writer` | texto revisado por agente diferente |
| F16' (só se REPROVADO) | CONVERSOR-ACEITE | `TODO.md` | itens movidos para a #7 com o relatório citado |

Total: **16 fatias** (F1 a F16; F14 só existe se houver diferença de classe D1 ou D2; F16 e F16' são excludentes).
Porte: 1 script de testes, 1 instalador, 7 unidades puras, 1 casca, 1 receita, 1 script de aceite, 9 suítes novas,
2 documentos novos e 5 arquivos editados (fora a TODO). Zero dependência nova, zero instalação, zero mudança no que o servidor executa.

**Nota de versão de PHP:** o conversor roda só nesta máquina (PHP 8.5). O que ele grava é HTML com um comentário
PHP, sem código de 8.4 ou 8.5, então serve igual na produção em 8.3 até a troca depois da #6.

---

## 4. Para o líder (uma frase cada, recomendada primeiro)

1. **O aceite cobre as 6 seções de texto corrido da #5 (12 arquivos, incluindo Reportagem e Entrevista), ou só as 4
   simples, ou as 17?** Recomendo as 6: as 11 restantes são molde e ficam à mão na #6 de qualquer jeito.
2. **"Idêntica" é estrito (só ignora os comentários internos e a quebra de linha final), ou também ignora espaço
   entre tags?** Recomendo o estrito.
3. **Quando o texto do `.md` da #5 difere do publicado, o publicado vence e o `.md` é corrigido (com a lista mostrada
   ao senhor antes), ou isso conta como reprovação do conversor?** Recomendo que o publicado vença, que é a fonte
   única que o senhor aprovou.
4. **Ligar o gancho de antes do envio por um arquivo de uma linha em `.git/hooks` (mantém os ganchos globais), por
   `core.hooksPath` local (desliga os globais neste repo), ou não ligar?** Recomendo o arquivo de uma linha.
5. **As fontes da #6 passam a usar só `## pt-BR` e `## EN` como cabeçalho de bloco, ou mantêm as variantes de hoje
   resolvidas pela receita?** Recomendo padronizar da #6 em diante; a #5 fica intocada.

---

## Respostas do líder (07/10/2026 22:39:56, por AskUserQuestion)
- **P1:** "As 6 de texto corrido".
- **P2:** "Estrito".
- **P3:** "O publicado vence". O `.md` é corrigido com a lista de diferenças mostrada ao líder antes.
- **P4:** "Arquivo de uma linha". Fica em `.git/hooks/pre-push` e mantém os ganchos globais.
- **P5** (padronizar `## pt-BR`/`## EN` da #6 em diante): ainda não perguntada. **Vale a recomendação até o líder dizer o contrário.**
