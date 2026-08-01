# Briefings da Edição #3 · "O Quadrado Azul"

> **Estágio E2 (assignment) do `PIPELINE-EDICAO`.** Um brief por seção com material.
> Escrito em **2026-08-01** para disparar de uma vez quando a delegação a agentes voltar
> (ela caiu ~09h50 e o motivo está em `TODO.md` → INBOX → `EDICAO-3-PRODUCAO`).
>
> **Insumos já fechados:** `PAUTA-EDICAO-3.md` (GATE-PAUTA ✅ e as 6 lentes ✅, aprovadas
> pelo editor-geral em 2026-08-01).
>
> ⚠️ **Antes de disparar qualquer brief:** testar a delegação com um agente instruído a
> responder apenas a palavra `FUNCIONA`. Se ele não devolver nada, **não gaste briefing**.

---

## Regras que valem para TODOS os briefs (copiar no topo de cada ordem de serviço)

**Voz (formato novo, estreia nesta edição):**

```
nome@glyfesse:~/seção$ fala
// pensamento
```

- O `~/` importa: `~` sozinho quando a fala não está em seção nenhuma; `~/seção` quando está.
- O caminho vai **sem acento** (`~/programacao`, `~/cemiterio`) — prompt é tela, e tela não leva acento.
- O **root se distingue por COR** (vermelho é sugestão do líder, **não cravado**: medir contraste contra o
  fundo real do elemento antes de fixar; reprovando, sobem 2 opções ao líder).
- ⚠️ **A #1 e a #2 ficam no formato antigo** (`nome@glyfesse>`) e **não** são reajustadas. A divergência
  entre edições **não é defeito** na prova final.

**Voz do Gus (só nas falas dele, não na prosa de matéria):**
- **Sem ponto final**, mas **com `?` e `!`**.
- **Reticências** nos beats de pausa e emoção — principalmente nos `//`. Costumam ser sub-usadas.
- **Erro de digitação raro** (~1 a cada 40-80 palavras): letra vizinha do teclado, letras invertidas
  (`qeu`), espaço no lugar errado (`u mexemplo`), acento faltando, `s`↔`z`.
- ⚠️ **NUNCA erro de gramática.** A mão erra, o raciocínio não.

**Cronologia (a régua do líder, 2026-08-01):** *"a âncora não é a DATA ou intervalo específico. É a
cronologia ascendente dos fatos."* O teste **não** é "isto é posterior a 22/jun?", é **"isto quebra a ordem
ascendente da narrativa?"**. Regra de bolso:

> **Pode-se MOSTRAR o jogo como ele está hoje; não se pode CONTAR como ele chegou lá, fora de ordem.**

**Fora do conteúdo desta edição** (furam a ordem): o nome e a lib **glintfx** (nasce 28/jun; o link fixo do
índice fica, é chrome atemporal); a **arena/gate 2D-vs-3D** como *relato* (24/jun, é o marco da #4 — mas a
**imagem** da arena pode aparecer no Detonado); a **lápide da tentativa 3D** (foi para a #4); a **OOM** e o
**bug do flash** (julho, cada um é matéria própria); cockpit, áudio, NPC, save-load, cartas, os 21 mestres;
a própria revista falando de si (15/jul).

**Higiene, sem exceção:** nenhum nome de batismo de menor — o menino é "Gus" (personagem) e, fora de ficção,
só "Gus Dragon"; nenhum nome real de amigo; zero segredo/token; zero profanidade; nenhuma mecânica citada
por nome (carta, mestre, sistema). Nada disso em texto, `alt`, nome de arquivo ou mensagem de commit — que
é **imutável** depois de pushada.

**Entrega:** **pt-br e en**, equivalentes. O agente **não commita e não pusha**; devolve o texto.

---

## Os commits-fonte da janela (todos conferidos por mim na origem, 2026-08-01)

| Data/hora | Commit | O que é |
|---|---|---|
| 21/jun | `5040ed5`, `5461ce2` | Pivô 3: Godot/C# → C++20 + engine própria (Qt6). A GusEngine nasce |
| **22/jun 16:32** | **`ce17f78`** | ★ **O QUADRADO AZUL.** *"camada visual (janela Qt6 + loop fixo + render2d) com boneco que anda e desliza"*. Anda com WASD, corre com Shift, desliza nas paredes. **"Placeholders sem sprite (decisão do líder)"**. `ctest 658 → 674` |
| 22/jun | `31a856d`…`e3b2331` | M5 combate, M2 input, M4 colisão portados C#→C++ em TDD |
| 22/jun | `c12cb30` | Correção de quina estilo Stardew, **a partir de feedback do líder depois de rodar o M1 na tela**. `ctest 684/684` |
| **22/jun 21:57** | **`943788f`** | O retângulo vira o **Cauã "Volt"** — primeiro sprite real. ⚠️ **não é o Gus** |
| **22/jun 23:34** | **`300329a`** (ADR-008) | Pivô 4: Qt6 → SDL3. O Qt6 morre com ~**um dia** de vida. `ctest 685 → 752` |
| 23/jun 21:11 | `39fdc75`, `2e41597` | Loop jogável em SDL fechado e **validado ao vivo pelo líder** |

---

# BRIEF 1 · A Entrevista (o Cauã "Volt" entrevista o Gus)

**Tamanho:** L · **Caminho crítico** · **Já tem 3 de ~10 turnos escritos** em `docs/content/edicao-3-entrevista.md`.

**Lente aprovada:** *Nesta seção, sobre o Gus respondendo perguntas pela primeira vez em vez de fazê-las,
pela lente do amigo apressado que não tem paciência para resposta comprida, cortando tudo o que o Gus ainda
não pode contar sobre a própria história.*

**Método aprovado pelo líder (em LOTES — turno a turno queimou 10 agentes):**
1. O entrevistador escreve **um lote de perguntas**.
2. O Gus **responde o lote**.
3. O entrevistador **lê tudo** e escreve as **perguntas intermediárias**, onde a conversa pedir.
4. O Gus responde essas.
5. O orquestrador **integra conferindo coerência** (pergunta sem resposta, resposta que responde outra
   coisa, repetição — que é o risco real de escrever em lote).

⚠️ **Cada persona é um agente próprio e NUNCA vê o briefing do outro.** É isso que faz o improviso existir.

**Personagens:**
- **Cauã "Volt"**, 13 anos, companion nº 1. Motor: **velocidade**. Perguntas **curtas**. Por baixo da pressa
  há confiança — ele aperta porque acha que o amigo dá conta. **Não é o assunto**: gastá-lo aqui queima o
  convidado seguinte.
- **Gus**, 11 anos. Motor: **cálculo**. Responde comprido demais e sabe disso. **A ferida é o isolamento** e
  ela **nunca** aparece na fala, só no `//` — e quando ele quase sente algo, **desvia para o técnico**.

⚠️ **A alfinetada do Cauã ainda NÃO foi usada — bala única.** Ele aprendeu a andar antes do Gus (`943788f`,
22/jun 21:57: o primeiro corpo animado foi o dele, enquanto o Gus ainda era um quadrado). Na Entrevista vai
**sem data e sem explicação**, como quem alfineta um amigo — *se soar como aula, errou*. O mesmo fato entra
na **Reportagem** como fato datado, dito **uma vez**. **Nunca duas vezes no mesmo tom** (decisão D3).

**Gancho de graça (já registrado):** como o caminho do prompt é a seção, os dois falam de dentro do mesmo
lugar (`~/entrevista`) e só muda o nome antes do `@`. A página mostra sozinha que são duas pessoas na mesma
sala, sem uma linha de narração.

**Pendente depois do texto:** `GATE-SPOILER` próprio — **quanto da ferida do Gus pode ficar impresso**. O
`//` do turno 3 é o material mais fundo da peça e é exatamente o que o líder tem de gatear.

---

# BRIEF 2 · Reportagem de capa

**Tamanho:** M/L · **Escritor:** `narrative-writer`

**Lente aprovada:** *Nesta seção, sobre os três dias em que o jogo trocou de alicerce duas vezes e ganhou a
primeira coisa que se mexe, pela lente do fim de semana contado hora a hora, cortando o porquê técnico e os
enterros.*

**O arco, com as horas reais:** sexta/sábado se decide derrubar tudo (`5040ed5`) → **sábado 16:32 o quadrado
azul dá o primeiro passo** (`ce17f78`) → 21:57 o retângulo vira o **Cauã** (`943788f`) → **23:34, no mesmo
sábado, o alicerce que o fez andar é jogado fora** (`300329a`, ADR-008) → domingo 21:11 o loop jogável fecha
e é **validado ao vivo pelo líder** (`39fdc75`).

**A tese é VELOCIDADE, não perda.** O quadrado andando no meio do estrago é o que a peça tem de melhor.

**Cortes:** o raciocínio técnico (é do Brief 3), os epitáfios (são do Brief 6), e tudo de 24/jun em diante.
**Recusado no gate:** o ângulo "a morte do Godot" — seria repetir o Cemitério com mais palavras.

**Detalhe verificado que vale uma linha:** o commit do quadrado diz *"Placeholders sem sprite (decisão do
líder)"*. O quadrado azul não é limitação técnica: **é escolha.**

---

# BRIEF 3 · Seção de Programação

**Tamanho:** M · **Escritor:** `technical-writer` · **Eixo expert**

**Lente aprovada:** *Nesta seção, sobre a decisão de trocar a base da parte visual um dia depois de
escolhê-la, pela lente da pergunta que o leigo também faz (como é que se joga fora uma fundação sem perder o
trabalho inteiro), cortando a emoção e o arco.*

**★ A resposta está VERBATIM no commit do ADR-008 (`300329a`), e é a prova da lente:**

> *"a lógica pura (core/domain, **~590 testes**) fica INTACTA"*

Ou seja: a parte do jogo **que pensa** foi construída sem saber quem desenha a janela. Trocar a janela não
obrigou a refazer o que pensa, e as ~590 verificações continuaram valendo. `ctest 685 → 752` no mesmo commit.

**Estrutura fixa das seções técnicas (obrigatória):**
1. **Intro acessível** (~3 parágrafos) que gera curiosidade no leigo sem assustar.
2. **A "desculpa furada" do root** — justificativa esfarrapada para usar a conta root numa revista. Pode não
   existir em algumas edições. ⚠️ **Não use a variante que cita o vilão** — isso é spoiler e já foi gasto no
   carimbo do Detonado nesta mesma edição.
3. **`//` de transição:** daqui por diante é documentação técnica real.
4. **Visual:** CRT fósforo verde digitando — ⚠️ **no formato NOVO**: `root@glyfesse:~/programacao$ nano`
   (decisão do líder, 2026-08-01; o molde antigo dizia `root@glyfesse>~$nano`).
5. **Parte técnica pesada**, como artigo científico de TI com subtópicos, assinada `//by: root@glyfesse`.

**Subtópicos sugeridos:** a peça semi-privada do Qt que era risco; onde o SDL ganhou (controle, programa
menor, caminho para console); por que custou pouco; e o custo aceito — **uma segunda porta sem volta no
mesmo mês**.

**Cortes:** a emoção, a sequência dos dias, e o nome "glintfx" (não existia).

---

# BRIEF 4 · Editorial (a Carta do Gus)

**Tamanho:** S — **curto por desenho, no máximo dois blocos** · **Escritor:** `narrative-writer`

**Lente aprovada:** *Nesta seção, sobre a promessa que o Gus deixou no fim da edição passada, pela lente da
cobrança que ele faz a si mesmo, cortando tudo o que as outras seções vão contar.*

A #2 terminou com ele dizendo que *"nem tudo que a gente ergue fica de pé... mas isso é problema de outra
data"*. **A data chegou, e é ele quem tem de admitir.**

**O tom inverte o da #2:** lá ele virava do luto para o seco; **aqui vira do seco para o quase-alegre**,
porque pela primeira vez existe uma coisa que funciona — por mais ridícula que ela seja.

**Corte:** tudo o que as outras seções vão contar. O Editorial **abre**, não resume.

---

# BRIEF 5 · Galeria de Bugs (estreia)

**Tamanho:** S · **Escritor:** `technical-writer` · **Regra da seção: a piada PRIMEIRO, o técnico DEPOIS**

**Lente aprovada:** *Nesta seção, sobre os dois primeiros defeitos com história do projeto (o boneco que
grudava na parede e a diagonal que travava numa direção só), pela lente da piada primeiro e do conserto
depois, cortando os bugs grandes que ainda não aconteceram.*

> ⚠️ **CORRIGIDO EM 2026-08-01, DEPOIS DE IR À FONTE.** A pauta falava em "dois bugs". **Só um é bug.**
> Ver abaixo — a apuração mudou o conteúdo E o ângulo da seção, para melhor.

## ★★ O bug real, e quem o encontrou

Fonte: commit **`c12cb30`** (22/jun) — *"corner-correction estilo Stardew + ponto único de tuning de
movimento"*, abrindo com *"Feedback do líder após rodar o M1 na tela"*.

**O boneco grudava na quina.** O conserto empurra o jogador o mínimo lateral para contornar quando ele bate
numa quina com abertura adjacente (até 0,35 do tile), **sem nunca atravessar parede sólida**. É a mesma
solução que o **Stardew Valley** usa — o defeito é clássico o bastante para ter nome de jogo.

### ★★★ O ÂNGULO DA SEÇÃO (líder, 2026-08-01): ele **AVISOU ANTES**, não pegou depois

> ⚠️⚠️ **DUAS correções do líder, na mesma rodada, e a segunda é a que vale:**
>
> 1. O commit atribui o achado ao líder. **Está impreciso** — foi o **Gus Dragon**, o playtester de 11 anos.
> 2. **E ele não "pegou" nada depois. Ele AVISOU ANTES.** Verbatim do líder: *"todos os bugs de movimentação
>    ele na verdade relatou **antes que acontecessem**, de experiência e estudos que ele tem previamente,
>    sobre fazer jogos"*.
>
> **Confie no líder, não no commit.** O registro do jogo é a fonte da data; a fonte do FATO é ele.

**Isto não é um detalhe: é a matéria inteira, e ela deixou de ser sobre bug.**

O enquadramento "criança testa e acha defeito" está **errado** e não pode ser escrito. O certo:

- **Um menino de 11 anos que estuda como se fazem jogos NOMEOU os defeitos antes de eles existirem.** Não
  foi um palpite: foi uma **lista**. Verbatim do líder sobre o que ele enumerou —
  **clipping, arrastar, olhar na direção errada, trava de diagonal**, entre outros.
- **★ A lista dele bate, item por item, com o que o código do jogo carrega até hoje** (conferido por mim na
  origem em 2026-08-01 — esta tabela é a espinha da matéria):

  | O que ele nomeou | O que apareceu no código | O que o projeto fez |
  |---|---|---|
  | **arrastar / grudar** | o boneco preso na quina | **Consertado** (`c12cb30`, correção de quina estilo Stardew) |
  | **olhar na direção errada** | `LastAxisWins` — na diagonal o boneco encara o cardeal dominante | **Aceito de propósito**: a arte é 4-direcional; as 8 direções dobrariam a arte de todos (`ARTE-DIAGONAL-8DIR`, decisão do líder de 23/jun, **aberta até hoje**) |
  | **trava de diagonal** | diagonal mais rápida que o movimento reto | **Alavanca deixada pronta e desligada** (`normalize_diagonal`, no ponto único de ajuste) |
  | **clipping** | atravessar parede sólida | Coberto no conserto da quina (*"nunca atravessa parede sólida"*) — e **voltou em julho** como o *tunneling*, que virou item próprio (`MATERIA-M7-PLAYTEST`) |

  ★★ **O clipping é o beat mais forte da tabela:** ele o nomeou em **junho**, e o problema só mordeu de
  verdade em **julho**. O aviso chegou **um mês antes** do sintoma.

- ★ **A tabela também explica por que a Galeria tem UM bug e não quatro:** dos quatro que ele nomeou, **um
  virou defeito consertado** (entra na Galeria), **dois viraram decisão consciente** (não são bug, e chamá-los
  assim seria errado com o leitor) e **um voltou depois** (é matéria de julho). A seção fica pequena porque a
  maior parte da lista **não virou defeito** — e isso é o elogio, não a limitação.
- **A ironia honesta, que é o coração da peça:** ele avisou, e **aconteceu assim mesmo**. Ser avisado não é
  o mesmo que evitar. Essa é uma história de engenharia de verdade, e é o que salva a seção de virar
  elogio a criança.
- **Explica o gancho desligado:** o ajuste da diagonal (`normalize_diagonal`) existe, pronto e desligado,
  desde o primeiro dia da tela. Uma alavanca não nasce pronta para um problema que ninguém previu.
- É a **primeira** contribuição documentada dele — **~1 mês antes** das duas de 21/jul (o *tunneling* e a
  pergunta da velocidade negativa, itens `MATERIA-M7-PLAYTEST` e `MATERIA-GUS-VELOCIDADE-NEGATIVA`). A
  série do "playtester de 11 anos" ganha aqui o seu marco zero — e ele não é o de testar, é o de **prever**.
- **A camada que a revista ganha de graça:** quem escreve a Glyfesse é o **Gus personagem**, de 11 anos. O
  texto **não pode apontar** essa simetria. Apontar mata. Deixe o leitor juntar sozinho.

⚠️ **Como NÃO escrever:** "olha que fofo, a criança achou um bug". Ele não achou por sorte nem por brincar:
ele **sabia**, por estudo. Tratar como fofura é diminuir, e é falso. O tom é o de **crédito técnico**, seco,
do jeito que se credita quem avisou e não foi ouvido a tempo.

⚠️ **Higiene, sem exceção:** só **"Gus Dragon"** ou **"o playtester de 11 anos"**. **Nunca** nome de batismo
— nem no texto, nem em `alt`, nem em nome de arquivo, nem em mensagem de commit (que é imutável).

## O que SAIU da seção (e por quê) — apurado na fonte

**A "diagonal" não é bug. São duas coisas distintas, e as duas são DECISÃO:**

1. **A velocidade da diagonal** (`normalize_diagonal`): o ajuste existe, está pronto e **desligado de
   propósito**. O comentário no próprio código diz: *"ganchos já prontos, alguns ligados, outros só
   esperando o líder virar"*. É alavanca deixada ao alcance dele, não esquecimento.
2. **"A diagonal travando no último eixo"** — a pauta descrevia errado. Não é travamento: é o boneco
   **olhar para o cardeal dominante** ao andar na diagonal, porque a arte é **4-direcional**. Registrado no
   `TODO.md` do jogo, item `ARTE-DIAGONAL-8DIR`: *"resolver DEPOIS, **decisão do líder 2026-06-23**"*. Fazer
   as 8 direções **dobraria a arte de todos** (Gus + 6 companions + NPCs). Mesmo caminho de Stardew, Zelda
   ALttP e Pokémon, e **segue aberto como decisão de design** até hoje.

**Nenhuma das duas entra na Galeria.** Chamar de defeito uma escolha registrada seria errado com o leitor e
com o próprio registro. Se o líder quiser aproveitar a diagonal, ela é matéria de **decisão em aberto**,
noutro lugar — nunca de bug.

## O segundo bug, se o líder quiser a seção com dois

Há **outro defeito real na mesma janela**, no commit do quadrado azul (`ce17f78`, 22/jun 16:32), registrado
em uma linha: *"Bug de varying de shader (pareamento por nome no GLSL) corrigido"*. As peças do desenho eram
ligadas **pelo nome**, e os nomes não batiam. É da data certa e tem história. **Decisão do líder** —
não incluir sem a palavra dele.

## O tom

**A modéstia é a piada, não um defeito dela.** O Gus está cumprindo uma promessa a contragosto: foi ele quem
escreveu **"Volte na #3"** na edição passada, e o que ele tem para entregar é um boneco que gruda na quina.
E casa de graça com a capa: **o mesmo quadrado que anda é o que grudava na parede.**

**Data:** ancorar em **"M1, 22-23/jun"**, não num dia exato (decisão D6 — não fingir precisão que a fonte
não dá).

**Cortes:** a OOM e o bug do flash (julho, cada um é matéria própria).

---

# BRIEF 6 · Cemitério das Ideias Mortas (3 lápides)

**Tamanho:** S · **Escritor:** `narrative-writer` · **Layout CSS reaproveitado da #2 (não re-gate)**

**Lente aprovada:** *Nesta seção, sobre três alicerces enterrados em dois dias, pela lente do epitáfio
debochado com luto por baixo, cortando a única morte que o leitor esperaria encontrar aqui.*

| Lápide | Nasceu | Morreu | O ângulo |
|---|---|---|---|
| **Godot 4** | 19/mai | **†21/jun** | Morreu por decisão, não por defeito |
| **C# .NET 8 AOT** | 19/mai | **†21/jun** | A ironia direta: o Editorial da #2, datado de junho, anuncia em voz alta que agora o mundo é escrito em C# |
| **Qt6** | 21/jun | **†22/jun** | **A melhor lápide do acervo: viveu cerca de um dia — e foi ele que fez o quadrado andar.** Morreu tendo funcionado |

**A tese não é fracasso, é VELOCIDADE.** Nenhuma das três morreu por ter dado errado.

⚠️ **CONDIÇÃO DE APROVAÇÃO (não é sugestão):** a lápide do **Godot tem que registrar que o corpo só sai em
julho** — ele fica vivo como referência até ser removido de vez em 22/jul. Sem isso, a edição de julho
contradiz esta. Foi exatamente o tipo de furo que a prova final da #2 pegou tarde.

**O corte é o assunto:** a morte que o leitor **espera e não vai achar** é a da tentativa 3D, que foi para a
#4. O Cemitério **cala sobre ela**, sem sequer prometer.

---

# BRIEF 7 · Detonado da Simulação (NOVO, só nesta edição)

> ⚠️ **A peça com mais formas de dar errado da edição inteira.** Junta fonte contaminada de spoiler, imagem
> derivada de captura, uma história proibida a um clique de distância, e um efeito visual **cujo valor
> depende de parecer que o texto está lá quando ele não pode estar.** Por isso **as proibições vêm antes do
> escopo**, e **quem revisar esta peça não pode ser quem a construiu.**

## As proibições (leia antes do escopo)

1. ⚠️⚠️ **O termo censurado NUNCA é escrito em arquivo rastreado.** Nem no rascunho (`docs/content/` é repo
   **público** e o histórico do git é **para sempre**), nem em `alt`/`aria-label`, nem em nome de arquivo,
   nem em mensagem de commit. A tarja é **decorativa**; a palavra **não chega à página**.
   **Critério de aceitação:** procurar cada termo no HTML/CSS/JS servido e **não achar nada**. Achou,
   reprova. Vale na prova final (E4) e no `GATE-RENDER`.
2. **A largura da tarja não pode entregar o tamanho da palavra.** Barra do comprimento exato vaza a contagem
   de letras, e num conjunto pequeno de nomes conhecidos isso é quase o nome. **Larguras quantizadas:** 3 ou
   4 tamanhos fixos, nunca proporcionais.
3. **O texto de acessibilidade** (`alt`/`aria-label`) diz **"trecho censurado"** e mais nada.
4. **A captura bruta não entra no repo** — entra só a peça já censurada. Se houver imagem da arena, ela é da
   janela do jogo, recortada e **verificada limpa** (sem barra de navegador, sem terminal, sem desktop).
5. **O texto da saída é TRANSCRITO, não capturado** — e transcrito **já sem** os termos censurados.

## O escopo

**Lente, verbatim do líder:** *"não é seção de bugs. É apenas mostrar que o jogo está vivo."*

**Enquadramento:** seção de **serviço, ATEMPORAL** — guia de "como se joga", não reportagem datada. É por
isso que ela pode mostrar o estado de hoje sem furar a ordem da narrativa.

**Duas coisas, e só:**
1. **Explicar superficialmente o combate por turnos.** O motor foi portado em **22/jun** (`31a856d`…
   `e3b2331`) — está na âncora exata. Superficial: o leitor tem de entender o que é uma rodada e por que a
   ordem importa, e nada além.
2. **Mostrar o resultado de um teste recente da tela da arena, como prova de vida.** O herói é o agregado:
   **`2632/2632` verde** (`edf476de`, 01/08 — conferido no `TODO.md` do jogo, literal *"Suíte inteira
   2632/2632 verde"*).

⚠️ **PROIBIDO contar a história dos dois testes que passavam por causa do bug.** Isso é material da Galeria
de Bugs, de **outra** edição. Aqui o teste é **evidência de que a coisa roda**, não anedota de defeito.

**★ Dado de graça que reforça a prova de vida** (conferido por mim na origem): em **22/jun** a suíte tinha
**684** testes (`c12cb30`); hoje tem **2632**. **Quadruplicou.** Números reais, das duas pontas da linha.

**A fala do líder entra**, em **uma linha**, voz de **root**, no fim da seção — autorizada por ele em
2026-08-01: *"some ele da tela, some a moldura dele e a caixa de seleção. Sensação que correu tudo certo"*.

## A arte (decisão do líder, com esboço à mão dele)

Documento de governo desclassificado: **tarjas pretas** ao longo do texto, cobrindo **nomes de mestre E
mecânica não anunciada** (os dois), e atravessando a página na diagonal um **carimbo vermelho**: retângulo
de cantos arredondados, borda vermelha, interior **`CENSURADO!!!`** em caixa alta, vermelho e negrito, torto
e descuidado, *"como se um burocrata tivesse cuidado desse documento"*. **Dentro do retângulo, canto
inferior direito, bem pequeno mas ainda visível: `sterling corp.`**

★ **`sterling corp.` é autorização expressa de spoiler do líder** (2026-08-01) — o tease do vilão era
decisão exclusiva dele, e ele o liberou in-fiction. Registrado com data para não virar dúvida depois.

**Alcance:** só nesta edição. Nas próximas, o Detonado volta ao vazio-com-graça se não houver o que detonar.
