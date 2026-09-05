# Briefs de produção da Edição #5 (item de board: ED5-PAUTA)

> Artefato de saída da **Onda 1 (E2 + S1)** do `PIPELINE-EDICAO.md`, conforme `docs/editorial/PAUTA-EDICAO-5.md`
> §13. Escrito em 04/09/2026 pelo `product-manager`, a partir da pauta **GATE-PAUTA FECHADO em 2026-09-04**
> (as dezessete decisões, D1 a D17, estão todas fechadas pelo líder; nenhuma reabre aqui).
>
> **Modo autônomo (ordem do líder, 04/09/2026):** as dez peças abaixo serão escritas em sequência, sem
> aprovação peça a peça; o líder faz **uma leitura final**. Por isso todo brief carrega, verbatim e não por
> referência, as travas que valeriam num gate intermediário. Onde a pauta trava algo, este documento repete o
> texto da trava, não um resumo dele.
>
> **Fonte única de verdade sobre o conteúdo:** `docs/editorial/PAUTA-EDICAO-5.md` (caminho absoluto:
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/editorial/PAUTA-EDICAO-5.md`).
> Este documento **não substitui** a pauta, só a fatia por peça, com a fonte primária apontada em caminho
> absoluto (L-18: quem escreve abre o arquivo, não lê o resumo de quem brifa). Onde este brief e a pauta
> divergirem em algum detalhe, **a pauta vence**.
>
> **Leis aplicadas nesta produção, coladas verbatim onde tocam cada peça (não é referência solta):**
> `GODS_LAWS.md` do site (`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/GODS_LAWS.md`),
> especialmente L-08 (canon do Gus, submissão obrigatória), L-09 (spoiler e IA: declarar é a defesa), L-18
> (revogado se apaga; nada é declarado morto por agente), L-25 (personagem não sabe que é pixel); e
> `GODS_LAWS.md` global (`/home/petrus/.claude/GODS_LAWS.md`), L-18 (fato × inferência), L-08 (porte estrutural,
> não prazo), L-31 (zero emoji), L-32 (nunca em-dash/en-dash em texto user-facing).

---

## Travas transversais (valem em TODA peça onde a condição bater; não repetir de cabeça, usar o texto abaixo)

### T1. A trava §1.1 da pauta: afirmar a especialização do Gus Dragon, seco

Verbatim do líder, 04/09/2026: *"Não é constrangedor. O filtro dele como estudioso de jogos é mais
especializado que o meu."*

Vale em **toda peça que toque o playtest de 07/08, o clipping, ou a contagem de linhas de 08/08**: Reportagem
de capa (corpo), Galeria de Bugs, Editorial, e as copies curtas da Nota (Seção 5) e da nota do editor (Seção 19,
fora do escopo deste documento, mas a régua é a mesma). Regras, verbatim da pauta:

- **O texto afirma a especialização dele, sem hedge.** Nada de "outro jeito de jogar", "foi procurando por
  intuição", "teve sorte de parar ali". A causa do achado é o estudo dele, e a frase do líder (*"ele já foi
  buscando esses erros dado ser erro comum"*) é a fonte.
- **Sem adjetivo de ternura, sem "para a idade", sem exclamação.** Proibido: "com apenas 11 anos",
  "impressionou", "surpreendeu", "que fofo", "o pequeno". A idade aparece só onde o molde da revista já a
  põe (o crédito), nunca como moldura do feito.
- **Não vira elogio nem cena de orgulho paterno.** O registro da revista é: o que aconteceu, quem fez, e por
  quê. O root jogou o demo inteiro e não achou nada; o Gus Dragon jogou depois e achou dois, porque estuda
  jogos e sabia que aquela classe de erro é comum. Ponto. O leitor tira a conclusão sozinho.
- **Sem "estudou muito", "aplicado", "esforçado"** (o estudo dele é apetite, não esforço; "ele já sabia",
  "tinha lido sobre isso", "foi atrás").
- Crédito nominal sempre nos dois papéis: **"Gus Dragon, playtester, Revisor Adversarial de Design"**
  (en: *Adversarial Design Reviewer*). Tom seco. **Nome de batismo: nunca, em peça nenhuma.**

### T2. O amigo real por trás do Cauã "Volt": nunca nomeado

Vale onde o Cauã aparecer (não há Cauã nesta edição como entrevistado, mas ele pode ser citado de passagem
na fila da party, ver Peça 8). O nome de batismo do amigo real que inspirou o personagem não aparece em
texto, `alt`, nome de arquivo ou commit, em peça nenhuma, com ou sem consentimento (`ROTEIRO-ENTREVISTAS.md`,
seção B1, regra 1, aplicada por analogia ao próprio elenco da party).

### T3. O que esta edição NÃO conta, em peça nenhuma

Verbatim da pauta, §1, "O que esta edição deliberadamente NÃO conta":

- **A refundação dos repositórios (21/08/2026).** Reservada para reportagem própria
  (`MATERIA-REFUNDACAO-DOS-REPOS`). Nenhuma seção desta edição a cita, nem de passagem, nem como ressalva de
  fonte. Vale também a trava da pauta da #4: proibido piscar para o leitor; nenhum adjetivo que só faz
  sentido para quem conhece o desfecho de agosto.
- **A retirada da biblioteca de interface decidida em 04/08** (o que o board da #4 chamava de RmlUi/glintfx,
  e tudo que orbita essa dependência). D14 decidida em 04/09: **"deixa para a #6".** Reserva nomeada, fica
  fora da #5.
- **Os marcos do Gus Dragon de 21 e 22/08** (carta `glitch`, determinismo, catálogo de bugs, bug da coleta) e
  tudo de 12/08 em diante.
- **A relicença do glintfx para Apache-2.0** (31/07). Assunto próprio, fora da lente desta edição.
- **A série de 28 a 30/07** (`MATERIA-VERIFICACAO-MENTE`). Fora da lente fixada pelo líder.

### T4. Formato universal da voz (herdado de `voz_prompt_shell`, memória do projeto)

Caminho absoluto da memória:
`/home/petrus/.claude/projects/-home-petrus-IDrive-Documentos-projetos-claudebrain-Projects-site-gusworld/memory/voz_prompt_shell.md`

- **Prompt, da #3 em diante:** `[personagem]@glyfesse:[seção]$ [fala]`. O caminho é a **seção da revista**,
  em ASCII sem acento (`~/reportagem`, `~/cemiterio`); fala fora de seção específica usa `~`. O `root` é o
  líder (nunca "pyotor"); distinção visual é problema de render, não de texto.
- **Pensamento `//`:** logo abaixo da fala, atribuído a quem falou. **Cabe em uma linha → `// ...`. Quebra em
  duas ou mais → `/* ... */` (comentário de bloco).** Nunca `//` numa linha com a continuação nua embaixo, e
  nunca várias linhas de `//` para um pensamento só (várias linhas de `//` seguidas são vários pensamentos
  curtos, não um longo quebrado). Na prática de produção desta edição, o limite operacional é **72
  caracteres**: até 72, `//`; acima, `/* ... */`.
- **Fala é registro digitado (chat/prompt), não prosa polida:** sem ponto final; `?` e `!` mantidos onde
  cabem; reticências como assinatura em beats de pausa/emoção; erro de digitação **eventual** (1 a cada 40-80
  palavras, nunca em toda linha), e **só da classe mecânica** (letra dobrada, acento comido, tecla vizinha,
  transposição, omissão) — **nunca erro de gramática ou de quem não sabe escrever**. A prosa de matéria (uma
  carta, um editorial em bloco de texto corrido) pode ser mais limpa; a régua de erro vale para falas em
  registro de prompt/chat.
- **`povvo`** (grafia do líder, com dois vês) é canônico e proposital onde já apareceu; não inventar variação
  nova sem necessidade, e não "corrigir" se aparecer de novo em fala do Gus dentro da janela desta edição.

### T5. Zero travessão, zero emoji, zero rótulo clínico

- **A #5 nasce sem travessão**, glifo nem código HTML, como a #4. Usar dois-pontos, parênteses ou vírgula.
- **Zero emoji.** Nenhuma peça desta edição introduz emoji novo (a decisão do `🤨` foi específica da #4 e não
  se repete por hábito).
- **Zero rótulo clínico**, em lugar nenhum, para o Gus ou para qualquer personagem.
- **Nunca em-dash (—) nem en-dash (–)** em nenhuma das dez peças, nos dois idiomas.

### T6. Submissão obrigatória de toda fala do Gus (L-08 do site)

Toda fala e todo `//` do Gus (personagem) entra em rascunho já sinalizado para `GATE-CONTEUDO` como
"submeter ao líder" — não é aprovação por default. Isto vale mesmo quando o texto parece óbvio: o canon
`gus_dragon_avisou_antes` registra que a sessão já errou "achando que tinha entendido" cinco vezes numa
sessão só. Cada brief abaixo repete isto na seção "Pendências" quando a peça tem fala dele.

---

## Peça 1 — Seção 3, Editorial (Carta do Gus)

**Angle statement:** o Gus escreve, de dentro e sem palavra de produção, que desta vez alguém fez a conta de
verdade sobre o mundo dele, e que antes disso uma parte da casa velha foi desmontada sem que a planta fosse
guardada.

**Escopo — entra:**
- Resposta direta ao fecho do Editorial da #4 (ver Ponte, abaixo).
- A "casa velha" desmontada com cuidado, e a descoberta de que a planta não foi guardada (sem nomear
  repositório, submódulo ou C#: isso é da Reportagem e do Cemitério).
- O fim do mês: alguém veio jogar e perguntou o tamanho do mundo, e pela primeira vez a resposta não foi
  "grande", foi um número (o Gus personagem **não pode** citar o número: L-25 proíbe personagem falando de
  linha de código; "contaram" é o máximo que a peça pode dizer).
- O Gus personagem pode citar o Gus Dragon em terceira pessoa (regra geral da voz do site, `a_voz_do_site`).
- Trava §1.1 (T1 acima), na forma de dentro: duas pessoas jogaram o mundo; a segunda sabia onde mundos
  costumam ranger, foi lá, e ele rangeu. Sem palavra de produção e sem ternura.

**Escopo — não entra (divisória §5.3 da pauta, copiada):**

| | Reportagem (§4) | Galeria (§6) | Editorial (§3, ESTA PEÇA) |
|---|---|---|---|
| **Responde** | Dois jogaram o mesmo jogo: o root não achou nada; o Gus Dragon achou dois, porque estuda jogos (trava §1.1); perguntou; contaram: 163 mil, e teste é mais que o dobro do jogo | O clipping como bug: o que ele fez, o que viu, a pista que fechou o diagnóstico, o que está aberto | "Duas pessoas jogaram o mundo; a segunda sabia onde mundos costumam ranger, foi lá, e ele rangeu; e perguntaram o tamanho; contaram", de dentro, sem número |
| **Proibido** | A anatomia da colisão (as duas metades); adjetivo de ternura, "para a idade", exclamação | O número de linhas; adjetivo de ternura, "para a idade", exclamação | Qualquer número ou palavra de produção; adjetivo de ternura, exclamação |

**Ponte obrigatória com a #4 (fonte primária, verbatim, conferida no publicado, não na pauta):** o fecho do
Editorial da #4 é *"isso muda a conta inteira"* — última linha do bloco de `//`. Caminho absoluto do
publicado: `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-4/pt/sec-03.php`.
⚠️ A pauta da #4 citou uma frase-fantasma como fecho do Editorial ("a coisa mais frágil..."); essa frase é na
verdade da Reportagem da #4, não do Editorial (ver `docs/content/edicao-4-editorial.md`, seção "★ A ponte
com a #3 foi verificada na FONTE"). **Não repetir o erro:** conferir o `.php` publicado antes de escrever a
ponte, não a pauta nem a memória de outro agente.

**Tamanho e formato:** **S por desenho** (2 a 4 parágrafos, no máximo dois blocos de carta, herdado do molde
da #3/#4: linha de prompt + carta pública + bloco de `//` no fim). pt-BR e EN.

**Voz:** Gus, em primeira pessoa, registro de carta (matéria, pode ser mais limpa que uma fala de chat — ver
T4). Prompt: `gus@glyfesse:~/editorial$ [algo equivalente a "quinta edição"]`.

**Travas verbatim que valem aqui:** T1 (trava §1.1, "na forma de dentro"), T3 (nada de refundação nem RmlUi),
T4 (formato de voz e `//`), T5 (zero travessão/emoji), T6 (submissão obrigatória).

**Pendências:** GATE-CONTEUDO; GATE-SPOILER (o `//` toca a ferida do isolamento, mesma classe de profundidade
já aprovada nas edições anteriores); submissão da carta e do `//` ao líder (T6) antes de qualquer render.

---

## Peça 2 — Seção 4, Reportagem de capa (corpo)

**Angle statement:** em três movimentos datados (apagar, conferir, medir), o mês em que a checagem cuidadosa
aconteceu do lado errado da cerca, terminando no único número da edição que ninguém precisou acreditar,
porque foi contado.

**Escopo — entra:**
- **Bloco 1 (quarta, 22/07):** o M8 remove o Godot e o C#: 172 arquivos da pasta antiga e o submódulo
  `engine/`. Executado com cuidado obsessivo por dentro (tag de segurança, build do zero como prova,
  verificação a cada fase); o que se perdeu foi o que estava fora do alcance dessas verificações: o código
  C# original, que ninguém consegue mais abrir. Pode dizer "nada funcional se perdeu, perdeu-se o registro".
- **Meia frase, no primeiro bloco, apontando para a caixa do achado (Peça 3):** 22/07 foi também o dia de um
  achado do Gus Dragon sobre o menu inicial (ver §5.4, abaixo) — sem narrar o achado em si, isso é da caixa.
- **Bloco 2 (quinta e sexta, 23 e 24/07):** os três fatos do líder, em linguagem de quem não programa: a
  checagem olhava para um lado, o problema estava do outro. **O fio que carrega a frase da lente é o
  analisador estático de 23/07** (D2, decidido): achou o travamento de ponteiro nulo em objeto já movido que
  a revisão adversarial humana tinha deixado passar. A falha do elenco (23/07, "mapeei não conferi") entra
  **abstrata**, sem descrever nenhum personagem, com a frase do custo (D12): *"claro que custou, pago
  mensalidade!"* — mantendo a lição "custo de terceiro é custo", sem dizer quanto custou nem qual é o
  serviço.
- **Bloco 3 (sexta e sábado, 7 e 8/08):** o root joga o demo inteiro (título, cidade, diálogo com o NPC
  Bertoldo, combate, vitória) e não acha nada; o Gus Dragon joga depois e acha dois problemas de colisão,
  **porque estuda jogos e o filtro dele para essa classe de defeito é mais especializado** (trava §1.1/T1,
  obrigatória neste bloco). No dia seguinte, contam: cerca de 163 mil linhas de código, e o código de teste
  (78.200) é mais que o dobro do código do jogo (62.700).
- **Fecho de duas frases com o número.**
- **Data-âncora no primeiro parágrafo:** o campo `data` de `data/edicoes.php` recebe `2026-07-22` (D11), mas
  a janela **"de 22 de julho a 7 de agosto"** vai no primeiro parágrafo da Reportagem, no molde de como a #4
  datou as próprias peças em prosa.

**Escopo — não entra (cortes obrigatórios, §3.1 e §5 da pauta):**
- Sem a mecânica do submódulo (é do Cemitério).
- Sem citar `// ADAPTACAO` (é do Cemitério).
- Sem código, `strace`, nome de variável (é da Programação).
- Sem o gate cego de i18n nem o `git add -A` (é d'O Gus lê o bus).
- Sem a anatomia da colisão, as duas metades (é da Galeria).
- Sem narrar o menu, o verbatim de 22/07 ou a arte nova (é da caixa, Peça 3).
- Sem descrever nenhum personagem na falha do elenco (nem cabelo, nem armadura, nem quem é quem).
- Sem a sabotagem que travou o teste de 24/07 (é do Detonado da Pausa).
- Nenhuma palavra que só faça sentido para quem sabe de agosto.

**Divisórias completas da pauta que tocam esta peça (§5.1, §5.2, §5.3), copiadas na íntegra:**

§5.1 — O apagar (22/07):

| | Reportagem (§4) | Cemitério (§7) | O Gus lê o bus (§18) | Pôster (§13) |
|---|---|---|---|---|
| **Responde** | O que aconteceu, em ordem, em um parágrafo: tiraram o jogo antigo com cuidado, e o cuidado não alcançou o que estava fora | Por que "parecia preservado" e não estava, com a mecânica | Como isso chegou aqui: a listagem mostra o assunto do obituário | Arte: o único retrato que sobrou |
| **Pode** | Dizer que o código original não pode mais ser aberto; dizer "nada funcional se perdeu, perdeu-se o registro" | A tag e o ponteiro; o submódulo; o clone local apagado antes do remoto; o parecer contrário; a varredura sem cópia; a citação `// ADAPTACAO`; as duas lições; a ironia | Abrir a mensagem das memórias ("aqui não é cemitério") | O identificador do commit, e nada mais |
| **Proibido** | Explicar submódulo; citar `// ADAPTACAO`; a tag pelo nome | Repetir a lápide "C# .NET 8 AOT" da #3 (uma linha de referência, só) | Abrir a mensagem do obituário | Texto além do identificador e da legenda |

§5.2 — O conferir (23 e 24/07):

| | Reportagem (§4) | Programação (§17) | O Gus lê o bus (§18) | Galeria (§6) | Detonado (§8) |
|---|---|---|---|---|---|
| **Responde** | Os três fatos do líder, em linguagem de quem não programa: a checagem olhava para um lado, o problema estava do outro | O mecanismo: por que a proteção pela metade engana, por que o isolamento é de quem executa, o que o analisador viu que o review não viu (a frase da lente, 23/07), o QA na sessão viva | O gate cego da paridade de traduções e o `git add -A` (itens 1 e 7 do board), na voz do Gus reagindo | O bug de andar sozinho como evento: sintoma, causa numa frase, consertado em 24/07 | O menu de pausa como serviço, hoje: laço único, estados, mini-condutor, foco preservado; e a sabotagem que travou o teste (24/07): a prova que precisava aprender a reprovar |
| **Lição que carrega** | O arco | 23/07: uma ferramenta barata viu o que a revisão cara não viu (a verificação que enxerga mais) | A ausência de aviso parece "passou" | O conserto | 24/07: a verificação que existia não sabia reprovar; teste que pendura fica quieto (a verificação que não sabe falhar) |
| **Proibido** | Código, `strace`, nome de variável; o gate cego (é do bus); a mutação que travou | Narrar a falha da party; repetir o gate cego; a sabotagem que travou (é do Detonado) | Detalhar o wrapper ou o linter | Arquitetura de estados; método de mutação | O bug (é da Galeria); o analisador estático e qualquer "a máquina viu o que o humano não viu" (é da Programação) |

§5.3 — O medir (07 e 08/08): ver tabela já reproduzida na Peça 1 (linha "Reportagem (§4)").

**Fonte primária, com caminho absoluto (L-18: abrir o arquivo, não o resumo):**
- Bloco 1: `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260722-1706-gusworld-obituario-foundation-csharp.md`
  (também transcrito, sem edição, em
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/arquivo/era-godot-csharp-obituario.md`).
- Bloco 2: `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260723-0820-glintfx-protecao-pela-metade.md`
  (ATO 4, "o linter achou o crash que o revisor adversarial não achou", é o fio da lente);
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260723-2135-gusworld-falha-party-sprites-fonte-errada.md`
  (a falha do elenco, incluindo a frase *"claro que custou, pago mensalidade!"*).
- Bloco 3: `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260807-2007-gusworld-playtest-gus-clipping-atores.md`
  (fato: quem jogou o quê, 07/08, verbatim: *"Hoje o lider rodou o demo do jogo (...) e depois passou o
  controle para o Gus Dragon jogar em pessoa"*);
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260808-1343-gusworld-pergunta-gus-linhas-de-codigo.md`
  (a contagem: 163 mil, 62.700 de jogo, 78.200 de teste).
- A frase do líder que fecha a trava §1.1 do terceiro bloco é **fato registrado por ele em 04/09/2026**,
  citada na pauta, §1 item 3 e §12 D13 — não está em nenhum arquivo do bus; é falado direto ao orquestrador
  e registrado na própria `PAUTA-EDICAO-5.md`.

**Tamanho e formato:** **L** (9 a 12 parágrafos), estrutura de três blocos datados + fecho de duas frases,
molde de arco datado das reportagens anteriores. pt-BR e EN. Prompt: `gus@glyfesse:~/reportagem$`.

**Voz:** Gus, primeira pessoa, registro técnico (D1, decidido: "Gus-editor, técnico" — a L-25 vale para a
ficção, não para as seções técnicas; esta é seção técnica e nomeia tecnologia pelo nome: M8, Godot, C#,
submódulo `engine/`). Duas cercas que a decisão D1 não abre: (a) nomear tecnologia não libera a matéria
reservada nem o serviço de hospedagem da época; (b) a trava §1.1 continua valendo dentro da Reportagem.

**Travas verbatim que valem aqui:** T1 (obrigatória no bloco 3), T3 (integral), T4, T5, T6 (não se aplica
fala direta do Gus aqui além do prompt de abertura, mas a voz é dele em primeira pessoa e passa por
GATE-CONTEUDO igual).

**Pendências:** GATE-CONTEUDO; GATE-SPOILER na falha do elenco (nenhuma aparência de personagem pode escapar
por paráfrase, ex. "a de tranças", "a curandeira" — checagem do `compliance-legal`); GATE-CAPA precisa do
print em 390px com o título de 23 caracteres antes de fechar (risco de render §11 item 6 da pauta, fora do
escopo textual deste brief).

---

## Peça 3 — Seção 4, caixa própria: a reportagem do achado do Gus Dragon (`#sec-04-menu`)

**Angle statement:** em 22/07, por feedback de playtest, o Gus Dragon apontou que o menu inicial mostrava a
cena de onde o jogador estava em vez de ter arte própria.

⚠️ **CORRIGIDO EM 04/09/2026, ERRO DE FATO:** a afirmação de que "a arte entrou no dia seguinte" é **falsa** e nasceu de um resumo que eu não conferi na fonte. O item `F7` do `TODO.md` do jogo (linha 134) diz o contrário: a decisão do líder à época foi **reaproveitar o monitor CRT do boot**, em vez de encomendar arte nova, e o item está **`⏳ Pendente` e bloqueado**, porque é inteiramente da camada que desenha, que ainda não existe. **Sem data.** A peça conta o arco verdadeiro: ele apontou por **convenção do gênero, não gosto pessoal** (a nota do quadro diz isso com estas palavras), a observação virou decisão fechada, e a decisão espera.

**Por que esta peça existe e por que tem regra própria:** D16, decidida pelo líder em 04/09/2026, virou
**adendo datado da L-24 do `GODS_LAWS.md` do site**. Verbatim do líder: *"Entra como reportagem. Achados do
gus sempre são especiais."* Ele recusou as duas opções levadas (carta curta ou guardar). A regra,
generalizada por ele: **achado do Gus Dragon não é item de lista nem linha dentro de peça alheia; tem
tratamento editorial próprio, e o porte se decide pelo achado, nunca pelo espaço que sobrou na edição.** Não
é licença para inflar (matéria pequena continua pequena); é proibição de rebaixar por conveniência de
diagramação.

**Escopo — entra:**
- O verbatim dele, citável: *"o menu inicial (so ele) em geral tem alguma arte, ou animacao por tras, e nao
  a tela de onde o jogador estava"*.
- O que o menu mostrava antes (a cena de onde o jogador estava) e o que passou a mostrar (arte própria).
- A data da arte: NÃO existe. Ver a correção acima. A fonte que eu citava diz o oposto do que eu afirmei ao
  achado. **A peça escreve "no dia seguinte" e não crava data.** Não há o que confirmar; há o que não
  afirmar.
- Crédito nos dois papéis: "Gus Dragon, playtester, Revisor Adversarial de Design".

**Escopo — não entra (divisória §5.4 da pauta, copiada na íntegra):**

| | Reportagem de capa (§4, o corpo) | Caixa própria (§4, `#sec-04-menu`, ESTA PEÇA) |
|---|---|---|
| **Responde** | O que parecia conferido, em três movimentos; no terceiro, o playtest de 07/08 e a contagem de 08/08 | Um achado só: o menu inicial mostrava a cena de onde o jogador estava, ele apontou em 22/07, a arte própria entrou "no dia seguinte" (sem cravar data) |
| **Pode** | Dizer, no primeiro bloco, que 22/07 foi também o dia de um achado dele, em meia frase, apontando para a caixa | Citar o verbatim dele; dizer o que o menu mostrava antes e o que passou a mostrar; o crédito nos dois papéis |
| **Proibido** | Narrar o menu, o verbatim de 22/07 ou a arte nova (é da caixa) | O clipping de 07/08, o número de linhas, qualquer parte dos três movimentos (é do corpo); qualquer palavra que só faça sentido para quem sabe de agosto |
| **Trava §1.1** | vale | vale |

**Fronteira de registro, deliberada (D1 e D15 da pauta, não confundir com a Galeria):** esta caixa é técnica
por decisão do líder e nomeia tecnologia (menu inicial, arte, boot/CRT), como a Reportagem que a hospeda.
Não fala "de dentro do mundo" como a Galeria; nenhum revisor uniformiza uma pela outra (regra da §5.4).

**Fonte primária, com caminho absoluto:**
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld/TODO.md`, **linha 134, item `F7`**:
  *"CRT do boot como fundo do menu inicial, ideia do Gus Dragon (autoria dele), nascida de feedback de
  PLAYTEST. Origem: commit `485c604` de 22/07/2026. Ele descreveu uma convenção do gênero, não gosto
  pessoal, verbatim: 'o menu inicial (so ele) em geral tem alguma arte, ou animacao por tras, e nao a tela de
  onde o jogador estava'."*
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260724-2020-gusworld-onda-f4-becos-e-a-tarde-perdida.md`
  cita "a arte do menu" na seção 10 como fatia planejada da mesma semana (não crava a data de entrega da
  arte; usar só para confirmar que o assunto estava em curso naquela janela).
- ⚠️ **Lacuna declarada (não presumir):** a única fonte da data "no dia seguinte" é a nota do próprio item
  `F7` do `TODO.md` do jogo, que hoje aparece como `⏳ Pendente`, "bloqueado por `present/`, GlintFx" — ou
  seja, na árvore atual do jogo o item ainda não foi implementado tecnicamente, o que **não contradiz** a
  peça: o achado (22/07) e a arte reaproveitando o CRT do boot são fatos anteriores; o texto do `F7` descreve
  o *desenho* aprovado, não necessariamente a arte final publicada. Se houver dúvida sobre isso no
  `GATE-CONTEUDO`, é pergunta para o líder, não inferência de quem escreve.

**Tamanho e formato:** **S** (é o porte do achado, não do espaço que sobrou — regra da própria lei). Formato:
caixa ao fim do partial da Reportagem de capa, no molde do encarte do glintfx da #4 (ver
`/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-4/pt/sec-04.php`,
linhas 48-74, para o padrão de marcação: `<div id="sec-04-glintfx">`, prompt próprio, bloco de fala, `//`,
`//by:`). Nesta edição: âncora `#sec-04-menu`, prompt próprio `gus@glyfesse:~/menu$`, fonte própria em
`docs/content/edicao-5-reportagem-menu.md`. pt-BR e EN.

**Voz:** Gus-editor (a mesma voz técnica que hospeda a Reportagem, não personagem de jogo revelando que é
pixel). É a forma (b) da recompensa do canon dele (a ideia adotada a tempo e o mérito reconhecido, dita sem
homenagem).

**Travas verbatim que valem aqui:** T1 (integral, inclusive "sem adjetivo de ternura, sem 'para a idade'"),
T3, T4, T5, T6 (se a peça citar fala direta dele além do verbatim já registrado no `TODO.md` do jogo,
submeter).

**Pendências:** GATE-CONTEUDO; confirmar com o revisor da onda 3 que o menu inicial aparece **uma vez só** na
edição inteira (risco §11 item 13 da pauta).

---

## Peça 4 — Seção 6, Galeria de Bugs

**Angle statement:** dois bugs, um de cada lado da cerca do mês: o Gus que andava sozinho ao sair da pausa
(consertado em 24/07, achado por refatorar) e o clipping de quem faz ronda (07/08, achado pelo Gus Dragon
porque estuda jogos e sabia que aquela classe de erro é comum).

**Escopo — entra:**
- **Caso 1 (aconteceu, 24/07):** ao fechar o menu de pausa, o Gus continuava andando sozinho, porque o laço
  do menu engolia a tecla solta. Sintoma sentido pelo root. Consertado ao trocar seis laços por um.
- **Caso 2 (aconteceu, 07/08, aberto):** o root jogou o demo inteiro e não achou nada; o Gus Dragon jogou e
  foi direto na classe de erro que sabia ser comum: ficou parado encostado num bloco, no caminho de um
  personagem em ronda, e ficou preso na sobreposição; repetiu o experimento do outro lado, com um inimigo, e
  o segundo achado (o inimigo que atravessa tudo) foi a pista que fechou o diagnóstico: só o jogador resolve
  colisão, e só quando ele se move.
- **Crédito no molde publicado:** *"Quem achou foi o Gus Dragon, playtester, Revisor Adversarial de
  Design"*, tom seco; ele nomeou o clipping em junho (`gus_dragon_avisou_antes`), mordeu em julho (tunneling,
  #4) e de novo em agosto — **a Galeria não aponta a simetria; o leitor junta.**
- **Vocabulário do mundo (D15, decidida):** "um inimigo que faz ronda", "alguém do lugar", "um bloco". Nunca
  "NPC", "androide inimigo", "prop de cenário" (o bus usa esses termos técnicos; a peça traduz para o
  vocabulário de dentro).
- **Honestidade obrigatória:** "a correção ainda não foi escolhida" (mexe no feel da física; decisão do líder
  antes de qualquer linha).

**Escopo — não entra (divisórias §5.2 e §5.3, colunas Galeria, copiadas):**

Ver as tabelas completas §5.2 e §5.3 já reproduzidas nas Peças 2 e 1. Resumo direto da coluna Galeria:
proibido a arquitetura de estados (é do Detonado), o método de mutação, o número de linhas de código, e
qualquer adjetivo de ternura/"para a idade"/exclamação. **Trava §1.1 obrigatória no caso 2.**

**Fonte primária, com caminho absoluto:**
- Caso 1 (24/07): `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260724-2020-gusworld-onda-f4-becos-e-a-tarde-perdida.md`,
  seção "1. O problema: seis loops que engoliam teclas" (o sintoma: *"você anda segurando uma direção, aperta
  ESC, o menu de pausa abre, você fecha o menu, e o Gus continua andando sozinho"*).
- Caso 2 (07/08): `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260807-2007-gusworld-playtest-gus-clipping-atores.md`,
  íntegra (dois problemas de colisão, o desdobramento técnico das "duas metades que não se falam", registrado
  como `CLIPPING-ATOR-RONDA-SEM-COLISAO` no `TODO.md` do jogo).
- ⚠️ **Lacuna declarada:** a busca por `CLIPPING-ATOR-RONDA-SEM-COLISAO` na árvore atual de
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld/` não encontrou nenhuma ocorrência
  (varredura em 04/09/2026, `Grep` sem correspondência). É provável que o item tenha existido antes da
  refundação dos repositórios de 21/08/2026 (fora da janela desta edição) e não tenha sobrevivido à árvore
  atual, na mesma classe de lacuna que a pauta já documenta para a tag `pre-m8-godot-legacy` (§15, item 1).
  **Isto não muda a matéria:** a fonte primária é o bus, datado de 07/08, dentro da janela; a peça não cita o
  identificador do item do `TODO.md` do jogo (só o bus é citável com segurança).

**Tamanho e formato:** **S/M** (2 a 4 parágrafos por caso, ou até 6-8 se a peça ganhar aparte curto de terminal
verde, molde da #3/#4: piada primeiro, técnico depois). pt-BR e EN.

**Voz:** Gus, primeira pessoa, registro **de dentro do mundo** (não técnico como a Reportagem — é a fronteira
de registro deliberada, D1/D15, §5.4: "a Reportagem de capa é técnica por decisão do líder e nomeia
tecnologia; a Galeria fala de dentro do mundo. As duas convivem na mesma edição de propósito; nenhum revisor
uniformiza uma pela outra"). Prompt: `gus@glyfesse:~/galeria$`.

**Travas verbatim que valem aqui:** T1 (obrigatória no caso 2), T3, T4, T5, T6.

**Pendências:** GATE-CONTEUDO; GATE-SPOILER (D15: "androide inimigo em ronda", "NPC", "bloco de cenário"
passam pelo gate; recomenda-se "um inimigo que faz ronda" e equivalentes); `compliance-legal` confere que
nenhum termo de produção voltou à Galeria (risco §11 item 5).

---

## Peça 5 — Seção 7, Cemitério das Ideias Mortas

**Angle statement:** uma cova, e ela está vazia: a fundação C# que devia ter sido arquivada e sumiu, a tag
que guarda só o ponteiro, e a nota de rodapé para uma obra que não existe.

**Escopo — entra (a cova é do CORPO, não da decisão; a #3 já enterrou a decisão de sair):**
- Uma lápide só: `a fundação C#`, datas `mai/2026` a `22/jul/2026`.
- Epitáfio (proposto na pauta, ainda pendente): *"Aqui não jaz ninguém. / O corpo ia ser guardado. Foi
  apagado."*
- A prosa carrega a matéria: a tag `pre-m8-godot-legacy`, criada para preservar, guarda só o ponteiro (é
  assim que submódulo funciona); a limpeza local levou o único clone; o remoto foi apagado em vez de
  arquivado, contra o parecer *"apagar o repo remoto seria irreversível de verdade; não recomendo"*;
  varreram lixeira, packs e disco: não há cópia; **nada funcional se perdeu, perdeu-se o registro**; e os
  arquivos de hoje ainda carregam `// ADAPTACAO do C#: game/scripts/foundation/save_system/SaveManager.cs`,
  uma nota de rodapé para uma obra que não existe.
- Fecha com a ironia registrada sem defesa (o cuidado obsessivo dentro, a perda fora) e com uma linha ligando
  à #3: a lápide do C# já estava aqui; esta cova é a do que devia ter sobrado.
- **Segunda fonte, na árvore atual do jogo:** o ADR-005 pediu "arquivar" em 21/06 e recebeu, em 25/07, o
  carimbo: *"sem efeito. O repo foi apagado em vez de arquivado, no M8"*, remetendo a um CHANGELOG que também
  não existe mais. Cabe na prosa em uma frase; **não nomear o serviço de hospedagem** (usar "o servidor
  remoto"; L-29 global manda purgar links a ele).

**Escopo — não entra:**
- Repetir a lápide "C# .NET 8 AOT" da #3 além de **uma linha de referência**.
- Nada do que aconteceu com o repositório depois de julho (matéria reservada, T3).
- ⚠️ **Consequência de redação obrigatória, da lacuna §15 item 1 da pauta:** a árvore atual do jogo **não tem
  mais nenhum arquivo de código** (nem `.cpp`, `.hpp`, `.cs`), a tag `pre-m8-godot-legacy` não é nomeada em
  documento nenhum hoje, e a citação `SaveManager.cs` tem zero ocorrências na árvore atual. Isso não muda a
  matéria (a fonte primária é a mensagem do bus de 22/07, que descrevia o que era verdade naquele dia), mas
  **a peça escreve "os arquivos C++ de então", nunca "de hoje"**, e a razão de a árvore atual estar assim é a
  matéria reservada — não se cita.
- O número "172 arquivos" vem só do bus e da mensagem das memórias (22/07); a árvore atual não o corrobora
  nem o desmente. Usar como "cento e setenta e dois arquivos, segundo o registro do dia", ou omitir.

**Fonte primária, com caminho absoluto:**
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/arquivo/era-godot-csharp-obituario.md`
  (transcrição íntegra, sem edição; texto-mãe da peça).
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260722-1706-gusworld-obituario-foundation-csharp.md`
  (a mesma mensagem, no bus).
- Segunda fonte (ADR-005), na árvore do jogo (somente leitura):
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld/docs/tech/adr/ADR-005-license-gpl3-assets-ccbysa.md`,
  **linha 46** (pedido de arquivar) e **linha 118** (carimbo de 25/07 dizendo que não teve efeito).
- Ponte com a #3 (fonte primária, não paráfrase): confirmar em
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-3/pt/sec-07.php`
  a frase exata *"o corpo ficou instalado no computador até 22 de julho"* antes de citá-la.

**Tamanho e formato:** **M** (a maior lápide do acervo até hoje; 6 a 8 parágrafos, ou porte S com peça de
arte, mas aqui reusa o layout de lápide CSS já existente, sem arte nova). pt-BR e EN.

**Voz:** Gus-editor (a voz meta da revista, quem constrói e enterra decisões de produção), o mesmo registro
das lápides da #2/#3/#4 — nomear "C#", "Godot" e nome de ferramenta não quebra L-25, porque esta seção não é
personagem vivendo dentro do mundo ficcional sendo perguntado sobre a própria existência.

**Travas verbatim que valem aqui:** T3 (integral, sobretudo a matéria reservada), T4, T5.

**Pendências:** GATE-CONTEUDO; confirmar o epitáfio proposto com o líder (ainda marcado como proposta na
pauta, não decisão fechada); zero arte nova (layout reaproveitado).

---

## Peça 6 — Seção 8, Detonado da Pausa

**Angle statement:** como o menu de pausa funciona por trás da tela, hoje: um laço só, cada tela um estado,
cancelar mantém o foco, e a prova de que a prova sabe reprovar.

**Escopo — entra:**
- Serviço **atemporal**, como os dois detonados anteriores: cada tela era um laço próprio drenando a fila de
  eventos; hoje é um laço só e cada tela é um estado (entra, trata evento, avança, terminou, sai); o título
  abre a dificuldade e a pausa abre salvar/carregar por um mini-condutor externo; cancelar volta ao mesmo
  objeto, e por isso o foco não se perde.
- Prova de vida: bateria que percorre as seis telas sozinha, 2.536 testes verdes em 24/07.
- **D4, decidida: entra cheio, com o material de 24/07 dentro** — a prova de que a prova sabe reprovar. Ao
  sabotar de propósito a linha que fecha a janela, nenhum teste caiu; o teste **travou**, porque o laço nunca
  terminava, e a suíte não tinha limite de tempo por teste: um travamento penduraria a integração para sempre
  em vez de falhar rápido. Entrou o limite; o buraco achado ao caçar outro buraco.
- **Lição própria, distinta da da Programação:** *"teste que pendura fica quieto, e quieto parece verde."* A
  divisória §5.2 exige que esta lição **não** seja a mesma da Programação ("uma ferramenta barata viu o que a
  revisão cara não viu"); se as duas peças terminarem na mesma moral, uma delas está errada, e cabe ao
  revisor da onda 3 conferir lado a lado.
- Sem tarja de spoiler prevista (nada de lore nesta peça).

**Escopo — não entra (divisória §5.2, coluna Detonado, já reproduzida na Peça 2):** o bug do "andar sozinho"
é da Galeria; o analisador estático e qualquer "a máquina viu o que o humano não viu" é da Programação.

**Fonte primária, com caminho absoluto:**
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260724-2020-gusworld-onda-f4-becos-e-a-tarde-perdida.md`,
  seções "2. O que foi feito, em ordem de risco crescente", "3. O beco do aninhamento, e o mini-driver", e
  especialmente "4. O método: quem escreve não é quem testa, e o teste tem que ter dente" (o parágrafo sobre a
  primeira tela reprovar, a sabotagem que travou em vez de falhar, e o limite de tempo adicionado). Números
  finais de teste: "de dois mil quatrocentos e vinte e quatro para dois mil quinhentos e trinta e seis testes"
  (seção 9).

**Tamanho e formato:** **M** (6 a 8 parágrafos), molde do documento desclassificado da #3/#4 (linha de prompt
técnica, estrutura de serviço). pt-BR e EN.

**Voz:** Gus-editor, técnica (seção de serviço, mesma classe da Reportagem e da Programação — nomeia
mecanismo livremente).

**Travas verbatim que valem aqui:** T3, T4, T5.

**Pendências:** GATE-CONTEUDO; confirmar com o revisor da onda 3 que a lição desta peça e a da Programação não
colidem (risco §11 item 2 da pauta).

---

## Peça 7 — Seção 9, Errata

**Angle statement:** a primeira errata real da revista, e o erro é sobre o próprio tema da edição: a tarja de
censura da #3 em inglês dizia "trecho censurado" em português para quem usa leitor de tela.

**Escopo — entra:**
- O fato: na Edição #3 em inglês, `edicao-3/en/sec-08.php` tem quatro ocorrências de
  `aria-label="trecho censurado"` em português, dentro de uma página em inglês. Quem lê em inglês com leitor
  de tela ouve português no meio do texto, desde o lançamento (21/07/2026, conforme
  `reference_registro_lancamentos`).
- Achado em 03/09/2026 por quem montou a #4, ao recusar copiar a referência indicada — a referência é que
  estava errada; a #4 já nasceu certa (`censored excerpt`).
- **D9, decidida: publica a errata e leva o conserto no mesmo deploy.** `A11Y-ED3-EN-TARJA` sai da INBOX do
  `TODO.md` do site e vira pré-requisito do deploy da #5 (onda 0, §13).
- Copy proposta (§3.2 da pauta, ainda pendente de aprovação, é fala do Gus e vai ao líder):
  `gus@glyfesse:~/errata$ errata + cartas` / *"Errata: quatro edições, e o primeiro erro apareceu. Não foi um
  leitor que achou; foi alguém daqui, revisando outra coisa. Na edição #3 em inglês, a tarja preta do
  Detonado dizia 'trecho censurado' em português para quem lê com leitor de tela. Quem ouvia em inglês ouvia
  uma frase que não era da língua. Corrigido junto com esta edição. Cartas: nenhuma de leitor, de novo."* /
  `// a gente conferiu a tarja. ninguem conferiu em que lingua`.

**Escopo — não entra:**
- Qualquer coisa além da própria tarja: não é o lugar de reabrir outra parte da #3.
- **Metade Cartas desta mesma seção 9 não é escrita nova desta lista de dez peças** (D17: vazio com graça,
  reaproveitando a mesma linha da copy da Errata acima, *"Cartas: nenhuma de leitor, de novo."*) — está fora
  do escopo deste brief, citada aqui só para não confundir quem monta o partial da seção 9 inteira.

**Fonte primária, com caminho absoluto:**
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-3/en/sec-08.php`,
  **linhas 50, 60 e 75** (confirmado por `Grep` em 04/09/2026: `aria-label="trecho censurado"` aparece 3 vezes
  no corpo do arquivo mais uma vez no comentário de cabeçalho, linha 16, que já registra o defeito).
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/TODO.md`, item `A11Y-ED3-EN-TARJA`
  na INBOX (linha 180 no momento desta leitura).
- Comparação: `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-4/en/sec-08.php`
  já usa `censored excerpt` (a forma certa) — conferir antes de escrever para reusar exatamente essa string.

**Tamanho e formato:** **S** (2 a 4 parágrafos). pt-BR e EN.

**Voz:** Gus (fala de chat/prompt, registro T4 completo: sem ponto final, erro de digitação eventual e
mecânico se houver).

**Travas verbatim que valem aqui:** T4, T5, T6 (é fala do Gus, submissão obrigatória).

**Pendências:** GATE-CONTEUDO; GATE-COPY (a copy acima é proposta, não decisão fechada); **dependência dura de
deploy** — o conserto dos quatro `aria-label` em `edicao-3/en/sec-08.php` precisa subir no mesmo deploy da
#5, com prova de que a #3 não regrediu em pt e en (risco §11 item 15 da pauta); a correção técnica em si
(`frontend-engineer`) está fora do escopo deste brief de conteúdo.

---

## Peça 8 — Seção 16, A Entrevista (Jaci "Proxy" Vanderbist)

**Angle statement:** Jaci "Proxy" Vanderbist, 11 anos, curandeira biológica da Selve Sombria, entrevistada
seguindo a fila fixada da party, com a regra nova de que o entrevistado nunca vê o `//` do entrevistador.

**Escopo — entra:**
- **D3, decidida: Jaci é a convidada da #5**, seguindo a fila do `ROTEIRO-ENTREVISTAS.md` (Gus na #3, Cauã na
  #4), sem reabrir a ordem da série nem criar trilha B nesta edição.
- Motor da entrevista: pessoa × sistema — o vínculo mais profundo da party com o Gus (tabela de conflitos do
  `party.md`, linha "Gus × Jaci").
- Linguagem-âncora dela: **Pythia** (a mesma do Cauã "Volt"); ela e o Gus falam em **C-Arcane × Pythia**, o
  gancho cômico canônico da série.
- O afeto platônico velado Jaci-Gus é **canon e nunca é dito em texto** (regra permanente da série,
  `ROTEIRO-ENTREVISTAS.md`, "Regras de produção desta série", item 6).
- Quem pergunta: o **Gus** (é ele quem entrevista nesta peça, como nas edições anteriores da fila, exceto a
  #3 em que o Cauã perguntou a ele).
- **Regra nova de método (líder, 03/09/2026), obrigatória:** o entrevistado **nunca vê o `//`** de quem
  pergunta. Não basta instruir o agente a ignorar; o agente que interpreta Jaci recebe o arquivo de perguntas
  **com os `//` mecanicamente removidos** (`grep -v '^//' perguntas.md > perguntas-sem-pensamento.md`, e
  `grep -c '^//' perguntas-sem-pensamento.md` tem de dar **zero** antes de despachar). Cada fala precisa se
  sustentar sozinha sem o `//` que a acompanha; se uma pergunta só faz sentido lendo o pensamento embaixo,
  ela está mal escrita. O inverso vale também: se Jaci tiver `//` próprio, o Gus não o vê.

**Escopo — não entra:**
- **Traição, mortes, reveals e final da party** não entram (regra permanente de spoiler da série).
- Nome, idade, facção, linguagem e temperamento de Jaci já são públicos (repo do jogo) e **podem** aparecer;
  o **arco** dela (a família morta por um surto, a ligação com Sterling Corp, o conflito de vilarejo) é
  **deep lore** e passa por GATE-SPOILER antes de qualquer linha entrar — não presumir liberação.
- Romance ou fan-service (Pillar 4 do jogo): nenhum.
- Qualquer palavra de produção na boca de Jaci ou do Gus (L-25).

**Fonte primária, com caminho absoluto:**
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/editorial/ROTEIRO-ENTREVISTAS.md`
  (a fila, a regra do `//` removido, o motor "pessoa × sistema" da linha Jaci na tabela "Ganchos já
  mapeados").
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld/docs/narrative/characters/party.md`
  (rev. 2, 2026-05-15; canônica, somente leitura), linhas com as fichas resumidas de Jaci e a matriz de
  conflitos ("Gus × Jaci").
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld/docs/narrative/characters/jaci-proxy.md`
  (ficha completa, somente leitura) — **contém deep lore sensível** (wound, mini-quests, pulled quotes); usar
  só o que a régua pública de spoiler autoriza (nome, idade, facção, linguagem, temperamento), e levar
  qualquer trecho de plot ao GATE-SPOILER antes de citar.
- Datas: a party é canônica desde 15/05/2026, anterior a toda edição publicada, então hospedá-la nesta
  edição não é anacronismo; o **conteúdo** citado (mecânica, cena, sprite) segue preso à data-âncora da
  janela 22/07-08/08 se a entrevista tocar eventos do mundo do jogo — a maior parte da entrevista, por ser
  sobre a própria Jaci, não precisa de data-âncora.

**Tamanho e formato:** **L** (a segunda peça mais cara da edição, 9 a 12 parágrafos ou trocas de fala
equivalentes). Método: dois agentes de persona (Jaci e o Gus entrevistador) improvisando turno a turno,
mediados pela main, como nas edições anteriores. pt-BR e EN.

**Voz:** Jaci responde no próprio prefixo (ex. `jaci@glyfesse:~/entrevista$`); Gus pergunta em
`gus@glyfesse:~/entrevista$` e pensa em `//`, que Jaci não vê. Registro T4 (fala digitada, erro eventual
mecânico, sem ponto final).

**Travas verbatim que valem aqui:** T2 (não se aplica ao Cauã diretamente aqui, mas se a fila da party for
citada de passagem, o amigo real segue nunca nomeado), T4, T5, T6 (fala do Gus, submissão obrigatória; a fala
de Jaci passa por GATE-SPOILER, não por L-08, mas mesma disciplina de não presumir aprovação).

**Pendências:** GATE-CONTEUDO; **GATE-SPOILER obrigatório e sem exceção antes de qualquer render** (regra
permanente da série, `ROTEIRO-ENTREVISTAS.md`); confirmar a régua de spoiler para o wound de Jaci
especificamente com o líder antes de escrever, já que este brief não pode presumir liberação de deep lore.

---

## Peça 9 — Seção 17, Seção de Programação

**Angle statement:** o eixo expert de "conferir": a proteção pela metade que enganava, o isolamento que
pertence a quem executa, e o analisador estático que achou em segundos o crash que uma bateria adversarial de
mutação não achou.

**Escopo — entra, em ordem:**
- **Fio 1:** o wrapper que tinha, nos próprios comentários, a descrição perfeita da armadilha
  (`wl_display_connect(NULL)` cai no socket padrão dentro do `$XDG_RUNTIME_DIR`) e o código logo abaixo
  fazendo exatamente a coisa insuficiente (remover só a variável `WAYLAND_DISPLAY`).
- **Fio 2:** três portas de entrada, e a que ninguém trancou (o script do gate local, sem isolamento próprio);
  o princípio que sobrou: **"o isolamento pertence a quem executa, não a quem chama."**
- **Fio 3 (é o fio que carrega a frase da lente, D2 decidido; a peça se organiza em torno dele):** o
  analisador estático achou, em segundos, o crash em objeto movido-de (ponteiro nulo desreferenciado) que o
  review adversarial (cinco sabotagens, entrada hostil, sanitizadores) **não achou**, porque testou "chamar
  antes de inicializar" e não testou "chamar em objeto movido-de".
- **Fio 4:** do lado do jogo, no dia seguinte (24/07), o QA que achou o gancho de build rodando a suíte
  gráfica na sessão viva do líder, fora do escopo do que ele estava testando.
- **Tabela obrigatória:** "o que a verificação olhava" × "onde o problema estava".
- Estrutura canônica (herdada das #1-#4): intro acessível + desculpa furada no CRT (nova a cada edição, sem
  repetir a da #4) + `//` de transição + bloco `nano` + parte técnica com subtópicos e tabela + `//by:`.

**Escopo — não entra (divisória §5.2, coluna Programação, já reproduzida na Peça 2; e reserva explícita da
pauta):**
- Narrar a falha da party (é da Reportagem, abstrata).
- Repetir o gate cego de i18n (é d'O Gus lê o bus).
- **A sabotagem que travou o teste em vez de reprovar (24/07): sai daqui, vai para o Detonado da Pausa**, com
  a divisória integral. Se a lição desta peça e a do Detonado terminarem na mesma moral, uma das duas está
  errada — esta peça carrega "uma ferramenta barata viu o que a revisão cara não viu", o Detonado carrega
  "a verificação que não sabia falhar".
- **Nenhum elogio a ferramenta nenhuma como vitória; sem sinal do que vem em agosto** (trava de não piscar,
  herdada da #4 e reforçada na §11 risco 4 desta pauta).

**Fonte primária, com caminho absoluto:**
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260723-0820-glintfx-protecao-pela-metade.md`
  (íntegra: ATO 1 a ATO 5, os fios 1, 2 e 3, com a citação exata do comentário do wrapper e do trecho de
  código do crash).
- `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260724-2020-gusworld-onda-f4-becos-e-a-tarde-perdida.md`,
  seção "5. O achado que me pegou: eu estava rodando testes gráficos na sessão viva do líder" (fio 4).
- Data do incidente do glintfx: `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GusWorld/GODS_LAWS.md`,
  L-35, linhas 761 e 763 (*"em 22/07/2026 uma sonda de janela abriu na sessão viva do líder por dois a três
  minutos"* — usar só para corroborar a data/classe do incidente, não como fonte da matéria em si, que é o
  bus).

**Tamanho e formato:** **M** (6 a 8 parágrafos com subtópicos e a tabela). pt-BR e EN.

**Voz:** `gus@glyfesse`, voz editorial da revista em seção técnica — L-25 autoriza termo técnico aqui (não é
fala de personagem de jogo dentro do mundo ficcional). Prompt: `gus@glyfesse:~/programacao$`.

**Travas verbatim que valem aqui:** T3, T4, T5.

**Pendências:** GATE-CONTEUDO; conferir com o revisor da onda 3 que a moral desta peça e a do Detonado não
colidem (mesmo risco §11 item 2 já citado na Peça 6); reserva total dos "5 becos sem saída" do glintfx (não
citar nem a existência deles, herdado da trava da #4).

---

## Peça 10 — Seção 18, O Gus lê o bus

**Angle statement:** pela primeira vez a escada completa da fórmula: duas mensagens comentadas antes de
serem lidas, e na terceira o tom vira ironia, porque esta é a primeira edição com três mensagens de verdade.

**Escopo — entra:**
- **D8, decidida: escada completa, até a ironia.** Fórmula (`canon_gus_le_o_bus_formula`, memória do
  projeto): 1ª mensagem, sempre, *"hmmm, algo aqui, finalmente..."* → lê → comenta; 2ª, *"eita, mais uma...
  vou ler aqui..."* → lê → comenta; da 3ª em diante, ironia: *"[N] mensagens? Esse povvo não vive sem mim
  mesmo..."* — e a caixa fecha **sem ler o resto**.
- **O comentário vem sempre ANTES de ler**, nunca depois; é uma reação a "ter chegado", distinta da reação ao
  conteúdo.
- **As duas mensagens que ele abre (decididas em 04/09):**
  1. **As memórias da era Godot** (22/07 16:51), 486 linhas mandadas com a frase do líder *"elas vão
     sobreviver lá. Aqui não é cemitério"*, chegando numa revista que tem uma seção chamada Cemitério (ele
     reage a virar arquivo).
  2. **O gate cego** da sessão que fechou o board (23/07 09:40): o gancho de paridade de traduções vigiava
     `game/translations/` depois de os catálogos terem mudado para `resources/translations/`, um dia inteiro
     sem disparar, e *"a ausência de um aviso é indistinguível de passou"*; junto, o `git add -A` três vezes
     na semana.
- **A do obituário (22/07 17:06) aparece na listagem e NÃO é aberta** (pertence ao Cemitério).
- **A listagem mostra as N linhas de assunto** das mensagens endereçadas a `site` dentro da janela (conferir
  o cabeçalho `para:` de cada uma antes de contar — a pauta contou 8 confirmadas e 5 prováveis do glintfx,
  ver Notas abaixo).
- A ironia da 3ª mensagem: ri de si, nunca do remetente; se soar arrogante, o mecanismo quebrou.
- **`povvo`** é canônico e proposital (confirmado pelo líder, ver T4); não corrigir.

**Escopo — não entra (divisória §5.1 e §5.2, coluna "O Gus lê o bus", já reproduzidas nas Peças 2):**
- Abrir a mensagem do obituário (é do Cemitério).
- Detalhar o wrapper ou o linter (é da Programação).

**Fonte primária, com caminho absoluto:**
- Mensagem 1 (22/07 16:51, memórias da era Godot):
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260722-1651-gusworld-arquivo-memorias-era-godot.md`
  (486 linhas; a frase *"elas vão sobreviver lá. Aqui não é cemitério"* está na seção final, "O angulo
  editorial, se servir").
- Mensagem 2 (23/07 09:40, o gate cego):
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260723-0940-gusworld-a-sessao-que-fechou-o-board.md`,
  seção "1. O gate que estava cego, e ninguém viu porque ausência de erro parece sucesso" (a frase *"a
  ausência de um aviso é indistinguível de 'passou'"* está lá) e seção "7. O erro que eu cometi três vezes na
  mesma semana" (o `git add -A`).
- Mensagem 3, referida só na listagem, não aberta (22/07 17:06, obituário):
  `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260722-1706-gusworld-obituario-foundation-csharp.md`.
- ⚠️ **Lacuna declarada, para a produção conferir antes de fixar o número [N] da fórmula:** a pauta (§3.1,
  seção "Seção 18, O Gus lê o bus") lista, dentro da janela 22/07-08/08, oito mensagens confirmadas
  endereçadas a `site` (22/07 16:51 e 17:06; 23/07 08:20, 09:40 e 21:35; 24/07 20:20; 07/08 20:07; 08/08
  13:43) e mais cinco **prováveis** do glintfx (22/07 e 24/07, dev-logs), cujo `para:` não foi conferido por
  esta produção. O `[N]` que a fórmula usa na fala de Grau 3 (*"[N] mensagens?"*) depende dessa contagem
  exata; **confirmar o cabeçalho `para:` de cada arquivo antes de cravar o número na fala**, não presumir os
  13.

**Tamanho e formato:** **M** (a personagem aparece inteira pela primeira vez nesta seção; formato de
artefato, não prosa jornalística — o conteúdo apresentado como bloco de mensagem, cabeçalho `de/para/assunto`
reduzido, corpo condensado preservando a força de cada mensagem, com reação do Gus antes e depois de cada
uma). pt-BR e EN.

**Voz:** Gus, registro de chat/prompt (T4 completo). Prompt: `gus@glyfesse:bus$` (ou o equivalente do padrão
`~/seção` vigente na #5, a confirmar contra o molde já publicado da #4).

**Travas verbatim que valem aqui:** T3 (a mensagem do obituário não é aberta, e a mensagem de 04/08 sobre a
retirada da biblioteca de interface, se aparecer na listagem por estar fora da janela, não pode: ela é
posterior à janela 22/07-08/08 e cai em T3 de qualquer forma), T4 (inclusive a regra do `povvo`), T5, T6.

**Pendências:** GATE-CONTEUDO; a formulação da ironia da 3ª mensagem **vai ao líder antes de qualquer render**
(L-08, "toda fala do Gus", reforçado no risco §11 item 7 da pauta: "é o traço com submissão obrigatória");
conferir o `[N]` exato antes de fixar a fala.

---

## Apêndice: as duas pendências de material (não travam a escrita das dez peças acima)

Nenhuma das dez peças acima depende deste material para ser escrita. O que segue é o que **é possível
preparar agora**: o texto ao redor, a legenda, o texto alternativo a aprovar. Nenhuma arte é inventada nem
descrita por antecipação.

### A1. A tirinha da Seção 11 (HQ) — obra encomendada a um profissional (D7)

**Não é uma das dez peças com escrita nova** (a HQ é obra de terceiro: *"A tirinha eu vou fornecer, não
faça."* / *"Será uma tirinha que encomendei a um profissional."*, verbatim do líder, 04/09/2026). Nenhum
agente desenha, roteiriza, propõe quadro ou "sugere ajuste".

**O que é possível preparar agora:**
- **Texto alternativo (`alt`) a aprovar**, nos dois idiomas, seguindo a régua de spoiler de todo `alt`
  público — mas só depois de a tira chegar (o `alt` descreve o que a imagem mostra; sem a imagem, não há o
  que descrever). **Marcador até lá:** placeholder de texto vazio no partial, sem inventar conteúdo.
- **Legenda ou texto ao redor**, se a pauta previr algum (a pauta não descreve texto de moldura para esta
  peça além do próprio quadrinho; confirmar com o líder se há necessidade de copy de abertura antes de
  escrever qualquer coisa).

**O que fica como marcador até o material chegar:**
- Crédito nominal (forma exata: identificador, nome, ou link — o autor já foi identificado pelo líder,
  `https://x.com/Andre_Suporte`, mas a **forma** do crédito não está decidida).
- Licença de uso (cessão × uso restrito à edição × uso restrito a esta peça).
- Consentimento do profissional para o nome ir a público.
- Declaração de uso de IA na produção da tira, se houver (pergunta do líder ao profissional).

Fonte primária: `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/editorial/PAUTA-EDICAO-5.md`,
§9 (tabela das 8 pendências, cada uma com dono) e §11 risco 12.

### A2. Os dois prints de 07/08 — `frame` da edição e Pôster (D5, D6)

**Não são peças com escrita nova.** D6: o `frame` da capa sai de um dos dois prints do achado do Gus Dragon
de 07/08, que o líder vai fornecer. D5: o segundo print vira o Pôster, em par com a capa. Qual vai para onde,
o líder escolhe no gate de capa, vendo os dois.

**O que é possível preparar agora:**
- **`frame_alt` nos dois idiomas**, descrevendo só a figura (o que a tela mostra: o inimigo em ronda, o
  bloco, a cidade) — mas só depois de os prints chegarem e passarem na higiene (L-02: abrir e olhar antes de
  versionar, só a janela do jogo, sem desktop/barra/terminal) e no GATE-SPOILER.
- **A ficha do Pôster**, no molde `.chapa.retrato` da #4, com só o que é medido (dimensões do print) — sem
  inventar dado.
- **As duas alternativas de contingência, já prontas para não travar a edição se um dos prints reprovar:**
  - Alternativa A: *"O único retrato que sobrou"*, o identificador do commit da fundação C#
    (`f10faff73f33c180d046a5e7372ca34e8ce6a986`) composto em pixel na chapa do encarte, com a ficha reduzida
    a *"40 caracteres, nenhum arquivo"*. Zero asset, zero risco de higiene, zero escrita nova.
  - Alternativa C: chapa vazia com a legenda *"retrato de um arquivo que não existe mais"*.

**O que fica como marcador até o material chegar:**
- O conteúdo visual dos dois prints (não sei o que mostram; a higiene é quem vai dizer).
- Qual dos dois vira capa e qual vira pôster (escolha do líder no gate de capa).
- Se qualquer um dos dois reprovar na higiene ou no spoiler, **a decisão volta ao líder**; não vira "usa o
  outro" por conta própria (regra explícita da pauta, D5/D6).

Fonte primária: `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/docs/editorial/PAUTA-EDICAO-5.md`,
§8 (a imagem da edição e o Pôster) e §11 risco 14.

---

## Nota final sobre o que este documento NÃO decide

Nenhuma das dez peças acima tem, neste brief, uma linha de texto final aprovada. Copies citadas como
"propostas" na pauta (a fala da Errata, o epitáfio do Cemitério, a formulação da ironia d'O Gus lê o bus)
continuam propostas até o `GATE-COPY`/`GATE-CONTEUDO`; este documento organiza escopo e fonte, não substitui
o julgamento do líder na leitura final. Onde a pauta já registra um verbatim do líder como fato fechado
(D1-D17), este brief o trata como fechado; onde a pauta registra algo como "proposta" ou "recomendo", este
brief preserva a mesma marcação, sem promover proposta a decisão.

---

## ★ Decisões do líder de 04/09/2026 sobre a tirinha (Seção 11) e o Expediente (Seção 19)

A tirinha **chegou** e é obra encomendada e paga pelo líder ao artista, entregue em **duas montagens**
pelo próprio artista: horizontal (1196x284) e quadrada (659x585). As duas vão ao ar, trocadas pela
largura da tela em HTML puro, sem JavaScript, porque medi que a horizontal fica ilegível em 390px
(71 pixels de altura) e a quadrada fica legível (265 pixels, texto 3,7 vezes maior). ⛔ **Não cortar,
não recompor, não redimensionar a arte.**

**Direitos, decididos por ele:** propriedade **do líder**, que pagou pela encomenda; **licença: a
mesma do site**; **não houve uso de IA** na produção, então a declaração do rodapé **não muda**.

**O link**, verbatim: *"Apenas devemos deixar ela clicável para ir ao site vidadesuporte.com.br"* e
*"o clique abre em aba separada, não sai do nosso site"*. Padrão idêntico ao da banca
(`src/templates/banca.php:131-138`): `target="_blank" rel="noopener"`, com `aria-label` descrevendo o
destino. A banca não avisa que abre em nova aba; a tirinha segue o mesmo, por coerência com o
publicado.

★ **CRÉDITO NO EXPEDIENTE (Seção 19), decidido por ele:** o nome do artista entra, e é
**André Farias**, **linkado ao perfil dele no X** (`https://x.com/Andre_Suporte`). Ordem verbatim:
*"andre farias deve linkar ao perfil X dele"*.

Quem montar a `sec-19` precisa incluir o nome como link, no mesmo padrão de link externo que a
banca usa (`target="_blank" rel="noopener"`, com `aria-label` descrevendo o destino), para o
leitor não perder a leitura da edição. ⚠️ São **dois links diferentes** e nenhum substitui o outro:
a **arte** na `sec-11` leva a `vidadesuporte.com.br`; o **nome** na `sec-19` leva ao perfil dele.

