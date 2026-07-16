# Mockups da Glyfesse

Índice dos mockups renderizados. **Cada um abre no navegador** (`file://`), sem servidor, sem build, sem rede.
Zero dependência externa: fonte local (CC0), texturas em SVG inline. **O que está aqui é reaproveitável como HTML/CSS de produção.**

| # | Arquivo | O que decide | Status |
|---|---|---|---|
| 00 | [`00-vibe-o-material.html`](00-vibe-o-material.html) | **A vibe: de que MATERIAL o site é feito?** Três direções (papel / tela do Tavus-Drive / papel fotografado), a mesma dobra e o mesmo texto do Gus nas três. | ✅ **decidido: papel + foto como tratamento** |
| 02 | [`02-tipografia.html`](02-tipografia.html) | **A tipografia.** Três pares display + corpo, a mesma dobra, com a seção de programação embaixo (o texto mais longo do site) para testar leitura de verdade. Todas OFL e self-hosted. | ⏳ **aguardando decisão do líder** |
| 01 | [`01-tokens.html`](01-tokens.html) | **Os tokens.** Os dois materiais lado a lado, a banca envelhecendo por `--idade`, a prova de leitura no papel encardido, e todas as amostras com a razão medida. Não redefine nenhuma cor: consome [`../tokens.css`](../tokens.css), o CSS de produção. | ✅ aprovado no Gecko |

## Como abrir

```bash
firefox --new-tab docs/design/mockups/02-tipografia.html
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
| `PixelOperatorMono` | **CC0** | display, rótulo, numeral. **Canônica: é a fonte da UI do jogo** | 34 KB (ttf) |
| `Vollkorn` | OFL | candidata a corpo (par A) | 78 KB |
| `Archivo Narrow` | OFL | candidata a manchete (par A) | 11,7 KB |
| `Newsreader` | OFL | candidata a par único (par B) | 46 KB |
| `Alegreya` | OFL | candidata a corpo (par C) | 47 KB |
| `Anton`, `Oswald` | OFL | alternativas de manchete, não usadas nos pares | 31 KB |

**Depois da decisão, as não escolhidas saem do repo.** Só a família vencedora vai a produção.
