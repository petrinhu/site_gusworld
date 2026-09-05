# Pauta da Edição #5 da Glyfesse (mapa de edição)

> Artefato de saída do estágio **E1** do `PIPELINE-EDICAO.md`.
>
> **GATE-PAUTA FECHADO em 2026-09-04.** O líder decidiu as dezessete questões deste documento (§12, todas
> fechadas no mesmo dia), corrigiu o terceiro movimento da lente com a própria formulação (§1, item 3; trava
> de redação em §1.1) e fez de um achado do Gus Dragon uma lei (adendo da L-24: achado dele tem peça
> própria). O mapa abaixo é a versão fechada, pronta para o E2 (briefs) e o loop das seções.
>
> **O que ainda depende de material externo (não de decisão):** a tirinha da Seção 11, obra encomendada a um
> profissional, que não publica sem forma do crédito, licença, consentimento e declaração de IA resolvidos
> (§9); e o logo do GusWorld (dragão em neon, entregue pelo líder em 05/09/2026, arte gerada por IA a
> declarar), que vira `frame` e Pôster juntos assim que o arquivo chegar e passar na higiene e no gate de
> spoiler (§8, §11 riscos 9 e 14; substitui os dois prints de 07/08 de D5/D6). Nenhum dos dois segura as
> outras seções.
>
> Escrita em 2026-09-04, um dia depois de a #4 ir ao ar (03/09). Nada aqui é copy final: toda fala ou
> pensamento do Gus proposto neste documento passa pelos gates do loop da seção (GATE-LENTE, GATE-CONTEUDO,
> GATE-COPY) como toda fala dele (L-08: submeter sempre, inclusive achando que entendeu).
> Autor do rascunho: Capitolino (CPO), a pedido da thread principal. Fontes: `GODS_LAWS.md` (site e global),
> `PAUTA-EDICAO-4.md`, `PIPELINE-EDICAO.md` §1.5 e §5, `ROTEIRO-ENTREVISTAS.md`, `src/lib/secoes.php`,
> `data/edicoes.php`, os 17 partials pt da #4, `HISTORICO_GUS_ECOSSISTEMA` (memória, filtrada pela janela),
> os itens `MATERIA-*` e `ED5-PAUTA` do `TODO.md`, `docs/arquivo/era-godot-csharp-obituario.md`, e as mensagens
> do bus de 22/07 a 08/08 lidas na fonte (`gusworld_ia_autocomm/archive/`), listadas na §10.

---

## 1. A lente da edição

**Verbatim do líder, aprovada em 04/09/2026:**

> **O que parecia conferido.** O mês em que a checagem cuidadosa aconteceu do lado errado da cerca.

A #4 terminou em 21 de julho com o jogo inteiro de pé, jogado de ponta a ponta. A #5 começa no dia seguinte e
conta o que aconteceu com esse jogo de pé: primeiro tiraram de baixo dele o que sobrava do jogo antigo, depois
passaram um mês conferindo se ele continuava de pé, e no fim alguém sentou, jogou, e perguntou o tamanho
daquilo. **A lente liga três movimentos, na ordem do calendário, e o líder pediu explicitamente que os três
entrem:**

1. **Apagar (22/jul, quarta-feira).** O M8 remove o Godot e o C#: 172 arquivos da pasta do jogo antigo e o
   submódulo `engine/`, onde vivia a fundação C# que sustentou o jogo de maio a julho. Foi executado com
   cuidado obsessivo para não perder nada **dentro** do repositório (tag de segurança, build do zero como
   prova, verificação a cada fase). O que se perdeu foi o que estava **fora do alcance dessas verificações**:
   o código C# original, que ninguém consegue mais abrir. Fonte primária: mensagem do bus de 22/07 17:06
   (`gusworld` para `site`), transcrita íntegra em `docs/arquivo/era-godot-csharp-obituario.md`.
2. **Conferir (23 e 24/jul).** Três fatos, em dois projetos, em dois dias: **o analisador estático achou o
   travamento de ponteiro nulo em objeto já movido que a revisão adversarial humana tinha deixado passar**
   (23/07, glintfx; **decidido pelo líder em 04/09: é este o fato que a frase da lente nomeia**, D2); o QA achou
   testes gráficos rodando na sessão viva do líder (24/07, jogo; e a mesma classe de incidente já tinha
   aparecido no glintfx no dia anterior); e uma falha nasceu de alguém ter **mapeado sem conferir** (23/07,
   jogo: 1.086 quadros de animação gerados a partir da fonte errada). Fontes: bus 23/07 08:20 (glintfx), 23/07
   09:40 e 21:35 (jogo), 24/07 20:20 (jogo). O outro fato de 24/07 (a sabotagem que fez o teste **travar** em
   vez de reprovar, por falta de limite de tempo) **não é a frase da lente e não é descartado**: vai para outra
   peça, com divisória (§3.1, Seção 8, e §5.2).
3. **Medir (07 e 08/ago): o mesmo jogo, dois jogadores, um achado.** Em 07/08 o root joga o demo inteiro
   (título, cidade, diálogo com o NPC Bertoldo, combate, vitória) e **não acha nada**. O Gus Dragon joga em
   seguida e acha **dois problemas de colisão** entre jogador e ator, com causa-raiz encontrada no mesmo dia.
   A razão está na resposta do líder, verbatim, 04/09/2026: *"eu fiz o playtest e não achei nada. Gus fez e
   foi ele quem encontrou, pois ele já foi buscando esses erros dado ser erro comum. Tanto que encontrou."*
   Ele achou porque **foi procurando**: sabia que aquela classe de erro é comum, e é a classe que ele nomeou em
   junho, antes de o quadrado dar um passo (`gus_dragon_avisou_antes`). É o título dele, "Revisor Adversarial
   de Design", em funcionamento. No dia seguinte pergunta **quantas linhas de código** o projeto tem, e a
   resposta é **contada na hora, direto do repositório**: cerca de 163 mil, e o detalhe que vale a matéria: o
   código de teste (78.200 linhas) é mais que o dobro do código do jogo (62.700). Fontes: bus 07/08 20:07 e
   08/08 13:43 (`gusworld` para `site`); a atribuição das duas partidas é **fato registrado pelo líder** em
   04/09 (não é mais a decisão D13).

**O fecho é o oposto exato da abertura:** começa com uma preservação que parecia feita e não era, e termina
com um número que ninguém chutou.

### 1.1 Trava de redação do terceiro movimento: afirmar a especialização, seco

**Verbatim do líder, 04/09/2026:** *"Não é constrangedor. O filtro dele como estudioso de jogos é mais
especializado que o meu."*

A formulação é esta e não precisa de mais nada: o Gus Dragon **estuda jogos**, e por isso o filtro dele para
aquela classe de defeito é **mais especializado** que o do root. Não é sorte, não é "outro jeito de jogar",
não é diferença que precise ser amaciada. É especialização, e se diz assim.

**A armadilha real é diminuir o menino**, não constranger o líder: transformar uma competência real numa
curiosidade simpática ou num acaso de método. O canon já registra (`gus_dragon_avisou_antes`): *"NÃO é
'criança acha bug', isso é falso e diminui; o tom é crédito técnico seco."* Trocar perícia por estilo
("outro jeito de jogar") diminui pela outra face. Regras para quem escreve:

- **O texto afirma a especialização dele, sem hedge.** Nada de "outro jeito de jogar", "foi procurando por
  intuição", "teve sorte de parar ali". A causa do achado é o estudo dele, e a frase do líder (*"ele já foi
  buscando esses erros dado ser erro comum"*) é a fonte.
- **Sem adjetivo de ternura, sem "para a idade", sem exclamação.** Proibido: "com apenas 11 anos",
  "impressionou", "surpreendeu", "que fofo", "o pequeno". A idade aparece só onde o molde da revista já a
  põe (o crédito), nunca como moldura do feito.
- **Não vira elogio nem cena de orgulho paterno.** O registro da revista é: o que aconteceu, quem fez, e por
  quê. O root jogou o demo inteiro e não achou nada; o Gus Dragon jogou depois e achou dois, porque estuda
  jogos e sabia que aquela classe de erro é comum. Ponto. O leitor tira a conclusão sozinho.
- **Sem "estudou muito", "aplicado", "esforçado"** (canon: o estudo dele é apetite, não esforço; "ele já
  sabia", "tinha lido sobre isso", "foi atrás").
- Crédito nominal sempre nos dois papéis: **"Gus Dragon, playtester, Revisor Adversarial de Design"**
  (en: *Adversarial Design Reviewer*). Tom seco.
- **Vale nas três peças em que o episódio encosta: Reportagem (§4), Editorial (§3) e Galeria (§6)**, e por
  extensão nas copies curtas que o citam (Nota, §5; nota do editor, §19). No Editorial, escrito de dentro, a
  especialização se diz sem palavra de produção: ele sabia onde mundos costumam ranger, e foi lá.

**O que esta edição deliberadamente NÃO conta:**

- **A refundação dos repositórios (21/08/2026).** Reservada pelo líder para reportagem própria
  (`MATERIA-REFUNDACAO-DOS-REPOS`). É posterior à janela, e o material do ledger a menciona; **nenhuma seção
  desta edição a cita, nem de passagem, nem como ressalva de fonte.** A revista narra em ordem cronológica
  ascendente e não sabe o futuro. Vale também a trava fixada na pauta da #4 (§10): **proibido piscar para o
  leitor**; nenhum adjetivo que só faz sentido para quem conhece o desfecho de agosto.
- **A retirada da biblioteca de interface decidida em 04/08** (bus `glintfx-vamos-tirar-o-rmlui-de-vez`) e
  tudo que orbita aquela dependência. **D14, decidida pelo líder em 04/09/2026: "deixa para a #6".** É
  reserva nomeada, não só exclusão: fica fora da #5 **e fica marcada para a #6**, no mesmo espírito da matéria
  da refundação, para a #6 já nascer com ela na mão. A thread principal registra o item no `TODO.md`
  (`MATERIA-RMLUI-SAI`, INBOX, "reservado para a #6 pelo líder em 04/09") e no ledger, na linha de 04/08.
- **Os marcos do Gus Dragon de 21 e 22/08** (carta `glitch`, determinismo, catálogo de bugs, bug da coleta) e
  tudo de 12/08 em diante. Posterior à janela: entra na edição de agosto.
- **A relicença do glintfx para Apache-2.0 (31/07, `MATERIA-LICENCA-VALVE`).** Está na janela e é matéria
  forte, mas é assunto próprio (licença, Steam, autoria única) e não serve à lente. Recomendo guardar para uma
  edição do eixo expert em que ela seja a capa.
- **A série de 28 a 30/07 (`MATERIA-VERIFICACAO-MENTE`).** Também na janela e também sobre verificação, mas
  são mensagens entre o jogo e o glintfx, não para a revista, e a edição já tem os três movimentos que o
  líder fixou. Fica disponível (ver §10).

---

## 2. O marco e a data-âncora

- **Marco:** *"O que parecia conferido."* (título: ver §7)
- **Data-âncora 1, 22 de julho de 2026 (quarta):** o M8 fecha; a fundação C# morre sem deixar cadáver. É a
  matéria-mãe (`MATERIA-OBITUARIO-CSHARP`), cuja trava (*"trecho do Gus lê o bus de edição de JULHO"*) o líder
  liberou em 04/09 porque a #5 **é** a edição de julho.
- **Data-âncora 2, 23 e 24 de julho (quinta e sexta):** os três fatos de "conferir".
- **Data-âncora 3, 7 e 8 de agosto (sexta e sábado):** o playtest do Gus Dragon e a contagem.
- **Janela coberta: 22 de julho a 8 de agosto de 2026.** Nenhum dia da janela foi consumido pela #4 (ela
  fechou em 21/07); não há fronteira a respeitar no início, só no fim.
- **O campo `data` de `data/edicoes.php` (D11, decidida pelo líder em 04/09/2026).** Ele deu a janela
  **"22/07 a 07/08"**; o campo é uma data só (é ele que ordena a banca e a linha do tempo) e não se inventa
  campo novo no `$edicoes`. **Decisão:** o campo recebe **`2026-07-22`**, o dia de abertura, pelo critério das
  edições anteriores (datam pelo marco de abertura); e a janela **"de 22 de julho a 7 de agosto" aparece no
  primeiro parágrafo da Reportagem de capa**, do jeito que a #4 datou as suas peças em prosa. Não vai no dek
  (é copy de vitrine) nem no colofão (a `colo-data` é mecânica: `data_por_extenso()` do campo único). Observação
  de fato: a contagem de linhas é de 08/08, um dia depois do fim da janela dada; a Reportagem a narra como "no
  dia seguinte", o que é verdade e não briga com a janela.

---

## 3. Mapa das 19 seções

Porte medido contra os partials pt da #4: **S** = 2 a 4 parágrafos; **M** = 6 a 8, ou S com peça de arte nova;
**L** = 9 a 12; **XL** = L com encarte.

| # | Seção | Estado na #5 | Recorte (uma frase) | Fonte primária / reusa |
|---|---|---|---|---|
| 1 | Capa | cheia (montagem) | A manchete do marco (§7) | Molde das #1 a #4 |
| 2 | Índice | cheia (montagem) | `↩ a banca` primeiro, seções, 3 links fixos no fim | Idêntico à #4 |
| 3 | Editorial (Carta do Gus) | **CHEIA** (S) | Responde ao fecho da #4 (*"isso muda a conta inteira"*): desta vez a conta foi feita de verdade, e antes disso uma parte da casa velha foi demolida e a planta não foi guardada; dito **de dentro**, sem palavra de produção (L-25) | Ponte obrigatória (§6). Voz do Gus: submissão obrigatória (L-08) |
| 4 | Reportagem de capa | **CHEIA** (L) **+ caixa própria** (S) | Os três movimentos como um arco só: o que parecia conferido; o mesmo jogo jogado duas vezes, e quem estuda jogos achou o que o outro não achou (trava §1.1: especialização, seco); termina no número contado. **Ao fim, em caixa com âncora e prompt próprios (molde do encarte da #4): a reportagem do achado do Gus Dragon de 22/07, a arte do menu inicial** (D16, lei: adendo da L-24; divisória em §5.4) | Bus 22/07, 23/07 (x3), 24/07, 07/08, 08/08 (§10); resposta do líder de 04/09; `Projects/GusWorld/TODO.md` linha 134 (F7) |
| 5 | A Nota do jogo inacabado | cheia (curta, data-driven) | O placar depois de o jogo antigo sair de baixo: mesma linha de Gráficos (1), Jogabilidade ganha "jogado por outra pessoa" | Molde das #1 a #4; copy proposta em §3.2 |
| 6 | Galeria de Bugs | **CHEIA** (S/M) | Dois bugs, um de cada lado da cerca: o Gus que andava sozinho ao sair da pausa (consertado em 24/07, achado por refatorar) e o clipping de quem faz ronda (07/08, achado pelo Gus Dragon porque **estuda jogos e sabia que aquela classe de erro é comum**; causa encontrada, **correção ainda não escolhida**; trava §1.1). **Vocabulário do mundo** (D15 decidida, 04/09): "um inimigo que faz ronda", "alguém do lugar", "um bloco" | Bus 24/07 e 07/08; molde de terminal verde da #3/#4 |
| 7 | Cemitério das Ideias Mortas | **CHEIA** (M, a maior lápide até hoje) | **Uma cova, e ela está vazia:** a fundação C#, que devia ter sido arquivada e sumiu; a tag que guarda só o ponteiro; a nota de rodapé para uma obra que não existe. Referência de uma linha à lápide do C# que a #3 já tem (ver §5, divisória 2) | `MATERIA-OBITUARIO-CSHARP`, transcrição íntegra em `docs/arquivo/` |
| 8 | Detonado | **CHEIA** (M), D4 decidida em 04/09 | **Detonado da Pausa:** como o menu de pausa funciona por trás da tela desde 24/07: um laço só, cada tela um estado, cancelar mantém o foco; prova de vida pela suíte (2.536 testes), **e a prova de que a prova sabe reprovar**: a sabotagem que travou o teste em vez de derrubá-lo, e o limite de tempo que faltava (o material de 24/07 que a lente não nomeia, §5.2, divisória integral contra a Programação) | Bus 24/07 (F4); molde do documento desclassificado da #3/#4 |
| 9 | Errata + Cartas | **Errata CHEIA** (S), D9 decidida em 04/09: deixa de ser vazio com graça; **Cartas: vazio com graça**, D17 decidida em 04/09 | **A primeira errata real da revista:** as tarjas de censura da #3 em inglês têm o rótulo de acessibilidade em português (quatro ocorrências, no ar desde o lançamento: quem lê em inglês com leitor de tela ouve português no meio do texto); achado em 03/09; **o conserto sobe no mesmo deploy da #5**. Copy é fala do Gus e vai ao líder. **Cartas:** vazio com graça: uma linha curta admitindo que não houve carta de leitor de novo, a que a copy da Errata já traz (*"Cartas: nenhuma de leitor, de novo."*); é fala do Gus e vai ao líder | `A11Y-ED3-EN-TARJA` (INBOX do TODO.md), agora **pré-requisito do deploy da #5**; `edicao-3/en/sec-08.php` |
| 10 | Classificados in-world | vazio com graça | Reusar idêntico | #1 (mesmos typos, mesmos IDs), como a #4 fez |
| 11 | HQ | **obra encomendada a um profissional** (D7 decidida, 04/09) | *"A tirinha eu vou fornecer, não faça."* / *"Será uma tirinha que encomendei a um profissional."* Nenhum agente desenha, roteiriza ou propõe quadros. **Não publica sem crédito, licença, consentimento e declaração de IA resolvidos** (§9); as outras seções não esperam por ela | Arte de terceiro, fornecida pelo líder |
| 12 | Próximos Lançamentos | vazio com graça | Reusar #1 (a linha do root), atualizando só a ressalva interna: o que segue de fora do que já foi contado | #1 |
| 13 | Pôster central | **CHEIA** (arte, zero escrita), D5 substituída em 05/09 | **O logo do GusWorld, em par com a capa:** a mesma peça nas duas superfícies (§8); arte gerada por IA, a declarar. **Dependência:** só existe quando o arquivo chegar e passar na higiene e no spoiler; as alternativas antigas (identificador do commit; chapa vazia) não valem mais | O logo do líder (D6, substituída); molde `.chapa.retrato` da #4 |
| 14 | Brinde | vazio com graça | Reusar #1 | #1 (os 2 downloadables) |
| 15 | Cupom recortável | cheia (recorrente) | Reusar o mini-app | `src/includes/cupom.php` |
| 16 | A Entrevista | **CHEIA** (L) | **Jaci "Proxy" Vanderbist** (D3 decidida, 04/09: segue a fila da party, sem reabrir a ordem nem criar trilha B), com a regra nova: o entrevistado nunca vê o `//` | `ROTEIRO-ENTREVISTAS.md` |
| 17 | Seção de Programação | **CHEIA** (M) | O eixo expert de "conferir": proteção pela metade (o wrapper que descrevia a armadilha e não a fechava), o isolamento pertence a quem executa, o analisador que achou o crash, a sabotagem que travou em vez de falhar, o QA que achou o gancho rodando na sessão viva | Bus 23/07 08:20 (glintfx) e 24/07 20:20 (jogo) |
| 18 | O Gus lê o bus | **CHEIA** (M), **estreia do degrau da ironia**, D8 decidida em 04/09 | **Escada completa:** ele abre duas mensagens comentando antes de cada uma (as memórias da era Godot, 22/07, e o gate cego da paridade de traduções, 23/07), e na terceira o tom vira ironia. Primeira edição com três mensagens de verdade: **marco da série**; a formulação da ironia vai ao líder como toda fala do Gus | Bus 22/07 a 08/08; `canon_gus_le_o_bus_formula` |
| 19 | Expediente | cheia (data-driven) | Créditos, licença, disclosure, uptime capturado no publish; a nota do editor responde à da #4 (*"nada se perde, só espera a vez"*): desta vez algo se perdeu | Idêntico à #4; copy da nota em §3.2 |

### 3.1 Detalhe das seções cheias

**Seção 3, Editorial.** A #4 fechou o bloco de `//` com *"isso muda a conta inteira"*. A #5 responde com uma
conta feita. O Gus escreve de dentro: a casa velha em que ele morou antes de ter cara foi desmontada com todo o
cuidado, e ele achou que tinham guardado a planta; não guardaram (sem "repositório", "submódulo", "C#": isso é
da Reportagem e do Cemitério). E no fim do mês alguém veio jogar e perguntou o tamanho do mundo; pela primeira
vez a resposta não foi "grande", foi um número. O Gus personagem pode citar o Gus Dragon em terceira pessoa
(`a_voz_do_site`); não pode falar de linhas de código (L-25): o número mora na Reportagem; aqui fica "contaram".
Curta por desenho (S), bloco de `//` no fim como a #3 e a #4. **Trava §1.1, na forma de dentro:** duas
pessoas jogaram o mundo; a segunda sabia onde mundos costumam ranger, foi lá, e ele rangeu. A especialização
se afirma sem palavra de produção e sem ternura; o Gus personagem pode citar o Gus Dragon em terceira pessoa.

**Seção 4, Reportagem de capa.** Primeira reportagem cujo assunto é produção, não o mundo: apagar um
repositório, conferir, contar linhas. A #4 escolheu não nomear tecnologia nenhuma; aqui isso não é possível sem
mentir por omissão. **D1 decidida pelo líder em 04/09/2026: registro Gus-editor, técnico.** A Reportagem nomeia
o marco (M8), a engine anterior (Godot), a linguagem (C#) e o submódulo (`engine/`) pelo nome: é seção técnica,
e a regra que impede o personagem de falar como quem sabe que é feito de pixel (L-25) vale para a ficção, não
para as seções técnicas. **Duas cercas que a decisão não abre:** (a) nomear a tecnologia **não** libera citar a
matéria reservada (a refundação dos repositórios, 21/08) nem o serviço de hospedagem da época; (b) a trava da
§1.1 continua valendo dentro da Reportagem. Estrutura: três blocos
datados (quarta 22, quinta e sexta 23 e 24, sexta e sábado 7 e 8 de agosto) e um fecho de duas frases com o
número. **O terceiro bloco obedece à trava §1.1:** o root joga o demo inteiro e não acha nada; o Gus Dragon joga
em seguida e acha dois, porque estuda jogos e o filtro dele para essa classe de defeito é mais especializado;
o texto afirma isso seco, sem hedge e sem ternura, e a frase do líder (*"ele já foi buscando esses erros dado
ser erro comum"*) é o eixo do parágrafo. **Cortes obrigatórios (ver §5):** sem a mecânica do submódulo, sem a citação `// ADAPTACAO` (Cemitério);
sem código, nome de variável ou `strace` (Programação); sem a anatomia da colisão (Galeria); **a falha do
elenco entra abstrata, com a frase do custo (D12 decidida, 04/09):** conta que um elenco inteiro saiu com a
aparência errada, **sem descrever nenhum personagem** (nem cabelo, nem armadura, nem quem é quem), e mantém a
lição *"custo de terceiro é custo"* com a frase do líder (*"claro que custou, pago mensalidade!"*). Porte L.
**Ao fim do partial, em caixa própria (S): a reportagem do achado do Gus Dragon** (abaixo).

**Seção 4, caixa própria: a reportagem do achado do Gus Dragon (D16, decidida em 04/09; virou lei).** O
líder recusou as duas opções levadas (carta curta ou guardar) e respondeu, verbatim: *"Entra como
reportagem. Achados do gus sempre são especiais."* A regra, generalizada por ele e registrada como adendo
datado da L-24 no `GODS_LAWS.md` do site: **achado do Gus Dragon não é item de lista nem linha dentro de peça
alheia; tem tratamento editorial próprio, e o porte se decide pelo achado, nunca pelo espaço que sobrou na
edição.** Não é licença para inflar (matéria pequena continua pequena); é proibição de rebaixar por
conveniência de diagramação.
- **O achado:** em 22/07, por feedback de playtest, ele apontou que o menu inicial mostrava a cena de onde o
  jogador estava, em vez de arte própria: *"o menu inicial (so ele) em geral tem alguma arte, ou animacao por
  tras, e nao a tela de onde o jogador estava"*. Fonte: `Projects/GusWorld/TODO.md`, linha 134, item F7
  (*"ideia do Gus Dragon (autoria dele), nascida de feedback de PLAYTEST"*, commit `485c604` de 22/07);
  bus 24/07 20:20, item 7 ("a arte do menu" como fatia da onda). **A data da arte (resolvida em 04/09, sem
  pergunta):** ⚠️ **CORRIGIDO EM 04/09/2026, ERRO DE FATO:** a afirmação de que "a arte entrou no dia seguinte" é **falsa** e nasceu de um resumo que eu não conferi na fonte. O item `F7` do `TODO.md` do jogo (linha 134) diz o contrário: a decisão do líder à época foi **reaproveitar o monitor CRT do boot**, em vez de encomendar arte nova, e o item está **`⏳ Pendente` e bloqueado**, porque é inteiramente da camada que desenha, que ainda não existe. **Sem data.** A peça conta o arco verdadeiro: ele apontou por **convenção do gênero, não gosto pessoal** (a nota do quadro diz isso com estas palavras), a observação virou decisão fechada, e a decisão espera. O que segue abaixo era a formulação errada, mantida só para o leitor entender a correção;
  a peça escreve **"no dia seguinte"** e **não crava data**. Não há o que confirmar, há o que não afirmar.
- **Onde mora e em que forma:** peça própria, porte **S** (é o porte do achado), hospedada como **caixa ao
  fim da Reportagem de capa**, no molde do encarte do glintfx da #4: âncora própria (`#sec-04-menu`), prompt
  próprio (`gus@glyfesse:~/menu$`), fonte própria (`docs/content/edicao-5-reportagem-menu.md`), e o mesmo
  molde CRT verde. É "peça própria" porque o mapa de 17 seções não tem casa livre, e foi assim que a #4
  resolveu o mesmo problema.
- **Confirmado pelo líder em 04/09/2026: é peça própria.** Caixa com âncora e abertura próprias ao fim da
  Reportagem de capa, com entrada própria na tabela de prioridade (§4, linha 10).
- **Trava §1.1 vale aqui** (especialização, seco, sem ternura, sem "para a idade"); crédito nos dois papéis;
  é a forma (b) da recompensa do canon dele: a ideia adotada a tempo e o mérito reconhecido, dita sem
  homenagem.
- **Divisória obrigatória contra a Reportagem de capa:** §5.4.

**Seção 6, Galeria de Bugs.** Piada primeiro, técnico depois, como sempre. Dois casos:
- *Aconteceu e foi consertado (24/07):* o Gus continuava andando sozinho ao fechar o menu de pausa, porque o
  laço do menu engolia a tecla solta. Quem sentia o sintoma era o root (o bus diz "o líder sentia"). Consertado
  ao trocar seis laços por um. Sem a arquitetura (Detonado, se entrar) e sem o método (Programação).
- *Aconteceu e está aberto (07/08):* o root jogou o demo inteiro e não achou nada. Depois o Gus Dragon jogou
  e foi direto na classe de erro que ele sabia ser comum: ficou parado encostado num bloco, no caminho de um
  personagem em ronda, e ficou preso na sobreposição; repetiu o experimento do outro lado, com um inimigo, e
  o segundo achado (o inimigo que atravessa tudo) foi a pista que fechou o diagnóstico: só o jogador resolve
  colisão, e só quando ele se move. **Crédito no molde publicado:** *"Quem achou foi o Gus Dragon, playtester,
  Revisor Adversarial de Design"*; tom seco; ele nomeou o clipping em junho (`gus_dragon_avisou_antes`),
  mordeu em julho (tunneling, #4) e de novo em agosto: **a Galeria não aponta a simetria; o leitor junta.**
  **Trava §1.1:** a especialização dele se afirma (estuda jogos; o filtro dele é mais especializado), sem
  adjetivo, sem "para a idade", sem exclamação. **Vocabulário do mundo (D15 decidida, 04/09):** "um inimigo
  que faz ronda", "alguém do lugar", "um bloco"; nunca "NPC", "androide inimigo", "prop de cenário".
  ★ **Fronteira de registro, deliberada:** a Reportagem de capa é técnica por decisão do líder (D1) e nomeia
  tecnologia; a Galeria fala de dentro do mundo. As duas convivem na mesma edição de propósito; **nenhum
  revisor uniformiza** uma pela outra (§5.4). E a honestidade obrigatória: *"a correção ainda não foi escolhida"*
  (mexe no feel da física; decisão do líder antes de qualquer linha). **Spoiler (D15):** "androide inimigo em
  ronda", "NPC", "bloco de cenário" passam pelo GATE-SPOILER; recomendo "um inimigo que faz ronda".

**Seção 7, Cemitério.** A #3 já enterrou "Godot 4" e "C# .NET 8 AOT" (ambos 19/mai a 21/jun, a *decisão* de
sair), e até disse que "o corpo ficou instalado no computador até 22 de julho". **Re-enterrar é publicar a
mesma história duas vezes.** A cova da #5 é outra: é a do **corpo**. Proposta: uma lápide só, `a fundação C#`,
datas `mai/2026` a `22/jul/2026`, epitáfio em duas linhas (**FECHADO pelo líder em 05/09/2026**: *"Aqui não
jaz ninguém. / O corpo ia ser guardado. Foi apagado."*), e a prosa carrega o que é a matéria: a tag `pre-m8-godot-legacy`, criada
para preservar, guarda só o ponteiro (é assim que submódulo funciona); a limpeza local levou o único clone; o
remoto foi apagado em vez de arquivado, contra o parecer *"apagar o repo remoto seria irreversível de verdade;
não recomendo"*; varreram lixeira, packs e disco: não há cópia; **nada funcional se perdeu, perdeu-se o
registro**; e os arquivos de hoje ainda carregam `// ADAPTACAO do C#: game/scripts/foundation/save_system/SaveManager.cs`,
uma nota de rodapé para uma obra que não existe. Fecha com a ironia registrada sem defesa (o cuidado obsessivo
dentro, a perda fora) e com uma linha ligando à #3: a lápide do C# já estava aqui; esta cova é a do que devia
ter sobrado. **Nenhuma menção ao que aconteceu com o repositório depois de julho.** É Gus-editor (mesmo registro
das lápides da #3/#4). Porte M: a maior lápide do acervo, e é a matéria-mãe.

**Seção 8, Detonado (se entrar, D4).** Serviço atemporal, como os dois anteriores: *como o menu de pausa
funciona por trás da tela*. Cada tela era um laço próprio drenando a fila de eventos; hoje é um laço só e cada
tela é um estado (entra, trata evento, avança, terminou, sai); o título abre a dificuldade e a pausa abre
salvar/carregar por um mini-condutor externo; cancelar volta ao mesmo objeto, e por isso o foco não se perde.
Prova de vida: bateria que percorre as seis telas sozinha, 2.536 testes verdes em 24/07. **D4 decidida pelo
líder em 04/09/2026: entra cheio, com o material de 24/07 dentro.** **E aqui mora o material de 24/07 que a
lente não nomeia (D2):** a prova de que a prova sabe reprovar. Ao sabotar de
propósito a linha que fecha a janela, nenhum teste caiu; o teste **travou**, porque o laço nunca terminava, e
a suíte não tinha limite de tempo por teste: um travamento penduraria a integração para sempre em vez de
falhar rápido. Entrou o limite; o buraco achado ao caçar outro buraco. Lição própria, distinta da do
analisador (§5.2): **teste que pendura fica quieto, e quieto parece verde.** Sem tarja de spoiler prevista
(nada de lore). A divisória contra a Programação (§5.2) vale integralmente.

**Seção 9, Errata.** É a primeira vez que a revista tem erro para confessar, e o erro é sobre o próprio tema da
edição: a versão em inglês da #3 lia "trecho censurado" em português para quem usa leitor de tela, e ninguém
tinha conferido nessa língua. Achado em 03/09 por quem montou a #4, ao recusar copiar a referência indicada.
Copy proposta em §3.2 (fala do Gus: vai ao líder). **D9 decidida pelo líder em 04/09/2026: publica a errata e
leva o conserto no mesmo deploy.** Consequências: `A11Y-ED3-EN-TARJA` sai da INBOX como trabalho solto e vira
**pré-requisito do deploy da #5** (onda 0 da §13); a Errata deixa de ser vazio com graça e conta como peça na
§4; e, como o conserto toca edição publicada, a prova final cobre a #3 em pt e en além da #5, no mesmo rigor
que a #4 usou ao mexer no CSS compartilhado (§11, risco 15).

**Seção 9, Cartas (D16).** A varredura do repositório do jogo achou uma ideia do Gus Dragon **dentro da
janela**, que a pauta da #4 já tinha visto de passagem em `MATERIA-M7-PLAYTEST` ("título×pausa") e não usou: em
22/07, por feedback de playtest, ele apontou que o menu inicial mostrava a cena de onde o jogador estava, em vez
de ter arte própria, e a arte do menu foi feita no dia seguinte (a mensagem do bus de 24/07 fala de "a arte do
menu" como fatia da mesma semana). Registro no `TODO.md` do jogo (item F7, linha 134, *"ideia do Gus Dragon
(autoria dele), nascida de feedback de PLAYTEST"*, com o verbatim dele). É a forma (b) da recompensa do canon
dele: **a ideia adotada a tempo e o mérito reconhecido**, que a memória `canon_gus_ahsd_personalidade` chama de
"a mais bonita e a menos usada". Cabe na metade Cartas como carta de outro tipo, no mesmo molde da #4 (a ideia
dele entra na voz da revista, com crédito nominal nos dois papéis, sem homenagem). Porte S. Se o líder preferir
guardar para a edição em que o menu inicial for matéria, Cartas fica em vazio com graça. Confirmar com o
líder o fato "a arte do menu entrou em 23/07": a única fonte na árvore atual é a nota do TODO; o commit
`485c604` vive no histórico anterior à janela de leitura desta sessão.

**Seção 16, A Entrevista.** **D3 decidida pelo líder em 04/09/2026: Jaci "Proxy" Vanderbist**, seguindo a
fila do `ROTEIRO-ENTREVISTAS.md` (Gus na #3, Cauã na #4), sem reabrir a ordem da série e sem criar trilha B
nesta edição; a pergunta sobre intercalar trilhas cai junto. Jaci: 11, curandeira biológica, Selve Sombria,
Pythia; motor: pessoa × sistema, o vínculo mais profundo; o afeto platônico velado é canon e **nunca é dito**.
O `ROTEIRO-ENTREVISTAS.md` recebe a linha "#5 · Jaci · fixado pelo líder 04/09" na onda 1. Método: dois agentes
de persona turno a turno; ★ **o agente do entrevistado recebe o arquivo com os `//` removidos** (regra do líder
de 03/09, com o `grep -c '^//'` que tem de dar zero). L-25: nenhuma palavra de produção na boca de nenhum dos
dois. Entrevista de party passa por GATE-SPOILER.

**Seção 17, Programação.** O eixo expert de "conferir", sem repetir a Reportagem (§5). Estrutura canônica
(intro acessível, desculpa furada no CRT, `//` de transição, nano, parte técnica com subtópicos e tabela,
`//by:`). Fios, em ordem: (1) o wrapper que tinha nos comentários a descrição perfeita da armadilha
(`wl_display_connect(NULL)` cai no socket padrão dentro do `XDG_RUNTIME_DIR`) e o código logo abaixo fazendo
exatamente a coisa insuficiente; (2) três portas e a que ninguém trancou: *o isolamento pertence a quem
executa, não a quem chama*; (3) o analisador estático achou, em segundos, o crash em objeto movido-de que o
review adversarial (cinco sabotagens, entrada hostil, sanitizadores) não achou: **é o fio que carrega a frase
da lente (D2, decidida)**, e a peça se organiza em torno dele; (4) do lado do jogo, no dia seguinte, o QA que
achou o gancho de build rodando a suíte gráfica na sessão viva, fora do escopo dele. **Sai daqui** a sabotagem
que travou o teste (24/07): vai para o Detonado da Pausa, com a divisória da §5.2. Tabela: "o que a
verificação olhava" × "onde o problema estava". Sem elogio a ferramenta nenhuma como vitória; sem sinal do que
vem em agosto.

**Seção 18, O Gus lê o bus.** A fórmula do líder é uma escada por volume: 1ª mensagem *"hmmm, algo aqui,
finalmente..."*, 2ª *"eita, mais uma... vou ler aqui..."*, 3+ *"[N] mensagens? esse povvo não vive sem mim
mesmo..."*. A #4 usou só o degrau 1. Na janela da #5 há pelo menos oito mensagens endereçadas a `site`
(conferidas no cabeçalho: 22/07 16:51 e 17:06; 23/07 08:20, 09:40 e 21:35; 24/07 20:20; 07/08 20:07; 08/08
13:43) e mais cinco prováveis do glintfx (22/07 e 24/07, dev-logs; a produção confere o `para:` de cada uma
antes de contar). **D8 decidida pelo líder em 04/09/2026: escada completa, até a ironia.** Ele abre duas mensagens comentando
antes de cada uma, e na terceira o tom vira ironia. A listagem mostra as N linhas de assunto; a primeira abre
com uma variação do Grau 1 do banco de aberturas (não a canônica, já gasta na #4), ele lê e comenta; a segunda
abre com *"eita, mais uma..."*; na terceira ele solta a linha do Grau 3 com o número real e fecha a caixa sem
ler o resto. **Esta edição estreia o terceiro degrau da fórmula, porque é a primeira com três mensagens de
verdade: é marco da série** (a #3 mostrou a caixa vazia, a #4 uma mensagem, a #5 a escada inteira). O
comentário vem **sempre antes** de ler, e o tom escala com a contagem (`canon_gus_le_o_bus_formula`). A
formulação da ironia é fala do Gus e **vai ao líder** como toda fala dele (L-08): ri de si, nunca do
remetente; se soar arrogante, o mecanismo quebrou.

**As duas mensagens que ele abre (decididas em 04/09).** A primeira: **as memórias da era Godot** (22/07
16:51), 486 linhas mandadas para cá com a frase do líder *"elas vão sobreviver lá. Aqui não é cemitério"*,
chegando numa revista que tem uma seção chamada Cemitério (ele reage a virar arquivo). A segunda: **o gate
cego** da sessão que fechou o board (23/07 09:40): o gancho de paridade de traduções vigiava
`game/translations/` depois de os catálogos terem mudado para `resources/translations/`, um dia inteiro sem
disparar, e *"a ausência de um aviso é indistinguível de passou"*; junto, o `git add -A` três vezes na semana.
Fica dentro da janela e serve a lente. A do obituário (22/07 17:06) **aparece na listagem e não é aberta** (é
do Cemitério). Erros de digitação eventuais e mecânicos (`povvo` é canônico), nunca de quem não sabe escrever.

**Seção 7, complemento da fonte.** Além do bus, a lápide tem uma segunda fonte que está na árvore atual do jogo
e é somente leitura: o ADR-005, que em 21/06 pedia *"arquivar"* o repositório da fundação C# e em 25/07 recebeu
a nota *"sem efeito. O repo foi apagado em vez de arquivado, no M8"*, remetendo a um CHANGELOG que também não
existe mais (§15, item 1). O documento que pedia para guardar carimbou, ele mesmo, que não guardaram. Cabe na
prosa da lápide em uma frase; não nomear o serviço de hospedagem.

### 3.2 Copy proposta dos vazios e das notas curtas (TUDO pendente de aprovação do líder, GATE-COPY)

Regra do editor-geral (PIPELINE §8): todo vazio re-gate a cada edição, mesmo idêntico. As opções abaixo são
sugestão; ele escolhe, ajusta ou recusa. Sem ponto final nas falas e nos `//`; `//` até 72 caracteres,
`/* ... */` acima disso, nos dois idiomas.

- **Seção 5, A Nota:** `gus@glyfesse:~/nota$ a nota` / *"Como dar nota a um jogo que perdeu o chão velho e continuou de pé? Assim:"* / Arquitetura: *existe, e agora não tem mais nada do jogo antigo embaixo* / Gráficos: *1 (a mesma cara; ninguém mexeu nela este mês)* / Jogabilidade: *um personagem que anda, conversa, luta e ganha; jogado do começo ao fim por dois, e quem estuda jogos achou onde rangia* / Texto: *10, de novo* / `// o chão antigo saiu e eu nem senti... isso é bom ou é assustador`. (Trava §1.1: seco.)
- **Seção 9, Errata:** `gus@glyfesse:~/errata$ errata + cartas` / *"Errata: quatro edições, e o primeiro erro apareceu. Não foi um leitor que achou; foi alguém daqui, revisando outra coisa. Na edição #3 em inglês, a tarja preta do Detonado dizia 'trecho censurado' em português para quem lê com leitor de tela. Quem ouvia em inglês ouvia uma frase que não era da língua. Corrigido junto com esta edição. Cartas: nenhuma de leitor, de novo."* / `// a gente conferiu a tarja. ninguem conferiu em que lingua`.
- **Seção 12, Próximos Lançamentos:** reusar a linha do root da #1 (*"A intenção é semanal. Mais ou menos... 'devezenquandal' fica mais fácil de afirmar."*). A ressalva interna (comentário PHP) passa a dizer: o motor de cartas por inteiro e o save continuam de fora; o menu de pausa e a colisão entram (narrados nesta edição).
- **Seção 19, nota do editor (root):** `root@glyfesse:~/expediente$ nota do editor` / *"Na edição passada escrevi que nada se perde, só espera a vez. Desta vez algo se perdeu, e foi justamente o que estava marcado para ser guardado. Fica registrado onde deve: numa lápide. O resto do mês foi conferir. No fim, joguei o jogo inteiro e não achei nada. O Gus Dragon jogou depois e achou dois defeitos, porque estuda jogos e o filtro dele para isso é mais especializado que o meu. Aí perguntou o tamanho do jogo e recebeu um número, não uma estimativa."* (Trava §1.1: o root afirma a especialização dele, seco, sem elogio e sem cena de orgulho.)

---

## 4. Tabela de prioridade (as peças com escrita nova)

Peças com escrita real, sem Reportagem XL; a caixa do achado do Gus Dragon (linha 10) faz o papel que o
encarte do glintfx fez na #4. Ver §11 para o que encolher se a produção pesar.

| # | Seção | Tamanho | Por que vale o lugar |
|---|---|---|---|
| 1 | **Reportagem de capa** | **L** | O arco dos três movimentos; a peça mais cara, e a única que mostra os três juntos |
| 2 | **A Entrevista** (Jaci "Proxy") | **L** | Segunda mais cara: dois agentes de persona, e a estreia do método em que o entrevistado não vê o `//` |
| 3 | **Cemitério** | **M** | A matéria-mãe, com trava liberada pelo líder; a única cova vazia do acervo |
| 4 | **Seção de Programação** | **M** | O eixo expert de "conferir", com o código que a Reportagem não pode mostrar |
| 5 | **O Gus lê o bus** | **M** | Estreia do Grau 3+ da fórmula; a personagem aparece inteira pela primeira vez nesta seção |
| 6 | **Detonado da Pausa** | **M** (se D4 = entra) | Serviço atemporal sobre o que a Galeria narra como evento; sem ele, a Galeria fica sem "como funciona hoje" |
| 7 | **Galeria de Bugs** | **S/M** | Um bug de cada lado da cerca; o crédito ao Gus Dragon com a classe que ele nomeou em junho |
| 8 | **Editorial** | **S** | Ponte direta com o fecho da #4 |
| 9 | **Errata** | **S** | A primeira errata real, e sobre o próprio tema (D9: publica e conserta no mesmo deploy) |
| 10 | **Reportagem do achado do Gus Dragon** (caixa própria na §4) | **S** | Lei (adendo da L-24, 04/09): achado dele tem peça própria, e o porte é o do achado; S porque a matéria é pequena, não porque sobrou pouco espaço |

**Dez peças com escrita real**, uma a mais que a #4: a décima é a caixa do achado (D16), que nasceu de lei e
não de espaço.

**O Pôster central** é arte (zero escrita: o logo do GusWorld, §8); **A Nota** e a **nota do editor** são
copy curta de gate, não peça.

---

## 5. As divisórias (publicar a mesma história duas vezes é falha grave)

A matéria-mãe e o movimento "conferir" tocam quatro seções cada. A tabela abaixo é obrigatória para quem
escreve; se alguma linha parecer forçada na produção, é sinal de fundir duas peças, não de manter divisão
artificial (regra herdada da §10 da pauta da #4).

### 5.1 O apagar (22/07)

| | Reportagem (§4) | Cemitério (§7) | O Gus lê o bus (§18) | Pôster (§13) |
|---|---|---|---|---|
| **Responde** | O que aconteceu, em ordem, em um parágrafo: tiraram o jogo antigo com cuidado, e o cuidado não alcançou o que estava fora | Por que "parecia preservado" e não estava, com a mecânica | Como isso chegou aqui: a listagem mostra o assunto do obituário | Arte: o único retrato que sobrou |
| **Pode** | Dizer que o código original não pode mais ser aberto; dizer "nada funcional se perdeu, perdeu-se o registro" | A tag e o ponteiro; o submódulo; o clone local apagado antes do remoto; o parecer contrário; a varredura sem cópia; a citação `// ADAPTACAO`; as duas lições; a ironia | Abrir a mensagem das memórias ("aqui não é cemitério") | O identificador do commit, e nada mais |
| **Proibido** | Explicar submódulo; citar `// ADAPTACAO`; a tag pelo nome | Repetir a lápide "C# .NET 8 AOT" da #3 (uma linha de referência, só) | Abrir a mensagem do obituário | Texto além do identificador e da legenda |

### 5.2 O conferir (23 e 24/07)

| | Reportagem (§4) | Programação (§17) | O Gus lê o bus (§18) | Galeria (§6) | Detonado (§8) |
|---|---|---|---|---|---|
| **Responde** | Os três fatos do líder, em linguagem de quem não programa: a checagem olhava para um lado, o problema estava do outro | O mecanismo: por que a proteção pela metade engana, por que o isolamento é de quem executa, **o que o analisador viu que o review não viu (a frase da lente, 23/07)**, o QA na sessão viva | O gate cego da paridade de traduções e o `git add -A` (itens 1 e 7 do board), na voz do Gus reagindo | O bug de andar sozinho como evento: sintoma, causa numa frase, consertado em 24/07 | O menu de pausa como serviço, hoje: laço único, estados, mini-condutor, foco preservado; **e a sabotagem que travou o teste (24/07): a prova que precisava aprender a reprovar** |
| **Lição que carrega** | O arco | **23/07: uma ferramenta barata viu o que a revisão cara não viu** (a verificação que enxerga mais) | A ausência de aviso parece "passou" | O conserto | **24/07: a verificação que existia não sabia reprovar; teste que pendura fica quieto** (a verificação que não sabe falhar) |
| **Proibido** | Código, `strace`, nome de variável; o gate cego (é do bus); a mutação que travou | Narrar a falha da party; repetir o gate cego; **a sabotagem que travou (é do Detonado)** | Detalhar o wrapper ou o linter | Arquitetura de estados; método de mutação | O bug (é da Galeria); **o analisador estático e qualquer "a máquina viu o que o humano não viu"** (é da Programação) |

**A divisória entre 23/07 e 24/07 é de lição, não só de fato:** a Programação conta a verificação que **viu
mais** do que a revisão humana; o Detonado conta a verificação que **não sabia falhar**. Se as duas peças
terminarem na mesma moral, uma delas está errada.

### 5.3 O medir (07 e 08/08)

| | Reportagem (§4) | Galeria (§6) | Editorial (§3) |
|---|---|---|---|
| **Responde** | Dois jogaram o mesmo jogo: o root não achou nada; o Gus Dragon achou dois, porque estuda jogos (trava §1.1); perguntou; contaram: 163 mil, e teste é mais que o dobro do jogo | O clipping como bug: o que ele fez, o que viu, a pista que fechou o diagnóstico, o que está aberto | "Duas pessoas jogaram o mundo; a segunda sabia onde mundos costumam ranger, foi lá, e ele rangeu; e perguntaram o tamanho; contaram", de dentro, sem número |
| **Proibido** | A anatomia da colisão (as duas metades); adjetivo de ternura, "para a idade", exclamação | O número de linhas; adjetivo de ternura, "para a idade", exclamação | Qualquer número ou palavra de produção; adjetivo de ternura, exclamação |

**A falha do elenco (23/07, "mapeei não conferi")** tem um dono só: a Reportagem, em forma abstrata, sem
descrever nenhum personagem, com a frase do custo (D12 decidida, 04/09). Nenhuma outra seção a toca.

### 5.4 A caixa do achado do Gus Dragon (22/07) contra a Reportagem de capa, e a fronteira de registro

| | Reportagem de capa (§4, o corpo) | Caixa própria (§4, `#sec-04-menu`) |
|---|---|---|
| **Responde** | O que parecia conferido, em três movimentos; no terceiro, o playtest de 07/08 e a contagem de 08/08 | Um achado só: o menu inicial mostrava a cena de onde o jogador estava, ele apontou em 22/07, a arte própria entrou "no dia seguinte" (sem cravar data) |
| **Pode** | Dizer, no primeiro bloco, que 22/07 foi também o dia de um achado dele, em meia frase, apontando para a caixa | Citar o verbatim dele; dizer o que o menu mostrava antes e o que passou a mostrar; o crédito nos dois papéis |
| **Proibido** | Narrar o menu, o verbatim de 22/07 ou a arte nova (é da caixa) | O clipping de 07/08, o número de linhas, qualquer parte dos três movimentos (é do corpo); qualquer palavra que só faça sentido para quem sabe de agosto |
| **Trava §1.1** | vale | vale |

**Fronteira de registro, deliberada e a não uniformizar (D1 e D15):** a Reportagem de capa e a caixa são
técnicas por decisão do líder e nomeiam tecnologia (M8, Godot, C#, submódulo, "menu inicial", "arte");
a Galeria de Bugs fala de dentro do mundo ("um inimigo que faz ronda", "alguém do lugar", "um bloco"). As
duas convivem na mesma edição de propósito. **Nenhum revisor "corrige" uma pela outra**: a régua é a seção,
não a edição. O `revisor-textual` recebe esta frase no brief.

---

## 6. As pontes obrigatórias com a #4

1. **O fecho do Editorial da #4** (conferido no publicado, `edicao-4/pt/sec-03.php`, última linha do bloco de
   `//`): *"isso muda a conta inteira"*. O Editorial da #5 responde a ela. (A lição da #4 vale: verificar o
   publicado, não a memória; foi feito.)
2. **O fecho da Reportagem da #4:** *"E eu contei cada um desses dias andando, sozinho primeiro, acompanhado
   depois."* A #5 termina com outra contagem, feita por outra pessoa. A Reportagem pode ecoar, não repetir.
3. **A nota do editor da #4:** *"nada se perde, só espera a vez."* A nota da #5 responde: desta vez algo se
   perdeu (§3.2).
4. **A lápide "C# .NET 8 AOT" da #3** e a frase *"o corpo ficou instalado no computador até 22 de julho"*. A #5
   é o dia 22 de julho. O Cemitério faz a referência em uma linha e não re-enterra.
5. **O crédito duplo do Gus Dragon**, fixado na #4 na Reportagem e na Galeria: *"playtester, Revisor
   Adversarial de Design"*. Toda menção nominal na #5 traz os dois papéis; nunca o nome de batismo.
6. **A ressalva de "Próximos Lançamentos"** muda de sujeito (§3.2): pausa e colisão entram no contado.

---

## 7. Título (D10, decidido no título) e dek (aberto)

**Título: DECIDIDO pelo líder em 04/09/2026: "O Que Parecia Conferido" / "What Looked Checked".** A frase
dele; cobre os três movimentos sem privilegiar nenhum. Vai para `titulo_pt` e `titulo_en` de `$edicoes`.

**Risco de render, mantido:** os títulos anteriores têm 15 caracteres; este tem 23. A memória de tipografia
registra que só um par de fontes cabe a manchete em 390px; o GATE-CAPA precisa do print em 390px antes de
fechar (§11, risco 6).

**Dek: DECIDIDO pelo líder em 04/09/2026: a opção A, o arco inteiro.** Vai para `dek_pt` e `dek_en`
(spoiler-safe: descreve o marco de progresso, não lore):

| | Texto |
|---|---|
| pt | Tiraram o jogo velho de baixo do novo com todo o cuidado, e o que se perdeu estava fora do alcance do cuidado. Semanas depois, dois jogaram o jogo novo inteiro: um foi procurar onde ele quebrava, e depois perguntou o tamanho dele. |
| en | They pulled the old game out from under the new one with every care, and what got lost sat just outside that care's reach. Weeks later, two people played the new game start to finish: one went looking for where it would break, and then asked how big it was. |

**Conferido contra a trava §1.1:** as duas versões afirmam a especialização sem hedge ("um foi procurar onde
ele quebrava" / "one went looking for where it would break"), sem adjetivo de ternura, sem "para a idade" e
sem exclamação; a versão em inglês não amaciou (não há "somehow", "luckily", "just a kid" nem equivalente).

**Risco de render, novo (§11, risco 16):** este dek é bem mais longo que os anteriores (a #4 tem 2 linhas; este
tem 4 em 390px, estimado, a medir), e o dek aparece na banca e nos dois feeds. O GATE-CAPA precisa ver o
print da banca em 390px **com este dek**, não só a manchete.

---

## 8. A imagem da edição (`frame`) e o Pôster

**O que existe de captura real na janela, verificado em disco e não presumido:**

- `resources/frames/`: nove quadros, todos de 22/06 (quadradinho, #3) e 24/06 em diante (sprites, #4) e do
  vídeo de boot. **Nenhum entre 22/07 e 08/08.**
- `resources/arquivo_pessoal_petrus/` (gitignored, fonte, não publicável direto): gravações de 22/06, 06/07,
  17/07 e uma de **15/08** (`demo_cidade_maior_15-08-2026.mp4`), posterior à janela. **Nenhuma entre 22/07 e
  08/08.**
- A mensagem do bus de 07/08 diz: *"Os dois prints do achado ficaram guardados fora do bus, no ambiente local do
  líder."* Ou seja, **existem duas capturas do playtest do Gus Dragon, na máquina do líder, fora deste
  repositório.** Não sei o que mostram nem se estão limpas.
- No repositório do jogo (somente leitura), a varredura achou **228 imagens com data na janela, nenhuma
  captura de jogo**: 215 são a geração de sprites de 23/07, cinco são chapas de validação de arte, oito são
  props de cenário de 07 e 08/08. Há um único arquivo cuja legenda o data em 07/08:
  `Projects/GusWorld/resources/images/legado/snapshot.png`, descrito no índice da pasta como *"captura de
  evidência de uma investigação de modo de aplicação do motor anterior, datada de 07/08/2026"*. Não foi
  aberto; pela legenda, não é o playtest, e "motor anterior" o aproxima da matéria reservada. **Não
  recomendo**; fica registrado para que ninguém o "descubra" depois.

**Logo, a constatação honesta:** no repositório não há captura utilizável da janela.

**NOVA DECISÃO do líder, 05/09/2026, substitui D5 e D6 para a capa e o pôster.** O pôster (Seção 13) e a
capa (`frame`) passam a ser a mesma peça: o **logo do GusWorld**, entregue pelo líder hoje: um dragão em
neon vermelho gravado numa laje de pedra escura, asas em bronze, fumaça subindo. O plano dos dois prints do
playtest de 07/08 para essas duas superfícies (D5 e D6, ambas de 04/09) fica sem efeito. Duas coisas do
líder ficam registradas, verbatim ou por confirmação direta dele:

- **A arte é gerada por inteligência artificial**, confirmado pelo líder quando perguntado. Logo, o site
  tem de declarar isso, pela mesma regra que já reprovou um lançamento anterior:
  `docs/auditoria/AUD-IA-2026-08-04.md`, achado IA-02 ("o uso de IA para ARTE não está declarado em lugar
  nenhum do site"). Declarar é a defesa.
- **A marca é o logo do jogo GusWorld**, não selo de facção nem marca do playtester.

**O arquivo ainda não chegou ao disco** ("Aguarde o caminho do arquivo"). Pôster e capa ficam **decididos,
aguardando só o arquivo**, não mais "sem material".

**As duas alternativas de contingência do pôster deixaram de valer** (nasciam para o caso de os prints de
07/08 reprovarem na higiene ou no spoiler; a decisão de 05/09/2026 tira o pôster dessa dependência) e saem
deste documento.

A chapa do pôster segue reusando o modificador `.chapa.retrato` da #4 (um `<img>` dentro da chapa) assim que
o arquivo do logo chegar; a ficha traz só o que for medido do arquivo entregue (dimensões), como a #4 fez.

---

## 9. A HQ: obra encomendada a um profissional (D7 decidida em 04/09/2026), e as pendências de publicação

Ordem verbatim, 04/09/2026: *"A tirinha eu vou fornecer, não faça."* E a decisão do mesmo dia, verbatim:
*"Será uma tirinha que encomendei a um profissional."* Nenhum agente desenha, roteiriza, propõe quadros nem
"sugere ajuste".

**A pergunta de formato está respondida:** é **obra de terceiro** (nem imagem do próprio líder, nem descrição
para montar em CSS como nas #3 e #4). Isso fecha uma pergunta e converte as outras em **pendências de
publicação**, cada uma com dono. A Seção 11 **não publica** enquanto as quatro primeiras não estiverem
resolvidas; as outras dezesseis seções **não esperam por ela** (§11, risco 12; §13, onda 4).

| # | Pendência | Dono | O que precisa existir antes de publicar |
|---|---|---|---|
| 1 | **Crédito nominal** | o líder | **O autor foi informado pelo líder em 04/09: `https://x.com/Andre_Suporte`.** Registrado aqui; **não publicar em peça nenhuma** até crédito, licença e consentimento estarem fechados. Falta a **forma** do crédito (o identificador do X? um nome? link?) e se entra no Expediente. O molde do colofão hoje só tem `gus@glyfesse` e `root@glyfesse`; um terceiro é linha nova, e a copy dela é gate |
| 2 | **Licença de uso** | o líder | O texto e a arte da revista são "todos os direitos reservados" (L-10). Encomenda paga não transfere direitos automaticamente no Brasil: depende do que foi combinado. Precisa estar claro sob que termo a arte entra (cessão, licença de uso na revista, uso restrito a esta edição) antes do render, porque publicado não sai |
| 3 | **Consentimento para o nome aparecer** | o líder | Se houver crédito (item 1), o consentimento do profissional para o nome ir a público, e ele se pergunta ao líder (L-01: dado de terceiro só com consentimento) |
| 4 | **Uso de IA na produção da tira** | o líder (pergunta ao profissional) | Se houve ferramenta de IA para gerar ou retocar, entra na declaração do rodapé desta edição, nomeando a ferramenta. Declarar é a defesa; a `AUD-IA` já reprovou um lançamento por isso (L-09) |
| 5 | **Higiene do arquivo** | a thread principal (main) | Abrir e olhar antes de versionar: só a tira, sem mesa, tela, barra, marca d'água de rascunho ou nada ao redor (L-02) |
| 6 | **Texto alternativo** | nós escrevemos, o líder aprova | A descrição que o leitor de tela lê, nos dois idiomas; segue a régua de spoiler de todo `alt` público. Gate de copy |
| 7 | **Tamanho e comportamento** | produção | A tira tem de funcionar em 390px, parada (a HQ é impressa: zero animação, zero JS), e o arquivo servido no peso do site (referência: ~279 KB o site inteiro) |
| 8 | **Ordem de chegada** | produção | Não é prazo, é ordem de onda: a HQ entra sozinha numa rodada própria de GATE-RENDER quando o arquivo e as pendências 1 a 4 estiverem resolvidos, sem segurar o resto |

---

## 10. O que a janela oferece (ledger e bus filtrados) e o destino de cada item

### 10.1 Dentro da janela, ENTRA

| Data | Fonte | Item | Vai para |
|---|---|---|---|
| 22/07 16:51 | bus, gusworld para site | As 4 memórias da era Godot, íntegras (`MATERIA-MEMORIA-QUE-APODRECE`) | §18 (a mensagem que o Gus abre) |
| 22/07 17:06 | bus, gusworld para site | Obituário da fundação C# (`MATERIA-OBITUARIO-CSHARP`) | §7 (matéria-mãe); §4 (um parágrafo); §13 (o identificador); §18 (só na listagem) |
| 22/07 | ledger, jogo | M8 decommission: 172 arquivos + submódulo; M9 higiene; CI Windows verde | §4 (datas e números; o "172" só tem o bus como fonte, ver §15) |
| 21/06 e 25/07 | repo do jogo (somente leitura), `docs/tech/adr/ADR-005-license-gpl3-assets-ccbysa.md`, linhas 46 e 118 | O pedido de "arquivar" o repositório da fundação C# e o carimbo de 25/07: *"sem efeito. O repo foi apagado em vez de arquivado, no M8"* | §7 (segunda fonte da lápide; sem nomear o host) |
| 22/07 | repo do jogo, `TODO.md` linha 134 (item F7) | Achado do Gus Dragon, por playtest: o menu inicial precisa de arte própria; arte feita "no dia seguinte", segundo a nota (a peça não crava data) | §4, caixa própria (reportagem do achado, D16; lei, adendo da L-24) |
| 22/07 | repo do jogo, `GODS_LAWS.md` do jogo, L-35 (linhas 761 e 763) | *"em 22/07/2026 uma sonda de janela abriu na sessão viva do líder por dois a três minutos"*: corrobora a classe de incidente dos fios 1 e 4 da Programação | §17 (data do incidente do glintfx; a mensagem de 23/07 diz "no meio da madrugada") |
| 23/07 08:20 | bus, glintfx para site | Proteção pela metade (`MATERIA-PROTECAO-PELA-METADE`) | §17 (fios 1 a 3); §4 (uma frase) |
| 23/07 09:40 | bus, gusworld para site | A sessão que fechou o board (`MATERIA-BOARD-M9-VERIFICACAO`) | §18 (gate cego, `git add -A`); §4 (o fio "a verificação achar que tinha verificado") |
| 23/07 21:35 | bus, gusworld para site | A falha da party (`MATERIA-MAPEEI-NAO-CONFERI`) | §4, abstrato, sob GATE-SPOILER (D12) |
| 24/07 20:20 | bus, gusworld para site | Onda F4 (`MATERIA-F4-SCREENSTATE`): fim dos laços modais, mutação que trava, QA na sessão viva, meio-commit | §17 (fio 4); §6 (andar sozinho); §8 (Detonado da Pausa) |
| 07/08 20:07 | bus, gusworld para site | Playtest do Gus Dragon, dois clippings, causa-raiz | §6; §4 (movimento 3) |
| 08/08 13:43 | bus, gusworld para site | Quantas linhas: 163 mil; jogo 62.700, testes 78.200 | §4 (fecho) |
| 03/09 | TODO.md | `A11Y-ED3-EN-TARJA` (erro de acessibilidade no ar na #3 em inglês) | §9 (Errata), condicionado a D9 |

### 10.2 Dentro da janela, DISPONÍVEL e NÃO usado (recomendação: guardar)

| Data | Item | Por que fica de fora |
|---|---|---|
| 22/07 | `MATERIA-CI-VERDE-MENTE` (ato 3, `m.lib`), `MATERIA-RESULTADO-NEGATIVO` (o touchpad e o experimento que não prova), `MATERIA-NAO-EXECUTOU` (seis histórias) | São do glintfx, sobre verificação, e cabem na lente; mas a edição já tem os três movimentos fixados pelo líder e nove peças. São a reserva natural se ele quiser trocar o fio 3 da Programação por outro |
| 22 a 24/07 | Releases glintfx v0.17 a v0.23 (`MATERIA-DRAW2D-PROG1`) | Dev-log de ferramenta; sem ligação com a lente |
| 24/07 | `MATERIA-VENDOR-DIRECAO` (o gerador de sprites anima a partir de texto) | Continuação da falha da party; toca aparência de personagem e fornecedor; guardar para quando a party tiver matéria própria |
| 25/07 | A sessão do jogo com 60 dias de uptime ininterrupto (medido: 1456h42m) | É "medir", mas é sobre a sessão, não sobre o jogo; o masthead já carrega uptime. Pode virar linha da nota do editor se o líder quiser (não incluí) |
| 28 a 30/07 | `MATERIA-VERIFICACAO-MENTE` (215 itens e a ferramenta via 14; substring; 1.777 testes sem proteção; 574 bytes em 446 MB; 8h54 pendurado; a fila de iniciativa) | Mensagens entre jogo e glintfx; a fila de iniciativa toca mecânica de combate (spoiler). Candidata a capa de uma edição do eixo expert |
| 31/07 | `MATERIA-LICENCA-VALVE` | Assunto próprio (ver §1) |
| 04 a 06/08 | Retirada da biblioteca de interface (04/08); capture-frame corrompe heap; 15 telas acharam um bug | **RESERVADO para a #6 pelo líder (D14, 04/09)**: fora da #5 e marcado para a próxima, com item próprio no `TODO.md` |

### 10.3 Posterior à janela (não entra; cronologia ascendente)

12/08 em diante: tudo. Inclui os marcos do Gus Dragon de 21 e 22/08 (entram na edição de agosto, com o
mérito dito com o nome dele), a issue pública na Anthropic (15/08, sensível, decisão do líder), o ADR-0023
(18/08), o censo (19/08), a retratação (20/08), o portão que varre zero (21/08), a refundação (21/08,
reservada), o glifo oficial do jogo, brasão da linhagem do personagem (01/09; como fato narrado segue fora
da janela, mas como peça de capa e pôster desta edição é a exceção D18), e a onda da bateria (02/09).

### 10.4 Manutenção do ledger (pré-condição, não decisão)

O `HISTORICO_GUS_ECOSSISTEMA` ainda marca como `DISPONÍVEL (#5)` as linhas de 24 e 25/06 (M5 BattleScreen,
gate 2D-vs-3D, ADR-009) e `DISPONÍVEL (#6+)` as de 01 a 21/07: **todas foram consumidas pela #4** e a regra
de manutenção do próprio arquivo diz "ao fechar uma edição, trocar DISPONÍVEL pelo número". O mapa de janelas
no cabeçalho dele ("#5 arena 2D (24/jun)") também envelheceu. Corrigir antes de abrir a produção, senão a
próxima pauta parte de um ledger que mente (é a lição da L-14 do site aplicada à memória).

---

## 11. Riscos de produção

1. **Custo igual ao da #4.** Dez peças (nove mais a caixa do achado). Se pesar, os cortes que recomendo,
   nesta ordem, e nenhum toca promessa feita nem decisão tomada: (a) o bus abre uma mensagem só, não duas,
   mantendo a escada nas falas; (b) o Cemitério condensa as duas lições em uma frase e mantém intacto o
   detalhe da nota de rodapé. **Não** recomendo encolher a Reportagem (os três movimentos são ordem do líder),
   a Entrevista (é série), o Detonado (D4, decidido cheio) nem a caixa do achado (é lei: o porte é o do
   achado, não do espaço).
2. **Os dois fatos de "conferir" contando a mesma lição.** Decidido (D2): a frase da lente é o analisador
   estático de 23/07 (Programação); a sabotagem que travou o teste, de 24/07, vai para o Detonado da Pausa (ou
   para a Galeria, se o Detonado ficar vazio). O risco que sobra é de produção: as duas peças terminarem na
   mesma moral. A divisória da §5.2 nomeia a lição de cada uma ("viu mais" × "não sabia falhar"); o revisor da
   onda 3 confere as duas morais lado a lado.
3. **O tom do terceiro movimento (§1.1).** É o risco mais sério de redação da edição, e a direção do risco é
   **diminuir o menino**: trocar uma competência real por curiosidade simpática, acaso de método ou moldura
   de idade. O fato está fechado pelo líder (04/09): o root jogou e não achou nada; o Gus Dragon jogou e achou,
   porque o filtro dele como estudioso de jogos é mais especializado. A trava vale na Reportagem, no Editorial
   e na Galeria (e nas copies da Nota e da nota do editor), e o revisor da onda 3 varre as peças atrás de
   hedge, adjetivo de ternura, "para a idade", exclamação e elogio antes do GATE-CONTEUDO.
4. **Não piscar, de novo.** Os dev-logs do glintfx de 23/07 são autocríticos e estão dentro de julho; a trava
   da pauta da #4 (§10) continua: nada que só faça sentido para quem sabe de agosto, nenhum elogio à ferramenta
   como vitória, nenhuma ressalva "por precaução".
5. **Spoiler na falha do elenco e na Galeria: decididos (D12, D15).** A Reportagem conta a falha abstrata,
   sem descrever nenhum personagem; a Galeria usa vocabulário do mundo. O risco que sobra é de produção: o
   `compliance-legal` confere, no parecer de spoiler, que nenhuma aparência escapou por paráfrase ("a de
   tranças", "a curandeira") e que nenhum termo de produção voltou à Galeria.
6. **A manchete em 390px.** Títulos de 23 e 24 caracteres nunca foram renderizados na capa; o GATE-CAPA só
   fecha com print em 390px (`feedback_medir_onde_acontece`: o ponto de quebra é do leitor).
7. **O Grau 3+ do bus estreia com a personagem inteira.** Ironia que ri de si, nunca deboche do remetente; se
   soar arrogante, o mecanismo quebrou. É o traço com submissão obrigatória (L-08): a copy vai ao líder antes
   de qualquer render.
8. **A Errata depende de um deploy.** Se a correção da #3 em inglês não for no mesmo deploy da #5, a errata
   anuncia conserto inexistente. Ou vai junto, ou a errata muda para "corrigiremos", ou sai (D9).
9. **O logo (capa e pôster) é gerado por IA, e o site precisa declarar isso.** O líder confirmou quando
   perguntado (§8, decisão de 05/09/2026). A `AUD-IA` (docs/auditoria/AUD-IA-2026-08-04.md, achado IA-02) já
   reprovou um lançamento anterior por uso de IA em arte não declarado; a produção confere, antes do GATE-GO,
   que a declaração cobre esta peça e não repete a fórmula genérica que a própria auditoria marcou como
   insuficiente (IA-03).
10. **Higiene de asset**, como sempre: qualquer imagem (prints de 07/08, a tirinha) é aberta e olhada antes de
    rastrear; nome de batismo nunca, em texto, `alt`, arquivo ou commit.
11. **O dinheiro do líder na Reportagem: decidido (D12).** A frase do custo entra (*"claro que custou, pago
    mensalidade!"*). O que a produção vigia é o tom: a frase é lição, não queixa; e não se explica quanto
    custou nem qual é o serviço.
12. **A Seção 11 não publica sem licença e crédito resolvidos, e isso não segura as outras dezesseis.** A
    tirinha é obra encomendada a um profissional (D7). Sem os itens 1 a 4 da §9 fechados (crédito, licença,
    consentimento, declaração de IA), a HQ fica fora do deploy; se o resto da edição estiver pronto, a #5 sai
    sem a Seção 11 e a HQ entra numa revisão da mesma edição (o campo `revisao` de `$edicoes` existe para
    isso), com rodada própria de GATE-RENDER. Publicar arte de terceiro sem termo claro é o único risco desta
    edição que não se corrige com commit novo. O autor já é conhecido (§9, pendência 1); o identificador
    dele **não entra em peça nenhuma** antes de crédito, licença e consentimento fechados.
13. **A caixa do achado e a Reportagem contando a mesma história.** A caixa é peça própria por lei (D16), e
    a Reportagem de capa abre no mesmo dia (22/07). A divisória da §5.4 dá ao corpo meia frase e à caixa o
    resto; o revisor da onda 3 confere que o menu inicial aparece uma vez só.
14. **A capa e o pôster dependem de um arquivo que ainda não chegou.** §8, decisão do líder de 05/09/2026:
    o `frame` e o Pôster passam a ser a mesma peça, o logo do GusWorld, substituindo o plano dos dois prints
    de 07/08 (D6/D5). A dependência é de um arquivo só: **capa e pôster só existem quando ele chegar**,
    passar na higiene (L-02) e no GATE-SPOILER. As duas alternativas de contingência que a pauta desenhava
    para os prints (identificador do commit; chapa vazia) saíram do documento. As dezesseis seções restantes
    seguem a onda normal; se o arquivo não chegar até o GATE-GO, o líder decide entre segurar a edição e
    publicar sem a superfície (o `frame` fica nulo, como na #1 e na #2).
15. **O conserto da #3 em inglês toca edição publicada (D9).** Trocar quatro `aria-label` em
    `edicao-3/en/sec-08.php` é cirúrgico, mas sobe no mesmo deploy da #5 e exige a prova de que a #3 não
    regrediu em mais nada, no mesmo rigor que a #4 usou ao mexer no CSS compartilhado: render da #3 em pt e en
    antes e depois, comparado, e a prova final da E4 cobrindo as duas edições, não só a nova.
16. **O dek é bem mais longo que os anteriores, e aparece na banca e nos dois feeds.** O da #4 ocupa duas
    linhas em 390px; este deve ocupar quatro (estimativa, a medir no render). O GATE-CAPA precisa ver o print
    da **banca** em 390px com este dek, não só a manchete; e o card social (1200x630) precisa ser gerado com
    o dek inteiro, sem cortar frase no meio.

---

## 12. As decisões (TODAS FECHADAS pelo líder em 04/09/2026; registro do processo)

| # | Decisão | Opções (recomendada primeiro) |
|---|---|---|
| **D1** | Registro da Reportagem de capa | **DECIDIDA pelo líder em 04/09/2026: Gus-editor, técnico.** Nomeia M8, Godot, C# e o submódulo `engine/` pelo nome; é seção técnica, e a L-25 vale para a ficção. Não libera a matéria reservada nem o serviço de hospedagem; a trava §1.1 vale dentro dela |
| **D2** | Qual fato a frase "o verificador automático achou o travamento" nomeia | **DECIDIDA pelo líder em 04/09/2026: o analisador estático de 23/07** (travamento de ponteiro nulo em objeto já movido, que a revisão adversarial humana deixou passar). O fato de 24/07 (a sabotagem que travou o teste) não é descartado: vai para o Detonado da Pausa com a divisória da §5.2 |
| **D3** | Entrevistado da #5 | **DECIDIDA pelo líder em 04/09/2026: Jaci "Proxy" Vanderbist.** Segue a fila da party, sem reabrir a ordem nem criar trilha B; a pergunta sobre intercalar trilhas cai junto |
| **D4** | Detonado | **DECIDIDA pelo líder em 04/09/2026: entra cheio, o Detonado da Pausa** (M), com o material de 24/07 dentro (a sabotagem que fez o teste travar em vez de reprovar, e o limite de tempo que faltava). A divisória contra a Programação (§5.2) vale integralmente |
| **D5** | Pôster central | **DECIDIDA pelo líder em 04/09/2026 (o segundo print de 07/08 vira o pôster, em par com a capa); SUBSTITUÍDA por ele em 05/09/2026: o pôster passa a ser o logo do GusWorld** (ver §8), a mesma peça da capa. As alternativas de contingência (identificador do commit; chapa vazia) saíram do documento |
| **D6** | `frame` da edição | **DECIDIDA pelo líder em 04/09/2026 (os dois prints do achado do Gus Dragon, de 07/08); SUBSTITUÍDA por ele em 05/09/2026: o `frame`/capa passa a ser o logo do GusWorld** (ver §8), entregue pelo líder, ainda sem o arquivo em disco; arte gerada por IA, a declarar (docs/auditoria/AUD-IA-2026-08-04.md, IA-02) |
| **D7** | A HQ | **DECIDIDA pelo líder em 04/09/2026: obra encomendada a um profissional** (*"Será uma tirinha que encomendei a um profissional."*). Formato respondido; ficam as pendências de publicação da §9, com dono: crédito, licença, consentimento e declaração de IA (o líder); higiene (main); `alt` (nós escrevemos, ele aprova). A Seção 11 não publica sem os quatro primeiros; as outras não esperam |
| **D8** | O Gus lê o bus | **DECIDIDA pelo líder em 04/09/2026: escada completa, até a ironia.** Abre duas mensagens comentando antes de cada uma; na terceira o tom vira ironia. As duas que ele abre: as memórias da era Godot (22/07) e o gate cego da paridade de traduções (23/07). Estreia do terceiro degrau: marco da série; a formulação da ironia vai a ele como toda fala do Gus |
| **D9** | Errata | **DECIDIDA pelo líder em 04/09/2026: publica a errata e leva o conserto no mesmo deploy.** `A11Y-ED3-EN-TARJA` vira pré-requisito do deploy da #5; a Errata deixa de ser vazio; a copy é fala do Gus e vai a ele; o conserto toca edição publicada e exige prova de que a #3 não regrediu (§11, risco 15) |
| **D10** | Título e dek | **DECIDIDOS pelo líder em 04/09/2026.** Título: "O Que Parecia Conferido" / "What Looked Checked" (risco de 23 caracteres em 390px, §11 risco 6). Dek: a opção A, o arco inteiro, pt e en na §7, conferido contra a trava §1.1 (risco do comprimento na banca e nos feeds, §11 risco 16) |
| **D11** | Campo `data` | **DECIDIDA pelo líder em 04/09/2026:** campo `data` = `2026-07-22` (o dia de abertura, critério das edições anteriores); a janela "de 22 de julho a 7 de agosto" aparece no primeiro parágrafo da Reportagem de capa (§2) |
| **D12** | A falha do elenco na Reportagem | **DECIDIDA pelo líder em 04/09/2026: abstrata, com a frase do custo.** Conta que um elenco inteiro saiu com a aparência errada, sem descrever nenhum personagem, e mantém a lição "custo de terceiro é custo" |
| **D13** | Quem jogou em 07/08 | **Deixou de ser pergunta: FATO registrado pelo líder em 04/09/2026**, verbatim: *"eu fiz o playtest e não achei nada. Gus fez e foi ele quem encontrou, pois ele já foi buscando esses erros dado ser erro comum. Tanto que encontrou."* O root jogou o demo inteiro e não achou nada; o Gus Dragon jogou depois e achou os dois clippings, porque estuda jogos e o filtro dele para essa classe de defeito é mais especializado (*"O filtro dele como estudioso de jogos é mais especializado que o meu."*). Redação sob a trava §1.1 |
| **D14** | A cerca da retirada da biblioteca de interface (04/08) e do que orbita aquela dependência | **DECIDIDA pelo líder em 04/09/2026: "deixa para a #6".** Reserva nomeada: fora da #5 e marcada para a #6, com item próprio no `TODO.md` e nota no ledger (§1, §10.2) |
| **D15** | Vocabulário da Galeria | **DECIDIDA pelo líder em 04/09/2026: do mundo.** "Um inimigo que faz ronda", "alguém do lugar", "um bloco"; nada de "NPC", "androide inimigo", "prop de cenário". Fronteira de registro contra a Reportagem técnica registrada na §5.4, para nenhum revisor uniformizar |
| **D16** | O achado do Gus Dragon sobre a arte do menu inicial (22/07) | **DECIDIDA pelo líder em 04/09/2026, e virou LEI (adendo datado da L-24 no `GODS_LAWS.md` do site).** Verbatim: *"Entra como reportagem. Achados do gus sempre são especiais."* Recusou carta curta e recusou guardar. Peça própria, **confirmado por ele em 04/09**: caixa ao fim da Reportagem de capa com âncora e abertura próprias, entrada própria na tabela de prioridade, porte S (§3.1); divisória em §5.4. A data da arte do menu: a peça escreve "no dia seguinte" (única fonte: a nota do quadro do jogo) e não crava data |
| **D17** | Cartas (Seção 9, metade Cartas) | **DECIDIDA pelo líder em 04/09/2026: vazio com graça.** Uma linha curta admitindo que não houve carta de leitor de novo, aproveitando a copy da Errata (*"Cartas: nenhuma de leitor, de novo."*); fala do Gus, vai a ele como toda fala dele |
| **D18** | A trava de anacronismo do pôster e da capa (§10.3, medida contra o repositório do jogo) | **REVOGADA pelo líder em 05/09/2026: o pôster (§13) e a capa (§8) podem ser o brasão da linhagem do personagem, também logo oficial do jogo**, decidido no repositório do jogo em 01/09/2026, nos commits `1fb399d` e `5bb7914` (a variante usada é a quadrada, 1408 por 1408 pontos, exigida pela moldura do pôster ser quadrada por construção), mesmo essa marca sendo posterior à janela narrada da #5 (22/07 a 08/08/2026). A trava original media certo o fato (a marca é mesmo de 01/09) mas errava a régua: a regra da casa não é "nada posterior à data-âncora entra", é "não quebrar a ordem da narrativa" (cronologia ascendente). Um pôster e uma capa são encarte visual, não afirmam data nem narram fato; a linha do tempo da revista já é ordenada por evolução visual das peças, não por data de publicação dentro da ficção, e o líder aceitou conscientemente esse custo. A trava foi apagada de §10.3, não arquivada. **Nota de desambiguação:** "Vance" nomeia a linhagem do personagem no jogo (o brasão é da família dele); não tem relação com Gus Dragon, o playtester real |

---

## 13. Fatiamento em ondas (teto de 4 agentes vivos; 1 trabalho pesado por vez; C-level planeja, agente operacional executa, main orquestra e verifica)

Cada onda só abre quando a anterior fecha (revisão + gates). Dentro da onda, os agentes listados rodam em
paralelo; nunca mais de 4 vivos, contando o que estiver ocioso (`TaskStop` ao aceitar cada entrega). Render
headless (Firefox) e geração de card são **trabalho pesado**: um de cada vez. Tiering (L-11): verificação e
auditoria no modelo mais recente, implementação no anterior.

**Onda 0, pré-produção (sem agente pesado).**
- Nenhuma decisão pendente: D1 a D17 fechadas em 04/09; D5/D6 substituídas em 05/09 (capa e pôster passam a
  ser o logo do GusWorld, §8). O que a onda 0 pede ao líder é **material**, não decisão: o arquivo do logo
  (capa e pôster) e, para a tirinha (D7), as quatro respostas da §9 (forma do crédito, licença, consentimento,
  uso de IA).
- Main registra a reserva de D14 no `TODO.md` (`MATERIA-RMLUI-SAI`, INBOX, "reservado para a #6") e no
  ledger; título, dek e `data` já decididos entram na entrada da #5 de `data/edicoes.php` via
  `backend-engineer` na onda 5 (o `estado` segue `rascunho` até o GATE-GO).
- D9 (decidido): `frontend-engineer` corrige os quatro `aria-label` de
  `edicao-3/en/sec-08.php`; `qa-engineer` renderiza a #3 em pt e en antes e depois e compara (edição
  publicada não pode regredir); o conserto **espera o deploy da #5** e é pré-requisito dele (L-11: deploy
  manual, uma autorização só, para as duas coisas juntas).
- Main abre e olha cada arquivo recebido (o logo, a tirinha) antes de versionar (L-02).
- `TODO.md` existe; `ED5-PAUTA` está na INBOX e, com o gate fechado, vai para a tabela de pendências com o
  status tocado no mesmo commit (L-14), apontando para este documento.
- `technical-writer` (1 agente) corrige o ledger (§10.4): linhas de 24/06 a 21/07 recebem `#4`; o mapa de
  janelas do cabeçalho é atualizado.

**Onda 1, briefs e lentes (E2 + S1). 1 agente.**
- `product-manager` escreve o brief por seção cheia (escopo, ângulo, fonte primária com caminho absoluto,
  tamanho, pt+en) e o angle statement de uma linha de cada uma das dez peças com escrita (§4); leva também
  as travas desta pauta (divisórias da §5, §1.1, não piscar, L-25, fronteira de registro da §5.4, crédito
  duplo, sem travessão, `//` até 72).
- Main leva ao GATE-LENTE: dez perguntas, três rodadas.

**Onda 2, rascunhos (S2). Até 4 agentes, em duas sub-ondas.**
- 2a (4 vivos): `narrative-writer` A = Reportagem + a caixa do achado do Gus Dragon (fonte própria,
  `docs/content/edicao-5-reportagem-menu.md`, divisória §5.4 no prompt) + Editorial (pt e en; voz do Gus,
  L-08 no prompt);
  `technical-writer` B = Programação + Cemitério (pt e en); Entrevista = 2 agentes de persona
  (`narrative-designer` como Jaci "Proxy", `narrative-writer` como o Gus entrevistador), mediados pela main,
  com o arquivo de perguntas **sem os `//`** entregue ao entrevistado (`grep -c '^//'` = 0 antes de despachar).
- 2b (até 3 vivos): `technical-writer` C = Galeria + O Gus lê o bus + Detonado da Pausa + Errata (pt e
  en). Copies curtas da §3.2 (A Nota, nota do editor, vazios) vão no mesmo brief.
- Todo prompt carrega: caminho absoluto de `GODS_LAWS.md` (site e global), as leis com gatilho (L-01, L-08,
  L-09, L-17, L-25 do site; L-05, L-32 global), a divisória da §5 verbatim, e a frase de que o repositório do
  jogo é somente leitura.

**Onda 3, edição, copyedit e spoiler (S3 a S6). 2 agentes.**
- `revisor-textual` (line + copyedit: tela×papel, bilíngue, `//` até 72, sem travessão, N maiúsculo em pixel
  ≥ 15px, honestidade dos apartes com fonte real).
- `compliance-legal` produz o parecer de spoiler (party, Galeria, retratos); **só instrui**; o líder decide.
- Main leva GATE-CONTEUDO (10), GATE-SPOILER (por item), GATE-COPY (10 cheias + vazios re-gate), em rodadas
  de 4.

**Onda 4, arte, montagem dos partials e render (S7 a S9). Até 4 agentes; render serial.**
- `frontend-engineer`: os 34 partials (`src/content/edicao-5/{pt,en}/sec-03` a `sec-19`), a caixa do achado
  dentro de `sec-04` com âncora `#sec-04-menu` (molde do encarte da #4, sem classe nova), extensões
  escopadas do `edicao.css` (a lápide vazia, a caixa do bus com N mensagens, a chapa do pôster, a errata),
  reusando o que já existe; L-17 (nenhum monolito: um bloco por seção).
- `visual-design-director`: mock do pôster e da caixa do bus com 3+ mensagens em `docs/design/mockups/`
  (commitados; abrir no Firefox, não dirigir).
- `qa-engineer` (independente do implementer): render headless Firefox (`--new-instance --profile`, caminho
  absoluto), 390px e desktop, modo escuro, `scrollWidth` vs `clientWidth`, `aria-label` na língua certa nos
  dois idiomas, checklist item a item, relatório em disco. **Um render por vez.**
- A HQ entra aqui quando o arquivo do profissional chegar **e** as pendências 1 a 4 da §9 estiverem
  resolvidas; se chegar depois, rodada própria de GATE-RENDER; se não resolver até o GATE-GO, a #5 sai sem a
  Seção 11 e ela entra numa revisão (§11, risco 12).
- Main re-confere o relatório do QA antes de levar GATE-RENDER por peça nova ou alterada.

**Onda 5, montagem, prova, auditorias e release (E3 a E6, depois §1.5). Até 4 agentes; 1 pesado por vez.**
- `backend-engineer`: entrada da #5 em `data/edicoes.php` (título, dek, `data`, `frame`, `frame_alt`,
  `og_image`, `capa_en`), geradores `docs/design/og-card-5.html` e `-en`; a geração do PNG do card (Chromium,
  conversão, exceção declarada na L-12) é trabalho pesado.
- GATE-CAPA com print da capa em 390px.
- Prova final E4: `revisor-textual` (texto) + `qa-engineer` (links, `hreflang`, bilíngue, higiene de asset),
  **cobrindo a #5 e a #3 em pt e en**, porque o deploy leva o conserto da #3 (D9).
- Auditorias recorrentes (`AUD-SPOILER`, `AUD-IA`, `AUD-LICENCA`, `AUD-LGPD`, `AUD-SEO`), duas por vez, sob o
  `internal-auditor`; **antes** do deploy, nunca depois (L-09).
- GATE-GO. Depois, na ordem da §1.5 (L-20): capturar o estado atual do site (`HISTORICO-DO-SITE`) e o uptime
  (`scripts/uptime-sessoes.sh`) antes de publicar; deploy **manual** (`D-GO-LIVE`); texto do post do X
  linkando `/pt/?ed=5`; aprovação; **o líder posta**.
- Pós: avisar o Gus Dragon pelo bus (L-15/L-24, o playtest dele está na edição); ledger `DISPONÍVEL` vira `#5`
  nas linhas consumidas (§10.1); `TODO.md` com status tocado no mesmo commit (implementação em pendente
  verificação; concluído só após a prova em produção).

---

## 14. A edição fecha como unidade?

**Sim, e fecha melhor que a #4, porque a lente é um argumento e não um par de marcos.** Cada peça responde à
mesma pergunta por um ângulo: o Cemitério é a preservação que parecia feita; a Programação é a proteção que
parecia proteger; o Detonado é a prova que precisou aprender a reprovar; o bus é o gate que parecia rodar e o
"mapeei" que parecia conferir; a Galeria é o bug achado por quem jogou para quebrar, depois de o jogo ter
aguentado quem jogou para ver; a Errata é a própria revista pega na mesma classe de erro (a tarja conferida na
língua errada); e o fecho é o único número da edição que ninguém precisou acreditar, porque foi contado. Nada é
enfeite colado por fora. E o terceiro movimento, corrigido pelo líder, fecha a lente melhor que a versão
anterior: nos dois primeiros movimentos a checagem cuidadosa olhou para o lado errado; no terceiro, quem
estuda jogos sabia para que lado olhar, e olhou.

**O que ficou incômodo:** (1) o tom do terceiro movimento (§1.1), que é trava de redação e não decisão, e por
isso depende de revisão, não de gate; (2) o registro da Reportagem (D1), porque a #4 provou que dá para contar
tudo de dentro, e a #5 é a primeira em que isso não dá sem omitir; (3) o volume, igual ao da #4, mas os três
cortes da §11 são reais e não cortam promessa.

---

## 15. Lacunas declaradas (o que não pude verificar e o que precisaria ler)

1. **A tag `pre-m8-godot-legacy` e os comentários `// ADAPTACAO do C#` não existem na árvore atual do jogo,
   e não podem existir.** Varredura somente leitura feita em 04/09 (agente de exploração, 43 buscas): a árvore
   atual de `Projects/GusWorld/` **não tem nenhum arquivo de código** (nenhum `.cpp`, `.hpp`, `.cs`; só
   documentos, imagens e cinco scripts em `tools/`), a tag não é nomeada em documento nenhum, e a citação
   `SaveManager.cs` tem zero ocorrências. **Isso não muda a matéria:** a revista narra 22 de julho, a fonte
   primária é a mensagem do bus daquele dia (transcrita íntegra em `docs/arquivo/`), e o que ela descreve era
   verdade naquele dia. **Consequência de redação, obrigatória:** o Cemitério e a Programação escrevem "os
   arquivos C++ de então", nunca "de hoje"; e a razão de a árvore atual estar assim é a matéria reservada, que
   **não se cita** (§1).
   ★ **Apareceu uma segunda fonte, e ela está na árvore atual:**
   `Projects/GusWorld/docs/tech/adr/ADR-005-license-gpl3-assets-ccbysa.md` (somente leitura), linha 46, pede
   *"Arquivar o repo `gus_dragon-engine` (decommission)"*, e a linha 118 carrega o carimbo posterior, verbatim:
   *"(Nota de superação, 2026-07-25: sem efeito. O repo foi apagado em vez de arquivado, no M8 [...]; ver
   CHANGELOG do M8.)"*. O documento que pedia para preservar recebeu, três dias depois, a nota de que a
   preservação não aconteceu: é a lente inteira em duas linhas do mesmo arquivo, e a referência "ver CHANGELOG
   do M8" aponta para um arquivo que também não existe mais na árvore. O Cemitério pode citar as duas linhas.
   **Ressalva:** a linha 118 nomeia o serviço de hospedagem da época; a revista não precisa nomeá-lo
   ("o servidor remoto" basta), e a L-29 global manda purgar links a ele. Não citar o nome do host.
   O número "172 arquivos" (ledger) vem só do bus e da mensagem das memórias (22/07); a árvore atual não o
   corrobora nem o desmente. Usar como "cento e setenta e dois arquivos, segundo o registro do dia", ou omitir.
2. **O conteúdo do arquivo do logo.** Decisão do líder de 05/09/2026 (§8): o logo do GusWorld substitui os
   dois prints de 07/08 como capa e pôster. O arquivo ainda não chegou ao disco; não sei que dimensões ou
   formato ele traz, e é a higiene da main que vai dizer se passa sem ajuste.
3. **O `para:` de cinco mensagens do glintfx (22/07 e 24/07).** Contei oito endereçadas a `site` pelo cabeçalho;
   as outras cinco são prováveis pelo contexto ("este é o quinto material" na de 23/07). A produção confere
   antes de escrever o `[N]` da fórmula.
4. **Se a Jaci tem algo citável dentro da janela.** A party é canônica desde 15/05 (sem anacronismo); o
   conteúdo citado na entrevista segue preso à data-âncora; o brief da onda 1 lê
   `Projects/GusWorld/docs/narrative/characters/` (somente leitura).
5. **A régua exata de "vazio com graça" para a Errata cheia.** É a primeira vez que a Errata tem conteúdo; o
   molde da #4 (linha de prompt + parágrafo + `//`) foi seguido, mas não há precedente de Errata real no site.
