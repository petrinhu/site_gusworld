# Pauta da Edição #3 da Glyfesse (mapa de edição)

> Artefato de saída do estágio **E1** do `PIPELINE-EDICAO`. **GATE-PAUTA: ✅ APROVADO** pelo editor-geral em
> **2026-08-01, ~08:37.** Este documento deixa de ser proposta: é o **mapa aprovado da Edição #3**.
> Managing editor: `product-manager`. Montagem: 2026-08-01. **Rev. 2 no mesmo dia**, incorporando três
> decisões do editor-geral: (1) a seção 8 vira **"Detonado da Simulação"**, cheia, só neste número;
> (2) ★★ **correção de régua** — a âncora é a **cronologia ascendente dos fatos**, não uma data nem um
> intervalo; (3) a seção 18 **não é removida**, vira vazio com graça com o trocadilho do ônibus.
> **Rev. 3**, mesmo dia: **D4 resolvido no `git log`** (o retângulo virou o **Cauã**, não o Gus; errata do
> `LEVANTAMENTO-HISTORICO` registrada) e a **tabela de cortes re-auditada linha a linha com a régua nova**.
> Fontes: `LEVANTAMENTO-HISTORICO.md`, `ROTEIRO-ENTREVISTAS.md`, `data/edicoes.php`, e conferência direta em
> `Projects/gusworld/CHANGELOG.md`, `ROADMAP.md`, `docs/tech/adr/ADR-008` e `Projects/loucura_c_asm/docs/adr/0001` (leitura read-only).

---

## ✅ Decisões do GATE-PAUTA (editor-geral, 2026-08-01)

| # | Decisão | Status |
|---|---|---|
| **GATE-PAUTA** | **Mapa APROVADO como está**, sem enxugar: sete seções com conteúdo real, Cemitério com três lápides, o resto em vazio-com-graça | ✅ **APROVADO 2026-08-01** |
| **D1** | **A inversão está CONFIRMADA: o Gus pode ser entrevistado.** A ordem de 2026-07-25 supera a regra de 2026-07-19. A regra velha está sendo apagada da memória do projeto para não restarem duas verdades | ✅ **DECIDIDO 2026-08-01** |
| **D2** | **A lápide da tentativa 3D vai para a #4.** Recomendação aceita: não há fonte que a mate em junho, e o gate 2D-vs-3D (24/jun) é o marco da #4. Enterrá-la aqui seria contar o fim antes do meio | ✅ **DECIDIDO 2026-08-01** |

**As sete seções com conteúdo real**, para que o E2 não precise adivinhar a conta: as **seis com escrita nova**
(Entrevista, Reportagem, Programação, Editorial, Galeria de Bugs e Detonado da Simulação) **mais o Cemitério**
(três lápides curtas sobre layout reaproveitado). Além delas, com trabalho mas sem escrita nova de matéria: o
**Pôster** (só arte), a **NOTA** (copy curta) e o **Cupom** (mini-app recorrente). O resto é vazio-com-graça,
reuso ou data-driven, e **todo vazio re-gate sempre** (decisão do editor-geral de 2026-07-19).

**Efeito do D2 no Cemitério:** confirmadas as três lápides propostas (Godot †21/jun, C# .NET 8 AOT †21/jun,
Qt6 †22/jun), e a do 3D fica reservada para a #4.

## ✅ Decisões do editor-geral de 2026-08-01, ~09:11 (segunda rodada)

Seis decisões, tomadas depois do GATE-PAUTA. As três primeiras fecham as pendências do Detonado; a quarta
muda a voz da revista inteira.

### D11 ✅ O Detonado publica a saída REAL da máquina, censurada como documento desclassificado

O editor-geral **não** escolheu o agregado que eu havia recomendado. Escolheu a opção mais ambiciosa, e é a
melhor ideia visual do número: a página mostra **a saída de verdade**, censurada como um documento de governo
que vazou. Esboço à mão dele conferido pelo `team-lead` (papel pautado, título "SESSÃO DETONADO", linhas
onduladas simulando texto, tarjas pretas, carimbo diagonal).

**A peça:**
- **Tarjas pretas** ao longo do texto, cobrindo os trechos sensíveis.
- ⚠️ **Cobrem NOMES DE MESTRE _e_ MECÂNICA NÃO ANUNCIADA**, os dois (confirmado expressamente por ele).
- **Carimbo vermelho grande, na diagonal, atravessando a página:** retângulo de cantos arredondados, borda
  vermelha, interior com **`CENSURADO!!!`** em caixa alta, vermelho, negrito. **Torto e descuidado**, "como se
  um burocrata tivesse cuidado desse documento".
- **Dentro do retângulo, canto inferior direito, bem pequeno mas ainda legível: `sterling corp.`**

#### ⚠️⚠️ O requisito técnico duro (o mais importante da peça)

Verbatim do líder: *"não deixe hardcoded no código da página para os malandros não irem atrás lendo o
html/css/etc."*

**O texto censurado não pode existir no HTML entregue.** Tarja desenhada **por cima** do texto é a falha
clássica que vaza PDF de governo: a palavra continua no documento e sai com dois cliques. A censura acontece
**na origem** — a palavra **nunca é escrita**, e a tarja é elemento decorativo vazio.

**Critérios de aceitação, para o brief, a prova final (E4) e o GATE-RENDER:** procurar cada termo censurado no
HTML, CSS e JS servidos e **não achar nada**. Achou, reprova.

**Quatro superfícies de vazamento que o critério acima NÃO cobre, e que eu acrescento como parte do mesmo
requisito** (cada uma já queimou este projeto ou está em canon da casa):

1. **O arquivo de rascunho.** `docs/content/` é **repo público**. Se o redator escrever o texto inteiro e a
   censura só acontecer no template, a versão sem tarja fica no repo **e no histórico do git para sempre**.
   Vazamento em repo público se verifica no histórico, não na árvore, e o conserto exigiria reescrita de
   histórico. **Regra: o termo censurado nunca é escrito em arquivo rastreado nenhum**, nem no rascunho, nem
   no `alt`, nem no nome de arquivo, nem na mensagem de commit (que é imutável depois de pushada).
2. **O texto de acessibilidade.** `alt` e `aria-label` são texto público e costumam nascer sem auditoria. O
   rótulo da tarja diz **"trecho censurado"** e nada mais; nunca "censurado: <termo>".
3. **A largura da tarja entrega o tamanho da palavra.** Barra do comprimento exato do termo vaza a contagem de
   letras, que num conjunto pequeno de nomes conhecidos é quase o nome. **Larguras quantizadas** (três ou
   quatro tamanhos fixos), nunca proporcionais ao termo.
4. **A captura bruta**, se houver. O arquivo original da saída não entra no repo; o que entra é a peça já
   censurada.

#### Autorização expressa de spoiler registrada (o `sterling corp.`)

Ao assinar o carimbo com **"sterling corp."**, o editor-geral **liberou o tease do vilão**, que estava marcado
como decisão exclusiva dele (a facção antagonista consta do território de spoiler denso do
`LEVANTAMENTO-HISTORICO`). **Autorizado por ele, in-fiction, em 2026-08-01**, como a corporação que censurou o
documento. Registrado aqui com data para não virar dúvida no GATE-SPOILER nem na prova final.

### D12 ✅ A fala do playtest do líder entra, em uma linha

Autorizada a publicação. Voz de **root**, seca e rara, no fim da seção.

### D13 ✅ A figura mostra a arena

Consequência assumida com todas as letras pelo editor-geral: o leitor vê a arena pronta antes da edição que
conta como ela foi feita.

### ★★ Mudança de voz, e vale para a #3 INTEIRA

Provocada pelo **Gus real**: um terminal de hoje mostra `usuário@máquina:pasta$`, não `nome>`. O líder acatou.

```
[personagem]@glyfesse:[seção atual da revista]$ [fala]
// [pensamento]
```

- O **`//` não muda**: mesmas regras de registro digitado (sem ponto final, `?`/`!` mantidos, reticências,
  dose de erro de dedo).
- O "caminho" é **a seção da revista** onde a fala acontece.
- ★ **Refinamento do líder (2026-08-01, ~09:32), verbatim:** *"se a fala não for em sessão específica, fica um
  `~` no lugar da [sessão atual]"*. Logo: `gus@glyfesse:~$ boot ok` para **fala solta** (capa, chamada,
  brincadeira) e `gus@glyfesse:/detonado$ ...` quando ela acontece **dentro de uma seção**. Encaixa exato na
  convenção unix (`~` = home) e **resolve o caso das falas fora de seção sem obrigar ninguém a inventar nome
  de seção falso**.
- ⚠️ **Normalização que decorre do exemplo dele:** o líder escreveu o caminho de seção **com barra inicial**
  (`/detonado`). Alinhei a tabela de prompts das lentes a esse formato (`:/editorial$`, `:/reportagem$` etc.),
  porque `~` e `/seção` juntos só fazem sentido como home e caminho absoluto. Fica registrado para dois
  redatores não escreverem duas formas do mesmo lugar.
- É **`glyfesse`**, não `glintfx` (confirmado com o líder).
- O **`root` se distingue por COR, não por forma.** Vermelho é **sugestão, não está cravado**.
- **Alcance: só da #3 em diante.** A #1 e a #2 **ficam no formato antigo e não são reajustadas**, porque numa
  revista que é registro histórico o jeito de falar evoluiu junto com o projeto. ⚠️ **A divergência entre
  edições NÃO é defeito** e não deve ser levantada na prova final.
- **Reverte** a recusa do `$` unix de 16/07 (que fora por legibilidade). Registrado como **evolução**, não
  como contradição: o argumento novo venceu o antigo, e veio de quem é o público-alvo.

#### Três consequências que a produção tem de honrar

1. ⚠️ **A estrutura canônica da seção técnica muda junto.** O molde herdado da #1 manda o CRT digitar
   `root@glyfesse>~$nano`, que é a **forma antiga**. Sob o formato novo isso vira
   **`root@glyfesse:programacao$ nano`**. Recomendo atualizar, porque a incoerência ficaria justamente na
   seção que fala de rigor técnico, e porque o formato novo é mais fiel a um terminal de verdade, que é o
   motivo da mudança. **Vai ao líder no GATE-LENTE da Programação.**
2. **O caminho é escrito em ASCII, sem acento** (regra tela×papel, `D-ACENTOS`): `programacao`, não
   `programação`. O prompt é tela; o corpo da matéria é papel e mantém a acentuação completa.
3. ⚠️ **A cor do root precisa ser MEDIDA, não escolhida no olho.** O vermelho tem de ser aferido **contra o
   fundo real de cada elemento** (papel envelhecido **e** CRT são fundos diferentes, e a mesma cor pode passar
   num e reprovar no outro por margem pequena). Recomendo **computar a matriz inteira** (os vermelhos
   candidatos × os fundos reais) de uma vez, em vez de testar um vermelho e ir corrigindo: é o método que
   evita o recorte em que se mede sempre a mesma cor e se deixa passar a outra. Se reprovar, **duas opções
   sobem ao líder** — ninguém escolhe sozinho.

### Estado das decisões abertas depois do gate

| Fechadas | Como |
|---|---|
| **D1**, **D2** | Decididas pelo editor-geral neste gate (acima) |
| **D4** | Resolvida no `git log` pelo `team-lead` em 2026-08-01: era o **Cauã**, não o Gus (`943788f`). Ver §Quinta correção |
| **D5** | Dissolvida pela correção de régua: o masthead mostra estado, não narra fato. Não chegou a ir ao gate |

| Seguem abertas | Para onde vão |
|---|---|
| **D3** (o beat do Cauã na Reportagem), **D6** (a data dos bugs da Galeria), **D7** (semear o terceiro repositório), **D8** (o Pôster), **D9** (o spoiler da Entrevista) | **GATE-LENTE**, uma pergunta por seção, no S1 |
| **D10** (o convidado da #4 e como intercalar a Trilha B) | **GATE-PAUTA da #4.** Não trava nada aqui |

---

## ★★ Correções cronológicas apuradas nesta pauta (antes do mapa)

A tabela de correção da `PAUTA-EDICAO-2.md` atribuiu à #3 as mortes de 22/jun citando a **tentativa 3D** e o
**ADR-008**. Fui conferir na fonte primária e **três coisas não batem**. Nenhuma invalida a #3; duas mudam o
conteúdo do Cemitério.

| O que a PAUTA-2 registrou | O que a fonte diz | Onde conferi |
|---|---|---|
| "A tentativa 3D morreu em 22/jun, ADR-008" | **O ADR-008 não é sobre 3D.** Ele é o re-pivô **Qt6 -> SDL3 + RmlUi + miniaudio** (Status Accepted, Data 2026-06-22). A palavra "3D" não aparece nele | `gusworld/docs/tech/adr/ADR-008-repivot-qt-to-sdl3.md`, linhas 1-5 |
| "A tentativa 3D morreu em 22/jun" | **Não encontrei fonte de morte do 3D em 22/jun.** O que há é o **gate 2D-vs-3D fechado em 24/jun** (arena com sprites PixelLab), fora da janela desta edição. E o CHANGELOG diz que o 3D **nunca foi runtime**: "O jogo é 2D em runtime; o 3D é só ferramenta de produção" | `LEVANTAMENTO-HISTORICO.md` (linha de 2026-06-24); `gusworld/CHANGELOG.md` linha 119 |
| "Godot: 22/jun -> 22/jul" | A decisão de largar o Godot é de **21/jun** (`docs/tech/pivot/engine-design.md`), um dia antes da âncora. O **decommission** (apagar do repo) é o M8, **22/jul** | `gusworld/CHANGELOG.md` linhas 29 e 101-103 |

**Consequência para o Cemitério da #3:** a lápide do 3D **não tem data que a sustente aqui**; recomendo movê-la
para a #4 (a edição da arena, 24/jun), onde o gate que a matou realmente fechou. No lugar dela entram três
mortes **documentadas e datadas dentro da janela** (Godot, C# .NET 8 AOT e Qt6). É uma troca boa: o Cemitério
fica **mais forte**, não mais fraco, porque ganha a melhor lápide do acervo inteiro (ver §Cemitério).

**Uma quarta imprecisão, sem efeito no mapa mas registrada:** o `LEVANTAMENTO-HISTORICO` rotula 21/jun como
"**glintfx** NASCE". O que nasceu em 21/jun foi o **repositório `loucura_c_asm`**, e ele nasceu como o runtime
**C + Assembly sem libc** (ADR-0001 "Syscall layer style", Accepted 2026-06-21). O glintfx (a lib de UI) só
existe a partir de **28/jun** e a primeira release, v0.1.0, é de **29/jun**. Isso importa para a §Datas.

### ★ Quinta correção, resolvida no `git log` em 2026-08-01: o retângulo virou o **Cauã**, não o Gus

Eu havia levantado isto como decisão aberta D4, sem poder resolver (não tenho shell nesta sessão). O
`team-lead` foi à fonte primária. Commit `943788f`, **22/06/2026 21:57**, título literal:

> `feat(M1): jogador vira sprite animado (Caua Volt) no lugar do retangulo`

Corpo: *"Primeiro sprite real no M1 (pipeline PixelLab validado). O quad colorido do jogador vira sprite
texturizado animado nas 4 direcoes."*

**O `CHANGELOG.md` do jogo estava certo** ("o sprite do Cauã reintegrado") e o
**`LEVANTAMENTO-HISTORICO.md` está errado** ao registrar 22/jun como "O retângulo vira **o Gus**".
**Errata a aplicar no arquivo-mestre depois** (não corrigido agora, só registrado aqui).

**As três consequências:**

1. **O gancho.** O primeiro corpo animado que o jogo teve não é o do protagonista: é o do **Cauã "Volt"**. E é
   o Cauã quem entrevista o Gus **nesta mesma edição**. O entrevistador da #3 é, literalmente, o primeiro
   personagem que aprendeu a andar, e o Gus ainda era um retângulo quando isso aconteceu. É material de
   primeira para o `//` da Entrevista e para o beat final da Reportagem. **Recomendo usar; a decisão é do
   líder no GATE-LENTE.**
2. ⚠️ **Os assets estão fora do git.** O rodapé do commit diz: *"Assets do Caua em
   `resources/sprites/caua_volt/` (fora do git)."* Logo **nenhuma peça pode depender da arte do Cauã**. Isso
   **bloqueia** a alternativa do Pôster (o antes/depois quadrado -> sprite) exatamente como a falta de asset
   limpo bloqueou o Pôster da #2. Ver D8.
3. **Uma incoerência menor, para o líder decidir sem pressa:** o brinquedo do hero do site (item
   `QUADRADINHO`) reencena 22/jun e faz o quadrado **virar o Gus**, usando o sprite `gustaf_i_tavus_vance`.
   Historicamente, naquele dia, ele virou o Cauã. Não é defeito: o brinquedo é estilização e o protagonista é
   a escolha óbvia para um brinquedo de vitrine. Registro só para que a escolha seja consciente, já que a
   Reportagem desta edição vai contar a versão correta ao lado dele.

---

## O marco e a data-âncora

- **Marco:** **a primeira coisa que se mexe.** Em três dias, o jogo troca de fundação, ganha um corpo visível e
  troca de fundação de novo.
- **Data-âncora primária:** **22 de junho de 2026** (`ce17f78`, `c12cb30`, M1 camada visual: janela Qt6 + loop
  de tempo fixo + `render2d`; o boneco anda, corre e desliza nas paredes com corner-correction estilo Stardew).
- **Janela coberta:** **21 a 23 de junho de 2026.** Abre na decisão de largar o Godot (21/jun) e fecha no
  **loop jogável validado ao vivo pelo líder em 23/jun** (`ROADMAP.md`, M1 e M4: "Validado no display do líder
  (2026-06-23)"). Três dias.
- **Fecha antes de 24/jun de propósito:** a arena com sprites do PixelLab e o gate 2D-vs-3D são de 24/jun e são
  a matéria da #4. O `TODO.md` do site já trata os dois como pontos distintos do scrubber
  ("quadrado 22/jun -> arena 24/jun -> julho", item `LINHA-TEMPO`).

**Os commits da janela** (todos do `LEVANTAMENTO-HISTORICO`, seção Parte (a)):

| Data | Commit | Marco |
|---|---|---|
| 21/jun | `5040ed5`, `5461ce2` | **Pivô 3:** Godot/C# -> C++20 + engine própria (Qt6). Board M0-M8, 4 camadas, GPLv3. A GusEngine nasce. M0 andaime + M3 portado C#->C++ em TDD no mesmo dia |
| 21/jun | `f01cd93` | Nasce o repositório `loucura_c_asm` (o runtime C+ASM sem libc). ⚠️ **ainda não é o glintfx** |
| 22/jun | `31a856d`…`e3b2331` | M5 combate, M2 input, M4 colisão de grade portados C#->C++ em TDD. Save sobe a V4 |
| **22/jun** | **`ce17f78`, `c12cb30`** | **★ O QUADRADO AZUL.** M1: janela + loop fixo 60Hz + `render2d`. O boneco anda, corre com Shift e desliza nas paredes |
| 22/jun | `300329a` (ADR-008) | **Pivô 4:** Qt6 -> SDL3 + RmlUi + miniaudio. O Qt6 morre com cerca de **um dia de vida** |
| 22/jun 21:57 | `943788f` | **O retângulo vira o Cauã "Volt"**, primeiro sprite real do M1 (pipeline PixelLab validado, 4 direções). ⚠️ **não é o Gus**, o `LEVANTAMENTO` erra nisto; ver §Quinta correção e D3 |
| 23/jun | `39fdc75`, `2e41597` | M4 loop jogável em SDL fechado e **validado ao vivo pelo líder**; Carga do Aparato re-enquadrada |

---

## O tema-guarda-chuva

**"A primeira coisa que anda."** Na #1 o mundo foi escrito; na #2 ele começou a ser construído, e o Gus fechou
o Editorial dizendo que nem tudo que se ergue fica de pé, "mas isso é problema de outra data". **A #3 é a
outra data.** Dezoito dias depois de anunciar que o mundo agora era escrito em C#, o C# está morto, o Godot
está condenado, o Qt6 nasce e morre no mesmo fim de semana, e **no meio de toda essa demolição um quadrado
azul dá o primeiro passo numa sala branca.** É a primeira edição em que existe algo que se pode olhar se
mexendo. A promessa da #2 se cumpre e se trai ao mesmo tempo: o andaime caiu, mas alguma coisa ficou de pé, e
essa coisa é um retângulo.

A #2 era o retrato feliz antes do velório. A #3 é o velório **e** o parto, no mesmo fim de semana.

---

## Mapa das 19 seções

| # | Seção | Estado na #3 | Assunto / lente | Data-âncora |
|---|---|---|---|---|
| 1 | Capa | **cheia** (montagem) | Manchete do marco: o quadrado azul anda. Frame já existe e já está publicado (`/assets/frames/edicao-3.png`) | 22/jun |
| 2 | Índice | **cheia** (montagem) | `↩ a banca` na 1ª entrada; fecha com os 3 links fixos (GusWorld, GlintFX, `TODO.md` do jogo) | - |
| 3 | Editorial (Carta do Gus) | **CHEIA ★** (curta) | Cobra a própria promessa da #2 ("problema de outra data") e abre a era do que se move | 22/jun |
| 4 | Reportagem de capa | **CHEIA ★** (cara) | O arco de três dias: derrubar, andar, derrubar de novo. O quadrado como o primeiro sinal de vida | 21 -> 23/jun |
| 5 | A NOTA do jogo inacabado | **cheia** (curta, NOVO) | A linha "Jogabilidade" sai de `<NULL>` pela primeira vez. Gráficos continuam impublicáveis | 22/jun |
| 6 | Galeria de Bugs | **CHEIA ★** (curta, **estreia**) | **Dívida da #2**, que prometeu em texto publicado: "Volte na #3". O pé colado na parede e a diagonal que travava no último eixo | 22-23/jun ⚠️ D6 |
| 7 | Cemitério das Ideias Mortas | **CHEIA** (3 lápides, layout reaproveitado) | Godot (†21/jun), C# .NET 8 AOT (†21/jun) e **Qt6 (†22/jun, cerca de 1 dia de vida)** | 21-22/jun |
| 8 | **Detonado da Simulação** | **CHEIA ★** (nova, só na #3) | Explica **superficialmente o combate por turnos** (motor portado em 22/jun) e mostra o **resultado de um teste recente da tela da arena**. Seção de **serviço, atemporal**: guia de "como se joga", não reportagem datada. ⚠️ ver §Detonado | atemporal |
| 9 | Errata + Cartas | vazio com graça (copy nova curta) | Errata da #2 se houver; cartas ainda em zero | - |
| 10 | Classificados in-world | vazio com graça | Reusar #1 (idêntico, com os typos e IDs) | - |
| 11 | HQ | vazio com graça (3 quadros novos, CSS) | O terminal da #2 vira sala vazia: o quadrado dá um passo, esbarra, insiste | 22/jun |
| 12 | Próximos Lançamentos | vazio com graça | Reusar #1. ⚠️ sem citar áudio/NPC/save-load: tudo de julho | - |
| 13 | Pôster central | **CHEIA ★** (só arte, zero escrita) | **"O quadrado azul, tamanho real"**: o quadrado em CSS puro ocupando a página inteira. Piada de pôster central de revista 90s, custo próximo de zero, risco de vazamento zero | 22/jun |
| 14 | Brinde | vazio com graça | Reusar #1 (os 2 downloadables) | - |
| 15 | Cupom recortável | **cheia** (recorrente) | Reusar o mini-app (`src/includes/cupom.php`), como #1 e #2 | - |
| 16 | A Entrevista | **CHEIA ★★** (a mais cara) | **O Cauã "Volt" entrevista o Gus.** Primeira vez que o Gus responde em vez de perguntar. ⚠️ inversão de regra, ver §Entrevista | atemporal |
| 17 | Seção de Programação | **CHEIA ★** (cara) | ADR-008 na íntegra: por que o Qt6 durou um dia, e por que trocar de fundação custou pouco (a invariante das 4 camadas) | 22/jun |
| 18 | O Gus lê o bus | **FICA** (vazio com graça) ★ | **Revertida a remoção.** O bus está vazio porque em junho o cano ainda não existe, e o Gus vira isso em trocadilho: o **ônibus** cheio de fantasmas indo para o Cemitério. Aponta para a seção 7 do mesmo número. Copy verbatim do líder, ver §Seção 18 | 22/jun |
| 19 | Expediente | **cheia** (data-driven) | Créditos, licença, AI-disclosure. **Estreia a linha de uptime** no masthead (campo `uptime` do `$edicoes`) ⚠️ ver D5 | - |

---

## As "caras" da #3 (onde há escrita nova de verdade)

**Recomendo 5**, o mesmo número da #2, com a mesma distribuição de custo. Não inflei: uma das cinco é uma
dívida em texto já publicado, e uma das que a #2 tratou como cara (o Cemitério) aqui volta a ser barata,
porque o layout de lápide em CSS já existe e só a copy muda.

| # | Seção | Tamanho | Por que vale a pena |
|---|---|---|---|
| 1 | **A Entrevista** (Cauã -> Gus) | **L** | É a mais cara e é a que justifica o número. Estreia a série da party, e é a **primeira vez que o Gus responde**. O `//` dele (o pensamento) é onde mora a ferida do personagem, e a revista nunca mostrou isso de dentro. Método: dois agentes de persona improvisando turno a turno, mediados pelo orquestrador (funcionou na #2) |
| 2 | **Reportagem de capa** | **M/L** | O arco de três dias é a melhor história compacta do acervo: derrubar, andar, derrubar. Tem começo, meio e fim dentro de um fim de semana, e termina com o criador validando ao vivo |
| 3 | **Seção de Programação** | **M** | O eixo expert com a fonte pronta: o ADR-008 está escrito, é técnico puro, sem spoiler nenhum, e responde a pergunta que o leitor leigo também faz ("como é que se joga fora uma fundação em um dia sem perder o trabalho?"). A resposta é a invariante das 4 camadas |
| 4 | **Editorial** | **S** | Curto por desenho. A ponte se escreve quase sozinha: a #2 terminou com "isso é problema de outra data" e a data chegou |
| 5 | **Galeria de Bugs** | **S** | **Não é escolha, é dívida.** A copy do vazio da #2, já publicada, diz literalmente "Volte na #3" / "Come back in #3". Se a #3 sair com a Galeria vazia de novo, a revista quebra uma promessa impressa. É a mais barata das cinco: dois bugs curtos, layout de terminal verde já existente |

### A sexta peça, entrada por ordem do editor-geral em 2026-08-01

| # | Seção | Tamanho | Nota |
|---|---|---|---|
| 6 | **Detonado da Simulação** | **S/M** | Não estava na minha proposta e **não a estou contando como "cara"** para não maquiar o custo: é uma peça de **serviço**, curta, com a fonte pronta (o motor de combate está descrito no CHANGELOG e o número da suíte está no board do jogo). O que a encarece não é a escrita, é o **GATE-SPOILER próprio** que ela exige (ver D11) e a decisão sobre a figura do teste |

Com ela, a #3 tem **seis peças com escrita nova**, contra cinco na #2. O acréscimo é real mas modesto, e é o
tipo de seção que a revista de 1994 tinha de verdade: o detonado é serviço ao leitor, não reportagem.

**Fora das seis, mas com trabalho:**
- **Cemitério** (3 lápides curtas): agora **leve**. O layout de lápide centralizada em CSS foi feito na #2 e é reaproveitado; o custo é só a copy de três epitáfios.
- **Pôster central**: **arte, zero escrita**. Recomendo o quadrado azul em tamanho de pôster, em CSS puro. Zero arte nova, zero captura de tela, zero risco de vazamento (a #2 ficou com o pôster bloqueado justamente por falta de asset limpo). E é a piada certa: a revista de 1994 dava o pôster do chefe final; a Glyfesse dá um quadrado.
- **NOTA** e **HQ**: copy curta, moldes já existentes.

Todo o resto é vazio-com-graça, reuso ou data-driven.

---

## ★★ A checagem de cronologia ascendente

### A régua mudou (correção do editor-geral, 2026-08-01)

Verbatim do líder, e vale para a revista inteira, não só para este número:

> *"a âncora não é a DATA ou intervalo de datas específico. É a cronologia ascendente dos fatos."*

A primeira versão desta pauta aplicou a trava como **cerca em volta de 22/jun**: tudo posterior era cortado. É
mais duro do que a regra pede, e cortava coisa boa à toa. **O critério correto é outro:**

| Critério errado (o que eu usei antes) | Critério certo (o do líder) |
|---|---|
| "Isto é posterior a 22/jun? Então corta." | "**Isto quebra a ordem ascendente da narrativa?** Então corta." |

O que a regra protege é a **ordem em que os fatos são contados**: a revista avança cronologicamente e **não
conta o depois antes do antes**. Um leitor que acompanha a série nunca deve descobrir um fato antes do fato que
o explica. Consequências práticas da correção:

- **Narrar** um fato de julho numa edição de junho continua proibido: fura a ordem.
- **Mostrar o estado atual** de algo, sem narrar fato fora de ordem, **não viola nada**. É por isso que a
  **seção 8 (Detonado)** cabe: ela não conta quando a arena foi construída, ela mostra que o jogo roda hoje.
- **Seção sem material** por causa da cronologia não precisa ser removida: pode virar **vazio com graça**, e o
  próprio vazio pode ser a piada. Foi assim que a **seção 18** voltou (ver abaixo).

### O que sai, e por quebrar a ordem (não por data)

**Re-auditada linha a linha com a régua nova em 2026-08-01.** Duas linhas mudaram de verdade, porque a régua
nova separa **narrar** de **mostrar**, e a seção 8 agora **mostra** justamente o tipo de coisa que estas linhas
excluíam. A coluna da direita passa a dizer, quando for o caso, **o que continua permitido**. As outras quatro
linhas sobrevivem à troca de régua sem mudança de veredicto.

| Elemento | O fato que ele obriga a contar | Veredicto sob a régua nova |
|---|---|---|
| **O nome e a lib "glintfx"** no conteúdo | que a lib nasceu (28/jun), virou release (29/jun) e foi adotada pelo jogo (01/jul) | **SAI como narração.** Citar o glintfx obriga a explicá-lo agora, antes da edição que o apresenta. **Mas o que ele desenha pode aparecer:** a tela da arena do Detonado foi feita com ele, e mostrá-la não conta a história dele. Regra para o brief: **nenhuma peça nomeia o glintfx**; o link fixo do índice permanece (chrome, decisão C1 da prova da #2) |
| **A OOM** (16/jul) e **o bug do flash** (17/jul) na Galeria | dois episódios inteiros de julho | **SAI.** Veredicto inalterado. Cada um é matéria própria de uma edição futura; contá-los aqui entrega julho dentro de junho. (O argumento de "queimar munição" é editorial e reforça, mas o que decide é a ordem) |
| ⚠️ **A arena 2D / o gate 2D-vs-3D** (24/jun) | o desfecho do 2D-vs-3D | **MUDOU.** Sai o **relato** (como a arena foi feita, quando o gate fechou, o que ele decidiu): é o marco da **#4** e entregaria o fim antes do meio. **Não sai a imagem:** o Detonado pode exibir a tela da arena como estado atual. ⚠️ **E "sprites PixelLab" sai desta linha**: a resolução do D4 provou que o pipeline PixelLab já estava validado em **22/jun**, dentro da janela (`943788f`). Não é material de julho nem da #4 |
| **A lápide da tentativa 3D** | o desfecho do 2D-vs-3D | **SAI.** Veredicto inalterado, e agora por dois motivos independentes: fura a ordem (é o mesmo desfecho da linha acima) **e** não há fonte que a mate em junho (ver §Correções e D2) |
| ⚠️ **Cockpit tático, áudio/crossfade, NPC Bertoldo, save-load, motor de cartas, os 21 mestres** (01 a 09/jul) | meses inteiros de desenvolvimento | **MUDOU em parte.** Sai o relato de todos, e o roster dos mestres sai **também por spoiler**, que é trava independente da cronologia. **Ressalva nova:** a tela da arena **é** o cockpit tático, então mostrá-la no Detonado é permitido, desde que nenhuma peça conte que ele foi construído em 01/jul nem com que ferramenta |
| **O site e a própria Glyfesse** (15/jul) | a revista se descobrindo | **SAI.** Veredicto inalterado. A revista se descrevendo a si mesma é matéria das edições de julho |

> **A regra de bolso que sai desta re-auditoria, e que o brief de toda peça deve carregar:**
> **pode-se MOSTRAR o jogo como ele está hoje; não se pode CONTAR como ele chegou lá, fora de ordem.**
> Foi o que destravou a seção 8 e é o que mantém as seis linhas acima de pé.

### O que ENTRA por não quebrar ordem nenhuma (o que a régua nova destrava)

| Elemento | Por que passa |
|---|---|
| **Seção 8, Detonado da Simulação** | Seção de **serviço, atemporal**: explica como o combate funciona e mostra que ele roda **hoje**. Não narra quando a arena foi feita, não antecipa marco de edição futura, não conta desfecho de nada |
| **Seção 18, O Gus lê o bus** | O bus **estar vazio** é o fato correto para junho, e o Gus comenta o próprio vazio. Nenhum fato futuro é narrado; a piada aponta para o Cemitério **deste mesmo número** |
| **O campo `uptime` do masthead** | Mostra estado atual (medido no dia da impressão), não narra fato. A colisão que eu havia levantado em D5 **deixa de existir** sob a régua nova |

### Verificado e liberado

- **A party do jogo** (portanto o Cauã e o Gus como personagens): canônica desde **15/mai/2026**
  (`party.md` rev. 2), anterior a toda edição. A Entrevista **não** é anacrônica.
- **O quadradinho jogável do site** (o brinquedo do hero, item `QUADRADINHO`): é chrome do site e **reencena**
  o artefato de 22/jun. Não fura ordem nenhuma. ⚠️ Mas a transformação que ele mostra é o quadrado virando
  **o Gus**, e em 22/jun o quadrado virou **o Cauã** (D4 resolvido): a estilização diverge do fato que a
  Reportagem vai contar ao lado dela. Não é defeito e não bloqueia nada; ver §Quinta correção, item 3.
- **A linha do tempo (scrubber)**: a #3 é o **primeiro e único ponto visual** publicado
  (`na_linha_tempo => true`). Consistente com a #1 e a #2 estarem fora do scrubber.
- **Os 3 links fixos do índice**: chrome atemporal, decidido na prova da #2. Ficam.

### O caso de fronteira que a régua nova resolveu sozinho (era o D5)

O campo `uptime` da #3 (`['jogo' => 1456, 'glintfx' => 326]`, capturado em 25/07) **nomeia o glintfx** no
masthead de uma edição datada 22/jun. Sob a régua antiga isso era uma colisão entre dois canons e eu ia levar
ao gate. Sob a régua nova **não é violação**: o masthead **mostra estado**, não **narra fato**, e o nome ali é
rótulo de instrumento de medição, não uma matéria sobre o glintfx. Fica como está, sem pergunta ao líder.

---

## A seção 8: "Detonado da Simulação" (nova, só na #3)

Decisão do editor-geral, 2026-08-01. A seção 8 sai do vazio-com-graça neste número e volta a ele nos próximos,
salvo decisão caso a caso. **Não vira seção fixa.**

**Escopo dado pelo líder:**
1. **Explicar superficialmente o combate por turnos.** Ancoragem perfeita: o motor `turn_combat`
   (`CombatStateMachine`, `ComboTable`, brains de inimigo, RNG injetável, filas de atores) foi portado de C#
   para C++20 em TDD **em 22/jun**, `31a856d`…`e3b2331`, exatamente na âncora deste número.
2. **Mostrar o resultado de um teste recente que envolve a tela da arena de batalha.**
3. **Enquadramento atemporal**, de serviço: é guia de "como se joga", não reportagem datada. Precedente na
   casa: a Entrevista da #2 foi marcada `- (atemporal)` no mapa dela.

### ⚠️ O coração da seção (verbatim do líder, não reescrever a intenção)

> *"não é seção de bugs. É apenas mostrar que o jogo está vivo."*

Logo o herói da peça é a **prova de vida**, e o número é a **suíte inteira fechando 2632/2632 verde**
(`edf476de`, 01/08). **Conferido na fonte:** `Projects/gusworld/TODO.md`, item `COMBATE-FILA-CURSOR-FIX`,
registro de 2026-08-01, literal: *"Suíte inteira 2632/2632 verde."*

**O que NÃO entra, e é a linha mais importante deste bloco:** a história dos dois testes que passavam por causa
do bug. Ela existe, está documentada e é boa, mas **é matéria da Galeria de Bugs de outra edição**. Aqui o
teste é **evidência de que a coisa roda**, não anedota de defeito. Um redator que abrir a fonte vai tropeçar
nessa história; o brief tem que proibi-la explicitamente.

### ⚠️ Risco de spoiler ALTO, específico desta seção (D11)

Ao abrir a fonte do resultado de teste, encontrei **nomes de mestre do baralho e de mecânica não anunciada
misturados aos nomes dos testes e ao texto do board** (um análogo histórico do roster aparece nominalmente num
nome de caso de teste, e há mecânicas nomeadas em volta). O roster dos 21 mestres é o **território de spoiler
mais denso do projeto** (`LEVANTAMENTO-HISTORICO`, item 1 da lista de spoiler).

~~**Regra que proponho para a peça:** a seção mostra o agregado, nunca a saída bruta do runner.~~
**SUPERADA pela decisão do líder de 2026-08-01 (D11):** ele escolheu publicar **a saída real, censurada como
documento desclassificado**, com tarjas pretas e carimbo `CENSURADO!!!` assinado `sterling corp.` A trava não
some, muda de forma: o termo sensível **não é escondido, é ausente** — nunca chega a ser escrito no HTML, no
rascunho, no `alt` nem no commit. Especificação completa, os quatro vetores de vazamento e os critérios de
aceitação no bloco **D11** no topo deste documento.

### Material extra encontrado, que o líder pode querer (D12)

O mesmo registro de 01/08 traz uma **observação de playtest do próprio líder**, na tela da arena: matou um
inimigo e *"some ele da tela, some a moldura dele e a caixa de seleção. Sensação que correu tudo certo"*, e
seguiu jogando. É prova de vida **da tela da arena** especificamente, dita pelo criador, e casa com o pedido
melhor que qualquer paráfrase minha. Fica como opção no GATE-LENTE, porque publicar a fala dele é decisão
dele: na voz do site, quem fala assim é o `root@glyfesse>`, e ele aparece pouco e seco de propósito.

---

## A seção 18: "O Gus lê o bus" FICA (reversão da remoção)

Eu havia recomendado cortá-la por anacronismo, e o editor-geral resolveu melhor: **virou o problema em piada**,
usando o duplo sentido de "bus" (o cano de mensagens × o ônibus).

**Copy proposta, verbatim do líder, a ser levada assim ao GATE-COPY:**

> `[gus pensa]:` **bus está estranhamente vazio... ou repleto de fantasmas rumo ao cemitério?**

**Por que funciona:** em junho o cano de mensagens ainda não existe, então o bus está **honestamente vazio** (o
fato correto para a data, sem inventar nada); e o **ônibus** cheio de fantasmas está indo justamente para o
**Cemitério das Ideias Mortas**, que neste número está cheio. A seção vira um **vazio com graça que aponta
para outra seção do mesmo número**, sem spoiler e sem furar a ordem dos fatos. É a mesma família da solução do
Helion Tusk no `ROTEIRO-ENTREVISTAS`: a seção não fica vazia por falta de material, fica vazia de propósito.

**Estado:** não tratar como fechada. Todo vazio re-gate sempre (decisão do editor-geral de 2026-07-19), então
ela passa por **GATE-COPY** normalmente. O que está travado é a **frase**, que é do líder e vai verbatim.

**Notas de produção:** a versão EN precisa preservar o trocadilho (em inglês "bus" carrega os dois sentidos
igual, então a piada atravessa sem perda); o layout é o CRT colorido com o bus renderizado vazio, que já é o
molde do vazio desta seção (`anatomia-da-edicao`); e o AI-disclosure **continua recaindo no Expediente**, já
que a seção existe mas não traz mensagem real do bus.

---

## O Cemitério da #3: as três lápides propostas

Todas datadas, todas conferidas na fonte primária, todas dentro da janela.

| Lápide | Nasceu | Morreu | O epitáfio (o ângulo, não a copy) |
|---|---|---|---|
| **Godot 4** | 19/mai (ADR-001/ADR-002) | **†21/jun** (`engine-design.md`) | Morreu por decisão, não por defeito. E ⚠️ **o corpo continua na sala**: o Godot fica vivo como referência de leitura até o decommission do M8, em 22/jul. A lápide tem que dizer isso, senão contradiz a edição de julho. É a lápide mais honesta do cemitério: enterrado em junho, removido em julho |
| **C# .NET 8 AOT** | 19/mai (ADR-002) | **†21/jun** | A ironia direta: o Editorial da #2, datado 4/jun, anuncia em voz alta que "agora o mundo é escrito em C#". Dezessete dias depois ele não é mais. O leitor que leu a #2 na semana passada pega isso sozinho |
| **Qt6** | 21/jun (`engine-design.md`) | **†22/jun** (ADR-008) | **A melhor lápide do acervo inteiro: viveu cerca de um dia.** Escolhido numa manhã, entregue como M1 funcionando (foi o Qt6 que fez o quadrado azul andar pela primeira vez), e substituído antes do fim do fim de semana. Morreu **fazendo a coisa dar certo**, o que é raro num cemitério |

**Ângulo do conjunto:** o cemitério da #3 não é sobre fracasso, é sobre **velocidade**. Três fundações mortas
em dois dias, e nenhuma delas morreu por não funcionar. O Qt6 morreu tendo funcionado.

**Cortes:** o porquê técnico do Qt6 é da Programação (ADR-008); o arco é da Reportagem; a tentativa 3D é da #4.

---

## A Entrevista da #3: o Cauã "Volt" entrevista o Gus

Vem pronta do `ROTEIRO-ENTREVISTAS.md` (fila da party, posição 1, fixada pelo líder em 2026-07-25). O que a
produção tem que honrar já está escrito lá: prefixo `volt@glyfesse>` pergunta e `//` pensa, o Gus responde em
`gus@glyfesse>`; o motor é velocidade × cálculo (Pythia × C-Arcane); perguntas curtas e impacientes, respostas
compridas demais, e a comédia sai daí sozinha.

### ⚠️ A inversão de regra que precisa de confirmação no gate (D1)

Existe uma regra de **2026-07-19** dizendo que **o Gus nunca é entrevistado** (ele é sempre quem pergunta). A
ordem do editor-geral de **2026-07-25** é posterior e explícita: *"marque como as entrevistas das próximas
edições os integrantes da party, incluindo o próprio Gus, ele será o da próxima edição."* Por ser posterior e
específica, **a ordem de 25/07 prevalece e a produção seguirá por ela** salvo palavra em contrário. Registro
aqui em uma linha, como pedido, para que a inversão seja confirmada e não descoberta depois.

---

## Lentes propostas (S1) · ✅ APROVADAS — GATE-LENTE cumprido em 2026-08-01

> **Status: ✅ AS SEIS APROVADAS** pelo editor-geral em **2026-08-01, ~09:32**, **como propostas**, sem pedido
> de outro ângulo em nenhuma delas. O S1 está fechado; o próximo estágio é o **S2 (rascunhos)**, com escritores
> dedicados, e o **GATE-CONTEUDO**.
>
> **Duas decisões vieram com a aprovação:**
> 1. **Cemitério aprovado NA OPÇÃO COM A TRAVA.** A lápide do Godot **tem** que registrar que o corpo só sai
>    em julho. ⚠️ **Não é sugestão: é condição de aprovação da seção.**
> 2. **D3 FECHADO.** O gancho do Cauã ter andado primeiro **entra nas duas seções, em registros diferentes**,
>    como recomendado: na **Reportagem** como **fato datado, com a data, dito uma vez**; na **Entrevista**
>    como **alfinetada, sem data e sem explicação**. **Nunca duas vezes no mesmo tom.**
>
> Lente é **recorte**, não texto: nada aqui é rascunho de seção.
> Molde obrigatório: *"Nesta seção, sobre [assunto], pela lente [X], cortando [Y]."*
>
> ★★ **Todas as seis nascem já na VOZ NOVA** (decidida 2026-08-01):
> `[personagem]@glyfesse:[seção]$ [fala]` + `//` de pensamento, com o caminho em ASCII sem acento.
> A tabela abaixo fixa o prompt de cada seção, para que dois redatores não escrevam dois caminhos diferentes
> para o mesmo lugar. Onde a voz muda o **recorte** (e não só a forma), está marcado na lente.

| Seção | Prompt na voz nova |
|---|---|
| Editorial | `gus@glyfesse:/editorial$` |
| Reportagem de capa | `gus@glyfesse:/reportagem$` |
| Galeria de Bugs | `gus@glyfesse:/bugs$` |
| Cemitério | `gus@glyfesse:/cemiterio$` |
| Detonado da Simulação | `gus@glyfesse:/detonado$` · a linha final é do **root** |
| A Entrevista | `volt@glyfesse:/entrevista$` pergunta · `gus@glyfesse:/entrevista$` responde |
| Seção de Programação | `root@glyfesse:/programacao$` · inclusive na linha do CRT (ver lente 3) |
| Seção 18 (Gus lê o bus) | a copy do líder é **pensamento** (`[gus pensa]:`), então **não leva prompt**; vai verbatim |
| **Fala fora de seção** (capa, chamada, brincadeira) | **`gus@glyfesse:~$`** — o `~` do refinamento de ~09:32 |

### 1. A Entrevista (o Cauã "Volt" entrevista o Gus) · a mais cara, caminho crítico · ✅ APROVADA

> **Nesta seção, sobre o Gus respondendo perguntas pela primeira vez em vez de fazê-las, pela lente do amigo
> apressado que não tem paciência para resposta comprida, cortando tudo o que o Gus ainda não pode contar
> sobre a própria história.**

- **Por que esta lente:** o motor já está fixado no `ROTEIRO-ENTREVISTAS` (velocidade × cálculo, Pythia ×
  C-Arcane). O que faz a peça valer a pena não é o assunto, é a **inversão**: em duas edições o Gus perguntou,
  e agora ele é quem tem de responder. A comédia sai do descompasso (pergunta curta, resposta longa demais) e,
  por baixo dela, o `//` do Gus deixa escapar o que ele não diz em voz alta. É a única seção da revista onde
  se vê o narrador por dentro.
- **A lente recusada:** "o Cauã se apresenta ao leitor". Ele é o **entrevistador**, não o assunto; a edição
  dele vem depois, e gastá-la aqui queima o convidado seguinte.
- **Cortes:** o arco do jogo, qualquer mecânica nomeada, e o Cauã como tema. A ferida do Gus aparece **de
  raspão, no pensamento**, nunca explicada.
- **Um ganho de graça da voz nova:** como o caminho do prompt é a seção, os dois falam de dentro do **mesmo
  lugar** (`volt@glyfesse:entrevista$` e `gus@glyfesse:entrevista$`), e só o nome antes do `@` muda. A página
  passa a mostrar sozinha que são duas pessoas na mesma sala, sem precisar de uma linha dizendo isso.
- ⚠️ **Recomendação sobre o gancho do Cauã ter andado primeiro** (`943788f`, 22/jun 21:57): **entra nas duas
  seções, em registros diferentes, e nunca duas vezes no mesmo tom.** Na **Reportagem** entra como **fato
  datado**, com a data e o commit, dito uma vez. Na **Entrevista** entra como **alfinetada**, sem data e sem
  explicação: o Cauã pode cobrar que aprendeu a andar primeiro, enquanto o Gus ainda era um retângulo. O
  precedente existe e é da casa: na #1 o Gus perguntou ao criador *"por que você me fez?"*, então os
  personagens já sabem que estão sendo construídos. **Recomendo; a decisão é do líder.**

### 2. Reportagem de capa · ✅ APROVADA

> **Nesta seção, sobre os três dias em que o jogo trocou de alicerce duas vezes e ganhou a primeira coisa que
> se mexe, pela lente do fim de semana contado hora a hora, cortando o porquê técnico e os enterros.**

- **Por que esta lente:** é a história mais bem-comportada do acervo, com começo, meio e fim dentro de um fim
  de semana: sexta se decide derrubar tudo, sábado um quadrado azul dá o primeiro passo, e no mesmo sábado o
  alicerce que o fez andar é jogado fora. Fecha domingo, com o criador testando ao vivo. **A velocidade é o
  assunto**, não a perda.
- **A lente recusada:** "a morte do Godot". Seria repetir o Cemitério com mais palavras, e deixaria a
  reportagem sem o que ela tem de melhor, que é o quadrado andando no meio do estrago.
- **Cortes:** o raciocínio técnico (é da Programação), os epitáfios (são do Cemitério), e tudo de 24/jun em
  diante (é a #4). O beat final é o retângulo virando o Cauã; a semente do terceiro repositório, se o líder
  aprovar (D7), cabe em uma linha no fecho.

### 3. Seção de Programação · ✅ APROVADA

> **Nesta seção, sobre a decisão de trocar a base da parte visual um dia depois de escolhê-la, pela lente da
> pergunta que o leigo também faz (como é que se joga fora uma fundação sem perder o trabalho inteiro),
> cortando a emoção e o arco.**

- **Por que esta lente:** o ADR-008 já está escrito, é técnico puro e não tem spoiler nenhum. Mas o que o
  transforma em **matéria** não é a lista de motivos, é a pergunta que ele responde sem querer: trocar
  fundação normalmente custa semanas, e aqui custou pouco. **A resposta é a única coisa que a seção precisa
  ensinar:** a parte do jogo que pensa foi construída sem saber quem desenha a janela, então trocar a janela
  não obrigou a refazer o que pensa (as ~590 verificações automáticas continuaram valendo).
- **Estrutura canônica**, herdada da #1 e usada na #2 (`PAUTA-EDICAO-2.md`): intro acessível + **desculpa
  furada do root** → `//Prezado leitor, daqui é parte técnica real` → CRT fósforo verde digitando → parte
  técnica com subtópicos → `//by: root@glyfesse`. ⚠️ **A linha do CRT muda com a voz nova:** era
  `root@glyfesse>~$nano` e passa a **`root@glyfesse:programacao$ nano`**. Recomendo atualizar, porque a
  incoerência ficaria justamente na seção que fala de rigor técnico, e porque o formato novo é mais fiel a um
  terminal de verdade, que foi o motivo da mudança. **Decisão do líder no GATE-LENTE desta seção.** Subtópicos
  sugeridos, a
  afinar no rascunho: (a) a peça semi-privada do Qt no meio do caminho, que era risco; (b) os eixos em que o
  SDL ganhou (controle de videogame, programa ~10x menor, caminho para console); (c) por que custou pouco (a
  separação em camadas); (d) o custo aceito (porta sem volta de novo, a segunda em um mês).
- **Cortes:** a emoção é do Cemitério; a sequência dos dias é da Reportagem; e **o nome "glintfx" não aparece**
  (não existia ainda).

### 4. Editorial (a Carta do Gus) · ✅ APROVADA

> **Nesta seção, sobre a promessa que o Gus deixou no fim da edição passada, pela lente da cobrança que ele
> faz a si mesmo, cortando tudo o que as outras seções vão contar.**

- **Por que esta lente:** a #2 terminou com o Gus dizendo que *"nem tudo que a gente ergue fica de pé... mas
  isso é problema de outra data"*. **A data chegou**, e ele é quem tem de admitir. A ponte já está escrita
  pelo número anterior; forçar outro assunto seria desperdiçar o gancho mais bem armado que a revista tem.
- **O tom, e é o inverso da #2:** lá ele virava do luto para o seco. Aqui vira do seco para o quase-alegre,
  porque pela primeira vez existe uma coisa que **funciona**, por mais ridícula que ela seja.
- **Cortes:** não conta o arco (Reportagem), não enterra ninguém (Cemitério), não explica nada de técnico
  (Programação). É o parágrafo-porta, curto, dois blocos no máximo.

### 5. Galeria de Bugs · estreia · ✅ APROVADA

> **Nesta seção, sobre os dois primeiros defeitos com história do projeto (o boneco que grudava na parede e a
> diagonal que travava numa direção só), pela lente da piada primeiro e do conserto depois, cortando os bugs
> grandes que ainda não aconteceram.**

- **Por que esta lente:** é a regra da própria seção (a piada nerd por cima, o fato técnico por baixo), e a
  estreia ganha graça extra porque **o Gus está cumprindo uma promessa a contragosto**: foi ele quem escreveu
  "Volte na #3" na edição passada, e o que ele tem para entregar são dois problemas de geometria de boneco.
  A modéstia do material é a piada, não um defeito dela.
- **O casamento com a capa:** o mesmo quadrado que anda na capa é o que grudava na parede. A seção é o avesso
  da reportagem, e sai de graça.
- **Cortes:** a OOM e o bug do flash **não entram** (são de julho e cada um é matéria própria), nem nenhum
  defeito do jogo de hoje. ⚠️ A data exata dos dois é a decisão **D6**: ancorar em "M1, 22-23/jun" em vez de
  inventar um dia.

### 6. Cemitério das Ideias Mortas · 3 lápides · ✅ APROVADA **na opção COM A TRAVA** (ver abaixo)

> **Nesta seção, sobre três alicerces enterrados em dois dias, pela lente do epitáfio debochado com luto por
> baixo, cortando a única morte que o leitor esperaria encontrar aqui.**

- **Por que esta lente:** o tom já está firmado na #2 (deboche por cima, luto honesto por baixo) e o layout de
  lápide em CSS existe. O que muda é a **tese**: este cemitério não é sobre fracasso, é sobre **velocidade**.
  Nenhuma das três morreu por ter dado errado, e o remate é a lápide do **Qt6**, que viveu cerca de um dia e
  morreu **tendo funcionado** (foi ele que fez o quadrado andar).
- **A morte que o leitor espera e não vai achar:** a da tentativa 3D. Foi decidido no gate que ela vai para a
  #4, então o Cemitério da #3 **cala sobre o 3D**, sem sequer prometer.
- ⚠️ **Trava de coerência com a edição de julho, e ela é CONDIÇÃO DE APROVAÇÃO** (o editor-geral escolheu
  explicitamente a opção com a trava, 2026-08-01): a lápide do Godot **tem** que registrar que o corpo só sai
  em julho (ele fica vivo como referência de leitura até o decommission do M8, 22/jul). Sem essa linha, a
  edição de julho contradiz esta, e a seção **não** cumpre o que foi aprovado.
- **Cortes:** o porquê técnico (Programação), a sequência dos dias (Reportagem), e o 3D (#4).

### Detonado da Simulação · lente já fechada, não entra nesta rodada

A lente veio do editor-geral, verbatim: **"não é seção de bugs, é apenas mostrar que o jogo está vivo."**
Não há recorte a propor nem GATE-LENTE a disparar sobre o ângulo. Seguem abertas apenas as decisões de
**execução** dela: D11 (o que a figura pode mostrar sem vazar spoiler), D12 (se a observação de playtest do
líder entra) e D13 (a figura exibir a tela da arena).

---

## Riscos e decisões (o quadro levado ao GATE-PAUTA, com o desfecho)

> **Estado depois do gate de 2026-08-01:** D1, D2, D4 e D5 estão **fechadas** (ver o bloco de decisões no topo).
> As demais vão para o **GATE-LENTE**, exceto a D10, que é da #4. As recomendações abaixo ficam registradas
> como estavam quando a pauta foi ao gate.

| # | Decisão | Recomendação do bigtech / desfecho |
|---|---|---|
| ~~**D1**~~ | ~~A inversão: confirmar que o Gus pode ser entrevistado~~ | ✅ **CONFIRMADA pelo editor-geral em 2026-08-01.** A ordem de 25/07 supera a regra de 19/07, e a regra velha está sendo apagada da memória do projeto |
| ~~**D2**~~ | ~~A lápide da tentativa 3D: #3 ou #4?~~ | ✅ **DECIDIDA em 2026-08-01: vai para a #4.** Recomendação aceita (não há fonte que a mate em junho; o gate de 24/jun é o marco da #4). O Cemitério da #3 fecha com as três lápides propostas |
| ~~**D3**~~ | ~~"O retângulo vira o Cauã" (`943788f`) entra na #3, e em que seção?~~ | ✅ **DECIDIDA no GATE-LENTE de 2026-08-01: entra nas DUAS**, em registros diferentes, como recomendado. Na **Reportagem** como **fato datado, com a data, dito uma vez**; na **Entrevista** como **alfinetada, sem data e sem explicação**. **Nunca duas vezes no mesmo tom.** ⚠️ Segue valendo: entra **como texto**, não como arte (os assets estão fora do git, ver D8) |
| ~~**D4**~~ | ~~Conflito de fonte: o retângulo virou o Gus ou o Cauã?~~ | **RESOLVIDA no `git log` em 2026-08-01, não precisa do gate.** Commit `943788f`, 22/jun 21:57: *"jogador vira sprite animado (Caua Volt) no lugar do retangulo"*. **Era o Cauã.** O CHANGELOG do jogo estava certo; o `LEVANTAMENTO-HISTORICO` está errado e precisa de errata. Detalhe e as três consequências na §Quinta correção. O que **continua** indo ao líder é o **uso editorial** do gancho, no GATE-LENTE |
| ~~**D5**~~ | ~~O `uptime` do masthead nomeia "glintfx" numa edição de 22/jun~~ | **RESOLVIDA em 2026-08-01, sem precisar do gate.** A correção de régua do líder (cronologia ascendente, não cerca de data) elimina a colisão: o masthead mostra estado, não narra fato. Fica como está |
| **D6** → GATE-LENTE | **Galeria de Bugs:** os dois bugs propostos (pé colado na parede / foot-anchor, e diagonal travando no último eixo) constam do bloco M1 do `CHANGELOG` **sem data isolada**. A janela do M1 é 22-23/jun | **Usar assim mesmo**, ancorando em "M1, 22-23/jun" em vez de fingir um dia exato. Se o líder lembrar a data, melhor. **Não** substituir pela OOM nem pelo flash: os dois são de julho |
| **D7** → GATE-LENTE | **Semear o nascimento do terceiro repositório?** Em 21/jun nasceu o `loucura_c_asm` (C+ASM sem libc, ADR-0001), dentro da janela. É scoop real e datado, e é a semente do que vira glintfx uma semana depois | **Uma linha só, no Editorial ou no fim da Reportagem, sem o nome "glintfx"** (que não existia) e sem prometer nada. É o único gancho legítimo para o leitor que vai encontrar o link "Repo GlintFX" no índice e se perguntar o que é aquilo |
| **D8** → GATE-LENTE | **Pôster central:** o quadrado azul em tamanho real (CSS puro) ou o antes/depois quadrado -> sprite? | **O quadrado em tamanho real, e a alternativa agora está BLOQUEADA.** O commit `943788f` registra que os assets do Cauã estão **fora do git** (`resources/sprites/caua_volt/`), então o antes/depois não tem arte disponível, exatamente como o Pôster da #2 ficou bloqueado por falta de asset limpo. O quadrado em CSS deixou de ser a opção preferida e passou a ser a **única viável** sem trabalho novo de asset |
| **D9** → GATE-LENTE / GATE-SPOILER | **GATE-SPOILER da Entrevista** (não trava a pauta, mas vai travar o S5): o `//` do Gus é "onde mora a ferida" (isolamento). Quanto da ferida pode aparecer sem tocar o arco? E dizer que o Cauã é "o companion recrutado na missão solo de abertura" revela estrutura de missão | **Levar como item próprio no GATE-SPOILER**, com o parecer do `AUD-SPOILER`. O líder é o decisor único |
| **D10** → GATE-PAUTA da #4 | **O convidado da #4** (o Cauã segue como 2º entrevistado depois de estrear como entrevistador, ou vai para o fim?) e **como intercalar** a Trilha B (Brunus e os mestres) | **Não decidir agora.** O `ROTEIRO-ENTREVISTAS` já marca as duas como abertas e diz que não travam a #3. Sobe no GATE-PAUTA da #4 |
| ~~**D11**~~ | ~~Spoiler do Detonado: como mostrar o resultado sem vazar mestre e mecânica~~ | ✅ **DECIDIDA 2026-08-01: a saída REAL, censurada como documento desclassificado** (tarjas + carimbo `CENSURADO!!!` + `sterling corp.`). Minha recomendação do agregado **não** foi a escolhida. A trava vira "o termo nunca é escrito", não "o termo é coberto". Spec completa no bloco D11 no topo |
| ~~**D12**~~ ✅ **ENTRA**, em uma linha, voz de root, seca, no fim da seção (decidido 2026-08-01) | **A observação de playtest do líder** (01/08, a morte do inimigo na arena: sprite, moldura e caixa de seleção somem juntos, *"sensação que correu tudo certo"*) entra no Detonado? | **Ótimo material e é a prova de vida mais direta da tela da arena**, mas é fala dele, e na voz do site quem fala assim é o `root@glyfesse>`, que aparece pouco e seco de propósito. **Decisão dele.** Recomendo entrar, em uma linha, no fim da seção |
| ~~**D13**~~ ✅ **MOSTRA a arena**, consequência assumida com todas as letras pelo líder (decidido 2026-08-01) | **A figura do Detonado mostra a tela da arena**, que é visual de julho, numa edição cuja capa é um quadrado azul de junho. Sob a régua nova isso é legítimo (mostra estado, não narra fato), mas é a **primeira vez** que a revista exibe imagem à frente da linha da narrativa | **Seguir**, é o pedido explícito do líder e o enquadramento atemporal cobre. Registro aqui só para que a consequência seja **escolhida** e não descoberta na prova final: o leitor vai ver a arena pronta antes da edição que conta como ela foi feita. Se incomodar, a alternativa é a figura ser só o agregado do teste, sem a tela |

### Riscos de produção

1. **Custo do líder.** Seis peças com escrita nova + três lápides + os vazios re-gatados (decisão de 19/07:
   **todo vazio re-gate sempre**) dá algo em torno de 33 a 38 aprovações item-a-item, contra 30 a 35 na
   proposta anterior. É o mesmo patamar da #2, que fechou. Se o número precisar encolher, **nenhuma das seis
   é candidata natural a corte**: a Galeria é dívida em texto publicado ("Volte na #3") e o Detonado é ordem
   direta do editor-geral. O que sobra para cortar, se apertar, é a **profundidade** da Reportagem e do
   Detonado, não a existência delas.
2. **A Entrevista é o caminho crítico.** Dois agentes de persona improvisando, mais GATE-SPOILER próprio.
   Começar por ela.
3. **Coerência entre lápide e edição futura.** A lápide do Godot **tem** que dizer que o corpo só sai em
   julho, senão a edição de julho (M8, decommission) contradiz a #3. Foi exatamente o tipo de furo que a
   prova final da #2 pegou tarde (o dek que matava o 3D enquanto a seção dizia que ele estava vivo).
4. **Higiene de asset, agora em dois pontos.** (a) O frame da capa já está publicado em
   `public_html/assets/frames/edicao-3.png`, mas a origem é o arquivo pessoal (`resources/frames/...`):
   confirmar na prova final que é só o alvo, sem tela ao redor. (b) **A figura do Detonado é nova e é o risco
   maior**, porque qualquer captura da tela da arena ou do console arrasta janela, terminal e caminho de
   usuário junto. ⚠️ **Atualizado pela decisão D11 de 2026-08-01:** a regra antiga aqui era "nada de captura
   de console, o agregado é escrito em CSS", e ela **caiu** — o líder escolheu publicar a saída real
   censurada. A regra que vale agora: **o texto da saída é transcrito, não capturado**, e transcrito **já sem
   os termos censurados** (que nunca chegam a ser escritos, ver D11); se houver captura da arena, ela é da
   **janela do jogo**, recortada e verificada limpa antes de virar tracked
   (`feedback_frames_vazam_tela_pessoal`).
5. **O Detonado é a peça com mais formas de dar errado, e a D11 aumentou isso, não diminuiu.** Ela junta o que
   a casa já viu falhar: fonte contaminada de spoiler, asset derivado de captura, uma história boa e proibida
   a um clique de distância (a dos dois testes que passavam pelo bug) e **agora um efeito visual cujo valor
   depende de parecer que o texto está lá quando ele não pode estar**. O brief dela precisa ser o mais
   explícito dos seis, com as proibições escritas **antes** do escopo, e o revisor da peça deve ser alguém que
   **não** a construiu.

---

## Próximo passo depois do gate

**Mapa aprovado em 2026-08-01.** O E1 está fechado e a pauta muda de mãos: o **`team-lead` assume o E2
(assignment) e os GATE-LENTE**.

Entra o **E2**: brief por seção com material, e o **S1/GATE-LENTE** dispara uma pergunta por seção
(Entrevista, Reportagem, Programação, Editorial, Galeria de Bugs e **Detonado**), mais o Cemitério.
Recomendação de sequência que deixo registrada: abrir pela **Entrevista**, que é a mais longa, e tratar o
**Detonado** logo em seguida, porque é a outra peça com GATE-SPOILER próprio e a que carrega três decisões de
uma vez (D11 spoiler, D12 a fala do líder, D13 a figura).

**Nove decisões viajam com a pauta para o E2:** D3, D6, D7, D8, D9, D11, D12 e D13 para o GATE-LENTE, e a D10
para o GATE-PAUTA da #4.
