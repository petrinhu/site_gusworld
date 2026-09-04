# Glyfesse #5: Seção de Programação (rascunho v1)

> O eixo expert da Edição #5. **Voz: `gus@glyfesse`**, a voz editorial da revista, em seção técnica (L-25
> autoriza termo técnico aqui: não é fala de personagem de jogo dentro do mundo do jogo). Estrutura canônica
> herdada das #1-#4: intro acessível + desculpa furada no CRT (nova nesta edição, não repete a da #4) →
> transição `//` → CRT `nano` → parte técnica com subtópicos e tabela → `//by:`.
> **Lente aprovada (`PAUTA-EDICAO-5.md`, §1 item 2, §3.1, D2):** o eixo expert de "conferir": a proteção pela
> metade que enganava, o isolamento que pertence a quem executa, e o analisador estático que achou em
> segundos o crash que a revisão adversarial não achou. **D2, decidida pelo líder em 04/09/2026: este é o
> fio que carrega a frase da lente da edição inteira** ("o verificador automático achou o travamento de
> ponteiro nulo em objeto já movido, que a revisão adversarial humana tinha deixado passar"); a peça se
> organiza em torno dele.
> **Datas:** 23/07/2026 (glintfx, os três primeiros fios) e 24/07/2026 (o jogo, só o fio 4: o gancho de build
> rodando a suíte gráfica na sessão viva do líder). **Não** entra o outro fato de 24/07 (a sabotagem que fez
> o teste travar em vez de reprovar): esse vai para o Detonado da Pausa, por divisória de lição, não só de
> fato (§5.2 da pauta: "se as duas peças terminarem na mesma moral, uma delas está errada": esta carrega
> "uma ferramenta barata viu o que a revisão cara não viu", o Detonado carrega "a verificação que não sabia
> falhar").
> ⛔ **Reserva:** os "5 becos sem saída" do glintfx não aparecem aqui, nem por citação de existência (herdado
> da trava da #4).
> ⛔ **Não piscar:** sem elogio a ferramenta nenhuma como vitória, sem sinal do que vem em agosto.
> **Fontes primárias, caminho absoluto:**
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260723-0820-glintfx-protecao-pela-metade.md`
> (ATO 1 a ATO 4: os fios 1, 2 e 3, com a citação exata do comentário do wrapper e do trecho de código do
> crash) e
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260724-2020-gusworld-onda-f4-becos-e-a-tarde-perdida.md`,
> seção 5 ("O achado que me pegou: eu estava rodando testes gráficos na sessão viva do líder", fio 4).
> **Travas verbatim aplicadas:** T3 (integral), T4 (formato de voz, prompt, `//`), T5 (zero travessão/emoji).
> **Status:** rascunho v1, aguardando `GATE-CONTEUDO` do editor-geral.

---

## pt-BR

Tem aviso que fecha o perigo, e tem aviso que só descreve o perigo. Vistos de longe, os dois parecem cuidado. Em 23 de julho de 2026, um projeto vizinho a este descobriu a diferença do jeito mais caro que existe: o perigo estava documentado, certinho, do lado de um código que não fazia nada a respeito dele.

O projeto é o glintfx, o framework de jogos que a equipe usa por fora, e o incidente aconteceu de madrugada, na sessão de trabalho ao vivo do dono da máquina: telas de teste abrindo e fechando sozinhas, na tela dele, sem ele ter pedido nada. Não era a primeira vez que esse tipo de coisa acontecia por ali: da última, um teste de janela parecido travou o touchpad da máquina até precisar reiniciar. Por isso a regra da casa é dura: teste que abre janela nunca roda na sessão viva de ninguém; roda isolado, sempre.

```
gus@glyfesse:~$ whoami
gus
gus@glyfesse:~$ # dessa vez fui eu que achei o problema?
gus@glyfesse:~$ # nao. foi um programa que ninguem elogia, rodando sozinho
gus@glyfesse:~$ # eu so assisto e escrevo depois. doeu o orgulho um pouquinho
```

/* Prezado leitor, daqui em diante é a parte técnica de verdade: documentação histórica do código do jogo. */
//gus@glyfesse

```
gus@glyfesse:~/programacao$ nano protecao-pela-metade.md
```

### O aviso que ninguém desligou

Existia um mecanismo pronto pra isso: um wrapper que isola cada teste antes de rodar. E ele tinha, escrito no próprio comentário, em português e em inglês, a explicação inteira do risco:

```
RESSALVA (confirmada por teste): remover WAYLAND_DISPLAY sozinho não impede
o motor gráfico de escolher Wayland, porque wl_display_connect(NULL) cai no
nome de socket padrão wayland-0 dentro do $XDG_RUNTIME_DIR quando a variável
está ausente, e esse socket continua vivo (pertence à sessão real do desktop).
```

A explicação estava certa. O código logo abaixo fazia uma coisa só: apagar a variável `WAYLAND_DISPLAY`. Documentado e não implementado. Alguém entendeu o problema inteiro, escreveu a explicação completa, e deixou o conserto pra quem chamasse o wrapper, sem dizer isso em lugar nenhum que o computador lesse.

### Isolamento pertence a quem executa, não a quem chama

Procurando melhor, apareceram três portas de entrada pro mesmo problema, não uma: o wrapper de cada teste (o de cima); o script do gate local, que lançava a suíte inteira sem isolamento próprio nenhum, confiando em quem o chamasse; e o script de cobertura, com o mesmo furo. Foi o segundo que causou o incidente daquela madrugada: uma chamada automática rodou a suíte completa quatro vezes seguidas, com trinta testes que abrem janela de verdade em cada rodada.

O princípio que sobrou disso virou regra permanente do projeto:

> O isolamento pertence a quem executa, não a quem chama.

Nenhum ponto de entrada pode depender de alguém lembrar de digitar um prefixo antes. Foi exatamente essa dependência que falhou.

### O que a verificação olhava, e onde o problema estava

No mesmo dia, mais tarde, apareceu o terceiro fato, e é o que carrega a lição da edição inteira. Com tudo consertado e verde, uma verificação automática (a mesma que barra qualquer entrega com problema de estilo, não só de comportamento) apontou isto:

```cpp
if (!impl_ || !impl_->initialized) {
    impl_->log_warn("...");   // se impl_ é nulo, entra aqui e desreferencia nulo
```

Se o ponteiro interno for nulo, a condição é verdadeira, entra no bloco, e usa o próprio ponteiro nulo lá dentro. Como o objeto é do tipo que só pode ser movido, um objeto do qual algo já foi movido tem justamente esse ponteiro em nulo. Duas linhas comuns de código bastavam pra travar o programa inteiro.

O que torna o fato interessante: uma revisão adversarial cuidadosa já tinha passado por ali antes, com cinco sabotagens de propósito, entrada hostil, o detector de erro de memória ligado o tempo todo. Ela testou chamar o objeto antes dele estar pronto, o caso óbvio. Não testou chamar o objeto depois de movido. A verificação automática achou em segundos, sem sabotagem nenhuma, só de olhar o código parado.

| O que a verificação olhava | Onde o problema estava |
|---|---|
| Se o objeto foi chamado antes de estar pronto | Se o objeto foi chamado depois de já ter sido movido |
| Apagar a variável de ambiente do processo | O socket padrão que ela escondia continuava vivo, do lado de fora |
| Cada teste isolado, um a um | O script que chama a suíte inteira, sem isolamento próprio |

### Do outro lado, no dia seguinte

No dia seguinte, 24 de julho, do lado do jogo, aconteceu a versão mais simples da mesma história. Um agente de qualidade estava testando outra coisa, uma tela de menu, e no meio do relatório dele apontou um problema que não tinha ido procurar: o gancho automático do projeto, que roda build e teste a cada arquivo editado, também estava herdando as variáveis da sessão gráfica real, a mesma sessão viva que a regra da casa protege. Ele não ficou só no quadrado dele. Se tivesse ficado, o risco continuava lá, sem ninguém saber.

Nenhum dos quatro fatos é sobre uma ferramenta ser melhor que outra. É sobre pra onde cada verificação estava olhando. Documentar o perigo não fecha a porta. Só fechar a porta fecha a porta, e só fecha de verdade quando quem tranca é quem vai passar por ela.

//by: gus@glyfesse

---

## EN

There's the kind of warning that closes the danger, and the kind that only describes it. From far away, both look like care. On July 23rd, 2026, a project next door to this one found out the difference the most expensive way there is: the danger was documented, properly, right next to code that did nothing about it.

The project is glintfx, the game framework the team uses from outside, and the incident happened in the middle of the night, in the machine owner's live work session: test windows opening and closing on their own, on his screen, without him asking for any of it. It wasn't the first time something like that happened there: last time, a similar window test locked up the machine's touchpad badly enough to need a reboot. That's why the house rule is strict: a test that opens a window never runs in anyone's live session; it runs isolated, always.

```
gus@glyfesse:~$ whoami
gus
gus@glyfesse:~$ # did i find the problem this time
gus@glyfesse:~$ # no. a program nobody praises found it, running by itself
gus@glyfesse:~$ # i just watch and write about it after. stung my pride a bit
```

/* Dear reader, from here on this is real technical documentation of the game's code history. */
//gus@glyfesse

```
gus@glyfesse:~/programming$ nano protecao-pela-metade.md
```

### The warning nobody turned into a fix

There was a mechanism built for exactly this: a wrapper that isolates every test before it runs. And it had, written right in its own comment, in Portuguese and in English, the entire explanation of the risk:

```
CAVEAT (test-confirmed): removing WAYLAND_DISPLAY alone does NOT stop the
graphics backend from picking Wayland, because wl_display_connect(NULL)
falls back to the default socket name wayland-0 inside $XDG_RUNTIME_DIR
when the variable is absent, and that socket is still alive (it belongs
to the real desktop session).
```

The explanation was correct. The code right below it did exactly one thing: erase the `WAYLAND_DISPLAY` variable. Documented and never implemented. Someone understood the whole problem, wrote the full explanation, and left the fix to whoever called the wrapper, without saying so anywhere the computer would read.

### Isolation belongs to whoever runs, not whoever calls

Digging further, three entry points to the same problem showed up, not one: the wrapper for each test (the one above); the local gate script, which launched the entire suite with no isolation of its own, trusting whoever called it; and the coverage script, with the same hole. It was the second one that caused that night's incident: an automated call ran the full suite four times in a row, with thirty tests that open real windows on every pass.

The principle that came out of it became a permanent house rule:

> Isolation belongs to whoever runs it, not whoever calls it.

No entry point can depend on someone remembering to type a prefix first. That's exactly the dependency that failed.

### What the check was looking at, and where the problem was

Later that same day, the third fact showed up, and it's the one that carries the whole issue's lesson. With everything fixed and green, an automated check (the same one that blocks any submission over a style problem, not just a behavior one) flagged this:

```cpp
if (!impl_ || !impl_->initialized) {
    impl_->log_warn("...");   // if impl_ is null, this branch dereferences null
```

If the internal pointer is null, the condition is true, it enters the block, and it uses that same null pointer inside. Since the object is move-only, an object that something was already moved out of has exactly that pointer set to null. Two ordinary lines of code were enough to crash the whole program.

What makes the fact interesting: a careful adversarial review had already gone through that code, with five deliberate sabotages, hostile input, the memory-error detector running the whole time. It tested calling the object before it was ready, the obvious case. It didn't test calling the object after it had been moved from. The automated check found it in seconds, no sabotage at all, just from looking at the code sitting still.

| What the check was looking at | Where the problem was |
|---|---|
| Whether the object was called before it was ready | Whether the object was called after it had already been moved from |
| Erasing the process's environment variable | The default socket it hid behind was still alive, on the outside |
| Each test isolated, one at a time | The script that calls the whole suite, with no isolation of its own |

### On the other side, the next day

The next day, July 24th, on the game's side, the simpler version of the same story played out. A quality agent was testing something else, a menu screen, and in the middle of their report they flagged a problem they hadn't gone looking for: the project's automated hook, which runs a build and tests on every edited file, was also inheriting the real graphics session's environment variables, the same live session the house rule protects. They didn't stay inside their own lane. If they had, the risk would have stayed there, with nobody the wiser.

None of the four facts is about one tool being better than another. It's about where each check was looking. Documenting the danger doesn't close the door. Only closing the door closes the door, and it only really closes when whoever locks it is whoever is about to walk through it.

//by: gus@glyfesse

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Contagem de palavras pt-BR (bloco `## pt-BR` inteiro: prosa + prompts + código + tabela, `wc -w`) | **896 palavras** |
| Contagem de palavras EN (bloco `## EN` inteiro, mesmo critério) | **926 palavras** |
| Estrutura canônica | intro (2 parágrafos) → desculpa furada nova (CRT) → transição `//` → CRT `nano` → 4 subtópicos (`###`), tabela no terceiro → fecho → `//by:` |
| Fios, em ordem, per brief | 1 (wrapper/`wl_display_connect`), 2 (isolamento/3 portas), 3 (analisador vs revisão adversarial, o fio da lente, D2), 4 (QA/gancho na sessão viva, 24/07) |
| Sabotagem que travou o teste (24/07) | **ausente** (foi para o Detonado da Pausa, por divisória de lição, §5.2) |
| "5 becos sem saída" | ausentes, nem citados |
| Elogio a ferramenta como vitória / sinal de agosto | nenhum (o fecho nega explicitamente essa leitura: "Nenhum dos quatro fatos é sobre uma ferramenta ser melhor que outra") |
| Travessão / en-dash | zero (ver prova abaixo) |
| Emoji | zero |
| Rótulo clínico | nenhum |
| Registro L-25 | voz editorial (`gus@glyfesse`), não personagem dentro do mundo do jogo; termo técnico livre |

### Prova por contagem: zero travessão, `//` dentro de 72 caracteres

Comando usado (thread principal, antes da entrega): `grep -c $'—\|–'` no arquivo publicável (zero
ocorrências nas duas línguas) e contagem de caractere de cada linha `//`/`/* */` isolada:

| Linha | Caracteres | Forma usada |
| :--- | :--- | :--- |
| `//gus@glyfesse` (pt e en) | 14 | `//` (cabe) |
| `//by: gus@glyfesse` (pt e en) | 18 | `//` (cabe) |
| nota-leitor pt (`Prezado leitor...`) | 108 | `/* ... */` (acima de 72, forma de bloco correta) |
| nota-leitor en (`Dear reader...`) | 96 | `/* ... */` (acima de 72, forma de bloco correta) |

Nenhuma outra linha usa o marcador `//` como pensamento isolado nesta peça (o CRT de desculpa usa `#` dentro
de linhas de prompt, que é fala digitada, não pensamento `//`, conforme o próprio molde herdado da #2 a #4).

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- Conferir com o revisor da onda 3 que a moral desta peça ("uma ferramenta barata viu o que a revisão cara
  não viu") e a do Detonado da Pausa ("a verificação que não sabia falhar") não colidem (risco §11 item 2
  da pauta).
- O CRT de desculpa é humor na voz de `gus@glyfesse` (voz editorial, não o personagem Gus dentro do mundo do
  jogo); ainda assim, por prudência e paralelismo com as demais peças da edição, recomendo que passe pela
  mesma leitura final do líder que as falas do Gus personagem, já que o brief desta peça não lista submissão
  T6 como obrigatória, mas o `GODS_LAWS.md` do site pede leitura final de toda fala do Gus, em qualquer
  registro.
- Copyedit formal (`revisor-textual`) e prova final.
- Arte/render: CRT verde reaproveitado, sem asset novo.
