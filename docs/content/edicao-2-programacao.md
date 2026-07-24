# Glyfesse #2 — Seção de Programação (rascunho v1)

> O eixo expert da Edição #2. Voz: `root@glyfesse` (o criador; nunca nomeado). Estrutura canônica: intro acessível + desculpa furada -> transição // -> CRT nano -> parte técnica com subtópicos -> //by:root.
> Lente aprovada: ADR-002 (C# AOT, 19/mai) como artigo de TI real; a reversão é só foreshadow (uma linha, "A sombra"). Datas: só maio como fato; sem C++/SDL3/glintfx/bus.
> Duas desculpas furadas (OPÇÃO A / OPÇÃO B): o líder escolhe UMA no GATE-COPY.
> ⚠️ COPYEDIT PENDENTE (S4): a linha de transição `//Prezado leitor...` precisa ser TRADUZIDA na versão EN (saiu em pt).
> Status: rascunho v1 do `technical-writer`, aguardando GATE-CONTEUDO.

---

## pt-BR

Tem uma pergunta que quase ninguém faz sobre um jogo pequeno, feito por uma pessoa só: por que ele roda? Não por que ele existe, isso é fácil de responder. Por que ele roda liso numa máquina que já viu dias melhores, num laptop de sete anos, num aparelho portátil que cabe na mochila. A resposta não está no que você vê na tela. Está numa decisão chata, tomada num sábado, escrita num arquivo de texto que ninguém deveria precisar ler.

Esta é a seção onde a gente abre esse arquivo. Todo número que a máquina precisa cuspir por segundo passou por uma escolha de linguagem, e linguagem, no fim, é o material com que a coisa é erguida. Este número da revista é sobre construção: fundação, concreto, alicerce. Então nada mais justo do que começar pela fundação de tudo, a pergunta seca de qual língua o computador vai falar por baixo do jogo.

Vou avisar de uma vez: daqui a pouco isto vira técnico de verdade. Mas prometo abrir devagar, com a porta destrancada, para quem nunca instalou nada na vida entender por que um sábado de maio virou o alicerce de tudo o que veio depois.

[OPÇÃO A]
Vão me perguntar por que eu faço uma revista logado como root, o superusuário, a conta que pode derrubar a casa inteira com um comando. A explicação é simples: eu estava levantando os alicerces do jogo com essa conta, o cimento ainda não tinha secado, e sair para trocar de usuário só para escrever umas linhas ia me tirar do ritmo da obra. Quem para a betoneira no meio da laje? Fica para a próxima demão. O sudo pode esperar a fundação curar.

[OPÇÃO B]
Vão querer saber por que a revista sai da conta de root. Olha, eu tentei rebaixar o privilégio, juro. Mas a fundação estava aberta, a vala escancarada, e mexer no permissionamento com a estrutura ainda escorada me pareceu convite para desabar tudo. Numa obra, ninguém troca a planta baixa depois que a primeira coluna subiu. Então fica root mesmo, até o concreto pegar. Depois eu ergo a parede do sudo.

//Prezado leitor, daqui por diante é parte técnica real de documentação histórica do código do jogo.
//root@glyfesse
root@glyfesse>~$ nano adr-002.md

### O problema

Um jogo tem um orçamento de tempo por quadro. Se você quer sessenta quadros por segundo, cada quadro tem cerca de 16 milissegundos para nascer, viver e morrer, e dentro dele cabe tudo: física, desenho, lógica, som. O alvo aqui nunca foi uma máquina de sonho. Foi o chão real: rodar bem num Steam Deck, numa placa GTX 1050, em laptops de 2017 para frente. Máquina fraca não perdoa desperdício.

Os caminhos quentes, os hot paths, são os pedaços de código que rodam muitas vezes por quadro e por isso mandam na conta. Aqui são três: a resolução de turno, o HMAC do save (a assinatura que prova que ninguém adulterou o arquivo salvo) e a IA. Esses três precisavam caber em menos de metade do orçamento de quadro numa GTX 1050, para sobrar folga para todo o resto.

O jogo nasceu em GDScript. GDScript é interpretado: o código vira bytecode que roda dentro de uma máquina virtual, um tradutor que fica no meio do caminho lendo as instruções uma a uma enquanto o jogo roda. Isso é ótimo para iterar, você troca uma linha e vê o resultado quase na hora, com hot-reload. Mas o tradutor no meio do caminho cobra pedágio, e em máquina fraca o pedágio aparece.

### As 4 opções na mesa

| Opção | Ganho nos hot paths | Custo |
|---|---|---|
| GDScript puro | 1x (linha de base) | Interpretado; iteração rápida com hot-reload |
| GDExtension C++, módulo a módulo | ~10-20x | Build cross-platform pesado, sem hot-reload, lento para solo |
| C# .NET 8 AOT | ~3-5x | Compilação nativa; iteração via `dotnet build` em ~5-15s |
| Rewrite para Unity IL2CPP | ~3-5x | Porta sem volta catastrófica |

### Por que o AOT ganhou

O detalhe que decidiu tudo: os outros ganhos moravam só nos hot paths. Você acelera três trechos e o resto do jogo continua no mesmo passo. A compilação nativa AOT (ahead-of-time: traduz o código inteiro para linguagem de máquina antes de rodar, em vez de interpretar instrução por instrução em runtime) não escolhe trechos. Ela acelera 100% do código, o quente e o morno e o frio, porque tira o tradutor do meio do caminho de vez.

E a iteração continuava tolerável para quem trabalha sozinho: um `dotnet build` fecha em segundos, não em minutos de build cross-platform. Somando, .NET 8 ainda é LTS, suporte de longo prazo, o que para uma fundação importa: você não quer que o alicerce saia de linha no ano que vem. Decisão registrada: C# .NET 8 AOT como linguagem primária, GDScript 100% deprecado.

### O custo assumido

Nada disso saiu de graça. O próprio ADR classificou a escolha como "one-way door massivo", uma porta de sentido único de tamanho grande: reverter não seria mexer numa linha, seria um rewrite paralelo de 2 a 4 semanas de trabalho. Por isso não passou no grito. Foi aprovado com cuidado, granular, em 8 rodadas de decisão, 30 diretrizes canonizadas, em 19 de maio.

### A sombra

Fechei o arquivo naquele 19 de maio com a expressão "porta sem volta" anotada, e a tratei como uma parede de concreto. Só não sabia, ainda, o quanto uma parede de concreto pode ser testada, nem quão fina "sem volta" às vezes se prova ser.

//by: root@glyfesse

---

## EN

There is a question almost nobody asks about a small game built by a single person: why does it run? Not why it exists, that one is easy. Why does it run smoothly on a machine that has seen better days, on a seven-year-old laptop, on a handheld that fits in a backpack. The answer is not on the screen. It sits in a boring decision, made on a Saturday, written into a text file nobody should ever have to read.

This is the section where we open that file. Every number the machine has to produce per second went through a choice of language, and language, in the end, is the material the whole thing is built from. This issue is about construction: foundation, concrete, footing. So it is only fair to start at the foundation of everything, the dry question of which language the computer will speak underneath the game.

Fair warning: in a moment this turns properly technical. But I promise to open slowly, with the door unlocked, so that someone who has never installed a thing in their life can still understand why one Saturday in May became the footing for everything that came after.

[OPTION A]
People will ask why I write a magazine logged in as root, the superuser, the account that can bring the whole house down with one command. The explanation is simple: I was pouring the game's foundations under that account, the cement had not set yet, and stepping out to switch users just to type a few lines would have broken the rhythm of the work. Who stops the mixer halfway through the slab? It waits for the next coat. sudo can wait until the foundation cures.

[OPTION B]
They will want to know why the magazine comes out of the root account. Look, I tried to drop the privilege, honestly. But the foundation was open, the trench wide, and touching the permissions with the structure still shored up felt like an invitation for the whole thing to collapse. On a build site, nobody swaps the blueprint after the first column goes up. So it stays root, until the concrete sets. I will raise the sudo wall later.

//Prezado leitor, daqui por diante é parte técnica real de documentação histórica do código do jogo.  [⚠️ traduzir na S4]
//root@glyfesse
root@glyfesse>~$ nano adr-002.md

### The problem

A game has a time budget per frame. If you want sixty frames per second, each frame gets about 16 milliseconds to be born, live and die, and everything has to fit inside it: physics, drawing, logic, sound. The target here was never a dream machine. It was the real floor: run well on a Steam Deck, on a GTX 1050, on laptops from 2017 onward. A weak machine does not forgive waste.

The hot paths are the stretches of code that run many times per frame and therefore rule the bill. Here there are three: turn resolution, the HMAC of the save (the signature that proves nobody tampered with the saved file) and the AI. Those three had to fit inside less than half of the frame budget on a GTX 1050, leaving slack for everything else.

The game was born in GDScript. GDScript is interpreted: the code becomes bytecode that runs inside a virtual machine, a translator sitting in the middle of the road reading the instructions one by one while the game runs. That is great for iterating; you change a line and see the result almost instantly, with hot-reload. But the translator in the middle of the road charges a toll, and on a weak machine the toll shows.

### The 4 options on the table

| Option | Gain on hot paths | Cost |
|---|---|---|
| Pure GDScript | 1x (baseline) | Interpreted; fast iteration with hot-reload |
| GDExtension C++, module by module | ~10-20x | Heavy cross-platform build, no hot-reload, slow for solo work |
| C# .NET 8 AOT | ~3-5x | Native compilation; iteration via `dotnet build` in ~5-15s |
| Rewrite to Unity IL2CPP | ~3-5x | Catastrophic point of no return |

### Why AOT won

The detail that decided everything: the other gains lived only in the hot paths. You speed up three stretches and the rest of the game keeps the same pace. Native AOT compilation (ahead-of-time: it translates the whole codebase into machine language before running, instead of interpreting instruction by instruction at runtime) does not pick stretches. It speeds up 100% of the code, the hot and the warm and the cold, because it takes the translator out of the middle of the road for good.

And iteration stayed tolerable for someone working alone: a `dotnet build` finishes in seconds, not in minutes of cross-platform building. On top of that, .NET 8 is still LTS, long-term support, which matters for a foundation: you do not want the footing to go end-of-life next year. Decision on record: C# .NET 8 AOT as the primary language, GDScript 100% deprecated.

### The assumed cost

None of this came for free. The ADR itself classified the choice as a "massive one-way door", a one-directional door of the large kind: reverting would not mean touching a line, it would mean a parallel rewrite of 2 to 4 weeks of work. That is why it did not pass by a show of hands. It was approved carefully, granularly, over 8 rounds of decision, 30 canonized guidelines, on the 19th of May.

### The shadow

I closed that file on the 19th of May with the phrase "point of no return" written down, and I treated it like a concrete wall. I just did not know, yet, how much a concrete wall can be tested, nor how thin "no return" sometimes proves to be.

//by: root@glyfesse
