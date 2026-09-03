# Glyfesse #4: Detonado do Diálogo (rascunho v1)

> **Seção CHEIA na #4** (deixou de ser opcional: Decisão 2 do `GATE-PAUTA`, `PAUTA-EDICAO-4.md`).
> **Voz: Gus.** Sem fala de `root`: nenhuma frase dele foi autorizada para esta edição; não se
> fabrica citação.
> **Lente aprovada, verbatim da pauta:** *"como a conversa com o Bertoldo Caím funciona por
> dentro, pela lente de 'a primeira vez que o mundo responde em vez de só existir', cortando o
> que ele diz: a palavra do NPC fica sempre de fora, só a arquitetura que produz a resposta
> entra."*
> **Enquadramento:** seção de **serviço, ATEMPORAL**, mesmo molde da Detonado da Simulação (#3):
> guia de "como isso funciona", não reportagem datada. Ancora no fato de **06/07/2026** (o NPC
> Bertoldo Caím fica interagível) sem narrar o mês inteiro.
> **Status:** rascunho v1 do `narrative-writer` (2026-09-03), aguardando `GATE-CONTEUDO`.
>
> ⚠️⚠️ **A trava desta seção, com uma diferença importante em relação à #3:** na #3 o escritor
> **não recebeu** os termos censurados, e por isso não podia vazá-los: a garantia era estrutural.
> **Aqui não é o caso.** A pesquisa desta peça encontrou uma fala-placeholder do NPC (mockup
> `docs/design/mockups/05-dialogo-bertoldo-retrato-real.html`, explicitamente marcada como
> *"PLACEHOLDER funcional (redação final = narrative-writer)"*). **Essa fala não aparece em
> nenhum lugar deste texto, nem parafraseada.** A garantia aqui não é "impossível vazar", e sim
> "cortada de propósito", que é exatamente a lente aprovada (*"cortando o que ele diz"*). Onde a
> palavra dele apareceria há o token `▮▮▮`, sempre idêntico, decorativo: a palavra não chega à
> página por escolha editorial, não por acidente de pesquisa.

---

## pt-BR

```
gus@glyfesse:~/detonado$ detonado do diálogo
```

Até seis de julho, dava pra andar a cidade inteira sem ouvir uma palavra de volta. Tinha gente parada nas esquinas. Tinha um velho lendo jornal na praça, de manhã, sempre no mesmo banco. Mas isso ali era cenário. Você passava perto, e o cenário continuava exatamente igual, porque continuar igual é tudo que cenário sabe fazer.

Isso mudou. E a parte que eu acho que interessa não é o que ele diz: isso eu não vou escrever aqui, por decisão de quem escreve a fala dele, e faz bem. O que interessa é como uma conversa vira alguma coisa que roda de verdade.

Uma conversa não é um papo solto. É um mapa de paradas, e cada parada só leva a outra parada se uma condição bater. A primeira vez que você chega perto dele, o mapa é um; se você já passou por ali antes, o mapa te joga direto num outro ponto de entrada: ele nota que já te viu, e não repete a saudação do zero. Isso já é diferente de cenário: cenário não sabe se é a primeira vez.

No meio da conversa, você escolhe como responder: três jeitos, curioso, direto ao ponto, ou só um aceno e seguir andando. Os três valem, os três pesam diferente. Mas os três desembocam no mesmo lugar depois. Nenhum deles trava um caminho que os outros dois não alcançam; a escolha muda o tom de como você chegou ali, não o que existe do outro lado. Isso é de propósito: mais forquilha não é mais profundidade; às vezes é só mais galho pra alguém esquecer de podar.

E o mapa quase não anota nada. De tudo que acontece nessa conversa, só duas coisas ficam guardadas: que você já esteve ali, e qual dos três jeitos você escolheu. O resto (o que ele já sabe sobre onde você andou, o que você já resolveu por aí), a conversa só LÊ. Ela nunca escreve por cima do resto do mundo. Ele reage ao que você fez. Ele não decide por você.

Tem uma coisa a mais que eu gosto nisso. A fala dele não mora dentro do jogo. Mora num arquivo de texto que só quem revisa e traduz chega a ler rodando solto: na hora de montar o jogo de verdade, aquele texto fecha dentro de um pacote, selado, e é o pacote que o jogo carrega. O jogo nunca lê texto cru. Isso não foi pensado pra revista nenhuma, foi pensado pra separar o que é fonte do que é produto, mas ajuda até aqui: não tem como eu vazar o que, na hora de escrever isto, eu mesmo decidi não usar.

Testei, claro. Existe uma bateria que abre essa conversa sozinha, sem ninguém olhando, e confere se cada parada faz o que promete. Trecho de hoje, transcrito:

```
[dialogo] carrega o mapa de paradas sem erro ........... ok
[dialogo] primeira vez != segunda vez ................... ok
[dialogo] as 3 respostas desembocam num só lugar ........ ok
[dialogo] ▮▮▮ ............................................ ok
[dialogo] só duas anotações saem dessa conversa ......... ok
[dialogo] o pacote final não guarda texto cru ........... ok
[dialogo] a cena fecha sem deixar sujeira ................ ok

todos os testes: 1383/1383
```

As tarjas são minhas. A fala dele eu tive na mão e escolhi não usar: não tem o que vazar do que ficou de fora por decisão.

Quando o retrato dele chegou de verdade (antes disso era só um nome dentro de uma caixa, texto e estrutura, nada desenhado), a suíte inteira já rodava esses 1383 sozinha, e verde. Isso não prova que a conversa é boa. Prova só uma coisa pequena: quando alguém aperta o botão de falar com ele, algo responde de verdade, e não trava no meio.

Demorou pra virar cenário com cara. Bastou um dia pra esse cenário responder. Fim.

---

## EN

```
gus@glyfesse:~/detonado$ dialogue walkthrough
```

Up until the sixth of July, you could walk the whole city and never hear a word back. People stood on corners. An old man read the newspaper on the same bench in the square, every morning. But all of that was scenery. You walked past, and the scenery stayed exactly the same, because staying the same is all scenery knows how to do.

That changed. And the part I think matters isn't what he says: I'm not writing that here, by decision of whoever writes his lines, and rightly so. What matters is how a conversation turns into something that actually runs.

A conversation isn't loose chat. It's a map of stops, and each stop only leads to another stop if a condition is met. The first time you approach him, the map is one thing; if you've already been there before, the map drops you straight into a different entry point: he notices he's already seen you, and doesn't repeat the greeting from scratch. That's already different from scenery: scenery doesn't know if it's the first time.

Partway through, you choose how to answer: three ways, curious, straight to the point, or just a nod and moving on. All three count, all three carry their own weight. But all three end up in the same place afterward. None of them locks a path the other two can't reach; the choice changes the tone of how you got there, not what exists on the other side. That's on purpose: more forking isn't more depth; sometimes it's just one more branch someone forgets to prune.

And the map barely writes anything down. Of everything that happens in that conversation, only two things get kept: that you've already been there, and which of the three ways you chose. Everything else (what he already knows about where you've been, what you've already solved out there), the conversation only READS. It never writes over the rest of the world. He reacts to what you've done. He doesn't decide for you.

There's one more thing I like about it. His lines don't live inside the game. They live in a text file that only whoever reviews and translates it ever gets to read running loose: when the real game gets built, that text closes up inside a package, sealed, and it's the package the game loads. The game never reads raw text. That wasn't designed for any magazine's sake, it was designed to keep source separate from product, but it helps even here: there's nothing I can leak of what, while writing this, I chose not to use.

I tested it, of course. There's a battery that opens this conversation on its own, with nobody watching, and checks whether each stop does what it promises. A slice of today's run, transcribed:

```
[dialogue] loads the stop map with no error .............. ok
[dialogue] first time != second time ...................... ok
[dialogue] all 3 answers end up in one place ............... ok
[dialogue] ▮▮▮ .............................................. ok
[dialogue] only two notes come out of this conversation ..... ok
[dialogue] the final package holds no raw text .............. ok
[dialogue] the scene closes without leaving a mess ........... ok

all tests: 1383/1383
```

The blackouts are mine. I had his line in hand and chose not to use it: there's nothing to leak from what was left out on purpose.

When his real portrait finally arrived (before that it was just a name in a box, text and structure, nothing drawn), the whole suite was already running those 1383 on its own, and green. That doesn't prove the conversation is good. It proves one small thing: when someone presses the button to talk to him, something answers for real, and doesn't get stuck halfway.

It took a while to become scenery with a face. It took one day for that scenery to answer. Done.

---

## Notas de produção

### O que a pesquisa encontrou (feito, não presumido)

| Fonte | O que deu |
| :--- | :--- |
| `docs/design/narrativa/dialogue-tree-npc-intro.md` (blueprint canônico, ratificado 03/06/2026) | O grafo de nós: `n0_greet` → `n1_hook` → 3 ramos (`n2a/b/c`) → `n3_reconverge` → saída; dispatcher de revisita `n7_revisit_hub` |
| `resources/dialogues/npc_intro_bertoldo.gw.text` | Confirma: só o fluxo first-visit está implementado (revisita "fica para quando o resto do VS existir"); flags escritas = `npc_intro.met` + 3 bools de escolha (o blueprint original previa 1 enum — diferença de implementação, sem efeito no texto, que fala em "duas coisas ficam anotadas" no nível conceitual, não bit a bit) |
| `docs/design/mockups/05-dialogo-bertoldo-retrato-real.html` | Confirma ADR-014 + NPC-MVP "já implementados e testados headless (1383 testes)" e que aquele mock é **"a PRIMEIRA vez que o retrato real aparece renderizado"** — daí a frase de fecho do texto |
| `HISTORICO_GUS_ECOSSISTEMA.md` (memória) | Data-âncora confirmada: `2026-07-06 · ADR-014 runtime de diálogo POCO C++20 (supersede ADR-003) · M7 NPC Bertoldo Caím interagível` |

⚠️ **Nota honesta sobre o número 1383.** A fonte não deixa claro se é o total da suíte do jogo inteiro naquele instante, ou uma contagem escopada só ao diálogo. O texto trata como o **total da suíte** (mesmo padrão do Detonado da #3, que também citava o total geral como "prova de vida" da peça em foco, não uma contagem exclusiva da arena) — não como número exclusivo do sistema de diálogo. Se o gate de conteúdo achar isso ambíguo, é o único número da peça que merece reconferência antes do `GATE-RENDER`.

### Como as tarjas serão montadas (para o gate de arte)

Reaproveitando integralmente a decisão do líder de manter a estética da #3:

1. **Elemento vazio.** Cada tarja é um elemento sem texto interno (nem em atributo, nem em comentário) — só `aria-label="trecho censurado"`. O token `▮▮▮` do corpo do texto (usado no bloco de log acima) é o mesmo caractere idêntico da #3, largura fixa, não calculada a partir de conteúdo nenhum — porque não existe conteúdo por trás dele.
2. **Largura por POSIÇÃO, nunca por conteúdo.** 2-3 classes de largura fixa (`tarja-curta`/`tarja-longa`), atribuídas por onde a tarja cai no layout do "documento", nunca medidas a partir do que ela cobriria.
3. **Moldura de documento desclassificado + carimbo vermelho diagonal**, mesma peça visual da #3 (retângulo de cantos arredondados, borda vermelha, `CENSURADO!!!` torto e descuidado). ⚠️ **Não reaproveitei o canto `sterling corp.`** — aquilo foi autorização de spoiler específica do líder para a #3 (a tease do vilão), e não presumo que valha de novo aqui sem pedir. Se o líder quiser repetir o Easter egg nesta peça, é decisão dele, não peguei emprestado.
4. **Quem revisar esta peça não pode ser quem a escreveu** (regra herdada da #3).
5. **Critério de aceitação no `GATE-RENDER`:** procurar qualquer termo relacionado à fala real de Bertoldo (inclusive a linha placeholder do mockup 05) no HTML/CSS/JS servido — não deve achar nada, porque não existe nada a achar.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- A arte (tarjas + carimbo) ainda não existe — ver especificação acima.
- Copyedit formal e prova final.
- Confirmar com o líder se quer ou não repetir o Easter egg de canto (`sterling corp.` ou outro) nesta peça, antes do gate de arte fechar.
