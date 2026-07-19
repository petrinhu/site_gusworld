# Matéria: o bug do "flash" (RASCUNHO editorial)

> **Status:** rascunho para revisão do líder. NÃO é publicação.
> **Tipo Diátaxis:** Explanation (estudo de caso "como foi pensado"), com um Card curto de entrada.
> **Audiência:** dois eixos (o leigo entra pelo Card + o ângulo humano; o expert é recompensado pela Peça funda).
> **Voz:** o Gus (`gus@glyfesse>` = fala; `// ` = pensamento). Corpo/legenda acentuados; linha de terminal/log/comando em ASCII de propósito (`D-ACENTOS`).
> **Fontes brutas:** bus `gusworld_ia_autocomm/archive/2026071*`; `Projects/gusworld/docs/tech/adr/ADR-018-contexto-gl-unico-flash-ctx.md`; `.../pivot/menu-flash-contexto-unico-plano.md`.
> **Regra de ferro:** o playtester é **"Gus Dragon" / "o playtester de 11 anos"**, SEMPRE. Nome real NUNCA (nem texto, nem alt-text, nem arquivo, nem commit).
> **Sem em-dash no texto visível. Sem push, sem deploy.**

---

## [CARD · Galeria de Bugs] · pt-BR

**Manchete proposta:** O flash que quatro adultos não viram

```
gus@glyfesse> abriram quatro chamados. cada um contra um bug diferente. nenhum era o
              bug. ai um playtester de 11 anos olhou pra tela e falou: tem algo dando
              zoom la atras. era isso. era exatamente isso
// quatro PhD em achismo, e quem resolveu foi o moleque que so olhou direito
```

**O que era (a camada técnica, depois da piada).**
Ao fechar o menu, a cidade dava um "flash": crescia por 1 ou 2 frames e voltava ao tamanho certo. Cosmético, rápido, quase invisível. E teimoso.

A causa não estava na cidade. Estava na costura. O jogo desenhava a cidade com um renderizador 2D e cada tela de menu com um contexto gráfico próprio, na mesma janela, destruindo um e criando o outro a cada troca. Recriar o renderizador ao voltar pro jogo obrigava o próprio SDL3 a reconfigurar a superfície da janela por baixo. Essa reconfiguração era o flash. Por isso ele só aparecia ao FECHAR o menu, nunca ao abrir.

**A resolução.** Um contexto gráfico só, criado uma vez no boot e vivo até o fim. A cidade passou a desenhar com o mesmo renderizador que a tela de batalha já usava. Menus e cidade compartilham o contexto. Sem troca, sem reconfiguração, sem flash. De brinde, morreu a "máquina de trocar renderizador" que já tinha causado outros dois bugs reais.

```
gus@glyfesse> parabens (foi o playtester quem disse. o crescimento sumiu)
```

---

## [CARD · Bug Gallery] · EN

**Proposed headline:** The flash four grown-ups couldn't see

```
gus@glyfesse> four tickets got opened. each one against a different bug. none of them
              was the bug. then an 11 year old playtester looked at the screen and said:
              theres something zooming in back there. that was it. that was exactly it
// four PhDs in guesswork, adn the one who cracked it was the kid who just looked properly
```

**What it was (the technical layer, after the joke).**
Closing the menu made the city "flash": it grew for one or two frames, then snapped back to size. Cosmetic, fast, almost invisible. And stubborn.

The cause wasn't in the city. It was in the seam. The game drew the city with a 2D renderer and each menu screen with its own graphics context, in the same window, destroying one and creating the other on every switch. Recreating the renderer on the way back forced SDL3 itself to reconfigure the window surface underneath. That reconfigure was the flash. Which is why it only showed on CLOSING the menu, never on opening.

**The fix.** One graphics context, created once at boot and alive to the end. The city now draws with the same renderer the battle screen already used. Menus and city share the context. No switch, no reconfigure, no flash. As a bonus, it killed the "renderer-swapping machine" that had already caused two other real bugs.

```
gus@glyfesse> congrats (the playtester said it. the growing was gone)
```

---
---

## [PEÇA FUNDA · Seção de Programação] · pt-BR

**Kicker:** O EIXO EXPERT · O RACIOCÍNIO, NÃO SÓ A SOLUÇÃO
**Manchete proposta:** Quatro hipóteses, quatro necrológios: a caçada ao flash do menu

*Todo mundo publica a solução. Quase ninguém publica o raciocínio. Esta é a autópsia honesta de um bug pequeno, com os becos sem saída incluídos, porque eles são a melhor parte.*

### O achado

No playthrough, um playtester de 11 anos (o Gus Dragon) descreveu o problema com uma precisão que vale citar:

> *"quando abre o menu e fecha ele de novo, volta pra tela que estava, mas dá a sensação que ela fecha e abre bem rápido e segue o jogo."*

Depois refinou, e o refinamento matou a primeira hipótese antes dela nascer:

> *"a tela atrás é rapidamente aumentada de tamanho até o tamanho que estava antes."*

E por fim, a frase que destravou tudo:

> *"a tela da cidade está atrás e tem algo dando zoom in, é muito rápido pra entender humanamente."*

"Algo por cima da cidade estática, dando zoom." Não a cidade piscando. Uma camada. Guarde essa distinção: ela é a chave, e um adulto levou quatro hipóteses pra chegar onde a criança chegou olhando.

```
gus@glyfesse> ele nao consertou o bug. ele descreveu ele direito. que e a parte dificil
// a gente chama de "repro". ele chama de "olhar"
```

### O cemitério das quatro hipóteses

A regra da casa: nenhuma hipótese morre por achismo. Cada uma foi descartada com evidência MEDIDA.

**Hipótese 1: "É uma piscada de double-buffer."**
Ação: um fix que redesenhava 2 frames após a transição (`hold_frozen_frame`). Medição: teste ao vivo. Resultado: não mudou nada. O sintoma não era uma piscada. Óbito.

**Hipótese 2: "É a escala do tamanho de tela no renderizador recriado."**
Ação: instrumentar o código pra logar o tamanho de saída nos 8 primeiros frames depois de fechar o menu. Medição: constante `1280x720`, sempre. Resultado: o crescimento não vem do tamanho de tela. Óbito.

**Hipótese 3: "A janela está sendo recriada, e o KDE anima a abertura."**
Ação: monitorar os IDs de janela do sistema durante o abrir/fechar, 170 amostras. Medição: um único window ID, sempre; a contagem nunca passou de 1. Resultado: não há janela recriada nem popup. Óbito.

**Hipótese 4: "É o compositor KWin animando."**
Ação: desligar as animações do KDE (`AnimationDurationFactor=0`, aplicado de verdade). Medição: o flash continuou igual. Resultado: não é o compositor. Óbito.

*Achado colateral, de graça:* no Wayland puro você não "suspende o compositor" como no X11. Ele É o servidor gráfico. Um atalho que parecia testar isso não testava nada. Anote pro seu próximo bug de render no Wayland.

```
gus@glyfesse> quatro caixoes. e o legal e que cada um foi enterrado com numero, nao com
              opiniao
// consertar no escuro nao e consertar. e trocar de bug
```

### A virada

Duas pistas, juntas, fecharam o caso.

A primeira é a **assimetria**, e foi o playtester quem a entregou: o flash acontece só ao FECHAR o menu (voltar pra cidade) e no boot. Nunca ao abrir. Um bug que só existe numa direção está te dizendo onde procurar.

A segunda foi **ler o fonte**. O SDL3 vem vendorizado no projeto, então dá pra abrir. Em `src/render/opengl/SDL_render_gl.c`, a função que cria o renderizador "opengl" pede um contexto gráfico antigo (2.1). Se os atributos gráficos correntes forem outros (e o menu tinha acabado de pedir 3.3), o backend chama `SDL_ReconfigureWindow`, que recria a superfície nativa da janela.

Aí a assimetria se explica sozinha. Abrir o menu cria um contexto gráfico por cima de uma janela que já era gráfica: não reconfigura nada. Fechar o menu recria o renderizador com os atributos "errados" ainda setados: reconfigura a janela por baixo, e o compositor mostra 1 ou 2 frames de buffer reescalado. O flash.

```
gus@glyfesse> a resposta estava no fonte de uma biblioteca que ninguem le. a gente leu
// "vendorizado" quer dizer: a fonte veio junto. entao abre a fonte
```

### A causa raiz

Alternar entre um renderizador 2D e um contexto gráfico próprio na mesma janela, destruindo e recriando a cada transição, é frágil. Neste caso específico, recriar o renderizador dispara uma reconfiguração de janela do SDL. O flash não era um efeito. Era o custo de uma troca que não precisava existir.

### A decisão (ADR-018)

O plano trouxe três opções, e a escolhida foi a única que remove a causa em vez de mascará-la.

- **Opção A** (os menus reusam o contexto interno do renderizador): rejeitada. Empilhava três incertezas de driver (contexto antigo sem stencil, cache de estado gráfico obsoleto, portabilidade no Windows) e era a única que provavelmente exigiria mexer na biblioteca de efeitos.
- **Opção B** (menus por outro backend, abandonando a lib de efeitos): rejeitada. Custava a capacidade visual do jogo pra não ganhar nada.
- **Opção C** (unificar tudo num contexto gráfico só): escolhida. Um único contexto criado no boot e vivo até o shutdown. A cidade migra pro renderizador que a batalha já usava e já provava em produção. Menus e cidade compõem no mesmo contexto. Zero criação/destruição de contexto em qualquer transição. Nenhum pedido à biblioteca de efeitos: o contrato dela ("anexe a um contexto que o host já possui") era exatamente o que a Opção C precisava.

O registro está na ADR-018 do jogo, com o diagnóstico, as três opções, os trade-offs e a evidência. É pública e você pode ler o raciocínio inteiro lá.

### A disciplina (a parte que ninguém filma)

O líder não mandou consertar. Mandou consertar sem quebrar o que funciona:

> *"o main já funciona 99% devido a um pequeno glitch, não quebre por algo incerto de funcionar."*

Então o conserto começou num branch isolado, com um **POC como portão**. Uma prova de conceito headless demonstrou a viabilidade ANTES do refactor. Se o POC reprovasse, parava ali, com o main intacto. Só depois: o refactor em etapas com verificação a cada passo, QA independente de quem implementou, o playthrough ao vivo do líder, o CI no Windows, e o merge. Um POC que é portão não é burocracia. É a diferença entre arriscar uma hora e arriscar a build inteira.

### O brinde

Apagar a troca de contexto não fechou só o flash. Apagou a "máquina de trocar renderizador" por completo. Essa máquina já tinha causado outros dois bugs reais: um crash no carregamento de save e um input preso que fazia o herói andar sozinho. Três bugs, uma causa estrutural. O melhor conserto não é o que mata o sintoma. É o que apaga a categoria.

```
gus@glyfesse> o flash era o sintoma barulhento. os outros dois eram silenciosos. mesma
              raiz. arrancou a raiz, foram os tres
// "O bug nao ta no bicho. Ta no script de quem escreveu o bicho."
```

### Quer o caso inteiro?

Isto foi o resumo. A ADR-018 e o plano técnico estão públicos no repo do jogo, com o fonte citado linha a linha. Se você quer a versão longa (a leitura do SDL3, os logs de cada hipótese, o POC), o convite está na seção de contato. Escreva. A gente responde.

---

## [DEEP PIECE · Programming Section] · EN

**Kicker:** THE EXPERT AXIS · THE REASONING, NOT JUST THE FIX
**Proposed headline:** Four hypotheses, four obituaries: hunting the menu flash

*Everyone publishes the fix. Almost nobody publishes the reasoning. This is the honest autopsy of a small bug, dead ends included, because the dead ends are the best part.*

### The report

During the playthrough, an 11 year old playtester (Gus Dragon) described the problem with a precision worth quoting:

> *"when you open the menu and close it again, it goes back to the screen you were on, but it feels like it closes and opens really fast and the game keeps going."*

Then he refined it, and the refinement killed the first hypothesis before it was born:

> *"the screen behind gets quickly grown back up to the size it was before."*

And finally, the line that cracked it open:

> *"the city screen is behind and something is zooming in on it, its too fast to understand with human eyes."*

"Something on top of the static city, zooming." Not the city blinking. A layer. Hold on to that distinction: it's the key, and a grown-up needed four hypotheses to reach where the kid arrived just by looking.

```
gus@glyfesse> he didnt fix the bug. he described it right. which is the hard part
// we call it a "repro". he calls it "looking"
```

### The graveyard of four hypotheses

House rule: no hypothesis dies by guesswork. Each one was ruled out with MEASURED evidence.

**Hypothesis 1: "It's a double-buffer blink."**
Action: a fix that redrew 2 frames after the transition (`hold_frozen_frame`). Measurement: live test. Result: nothing changed. The symptom was not a blink. Deceased.

**Hypothesis 2: "It's the output size scaling on the recreated renderer."**
Action: instrument the code to log the output size for the first 8 frames after closing the menu. Measurement: constant `1280x720`, always. Result: the growth doesn't come from screen size. Deceased.

**Hypothesis 3: "The window is being recreated, and KDE animates the open."**
Action: monitor the system window IDs during open/close, 170 samples. Measurement: a single window ID, always; the count never went above 1. Result: no window recreation, no popup. Deceased.

**Hypothesis 4: "It's the KWin compositor animating."**
Action: disable KDE animations (`AnimationDurationFactor=0`, actually applied). Measurement: the flash stayed identical. Result: not the compositor. Deceased.

*Free side finding:* on pure Wayland you don't "suspend the compositor" like on X11. It IS the display server. A shortcut that looked like it tested this was testing nothing. Note it for your next Wayland render bug.

```
gus@glyfesse> four coffins. adn the good part is each one was buried with a number, not
              an opinion
// fixing in the dark isnt fixing. its swapping bugs
```

### The turn

Two clues, together, closed the case.

The first is the **asymmetry**, and the playtester handed it over: the flash happens only on CLOSING the menu (back to the city) and at boot. Never on opening. A bug that only exists in one direction is telling you where to look.

The second was **reading the source**. SDL3 ships vendored in the project, so you can open it. In `src/render/opengl/SDL_render_gl.c`, the function that creates the "opengl" renderer asks for an old graphics context (2.1). If the current graphics attributes are something else (and the menu had just asked for 3.3), the backend calls `SDL_ReconfigureWindow`, which recreates the native window surface.

Now the asymmetry explains itself. Opening the menu creates a graphics context on top of a window that was already graphics: it reconfigures nothing. Closing the menu recreates the renderer with the "wrong" attributes still set: it reconfigures the window underneath, and the compositor shows 1 or 2 frames of rescaled buffer. The flash.

```
gus@glyfesse> the answer was in the source of a library nobody reads. we read it
// "vendored" means: the source came along. so open the source
```

### The root cause

Alternating between a 2D renderer and its own graphics context in the same window, destroying and recreating on every transition, is fragile. In this specific case, recreating the renderer triggers an SDL window reconfigure. The flash wasn't an effect. It was the cost of a switch that didn't need to exist.

### The decision (ADR-018)

The plan brought three options, and the chosen one was the only one that removes the cause instead of masking it.

- **Option A** (menus reuse the renderer's internal context): rejected. It stacked three driver uncertainties (old context with no stencil, stale graphics state cache, Windows portability) and was the only one likely to require touching the effects library.
- **Option B** (menus via another backend, dropping the effects lib): rejected. It cost the game's visual capability to gain nothing.
- **Option C** (unify everything under one graphics context): chosen. A single context created at boot and alive until shutdown. The city migrates to the renderer battle already used and already proved in production. Menus and city compose in the same context. Zero context creation/destruction on any transition. No request to the effects library: its contract ("attach to a context the host already owns") was exactly what Option C needed.

The record lives in the game's ADR-018, with the diagnosis, the three options, the trade-offs and the evidence. It's public, and you can read the whole reasoning there.

### The discipline (the part nobody films)

The lead didn't say "fix it." He said fix it without breaking what works:

> *"main already works 99% because of a small glitch, don't break it for something uncertain to work."*

So the fix started on an isolated branch, with a **POC as a gate**. A headless proof of concept demonstrated viability BEFORE the refactor. If the POC failed, it stopped there, main intact. Only then: the refactor in stages with verification at each step, QA independent from whoever implemented, the lead's live playthrough, CI on Windows, and the merge. A POC that gates isn't bureaucracy. It's the difference between risking an hour and risking the whole build.

### The bonus

Removing the context switch didn't just close the flash. It erased the "renderer-swapping machine" entirely. That machine had already caused two other real bugs: a crash on save load, and a stuck input that made the hero walk on his own. Three bugs, one structural cause. The best fix isn't the one that kills the symptom. It's the one that erases the category.

```
gus@glyfesse> the flash was the loud symptom. the other two were quiet. same root. pull
              the root, all three go
// "The bug isnt in the creature. Its in the script of whoever wrote the creature."
```

### Want the whole case?

That was the summary. ADR-018 and the technical plan are public in the game repo, with the source cited line by line. If you want the long version (the SDL3 read, the logs for every hypothesis, the POC), the invitation is in the contact section. Write us. We answer.

---
---

## Figuras (os 5 frames): legendas propostas

> ⚠️ **NÃO copiar os frames pro repo do site.** Estão em `gusworld_ia_autocomm/assets/flash-frames/`. Cada frame de captura de tela precisa de verificação anti-vazamento (abas, terminal, custos, janelas de fundo) ANTES de virar asset tracked. O líder verifica e coloca os arquivos. Aqui vão só as legendas propostas.

| # | Arquivo (origem) | Legenda proposta (pt-BR) | Legenda proposta (EN) |
|---|---|---|---|
| 1 | `01-cidade-viva.png` | A cidade ao vivo, o enquadramento de referência. | The city live, the reference framing. |
| 2 | `02-menu-fundo-escurecido.png` | O menu por cima: o fundo só escurece. Posição e escala do mundo idênticas à figura 1. Não era zoom. | The menu on top: the background only darkens. World position and scale identical to figure 1. It wasn't a zoom. |
| 3 | `03-transicao-duas-barras-titulo.png` | O frame que confundiu tudo: duas barras de título sobrepostas no meio da transição. Pareciam duas janelas. Não eram. | The frame that fooled everyone: two title bars overlapping mid-transition. They looked like two windows. They weren't. |
| 4 | `04-diff-flash-morto-so-o-gus.png` | O diff de pixel depois do fix: o vermelho aparece só no sprite do herói (respiração idle). O resto é cinza uniforme. A cena não escala mais. | The pixel diff after the fix: red shows only on the hero's sprite (idle breathing). The rest is uniform gray. The scene no longer scales. |
| 5 | `05-cidade-em-gl-pos-fix.png` | A cidade desenhada pelo novo renderizador, byte-idêntica à referência. | The city drawn by the new renderer, byte-identical to the reference. |

⚠️ **Atenção especial à figura 1 e à 3:** aparece o NPC **Bertoldo** (figura 1) e as "barras de título GusWorld" (figura 3). Ver flags de spoiler abaixo.

---

## ⚠️ Checar ANTES de publicar (eu sinalizo, você decide)

Nada aqui é decisão minha. São os pontos que preciso que o líder resolva antes de qualquer publicação.

### Spoiler / lore (`SPOILER-POLICY`, postura conservadora, OK peça a peça)
1. **NPC Bertoldo** aparece na figura 1 (`01-cidade-viva.png`) e é citado na fonte bruta. ⚠️ **checar spoiler:** o nome/aparência do Bertoldo já pode ser público? Se não, recortar o frame ou não usar a figura 1.
2. **Nomes de tela/menu** citados na peça: pausa, Salvar, Carregar, Configurações, título, e a menção implícita à batalha/arena. ⚠️ **checar spoiler:** a existência dessas telas é publicável? (Provavelmente sim, é UI comum, mas confirmar.)
3. **A feature "Menu Inicial"** e os outros dois bugs de brinde (crash no LOAD de save, herói andando sozinho) tocam mecânica interna. ⚠️ **checar spoiler:** citar como "dois outros bugs reais" (abstrato, como está) é seguro? Evitei detalhar a mecânica de propósito.
4. **As "barras de título GusWorld"** (figura 3) revelam o nome do jogo na barra da janela. Provavelmente inócuo (o nome é público), mas sinalizo por ser texto/imagem indexável.

### Frames (regra `feedback_frames_vazam_tela_pessoal`)
5. **NÃO copiei nenhum frame** pro repo do site. Todos os 5 precisam da sua verificação anti-vazamento (abas do navegador, terminal, custos, Loja Maçônica, janelas de fundo, quarto) ANTES de virarem asset tracked. Gitignore do vídeo não protege o frame extraído.

### Nome real (regra global inviolável)
6. Usei **"Gus Dragon" / "o playtester de 11 anos"** em todo o texto, alt-text futuro e nomes propostos. **Zero** ocorrência do nome real. Confirme na revisão.

### Colisão de nome (pergunta editorial, não preenchi)
7. **A voz da revista é o Gus (personagem, 11 anos) e o playtester também é "Gus Dragon" (11 anos).** Na peça, o narrador Gus fala de "um playtester de 11 anos" que é, no fundo, homônimo dele. Isso pode confundir o leitor (o Gus está reportando o próprio jogo?) ou pode ser exatamente a graça (os três meninos de 11). **Não resolvi sozinho.** Decisão sua: mantenho a ambiguidade, ou dou um distanciamento explícito (ex.: o narrador se refere ao playtester em terceira pessoa clara)?

### Voz / estilo (conferir no render, não só no markdown)
8. As falas `gus@glyfesse>` levam **pouquíssimos** erros de digitação (dose de digitador experiente): pt `adn`? não, usei `adn` só no EN; no pt deixei limpo exceto onde a fala é longa. Revisar a dose no render. **Nunca erro de gramática** (a régua-mãe). Se achar seco/limpo demais ou erros demais, ajusto.
9. As citações técnicas do herói ("O bug não tá no bicho...") são **canônicas** (`a_voz_do_site`). Mantidas verbatim.
10. **Zero em-dash** no texto visível. **Zero profanidade.** Confirme na leitura.

### Escopo (o que deixei DE FORA, de propósito)
11. O 4º material do bus (o **bug-dominó** do parser de i18n, "Cancelar ---", auditoria-dominó) **não entrou** nesta matéria. O brief pediu o bug do flash. É uma matéria própria excelente (ou uma "parte 2: o bug que o bug revelou"). **Decisão sua:** emendo aqui como continuação, trato como matéria separada, ou deixo pra depois?

### Fiação (o que ainda falta, downstream)
12. Isto é rascunho **editorial em markdown**. A fiação nas seções da edição (PHP/HTML, qual vira Card na Galeria, qual vira Peça funda na Seção de Programação, o drip por edição) vem depois, com você.
