# Glyfesse #1 — Entrevista com o editor

> Matéria de entrevista da Edição #1. Q&A: a redação da Glyfesse (repórter anônimo, voz de revista de games) entrevista o editor/criador (`root@glyfesse>`, NUNCA nomeado).
> Fonte: respostas REAIS do criador em `edicao-1-entrevista-raw.md`, curadas por ele. Copyedit leve para impressão; voz, idiomas e personalidade preservados.
> Papel = acento pt-br completo; tokens de código (glintfx, POCO, RAG, C, Python, Linux, Anthropic, TUI) em ASCII. Sem em-dash.
> SPOILER-SAFE: só gênese, método, filosofia e arquitetura de dev. ZERO lore/plot/personagem/mecânica/idioma-do-mundo.

---

## pt-BR

`glyfesse>` entrevista

### "Eu faço a parte técnica; a IA faz a parte braçal, o código"

*A redação da Glyfesse puxou uma cadeira ao lado de quem toca este mundo inteiro sozinho, e quis saber o começo. Ele é médico, programa desde os tempos do ms-dos e não escreve uma linha de código: dirige a máquina que escreve. Conversamos sobre o pai que o ensinou a ler, sobre um mecanismo de luta que virou um monstro, e sobre o que faz um sonho parado finalmente andar. Ele não quis ser nomeado. Aqui ele é só o editor.*

---

`glyfesse>` Quando isto deixou de ser um teste de fim de tarde e virou um projeto de verdade? Teve um instante exato de "ok, isto vai acontecer"?

`root@glyfesse>` Uso computador desde 1994, no ms-dos 6.22. Foi na escola que estudei, eu tinha 14 anos. Internet no Brasil ninguém nem falava, não existia telefone celular. Me fascinei por aquilo a ponto de fazer faculdade de exatas. Lá aprendi o básico de TI, lógica, algoritmos, tudo no Turbo Pascal. E, como um bom nerd, adorava jogos. Só que vi que exatas, pra mim, não era profissão, era hobby. Larguei, acho que no 5o período, e entrei em saúde. Sou médico hoje, de formação e de profissão. Mas programar e jogar sempre estiveram nos meus horários vagos. O sonho, impossível antes pra quem não era da área e quase não tinha tempo livre, era fazer o meu jogo.

Aí surgiu a IA. Primeiro aprendi no webui, mas é muito ruim, só fazia monolito. Cheguei a fazer uns programas legais em Python (argh) pro consultório: equivalência de doses de remédio, um que eliminava vários passos repetitivos e irritantes de faturamento. Mas era pouco. O jogo continuava sendo um sonho. Daí comecei a dar aula de IA pra médicos, conheci o Claude Code na TUI e comecei a fazer programa maior, modular, numa linguagem que eu gostava: C, compilada. Fui subindo o nível de dificuldade e resolvi, enfim, realizar o sonho de fazer um jogo. Sempre no comando, definindo cada pedacinho técnico. Só não sei codar, isso eu deixo pra IA. E, desde que comecei, foram aparecendo as dificuldades, os termos técnicos foram chegando, e eu estudando e pedindo ajuda aos amigos e ao meu irmão, que é engenheiro dev sênior (ele é muito bom, juro). Nessa época eu já tinha ensinado meu filho a usar Linux; ele foi aprendendo Python, também se irritou, devorou uns livros de C e de ponteiros, e hoje ele me tira dúvida. Também peço ajuda a muito amigo de TI, que adora me trollar com pergunta técnica: eu dou um migué, estudo, respondo depois e ainda aproveito pra aplicar no jogo. Isto aqui, pra mim, é hobby, sonho realizado e mais um aprendizado. Gosto de coisa nova.

---

`glyfesse>` Por que abrir tudo numa revista retrô, em vez de um blog, uma thread ou um trailer? O que o formato te dá, e o que você quer que a pessoa sinta ao folhear?

`root@glyfesse>` Foi uma ideia que me deu do nada. A intenção era só um site pra distribuir o jogo, com roadmap, changelog, pra ajudar os outros, porque eu gosto de aprender e de ensinar. Mas minha cabeça funciona assim: uma ideia simples vai crescendo e ramificando feito uma árvore. O formato de revista veio do nada quando lembrei das revistas de games dos anos 90 e 2000. Quando ganhei o Super Metroid e o Super Mario World não tinha walkthrough na internet, não tinha as "pédias" da vida. Você garimpava em revista e com os amigos que também jogavam. O formato revista atinge meus dois públicos, é didático e é mais uma coisa pra me divertir. Evoluiu mais ou menos assim: distribuir, depois um site simples, depois um site pra ensinar o mínimo pra quem quer aprender, depois de um jeito didático, e por fim de um jeito didático e divertido, que é a revista.

---

`glyfesse>` Você declara que usa IA num momento em que muita gente esconde. Isso é defesa, honestidade, ou as duas?

`root@glyfesse>` Não vi como uma coisa tão filosófica assim. Vejo como ferramenta. Como falei, sei conceito, teoria básica e média de alguns tópicos de TI, mas não sei ESCREVER o código; sei o que ele tem que fazer. Comparo com desmontar um carro. Vibe code é deixar a IA fazer tudo por você, e isso é horrível, fica muito pobre. IA não CRIA, ela só mistura conceitos que já existem. Por mais que pareça criação, por trás tem um monte de coisa antiga misturada. Na comparação do carro, vibe code é pagar alguém pra desmontar o carro por você e depois dizer que o serviço é seu. Quer fazer bem feito? Faça você mesmo. Aí a programação assistida por IA é a ferramenta que você usa pra desmontar o carro. A ferramenta não faz nada sozinha: você tem que ir lá, pegar, estudar pra saber o que é cada peça, como mexer, como não quebrar nem arranhar o carro. É isso. E, olha, quando o próprio Linus Torvalds chama a IA de ferramenta e diz que o Linux não é um projeto anti-IA, quem sou eu pra usar escondido e ainda falar mal?

---

`glyfesse>` Antes de uma linha de código, o mundo já existia escrito. Como foi construir tanta história antes, e o que a leitura da sua vida tem a ver com isso? A história chegou a não caber no que dava pra programar?

`root@glyfesse>` Não saí feito louco lendo livro ou abrindo página aleatória pra pesquisar. Aprendi a ler com meu pai, que lia muito, que Deus o tenha. A maioria dos livros que me inspiraram eu li ao longo da vida. Meu primeiro livro grande foi "A Ilha Misteriosa", do Julio Verne. Recomendo. O gosto por ficção também veio dele: tinha uma estante enorme em casa e eu fiquei curioso naturalmente. Com meu pai conheci Verne, Asimov, Herbert, esses monstros sagrados da ficção científica. Junta com o fato de que em 2001 comecei a jogar e a narrar RPG (VTM, da White Wolf). Isso joga a imaginação longe na hora de criar personagem, mundo, essas coisas. E, pra ter um bom filme, você precisa de um bom roteiro. Ninguém faz filme inventando a história na hora. Até RPG de mesa tem um roteiro pré-estabelecido, nem que sejam alguns tópicos. Com jogo de computador é a mesma coisa. É um conceito meu, não estudei sobre isso, mas pra mim é o óbvio.

Escrever, digitar o mundo, foi e continua sendo divertido, porque sempre sobra ponta solta pra resolver, minha mente entra em fluxo e, como na comparação da árvore, aparece um raminho novo, e tome mais lore e mais complicação. Traduzir pra código eu não traduzo: tenho minha ferramenta pra isso. Eu faço a parte técnica; a IA faz a parte braçal, o código. Não cheguei a ter medo de não dar conta. Tem jogo e projeto muito maior que o meu, então o meu dava. O que me deu foi animação de ver COMO eu ia fazer, o tanto que eu ia aprender e me divertir fazendo.

---

`glyfesse>` Você se chama de solo, mas cita irmão, filho e amigos ajudando. O que é só seu, e onde os outros entram?

`root@glyfesse>` 99,9% do tempo empregado é meu, ou mais. Mas eu fico empolgado e comento com as pessoas, e quem é nerd feito eu acaba se empolgando junto e dá dica valiosa. Um amigo me perguntou: "você conhece RAG?" Ajuda muito a indexar obra extensa. Fui atrás. Ou quando eu estava no glintfx (é o framework próprio do jogo, em andamento em paralelo, porque nenhum dos de jogo 2D tem tudo que eu quero, e a coisa estava virando uns pipe gigante e complicado, misturando tudo, frame aqui, api ali), eu falei com meu irmão e ele mandou eu procurar sobre arquitetura atomizada. Fui pesquisar. Ele ainda fez outras perguntas-chave que me obrigaram a ir atrás pra ver se era o caso de usar no jogo. Aprendi tanto que hoje estou atomizando os itens e outras dinâmicas, cada um numa camada, com POCO próprio.

E pra você ver que a IA nem é tão boa assim: o mecanismo de luta estava virando um monolito gigante, misturando tudo, porque do nada o Claude resolveu que cabia tudo ali dentro. Eu percebi porque, cada vez que eu tinha uma ideia nova, um item por exemplo, tinha que ir no mecanismo de luta e mexer em tudo. Atomizei e a vida virou outra: build menor, teste unitário mais rápido. E lá vou eu de novo, com meu pensamento em árvore, mudando de assunto. Acho que respondi.

---

`glyfesse>` O nome "Glyfesse", em que escrever é compilar, foi acaso ou intenção? E essa cadência de sair de vez em quando: é liberdade ou pressão disfarçada?

`root@glyfesse>` Quem escreve, com o cérebro, está sempre fazendo duas coisas ao mesmo tempo: o ato de escrever e o de juntar o conhecimento que já tinha. Na compilação, esse conhecimento seriam as bibliotecas. Você vai checando se está fazendo certo, caçando erro, acusando erro, corrigindo. Ou escreve usando um modelo que já existe, que lembra um framework. É mais ou menos por aí. O nome saiu daí.

E a revista sair de vez em quando é porque eu tenho que tocar minha vida real e alternar com isto aqui. E tem os tokens, né? Eles acabam, hehe. Aí sou OBRIGADO a parar, às vezes dois, três dias, esperando fechar o prazo de sete dias ou rezando pra Anthropic dar um reset no meio do caminho <3

---

`glyfesse>` Pra fechar: pra quem tem um sonho parado, igual o seu estava antes da IA, o que você diria?

`root@glyfesse>` Vá atrás do sonho. Hobby não é pra dar dinheiro, é pra dar prazer, e até faz gastar um pouquinho: uns gastam com token, outros com aposta, outros comprando ingresso de show. Eu não quero morrer frustrado. Se não der certo, pelo menos eu tentei, e muito. Uma hora você dá um jeito de realizar; mas, se não começar, com certeza não realiza. Como dizia Chico Science, "um passo à frente e você não está mais no mesmo lugar".

---

## EN

`glyfesse>` interview

### "I do the technical part; the AI does the manual part, the code"

*The Glyfesse newsroom pulled up a chair next to the person who runs this entire world alone, and wanted to know how it began. He is a doctor, has been programming since the ms-dos days, and doesn't write a single line of code: he drives the machine that writes. We talked about the father who taught him to read, about a combat system that turned into a monster, and about what makes a stalled dream finally move. He didn't want to be named. Here he is just the editor.*

---

`glyfesse>` When did this stop being an end-of-afternoon experiment and become a real project? Was there an exact moment of "ok, this is going to happen"?

`root@glyfesse>` I've used computers since 1994, on ms-dos 6.22. I studied it at school, I was 14. Nobody in Brazil was even talking about the internet, cell phones didn't exist. I got so fascinated I went to college for exact sciences. There I learned the basics of IT, logic, algorithms, all in Turbo Pascal. And, like any good nerd, I loved games. But I saw that exact sciences, for me, wasn't a profession, it was a hobby. I dropped out, I think in the 5th semester, and switched to health. Today I'm a doctor, by training and by profession. But programming and gaming were always in my spare hours. The dream, impossible back then for someone not in the field and with almost no free time, was to make my own game.

Then AI showed up. First I learned it on the webui, but it's terrible, it only made monoliths. I did make some nice little programs in Python (ugh) for the practice: drug dose equivalence, one that cut out a bunch of repetitive, annoying billing steps. But it was too little. The game was still a dream. So I started teaching AI to doctors, discovered Claude Code in the TUI, and started making bigger, modular programs, in a language I liked: C, compiled. I kept raising the difficulty and finally decided to make the dream of a game come true. Always in command, defining every little technical piece. I just can't code, that part I leave to the AI. And ever since I started, the difficulties appeared, the technical terms started arriving, and I studied and asked my friends and my brother for help, he's a senior dev engineer (he's really good, I swear). By then I had already taught my son to use Linux; he picked up Python, got annoyed too, devoured a few books on C and pointers, and today he answers my questions. I also ask a lot of IT friends, who love to troll me with technical questions: I stall them, study, answer later, and even get to apply it to the game. This, for me, is a hobby, a dream come true, and one more thing to learn. I like new things.

---

`glyfesse>` Why open it all up in a retro magazine, instead of a blog, a thread, or a trailer? What does the format give you, and what do you want the reader to feel while flipping through it?

`root@glyfesse>` It was an idea that came to me out of nowhere. The intention was just a site to distribute the game, with a roadmap, a changelog, to help others, because I like to learn and to teach. But my head works like this: a simple idea keeps growing and branching like a tree. The magazine format came out of nowhere when I remembered the game magazines of the 90s and 2000s. When I got Super Metroid and Super Mario World there were no walkthroughs on the internet, none of those "pedias." You mined for it in magazines and with friends who also played. The magazine format reaches both my audiences, it's educational, and it's one more thing to have fun with. It evolved more or less like this: distribute, then a simple site, then a site to teach the minimum to whoever wants to learn, then in an educational way, and finally in an educational and fun way, which is the magazine.

---

`glyfesse>` You openly say you use AI at a moment when a lot of people hide it. Is that defense, honesty, or both?

`root@glyfesse>` I didn't see it as anything so philosophical. I see it as a tool. Like I said, I know concepts, basic and intermediate theory on some IT topics, but I don't know how to WRITE the code; I know what it has to do. I compare it to taking a car apart. Vibe code is letting the AI do everything for you, and that's horrible, it comes out really poor. AI doesn't CREATE, it only mixes concepts that already exist. However much it looks like creation, behind it there's a pile of old stuff mixed together. In the car comparison, vibe code is paying someone to take the car apart for you and then saying the work is yours. Want it done well? Do it yourself. Then AI-assisted programming is the tool you use to take the car apart. The tool does nothing on its own: you have to go there, pick it up, study it to know what each part is, how to handle it, how not to break or scratch the car. That's it. And look, when Linus Torvalds himself calls AI a tool and says Linux is not one of those anti-AI projects, who am I to use it in secret and still badmouth it?

---

`glyfesse>` Before a single line of code, the world already existed in writing. How was it to build so much story first, and what does a lifetime of reading have to do with it? Did the story ever not fit into what you could program?

`root@glyfesse>` I didn't go around like a madman reading books or opening random pages to research. I learned to read with my father, who read a lot, God rest him. Most of the books that inspired me I read over the course of my life. My first big book was "The Mysterious Island," by Jules Verne. I recommend it. The taste for fiction came from him too: there was a huge bookshelf at home and I naturally got curious. Through my father I met Verne, Asimov, Herbert, those sacred monsters of science fiction. Add to that the fact that in 2001 I started playing and running RPG (VTM, by White Wolf). That throws your imagination far when it comes to creating characters, worlds, that kind of thing. And to have a good movie, you need a good script. Nobody makes a film making up the story on the spot. Even tabletop RPG has a pre-established script, even if it's just a few bullet points. With a computer game it's the same thing. It's my own concept, I never studied it, but to me it's obvious.

Writing, typing out the world, was and still is fun, because there are always loose ends to solve, my mind gets into flow and, like in the tree comparison, a new little branch appears, and here comes more lore and more complication. Translating it to code I don't translate: I have my tool for that. I do the technical part; the AI does the manual part, the code. I never got scared I wouldn't manage. There are games and projects much bigger than mine, so mine was doable. What I got was excited to see HOW I was going to do it, how much I was going to learn and enjoy doing it.

---

`glyfesse>` You call yourself solo, but you mention a brother, a son, and friends helping. What is only yours, and where do the others come in?

`root@glyfesse>` 99.9% of the time spent is mine, or more. But I get excited and I talk about it with people, and whoever is a nerd like me ends up getting excited too and gives valuable tips. A friend asked me: "do you know RAG?" It helps a lot to index extensive works. I went after it. Or when I was on glintfx (it's the game's own framework, in progress in parallel, because none of the 2D game ones have everything I want, and the thing was turning into some giant, complicated pipes, mixing everything, a frame here, an api there), I talked to my brother and he told me to look into atomized architecture. I went and researched it. He also asked other key questions that forced me to go check whether it was the case to use in the game. I learned so much that today I'm atomizing the items and other mechanics, each in its own layer, with its own POCO.

And so you can see the AI isn't even that good: the combat system was turning into a giant monolith, mixing everything, because out of nowhere Claude decided everything fit in there. I noticed because every time I had a new idea, an item for example, I had to go into the combat system and touch everything. I atomized it and life became another thing: smaller builds, faster unit tests. And there I go again, with my tree-thinking, changing the subject. I think I answered.

---

`glyfesse>` The name "Glyfesse," where to write is to compile, was it chance or intention? And this cadence of coming out every now and then: is it freedom or pressure in disguise?

`root@glyfesse>` Whoever writes, with their brain, is always doing two things at once: the act of writing and the act of pulling together the knowledge they already had. In compilation, that knowledge would be the libraries. You keep checking whether you're doing it right, hunting for errors, flagging errors, fixing them. Or you write using a model that already exists, which is like a framework. It's more or less that. The name came from there.

And the magazine coming out every now and then is because I have to run my real life and alternate it with this here. And there are the tokens, right? They run out, heh. Then I'm FORCED to stop, sometimes two, three days, waiting for the seven-day window to close or praying for Anthropic to give me a reset halfway through <3

---

`glyfesse>` To close: for someone with a stalled dream, like yours was before AI, what would you say?

`root@glyfesse>` Go after the dream. A hobby isn't for making money, it's for giving pleasure, and it even makes you spend a little: some spend on tokens, others on betting, others buying concert tickets. I don't want to die frustrated. If it doesn't work out, at least I tried, and hard. Sooner or later you'll find a way to make it happen; but if you don't start, you certainly won't. As Chico Science used to say, "one step forward and you're no longer in the same place."
</content>
</invoke>
