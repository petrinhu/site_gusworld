# Design doc da Glyfesse

> **Status:** v1.0 (2026-07-16). Registra a **vibe** e os **tokens**, decididos com o líder.
> Hub: linka, não duplica. Conceito em [`conceito.md`](conceito.md); tokens em [`tokens.md`](tokens.md) / [`tokens.css`](tokens.css); mockups em [`mockups/INDEX.md`](mockups/INDEX.md).
> Avança `DESIGN-IDENTIDADE` (W4) e fecha `PALETA-CONTRASTE`.

---

## 1. A personalidade, em uma frase

**Uma revista de videogame dos anos 90 impressa em papel, com buracos de tela acesa nela.**

O papel é a casca (a camada do adulto: edição, capa, sumário, nota, cupom). A tela acesa é onde o Gus vive (a camada da criança: o jogo, o Diário, o brinquedo). **A pessoa mexe na tela; a memória está no papel em volta.**

Isso atende a régua do líder na ordem certa: **brinquedo primeiro, memória depois.** A criança de 2026 nunca segurou uma revista, mas ela reconhece um retângulo que se mexe. O adulto reconhece a página.

---

## 2. A decisão: o material (`D-IDENTIDADE`, `DESIGN-IDENTIDADE`)

**Escolhido: papel como chão + a foto de 21h como TRATAMENTO das fotos de arquivo.**

Palavras do líder:

> "A conta que decidiu: o navy do jogo dá **15.99:1 sobre papel**, ou seja, **ele já é a tinta preta da revista**, e a mesma cor serve nos dois materiais. E o ciano dá **1.48:1 sobre papel: some**. Isso **não é um defeito da paleta, é a informação**: a paleta do jogo é feita de **LUZ**. No papel ela só aparece **onde há tela**, que é exatamente **onde o Gus vive**. O site vira **um objeto impresso com buracos de tela acesa nele**."

### Por que não a tela (a direção recusada, e o porquê importa)

Um site todo em navy + ciano + mono seria o caminho fácil: a paleta entraria sem tradução. **Foi recusado com razão técnica e estética:**

1. **É o visual padrão de indie retrô em 2026.** É o "pixel sem motivo" que a pesquisa identificou como a fadiga real ("retro is the easiest aesthetic to fake and the hardest to pull off"). A fadiga não é com o pixel, é com pixel **sem motivo**.
2. **A revista deixaria de ser objeto e viraria skin.** O adulto de 1991 não sentiria banca, sentiria hacker.
3. **Tela não amarela.** O envelhecimento, a peça mais original do projeto, perderia o sentido.

### ★ Isso desambiguou o `D-IDENTIDADE` de graça

O board registrava "opção 1+2+3" (pixel art + key art pintada + retratos cel-shaded **juntos**) como pendência a desambiguar.

**A revista é o único formato que comporta os três estilos na mesma página sem incoerência:** a matéria tem screenshot pixelado, o pôster central é pintado (`catedral_mae.png`), a ficha tem retrato. Numa tela ou OS falso, misturar pixel art com pintura fica desconexo. **Numa revista, é o normal.** O líder não precisava escolher: era isso que ele estava dizendo.

---

## 3. A decisão: light e dark são dois materiais

- **Light = o papel da revista.**
- **Dark = a tela do Tavus-Drive**, o Diário do Gus por dentro. **"De dia você lê a revista, de noite você está no laptop dele."**

**Não é o papel invertido: é outro objeto.** A tinta preta vira luz ciano, o halftone vira brilho, o raio sai de 0 para 2px. Nenhuma cor é invertida. Isso atende "dark mode é redesenho, não inversão" sem inventar nada, porque o objeto já existia no canon.

---

## 4. Os achados que mudaram o desenho

Todos vieram de **calcular em vez de estimar**, e nenhum estava no radar.

### 4.1 O navy já é a tinta (`15.99:1`)
A mesma cor serve nos dois materiais. Um token a menos, e a paleta do jogo entra no papel sem tradução no lugar que importa.

### 4.2 O ciano some no papel (`1.48:1`)
Não é defeito: é o que define onde o neon pode existir. **A paleta do jogo é feita de luz.**

### 4.3 ★ Envelhecer a página derrubava o contraste
O ciano de tinta calibrado no papel novo dava `5.59:1` e **caía para `3.89:1` na edição #1 encardida: reprovava AA**. A peça "as bordas amarelam com a idade" tinha um custo de acessibilidade embutido que ninguém tinha visto.

**Correção:** não desistir do envelhecimento, e sim **calibrar toda a tinta no PIOR papel da banca**. Agora o mesmo token passa AA na #1 e sobra na edição nova. **A revista pode envelhecer para sempre sem nunca ficar ilegível.**

### 4.4 O magenta custa um degrau, não a cor
`#c23fd9` falha AA (4.37:1). `#cd58e1` passa sobre o fundo **e** sobre a superfície elevada onde a NOTA vive (5.31 e 4.50). Mesmo matiz. O original fica no arquivo para **área**, que é o que ele é no jogo.

### 4.5 ★ A textura do papel não renderizava no Firefox
Verifiquei no Blink; o líder vê no Gecko. O `feTurbulence` sem `width`/`height` explícitos **é descartado pelo Gecko**: o papel ficava liso, e a direção recomendada estava sendo julgada sem a textura que a sustenta.

**Vale em produção, não só no mock: todo filtro SVG com dimensão explícita.** E todo mock se verifica **no browser do líder**, porque esta estética depende inteira de textura, blend mode e filtro SVG, que é onde os motores divergem.

### 4.6 ★ O `color-mix` no `:root` não envelhece nada
Custom property é substituída **onde é declarada**. Com `--papel` no `:root`, o `--idade` do filho é ignorado e **a banca inteira sai da mesma cor**. Tem que ser declarado na `.folha`. Detalhe em [`tokens.md` §3](tokens.md).

---

## 5. O que a identidade restringe e confirma na stack

A stack (`HTML5 → PHP → JS`, sem framework, sem build) **sai reforçada**. Nada aqui pede JavaScript.

| Peça | Como sai | Custo de JS |
|---|---|---|
| **O envelhecimento** | `color-mix` + uma variável `--idade` por edição | **zero** |
| **A banca inteira** | `foreach` PHP passando `--idade` | **zero** |
| **A fibra do papel** | `feTurbulence` inline (com dimensão explícita) | **zero** |
| **A dobra, o halftone, o brilho** | gradiente e `background-size` | **zero** |
| **O sprite andando** | `steps()` nos walk cycles que já existem | **zero** |
| **Os dois materiais** | `[data-material]` + `prefers-color-scheme` | **zero** |

**Confirma:** zero dependência de rede (fonte CC0 local, texturas inline). Bom para a CSP, para o "zero terceiro por padrão", e para o peso (o site não pode pesar mais que o jogo).

**Restringe:**
- **A tinta é calibrada no pior papel.** Novo token de tinta **tem** que passar AA sobre `--papel-fim`.
- **Raio zero no papel.** Componente de papel com canto arredondado contradiz o material.
- **O neon só existe dentro de `.aceso`.** Ciano solto sobre papel é invisível (1.48:1) e está proibido.
- **Pixel nunca em parágrafo.**
- **CDN é cache:** o poll ao vivo não pode ser cacheado.

---

## 6. Escopo

**Nesta rodada (fechado):** a vibe, os dois materiais, a paleta tokenizada com a conta, a escala de idade, e a prova renderizada nos dois motores.

**Aberto, na ordem:**
1. ⏳ **O par tipográfico de corpo** (a próxima one-way door). O display já é canônico (`PixelOperatorMono`, CC0, a fonte do jogo).
2. ⏳ **A primeira dobra** com o quadradinho jogável (`QUADRADINHO`, `MOBILE-RISCO`).
3. ⏳ **Mobile**: a revista é A4 e não cabe em 390px. Os mocks já nascem em ~400px, mas a decisão de degradação é do líder, com protótipo nos dois tamanhos.
4. ⏳ Scanline desligável; a mancha de café que não cai sobre texto.

---

## 7. Referências de pesquisa

Ver [`conceito.md`](conceito.md) §2, §3 e a memória `pesquisa_retro_revista_web` (pesquisa já feita, **não refazer**). O que sustenta a direção aqui: a fadiga de 2026 é de **intenção**, não de estética; o teste de cada elemento é *"isso tem motivo dentro da ficção do Gus, ou é só referência?"*. **O papel tem motivo: a revista existe porque a espera precisava de formato, e o Gus recorta cupom.**
