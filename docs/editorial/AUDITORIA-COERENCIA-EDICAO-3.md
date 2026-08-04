# Auditoria de coerência cruzada — Glyfesse #3 (7 seções)

Auditor: `revisor-textual` (read-only). Data: 2026-08-03.
Escopo auditado: **apenas o conteúdo sob `## pt-BR` e `## EN`**. As "Notas de produção" e o
front-matter (`>`) foram lidos para contexto e **não** auditados como texto publicado.
Nenhum arquivo foi modificado.

---

## CRÍTICO

### [C-1] Os dias da semana NÃO batem com as datas — 21/22/23 de junho de 2026 são domingo, segunda e terça

- **Onde:**
  - `edicao-3-reportagem.md` (pt): *"Na sexta-feira decidimos derrubar tudo"* · *"Às 16h32 de sábado um
    quadrado azul deu um passo"* · *"No domingo às 21h11 o jogo voltou a rodar"* · fecho: *"escolheu
    justamente aquele fim de semana para aprender a andar"*.
  - `edicao-3-programacao.md`: *"Em **21/jun/2026** o projeto abandonou o motor de jogo pronto"* ·
    *"Em **22/jun/2026, às 23h34**, o Qt6 saiu e entrou o SDL3"*.
  - `edicao-3-galeria-bugs.md`: *"**Fim de semana de 22 e 23 de junho.**"*
  - `edicao-3-entrevista.md` (troca 3): *"no **sábado** à noite eu tirei de novo a camada"* ·
    *"caiu duas vezes no mesmo **sábado**"*.
  - `edicao-3-cemiterio.md`: lápide do Qt6 **21/jun/2026 — †22/jun/2026**.
- **O problema:** verificado com `date`: **21/06/2026 = domingo, 22/06 = segunda-feira, 23/06 = terça-feira**.
  O fim de semana mais próximo é **20 e 21 de junho** (sábado e domingo). Ou seja: o eixo inteiro da edição
  — "setenta e duas horas de sexta a domingo", "fim de semana", "sábado à noite" — **não existe no
  calendário** nas datas que quatro seções afirmam. Numa revista de build-in-public com data impressa,
  qualquer leitor confere isso em dois segundos. Isto **não é** contradição entre duas seções: é as quatro
  seções concordando entre si e discordando do calendário.
- **Qual está certo:** provavelmente **as datas** (elas vêm do log e do ADR-008 — "22/jun 23h34" tem cara
  de carimbo de commit) e **os dias da semana é que foram inventados** pelo escritor da Reportagem e
  herdados pelo da Galeria e pelo agente do Gus. ⚠️ Mas eu **não posso confirmar isso daqui**: o repo do
  jogo é read-only para esta sessão e eu não conferi o log de commits.
- **Sugestão:** decisão do editor-geral, e **só depois de checar as datas reais dos commits**. Duas saídas:
  (a) se as datas estão certas, **retirar os nomes de dia da semana** de Reportagem, Galeria e Entrevista
  (a Reportagem passa a contar "três dias" / "domingo 21, segunda 22, terça 23" e a Galeria vira "os dias
  22 e 23 de junho"); ou (b) se os eventos foram mesmo num fim de semana (19-21/jun, sexta a domingo),
  **corrigir as datas** em Programação, Cemitério, Galeria e Detonado. As duas saídas mexem em quatro
  seções — não dá para consertar só uma.

### [C-2] Contagem de testes em 22 de junho: 684 × 685 × 752

- **Onde:**
  - `edicao-3-detonado.md`: *"Em 22 de junho de 2026, no dia em que o quadrado azul aprendeu a andar,
    essa mesma bateria tinha **684** testes."*
  - `edicao-3-programacao.md`: *"no mesmo commit da troca, a suíte foi de **685 para 752** testes
    passando"* — e a troca é **22/jun, às 23h34**, o mesmo dia.
- **O problema:** três números diferentes para a mesma suíte no mesmo dia. Pior: o Detonado usa o 684 como
  **linha de base do argumento inteiro** ("2632 é quase quatro vezes mais"). Se a base correta for 752
  (o número ao fim do dia 22), a razão cai para **3,5×** e *"quase quatro vezes"* fica esticado. Se for 685,
  o texto está errado por um.
- **Sugestão:** o editor-geral fixa **um** número e a que momento do dia 22 ele se refere (antes do commit da
  troca = 685; depois = 752), e o Detonado passa a citar esse. Se ficar 752, a frase de comparação precisa
  virar "três vezes e meia".

### [C-3] "essa mesma bateria" em 22/jun — a bateria da arena não existia nessa data

- **Onde:** `edicao-3-detonado.md` — a bateria é apresentada como *"uma bateria de testes que abre a tela de
  arena sozinha"*, e três parágrafos depois: *"Em 22 de junho de 2026 ... **essa mesma bateria** tinha 684
  testes."*
- **O problema:** em 22/jun o jogo tinha acabado de fazer um quadrado andar; **não havia tela de arena**.
  O 684 é (presumivelmente) da suíte inteira, não da bateria da arena. Ao dizer "essa mesma bateria", o
  texto retroprojeta para junho uma coisa que só passou a existir depois — que é exatamente o tipo de
  anacronismo que a regra da cronologia ascendente proíbe, e ainda por cima enfraquece o número.
- **Sugestão:** trocar *"essa mesma bateria"* por algo como *"a suíte inteira"* / *"o conjunto de testes do
  projeto"*, deixando claro que a comparação é do total, não da bateria da arena.

### [C-4] O Cauã teve cara "desde o primeiro dia" (Entrevista) × ganhou o desenho às 21h57 do mesmo fim de semana (Reportagem)

- **Onde:**
  - `edicao-3-entrevista.md` (troca 8, `//` do Gus): *"só que **você tinha cara desde o primeiro dia** e eu
    tenho dezesseis por dezesseis de azul"*.
  - `edicao-3-reportagem.md`: *"**Às 21h57** um retângulo ganhou o primeiro desenho de verdade do jogo.
    Não sou eu — eu continuo um quadrado sem cara. É o Cauã 'Volt', treze anos, o primeiro de nós a existir
    com corpo e cor."*
- **O problema:** contradição de fato. Pela Reportagem, o Cauã ganhou corpo **cinco horas e meia depois** de
  o quadrado dar o primeiro passo, no mesmo dia — não "desde o primeiro dia". O leitor que lê as duas
  seções pega isso.
- **Qual está certo:** a **Reportagem** (é a seção datada, e o horário 21h57 tem cara de registro).
- **Sugestão:** trocar a expressão do `//` por uma que não crave data — *"você já tinha cara"*, *"você
  ganhou cara e eu não"*. A alfinetada não perde nada; ela **não deve** ter data (é a regra da D3).

### [C-5] "seis horas depois" não fecha com 16h32 → 23h34

- **Onde:**
  - `edicao-3-entrevista.md` (troca 5, `//`): *"e **seis horas depois** eu apaguei a camada que fez ele andar"*.
  - `edicao-3-reportagem.md`: primeiro passo **16h32**; descarte da camada **23h34**. Intervalo real: **7h02**.
- **O problema:** o Gus é o personagem que mede tudo; errar o próprio intervalo por uma hora é justamente o
  que ele não faria. E os dois números estão na mesma edição.
- **Sugestão:** *"sete horas depois"*, ou vaguear de propósito (*"umas sete horas depois"*), coerente com o
  *"umas quatro da tarde"* que ele usa na mesma resposta.

### [C-6] A vida do Qt6: "vinte e quatro horas" (Cemitério) × "cerca de um dia" (Reportagem) × "um dia mais ou menos, menos até" (Entrevista)

- **Onde:**
  - `edicao-3-cemiterio.md`: *"**Viveu um dia.**"* e *"**Vinte e quatro horas depois** já tinha sido
    substituído."*
  - `edicao-3-reportagem.md`: *"Ela tinha **cerca de um dia** de vida."*
  - `edicao-3-entrevista.md` (troca 3): *"ela viveu **um dia mais ou menos, menos até**"*.
  - `edicao-3-programacao.md`: *"Ela tinha sido escolhida **um dia antes**."*
- **O problema:** três seções dizem "aproximadamente um dia" ou "menos que um dia"; o **Cemitério crava 24
  horas exatas**. Só é verdade se o Qt6 tiver entrado por volta das 23h30 do dia 21 — o que a Programação
  não afirma. É uma precisão que o resto da edição desmente, e ela está no lugar mais visível (a lápide).
- **Qual está certo:** o **"menos de um dia"** é o mais defensável (a Entrevista é a mais específica e a
  Programação diz "escolhida um dia antes", sem hora).
- **Sugestão:** o Cemitério troca *"Vinte e quatro horas depois"* por *"Menos de um dia depois"* ou *"No dia
  seguinte"*. A lápide *"Viveu um dia."* pode ficar — é epitáfio, não medição.

### [C-7] Dois alicerces (Reportagem, Programação, Entrevista) × três alicerces (Cemitério), na mesma janela

- **Onde:**
  - `edicao-3-cemiterio.md`: *"Desta vez foram **três**"* e o fecho *"**Três alicerces em dois dias**: não é
    obra que desabou, é obra que anda rápido."*
  - `edicao-3-reportagem.md`: *"Setenta e duas horas, **dois alicerces derrubados**, um passo dado."*
  - `edicao-3-programacao.md` (root): *"já quebrei **a fundação duas vezes** em dois dias"*.
  - `edicao-3-entrevista.md` (Cauã): *"você quebrou **a base duas vezes**"*.
- **O problema:** o mesmo fim de semana, a mesma palavra ("alicerce"/"fundação"/"base"), dois números. É
  **conciliável** (o Cemitério enterra Godot 4, C# .NET 8 AOT e Qt6 como três lápides; as outras contam duas
  *trocas* de fundação, porque motor e linguagem saíram juntos), mas o leitor lê "três" numa página e "dois"
  na seguinte, sem nada que reconcilie.
- **Sugestão:** uma cláusula no Cemitério que separe os planos — algo como *"três lápides, duas trocas de
  fundação"* — resolve sem mexer em nenhuma das outras três seções.

### [C-8] O Cemitério se contradiz sozinho sobre em que edição o C# foi anunciado

- **Onde:** `edicao-3-cemiterio.md`, lápide do C# .NET 8 AOT:
  - epitáfio: *"Anunciado em voz alta **na edição passada**. / Enterrado nesta."* → anúncio na **#2**.
  - prosa logo abaixo: *"Quem leu o editorial de junho viu a revista dizendo ... que o mundo agora era
    escrito em C#. **Duas edições depois**, a mesma revista está aqui, de pá na mão."* → anúncio na **#1**.
- **O problema:** "edição passada" e "duas edições depois" não podem ser a mesma edição. Um dos dois está
  errado, e os dois estão a quatro linhas de distância um do outro.
- **Qual está certo:** não dá para saber daqui — depende de qual edição trouxe o anúncio do C#. É consulta
  ao registro de lançamentos / ao texto da #1 e da #2.
- **Sugestão:** o editor-geral confirma a edição do anúncio e alinha as duas frases.

---

## IMPORTANTE

### [I-1] ★ A D3 do "corpo antes do Gus": aparece só nas duas seções certas, mas os tons encostaram

- **Onde:** varredura completa — o fato aparece em **exatamente duas** seções, como manda a D3:
  - **Entrevista** (troca 8), alfinetada, sem data: *"curiosidade: eu já tinha cara, e você era um quadrado.
    dói?"* → resposta longa + `// dói` + *"ninguém para na frente de um quadrado azul pra peguntar quem é
    ele"*.
  - **Reportagem**, fato datado, dito uma vez: *"Às 21h57 um retângulo ganhou o primeiro desenho de verdade
    do jogo. Não sou eu — eu continuo um quadrado sem cara. É o Cauã 'Volt', treze anos, o primeiro de nós a
    existir com corpo e cor."*
  - **Não aparece** em Editorial, Programação, Galeria, Cemitério nem Detonado. ✅
- **O problema (é de tom, não de contagem):** a Reportagem não ficou só factual. *"Não sou eu — eu continuo
  um quadrado sem cara"* e *"o primeiro de nós a existir com corpo e cor"* carregam a mesma mágoa que é o
  material exclusivo da Entrevista — e o **vocabulário é literalmente o mesmo** ("um quadrado sem cara"
  aparece nas duas, verbatim). Quem ler a Reportagem antes chega na Entrevista já tendo sentido o golpe;
  o `// dói` perde parte do efeito.
- **Onde a imagem funciona melhor:** na **Entrevista**, sem discussão — lá ela é o clímax da peça e vem de
  outra pessoa, não do próprio Gus.
- **Sugestão:** a **Reportagem cede**. Reduzir a *"Não sou eu."* (duas palavras, seco, na régua "curto no que
  ele sente") e deixar cair *"o primeiro de nós a existir com corpo e cor"*, ou trocá-lo por algo neutro
  (*"o primeiro do elenco a ganhar desenho"*). O fato datado permanece; a mágoa fica só onde é dela.

### [I-2] "é a primeira coisa que se mexeu na tela" — quase verbatim no Editorial e na Reportagem

- **Onde:**
  - Editorial: *"**É a primeira coisa que se mexeu na tela** desde que comecei..."*
  - Reportagem: *"**É a primeira coisa que se mexeu na tela** em toda a história deste projeto"*
  - (e o Cemitério, na lápide do Qt6: *"mostrou o **primeiro movimento** que este projeto teve"*)
- **O problema:** oito palavras idênticas, mesma posição na frase, mesma voz (Gus), em duas seções que o
  leitor lê **coladas** — o Editorial abre a edição e a Reportagem é a matéria seguinte. É a repetição mais
  visível da edição inteira.
- **Onde funciona melhor:** na **Reportagem** — lá a frase está ancorada num horário (16h32) e é a manchete
  factual da peça. No Editorial ela é enfeite.
- **Sugestão:** o **Editorial cede**. Ele já tem a versão melhor do mesmo fato em duas linhas antes
  (*"Ele anda quando eu mando andar, e para onde eu mando. É pouco."*); a frase da "primeira coisa" pode
  simplesmente sair, ou virar algo sem eco (*"nada tinha se mexido ali até semana passada"*).

### [I-3] "Na edição passada eu escrevi..." — Editorial e Galeria abrem com a mesma fórmula

- **Onde:**
  - Editorial, 1ª linha: *"**Na edição passada eu escrevi** que nem tudo que a gente ergue fica de pé..."*
  - Galeria, 1ª linha: *"**Na edição passada eu escrevi** 'Volte na #3'. Voltaram."*
- **O problema:** duas seções da mesma edição abrindo com a mesma construção de seis palavras, as duas
  fazendo o mesmo movimento (retomar uma promessa da #2). Lendo de ponta a ponta, a segunda soa como tique
  de redação.
- **Onde funciona melhor:** na **Galeria** — lá a fórmula é o setup da piada (*"Voltaram. O que eu tenho para
  mostrar é um boneco que gruda na quina."*) e o timing depende dela.
- **Sugestão:** o **Editorial cede** a fórmula (ele pode entrar direto pela frase citada: *"Escrevi que nem
  tudo que a gente ergue fica de pé, e que isso era problema de outra data."*).

### [I-4] A metáfora da casa é usada em cinco seções, e duas delas constroem a casa inteira

- **Medição (ocorrências de casa/alicerce/fundação/parede/telhado/obra/base/desmontar/derrubar, só pt-BR):**
  Programação **22** · Reportagem **13** · Entrevista **11** · Cemitério **5** · Galeria **3** ·
  Editorial **1** · Detonado **1**.
- **A colisão real são duas, não cinco:**
  - **Programação**, abertura: *"Quantas vezes uma casa pode trocar de alicerce antes de cair? ... Se as
    **paredes, o telhado e a fiação** foram construídos amarrados no alicerce..."*
  - **Reportagem**: *"é como morar numa casa e resolver, num sábado de manhã, que **ela vai ser levantada de
    novo pela sua própria mão, enquanto você ainda está dentro dela**"* — e o fecho *"com as **paredes no
    chão** duas vezes"*.
  As outras três (Entrevista, Cemitério, Editorial) usam só o **vocabulário** (alicerce, base, obra, erguer),
  sem construir a analogia — isso é coesão de edição, não repetição, e deve ficar.
- **Onde funciona melhor:** na **Programação** — a casa não é ilustração ali, é a **estrutura do argumento**
  (a peça inteira responde à pergunta que a casa formula, e a resposta técnica — a camada que pensa não sabe
  quem desenha — só faz sentido dentro dela).
- **Sugestão:** a **Reportagem cede a analogia estendida**. Ela pode manter uma frase curta de casa e cortar
  o desdobramento ("levantada de novo pela sua própria mão, enquanto você ainda está dentro dela"), ou trocar
  a imagem por outra do mesmo campo semântico que ela já usa e a Programação não (o *"ombro que desliza na
  parede do corredor"*, que é ótimo e é só dela).

### [I-5] "aprender/aprendeu a andar" quatro vezes, em três seções

- **Onde:** Reportagem (fecho: *"escolheu justamente aquele fim de semana para **aprender a andar**"*) ·
  Galeria **duas vezes** (*"tinha acabado de **aprender a andar**"* e *"no commit em que o quadrado
  **aprendeu a andar**"*) · Detonado (*"no dia em que o quadrado azul **aprendeu a andar**"*).
- **O problema:** o fecho da Reportagem é a melhor frase da edição e depende de a expressão chegar **nova** ao
  leitor. Ela chega gasta se a Galeria e o Detonado já a usaram como carimbo de data.
- **Onde funciona melhor:** no **fecho da Reportagem**, com folga.
- **Sugestão:** Galeria e Detonado cedem — nos dois casos a expressão é só âncora temporal e troca por
  *"no dia do primeiro passo"* / *"no commit do primeiro passo"* sem perder nada. E a Galeria deve, de todo
  modo, não repeti-la duas vezes dentro de si mesma.

### [I-6] "o quadrado andando de um lado para o outro" — Editorial e Cemitério, quase igual

- **Onde:**
  - Editorial (`//`): *"eu fiquei um tempo **andando com ele de um lado pro outro**"*
  - Cemitério (lápide do Qt6): *"o **quadrado andando de um lado para o outro**, que é a coisa mais boba do
    mundo e foi a mais importante"*
  - (e a Entrevista tem a terceira variação: *"só pra ver ele **ir e voltar, ir e voltar**"*)
- **O problema:** três formulações da mesma imagem. A da Entrevista é diferente o bastante (a repetição
  "ir e voltar" **é** o efeito); as do Editorial e do Cemitério são a mesma frase.
- **Onde funciona melhor:** no **Editorial** — lá ela é confissão (*"Testando, digamos."*) e prepara o
  fecho do `//`.
- **Sugestão:** o **Cemitério cede** — a lápide já tem *"fez o quadrado azul andar"* no epitáfio; a prosa pode
  dizer *"o primeiro movimento que este projeto teve"* e parar aí.

### [I-7] O mesmo argumento econômico ("doer agora é mais barato") em três seções — com números que divergem

- **Onde:**
  - Entrevista: *"é mais barato doer agora, **um dia de trabalho jogado fora agora vale umas cinco semanas
    depois**, eu calculei antes, **não foi impulso**"*
  - Programação: *"a diferença entre pagar essa dívida em junho de 2026 ... e pagá-la depois ... é a diferença
    entre **um dia e um trimestre**"* e *"**Não foi impulso**: foi a leitura de que aquele era o momento mais
    barato que existiria"*
  - Reportagem: *"A segunda escolha era melhor a longo prazo, e o longo prazo ganha sempre."*
- **O problema:** duplo. (a) O **mesmo raciocínio** aparece três vezes, e duas delas com a **mesma negação
  verbatim** ("não foi impulso") — em vozes que deveriam soar diferentes (Gus × root). (b) O **preço da
  procrastinação muda**: cinco semanas (Entrevista) × um trimestre, ~13 semanas (Programação). Não é
  contradição fechada (são estimativas de coisas ligeiramente diferentes), mas estão na mesma edição.
- **Onde funciona melhor:** na **Programação** — é a tese declarada da peça, e lá o argumento tem tabela,
  custo aceito e conclusão. Na Entrevista a força não está no argumento e sim no que vem depois dele
  (*"eu sei que parece impulso quando conto rápido assim"*, que é caracterização pura e deve ficar).
- **Sugestão:** a **Programação cede o "Não foi impulso"** (ela pode dizer *"Não foi arroubo"* / *"Não foi
  reação"*), e o editor-geral escolhe **um** múltiplo (cinco semanas ou um trimestre) para as duas seções, ou
  deixa a Entrevista sem número.

### [I-8] O Cemitério é a única das sete seções sem linha de prompt

- **Onde:** contagem de `@glyfesse` no conteúdo publicado — Entrevista 18, Programação 18, Detonado 4,
  Editorial 2, Galeria 2, Reportagem 2, **Cemitério 0**.
- **O problema:** as outras seis abrem com `nome@glyfesse:~/seção$`; o Cemitério entra direto na prosa. Como
  a #3 é justamente a edição que **estreia o formato novo do prompt**, a seção sem prompt vira buraco de
  sistema na página. (Pode ser desenho — a peça é feita de lápides —, mas nenhuma nota de produção declara
  isso.)
- **Sugestão:** decisão do editor-geral. Se for para uniformizar, `gus@glyfesse:~/cemiterio$ cemitério das
  ideias mortas` (caminho **sem acento**, título com acento, como o Detonado já faz).

### [I-9] Os `//` do Gus na Galeria vêm com maiúscula e ponto final; nas outras seções, não

- **Onde:**
  - Galeria — três apartes: *"`// Prometido é prometido. Nunca disse que era grande.`"* ·
    *"`// O registro serve para a data. Para o fato, não serve.`"* ·
    *"`// Esse é o tipo de defeito que ninguém prevê porque ninguém pensa nele. ... Acontece.`"*
  - Editorial — nove linhas, todas minúsculas, **nenhuma** com ponto final.
  - Entrevista — todos os `//` do Gus minúsculos e sem ponto final.
- **O problema:** a regra de voz diz que os `//` do Gus não levam ponto final. Os três da Galeria levam, e
  ainda começam com maiúscula. Ficam parecendo legenda editorial, não pensamento dele. ⚠️ Note que isto é
  **independente** da decisão de layout já tomada (aparte curto embutido × bloco no fim): a forma pode mudar,
  a pontuação não deveria.
- **Sugestão:** ou a Galeria se alinha (minúscula, sem ponto final), ou o editor-geral canoniza
  explicitamente que **o aparte-piada leva pontuação e o bloco-confissão não** — mas aí isso precisa estar
  escrito, senão o copyedit vai "consertar" um dos dois.

### [I-10] A Entrevista não tem versão EN

- **Onde:** `edicao-3-entrevista.md` — só existe `## O texto (pt-br)`. Todas as outras seis têm `## pt-BR` e
  `## EN`.
- **O problema:** é a única lacuna de paridade da edição, e é a seção mais longa e mais difícil de traduzir
  (nove `//` crus, errinhos de digitação deliberados, registro oral). Está declarada como pendência nas notas,
  mas é o item de maior risco de cronograma da #3.
- **Sugestão:** ⚠️ quando for traduzida, os **errinhos de digitação precisam ser recriados em inglês**, não
  transliterados — e nenhum deles pode repetir o outro (ver [K-1]).

### [I-11] Erro de tradução no `//` do Editorial (EN)

- **Onde:**
  - pt: *"// estava adiado, que é diferente, e eu sabia"*
  - EN: *"// **it postponed it**, which is a different thing, and I knew that"*
- **O problema:** a linha pt contrapõe *"achei que estava adiando"* (ação dele) a *"estava adiado"* (estado
  da coisa) — é toda a piada da autocobrança. A EN diz "isso adiou isso", que não tem sujeito nem sentido, e
  perde a oposição inteira.
- **Sugestão:** algo como *"// it **was** postponed, which is a different thing, and I knew that"*.

### [I-12] "ele não trava: ele desliza pela parede" (Reportagem) × "raspar num canto e ficar por ali" (Galeria)

- **Onde:**
  - Reportagem: *"E quando raspa numa parede em diagonal, **ele não trava: ele desliza pela parede**"*
  - Galeria: *"a primeira coisa que fez com a liberdade foi **raspar num canto e ficar por ali**. Havia
    passagem do lado. **Ele não quis.**"*
- **O problema:** tecnicamente **não** é contradição (deslizar ao longo de uma parede e prender numa quina são
  fenômenos diferentes, e o próprio Gus separa os dois na Entrevista). Mas o leitor lê, na matéria de capa,
  "ele não trava" e, três seções depois, "ele ficou preso" — com o mesmo verbo ("raspar") nas duas. Sem uma
  palavra de desambiguação, parece que uma das duas está mentindo.
- **Sugestão:** uma cláusula na Galeria que nomeie a diferença — *"parede ele já sabia contornar; **quina**,
  não"* — resolve e ainda melhora a piada.

---

## COSMÉTICO

### [K-1] Os 11 errinhos de digitação da edição — nenhum se repete, mas uma CLASSE se repete quatro vezes

Todos estão na Entrevista (as demais seções são prosa de revista e não têm nenhum — conferido). Lista
completa, com a troca:

| # | Errinho | Certo | Onde | Classe |
|---|---|---|---|---|
| 1 | `voce` | você | troca 1, **fala** | acento caído |
| 2 | `dificil` | difícil | troca 2, `//` | acento caído |
| 3 | `qeu` | que | troca 3, **fala** | transposição |
| 4 | `ta` (em "ela ta torta") | tá | troca 3, **fala** | acento caído |
| 5 | `ningeum` | ninguém | troca 3, `//` | transposição |
| 6 | `obdece` | obedece | troca 5, `//` | transposição |
| 7 | `alra` (em "voz alra") | alta | troca 6, `//` | transposição |
| 8 | `lsita` | lista | troca 7, `//` | transposição |
| 9 | `numero` | número | troca 7, `//` | acento caído |
| 10 | `peguntar` | perguntar | troca 8, `//` | omissão |
| 11 | `dezessies` | dezesseis | troca 8, `//` | transposição |

- ✅ **Nenhum errinho idêntico se repete** — a correção da v0.3 (o `qeu` duplicado) segurou.
- ⚠️ **Mas a classe "acento caído" aparece 4×** (`voce`, `dificil`, `numero`, `ta`) — e uma quinta vez
  parcialmente em `ningeum`. Quatro acentos que somem em nove trocas podem ler como *"ele não acentua"*
  (sistema, personagem descuidado) em vez de *"a mão escorregou"*. O canon é o contrário: a mão erra, o
  raciocínio não.
- ✅ Todos estão em **fala de prompt** ou em `//`. **Nenhum na prosa de revista** (Editorial, Reportagem,
  Programação, Galeria, Cemitério, Detonado): varredura limpa.
- **Sugestão:** decisão do editor-geral — se quiser, converter um ou dois dos acentos caídos em transposição
  (`voce` → `vcoê` é feio; `numero` → `númreo` funciona), mantendo o total. Não é defeito, é dosagem.

### [K-2] O registro oral do Gus usa pronome oblíquo colloquial de forma sistemática

- **Onde (Entrevista):** *"eu raspei **ele** na parede"*, *"empurrar **ele** o mínimo"*, *"pra ver **ele** ir e
  voltar"*, *"eu montei **ela** inteira na cabeça"*, *"fingindo que dava"*, *"fez **ele** andar"*.
- **Leitura:** **não** é erro de gramática no sentido do canon — é registro oral brasileiro consistente, em
  fala transcrita. Está uniforme nas nove trocas e não vaza para a prosa de revista dele. **Registro para
  que o copyedit formal NÃO "conserte"** — se o `revisor-textual` normalizar isso para "raspei-o", a voz
  morre.

### [K-3] Gramática/estilo que o copyedit ainda não viu (a Reportagem é a única com GATE-CONTEUDO aprovado)

- Reportagem: *"e no lugar dele **entrou nada**"* — em pt-BR padrão o "nada" pós-verbal pede a negativa
  ("não entrou nada" / "nada entrou"). Pode ser escolha de ritmo; é decisão do copyedit, não minha.
- Reportagem: *"Então **diga** assim:"* — imperativo dirigido ao leitor onde o natural seria "digamos assim"
  / "então é assim". Soa como decalque do inglês ("put it this way"), que é literalmente o que a versão EN
  traz.
- Galeria: *"quando **o jogador** raspa numa quina, o programa **o** empurra"* — o sujeito do parágrafo era
  o boneco/quadrado e vira o jogador no meio da frase, sem transição. Coesão.
- Detonado: *"ordem da vez respeitada em 3 lados"* — "3 lados" é a única pista numérica de estrutura de
  combate na seção; não nomeia mecânica nenhuma, mas registro para o GATE-SPOILER conferir se três lados já
  pode ser dito.

### [K-4] "O registro daquele dia" — Reportagem cita, Galeria desmente

- Reportagem: *"**O registro daquele dia** diz, com essas palavras: placeholders sem sprite, decisão do root."*
- Galeria: *"**O registro daquele dia** atribui o achado ao `root`. **O registro está impreciso.**"*
- **Leitura:** é repetição de construção, mas **funciona a favor**: a Reportagem ensina o leitor a confiar no
  registro e a Galeria puxa o tapete com a mesma fórmula. Não mexer — só registrar que é deliberado, para
  que ninguém "desrepita" no copyedit.

### [K-5] A Reportagem diz "sexta-feira" e, na frase seguinte, usa "sábado de manhã" na analogia

- *"**Na sexta-feira** decidimos derrubar tudo. ... é como morar numa casa e resolver, **num sábado de
  manhã**, que ela vai ser levantada de novo..."*
- Cacoete: a analogia troca o dia sem motivo, dois períodos depois de o dia real ser dado. Se o [C-1] for
  resolvido tirando os dias da semana, isto some junto.

### [K-6] "tava pronta desde março" antecede o início do projeto

- Entrevista, troca 9 (`//`): *"tava pronta desde **março**, eu montei ela inteira na cabeça voltando da
  escola, no ônibus"*.
- O Cemitério data o nascimento do projeto em **19/mai/2026**. Uma resposta sobre "ordem de construção"
  pronta desde março existe antes de haver o que construir. **Não é violação de cronologia** (é história
  pessoal do personagem, e retroceder não quebra a regra de ordem ascendente), e a imagem é das melhores da
  peça. Registro só para o editor-geral confirmar que o Gus personagem já pensava nisso antes do projeto.

### [K-7] "pode vencer em 2031" (Programação)

- Menção a data futura, mas **hipotética** (a dívida técnica pode vencer a qualquer momento), não narração de
  fato futuro. **Não é quebra de cronologia.** Registrado por transparência, já que a varredura o encontrou.

---

## VARREDURAS (resultado, mesmo quando é zero)

Método: extraí de cada arquivo **só o conteúdo publicado** (do primeiro `---` até antes de
`## Notas de produção`), preservando os epitáfios em citação do Cemitério, e rodei `grep -niE` com fronteira
de palavra (`\b`) sobre os sete corpos, pt-BR **e** EN.

| Varredura | Resultado |
|---|---|
| **Rótulo clínico** (superdotado, altas habilidades, AHSD, prodígio, neurodivergente, gênio, TDAH, gifted, ADHD, genius) | **0 ocorrências** nas 7 seções |
| **Esforço inventado** (estuda/estudou muito, se dedicou, dedicado, aplicado, esforçado, disciplinado, focado nos estudos, studies hard, diligent, hard-working) | **0 ocorrências**. A Galeria resolve pelo avesso: *"Ele lê sobre como se fazem jogos **porque gosta**"* |
| **Profissão/formação/condição de família** | **0 ocorrências**. Nenhuma pessoa da família é descrita; o mais perto é o Editorial (*"eu chamei alguém pra ver"*, sem identificar) e a Entrevista (*"no jantar"*) |
| **Infantilização** ("que fofo", fofinho, criancinha, cute, adorable) | **0 ocorrências** |
| **Profanidade** (pt e en, com `\b`) | **0 ocorrências**. ⚠️ Sem `\b` o `grep` dá **falso positivo**: `puta` casa dentro de "com**puta**dor" no Cemitério — não é palavrão |
| **Nome de batismo de criança** | **0 ocorrências**. Só **"Gus"** (personagem), **"Gus Dragon, playtester, 11 anos"** (Galeria e Detonado) e **"Cauã 'Volt'"** (Reportagem, Entrevista, Galeria, Detonado) |
| **Tentativa 3D** (`\b3d\b`, tridimensional, três dimensões, three dimensions) | **0 ocorrências nas 7 seções**, nem insinuada, nem prometida. ✅ O corte segurou |
| **Biblioteca gráfica própria do projeto** | **0 ocorrências**. Nomes de tecnologia encontrados: **Qt6** (Programação, Cemitério), **SDL3** (Programação), **C++20** (Programação), **Godot 4** (Cemitério), **C# .NET 8 AOT** (Cemitério) — todos na lista permitida. Nenhum outro |
| **Mecânica citada por nome** (carta, deck, mestre, baralho, mana, buff, skill, atributo, classe, XP, level up) | **0 ocorrências**. O único hit de "carta" é o Editorial falando da **carta** (texto epistolar), não de mecânica. O Detonado descreve tudo por função ("o que ataca", "a ordem da vez", "alvo inválido") |
| **Cronologia — julho ou depois** | **exatamente as 2 exceções autorizadas**: Cemitério, *"o corpo ficou instalado no computador até **22 de julho**"*; Galeria, *"**Voltou um mês depois**"* (tabela, uma linha, sem contar história). Mais o **estado de hoje** do Detonado (2632/2632), autorizado por ser seção de serviço. **Nenhuma outra** |
| **Antecipação implícita da próxima edição** | **0 ocorrências**. Nenhuma seção promete "na #4", nem insinua o que vem. O Cemitério, que era o risco, silencia completamente |
| **O criador nomeado de outro jeito** ("o líder", "o criador", "quem manda", nome próprio) | **0 ocorrências no texto publicado**. Ele é `root` nas 4 seções em que aparece (Reportagem 2×, Programação, Galeria, Detonado). Os 2 hits de "in charge" na EN da Programação são falso positivo (*"Qt6 in charge of the windowing layer"*, *"whoever happens to be in charge of showing it"* — nenhum é o criador) |
| **Formato do prompt** (`nome@glyfesse:~/seção$`, caminho sem acento) | **6 de 7 conformes**. Nenhuma ocorrência do formato antigo `nome@glyfesse>`; **nenhum acento em caminho** (`~/editorial`, `~/reportagem`, `~/entrevista`, `~/programacao`, `~/galeria`, `~/detonado`). ⚠️ Duas observações: o **Cemitério não tem prompt nenhum** (ver [I-8]) e a **desculpa furada da Programação usa `root@glyfesse:~$`** (home, não `~/programacao`) — parece deliberado (ele só entra na seção depois, com o `nano`), mas não está declarado em lugar nenhum |
| **Fala do Gus em linha de prompt sem ponto final** | ✅ **conforme nas 7 seções**. As 9 falas da Entrevista terminam sem ponto; as linhas de comando do Editorial, Reportagem, Galeria e Detonado idem |
| **`//` do Gus sem ponto final** | ✅ Editorial (9 linhas) e Entrevista (todos) conformes; ⚠️ **Galeria: 3 apartes com maiúscula e ponto final** (ver [I-9]) |
| **Falas do Cauã com ponto final** | Ele **usa** ponto final (2 das 9 perguntas terminam em ponto; as outras em `?`). **Não é achado** — a regra do canon é do Gus, e as notas da Entrevista confirmam. Registro para o copyedit não uniformizar |
| **Erro de digitação fora de fala/`//`** | **0 ocorrências**. As seis seções de prosa de revista estão limpas; os 11 errinhos estão todos na Entrevista, em fala ou `//` (ver [K-1]) |
| **Errinho idêntico repetido** | **0** — os 11 são palavras distintas |
| **Gramática do Gus** | **0 erros de concordância, regência ou sintaxe** encontrados. O que aparece é registro oral consistente (pronome oblíquo colloquial, ver [K-2]) e 3 pontos de estilo para o copyedit (ver [K-3]) |
| **Paridade pt-BR × EN — parágrafos** | Cemitério 9/9 · Editorial 5/5 · Galeria 19/19 · Programação 25/25 · Reportagem 12/12 · Detonado 18/19 (o extra é a **glosa em português** da fala do `root`, deliberada) · **Entrevista: EN inexistente** (ver [I-10]) |
| **Paridade pt-BR × EN — números** | ✅ **idênticos em todas as seções bilíngues**. Reportagem converte corretamente (16h32→4:32 p.m., 21h57→9:57 p.m., 23h34→11:34 p.m., 21h11→9:11 p.m.); Programação mantém 685/752/590/67/2031/ADR-008; Detonado mantém 684/2632; Galeria mantém 11/22/23/4/8; Cemitério mantém as 6 datas |
| **Trecho em português dentro da EN** | **2 ocorrências, ambas deliberadas e declaradas**: a citação verbatim do ADR-008 na Programação (com tradução entre parênteses logo abaixo) e a fala do `root` no Detonado (que precisa ser byte-idêntica, com glosa). ✅ As duas linhas de transição `//` da Programação, que tinham ficado em português, **já foram corrigidas** pelo integrador |
| **Trecho em inglês dentro do pt-BR** | **0 ocorrências** |
| **Frase presente num idioma e ausente no outro** | **0 ocorrências** nas seis seções bilíngues |

---

## O QUE ESTÁ CERTO E EU CONFERI

Declarado explicitamente, inclusive o que deu zero:

1. **A regra D3 do "corpo antes do Gus" foi respeitada na CONTAGEM.** O fato aparece em **exatamente duas**
   seções — Entrevista (alfinetada, sem data) e Reportagem (fato datado, uma vez) — e em **nenhuma** das
   outras cinco. Varri as sete. O que não passou foi o **tom** da Reportagem, que encostou no da Entrevista
   (ver [I-1]).
2. **A tentativa 3D não aparece em lugar nenhum.** Zero ocorrências nas sete seções, em pt e EN, nem
   insinuação, nem promessa. Este era o risco declarado do Cemitério e ele segurou.
3. **Nenhum rótulo clínico, nenhum "estuda muito", nenhuma infantilização, nenhuma profanidade, nenhum nome
   de batismo.** Zero em todas as varreduras, nas sete seções, nos dois idiomas.
4. **Nenhuma tecnologia fora da lista permitida.** A biblioteca gráfica própria do projeto não vaza em
   nenhuma seção — inclusive na Programação, que é onde seria mais fácil escorregar, e que ainda **usa isso
   como argumento** (*"Ela não conhece o nome de nenhuma biblioteca gráfica"*).
5. **Nenhuma mecânica citada por nome.** O Detonado, que era o risco máximo, descreve combate por turnos
   inteiro sem nomear uma regra sequer.
6. **As tarjas do Detonado são todas idênticas** (`▮▮▮`, 6 ocorrências, 3 em cada idioma) — a largura não
   entrega contagem de letras. Conferido no texto, não presumido da nota.
7. **A cronologia está limpa fora das exceções autorizadas.** As duas exceções previstas (22/jul do Godot no
   Cemitério; "voltou um mês depois" na Galeria) estão lá, exatamente uma vez cada, e o estado-de-hoje do
   Detonado é o terceiro caso autorizado. Nada mais posterior a junho. **Nenhuma antecipação da #4.**
8. **O criador é `root` em todas as ocorrências.** Nunca "o líder", nunca "o criador", nunca nomeado — nas
   quatro seções em que ele aparece, nos dois idiomas.
9. **O formato novo do prompt está correto onde existe:** zero ocorrências do formato antigo `nome@glyfesse>`
   e **zero acentos em caminho**. (As duas ressalvas de forma estão em [I-8] e na tabela.)
10. **As falas de prompt do Gus e os `//` dele não levam ponto final** — conferido linha a linha nas sete
    seções. A única exceção são os 3 apartes da Galeria ([I-9]).
11. **A gramática do Gus está perfeita.** Nenhum erro de concordância, regência ou sintaxe. Os errinhos são
    todos mecânicos, todos em fala ou `//`, **nenhum na prosa de revista**, e **nenhum repetido**.
12. **A paridade pt-BR × EN é integral nas seis seções bilíngues** — parágrafos, números, horários
    convertidos, nenhuma frase órfã em nenhum dos dois lados. As duas passagens em português dentro da EN
    são deliberadas e vêm com tradução.
13. **A aritmética interna de cada seção fecha:** 752 − 685 = 67 (Programação, que afirma "subiu 67") e
    2632 ÷ 684 = 3,85 → "quase quatro vezes" (Detonado). O que não fecha é **entre** seções (ver [C-2]).

---

## RESUMO PARA DECISÃO

- **8 críticos**, e sete deles são **numéricos ou de calendário**, não de escrita. O [C-1] (dias da semana ×
  datas) é o único que exige **consultar fonte externa** (o log de commits do jogo) antes de decidir, e ele
  toca **quatro seções**. Recomendo resolver o [C-1] primeiro: [C-5], [C-6] e [K-5] mudam de forma
  dependendo do que for decidido nele.
- **12 importantes**, dos quais **6 são repetição entre seções** — o preço esperado de cinco escritores cegos
  uns aos outros. Em todos eu indiquei qual seção fica com a imagem e qual cede.
- **O que me preocupa mais não é achado nenhum da lista:** é que a **Entrevista não tem EN** e é a peça mais
  difícil de traduzir da edição inteira (nove `//` crus, registro oral, onze errinhos deliberados que
  precisam ser **recriados**, não transliterados).
