# Briefs de produção da Edição #7 (item de board: ED7-PAUTA)

> Artefato de saída do **E2** do `PIPELINE-EDICAO.md` (§3), conforme `docs/editorial/PAUTA-EDICAO-7.md`, revisão 6
> (**GATE-PAUTA FECHADO em 03/11/2026**, decisões D1 a D20, verbatim na §16 da pauta). Escrito em 03/11/2026 por
> Capitolino (CPO). **Nada aqui é copy final.** Todo trecho marcado PROPOSTA vai ao gate do líder; o documento propõe,
> o líder decide (L-03 do site).
>
> **Fonte única de verdade sobre o conteúdo:**
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/editorial/PAUTA-EDICAO-7.md`.
> Este documento fatia a pauta por peça e aponta a fonte primária em caminho absoluto (L-18 global: quem escreve abre
> o arquivo, não lê o resumo de quem brifa). Onde este brief e a pauta divergirem, **a pauta vence, menos nos achados
> da §2**, que são correções por leitura da fonte e estão marcadas como tal.
>
> **Quem lê isto:** agentes que podem rodar em modelo mais fraco que o do C-level. Por isso toda ordem de serviço traz
> os oito itens da L-11 global (passos numerados; comando com caminho absoluto; trecho exato ou aceite verificável;
> saída esperada e parada; arquivos permitidos e proibidos; armadilhas medidas; leis; formato do relatório). **O main
> cola a §3.2 inteira junto de cada brief que despachar.** Um brief sem a §3.2 está incompleto.
>
> **Limite de método, dito de saída:** esta rodada rodou **sem Bash**. Nada foi executado: nem `git`, nem `php`, nem
> `node`, nem Firefox. As datas vêm dos nomes de arquivo e do campo `data:` do bus (clone local, pull não executado) e
> das conferências que o main fez no git e me passou (§2, A3). Toda linha citada (`arquivo:linha`) foi aberta por mim
> nesta sessão, salvo onde está dito o contrário.
>
> **Raiz do projeto:** `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld` (abaixo, `SITE/`).
> **Raiz do bus:** `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm` (abaixo, `BUS/`).
> **Colagem do líder (fora do repo, nunca copiar para o repo inteira):**
> `/var/tmp/builds/claude-1000/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/31078da5-c615-42c5-be1d-37070cf2e213/scratchpad/ed7-brunus/colagem.txt`
> (abaixo, `COLAGEM`).

---

## 0. O que já está decidido (resumo; o texto exato está na pauta §16)

| Tema | Decisão do líder | Onde pesa |
|---|---|---|
| Janela | 21/08 a 03/09/2026 (D6); o achado de 05/09 abre a #8 | Todas as peças (T1) |
| Reportagem | A refundação inteira, consumindo `MATERIA-REFUNDACAO-DOS-REPOS` (D1); a frase do "wrapping" palavra por palavra, com data (D7); caixa do determinismo dentro dela (D4) | §4.1, §4.2 |
| Lente | L-A, "recomeço com regra" (D2) | Todas |
| Título | "Apagar Tudo" / "Delete Everything" (D3) | §4.13 |
| Cemitério | Duas lápides: os repositórios antigos e a ordem que o líder nunca deu (D13) | §4.6 |
| Programação | O portão de 21/08 e, como segunda metade, a auditoria de 02 e 03/09 (D18) | §4.3 |
| Cartas | Pedido do Gus Dragon palavra por palavra e crédito nos dois papéis juntos (D5) | §4.5 |
| Entrevista | Respostas como estão (spoiler 3, 9, 13 e 14; erros de digitação); resposta 18 em três falas seguidas (D8); tradução para o inglês imitando os erros de digitação (D9) | §4.11 |
| HQ | Não há tirinha; a revista cria (D11): H1, a tela de fósforo verde que diz "tudo certo" sem olhar (D19) | §4.9 |
| Brinquedo | Um (D14): B1, o portão de bolso (D20) | §4.10 |
| Capa | Terminal com um registro só (D12) | §4.13 |
| Terminal em 390 pontos | Consertar da #7 em diante; #5 e #6 não mudam (D15) | §6, O3 e O11 |
| Portão de travessão | Consertar antes dos commits de conteúdo (D16), só no site (PQ1, §7) | §6, O4 |
| Moldura `ENTREVISTA-PENDENTE` da #6 | Fica como está (D17) | Nenhuma tarefa |
| Nome real em `docs/design/conceito.md:41` | Fica como está (decisão do líder na rodada 5) | Nenhuma tarefa; o nome não se copia para lugar nenhum |

---

## 1. Travas transversais (valem em TODA peça onde a condição bater; usar o texto abaixo, não de cabeça)

### T1. Ordem do calendário

A #7 narra **de 21/08 a 03/09/2026**. Nada posterior a 03/09 aparece narrado (o achado do Gus Dragon de 05/09, o
GlintFx v0.2.0.0 de 05/09 em diante, a primeira janela de outubro). **E nada da #6 se reconta:** o motivo de quebrar
tudo, os três atalhos barrados, "o caminho mais fácil", a issue pública de 15/08, as 687 e 398 trocas e o 31 e o 5 já
estão publicados em `SITE/src/content/edicao-6/pt/sec-04.php:8-24`. Pode **lembrar** em uma frase; nunca narrar de
novo.

### T2. Quem fala é o editor, e a revista não ri de ninguém

Frase de sessão de IA entra **como citação, com fonte e data**, nunca como voz da revista. A revista não ri da sessão
e não faz do líder vítima (L-09: declarar é a defesa). **Muda em relação à #6:** a trava da #6 proibia as palavras
"mentiu", "enganou" e "wrapping"; na #7 a Reportagem **cita** a frase do líder que as contém (D7). **Fora da citação
dele, as palavras continuam proibidas na voz da revista**: quem acusa é ele, com as palavras dele e a data; o editor
conta os fatos.

### T3. Não amaciar a refundação (vale para a Reportagem e para a lápide dos repositórios)

Texto do registro da reserva, `SITE/TODO.md:193`: *"A matéria não é sobre perda de histórico: é sobre uma ferramenta
que mentiu para quem a usava, por tempo suficiente para o único conserto possível ser apagar tudo. Escrever a versão
amena disso seria repetir o erro dentro da reportagem que o denuncia."* E: *"O fato de arquivo (dois repos zerados no
mesmo dia, só um com passado guardado) é a CONSEQUÊNCIA, não a matéria."*

### T4. Crédito do Gus Dragon

Sempre nos dois papéis, seco: *"Gus Dragon, playtester, Revisor Adversarial de Design"* (en: *"Gus Dragon,
playtester, Adversarial Design Reviewer"*). Sem adjetivo de ternura, sem "para a idade", sem exclamação, sem explicar
o título, sem dizer quem o deu (L-24 do site, adendo de 04/09; memória `reference_titulo_gus_dragon`). **Nome de
batismo nunca. Handle de GitHub dele (aparece no bus) nunca.** Achado dele é matéria própria, nunca linha dentro de
peça alheia (adendo de 04/09 da L-24).

### T5. Formato de voz

Memória: `/home/petrus/.claude/projects/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/memory/voz_prompt_shell.md`.
Dialeto do conversor: `SITE/docs/content/DIALETO.md` (ler antes de escrever qualquer `.md` de `docs/content/`).

- Prompt: `[personagem]@glyfesse:[seção]$ [fala]`; caminho da seção em ASCII sem acento, não se traduz.
- Pensamento: até 72 caracteres sem a marca, `// ...`; acima, `/* ... */` (R4, `SITE/scripts/conversor/travas.php:6, 72-76`).
- Fala e pensamento sem ponto final (R1 e R2, `travas.php:65-69`), salvo a parte `verbatim` das respostas do Brunus.
- Erro de digitação do Gus: eventual e só da mão (letra dobrada, acento comido, tecla vizinha), nunca de gramática
  (memória `canon_gus_le_o_bus_formula`). `povvo` é canônico.

### T6. Zero travessão, zero emoji, zero rótulo clínico

Nunca U+2014 nem U+2013 (nem `&mdash;`, `&ndash;`) em nada, nos dois idiomas (L-32 global; R3 do conversor,
`travas.php:7`). Zero emoji (L-31 global). Zero rótulo clínico para o Gus ou qualquer personagem (L-08 do site).

### T7. Toda fala e pensamento de personagem é rascunho e vai ao líder

Toda fala e todo `//` do Gus, e toda fala do root, entram sinalizados para o GATE-CONTEUDO como **"submeter ao
líder"** (L-08 do site). Nada é aprovado por default. **Do lado do Brunus, em português, nenhum agente escreve uma
palavra:** as respostas são do homenageado.

### T8. L-25: o mundo é real para quem está nele

Nenhum personagem sabe que é feito de pixel. O técnico mora na Reportagem, na Programação, no Detonado, na Galeria e
no Cemitério (voz meta do editor). Editorial, Entrevista, Cartas (a fala do Gus) e bus falam **de dentro**.

### T9. Nomes reais, handles e repositório privado

Nome de batismo de menor nunca (L-01 do site). Nenhum nome real dos homenageados (o do Brunus, o do Yakov) em texto,
`alt`, nome de arquivo ou commit. Nenhum handle de GitHub tirado do bus. **O repositório com o histórico anterior do
jogo é privado, e a Reportagem diz o nome dele e a contagem de registros** (PQ2, decisão do líder, §7). **A contagem
é MEDIDA no ato por comando (O9, passo 3), nunca copiada de memória nem de documento**; o número que a memória
`reference_gusworld_legacy` traz não se usa.

### T10. Fato separado de inferência (L-18 global)

Todo número e toda data citados vêm de `arquivo:linha` que o escritor abriu. Onde este brief marca **[INF]**, o
escritor carrega os fatos e não a conclusão.

### T11. As leis nasceram com o recomeço, não com a auditoria

Datas pelo git, conferidas pelo main (§2, A3): de 21/08 a 29/08, antes de 02/09. **Nenhuma peça diz que as leis
nasceram na auditoria.** A lei de paridade é **nova** em 02/09 (`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GlintFx/GODS_LAWS.md:100`),
escrita num arquivo que existia desde 21/08. **Nenhuma peça diz que foi "a primeira vez"** que uma lei reabriu
trabalho: a fonte não sustenta (pauta, risco 20).

---

## 2. Achados do E2 que a pauta não tinha (leitura da fonte, não resumo)

| # | Achado | Fonte (arquivo:linha) | Consequência |
|---|---|---|---|
| A1 | **O portão de travessão que varreu zero não é do site.** É o hook global de pre-commit da máquina. Ele só varre o que `is_user_facing()` aceita, e essa função mora fora do projeto | `/home/petrus/.claude/skills/tab_pendencias/tools/hooks/no_mdash_staged.py:11-13, 213, 249-256`; `/home/petrus/.claude/hooks/no_mdash.py:190-235` | Consertar ali muda o portão de **todos** os projetos da máquina, e é arquivo canônico externo ao projeto (L-32 global). **PQ1 decidida: só no site; nada muda nos hooks globais** (O4). O conversor já barra travessão nas seções que ele gera (`SITE/scripts/conversor/travas.php:7, 80-88`); o buraco é o que ele não gera (partials feitos à mão e as fontes `.md`) |
| A2 | **O molde da edição não tem gancho por número.** | `SITE/src/templates/edicao.php:58` (`<article class="edicao">`) | O conserto do terminal (D15) precisa de classe modificadora usada só nos partials da #7 em diante (recomendado) ou de classe nova no molde, que toca todas as edições |
| A3 | **Datas conferidas pelo main no git (03/11/2026), hora local GMT-3**, primeiro commit que adiciona cada `GODS_LAWS.md`: GlintFx `ae3943c7` 21/08 07:05:48; GusWorld `81a8ef1` 21/08 22:13:24 (UTC 22/08 01:13:24; é o primeiro commit do repositório refundado); mapeditor `b205d01` 22/08 00:13:57; site `b4e07a4` 24/08 23:41:13; global `2230a1f` 29/08 23:25:20 | Relato do main a mim, 03/11/2026 (não executei) | Tabela da Reportagem (§4.1). Usar 21/08 para o `81a8ef1`, nunca 22/08 |
| A4 | **A meia-verdade foi dita ao Gus Dragon na véspera do achado**, isto é, em 21/08, o dia da refundação: *"reagindo a algo que esta sessão tinha dito a ele na véspera"* | `BUS/archive/20260822-0855-gusworld-marco-gus-tensao-determinismo-speedrun.md:14, 20` | **[INF]** A caixa do determinismo e a Reportagem ficam no mesmo dia. A caixa é crédito ao achado e não prova da acusação (pauta, risco 17) |
| A5 | **A ideia da carta foi aberta em 16/08** (antes da janela) e aprovada em 21/08 | `BUS/archive/20260822-0610-gusworld-ideias-do-gus-sao-marco-historico.md:18` | A data de 16/08 não entra (PQ6, §7) |
| A6 | **A mensagem de 22/08 06:10 carrega o handle de GitHub do Gus Dragon** | mesmo arquivo, linha 18 | T9: o handle nunca é copiado |
| A7 | **As duas ideias da issue 5 (21/08) já foram usadas pela #4** | `SITE/docs/editorial/PAUTA-EDICAO-4.md:25` | Não reaparecem como ideia nova. A issue 5 sem resposta pode aparecer no bus como fato |
| A8 | **A resposta 6 da colagem não tem espaço no fim** (busca por ponto seguido de espaço na linha 36 não achou nada) | `COLAGEM:36` | Nada a normalizar; o precedente do Yakov só tirou espaço de fim de linha (`SITE/docs/content/edicao-6-entrevista-yakov-respostas.md:134`) |
| A9 | **Componente de terminal compartilhado** | `SITE/public_html/assets/css/edicao.css:1717-1748` (moldura, tela, scanline em `:1739-1744`, prompt `.pr` em `:1746`), `:1759-1776` (`crt-nano`), `:1846-1856` (`hq-art`), `:2110` (desculpa da §17) | O conserto da D15 não pode alterar a regra base; o QA prova com a comparação de O3 |
| A10 | **Piso da suíte de testes** | `SITE/scripts/testes.sh:20-22` (`PISO_ARQUIVOS=30`) | Teste novo sobe o piso no mesmo commit, para o número real medido |
| A11 | **Molde dos brinquedos:** núcleo puro em `public_html/assets/js/<nome>-core.js` (UMD leve, nunca ESM, porque o Firefox abre por `file://`), camada DOM em `<nome>.js`, teste em `tests/<nome>-core.test.js` com `node:test` | `SITE/public_html/assets/js/cupom-core.js:1-25`; `SITE/tests/cupom-core.test.js:1-15` | O brinquedo (§4.10) segue o mesmo molde |

---

## 3. Mapa de produção e a ordem de serviço comum

### 3.1 Quem faz o quê, em que ordem

| Seção | Peça | Quem escreve ou faz | Revisão | Arquivo de saída |
|---|---|---|---|---|
| 4 | Reportagem de capa (a refundação) | `narrative-writer` | `revisor-textual`; parecer do `compliance-legal` | `SITE/docs/content/edicao-7-reportagem.md` |
| 4 | Caixa do determinismo (Gus Dragon) | `technical-writer` | `revisor-textual`; `compliance-legal` (spoiler) | `SITE/docs/content/edicao-7-caixa-determinismo.md` |
| 17 | Programação (portão e auditoria) | `technical-writer` | `revisor-textual` | `SITE/docs/content/edicao-7-programacao.md` |
| 6 | Galeria de Bugs (Gus Dragon) | `technical-writer` | `revisor-textual`; `compliance-legal` (spoiler) | `SITE/docs/content/edicao-7-galeria-bugs.md` |
| 9 | Cartas (Gus Dragon) | `ux-writer` | `revisor-textual`; `compliance-legal` (spoiler) | `SITE/docs/content/edicao-7-cartas.md` |
| 7 | Cemitério (duas lápides) | `technical-writer` | `revisor-textual` | `SITE/docs/content/edicao-7-cemiterio.md` |
| 18 | O Gus lê o bus | `technical-writer` | `revisor-textual` | `SITE/docs/content/edicao-7-gus-le-o-bus.md` |
| 3 | Editorial | `narrative-writer` | `revisor-textual` | `SITE/docs/content/edicao-7-editorial.md` |
| 11 | HQ (roteiro) | `narrative-designer` | o líder (L-08) | `SITE/docs/content/edicao-7-hq-roteiro.md` |
| 11 | HQ (arte) | `visual-design-director` | `qa-engineer` | partial `SITE/src/content/edicao-7/{pt,en}/sec-11.php` e CSS escopado |
| 17 | Brinquedo (portão de bolso) | `frontend-engineer` | `qa-engineer`; o main executa os testes | `SITE/public_html/assets/js/portao-bolso-core.js`, `portao-bolso.js`, `SITE/tests/portao-bolso-core.test.js` |
| 16 | Entrevista (tradução para o inglês) | `ux-writer` | o líder (tradução e lista dos erros) | seção `## EN` de `SITE/docs/content/edicao-7-entrevista-brunus-respostas.md` |
| 5, 8, 9 (Errata), 10, 12, 13, 14, 19 | Nota, vazios, Expediente, nota do editor, dek | `ux-writer` | `revisor-textual`; `compliance-legal` (declaração de IA) | `SITE/docs/content/edicao-7-copies-curtas.md` |
| 1, 2 | Capa (terminal de um registro), índice, card social | `visual-design-director` (arte), `frontend-engineer` (montagem), `backend-engineer` (ficha, uptime) | `qa-engineer` | `SITE/public_html/assets/edicao-7/` |

**Ordem:** (1) onda 0 inteira (§6); (2) **Reportagem sozinha primeiro**, porque todas as divisórias cortam contra ela;
(3) com a Reportagem v1 como insumo (caminho do arquivo, nunca resumo), em paralelo, no máximo 4 agentes vivos:
caixa, Programação, Galeria, Cemitério; (4) Cartas, bus, HQ (roteiro), tradução; (5) Editorial por último; (6) copies
curtas; (7) arte, brinquedo e montagem (onda 4 da pauta, render serial).

### 3.2 A ordem de serviço comum (o main cola esta seção inteira em todo despacho)

**Item 4 da L-11, regra de parada:** cada passo diz a saída esperada. **Se a saída não vier, ou uma ação for negada,
PARE e relate o que viu, com o texto exato do erro. Não improvise, não contorne, não tente de outro jeito.**

**Item 5, arquivos e ações proibidos para TODO agente desta edição:**

- Escrever em qualquer coisa sob `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld/`,
  `.../Projects/GlintFx/` ou `.../Projects/gusworld_mapeditor/` (L-00 do site: leitura livre, escrita nunca).
- Escrever em `/home/petrus/.claude/` (configuração global da máquina). Sem exceção nesta edição (PQ1: só no site).
- Tocar `SITE/src/content/edicao-1/` a `SITE/src/content/edicao-6/`, `SITE/public_html/assets/edicao-1/` a `.../edicao-6/`
  e as fontes `SITE/docs/content/edicao-1-*` a `edicao-6-*`, salvo o `git mv` da tarefa O5.
- Tocar `SITE/data/edicoes.php` antes da onda de montagem (a ficha da #7 é fixture viva, `data/edicoes.php:301-331`).
- Fazer `git commit`, `git push` ou `scripts/deploy.sh`. **Quem commita é o main.** O deploy é do líder.
- Copiar a `COLAGEM` inteira para o repositório. Copiar nome real, handle de GitHub, segredo.
- Escrever fala ou pensamento de personagem fora do que o brief manda; escrever qualquer palavra do Brunus em pt.
- Instalar, remover ou atualizar pacote (L-22 do site).
- Rodar a suíte completa (`scripts/testes.sh`) em paralelo com outro trabalho pesado: avise o main e espere a vez
  (L-11 global, item 2).

**Item 6, armadilhas já medidas neste projeto (forma certa ao lado):**

| Armadilha | Forma certa |
|---|---|
| `cmd \| tail` devolve o status do `tail` | `cmd > /var/tmp/ed7-log.txt 2>&1; echo $?` e depois ler o log |
| `grep -c` que dá zero sai com status 1 e quebra a cadeia `&&` | fechar com `\|\| true` e testar o **valor** |
| O `grep` interativo desta máquina é outro programa | usar `/usr/bin/grep` por caminho absoluto |
| Firefox headless sem `--new-instance --profile` sai 0 e não grava nada; `--screenshot` com caminho relativo também | sempre `--new-instance --profile <pasta absoluta>` e `--screenshot <caminho absoluto>.png` (L-12 do site) |
| `git add` com um caminho errado aborta tudo e o commit seguinte passa vazio | `git diff --cached --stat` antes e `git show --stat` depois (L-23 do site); só o main commita |
| Edição por script aborta no meio e não avisa | depois de editar, `grep` de confirmação do **texto novo** |
| Fonte pixel transforma N maiúsculo em H abaixo de 15px | texto pixel com N maiúsculo só a partir de 15px |
| Print não mostra rolagem horizontal | medir `scrollWidth` contra `clientWidth` em 390 pontos |
| A colagem traz a marca antiga dos pensamentos nas perguntas 7, 9, 14 e 15 | perguntas vêm **só** do arquivo aprovado; da colagem saem só as respostas |
| A API do GitHub devolve UTC | converter para GMT-3 antes de escrever data |
| Partial gerado não se edita à mão | corrigir o `.md` e gerar de novo (`tests/conversor-deriva.test.php` reprova) |

**Item 7, leis que se aplicam a toda tarefa desta edição** (texto do índice de cada arquivo; corpo completo nos
caminhos):

Do site, `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/GODS_LAWS.md`:
- **L-00:** *"`Projects/GusWorld/` é READ-ONLY. Ler sempre, escrever nunca"*.
- **L-01:** *"Nome de batismo de menor, segredo e dado de terceiro NUNCA. É sobre versionar, não sobre ser público"*.
- **L-05:** *"Main só orquestra. Implementer, reviewer e orquestrador são agentes DIFERENTES"*.
- **L-08:** *"O canon AHSD é lei; submeter SEMPRE ao líder; zero rótulo clínico"*.
- **L-09:** *"Spoiler e uso de IA: declarar é a defesa. Intenção e credencial não defendem"*.
- **L-12:** *"Firefox (Gecko), nunca Chrome (Blink). Produção, não só local"*.
- **L-13:** *"Lógica pura extraída e coberta por teste, TDD. Print não prova lógica"*.
- **L-17:** *"Proibido monolito. Uma razão de mudar por unidade"*.
- **L-23:** *"A prova é a inspeção do objeto, não a saída do seu comando"*.
- **L-24:** *"Pedido dele é PRIORIDADE e é SEMPRE respondido"*; adendo de 04/09: *"Achados do gus sempre são especiais."*
- **L-25:** *"Para ele, GusWorld é REAL. Ele não sabe que é feito de pixel. O técnico vai nas seções técnicas"*.

Globais, `/home/petrus/.claude/GODS_LAWS.md`: **L-18** (separar FATO, com arquivo:linha, de INFERÊNCIA); **L-31**
(emoji só com pedido explícito); **L-32** (nunca em-dash nem en-dash em texto user-facing; não modificar arquivo
canônico externo ao projeto sem copiar antes); **L-35** (teste primeiro, visto falhando, depois o código mínimo);
**L-36** (portão só conta depois de provado vermelho; varredura vazia é sinal de varredura quebrada); **L-45**
(`| tail` e `grep -c` mentem sobre o status; número que vira portão vem de script commitado).

**Item 8, formato do relatório (todo agente devolve exatamente isto):**

```
TAREFA: <id do brief ou da tarefa>
ESTADO: FEITO | PARADO (no passo N)
ARQUIVOS CRIADOS OU ALTERADOS: <caminho absoluto, um por linha>
PASSOS: <n: comando rodado -> saída obtida (resumo de uma linha) -> confere com o esperado? sim/não>
ACEITE: <cada critério do brief -> passou/falhou, com a evidência (linha do grep, contagem, caminho do print)>
FATO x INFERÊNCIA: <o que afirmo com arquivo:linha; o que é conclusão minha>
PERGUNTAS AO LÍDER: <nenhuma, ou a pergunta em uma frase com as opções>
FORA DO ESCOPO, NÃO TOQUEI: <o que vi e não mexi>
```

---

## 4. Os briefs

Cada brief traz: **ângulo** (PROPOSTA ao GATE-LENTE), **fonte** (caminho absoluto e linha), **entra**, **não entra**,
**passos**, **aceite verificável**, **travas**. Os passos comuns de toda peça de texto são estes, e cada brief só diz
o que muda:

1. Ler a pauta inteira: `SITE/docs/editorial/PAUTA-EDICAO-7.md` (saída esperada: a §16 tem as rodadas 1 a 5).
2. Ler `SITE/docs/content/DIALETO.md` e o molde publicado indicado no brief.
3. Abrir **cada** fonte listada no brief, nas linhas indicadas. Fonte que não abre: PARE e relate.
4. Escrever o arquivo de saída com o cabeçalho `# Edição #7 · Seção N · <nome>`, um bloco de status dizendo
   "RASCUNHO v1, submeter ao líder", depois `## pt-BR`, depois `## EN`, depois `## Notas de produção (internas, não
   publicar)` com a lista de fontes usadas (arquivo:linha) e as marcações FATO e INFERÊNCIA.
5. Verificar (saída esperada **0** nas três):
   `/usr/bin/grep -cP '\x{2014}|\x{2013}' <arquivo> || true`, `/usr/bin/grep -ci 'mdash\|ndash' <arquivo> || true`, e a
   busca das palavras proibidas do brief com `/usr/bin/grep -ciw '<palavra>' <arquivo> || true`.
6. Relatar no formato da §3.2.

### 4.1 Seção 4, Reportagem de capa: a refundação

**Ângulo (PROPOSTA):** nesta reportagem, sobre o apagamento dos repositórios em 21/08 e o recomeço com leis escritas,
pela lente "recomeço com regra", contada na ordem do calendário, com a causa nas palavras do líder e a data, cortando
o portão, a auditoria, a ordem falsa e os achados do Gus Dragon.

**Entra, em ordem [CPO]:**

1. **A janela por extenso** no primeiro parágrafo ("de 21 de agosto a 3 de setembro de 2026" / "from August 21 to
   September 3, 2026").
2. **A causa.** A frase do líder, palavra por palavra, com a data **03/09/2026** (D7; PQ4):
   *"você me enganou, fazendo wrapping de libs externas como se fosse lib original escrita do zero. Tentei refatorar,
   mas você continuou mentindo e precisei apagar tudo."* Fonte: `SITE/TODO.md:193`. A #6 publicou o comportamento
   (religar, os atalhos); esta peça publica o engano e o desfecho. **Uma frase** pode lembrar que a issue pública de
   15/08 era a mesma história (`TODO.md:193`: *"É a MESMA história da issue pública"*), sem recontá-la.
3. **O apagamento, sexta 21/08.** A árvore antiga do GlintFx descartada (`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GlintFx/CLAUDE.md:235`);
   as primeiras decisões do líder no projeto novo, no mesmo dia (mesmo arquivo, `:105`, abrir e citar só o que estiver
   lá); o repositório do jogo refundado, primeiro commit 21/08 22:13 (A3). O que foi guardado e o que não foi:
   *"dois repos zerados no mesmo dia, só um com passado guardado"* (`TODO.md:193`, texto do registro, citar como tal).
   **O repositório privado (PQ2):** a peça diz o **nome** e a **contagem de registros**, os dois exatamente como o main
   os mediu em O9 (passo 3) e gravou em `/var/tmp/ed7-fontes/legado.txt`. O escritor copia de lá; se o arquivo não
   existir, PARE e peça ao main.
4. **O terceiro apagamento, sábado 22/08.** O mapeditor zerado e recomeçado:
   `BUS/archive/20260824-1946-mapeditor-apresentacao-nao-precisa-responder.md:14`. O repositório do jogo publicado
   em 22/08 (ledger, `/home/petrus/.claude/projects/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/memory/HISTORICO_GUS_ECOSSISTEMA.md:152`).
5. **As leis nascem com o recomeço (21/08 a 29/08).** A tabela de A3, em prosa ou em lista. O do GusWorld nasce no
   commit que funda o repositório **[INF: a lei veio antes da primeira linha de código; conferir no próprio commit]**.
   **O arquivo global entra (PQ3)**, como "o arquivo de leis da máquina inteira", com a data de 29/08, **sem o
   caminho**. **T11.**
6. **Âncora da caixa** (§4.2), no ponto em que o texto chega a 22/08.
7. **Fecho:** o recomeço com regra escrita, sem dizer se deu certo.

**Não entra:** a mecânica do portão (Programação); a auditoria e a lei de paridade (Programação); a ordem falsa
(Cemitério); a coleta (Galeria); a carta (Cartas); tudo depois de 03/09; a lei de 28/08 e a frase sensível dela
(`BUS/inbox/glintfx/archive/20260828-1652-gusworld-gate-lei-zero.md:10`, fica guardada); qualquer frase de custo.
**Palavras proibidas fora da citação do líder:** `mentiu`, `mentira`, `enganou`, `engano`, `wrapping`, `fingiu`,
`vítima`, `traição`. O escritor conta quantas vezes cada uma aparece e confere que todas estão dentro das aspas da
citação (aceite 3).

**Molde:** `SITE/src/content/edicao-6/pt/sec-04.php` (prompt `gus@glyfesse:~/reportagem$`). Porte **L**. pt-BR e EN.

**Aceite verificável:**
1. O arquivo existe e tem `## pt-BR` e `## EN` (grep de cada cabeçalho dá 1).
2. A frase do líder aparece em pt **idêntica** ao `TODO.md:193` (o relatório mostra as duas lado a lado); em en, é
   tradução de agente, marcada assim nas notas, para o líder aprovar.
3. Toda ocorrência das palavras proibidas está dentro da citação (o relatório lista linha a linha).
4. Nenhuma data posterior a 03/09 (grep por `/09` e conferência manual de cada ocorrência).
5. Cada número e data tem arquivo:linha nas Notas de produção.
6. Zero travessão e zero emoji (passo 5 comum).
7. **O nome e a contagem do repositório privado são idênticos aos de `/var/tmp/ed7-fontes/legado.txt`**, e as Notas de
   produção trazem o comando que os mediu e a data e hora da medição (O9). Número que não veio desse arquivo reprova.
8. A data da frase do líder é 03/09/2026 nas duas línguas.
9. O caminho do arquivo de leis global não aparece (grep por `.claude` dá 0).

**Travas:** T1, T2, T3, T5, T6, T7 (fala do root, se houver), T9, T10, T11. **Parecer do `compliance-legal`** antes do
GATE-CONTEUDO (pauta, risco 7).

### 4.2 Seção 4, caixa do determinismo (Gus Dragon)

**Ângulo (PROPOSTA):** nesta caixa, sobre o achado de 22/08, pelo crédito técnico seco: disseram a ele que o sorteio
determinístico impedia recarregar até dar sorte, e ele mostrou que é metade (fecha o re-roll e abre a previsão).

**Fonte:** `BUS/archive/20260822-0855-gusworld-marco-gus-tensao-determinismo-speedrun.md:14-26` (o achado, a hora
08:46, a troca *"Save verificável por replay EXIGE determinismo. Determinismo PERMITE manipulação de RNG."*, linha 26);
`:30-32` (a ironia da carta, **só se a Cartas não usar**; divisória); `SITE/TODO.md:195`.

**Entra:** o achado, as referências que ele trouxe (linha 16), a troca da linha 26, o crédito (T4), a frase *"a sessão
reconheceu o erro"* (linha 20) como fato.
**Não entra:** juízo sobre a sessão; ligação explícita com a acusação da Reportagem (pauta, risco 17); o que não está
decidido (linhas 34-38); mecânica além da linha 26 sem OK do GATE-SPOILER.
**Molde de caixa:** a caixa do achado do menu na #5 (`SITE/src/content/edicao-5/pt/sec-04.php`, procurar a caixa).
Porte **S**.
**Aceite:** crédito duplo presente nas duas línguas (grep de `Revisor Adversarial de Design` e `Adversarial Design
Reviewer` dá ao menos 1 cada); zero ocorrência de `fofo`, `para a idade`, `criança achou`; passo 5 comum.
**Travas:** T4, T6, T8 (o Gus personagem não aparece aqui), T10. GATE-SPOILER.

### 4.3 Seção 17, Programação: o portão e a auditoria

**Ângulo (PROPOSTA):** nesta seção, sobre o mecanismo, pela frase *"'Olhei e está limpo' e 'não olhei nada' produzem
a mesma saída verde"*, em duas metades: o portão de 21/08 e a auditoria de 02 e 03/09, cortando a refundação e o
nascimento das leis.

**Fonte:** primeira metade, `BUS/archive/2026-08-21-portao-varredura-vazia-verde.md:8-30` (o caso), `:39` (a frase),
`:41-43` (por que os dois autotestes não pegam), `:48-58` (o conserto em três passos), `:68-72` (a lição);
`BUS/archive/2026-08-21-glintfx-estado-madrugada.md:45-61` (mais sete portões, um nunca executado). Segunda metade,
`BUS/archive/20260903-0530-glintfx-novidades-paridade-e-documentacao.md:22-44` (lei de paridade, 45 itens, 19
reabertos, os três achados), `:58-60` (o padrão que liga tudo); `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GlintFx/GODS_LAWS.md:100`
(a data da lei, 02/09/2026).

**Entra:** estrutura canônica (intro acessível, desculpa furada no CRT, `//` de transição, parte técnica com tabela,
`//by:`); a tabela "o que o portão dizia × o que ele tinha olhado"; o terceiro controle (varredura vazia não é
sucesso); a lei de paridade como **lei nova de 02/09** e a auditoria que ela obrigou.
**Não entra:** a refundação e o nascimento das leis (Reportagem); "a primeira vez" (T11); o canal de avisos mudo
(`20260903-0530:52-56`, guardado); a ordem falsa (`:46-50`, Cemitério); a lei de 28/08 (guardada).
**Molde:** `SITE/src/content/edicao-6/pt/sec-17.php` (seção feita à mão; o `.md` é a fonte de texto). Porte **L**.
**Aceite:** a tabela existe nas duas línguas; zero ocorrência de `primeira vez`, `refunda`, `apagad`; os números 45, 19
e 25 aparecem com arquivo:linha nas notas; passo 5 comum.
**Travas:** T1, T2, T5, T6, T7 (a fala do Gus na desculpa furada vai ao líder), T10, T11.
**Nota de render:** o terminal herda o conserto da D15 (O11). **O brinquedo entra nesta seção, logo depois da tabela
do portão** (PQ5): o `.md` marca o ponto com uma linha só, `BRINQUEDO-PORTAO-DE-BOLSO`, que o `frontend-engineer` troca
pela peça na montagem (a varredura antes do GATE-GO exige zero ocorrências do marcador).

### 4.4 Seção 6, Galeria de Bugs: o baú que abre duas vezes (Gus Dragon)

**Ângulo (PROPOSTA):** nesta galeria, sobre o buraco na coleta achado pelo Gus Dragon em 22/08 dentro do catálogo que
ele criou, em registro técnico, cortando a carta e a refundação.

**Fonte:** `BUS/archive/20260822-0912-gusworld-marco-gus-catalogo-de-bugs.md:16-28` (o catálogo e as três regras,
08:56); `BUS/archive/20260822-0925-gusworld-marco-gus-bug-2-buraco-na-coleta.md:12-16` (o item dele, 09:18,
verbatim), `:22-26` (os invariantes e o buraco), `:30-39` (a tabela máquina de estados × idempotência), `:45` (*"Nada
disto existe em código, e nenhuma data foi dada a ele."*); `SITE/TODO.md:196-197`.

**Entra:** o catálogo e a casa `Bug Possível`; o item (2) dele, citado como dele; o buraco (a regra chega tarde); a
tabela; o crédito (T4); a linha 45 como fecho de fato.
**Não entra:** o número e o conteúdo dos invariantes além do que a linha 22 diz, sem OK do GATE-SPOILER; a carta;
promessa de conserto.
**Molde:** `SITE/src/content/edicao-6/pt/sec-06.php` (registro técnico, precedente PQ7 da #6). Porte **M**.
**Aceite:** crédito duplo nas duas línguas; o item dele aparece entre aspas e igual à linha 16 (pt; a tradução vai
marcada nas notas); passo 5 comum.
**Travas:** T4, T6, T10. GATE-SPOILER.

### 4.5 Seção 9, Cartas: a carta do Gus Dragon

**Ângulo (PROPOSTA):** nesta seção, sobre a carta que ele propôs, aprovada em 21/08, do pedido às duas respostas dele
de 03/09, no molde "Gus no Bus" com o crédito da #5 (D5).

**Fonte:** `BUS/archive/20260822-0610-gusworld-ideias-do-gus-sao-marco-historico.md:16-29` (o que ele definiu, a frase
*"mais como puzzle, não como arma"*, o pedido que entrou no formato de mapa); `BUS/archive/20260822-0840-gusworld-marco-gus-glitch-em-batalha.md:12-24`
(o comportamento em batalha, 08:32, verbatim na linha 16); ledger `HISTORICO_GUS_ECOSSISTEMA.md:129, 155-156` (as duas
respostas de 03/09); `SITE/TODO.md:194`. **O pedido original palavra por palavra** está no corpo da issue 3 do bus, no
GitHub: o main busca na onda 0 (O8) e entrega o texto ao escritor em arquivo fora do repo.
Memória do formato: `/home/petrus/.claude/projects/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/memory/project_ideias_do_gus.md`.

**Entra (D5):** (a) o pedido dele **palavra por palavra**, como ele escreveu (grafia dele preservada), para o papel
pautado; (b) o crédito seco nos dois papéis; (c) a fala do Gus personagem contando o destino da ideia, rascunho ao
líder (T7, T8: de dentro, sem palavra de produção); (d) o pensamento sobre a mancha, rascunho ao líder.
**Não entra:** o handle dele (T9, A6); mecânica além do que ele mesmo escreveu, sem OK do GATE-SPOILER; o que segue
aberto (`0840:26-28`) como se fosse fechado; **a data de 16/08** (PQ6: a peça começa na aprovação de 21/08 e diz
só que a ideia tinha sido proposta dias antes); a coleta (Galeria).
**Porte M**, com arte nova (papel pautado e mancha em CSS, nunca desenhada), feita pelo `visual-design-director` na
onda 4.
**Aceite:** o pedido no `.md` é idêntico ao texto que o main entregou (o relatório mostra o `diff` vazio entre os
dois); crédito duplo nas duas línguas; fala e pensamento marcados "submeter ao líder"; passo 5 comum (atenção: se o
pedido dele tiver meia-risca, a regra da memória `project_ideias_do_gus` diz que conteúdo citado do menino pode
mantê-la; **PARE e relate** antes de decidir).
**Travas:** T4, T5, T6, T7, T8, T9.

### 4.6 Seção 7, Cemitério: duas lápides

**Ângulo (PROPOSTA):** neste cemitério, duas pedras: os repositórios antigos, que pagam o epitáfio da #6, e a ordem
que o líder nunca deu, curta.

**Fonte:** epitáfio publicado da #6, *"Aqui jaz um nome. O corpo continua de pé."* (`SITE/docs/editorial/BRIEFS-EDICAO-6.md:895`;
conferir no publicado `SITE/src/content/edicao-6/pt/sec-07.php`); repositórios antigos (as mesmas fontes da §4.1,
itens 3 e 4); ordem falsa, `BUS/archive/20260903-0530-glintfx-novidades-paridade-e-documentacao.md:46-50` (*"Eu nao
falei disso"*, *"sustentou onze dias de planejamento errado"*, *"corrigida e marcada como atribuição falsa, não apagada
em silêncio"*).

**Entra:** as duas pedras, com data e epitáfio; **os epitáfios ficam em branco, marcados `EPITAFIO-DO-LIDER`**, porque
são dele; uma linha de ponte à pedra da #6; **na pedra da ordem falsa, a data da correção (03/09/2026) e a idade
"onze dias", citadas do registro** (PQ7; `20260903-0530:50`), sem data de nascimento.
**Não entra:** o porquê da refundação (Reportagem); a auditoria (Programação).
**Molde:** `SITE/src/content/edicao-6/pt/sec-07.php` (feito à mão). Porte **M**.
**Aceite:** o marcador `EPITAFIO-DO-LIDER` aparece duas vezes por língua (grep dá 2 em cada bloco) e nenhum epitáfio
foi escrito; passo 5 comum.
**Travas:** T1, T3, T6, T10.

### 4.7 Seção 18, O Gus lê o bus

**Ângulo (PROPOSTA):** a listagem das mensagens endereçadas ao site de 21/08 a 03/09, com o degrau 3+ da fórmula
(ironia), e uma ou duas abertas que não são base de outra peça.

**Fonte:** memória `canon_gus_le_o_bus_formula.md` (mesma pasta de memória acima). Contagem do clone local, por `para:
site` ou `Destinos: ... site` (pauta §15, item 2): **N = 15**, a reconferir pelo main depois do pull (O8). Lista:
`2026-08-21-portao-varredura-vazia-verde`, `2026-08-21-glintfx-estado-madrugada`, `20260821-2110`, `20260821-2121`,
`20260822-0610`, `0840`, `0855`, `0912`, `0925`, `20260822-1025`, `20260824-1946`, `20260824-2148`, `20260901-1608`,
`20260903-0530`, `20260903-0531` (todos em `BUS/archive/`).
**Candidatas a abrir:** `20260824-2148-gusworld-o-gus-espera-voces-na-issue-8.md`, `20260822-1025-gusworld-pedido-do-gus-avisar-sem-perguntar.md`.
**Proibido abrir:** `20260903-0530`, `2026-08-21-portao...`, `0840`, `0855`, `0912`, `0925`, `20260824-1946`.
**Não entra:** handle nenhum (a mensagem 2148 cita um, linha 20); o nome de outra sessão como pessoa.
**Molde:** `SITE/src/content/edicao-6/pt/sec-18.php` (feito à mão). Porte **M**.
**Aceite:** a listagem tem exatamente o N fixado pelo main; nenhuma das proibidas aparece aberta; zero `@` seguido de
nome de usuário (grep `@[A-Za-z]` revisado linha a linha); passo 5 comum.
**Travas:** T4, T5, T7, T8, T9.

### 4.8 Seção 3, Editorial (Carta do Gus)

**Ângulo (PROPOSTA):** a carta responde ao último pensamento publicado da #6 e apresenta o Brunus, de dentro.
**Fonte:** `SITE/src/content/edicao-6/pt/sec-03.php:14` (*"falta aprender a esperar sem parecer que espero"*); a ficha
pública do Brunus como o ROTEIRO a resume (`SITE/docs/editorial/ROTEIRO-ENTREVISTAS.md:57-76`, só o que é público:
ofício, tic, voz). **Escreve por último**, com a edição inteira como insumo.
**Não entra:** palavra de produção (T8); qualquer coisa que as respostas do Brunus insinuem sobre a idade dele ou o
passado (spoiler); a rima entre a última resposta dele e o tema (pauta §1: o leitor junta).
**Molde:** `SITE/docs/content/edicao-6-editorial.md`. Porte **S**.
**Aceite:** zero ocorrência de `pixel`, `sprite`, `código`, `commit`, `repositório` (T8); toda fala e pensamento
marcados "submeter ao líder"; passo 5 comum.
**Travas:** T5, T6, T7, T8.

### 4.9 Seção 11, HQ: H1, a tela que diz "tudo certo" (roteiro e arte)

**Ângulo (PROPOSTA):** três quadros na tela de fósforo verde, como as HQs da #1 e da #3, em que uma tela confere uma
coisa que não está ali e responde que está tudo certo; sem personagem em cena (D19).

**Roteiro, `narrative-designer`:** estrutura de três quadros (o que a tela mostra em cada um, o texto de terminal, o
silêncio entre eles). É estrutura, não prosa polida (L-76 global). Texto de tela em ASCII, sem acento (regra
tela×papel, `PIPELINE-EDICAO.md` §4, S4). **Se o roteiro precisar de fala de personagem, PARE e pergunte:** o conceito
aprovado não tem personagem. Saída: `SITE/docs/content/edicao-7-hq-roteiro.md`. Molde: `SITE/src/content/edicao-1/pt/sec-11.php`
e `SITE/src/content/edicao-3/pt/sec-11.php`.
**Arte, `visual-design-director`:** só CSS sobre o componente CRT (`SITE/public_html/assets/css/edicao.css:1717-1748,
1846-1856`), com o escopo novo da #7 (O11), nenhuma imagem desenhada, nenhum sprite (H1 não tem personagem).
**Não entra:** o portão contado como reportagem (é imagem, não narrativa); nome de arquivo, commit ou sessão reais.
**Aceite:** três quadros; zero `<img`; o render em 390 pontos sem rolagem horizontal (`scrollWidth` igual a
`clientWidth`, medido pelo `qa-engineer`); o Expediente declara a HQ (§4.12).
**Travas:** T6, T8 (não há personagem, mas a tela não fala de pixel nem de sprite), L-09 (declaração).

### 4.10 Brinquedo: o portão de bolso (D20)

**Comportamento (PROPOSTA ao GATE-LENTE):** o leitor escolhe uma de três pastas (cheia com um problema, limpa, vazia),
aperta para conferir, e o portão responde: acusa o problema, diz "tudo certo", ou **se recusa a dizer "tudo certo"**
porque não varreu nada. Os textos do terminal vão ao GATE-COPY.

**Ordem de serviço, `frontend-engineer`, onda 4 (TDD, L-13 do site e L-35 global):**

1. Ler `SITE/public_html/assets/js/cupom-core.js:1-40` e `SITE/tests/cupom-core.test.js:1-30` (o molde: núcleo puro
   UMD, sem `document` nem `window`).
2. Criar **primeiro** `SITE/tests/portao-bolso-core.test.js` com estes casos (todos com `node:test` e
   `node:assert/strict`):
   a. pasta com 3 itens, 1 marcado como problema → resultado `acusa`, `encontrados=3`, `analisados=3`, `problemas=1`;
   b. pasta com 3 itens limpos → `limpo`, `encontrados=3`, `analisados=3`, `problemas=0`;
   c. pasta vazia → `recusa` (nunca `limpo`), `encontrados=0`;
   d. entrada inválida (não é lista) → `recusa`;
   e. a função nunca devolve `limpo` quando `analisados` é diferente de `encontrados`.
3. Rodar `node --test /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/tests/portao-bolso-core.test.js > /var/tmp/ed7-portao-red.txt 2>&1; echo $?`.
   **Saída esperada: diferente de 0** (o núcleo ainda não existe). Se der 0, PARE: o teste não testa nada.
4. Criar `SITE/public_html/assets/js/portao-bolso-core.js` (UMD leve, expõe `window.PortaoBolsoCore` e
   `module.exports`), só com a lógica.
5. Rodar o mesmo comando do passo 3. **Saída esperada: 0**, e o log com `# fail 0`.
6. Criar `SITE/public_html/assets/js/portao-bolso.js` (camada DOM). **Sem JS, a página mostra as três respostas
   prontas** (estado-base, como o `crt-nano`, `edicao.css:1759-1776`). Botões com teclado e foco visível.
7. Subir o `PISO_ARQUIVOS` de `SITE/scripts/testes.sh:22` para o número real de arquivos de teste depois da adição
   (contar com `ls /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/tests/*.test.php /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/tests/*.test.js | /usr/bin/wc -l`).
   Trecho antigo exato: `PISO_ARQUIVOS=30` (ou o valor que estiver lá; se não for 30, PARE e relate). Trecho novo:
   `PISO_ARQUIVOS=<número contado>`.
8. Avisar o main e esperar a vez para a suíte completa (trabalho pesado). Quando autorizado:
   `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/scripts/testes.sh > /var/tmp/ed7-suite.txt 2>&1; echo $?`.
   **Saída esperada: 0** e a última linha `ALL GREEN`.

**Proibido:** three.js (não há razão de tela que o CSS não alcance; memória `project_d_webgl_so_na_tela`); dependência
de terceiro; ESM; `fetch`; armazenar dado do leitor.
**Aceite:** os passos 3 e 5 com os códigos de saída esperados no relatório; peso dos dois arquivos JS medido em bytes;
sem JS, as três respostas visíveis (print do `qa-engineer` com JS desligado); **ele entra dentro da Seção de
Programação, logo depois da tabela do portão (PQ5)**, no lugar do marcador `BRINQUEDO-PORTAO-DE-BOLSO`, e
`/usr/bin/grep -rc 'BRINQUEDO-PORTAO-DE-BOLSO' /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-7 || true`
soma 0 depois da montagem.
**Travas:** L-13 do site, L-35 e L-36 globais, T6.

### 4.11 Seção 16, Entrevista: tradução para o inglês das respostas (D9)

**`ux-writer`, onda 2, depois de O6:**

1. Ler `SITE/docs/content/edicao-7-entrevista-brunus-respostas.md` (criado em O6) e `SITE/docs/content/edicao-6-entrevista-yakov-respostas.md:69-125`
   (o molde da seção `## EN`).
2. Para cada uma das 18 respostas, traduzir o sentido e **reproduzir no inglês erros de digitação equivalentes, nos
   mesmos lugares e em quantidade parecida** com os do pt (D9). Os erros do pt estão listados na pauta (§16: os seis
   trechos que o main apontou); o tradutor confere a lista contra o texto e completa se achar mais, sem corrigir
   nenhum.
3. A resposta 18 sai em **três falas seguidas**, cada uma com o prefixo `brunus@glyfesse:~/entrevista$`, sem linha em
   branco entre elas (D8; `SITE/scripts/conversor/montagem.php:119-127` reprova com linha em branco).
4. Substituir, na seção `## EN` do arquivo, cada `TRADUCAO-PENDENTE` pela resposta traduzida.
5. Acrescentar às Notas de produção a **lista dos erros**: uma linha por erro, `n | trecho pt | trecho en`.
6. Verificar: `/usr/bin/grep -c 'TRADUCAO-PENDENTE' <arquivo> || true` dá **0**; passo 5 comum dá 0.

**Proibido:** mexer na seção `## pt-BR`; corrigir erro do pt; travessão; emoji.
**Aceite:** marcador zerado; 18 números de 1 a 18 na seção `## EN`; a lista de erros nas notas, para o líder aprovar
junto da tradução (D9).

### 4.12 Copies curtas e Expediente

**`ux-writer`**, um arquivo só, `SITE/docs/content/edicao-7-copies-curtas.md`, uma peça por bloco `## pt-BR` / `## EN`
(molde e tabela de ocorrências: `SITE/docs/content/edicao-6-copies-curtas.md`). Peças: (1) a Nota (fonte: ledger
`HISTORICO_GUS_ECOSSISTEMA.md:159`, não existe código de jogo e não há prazo); (2) Detonado, vazio; (3) Errata, vazio;
(4) Classificados, reuso; (5) Próximos Lançamentos; (6) Pôster, com a imagem que o líder entregou (§8, M5); (7) Brinde, reuso; (8) a linha da Entrevista no
Expediente, no molde de `SITE/src/content/edicao-6/pt/sec-19.php:25`, dizendo que as respostas do Brunus são de uma
pessoa real, que a tradução para o inglês é de agente de IA, aprovada pelo editor, e que **reproduz erros de
digitação equivalentes aos do original** (D9; declarar é a defesa, L-09); (9) a linha da HQ: roteiro e arte de agente
de IA, aprovados pelo editor; (10) a nota do editor, voz do root, que responde a `sec-19.php:36`; (11) o dek da capa.
**Todas vão ao GATE-COPY; os vazios re-gate sempre.** Nenhuma reproduz o crédito do artista da #6 (não há tirinha dele).
**Aceite:** onze blocos pt e onze en; passo 5 comum.

### 4.13 Capa, índice e card social

**`visual-design-director`** (arte) e **`frontend-engineer`** (montagem), onda 4. Manchete **"Apagar Tudo"** / en
**"Delete Everything"** (D3). Capa (D12): terminal em CSS, convertido em PNG, com o histórico do repositório
recomeçado, um registro só, o `81a8ef1`, **com a mensagem do commit copiada do próprio commit pelo main (O9)**, nunca
da memória. Card social pt e en (1200 por 630). Índice com `↩ a banca` primeiro e os três links fixos no fim.
**Aceite:** print em 390 e 1280 pontos pelo `qa-engineer` no Gecko; manchete numa linha só em 390; o texto do terminal
na arte igual, letra a letra, ao que o main registrou em O9.

### 4.14 O que este brief NÃO cobre

A montagem dos 34 partials, a ficha em `data/edicoes.php`, o uptime, as auditorias e o release seguem a pauta §13,
ondas 4 e 5, e o `PIPELINE-EDICAO.md` §1.5. A #8 nasce em rascunho no mesmo commit que publicar a #7.

---

## 5. Perguntas de produção ao líder (TODAS RESPONDIDAS em 03/11/2026; respostas na §7)

As perguntas ficam abaixo como foram feitas, para leitura junto das respostas.

| # | Pergunta | Opções (recomendada primeiro) | Quando |
|---|---|---|---|
| **PQ1** | **O conserto do portão de travessão (D16) é um teste novo na suíte do próprio site, que varre as fontes e as seções da #7 em diante e reprova se não varrer nada?** | **(a) Sim, teste no site** (não mexe na configuração global usada por todos os projetos; fica sob a suíte que roda antes de todo push). (b) Ampliar a definição global de "texto que vai ao leitor", no hook da máquina (muda o portão de todos os projetos; arquivo externo ao site, exige cópia antes). (c) Os dois | **antes da onda 0** (bloqueia O4) |
| **PQ2** | **A Reportagem diz só que o histórico anterior do jogo foi guardado num repositório à parte, privado, sem nome nem número?** | **(a) Sim, sem nome nem número.** (b) Com a contagem de commits, reconferida. (c) Com nome e contagem | GATE-LENTE da Reportagem |
| **PQ3** | **O arquivo de leis da máquina inteira (29/08) entra na Reportagem, com a data e sem caminho?** | **(a) Sim, como "o arquivo de leis da máquina inteira", com a data.** (b) Não; a Reportagem fala só das quatro sessões | GATE-LENTE da Reportagem |
| **PQ4** | **A frase do "wrapping" leva a data de 03/09, que é quando o registro a guardou?** | **(a) Sim, 03/09.** (b) Outra data, que o senhor diz (se a disse antes à sessão) | GATE-LENTE da Reportagem |
| **PQ5** | **O portão de bolso fica dentro da Seção de Programação, logo depois da tabela do portão?** | **(a) Sim, na Programação.** (b) Como peça própria entre a Programação e o bus. (c) Na abertura da edição, perto da capa | antes da onda 4 |
| **PQ6** | **As Cartas começam na aprovação de 21/08 e dizem só que a ideia tinha sido proposta dias antes, sem a data de 16/08?** | **(a) Sim, sem a data** (16/08 é anterior à janela e a #6 não a narrou). (b) Citam 16/08 | GATE-LENTE das Cartas |
| **PQ7** | **A lápide da ordem falsa leva só a data da correção (03/09) e a idade que o registro dá, "onze dias"?** | **(a) Sim, 03/09 e "onze dias", citados do registro.** (b) O E2 procura antes a data em que a linha nasceu no planejamento do GlintFx | GATE-LENTE do Cemitério |

---

## 6. Onda 0: as tarefas antes de qualquer peça (em ordem; cada uma com os oito itens)

**Todas as tarefas de agente recebem a §3.2 colada.** O11 é da onda 4 e não corre agora.

### Ordem e paralelismo (máximo de 4 agentes vivos; 1 trabalho pesado por vez)

| Bloco | Tarefas | Quem | Pode correr junto com | Pesado? |
|---|---|---|---|---|
| A | O1 (bus), O2 (issues), O9 (git, nome e contagem do legado), O8 (ledger) | main, sem agente | os agentes do bloco B | não |
| B | O5 (`git mv` das perguntas), O6 (arquivo de respostas), O7 (ROTEIRO) | `technical-writer`, até três instâncias, uma por arquivo (nenhum par toca o mesmo arquivo) | O3 e o bloco A | não |
| B | O3 (prints de referência da #5 e da #6) | `qa-engineer` | O5, O6, O7 | **sim**: é o único pesado do bloco |
| C | O4 (teste do travessão no site) | `qa-engineer` | nada pesado | **sim** no passo 8 (suíte completa) |
| D | O10 (primeiro despacho: a Reportagem) | main | n/a | não |

**Dependências:** O4 só começa depois de O5 e O6 (o caso f exige os dois arquivos da entrevista) e depois de O3
terminar (a suíte completa é pesada e não corre junto com o Firefox). O10 só depois de O1 a O9. O9, passo 3, tem de
estar feito antes do brief da Reportagem (§4.1, aceite 7). No pico do bloco B há 4 agentes vivos (três
`technical-writer` e um `qa-engineer`); o main não abre um quinto.

### O1. Ritual do bus e recontagem (main)

1. `git -C /home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm pull` → esperado: termina sem
   erro. Se falhar, PARE.
2. Ler `inbox/site/`, as issues e as discussions novas (L-16 e L-24 do site); o que for do Gus Dragon se responde antes
   de qualquer outra coisa.
3. Recontar as mensagens para `site` de 21/08 a 03/09: `/usr/bin/grep -lE '^(para:.*site|Data: .*Destinos:.*site)' /home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/*2026-08-2[1-9]* /home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/*2026082[1-9]* /home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/*2026083* /home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/*2026090[1-3]* 2>/dev/null | sort -u | /usr/bin/wc -l`
   → esperado: **15**. Se der outro número, o N da §4.7 muda para o medido e o main registra.

### O2. As fontes que só existem no GitHub (main)

1. `mkdir -p /var/tmp/ed7-fontes` (a pasta de O2 e de O9). Buscar o corpo da issue 3 do bus e o comentário de 03/09 18:13 da issue 8, e gravar o texto **fora do repo**, em
   `/var/tmp/ed7-fontes/issue-3.txt` e `/var/tmp/ed7-fontes/issue-8-0309.txt`.
2. Entregar ao `ux-writer` só o pedido do Gus Dragon (§4.5), sem o handle (T9).

### O3. Referência de render da #5 e da #6, antes do conserto do terminal (D15), `qa-engineer`

Trabalho pesado (Firefox headless): um por vez, com aviso ao main.

1. `mkdir -p /var/tmp/qa-ed7/perfil /var/tmp/qa-ed7/ref` → esperado: sem saída.
2. Gravar `/var/tmp/qa-ed7/perfil/user.js` com a linha `user_pref("ui.prefersReducedMotion", 1);` (para as animações
   não mudarem o print). **[INF]** O nome da preferência se confere no passo 6.
3. Subir o servidor local, em segundo plano, a partir da raiz do site:
   `cd /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld && php -S 127.0.0.1:8097 -t public_html > /var/tmp/qa-ed7/servidor.log 2>&1 &`
   → esperado: `curl -s -o /dev/null -w '%{http_code}' 'http://127.0.0.1:8097/pt/edicao.php?slug=edicao-6'` devolve `200`.
4. Para cada combinação de edição (`edicao-5`, `edicao-6`; em inglês `edition-5`, `edition-6`), língua (`/pt/edicao.php`,
   `/en/edition.php`) e largura (390, 1280), rodar:
   `firefox --headless --new-instance --profile /var/tmp/qa-ed7/perfil --window-size=<largura>,900 --screenshot /var/tmp/qa-ed7/ref/<edicao>-<lingua>-<largura>-a.png 'http://127.0.0.1:8097/<rota>?slug=<slug>'`
   → esperado: o PNG existe e tem mais de 0 bytes. São 8 prints.
5. Repetir o passo 4 gravando com sufixo `-b.png` (mais 8).
6. Conferir que `-a` e `-b` de cada combinação são iguais: `sha256sum /var/tmp/qa-ed7/ref/*-a.png /var/tmp/qa-ed7/ref/*-b.png`.
   **Esperado: os pares têm o mesmo hash.** Se algum par diferir, o método não prova nada (a página muda sozinha
   entre dois prints): **PARE e relate qual par**, sem tentar outra preferência por conta própria.
7. Conferir que o print é da página inteira e não só da janela: a altura do PNG passa de 900 (ver com `file` ou
   `magick identify`). **[INF]** O `--screenshot` do Firefox grava a página inteira; se a altura for 900, PARE e relate.
8. Abrir e olhar quatro dos PNGs (L-02 e L-23): é a revista, sem tela pessoal nenhuma.
9. Matar o servidor do passo 3.

**Pode tocar:** só `/var/tmp/qa-ed7/`. **Proibido:** gravar print no repo; mexer em CSS.
**Aceite:** 16 PNGs; 8 pares com hash igual; relatório com a lista dos hashes.

### O4. O conserto do portão de travessão (D16), `qa-engineer`: teste no site (PQ1, "Só no site")

**Decisão do líder (PQ1):** o conserto é só no site; **nada muda nos hooks globais da máquina**. O hook global
continua relatando zero para esses arquivos, e isso fica como está.

1. Ler `SITE/scripts/conversor/travas.php:7` (a expressão `TRAVAS_TRAVESSAO`, que já reconhece o glifo e a entidade)
   e `SITE/tests/apoio/afirmar.php` (as funções `eq`, `verdadeiro`, `terminar`).
2. Criar **primeiro** `SITE/tests/travessao-varredura.test.php`, que exige uma função `travessao_varrer(string $raiz,
   int $edicaoMinima): array` em `SITE/scripts/travessao/varredura.php`, devolvendo
   `['encontrados' => int, 'analisados' => int, 'falharam' => int, 'achados' => list<string>]`. Casos, com raízes de
   brinquedo criadas em `sys_get_temp_dir()` e apagadas no fim (só o prefixo `trav-var-`):
   a. um arquivo `src/content/edicao-7/pt/sec-04.php` com o caractere U+2014 → `achados` com 1 item, `encontrados=1`;
   b. o mesmo arquivo limpo → `achados` vazio, `encontrados=1`;
   c. o mesmo com a entidade `&mdash;` → 1 achado;
   d. um arquivo `docs/content/edicao-6-x.md` com U+2014 e `$edicaoMinima = 7` → ignorado, `encontrados=0`;
   e. raiz sem nenhum arquivo da #7 em diante → `encontrados=0` (quem chama reprova, caso f);
   f. o teste do repositório real: `travessao_varrer('/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld', 7)`
      tem `encontrados >= 2` (os dois arquivos da entrevista, depois de O5 e O6) e `achados` vazio, e
      `analisados + falharam === encontrados`.
   Os arquivos considerados são `src/content/edicao-N/**` e `docs/content/edicao-N-*.md` com N maior ou igual a
   `$edicaoMinima`.
3. Rodar `php /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/tests/travessao-varredura.test.php > /var/tmp/ed7-trav-red.txt 2>&1; echo $?`.
   **Esperado: diferente de 0** (a função não existe). Se der 0, PARE.
4. Criar `SITE/scripts/travessao/varredura.php` com a função (reusa `TRAVAS_TRAVESSAO` por `require_once` de
   `scripts/conversor/travas.php`, nunca copia a expressão; L-33 global, regra de 3).
5. Rodar o comando do passo 3. **Esperado: 0** e a última linha `ALL GREEN (N asserções)` com N maior que 0.
6. **Sabotagem de estreia (L-36 e L-27 globais), numa cópia fora da árvore:** copiar
   `SITE/docs/content/edicao-7-entrevista-brunus-perguntas.md` para `/var/tmp/trav-sab/docs/content/`, inserir um U+2014
   na cópia, rodar
   `php -r 'require "/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/scripts/travessao/varredura.php"; var_export(travessao_varrer("/var/tmp/trav-sab", 7));'`
   → **esperado: `achados` com 1 item.** Apagar `/var/tmp/trav-sab` depois (conferir o caminho antes, L-53 global).
7. Subir o `PISO_ARQUIVOS` de `SITE/scripts/testes.sh:22` como no passo 7 da §4.10.
8. Pedir a vez ao main e rodar a suíte completa:
   `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/scripts/testes.sh > /var/tmp/ed7-suite.txt 2>&1; echo $?`
   → **esperado: 0**, última linha `ALL GREEN`.

**Pode tocar:** `SITE/tests/travessao-varredura.test.php`, `SITE/scripts/travessao/varredura.php`,
`SITE/scripts/testes.sh` (só a linha 22). **Proibido:** qualquer coisa sob `/home/petrus/.claude/` (PQ1).
**Depende de:** O5 e O6 prontos (caso f) e O3 terminado (passo 8 é pesado).
**Aceite:** passos 3, 5, 6 e 8 com as saídas esperadas, no relatório.

### O5. O arquivo de perguntas do Brunus passa a ser da #7, `technical-writer` (o main commita)

1. `git -C /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld mv docs/content/edicao-6-entrevista-perguntas.md docs/content/edicao-7-entrevista-brunus-perguntas.md`
   → esperado: sem saída; `ls` do caminho novo mostra o arquivo.
2. No arquivo novo, trocar a linha 1. Trecho antigo exato:
   `# Edição #6 · Seção 16 · A Entrevista: perguntas do Gus ao Brunus "Vetorial" Solveckt`
   Trecho novo: `# Edição #7 · Seção 16 · A Entrevista: perguntas do Gus ao Brunus "Vetorial" Solveckt`
3. Trocar as linhas 3 a 7. Trecho antigo exato:
   ```
   > **Status: RASCUNHO DE PERGUNTAS, v1 (18 perguntas, mundo intacto, testado sem os `//`). Aguarda a
   > resposta do homenageado (por ordem do líder, ele mesmo responde; ninguém escreve a fala do Brunus) +
   > GATE-CONTEUDO + GATE-SPOILER (obrigatório e sem exceção antes de qualquer render,
   > `ROTEIRO-ENTREVISTAS.md`).** Produzido em 2026-10-07. O texto abaixo é só o lado do Gus: nenhuma
   > resposta do Brunus foi escrita nem sugerida.
   ```
   Trecho novo:
   ```
   > **Status: PERGUNTAS APROVADAS pelo líder em 07/10/2026 (18 perguntas, mundo intacto, testado sem os `//`;
   > marca dos pensamentos ajustada em 08/10/2026). Respondidas pelo homenageado e entregues pelo líder em
   > 03/11/2026; as respostas estão em `docs/content/edicao-7-entrevista-brunus-respostas.md`. Publicação na
   > Edição #7 (`docs/editorial/PAUTA-EDICAO-7.md`).** Produzido em 2026-10-07. O texto abaixo é só o lado do
   > Gus: nenhuma resposta do Brunus foi escrita por agente.
   ```
4. Trocar a linha 23. Trecho antigo exato: `## O texto (pt-br): só as perguntas`. Trecho novo: `## pt-BR`.
5. Conferir: `/usr/bin/grep -n '^## ' <arquivo novo>` → esperado: `## pt-BR`, `## EN` e `## Notas de produção (interno,
   nunca publicado)`, nesta ordem. E `/usr/bin/grep -c 'Edição #6' <arquivo novo> || true` → esperado: 0 no título (se
   o número for maior que 0, listar as linhas; o resto do arquivo pode citar a #6 como história e não se muda).
6. **Não mudar nenhuma pergunta nem pensamento.** Conferir com `git -C <raiz> diff -M --stat` que só as linhas 1, 3 a 7
   e 23 mudaram.

### O6. O arquivo de respostas do Brunus, `technical-writer`

1. Criar `SITE/docs/content/edicao-7-entrevista-brunus-respostas.md`, no molde de
   `SITE/docs/content/edicao-6-entrevista-yakov-respostas.md:1-11`: título `# Edição #7 · Seção 16 · A Entrevista:
   respostas do Brunus "Vetorial" Solveckt`; bloco de citação dizendo que são as 18 respostas do homenageado, entregues
   pelo líder em 03/11/2026, às perguntas de `docs/content/edicao-7-entrevista-brunus-perguntas.md`; `---`; `## pt-BR`;
   uma cerca de código.
2. Dentro da cerca, para cada resposta n de 1 a 18: uma linha só com o número `n`; na linha seguinte,
   `brunus@glyfesse:~/entrevista$ ` seguido do texto da linha da `COLAGEM` indicada, **copiado sem mudar nada**, só sem
   espaço no fim da linha; uma linha em branco. Linhas da `COLAGEM`: 1→7, 2→13, 3→19, 4→25, 5→30, 6→36, 7→41, 8→48,
   9→53, 10→60, 11→66, 12→71, 13→77, 14→83, 15→89, 16→94, 17→100, **18→106, 107 e 108: três linhas seguidas, cada uma
   com o prefixo, sem linha em branco entre elas** (D8).
3. Fechar a cerca; `---`; `## EN`; uma cerca com os mesmos números e, para cada resposta, a linha
   `brunus@glyfesse:~/entrevista$ TRADUCAO-PENDENTE` (para a 18, três linhas com o marcador); fechar a cerca.
4. `## Notas de produção (internas, não publicar)`: fonte (respostas de uma pessoa real, palavra por palavra, só o
   espaço de fim de linha removido); decisões do líder de 03/11/2026 (publicar como está; erros de digitação mantidos;
   resposta 18 em três falas; tradução imitando os erros); **nenhum nome real** (T9).
5. Conferir: `/usr/bin/grep -c '^brunus@glyfesse:~/entrevista\$ ' <arquivo>` → esperado: **40** (20 em pt e 20 em
   en); `/usr/bin/grep -cE '^[0-9]+$' <arquivo>` → esperado: **36**; passo 5 comum → 0.
6. Conferir a cópia, resposta a resposta: para n e a linha L da `COLAGEM`, o texto depois do prefixo é igual a
   `sed -n 'Lp' COLAGEM | sed 's/[[:space:]]*$//'`. O relatório traz as 20 comparações com "igual" ou "diferente".

### O7. `ROTEIRO-ENTREVISTAS.md`, linha 63, `technical-writer`

Trecho antigo exato: a linha 63 inteira, que começa com `| **Edição** | **#6** · Brunus Vetorial · **fixado pelo líder
em 07/10/2026**` e termina com `nada além disso |`.
Trecho novo:
`| **Edição** | **#7** · Brunus Vetorial · fixado pelo líder em 07/10/2026 (Trilha B) para a #6, que publicou a entrevista do Yakov porque ela chegou primeiro (ordem do líder de 23/10/2026: *"Quem fizer primeiro, colocamos no ar"*); **respondida pelo homenageado e entregue em 03/11/2026, publicada na #7**. O Gus entrevista; **quem responde é o homenageado real** e nenhum agente escreve a fala do Brunus. Perguntas em `docs/content/edicao-7-entrevista-brunus-perguntas.md`; respostas em `docs/content/edicao-7-entrevista-brunus-respostas.md`. A decisão aberta de como intercalar a Trilha B com a party **segue aberta** |`
Conferir com `/usr/bin/grep -n 'Edição\*\* | \*\*#7' <arquivo>` → esperado: linha 63. **A tabela "O que já saiu" (linhas 13 a
16) para na #2; completá-la exige ler as seções 16 publicadas da #3 à #6 e não é desta tarefa:** o main a registra na
INBOX do `TODO.md`.

### O8. Ledger (main, memória)

No `HISTORICO_GUS_ECOSSISTEMA.md`, linha 162, a frase *"As perguntas ao Brunus seguem DISPONÍVEIS para uma edição
futura."* passa a dizer que elas foram respondidas em 03/11/2026 e vão na #7.

### O9. Conferências de git que faltam (main)

1. A mensagem do `81a8ef1`: `git -C /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld log -1 --format='%H%n%ad%n%s' --date=iso 81a8ef1`
   → registrar o texto exato para a arte da capa (§4.13). Leitura só (L-00).
2. O último commit do repositório anterior, pela API (devolve UTC; converter): `gh api "repos/petrinhu/gusworld_legacy/commits?since=2026-08-20&until=2026-08-23" --jq '.[0].commit.committer.date'`.
3. **Nome e contagem do repositório privado (PQ2), MEDIDOS agora, nunca copiados de memória:**
   - nome e visibilidade: `gh api repos/petrinhu/gusworld_legacy --jq '.full_name, .private'` → esperado: duas
     linhas, o nome e `true`. Se der erro ou `false`, PARE e leve ao líder;
   - contagem de registros (commits) do ramo padrão, paginada:
     `gh api --paginate "repos/petrinhu/gusworld_legacy/commits?per_page=100" --jq '.[].sha' > /var/tmp/ed7-fontes/legado-shas.txt; echo $?`
     → esperado: `0`; depois `/usr/bin/wc -l < /var/tmp/ed7-fontes/legado-shas.txt` dá o número;
   - conferir que não há repetição: `sort -u /var/tmp/ed7-fontes/legado-shas.txt | /usr/bin/wc -l` → esperado: o mesmo
     número. Se diferir, PARE;
   - gravar em `/var/tmp/ed7-fontes/legado.txt` três linhas: o nome como a API devolveu, o número, e a data e hora da
     medição (de `date '+%d/%m/%Y %H:%M:%S'`). **Esse arquivo é a única fonte do nome e do número para a Reportagem**
     (§4.1, aceite 7). Fica fora do repo.

### O10. Primeira leva de despacho (main)

Depois de O1 a O9 (O4 incluída): despachar a Reportagem (§4.1) sozinha, com a §3.2 colada e o caminho de
`/var/tmp/ed7-fontes/legado.txt`.

### O11. Escopo do conserto do terminal (D15), `frontend-engineer`, onda 4

1. Ler A2 e A9 (§2) e o print `qa-prod/crop-b-pt390-prog.png` da #6 (citado em `SITE/TODO.md:177`; procurar o arquivo
   com `ls`; se não existir, PARE e relate).
2. Diagnosticar, em 390 pontos, qual regra de `edicao.css:1717-1776` causa as faixas que cobrem as linhas quebradas.
   Relatar antes de mudar.
3. Corrigir **só sob uma classe modificadora nova** (proposta: `.crt-scr.crt-v7`), usada apenas nos partials da #7.
   **Não alterar nenhuma das regras existentes** do componente.
4. O `qa-engineer` refaz os 16 prints de O3 e compara os hashes com os de referência. **Esperado: os 8 pares de
   referência iguais aos novos.** Qualquer diferença reprova o conserto.

**Aceite (D15):** na #7, nenhuma faixa cobre texto em 390 pontos, pt e en; a #5 e a #6 iguais antes e depois.

---

## Nota final sobre o que este documento NÃO decide

As sete PQs da §5 já foram respondidas pelo líder (§7). Os epitáfios, o dek, as falas e os pensamentos de personagem, a tradução e a lista
dos erros, os textos do terminal da HQ e do brinquedo vão aos gates dele. Nenhum agente aprova nada disso.

---

## 7. Respostas do líder às perguntas de produção (03/11/2026, perguntas feitas depois de 13:46:22, por AskUserQuestion; opção escolhida verbatim)

- **PQ1:** **"Só no site (Recomendado)"**. Nada muda nos hooks globais da máquina. Aplicada em O4 e na §3.2.
- **PQ2:** **"Com nome e contagem"**. A Reportagem diz o nome do repositório privado do histórico anterior e a contagem
  de registros. A contagem é medida no ato por comando (O9, passo 3), nunca copiada de memória. Aplicada em T9, §4.1
  (item 3 e aceite 7) e O9.
- **PQ3:** **"Entra, com a data (Recomendado)"**. O arquivo de leis da máquina inteira entra na Reportagem, com a data de
  29/08 e sem o caminho. Aplicada em §4.1 (item 5 e aceite 9).
- **PQ4:** **"03/09 (Recomendado)"**. A frase do "wrapping" leva a data de 03/09/2026. Aplicada em §4.1 (item 2 e
  aceite 8).
- **PQ5:** **"Dentro da Programação (Recomendado)"**. O portão de bolso entra na Seção de Programação, logo depois da
  tabela do portão. Aplicada em §4.3 e §4.10.
- **PQ6:** **"Começa em 21/08 (Recomendado)"**. As Cartas começam na aprovação de 21/08, sem a data de 16/08. Aplicada em
  §4.5.
- **PQ7:** **"03/09 e os 11 dias (Recomendado)"**. A pedra da ordem falsa leva a data da correção e a idade que o
  registro dá. Aplicada em §4.6.

### 7.1 GATE-CONTEUDO FECHADO (03/11/2026, tarde, por AskUserQuestion; verbatim)

Todo o texto da #7 está aprovado. Nenhum agente da onda 4 reescreve palavra nenhuma.

- **Reportagem:** "Aprovo como está"; a frase em inglês: "Aprovo".
- **Caixa do determinismo:** "Aprovo como está" (spoiler liberado).
- **Programação:** "Aprovo como está" (com as falas do Gus); textos do brinquedo: "Aprovo como estão".
- **Galeria:** "Aprovo como está" (spoiler das nove invariantes liberado).
- **Cemitério:** "Aprovo como está"; epitáfios: "Duas pastas, um passado" e "Nunca foi dada" (**rótulos das opções escolhidas; o texto das pedras está em `docs/content/edicao-7-cemiterio.md:19-20, 28`**, e é esse que vai à página).
- **Cartas:** "Aprovo como está", com a fala trocada por causa da L-25: "Trocar por "nas cartas ainda nao" (Recomendado)".
- **O Gus lê o bus:** "Aprovo como está", e "Assunto real, cortado nos spoilers (Recomendado)".
- **HQ:** "Versão A (Recomendado)".
- **Entrevista, tradução:** "Aprovo como está".
- **Editorial:** "Aprovo com o parágrafo 3".
- **Expediente:** "Aprovo como está". **Dek:** "Aprovo".
- **Detonado:** "Não vou chutar (Recomendado)".
- **Próximos, Classificados e Brinde:** "Aprovo como está".
- **Inglês de todas as peças:** "Aprovo como está".
- **Pôster:** o líder pediu um prompt, gerou no Grok e entregou, verbatim: "o poster está em [imagem]. ANtes ponha o arquivo
  na pasta certa e depois use". Cópia pública em `SITE/public_html/assets/edicao-7/poster-edicao-7.jpg` (1408 por 1408,
  commit `de3b867`). A Seção 13 deixa de ser vazio.

---

## 8. Onda 4: ordens de serviço M0 a M9 (conferidas contra a árvore real em 03/11/2026)

**Toda ordem abaixo se despacha com a §3.2 colada**: ela traz os itens 4 a 8 da L-11 global que valem para todas
(regra de parada, proibidos gerais, armadilhas, leis, formato do relatório). Cada M acrescenta os itens 1, 2 e 3 e o
que for próprio dele. **Nenhuma ordem reescreve texto aprovado:** o texto vem das fontes, palavra por palavra, e quem
achar erro PARA e relata.

**Limite de método:** escrevi esta seção sem Bash. As linhas citadas eu abri; nenhum comando abaixo foi rodado por mim.

### 8.1 Ordem e paralelismo (máximo de 4 agentes vivos; 1 trabalho pesado por vez)

| Etapa | Tarefa | Quem | Corre junto com | Pesado? |
|---|---|---|---|---|
| 1 | **M0** controle: o comando reproduz a referência? | `qa-engineer` | M1 | **sim** |
| 1 | **M1** receita, conversor e seções à mão sem arte nova | `frontend-engineer` | M0 | não |
| 2 | **M5a** pôster na Seção 13 | `frontend-engineer` (outra instância) | M2, M4 | não |
| 2 | **M4** capa e cards | `visual-design-director` | M5a e a cadeia | **sim**, só nos renders |
| 2 | **Cadeia do `edicao.css`, EM SÉRIE: M2, depois M3, depois M6, depois M7a** | um agente por vez | M5a, M4 | não |
| 3 | **M7b** comparação de hash da #5 e da #6 | `qa-engineer` | nada pesado | **sim** |
| 4 | **M8a** ficha, ainda em rascunho, e **M5b** o rodapé | `backend-engineer` | nada | **sim**, na suíte |
| 5 | **M9** QA da edição inteira | `qa-engineer` | nada | **sim** |
| 6 | GATE-RENDER, GATE-CAPA, auditorias (L-09) | líder; auditores | | |
| 7 | **M8b** publicação, só depois do GATE-GO | `backend-engineer`; o main commita | nada | **sim**, na suíte |

**Por que a cadeia é em série:** só existe um arquivo de CSS servido às edições (`SITE/public_html/assets/css/edicao.css`;
`tokens.css` é de outra natureza), e dois agentes nunca editam o mesmo arquivo (L-11 global). **Por que M7b vem antes do
rodapé:** a linha do rodapé é servida em toda página e mudaria o hash da #5 e da #6 (pauta, risco 24). **Por que M8a existe:**
a capa, o dek e o título saem da ficha (`SITE/src/templates/edicao.php:62-63`); sem ficha não há o que o QA olhar. O `estado`
continua `rascunho` e só vira `publicada` no ato (M8b), que é o que a sua ordem pede e o que a #6 fez
(`BRIEFS-EDICAO-6.md:761-767`).

**Commit:** o main commita ao fim de cada M, citando `ED7-PAUTA`, depois de `git diff --cached --stat` (L-23 do site).

**Ver a #7 em rascunho (vale para todo M):**
`cd /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld && PREVIEW_EDICAO_NUM=7 php -S 127.0.0.1:8098 -t public_html scripts/preview-router.php > /var/tmp/qa-ed7/prev7.log 2>&1 &`
Endereços: `http://127.0.0.1:8098/pt/edicao.php?slug=edicao-7` e `http://127.0.0.1:8098/en/edition.php?slug=edition-7`.
O router nunca grava em `data/edicoes.php` (`SITE/scripts/preview-router.php:12-18`). Ao terminar, mate o servidor pelo PID.

**A conferência de texto das seções à mão (usada em M1, M2, M3, M5a).** Gravar uma vez, fora do repo, em
`/var/tmp/ed7-texto/conferir.php`:

```php
<?php
// uso: php conferir.php <fonte.md> <pt-BR|EN> <partial.php> [ocorrencia]
[$_, $md, $cab, $par] = $argv;
$oc = (int) ($argv[4] ?? 1);
$n = 0; $dentro = false; $bloco = [];
foreach (file($md, FILE_IGNORE_NEW_LINES) as $l) {
    if ($l === "## $cab") { $n++; $dentro = ($n === $oc); continue; }
    if ($dentro && (str_starts_with($l, '## ') || $l === '---')) { break; }
    if ($dentro) { $bloco[] = $l; }
}
if ($bloco === []) { echo "BLOCO VAZIO: varredura quebrada\n"; exit(1); }
$norm = static fn(string $s): string => trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags($s), ENT_QUOTES | ENT_HTML5, 'UTF-8')));
$pagina = $norm(preg_replace('/<\?php.*?\?>/s', '', file_get_contents($par)));
$enc = 0; $falta = [];
foreach ($bloco as $l) {
    $l = trim($l);
    if ($l === '' || $l === '```' || preg_match('/^\|[\s:|-]+\|$/', $l) === 1) { continue; }
    if (preg_match('/^[A-Z][A-Z-]{9,}$/', $l) === 1) { continue; } // marcador de montagem
    $partes = str_starts_with($l, '|') ? explode('|', trim($l, '|')) : [$l];
    foreach ($partes as $p) {
        $t = trim(preg_replace('/^(#+ |> |\/\/ ?|\/\* ?)/', '', trim(trim($p), '`')));
        $t = trim(preg_replace('/ ?\*\/$/', '', str_replace(['**', '*', '`'], '', $t)));
        if ($t === '') { continue; }
        $enc++;
        if (!str_contains($pagina, $norm($t))) { $falta[] = $t; }
    }
}
printf("trechos=%d faltando=%d\n", $enc, count($falta));
foreach ($falta as $f) { echo "FALTA: $f\n"; }
exit($falta === [] && $enc > 0 ? 0 : 1);
```

Saída esperada em toda seção à mão: `trechos=N faltando=0`, com N maior que 0, e código de saída 0. **`FALTA:` não se resolve
mudando a fonte:** PARE e relate. O script compara texto, não desenho; print é com o M9.

### M0. Controle: o comando reproduz a referência?, `qa-engineer` (pesado; rodar antes de qualquer CSS novo)

**Fatos:** a referência da #5 e da #6 está em `/var/tmp/qa-ed7/ref3/`, nomes `edicao-<5|6>-<pt|en>-<390|1280>-<a|b>.png`.
A altura de janela do método é **H=32000**, com o Firefox isolado.
**COMANDO-REF3 (FATO: o que o main passou ao `qa-engineer` no despacho de `ref3`; a rodada confirmou 8 pares iguais):**
`env -u WAYLAND_DISPLAY -u DISPLAY -u DBUS_SESSION_BUS_ADDRESS XDG_RUNTIME_DIR=/var/tmp/qa-ed7/xdg HOME=/var/tmp/qa-ed7/home MOZ_NO_REMOTE=1 MOZ_HEADLESS=1 firefox --headless --new-instance --profile /var/tmp/qa-ed7/perfil --window-size=<W>,32000 --screenshot <png absoluto> '<url>'`,
com W 390 ou 1280, um Firefox por vez, servidor `php -S 127.0.0.1:8097 -t public_html` a partir de SITE, rotas
`/pt/edicao.php?slug=edicao-N` e `/en/edition.php?slug=edition-N`, perfil `/var/tmp/qa-ed7/perfil` já com `user.js` pronto.
O `/var/tmp/qa-ed7/capturar.sh` é da tentativa anterior (altura 900, pasta `ref`): não usar.

1. `/usr/bin/magick identify -format '%w %h\n' /var/tmp/qa-ed7/ref3/edicao-6-pt-390-a.png` → esperado: largura 390, altura 32000.
   Outro valor: PARE.
2. Subir a #5 e a #6 como na referência: `cd /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld && php -S 127.0.0.1:8097 -t public_html > /var/tmp/qa-ed7/m0-servidor.log 2>&1 &` →
   `curl -s -o /dev/null -w '%{http_code}' 'http://127.0.0.1:8097/pt/edicao.php?slug=edicao-6'` dá `200`.
3. `mkdir -p /var/tmp/qa-ed7/m0`. Com o COMANDO-REF3, capturar as 8 combinações (edição 5 e 6; `pt/edicao.php?slug=edicao-N` e
   `en/edition.php?slug=edition-N`; 390 e 1280), um Firefox por vez, em `/var/tmp/qa-ed7/m0/edicao-<N>-<lingua>-<largura>.png`.
4. Comparar cada uma com a `-a` da referência: `sha256sum` dos dois arquivos. **Esperado: os 8 pares iguais.** Se algum diferir,
   PARE e relate qual: sem controle verde, a comparação de M7b não prova nada (L-36 global).
5. Matar o servidor. **Pode tocar:** só `/var/tmp/qa-ed7/m0/`. **Proibido:** apagar ou sobrescrever `ref3`; mexer no repo.

**Aceite:** os 8 hashes iguais, listados no relatório, com o comando usado por extenso.

### M1. Receita, conversor e seções à mão sem arte nova, `frontend-engineer`

**O que passa pelo conversor (receita):** 3, 4, 5, 6, 8 e 16. **À mão, como na #6** (`SITE/docs/content/receitas/edicao-6.php:10-11`):
7, 12, 17, 18 e 19. **Reuso:** 10, 14 e 15. **Ficam para outros M:** 9 (M3), 11 (M2), 13 (M5a).

**Conferido por mim nas fontes da receita (03/11/2026, por Grep, sem rodar o conversor):** o `parser.php:45-46` recusa linha começada em `> ` ou em `#` que não seja `### `, e `parser.php:59-64` recusa HTML cru. Em `edicao-7-reportagem.md`, `-editorial.md`, `-caixa-determinismo.md`, `-galeria-bugs.md` e nas ocorrências 1 e 2 das copies, as linhas `> ` e as tabelas `|` ficam **fora** dos blocos `## pt-BR` e `## EN` (no cabeçalho ou nas Notas). Nos blocos: limpo. Respostas: 40 linhas de prompt (20 e 20, com as três da resposta 18 nos dois idiomas) e **zero `TRADUCAO-PENDENTE`**. Se o passo 2 ainda assim sair 1, é fato novo: PARE.

1. Criar `SITE/docs/content/receitas/edicao-7.php` com exatamente este conteúdo:

```php
<?php

declare(strict_types=1);

/**
 * Receita da Edicao #7 (dado puro, sem comportamento). Fora daqui, de proposito (feitas a mao, como na #6):
 * Cemiterio (7), Errata + Cartas (9, papel pautado), Classificados (10), HQ (11), Proximos (12), Poster (13),
 * Brinde (14), Cupom (15), Programacao (17), Bus (18) e Expediente (19).
 */

return [
    'secoes' => [
        3 => ['tipo' => 'prosa', 'partes' => [[
            'pt' => ['fonte' => 'edicao-7-editorial.md', 'inicio' => '## pt-BR'],
            'en' => ['fonte' => 'edicao-7-editorial.md', 'inicio' => '## EN'],
        ]]],
        4 => ['tipo' => 'sequencia', 'partes' => [
            [
                'pt' => ['fonte' => 'edicao-7-reportagem.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-7-reportagem.md', 'inicio' => '## EN'],
            ],
            [
                'pt' => ['fonte' => 'edicao-7-caixa-determinismo.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-7-caixa-determinismo.md', 'inicio' => '## EN'],
                'envolver' => ['tag' => 'div', 'id' => 'sec-04-determinismo'],
            ],
        ]],
        5 => ['tipo' => 'prosa', 'partes' => [[
            'pt' => ['fonte' => 'edicao-7-copies-curtas.md', 'inicio' => '## pt-BR', 'ocorrencia' => 1],
            'en' => ['fonte' => 'edicao-7-copies-curtas.md', 'inicio' => '## EN', 'ocorrencia' => 1],
            'classe_lista' => 'placar',
        ]]],
        6 => ['tipo' => 'prosa', 'partes' => [[
            'pt' => ['fonte' => 'edicao-7-galeria-bugs.md', 'inicio' => '## pt-BR'],
            'en' => ['fonte' => 'edicao-7-galeria-bugs.md', 'inicio' => '## EN'],
        ]]],
        8 => ['tipo' => 'prosa', 'partes' => [[
            'pt' => ['fonte' => 'edicao-7-copies-curtas.md', 'inicio' => '## pt-BR', 'ocorrencia' => 2],
            'en' => ['fonte' => 'edicao-7-copies-curtas.md', 'inicio' => '## EN', 'ocorrencia' => 2],
        ]]],
        16 => ['tipo' => 'entrevista', 'partes' => [
            [
                'pt' => ['fonte' => 'edicao-7-entrevista-brunus-perguntas.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-7-entrevista-brunus-perguntas.md', 'inicio' => '## EN'],
            ],
            [
                'pt' => ['fonte' => 'edicao-7-entrevista-brunus-respostas.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-7-entrevista-brunus-respostas.md', 'inicio' => '## EN'],
                'verbatim' => true,
            ],
        ]],
    ],
];
```

2. `php /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/scripts/gerar-secoes.php --edicao 7 > /var/tmp/ed7-m1-gerar.txt 2>&1; echo $?` → esperado: `0`, e 12 arquivos em
   `SITE/src/content/edicao-7/{pt,en}/` (`sec-03`, `04`, `05`, `06`, `08`, `16`). Saída 1 traz `arquivo:linha: regra`: **PARE, não mude a fonte, não mude
   a trava**, relate (armadilha: uma fala terminada em ponto nas peças do Gus reprova na R1; texto aprovado só muda com o líder).
3. Conferir a resposta 18: em `src/content/edicao-7/pt/sec-16.php`, a última `<div class="troca">` tem **três** `<p class="fala">` com o prompt
   `brunus@glyfesse:~/entrevista$` depois da pergunta (D8). Idem em en. E `/usr/bin/grep -c 'TRADUCAO-PENDENTE' .../src/content/edicao-7/en/sec-16.php || true` dá **0**: o conversor emitiria o marcador como fala sem reclamar.
4. Reuso: `cp` de `src/content/edicao-6/{pt,en}/sec-10.php`, `sec-14.php` e `sec-15.php` para `src/content/edicao-7/{pt,en}/`. Nesses seis arquivos, trocar só no comentário
   inicial `Recorrente na #6` por `Recorrente na #7`. Conferir `sed -n` que o HTML não mudou: `diff` contra o original mostra só a linha do comentário.
5. **À mão, copiando o desenho do molde da #6 e trocando só o texto:**

| Seção | Molde | Fonte do texto | Conferência (`conferir.php`) |
|---|---|---|---|
| 7 Cemitério | `src/content/edicao-6/{pt,en}/sec-07.php` | `docs/content/edicao-7-cemiterio.md` (duas pedras; os epitáfios já estão no `.md`, linhas `:19-20` e `:28`, e os nomes "Duas pastas, um passado" e "Nunca foi dada" são os rótulos das opções escolhidas pelo líder, `:91`, **não** texto de pedra) | `pt-BR`, `EN` |
| 12 Próximos | `src/content/edicao-6/{pt,en}/sec-12.php` | `docs/content/edicao-7-copies-curtas.md`, ocorrência 5 | `pt-BR 5`, `EN 5` |
| 17 Programação | `src/content/edicao-6/{pt,en}/sec-17.php` | `docs/content/edicao-7-programacao.md`; **a linha `BRINQUEDO-PORTAO-DE-BOLSO` fica como comentário PHP `<?php /* BRINQUEDO-PORTAO-DE-BOLSO */ ?>`** até M6 | `pt-BR`, `EN` |
| 18 O Gus lê o bus | `src/content/edicao-6/{pt,en}/sec-18.php` | `docs/content/edicao-7-gus-le-o-bus.md` | `pt-BR`, `EN` |
| 19 Expediente | `src/content/edicao-6/{pt,en}/sec-19.php` | copies, peças 8, 9 e 10 (ocorrências 8, 9, 10); abaixo | um por ocorrência |

6. **Expediente, o que muda em relação à #6:** **sai** o crédito e a linha da tirinha (`sec-19.php:20` e `:23`). **`:25`** vira a peça 8. **Entra** a peça 9, em `<p class="colo-creditos">`. **`:27`
   fica**, e abaixo dela entra a linha de tradução (decisão do main nas Notas das copies, item 6, letra d): pt *As traduções para o inglês são de agente de IA, aprovadas pelo
   editor.*, en *The English translations are by an AI agent, approved by the editor.* **`:29`** vira *Todos os direitos reservados.* / *All rights reserved.* A nota do editor vem da peça 10. Título e
   data continuam vindo do `$ctx`, nunca digitados. O crédito do Gus Dragon **não entra** no Expediente (Notas das copies, item 6, letra b).
7. Nos comentários iniciais dos partiais à mão, escrever `#7` e a fonte certa. **Notas de produção nunca entram em partial.**
8. `php -l` em cada arquivo de `src/content/edicao-7/`: `for f in .../src/content/edicao-7/*/*.php; do php -l "$f" || exit 1; done` → esperado: sem erro.
9. `php .../scripts/gerar-secoes.php --edicao 7 --verificar; echo $?` → esperado: `0`.

**Pode tocar:** `docs/content/receitas/edicao-7.php`, `src/content/edicao-7/**` (menos 09, 11, 13). **Proibido:** `edicao.css`; as fontes `.md`; as edições 1 a 6.
**Armadilha própria:** partial gerado não se edita à mão (`tests/conversor-deriva.test.php`); os gerados saem das fontes, e esse teste passa a cobrir a #7 sozinho, porque varre toda receita.
**Aceite:** passos 2, 3, 8 e 9 com as saídas esperadas; `conferir.php` com `faltando=0` em cada linha da tabela; relatório lista os 12 gerados e os partiais à mão.

### M2. HQ em CSS, versão A, sem imagem, `frontend-engineer` (primeiro da cadeia do `edicao.css`)

**Fonte:** `docs/content/edicao-7-hq-roteiro.md:9-75` (quadros aprovados, "Versão A (Recomendado)"), Notas `:85-99`. **Molde:** `src/content/edicao-1/pt/sec-11.php:7-16` (`figure.hq` > `div.hq-strip` > `div.hq-q` > `span.hq-n` e `div.crt-tela`);
CSS existente: `edicao.css:1791-1803` (a tira empilha abaixo de 600 pontos e fica em 3 colunas acima).

1. Criar `src/content/edicao-7/pt/sec-11.php` e `en/sec-11.php`: `figure.hq`, `div.hq-strip`, três `div.hq-q`, cada um com `span.hq-n aria-hidden="true"` (1, 2, 3) e `div.crt-tela`. Cada linha de tela é um `<p>`, texto exato do roteiro, ASCII sem acento.
2. O `_` do roteiro **não é texto**: é `<span class="crt-cur" aria-hidden="true"></span>`, numa linha própria (roteiro, `:5`). Quadro 3: a linha da lista não encontrada em `<p class="dim">`; a do veredito com `<span class="pr">`; nada de `.er` (Notas, `:86-88`).
3. A legenda de cada quadro (`ligada.`, `lendo.`, `lendo.`; `on.`, `reading.`, `reading.`) sob o quadro. O `.hq-q` é flex em linha (`edicao.css:1799-1802`), então a legenda não cabe dentro dele: envolver cada quadro num `<div class="hq-q-col">` que contém o `.hq-q` e um `<p class="hq-leg">`.
4. Sem legenda do conjunto (roteiro, `:145`). Sem imagem, sem sprite, sem `role` de personagem. Para quem usa leitor de tela, as linhas já são texto; nada de `aria-hidden` nelas.
5. CSS: acrescentar **ao fim** de `edicao.css` um bloco comentado `§11 (edição #7)`, só com `.hq-q-col{display:flex;flex-direction:column}`, `.hq-q-col .hq-q{flex:1}`, e `.hq-leg` no estilo da legenda da #3 (`edicao.css:2309-2316`, conferir ali o `figcaption`). **Nenhuma regra existente se altera.**
6. `php -l` nos dois; `conferir.php` no roteiro, `pt-BR` e `EN`. **As únicas faltas admitidas** são as que não são texto de página: `FALTA: _` (o cursor) e `FALTA: Quadro 1`, `2`, `3` (en: `Panel 1`, `2`, `3`), os rótulos do roteiro. Qualquer outra: PARE.

**Pode tocar:** os dois `sec-11.php`; o fim de `edicao.css`. **Proibido:** imagem; mudar o roteiro; JS.
**Armadilha própria:** o roteiro (`:104`) deixou sem medir a largura de 3 colunas. Se em 1280 uma linha quebrar, **não encurte texto**: relate. O defeito das faixas é o M7.
**Aceite:** zero `<img`; os dois partiais com três quadros; print em 390 e 1280 ao M9.

### M3. O papel pautado das Cartas e a mancha de suco de uva, `visual-design-director` (segundo da cadeia)

**Fonte de texto:** `docs/content/edicao-7-cartas.md:7-27` e `:31-51` (aprovadas); **Errata:** copies, ocorrência 3. **Molde visual:** `docs/design/mockups/15-gus-no-bus.html:99-145` (folha, fita, pauta, manuscrito), `:162-183` (mancha de uva), `:206-217` (o filtro SVG). Molde da seção: `src/content/edicao-5/pt/sec-09.php`.

1. Criar `src/content/edicao-7/{pt,en}/sec-09.php`, nesta ordem: a Errata (vazia) e depois as falas e o primeiro pensamento das Cartas; a legenda; a folha; o crédito; o pensamento da mancha.
2. A folha: `figure.caderno` > `div.folha-caderno` > `span.fita` (aria-hidden), `div.pauta` > `p.manuscrito`. **O pedido é igual, letra a letra, nas duas línguas** (o papel fica em português, Notas da Cartas, Q3), com `lang="pt-BR"` no `<p>` da página em inglês. **O erro de digitação do Gus Dragon é dele: nada se corrige.**
3. A mancha: `span.mancha.uva.pe` (aria-hidden) dentro de `.folha-caderno`, depois de `.pauta`, e o `<svg>` só do filtro `mancha-uva` (`:206-211`) dentro do partial. O filtro da mancha de chocolate não entra.
4. **A mancha fica fora do texto (memória `project_ideias_do_gus`; `guards_crt_cafe_motion`):** dar à `.pauta` um `padding-bottom` que deixe uma cauda em branco maior que a mancha, ancorar a mancha nessa cauda (`.pe`) e manter o `overflow:hidden` da folha, que corta o resto. Tamanho: `--m-tam` até 90px.
5. CSS: ao fim de `edicao.css`, bloco `§09 (edição #7)`, tudo sob `.conteudo .caderno`, `.conteudo .folha-caderno` e afins, copiado do mock com os valores de lá. A pauta usa `line-height:28px` e `padding-top:56px` (na fase da pauta, `:121-124`, `:144`). Fonte pixel 15px: é o piso para N maiúsculo (armadilha da §3.2).
6. O giro (`rotate:-1deg`) pode gerar rolagem em 390: se o M9 medir rolagem, o conserto é conter a folha, e **não** tirar o giro sem relatar.
7. `conferir.php`: Cartas `pt-BR` e `EN`; Errata com copies, ocorrência 3, nos dois.

**Pode tocar:** os dois `sec-09.php`; o fim de `edicao.css`. **Proibido:** mexer no `.md`; desenhar imagem; regra global de `.mancha`, `.pensa` ou `.fala`.
**Armadilha própria (L-12 do site):** filtro SVG sem dimensão explícita o Gecko descarta. Manter `x`, `y`, `width` e `height` do filtro como no mock (`:208`). A mancha sumir no print é sintoma disso.
**Aceite:** `conferir.php` com `faltando=0`; o pedido igual nos dois idiomas (`diff` dos dois `<p class="manuscrito">`); o print do M9 mostra a mancha, e nenhuma letra sob ela, em 390 e 1280, pt e en.

### M4. Capa (terminal com um registro só) e cards sociais, `visual-design-director`

**Fatos:** `/var/tmp/ed7-fontes/capa-81a8ef1.txt` tem três linhas: SHA completo; `2026-08-21 22:13:24 -0300`; a mensagem. **Molde:** `docs/design/capa-6-placar.html` e `.css` (1200 por 1200, um PNG só para pt e en); `docs/design/og-card-6.html`, `og-card-6-en.html` e `og-card-6.css`; chassi `docs/design/og-card.css` (**não mexer: muda todos os cards**, `:10`).

1. Criar `docs/design/capa-7-registro.html` e `.css`: um terminal com o comando `git log --oneline` e **uma única linha de resultado**, os 7 primeiros caracteres do SHA e a mensagem da linha 3, **copiada do arquivo, sem digitar**. Nada antes nem depois. Fundo e cor dos tokens do site (cabeçalho de `capa-6-placar.css:1-3`; nunca o UI Kit do jogo). A linha de mensagem pode quebrar; mínimo legível na miniatura de cerca de 240 pontos (`capa-6-placar.css:15-18`).
2. Render: `chromium-browser --headless --disable-gpu --hide-scrollbars --force-device-scale-factor=1 --window-size=1200,1200 --screenshot=/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/public_html/assets/edicao-7/capa-registro.png --virtual-time-budget=4000 file:///home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/design/capa-7-registro.html` (método de `og-card.css:14-19`). Esperado: PNG de 1200 por 1200 (`magick identify`).
3. Cards: `docs/design/og-card-7.html`, `og-card-7-en.html` e `og-card-7.css`, no molde da #6. Linha de cima: `vol.1 · #7 · apagar tudo` (en: `delete everything`) e `--edicao 7`. Tagline: o dek aprovado, peça 11, **palavra por palavra** (copies, `:231` e `:237`). Imagem: a capa do passo 2. **A linha `voz` do rodapé do card fica com o marcador `CARD-VOZ-PENDENTE`:** é voz do Gus, vai ao GATE-CAPA com opções do `ux-writer`, e **este agente não a escreve**.
4. Render dos cards com `--window-size=1200,630` e `magick <png> -quality 85`, saída `public_html/assets/og-edicao-7.jpg` e `og-edicao-7-en.jpg`.
5. Abrir e olhar os três arquivos (L-23 do site).

**Pode tocar:** os arquivos novos em `docs/design/`, `public_html/assets/edicao-7/capa-registro.png`, `public_html/assets/og-edicao-7*.jpg`. **Proibido:** `og-card.css`; a ficha.
**Aceite:** hash de 7 caracteres e mensagem iguais ao arquivo-fonte (o relatório cola as duas versões); tamanhos exatos; nenhum nome de pessoa nem caminho de máquina na arte; os três abertos e olhados. Regerar os dois cards se o `voz` mudar.

### M5. O pôster na Seção 13 (M5a) e a linha do rodapé (M5b)

**M5a, `frontend-engineer`, sem CSS novo.**

1. Copiar `src/content/edicao-5/{pt,en}/sec-13.php` para `src/content/edicao-7/{pt,en}/sec-13.php`.
2. Reescrever o comentário PHP do topo: a imagem é a do líder, gerada no Grok Imagine (03/11/2026), declarada na ficha e no rodapé. **Fica o aviso de `image-rendering:pixelated`, herdado de `.chapa.retrato`, só que a decisão é a da pergunta Q1 da §8.3.**
3. Trocar os textos pelos da peça 6 das copies, linhas `:135-141` (pt) e `:147-153` (en), na mesma ordem do molde: `kicker`, `titulo`, `tarja`, a ficha (`b` com o tamanho e o resto como está na peça), o `alt`, e as duas linhas de `credito`. `img src="/assets/edicao-7/poster-edicao-7.jpg" width="1408" height="1408"`. Mantém moldura, cortes, registro, barra e vinco.
4. `magick identify` do JPG → 1408 por 1408. Outro valor: PARE.
5. `conferir.php` com copies ocorrência 6, pt e en.

**M5b, `backend-engineer`, SÓ DEPOIS DE M7b VERDE (a memória `reference_disclosure_ia_e_licenca` manda a linha crescer a cada arte nova).**

1. Antes: guardar o HTML da #5 e da #6, nas duas línguas, em `/var/tmp/qa-ed7/m5b-antes/` com `curl -s`, servidor em 8097.
2. `src/i18n/pt.php:264`. Trecho antigo exato: `Grok Imagine (logo, tratado)`. Trecho novo: `Grok Imagine (logo, tratado; pôster, gerado)`.
3. `src/i18n/en.php:257`. Trecho antigo exato: `Grok Imagine (logo, refined)`. Trecho novo: `Grok Imagine (logo, refined; poster, generated)`.
4. Conferir: `/usr/bin/grep -c 'pôster, gerado' src/i18n/pt.php || true` dá 1; `/usr/bin/grep -c 'poster, generated' src/i18n/en.php || true` dá 1.
5. Depois: `curl` de novo, em `/var/tmp/qa-ed7/m5b-depois/`, e `diff`. **Esperado: em cada um dos 4 arquivos, uma única linha muda, a do rodapé.** Qualquer outra: PARE (mudança só no bloco do cupom é voto, e se relata como tal).

**Aceite M5:** `conferir.php` com `faltando=0`; o `diff` da M5b só com o rodapé. O post do X **não** declara (decisão do líder de 05/09/2026, na mesma memória): nenhum agente acrescenta.

### M6. O portão de bolso na página, `frontend-engineer` (terceiro da cadeia)

**Fatos:** `public_html/assets/js/portao-bolso-core.js` e `tests/portao-bolso-core.test.js` existem; a camada DOM não. O núcleo expõe `TEXTOS`, `PASTA_IDS`, `pasta(id)`, `conferir(itens)`, `contagem(r, idioma)` e `mensagem(r, idioma)` (`:135-142`). Textos aprovados: "Aprovo como estão". **A camada DOM não contém texto: lê do núcleo.**

1. Criar **primeiro** `tests/portao-bolso-dom.test.js` (`node:test`, sem dependência), com um `document` falso em memória: elementos com `dataset`, `textContent`, `hidden`, `addEventListener`, e `raiz.querySelector`/`querySelectorAll`. Exigir de `require('../public_html/assets/js/portao-bolso.js').montar(raiz, Core, idioma)`:
   a. sem raiz (`null`), não lança e devolve `false`;
   b. com raiz, esconde o bloco `.pb-semjs` e mostra o `.pb-comjs`;
   c. pasta `vazia` + conferir: a saída tem `Core.mensagem` de recusa e a contagem com `encontrados=0`; nunca o texto de `limpo`;
   d. pasta `limpa` + conferir: o texto de `limpo`; `cheia`: o de `acusa`.
2. `node --test /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/tests/portao-bolso-dom.test.js > /var/tmp/ed7-pb-red.txt 2>&1; echo $?` → **esperado: diferente de 0** (L-35 global). Se der 0, PARE.
3. Criar `public_html/assets/js/portao-bolso.js`: UMD leve como o núcleo, nunca ESM; expõe `montar`; no navegador, em `DOMContentLoaded`, procura `#portao-bolso`, lê `data-idioma`, e sai cedo se não houver (padrão do `cupom.js`, comentário em `src/templates/edicao.php:154-158`). Sem `fetch`, sem armazenar nada.
4. Repetir o comando do passo 2 → **esperado: 0**, `# fail 0`.
5. Montar nos dois `sec-17.php`, **trocando o comentário** `BRINQUEDO-PORTAO-DE-BOLSO`: `<div class="portao-bolso" id="portao-bolso" data-idioma="pt">` (en: `en`) com título, instrução, **`div.pb-semjs`** e **`div.pb-comjs hidden`**. **Sem JS, a `pb-semjs` mostra as três pastas, cada uma com a resposta pronta** (texto igual ao de `TEXTOS`, nas duas línguas, `core.js:27-56`). A `pb-comjs` tem os três botões de pasta (`data-pasta`), o botão conferir, e a saída com `aria-live="polite"`. Botões `<button type="button">`, foco visível.
6. Os dois `<script defer>` entram **no próprio partial da #7**, depois do bloco, com `asset()`, como no molde (`src/templates/edicao.php:159-160`): não tocar `edicao.php`, para a #5 e a #6 não mudarem.
7. Conferir o texto sem JS contra o núcleo: `node -e` que carrega o core e checa que cada texto de `pasta` e `resultado` usado aparece no partial → esperado: nenhum faltando.
8. CSS: ao fim de `edicao.css`, bloco `§17 (edição #7): portão de bolso`, sob `.conteudo .portao-bolso`. Em 390, botões empilham; alvo de toque de 44 pontos no mínimo. `.pb-comjs[hidden]{display:none}`.
9. `/usr/bin/grep -rc 'BRINQUEDO-PORTAO-DE-BOLSO' .../src/content/edicao-7 || true` → soma 0.
10. Subir `PISO_ARQUIVOS` (`scripts/testes.sh:22`) para o total real, contado com `ls .../tests/*.test.php .../tests/*.test.js | /usr/bin/wc -l`. Avisar o main; a suíte completa roda na M8a, não aqui.

**Pode tocar:** `tests/portao-bolso-dom.test.js`, `public_html/assets/js/portao-bolso.js`, os dois `sec-17.php`, o fim de `edicao.css`, a linha 22 de `scripts/testes.sh`. **Proibido:** `portao-bolso-core.js`; `src/templates/edicao.php`; three.js; automação de janela ou de entrada (L-50 global).
**Aceite:** os códigos de saída dos passos 2 e 4 no relatório; marcador zerado; peso em bytes dos dois JS; print sem JS no M9.

### M7. O conserto do terminal em 390 pontos (O11; D15), só sob classe nova usada na #7

**M7a, `frontend-engineer` (último da cadeia).**

1. Abrir o print citado em `TODO.md`, item `TERMINAL-WRAP-390`: `qa-prod/crop-b-pt390-prog.png`, do QA em produção da #6. Se não achar, PARE e peça o caminho ao main.
2. Capturar a Programação da #7 em 390 (M0, com o servidor da #7) e achar a regra responsável em `edicao.css:1725-1776`. **Relatar qual é e por quê, com a evidência, antes de mudar.** **Eu não diagnostiquei.**
3. Corrigir **só** num bloco novo no fim de `edicao.css`, sob `.crt-tela.crt-v7` (ou `.crt-scr.crt-v7`). **Nenhuma regra existente se altera; nenhum seletor sem `.crt-v7`.**
4. Aplicar a classe em **todo** `crt-tela` da #7: `/usr/bin/grep -rln 'crt-tela' .../src/content/edicao-7`; esperado: ao menos `sec-11` e `sec-17`, pt e en. Os partiais gerados não têm `crt-tela`; se aparecer em um gerado, PARE.
5. Conferir: `/usr/bin/grep -c 'crt-v7' .../src/content/edicao-5/pt/sec-17.php .../src/content/edicao-6/pt/sec-17.php || true` → 0 nos dois.

**M7b, `qa-engineer` (pesado; depois de M2, M3, M6, M7a e **antes** de M5b e M8a).**

1. Com o mesmo comando do M0, capturar as 8 combinações da #5 e da #6 em `/var/tmp/qa-ed7/pos7/`.
2. `sha256sum` de cada uma contra a `-a` de `/var/tmp/qa-ed7/ref3/`. **Esperado: os 8 iguais. Um diferente reprova o conserto:** devolver ao M7a. **Não** regravar a referência. **Exceção a relatar, não a reprovar sem olhar:** o cupom (`src/includes/cupom.php`) mostra percentuais do poll, e um voto entre as capturas muda a página. Diferença só na região do cupom é voto, não CSS: o relatório mostra o recorte.
3. Se todos iguais, sabotagem de estreia numa cópia do CSS **fora da árvore** (L-27 global): servir uma cópia do site com uma regra base do `.crt-tela` alterada, capturar uma combinação, e ver o hash **mudar**. Sem isso, a comparação pode estar cega.
4. Print em 390 da Programação da #7, pt e en: nenhuma faixa cobre texto.

**Aceite (D15):** na #7, nenhuma faixa cobre texto em 390 pontos, pt e en; os 8 hashes da #5 e da #6 iguais; a sabotagem mudou o hash. O relatório traz o print antes e depois.

### M8. A ficha e a publicação, `backend-engineer`

**M8a, a ficha, `estado` ainda `rascunho` (depois de M7b).** `data/edicoes.php:317-331`, mantendo o `estado`:

```php
'data'         => '2026-08-21',
'titulo_pt'    => 'Apagar Tudo',
'titulo_en'    => 'Delete Everything',
'dek_pt'       => <copies, linha 231, palavra por palavra>,
'dek_en'       => <copies, linha 237, palavra por palavra>,
'frame'        => '/assets/edicao-7/capa-registro.png',
'frame_alt_pt' => <PROPOSTA ao GATE-CAPA: Um terminal de fósforo verde com o histórico de um repositório: um único registro, o da fundação, e nada antes dele.>,
'frame_alt_en' => <PROPOSTA ao GATE-CAPA: A green phosphor terminal showing a repository's history: a single entry, the founding one, and nothing before it.>,
'og_image'     => '/assets/og-edicao-7.jpg',
'capa_en'      => '/assets/og-edicao-7-en.jpg',
```

Sem `uptime` ainda. Depois: suíte completa, avisando o main: `.../scripts/testes.sh > /var/tmp/ed7-suite.txt 2>&1; echo $?` → esperado: `0`, última linha `ALL GREEN`. Os testes-guarda injetam card e frame em memória na #7 (`tests/og-banca-ed.test.php:222-237`; `tests/linha-tempo-vazia.test.php:148-167`) e só exigem `estado` rascunho, então a ficha cheia não deveria reprová-los **[INF]**; se reprovar, PARE.

**M8b, no ato da publicação, **só depois do GATE-GO do líder**, tudo num commit só, com a suíte antes do push:**

1. Uptime: `UPTIME_DIR_JOGO=/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld UPTIME_DIR_GLINTFX=/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GlintFx /home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/scripts/uptime-sessoes.sh --php` (`TODO.md`, item `UPTIME-DIRS`; `uptime-sessoes.sh:31`) → colar o bloco na ficha, com a hora da captura em comentário, como `data/edicoes.php:297`.
2. `estado` da #7 passa a `publicada`. Atualizar o título do bloco (`── #7 · APAGAR TUDO`) e um comentário como o da #6 (`:271-273`).
3. Criar a #8 logo abaixo, no mesmo molde vazio de `:301-331`: `numero` 8, `slug` `edicao-8` e `edition-8`, `estado` `rascunho`, títulos e dek vazios, `frame` nulo. No comentário dela, as menções passam de #6, #7 e #8 para #7, #8 e #9.
4. Migrar as fixtures de teste (**o guarda ficaria vermelho sem isto**, comentário em `data/edicoes.php:309-316`):
   - `tests/og-banca-ed.test.php`: linhas `128`, `222`, `228`, `233`, `239`, `242`, `243`, `245`: `#7` vira `#8`; `$por_numero[7]` vira `[8]`; `=== 7` vira `=== 8`; `render_com_ed('7'` vira `'8'`; `?ed=7` vira `?ed=8`; `$rasc_7` vira `$rasc_8` em todo o arquivo.
   - `tests/linha-tempo-vazia.test.php`: linhas `148`, `151`, `156`, `157`, `161`, `171`: mesma troca; `data-num="7"` vira `data-num="8"`.
   - **Não** mexer em `tests/og-image.test.php:50-77` nem em `tests/capa-estante.test.php:45`, que usam a #7 como dado em memória.
   - Conferir: `/usr/bin/grep -n 'rascunho' tests/og-banca-ed.test.php tests/linha-tempo-vazia.test.php` só cita a #8.
5. Varredura: `/usr/bin/grep -rlE 'CARD-VOZ-PENDENTE|BRINQUEDO-PORTAO-DE-BOLSO|TRADUCAO-PENDENTE|ENTREVISTA-PENDENTE|REUSO-EDICAO-1|EPITAFIO-DO-LIDER' src/content/edicao-7 docs/design/og-card-7*.html public_html/assets/og-edicao-7* 2>/dev/null | /usr/bin/wc -l` → **esperado: 0**; e `find src/content/edicao-7 -name 'sec-*.php' | /usr/bin/wc -l` → **esperado: 34** (zero arquivos é varredura quebrada).
6. Suíte completa → esperado: `0` e `ALL GREEN`. **O main commita, confere, faz o push e confere com `git ls-remote`.** **O deploy é do líder, com autorização naquela ocasião (L-11 do site).** O post linka `/pt/?ed=7`, e **o líder posta** (L-20 do site; `PIPELINE-EDICAO.md` §1.5).

**Pode tocar:** `data/edicoes.php`, os dois testes. **Proibido:** deploy; `git push`.

### M9. QA da edição inteira, `qa-engineer` (pesado, independente de quem construiu)

1. Servidor da #7 (cabeçalho da §8). Capturar pt e en, em 390 e 1280, com o comando de M0 e a altura de `ref3`, em `/var/tmp/qa-ed7/m9/`. **Um segundo perfil, com `user_pref("javascript.enabled", false);` em `user.js`,** para os mesmos quatro prints sem JS.
2. **Abrir e olhar cada print, recortando por seção** (Read aceita imagem; `magick -crop`). A fonte pixel se amplia só com nearest-neighbor (L-06 do site).
3. **Rolagem horizontal em 390:** `curl -s` da página para `/var/tmp/qa-ed7/m9/med.html`; inserir, com `sed` antes de `</body>`, `<base>` no `<head>` e um `<script>` que escreve `document.documentElement.scrollWidth` e `clientWidth` em letras grandes no topo da página; capturar esse arquivo por `file://` em 390 e ler o print. **Esperado: os dois iguais a 390**, pt e en.
4. Checklist, item a item, com print de prova:
   a. as 17 seções, nenhuma com `.scaffold`; capa, dek e índice com os três links;
   b. Reportagem e caixa, com a âncora `#sec-04-determinismo`;
   c. Entrevista com as 18 trocas; resposta 18 em três falas; a resposta 12 e as outras com ponto, como vieram;
   d. HQ: três quadros, nenhum `<img>`, cursor piscando na página e nenhuma linha de "tudo certo" antes da pista;
   e. Cartas: folha pautada, mancha visível **e fora do texto**, nos quatro prints;
   f. Pôster: imagem inteira, ficha e `alt` certos; `image-rendering` conforme a Q1;
   g. Terminal em 390: nenhuma faixa cobre texto (M7);
   h. Brinquedo: com JS, os botões; sem JS, as três respostas, sem nada quebrado;
   i. Expediente: as linhas da peça 8 e 9; nenhum crédito de artista; rodapé com "pôster, gerado";
   j. Nenhum nome real, handle nem tela pessoal (L-01, L-02 do site).
5. **Consultar o console:** `firefox` headless não mostra; `grep` em `/var/tmp/qa-ed7/prev7.log` por `PHP Warning`, `PHP Fatal` e `404` → esperado: 0, fechando com `|| true` e testando o valor. **Piso:** o log não pode estar vazio (zero requisições é servidor errado).

**Pode tocar:** só `/var/tmp/qa-ed7/m9/`. **Proibido:** corrigir; o QA só reporta. O relatório vai incrementalmente para `/var/tmp/qa-ed7/m9/RELATORIO.md` (L-13 global).
**Aceite:** cada item com PASSOU ou FALHOU e o caminho do print. **O main re-confere e só então o print vai ao líder** (L-06 do site). Render novo vai ao GATE-RENDER item a item.

### 8.2 Quem faz o quê, resumido

M0, M7b, M9: `qa-engineer`. M1, M2, M5a, M6, M7a: `frontend-engineer` (instâncias separadas, sem cruzar arquivo). M3, M4: `visual-design-director`. M5b, M8: `backend-engineer`. Copy do `voz` do card: `ux-writer`, só as opções, ao GATE-CAPA.

### 8.3 O que depende do líder (uma pergunta por decisão; recomendada primeiro)

| # | Pergunta | Opções | Quando |
|---|---|---|---|
| **Q1** | **O pôster da #7 herda o serrilhado da moldura, como o da #5?** (`src/content/edicao-5/pt/sec-13.php:12-16`: o líder manteve o `pixelated` em 05/09 depois de ver a comparação, e a regra diz "não trocar sem nova ordem") | **(a) Herda, e ele decide vendo o print.** (b) Suave só na #7, sob classe nova | com o print de M5a |
| **Q2** | **O Expediente ganha a linha do brinquedo?** (a linha nunca foi levada ao gate; ficou fora dos onze blocos, Notas das copies, item 1.7) | **(a) Não: o rodapé de toda página já declara que o código é feito com Claude.** (b) Sim, a linha proposta | antes de M1, passo 6 |
| **Q3** | **Qual é a linha `voz` do card social?** (é voz do Gus; o `ux-writer` traz as opções) | Opções do `ux-writer`, a recomendada primeiro | GATE-CAPA |
| **Q4** | **O `frame_alt` da capa é o da M8a?** | **(a) Sim, como está.** (b) Outro, ditado por ele | GATE-CAPA |

Os gates de sempre continuam: GATE-RENDER por peça, GATE-CAPA, GATE-GO; o deploy é manual, com autorização naquela ocasião.
