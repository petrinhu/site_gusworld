# Tokens da Glyfesse

> **Status:** v1.0 (2026-07-16). Decididos com o líder. Fonte executável: [`tokens.css`](tokens.css), que **é o CSS de produção** (sem framework, sem build).
> **Prova renderizada:** [`mockups/01-tokens.html`](mockups/01-tokens.html), que não redefine nenhuma cor. Se um token estiver errado, quebra lá.
> **Todo contraste aqui é CALCULADO** (WCAG 2.x, sRGB), nunca estimado.

---

## 1. A decisão que gera todos os tokens

O líder decidiu: **o site é papel, com buracos de tela acesa**.

A conta que decidiu, e ela não é detalhe de acessibilidade, é a direção:

| Par | Razão | O que significa |
|---|---|---|
| navy `#0d1520` / papel `#f4efe4` | **15.99:1** | **O navy do jogo já é a tinta preta da revista.** A mesma cor serve nos dois materiais. |
| ciano `#4dd9e8` / papel `#f4efe4` | **1.48:1** | **Some.** |

Nas palavras dele:

> "Isso **não é um defeito da paleta, é a informação**: a paleta do jogo é feita de **LUZ**. No papel ela só aparece **onde há tela**, que é exatamente **onde o Gus vive**. O site vira **um objeto impresso com buracos de tela acesa nele**."

### A consequência para a arquitetura dos tokens

**Light e dark não são o mesmo objeto com cores trocadas. São dois MATERIAIS:**

- **Light = o papel da revista.** A tinta é navy. O neon **só** dentro dos buracos de tela.
- **Dark = a tela do Tavus-Drive**, o Diário do Gus por dentro. Aí a paleta do jogo entra **inteira, sem tradução**. É o único lugar onde ela é ela mesma.
- **"De dia você lê a revista, de noite você está no laptop dele."**

E existe um terceiro elemento que **atravessa** os dois: a **tela acesa**. No papel é um buraco de luz na página; no dark é o site inteiro. Por isso os tokens `--tela-*` são **constantes**.

Isso satisfaz "dark mode é redesenho, não inversão" **sem inventar nada**: o objeto muda, não o tema.

---

## 2. Marca: as cores do jogo (medidas nos assets)

Nunca usar direto num componente. Use os semânticos (§5).

| Token | Hex | Onde vive no jogo |
|---|---|---|
| `--gw-navy` | `#0d1520` | base. E a tinta preta da revista |
| `--gw-navy-alto` | `#1a2436` | superfície elevada dentro da tela |
| `--gw-ciano` | `#4dd9e8` | óculos do Gus, holograma, HUD |
| `--gw-ciano-alto` | `#6ff0ff` | realce |
| `--gw-magenta` | `#cd58e1` | portal, board, drones. **Corrigido, ver §6** |
| `--gw-magenta-asset` | `#c23fd9` | o magenta original. **Só área. Proibido como texto** |

---

## 3. Papel: a escala de idade

> "As bordas amarelam com a idade da edição: a #1 encardida, a nova branquinha. **Na banca dá para ver qual é velha só de olhar.**"

| Token | Hex |
|---|---|
| `--papel-novo` | `#f4efe4` |
| `--papel-fim` | `#d9c8a3` (o limite: mais velho que isto, a tinta cai) |
| `--idade` | `0` (nova) a `1` (a #1, a mais velha da banca) |

**Cada edição declara uma coisa só**, e o papel amarela sozinho:

```html
<article class="folha" style="--idade:.6">
```

No PHP, sai do número da edição sem JS nenhum: `style="--idade:<?= $idade ?>"`. O amarelamento é `color-mix(in oklab, ...)`, **zero JavaScript**.

### ⚠️ A armadilha de CSS que isso esconde (custou um mock)

O `color-mix` **tem** que ser declarado na `.folha`, **não** no `:root`.

Custom property é substituída **no elemento onde é declarada**. Se `--papel: color-mix(... var(--idade) ...)` mora no `:root`, o `var(--idade)` resolve com o valor do `:root` (0), e o filho herda **a cor já pronta**. Trocar `--idade` no filho não recalcula nada: **a banca inteira sai da mesma cor**. Foi exatamente o que aconteceu, e **só o render mostrou**.

---

## 4. Tinta: as cores quando impressas

**★ Calibradas no PIOR papel, não no novo.** Cada tinta passa **AA 4.5:1 sobre `--papel-fim`** (a #1 encardida). Assim o mesmo token serve em qualquer edição da banca, e **envelhecer a página nunca quebra a leitura**.

| Token | Hex | Papel novo | Na #1 encardida | Uso |
|---|---|---|---|---|
| `--tinta-preta` | `#1a1614` | **15.67:1** | **10.90:1** (AAA) | corpo, manchete |
| `--tinta-2` | `#5b544f` | 6.48:1 | **4.51:1** (AA) | legenda, crédito, secundário |
| `--tinta-ciano` | `#0d5e67` | 6.51:1 | **4.53:1** (AA) | link, rótulo, fio |
| `--tinta-magenta` | `#8d1da1` | 6.49:1 | **4.51:1** (AA) | a NOTA, destaque, capitular |

### ★ O furo real que isso fechou

**Envelhecer a página derruba o contraste, e não estava no radar de ninguém.** O ciano de tinta calibrado no papel novo dava 5.59:1 e **caía para 3.89:1 na #1: reprovava AA**. O `--tinta-2` e o terciário caíam junto.

A correção **não foi desistir do envelhecimento** (é a peça mais original do projeto). Foi **calibrar toda a tinta no pior papel da banca**. Agora sobra na edição nova e passa na #1. **A revista pode envelhecer para sempre sem nunca ficar ilegível.**

---

## 5. Tela acesa (o buraco de luz no papel, e o site inteiro no dark)

| Token | Hex | / navy | / `--gw-navy-alto` |
|---|---|---|---|
| `--tela-texto-1` | `#dce8f5` | 14.76 (AAA) | 12.53 (AAA) |
| `--tela-texto-2` | `#94a9bf` | 7.59 (AAA) | 6.44 (AA) |
| `--tela-texto-3` | `#798da2` | 5.37 (AA) | 4.55 (AA) |
| `--tela-acento` (ciano) | `#4dd9e8` | 10.83 (AAA) | 9.19 (AAA) |
| `--tela-acento-2` (magenta) | `#cd58e1` | 5.31 (AA) | 4.50 (AA) |
| `--tela-borda-ui` | `#486486` | 3.01 | borda funcional, foco |
| `--tela-borda` | `#2c3d52` | 1.66 | **DECORATIVA. Nunca sozinha** |

---

## 6. O magenta: o que mudou e por quê

O magenta dos assets, `#c23fd9`, dá **4.37:1** sobre navy e **falha AA em texto normal** por margem mínima.

| Hex | / navy | / superfície alta | Veredito |
|---|---|---|---|
| `#c23fd9` (asset) | 4.37 | 3.71 | falha AA nos dois |
| `#cb52e0` | 5.08 | **4.31** | passa no fundo, **falha na superfície elevada** |
| **`#cd58e1`** | **5.31** | **4.50** | **passa AA nos dois. Adotado** |

O `#cb52e0` foi o primeiro candidato, mas a **NOTA vive sobre `--gw-navy-alto`**, e lá ele caía para 4.31. O `#cd58e1` é o mesmo matiz, um degrau acima, e passa nos dois fundos.

**`--gw-magenta-asset` (`#c23fd9`) continua no arquivo, mas proibido como texto.** Serve para **área e preenchimento**, que é o que ele é no jogo: portal, drone, board.

**Regra dura, calculada:** `magenta / ciano = 2.13:1`. **Nunca encostam.**

---

## 7. Tipografia

| Token | Valor | Status |
|---|---|---|
| `--font-display` | `PixelOperatorMono` | **Canônico.** CC0, e **é a fonte da UI do jogo** |
| `--font-revista` | `Noto Serif Condensed` | ⏳ **PROVISÓRIO** |
| `--font-corpo` | `Noto Serif` | ⏳ **PROVISÓRIO** |

⚠️ **Pixel NUNCA em parágrafo.** Só display, título, rótulo, numeral.
⚠️ **O par de corpo é a próxima pergunta ao líder.** Nada de tipografia está fechado além do display.

Escala: `--t-xs` 11px · `--t-sm` 12.5 · `--t-base` 15 · `--t-md` 18 · `--t-lg` 24 · `--t-xl` 33 · `--t-display` 48.
`--lh-corpo: 1.55` é piso, nunca abaixo.

---

## 8. Forma

**★ Raio zero, e não é preguiça:** papel não tem canto arredondado e tinta não tem raio. O **único** raio do site é a moldura do buraco de tela (`--raio-tela: 2px`), porque tela de verdade tem canto. **É a forma dizendo de que material a coisa é feita.**

- `--raio-papel: 0` · `--raio-tela: 2px`
- Espaço: base 8px (`--espaco-1` 4 … `--espaco-8` 32)
- Elevação de **papel**: `--sombra-folha` (sombra de folha, não de material design)
- Elevação de **tela**: `--brilho-tela` (a luz vaza, não projeta sombra)

---

## 9. Acessibilidade: o que está garantido

- **Cor nunca carrega significado sozinha.** A NOTA tem o rótulo "GRÁFICOS" escrito; o link tem sublinhado; a borda decorativa (1.66:1) nunca é o único indicador.
- **Todo texto passa AA em qualquer idade de papel** (§4), inclusive na #1.
- **`prefers-reduced-motion`:** o site **é** movimento, então a regra é: **o movimento pode sumir, a informação não.** Quem desliga vê o quadradinho parado **no destino**, não sumido.
- **Pixel nunca em parágrafo.**

---

## 10. Pendente

- ⏳ **O par tipográfico de corpo** (próxima pergunta ao líder).
- ⏳ **Scanline/CRT sobre texto derruba contraste**: precisa ser desligável, e o botão já está no conceito.
- ⏳ **A mancha de café não pode cair sobre texto** (já anotado no `TODO.md`).
