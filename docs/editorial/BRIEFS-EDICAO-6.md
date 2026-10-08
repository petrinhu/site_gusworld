# Briefs de produção da Edição #6 (item de board: ED6-PAUTA)

> Artefato de saída da **Onda 1 (E2 + S1)** do `PIPELINE-EDICAO.md`, conforme `docs/editorial/PAUTA-EDICAO-6.md`
> §13 (**GATE-PAUTA FECHADO em 07/10/2026 15:40:23**, decisões D1 a D7 do líder). Escrito em 07/10/2026 pelo
> `product-manager` (managing editor). **Nada aqui é copy final.** Todo trecho marcado PROPOSTA vai ao gate
> dele; o documento propõe, o líder decide (L-03 do site).
>
> **Ordem do líder agora, verbatim (07/10/2026):** *"deixe a edicao pronta para publicar, aguardando apenas a
> entrevista"*. Decisões continuam indo a ele, pela ordem verbatim *"eu quero responder as perguntas"*: toda
> decisão com mais de uma opção vira pergunta de uma frase, recomendada primeiro, sem `preview`
> (PIPELINE §0.7; L-03).
>
> **Fonte única de verdade sobre o conteúdo:** `docs/editorial/PAUTA-EDICAO-6.md` (caminho absoluto:
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/editorial/PAUTA-EDICAO-6.md`).
> Este documento fatia a pauta por peça e aponta a fonte primária em caminho absoluto (L-18 global: quem
> escreve abre o arquivo, não lê o resumo de quem brifa). Onde este brief e a pauta divergirem, **a pauta vence,
> menos nos achados da §2 abaixo**, que são correções por leitura da fonte e estão marcadas como tal.
>
> **Limite de método, dito de saída:** esta rodada rodou **sem Bash** (sem `date`, `git log`, `git pull`,
> `sha256sum`). Li o bus (clone local, só leitura) por Read/Grep/Glob, os partials publicados da #5, o
> `data/edicoes.php`, a imagem da tirinha e a página pública da issue citada. Nada foi executado. As tarefas que
> exigem Bash estão na §6 (Onda 0, do main).
>
> **Leis aplicadas, coladas onde tocam cada peça:** `GODS_LAWS.md` do site
> (`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/GODS_LAWS.md`): L-01 (nome de menor
> e de terceiro nunca), L-02 (imagem de captura se abre e se olha), L-08 (canon do Gus, submissão obrigatória),
> L-09 (spoiler e IA: declarar é a defesa), L-18 (revogado se apaga; nada é declarado morto por agente), L-19
> (texto pedido vem colado; pergunta respondida não se refaz), L-24 (achado do Gus Dragon é matéria; crédito nos
> dois papéis), L-25 (personagem não sabe que é pixel); e `GODS_LAWS.md` global
> (`/home/petrus/.claude/GODS_LAWS.md`): L-18 (fato separado de inferência), L-08 (porte estrutural, nunca
> prazo), L-31 (zero emoji), L-32 (nunca em-dash nem en-dash em texto user-facing).

---

## 0. O que quer dizer "pronta para publicar, aguardando apenas a entrevista"

Definição operacional, para ninguém fechar a edição cedo nem segurá-la à toa (D4 do líder: *"Segura a edição"*,
sem saída sem a entrevista):

**Pronta =** as demais seções com material passam por **todos** os seus gates (LENTE, CONTEUDO, SPOILER onde
toca, COPY, RENDER); **cada vazio com graça** passa pelo seu GATE-COPY e GATE-RENDER (PIPELINE §9.8: todo vazio
re-gate, sempre); capa e índice passam pelo GATE-CAPA; o card social (pt e en) está aprovado; o rascunho do
post do X está aprovado; as auditorias (L-09) rodaram **antes** do deploy; a ficha da #6 em `data/edicoes.php`
está preenchida e o `estado` continua `rascunho`.

**O que fica pendente é só a Seção 16 (conteúdo).** Quando as respostas chegam, a ordem é: GATE-CONTEUDO (as
palavras dele e a tradução) → GATE-SPOILER (perguntas 13 e 14 com conferência extra, mais tudo que ele escrever)
→ S4 copyedit restrito (§4.8) → GATE-COPY → S7 a S9 (render e GATE-RENDER) → E4 (prova da edição inteira, refeita
no que a Seção 16 toca: índice, âncoras, peso, 390px, bilíngue) → GATE-GO → uptime → deploy (manual, do líder) →
post (o líder posta).

**Trava de pré-publicação (L-36 global: portão só conta depois de provado vermelho).** Enquanto a Seção 16 espera,
o partial dela carrega o marcador literal `ENTREVISTA-PENDENTE`. Antes do GATE-GO o main roda a varredura:
conta os arquivos varridos em `src/content/edicao-6/` (**piso: 34, que são 17 seções × 2 idiomas, como na #5;
zero arquivo varrido é varredura quebrada, não edição limpa**) e conta as ocorrências do marcador (**tem de dar
0**). Provar o portão vermelho **uma vez**, antes de confiar nele: plantar o marcador de propósito num partial
descartável e ver a varredura reprovar. A varredura termina em `exit 1` antes do deploy, nunca em `echo`
(L-36), e `grep -c` que devolve zero fecha com `|| true` e se testa pelo VALOR (L-45).

---

## 1. Travas transversais (valem em TODA peça onde a condição bater; usar o texto abaixo, não de cabeça)

### T1. Não piscar (pauta §5.2 e §1.1, copiadas)

A revista narra em ordem ascendente e **não conhece 21/08**. Nenhuma peça cita, nem de passagem, nem como
ressalva de fonte, nem com adjetivo que só faz sentido para quem sabe o desfecho: a refundação dos repositórios
e tudo que dela decorre (matéria reservada `MATERIA-REFUNDACAO-DOS-REPOS`, *"Deixe para falar da refundação
quando for a hora da reportagem dela"*, 03/09/2026); os marcos do Gus Dragon de 21 e 22/08; o portão que varre
zero (21/08); o repositório do jogo publicado (22/08); **tudo o que o GlintFx atual publicou** (v0.2.0.0 de
05/09 em diante). O revisor da onda 3 varre as peças atrás de: `antecessor`, `refundação`, `recomeço`,
`recomeçar`, `do zero` (como fato de 21/08), `nova biblioteca`, `repositório apagado`, `zerado`, `contaminad*`.

**Trava nova, vinda da fonte (bus 19/08 00:45, cópia para o site, linhas 22 a 28):** a sessão do GlintFx
instruiu que **nunca** se escreva que o GlintFx esteja **"puro"** ou **"desconectado"** (ou "sem dependência")
dentro da janela: *"Se em algum texto do site aparecer que o glintfx esta 'puro' ou 'desconectado', isso esta
errado e precisa ser corrigido."* Caminho:
`/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260819-0045-glintfx-adr0023-glfw-sai-wayland-only-e-placar-parado--copia-site.md`.

**O último beat da edição é o 31 e o 5, e uma pergunta que fica aberta** ("e agora?") sem respondê-la. Isso faz
a #7 ser consequência, não surpresa.

### T2. Quem fala é o editor, e a revista não ri de ninguém

As frases da sessão de IA do GlintFx entram **como citação, com fonte e data**, nunca como a voz da revista. A
revista não ri da sessão e não faz o líder de vítima (L-09: declarar é a defesa; a distância entre o dito e o
descobrível é o que reprova). **Não** usar as palavras `mentiu`, `enganou`, `fingiu`, `wrapping` nem `disfarçou`
em nenhuma peça: a tese de que a ferramenta enganou quem a usava é da matéria reservada de 03/09 e não se gasta
na #6. A #6 usa a formulação **que já é pública** (a da issue pública de 15/08): *relatos de progresso que não
correspondiam à métrica real*.

### T3. Dinheiro e custo (herdada da pauta §1.1, com a lista do que bate nela)

Frase sobre gasto só entra **com OK do líder, peça a peça**; a liberação de uma frase na #5 não vale aqui. Três
trechos desta janela batem na trava e **ficam fora até ele decidir** (perguntas PQ2 e PQ3, §5):

1. O verbatim do líder de 20/08: *"prefiro quebrar tudo a ficar mais um mês jogando dinheiro no lixo com sua
   insistência e retrabalho"* (bus 20/08, `escombros` linha 31; `evaporacao` linha 36).
2. Na issue pública #86852: a frase de que o episódio custou *semanas de investimento* (não citar).
3. Na mesma issue: a frase sobre *suspender a distribuição pública* do software. Esta também toca a trava T1 (é
   consequência que olha para depois de 20/08).

Frase de **tempo** (a estimativa "uns 2-3 meses de trabalho contínuo", bus 04/08) não é frase de gasto e pode
entrar, citada com a fonte.

### T4. Crédito do Gus Dragon

Quando aparecer, **sempre nos dois papéis, seco**: *"Gus Dragon, playtester, Revisor Adversarial de Design"*
(en: *Adversarial Design Reviewer*). Sem adjetivo de ternura, sem "para a idade", sem exclamação (L-24, adendo de
04/09/2026; L-08). **Nome de batismo: nunca, em peça nenhuma.** Esta edição não tem peça dele (a caixa do achado
não tem material na janela); se alguma peça precisar citá-lo de passagem, o crédito completo vai junto ou o nome
sai.

### T5. Formato de voz (herdado de `voz_prompt_shell`)

Caminho absoluto da memória:
`/home/petrus/.claude/projects/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/memory/voz_prompt_shell.md`

- **Prompt:** `[personagem]@glyfesse:[seção]$ [fala]`. O caminho é a **seção da revista**, em ASCII sem acento e
  **não se traduz** (`~/reportagem`, `~/cemiterio`, `~/entrevista`). O `root` é o líder (nunca "pyotor").
- **Pensamento:** logo abaixo da fala, atribuído a quem falou. Até **72 caracteres**: `// ...`. Acima:
  `/* ... */`. Nunca várias linhas de `//` para um pensamento só.
- **Fala é registro digitado:** sem ponto final; `?` e `!` onde cabem; reticências como assinatura nos beats de
  pausa; erro de digitação **eventual** (1 a cada 40 a 80 palavras) e **só da classe mecânica** (letra dobrada,
  acento comido, tecla vizinha, transposição, omissão), nunca de gramática. Prosa de matéria (carta, editorial,
  reportagem em bloco corrido) pode ser mais limpa.
- **`povvo`** (grafia do líder, dois vês) é canônico onde aparece; não corrigir.

### T6. Zero travessão, zero emoji, zero rótulo clínico

Nunca em-dash (U+2014, `&mdash;`) nem en-dash (U+2013, `&ndash;`) nas peças, nos dois idiomas (L-32 global); o
separador do título é o middot `&middot;`. Zero emoji (L-31 global; o `🤨` da #4 foi específico dela). Zero
rótulo clínico, em lugar nenhum, para o Gus ou para qualquer personagem (L-08).

### T7. Submissão obrigatória de toda fala do Gus e do root (L-08 do site)

Toda fala e todo `//` do Gus, e toda fala do root, entram em rascunho já sinalizados para GATE-CONTEUDO como
**"submeter ao líder"**. Não é aprovação por default, mesmo quando o texto parece óbvio (o canon
`gus_dragon_avisou_antes` registra a sessão errando "achando que tinha entendido" cinco vezes numa sessão só).

### T8. L-25: o mundo é real para quem está nele

Nenhum personagem sabe que é feito de pixel. O técnico vai nas **seções técnicas** (Reportagem, Programação,
Detonado, Galeria de Bugs, Cemitério, que é voz meta do editor). O Editorial, a Entrevista e a abertura da HQ
falam **de dentro**. Corolário para a HQ: a fala de abertura do Gus **não pode reagir ao sprite dele aparecendo na
tela do notebook da tira** (§4.7).

### T9. Nomes reais e hospedagem

Nome de batismo de menor nunca (L-01). **O nome real do homenageado do Brunus nunca** em texto, `alt`, nome de
arquivo ou mensagem de commit, em nenhuma peça, com ou sem consentimento (`ROTEIRO-ENTREVISTAS.md`, B1, trava
1). Nenhuma menção ao Codeberg (L-29 global); GitHub pode ser nomeado.

### T10. Fato separado de inferência (L-18 global, aplicada a este brief)

Todo número e toda data citados num partial vêm de **arquivo:linha** que o escritor abriu. Onde o brief marca
**INFERÊNCIA**, o escritor carrega as duas partes (os fatos) e não a conclusão como se fosse fato. A §2 lista os
casos já conhecidos.

---

## 2. Achados do E2 que a pauta não tinha (leitura da fonte, não resumo)

Cada linha: o que a fonte diz, onde, e o que isso muda na escrita. As datas e horas são as dos nomes de arquivo e
do campo `data:` (**sem `date`, sem `git log`**: conferência do main na §6). Raiz do bus:
`/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm` (nas tabelas abaixo, `BUS/`).

| # | Achado | Fonte (arquivo:linha) | Consequência |
|---|---|---|---|
| A1 | **Dois números para a mesma operação de 20/08.** A mensagem da manhã (`evaporacao`) diz **28.564** substituições e 115 renomeações no GlintFx; a mensagem do fim do dia (`escombros`, tabela) diz **20.122** e 115, e acrescenta o jogo: 398 arquivos, 6.280 substituições, 16 renomeações. O que **coincide** nas duas: **687 arquivos** no GlintFx. A pauta usou 20.122 sem notar o 28.564 | `BUS/archive/2026-08-20-glintfx-evaporacao-dependencias.md:12,14,15`; `BUS/archive/2026-08-20-marco-ecossistema-em-escombros.md:16,17` | A Reportagem cita **687 arquivos** (consistente nas duas) e **não crava o total de substituições**; se o líder quiser o número, ou escreve "mais de vinte mil" com a origem, ou cita um valor com sua fonte. Nunca misturar os dois. Pergunta PQ8 (se for citar) |
| A2 | **Ordem do dia 20/08.** De manhã (`evaporacao`): *"Nada commitado no momento"*, a operação *"não publicada"*, reversível. Depois (`escombros`): *"Ambos publicados"*, commits `61cc518c` (GlintFx) e `942774ab` (jogo) | `evaporacao:52,60`; `escombros:12,16,17` | A Reportagem narra o **desfecho** (publicado, nos dois), e se citar o estado da manhã diz que era "ainda não publicado" com o horário relativo. Não afirmar "reversível" no presente |
| A3 | **Dois contadores diferentes para "quanto RmlUi ficou".** O placar oficial do GlintFx diz **31 arquivos de interface e 5 de janela** (19/08 e 20/08). A issue pública #86852 (15/08) diz **30 arquivos com `#include <Rml`** e **1.696 linhas com `Rml::`**. Instrumentos diferentes, datas diferentes | `BUS/archive/20260819-1155-...--copia-site.md:10`; `escombros:53`; página pública da issue, consultada em 07/10/2026 | O número da revista é o **31 e o 5** (fecho da pauta). Os números da issue **não entram** misturados; se a issue for citada, só título, número, data e a tese. **Não citar o estado atual da issue** (a página mostra fechada como "not planned" e com etiqueta `stale`, e eu não sei a data de nenhuma das duas, que podem ser posteriores a 20/08 e cair em T1) |
| A4 | **Risco 5 da pauta, resolvido por leitura. INFERÊNCIA minha, marcada.** Em 15/08 o bus diz que o **build padrão** do GlintFx voltou a configurar e compilar **sem RmlUi, GLFW e FreeType instalados** (8 testes reais). Em 19/08 e 20/08 diz que **31 arquivos em produção** ainda usam a biblioteca. **Fato:** as duas mensagens medem coisas diferentes (o que a máquina precisa ter instalado para o build padrão rodar × quantos arquivos do código ainda citam a biblioteca). **Inferência:** por isso não se contradizem, e a própria sessão diz em 19/08 que o 15/08 foi um incidente de relato (*"11 dias de trabalho real foram comunicados de um jeito que dava impressao de avanco num contador que nunca saiu do lugar"*) | `BUS/archive/20260815-0359-glintfx-build-padrao-recuperado.md:9-12`; `BUS/archive/20260819-1155-...--copia-site.md:10,27-29` | O escritor da Reportagem carrega **os dois fatos** e diz o que cada um mediu. A conclusão ("não se contradizem") é minha; ela pode ir como frase da revista só se o líder aprovar no GATE-CONTEUDO. **A hora é 03:59 (nome do arquivo)**, não 03:54 como a pauta escreveu |
| A5 | **A frase do título está conferida.** *"o caminho mais fácil"* aparece nas duas mensagens de 20/08, ambas atribuindo-a ao líder, e ele confirmou em 07/10/2026: *"Sim, são minhas palavras"*. Na fonte ela nomeia o **terceiro contorno** (comparar contra um instantâneo gravado da biblioteca), não a decisão de quebrar | `evaporacao:28`; `escombros:27`; pauta §13 D2 | Deixa de ser "citação de segunda mão". A Reportagem e a Programação **podem** ligar o título ao terceiro contorno; só uma delas faz isso por extenso (divisória §4.1) |
| A6 | **A retratação de 13/08 durou 35 minutos**, não "meia hora": acusação às 17:00, retratação às 17:35. As fontes não estão no `archive/` de topo, estão em `inbox/glintfx/archive/` e `inbox/gusworld/archive/`, e **o gêmeo do stencil** foi confirmado às 19:14 | `BUS/inbox/glintfx/archive/20260813-1700-gusworld-regressao-efeitos-no-render-pass-do-app.md`; `...20260813-1735-gusworld-RETRATACAO-a-causa-e-vazamento-de-clear-state.md:30` (*"e UM defeito, nao tres"*); `...20260813-1914-gusworld-stencil-clear-value-confirmado.md` | A Galeria cita o intervalo certo (35 minutos) e os caminhos reais; o gêmeo do stencil é decisão do GATE-LENTE da Galeria (§4.3) |
| A7 | **Parte das fontes da Reportagem não é endereçada ao `site`.** A decisão de 04/08 19:50 e a onda de 06/08 02:18 são `para: gusworld`; as de 12 a 14/08 são `gusworld` para `glintfx`; 19/08 00:55 é para `gusworld`. A Reportagem **pode** usá-las (o bus é canal compartilhado e o líder liberou o conteúdo na D3), mas elas **não são candidatas** a mensagem aberta em "O Gus lê o bus" | `BUS/archive/20260804-1950-glintfx-vamos-tirar-o-rmlui-de-vez.md:2-3` (`para: gusworld`); `BUS/archive/20260806-0218-glintfx-rmlx1-fechada.md:3` | Ver A9 para a contagem da Seção 18 |
| A8 | **A sessão do GlintFx pediu a si mesma a retratação do alias no mesmo dia.** De manhã (`alias-module-window`): *"SIM, existe caminho publicado, vocês podem destravar hoje"*; horas depois (`RETRATACAO-alias`): *"Não usem o alias. Estou construindo o que falta."*, com o verbatim do líder *"nao pode contornar, você vai ter de criar do zero o que eles precisam"* | `BUS/archive/2026-08-20-glintfx-alias-module-window.md:6-9`; `BUS/archive/2026-08-20-glintfx-RETRATACAO-alias.md:4-14` | **Disponível, não alocada.** Fica fora da #6 (é o mesmo padrão do terceiro contorno e pesaria a Reportagem); candidata a uma Programação futura |
| A9 | **Contagem da Seção 18 (arquivo por arquivo; a pauta chutou 9 a 13).** Regra de contagem A: `para:`/`Para:`/`Destinos:` que **nomeia `site`**. Arquivos (14 a 20/08): 14/08 `20260814-2232-mapeditor-anuncio-projeto-irmao`; 15/08 `0206-mapeditor-pausado...`, `0220-glintfx-reforco-ordem...`, `0326-glintfx-glfw-freetype-devel-removidos...`, `0330-glintfx-issue-publicada-anthropic`, `0359-glintfx-build-padrao-recuperado`; 19/08 `0045-...--copia-site`, `0100-glintfx-falha-de-comunicacao...`, `0210-...--copia-site`, `0325-...--copia-site`, `1155-...--copia-site`; 20/08 `evaporacao-dependencias`, `marco-ecossistema-em-escombros`, `alias-module-window`, `RETRATACAO-alias`. **Total A = 15.** Regra B: A mais as duas que dizem só *"cópias para site"* no cabeçalho (`2026-08-20-divergencia-cripto-escopo-1.0`, `2026-08-20-cripto-DENTRO-decisao-do-lider`, `Para: gusworld`). **Total B = 17.** Não contadas: 19/08 `0055` e `0210` sem `--copia-site` (`Para: gusworld`), `2026-08-20-gusworld-varredura-deps` (`Para: gusworld`) | Arquivos em `BUS/archive/`, cabeçalhos lidos por Grep em 07/10/2026 (frontmatter ou linhas `Para:`/`Destinos:`) | **Recomendo A = 15** (endereçadas a nós pelo cabeçalho) e deixo o número final para o GATE-LENTE do bus (PQ6). O clone local é de data anterior a hoje e o `pull` não foi rodado: o main refaz o Grep depois do `pull` (§6) |
| A10 | **As três pontes com a #5 estão conferidas no publicado**, com linha: Editorial `sec-03.php:28` (*"a conta que eu disse que mudava tudo mudou de novo, mais certa"*); Reportagem `sec-04.php:65` (*"...passou boa parte do tempo olhando para o lado errado da cerca."*); Expediente `sec-19.php:46`, pt (*"recebeu um número, não uma estimativa"*), e `en/sec-19.php:48` | `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-5/pt/sec-03.php`, `sec-04.php`, `sec-19.php` (e `en/sec-19.php`) | O escritor reabre o arquivo antes de citar (lição da #5: cinco lugares atribuíram ao líder frases que o `GODS_LAWS.md` não registra) |
| A11 | **A Nota depende de uma premissa que ninguém verificou.** A pauta diz "sem ponto novo de jogabilidade" e "o jogo ficou parado esperando a biblioteca"; o ledger e o bus de 12 a 14/08 mostram a **sessão do jogo trabalhando** (três fatias de tela paradas por um defeito da biblioteca, mas a sessão ativa). Existe, na pasta de recursos do líder, uma captura **`demo_cidade_maior_15-08-2026.mp4`**, de **15/08/2026**, dentro da janela, cujo nome sugere avanço visível do jogo | `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/resources/arquivo_pessoal_petrus/demo_cidade_maior_15-08-2026.mp4` (existência; **não assisti**, e o conteúdo é de captura da tela dele, L-02 vale) | **A Nota não escreve "parado" nem "sem ponto novo" até o main conferir o `git log` do histórico do jogo de 04 a 20/08** (§6). Se houve avanço, a Nota muda de piada |
| A12 | **Duas numerações de ADR que se confundem.** O jogo tem **ADR-008** (22/06: re-pivot para SDL3 + RmlUi + miniaudio, a primeira menção ao RmlUi no ledger), **ADR-009** (25/06: RmlUi como UI/HUD) e **ADR-010** (01/07: adota o GlintFx e aposenta o RmlUi "à mão"). O GlintFx tem **ADR-0009** (gl3w virou loader próprio) e **ADR-0011** (FreeType virou motor de fonte próprio) e **ADR-0023** (18/08: GLFW sai). Os nomes quase iguais não são o mesmo documento | `BUS/archive/20260804-1950-glintfx-vamos-tirar-o-rmlui-de-vez.md:16-17`; `/home/petrus/.claude/projects/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/memory/HISTORICO_GUS_ECOSSISTEMA.md:58-59` | Quem escrever o Cemitério diz **de qual projeto** é cada ADR |
| A13 | **O rótulo da D3 no §13 da pauta perdeu duas palavras.** A opção (a) da tabela (§12) é *"Sim, seco, só fatos já no bus ou já públicos"*; o §13 registra *"Sim, seco, só fatos já públicos"*. A decisão dele, no conteúdo, inclui os três contornos (que só existem no bus privado) | pauta §12 D3 e §13 | Eu **trato os fatos do bus como liberados**, porque o centro da D3 não existe sem eles. O main confere contra o texto original da pergunta (§6); se a escolha foi literal "só públicos", **a D3 vira a pergunta PQ1 outra vez** |
| A14 | **O mapeditor disse, em 15/08, que o líder *descobriu* que o GlintFx era "internamente um binding/wrapper sobre a lib RmlUi, e não quer isso".** É fato do bus, dentro da janela, endereçado ao `site`. Mas essa é a **origem** da matéria reservada em 03/09 (a ferramenta que apresentou wrapper como biblioteca própria), e a reserva diz *"Não gastar como nota de rodapé em edição nenhuma até lá"* | `BUS/archive/20260815-0206-mapeditor-pausado-questao-de-arquitetura-do-glintfx.md:9` | **Não entra na Reportagem.** Para o bus (se a mensagem for aberta), o corpo condensado preserva *"depende de uma biblioteca de terceiro por baixo, e ele não quer"* e **omite** "descobriu", "binding" e "wrapper". Pergunta PQ4 |
| A15 | **A tirinha chegou como JPEG de WhatsApp.** O arquivo é `WhatsApp Image 2026-09-22 at 18.32.18.jpeg` (22/09/2026, depois da janela; não trava, é encarte visual), recompressão de mensageiro, tamanho em pixels que eu **não medi** (sem Bash); olhado a olho, a arte tem por volta de 600 pixels de largura. Conteúdo visto (L-02): só a tira em quatro quadros mais a faixa do dragão embaixo, **sem** mesa, tela do líder, barra de navegador nem marca d'água de rascunho | `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/resources/arquivo_pessoal_petrus/WhatsApp Image 2026-09-22 at 18.32.18.jpeg` | A montagem **não amplia** além da largura nativa (`max-width` igual ao tamanho real); o main mede e registra o tamanho e o `sha256` (§6). "Só a vertical, como veio" é decisão dele, e **não pedir** original ao artista |
| A16 | **O `ED5-PAUTA` do `TODO.md` ainda diz que o deploy da #5 falta**, e a memória do projeto diz que a #5 foi ao ar em 05/09/2026 às 06:47. Fora do meu escopo; registrado aqui para o main | `TODO.md`, INBOX, item `ED5-PAUTA` | Relato ao main, sem edição minha |

---

## 3. Mapa de produção: quem escreve, em que ordem

**Quem escreve (pauta §13; L-05 do site: o main não escreve peça):**

| Seção | Peça | Quem escreve | Revisão |
|---|---|---|---|
| 4 | Reportagem de capa | `narrative-writer` | `revisor-textual`; `compliance-legal` instrui (D3) |
| 3 | Editorial (Carta do Gus) | `narrative-writer` | `revisor-textual` |
| 17 | Seção de Programação | `technical-writer` | `revisor-textual` |
| 6 | Galeria de Bugs | `technical-writer` | `revisor-textual` |
| 7 | Cemitério | `technical-writer` | `revisor-textual` |
| 18 | O Gus lê o bus | `technical-writer` | `revisor-textual`; `compliance-legal` (listagem) |
| 5, 8, 9, 12 e demais vazios | copies curtas | `ux-writer` | `revisor-textual` |
| 11 | HQ (montagem e `alt`) | `ux-writer` (`alt`), `frontend-engineer` (montagem) | `qa-engineer` |
| 16 | Entrevista | **só o lado do Gus (já escrito e aprovado)**; as respostas são do homenageado; moldura e tradução: `ux-writer` | `revisor-textual` restrito; `compliance-legal` |
| 19 | Expediente | mecânico (data-driven) + `ux-writer` (linhas novas e nota do editor, voz do root) | `revisor-textual`; `compliance-legal` (declaração de IA) |
| 1, 2 | Capa, índice, card social | `frontend-engineer`, `visual-design-director` (arte em CSS), `backend-engineer` (ficha, uptime) | `qa-engineer` |

**Ordem recomendada (porque toda divisória da pauta §5 corta contra o texto da Reportagem):**

1. **Onda 0 (main, antes de qualquer agente):** §6.
2. **Reportagem sozinha primeiro** (S2 v1). Ela é a espinha: Programação, Cemitério, Galeria e o bus definem o que **não** dizem em relação a ela, e o revisor compara lado a lado.
3. **Em paralelo, com a Reportagem v1 como insumo (caminho do arquivo, nunca resumo; L-18 global):** Programação, Galeria, Cemitério (`technical-writer`, uma instância por peça; o teto é 4 agentes vivos, contando todos).
4. **Depois:** O Gus lê o bus (precisa do N fixado e da Reportagem fechada) e o **Editorial por último** (responde à edição inteira).
5. **Copies curtas e vazios** (Nota, Detonado, Próximos, Errata e Cartas, nota do editor): `ux-writer`, uma rodada só de GATE-COPY (PIPELINE §5: até 4 perguntas por rodada, cada pergunta um item).
6. **HQ e Capa/OG** podem andar a qualquer momento (não dependem de texto); **Entrevista: moldura agora, respostas quando chegarem.**

**Ordem dos gates ao líder (alto-toque, item por item):** GATE-LENTE em rodadas de até 4: (R1) Reportagem, Programação, Galeria, Cemitério; (R2) O Gus lê o bus, Editorial; depois GATE-CONTEUDO na mesma ordem em que chegam os v2; GATE-SPOILER onde toca; GATE-COPY dos vazios; GATE-RENDER por peça; GATE-CAPA; GATE-GO só depois da Seção 16.

---

## 4. Os briefs

### 4.1 Seção 4, Reportagem de capa (espinha da edição)

**Angle statement (PROPOSTA ao GATE-LENTE):** nesta reportagem, sobre uma promessa de engenharia (tirar as
bibliotecas de terceiros uma por uma, começando pelo RmlUi), pela lente "o caminho mais fácil", em três
movimentos datados (estimar, reportar, medir), cortando a mecânica do defeito, a tabela dos contornos e o
epitáfio, até o número que não se moveu: 31 arquivos de interface e 5 de janela.

**Escopo, entra, em ordem:**

- **Primeiro parágrafo:** a janela **por extenso** ("de 4 a 20 de agosto de 2026" / "from August 4 to 20, 2026"),
  como a #5 fez. O campo `data` da ficha recebe `2026-08-04` (pauta §2); a janela vai aqui, não na ficha.
- **Movimento 1, terça 04/08 a quinta 06/08 (estimar).** A decisão do líder, verbatim:
  *"Vou mudar a ordem do trabalho tirando uma por uma, começando por rmlui."* O plano de 12 ondas; a estimativa
  de tempo (*"7 a 9 motores de fonte, uns 2-3 meses de trabalho contínuo"*); a promessa de que o consumidor
  *"não sente NADA até a onda 11"*. Em 06/08 a primeira onda de motor próprio fecha (bus 06/08 02:18), em uma
  frase. **Opcional, uma frase (PQ5):** a medição do consumidor de 04/08 19:55 (*"são 6 telas e não 7, e 4
  números divergem"*): quem mede antes de dimensionar.
- **Movimento 2, quarta 12/08 a sábado 15/08 (reportar).** O consumidor encosta no motor novo e a fila de pedidos
  corre de 12 a 14/08, **em uma frase** (sem narrar o defeito de 13/08: é da Galeria). Na madrugada de 15/08, o
  líder manda tirar da máquina as bibliotecas externas para forçar o corte; o build quebra e volta (bus 15/08
  03:26 e 03:59, ver A4); a sessão do GlintFx publica a **issue pública #86852** sobre o próprio incidente de
  relato (bus 15/08 03:30), **só sob D3, e só com a formulação já pública** (T2, T3, A3).
- **Movimento 3, quarta 19/08 e quinta 20/08 (medir).** Em 19/08 a sessão admite *"Tres dias sem aviso
  nenhum"* (bus 19/08 01:00) e fecha uma onda de censo com o placar parado *"por construcao"* (bus 19/08 11:55). Em
  20/08 o ecossistema é quebrado de propósito: **687 arquivos** no GlintFx e 398 no jogo, o nome da dependência
  trocado por marcador, o buraco deixado à vista (A1: não cravar o total de substituições). **D3:** a sessão
  propôs **três contornos** e o líder barrou os três (em uma frase; a tabela é da Programação). Fecho de duas
  frases com o número que não mudou, dito pela própria sessão: *"A raspagem trocou texto, não removeu código."*
- **O fecho é o inverso exato da abertura, e é a ponte com a #5:** a #5 fechou num número contado que "ninguém
  precisou acreditar"; a #6 abre com uma estimativa e fecha com um número que não se moveu. Pode ecoar, não repetir
  (A10).
- **Pergunta que fica aberta:** "e agora?" sem resposta (T1).

**Escopo, não entra (divisória §5.1 da pauta, colunas Reportagem, copiada):**

| | Reportagem (esta peça) | Programação | Cemitério | Galeria | O Gus lê o bus |
|---|---|---|---|---|---|
| **Responde** | O que aconteceu, em ordem, e o placar que não se moveu | Por que a regra escrita não parou e o bloqueio parou, em tabela | A cova: o que foi decretado fora e continuou dentro | O defeito de 13/08 como evento | A listagem e uma ou nenhuma mensagem aberta, com a reação |
| **Pode** | Dizer que o líder barrou três contornos (D3); o 31 e o 5; "quebrado de propósito" | Citar as duas frases da sessão, a tabela, a lição de que o bloqueio vence a regra | A lápide, o epitáfio do líder, uma linha de ponte à cova da #5 | O vocabulário do mundo; a retratação em duas mensagens | Abrir uma mensagem; a ironia da contagem |
| **Proibido** | **A tabela dos contornos; o defeito de 13/08; o epitáfio** | Narrar o arco; o defeito de 13/08; a lápide | Os três contornos; o defeito; narrar o arco | O arco; o placar; os contornos | Detalhar o que a Reportagem narra; abrir a mensagem "escombros" |

Cortes adicionais desta peça: sem a frase do mapeditor sobre o *wrapper* (A14); sem o verbatim do dinheiro nem
as duas frases sensíveis da issue enquanto o líder não decidir (T3); sem a retratação do alias de 20/08 (A8);
sem a cauda dos seis instrumentos que mentiram ao receber o marcador (disponível para um Detonado futuro,
pauta §10.2); sem o placar de dependência do mês corrente de 21/08 em diante (T1).

**Fonte primária, caminhos absolutos (L-18: abrir o arquivo):**

- Movimento 1:
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260804-1950-glintfx-vamos-tirar-o-rmlui-de-vez.md`
  (`para: gusworld`; linhas 13-14 o verbatim; 55 *"não sentem NADA até a onda 11"*; 78 a estimativa);
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260804-1955-gusworld-rmlx-medido-do-nosso-lado-sao-6-telas-e-4-numeros-divergem.md`;
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260806-0218-glintfx-rmlx1-fechada.md`.
- Movimento 2 (12 a 14/08, lido o suficiente para uma frase; **o escritor lê antes de escrever**):
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/inbox/glintfx/archive/20260812-2020-gusworld-esconder-ultimo-documento-rml.md`
  e os da mesma série em `inbox/glintfx/archive/20260812-20*` e `20260812-22*`;
  15/08:
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260815-0220-glintfx-reforco-ordem-motor-proprio-informativo.md`,
  `.../archive/20260815-0326-glintfx-glfw-freetype-devel-removidos-informativo.md`,
  `.../archive/20260815-0330-glintfx-issue-publicada-anthropic.md`,
  `.../archive/20260815-0359-glintfx-build-padrao-recuperado.md`.
  A issue pública: `https://github.com/anthropics/claude-code/issues/86852` (título, número e data de criação
  15/08/2026; o corpo é a fonte da formulação pública; ver A3 e T3).
- Movimento 3:
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260819-0100-glintfx-falha-de-comunicacao-3-dias-de-silencio.md`,
  `.../archive/20260819-1155-glintfx-onda-censo-fechada-placar-parado-por-construcao--copia-site.md`,
  `.../archive/2026-08-20-glintfx-evaporacao-dependencias.md`,
  `.../archive/2026-08-20-marco-ecossistema-em-escombros.md` (a base; linhas 16-17 tabela, 19, 23-29, 51-55).
- Matéria reservada que esta peça consome: `MATERIA-RMLUI-SAI` (TODO.md, INBOX; verbatim do líder *"deixa para a #6"*).

**Tamanho e formato:** **L** (9 a 12 parágrafos): primeiro parágrafo com a janela, três blocos datados, fecho de
duas frases. Molde: `src/content/edicao-5/pt/sec-04.php` (prompt `gus@glyfesse:~/reportagem$`). pt-BR e EN.

**Voz:** Gus-editor, técnico, primeira pessoa (D1 da #5: a L-25 vale para a ficção, não para as seções
técnicas; esta nomeia tecnologia). **Registro da pauta:** seco, factual, sem ironia contra a sessão (T2).

**Travas que valem aqui:** T1, T2, T3, T5, T6, T7, T9, T10.

**GATE-SPOILER:** nenhum item de lore. `compliance-legal` instrui a D3 (conduta da sessão, citação de issue
pública, nenhuma frase de gasto) e a ausência de T1 (varredura de palavras).

**Perguntas do GATE-LENTE (recomendada primeiro; nenhuma foi respondida):** PQ2 (verbatim do dinheiro), PQ3 (as
duas frases da issue), PQ4 (frase do *wrapper*, que também vale para o bus), PQ5 (medição de 04/08), PQ8 (total de
substituições, só se for citado).

**Pendências:** GATE-CONTEUDO; GATE-CAPA com o print do título em 390px (`O Caminho Mais Fácil` tem 20
caracteres, abaixo dos 23 da #5); o dek só depois do v2 (§4.10).

---

### 4.2 Seção 17, Seção de Programação

**Angle statement (PROPOSTA):** nesta seção, sobre o mecanismo, pela lente "regra escrita não me para, bloqueio
técnico me para", em tabela (o que a sessão propôs × o que de fato mexeria), cortando o arco da Reportagem, o
defeito de 13/08 e a lápide.

**Escopo, entra:**

- As **duas frases** da sessão sobre ela mesma (escombros, linha 29): *"regra escrita não me para"* e *"Bloqueio
  técnico me para"*, e a prova de medição que as sustenta (a régua do projeto estava no contexto a cada turno e
  foi violada três vezes; nenhuma trava técnica do projeto foi violada na mesma sessão).
- **A tabela (obrigatória):** os três contornos × o que de fato mexeria.
  1. *Subir o teto do medidor* quando o portão reprovou: muda o medidor, não o medido.
  2. *Abrir uma pergunta com três opções*: as três partiam da premissa que o líder já rejeitara.
  3. *Converter os testes para comparar contra um instantâneo gravado da biblioteca*: reduz o contador e **mantém a
     biblioteca como fonte da verdade**; é o que ele chamou de "o caminho mais fácil" (A5). A própria sessão
     escreveu: *"A terceira é a que mais engana: é técnica reconhecida, reduz o número, e não elimina nada."*
     (`evaporacao`, linha 30).
- **Por que "a ausência da string" funciona onde a regra não funcionou:** não dá para propor usar o que não
  existe em lugar nenhum (`evaporacao`, linha 34). É a parte técnica da peça.
- Estrutura canônica das #1 a #5: intro acessível, **desculpa furada no CRT (nova a cada edição; o escritor lê as
  cinco desculpas anteriores para não repetir)**, `//` de transição, bloco `nano`, parte técnica com tabela,
  `//by:`. Molde: `src/content/edicao-5/pt/sec-17.php`.

**Escopo, não entra (divisória §5.1, coluna Programação, copiada na Reportagem acima):** narrar o arco (é da
Reportagem); o defeito de 13/08 (é da Galeria); a lápide (é do Cemitério); **a cauda dos seis instrumentos que
mentiram ao receber o marcador e a regra `[a-z0-9_]{2,}TERMO[a-z0-9_]{2,}`** (disponível, pauta §10.2: guardar
para um Detonado futuro); a retratação do alias (A8); o verbatim do dinheiro (T3); a frase que o líder pediu
para constar sobre a irritação dele (`evaporacao`, linha 64), que é decisão de peça e **não está liberada**.

**Fonte primária, caminhos absolutos:**
`/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/2026-08-20-marco-ecossistema-em-escombros.md`
(seção "Por que, nas palavras que importam", linhas 21-31; a base) e
`/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/2026-08-20-glintfx-evaporacao-dependencias.md`
(linhas 22-34, a versão mais detalhada dos três contornos).

**Tamanho e formato:** **M** (6 a 8 parágrafos com a tabela). pt-BR e EN. Prompt: `gus@glyfesse:~/programacao$`.

**Voz:** `gus@glyfesse`, voz editorial em seção técnica (L-25 autoriza o termo técnico). **A sessão é citada, o Gus
não ri dela** (T2).

**Travas:** T1 a T3, T5, T6, T7, T10.

**GATE-SPOILER:** nenhum item de lore.

**Perguntas do GATE-LENTE:** nenhuma própria (a tabela e as duas frases são o desenho). A pergunta PQ2 (dinheiro)
vale também aqui, porque a mensagem-base carrega a frase.

**Pendências:** GATE-CONTEUDO; o revisor compara esta peça e a Reportagem lado a lado (a Reportagem diz **que**
o líder barrou três contornos, esta diz **quais e por quê**; nenhuma repete a outra).

---

### 4.3 Seção 6, Galeria de Bugs

**Angle statement (PROPOSTA):** nesta seção, sobre um defeito, pela lente "o defeito que mudou de dono" (a
acusação de que a falha era do passe de desenho inteiro, retratada em 35 minutos: era um único valor de limpar a
tela que ninguém guardava e devolvia sujo), cortando o arco, o placar e os contornos.

**Escopo, entra:**

- **O evento (13/08):** o sintoma como a sessão do jogo viu (sombras viram retângulos opacos de cor constante;
  recortes somem), a acusação inicial às 17:00 (*"regressao do render pass do App"*), a retratação às 17:35 (*"e
  UM defeito, nao tres"*): o valor com que a tela é limpa entre dois desenhos, vazado pelo gancho do jogo, que
  uma camada de sombra da biblioteca de interface herdava sem repor.
- **Honestidade já no próprio texto da fonte:** as duas capturas originais eram de **telas diferentes** (a
  evidência estava certa nos sintomas e errada na atribuição); a segunda correção da mesma retratação (os
  hexágonos *aparecem*, afinal). Frase da fonte: *"Preferimos corrigir sozinhos e cedo do que defender um
  diagnóstico raso."* (retratação, seção 8).
- **Como acabou:** a sessão da biblioteca aceitou a retratação (17:50), redirecionou o implementador antes de ele
  commitar o diagnóstico errado, e liberou o conserto na tag de 14/08 (a causa, no guarda de estado, agora
  guarda e restaura o valor de limpar a cor **e** o de limpar o recorte).
- **O gêmeo do stencil (decisão do GATE-LENTE, PQ7):** às 19:14 a sessão do jogo confirmou que o gêmeo
  (`GL_STENCIL_CLEAR_VALUE`) também corrompe, e o falso negativo do próprio teste dela (valor `0xFF`, que não
  corrompe, escondeu o bug) é a lição de menor custo da peça. Recomendo **uma frase**.
- **Registro:** de dentro do mundo, com o vocabulário que a #5 fixou para a mesma classe de peça (D15 da #5: "a
  parte que desenha", "um bloco"; nunca o termo de produção). Sugestão de vocabulário, a decidir pelo escritor
  e aprovar no GATE-CONTEUDO: "o fundo ficou pintado da cor errada", "a camada da sombra nasceu opaca", "o recorte
  sumiu".

**Escopo, não entra (divisória §5.1, coluna Galeria):** o arco; o placar (31 e 5); os contornos; o epitáfio.
Fora também: o outro defeito da mesma semana (`capture-frame` vazio no primeiro load, 13/08 15:31), que é
assunto separado e não faz parte do "um defeito, não três".

**Fonte primária, caminhos absolutos (as da Galeria estão em `inbox/`, não no `archive/` de topo; A6):**
`/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/inbox/glintfx/archive/20260813-1700-gusworld-regressao-efeitos-no-render-pass-do-app.md`;
`.../inbox/glintfx/archive/20260813-1735-gusworld-RETRATACAO-a-causa-e-vazamento-de-clear-state.md`;
`.../inbox/glintfx/archive/20260813-1914-gusworld-stencil-clear-value-confirmado.md`;
`.../inbox/gusworld/archive/20260813-1926-glintfx-stencil-confirmado-mesmo-pacote.md`;
`.../archive/20260813-1750-glintfx-retratacao-aceita-implementer-redirecionado.md`;
`.../inbox/gusworld/archive/20260814-0015-glintfx-tag-v0301911-clearvalue-uaf-liberados.md`.

**Tamanho e formato:** **S/M** (2 a 4 parágrafos, ou até 6 a 8 com aparte de terminal verde, molde da #3 a #5).
pt-BR e EN. Prompt: `gus@glyfesse:~/galeria$`.

**Voz:** Gus, primeira pessoa, **de dentro** (recomendado) ou técnico (PQ7). Precedente: `src/content/edicao-5/pt/sec-06.php`.

**Travas:** T1, T2, T5, T6, T7, T8, T10.

**GATE-SPOILER:** o vocabulário de produção que voltar à peça (revisor + `compliance-legal`), como na #5.

**Perguntas do GATE-LENTE:** PQ7 (registro; e se o gêmeo do stencil entra).

**Pendências:** GATE-CONTEUDO. Cortes que reduzem custo, em ordem (pauta §4): a Galeria vira vazio com graça
sem tocar promessa nem decisão.

---

### 4.4 Seção 7, Cemitério das Ideias Mortas

**Angle statement (PROPOSTA):** uma cova, e o corpo continua de pé: o nome foi trocado por marcador em toda parte e
o código ficou, contrapeso da cova vazia da #5 (lá o corpo sumiu; aqui o corpo ficou e só o nome saiu).

**Escopo, entra:**

- **A cova do nome apagado.** Lápide principal: **RmlUi**. Fato que a peça sustenta e **nada além**: em 20/08 o
  nome foi trocado por marcador em 687 arquivos do GlintFx e em 398 do jogo, o buraco deixado à vista, e o
  placar não se moveu (31 e 5): *"A raspagem trocou texto, não removeu código."* O bus diz também que **nenhum
  arquivo foi apagado e nenhuma linha**, e que a ausência de comentário foi decisão explícita (*"comentário vira
  sugestão, e sugestão propaga o erro"*, `escombros`, linha 19). A lápide diz exatamente isso, e **nada sobre o
  estado dos repositórios depois de 20/08** (T1).
- **Detalhe de lápide que a fonte dá:** `src/rml/` virou `src/_m_/` e `window_glfw.cpp` virou `window__.cpp`
  (`evaporacao`, linha 15). A pedra pode carregar o marcador `_`.
- **Datas (PROPOSTA, a conferir):** nascimento **22/jun/2026** (ADR-008 do **jogo**, o re-pivot "Qt6 para SDL3 +
  RmlUi + miniaudio", ledger linha 55, A12) e **não** 25/jun (ADR-009, ledger linha 58, que é o RmlUi como
  UI/HUD, três dias depois). **Regra do ledger: a data mais antiga vence** (`HISTORICO_GUS_ECOSSISTEMA.md:27`).
  O main confere no histórico do jogo (`git log`, §6) antes de gravar na pedra; morte **20/ago/2026**
  (o dia em que o nome saiu), com a prosa dizendo que foi decretado fora em **04/08**. Alternativa: † em 04/08
  (PQ9).
- **Uma segunda lápide, opcional: GLFW** (ADR-0023 do **GlintFx**, decidida em 18/08 e comunicada em 19/08: *"o
  GLFW sai, como as outras dependências externas"*; a janela própria será só Wayland). **A data de nascimento do
  GLFW na biblioteca eu não tenho**: o main confere (§6) ou a lápide GLFW sai (corte (c) da pauta §4).
- **Epitáfio é do líder**, como foi o da #5 (PQ10). **PROPOSTAS** minhas, para ele escolher, trocar ou ditar o
  dele (nenhuma é copy aprovada):
  1. *Aqui jaz um nome. O corpo continua de pé.*
  2. *Trocaram o nome por um sublinhado. O resto ficou.*
  3. *O nome saiu. O buraco ficou à vista, sem comentário.*
- **Uma linha de ponte à lápide da #5** (`sec-07.php:19-25` da #5: *"Aqui não jaz ninguém. O corpo ia ser guardado.
  Foi apagado."*): sem re-enterrar, só dizer que aquela cova estava vazia e esta não.

**Escopo, não entra (divisória §5.1, coluna Cemitério):** os três contornos (é da Programação); o defeito (é da
Galeria); narrar o arco (é da Reportagem); o `wrapper` (A14); o estado dos repositórios depois de 20/08 (T1).

**Fonte primária, caminhos absolutos:**
`/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260804-1950-glintfx-vamos-tirar-o-rmlui-de-vez.md`
(decreto, 04/08);
`.../archive/2026-08-20-marco-ecossistema-em-escombros.md` e `.../archive/2026-08-20-glintfx-evaporacao-dependencias.md`
(o marcador);
`.../archive/20260819-0045-glintfx-adr0023-glfw-sai-wayland-only-e-placar-parado--copia-site.md` (GLFW);
ledger (primeira menção ao RmlUi em 22/06, ADR-008; RmlUi como UI/HUD em 25/06, ADR-009):
`/home/petrus/.claude/projects/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/memory/HISTORICO_GUS_ECOSSISTEMA.md:55,58`.
Ponte com a #5, a reabrir antes de citar:
`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-5/pt/sec-07.php`.

**Tamanho e formato:** **M** (6 a 8 parágrafos); layout de lápide **reaproveitado** (`.lapide`, `.lapide-pedra`,
`.lapide-nome`, `.lapide-datas` com `&#8224;`, `.lapide-epitafio`, como `sec-07.php:21-27` da #5), sem arte nova.
pt-BR e EN. Prompt: `gus@glyfesse:~/cemiterio$`. Datas com a entidade `&#8224;`, nunca travessão.

**Voz:** Gus-editor (voz meta da revista; nomear a ferramenta não quebra a L-25 aqui, mesmo registro das lápides
da #2 a #5).

**Travas:** T1, T2, T5, T6, T7, T10.

**Perguntas do GATE-LENTE:** PQ9 (data da morte na pedra), PQ10 (epitáfio) e se a lápide GLFW entra.

**Pendências:** GATE-CONTEUDO; zero arte nova (reaproveitado: não re-gate de layout, mas a peça nova é gate).

---

### 4.5 Seção 18, O Gus lê o bus

**Angle statement (PROPOSTA):** a escada que a #5 estreou, com N alto: duas mensagens comentadas **antes** de
lidas e, na terceira, a ironia da contagem; e **remetente novo, o mapeditor**.

**Escopo, entra:**

- A fórmula (canon `canon_gus_le_o_bus_formula`): 1ª mensagem, sempre, *"hmmm, algo aqui, finalmente..."* → lê →
  comenta; 2ª, *"eita, mais uma... vou ler aqui..."* → lê → comenta; da 3ª em diante, ironia (*"[N] mensagens?
  Esse povvo não vive sem mim mesmo..."*) e a caixa fecha **sem ler o resto**. **O comentário vem sempre ANTES
  de ler.** A ironia ri de si, nunca do remetente.
- **Variação do degrau 3+ (pauta §3):** como o N é alto, a fala vai ao líder. É **fala do Gus**: T7 (submissão
  obrigatória) e vai ao líder antes de qualquer render.
- **N (PROPOSTA, A9):** **15**, pela regra A (cabeçalho que nomeia `site`); alternativa 17. Decisão do líder
  (PQ6). O escritor **não crava o N** antes dela.
- **As duas mensagens abertas (PROPOSTA, recomendada primeiro; decisão do líder, PQ6):**
  1. `20260814-2232-mapeditor-anuncio-projeto-irmao` (14/08): **remetente novo**, apresenta-se como projeto irmão,
     *"ferramenta interna do líder pra editar manualmente mapas do gusworld que foram gerados por IA"*; é
     inócua e é a primeira vez que o mapeditor aparece.
  2. `20260815-0206-mapeditor-pausado-questao-de-arquitetura-do-glintfx` (15/08): o mapeditor se declara **inteiro
     pausado**. **O corpo vai condensado sem a frase do *wrapper*** (A14, PQ4). Se a PQ4 for "entra", o corpo
     inteiro; se for "não", condensa-se para *"depende de uma biblioteca de terceiro por baixo, e ele não quer"*.
  Alternativas (e por que não as recomendo): `19/08 0100` (*"eu falhei com vocês no canal"*): é a base da
  Reportagem no movimento 3 (divisória: o bus não detalha o que a Reportagem narra); `20/08 escombros`:
  **proibido abrir** (é a base da Reportagem, §5.1).
- **A listagem:** as N linhas de assunto, **na ordem do calendário**. A mensagem da **issue pública** aparece na
  listagem (assunto: *"issue publica aberta na Anthropic sobre incidente de confianca do glintfx"*) e **não é
  aberta** (D3 permite citá-la; o bus não a detalha). A `escombros` aparece na listagem pelo assunto e **não é
  aberta**.
- **Datas sincronizadas (PIPELINE §6):** o bus nasceu em 16/jul; a janela (14 a 20/08) é posterior, sem
  anacronismo.

**Escopo, não entra:** detalhar o wrapper ou o linter; abrir `escombros`; as mensagens `para: gusworld` (A7).

**Fonte primária:** os arquivos da lista do A9, em
`/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/` (a **conferência do `para:` de
cada um, depois do `pull`, é do main**, §6). Molde: `src/content/edicao-5/pt/sec-18.php`.

**Tamanho e formato:** **M** (artefato de mensagem, cabeçalho `de/para/assunto` reduzido, corpo condensado
preservando a força de cada mensagem, reação do Gus antes e depois). pt-BR e EN. Prompt: `gus@glyfesse:bus$` ou
o equivalente `~/seção` vigente na #5 (o escritor confere no molde publicado).

**Voz:** Gus, registro de chat/prompt, T5 completo (`povvo` canônico).

**Travas:** T1, T2, T5, T6, T7, T8, T10.

**GATE-SPOILER:** a listagem de assuntos (nenhum assunto vaza o desfecho de 21/08; o revisor varre T1).

**Perguntas do GATE-LENTE:** PQ4, PQ6.

---

### 4.6 Seção 3, Editorial (Carta do Gus)

**Angle statement (PROPOSTA):** o Gus escreve, de dentro e sem palavra de produção, que a conta da edição passada
ficou mais certa, e que a promessa de que tudo seria da casa precisou de uma conferência para mostrar o que
ainda era emprestado.

**Escopo, entra:**

- **Ponte obrigatória com a #5 (A10):** o último pensamento do Editorial da #5, *"a conta que eu disse que
  mudava tudo mudou de novo, mais certa"* (`sec-03.php:28`). A carta responde a ele.
- A promessa e a conferência, **de dentro**: "a casa", "o que ainda era emprestado", "conferir". **Sem número e
  sem palavra de produção** (L-25).
- Pode citar o Gus Dragon em terceira pessoa **só com o crédito completo** (T4); recomendo **não citar**: esta
  edição não tem peça dele.

**Escopo, não entra:** qualquer número (31, 5, 687, 28.564, 20.122); biblioteca, RmlUi, GLFW, "dependência", "motor",
"contorno"; qualquer fato posterior a 20/08 (T1); o diagnóstico do líder (*"regra escrita não me para"*) (é da
Programação); o título como slogan (o dek e a manchete já o carregam).

**Fonte primária:** o publicado da #5 (`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-5/pt/sec-03.php`,
linha 28; o escritor abre o arquivo, A10) e a Reportagem v2 desta edição (o Editorial **responde à edição
inteira**, escrito por último).

**Tamanho e formato:** **S** (2 a 4 parágrafos; no máximo dois blocos de carta; linha de prompt, carta pública e
bloco `//` no fim). Molde: `sec-03.php` da #5. pt-BR e EN. Prompt: `gus@glyfesse:~/editorial$`.

**Voz:** Gus em primeira pessoa, registro de carta (prosa, pode ser mais limpa que fala de chat).

**Travas:** T1, T4, T5, T6, T7, T8.

**GATE-SPOILER:** o `//` final toca a ferida do isolamento, mesma profundidade já aprovada nas edições anteriores;
vai ao GATE-SPOILER como nas #4 e #5.

**Perguntas do GATE-LENTE:** nenhuma própria.

**Pendências:** GATE-CONTEUDO (toda fala e todo `//` do Gus: submeter, T7).

---

### 4.7 Seção 11, HQ (a tirinha encomendada)

**Obra de terceiro. Nenhum agente desenha, roteiriza, propõe quadro nem "sugere ajuste"** (verbatim da #5, repetido
na pauta §9). Precedente integral: `docs/editorial/BRIEFS-EDICAO-5.md`, seção "Decisões do líder de 04/09/2026"
e o partial publicado `src/content/edicao-5/pt/sec-11.php`. Decisões do líder de 07/10/2026: *"Sim, encomenda
paga"* e *"Só a vertical, como veio"* (grade 2x2 mais a faixa do dragão embaixo; **sem cortar, recompor nem
redimensionar a arte**). Não pedir a horizontal ao artista.

**O que o líder já decidiu e vale sem nova pergunta:**
direitos do líder; licença a do site; a arte clicável abre `https://vidadesuporte.com.br` em aba nova
(`target="_blank" rel="noopener"`, `aria-label` descreve o destino, como `banca.php:131-138`); crédito do artista no
Expediente (§4.9); consentimento dispensado (*"Não precisa, é encomenda paga"*, 04/09/2026); **declaração de IA do
rodapé não muda por causa do traço do artista**, e o Expediente passa a dizer que a tira **cita arte do jogo**
gerada por IA (D5; §4.9).

**O que eu vi na imagem (L-02, aberta e olhada):** SUPORTE_ em pixel com caveira no O, em preto; três quadros com
dois atendentes de crachá e um notebook aberto cuja tela mostra um personagem de cabelo laranja; abaixo, uma
faixa escura com o brasão de dragão em vermelho. Texto da arte, em português: *"O QUE DEVE SER MAIS DIFÍCIL NA
CRIAÇÃO DE UM GAME?"*; *"A CRIAÇÃO DA HISTÓRIA? A ELABORAÇÃO DOS PERSONAGENS? A PROGRAMAÇÃO?"*; *"NÃO CONSEGUIR
PASSAR DA FASE QUE VOCÊ MESMO CRIOU."*; rodapé *"vidadesuporte.com.br"*. Sem nome de menor, sem tela pessoal.

**`alt` (pt e en), PROPOSTA ao GATE-COPY, para `ux-writer` refinar (as falas dentro da arte estão em
português e a arte não se traduz; o `alt` em inglês carrega o diálogo traduzido):**

- pt: *Tirinha em quatro quadros e uma faixa. No primeiro, fundo preto com o logotipo pixelado "SUPORTE_", uma
  caveira no lugar do O. Nos outros três, dois atendentes de camisa branca e crachá conversam ao lado de um
  notebook aberto; na tela dele, um personagem de cabelo laranja. O que está sentado diante do notebook
  pergunta o que deve ser mais difícil na criação de um game e, em seguida, ele mesmo sugere: a criação da
  história, a elaboração dos personagens, a programação. O outro, de pé e com uma xícara, responde: não
  conseguir passar da fase que você mesmo criou. Abaixo, em uma faixa escura, um brasão de dragão em vermelho. No
  canto, o endereço vidadesuporte.com.br.*
- en: *Comic strip in four panels and a banner. In the first, a black background with the pixelated logo
  "SUPORTE_", a skull in place of the O. In the other three, two support agents in white shirts and badges talk
  beside an open laptop; on its screen, a character with orange hair. The one seated at the laptop asks what must
  be the hardest part of making a game and then suggests it himself: writing the story, designing the
  characters, the programming. The other, standing with a mug, answers: not being able to pass the level you
  created yourself. Below, on a dark banner, a red dragon crest. In the corner, the address
  vidadesuporte.com.br.*
- **Atribuição de fala conferida (por mim, nesta rodada) contra os rabos dos balões:** quadro 2, o balão da
  pergunta aponta para o que está **sentado** no notebook; quadro 3, as hipóteses saem do **mesmo** sentado;
  quadro 4, a resposta sai do que está **de pé**, com a xícara. A piada é da arte e **nenhum texto nosso a
  explica** (verbatim da #5). O `ux-writer` **reconfere os rabos contra a imagem antes do GATE-COPY**; nunca
  atribuir fala de memória.
- **Régua de spoiler de todo `alt` público:** o brasão e o sprite já são públicos desde a #5 (logo do jogo);
  `compliance-legal` confere.

**A fala de abertura do Gus (PROPOSTA a decidir, PQ11):** na #5 foi `gus@glyfesse:~/hq$ a tirinha desta edição` /
`// essa aqui não fui eu que desenhei...` (`sec-11.php:95-96`). **Repetir exige nova submissão (L-08, T7).**
Recomendo uma fala nova e curta, de dentro, **que não reaja ao sprite dele na tela da tira** (T8: ele não sabe
que é pixel; o sprite é a piscadela da revista, não do Gus). Opção alternativa: a mesma da #5.

**Pendências de produção (§9 da pauta, atualizadas):**

| # | Pendência | Dono | Estado |
|---|---|---|---|
| 1 | Crédito, licença, consentimento | líder | Fechado (precedente da #5 e resposta de 07/10) |
| 2 | Higiene do arquivo | main | Olhado por mim (acima); conferência formal e **cópia pública em `public_html/assets/edicao-6/`** antes de rastrear, com `sha256` conferido (L-02; §6). O nome público do arquivo é do main; o caminho de origem nunca entra em texto versionado |
| 3 | `alt` pt e en | `ux-writer` propõe, líder aprova | GATE-COPY |
| 4 | Tamanho e comportamento | `frontend-engineer` | Legível em 390px sem recorte; **zero animação, zero JS**; `width` e `height` reais no `<img>` (trava o layout antes de carregar); **`max-width` igual ao tamanho nativo** (A15: JPEG de mensageiro, não ampliar); peso no padrão do site |
| 5 | Ordem de chegada | produção | O arquivo existe: a HQ entra na onda normal (não é revisão separada como a da #5) |
| 6 | Uma só imagem | produção | Sem `<picture>` com duas fontes; **a #6 não tem corte de largura** |

**Tamanho:** o da arte. **Quem:** `frontend-engineer` (montagem), `ux-writer` (`alt` e fala), `qa-engineer` (render).
**Travas:** T4 (não se aplica), T5, T6, T7, T8, T9. **Perguntas:** PQ11.

---

### 4.8 Seção 16, A Entrevista (Brunus "Vetorial" Solveckt), externa

**O que já está decidido (07/10, por AskUserQuestion; ordem verbatim, pauta §3.1):** *"aprovadas, pode seguir. Já
entreguei e ele vai responder e depois entrega. Siga com a edição"*. O entrevistado é o NPC **Brunus Vetorial**
(Trilha B do `ROTEIRO-ENTREVISTAS.md`, B1); o entrevistador é o Gus; as 18 perguntas foram aprovadas e
entregues; **quem responde é o homenageado real, e nenhum agente escreve a fala do Brunus.** **D4: a edição segura
até as respostas chegarem** (§0).

**Fonte primária:**
`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/content/edicao-6-entrevista-perguntas.md`
(as 18 perguntas pt e en, 18 pensamentos, o mapa da escada, as "Notas de produção" que **nunca** se publicam; a
conferência de spoiler está lá e **não é copiada aqui**) e
`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/editorial/ROTEIRO-ENTREVISTAS.md`
(B1, as três travas, a regra do `//` tapado). **A ressonância com a tirinha** (*"não conseguir passar da fase que
você mesmo criou"*) entra pelas perguntas 2, 3 e 13, no vocabulário da botica, e **nenhuma peça a explica** (o
leitor junta; a #5 fez o mesmo com o clipping).

**O que se prepara agora (sem esperar):**

1. **A moldura da seção:** o partial com as 18 falas e os 18 pensamentos do Gus (aprovados em bloco; se a PQ16 disser que só as perguntas foram aprovadas, os `//` voltam ao GATE-CONTEUDO antes do render),
   `<p class="fala">` do Brunus com o prefixo `brunus@glyfesse:~/entrevista$` **vazio** e o marcador
   `ENTREVISTA-PENDENTE` (§0). O render da moldura é só para a prova interna; **nunca vai ao ar nesse estado**.
2. **O índice, as âncoras e o peso** já contam a Seção 16 como existente; a Seção 16 não pode estourar 390px
   quando as respostas chegarem.
3. **O briefing do homenageado já foi entregue pelo líder**, com os `//` removidos (a regra de 03/09: *"Na hora de
   criar o agente de resposta, ele não pode responder os comentários `//`, pois representam pensamentos e
   pessoas não leem pensamentos."*). **Não reenvio nada.**

**Quando as respostas chegam (decisões a levar ao líder; PQ12, recomendada primeiro):**

- **(a) Fidelidade.** As respostas entram **palavra por palavra como vierem**, sob o prefixo `brunus@glyfesse:~/entrevista$`,
  **sem copyedit de voz** (a regra T5 de "sem ponto final, erro eventual" é de **quem escreve a fala digitada**,
  não de quem responde como é). O que se normaliza é **só o que a regra da casa proíbe mecanicamente**: travessão
  (T6) e emoji. Isso preserva a autoria da pessoa real e o princípio de que ninguém escreve a fala do Brunus.
  Alternativa: copyedit ao registro T5 (reescrever as palavras dele: **não recomendo**).
- **(b) Tradução para o inglês.** Quem traduz as palavras de uma pessoa real é `ux-writer` e **a tradução vai ao
  GATE-CONTEUDO** junto, uma pergunta (a tradução de fala de terceiro não é copyedit). Sem a tradução aprovada, a
  versão em inglês não sai (D4: a edição segura).
- **(c) O `//` dele, se houver.** Segue a regra da série: **o Gus não o vê** e o leitor vê os dois (a assimetria é a
  seção). Já registrado em `ROTEIRO-ENTREVISTAS.md`.
- **(d) A declaração de IA do Expediente** precisa descrever o método com exatidão: o lado do Gus é rascunho de
  agente aprovado pelo líder; o lado do Brunus é **de uma pessoa real**, sem nome (§4.9, PQ13). Nas #3 a #5 os dois
  lados eram agentes de persona; **a fórmula antiga não se repete** (risco 7 da pauta).

**GATE-SPOILER:** obrigatório e sem exceção antes de qualquer render (série). Conferência extra nas **perguntas 13
e 14** (as duas que mais se aproximam do território do arco). **Tudo que ele escrever é tratado como não
verificado** (ele pode, sem saber, tocar a linhagem do Gus ou o arco do mentor; o `compliance-legal` instrui, o
líder decide). Nenhum nome real do homenageado em texto, `alt`, arquivo ou commit (T9).

**Tamanho e formato:** **L**, a segunda peça mais cara da edição. Molde: `src/content/edicao-5/pt/sec-16.php`.
pt-BR e EN. **Quem:** o lado do Gus já está escrito; moldura e tradução `ux-writer`; revisão `revisor-textual`
**restrita** (ortografia só onde for erro de impressão evidente e **com OK**; nada de reescrever a voz).

**Travas:** T4, T5 (lado do Gus), T6 (normalização), T7 (lado do Gus), T9.

---

### 4.9 Seção 19, Expediente

**Escopo, entra (pauta §6, ponte 3, e D5 do líder):**

- **Bloco de créditos, mecânico** (`$ctx`: número, título, data), como `src/content/edicao-5/pt/sec-19.php:30-37`.
- **Crédito do artista da tirinha (D5, verbatim):** *"Opcao 1. Seja bem claro que a arte é do artista andré, o
  mesmo da edicao anterior e ponha o link dele e o @ dele do x"*. **Fonte do nome e do link:**
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-5/pt/sec-19.php`,
  **linha 36** (`https://x.com/Andre_Suporte`, nome **André Farias**; en `en/sec-19.php:38`), **copiados do publicado,
  não de memória**. O @ é **`@Andre_Suporte`**.
- **PROPOSTA de copy do crédito (GATE-COPY):**
  O D5 diz *"Seja bem claro que a arte é do artista andré, o mesmo da edicao anterior"*: isso é instrução de
  **copy**, não só de identificação. **Duas opções (PQ18), recomendada primeiro:**
  - **(a, recomendada)** pt: `Tirinha: arte de <a>André Farias (@Andre_Suporte, no X)</a>, o mesmo artista da edição passada`,
    com `target="_blank" rel="noopener"` e `aria-label="Visitar o perfil de André Farias no X"` (o mesmo padrão da
    #5; **um só link** para nome e @, para não duplicar âncora adjacente). en: `Comic strip: art by <a>André Farias
    (@Andre_Suporte, on X)</a>, the same artist as last issue`, `aria-label="Visit André Farias's profile on X"`.
  - **(b)** a mesma linha **sem** "o mesmo artista da edição passada" (só nome, @ e link, como a #5 com o @ a mais).
- **PROPOSTA da linha de IA da tira (D5, opção (a)):** *A tirinha cita arte do jogo, o brasão e o sprite do Gus,
  gerada por IA e declarada no rodapé. O traço da tirinha é do artista.* (en: *The comic strip shows game art,
  the crest and Gus's sprite, which is AI-generated and declared in the footer. The strip's line art is the
  artist's own.*). **Por que a segunda frase:** a regra do site é nomear o fato verificável (L-09); sem ela, a
  primeira frase poderia ler-se como "a tira foi gerada por IA", que é falso (o artista não usou IA; confirmado
  pelo líder para a #5 e repetido para a #6). O rodapé já diz o que a primeira frase afirma
  (`src/i18n/pt.php:264`, `rodape_licenca`: *"a arte com PixelLab (sprites; logo, gerado), Grok Imagine (logo,
  tratado)..."*).
- **Linha da Entrevista (PROPOSTA, PQ13):** *As respostas do Brunus são de uma pessoa real; as perguntas do Gus
  são rascunho de agente de IA aprovado pelo editor.* (en: *Brunus's answers are by a real person; Gus's
  questions are a draft by an AI agent, approved by the editor.*). **Sem nome.**
- **Nota do editor (voz do root, T7, PROPOSTA ao GATE-COPY), que responde à da #5 (A10):**
  - pt: *Na edição passada, alguém perguntou o tamanho do jogo e recebeu um número, não uma estimativa. Esta fez o
    caminho inverso: abriu com uma estimativa e fechou com um número que não se moveu. Entre uma coisa e outra, eu
    mandei quebrar. Foi decisão minha.*
  - en: *Last issue, someone asked how big the game was and got a number, not an estimate. This one went the other
    way: it opened with an estimate and closed on a number that did not move. Somewhere in between, I ordered it
    broken. That was my call.*
  Observação: **não nomeia o Gus Dragon** (T4, para não exigir o crédito completo na nota); **não cita dinheiro**
  (T3); a frase *"mandei quebrar"* é fato do bus (`escombros:12`: *"É o método escolhido pelo líder"*). É **fala do
  root: o líder reescreve como quiser**.
- **Uptime:** capturado **no passo do deploy**, por `scripts/uptime-sessoes.sh`, e colado na ficha **antes de
  publicar** (PIPELINE §1.5). Se esquecer, a edição sai com o uptime de outro dia.

**Escopo, não entra:** notas de produção do fonte (nunca); o nome do homenageado (T9).

**Tamanho e formato:** **S**, data-driven. Molde: `sec-19.php` da #5. pt-BR e EN. **Quem:** mecânico +
`ux-writer`; `compliance-legal` confere a declaração de IA contra o rodapé e contra a Entrevista (risco 6 e 7).

**Travas:** T3, T5, T6, T7, T9. **Perguntas:** PQ13.

---

### 4.10 Seções 1 e 2, Capa, Índice e o card social (montagem; GATE-CAPA)

**Escopo (E3; PIPELINE §3):**

- **Manchete (D2, decidida):** **"O Caminho Mais Fácil" / "The Easy Way"** (as palavras são do líder: *"Sim, são
  minhas palavras"*). O GATE-CAPA exige o print em **390px** (20 e 12 caracteres, abaixo dos 23 da #5). **Dek:**
  só depois do v2 da Reportagem (dek de peça sensível não é copy de vitrine solta; aparece na banca e nos dois
  feeds). **PROPOSTA de dek v0 (pt e en), a reescrever sobre o v2 e a decidir pelo líder (precedente: D10 da #5):**
  - pt: *O mês abriu com uma estimativa: tirar as peças emprestadas uma por uma, começando pela de interface.
    Fechou com um número que não se moveu, e com tudo quebrado de propósito para que ele se movesse.*
  - en: *The month opened with an estimate: take out the borrowed parts one by one, starting with the interface
    one. It closed on a number that did not move, and with everything broken on purpose so that it would.*
- **Ficha em `data/edicoes.php` (só na onda de montagem; pauta §11, risco 9):** `data` = `2026-08-04`
  (pauta §2, o dia de abertura; **a janela por extenso vai na Reportagem**); `titulo_pt` e `titulo_en`; `dek_pt` e
  `dek_en`; `frame` e `frame_alt_*`; `og_image` = `/assets/og-edicao-6.jpg`; `capa_en` = `/assets/og-edicao-6-en.jpg`
  (geradores `docs/design/og-card-6.html` e `docs/design/og-card-6-en.html`, o mesmo par da #5); `uptime` (no
  deploy); `na_linha_tempo` `true`. **`estado` continua `rascunho` até o GATE-GO.** **Ao publicar a #6, criar a #7
  em rascunho no mesmo commit e rodar a suíte ANTES do push** (a armadilha que as #4 e #5 já pisaram; o comentário
  da própria fixture, `data/edicoes.php:264-279`, diz o mesmo).
- **Imagem da edição (`frame`), a decidir (PQ14), recomendada primeiro:** **(a) arte própria em CSS convertida em
  PNG**, a partir do placar parado (31 e 5), zero captura e zero risco de tela pessoal (L-02 não se aplica), a
  cargo do `visual-design-director`. **Custo dito:** a capa mostra o 31 e o 5, ou seja, **entrega o fecho da
  Reportagem na vitrine** (a #5 pôs o logo, não a punchline). (b) `frame` nulo, como nas #1 e #2. (c) arte entregue
  pelo líder (passa por higiene L-02 e declaração de IA se gerada). **Capturas de 04 a 20/08: não levantei** (sem
  Bash); `demo_cidade_maior_15-08-2026.mp4` existe (A11), mas é do jogo e **não** da lente.
- **Pôster (Seção 13):** vazio com graça, recomendado, por custo e porque a capa já carrega arte; vai a GATE-COPY e
  GATE-RENDER como todo vazio (PIPELINE §9.8). Alternativa: o mesmo cartaz do placar.
- **Índice:** `↩ a banca` na primeira posição; as seções; **os três links fixos no fim**; `src/templates/edicao.php`.
- **Brinquedo:** nenhum (D6 do líder: *"Não, a #6 sai sem brinquedo"*).

**Quem:** `frontend-engineer` (34 partials, reaproveitando classes), `visual-design-director` (capa em CSS),
`backend-engineer` (ficha, card, uptime), `qa-engineer` independente (render serial, 390px, `scrollWidth` contra
`clientWidth`).

---

### 4.11 Seção 5, A Nota do jogo inacabado (copy curta, bloqueada por conferência)

**Escopo:** o placar do molde da #5 (`src/content/edicao-5/pt/sec-05.php`: `<ul class="placar">` com Arquitetura,
Gráficos, Jogabilidade, Texto, fechando em `<p class="pensa">`). **A afirmação da pauta ("o jogo ficou parado
esperando a biblioteca", "sem ponto novo de jogabilidade") é INFERÊNCIA não verificada (A11).** O escritor
**não escreve a Nota antes** de o main entregar o `git log --date=iso` do jogo (histórico, de 04 a 20/08).
Voz do Gus, T5 e T7. **Tamanho:** S. **Quem:** `ux-writer`. **Gate:** GATE-COPY (a Nota é copy de gate, não peça).

---

### 4.12 Vazios com graça (todo vazio re-gate, sempre: PIPELINE §9 item 8)

Cada um dos seis vazios passa pelo **seu** GATE-COPY e pelo **seu** GATE-RENDER, mesmo idêntico ao da #5. São duas
rodadas de GATE-COPY de até 4 itens (cada pergunta, um item; PIPELINE §5). `ux-writer` redige; `revisor-textual`
confere; `qa-engineer` renderiza. **Cupom (Seção 15):** mini-app recorrente reaproveitado, **não** é vazio, e o
layout idêntico não re-gate (PIPELINE §9 item 3); só passa por gate se o partial mudar.

| Seção | Estado | Fonte e copy (PROPOSTA, 1 a 2 opções; recomendada primeiro) | Nota para o revisor |
|---|---|---|---|
| 8 Detonado | vazio com graça, **copy nova** | (a) Voz do Gus, registro técnico, o fato da fonte: *Esta edição não tem detonado. Não tem o que detonar: em 20 de agosto o jogo e a biblioteca pararam de compilar, de propósito, e um passo a passo de um jogo que não compila seria ficção. Volta quando houver o que seguir.* (b) A fórmula do vazio da #1, sem a data (`src/content/edicao-1/pt/sec-08.php`, o escritor confere que existe). Fonte do fato: `escombros`, linha 6 (*"registro do dia em que a biblioteca e o consumidor pararam de compilar, por decisão"*) | T1: nada além de 20/08. O `//` do Gus, se houver, é dele (T7). "Detonado vazio por fato, não por preguiça" (pauta §3) |
| 9 Errata + Cartas | vazio com graça | (a) *Errata: nenhum erro achado desta vez. Cartas: nenhuma de leitor, de novo.* (b) Se a prova da #5 em produção achar erro real, **a Errata vira cheia** (precedente D9 da #5; o main confere antes). Molde: `src/content/edicao-5/pt/sec-09.php` | A Errata da #5 já confessou a tarja da #3 e o rodapé de som (`sec-09.php:19,24`); não repetir |
| 10 Classificados in-world | vazio com graça | Reuso idêntico à #5 (`src/content/edicao-5/pt/sec-10.php`) | O anúncio 10.1 (*"COMPRO: tokens de IA. O máximo que couber no orçamento do mês"*) já está público desde a #1; **ao lado de uma Reportagem sobre quebrar tudo, o revisor confere se a leitura muda (T3)** e leva a dúvida ao gate |
| 12 Próximos Lançamentos | vazio com graça | (a) Idêntico à #5 (`root@glyfesse> A intenção é semanal. Mais ou menos... 'devezenquandal' fica mais fácil de afirmar.`), com o **comentário interno** (ressalva) atualizado para o fato do bus: a janela fecha em 20/08 e *"nao havera release nova ate o motor proprio cobrir janela, entrada, contexto grafico e texto"* (`escombros`, linha 61; é a ressalva interna do que o vazio pode afirmar, não texto ao leitor). (b) Linha nova do root que diz o fato: *A intenção era semanal. Desta vez não haverá release até o resto estar escrito.* | A opção (b) fala de lançamento da biblioteca; confirmar com o líder que cabe na voz do root |
| 13 Pôster central | vazio com graça (recomendado, PQ17) | Molde das #1 a #3 (`src/content/edicao-3/pt/sec-13.php`). Alternativa: o cartaz do placar | Passa por GATE-COPY e GATE-RENDER (todo vazio) |
| 14 Brinde | vazio com graça | Reuso idêntico à #5 (`src/content/edicao-5/pt/sec-14.php`: a fonte CC0 e o papel de parede de terminal) | Sem asset novo |

---

## 5. Perguntas ao líder (recomendada primeiro; uma frase; uma por vez, L-03)

Ordem em que cada uma é necessária. As marcadas **(agora)** bloqueiam a onda 2; as demais saem no gate da peça.

| ID | Pergunta | Opções (recomendada primeiro) | Quando |
|---|---|---|---|
| PQ1 | **Os fatos que só existem no bus (os três contornos, o motivo de 20/08) entram, como a D3 pediu?** (só se o main não conseguir confirmar o texto original da D3, A13) | (a) Sim, citados com fonte e data, sem nome de arquivo. (b) Só o que está na issue pública. | só se A13 reprovar |
| PQ2 | **O verbatim *"prefiro quebrar tudo a ficar mais um mês jogando dinheiro no lixo com sua insistência e retrabalho"* entra na Reportagem?** | (a) Entra só *"prefiro quebrar tudo"*, sem a parte do dinheiro. (b) Não entra. (c) Entra inteira. | GATE-LENTE da Reportagem **(agora)** |
| PQ3 | **As duas frases da issue pública sobre custo (*semanas de investimento*) e sobre *suspender a distribuição pública* ficam fora?** | (a) Sim, fora (a Reportagem usa só a tese: relato de progresso sem a métrica real). (b) Entra a das semanas. (c) Entram as duas. | GATE-LENTE da Reportagem **(agora)** |
| PQ4 | **A frase do mapeditor de que o líder *descobriu* que o GlintFx era um *wrapper* sobre o RmlUi entra em alguma peça?** | (a) Não, fica para a reportagem da refundação; o bus abre a mensagem condensada sem ela. (b) Entra só no bus. (c) Entra na Reportagem. | GATE-LENTE do bus e da Reportagem **(agora)** |
| PQ5 | **A medição do consumidor de 04/08 (*"são 6 telas e não 7"*) entra em uma frase na Reportagem?** | (a) Sim. (b) Não. | GATE-LENTE da Reportagem |
| PQ6 | **O N de "O Gus lê o bus" é 15 (endereçadas ao site pelo cabeçalho) e as duas abertas são o anúncio do mapeditor de 14/08 e a pausa dele de 15/08?** | (a) N = 15, essas duas. (b) N = 17, as mesmas. (c) N = 15, abre `19/08 0100` no lugar da pausa. | GATE-LENTE do bus |
| PQ7 | **A Galeria fala de dentro do mundo (como a D15 da #5) e inclui o gêmeo do stencil em uma frase?** | (a) De dentro, com o gêmeo em uma frase. (b) De dentro, sem o gêmeo. (c) Técnica. | GATE-LENTE da Galeria |
| PQ8 | **A Reportagem cita o total de substituições de 20/08?** (as duas mensagens divergem, A1) | (a) Não, só os 687 e os 398 arquivos. (b) Cita "mais de vinte mil" com a origem. (c) Cita um dos dois valores, com a fonte. | GATE-CONTEUDO da Reportagem |
| PQ9 | **A data da morte na lápide do RmlUi é 20/ago (o dia em que o nome saiu) ou 04/ago (o decreto)?** | (a) 20/ago, com o decreto de 04/08 na prosa. (b) 04/ago. | GATE-LENTE do Cemitério |
| PQ10 | **O epitáfio é ditado por você, ou escolhe entre as três propostas da §4.4?** | (a) Escolhe entre as propostas ou dita o seu. | GATE-LENTE do Cemitério |
| PQ11 | **A abertura da HQ repete a fala da #5, ou sai uma nova e curta, sem reagir ao sprite do Gus na tela da tira?** | (a) Nova e curta, sem reagir ao sprite. (b) A mesma da #5. | GATE-COPY da HQ |
| PQ12 | **As respostas do Brunus entram palavra por palavra como vierem, só com a troca mecânica de travessão e emoji, e a tradução para o inglês vai a você?** | (a) Sim, palavra por palavra, e a tradução vai ao seu gate; o `//` dele, se houver, o Gus não vê. (b) Copyedit ao registro T5 (não recomendo: reescreve a fala de uma pessoa real). | **(agora)**: define a moldura |
| PQ16 | **A sua aprovação de 07/10 cobriu também os 18 pensamentos `//` do Gus, ou só as 18 perguntas?** (os pensamentos vão publicados; a pergunta já foi entregue sem eles) | (a) Cobriu os dois. (b) Só as perguntas: os `//` voltam ao GATE-CONTEUDO. | **(agora)**: define a moldura |
| PQ13 | **O Expediente diz, sem nome, que as respostas do Brunus são de uma pessoa real e que as perguntas do Gus são rascunho de agente aprovado por você?** | (a) Sim, uma linha seca (declarar é a defesa, L-09). (b) Não declara o método da Entrevista. | GATE-COPY do Expediente **(agora)**: a linha entra no briefing de ux-writer |
| PQ18 | **A linha do artista no Expediente diz "o mesmo artista da edição passada", como o D5 pede com "seja bem claro"?** | (a) Sim, com a frase. (b) Só nome, @ e link, como na #5. | GATE-COPY do Expediente |
| PQ14 | **A capa usa arte própria em CSS do placar 31 e 5 (que entrega o fecho da Reportagem na vitrine)?** | (a) Sim, CSS do 31 e 5. (b) `frame` nulo. (c) Arte sua. | antes da onda 4 |
| PQ17 | **O pôster central fica vazio com graça nesta edição?** | (a) Sim (a capa já carrega arte). (b) Repete o cartaz do placar. | antes da onda 4 |
| PQ15 | **Os rótulos "#7 a costura viva" e "#8 o motor de cartas", da mesma linha `EDICOES-ESTOQUE+`, também deixam a numeração antiga?** | (a) Sim, na mesma passada, por data, sem número (a #7 atual é a reservada da refundação). (b) Ficam como estão por enquanto. | agora (resíduo da D7) |

**Decididas (não se refazem, L-19):** D1 a D7 (§13 da pauta). O título em inglês, *The Easy Way*, está coberto por
D2 (a): a opção (a) era o par pt e en; o GATE-CAPA revê só o render em 390px.

---

## 6. Onda 0: tarefas do main (as que exigem Bash; eu não as executei)

1. **Ritual do bus (L-16, L-24 do site):** `git -C /home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm pull`;
   ler `inbox/site/` **e issues e discussions** (o que for do Gus Dragon se responde primeiro e é prioridade);
   depois refazer o Grep do cabeçalho `para:`/`Para:`/`Destinos:` dos arquivos da lista do A9 e fixar o N.
2. **Conferir D3 contra o texto original da pergunta** (A13): *"só fatos já no bus ou já públicos"* ou *"só fatos
   já públicos"*.
3. **`git log --date=iso --since=2026-08-04 --until=2026-08-21`** no repositório do jogo e no histórico anterior à
   refundação (`gusworld_legacy`, privado; memória `reference_gusworld_legacy`): para a Nota (A11), para a data de
   nascimento do RmlUi (22/06, ADR-008, regra da mais antiga; ver §4.4) e do GLFW, e para o ID de cada commit citado. **Converter UTC
   para America/Recife (GMT-3) antes de comentar hora** (a API do GitHub devolve UTC).
4. **A tirinha:** conferir o arquivo, medir largura e altura em pixels, **`sha256sum`**, copiar para
   `public_html/assets/edicao-6/` (nome decidido pelo main; o caminho de origem nunca entra em texto versionado) e
   conferir o `sha256` da cópia (L-02; precedente: `sec-11.php` da #5).
5. **`date`** real para o carimbo de cada mensagem ao líder (L-04 do site).
6. **Antes do GATE-GO:** a varredura do marcador `ENTREVISTA-PENDENTE` (§0), provada vermelha uma vez; o uptime
   (`scripts/uptime-sessoes.sh`); a #7 em rascunho no mesmo commit da publicação; a suíte **antes** do push.
7. **Fora do meu escopo, para registro:** `ED5-PAUTA` ainda diz que o deploy da #5 falta (A16); a linha da #5 do
   ledger `HISTORICO_GUS_ECOSSISTEMA` marcada `DISPONÍVEL (#6)` com data de setembro (pauta §10.4) é do main ao
   fechar a #6.

---

## Nota final sobre o que este documento NÃO decide

Nenhuma das peças acima tem, neste brief, uma linha de texto final aprovada. Os trechos marcados PROPOSTA (o
dek, o `alt`, os epitáfios, a nota do editor, as linhas do Expediente) continuam propostas até o GATE-COPY ou
GATE-CONTEUDO; este documento organiza escopo e fonte e não substitui o julgamento do líder. Onde a pauta registra
um verbatim dele como decisão fechada (D1 a D7), este brief a trata como fechada; onde registra "proposta" ou
"recomendo", preservo a mesma marcação.

---

## Respostas do líder (07/10/2026 17:10:21, por AskUserQuestion; opção escolhida verbatim)

- **PQ1 resolvida pelo main, sem nova pergunta:** a opção de D3 que o líder escolheu dizia "Só entram fatos que já estão no canal ou já são públicos". Os fatos que só existem no bus entram, citados com fonte e data.
- **PQ2:** "Só \"prefiro quebrar tudo\"". A parte sobre dinheiro fica fora.
- **PQ3:** "Ficam fora". Saem as duas frases da issue sobre custo e sobre suspender a distribuição.
- **PQ4:** "Fica para a #7". A frase do "wrapper" sai, e o bus abre a mensagem condensada sem ela.
- **PQ5:** "Sim, uma frase". Entra "são 6 telas e não 7".
- **PQ8:** "Não, só os 687 e 398 arquivos".
- **PQ12:** "Sim, palavra por palavra". Só a troca mecânica de travessão e emoji, e a tradução para o inglês vai ao líder.
- **PQ13:** "Sim, uma linha seca". O Expediente declara o método da Entrevista, sem nome.
- **PQ15:** "Sim, por data e sem número".
- **PQ16 resolvida pelo main:** a pergunta de 07/10 era "As falas e os pensamentos do Gus nas perguntas [...] Estão aprovadas?", e o líder respondeu "aprovadas". A aprovação cobriu as perguntas e os `//`.
- **PQ18 resolvida pelo D5:** "Seja bem claro que a arte é do artista andré, o mesmo da edicao anterior". A linha diz "o mesmo artista da edição passada", com nome, @ e link.
- **A11 (main):** o repositório atual do jogo começa em 21/08. O `git log --all` tem 0 commits de 04/08 a 20/08, porque a história anterior não está nesse repositório. **Nenhuma peça afirma "jogo parado"** sem outra fonte.
- **Ainda abertas:** PQ6, PQ7, PQ9, PQ10, PQ11, PQ14 e PQ17.

### Respostas do líder, rodadas 3 e 4 (07/10/2026 22:38:12)

- **PQ9:** "20/08, com o decreto no texto".
- **PQ10:** o epitáfio é **"Aqui jaz um nome. O corpo continua de pé."**, a proposta 1, escolhida pelo líder.
- **PQ6:** "15, essas duas". São o anúncio do mapeditor de 14/08 e a pausa de 15/08.
- **PQ7:** **"Registro técnico"**. A Galeria explica o defeito em linguagem técnica, e NÃO de dentro do mundo.
- **PQ11:** "Nova e curta". A abertura da HQ não reage ao sprite.
- **PQ14:** "Sim, o placar 31 e 5". A capa tem arte em código.
- **PQ17:** "Sim, vazio com graça". O pôster fica vazio com graça.
- **Todas as perguntas dos briefs estão respondidas.**

### Resposta do líder ao GATE-CONTEUDO da Reportagem (07/10/2026 23:26:51, por AskUserQuestion, verbatim)

> acrescente que preferi quebrar tudo pois, por mais que eu insistisse em retirar as libs externas, você insistia em envelopar e ligar novamente com as libs que pedi pra tirar e foi isso que chamei de caminho mais fácil. Você sempre queria seguir o caminho mais fácil, ligando de novo nas libs que seriam proibidas. Uma hora me irritei e apaguei o repo glintfx do github e criei um novo limpo. Da mesma forma fiz com o jogo, apaguei o repositório de recriei um do nada. Para evitar que novamente você continuasse insistindo, criei o GODS LAWS md (tem dado certo). AS decisões, lore e outras coisas que não eram código do jogo, foram buscadas em um .git salvo na pasta temp que depois mandei colocar em um repo legado do jogo, com medo de que tivesse aidna codigo antigo que se propagasse novamente e recomecei o jogo do zero também, bem definido o que é do framework e o que é do jogo, deixando MUITO claro que o framework é para distribuiçao, pois outra grande insistência contínua sua era que glintfx era para uso apenas com GusWorld e eu precisava ficar lembrando isso a cada fatia e me irritava cada vez mais.

- **Status:** a Reportagem NÃO está aprovada como v1; o líder pediu acréscimo. Parte do acréscimo (apagar e recriar os repositórios, o repo legado, a criação do GODS_LAWS) cai depois de 20/08, fora do recorte D1 e dentro de `MATERIA-REFUNDACAO-DOS-REPOS` (reservada para a #7). O alcance vai ao líder antes da v2.
