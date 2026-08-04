# Auditoria visual independente — mock 17 `17-detonado-censurado.html`

**QA:** qa-engineer (não construí esta peça; não editei nenhum arquivo do projeto)
**Data:** 04/08/2026, 00:12 → 00:28

## Prova de estabilidade do artefato

| momento | md5 | mtime |
|---|---|---|
| **ANTES** (00:12:15) | `63db5fc281123f8e1ec270e8c34de9d3` | `2026-08-04 00:05:35` |
| **DEPOIS** (00:28:01) | `63db5fc281123f8e1ec270e8c34de9d3` | `2026-08-04 00:05:35` |

✅ **Iguais.** Ambos batem com o esperado no briefing. O artefato ficou congelado durante toda a auditoria — as observações valem.

## Método

Firefox (Gecko) headless, `--new-instance --profile $(mktemp -d)`, como mandado. Renderizei **16 larguras**, não 3: as 3 pedidas mais uma varredura de 360→1440 que é de onde saiu o achado principal.

Duas cópias-sonda foram criadas **no scratchpad** (o original nunca foi tocado):
- `probe-medida.html` — o original + um script que imprime `scrollWidth`/`maxRight` na tela (item 8: medir, não estimar).
- `probe-print.html` — o original com `@media print{` trocado por `@media screen{`, para poder **ver** as regras de impressão (item 14).

Medições de pixel (largura de tarja, pureza do preto, contraste real) em Python/Pillow, sobre o PNG renderizado.

---

# CRÍTICO

**Nenhum.** A trava do embargo passou em tudo, e a peça não tem defeito que impeça publicar.

---

# IMPORTANTE

## I-1 · O halo do `sterling corp.` apaga texto do corpo em quase toda largura abaixo de ~760px — não só no mobile, e não só "cerca de uma letra"

O construtor declarou: *"no mobile ele encosta em texto do corpo e vela cerca de uma letra"*. **Confirmo o fenômeno e desminto a extensão.** O `text-shadow` cor-do-papel que protege o rótulo apaga o que estiver por baixo dele, e **em 390px o que ele apaga é só uma vírgula** — mas o carimbo só escorrega para a margem limpa em `min-width:760px`, e entre 360 e 759px a quina inferior direita cai **dentro da coluna de texto**, em posição que muda a cada largura.

Não fui procurar onde dói; **enumerei a faixa**. Mapa medido, rótulo localizado por cor exata (`#b81f26`, que só existe fora do multiply):

| largura | o que o halo apaga | gravidade |
|---|---|---|
| 360px | a letra **`e`** de "abr**e** a tela" | 1 letra |
| **390px** | a **vírgula** depois de "olhando" | pontuação |
| **430px** | a palavra inteira **`se`** ("confere ~~se~~ cada") | ❗ palavra |
| 500px | nada — o rótulo cai acima da linha | ✅ limpo |
| 560px | as letras **`nh`** de "sozi**nh**a" | 2 letras |
| 620px | as letras **`ha,`** de "sozin**ha,**" | 2 letras |
| **680px** | a palavra inteira **`eu`** ("que ~~eu~~ mexo") | ❗ palavra |
| 720px | as letras **`ém`** de "ningu**ém**" | 2 letras |
| 759px | a letra **`o`** de "**o**lhando" | 1 letra |
| 760px | a **vírgula** depois de "olhando" | pontuação |
| 900 / 1024 / **1200** / 1440px | nada | ✅ limpo |

Nenhuma palavra fica irrecuperável — o contexto devolve todas. Mas 430px e 680px comem **palavras funcionais inteiras**, e 430px é largura de celular grande em paisagem / tablet pequeno em retrato. O `translate:-38%` do breakpoint de 760px resolve o desktop e deixa a faixa 360–759 sem tratamento.

Evidência: `z360.png`, `z430.png`, `z560.png`, `z620.png`, `z680.png`, `z720.png`, `z_corp_759.png`, `z_corp_760.png`, `z_econf_mob.png`, `z_sweep_corp.png` (contact sheet das 8 larguras lado a lado).

Não proponho conserto — só registro que o problema é mais largo do que foi declarado.

## I-2 · A fonte pixel tem MAIS um irmão degradado: `S` maiúsculo vira `5` — e ele está no nome da própria revista, no rodapé

O briefing me mandou não procurar só o `2` e o `N`. Enumerando **todos** os pontos da peça em fonte pixel abaixo de 15px, apareceram três degradações, uma delas nova:

**(a) `S` maiúsculo → `5`, a ≤12px.** No rodapé (12px), o wordmark em negrito lê **`GLYFE55E`**, e a linha de serviço lê **`Detonado da 5imulação`**. Verificado em macro de 1400% (`z_simulacao.png`, `z_rod_desk.png`, `z_rod_mob.png`), não deduzido.

⚠️ **É herdado, não introduzido aqui.** Renderizei o mock 14 e o rodapé dele mostra o mesmo `GLYFES5E` (`z_rod14.png`); o bloco `.rodape` é idêntico nos três mocks (14, 15, 17). Logo isto é achado **de sistema**, para a regra da casa, não defeito deste build — mas está nesta peça e sai impresso nela.

**(b) `s` minúsculo → algo entre `o` e `e`, a ≤12px.** Em toda parte pequena: a chamada preta lê `oeção de oerviço` (11px, e a inversão branco-sobre-preto piora), o kicker ciano lê `oeção noua · oó neota edição` (12px), o cabeçalho do bloco lê `oaída da bateria de teoteo` (11px), o masthead lê `guoworld.oite` (11px), o rodapé lê `ao tarjao oão dele`. Evidência: `z_chamada.png`, `z_kicker.png`, `z_cab_desk.png`, `z_ed_mob.png`.

**(c) `v` minúsculo → `u`, a ≤11,5px (e já marginal a 15px).** Nas linhas de teste a 390px: `uez`, `aluo`, `inuálido`. Evidência: `z_transc_mob.png`, `z_v_desk.png`, `z_ucmp.png` (comparação lado a lado do `u` de "sujeira" com o `v` de "alvo").

**(d) `N` maiúsculo → `H`, a 14px** — o defeito já conhecido — dispara no `.ctx h1` do próprio mock: lê **`DETOHADO DA SIMULAÇÃO · O DOCUMEHTO DESCLASSIFICADO`** (`z_ctx.png`). O `.ctx` é a tarja explicativa do mock, fora da revista e `display:none` na impressão, então isto **não sai publicado** — registro porque a varredura pediu, e porque mostra que a regra do piso de 15px não está aplicada à moldura do mock.

---

# COSMÉTICO

## C-1 · A moldura do carimbo é a peça menos "carimbo" do conjunto
A palavra `CENSURADO!!!` **tem** falha de tinta (manchas claras dentro dos traços do C, E, S, U, R — visíveis em `z_cens_macro.png`), e isso vende bem o gesto. As quatro linhas da moldura, em contraste, são retas e de espessura perfeitamente uniforme ao longo do traço; a máscara de desgaste só as interrompe em pouquíssimos pontos (um deles na quina inferior direita, `z_quina_macro.png`). Num carimbo de borracha de verdade a moldura é a parte que borra primeiro. Não é defeito — é o único lugar onde ainda se lê "borda CSS" em vez de "borracha".

## C-2 · A tarja mais curta (4ch) pode sugerir uma palavra curta que não existe
As três barras medem 30px / 53px / 83px a 15px de fonte — exatamente 4ch / 7ch / 11ch, coerente com o ciclo posicional. A de 4ch, na primeira linha, é curta o bastante para um leitor **inferir** "palavra de 4 letras". Como a largura é sorteada pela posição e não pelo conteúdo, essa inferência é **falsa** — o que, para o embargo, é melhor que verdadeiro. Registro como observação, não como risco.

## C-3 · Contraste do `--voz-root` medido é 6,71:1, não os 7,03 do comentário
Medi a cor renderizada do `root@glyfesse:~/detonado$` (`#9a1815` exato, 114 pixels, x 17–203 / y 2523–2533 em `m390full.png`) contra o papel **como sai na tela**, já com a fibra multiplicada por cima: `#ecE6d8` → **6,71:1**. O comentário do CSS declara 7,03 nesta folha. A diferença é a fibra do papel, que o cálculo teórico não inclui. **Passa AA (4,5) com folga**; não alcança AAA (7,0), que o comentário sugeria por um triz. O ciano do `gus` mede 6,00:1 no mesmo papel. Ambos legíveis, e visualmente inconfundíveis um do outro (`z_vozes.png`).

---

# Tabela do checklist

| # | Item | Veredicto | Observação |
|---|---|---|---|
| **1** | Nenhuma palavra por baixo/ao lado de tarja | ✅ | Zero em **16 larguras** + impressão. Confirmado também na fonte: a `<b class="tarja">` é elemento **vazio**, `aria-label="trecho censurado"` e nada mais. Não há o que vazar. |
| **2** | Larguras diferentes, sem acompanhar texto | ✅ | **3 larguras distintas** vistas (o CSS declara 4; só 3 linhas caem em posição com tarja). Medidas: 30/53/83 px a 15px = 4ch/7ch/11ch; a 11,5px = 23/40/63 px — mesma razão, confirmando que a largura vem da **posição**, não do conteúdo. Nenhuma parece proporcional a um termo. |
| **3** | Tarja sólida e opaca | ✅ | Amostragem pixel a pixel da caixa inteira das 3 barras, em 4 renders (1200, 390, 430, impressão): **uma única cor, `(0,0,0)` puro**. Zero variação = zero transparência. |
| **4** | Diagonal, cantos arredondados, borda vermelha, `CENSURADO!!!` caixa alta/vermelho/negrito | ✅ | Tudo presente e correto em todas as larguras. |
| **5** | Torto e descuidado, não geométrico | ✅ | Impressão honesta: **convence**. O ângulo é levemente "errado" (não os 15° óbvios), a palavra está girada em relação à moldura e deslocada do centro, os quatro raios de canto são diferentes, e a palavra tem falha de tinta real. Ressalva em C-1: as linhas da moldura são retas demais. |
| **6** | `sterling corp.` legível no canto inferior direito | ✅ (legibilidade) / ⚠️ (vizinhança) | **Legível em todas as larguras testadas**, incl. 390 e impressão. A declaração do construtor sobre colisão no mobile **procede, mas subestima**: ver **I-1** — em 430px apaga a palavra `se`, em 680px apaga a palavra `eu`. Em 390px apaga só a vírgula depois de "olhando". |
| **7** | Carimbo não impede a leitura | ✅ | O `mix-blend-mode:multiply` faz o que promete: o texto preto atravessa o vermelho intacto em 1200 e em 390 (`z_cens_desk.png`, `z_cens_mob.png`). Todas as palavras sob o `CENSURADO!!!` são legíveis. A única perda de leitura vem do halo do rótulo miúdo (I-1), não do carimbo. |
| **8** | Rolagem horizontal a 390px | ✅ | **MEDIDO**, não estimado: `innerW=390 · docScrollW=390 · bodyScrollW=390 · clientW=390 · maxRight=390` (elemento mais à direita = `<HTML>`). **Overflow horizontal = zero.** As linhas `white-space:nowrap` da transcrição cabem sem estourar; os pontinhos encolhem e o `ok` alinha. |
| **9** | `2632/2632` legível — `2` vira `Z`? | ✅ | **Lê `2632/2632`**, não `Z63Z`. Verificado em macro de 700% a 390px (`z_total_mob.png`) e 500% a 1200px (`z_total_desk.png`). O piso de 15px na `.total` resolveu — o defeito relatado **não reaparece**. |
| **10** | Outros glifos deformados (enumerar, não buscar) | ⚠️ | Enumerei todos os pontos em fonte pixel: **4 degradações**, sendo **1 nova** (`S`→`5` a ≤12px, no wordmark do rodapé), mais `s`→`o/e`, `v`→`u`, e o `N`→`H` conhecido disparando a 14px no `.ctx`. Detalhe em **I-2**. O `3` de "em 3 lados", o `1` e o `3` do masthead saem corretos. |
| **11** | Corpo confortável nos dois tamanhos | ✅ | Vollkorn 17px, coluna ≤62ch no largo e ~45 caracteres a 390px, entrelinha folgada. Confortável nos dois. Sem viúva, sem quebra feia, sem palavra cortada. |
| **12** | Parece da mesma revista que os mocks 14 e 15 | ✅ | Comparei **olhando** (`ref-14-apartes-gus.png`, `ref-15-gus-no-bus.png`): mesmo masthead com aberração cromática, mesma tarja preta de chamada, mesmo kicker ciano, mesmo papel com fibra, mesma família tipográfica, mesmo rodapé. Encaixa sem emenda. Diferença **correta e esperada**: o 17 usa `gus@glyfesse:~/detonado$` (formato da #3 em diante) enquanto 14 e 15 usam o `gus@glyfesse>` antigo. |
| **13** | `root` em vermelho, distinto do `gus`, legível | ✅ | `#9a1815` exato no render. Inconfundível ao lado do ciano do `gus`. Contraste **medido** contra o papel real: **6,71:1** (AA com folga; ver C-3). |
| **14** | `@media print` mantém as tarjas pretas | ✅ | Renderizei a cópia com as regras de impressão forçadas: as 3 tarjas saem **`(0,0,0)` puro** (medido pixel a pixel), o `print-color-adjust:exact` cumpre o papel. Bônus verificado: o `.ctx` some, a folha perde sombra e ocupa a página, o `sterling corp.` cai em papel limpo, e o carimbo continua legível por cima do texto. |

---

## PNGs olhados (todos em `/var/tmp/builds/claude-1000/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/e2aeaac7-ceaf-4215-8e54-df1cacee060d/scratchpad/qa17/`)

**Renders base:** `d1200.png` (1200×1600) · `d1200full.png` (1200×3200) · `m390.png` (390×1400) · `m390full.png` (390×3600) · `print1200.png` (impressão forçada) · `med390.png` `med1200.png` (sondas de medida)
**Varredura de largura:** `sw360 sw430 sw500 sw560 sw620 sw680 sw720 sw900 sw1024 sw1440.png` · `w430 w759 w760.png`
**Macros e recortes:** `z_transcricao_desk.png` `z_total_desk.png` `z_total_mob.png` `z_transc_mob.png` `z_corp_desk.png` `z_corp_mob.png` `z_corp_759.png` `z_corp_760.png` `z_ela_mob.png` `z_econf_mob.png` `z_cens_desk.png` `z_cens_mob.png` `z_cens_macro.png` `z_quina_macro.png` `z_chamada.png` `z_kicker.png` `z_cab_desk.png` `z_ed_mob.png` `z_rod_mob.png` `z_rod_desk.png` `z_simulacao.png` `z_ctx.png` `z_v_desk.png` `z_ucmp.png` `z_vozes.png` `z_print_tarjas.png` `z_med390b.png` `z360 z430 z500 z560 z620 z680 z720.png` `z_sweep_corp.png`
**Referência de sistema:** `ref-14-apartes-gus.png` · `ref-15-gus-no-bus.png` · `ref14full.png` · `z_rod14.png`
