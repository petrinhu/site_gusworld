# Levantamento histórico das 3 sessões (15/mai → 19/jul/2026)

> **O que é este documento.** Inventário/rascunho para o líder e para o pipeline editorial da revista **Glyfesse** (`docs/editorial/PIPELINE-EDICAO.md`). É a **fonte da pauta**: a cronologia real datada por commit dos três repositórios irmãos + o *story bank* (tudo que pode virar matéria, taggeado). **NÃO é publicação** — é a base bruta de onde as edições são recortadas.
>
> **Levantado por:** `internal-auditor` (levantamento histórico editorial), a pedido do líder, 2026-07-19.
> **Regra-mãe do formato (do líder):** *"as revistas serão relato histórico, sincronizar TUDO pelas datas dos commits"*. Cada matéria ancora na **data real do commit** do marco que conta. Nunca inventar data.
> **Regra dura de privacidade:** o playtester é só **"Gus Dragon"** / **"o playtester de 11 anos"**. Nome real NUNCA — nem aqui.

---

## 0. Cobertura (o que foi lido — sem corte silencioso)

O líder canonizou "não silencie corte". Segue o inventário honesto de fontes.

| Fonte | Volume | Nível de leitura |
|---|---|---|
| **Log do jogo** (`Projects/gusworld`) | 806 commits, 15/mai→19/jul | Log completo puxado; **lido integralmente por filtro de marcos técnicos** (grep engine/M/ADR/cartas/áudio/diálogo). A **massa de deep-lore narrativa** (centenas de commits `feat(narrative)`, ~365k palavras) foi **amostrada**, não lida linha a linha — ver §Cobertura-faltante. |
| **`CHANGELOG.md` + `ROADMAP.md` do jogo** | — | **Lidos integralmente.** São o resumo curado dos marcos e pivôs (fonte primária desta linha do tempo). |
| **ADRs do jogo** (`docs/tech/adr/`) | ADR-001 a ADR-020 | **Índice lido**; conteúdo dos ADRs de pivô cruzado via CHANGELOG. Corpo dos ADRs individuais **não aberto um a um** (amostra). |
| **Log do glintfx** (`Projects/loucura_c_asm`) | 422 commits, 21/jun→19/jul | Log completo; **lido integralmente por filtro de marcos** (releases/ADR/audit/font/framework). |
| **`CHANGELOG.md` do glintfx** | 24 releases | **Lido integralmente** (releases v0.1.0→v0.11.2 + core-v0.4.0, com as histórias de bug). |
| **Memórias do site** (`MEMORY.md` + tipadas) | ~50 memórias | Índice lido; as de valor editorial (`cronologia_real_datada`, `anatomia_da_edicao`, `a_cadencia_editorial`, `historia_real_dos_pivos`, `bugs_e_previsoes`) **lidas integralmente**. |
| **Memórias do jogo** | ~90 memórias | **Índice `MEMORY.md` lido** (tem a sinopse de cada uma). Corpo das individuais **amostrado**. |
| **Memórias do glintfx** | ~15 memórias | **Índice lido**; corpo amostrado. |
| **O BUS** (`gusworld_ia_autocomm/archive/`) | 38 mensagens | **Lidas integralmente as 9 de maior valor** (crash/UAF, 5 becos sem saída, flash-bug, dores SDL/Qt, framework-2D, proveniência da catedral). As outras ~29 (acks, coordenação de hook, materiais de aparte já cobertos por memória) **amostradas por título**. |
| **Log do site** (`Projects/site_gusworld`) | 121 commits, 15/jul→19/jul | **Lido integralmente** (é curto). |

### Cobertura faltante (segunda passada, se o líder quiser)
1. **O miolo do deep-lore** (Eras 1-2, facções, cosmologia, os 21 mestres/análogos históricos por extenso) — só a espinha foi mapeada. É **matéria da Edição #1** (a gênese) e do eixo expert; merece uma passada dedicada quando essas edições entrarem em produção. **⚠️ é o território de spoiler mais denso.**
2. **Corpo dos ADRs individuais** do jogo e do glintfx (aqui só o índice + o que o CHANGELOG resume).
3. **~29 mensagens do bus** de coordenação/acks (baixo valor editorial, mas não conferidas linha a linha).
4. **As memórias individuais do jogo** (corpo) — o índice foi suficiente para a linha do tempo, mas há detalhe fino não extraído.

---

## PARTE (a) — LINHA DO TEMPO CONSOLIDADA E DATADA

Cronologia real cruzando os 3 repos, marco a marco, pela **data real do commit**. Estende a memória `cronologia_real_datada` (que tinha a espinha do jogo) somando **glintfx** e **site**.

**Legenda de repo:** 🎮 jogo (`gusworld`) · ✨ glintfx (`loucura_c_asm`) · 📰 site (`site_gusworld`).

| Data | Repo | Marco | Commit(s) | O que mudou |
|---|---|---|---|---|
| **2026-05-15** | 🎮 | **A GÊNESE** — Fase 1 concepção + deep-lore Bloco G | `97ed2fe` | Primeiro commit rastreável. Os ebooks + RAG são de imediatamente antes (pré-git). **Data inicial fixada da Edição #1.** |
| 2026-05-15→21 | 🎮 | Deep-lore canônico: Era 1 §§1-10 (~318k pal), Facções, Settings, Personagens, Antagonistas, Magic, Ontologia, Antologia Vol 2 | `ff97b5d`…`cc713d1` | ~365k palavras de worldbuilding **antes de uma linha de código**. O conlang Sylvarin, o Gus canonizado (Gustaf VII Tavus Vance). |
| **2026-05-19** | 🎮 | **PIVÔ 1: Fase 1 (lore) → Fase 2 (engine)** | `e68208d` (ADR-001) | Pausa da deep-lore como gate; começa a engine. Godot + `project.godot` inicial. |
| **2026-05-19** | 🎮 | **PIVÔ 2: GDScript → C# .NET 8 AOT (BREAKING)** | `3dde62f` (ADR-002) | Linguagem primária vira C# por performance em máquina modesta. Camera/Save/Input em C#. *(Stack depois abandonado.)* |
| 2026-05-26→06-06 | 🎮 | Spec de combate turn-based, economia, craft, GDD v0.2; pesquisa 2D→3D via IA; modelos 3D (Tripo3D) via Git LFS | `71070aa`…`a7d4632` | A era 3D: Blender + Tripo3D. **O "Gus que nunca foi 3D"** (982k faces, arquivo nem salvo). |
| **2026-06-21** | ✨ | **glintfx NASCE** — scaffold inicial (porte, tabela, ADRs) | `f01cd93` | O repo `loucura_c_asm` começa. Licença AGPL-3.0 inicial. |
| **2026-06-21** | 🎮 | **PIVÔ 3: Godot/C# → C++20 + engine própria (Qt6)** | `5040ed5`,`5461ce2` | Decisão do líder supremo. Board M0-M8, 4 camadas, licença GPLv3. **A GusEngine nasce.** M0 andaime + M3 (i18n/knowledge/crypto/save) portados C#→C++ em TDD no mesmo dia. |
| **2026-06-22** | 🎮 | M5 combate portado (state machine/combos/brains/RNG), M2 input, M4 colisão de grade — tudo C#→C++ TDD | `31a856d`…`e3b2331` | A lógica pura migra inteira. Save sobe a V4 (anti-tamper). |
| **★ 2026-06-22** | 🎮 | **O QUADRADO AZUL** — M1 camada visual (janela Qt6 + loop fixo + render2d), boneco anda e desliza | `ce17f78`,`c12cb30` | **O quadradinho jogável nasce** (corner-correction estilo Stardew). É a Edição #3 da revista. |
| **2026-06-22** | 🎮 | **PIVÔ 4 (o mais importante): Qt6 → SDL3 + RmlUi + miniaudio** | `300329a` (ADR-008) | Fronteira do M1 reescrita de Qt6 para SDL3. Motivos: Qt RHI é risco, gamepad AAA, binário ~10x menor, portável a console. |
| **2026-06-22** | 🎮 | **O retângulo vira o Gus** — jogador vira sprite animado (walk 7 frames + idle respiração) | `943788f` | Fim do placeholder. |
| **2026-06-23** | 🎮 | M4 loop jogável SDL fechado + validado ao vivo pelo líder; Carga do Aparato (stamina re-enquadrada) | `39fdc75`,`2e41597` | Primeiro loop jogável de verdade na engine nova. |
| **2026-06-24** | 🎮 | Arena = sprites 2D via PixelLab (gate 2D-vs-3D fechado); M5 BattleScreen incrementos 1-3 (dá pra jogar) | `96ebea2`…`d1b02e4` | A arena de batalha. Sistema de fonte próprio (stb_truetype + Pixel Operator Mono). |
| 2026-06-25 | 🎮 | M5 números flutuantes + pacing + redesign "Tático Cockpit" (960x540) | `4de48f7`…`fdb1c37` | O cockpit tático da batalha. |
| **2026-06-28** | ✨ | **glintfx vira lib C++23 RmlUi+GL3** — spec da Camada 1, arquitetura em camadas; relicencia AGPL → MPL-2.0 | `55a3e31`,`f9c4bb5` (ADR-0007) | O escopo se define: lib drop-in de UI+efeitos. Esqueleto CMake+FetchContent, janela GLFW+gl3w, RmlUi+FreeType. |
| **2026-06-29** | ✨ | **glintfx v0.1.0** — engine drop-in RmlUi + GL3 (Camada 1 v1), auditada + tag | `55d6ea4`,`0348e04` | Primeira release. Consumidor drop-in provado via FetchContent. |
| 2026-06-30→07-01 | ✨ | v0.2.0→v0.2.4 (polygon, hardening, UA-stylesheet) | — | |
| **★ 2026-07-01** | 🎮 | **Adoção do glintfx (embed mode) como motor de UI/HUD do jogo** — cockpit "Tático" via `glintfx::UiLayer` | `8accb17` (ADR-010) | **O momento em que os dois projetos se fundem.** O jogo passa a consumir a lib do próprio criador (pin v0.2.4). Polish do cockpit aprovado ao vivo (glyph Vetor-Dragão em medalhão, anéis gunmetal). |
| **2026-07-02→03** | 🎮 | **M6 Áudio** — AudioEngine (miniaudio) + música + SFX + crossfade cidade↔arena | `c4cf62c`…`074117a` (ADR-011) | Crossfade validado ao vivo: *"absurdo de bom"*. Glitch digital substitui o fade preto na transição. |
| **2026-07-03** | ✨ | **Camada 0 ACORDADA** — `loucura_c_asm`, o runtime C+ASM zero-libc, sai do dormente (bootstrap I/O, harness de teste sem libc, alocador bump via mmap) | `f4f5061`…`7037308` | A "loucura" de longo prazo: reimplementar tudo do zero, sem libc. |
| **2026-07-04** | 🎮 | Menu de pausa/config/som (Esc→pausa, slider, persistência); bump glintfx v0.3.0→v0.3.1 (fix load() fantasma/UAF) | `d605368`…`82eb580` | I/O real do save em disco (`~/.gusworld/saves`, 0700/0600). |
| 2026-07-06 | 🎮 | **M7-DIALOGO** — runtime de diálogo POCO + parser próprio; **NPC Seu Bertoldo Caim** interagível (sprite PixelLab 8-dir) | `81df01b`…`8e5664f` (ADR-014) | Primeiro NPC de verdade. Registro de fala "Fósforo Verde" escolhido pelo líder. |
| **2026-07-07** | 🎮 | M2 tela de Controles (captura real, remap sem restart, botão Aplicar); M5 fechado no board | `6f0d318`…`09b18f2` | M2 validado ao vivo de ponta a ponta. |
| 2026-07-07 | ✨ | glintfx v0.4.0→v0.5.0 (scroll, drop-in) | — | |
| **★ 2026-07-08→09** | 🎮 | **LORE-ORIGEM-MULTIVERSO** — o roster dos **21 mestres/análogos históricos** (Faraday, Maxwell, Einstein, Newton, Planck, Gödel, Euler, Turing, von Neumann, Ada, Menger, Mises, Hayek… + capstone Helion Tusk) vira o motor de cartas | `509636e`…`a001f4f` | ⚠️ **Território de spoiler denso.** Físicos/matemáticos/economistas históricos viram figuras de carta. Carta-amostra Gaiola de Faraday canonizada (ELM-01-C). |
| **2026-07-09** | ✨ | **Loader GL próprio clean-room substitui gl3w** + ADR-0009 fronteira de internalização + AUD-ABI/AUD-SEC da Camada 0 (CONFORME) | `32338f8`,`a34425e` | glintfx começa a internalizar dependências (clean-room). |
| **2026-07-09** | 🎮 | Bump glintfx v0.6.0→v0.7.0 (luminance-key): recolor de carta por domínio RESOLVIDO (threshold 0.70 preserva ouro) | `30aff53` | O recolor das molduras de carta via RCSS nativo. |
| **2026-07-09→10** | 🎮 | **Tela de Salvar/Carregar** (POCO+RML fiel ao mock) + auditoria interna (CRIT-1 data-loss silenciosa em save corrompido, remediada) | `26e3b1f`…`efff1ea` | Save-load UI completa, auditada. |
| **★ 2026-07-10** | ✨ | **Motor de fonte próprio** (SOV-SFNT/SOV-RAST) substitui FreeType, A/B via runtime gate; fixes CRÍTICOS (symbol-hijack, UB de cast float→int16) | `26eefc3`,`40a74bc` | glintfx reimplementa o rasterizador de fonte do zero. v0.9.0/v0.9.1. |
| **★ 2026-07-11→14** | ✨ | **Saga FONTFLIP** — stem-darkening testado e REPROVADO; a causa-raiz real era **fase de tela fracionária** (fix de 2 linhas: pen-snap + vsnap) empata o FreeType | `1746b80`,`eab07df`,`4ec8193` | **Um dos melhores "becos sem saída" do acervo.** Detector de haste (semanas) cancelado por desnecessário. |
| **2026-07-14** | ✨ | Build Windows (MSVC) verde (loader GL) — v0.9.2; fallback de fonte por-glyph | `232e57c`,`957505b` | Cross-platform provado. |
| **2026-07-14** | 🎮 | **Motor de cartas techMagic** (CARD-ENGINE) começa — executor de conjuros data-driven (ADR-016) | (onda CARDS) | Paralelo ao board M0-M9. |
| **★ 2026-07-15** | 📰 | **O SITE NASCE** — repo iniciado, conceito v0.1, os três meninos, a história dos pivôs; frames do arquivo pessoal extraídos | `7bfc5b3`…`52bad01` | A revista começa. |
| **2026-07-15** | 📰 | **A revista se chama GLYFESSE**; domínio **gusworld.site** comprado e configurado | `a27bd61`,`46d8248` | Nome e casa. |
| **2026-07-15** | ✨ | glintfx v0.10.0 — motor de fonte próprio vira **default** (FreeType selecionável em runtime): "flip suave" | `e6030fb` (ADR-0011) | Decisão de não queimar a ponte. |
| **★ 2026-07-16** | 🎮✨ | **A OOM** — 3 sessões + build pesado do glintfx estouram a RAM, OOM-killer mata tudo | (journal) | **O primeiro bug da Galeria de Bugs** (seed em `bugs_e_previsoes`). |
| **2026-07-16** | ✨ | glintfx v0.11.0 **backdrop-ripple** (captura FBO0 + refração screen-space via RCSS) → v0.11.1 **hardening DoS** (teto 256 MiB em asset/fonte) | `53ffb35`,`51fbc54` | O decorator de ondulação + a auditoria formal LW-AUD. |
| **★ 2026-07-16** | 🎮✨ | **Crash cruzado resolvido pelo bus** — glintfx vê double-free/UAF do jogo no `coredumpctl`, avisa; jogo conserta na raiz (lifetime bug do deck/mão, `d2601c1`) | bus `2104`/`2230` | **A prova do valor do bus:** bug que passava verde numa suíte, pego por outra sessão na mesma máquina. |
| **★ 2026-07-16** | 📰 | Mocks 00/02/05/06/07/08/09/10 (vibe, tipografia, primeira dobra/quadradinho, mobile, linha do tempo, PRESS START, anatomia, banca); **Edição #0 no ar** (placeholder Hostinger) + **primeiro post no X** | `8ea955f`…`e935796` | A identidade visual + o primeiro tijolo público. |
| **★ 2026-07-17** | 🎮📰 | **O bug do FLASH do menu** — reportado pelo playtester de 11 anos; **4 hipóteses erradas** até a causa-raiz no fonte do SDL (`SDL_ReconfigureWindow`) | bus `2033`; jogo FLASH-CTX | **Estudo de caso de depuração** (o cemitério de hipóteses). |
| **2026-07-17** | 📰 | **D-STACK decidido: PHP + includes, servido dinâmico** (STACK-ADR); fonte única `$edicoes` com as 3 edições da gênese | `159dfc6`,`c0818a3` | Destrava a construção real. |
| **2026-07-17** | 📰 | Mocks 12/13/14/15 (capa Edição #1, o switch de idioma como recompilação, apartes do Gus C-Arcane, "Gus no Bus") | `9888ce1`…`e8af6a8` | O eixo expert ganha forma. |
| **2026-07-17** | 📰✨ | Proveniência da `catedral_mae.png` (nano banana / Gemini, C2PA+SynthID) apurada para virar key art | bus `0618` | Disclosure honesto de IA. |
| **★ 2026-07-18** | 📰 | **A home ganha vida** — banca data-driven, **quadradinho real no hero** (núcleo puro testado), PRESS START jogável, scrubber da linha do tempo, **Glyfa** (forja de nomes Sylvarin), **álbum** de cromos-glifo, **2 botões de som** com SFX real | `3649a31`…`d82e031` | Os mini-apps (todos com TDD do núcleo puro). |
| **2026-07-18** | 📰 | Mock 16 + **página 404** de produção ("a sala vazia"); **cupom recortável** (poll + endpoint de voto) | `af215c0`…`7ff9781` | |
| **★ 2026-07-19** | ✨ | glintfx **v0.11.2 + core-v0.4.0** — fix do **GLSYM** (crash SIGSEGV na 1ª chamada GL, símbolo vazado, classe 🔴) + overflow do `atof` (saga fix→regressão→2º review) + re-auditoria delta Camada 0 | `ec2405e` | 4 ondas autônomas de qualidade/auditoria. |
| **★ 2026-07-19** | ✨ | **glintfx vira FRAMEWORK de jogos 2D** — nascido da dor real do GusWorld (juntar SDL+Qt+libs); ADR-0015 arquitetura atomizada + esqueleto modular | `2359a0b`,`bf7a53d`; bus `1206` | **Pauta de capa.** "Metade da engenharia é acertar a palavra" (API? framework? engine?). |
| **2026-07-19** | 🎮 | **Cartas de hardware/vírus** — LogicBomb/Worm/ZipBomb, cura do Turing, **urandom** (carta-caos do Gus); combate estilo Zelda por tier; ATOM refactor (peças componíveis) | `3a05dbe`…`aa4f7e7` (ADR-020) | Ideias do filho (urandom, zip-bomb) viram carta. |
| **2026-07-19** | 🎮 | Dores REAIS SDL/Qt mandadas ao glintfx (insumo do escopo do framework 2D): FLASH-CTX, montar N peças, ciclo GL, UAF de áudio, Windows | bus `dores-sdl-qt` | O consumidor nº1 alimenta o framework. |
| **2026-07-19** | 📰 | **Pipeline editorial canonizado** (PIPELINE-EDICAO) + rascunho da matéria do bug do flash (pt/en) + cupom com resultado ao vivo | `f486185`,`8f48a0a` | A revista ganha método. |

**Estado atual (19/jul):** jogo no **M7** (paridade jogável, falta só o playthrough ao vivo do líder); glintfx em **v0.11.2**, virando framework 2D; site com a home viva e o pipeline editorial canonizado, pré-lançamento (deploy Hostinger ainda **bloqueado**, `D-GO-LIVE`).

---

## PARTE (b) — STORY BANK EDITORIAL

Tudo que pode virar matéria, taggeado: **data-âncora** (o commit real; a edição herda essa data) · **seção candidata** (conforme `anatomia_da_edicao`) · **⚠️ risco de spoiler** · **edição** onde pinga (drip cronológico, #1 = gênese 15/mai).

> **Nota de cadência:** a revista **nasce com #1, #2, #3** (gênese → arquitetura/3D → quadrado azul). #4+ pingam. A coluna "Edição" abaixo é **proposta**, não decisão — o líder rege o agrupamento fino.

### ★ Os 10-15 itens de MAIOR VALOR (recomendados)

| # | Matéria | Data-âncora | Seção candidata | ⚠️ Spoiler | Edição |
|---|---|---|---|---|---|
| 1 | **A gênese: ~365k palavras de lore antes de uma linha de código** (o `glyfe` = escrever antes de compilar, vivido) | 15/mai (`97ed2fe`) | Reportagem de capa (#1) + Editorial | ⚠️ **ALTO** — lore não lançada (Eras, facções, Sylvarin). Curadoria do líder | **#1** |
| 2 | **O Gus que nunca foi 3D** — Tripo3D+Blender, 982k faces, arquivo nem salvo; o pivô 3D→2D salvo pela ideia de spritesheets do irmão Iago | 26/mai→04/jun; frame `gus_3d_blender` | Cemitério das Ideias Mortas + Reportagem | 🟢 baixo (é processo, não lore) | **#2** |
| 3 | **Os 4 pivôs de stack** (GDScript→C#→C++/Qt→SDL3) — cada um decisão de dev solo por limite de execução real | 19/mai; 21/jun; 22/jun | Seção de Programação + Cemitério | 🟢 baixo (técnico) | **#2**, pinga |
| 4 | **O quadrado azul** — o quadradinho ciano numa sala branca; a paleta do jogo já estava lá quando era um retângulo | 22/jun (`ce17f78`) | Reportagem de capa (#3) + a primeira dobra jogável | 🟢 baixo | **#3** |
| 5 | **O retângulo vira o Gus** — o PixelLab que "casou um milhão por cento" | 22/jun (`943788f`) | Reportagem + Galeria (o antes/depois) | 🟢 baixo | **#3/#4** |
| 6 | **A adoção do glintfx pelo jogo** — o criador consome a própria lib; os dois projetos se fundem | 01/jul (`8accb17`, ADR-010) | Seção de Programação + "Gus no Bus" | 🟢 baixo | pinga (jul) |
| 7 | **★ A saga FONTFLIP** — stem-darkening reprovado; causa-raiz = fase fracionária; fix de 2 linhas mata um subsistema de semanas | 11-14/jul (`1746b80`/`eab07df`/`4ec8193`) | **Seção de Programação** (eixo expert) + Apartes do Gus | 🟢 baixo (é glintfx, público) | pinga |
| 8 | **★ O teste tautológico** — mutation testing humilha um teste verde (o DoS de 256 MiB); "verde não é prova" | 16/jul (`0f944e1`, AUD-L1-PARSE) | Seção de Programação | 🟢 baixo | pinga |
| 9 | **★ O bug do FLASH do menu** — o playtester de 11 anos descreve o zoom; 4 hipóteses erradas até o fonte do SDL | 17/jul (bug FLASH-CTX) | **Galeria de Bugs** (piada em cima, técnico embaixo) + fala do playtester | 🟡 médio (cita menu/telas, sem mecânica nova) | pinga (17/jul) |
| 10 | **★ A OOM (o primeiro bug)** — 3 sessões + build pesado estouram a RAM | 16/jul (journal) | **Galeria de Bugs** (a seed canônica) | 🟢 baixo | pinga |
| 11 | **★ O crash resolvido pelo bus** — glintfx vê o UAF do jogo no coredumpctl e avisa; a prova do valor do canal | 16/jul (`d2601c1`) | "Gus lê o bus" (é o AI-disclosure virado história) | 🟡 médio (deck/mão = mecânica) | pinga |
| 12 | **★ glintfx vira framework 2D** — nascido da dor real; "metade da engenharia é acertar a palavra" | 19/jul (bus `1206`) | **Reportagem de capa** (pauta forte) + Próximos Lançamentos | 🟢 baixo | pinga (19/jul) |
| 13 | **A issue #1 do funplay-godot-mcp** — o líder auditou um MCP antes de adotar, achou 2 vulns high, fez 3 releases acontecerem | 07-23/jun (GitHub issue) | Seção de Programação + Entrevista (a tese "IA é ferramenta") | 🟢 baixo (é público no GitHub). ⚠️ **não publicar o e-mail do mantenedor** | pinga |
| 14 | **A "vez em que o chefe estava errado"** — o orquestrador do glintfx mandou medir e a medição o refutou (o X-ray da UI) | 17/jul (bus `0650` #4) | Seção de Programação (eixo expert) | 🟢 baixo | pinga |
| 15 | **O switch de idioma como RECOMPILAÇÃO** — a decisão de design do próprio site (i18n = build) | 17/jul (`e73dcec`, mock 13) | Reportagem sobre o próprio site (build-in-public do site) | 🟢 baixo | pinga |

### Story bank estendido (por seção da anatomia)

**Reportagem de capa** (o marco de cada número):
- Gênese/lore (15/mai) · pivôs (mai-jun) · quadrado azul (22/jun) · arena 2D (24/jun) · cockpit via glintfx (01/jul) · áudio/crossfade (03/jul) · NPC Bertoldo (06/jul) · save-load (10/jul) · framework 2D (19/jul).

**Galeria de Bugs** (piada nerd primeiro, técnico depois — regra de `bugs_e_previsoes`):
- A OOM (16/jul) · o flash do menu (17/jul) · o double-free/UAF do deck (16/jul) · o UB de cast float→int16 no SFNT (10/jul) · o crash de SIGSEGV no LOAD + input preso do release/reacquire de contexto (jul) · o GLSYM (símbolo GL vazado que crashava na 1ª chamada, 19/jul) · o `atof` overflow→regressão (19/jul) · o "load() fantasma"/UAF do glintfx v0.3.1 (04/jul) · UAF de áudio + leak de ALSA (miniaudio).

**Cemitério das Ideias Mortas** (becos com data real):
- O Gus 3D (Tripo3D/Blender) · o Godot (com e sem Funplay MCP) · o C# .NET 8 AOT · o Qt6 (RHI risco) · o stem-darkening reprovado · o detector de haste cancelado · a API `emit_vfx` rejeitada no papel (bus `0621` #3) · o "drop do FreeType" cancelado (19/jul) · o glitch procedural da transição vetado ao vivo pelo líder (04/jul).

**Seção de Programação** (ADR/commit/raciocínio, eixo expert — ensina):
- Os 5 becos sem saída do glintfx (bus `0621`/`0650`) · a arquitetura de 4 camadas + gate de CI · a internalização clean-room (loader GL, motor de fonte, Camada 0 zero-libc) · o save-crypto (FIPS/RFC) · o `image-tint`/luminance-key para recolor de carta · o backdrop-ripple (captura de FBO).

**Apartes do Gus (C-Arcane)** (eixo expert, in-fiction, fato+fonte real):
- Cada beco/decisão técnica do glintfx tem um aparte candidato (`project_apartes_gus` já tem 29+ aprovados). Material do glintfx = `reference_material_glintfx_becos`.

**"Gus no Bus" / "O Gus lê o bus"** (o AI-disclosure virado história):
- O crash cruzado (16/jul) · as dores SDL/Qt mandadas ao framework (19/jul) · as ideias do filho (urandom, zip-bomb, missão cronometrada) virando carta (19/jul).

**Próximos Lançamentos** (sai do `TODO.md` do jogo, sem prometer data):
- M7 playthrough · M8 decommission do Godot · as cartas em produção · o framework 2D.

**Entrevista** (o Gus entrevista o líder):
- A origem (Railroad Tycoon em ASM → presente pro filho) · "IA é ferramenta, o criativo é 99,9% meu" · os três meninos de 11 anos.

### ⚠️ ITENS DE SPOILER — o líder rege (NÃO decidi)

Marcados para o líder decidir embargo antes de qualquer publicação. O bus é **privado** (spoiler trafega), mas **publicar no site é exposição pública**.

1. **★ ALTO — Os 21 mestres/análogos históricos** (Faraday, Einstein, Newton, Planck, Gödel, Turing, von Neumann, Ada, Mises, Hayek, Menger, Bastiat + capstone **Helion Tusk**) como figuras de carta (08-09/jul). É o coração da mecânica de cartas não lançada. **Nomear qualquer mestre no site = spoiler forte.**
2. **★ ALTO — O deep-lore** (Eras 1-2, facções, cosmologia, o conlang Sylvarin, os antagonistas Sterling/Patch-Zero, a Dragon Victory, os endings). Matéria da Edição #1, mas o quanto revelar é decisão editorial.
3. **MÉDIO — Mecânicas nomeadas:** deck/mão, Carga do Aparato, cartas de vírus (urandom/ZipBomb), combate estilo Zelda por tier, o "final verdadeiro" destravado pelo 100% de lore.
4. **MÉDIO — A "carta faraday"/Gaiola de Faraday** já aparece no monólogo do "Gus lê o bus" (mock 09) → a memória `anatomia_da_edicao` já marcou `SPOILER-POLICY`. Conferir.
5. **BAIXO mas atenção — Nomes/falas de terceiros:** o irmão Iago (deu a ideia de spritesheets), o mantenedor Winlifes (issue #1), o e-mail do mantenedor. Só com consentimento; e-mail **nunca**.

**O que é seguro (glintfx é lib pública, sem lore):** todos os becos sem saída do glintfx, a saga FONTFLIP, o teste tautológico, o framework 2D, os pivôs de stack, a issue #1 (pública no GitHub). É por isso que o **eixo expert do site apoia-se pesado no glintfx**.

---

## Apêndice — ponteiros de fonte (para a segunda passada)

- Linha do tempo do jogo: `Projects/gusworld/CHANGELOG.md` + `ROADMAP.md` + `docs/tech/adr/ADR-001..020`.
- Becos/bugs do glintfx: `Projects/loucura_c_asm/CHANGELOG.md` + `docs/adr/` + `docs/auditoria/` + as 9 mensagens-chave do bus (`gusworld_ia_autocomm/archive/2026071[679]-*`).
- Enquadramento editorial: memórias `cronologia_real_datada`, `anatomia_da_edicao`, `a_cadencia_editorial`, `historia_real_dos_pivos`, `bugs_e_previsoes`, `project_apartes_gus`, `reference_material_glintfx_becos`, `gus_le_o_bus`.
- Arquivo pessoal (vídeos/frames, gitignored): `Projects/gusworld/resources/arquivo_pessoal_petrus/` — ⚠️ frames vazam tela pessoal, verificar limpo antes de tracked (`feedback_frames_vazam_tela_pessoal`).
