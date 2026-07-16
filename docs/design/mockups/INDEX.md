# Mockups da Glyfesse

Índice dos mockups renderizados. **Cada um abre no navegador** (`file://`), sem servidor, sem build, sem rede.
Zero dependência externa: fonte local (CC0), texturas em SVG inline. **O que está aqui é reaproveitável como HTML/CSS de produção.**

| # | Arquivo | O que decide | Status |
|---|---|---|---|
| 00 | [`00-vibe-o-material.html`](00-vibe-o-material.html) | **A vibe: de que MATERIAL o site é feito?** Três direções (papel / tela do Tavus-Drive / papel fotografado), a mesma dobra e o mesmo texto do Gus nas três. | ✅ **decidido: papel + foto como tratamento** |
| 03 | [`03-crt-cafe-motion.html`](03-crt-cafe-motion.html) | **O CRT desligável (zero JS), a mancha de café com o guard, e o motion reduzido.** Aplicação de decisões já tomadas. Traz a demonstração lado a lado do que a `.zona-cafe` impede. | ✅ pronto |
| 02 | [`02-tipografia.html`](02-tipografia.html) | **A tipografia.** Três pares display + corpo, a mesma dobra, com a seção de programação embaixo (o texto mais longo do site). | ✅ **decidido: par A** (Archivo Narrow + Vollkorn). ⚠️ **histórico:** as fontes dos pares B e C saíram do repo, então os painéis B e C agora caem no fallback serif. Para revê-lo como foi decidido: `git checkout 6ac1841 -- docs/design/mockups/fonts/` |
| 01 | [`01-tokens.html`](01-tokens.html) | **Os tokens.** Os dois materiais lado a lado, a banca envelhecendo por `--idade`, a prova de leitura no papel encardido, e todas as amostras com a razão medida. Não redefine nenhuma cor: consome [`../tokens.css`](../tokens.css), o CSS de produção. | ✅ aprovado no Gecko |
| 04 | [`04-em-breve.html`](04-em-breve.html) | **A Edição #0 no ar** (gusworld.site): o monitor CRT real com SOON, o Gus, a versão e os glitches. É o vocabulário visual aprovado com que a primeira dobra conversa. | ✅ **no ar** |
| 05 | [`05-primeira-dobra.html`](05-primeira-dobra.html) | **Como a primeira dobra abre.** O mesmo quadradinho jogável (setas do teclado, JS mínimo) em três enquadramentos: A o quadradinho é a capa, B a capa de banca, C o boot CRT. | ✅ **decidido: A** (o quadradinho é a capa, brinquedo primeiro) |
| 06 | [`06-mobile.html`](06-mobile.html) | **O controle no celular sem teclado.** Quatro saídas, cada uma num telefone de 390px de verdade e jogável (Pointer Events, mouse e toque): d-pad na tela, toque-e-arraste, auto-anda + toque para assumir, desktop-only. A capa A4 degradando para coluna única. | ✅ **decidido: 3** (auto-anda + toque para assumir) |

## Como abrir

```bash
firefox --new-tab docs/design/mockups/03-crt-cafe-motion.html
```

## ⚠️ Verificar no Gecko, não no Blink

O líder usa **Firefox**. Esta estética depende de textura, `mix-blend-mode` e filtro SVG, que é **exatamente** onde os motores divergem: um mock aprovado no Blink **não** é um mock aprovado. Já custou um bug real (a fibra do papel sumia no Firefox, e a direção recomendada ia ser julgada sem ela).

```bash
# screenshot proprio, no motor certo. --new-instance --profile e OBRIGATORIO:
# sem eles o firefox so anexa na janela ja aberta e sai com exit 0 SEM GERAR NADA.
MOZ_HEADLESS=1 firefox --headless --new-instance --profile /tmp/ffp \
  --window-size=1400,2000 --screenshot /tmp/out.png "file://$PWD/01-tokens.html"
```

**Nunca automatizar a janela do líder** (ambiente médico). Abrir é permitido; dirigir por teclado sintético, não.

## Convenções destes mocks

- **Conteúdo real, nunca lorem ipsum.** O texto é a voz canônica do Gus ("Agora eu ando na diagonal", "Eu... gostava dele", a NOTA de Gráficos 6,0).
- **Cada painel tem ~400px de largura: o mock JÁ é o teste mobile**, não uma promessa dele.
- **Contraste é medido, não estimado.** Os números impressos em cada painel saem de cálculo WCAG 2.x sobre os hex reais.
- `prefers-reduced-motion` respeitado desde o primeiro mock (o quadradinho para no destino, e a informação continua lá).

## As medidas que já valem como constraint

Calculadas sobre os hex extraídos dos assets do jogo.

| Par | Razão | Veredito |
|---|---|---|
| navy `#0d1520` / papel `#f4efe4` | **15.99:1** | AAA. **O navy do jogo já é a tinta preta da revista.** |
| ciano `#4dd9e8` / navy `#0d1520` | **10.83:1** | AAA |
| ciano `#4dd9e8` / papel `#f4efe4` | **1.48:1** | **some.** A paleta do jogo é feita de LUZ, não de tinta. |
| magenta `#c23fd9` / navy | **4.37:1** | falha AA em texto normal |
| magenta `#cb52e0` / navy | **5.08:1** | **passa AA.** Um degrau de luminosidade resolve. |
| magenta `#c23fd9` / ciano | **2.48:1** | nunca encostar |
| tinta ciano `#06687c` / papel | **5.59:1** | AA. É o ciano quando ele é impresso. |
| tinta magenta `#7d1a8a` / papel | **7.67:1** | AAA |

## Fontes (todas self-hosted, zero terceiro)

Nenhuma fonte vem de CDN externo: Google Fonts transferiria o IP do visitante, **e há criança no público**. Tudo mora em `fonts/` e é servido pelo próprio site.

| Fonte | Licença | Papel | Peso |
|---|---|---|---|
| `PixelOperatorMono` | **CC0** | display, rótulo, numeral. **É a fonte da UI do jogo** | **9,1 KB** (woff2) |
| `Archivo Narrow` 700 | **OFL** | manchete | 11,5 KB |
| `Vollkorn` 400/600/it | **OFL** | corpo | 76,7 KB |
| | | **TOTAL** | **96,7 KB** |

✅ **Feito:** as candidatas não escolhidas (Newsreader, Alegreya, Anton, Oswald) foram removidas. O `PixelOperatorMono` foi convertido de TTF para **woff2: 74% menor** (33,7 KB para 9,1 KB); o original segue intacto no repo do jogo, que é read-only.

**Nenhuma fonte vem de CDN em runtime.** O texto da licença de cada uma está commitado ao lado do arquivo (a OFL exige que acompanhe a fonte).
