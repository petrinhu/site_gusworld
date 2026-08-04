# QA — degradação da fonte pixel no site PUBLICADO (gusworld.site)

**Data da apuração:** 04/08/2026, 09:48–11:0x (BRT)
**Ambiente:** Firefox 153.0 (Gecko), headless, software rendering (`MOZ_ACCELERATED=0`), perfil descartável
**Alvo:** páginas em produção, buscadas por HTTPS (nenhuma cópia local usada como prova)
**Método:** enumeração exaustiva por WebDriver BiDi na página viva + espécime do arquivo de fonte publicado + recortes de elemento ampliados em nearest-neighbor
**Escopo:** somente leitura. Nenhum formulário enviado, nenhum estado alterado, nenhum arquivo do projeto tocado.

---

## VEREDICTO

**A suspeita se confirma em parte, e a parte mais grave dela — o `GLYFE55E` no wordmark — NÃO existe no site publicado.**

Confirmado: a fonte pixel degrada no ar, e 3 trocas de glifo são visíveis a olho nu no render de produção — **`N`→`H`**, **`S`→`5`** e **`2`→`Z`** —, atingindo **as 6 páginas publicadas**, em **pt-BR e EN**, em **desktop e mobile**. São **64 ocorrências** por largura (48 delas dentro de palavras).

Refutado: **o wordmark `GLYFESSE` está correto em todas as suas aparições no ar.** Ele só existe em 46 px (logo) e 15 px (marca dos cards da banca) — ambos acima do limiar, ambos verificados no render. Não há wordmark em ≤12 px em página publicada. O `GLYFE55E` é defeito dos **mockups locais**, não do site.

Também refutado (o modelo previa, o render desmentiu): `G`→`6`, `B`→`D`, `8`→`O`, `9`→`g`, `6`→`G` a 13 px; e a numeração de página 03–19 a 11 px, que **lê certo**.

---

## LIMIAR MEDIDO NO PRÓPRIO ARQUIVO PUBLICADO

Baixei `PixelOperatorMono.woff2` de `gusworld.site` (md5 `a48328dae1724b4cfcae79c59951beaf`) e o Bold, rasterizei os 133 glifos usados no site em 20 tamanhos no mesmo Gecko, e comparei **todos os pares** de glifos (não busquei pares suspeitos — enumerei o espaço inteiro). Filtrei semelhança intrínseca da monoespaçada (`I`/`l`, `D`/`O` são parecidos em qualquer tamanho) exigindo que o par se separe quando há folga (≥26 px).

| Glifo | Vira | Tamanhos em que degrada | Mecanismo |
|---|---|---|---|
| `N` maiúsculo | `H` | **regular ≤ 14 px**; **bold ≤ 11 px** (12–13 bold: limítrofe) | a diagonal cai para 1–2 pixels claros na mesma linha da barra do `H` |
| `S` maiúsculo | `5` | **10 – 12 px** (regular e bold) | some a curva do meio; sobra a barra reta do `5` |
| `2` | `Z` | **≤ 12 px** | some a curva de cima; sobra o traço diagonal do `Z` |
| `s` minúsculo | bolha entre `o` e `e` | **≤ 12 px** | some o miolo em S |
| `v` / `u` | um ao outro | **≤ 9,5 px** | some a ponta do `v` |

Correções à hipótese de partida, **medidas**:
- `N` degrada até **14 px**, não "abaixo de 15" só — a fronteira exata é 15 px (a 15 a diagonal reaparece em 3 linhas). O `15px` da hipótese está certo como piso seguro.
- `S`→`5` **não** ocorre a 9 e 9,5 px (ali os dois já viraram outra coisa); a banda de troca é **10–12**.
- `2`→`Z` acontece **até 12 px**, não só a 9.
- `v`→`u` só até **9,5 px**, não 11,5.

---

## ENUMERAÇÃO COMPLETA — todo texto em fonte pixel nas páginas publicadas

Enumerei o DOM vivo das 6 páginas, nos dois viewports, e peguei `getComputedStyle` de cada nó (inclusive `::before`/`::after` com `content` textual). **2 296 nós** em `PixelOperatorMono`, dos quais **2 004 visíveis** (1 002 por largura). Agrupados por classe × tamanho × peso dão **71 grupos** — a tabela abaixo é a enumeração inteira, com os corretos declarados também.

Coluna "ocorr." = ocorrências na largura 1200; "pág." = em quantas das 6 páginas aparece.

**Como ler o veredicto:** todo **DEGRADADO** foi olhado no render publicado, ampliado, antes de ser escrito (lista dos recortes na seção "Detalhe por ocorrência"). Os **OK** dividem-se em dois: os listados na seção "O que foi verificado e está certo" foram olhados um a um; os demais são OK **por medição** — o texto não contém nenhum caractere na faixa em que aquele tamanho/peso degrada, segundo a tabela de limiares acima. Marquei essa distinção de propósito para não vender inspeção que não fiz.

| Classe | px | peso | ocorr. | pág. | Veredicto |
|---|---:|---:|---:|---:|---|
| `.grupo` | 9 | 400 | 66 | 4 | degradação de forma (`s` minúsculo, 40×) |
| `.poster-mat::before` | 9,5 | 400 | 2 | 2 | **DEGRADADO `N→H`** — `ENCARTE` (ver ressalva abaixo) |
| `.class-id` | 10 | 400 | 20 | 4 | **DEGRADADO `2→Z`** — `10.2` |
| `.cupom-recorte` | 10 | 400 | 6 | 6 | limítrofe (corpo ≤10 px) |
| `.lt-rot` | 10 | 400 | 2 | 2 | degradação de forma (`s`) |
| `.nova` | 10 | 700 | 2 | 2 | limítrofe (corpo ≤10 px) |
| *(kicker sem classe)* | 11 | 700 | 10 | 4 | **DEGRADADO `N→H` / `S→5`** — `COMPONENTE`, `CUSTO`, `OPTION`, `SPEC`, `GANHO NOS HOT PATHS` |
| `.build-tag` | 11 | 400 | 4 | 4 | **DEGRADADO `2→Z`** — `build 2026.05.15` |
| `.class-contato` | 11 | 400 | 12 | 4 | **DEGRADADO `2→Z` + `S→5`** — `Subject`, `227de71d` |
| `.cmd` | 11 | 400 | 6 | 6 | OK |
| `.conta` | 11 | 400 | 14 | 6 | **DEGRADADO `2→Z`** — `2 edições publicadas` |
| `.cupom-dica` | 11 | 400 | 6 | 6 | degradação de forma (`s`) |
| `.cupom-espera` | 11 | 400 | 6 | 6 | degradação de forma (`s`) |
| `.cupom-rasgar` | 11 | 400 | 6 | 6 | degradação de forma (`s`) |
| `.glyfa-lbl` | 11 | 400 | 4 | 2 | degradação de forma (`s`) |
| `.hq-n` | 11 | 400 | 12 | 4 | **DEGRADADO `2→Z`** — número de quadro `2` |
| `.indice-nota` | 11 | 400 | 4 | 4 | degradação de forma (`s`) |
| `.l1` | 11 | 400 | 6 | 6 | OK |
| `.meta` | 11 | 400 | 4 | 4 | **DEGRADADO `2→Z`** — masthead: `…de 2026` |
| `.n` | 11 | 700 | 66 | 4 | `2→Z` no glifo; **lê certo** em contexto numérico (`12`) |
| `.pg` | 11 | 400 | 70 | 4 | `2→Z` no glifo; **lê certo** em contexto numérico (03–19 conferidos) |
| `.poster-sub` | 11 | 400 | 6 | 4 | degradação de forma (`s`) |
| `.ref` | 11 | 400 | 4 | 2 | **DEGRADADO `2→Z`** — `nº 2 · 4 de junho de 2026` |
| `.seta` | 11 | 400 | 4 | 4 | OK |
| `.som-btn` | 11 | 400 | 12 | 6 | degradação de forma (`s`) |
| `.sr` | 11 | 400 | 6 | 6 | degradação de forma (`s`) |
| `.up` | 11 | 400 | 70 | 4 | degradação de forma (`s`, 35×) |
| `.volta-banca` | 11 | 400 | 4 | 4 | degradação de forma (`s`) |
| `.zoom-badge` (+`::before`) | 11 | 400 | 16 | 4 | OK |
| *(legenda sem classe)* | 11,5 | 400 | 4 | 2 | **DEGRADADO `S→5`** — `BUS` → `BU5` |
| *(sem classe)* | 12 | 400 | 6 | 6 | degradação de forma (`s`) |
| `.colo-data` | 12 | 400 | 4 | 4 | **DEGRADADO `2→Z`** — lápide: `de 2026` |
| `.lt-vazio-pensa` | 12 | 400 | 2 | 2 | degradação de forma (`s`) |
| `.ps-insert` | 12 | 400 | 2 | 2 | **DEGRADADO `S→5` (+`N→H` no EN)** — `FICHAS`/`TOKENS` |
| *(specs/tabela sem classe)* | 13 | 400 | 52 | 4 | **DEGRADADO `N→H`** — `.NET`, `Native` |
| `.album-btn` | 13 | 400 | 2 | 2 | OK |
| `.brinde-dl` | 13 | 400 | 8 | 4 | OK |
| `.cupom-btn` | 13 | 400 | 6 | 6 | OK |
| `.glyfa-btn` | 13 | 400 | 2 | 2 | OK |
| `.hh` | 13 | 400 | 2 | 2 | OK — `gus@glyfesse>` confere |
| `.kbd` | 13 | 400 | 8 | 4 | OK |
| `.lm-nome` | 13 | 400 | 2 | 2 | OK no desktop (**11 px e degradado no mobile**) |
| `.lt-vazio-fala` | 13 | 400 | 2 | 2 | OK |
| `.pt` | 13 | 400 | 4 | 4 | OK |
| `.skip` | 13 | 400 | 6 | 6 | OK |
| `.todo` | 13 | 400 | 4 | 4 | OK — `TODO.md` confere |
| `.album-contador` | 14 | 400 | 2 | 2 | OK |
| `.glyfa-sig` | 15 | 400 | 2 | 2 | OK |
| `.marca` | 15 | 700 | 4 | 2 | **OK — `GLYFESSE` confere** |
| `.pensa` (+variantes/`::before`) | 15 | 400 | 140 | 4 | OK |
| `.prompt` | 15 | 400 | 8 | 4 | OK |
| `.secao-nome` | 15 | 700 | 84 | 6 | OK |
| *(kicker sem classe)* | 15 | 400/700 | 8 | 4 | OK |
| `.prompt` | 16 | 400 | 136 | 4 | OK |
| `.sp-mid` | 17 | 400 | 4 | 4 | OK |
| `.glyfa-op` | 18 | 400 | 2 | 2 | OK |
| `.meta-titulo` | 20 | 600 | 4 | 4 | OK |
| `.album-q` | 26 | 400 | 26 | 2 | OK |
| `.sp-big` | 26 | 400 | 4 | 4 | OK |
| `.ps-press` | 34 | 700 | 2 | 2 | OK |
| `.lapide-nome` | 40 | 400 | 2 | 2 | OK |
| `.logo` | 46 | 700 | 6 | 6 | **OK — `GLYFESSE` confere** |
| `.glyfa-nome` | 52 | 700 | 2 | 2 | OK |

---

## TAMANHO DO ESTRAGO (números)

**Ocorrências com troca de caractere confirmada:** **64** na largura 1200 e **65** em 390.
Por tipo (largura 1200): `2→Z` **46**, `S→5` **16**, `N→H` **11**. Dentro de texto com letras (onde muda a palavra): **48**.

**Strings distintas afetadas:** **44**.

**Páginas:** **as 6 publicadas**
`https://gusworld.site/pt/` · `/en/` · `/pt/edicao-1` · `/pt/edicao-2` · `/en/edition-1` · `/en/edition-2`

| Página | ocorr. @1200 | ocorr. @390 |
|---|---:|---:|
| pt-home | 4 | 3 |
| en-home | 4 | 4 |
| pt-edicao-1 | 13 | 13 |
| pt-edicao-2 | 14 | 15 |
| en-edition-1 | 13 | 13 |
| en-edition-2 | 16 | 17 |

### O que o leitor de fato vê

**Alta exposição — aparece em toda edição, sem precisar procurar:**
1. `.meta` — a linha do masthead, logo abaixo do logo: `…15 de maio de 2026` lê **`Z0Z6`**. 4 páginas.
2. `.build-tag` — o rodapé de toda edição: `build 2026.05.15` lê **`build Z0Z6.05.15`**. 4 páginas.
3. `.conta` / `.ref` — a home, kicker da banca: **`Z edições publicadas`**, `vol. 1 · nº 2 · 4 de junho de Z0Z6`. 2 páginas.
4. Kickers em 11 px bold das tabelas de comparação: **`COMPOHENTE`**, **`OPTIOH`**, **`CU5TO`**, **`5PEC`**, **`GAHHO HOS HOT PATH5`**. 4 páginas.

**Exposição média — dentro de seções específicas:**
5. `.colo-data` — data da lápide: `de Z0Z6`. 4 páginas.
6. Tabela de specs (13 px): **`C# .HET 8 AOT`**, **`Hative compilation`**. ed. 2.
7. `.class-contato` (classificados, 11 px): **`5ubject`**, **`ZZ7de71d`**. 4 páginas.
8. `.ps-insert` sobre o CRT do PRESS START: **`FICHA5`**, **`TOKEHS`**. 2 páginas (home).
9. Legenda 11,5 px da tela do bus: **`BU5 git`**. ed. 1.

**Baixa exposição:** `.class-id` (`10.2`), `.hq-n`, `.lm-nome` (só mobile), `.poster-mat::before`.

### pt-BR × EN
**Igual nas duas.** O EN tem 3 ocorrências a mais por página de edição, porque o vocabulário inglês traz mais palavras com `N`/`S` na faixa degradada (`Subject`, `COMPONENT`, `OPTION`, `Native`, `TOKENS`, `COST`, `SPEC`). Nenhum defeito é exclusivo do pt.

### desktop × mobile
**Praticamente igual** — as duas larguras compartilham 61 das 64 ocorrências. As 3 diferenças vêm de `clamp()`:

| Item | 1200 px | 390 px |
|---|---|---|
| `.lm-nome` `GDScript` (ed. 2) | 13 px, **OK** | 11 px, **`GD5cript`** — só no mobile |
| `.ps-insert` `TOKENS`/`FICHAS` (home) | 12 px, `TOKEHS`/`FICHA5` | 9 px — `TOKEHS`, e a linha inteira fica ilegível |

---

## DETALHE POR OCORRÊNCIA — com o zoom (nearest-neighbor)

Todos os recortes vêm de `browsingContext.captureScreenshot` com `clip` no elemento, na URL pública, ampliados **só** com `Image.NEAREST`.

### 1. `GANHO NOS HOT PATHS` — 11 px bold — pt/edicao-2
Deveria ler `GANHO NOS HOT PATHS`; lê **`GAHHO HOS HOT PATH5`**.
Os três `N` viram `H` e o `S` final vira `5`. É a evidência mais limpa: os dois defeitos na mesma linha.
`crops/GANHO11b-z.png`

### 2. `OPTION` — 11 px bold — en/edition-2
Deveria ler `OPTION`; lê **`OPTIOH`**. `crops/OPTION11b-b-z.png`

### 3. `COMPONENTE` — 11 px bold — pt/edicao-1
Deveria ler `COMPONENTE`; lê **`COMPOHENTE`**. `crops/BOLD11-espec-z.png`

### 4. `CUSTO` — 11 px bold — pt/edicao-2
Deveria ler `CUSTO`; lê **`CU5TO`**. `crops/BOLD11-custo-z.png`

### 5. `2 edições publicadas` — 11 px — home pt (e `2 published editions` na EN)
Deveria começar com `2`; lê **`Z edições publicadas`**. Está na home, logo abaixo de "A banca".
`crops/HOME-conta11-z.png`

### 6. Masthead `.meta` — 11 px — toda edição
`vol. 1 · nº · rev. 3 · 15 de maio de 2026 / gusworld.site` lê **`…de Z0Z6`**; e `gusworld.site` sai com os `s` virando bolha. `crops/META11-z.png`

### 7. Rodapé `.build-tag` — 11 px — toda edição
`glyfe 1.1.3 · build 2026.05.15` lê **`build Z0Z6.05.15`**. `crops/BUILDTAG11-z.png`

### 8. Classificados `.class-contato` — 11 px — 4 páginas
EN: `Subject: ad ID 227de71d` lê **`5ubject: ad ID ZZ7de71d`**.
PT: `anúncio ID 227de71d` lê **`anúncio ID ZZ7de71d`**; e `Interessados`/`Assunto`/`repassa` saem com os `s` como bolhas (`Intereooadoo`, `Aoounto`, `repaooa`).
`crops/ZOOM-SUBJECT11.png`, `crops/CLASSCONTATO-pt11-z.png`

### 9. `C# .NET 8 AOT` — 13 px — edicao-2 (pt e en)
Deveria ler `.NET`; lê **`.HET`**. O `8` e o `A` estão corretos — só o `N` cai. `crops/CSHARP13-z.png`

### 10. `Native compilation; iteration via dotnet build in ~5-15s` — 13 px — en/edition-2
Lê **`Hative compilation…`**. `crops/NATIVE13-en-z.png`

### 11. PRESS START, sobre o CRT — 12 px — home
PT: `CREDITO 1 · FICHAS 0` lê **`CREDITO 1 · FICHA5 0`** (`crops/ZOOM-FICHAS12.png`)
EN: `CREDIT 1 · TOKENS 0` lê **`CREDIT 1 · TOKEHS 0`** (`crops/TOKENS12-z.png`)
Agravante: as scanlines do CRT escondem exatamente a linha de antialiasing que ainda diferenciava `S` de `5`.

### 12. Lápide `.colo-data` — 12 px — edicao-1/2
`15 de maio de 2026` lê **`15 de maio de Z0Z6`**. `crops/ZOOM-COLODATA12.png`

### 13. Legenda da tela do bus — 11,5 px — edicao-1
`A tela do BUS git: …` lê **`A tela do BU5 git: …`**; e no corpo da mesma legenda `caixas`, `site`, `passando` saem com `s` de bolha. `crops/BUS11_5-z.png`

### 14. `GDScript` — 11 px **só no mobile** — edicao-2
No desktop sai a 13 px e confere. Em 390 px cai a 11 px e lê **`GD5cript`**. `crops/LMNOME11-390-z.png`

### 15. `.grupo` a 9 px — 66 ocorrências por edição
`abertura`, `standing`, `closing`… A palavra ainda se reconhece pela silhueta, mas cada glifo perdeu detalhe e o contraste é baixo. Não há troca 1:1 de letra — é perda de legibilidade.
`crops/GRUPO9-abert-z.png`, `crops/GRUPO9-stand-z.png`

---

## O QUE FOI VERIFICADO E ESTÁ CERTO (resultado negativo)

- **`GLYFESSE` a 46 px (logo, todas as páginas)** — correto. `crops/A-logo46-z.png`
- **`GLYFESSE` a 15 px (`.marca`, cards da banca na home)** — correto, os dois `S` são `S`. `crops/MARCA15-z.png`
- **Numeração de página do índice, 03 a 19, 11 px** — todas leem certo. `crops/STRIP-pg-a.png`, `crops/STRIP-pg-b.png`
- **`→ o TODO.md vivo do jogo` (13 px)** — correto; o `O`/`D`/`8` não trocam. `crops/TODO13-z.png`
- **`→ o código do jogo (repo GusWorld)` / `(repo GlintFX)` (13 px)** — correto; o `G` não vira `6`. `crops/GUSWORLD13-z.png`
- **`i5-12500H (16 threads)` (13 px)** — correto, inclusive o `H` e o `6`. `crops/SPECS13-H-z.png`
- **`gus@glyfesse>` (13 px e 16 px)** — correto. `crops/HH13-z.png`, `crops/PROMPT16-z.png`
- **`Índice` e demais `.secao-nome` (15 px)** — corretos. `crops/SECAONOME15b-z.png`
- Tudo em **≥15 px** (que é 55 % das ocorrências visíveis) está correto.

---

## RESSALVAS DE MÉTODO (o que não pude provar)

1. **`ENCARTE` a 9,5 px (`.poster-mat::before`, edição 2):** o modelo prevê `N→H`, mas **não consegui ler o `N` no render** — o emblema `clique para ampliar` fica por cima do rótulo exatamente nessa faixa. Fica **não verificado**. De quebra, essa sobreposição é em si uma observação: o rótulo `ENCARTE` está parcialmente coberto na página publicada (`crops/ENCARTE-wide-z.png`).
2. **`N` bold a 12–13 px é limítrofe.** A 11 px bold a barra do `N` é idêntica à do `H` (confirmado no render). A 12–13 px bold sobra um resto de diagonal; não classifiquei como troca.
3. **`2→Z` em contexto puramente numérico** (`.pg`, `.n`, `12`) — o glifo *está* degradado, mas o leitor recompõe pelo contexto e lê `12`. Contei essas ocorrências à parte e não as somei como "muda a palavra".
4. **A métrica automática errou nos dois sentidos** e só o render decidiu: previu 24 trocas que não existem (`G→6`, `B→D`, `8→O`, `9→g` a 13 px; page numbers) e **deixou passar** o `N→H` em bold a 11 px, que o olho pegou no `OPTIOH`. Todo item marcado DEGRADADO nesta tabela tem recorte de render por trás; nenhum é só cálculo.
5. Não testei com `prefers-color-scheme: dark` nem `prefers-reduced-motion`. O tema escuro tem contraste diferente e pode agravar (não medi).
6. Larguras testadas: 1200 e 390. Não testei larguras intermediárias, onde `clamp()` pode pousar em tamanhos que não apareceram aqui (ex.: `.lm-nome` entre 11 e 13 px).

---

## ARTEFATOS

⚠️ Os arquivos citados como `crops/*.png` eram **temporários** e foram apagados ao fim da apuração, conforme instruído. Os nomes ficam registrados como rastro de qual recorte sustenta cada afirmação; **cada item marcado DEGRADADO foi olhado no render antes de ser escrito aqui**.

Para regerar qualquer prova, o caminho é: subir `firefox --headless --new-instance --profile <dir novo> --remote-debugging-port 9333`, falar WebDriver BiDi no websocket `ws://127.0.0.1:9333/session`, `browsingContext.navigate` para a URL pública, `script.evaluate` com um walker de `getComputedStyle` filtrando `PixelOperatorMono`, e `browsingContext.captureScreenshot` com `clip` do tipo `box` na caixa do elemento — ampliando só com `Image.NEAREST`.

Dado de calibração para reprodução: `PixelOperatorMono.woff2` publicado tem md5 `a48328dae1724b4cfcae79c59951beaf` (4 556 bytes); o Bold tem 4 580 bytes. As páginas foram lidas com `edicao.css?v=1784976391` e `tokens.css?v=1784334102`.
