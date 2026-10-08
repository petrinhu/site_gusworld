# Glyfesse #6: Galeria de Bugs (rascunho v1)

> **Seção 6, tamanho S/M, UM caso.** Lente (proposta do brief §4.3): o defeito que mudou de diagnóstico em
> 35 minutos, de "o passe de desenho inteiro do App" para "uma linha que faltava numa lista". Em 13/08/2026
> a sessão do jogo acusou o passe de desenho da biblioteca e, 35 minutos depois, retratou-se: era um único
> valor de limpar a tela que o guarda de estado não guardava nem devolvia.
> **DECISÃO DO LÍDER (fato, verbatim, PQ7, rodada 3 e 4 de 07/10/2026):** "Registro técnico". A Galeria
> explica o defeito em linguagem técnica, e NÃO de dentro do mundo. Isso vence a recomendação de vocabulário
> "de dentro" do brief §4.3. A prosa nomeia a tecnologia e explica cada termo uma vez; as falas e os `//` do
> Gus não levam termo de produção (L-25 e precedente da #4).
> **Cercas que a peça não abre:** o arco de 04 a 20/08 (é da Reportagem), o placar, os contornos e o epitáfio;
> nada posterior a 20/08 (T1); sem tag, hash, caminho de arquivo nem número de linha do código do GlintFX;
> o outro defeito da semana (`capture-frame` vazio) e o de hover/reload da mesma versão ficam fora.
> **Fontes primárias (abertas nesta rodada), caminhos absolutos:**
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/inbox/glintfx/archive/20260813-1700-gusworld-regressao-efeitos-no-render-pass-do-app.md`;
> `.../inbox/glintfx/archive/20260813-1735-gusworld-RETRATACAO-a-causa-e-vazamento-de-clear-state.md`;
> `.../archive/20260813-1750-glintfx-retratacao-aceita-implementer-redirecionado.md`;
> `.../inbox/glintfx/archive/20260813-1914-gusworld-stencil-clear-value-confirmado.md`;
> `.../inbox/gusworld/archive/20260813-1926-glintfx-stencil-confirmado-mesmo-pacote.md`;
> `.../inbox/gusworld/archive/20260814-0015-glintfx-tag-v0301911-clearvalue-uaf-liberados.md`.
> **Grafia:** "GlintFX" segue a Reportagem v1 (decisão ao `revisor-textual`).
> **Status:** rascunho v1 do `technical-writer` (2026-10-07). Aguarda `GATE-CONTEUDO`. Toda fala e todo `//`
> do Gus é "submeter ao líder" (T7, L-08); a lista exata está nas Notas de produção.

---

## pt-BR

`gus@glyfesse:~/galeria$ galeria de bugs`

Desta vez é um defeito só, e o que mudou em 35 minutos foi o diagnóstico: de uma área inteira do código para uma linha que faltava numa lista. Aconteceu na quinta-feira, 13 de agosto de 2026, entre duas sessões de IA: a do jogo e a do GlintFX, o motor gráfico que o jogo usa.

### Uma linha numa lista

Pouco depois das 17h, a sessão do jogo relatou à do GlintFX uma regressão. A sombra de caixa (`box-shadow`) do RmlUi, a biblioteca de interface que o motor embute, saía como um retângulo opaco de cor constante, (24, 26, 34), sem tinta e sem desfoque; apagava o que estava atrás e cortava a borda dos botões vizinhos. Só acontecia no caminho novo de desenho do motor, o da classe `App`, e não no antigo, o da camada `UiLayer`. O título atribuía a falha ao "render pass do App", a etapa de desenho como um todo, e o experimento tinha controles: mesmo código do jogo, mesma versão do motor, mesmo driver de GL em software, reconstrução independente e nova execução idêntica, byte a byte.

Trinta e cinco minutos depois veio a retratação. Ela pede que a atribuição seja descartada, porque apontava para "uma área grande e genérica" do código da biblioteca: os sintomas continuavam válidos, o diagnóstico não. Os hexágonos de latão, que o primeiro relato dizia não serem desenhados, aparecem normalmente no caminho novo. Resultado, nas palavras da sessão: "é UM defeito, não três". O primeiro relato já avisava que as duas capturas eram de telas diferentes (a pausa pelo caminho antigo, o título pelo novo); a causa apareceu quando elas foram trocadas por uma sonda que roda a mesma cena e muda uma variável por vez. Ainda nas palavras da sessão: "a evidência anterior estava certa nos sintomas e errada na atribuição. Preferimos corrigir sozinhos e cedo do que defender um diagnóstico raso."

`gus@glyfesse:~/galeria$ a acusação era enorme. o defeito cabia em um numero`
`// 35 minutos entre acusar e corrigir é uma latência boa`

A causa foi medida na entrada do gancho do jogo. A cada quadro, o `BeginFrame()` do RmlUi define a cor de limpar a tela como (0, 0, 0, 0), transparente. Depois roda o gancho do jogo (`set_frame_callback`), que legitimamente troca essa cor por (24, 26, 34) para pintar o fundo da cidade. Só então o RmlUi desfoca a sombra: o passe chama `glClear(GL_COLOR_BUFFER_BIT)` sem repor a cor, contando com o valor que o `BeginFrame()` deixou. Com o valor sujo, a camada da sombra nasce opaca em vez de transparente, com a cor do fundo da cidade. O contrato do gancho prometia restaurar o estado do GL depois dele, e quem cuida disso é o `GlStateGuard`, que não guardava `GL_COLOR_CLEAR_VALUE`: a string `CLEAR_VALUE` aparecia zero vezes no arquivo do guarda. Restaurar exatamente (0, 0, 0, 0) corrigia; restaurar com alfa 1, não.

À noite, a sessão do jogo confirmou o gêmeo do buraco, o valor de limpar o stencil (`GL_STENCIL_CLEAR_VALUE`), que também vazava e, caindo entre 1 e a profundidade de aninhamento do recorte, fazia o recorte do RmlUi desaparecer por completo, e contou que um teste anterior dela, com o valor 0xFF, tinha dado falso negativo, porque 0xFF fica fora desse intervalo.

`gus@glyfesse:~/galeria$ um teste verde só prova o que ele chegou a testar`
`// vou lembrar disso na próxima vez que algo meu passar de primeira`

A sessão do GlintFX aceitou a retratação na mesma tarde e a chamou de "exatamente o processo funcionando como deveria". O primeiro diagnóstico dela, inverter a ordem do gancho de cena e do `BeginFrame()`, já tinha sido entregue a um implementador que ainda não havia commitado nada; ele foi redirecionado com a causa corrigida. Na virada de 13 para 14 de agosto, o GlintFX liberou a versão em que o `GlStateGuard` captura e restaura os dois valores, o de cor e o de stencil.

---

## EN

`gus@glyfesse:~/galeria$ bug gallery`

This time it is a single defect, and what changed in 35 minutes was the diagnosis: from a whole area of the code to one line missing from a list. It happened on Thursday, August 13th, 2026, between two AI sessions: the game's and GlintFX's, the graphics engine the game runs on.

### One line in a list

Shortly after 5 p.m., the game's session reported a regression to GlintFX's session. The drop shadow (`box-shadow`) of RmlUi, the interface library the engine embeds, came out as an opaque rectangle of constant color, (24, 26, 34), with no tint and no blur; it erased what was behind it and cut the border of neighboring buttons. It only happened on the engine's new drawing path, the one in the `App` class, and not on the old one, the `UiLayer` layer. The title blamed the "App's render pass", the drawing stage as a whole, and the experiment had controls: same game code, same engine version, same software GL driver, an independent rebuild and a rerun that came out identical, byte for byte.

Thirty-five minutes later came the retraction. It asks that the attribution be discarded, because it pointed to "a large, generic area" of the library's code: the symptoms still held, the diagnosis did not. The brass hexagons, which the first report said were not drawn at all, appear normally on the new path. The result, in the session's words: "it is ONE defect, not three". The first report already warned that the two captures were of different screens (the pause menu on the old path, the title screen on the new one); the cause appeared when they were replaced by a probe that runs the same scene and changes one variable at a time. Still in the session's words: "the earlier evidence was right about the symptoms and wrong about the attribution. We prefer to correct ourselves, and early, than to defend a shallow diagnosis."

`gus@glyfesse:~/galeria$ the accusation was huge. the defect fit in one number`
`// 35 minutes between accusing and fixing is a good latency`

The cause was measured at the entry of the game's hook. On every frame, RmlUi's `BeginFrame()` sets the color used to clear the screen to (0, 0, 0, 0), transparent. Then the game's hook runs (`set_frame_callback`), which legitimately swaps that color for (24, 26, 34) to paint the city background. Only then does RmlUi blur the shadow: the pass calls `glClear(GL_COLOR_BUFFER_BIT)` without setting the color again, counting on the value `BeginFrame()` left behind. With the value dirty, the shadow layer is born opaque instead of transparent, with the color of the city background. The hook's contract promised to restore the GL state after it, and the one in charge of that is `GlStateGuard`, which did not keep `GL_COLOR_CLEAR_VALUE`: the string `CLEAR_VALUE` appeared zero times in the guard's file. Restoring exactly (0, 0, 0, 0) fixed it; restoring with alpha 1 did not.

That night, the game's session confirmed the hole's twin, the stencil clear value (`GL_STENCIL_CLEAR_VALUE`), which also leaked and, when it fell between 1 and the nesting depth of the clip, made RmlUi's clip disappear entirely, and it added that an earlier test of its own, using the value 0xFF, had given a false negative, because 0xFF falls outside that range.

`gus@glyfesse:~/galeria$ a green test only proves what it actually tested`
`// I dont want to forget this when something of mine passes first try`

GlintFX's session accepted the retraction the same afternoon and called it "exactly the process working as it should". Its first diagnosis, reversing the order of the scene hook and `BeginFrame()`, had already been handed to an implementer that had not committed anything yet; it was redirected with the corrected cause. Around midnight between August 13th and 14th, GlintFX released the version in which `GlStateGuard` captures and restores both values, the color one and the stencil one.

---

## Notas de produção (nunca publicado)

### Fonte de cada fato (FATO = arquivo:linha aberto nesta rodada)

Raiz do bus: `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm` (`BUS/`). Siglas: ACUS =
`BUS/inbox/glintfx/archive/20260813-1700-...`; RETR = `.../20260813-1735-...RETRATACAO...`; ACEI =
`BUS/archive/20260813-1750-...`; STEN = `.../20260813-1914-...`; PAC = `BUS/inbox/gusworld/archive/20260813-1926-...`;
TAG = `BUS/inbox/gusworld/archive/20260814-0015-...`.

| # | Fato na peça | Fonte |
| :-- | :--- | :--- |
| 1 | Data 13/08/2026 (quinta: 20/08 é quinta pela pauta, 13 também) | ACUS:5 (`data: 2026-08-13`) |
| 2 | Relato classificado como regressão; título aponta "render pass do App" × "compose do UiLayer" | ACUS:3, 7 |
| 3 | `box-shadow` vira retângulo opaco de cor constante (24, 26, 34), sem tinta e sem blur, apaga o que está atrás, amputa borda de botões irmãos | ACUS:19-22 |
| 4 | Controles: mesmo commit consumidor, mesmo pin, mesmo Xvfb, mesmo llvmpipe, rebuild por segundo agente, rerun com md5 igual | ACUS:33-42 |
| 5 | Ressalva 1 já no primeiro relato: capturas de telas diferentes (pausa × título), contagem de pixels não é a prova principal | ACUS:48-55 |
| 6 | Atribuição "render pass do App" descartada; "uma área grande e genérica do código de vocês"; sintomas válidos, diagnóstico errado | RETR:12-19 |
| 7 | Segunda correção: os hexágonos aparecem sob `App`; hipótese das lajes opacas "nao provamos isso"; "e UM defeito, nao tres" | RETR:21-30 |
| 8 | Causa por A/B com sonda da mesma cena, uma variável por vez | RETR:124-128 |
| 9 | "a evidencia anterior estava certa nos sintomas e errada na atribuicao. Preferimos corrigir sozinhos e cedo do que defender um diagnostico raso." | RETR:131-133 |
| 10 | `GlStateGuard` não captura `GL_COLOR_CLEAR_VALUE`; "CLEAR_VALUE aparece zero vezes no arquivo inteiro" (a peça diz "no arquivo do guarda", sem o nome do arquivo); o doc do gancho promete restauro | RETR:34-43 |
| 11 | `BeginFrame()` põe `glClearColor(0,0,0,0)` antes do hook; medido na entrada do hook; hook põe (24/255, 26/255, 34/255, 1) "para pintar o fundo da cidade"; passe de blur chama `glClear` sem repor; camada nasce opaca | RETR:47-57 |
| 12 | Bisseção (na peça só o par decisivo): hook ausente correto; só `glClearColor` quebrado; com `glClear` quebrado; restaurar alfa 1 quebrado; restaurar (0,0,0,0) correto | RETR:80-82 |
| 13 | NÃO USADO na peça (cortado por tamanho): hipótese, não afirmada, da ordem BeginFrame × desenho do host no caminho antigo | RETR:66-72 |
| 14 | Gêmeo: `GL_STENCIL_CLEAR_VALUE` corrompe, "clip mask do RmlUi desaparece por completo", intervalo {1 .. profundidade de aninhamento}, teste anterior com 0xFF deu falso negativo | STEN:7-17 |
| 15 | Sessão do jogo não aplicou remendo nenhum, repro preservado | RETR:101-105 |
| 16 | Biblioteca aceita: "exatamente o processo funcionando como deveria"; implementer já despachado com diagnóstico errado, sem commit, redirecionado (a frase "Nenhum trabalho ... foi commitado", ACEI:16-17, ficou fora) | ACEI:7-17 |
| 17 | Stencil entra no mesmo pacote: captura no construtor, restauro no destrutor | PAC:13-15 |
| 18 | Versão liberada em 14/08: guard captura/restaura os dois, cobertura de teste dedicada para os dois | TAG:11-15 |

### Divergências e escolhas (leia antes do GATE-CONTEUDO)

1. **FATO: a hora de aceitação do brief (17:50) não bate com o git do bus.** O nome do arquivo ACEI diz `1750`, mas o
   commit que o criou é de **13/08 18:07:42 -0300** (`3595c27`). Acusação e retratação batem com os nomes:
   **17:01:55** (`9eb1b03`) e **17:36:42** (`bc2b576`), o que sustenta os **35 minutos** por duas fontes. O
   stencil: nome `1914`, commit **19:15:54** (`a250955`); confirmação do glintfx: nome `1926`, commit **19:26:39**;
   a tag: nome `0015`, commit **14/08 00:12:33** (`af4d456`). Por isso a peça diz só "pouco depois das 17h", "na
   mesma tarde", "à noite" e "na virada de 13 para 14", e **não publica** a hora da aceitação. O brief (§4.3 e A6)
   e a pauta usam as horas dos nomes de arquivo; o main pode corrigir o brief.
2. **Escolha do orquestrador, não do líder (L-07): o gêmeo do stencil.** A PQ7 oferecia (a) de dentro com gêmeo,
   (b) de dentro sem, (c) técnica; o líder escolheu "Registro técnico" e a resposta não diz nada sobre o gêmeo.
   Está em UMA frase (parágrafo próprio, curto), como o brief recomendou. **É cortável no GATE-CONTEUDO sem
   quebrar nada** (apagar o parágrafo e manter a segunda fala do Gus, que então perde o gancho: se cortar, a
   fala "um teste verde só prova..." também sai).
3. **Escolha minha: sem tag, sem hash, sem caminho de arquivo, sem número de linha do código do GlintFX.** A mensagem
   TAG traz o nome da tag (`v0.30.19.1+...`); o GlintFX atual está em outra numeração (existe
   `BUS/inbox/gusworld/20261006-0634-glintfx-v0.6.0.0.md`, só o nome do arquivo foi visto). **INFERÊNCIA minha:**
   citar a tag antiga faria o leitor que compara notar a numeração voltando, o que é piscar para 21/08 (T1), pelo
   mesmo raciocínio com que a Reportagem v1 cortou os hashes. Identificadores de código (`GlStateGuard`,
   `BeginFrame()`, `GL_*`) ficam, porque são o registro técnico que o líder pediu.
4. **A lente "mudou de dono" está no cabeçalho interno, não na prosa.** FATO: o defeito foi sempre da biblioteca
   (do guarda de estado); o que mudou foi o diagnóstico (de "o passe de desenho do App" para "uma linha numa
   lista"). A prosa diz isso ("o diagnóstico mudou") e não afirma troca de dono.
5. **Honestidade sobre as capturas, em duas camadas.** FATO: o primeiro relato já trazia a ressalva de telas
   diferentes (ACUS:48-55); a retratação diz que o que fechou a causa foi a sonda de mesma cena (RETR:124-128). A
   peça carrega os dois fatos e não diz "sem perceber" nem "só depois percebemos".
6. **(24, 26, 34) × fundo da cidade.** FATO: ACUS:19 dá a cor do retângulo; RETR:52-53 dá a cor que o gancho põe
   para pintar o fundo da cidade, (24/255, 26/255, 34/255, 1). A frase "o retângulo tinha a cor do fundo da
   cidade" é a junção aritmética dessas duas linhas, não frase literal da fonte.
7. **Fora, por escolha:** a suíte da biblioteca ("181/181 verde", ACUS:108; soaria cobrança, T2); o defeito de hover
   e reload da mesma versão (TAG:16-21); o `capture-frame` vazio de 13/08 (brief §4.3); as palavras "contorno",
   "placar" e "do zero" (divisória e varredura T1); a pista do aviso de textura que "não perseguimos" (ACUS:64-78); cortados no aperto de tamanho (a peça é S/M): a hipótese da ordem BeginFrame × desenho do host no caminho antigo (RETR:66-72), a lista completa do que o guarda salva (RETR:34-39), a bisseção item a item (só ficou o par decisivo, RETR:80-82), a hexágono sem explicação (RETR:24-28), "nenhum trabalho baseado no diagnóstico errado foi commitado" (ACEI:16-17), "a sessão do jogo não aplicou remendo nenhum" (RETR:101-105) e o teste dedicado de cada valor (TAG:14-15). Todos continuam disponíveis se o líder quiser de volta. Tamanho final: 653 palavras pt e 651 EN (`wc -w` sobre o bloco inteiro, com prompts, falas e título; encurtada de 866 na primeira versão), para um slot S/M (brief §4.3: 6 a 8 parágrafos com aparte); a peça é a primeira da lista de cortes da pauta §4.
8. **Tradução EN:** as citações em inglês são traduções minhas do português do bus (restaurei a acentuação na
   versão pt). Vão ao GATE-CONTEUDO junto. Na EN, "agente" aparece como "second agent" e "implementer", como na fonte.
9. **"Sessão de IA":** a peça nomeia as duas sessões como de IA (precedente da Reportagem v1); `compliance-legal`
   confere contra o rodapé e o Expediente. Crédito do Gus Dragon: a peça não o cita (T4 não se aplica).

### Falas e pensamentos do Gus, para o GATE-CONTEUDO (T7, L-08: SUBMETER AO LÍDER)

| # | pt-BR | EN |
| :-- | :--- | :--- |
| 1 | prompt: `gus@glyfesse:~/galeria$ galeria de bugs` | prompt: `gus@glyfesse:~/galeria$ bug gallery` |
| 2 | fala: "a acusação era enorme. o defeito cabia em um numero" | fala: "the accusation was huge. the defect fit in one number" |
| 3 | `//`: "35 minutos entre acusar e corrigir é uma latência boa" | `//`: "35 minutes between accusing and fixing is a good latency" |
| 4 | fala: "um teste verde só prova o que ele chegou a testar" | fala: "a green test only proves what it actually tested" |
| 5 | `//`: "vou lembrar disso na próxima vez que algo meu passar de primeira" | `//`: "I dont want to forget this when something of mine passes first try" |

Registro: sem ponto final nas falas e nos `//` (a fala 2 tem um ponto interno, preservado pelo precedente da #5);
um deslize mecânico por idioma (pt: "numero", acento comido; EN: "dont", apóstrofo comido); nenhuma gramática
errada. Nenhuma fala tem termo de produção (L-25); a prosa é a voz técnica da revista. **Atenção na fala 4:** no contexto ela lê como comentário ao falso negativo do teste da sessão do jogo; é máxima geral e a própria sessão registrou a lição, mas toca a conduta da sessão (T2), então o líder decide sabendo. As falas comentam a
revista e o defeito, nunca a sessão de IA nem o líder (T2). Nenhuma frase caracteriza a personalidade do Gus.
Os dois `//` ficam em até 72 caracteres, pensamento comum (R4).

### Conferências

| Checagem | Resultado |
| :--- | :--- |
| Travessão e meia-risca (U+2014, U+2013) e suas entidades HTML | 0 ocorrências no corpo publicável (grep sobre os blocos pt e en) |
| Varredura T1/T2 nos dois idiomas, com piso não vazio | 0 ocorrências de `antecessor, refunda, recome, do zero, nova biblioteca, apagado, zerado, contaminad, puro, desconectad, sem depend, wrapper, binding, mentiu, enganou, fingiu, disfar, parado, stalled, placar, scoreboard, contorno, workaround`, sobre os blocos pt e en isolados (piso: 27 linhas varridas por idioma, não vazio) |
| Conversor (R1 a R4) | `php scripts/gerar-secoes.php --edicao 98 --raiz <scratchpad>` com receita descartável de uma seção: `gerados=2`, saída 0; nada gravado em `src/` do projeto |
| Tamanho dos `//` (R4, só o texto sem a marca) | 53, 64 (pt), 56, 66 (EN), todos até 72: pensamento comum |
