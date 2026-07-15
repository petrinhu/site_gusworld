# Conceito do site GusWorld

> **Status:** Rascunho de conceito, v0.1 (2026-07-15). Consolida o primeiro brainstorm com o líder.
> **Nada aqui é implementação.** Stack, identidade visual e mobile continuam em aberto.
> **Fonte:** as memórias da sessão em `~/.claude/projects/-home-petrus-...-site-gusworld/memory/`.

---

## 1. O que este site é

**Um site publicitário de teasing, centrado em UX.** Publicidade é parte do marketing, e quando não há o que vender ainda, o que se cria é expectativa.

**A régua, nas palavras do líder:**

> "Se for maçante eu não quero. O foco é teasing, não existe teasing 'parado'. Temos que sacudir as pessoas, gerar boa experiência, CRIAR EXPECTATIVAS no V1.0, gerar pensamentos de **'LANCE LOGO ESSE JOGO, NÃO AGUENTO MAIS ESPERAR'**."

**Anti-alvo declarado:** "uma peça publicitária fria de lançamento de um sedã preto para um grupo de empresários idosos sem graça".

**Teste de toda proposta:** *isso sacode alguém, ou é só correto?* Correto-e-morto reprova.

**Em uma frase:** o site não conta que o jogo está vindo. Ele faz a pessoa **sentir falta de um jogo que ela nunca jogou**.

### A vantagem estrutural

O líder tem uma coisa que quase nenhum estúdio tem: **o direito de mostrar o feio**. Uma publisher não pode publicar o quadradinho de maio. Ele pode, e é exatamente isso que emociona.

Corolário verificado na pesquisa: a equipe de Hypnospace Outlaw gastou meses **piorando de propósito** o que já estava bom. Um estúdio precisa pagar caro para produzir feiura convincente. **Onde o líder lê "não sou artista digital", esta estética lê "não vai estragar".**

---

## 2. A metáfora-mãe: revista dos anos 90 + Diário do Gus

**A revista é a casca. O Diário é a voz.**

- **Revista de videogame dos anos 90** (Ação Games, SuperGamePower): edições, capa, sumário, seções fixas, cupom recortável. Resolve o problema estrutural do projeto: **revista tem edição, e edição sai quando sai. A demora vira formato, não defeito.**
- **O Diário do Gus** (a wiki in-game, já canônica no jogo) vazando para fora: quem escreve é um moleque de 11 anos.

### Por que a fusão é melhor que as duas separadas

**A revista dos anos 90 já resolvia leigo x expert sozinha.** As revistas brasileiras tinham **detonado** (para quem só jogava) **e seção de programação** (para quem queria fazer), na mesma publicação, sem conflito. O problema que este projeto tentava resolver com "duas trilhas de copy" foi resolvido em 1994, com **sumário** em vez de arquitetura de informação.

E o modelo **Bluey** explica o resto: não é "agrada aos dois", são **duas camadas simultâneas no mesmo objeto**. A revista é a camada do adulto (formato, diagramação, a nota até 5.0). O Diário é a camada da criança. **Ninguém precisa entender a camada do outro para se divertir.**

**O Sylvarin é a terceira camada, e a única que os dois querem decifrar JUNTOS** — um idioma inventado não tem público-alvo: nem o pai nem o filho sabem o que quer dizer. É o único elemento que iguala os dois.

### O aviso da história

A Ação Games criou, em 2000, o **Frango**: um personagem que respondia leitor com grosseria e falava mal da própria revista. Os leitores rejeitaram, e as fontes ligam essa fase ao fim da revista em 2002.

**A voz insolente precisa de AFETO junto, ou vira desprezo pelo leitor. O Frango odiava a revista. O Gus ama o jogo dele. Essa é a diferença inteira.**

---

## 3. O público

**Os dois eixos, ambos** (decisão do líder):

| | Leigo | Expert |
|---|---|---|
| **11-15** | joga; entra pelo jogo em si | existe, mas não é massa |
| **30-45** | **saudoso dos jogos antigos** | dev / imprensa técnica |

**O detalhe que impede isso de virar "todo mundo":** *"adultos leigos são apenas aqueles saudosos dos jogos antigos"*. Não é adulto genérico: é nostalgia de infância.

**A ponte:** o jogo é deliberadamente 16-bit-like. **O mesmo artefato é novidade para um e memória para o outro.**

**A faixa primária ficou em aberto — e a fusão revista+Diário pode tê-la resolvido:** quem escreve tem 11 anos, então a criança se identifica; o objeto é uma revista, então o adulto reconhece.

**Alerta:** a criança de 2026 **nunca segurou uma revista**. Sumário, "continua na pág. 47" e "recorte o cupom" são gestos mortos para ela. **A revista tem que funcionar como BRINQUEDO primeiro (ela mexe, algo acontece) e como MEMÓRIA depois.** Se inverter, o adulto sorri e a criança sai em 4 segundos.

---

## 4. A voz

**O Gus escreve quase tudo. O líder quase não aparece** (assina só o que o Gus não poderia: ADR, decisão técnica, a seção de programação).

**Isso é deliberado, e ecoa o canon:** o Pyotor (pai do Gus) é itinerante, manda **3 ou 4 cartas no jogo inteiro**, e o bilhete de aniversário diz apenas *"Filho, parabéns. Use bem. Pai."* O doc canônico classifica: **"presente em ausência; ama-se sem articulação"**. O líder assinando pouco e seco **é o Pyotor** — e o site inteiro é a prova de amor que o bilhete não diz.

### A voz do Gus (canônica, `gus.md` do repo do jogo)

- **Vocabulário:** técnico aplicado a tudo. Canônico: chama almoço de **"input calórico"**.
- **Sintaxe:** frases curtas declarativas.
- **Tic:** pausa de 1 segundo antes de falar quando processa.
- **Flaw:** evita custo emocional via tecnicismo. **Nunca verbaliza sentimento direto; sempre metáfora técnica.**
- **Profanidade ZERO** (Pillar 4): "que horror" é o palavrão máximo. **O humor não pode vir de grosseria: vem do tecnicismo.**

**As reticências são a assinatura.** Quote canônica: *"Ele não morreu. Ele... segfaultou."* Aquelas reticências **são** a pausa de 1 segundo: o momento em que ele quase sente algo e desvia para o técnico. Engraçado e triste no mesmo fôlego. **Só nas horas em que ele quase sente algo** (vira sinal: quem repara entende que ali doeu). **Sem truque de tela** — nada de delay animado ou efeito de digitação.

**Como soa:**

> **AGORA EU ANDO NA DIAGONAL.**
> Antes eu tinha 4 vetores. Agora tenho 8. É o dobro.
>
> Consertaram o bug em que eu atravessava a parede. Eu... gostava dele.
>
> O menu tem 4 botões. Levou 3 semanas. Não vou fazer a divisão.

**Mecânica:** certinho demais para a idade (prodígio tentando soar adulto comove mais que criança errando português); erra de propósito com parcimônia; nota de rodapé obsessiva (ele **é** um wiki ambulante).

---

## 5. O coração

**O wound do Gus é isolamento:** "a única criança da rua que entendia C-Arcane aos 7 anos; isolado por excesso de inteligência". A mãe, à diretora: *"ele talvez precise de uma escola que não esteja com medo dele."*

**Logo: um site onde o Gus mostra suas coisas para estranhos e pergunta "você gostou?" não é marketing. É a criança que ninguém entendia finalmente procurando alguém que entenda. O teasing e a ferida do personagem são a MESMA coisa.**

**Nunca dito, só sentido.** Quem repara, se comove. Quem não repara, só acha o moleque simpático.

---

## 6. O arco completo

1. **A revista conta a espera.** Edições numeradas.
2. **O jogo sai.**
3. **O Gus para de escrever. O site vira arquivo.** No dia em que as pessoas podem **entrar** no mundo dele, ele não precisa mais perguntar "você gostou?". Elas estão lá dentro. **O silêncio é a ferida cicatrizando** — o site não é abandonado, ele cumpriu.
4. **A última edição anuncia o livro.** (A revista morre entregando a próxima coisa, que é o que a última página de revista sempre fez.)
5. **O livro fixa o universo depois.**

### A inversão (tese do líder)

> "Será a lore em forma de romance ficcional, como Senhor dos Anéis. **E vai inverter. PRIMEIRO o jogo. Depois o livro, pra fixar o universo. O contrário de Duna, Sr dos Anéis etc.**"

Tolkien, Herbert, Martin: livro primeiro, adaptação depois, e a adaptação sempre decepciona porque o livro já fixou o universo. **Aqui o jogo fixa e o livro aprofunda.** Ninguém vai dizer "no livro era melhor", porque o jogo veio antes.

**E isso resolve o risco de bait-and-switch de graça:** o livro não é upsell do jogo, é **a obra seguinte**, e chega **depois** de o jogo ter sido dado de graça. Prova a promessa em vez de contradizê-la.

---

## 7. As peças escolhidas

### A primeira dobra

- **O quadradinho jogável.** Abre com o quadrado de maio numa sala vazia. Setinhas movem. Sem graça de propósito, 5 segundos. Então **vira o Gus** (4 direções, diagonal, aparelho, antena). A pessoa **sente** a evolução na mão.
- **A linha do tempo jogável.** Todos os estágios: maio (quadrado), junho (boneco de um lado só), julho (diagonal), agosto (cockpit). Arrasta o tempo, o jogo evolui. **Cada marco novo estica a linha sozinho: a home fica mais impressionante enquanto o líder trabalha.**
- **PRESS START** piscando sobre a key art da Catedral-Mãe.
- **A capa da edição** com chamadas ("EXCLUSIVO: o menino agora anda na diagonal!").

### As seções da revista

- **A entrevista: o Gus entrevista o líder.**
- **A NOTA do próprio jogo inacabado.** "Gráficos: 6 (o Gus só anda pra um lado). Som: 0 (não existe ainda)." **A nota sobe a cada edição.** O build-in-public virado placar.
- **O pôster central** (a `catedral_mae.png` já é isso).
- **O brinde colado na capa**: wallpaper, a fonte `PixelOperatorMono` (CC0, pode dar mesmo), sprites.
- **Classificados in-world**: "Vende-se Tavus-Drive usado, aceito troca." Lore por osmose.
- **A HQ**: tirinha de 3-4 quadrinhos (proposta do líder; resolve animação cara com quadros estáticos).
- **Próximos lançamentos: a tabela VAZIA.** Expectativa sem prometer calendário.
- **Errata + cartas com deboche.** "Na edição passada dissemos que o Gus andava. Ele não andava."
- **A seção de PROGRAMAÇÃO**: o eixo expert, dentro da metáfora. A engine C++ vira essa seção.

### A estrutura

- **A BANCA como home**: edições enfileiradas, o arquivo **vira** a home.
- **Assinatura com cara de revista** (RSS/newsletter vestidos de cupom, "R$ 0,00").
- **Ficha técnica + selo falso** ("Memória: 4 MB", "AGUARDADÍSSIMO").

### O feio (só o líder pode)

- **A galeria de bugs**: o bug com legenda rindo.
- **O cemitério das ideias mortas**: Godot, Qt6, o 3D cel-shaded. Já escrito nos ADRs e no CHANGELOG.
- **Botão CRT/scanline.**
- **Detonado do jogo que não existe**: páginas em branco e "AGUARDE".

### Participação

- **O cupom recortável**: pontilhado, tesoura, resultado na **próxima edição**. **A lentidão vira estética.**
- **O Rimesse**: o placar não conta votos, conta **consequências**. "7 coisas neste jogo existem porque alguém votou aqui", com prova visual. **Funciona com número pequeno** (12 votos comunica projeto morto; 7 consequências comunica projeto que ouve).
- **A Glyfa**: forja de nomes em Sylvarin (raiz + raiz, mostra o significado na hora). **Vocabulário fechado não pode gerar palavrão** — é o que torna participação criativa viável com público infantil e um dev só.
- **O álbum de figurinhas**: personagens como figurinhas, ganhas visitando/votando/achando segredo. `localStorage`. **Criança cola álbum; adulto colecionou álbum.**
- **Polls: só consulta. O líder decide.** "Vocês opinam. Eu decido. Mas eu já mudei de ideia 7 vezes por causa de vocês."

### O ARG

**Sylvarin cifrado escondido nas páginas do Diário, com resposta certa.** Prêmio: **uma página secreta do Diário** + **apelido nos créditos do jogo**.

**Precedente:** o Animal Well (solo dev, engine própria em C++, 7 anos) escondeu um ARG (cifra de Vigenère) num vídeo, e **um Discord inteiro se formou para resolver antes do jogo existir**. Custo de produção: um enigma de texto. **O líder tem uma conlang inteira ociosa.**

### A página que envelhece

- **A dobra onde você já leu** — mostra onde você esteve. **Prova que você voltou.**
- **As bordas amarelam com a IDADE DA EDIÇÃO** (não com o uso): a #1 está encardida, a mais nova está branquinha. **Na banca dá para ver qual é velha só de olhar.**
- **Amassa quando você arrasta.**
- **A mancha de café é DE OUTRA PESSOA**, de quem leu antes. **A única marca que insinua comunidade sem precisar de contador de visitas.**

*(Recusado: a pedra que desmonta o menu. Ela é hostil; o envelhecimento é carinhoso.)*

### O som

**Dois botões: um para efeitos, um para música. Padrão: efeitos ON, música OFF.**

- **O clique REAL do menu do jogo** (o arquivo já existe: custo zero, e cria memória).
- **Música muda por padrão.**
- **Som no brinquedo** (a pessoa já interagiu, o navegador libera o áudio).
- **Foley de papel**: virar página, a tesoura, o amassado. **Único som que não existe ainda** (buscar CC0).

O M6 do jogo fechou com música em loop, SFX no hit e crossfade validado ao vivo. **Som para reusar, não para criar.**

---

## 8. Zero dado pessoal

**Decisão do líder, e ela simplificou o projeto inteiro sem custar emoção:**

- **Crédito do ARG = apelido escolhido.** "Decifrado por Volt_2013." A criança vê nos créditos o nome que **ela escolheu ser** — o que emociona mais que o nome de batismo.
- **SEM conta, SEM login.** Figurinha, voto e dobra vivem no `localStorage`. **O site LEMBRA dela sem SABER quem ela é.**

**Morreu:** a superfície de LGPD art. 14, a verificação parental, o gov.br, o login, a base de dados de menores.

---

## 9. A cadência

1. **Numeração retroativa PRIMEIRO.** O quadradinho vira **Edição #1**, o boneco que só olha pra um lado **#2**, a diagonal **#3**, os menus **#4**, o cockpit **#5**. **O site nasce com 5 edições, não com um "em breve".** O acervo já existe (repo, commits, screenshots).
2. **Depois: edição = progresso visível, sai quando sai. Nenhuma data prometida.** "O Gus anda na diagonal" já é uma edição inteira. É como o líder já trabalha (critério de saída testável, não calendário).

**Não existe item de "devlog contínuo".** O que comunica projeto morto não é o intervalo: é a **promessa quebrada**. Um site sem promessa de cadência nunca a quebra.

**O risco:** revista que não sai é revista **cancelada**. A contramedida é a definição de edição: **edição não é marco do roadmap, é progresso visível.** Se a edição for barata, a revista sai.

---

## 10. Restrições duras

- **O líder NÃO é artista digital.** Não faz GIF, não desenha, não anima, não edita vídeo. Tem PixelLab (e geração por imagem só ele roda no webui). **A animação vem de código (CSS `steps()` nos walk cycles que já existem, SVG), de sprites prontos e de captura do jogo rodando. Zero frame novo desenhado.**
- **`Projects/gusworld/` é READ-ONLY.** Proibido modificar sem autorização expressa.
- **Nunca criar página fora da identidade visual**, que será definida com o líder via `/design`.
- **Push só com autorização expressa** por ocasião.
- **Nome real de menor nunca é versionado.** O filho do líder é "Gus Dragon".
- **Nenhuma decisão de stack, design ou escopo sem AskUserQuestion.**

---

## 11. Em aberto

- **Stack.** Requisito: **dinâmico**, roda em Hostinger (plano sem Node). A tecnologia **não** foi decidida.
- **Identidade visual.** "Opção 1+2+3" (pixel art + key art pintada + retratos cel-shaded juntos). Vai ao `/design` com o líder.
- **Mobile.** **O maior risco prático:** revista é A4 e não cabe em 390px, e a criança **chega de celular, por link**. O líder quer decidir no `/design`, com protótipo nos dois tamanhos.
- **Canal** (`D-CANAL`). O X **suprime alcance de post com link externo**; a imprensa de jogos migrou para o Bluesky.
- **Moderação**: rage, bullying, contato por e-mail e issues do repo. Tema aberto pelo líder, ainda não discutido.
- **Faixa etária primária** (possivelmente resolvida pela fusão revista+Diário).

---

## 12. Riscos conhecidos

- **Mobile** (acima). O maior.
- **Acessibilidade**: fonte pixelada **nunca** em parágrafo; scanline sobre texto derruba contraste (tem que ser desligável); `prefers-reduced-motion` num site que **é** movimento; o elemento quebrável não pode ser o único caminho para a informação.
- **Contraste**: ciano `#4dd9e8` sobre navy `#0d1520` = **10.83:1** (passa AA e AAA). Magenta `#c23fd9` sobre navy = **4.37:1** (**falha AA em texto normal** por ~3% de luminância; passa em texto grande e UI). Magenta sobre ciano = **2.48:1** (nunca encostar). **Constraint de entrada do `/design`, não achado tardio.**
- **Peso**: o site não pode pesar mais que o jogo (o Animal Well inteiro tem 33 MB).
- **Capacity**: o líder é solo e já escreve uma engine C++. **Os agents não aliviam o gargalo, eles o alimentam** (cada entrega vira revisão dele).
- **Cafona vs nostálgico**: o teste de cada elemento é *"isso tem motivo dentro da ficção do Gus, ou é só referência?"* Se é só referência, é cosplay e envelhece em um ano. **Se o cupom existe porque o Gus recorta cupom, está vivo.** A fadiga de 2026 não é com o pixel: é com pixel **sem motivo**.
