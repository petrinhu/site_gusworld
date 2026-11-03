# Edição #7 · Seção 11 · HQ: a tela que diz tudo certo

> RASCUNHO v1, submeter ao líder. Roteiro de três quadros, decisão D19 (opção a, "A tela que diz tudo certo") e D11 ("nao tenho, crie algo"), `docs/editorial/PAUTA-EDICAO-7.md` §16 rodada 5 e §8.1 (H1).
> Estrutura de tela, não arte: a arte é só CSS sobre o componente de terminal existente (`public_html/assets/css/edicao.css:1717-1776`). Nenhuma imagem, nenhum desenho, nenhuma personagem em cena.
> Texto de tela em ASCII, sem acento (regra tela×papel, `PIPELINE-EDICAO.md` §4, S4). `_` nos quadros marca o cursor piscante (`.crt-cur`), não é texto.
> Este arquivo não é insumo do conversor: a HQ é partial à mão, como as da #1 e da #3 (ver as Notas).
> Escrito pelo `narrative-designer` (arquitetura, L-76). Redação final e conferência por `revisor-textual`, se o líder aprovar.

## pt-BR

### Quadro 1

```
conferencia automatica
_
```

*ligada.*

### Quadro 2

```
conferencia automatica
lendo a lista...
_
```

*lendo.*

### Quadro 3

```
conferencia automatica
lendo a lista...
lista: nao encontrada
resultado: tudo certo
_
```

*lendo.*

---

## EN

### Panel 1

```
automatic check
_
```

*on.*

### Panel 2

```
automatic check
reading the list...
_
```

*reading.*

### Panel 3

```
automatic check
reading the list...
list: not found
result: all clear
_
```

*reading.*

---

## Notas de produção (internas, não publicar)

Este bloco é interno e nunca é lido pelo conversor. Nada aqui vai ao ar.

### 1. Decisões de produção (L-07: decisão minha, o líder pode trocar)

- **Sem usuário e sem prompt.** A conferência roda sozinha, ninguém digita. Motivo: D19 (sem personagem em cena) e T2 (a revista não ri de ninguém, nem faz da sessão uma pessoa). O cabeçalho da tela é o nome da rotina, `conferencia automatica` (`automatic check` em EN), não um programa real nem uma pessoa. Se o líder quiser um prompt, só com rótulo de programa, nunca com nome de pessoa (T9; a #1 usa alias de usuário, e aqui não há alias).
- **Nenhuma linha em vermelho.** Não se usa `.er` em nenhum quadro (`edicao.css:1747`): nada soa alarme antes do veredito, e a graça é o verde que não se questiona.
- **Ausência em `.dim`** (`edicao.css:1748`, teor apagado). A linha que diz que a lista não foi achada é o único texto apagado da tela.
- **Veredito em `.pr`** (`edicao.css:1746`, verde mais claro), sem caixa, sem negrito, sem selo. A frase fica na tela como qualquer outra linha.
- **Legendas de uma palavra**, no molde da #3 (`edicao-3/pt/sec-11.php:37, 55, 78`). Nenhuma legenda diz o resultado. O quadro 3 repete a legenda do 2 de propósito (a economia da #3, `edicao-3/pt/sec-11.php:15-18`).
- **Sem legenda narrativa no conjunto.** A #1 põe uma legenda que narra (`edicao-1/pt/sec-11.php:51`); a #3 não põe. Esta HQ segue a #3.
- **Declaração de IA** não vai aqui: a HQ é feita por agente de IA e aprovada pelo editor (D11), e a declaração fica no Expediente (`PAUTA-EDICAO-7.md` §3, item 19, linha 168, e §3.1, item 22, linha 526). L-09 do site.

### 2. Como a graça funciona, quadro a quadro

- **Quadro 1, a tela liga.** Só o nome da rotina e o cursor. Nenhuma linha nova depois disso: a tela espera, como a #1 espera.
- **Quadro 2, a leitura começa e para.** "lendo a lista..." e o cursor. A tela não diz mais nada. Esse silêncio é a varredura de algo que não existe, sem o texto dizer.
- **Entre 2 e 3, o silêncio é da tela.** Nenhuma animação além do cursor do componente (`.crt-cur`, já existente; a #3 não tem animação, `edicao-3/pt/sec-11.php:20-21`). No web, o cursor pisca e nada novo aparece. Impresso, o quadro 3 é o quadro 2 com duas linhas a mais.
- **Quadro 3, a pista e o veredito.** A ausência aparece primeiro ("lista: nao encontrada", em `.dim`) e o veredito vem logo abaixo, sem frase que comente os dois. A pista precisa estar visível antes do veredito; sem ela o leitor não tem como rir e a piada vira trapaça de narrador.
- **Economia (molde da #3).** O quadro 3 é o quadro 2 mais duas linhas. Não há quarto quadro nem desfecho.

### 3. Largura e 390 px

- Maior linha de tela em pt: 22 caracteres (`conferencia automatica`). Em EN: 19 (`reading the list...`). Teto de cerca de 30 por linha vem do despacho do main (não está em arquivo); alvo de 24 é decisão minha; o aceite em 390 pontos é `BRIEFS-EDICAO-7.md:481-482` (§4.9).
- Premissa a conferir (não medida, não há como renderizar nesta sessão): os três quadros empilham em 390 px, e o `qa-engineer` mede `scrollWidth` contra `clientWidth`. Se a coluna do `.hq-strip` mantiver os quadros lado a lado, cada tela fica com cerca de 14 caracteres de largura e o roteiro precisa ser revisto.

### 4. Riscos

- **R1, T2 (o alvo é a conferência da sessão).** Lido de fora, o "tudo certo" depois de "lista: nao encontrada" pode parecer gracejo com a sessão de IA, cujo portão é o da Programação. A tela não tem adjetivo nem voz da revista, mas a leitura existe. A variante B é mais contida (ver item 7). Para o GATE-CONTEUDO decidir.
- **R2, repetição com a Programação.** A HQ e a Programação tratam da mesma ideia (conferir o que não está ali e dizer que está tudo certo). A HQ não repete a tabela nem a saída publicada da Programação (`edicao-7-programacao.md:36-40` e `:54-58`), não usa a frase da sessão (`:48`) e não explica nada (`PAUTA-EDICAO-7.md` §5.1, linha 287). Se o líder achar que a ideia ainda repete a Programação, a alternativa é trocar o alvo, e o roteiro muda só a palavra "lista".
- **R3, conversor.** Premissa, não medida: o conversor não lê este arquivo. Não há prompt com persona no roteiro, então não há erro de "prompt fora do padrão" (`docs/content/DIALETO.md:47-51`). As linhas de tela sem prompt dentro de bloco cercado não foram testadas pelo conversor.
- **R4, data.** Nenhuma data aparece na tela nem nas legendas. Nada posterior a 03/09/2026 (T1, `BRIEFS-EDICAO-7.md:56-62`).
- **R5, nome e arquivo.** Nenhum nome real, handle, arquivo, commit ou repositório aparece na tela (T9, `BRIEFS-EDICAO-7.md:114-120`).
- **R6, personagem e imagem.** Nenhum personagem nem imagem. A tela não fala de como foi feita (T8, `BRIEFS-EDICAO-7.md:109-112`).

### 5. Fatos e inferências (L-18)

| Afirmação | Fonte | Marcação |
|---|---|---|
| D19 é a opção "(a) A tela que diz tudo certo (Recomendado)" | `docs/editorial/PAUTA-EDICAO-7.md:579` e `:738` | FATO |
| D11 é "nao tenho, crie algo"; a revista cria a HQ | `PAUTA-EDICAO-7.md:569`, `:725-727` | FATO |
| H1 é três quadros em tela de fósforo verde, sem personagem, só CSS e texto | `PAUTA-EDICAO-7.md:359` | FATO |
| Sem personagem em cena; arte só CSS; sem imagem | `BRIEFS-EDICAO-7.md:470-471`, `:478-480` | FATO |
| Texto de tela em ASCII, sem acento | `BRIEFS-EDICAO-7.md:473-474` | FATO |
| Estilos do componente: `.crt-tela`, `.pr`, `.er`, `.dim`, `.crt-cur` | `public_html/assets/css/edicao.css:1730-1756` | FATO (lido) |
| Molde da #1: três quadros de terminal, legenda narrativa no conjunto | `src/content/edicao-1/pt/sec-11.php:10-27, 51` | FATO (lido) |
| Molde da #3: legendas de uma palavra, repetição de propósito, zero animação | `src/content/edicao-3/pt/sec-11.php:15-21, 37, 55, 78` | FATO (lido) |
| Saída de terminal e tabela da Programação, a evitar | `docs/content/edicao-7-programacao.md:36-40, 54-58` | FATO (lido) |
| Divisória: a HQ não explica o que a Programação conta | `PAUTA-EDICAO-7.md:283-287` | FATO |
| Formato do bloco cercado e prompt fora do padrão | `docs/content/DIALETO.md:9-15, 47-51` | FATO (lido) |
| Tela ausente "nao encontrada" é a pista certa antes do veredito | conceito (leitura do §8.1 e do conselho) | INFERÊNCIA minha |
| Leitor leigo entende "lista: nao encontrada" sem ajuda | não testado com leitor | INFERÊNCIA, a validar no GATE-LENTE |
| "lendo." repetido no quadro 3 lê-se como economia, não como erro | leitura minha | INFERÊNCIA |
| Largura de 390 px cabe nos três quadros empilhados | não medido (sem render) | NÃO VERIFICADO, para o `qa-engineer` |
| Conversor não processa este arquivo | não rodado (sem Bash) | NÃO VERIFICADO |

### 6. Variante B (para o líder comparar)

Mesmo quadro 1 e mesma economia. Muda o mecanismo da pista: a ausência vira um campo vazio, sem nenhuma palavra que a declare. A tela nunca diz que falhou.

**B, pt-BR**

```
Quadro 1: conferencia automatica / _   (legenda: ligada.)
Quadro 2: conferencia automatica / lista: / _   (legenda: lista.)
Quadro 3: conferencia automatica / lista: / resultado: tudo certo / _   (legenda: lista.)
```

**B, EN**

```
Panel 1: automatic check / _   (caption: on.)
Panel 2: automatic check / list: / _   (caption: list.)
Panel 3: automatic check / list: / result: all clear / _   (caption: list.)
```

Comparação. **A** é legível de imediato (a palavra "nao encontrada" faz a pista), mas é a mais explícita e a que mais se aproxima de piada sobre a sessão (R1). **B** é a mais contida: a tela não aponta o erro com palavra, e o leitor tem de notar o campo vazio, o que é uma pista mais fraca para leigo. Recomendação do narrative-designer: **A** para o leitor leigo, **B** se o GATE-CONTEUDO achar que A aponta a sessão. Decisão do líder.

### 7. Perguntas ao líder (GATE-CONTEUDO)

1. **Quadros: A ou B?** (A: "lista: nao encontrada", legível. B: campo vazio, mais contido. Ver item 6.)
2. **Prompt:** sem usuário e sem prompt (proposta desta versão), ou rótulo de programa (sem nome de pessoa)?
3. **Legenda "lendo." no quadro 3:** aceita a repetição de propósito, ou prefere "lendo." só nos quadros 2 e 3 com outra palavra no 3?
4. **Legenda do conjunto:** nenhuma (proposta, molde da #3), ou uma neutra ("uma tela, tres quadros")?

### 8. Fontes usadas (arquivo:linha)

- `docs/editorial/BRIEFS-EDICAO-7.md`: §1 travas T1 (56-62), T2 (64-70), T5 (87-96), T6 (98-101), T7 (103-107), T8 (109-112), T9 (114-120), T10 (122-125); §3.2 (180-249, passos e item 8 do relatório, travas de ordem); §4 passos comuns (253-268); §4.9 (468-484).
- `docs/editorial/PAUTA-EDICAO-7.md`: §1 (64-96, lente); §3 (148-168, item 11 e item 19); §3.1 (170-250, item 22 em 526); §5.1 (279-287); §8.1 (355-361, H1); §12.1 (566-581, D19 e D20); §16 rodada 5 (732-739).
- Molde publicado: `src/content/edicao-1/pt/sec-11.php:1-53`; `src/content/edicao-3/pt/sec-11.php:1-83` (pt, a tirinha de quadrado); `src/content/edicao-1/en/sec-11.php:1-51`; `src/content/edicao-3/en/sec-11.php:1-80`.
- CSS: `public_html/assets/css/edicao.css:1717-1776` (só leitura).
- Dialeto: `docs/content/DIALETO.md:9-15, 17-39, 47-51`.
- Programação (para não repetir): `docs/content/edicao-7-programacao.md:36-40, 46-48, 54-58`.

---
