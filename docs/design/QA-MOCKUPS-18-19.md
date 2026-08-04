# Auditoria visual independente — mocks 18 (a HQ) e 19 (o pôster)

QA independente: não construí nada, apenas observei, medi e reportei. **Nenhum arquivo do projeto foi editado** (`git status` limpo ao fim).

## 1. Prova de que os artefatos não mudaram

| Arquivo | md5 ANTES | md5 DEPOIS | mtime ANTES | mtime DEPOIS |
|---|---|---|---|---|
| `18-hq-o-quadrado.html` | `f681b3cf72dc982585aa0ee37f780b20` | `f681b3cf72dc982585aa0ee37f780b20` | 2026-08-04 06:52:12 | 2026-08-04 06:52:12 |
| `19-poster-quadrado-tamanho-real.html` | `c15e46bf818a12d7b38901cc2281352f` | `c15e46bf818a12d7b38901cc2281352f` | 2026-08-04 08:14:37 | 2026-08-04 08:14:37 |

**Os quatro valores conferem. Nenhum artefato mudou durante a auditoria: todas as observações visuais são válidas.**

## 2. Como observei

- **Firefox 153 do sistema (Gecko)**, `--headless --new-instance --profile <dir novo>`, WebRender desligado via `user.js` + `MOZ_ACCELERATED=0`. Nenhum travamento de `RenderCompositorSWGL` ocorreu.
- Renders full-page a **1200px** e **390px**; ampliações sempre em **nearest-neighbor** (`-filter point`).
- Layout e enumeração de texto medidos por **Marionette** falando direto com esse mesmo Firefox (o Firefox do Playwright não está baixado e **não instalei nada**).
- PDFs de impressão gerados **nos dois motores**: Chromium (caminho canônico da casa) e Gecko (`WebDriver:Print`).
- Matei **apenas** os processos que eu mesmo criei; os 13 Firefox da sessão do líder não foram tocados.

### Duas falhas do MEU instrumento, declaradas para você poder descontar

1. **A janela headless do Firefox não desce de 500px.** A primeira medição "a 390" era na verdade 488. Refiz num **iframe de 390px** com altura suficiente para não rolar (clientWidth = 390 exatos) e screenshot do container — assim as coordenadas do DOM batem 1:1 com o pixel do PNG.
2. **`getComputedStyle().color` devolve `oklab(...)`** nos elementos que usam `--papel` (que é `color-mix in oklab`). Meu parser ingênuo lia `0.94` como canal RGB e produzia `(0,0,0)`, invertendo texto e fundo. Com o parser errado apareceram **7 reprovações de contraste que não existem**. Corrigido com conversão oklab→sRGB explícita. **As reprovações eram artefato meu, não defeito das peças.**

Registro também um **falso positivo que quase reportei**: no PDF ampliado, o "3" do expediente *parecia* decepado pela borda. A medição da bbox mostrou **9×16 px nos dois motores, razão idêntica** — o glifo está inteiro; o que eu via era a transição papel→branco logo após ele. A imagem ampliada enganou; a medição corrigiu.

---

# CRÍTICO

**Nenhum, nas duas peças.**

---

# IMPORTANTE

**Nenhum, nas duas peças.**

---

# COSMÉTICO

## Mock 18

**C18.1 — O "quadrado azul" lê como petróleo/verde-azulado, não azul.**
Medido no render: `#0D5E67` = `rgb(13,94,103)`. É o token `--tinta-ciano`, que o `tokens.css` descreve como "o ciano do jogo, impresso" — ou seja, **é o token certo do sistema** e o contraste foi medido (6.28:1 sobre este papel). Registro só porque o `aria-label` diz "o quadrado **azul**" e o mock 19 se chama "O QUADRADO **AZUL**": quem ler a descrição e depois olhar a chapa vai ver verde-azulado. Decisão de sistema, não defeito da peça — mas é do editor-geral, não minha.

**C18.2 — No quadro 1, o protagonista não é um quadrado.**
A "lasca" que entra pela borda esquerda é um **retângulo vertical fino** (o quadrado com `translate:-76%`). Funciona como recurso de quadrinho (o quadro corta o personagem) e a sequência resolve retroativamente no quadro 2. Mas, isolado, o quadro 1 pode ser lido como "um objeto fino colado na parede esquerda" e não como "o quadrado chegando". Não recomendo mexer — mudar isso custa o silêncio do quadro 1, que é o ponto da peça.

## Mock 19

**C19.1 — Na impressão, o expediente encosta na borda do papel.**
Medido nos dois motores: o papel da folha termina em x=1023 e o glifo mais à direita ("Nº **3**") termina em x=1022 (Gecko) / x=1023 (Blink). **Folga de 0 a 1 px.** Causa: `@media print { .folha { padding:0 } }` faz o conteúdo usar toda a largura do papel. **Não há corte** (o `@page margin:10mm` garante a margem física), então é falta de respiro visual, não perda de informação. O mock 18 tem o mesmo padrão, com 8px de folga.

**C19.2 — A nota do CSS superestima o tamanho da chapa no mobile.**
O comentário diz *"em 390 ele fica com ~318px de lado"*. **Medido: 278×278 px** (−13%). O número não muda nada no resultado — a chapa continua dominando —, mas se alguém usar essa conta como base para outra peça, herda o erro.

**C19.3 — Redundância de chrome, não de pôster** (ver item 12 abaixo).
"GLYFESSE" aparece 3×, "PÔSTER" 3×, "CENTRAL" 2× dentro da folha. O bloco de **crédito** (`GLYFESSE Nº 3 · PÔSTER CENTRAL` / `DESTAQUE PELA DOBRA`) repete o que a tarja do topo e o rodapé já dizem. É o único candidato a corte se você quiser enxugar — decisão sua, não defeito.

---

# O QUE PASSOU (declarado, não só o que falhou)

- **A história da HQ se lê sem legenda.** Descrevi os três quadros antes de olhar as legendas e bati com o roteiro aprovado.
- **Contato e repetição chegam** no quadro 2 e no quadro 3, por vocabulário de quadrinho (leque de impacto, eco tracejado, rastro, riscos no chão) — sem seta, sem asterisco, sem texto.
- **O quadrado não foi humanizado** em nenhum quadro.
- **Zero rolagem horizontal** a 390px nas duas peças (medido, não estimado).
- **Zero fonte pixel abaixo de 15px** em 176 nós de texto enumerados.
- **Zero texto abaixo do mínimo WCAG**, contra o fundo real de cada elemento.
- **Zero texto sobre a chapa azul** (provado por interseção de bounding boxes).
- **A piada de escala do pôster funciona** e não é explicada em lugar nenhum.
- **As marcas de corte e registro parecem material gráfico de verdade**, e o conserto da colisão com a tarja **está confirmado nos dois motores**.
- As duas peças **pertencem visivelmente à mesma revista** que os mocks 14, 15 e 17.

---

# Checklist item a item

## Mock 18 — a HQ

| # | Item | Veredicto | Observação |
|---|---|---|---|
| 1 | História legível sem legenda | ✅ | **Descrevi antes de ler as legendas:** (1) uma sala vazia com uma lasca azul entrando pela borda esquerda; (2) o quadrado atravessou a sala e bateu na parede da direita, com rastro de velocidade atrás; (3) ele voltou e bateu de novo — o contorno tracejado marca onde ele estava. Bate item por item com o roteiro. **Não precisei da legenda.** |
| 2 | Quadro 2 comunica contato / quadro 3 comunica repetição | ✅ | Contato: leque de 5 traços nascendo exatamente do meio da face direita, no ponto de encosto — inequívoco. Repetição: o **eco tracejado com miolo de papel** é o que faz a leitura ("ele ESTAVA aqui"); o segundo leque girado e os dois riscos no chão reforçam. A diferença de densidade do rastro é sutil demais para carregar sozinha, mas não precisa. |
| 3 | Quadrado não humanizado | ✅ | Sem rosto, olhos, membros ou deformação de impacto. Os únicos filhos do elemento são os leques. Quatro lados, chapado, contorno preto. |
| 4 | Empilha a 390, lado a lado no largo, nunca 2+1 | ✅ | Medido em 4 larguras: **620px → 1 coluna** (página com 2130px de altura); **660, 700 e 900px → 3 colunas** (altura ~880px). O salto limpo de altura prova que não existe estado 2+1. |
| 5 | Rolagem horizontal a 390px | ✅ | **Medido: `scrollWidth` = `clientWidth` = 390. Zero px de rolagem.** 4 elementos ficam fora do viewport (a lasca do quadro 1 e os leques), mas **todos são clipados por ancestral** com `overflow:hidden` — é o quadro cortando o personagem, intencional. |
| 6 | Fonte pixel abaixo de 15px | ✅ | **39 nós de texto enumerados** (não busquei por suspeita). PixelOperatorMono aparece em exatamente 3 lugares: faixa de contexto (15px), logo (32px), número do quadro (16px). **Nenhum abaixo de 15px.** Ampliei em nearest-neighbor: o **`2`** do quadro 2 lê como 2, não Z; os `S` de GLYFESSE não viram 5. |
| 7 | Contraste contra o fundo real | ✅ | Menor razão medida em texto: **5.97:1** (legenda/rodapé sobre papel) e **6.00:1** (kicker ciano). Tarja e número do quadro: 15.12:1 (papel sobre preto). Todos ≥ 4.5. Amostrado dentro da folha, no render. |

## Mock 19 — o pôster

| # | Item | Veredicto | Observação |
|---|---|---|---|
| 8 | A piada de escala funciona | ✅ | **Sim, e é o acerto da peça.** A solenidade chega primeiro — título em caixa alta gigante, moldura dupla, tarja invertida "TAMANHO REAL", cruzes de registro, barra de controle de cor, vinco de dobra — e o que está lá dentro é uma chapa lisa. A ficha `16 × 16 PX` fecha a piada no rodapé do encarte, como dado, sem uma linha comentando. **Senti a ironia sem que ninguém a explicasse.** |
| 9 | A chapa domina nos dois tamanhos | ✅ | **Medido: 636×636px a 1200 (78% da largura da folha) e 278×278px a 390 (71% da largura da tela).** Quadrado perfeito nos dois. **Não vira quadradinho tímido no celular.** (Ver C19.2 sobre a nota do CSS.) |
| 10 | Nada em cima da chapa | ⚠️ | **Texto: zero** — provado por interseção de bounding boxes (0 de 49 nós). **Borda: nenhuma** — a chapa encosta direto no papel. **Mas há um elemento dentro dela: o vinco da dobra**, uma faixa de 26px que escurece o azul de `(13,94,103)` para `(12,73,80)` e clareia até `(61,124,131)`. Fora dessa faixa a chapa é lisa (variação de 4/255, que é a fibra do papel). Isso é **intencional e documentado** (a dobra vive na chapa porque é a única região sem texto). Marco ⚠️ só porque o item pedia "nenhuma sombra dentro dela" e tecnicamente há um gradiente — **a decisão é sua, não é defeito.** |
| 11 | Marcas de corte e registro / a colisão consertada | ✅ | Parecem material gráfico de verdade: as marcas são **L aberto** (as duas linhas não se tocam no canto, que é como prova de gráfica se imprime) e nascem **fora do filete fino**. A cruz de registro é círculo + cruz atravessando, no eixo do vinco. **O conserto está confirmado na impressão, nos dois motores:** a tarja termina em y=181/182 e o traço da marca começa em y=201/202 — **20px de folga (~3,9mm)**. Não encosta. |
| 12 | Volume de texto — pouco, certo ou demais? | ✅ | **Contei: 17 nós, agrupados em 9 blocos visuais.** Deles, **4 são chrome fixo da revista** (logo, expediente, tarja de topo, rodapé) que aparece em toda página e não conta como "escrita do pôster". **Do pôster mesmo são 5:** kicker, título, tarja, ficha, crédito. **Meu parecer: está certo, no limite superior — não é demais.** Título + tarja + ficha *são* a piada e não podem sair; o kicker é convenção de banca. O único dispensável é o **crédito**, e por repetição, não por volume (ver C19.3). A pauta "só arte, zero escrita" está respeitada onde importa: **nenhuma linha explica a piada e nenhuma toca a chapa.** |
| 13 | Rolagem horizontal a 390px | ✅ | **Medido: `scrollWidth` = `clientWidth` = 390. Zero px.** Nenhum elemento fora do viewport — nem clipado. |
| 14 | Fonte pixel abaixo de 15px | ✅ | **49 nós enumerados.** PixelOperatorMono em 2 lugares: faixa de contexto (15px) e logo (32px). **Nenhum abaixo de 15px.** Ampliado em nearest-neighbor: o **`N`** de "CENTRAL" a 15px lê como N, **não virou H** — este era o risco real, já que 15px é o piso exato. |
| 15 | Contraste contra o fundo real | ✅ | Menor razão: **5.97:1** (ficha/crédito/rodapé sobre papel) e **6.00:1** (kicker ciano). Título 96px: 14.44:1. Tarja "TAMANHO REAL": 15.12:1 (papel sobre preto). Todos ≥ 4.5. **Nenhum texto sobre a chapa azul**, então a razão 2.4:1 de preto sobre o azul nunca chega a existir. |

## Fidelidade ao sistema

| # | Item | Veredicto | Observação |
|---|---|---|---|
| 16 | Parecem da mesma revista que 14, 15, 17 | ✅ | Renderizei os três e comparei **olhando**, empilhados. Compartilham: papel bege com fibra, logo GLYFESSE em pixel com a franja ciano/magenta, expediente "ANO 1 · Nº 3 / GUSWORLD.SITE" à direita, tarja preta de chamada, kicker ciano em caixa alta espaçada, Archivo Narrow nas manchetes, Vollkorn no corpo, rodapé de 3 campos. O 19 é o único com **título em caixa alta** e o único **sem corpo de texto** — mas isso é o gesto de pôster, e a tipografia continua a mesma. **Nada destoa.** |

---

## Contagem final da enumeração

| Peça | Nós de texto | Pixel <15px | Contraste reprovado |
|---|---|---|---|
| Mock 18 @1200 | 39 | 0 | 0 |
| Mock 18 @390 | 39 | 0 | 0 |
| Mock 19 @1200 | 49 | 0 | 0 |
| Mock 19 @390 | 49 | 0 | 0 |
| **Total** | **176** | **0** | **0** |

Formatos de cor não reconhecidos pelo instrumento: **0** (aborta em vez de virar preto silencioso).

## Veredicto

**As duas peças passam.** Zero achado crítico, zero importante. Os cinco itens cosméticos são: um descompasso de vocabulário (azul × petróleo), uma leitura possível do quadro 1, zero margem lateral no modo impressão, um número otimista num comentário de CSS, e uma repetição de chrome no pôster. **Nenhum deles impede publicação, e nenhum é decisão minha.**
