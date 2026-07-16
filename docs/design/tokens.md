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

**Decidida pelo líder em 2026-07-16: o par A**, escolhido vendo os três pares **renderizados lado a lado em 420px** ([`mockups/02-tipografia.html`](mockups/02-tipografia.html)).

| Token | Fonte | Licença | Peso | Papel |
|---|---|---|---|---|
| `--font-display` | **PixelOperatorMono** | **CC0** | 9,1 KB | logo, rótulo, numeral, UI. **É a fonte da UI do jogo** |
| `--font-manchete` | **Archivo Narrow** 700 | **OFL** | 11,5 KB | manchete, chamada |
| `--font-corpo` | **Vollkorn** 400/600/itálico | **OFL** | 76,7 KB | corpo, lide, texto longo |
| | | | **96,7 KB** | **total, tudo self-hosted** |

Valores aprovados (os que o mock usa): `--manchete-peso: 700` · `--manchete-lh: .95` · `--manchete-ls: -.018em` (a condensada pede tracking negativo) · `--corpo-peso: 400` · `--linha-fina-peso: 600`.

⚠️ **O Vollkorn baixado não tem peso 700.** O lide usa **600**. Pedir 700 causa síntese de negrito pelo browser, que fica ruim.

Escala: `--t-xs` 11px · `--t-sm` 12.5 · `--t-base` 15 · `--t-md` 18 · `--t-lg` 24 · `--t-xl` 33 · `--t-display` 48.
`--lh-corpo: 1.55` é piso, nunca abaixo.

### ★ Por que a condensada, e o número é o motivo (não simplifique isto)

A manchete de revista **tem que caber em 390px**, porque **a criança chega de celular, por link**. No mock 02, com os três pares no mesmo espaço e o mesmo texto:

- **Par A (Archivo Narrow):** diz **"AGORA EU ANDO NA DIAGONAL" inteira, em uma linha, com o maior corpo dos três.**
- **Par B (Newsreader):** cabe, mas a manchete não dá soco: vira suplemento cultural.
- **Par C (PixelOperatorMono):** é **a menor das três e ainda assim aperta mais**. Fonte pixelada tem **largura fixa e não condensa**.

**Isto não é gosto: é o único par que resolve o problema.** Se alguém "simplificar" para uma família só para economizar 11 KB, **a manchete quebra no celular** e o motivo terá sido esquecido. Está escrito aqui para não ser desfeito por engano.

### ★ O pixel só é especial enquanto é raro (regra de identidade)

> **O lugar do pixel é onde o JOGO está:** logo, rótulo, numeral, e dentro das telas acesas.
> **A manchete é a REVISTA falando, não o jogo.**

O par C era o mais tentador: a manchete passaria a ser literalmente a fonte do jogo, vazando do Tavus-Drive, a custo zero. **Perdeu por dois motivos, e os dois valem para sempre:**

1. **Pixel não escala.** Largura fixa, não condensa, quebra feio em manchete longa no celular.
2. **Se o pixel estiver em todo título, vira o fundo e para de significar.** Ele já está no logo, nos rótulos, nos numerais e dentro de cada tela acesa. **Raridade é o que o faz funcionar.**

**Isto é uma regra de identidade, não uma nota de rodapé.** Quando alguém perguntar "por que não usa a fonte do jogo no título?", a resposta está aqui.

### Licenças (o `AUD-LICENCA` vai cobrar)

| Fonte | Licença | Arquivo no repo | CDN em runtime |
|---|---|---|---|
| PixelOperatorMono | **CC0 1.0 Universal** | `fonts/PixelOperator-LICENSE-CC0.txt` | **não** |
| Archivo Narrow | **SIL OFL 1.1** | `fonts/LICENSE-archivo-narrow.txt` | **não** |
| Vollkorn | **SIL OFL 1.1** | `fonts/LICENSE-vollkorn.txt` | **não** |

**Todas self-hosted. Nenhuma requisição sai do domínio.** Google Fonts está proibido: transferiria o IP do visitante, **e há criança no público**. O texto de licença de cada uma está commitado ao lado do arquivo, e a OFL exige que acompanhe a fonte.

O `PixelOperatorMono` foi **convertido de TTF para woff2** (74% menor: 33,7 KB para 9,1 KB). O original segue intacto no repo do jogo, que é read-only.

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

## 10. Os dois véus: o CRT e o café

Os dois **escurecem o que está embaixo**, então os dois são risco de contraste. Medidos, não chutados. Prova renderizada: [`mockups/03-crt-cafe-motion.html`](mockups/03-crt-cafe-motion.html).

### 10.1 O CRT (scanline), desligável, com zero JavaScript

**Achado que contraria a intuição:** o scanline cai por cima **do texto e do fundo juntos**, na mesma proporção, então **a razão de contraste quase não muda**. O CRT é bem menos perigoso do que a literatura sugere. Isso **só vale enquanto ele ficar por cima dos dois**: se cair só no fundo, quebra na hora.

Medido sobre a tela acesa com `--crt-alpha: .27`:

| | sem CRT | com CRT | |
|---|---|---|---|
| `--tela-texto-1` | 14.76 | **8.09** | AA |
| ciano | 10.83 | **6.07** | AA |
| magenta | 5.31 | **3.26** | ⚠️ **só texto grande** |

- **Teto: `.35`.** Em `.45` o ciano cai para 3.78 e reprova AA.
- ⚠️ **Com o CRT ligado, o magenta deixa de servir como texto normal.** Ele já só é usado em numeral grande (a NOTA "6,0", que precisa de 3:1 e passa), então está coberto. **Mas não invente magenta em parágrafo.**
- **O CRT só cai dentro de `.aceso`.** É a tela do jogo que tem scanline. **Papel não é tubo.**

**Sem JS:** `<input type="checkbox">` nativo + `:has()`. O input é real (só escondido do olho), então **Tab + Espaço funciona e o leitor de tela anuncia o estado**; o rótulo **escreve** "LIGAR"/"DESLIGAR", então a cor da luzinha nunca é o único indicador. Persistir entre páginas continua sem JS: o PHP grava um cookie e escreve `data-crt="on"` no `<html>`. O CSS aceita os dois caminhos.

### 10.2 A mancha de café, e o guard que ela exige

> "A única marca que insinua comunidade sem contador de visitas."

**★ A conta que decide o desenho:** sobre a edição #1 encardida, a mancha derruba o texto secundário **abaixo de AA já com alpha 0.08**, quando ela está quase invisível:

| | secundário | ciano de tinta | |
|---|---|---|---|
| alpha .08 sobre a #1 | **4.04** | **4.06** | **FALHA AA** |

**Não existe mancha de café visível que possa cair sobre texto na edição velha.** Isso não é preferência estética: **é aritmética.**

**Por isso ela não é "posicionada com cuidado": ela é clipada por uma zona segura.**

```html
<div class="zona-cafe">
  <i class="cafe" style="--cafe-x:30%; --cafe-y:55%"></i>
</div>
```

**O guard é o `overflow:hidden` da `.zona-cafe`**, e é isso que o torna confiável: **se alguém errar a coordenada, a mancha é cortada em vez de invadir o texto.** Não depende de ninguém lembrar da regra daqui a seis meses. A zona só é colocada onde não há parágrafo: **margem, rodapé, ou por cima da tela acesa** (derramar café na foto da revista é natural, e ali não há texto).

**★ E a consequência boa de ter resolvido direito:** como a zona garante que não há texto embaixo, **o alpha do café é livre** (`.42`). Ele não precisa ser tímido. O `.18` seria o teto se a mancha pudesse encostar em texto; como não pode, ela pode ser uma mancha de café de verdade. **Resolver o problema direito é o que permite a coisa ser bonita.**

⚠️ **Armadilha de CSS encontrada aqui:** `calc(var(--x) * 70%)` **dentro de `color-mix()` não resolve**, e a mancha some inteira, **sem erro nenhum no console**. A intensidade vem do `opacity` do elemento e os alphas do gradiente são fixos.

### 10.3 Motion reduzido

O site **é** movimento, então a versão reduzida não pode virar site quebrado. A regra: **o movimento pode sumir, a informação não.** Quem desliga motion vê o quadradinho **parado no destino** (onde ele chegou), não sumido, e a página continua contando a mesma coisa. **Nada depende de animação para ser entendido.**

Conferir: no Firefox, `about:config` → `ui.prefersReducedMotion` = `1`.

---

## 11. Pendente

- ⏳ **A primeira dobra** com o quadradinho jogável (`QUADRADINHO`).
- ⏳ **Mobile** (`MOBILE-RISCO`): o quadradinho precisa de teclado, e no celular não há teclado. **Decisão do líder, com protótipo nos dois tamanhos.**
