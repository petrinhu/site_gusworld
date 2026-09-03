<?php /* Galeria de Bugs (#4) - fonte: docs/content/edicao-4-galeria-bugs.md (## pt-BR).
   Voz: Gus. Regra da seção (herdada da #3): a piada PRIMEIRO, o técnico DEPOIS.
   DUAS metades: "ACONTECEU" (o flash do menu, achado e resolvido no mesmo dia,
   17/jul) e "QUASE ACONTECEU" (a trava de diagonal, o contrafactual e a mecânica
   de por que nunca precisou disparar - vai ALÉM da #3 sem repetir a frase que a
   #3 já publicou). Subtítulos em negrito da fonte viram <h3>.

   ★ CANON NOVO DA #4: pensamento acima de 72 caracteres vira classe "pensa longo"
   (comentário de bloco, marcadores barra-asterisco); até 72, classe "pensa" comum
   (marcador barra-barra) - a fonte já sinaliza a forma e a contagem bate.
   Nesta edição também aparecem FALAS do Gus no meio da seção (não só a de
   abertura): prompt + dito completos, mesma marcação de sempre.

   Nenhuma fala/pensamento termina em ponto final (pontuação interna, quando a
   fonte tem duas frases no mesmo aparte, é preservada). Sem travessão em nenhuma
   forma, glifo nem código HTML. Erros de digitação da fonte (alguem, nao, rapido,
   ate) são deliberados e entram verbatim - não são corrigidos. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">galeria de bugs</span></p>

<p>Desta vez são dois casos. Só um deles é bug de verdade. O outro é o tipo de vitória mais chato que existe: a que ninguém vê, porque o defeito não chegou a nascer.</p>

<p class="pensa">prefiro essa vitória chata a qualquer aplauso</p>

<h3>O flash que durou um dia</h3>

<p>Abre o menu, fecha o menu, e por um instante a tela inteira pisca de branco, feito flash de câmera velha, das que ainda usam filme e cegam todo mundo por engano. Aconteceu comigo. Eu reportei na hora. O registro atribui o reporte a mim. O registro é impreciso: quem reportou foi o Gus Dragon, playtester, Revisor Adversarial de Design.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">pisca branco quando fecho o menu, alguem confere isso</span></p>
<p class="pensa">nao ia deixar pra depois. isso incomoda o olho</p>

<p>O jogo usava um contexto gráfico para o menu e outro para o jogo por trás dele, e trocava entre os dois toda vez que o menu abria ou fechava. No instante da troca, por uma fração de segundo, a tela mostrava o vazio entre um contexto e outro: daí o flash. O conserto (registrado como ADR-018) uniu os dois num contexto só: sem troca, sem vazio, sem flash. Reportado e resolvido no mesmo dia, 17 de julho.</p>

<p class="pensa longo">achado e resolvido no mesmo dia é o tipo de estatística que eu gosto de ver</p>

<h3>O interruptor que nunca precisou ligar</h3>

<p>A #3 já contou que o jogo guarda, desde o começo, um ajuste pronto para ligar que ninguém ligou até hoje. Falta o resto: o que aconteceria se ele não existisse, e por que, apagado, nunca deu problema.</p>

<p>Sem esse ajuste, andar na diagonal sairia mais rápido que andar reto: a raiz de dois que sobra quando dois eixos se somam sem dividir depois. Não é sutil: dá pra sentir, dá pra cronometrar, dá pra virar truque de quem descobre primeiro. Eu tinha posto isso na lista antes de o quadrado dar um passo sequer.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">eu nao apostei que ia dar certo. eu apostei que dava pra ligar rapido se desse errado</span></p>
<p class="pensa">e ate agora nao precisou. isso tambem conta</p>

<p>E, mesmo assim, o interruptor nunca precisou ligar. Porque até hoje nada no jogo cobra do jogador andar reto contra o relógio: sem corrida, sem prazo, a vantagem da diagonal fica invisível, dormindo dentro do código, esperando um dia que ainda não chegou. Quando chegar, ligar não é reescrever o movimento inteiro: é virar uma chave só, porque o ajuste mora num único lugar desde que a tela nasceu.</p>

<p>Um bug morreu no dia em que nasceu. O outro nunca chegou a nascer. As duas coisas só acontecem quando alguém prestou atenção antes, não depois.</p>
