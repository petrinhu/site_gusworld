# Glyfesse #5: Detonado da Pausa (rascunho v1)

> **Seção 8, tamanho M, D4 decidida em 04/09/2026: entra cheia.** Serviço **atemporal**, mesmo molde do
> Detonado da Simulação (#3) e do Detonado do Diálogo (#4): como o menu de pausa funciona por trás da tela
> hoje, não uma reportagem datada. **Ancora em 24/07/2026** (a conversão de arquitetura e a bateria de
> mutação), sem narrar o mês inteiro.
> **Angle statement:** como o menu de pausa funciona por trás da tela, hoje: um laço só, cada tela um
> estado, cancelar mantém o foco, e a prova de que a prova sabe reprovar.
> **A divisória contra a Programação (§5.2 da pauta) é o eixo desta peça:** a Programação carrega a lição
> "uma ferramenta barata viu o que a revisão cara não viu" (o analisador estático de 23/07); esta peça
> carrega a lição distinta "a verificação que não sabia falhar" (a sabotagem que fez o teste **travar**,
> em vez de reprovar, por falta de limite de tempo, 24/07). **Se as duas peças terminarem na mesma moral,
> uma delas está errada**, conferido ao final deste documento.
> ⛔ **Não entra:** o bug do "andar sozinho" como evento narrado (isso é da Galeria de Bugs; aqui só a
> arquitetura de hoje, sem o sintoma antigo). ⛔ Sem tarja de spoiler (nenhum termo embargado apareceu na
> pesquisa desta peça; nenhum token `▮▮▮` foi necessário (ver Notas de produção).
> **Fonte primária, caminho absoluto:**
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/archive/20260724-2020-gusworld-onda-f4-becos-e-a-tarde-perdida.md`,
> seções "2. O que foi feito, em ordem de risco crescente", "3. O beco do aninhamento, e o mini-driver" e
> "4. O método: quem escreve não é quem testa, e o teste tem que ter dente".
> **Travas verbatim aplicadas:** T3, T4, T5.
> **Status:** rascunho v1, aguardando `GATE-CONTEUDO` do editor-geral.

---

## pt-BR

```
gus@glyfesse:~/detonado$ detonado da pausa
```

Até pouco tempo, cada tela do jogo (o título, a dificuldade, salvar e carregar, a própria pausa, a batalha, o visualizador de animação) tinha o próprio jeito de escutar o teclado: um laço que só ela controlava, bombeando pra si os eventos do sistema inteiro enquanto estivesse no ar. Hoje existe um laço só. Cada tela é um estado dentro dele: entra, trata o que chegou, avança, termina, sai. Nenhuma tela mais monopoliza nada.

Duas telas são pais de outra: o título abre a tela de dificuldade, e a pausa abre salvar e carregar. Isso pedia cuidado, porque duas telas vivas ao mesmo tempo é exatamente o tipo de situação que já rendeu problema sério no passado do projeto. A solução foi um mini-condutor por fora, dono do próprio laço: ele roda a tela-pai até ela terminar; se a resposta foi "abrir a filha", roda a filha; se a filha foi cancelada, volta pro topo e roda o mesmo objeto-pai de novo, não um novo; se a filha confirmou, os dois terminam juntos.

Esse detalhe do "mesmo objeto" é o que preserva o foco. O que está em destaque numa lista, o que já foi escaneado: isso nasce no construtor da tela, não toda vez que ela reabre. Se nascesse toda vez, cancelar a dificuldade e voltar ao título jogaria o destaque de volta pro primeiro item, e quem estava navegando perderia o lugar sem aviso.

Prova de vida: existe uma bateria que passeia pelas seis telas sozinha, sem ninguém olhando, e confere se cada uma faz o que promete. Em 24 de julho ela fechou em 2.536 testes verdes, contra 2.424 antes da conversão.

```
[pausa] cada tela entra, trata evento, avanca e sai sem monopolizar ... ok
[pausa] cancelar a filha reentra no mesmo objeto pai, foco preservado ... ok
[pausa] fechar a janela em qualquer fase da tela pula o resto ......... ok
[pausa] nenhum laco sobrevive fora do laco central ..................... ok

todos os testes: 2536/2536
```

O número por si só prova pouco: só diz que o que já funcionava continuou funcionando depois de mexer em outra parte. A parte que importa de verdade aconteceu antes desse número fechar limpo.

Cada tela, ao entrar no molde novo, foi sabotada de propósito antes de ser aceita: alguém quebra uma linha, compila de verdade, roda a suíte de verdade, e confere se algum teste morre. Na primeira tela, sete sabotagens, seis testes morreram. Uma sobreviveu: quebrar a linha que fecha a janela. Nenhum teste, puro ou de integração, apertava o X daquela tela. Corrigiram, e a sabotagem foi reconferida à mão, não só pelo relatório. E aí veio o detalhe que vale a peça inteira: com a linha quebrada, o teste não falhava. Ele **travava**. O laço nunca chegava à condição de saída, então ele ficava pendurado pra sempre. A suíte não tinha limite de tempo por teste, e um travamento penduraria a integração inteira em vez de reprovar rápido. Entrou o limite ali mesmo: o buraco achado ao caçar outro buraco.

Nas telas seguintes o buraco não voltou, porque o teste de fechar janela já nasceu dentro do molde. Nenhuma delas travou depois disso: ou passava, ou reprovava, nunca ficava quieta esperando alguém notar.

Teste que pendura fica quieto, e quieto parece verde. É a lição desta peça, e é diferente da lição de qualquer analisador automático que aponta erro na hora: aqui o problema não era o que a verificação via. Era o que ela fazia quando o próprio teste parava de responder. Fim.

---

## EN

```
gus@glyfesse:~/detonado$ pause walkthrough
```

Until recently, every screen in the game (the title, the difficulty pick, save and load, the pause menu itself, battle, the animation viewer) had its own way of listening to the keyboard: a loop only it controlled, pumping the entire system's events to itself for as long as it stayed up. Today there's a single loop. Every screen is a state inside it: enter, handle whatever came in, advance, finish, exit. No screen hogs anything anymore.

Two screens are parents to another: the title opens the difficulty screen, and the pause opens save and load. That called for care, because two live screens at once is exactly the kind of situation that already caused a serious problem in the project's past. The fix was an outside mini-driver, owning its own loop: it runs the parent screen until it finishes; if the answer was "open the child", it runs the child; if the child was cancelled, it loops back to the top and runs the very same parent object again, not a new one; if the child confirmed, both finish together.

That "same object" detail is what keeps the focus. What's highlighted in a list, what's already been scanned: that's born in the screen's constructor, not every time it reopens. If it were born every time, cancelling out of difficulty and going back to the title would throw the highlight back to the first item, and whoever was navigating would lose their place without warning.

Proof of life: there's a battery that walks all six screens on its own, with nobody watching, and checks whether each one does what it promises. On July 24th it closed out at 2,536 green tests, up from 2,424 before the conversion.

```
[pause] every screen enters, handles event, advances and exits without hogging . ok
[pause] cancelling the child re-enters the same parent object, focus kept ....... ok
[pause] closing the window at any phase of a screen skips the rest ............. ok
[pause] no loop survives outside the central loop ............................... ok

all tests: 2536/2536
```

The number by itself proves little: it only says what already worked kept working after something else got touched. The part that actually matters happened before that number closed clean.

Every screen, on its way into the new mold, got sabotaged on purpose before being accepted: someone breaks a line, compiles for real, runs the suite for real, and checks whether any test dies. On the first screen, seven sabotages, six tests died. One survived: breaking the line that closes the window. No test, unit or integration, ever pressed the X on that screen. It got fixed, and the sabotage got re-verified by hand, not just from the report. And here's the detail worth the whole piece: with that line broken, the test didn't fail. It **hung**. The loop never reached its exit condition, so it stayed stuck forever. The suite had no per-test time limit, and a hang would have hung the whole integration run instead of failing fast. The limit went in right there: the hole found while hunting another hole.

On the screens that followed, the hole never came back, because the close-window test was already born inside the mold. None of them hung after that: they either passed or failed, never sat quiet waiting for someone to notice.

A test that hangs stays quiet, and quiet looks green. That's this piece's lesson, and it's different from the lesson of any automated tool that flags an error on the spot: here the problem wasn't what the check was looking at. It was what it did when the test itself stopped answering. Done.

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Parágrafos de prosa pt-BR (fora prompt/código) | 8 (dentro do M: 6 a 8) |
| Parágrafos de prosa EN (mesmo critério) | 8 |
| Números | 2.536 (24/07), contra 2.424 antes; ambos conferidos na fonte, seção "9. O teste ao vivo" do arquivo-fonte |
| O bug "andar sozinho" narrado como evento | **ausente** (é da Galeria de Bugs) |
| Arquitetura de estados, mini-condutor, foco preservado | presentes (escopo desta peça, per divisória §5.2) |
| A sabotagem que travou o teste (24/07) | presente e é o eixo da peça |
| "o que a verificação olhava" / analisador estático / "a máquina viu o que o humano não viu" | **ausente** (é da Programação) |
| Lição desta peça | "teste que pendura fica quieto, e quieto parece verde" / "a test that hangs stays quiet, and quiet looks green" |
| Travessão / en-dash | zero |
| Emoji | zero |
| Rótulo clínico | nenhum |

### Token de censura `▮▮▮`

A pesquisa nesta fonte não encontrou nenhum termo embargado (nome de personagem, mecânica de combate
sensível, plot de party) na parte que trata do menu de pausa. Por isso **nenhuma tarja/token `▮▮▮` foi
usado nesta peça**: usá-lo sem um termo real por trás seria decoração falsa, o oposto do que o mecanismo
das #3/#4 protege. Se o `GATE-CONTEUDO` encontrar algo que precise de censura, ela entra no mesmo molde das
edições anteriores (elemento vazio, `aria-label="trecho censurado"`/`"censored excerpt"`, nunca texto).

### ★ Prova da divisória com a Programação (3 fatos exclusivos de cada lado)

| Fatos exclusivos do Detonado da Pausa (esta peça) | Fatos exclusivos da Programação (`edicao-5-programacao.md`) |
| :--- | :--- |
| 1. O laço único e o contrato de estado (entra/trata/avança/termina/sai), substituindo seis laços próprios | 1. O comentário do wrapper descrevendo `wl_display_connect(NULL)` caindo no socket padrão, com o código abaixo fazendo só metade do conserto |
| 2. O mini-condutor para telas-pai/filha, e o "mesmo objeto" que preserva o foco entre cancelamentos | 2. As três portas de entrada e o princípio "o isolamento pertence a quem executa, não a quem chama" |
| 3. A sabotagem que fez o teste **travar** em vez de reprovar, e o limite de tempo que faltava (24/07) | 3. O analisador estático achando o crash de ponteiro nulo em objeto movido-de que a revisão adversarial (5 sabotagens) não achou, mais o QA do jogo achando o gancho herdando a sessão viva (24/07) |

**Nenhum dos dois lados repete o fato ou a lição do outro:** esta peça nunca menciona o analisador
estático nem "a máquina viu o que o humano não viu"; a Programação (conferido no arquivo dela) não contém
a palavra "travou"/"hang" referida ao teste de fechar janela, nem o número 2.536, nem "mini-condutor". As
duas peças descrevem sabotagem de mutação em dias vizinhos (23/07 e 24/07) mas em sistemas diferentes
(glintfx x jogo) e com achados que não se sobrepõem.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- Conferir com o revisor da onda 3 que a moral desta peça e a da Programação não colidem (risco §11 item 2
  da pauta), prova acima, a confirmar em revisão externa também.
- Copyedit formal (`revisor-textual`) e prova final.
- Arte: nenhuma nova (molde do documento desclassificado reaproveitado).
