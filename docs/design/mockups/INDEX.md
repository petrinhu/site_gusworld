# Mockups da Glyfesse

Índice dos mockups renderizados. **Cada um abre no navegador** (`file://`), sem servidor, sem build, sem rede.
Zero dependência externa: fonte local (CC0), texturas em SVG inline. **O que está aqui é reaproveitável como HTML/CSS de produção.**

| # | Arquivo | O que decide | Status |
|---|---|---|---|
| 00 | [`00-vibe-o-material.html`](00-vibe-o-material.html) | **A vibe: de que MATERIAL o site é feito?** Três direções (papel / tela do Tavus-Drive / papel fotografado), a mesma dobra e o mesmo texto do Gus nas três. | ⏳ **aguardando decisão do líder** |

## Como abrir

```bash
firefox docs/design/mockups/00-vibe-o-material.html
```

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
