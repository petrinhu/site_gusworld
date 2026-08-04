# AUD-LICENCA — auditoria de licenciamento do site

> **Data:** 2026-08-04 · **Escopo canônico:** `AUDITORIAS.md` §`AUD-LICENCA`
> **Objeto:** todo asset servido a partir de `public_html/`, as declarações de licença no conteúdo servido, e a licença do site em si
> **Fonte de proveniência:** `Projects/gusworld/docs/tech/ai-assets-provenance.md`, `ASSETS-LICENSE.md`, `assets/AUDIO_KIT_PROVISORIO.md` — **lidos em modo leitura; nada foi escrito no repo do jogo.**
> **Método:** inventário exaustivo dos arquivos sob `public_html/assets/`, cruzado com a referência de cada um no conteúdo servido e com a proveniência documentada. **Read-only: nada foi corrigido.**
>
> ⚠️ **Orientação técnico-regulatória, não aconselhamento jurídico vinculante.** Três achados abaixo são de risco jurídico real e estão marcados **→ advogado**.

---

## Sumário executivo

| # | Achado | Severidade |
|---|---|---|
| LIC-01 | **Duas declarações de licença contraditórias na mesma página renderizada** | **CRÍTICO** |
| LIC-02 | **O site não tem licença própria** (`LICENSE` ausente) — item 3 do mandato | **CRÍTICO** |
| LIC-03 | **2 arquivos de áudio servidos com proveniência explicitamente NÃO confirmada** | **CRÍTICO** |
| LIC-04 | Fontes **OFL 1.1** servidas sem o arquivo de licença junto e sem atribuição | **IMPORTANTE** |
| LIC-05 | `crt-bezel.png`: frame de **vídeo gerado por IA**, sem proveniência registrada, servido | **IMPORTANTE** |
| LIC-06 | Pôster 3D: asset **fora da Zona 1** e fora da tabela de proveniência — e há **adaptação** dele | **IMPORTANTE** |
| LIC-07 | O **regime do jogo mudou em 2026-07-31** (ADR-021) e nem o `AUDITORIAS.md` nem o site refletem | **IMPORTANTE** |
| LIC-08 | A §17 da #1 **publica** que 306 obras protegidas foram fragmentadas e indexadas | **IMPORTANTE → advogado** |
| LIC-09 | Assets órfãos ainda publicamente servidos (inclui screenshot de terceiro) | **COSMÉTICO** |
| LIC-10 | **Nenhuma atribuição visível ao leitor** em lugar nenhum do site — item 4 do mandato | **COSMÉTICO** |
| LIC-11 | O brinde (wallpaper) é oferecido para download **sem licença declarada** | **COSMÉTICO** |

---

## Item 1 do mandato — inventário de assets servidos: procedência e compatibilidade

**Inventário completo** de `public_html/assets/`, cruzado com as referências reais no conteúdo servido:

### A. Referenciados pelas páginas atuais

| Asset servido | Procedência apurada | Regime | Compatível? |
|---|---|---|---|
| `fonts/archivo-narrow-latin-700-normal.woff2` | Omnibus-Type, Archivo Narrow | **SIL OFL 1.1** | ⚠️ **LIC-04** |
| `fonts/vollkorn-latin-{400-normal,600-normal,400-italic}.woff2` | Friedrich Althausen, Vollkorn | **SIL OFL 1.1** | ⚠️ **LIC-04** |
| `fonts/PixelOperatorMono{,-Bold}.woff2` | PixelOperator | **CC0 1.0** (texto em `assets/PixelOperator-LICENSE-CC0.txt`) | ✅ |
| `sprites/gus-{north,south,east,west}.png` | **PixelLab**, PRO Tier 1 confirmado (`ai-assets-provenance.md:15`) | Zona 1 CC-BY-SA / titularidade via ToS pago | ✅ uso íntegro |
| `frames/edicao-3.png` | foto da tela do líder, prototipo do quadrado azul (`data/edicoes.php:130`) | obra própria | ✅ **e limpo** (inspecionado: só a tela, sem aba/terminal/quarto) |
| `og-launch.jpg`, `og-edicao-{2,3}.jpg`, `og-edicao-{1,2,3}-en.jpg` | gerados no próprio site (`docs/design/og-card-*.html`) | obra própria | ✅ (ver LIC-06 sobre a #2) |
| `favicon.png` | obra própria (wordmark) | obra própria | ✅ |
| `edicao-1/tui_claude{,2}.png` | captura da TUI do Claude Code (software de terceiro) | uso editorial/citação | ✅ baixo risco (LIC-11); ⚠️ vaza custo em R$ — ver `AUD-IA` §IA-11 |
| `edicao-1/inbox_git.png` | captura da UI do GitHub, **redigida** | uso editorial/citação | ✅ |
| `edicao-2/gus-3d-poster{,-full}.png` | arte AI-assistida do líder, pipeline Tripo3D | **indefinido** | ⚠️ **LIC-06** |
| `audio/cidade-tema.mp3` | "Pondering the Cosmos", Ruskerdax / OpenGameArt (`AUDIO_KIT_PROVISORIO.md:42-51`) | **CC0** | ✅ (re-encode 320→128 kbps é permitido) |
| `audio/menu-click.wav` | **não documentada** | **desconhecido** | ⛔ **LIC-03** |
| `audio/menu-hover.wav` | **não documentada** | **desconhecido** | ⛔ **LIC-03** |

### B. Servidos mas órfãos (nenhuma página atual os referencia) — **LIC-09**

| Asset | Procedência | Observação |
|---|---|---|
| `crt-bezel.png` | frame de **vídeo gerado por IA** | **LIC-05** — sem proveniência registrada |
| `placeholder-hostinger.png` | captura da página padrão da **Hostinger** (terceiro) | trade dress de terceiro, sem uso atual |
| `gus-front.png` | sprite pixel (presumido PixelLab; **não confirmado por documento**) | presunção, não fato |
| `og-cover.jpg` | card social legado do pré-lançamento | obra própria |
| `PixelOperatorMono{,-Bold}.woff2` na raiz de `assets/` | duplicata das que vivem em `assets/fonts/` | duplicata |

---

### LIC-03 · **CRÍTICO** — dois áudios servidos com proveniência que o próprio projeto declara não confirmada

`public_html/assets/js/som.js:45,47` carrega `/assets/audio/menu-click.wav` e `/assets/audio/menu-hover.wav`. São os SFX reais do jogo (`menu_click_provisorio.wav`, `menu_hover_provisorio.wav`).

O documento de proveniência do jogo diz, textualmente (`ai-assets-provenance.md:37`):

> *"Há ainda 3 arquivos SFX versionados **sem entrada de proveniência em nenhum doc** (`menu_hover_provisorio.wav`, `menu_click_provisorio.wav`, `menu_blocked_provisorio.wav`...). Presumem-se do mesmo lote CC0 curado (mesmo padrão de nome `_provisorio`), mas **isso não está confirmado por escrito** em nenhum documento existente."*

E o `AUDIO_KIT_PROVISORIO.md` — que documenta faixa a faixa os outros quatro áudios do kit — **não os lista**. A presunção é razoável (o padrão de nome bate com o lote Kenney CC0) mas **presunção não é procedência**, e o site publica os arquivos, não a presunção.

**Isto é a falha direta do item 1 do mandato:** dois dos treze assets servidos não têm procedência conhecida. É também o achado mais barato de fechar: o líder confirma a origem (provavelmente Kenney "Interface Sounds", mesmo pack do `ui_confirm_provisorio.wav`) e o `AUDIO_KIT_PROVISORIO.md` ganha duas entradas.

**Enquanto não fechar:** não é possível afirmar que o site tem direito de distribuir esses dois arquivos.

### LIC-04 · **IMPORTANTE** — fontes OFL servidas sem a licença junto

`public_html/assets/css/tokens.css:53-79` declara `@font-face` para **Archivo Narrow** e **Vollkorn**, servidas de `public_html/assets/fonts/`. Ambas são **SIL Open Font License 1.1** (confirmado nos cabeçalhos: `docs/design/mockups/fonts/LICENSE-archivo-narrow.txt:1-5` e `LICENSE-vollkorn.txt:1-5`).

A OFL 1.1 condiciona a redistribuição a que **cada cópia do Font Software carregue o aviso de copyright e o texto da licença**. Servir um `.woff2` por HTTP é redistribuição.

**Estado medido:** `public_html/assets/fonts/` contém **6 arquivos `.woff2` e nenhum arquivo de licença**. Os dois `LICENSE-*.txt` corretos **existem no repositório**, em `docs/design/mockups/fonts/` — foram deixados para trás quando as fontes foram copiadas para a pasta servida. O da PixelOperator (CC0, que nem exigiria) foi copiado; os dois que **exigem**, não.

**Conserto:** copiar os dois `.txt` para `public_html/assets/fonts/`. É um `cp`.

*(Nota técnica: renderizar as fontes dentro de uma imagem — como nos cards `og-*.jpg` — **não** é redistribuição do Font Software e não gera obrigação. A obrigação nasce só de servir o arquivo de fonte.)*

### LIC-05 · **IMPORTANTE** — `crt-bezel.png` é frame de vídeo gerado por IA, sem proveniência

`public_html/assets/crt-bezel.png` (inspecionado: fotorrealista, um monitor CRT bege com grade na tela). O comentário das páginas históricas que o usavam identifica a origem (`resources/historico_do_site/2026-07-21_pre-lancamento_placeholder.html:33`): *"Moldura: crt-bezel.png (**frame do video de boot** dos registros dele)"*. O vídeo de origem é `video_ia_generated_boot_trecho_usado_entrar_arena.mp4` — **vídeo gerado por IA** (`docs/design/conceito.md:271`).

**A tabela de proveniência não tem nenhuma entrada de vídeo.** Ferramenta desconhecida, tier desconhecido, ToS desconhecido → **não há base legal declarável de titularidade** sobre esse frame.

Hoje ele é órfão (nenhuma página atual o usa) mas **continua publicamente acessível** em `/assets/crt-bezel.png`. Se voltar a ser usado — e uma moldura de CRT é peça óbvia para reaproveitar — o problema vira de primeira linha.

### LIC-06 · **IMPORTANTE** — o pôster 3D está fora da Zona 1 e fora da tabela de proveniência

`src/content/edicao-2/pt/sec-13.php:6-8` documenta, em comentário: *"Asset copiado de `Projects/gusworld/resources/sprites/personagens_inspirados/gus/gus_diagonal.png` (proveniência: arte AI-assistida do líder, **NÃO tracked no git do jogo**)."*

Duas consequências:

1. **Fora da Zona 1.** O `ASSETS-LICENSE.md:43,56` define a Zona 1 como o que estava **"presente no repositório em 2026-07-31"**. Um arquivo que nunca foi versionado não está lá. Logo o pôster não é CC-BY-SA — o regime dele é **indefinido**, e por default do titular seria ARR.
2. **Fora da tabela de proveniência.** A linha de `resources/sprites/*.png` cobre "47 versionados no repo" (`ai-assets-provenance.md:15`); este não é versionado. A linha do Tripo3D cobre `resources/glb/*.glb`, não o PNG derivado. **Nenhuma entrada cobre este arquivo específico** — a rastreabilidade é inferida, não registrada.

---

## Item 2 do mandato — há adaptação de asset CC-BY-SA? O share-alike está cumprido?

**Sim, há adaptação — e não, o share-alike não morde. Aqui está o porquê, com o cuidado que o assunto exige.**

**A adaptação encontrada:** `public_html/assets/og-edicao-2.jpg` (inspecionado) é uma **composição derivada** do pôster 3D: a figura foi recortada do fundo original, colocada sobre gradiente novo, com grade em perspectiva, moldura e tipografia. É exatamente o caso que o `AUDITORIAS.md` antecipa — *"a key art de landing tende a ser exatamente isso"*. A previsão estava certa: a adaptação existe e é no card social.

**Por que o share-alike não é acionado, mesmo assim:**

- A CC-BY-SA obriga **licenciados**, não o **licenciante**. Quem detém o copyright de uma obra não fica vinculado à licença que ele mesmo concedeu a terceiros: pode usar, adaptar e relicenciar a própria obra livremente. Todos os assets adaptados aqui são do titular (petrinhu).
- E o asset-fonte deste caso específico **nem sequer está na Zona 1** (LIC-06), então não há CC-BY-SA concedida sobre ele para começar.

**O uso íntegro também está limpo:** os sprites `gus-*.png` são carregados sem modificação por `public_html/assets/js/quadradinho.js:25-28` e `edicao.css:763` — agregação, não adaptação. A premissa corrigida do `AUDITORIAS.md` ("CC-BY-SA morde adaptação, não agregação") se confirma na prática.

⚠️ **O risco real neste eixo não é o share-alike — é a cadeia de titularidade.** Um asset de IA só pode ser adaptado e licenciado pelo criador **se o ToS da ferramenta cedeu a titularidade**. O `ai-assets-provenance.md:43` é honesto sobre o piso dessa cadeia:

> *"A proveniência acima (ferramenta, tier, plano pago) foi **confirmada verbalmente pelo criador em 2026-07-12, não por documento de billing anexado**."*

Para os assets do site isso é aceitável como diligência interna. **→ advogado** se algum dia houver licenciamento a terceiro, venda, ou disputa: aí a confirmação verbal não basta e o histórico de cobrança da conta vira prova necessária.

---

## Item 3 do mandato — o site tem licença própria declarada?

### LIC-02 · **CRÍTICO** — não tem. E o achado é confirmado por busca exaustiva.

Busca por `LICENSE*`, `COPYING*`, `NOTICE*` na raiz do repositório do site: **0 resultados**. Os únicos arquivos de licença no repositório inteiro são os três de fonte, em `docs/design/mockups/fonts/`.

O board confirma: `LICENSE-README` está **⏳ Pendente** (`TODO.md:119`), e a decisão `D-LICENCA` (`TODO.md:102`) já havia fechado o regime: **ARR / todos os direitos reservados**, escolhido como piso seguro e 100% reversível para CC-BY-SA depois.

**Estado jurídico atual, então:** repositório público sem `LICENSE` = **todos os direitos reservados por default**. Isso é conservador e não impede publicar — mas produz três efeitos:

1. **O rodapé mente por omissão.** "Conteúdo sob licença livre" é falso sobre o site (ARR), sobre os livros (ARR) e sobre os assets do jogo pós-2026-08-01 (ARR). Ver LIC-01.
2. **O brinde não concede nada.** A §14 oferece o wallpaper para download sob o mote "a gente dá a ferramenta", mas sem licença o download não vem com direito de uso nenhum. Ver LIC-11.
3. **Bloqueia espelhar asset de terceiro** — exatamente o que o `AUDITORIAS.md:55` já registrava.

### Qual seria compatível com os três regimes — recomendação técnica

O pedido do mandato é dizer qual licença seria compatível. **Recomendação técnica; a escolha é do líder com `dr-advogado`/CLO:**

| Camada do site | Recomendação | Por quê |
|---|---|---|
| **Código do site** (PHP, JS, CSS) | **Apache-2.0** | Alinha com o regime novo do jogo (`ASSETS-LICENSE.md:13`), é permissiva, tem concessão de patente expressa e convive com tudo. Evita ter duas licenças de código diferentes na mesma constelação. |
| **Texto editorial da revista** (as ~19 seções, a voz do Gus) | **ARR, explicitamente declarado** | É a matéria-prima dos livros (Zona 3, ARR). Abrir o texto da revista sob CC criaria tensão com a obra literária, que foi justamente o motivo de `D-LICENCA` ter escolhido o piso conservador. |
| **Assets próprios do site** (cards OG, wallpaper do brinde, favicon) | **decisão caso a caso, mas o wallpaper precisa de licença explícita** | Um brinde sem licença não é brinde. CC-BY-SA 4.0 ou CC0 no wallpaper resolveria o LIC-11 e reforçaria a defesa por licença do `AUD-IA`. |
| **Assets herdados do jogo** (sprites, áudio) | **não relicenciar; declarar a origem** | Herdam o regime da Zona 1 do jogo. O site só precisa dizer de onde vêm. |

**Estrutura mínima sugerida:** um `LICENSE` na raiz + um `NOTICE`/`CREDITOS` de assets de terceiro (fontes OFL, áudio CC0) + a linha de rodapé reescrita para apontar para os dois. Isso fecha LIC-01, LIC-02, LIC-04, LIC-10 e LIC-11 de uma vez, e **destrava a defesa por licença do `AUD-IA`**, que hoje não tem no que se apoiar.

---

## Item 4 do mandato — as atribuições aparecem onde o leitor vê?

### LIC-10 · **COSMÉTICO** (mas é o item que sustenta os outros) — praticamente não aparecem

Varredura por menção de licença ou crédito no conteúdo **servido**:

| Atribuição | Aparece ao leitor? | Onde |
|---|---|---|
| PixelOperatorMono, CC0 | ✅ **sim** | §14 (Brinde), nas 3 edições, em pt e en |
| Archivo Narrow, OFL | ❌ **não** | — |
| Vollkorn, OFL | ❌ **não** | — |
| "Pondering the Cosmos" (Ruskerdax, OpenGameArt), CC0 | ❌ **não** | — *(CC0 não exige, mas é a única faixa musical do site)* |
| Kenney (SFX) | ❌ **não** | — *(CC0 não exige)* |
| Sprites PixelLab | ❌ **não** | — |
| Licença do site | ❌ **não existe** | — |
| Página/seção de créditos ou `NOTICE` | ❌ **não existe** | — |

Ou seja: **das obrigações que existem de fato, a única cumprida é a que não era obrigatória** (CC0 da fonte, creditada por cortesia), e as duas que **são** obrigatórias (OFL) não estão nem no arquivo servido nem na página.

A boa notícia é que a §14 (Brinde) já demonstra que o site sabe fazer isso com graça — o card da fonte CC0 é bem escrito e in-voice. O molde existe; falta aplicar aos outros.

---

## Item 5 do mandato — os PDFs élficos

### ✅ Respeitado: **não inflei a auditoria com eles.**

Verificado e declarado: os 71 PDFs de terceiros em `resources/livros/elvish/` do repo do jogo **não foram contados como superfície deste site**, não entram no inventário, não geram achado. São gitignored e nunca foram ao repositório público, exatamente como `AUDITORIAS.md:49` determina.

### LIC-08 · **IMPORTANTE → advogado** — mas há uma questão vizinha, e ela é do site

Isto **não é** o item dos PDFs élficos, e faço a distinção de propósito: não se trata de asset servido nem de arquivo versionado. Trata-se de uma **declaração publicada pelo próprio site**.

A §17 da #1 (`src/content/edicao-1/pt/sec-17.php:30,43,52,133-145`), em pt e en, publica:

- que o acervo tem **"306 obras catalogadas, quebradas em cerca de 163 mil trechos indexáveis"**;
- que um segundo índice, `rag_elvish`, guarda **1.989 trechos** de material filológico;
- e **a bibliografia nominal**: Tolkien (incluindo os 12 volumes de History of Middle-earth), Asimov, Herbert, Martin, Gibson, Stephenson, Philip K. Dick, Orwell, Umberto Eco, Dan Brown, Robert Greene — todos **obras protegidas por direito autoral vigente**.

**Por que é do site e não do jogo:** a informação em si é interna e legítima; **publicá-la em duas línguas, com número e bibliografia, é ato do site.** O texto é cuidadoso e faz o argumento certo — "recuperar não pode virar copiar", "o modelo não escreve a lore", "a lore nasceu original". Editorialmente é a melhor seção do site. Mas do ponto de vista de exposição:

- O Brasil **não tem fair use geral**. As limitações da LDA (Lei 9.610/98, art. 46) são taxativas, e a cópia privada do inciso II se limita a **"pequenos trechos"** para uso privado do copista. Fragmentar 306 obras inteiras em 163 mil trechos indexados não se encaixa confortavelmente ali.
- **Não emito juízo sobre licitude.** Existem argumentos relevantes do outro lado (uso privado, não distribuição, não substituição da obra, transformação em vetor). **Isto é matéria de advogado, não de auditoria técnica.**

**Encaminhamento concreto — três perguntas para o jurídico, não para mim:**
1. A declaração pública do tamanho e da composição do acervo aumenta materialmente a exposição, comparada a não declarar?
2. A bibliografia nominal precisa dos números (306 / 163 mil / 1.989), ou o texto funciona igual sem eles?
3. Há redação que preserve o valor editorial (que é alto) e reduza a exposição?

⚠️ **Recomendo explicitamente NÃO tratar isto como bloqueio de publicação por decisão de agente.** É uma decisão de risco que pertence ao líder assessorado por advogado.

---

## LIC-01 · **CRÍTICO** — duas declarações de licença contraditórias na mesma página

Este é o achado mais visível de todos, e está em **todas as páginas de edição**, nos dois idiomas, simultaneamente:

| Onde | O que diz |
|---|---|
| Rodapé (`src/includes/rodape.php:27` ← `src/i18n/pt.php:256`) | **"Conteúdo sob licença livre."** |
| Colofão, §19 (`src/content/edicao-{1,2,3}/pt/sec-19.php`) | **"Todos os direitos reservados."** |
| §17 da #1 (`sec-17.php:14`), voz do criador | **"tudo que é meu é open source"** |

As três frases são renderizadas na **mesma página**, a poucos milhares de pixels de distância. Duas se contradizem frontalmente; a terceira é hoje factualmente incorreta (o site é ARR, os livros são ARR, os assets pós-01/08 são ARR — ver `AUD-IA` §IA-07).

E **nenhuma das três nomeia uma licença**. "Licença livre" não é licença: não diz se é permissiva ou copyleft, se exige atribuição, se permite uso comercial. Para o leitor, para um jornalista e para um crítico, é ruído — e para o argumento anti-IA do `AUD-IA`, é ruído no ponto exato onde precisava haver fato verificável.

**A correção é uma decisão de redação (do líder + jurídico), mas a inconsistência é fato objetivo e precisa cair antes do ar.**

### LIC-07 · **IMPORTANTE** — o próprio escopo desta auditoria está desatualizado

Para registro, porque afeta trabalho futuro: a tabela de `AUDITORIAS.md:39-44` descreve o regime como *"Código do jogo: GPLv3 / Assets: CC-BY-SA 4.0 / Livros: ARR"*. Desde **2026-07-31 (ADR-021)** o regime é:

| Parte | Antes (no `AUDITORIAS.md`) | Vigente (`ASSETS-LICENSE.md`) |
|---|---|---|
| Código do jogo | GPLv3 | **Apache License 2.0** |
| Assets até 2026-07-31 | CC-BY-SA 4.0 | CC-BY-SA 4.0 (**irrevogável**, Zona 1) |
| Assets desde 2026-08-01 | *(não previsto)* | **Todos os direitos reservados** (Zona 2) |
| Livros | ARR | ARR (Zona 3, inalterado) |
| Marca | *(não previsto)* | **carve-out** fora de qualquer concessão |

**Nenhum desses fatos aparece no site.** E o `AUDITORIAS.md` deveria ser atualizado — quem auditar depois vai auditar contra um regime que não existe mais. *(Sinalizo; não edito: `AUDITORIAS.md` é manual do projeto e a atualização é decisão do líder.)*

### LIC-11 · **COSMÉTICO** — o brinde não concede nada

A §14 oferece dois downloads sob o mote *"a gente dá a ferramenta"*: a fonte CC0 (bem resolvida, licença nomeada, "sem precisar creditar ninguém") e um **papel de parede SVG** gerado inline (`sec-14.php:9-21`). O wallpaper sai com `download="gusworld-terminal.svg"` e **licença nenhuma** — sob o default ARR do site, quem baixa não recebe direito de usar.

É pequeno e é fácil: uma linha declarando CC0 ou CC-BY-SA no card do wallpaper resolve, e de quebra reforça a defesa por licença do `AUD-IA`.

---

## Tabela de varreduras (zeros declarados)

| Varredura | Superfície | Resultado |
|---|---|---|
| Arquivos servidos sob `public_html/assets/` | 13 referenciados + 6 órfãos = **19** | inventariados 19/19 |
| Assets **sem procedência conhecida** | 19 | **3** (`menu-click.wav`, `menu-hover.wav`, `crt-bezel.png`) |
| Assets com procedência **presumida e não confirmada** | 19 | **1** (`gus-front.png`, órfão) |
| Assets com procedência **documentada e compatível** | 19 | **15** |
| Adaptação de asset CC-BY-SA de **terceiro** | todos os assets | **0** — a única adaptação é de asset próprio (LIC-06) |
| Share-alike **não cumprido** | todas as adaptações | **0** — licenciante não se vincula à própria licença |
| Licença do **site** (`LICENSE`/`COPYING`/`NOTICE` na raiz) | repositório inteiro | **0 arquivos — não existe** |
| Arquivos de licença em `public_html/assets/fonts/` | 6 fontes servidas | **0 de 2 obrigatórios** (OFL) presentes |
| Atribuição **visível ao leitor** | conteúdo servido, 3 edições × 2 idiomas | **1 de 7** (só PixelOperatorMono CC0) |
| Página/seção de créditos ou `NOTICE` | site inteiro | **0 — não existe** |
| PDFs élficos contados como superfície deste site | — | **0 — escopo respeitado, não inflado** ✅ |
| Assets de terceiro **espelhados** sem licença (o que o ARR bloqueia) | 19 assets | **0** — nada de terceiro foi espelhado indevidamente ✅ |
| Escrita no repo do jogo (`Projects/gusworld/`, read-only) | 4 arquivos consultados | **0 escritas** ✅ |
| Erros internos da auditoria (arquivo ilegível, asset não inspecionado) | 19 assets + 6 docs de proveniência | **0 de 25** |

---

## O que está certo

1. **A proveniência de IA existe, é por lote, com ferramenta, data, tier e base legal nomeados** (`ai-assets-provenance.md`). Muita gente com equipe inteira não tem isso.
2. **A identificação da `catedral_mae.png` por C2PA** — descobrir a ferramenta pelo manifesto assinado do Google embutido no PNG, em vez de confiar no nome do arquivo de prompt, é apuração de primeira linha (`ai-assets-provenance.md:18`).
3. **A regra "o pipeline de export não pode ser o que apaga a prova de origem"** (`:31`) é política de compliance genuína, escrita antes de alguém cobrar.
4. **Zero terceiro em runtime.** Fontes e CSS self-hosted (`src/includes/head.php:18-19`), nenhuma requisição sai do domínio — o critério de `AUD-LGPD` está cumprido pelo lado do código, e de quebra elimina a superfície de licença de CDN.
5. **O uso íntegro dos sprites** (agregação, não adaptação) foi feito certo, provavelmente sem que ninguém precisasse pensar nisso.
6. **A honestidade dos documentos de origem.** O `ai-assets-provenance.md` **denuncia a própria lacuna** dos 3 SFX e o **próprio piso da prova** (confirmação verbal, sem billing anexado). Metade dos achados críticos desta auditoria saiu de documentos internos que tiveram a disciplina de registrar o que faltava. Isso é o oposto de teatro de compliance.

---

## Veredicto

# ⛔ NÃO PODE IR AO AR como está — mas o caminho é curto.

**Bloqueadores (os três CRÍTICOS):**

1. **LIC-01** — remover a contradição de licença. Hoje a mesma página diz "licença livre", "todos os direitos reservados" e "tudo que é meu é open source". Publicar assim é publicar uma declaração legal que se desmente sozinha. *(Redação: líder + `dr-advogado`/CLO.)*
2. **LIC-02** — criar o `LICENSE` do site. `D-LICENCA` já decidiu o regime (ARR); falta o arquivo. Recomendação de estrutura na seção do item 3 acima.
3. **LIC-03** — confirmar por escrito a origem de `menu-click.wav` e `menu-hover.wav`, ou removê-los do site até confirmar. **Não é possível afirmar direito de distribuição sobre eles hoje.**

**Fortemente recomendado antes do ar:**
- **LIC-04** — copiar `LICENSE-archivo-narrow.txt` e `LICENSE-vollkorn.txt` para `public_html/assets/fonts/`. É a única obrigação legal *ativa* descumprida no site, e o conserto é um `cp`.
- **LIC-09** — remover os órfãos do diretório servido, em especial `crt-bezel.png` (LIC-05, sem proveniência) e `placeholder-hostinger.png` (trade dress de terceiro sem uso).

**Encaminhado ao jurídico, sem bloquear por decisão de agente:**
- **LIC-08** — a declaração pública sobre o acervo de 306 obras. **→ advogado.** Recomendo levar as três perguntas da seção correspondente antes da próxima edição, não antes deste deploy.
- **LIC-06** — regularizar a entrada de proveniência do pôster 3D e definir seu regime. **→ advogado** se algum dia houver licenciamento a terceiro.

**Podem ir para depois:** LIC-07 (atualizar o `AUDITORIAS.md`), LIC-10 (página de créditos), LIC-11 (licença do wallpaper).

**Estimativa dos bloqueadores:** um arquivo `LICENSE`, duas strings de rodapé, uma confirmação de origem de dois `.wav` e um `cp` de dois `.txt`. Nenhum exige código novo.

---

*Auditoria técnica de compliance. **Não constitui aconselhamento jurídico vinculante.** A escolha de licença do site, a redação das declarações, o enquadramento do acervo de referência e a suficiência da cadeia de titularidade dos assets de IA são decisões do titular, com validação formal por `dr-advogado`/CLO. Repositório do jogo consultado em modo leitura; nenhuma escrita foi feita nele.*
