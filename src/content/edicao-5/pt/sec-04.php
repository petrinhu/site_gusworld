<?php /* Reportagem de capa (#5) · "Três movimentos, um número" - fonte:
   docs/content/edicao-5-reportagem.md (## pt-BR), verbatim. Voz: Gus-editor,
   técnico (D1, decidida pelo líder em 04/09/2026: nomeia M8, Godot, C# e o
   submódulo engine/ pelo nome; L-25 não restringe esta seção técnica, só a
   ficção). Lente aprovada (BRIEFS-EDICAO-5.md, Peça 2): três movimentos
   datados (apagar 22/jul, conferir 23-24/jul, medir 7-8/ago), fechando no
   único número da edição que ninguém precisou acreditar, porque foi contado.
   Janela no primeiro parágrafo (D11): "de 22 de julho a 7 de agosto de 2026".

   Duas cercas que D1 não abre: sem a refundação dos repositórios (21/ago,
   matéria reservada, T3) nem o serviço de hospedagem da época; a trava §1.1
   vale dentro da Reportagem (bloco 3: a especialização do Gus Dragon é
   afirmada sem hedge, sem ternura, sem "para a idade", sem exclamação).

   Cortes obrigatórios (§5 da pauta): sem mecânica de submódulo, sem citar
   // ADAPTACAO (é do Cemitério); sem código, strace, nome de variável (é da
   Programação); sem a anatomia da colisão, as duas metades (é da Galeria); a
   falha do elenco entra abstrata, sem descrever nenhum personagem, com a
   frase do custo (D12, verbatim); sem narrar o menu, o verbatim de 22/07 ou
   a arte nova (é da caixa, abaixo). Sem travessão em nenhuma forma, glifo
   nem código HTML. Nome de batismo: nenhum.

   ★ CAIXA DO ACHADO DO GUS DRAGON (docs/content/edicao-5-reportagem-menu.md,
   ## pt-BR, verbatim, v2 já corrigida): peça própria por lei, adendo datado
   da L-24 do GODS_LAWS.md do site (D16, 04/09/2026: o líder recusou as duas
   opções levadas e mandou virar reportagem, verbatim: "Achados do gus sempre
   são especiais."). Entra como CAIXA ao final desta reportagem, no molde do
   encarte do glintfx da #4 (ver
   src/content/edicao-4/pt/sec-04.php, linhas 48-74): âncora própria
   #sec-04-menu para link profundo, prompt próprio. Div, não figure (figure
   tem margem lateral de navegador não resetada neste CSS - desalinharia a
   caixa).

   DIVISÓRIA COM A CAIXA (§5.4, deliberada): o corpo da Reportagem só aponta
   em meia frase para o achado de 22/07 sobre o menu inicial, sem narrá-lo; a
   caixa conta o menu (o que ele mostrava, o verbatim dele, a decisão de
   reaproveitar o CRT do boot, sem data de entrega) e NÃO toca o clipping de
   07/08, o número de linhas nem nenhuma parte dos três movimentos - isso é
   do corpo. Fronteira de registro (D1/D15): a caixa é técnica como o corpo
   que a hospeda, e não fala "de dentro do mundo" como a Galeria de Bugs
   (§6); nenhum revisor uniformiza uma pela outra. A caixa não nomeia a
   dependência externa que bloqueia o item (reserva para a #6). */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/reportagem$</span> <span class="dito">reportagem de capa</span></p>

<h3>Três movimentos, um número</h3>

<p>De 22 de julho a 7 de agosto de 2026, o mês teve três movimentos: tirar um jogo antigo de baixo do novo, conferir se o que sobrou continuava de pé, e por fim medir o que ficou. Cada um respondeu uma pergunta diferente. Nenhum deles deu a resposta que se esperava.</p>

<p>Na quarta-feira, 22 de julho, fechou o M8: o marco que tirou o Godot e o C# de dentro do projeto. Saíram, na mesma tacada, cento e setenta e dois arquivos da pasta do jogo antigo, segundo o registro daquele dia, e o submódulo <code>engine/</code>, onde vivia a base em C# que sustentou o GusWorld de maio a julho. O trabalho foi feito com cuidado obsessivo por dentro do repositório: uma tag de segurança antes de mexer em qualquer coisa, um build do zero como prova de que nada tinha quebrado, verificação a cada fase. O que se perdeu não estava dentro desse alcance. Estava fora dele: o código C# original, hoje, ninguém consegue mais abrir. Nada funcional se perdeu, porque cada linha útil já tinha sido traduzida pra C++ meses antes, com teste cobrindo o comportamento. O que se perdeu foi o registro.</p>

<p>O mesmo 22 de julho também foi o dia de um achado do Gus Dragon sobre o menu inicial do jogo. É outra história, contada à parte, logo depois desta.</p>

<p>Dois dias depois, quinta e sexta, veio a parte de conferir. Em linguagem direta: a checagem que já existia olhava pra um lado, e o problema estava do outro.</p>

<p>Na quinta-feira, um analisador automático de código (a ferramenta que lê o programa procurando erro, sem precisar rodar nada) achou, em segundos, um travamento que a revisão humana mais rigorosa do projeto tinha deixado passar: usar, dentro do código, um pedaço de memória que já tinha sido esvaziado por outra parte do programa, como se ainda estivesse cheio. A revisão humana, que testa o projeto com sabotagem proposital e situação hostil, tinha coberto o erro óbvio (usar algo antes de ele existir). Não tinha coberto esse: usar algo depois de ele já ter sido esvaziado.</p>

<p>No mesmo par de dias, do lado do jogo, uma segunda checagem falhou. Alguém disse ter conferido a aparência de um elenco inteiro de personagens antes de mandar gerar a arte final deles. Não tinha conferido. O elenco saiu inteiro com a cara errada, e regerar custou de novo. Quando alguém tentou minimizar dizendo que não tinha custado dinheiro de verdade, a resposta foi direta: "claro que custou, pago mensalidade!". A lição que ficou não é sobre arte: é que custo de terceiro é custo, mesmo quando não aparece numa fatura nova.</p>

<p>Duas semanas depois, na sexta e no sábado, veio a parte de medir. No dia 7 de agosto, o root jogou o demo inteiro: título, cidade, o diálogo com o NPC Bertoldo, o combate, a vitória. Não achou nada fora do lugar.</p>

<p>Depois passou o controle para o Gus Dragon, playtester, Revisor Adversarial de Design, jogar em pessoa. Ele achou dois problemas de colisão. A causa não foi sorte, nem outro jeito de jogar: ele estuda jogos, e o filtro dele para esse tipo de defeito é mais especializado que o do root. Ele já foi buscando esses erros, porque sabia que aquela classe de erro é comum. Tanto que encontrou.</p>

<p>No dia seguinte, ele perguntou quantas linhas de código o projeto tinha. A resposta não foi estimada: foi contada, na hora, direto do repositório. Cerca de 163 mil linhas ao todo. E o detalhe que fecha a conta: o código de teste, 78.200 linhas, é mais que o dobro do código do próprio jogo, 62.700.</p>

<p>Um jogo que ninguém tinha medido virou um número que ninguém precisou acreditar, porque foi contado. E foi contado no mesmo mês em que a checagem cuidadosa passou boa parte do tempo olhando para o lado errado da cerca.</p>

<?php /* fonte: docs/content/edicao-5-reportagem-menu.md (## pt-BR), verbatim
   (v2, corrigida). Estrutura: fala/prompt -> quatro parágrafos -> // -> //by:.
   Fronteira de registro: técnica, nomeia tecnologia (menu, arte, boot/CRT),
   como a Reportagem que a hospeda; não nomeia a dependência externa que
   bloqueia o item (reserva para a #6). */ ?>
<div id="sec-04-menu">
  <p class="fala"><span class="prompt">gus@glyfesse:~/menu$</span> <span class="dito">achado</span></p>

  <p>Em 22 de julho, por feedback de playtest, o Gus Dragon apontou uma coisa sobre o menu inicial do jogo. Não foi gosto pessoal: foi uma convenção do gênero que ele já conhecia, e o registro da observação diz isso com todas as letras. Verbatim dele: "o menu inicial (so ele) em geral tem alguma arte, ou animacao por tras, e nao a tela de onde o jogador estava".</p>

  <p>Ele tinha razão sobre o que via. O menu inicial mostra a última cena de onde o jogador parou, congelada atrás dos botões, a mesma tela que o menu de pausa também usa. Não é erro de código: é falta de decisão sobre a própria cara do menu. Ninguém tinha dado a ele algo só seu, e foi isso que ele reparou.</p>

  <p>A observação virou decisão no mesmo instante: em vez de encomendar arte nova, o menu inicial vai reaproveitar uma peça que o jogo já tem, o monitor CRT que aparece na tela de boot, a custo de asset zero. É decisão fechada, não ideia solta. Só que ela espera: a peça do jogo que desenha essa tela ainda não existe. Quando existir, o menu inicial ganha o fundo que já foi escolhido para ele. Até lá, continua mostrando a cena congelada, do jeito antigo, junto com o menu de pausa.</p>

  <p>Quem achou foi o Gus Dragon, playtester, Revisor Adversarial de Design.</p>

  <p class="pensa">virou decisão fechada. só falta a peça que ainda não existe</p>

  <p class="pensa assinatura">by: gus@glyfesse</p>
</div>
