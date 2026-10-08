# Critério de aceite do conversor (item CONVERSOR-ACEITE)

Origem: seção 2.4 de `docs/tecnico/PLANO-CONVERSOR.md` (Caetano, 07/10/2026), copiada sem mudar o texto das regras.
Este arquivo é commitado ANTES de qualquer arquivo em `scripts/conversor/`: a data do commit prova que o critério
veio antes do resultado (L-43 global). Depois do dado, o critério não se altera; furo do critério se conserta
antes da fase seguinte, nunca depois de ver o resultado.

## Respostas do líder embutidas (07/10/2026 22:39:56, por AskUserQuestion)

- **P1 (universo):** "As 6 de texto corrido". O universo é o da tabela abaixo: 6 seções x 2 idiomas = 12 arquivos.
- **P2 (normalização):** "Estrito". Só N1 e N2; recuo, linha em branco, espaço e ordem de classe contam.
- **P3 (diferença de texto):** "O publicado vence". O `.md` da #5 é corrigido para igualar o publicado, só texto,
  e a lista de diferenças (pt e en, com linha antes e depois) é mostrada ao líder ANTES do commit.

## Critério (cópia literal da seção 2.4 do plano; onde ele diz "pergunta 1", "2" ou "3", vale a resposta acima)

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
