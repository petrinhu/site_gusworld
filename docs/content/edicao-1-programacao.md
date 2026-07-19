# Glyfesse #1 — Seção de Programação (o eixo expert)

> Seção 16. O carro-chefe técnico: a GÊNESE DO MÉTODO (o código ainda não existe em maio; o que existe é o método que fez a lore massiva nascer ORIGINAL, ancorada em ~300 obras de referência sem copiar nenhuma).
> Voz TÉCNICA: `root@glyfesse>` (o editor/criador, o "Pyotor" nunca nomeado). A intro acessível abre com uma pergunta do `gus@glyfesse>` e o `root` responde.
> `D-ACENTOS`: prosa de papel acentuada; comandos, prompts (`root@glyfesse>~$`) e tokens de código (`ollama`, `bge-m3`, `bge-reranker-v2-m3`, `Lance`, `rag-safe`, `flock`) em ASCII.
> Bilíngue pt-BR + EN. Sem em-dash. Profanidade ZERO. Root é voz composta → 0 typos na parte técnica. Intro tem 1 fala do Gus → 1 errinho por língua (reportado).
> Spoiler baixo: só ESCALA e ESTRUTURA do corpus de referência, nunca conteúdo/nomes/plot/axiologia. Títulos dos livros NÃO entram (é a futura bibliografia, em decisão).

---

## pt-BR

`gus@glyfesse>` como é que se escreve u mmundo inteiro do zero sem copiar de ninguém
`// pergunta séria. eu queria mesmo saber`

Imagine que você vai escrever um mundo original. Não um mapa, não uma ficha: um mundo, com eras datadas, com um idioma que tem gramática, com gente que tem passado. Você quer que ele seja seu, inteiro, sem uma linha roubada de ninguém. Mas ninguém escreve no vácuo. Antes de começar, você juntou uma biblioteca: centenas de livros que te formaram, ficção científica, mito, filosofia, poesia. Quando você trava numa cena, a resposta não é copiar um trecho. É lembrar de como aqueles autores resolveram problemas parecidos e pensar com eles. O detalhe: são centenas de livros. Reler todos a cada dúvida é impossível.

Então você constrói um assistente de leitura. Não um que responde no seu lugar, e muito menos um que copia: um que, quando você descreve o que está tentando escrever, vasculha a biblioteca inteira e devolve os poucos trechos que ressoam com a sua ideia. Você lê aqueles trechos, fecha o livro e escreve o SEU texto, do zero, com a cabeça mais cheia. Ele não te dá a lore. Ele te dá inspiração para escrevê-la. Essa é a ideia inteira desta seção. A primeira peça de engenharia do GusWorld não foi o jogo. Foi esse assistente de leitura, e a lore massiva que ele ajudou a escrever nasceu original.

E ele coube num laptop, em cima da mesa, sem nuvem nenhuma. Centenas de livros indexados dentro de uma máquina que dá pra fechar e botar na mochila. O como disso é o resto desta página, e a partir daqui quem fala sou eu, o editor.

`root@glyfesse>` antes que perguntem por que eu assino da conta root numa revista: tudo que é meu é open source. Não tenho o que esconder, então não finjo que tenho.
`// e o sudo cansa`

`// Prezado leitor, daqui por diante é a parte técnica de verdade: a documentação histórica de como o desenvolvimento começou. Se você não é de TI, a intro acima já te deu o essencial e você pode pular pro Cupom sem culpa.`
`//root@glyfesse`

`[VISUAL: CRT fósforo verde, efeito de digitação: root@glyfesse>~$ nano <enter>, cursor piscando]`

### 1. O problema: inspiração sem reler tudo e sem copiar

O acervo de referência do GusWorld é grande: **306 obras** catalogadas, quebradas em cerca de **163 mil trechos indexáveis**. Ficção científica, mito, filosofia, poesia, ciência popular: a biblioteca que forma quem escreve. O que é massivo aqui não é a lore (essa é escrita à mão, do zero, e validada pelo criador); é o corpus de referência que fica ao lado da escrivaninha.

O problema tem duas travas ao mesmo tempo. A primeira: ninguém relê 306 livros a cada dúvida de escrita. Quando você está escrevendo, digamos, a queda de uma cidade e quer que ela ressoe com as melhores quedas que já leu, folhear a estante inteira está fora de cogitação. A segunda trava é mais séria: recuperar não pode virar copiar. O objetivo é achar a analogia, o padrão, a imagem que faz a sua cabeça girar, e depois fechar o livro e escrever a SUA versão. Recuperação de inspiração, nunca de texto pronto.

A tentação preguiçosa seria pedir ao modelo de linguagem que "escrevesse o mundo". Isso é o oposto do que se quer: o modelo inventaria genérico, e o mundo sairia sem dono. O que se quer é uma ferramenta que amplifica a leitura de quem escreve, não que substitui a escrita. A lore continua sendo escrita por uma pessoa. A ferramenta só encurta o caminho até a estante certa.

### 2. O RAG caseiro: dois índices, um pipeline

A técnica se chama **RAG**, retrieval-augmented generation: geração aumentada por recuperação. A ideia: em vez de pedir ao modelo que crie do nada, você primeiro recupera do acervo o material que ressoa com a sua consulta e usa esse material como estímulo. Aqui, o "aumento" não escreve a lore: alimenta a cabeça de quem escreve. Tudo foi construído à mão, pelo próprio autor, sem serviço de terceiro.

O pipeline tem cinco estágios:

1. **Chunking.** Cada obra é quebrada em trechos (chunks) de tamanho controlado, com sobreposição entre trechos vizinhos para não cortar uma ideia no meio. Cada trecho vira uma unidade recuperável. As 306 obras rendem cerca de 163 mil desses trechos.
2. **Embeddings.** Cada trecho é convertido em um vetor por um modelo de embeddings. Vetor aqui é uma lista de números que representa o SENTIDO do trecho: textos que falam de coisas parecidas caem perto no mesmo espaço, mesmo sem repetir as mesmas palavras. O modelo é o `bge-m3`, servido localmente pelo `ollama`, escolhido por ser multilíngue (o acervo mistura português e inglês) e por produzir vetores densos de 1024 dimensões.
3. **Busca por similaridade.** A consulta também vira vetor, e o sistema procura no acervo os trechos cujos vetores estão mais próximos (proximidade medida por similaridade de cosseno). Os vetores vivem num banco vetorial `Lance` (o arquivo `chunks.lance`), com o inventário em `manifest.json`.
4. **Rerank.** Os primeiros candidatos da busca passam por um segundo modelo, o reranker `bge-reranker-v2-m3`, que relê cada par consulta-trecho e reordena por relevância real. A busca por vetor é rápida e grosseira; o reranker é lento e fino. É aqui que mora o achado do próximo tópico.
5. **Injeção de contexto.** Os melhores trechos, já reordenados, vão para o gerador como estímulo de leitura. Não para virar texto final: para o autor ler, absorver e escrever a versão dele.

Toda consulta passa por um wrapper, o `rag-safe query "..."`, que serializa o acesso com `flock`: uma consulta por vez, para respeitar os limites de hardware da máquina (o RAG e o reranker são pesados; rodar dois de uma vez derruba tudo). Uma consulta típica de design é densa, de 15 a 30 palavras ou mais, com um piso de score de `0.499`; costuma render umas 10 boas passagens em até 30 tentativas.

E não é um índice só, são dois, isolados de propósito. O **índice principal** guarda as 306 obras e seus ~163 mil trechos. Um **segundo índice** à parte, o `rag_elvish`, com 1.989 trechos, guarda só material filológico que inspira o idioma próprio do mundo (existe um, com gramática; o que ele é fica pro jogo contar). Ficam separados para que uma consulta sobre um tema geral não seja poluída pelo material linguístico especializado, e vice-versa.

### 3. O achado: o reranker não mede tema, mede tipo de texto

Aqui está a descoberta empírica desta seção, e ela só apareceu rodando o sistema de verdade. Aquele piso de score de `0.499` no reranker deveria, em teoria, separar trecho on-tema de trecho off-tema. Não é o que ele faz. Medindo os scores ao longo de centenas de consultas, o padrão que emergiu foi outro: **o reranker pontua o TIPO TEXTUAL do trecho, não o assunto dele.**

Texto expositivo e argumentativo crava alto, na faixa de 0.7 a 0.98: um tratado, um ensaio didático, uma exposição que arma uma tese passo a passo. A estrutura desse tipo de texto (afirmação, razão, conclusão) casa com a forma de uma consulta, que também é uma proposição. O reranker, que é um cross-encoder treinado para casar pergunta com resposta, reconhece essa forma e a premia.

Prosa narrativa pura faz o oposto: reprova, na faixa de 0.01 a 0.45, **mesmo quando está exatamente no tema.** Uma cena de romance cyberpunk sobre uma megacidade, consultada com uma pergunta sobre megacidades, pontua baixíssimo. A imagética, o "mostrar sem dizer" que define boa prosa, não se cross-encoda bem contra uma consulta temática em português. O trecho fala do tema inteiro, mas não na forma que o reranker sabe premiar.

A consequência é de método, e é honesta: **o RAG não é fonte única, é camada bônus.** Para os temas em que o acervo tem forte match expositivo, deixa o RAG sugerir, porque ali ele acerta. Para a imagética narrativa (a queda, o êxodo, a textura de uma cidade), o reranker é cego, então esse material se escreve do canon do próprio jogo, não da estante. Saber ONDE a ferramenta enxerga e onde ela é cega é o que separa usar o RAG de confiar cego nele. A ferramenta tem um ponto cego medido, e o método foi desenhado em volta dele.

### 4. A infraestrutura: um acervo inteiro num laptop

Tudo isto rodou **local**, na máquina do autor, sem nuvem para o RAG. O ângulo não é economia: é **soberania do dado.** O acervo e a lore inédita nunca saíram do disco de quem os juntou e escreveu, e todo o processamento aconteceu on-device. É a diferença entre confiar um mundo ainda não lançado a um servidor de terceiro e guardá-lo numa máquina que você fecha e leva embora.

O hardware, por componente:

| Componente | Especificação |
|---|---|
| CPU | i5-12500H (16 threads) |
| RAM | ~32 GB |
| GPU dedicada | RTX 3050 Mobile |
| GPU integrada | Iris Xe |
| Sistema | Fedora Linux |

Não é uma estação de data center. É um laptop de mesa. E é justamente por isso que o `flock` do `rag-safe` existe: numa máquina dessas, embeddings e reranker disputam a mesma GPU e a mesma RAM; deixar duas consultas rodarem juntas trava o sistema. Serializar uma por vez é o que torna o acervo consultável sem derrubar a máquina. A tese fica melhor por causa da modéstia do hardware: um acervo inteiro indexado e um mundo inteiro escrito, numa máquina que qualquer um pode ter.

### 5. O método: AI-assisted, não vibe coding

Esta é a parte que sustenta o resto do projeto, e a que mais se confunde por fora. Existem dois jeitos muito diferentes de trabalhar com IA, e eles não são graus do mesmo jeito: são opostos.

**Vibe coding** é dirigir pela sensação: você pede solto, aceita o que a IA gera sem ler com rigor, e segue no "parece que funciona". A IA decide, o humano aprova no reflexo. **AI-assisted** é o inverso: o humano arquiteta e decide TUDO; a IA executa e propõe, e nunca decide sozinha. Cada saída passa por revisão e aprovação explícita antes de existir no projeto.

A prova documental de que o GusWorld é AI-assisted é o **primeiro prompt** do projeto, o mandato que abre toda sessão:

> você é meu coder apenas, o criativo é MEU, apresente 2-3 opções e aguarde minha aprovação

Cada cláusula é uma trava, não um enfeite:

- **"coder apenas"** rebaixa a IA de co-autora a executora. O papel dela é implementar, não conceber.
- **"o criativo é MEU"** fixa a autoria criativa no humano, por contrato, na primeira linha.
- **"apresente 2-3 opções"** proíbe a decisão unilateral: a IA devolve alternativas com trade-offs, não um fato consumado.
- **"aguarde minha aprovação"** insere um gate humano antes de qualquer coisa entrar. Nada compila por conta própria.

E o RAG obedece à mesma disciplina. Recuperar inspiração é o gêmeo de "apresente opções": a ferramenta traz trechos, o humano lê e decide o que fazer com eles. Inspiração não é cópia pela mesma razão que assistência não é autoria: em ambos os casos, quem decide o que vira texto é a pessoa. A máquina sugere; o autor escreve. É por isso que o AI-disclosure deste projeto é uma defesa, não uma confissão. Declarar que a IA ajudou não dilui a autoria quando o método está documentado e o decisor é sempre o humano. A honestidade é o argumento, e o método é a prova.

### 6. Fecho: a lore nasceu ancorada em 300 obras sem copiar nenhuma

O assistente de leitura funcionou. Um acervo de 306 obras, quebrado em 163 mil trechos, virou uma estante que responde à pergunta certa com o parágrafo certo, e a lore que ele ajudou a escrever nasceu original, linha por linha, de uma pessoa. Ele nasceu antes do jogo, num laptop, sem nuvem, e ensinou pelo caminho onde uma ferramenta enxerga (a exposição) e onde ela é cega (a imagética), uma lição de método que não estava no plano.

Essa é a gênese. Não do código, que só chega em junho. Do método. A IA é a ferramenta; o criativo é do criador. Esta seção existe para provar que a frase não é slogan: é procedimento, medido, com ponto cego mapeado, e está documentado.

### 7. Bibliografia: as âncoras

O acervo tem cerca de 306 obras. Listar todas encheria a revista, então aqui vão só as âncoras: os autores e livros que mais moldaram a leitura por trás da lore. Formato: autor - obra.

- **J.R.R. Tolkien** - O Hobbit; O Senhor dos Anéis (trilogia); O Silmarillion; Contos Inacabados; a série History of Middle-earth (12 volumes)
- **Isaac Asimov** - Fundação (saga); a série dos Robôs (Eu, Robô; As Cavernas de Aço); a divulgação científica ("Como Descobrimos...")
- **Frank Herbert** - Duna (saga)
- **George R. R. Martin** - As Crônicas de Gelo e Fogo; Fogo & Sangue
- **Cyberpunk** - William Gibson (Neuromancer); Neal Stephenson (Snow Crash); Philip K. Dick (Androides Sonham com Ovelhas Elétricas?); entre outros
- **Homero** - Ilíada; Odisseia
- **George Orwell** - 1984; A Revolução dos Bichos
- **Umberto Eco** - O Nome da Rosa; O Pêndulo de Foucault
- **Dan Brown** - O Código Da Vinci; Fortaleza Digital
- **Estratégia e poder** - Maquiavel (O Príncipe); Sun Tzu (A Arte da Guerra); Robert Greene (As 48 Leis do Poder)
- **Corpus élfico** (inspira o idioma do mundo) - cursos de Sindarin e Quenya, filologia tolkieniana, num índice à parte

`//by: root@glyfesse`

---

## EN

`gus@glyfesse>` how do you write a whole world from scratch without copying anyone
`// serious question. i actually wanted to know`

Imagine you're going to write an original world. Not a map, not a character sheet: a world, with dated eras, with a language that has grammar, with people who have a past. You want it to be yours, whole, without a single line stolen from anyone. But nobody writes in a vacuum. Before you started, you gathered a library: hundreds of books that shaped you, science fiction, myth, philosophy, poetry. When you get stuck on a scene, the answer isn't to copy a passage. It's to remember how those authors solved similar problems and think alongside them. The catch: it's hundreds of books. Rereading all of them on every doubt is impossible.

So you build a reading assistant. Not one that answers for you, and least of all one that copies: one that, when you describe what you're trying to write, sweeps the whole library and hands back the few passages that resonate with your idea. You read those passages, close the book, and write YOUR text, from scratch, with a fuller head. It doesn't give you the lore. It gives you inspiration to write it. That is the entire idea of this section. The first piece of engineering in GusWorld was not the game. It was this reading assistant, and the massive lore it helped write was born original.

And it fit inside a laptop, on the desk, with no cloud at all. Hundreds of books indexed inside a machine you can close and put in a backpack. The how of that is the rest of this page, and from here on the one speaking is me, the editor.

`root@glyfesse>` before anyone asks why I sign from the root account in a magazine: everything of mine is open source. I have nothing to hide, so I don't pretend I do.
`// and sudo gets old`

`// Dear reader, from here on it's the real technical part: the historical record of how development began. If you're not in tech, the intro above already gave you the gist and you can skip to the Coupon guilt-free.`
`//root@glyfesse`

`[VISUAL: green-phosphor CRT, typing effect: root@glyfesse>~$ nano <enter>, blinking cursor]`

### 1. The problem: inspiration without rereading everything, and without copying

GusWorld's reference archive is large: **306 works** cataloged, split into roughly **163,000 indexable passages**. Science fiction, myth, philosophy, poetry, popular science: the library that forms whoever writes. What's massive here is not the lore (that is written by hand, from scratch, and validated by the creator); it's the reference corpus sitting beside the desk.

The problem has two locks at once. First: nobody rereads 306 books on every writing doubt. When you're writing, say, the fall of a city and want it to resonate with the best falls you've read, leafing through the whole shelf is out of the question. The second lock is more serious: retrieval must not become copying. The goal is to find the analogy, the pattern, the image that spins your head, then close the book and write YOUR version. Retrieval of inspiration, never of finished text.

The lazy temptation would be to ask the language model to "write the world." That's the opposite of what you want: the model would invent generic filler, and the world would come out with no owner. What you want is a tool that amplifies the writer's reading, not one that replaces the writing. The lore stays written by a person. The tool only shortens the path to the right shelf.

### 2. The homemade RAG: two indexes, one pipeline

The technique is called **RAG**, retrieval-augmented generation. The idea: instead of asking the model to create from nothing, you first retrieve from the archive the material that resonates with your query and use it as a stimulus. Here the "augmentation" doesn't write the lore: it feeds the writer's head. All of it was built by hand, by the author, with no third-party service.

The pipeline has five stages:

1. **Chunking.** Each work is split into passages (chunks) of controlled size, with overlap between neighboring passages so an idea isn't cut in half. Each passage becomes a retrievable unit. The 306 works yield about 163,000 of these passages.
2. **Embeddings.** Each passage is turned into a vector by an embedding model. A vector here is a list of numbers representing the MEANING of the passage: texts about similar things land close together in the same space, even without repeating the same words. The model is `bge-m3`, served locally by `ollama`, chosen for being multilingual (the archive mixes Portuguese and English) and for producing dense vectors of 1024 dimensions.
3. **Similarity search.** The query is turned into a vector too, and the system looks for the passages whose vectors are closest (closeness measured by cosine similarity). The vectors live in a `Lance` vector database (the `chunks.lance` file), with the inventory in `manifest.json`.
4. **Rerank.** The first candidates from the search pass through a second model, the `bge-reranker-v2-m3` reranker, which rereads each query-passage pair and reorders by real relevance. The vector search is fast and coarse; the reranker is slow and fine. This is where the next topic's finding lives.
5. **Context injection.** The best passages, now reordered, go to the generator as reading stimulus. Not to become final text: for the author to read, absorb, and write their own version.

Every query goes through a wrapper, `rag-safe query "..."`, which serializes access with `flock`: one query at a time, to respect the machine's hardware limits (the RAG and the reranker are heavy; running two at once brings everything down). A typical design query is dense, 15 to 30 words or more, with a score floor of `0.499`; it usually yields about 10 good passages in up to 30 tries.

And it isn't one index, it's two, isolated on purpose. The **main index** holds the 306 works and their ~163,000 passages. A separate **second index**, `rag_elvish`, with 1,989 passages, holds only philological material that inspires the world's own language (there is one, with grammar; what it is belongs to the game to tell). They stay apart so a query about a general theme isn't polluted by the specialized linguistic material, and vice versa.

### 3. The finding: the reranker doesn't measure topic, it measures text type

Here is the empirical discovery of this section, and it only showed up by running the system for real. That score floor of `0.499` in the reranker should, in theory, separate on-topic from off-topic passages. That's not what it does. Measuring scores across hundreds of queries, a different pattern emerged: **the reranker scores the TEXT TYPE of the passage, not its subject.**

Expository and argumentative text scores high, in the 0.7 to 0.98 range: a treatise, a didactic essay, an exposition that builds a thesis step by step. The structure of that kind of text (claim, reason, conclusion) matches the shape of a query, which is also a proposition. The reranker, a cross-encoder trained to match question with answer, recognizes that shape and rewards it.

Pure narrative prose does the opposite: it fails, in the 0.01 to 0.45 range, **even when it's exactly on topic.** A cyberpunk novel scene about a megacity, queried with a question about megacities, scores dismally low. Imagery, the "show don't tell" that defines good prose, doesn't cross-encode well against a thematic query in Portuguese. The passage is entirely on theme, but not in the shape the reranker knows how to reward.

The consequence is one of method, and it's honest: **the RAG is not a sole source, it's a bonus layer.** For themes where the archive has a strong expository match, let the RAG suggest, because there it's right. For narrative imagery (the fall, the exodus, the texture of a city), the reranker is blind, so that material is written from the game's own canon, not from the shelf. Knowing WHERE the tool sees and where it's blind is what separates using the RAG from trusting it blindly. The tool has a measured blind spot, and the method was designed around it.

### 4. The infrastructure: a whole archive in a laptop

All of this ran **locally**, on the author's machine, with no cloud for the RAG. The angle isn't cost: it's **data sovereignty.** The archive and the unreleased lore never left the disk of the person who gathered and wrote them, and all processing happened on-device. It's the difference between trusting an unreleased world to someone else's server and keeping it on a machine you close and carry away.

The hardware, by component:

| Component | Spec |
|---|---|
| CPU | i5-12500H (16 threads) |
| RAM | ~32 GB |
| Dedicated GPU | RTX 3050 Mobile |
| Integrated GPU | Iris Xe |
| System | Fedora Linux |

This is not a data-center workstation. It's a desk laptop. And that's exactly why `rag-safe`'s `flock` exists: on a machine like this, embeddings and reranker fight over the same GPU and the same RAM; letting two queries run together freezes the system. Serializing one at a time is what makes the archive queryable without bringing the machine down. The thesis is better for the modesty of the hardware: a whole archive indexed and a whole world written, on a machine anyone could own.

### 5. The method: AI-assisted, not vibe coding

This is the part that holds up the rest of the project, and the one most often confused from the outside. There are two very different ways to work with AI, and they are not degrees of the same thing: they are opposites.

**Vibe coding** is steering by feel: you prompt loosely, accept what the AI generates without reading it rigorously, and go on "seems to work." The AI decides, the human approves on reflex. **AI-assisted** is the inverse: the human architects and decides EVERYTHING; the AI executes and proposes, and never decides on its own. Every output goes through review and explicit approval before it exists in the project.

The documentary proof that GusWorld is AI-assisted is the project's **first prompt**, the mandate that opens every session:

> you are only my coder, the creative is MINE, present 2-3 options and wait for my approval

Each clause is a lock, not an ornament:

- **"only my coder"** demotes the AI from co-author to executor. Its role is to implement, not to conceive.
- **"the creative is MINE"** fixes creative authorship in the human, by contract, on the first line.
- **"present 2-3 options"** forbids the unilateral decision: the AI returns alternatives with trade-offs, not a done deal.
- **"wait for my approval"** inserts a human gate before anything ships. Nothing compiles on its own.

And the RAG obeys the same discipline. Retrieving inspiration is the twin of "present options": the tool brings passages, the human reads and decides what to do with them. Inspiration is not copying for the same reason assistance is not authorship: in both cases, the one who decides what becomes text is the person. The machine suggests; the author writes. That is why this project's AI-disclosure is a defense, not a confession. Declaring that AI helped does not dilute authorship when the method is documented and the decider is always the human. Honesty is the argument, and the method is the proof.

### 6. Closing: the lore was born anchored in 300 works without copying any

The reading assistant worked. An archive of 306 works, split into 163,000 passages, became a shelf that answers the right question with the right paragraph, and the lore it helped write was born original, line by line, from one person. It was born before the game, on a laptop, with no cloud, and it taught along the way where a tool sees (exposition) and where it's blind (imagery), a lesson in method that wasn't in the plan.

That is the genesis. Not of the code, which only arrives in June. Of the method. The AI is the tool; the creative is the creator's. This section exists to prove the sentence isn't a slogan: it's a procedure, measured, with its blind spot mapped, and it's documented.

### 7. Bibliography: the anchors

The archive holds about 306 works. Listing them all would fill the magazine, so here are only the anchors: the authors and books that most shaped the reading behind the lore. Format: author - work.

- **J.R.R. Tolkien** - The Hobbit; The Lord of the Rings (trilogy); The Silmarillion; Unfinished Tales; the History of Middle-earth series (12 volumes)
- **Isaac Asimov** - Foundation (saga); the Robot series (I, Robot; The Caves of Steel); the popular-science books ("How Did We Find Out...")
- **Frank Herbert** - Dune (saga)
- **George R. R. Martin** - A Song of Ice and Fire; Fire & Blood
- **Cyberpunk** - William Gibson (Neuromancer); Neal Stephenson (Snow Crash); Philip K. Dick (Do Androids Dream of Electric Sheep?); among others
- **Homer** - The Iliad; The Odyssey
- **George Orwell** - 1984; Animal Farm
- **Umberto Eco** - The Name of the Rose; Foucault's Pendulum
- **Dan Brown** - The Da Vinci Code; Digital Fortress
- **Strategy and power** - Machiavelli (The Prince); Sun Tzu (The Art of War); Robert Greene (The 48 Laws of Power)
- **Elvish corpus** (inspires the world's language) - Sindarin and Quenya courses, Tolkienian philology, in a separate index

`//by: root@glyfesse`
