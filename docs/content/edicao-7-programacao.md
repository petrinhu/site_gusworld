# Edição #7 · Seção 17 · Programação

> APROVADA pelo líder em 03/11/2026 ("Aprovo como está"), com as falas do Gus; o en segue ao líder junto com as outras traduções. Escrito pelo `technical-writer` a partir do brief §4.3 de `docs/editorial/BRIEFS-EDICAO-7.md` (linhas 346 a 371), com a Reportagem v2 como insumo (sem repetir o que ela conta).
> Voz do editor, de fora (L-25: o técnico mora aqui). As falas e os `//` do Gus são rascunho ao líder (T7). As citações de sessão vêm com fonte e data (T2).
> v2 (decisões do main): o 25 saiu do texto publicado; a grafia é GlintFX no texto publicado; o marcador fica `BRINQUEDO-PORTAO-DE-BOLSO`; o contato é o rodapé do site. Abertas: a contradição de número da fonte (Notas, pendência 1) e a tradução EN (pendência 5). As falas do Gus foram aprovadas (Notas, Aprovações do líder).

---

## pt-BR

Um portão é um programa que confere o trabalho antes de ele ser aceito. Ele segue uma regra escrita, por exemplo "só pode usar bibliotecas desta lista (conjuntos de código pronto que outros escreveram)", e responde de um de dois jeitos: "tudo certo" ou "reprovado". A pergunta que quase ninguém faz é outra: o portão olhou para alguma coisa?

Em 21 de agosto de 2026, a sessão de IA que trabalha no GlintFX, a biblioteca, montou um portão que disse "tudo certo" depois de olhar zero arquivos. A reportagem de capa conta por que o projeto estava recomeçando. Esta seção fica com a conferência.

```
gus@glyfesse:~$ whoami
gus
gus@glyfesse:~$ # o portao e velho e nunca quebrou. entao ele funciona
gus@glyfesse:~$ # eu nao confiro o verde, ele jaa disse que esta tudo certo
gus@glyfesse:~$ # ...tudo bem, nunca quebrou porque nunca olhou para nada
```

/* Prezado leitor, daqui em diante é a parte técnica: o portão, a conta que ele devia ter feito e o que a conta mostrou */
//gus@glyfesse

```
gus@glyfesse:~/programacao$ nano portao-varredura-vazia.md
```

### Um "tudo certo" sem nenhum arquivo

O portão de dependência (o que confere quais códigos de terceiros o projeto usa) foi escrito com uma regra de lista: só passa o que está na lista do permitido, e o resto é acusado. Ele passou nos dois controles de autoteste (testes que conferem se o próprio portão funciona) exigidos. O primeiro planta uma violação e prova que ela é acusada. O segundo prova que uma entrada limpa sai sem erro. Foram 35 casos e nenhuma falha.

Depois, a sessão montou um repositório de teste com quatro ligações proibidas óbvias (usos de código de fora que a regra veta) e rodou o portão contra ele, com os arquivos ainda fora do controle de versão (o registro que guarda cada mudança no código). A saída foi esta:

```
0 arquivos de compilação, 0 de código, 0 fluxos varridos
resumo: proibido=0
OK -- nenhuma ligacao fora da lista permitida.
saída: 0
```

Depois que os arquivos entraram no controle de versão, o mesmo portão acusou as quatro ligações e saiu com erro. No registro, a sessão escreveu: "A detecção funciona. O buraco é outro."

O portão perguntava ao controle de versão quais arquivos existiam. Se a resposta vinha vazia, por caminho errado, por repositório em estado estranho ou por comando que falhava sem avisar, o portão não varria nada, não achava nada e concluía que estava tudo certo.

No registro de 21 de agosto, a sessão do GlintFX resumiu o defeito numa frase:

> "Olhei e está limpo" e "não olhei nada" produzem a mesma saída verde.

Os dois controles não pegavam o caso porque ambos rodavam sobre arquivos que existiam. Nenhum exercitava a entrada vazia.

A tabela põe lado a lado o que o portão disse e o que ele tinha olhado. Além do portão de dependência, a revisão feita em seguida, no mesmo 21 de agosto, achou o mesmo defeito em mais sete portões do repositório:

| O que o portão disse | O que ele tinha olhado |
| :-- | :-- |
| "OK -- nenhuma ligacao fora da lista permitida" (portão de dependência, repositório de teste) | 0 arquivos de compilação, 0 de código, 0 fluxos varridos |
| "40 contadores dentro do teto" (portão que vigia o tamanho da dependência, repositório vazio) | Nada medido |
| Nada: o portão só rodava quando alguém lembrava de chamá-lo à mão | Nada, porque ele não rodava em nenhum fluxo |

Todos os portões achados foram consertados, com um teste de varredura vazia (um caso em que o portão não encontra nenhum arquivo para conferir) gravado no repositório.

BRINQUEDO-PORTAO-DE-BOLSO

### O terceiro controle: varredura vazia não é sucesso

O conserto tem três partes. A primeira: varredura vazia não é sucesso. Zero arquivos enumerados, ou um número implausivelmente baixo, sai com erro ou grita de um jeito inconfundível, e nunca imprime a linha de tudo certo. A segunda é um terceiro controle de autoteste, que prova que, com a varredura vazia, o portão não diz que está tudo certo. Sem ele, o conserto não está provado, pela mesma lógica que torna obrigatório o controle positivo. A terceira: medir se a trava antes do commit (um registro de mudança no código) está coberta, e escrever no próprio arquivo qualquer caso que fique invisível ao portão. O registro é direto: "Limitação declarada é aceitável; limitação silenciosa não."

No mesmo registro, a lição cabe numa frase:

> "Portão que passou nos próprios testes não está verificado: os testes dele cobrem os casos que quem o escreveu imaginou."

O que pegou o defeito foi rodar o portão contra uma entrada que ninguém tinha previsto: um repositório onde não havia nada para achar.

### A regra de paridade, de 2 de setembro

Em 2 de setembro de 2026, o root fixou uma regra: "O comportamento deve ser igual em qualquer OS para todas as ondas/fatias entregues" (OS é o sistema operacional; ondas e fatias são blocos de trabalho entregues de uma vez). O alcance veio no mesmo dia: igual e provado em cada sistema onde a fatia existe.

Antes disso, o projeto entregava primeiro no Linux e deixava o Windows para o fim, e cada entrega era declarada pronta assim mesmo. Pela regra nova, a entrega do Linux e a do Windows deixaram de ser duas tarefas em momentos diferentes e viraram uma entrega só.

A regra de paridade é um trecho novo da lei dos sistemas operacionais, no arquivo de leis do GlintFX, que existe desde 21 de agosto. A regra obrigou a auditoria que veio a seguir.

O root recusou uma exceção que dois agentes técnicos (sessões de IA com papel técnico) tinham recomendado: a peça que descobre teclado e mouse não tem cara pública (não aparece para quem usa o programa), e eles propuseram que, por isso, ela fechasse sozinha. Segundo o registro, a opção escolhida foi uma regra uniforme, sem julgamento caso a caso, porque julgamento é onde se erra.

### A auditoria: 45 itens e 19 reabertos

Foram 45 itens dados como concluídos, verificados um a um com evidência. Dezenove foram reabertos. Três achados pesaram mais:

- A biblioteca chega ao Windows sem camada de plataforma nenhuma (o trecho do código que fala com cada sistema). Até os testes que não dependem de sistema estavam trancados atrás de uma condição de Linux.
- Nenhuma verificação interna do código tinha rodado no compilador da Microsoft (o programa que transforma o código em algo que o computador executa), porque o Windows só era compilado no modo de entrega final (a versão otimizada que vai para quem usa). O registro resume: "metade da rede de segurança do código nunca existiu lá."
- Onze portões de qualidade nunca rodaram no Windows: licença, dependência zero, violação de camada e colisão de nome público (dependência zero: sem código de terceiros; violação de camada: uma parte do código usando outra que não deveria; colisão de nome público: dois nomes iguais visíveis de fora).

Dois desses portões já foram consertados e provados num servidor de testes (um computador que roda o código e confere o resultado), nos cinco sistemas.

O registro de 3 de setembro lista cinco itens e diz que quatro deles são a mesma coisa em roupas diferentes:

> "uma verificação que parecia estar funcionando e não estava olhando nada."

Esta seção fica com a conta: um portão que olhou zero arquivos disse que estava tudo certo, e a auditoria que veio depois reabriu 19 de 45 itens dados como prontos.

Quem quiser o caso técnico inteiro, com os registros, os portões e os números, pode pedir pelo contato no rodapé do site. Este texto é a entrada, não o caso completo.

//by: gus@glyfesse

---

## EN

A gate is a program that checks work before it is accepted. It follows a written rule, for example "only libraries (ready-made code sets written by others) from this list may be used", and answers in one of two ways: "all clear" or "rejected". The question almost nobody asks is a different one: did the gate look at anything?

On August 21, 2026, the AI session that works on GlintFX, the library, set up a gate that said "all clear" after looking at zero files. The cover story tells why the project was starting over. This section keeps the check.

```
gus@glyfesse:~$ whoami
gus
gus@glyfesse:~$ # the gate is old and it never broke. so it works
gus@glyfesse:~$ # i dont check the green, it already said everything is fine
gus@glyfesse:~$ # ...fine, it never broke because it never looked at anything
```

/* Dear reader, from here on is the technical part: the gate, the count it should have made, and what the count showed */
//gus@glyfesse

```
gus@glyfesse:~/programacao$ nano portao-varredura-vazia.md
```

### An "all clear" with no files at all

The dependency gate (the one that checks which third-party code the project uses) was written with a list rule: only what is on the allowed list passes, and everything else is flagged. It passed the two self-tests (tests that check that the gate itself works) the project required. The first plants a violation and proves it is flagged. The second proves that a clean input comes out without error. There were 35 cases and no failures.

Then the session built a test repository with four obvious forbidden links (uses of outside code that the rule forbids) and ran the gate against it, with the files still outside version control (the record that keeps every change to the code). The output was this:

```
0 build files, 0 code files, 0 flows scanned
summary: forbidden=0
OK -- no link outside the allowed list.
exit: 0
```

After the files entered version control, the same gate flagged the four links and exited with an error. The record says: "Detection works. The hole is elsewhere."

The gate asked version control which files existed. If the answer came back empty, because of a wrong path, a repository in a strange state, or a command that failed without warning, the gate scanned nothing, found nothing, and concluded that all was fine.

In the record of August 21, the GlintFX session summed up the defect in one sentence:

> "'I looked and it is clean' and 'I did not look at anything' produce the same green output."

Both self-tests missed the case because they ran on files that existed. None exercised the empty input.

The table puts side by side what the gate said and what it had looked at. Besides the dependency gate, the review done right after, on the same August 21, found the same defect in seven more gates of the repository:

| What the gate said | What it had looked at |
| :-- | :-- |
| "OK -- no link outside the allowed list" (dependency gate, test repository) | 0 build files, 0 code files, 0 flows scanned |
| "40 counters within the limit" (gate that watches the size of the dependency, empty repository) | Nothing measured |
| Nothing: the gate only ran when someone remembered to call it by hand | Nothing, because it did not run in any flow |

Every gate found was fixed, with an empty-scan test (a case where the gate finds no file to check) recorded in the repository.

BRINQUEDO-PORTAO-DE-BOLSO

### The third control: an empty scan is not a success

The fix has three parts. First: an empty scan is not a success. Zero files listed, or an implausibly low number, ends with an error or shouts in an unmistakable way, and never prints the all-clear line. Second, a third self-test, which proves that with an empty scan the gate does not say all is fine. Without it the fix is not proven, by the same logic that makes the positive control mandatory. Third: measure whether the lock before the commit (a record of a change to the code) is covered, and write into the file itself any case the gate cannot see. The record is direct: "A declared limit is acceptable; a silent limit is not."

In the same record, the lesson fits in one sentence:

> "A gate that passed its own tests is not verified: its tests cover only the cases that whoever wrote it imagined."

What caught the defect was running the gate against an input nobody had foreseen: a repository where there was nothing to find.

### The parity rule, from September 2

On September 2, 2026, root set a rule: "The behavior must be the same on any OS for every wave and slice delivered" (OS is the operating system; waves and slices are blocks of work delivered at once). The scope came the same day: the same, and proven, on each system where the slice exists.

Before that, the project delivered first on Linux and left Windows for last, and each delivery was still declared finished. Under the new rule, the Linux delivery and the Windows delivery stopped being two tasks at different times and became a single delivery.

The parity rule is a new paragraph in the GlintFX law about operating systems, in the laws file, which has existed since August 21. The rule required the audit that followed.

Root refused an exception that two technical agents (AI sessions acting as technicians) had recommended: the piece that finds keyboard and mouse has no public face (nothing that the people using the program see), and they proposed that, for that reason, it could close on its own. According to the record, the option chosen was one uniform rule, with no case-by-case judgment, because judgment is where mistakes happen.

### The audit: 45 items and 19 reopened

There were 45 items marked as done, checked one by one with evidence. Nineteen were reopened. Three findings stood out:

- The library reaches Windows without any platform layer (the part of the code that talks to each system). Even the tests that do not depend on the system were locked behind a Linux-only condition.
- No internal check of the code had ever run in Microsoft's compiler (the program that turns code into something the computer runs), because Windows was only compiled in release mode (the optimized version given to users). The record sums it up: "half of the code's safety net never existed there."
- Eleven quality gates never ran on Windows: license, zero dependencies, layer violation and public name collision (zero dependencies: no third-party code; layer violation: one part of the code using another it should not; public name collision: two identical names visible from outside).

Two of these gates have already been fixed and proven on a test server (a computer that runs the code and checks the result), on all five systems.

The record of September 3 lists five items and says that four of them are the same thing in different clothes:

> "a check that seemed to be working and was not looking at anything."

This section keeps the count: a gate that looked at zero files said all was fine, and the audit that came after reopened 19 of 45 items marked as finished.

Anyone who wants the full technical case, with the records, the gates and the numbers, can ask through the contact in the site footer. This text is the entry point, not the full case.

//by: gus@glyfesse

---

## Notas de produção (internas, não publicar)

Raiz do bus usada nas fontes: `BUS` = `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/`. `GlintFx` = `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GlintFx/`. `madrugada` = `BUS/2026-08-21-glintfx-estado-madrugada.md`. `0530` = `BUS/20260903-0530-glintfx-novidades-paridade-e-documentacao.md`. `portão 21/08` = `BUS/2026-08-21-portao-varredura-vazia-verde.md`.

### Aprovações do líder (03/11/2026)

- **Programação aprovada.** AskUserQuestion, pergunta feita depois de 17:10:01, verbatim: "Aprovo como está". Inclui as falas do Gus, o "Prezado leitor" e as assinaturas. Texto pt e en como estão nesta versão.
- **Textos do brinquedo aprovados** ("Aprovo como estão", mesma data). O marcador `BRINQUEDO-PORTAO-DE-BOLSO` segue como está.
- **Tradução EN:** segue ao líder junto com as outras traduções. Nada do inglês está aprovado ainda.

### Pendências (fechadas e abertas)

1. **Número 25: contradição da fonte, fora do texto publicado (decisão do main, v2).** O registro diz "Dezenove foram reabertos. O quadro caiu de 45 para 25 concluidos" (`0530:34-36`). Na conta, 45 menos 19 dá 26. A busca por "de 45 para 25" e "Dezenove foram reabertos" em todo o bus achou só este arquivo. O texto publicado (pt e en) diz só 45 itens dados como concluídos e 19 reabertos. Não escolhi 25 nem 26 e não inventei a causa. A contradição fica registrada aqui; resolvê-la na fonte, com a sessão do GlintFx, é passo separado.
2. **Grafia do marcador do brinquedo (decidido pelo main, v2; aprovado pelo líder em 03/11/2026).** Fica `BRINQUEDO-PORTAO-DE-BOLSO`, a grafia do brief (§4.3, linha 369; gate do §4.10, linha 522). Um marcador por idioma, logo depois da tabela do portão. Um marcador com a outra grafia passaria no gate sem ser trocado.
3. **Contato do convite (decidido pelo main, v2; aprovado pelo líder em 03/11/2026).** O texto pede o caso "pelo contato no rodapé do site", e o rodapé serve. O link está em `Projects/site_gusworld/src/includes/rodape.php:34` (`mailto`); o endereço não foi copiado para cá.
4. **Falas e `//` do Gus (T7, L-08): aprovadas pelo líder em 03/11/2026.** Lista de conferência do que foi ao GATE-CONTEUDO: (a) a saída `gus` do `whoami`; (b) as três linhas `#` da desculpa furada, pt e en; (c) o comando `nano portao-varredura-vazia.md`; (d) a transição `/* ... */` e `//gus@glyfesse`; (e) `//by: gus@glyfesse`. Há um erro de digitação de mão na desculpa em pt (`jaa`), e em en uma falta de apóstrofo (`dont`). Ambos saem sem custo se o líder preferir linha limpa.
5. **Traduções EN são de agente.** Vão junto da pt. Inclui a frase do líder em inglês (a pt original está na tabela de fatos, item 11) e as duas citações de sessão (itens 5, 8 e 20). Os nomes de saída de terminal (`OK -- ...`) estão em inglês como tradução da linha impressa pelo portão.
6. **Revisão textual: fechada.** Aplicada na v3 (P-M1 a P-M10) e no ajuste P-M7 da v3.1.

### Decisões de redação (L-07: decisão do líder × preenchimento meu)

- **Verbatim do líder usado:** "O comportamento deve ser igual em qualquer OS para todas as ondas/fatias entregues". Fonte: `GlintFx/GODS_LAWS.md:100` (data 02/09/2026), e cópia do registro em `0530:24`. Conferido por leitura nesta rodada; a reconferência no commit segue a L-07.
- **Texto da opção escolhida, não fala do root:** "regra uniforme, sem julgamento caso a caso, porque julgamento é onde se erra". Fonte: `GODS_LAWS.md:105` e `0530:30`. No texto aparece como "segundo o registro, a opção escolhida".
- **Acentuação restaurada.** O registro de 03/09 vem sem acento. Restaurei nas citações, como a #6 fez (`docs/content/edicao-6-programacao.md`, nota 146). A saída de terminal do portão está sem alteração: o terminal escreveu "ligacao" sem acento.
- **Duas citações de sessão, cada uma com data e fonte:** a de 21/08 (`portão 21/08:39`) e a de 03/09 (`0530:60`). A lição de 21/08 (`portão 21/08:70-72`) também é citação de sessão.
- **Contagens separadas, sem misturar:** 7 portões com varredura vazia (`madrugada:51-52`), 11 portões que nunca rodaram no Windows (`0530:42`), 2 portões consertados e provados nos cinco sistemas (`0530:44`).
- **[INF] O medidor da #6 não está ligado ao texto.** A #6 descreve um portão de dependência e um medidor, reprovado porque a dependência crescia (`src/content/edicao-6/pt/sec-17.php:46`). Não sei se é o mesmo artefato do portão de 21/08 (lista do permitido) nem do portão dos "40 contadores" (`madrugada:52-53`). O texto não afirma que são. Se o revisor achar que o leitor vai juntar os dois, cortar o termo "medidor" da linha da tabela.
- **Lei de paridade.** Está no corpo da seção `## L-04` do `GlintFx/GODS_LAWS.md`, cujo primeiro registro é de 21/08 (`GODS_LAWS.md:96`). O texto diz "trecho novo da lei dos sistemas operacionais, no arquivo de leis do GlintFx, que existe desde 21 de agosto". Não há a expressão que a T11 proíbe, nem a frase de que as leis nasceram na auditoria.
- **Fora do texto, de propósito:** o recomeço e o nascimento das leis (Reportagem); a lei de 28/08 e a frase sensível dela; o canal de avisos (`0530:52-56`); a ordem falsa (`0530:46-50`); o repositório privado e o nome dele; o achado do Gus Dragon (o achado dele não vira linha de peça alheia, adendo de 04/09 da L-24); qualquer linguagem de programação citada.
- **Montagem (decisão do main, v3).** A Programação será montada à mão, como a #6: o conversor não lê saída de terminal.
- **Revisão textual aplicada (v3, P-M1 a P-M10).** Citações novas: "A detecção funciona. O buraco é outro." (`portão 21/08:30`) e "Limitação declarada é aceitável; limitação silenciosa não." (`portão 21/08:58`). Aspas em "metade da rede de segurança do código nunca existiu lá." (`0530:41`). Glosas para leigo na primeira ocorrência de cada termo, fora das aspas. Terminal com a quarta linha da fonte (`portão 21/08:26`).
- **P-M7, ajuste do main (v3.1).** A expressão "todos os portões" saiu do texto, pt e en, por não ter fonte. O texto usa a formulação da fonte: "a revisão feita em seguida, no mesmo 21 de agosto" (data 21/08 em `madrugada:3`; "a auditoria que se seguiu achou o mesmo defeito em mais sete portões do nosso repositório" em `madrugada:51-52`).
- **Voz:** "o root", como na Reportagem v2. Nenhuma palavra da lista de T2 fora de citação. Nada posterior a 03/09.
- **Desculpa furada nova.** Não repete a da #6 (nano × vim). A linha `nano` segue o molde da #6 com outro nome de arquivo (`portao-varredura-vazia.md`). O digitado do `crt-nano` é decorativo: o CSS anima o comando, e o texto não depende dele.

### Fatos e inferências, com arquivo:linha

| # | Fato no texto | Fonte | Marcação |
| :-- | :-- | :-- | :-- |
| 1 | Portão de 21/08; dois autotestes; 35 casos; os dois rodavam sobre arquivos que existem | `portão 21/08:3`, `:12-16`, `:41-43` | FATO |
| 2 | Repositório de teste com 4 ligações; saída de quatro linhas (a quarta, `saída: 0`, e `exit: 0` no inglês), reproduzida sem alteração no pt | `portão 21/08:18-27` | FATO |
| 3 | Depois de versionar, acusou as quatro; "a detecção funciona. O buraco é outro" | `portão 21/08:29-30` | FATO |
| 4 | Enumeração vazia leva ao OK | `portão 21/08:34-37` | FATO (explicação do registro) |
| 5 | "Olhei e está limpo" e "não olhei nada" produzem a mesma saída verde | `portão 21/08:39` | FATO, citação de sessão de 21/08 |
| 6 | Os dois controles rodavam sobre arquivos que existiam; nenhum exercitava a entrada vazia | `portão 21/08:41-43` | FATO |
| 7 | Conserto em três partes (varredura vazia, terceiro controle, limitação escrita) | `portão 21/08:50-58` | FATO |
| 8 | Lição: "Portão que passou nos próprios testes..." | `portão 21/08:70-72` | FATO, citação de sessão |
| 9 | Mais sete portões; "40 contadores dentro do teto"; um portão que nunca era executado; todos consertados com varredura vazia gravada | `madrugada:51-57` | FATO |
| 10 | Registro de 03/09, cobrindo "02 e 03 de setembro" | `0530:5`, `:8` | FATO |
| 11 | Regra de paridade, data 02/09, alcance igual e provado; corpo da L-04 | `GODS_LAWS.md:94`, `:96`, `:100` | FATO |
| 12 | Antes da regra, entregava-se primeiro no Linux; cada entrega declarada pronta | `0530:26` | FATO |
| 13 | Janela do Linux e do Windows viraram uma entrega só | `0530:28` | FATO |
| 14 | Exceção recusada, recomendada por dois agentes técnicos; a razão está na opção escolhida | `GODS_LAWS.md:105`; `0530:30` | FATO (atribuição à opção, não ao root) |
| 15 | "a auditoria que a lei obrigou" | `0530:32` | FATO |
| 16 | 45 itens dados como concluídos, verificados um a um | `0530:34` | FATO |
| 17 | 19 reabertos; a fonte traz "caiu de 45 para 25 concluídos", número que o texto publicado não usa | `0530:36` | FATO; contradição registrada na pendência 1 |
| 18 | Três achados: camada de plataforma, compilador da Microsoft em modo de entrega final, onze portões que nunca rodaram no Windows | `0530:40-42` | FATO |
| 19 | Dois portões consertados e provados nos cinco sistemas | `0530:44` | FATO |
| 20 | "uma verificação que parecia estar funcionando e não estava olhando nada" (quatro de cinco itens) | `0530:58-60` | FATO, citação de sessão de 03/09 |
| 21 | Medidor e portão de dependência da #6 | `src/content/edicao-6/pt/sec-17.php:46` | FATO; a ligação com os itens 1 e 9 não está no texto [INF] |
| 22 | Contato no rodapé | `src/includes/rodape.php:34` | FATO; pendência 3 |

**Contas feitas:** 35 casos (`portão 21/08:16`); 4 ligações (`:18`); 7 portões (`madrugada:51`); 40 contadores (`madrugada:53`); 45 itens (`0530:34`); 19 reabertos (`0530:36`); 25 concluídos, com a aritmética de 26 (`0530:36`, pendência 1); 11 portões no Windows (`0530:42`); 2 consertados (`0530:44`); 5 sistemas (`0530:44`).

---
