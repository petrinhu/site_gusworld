<?php /* Galeria de Bugs (#5) - fonte: docs/content/edicao-5-galeria-bugs.md
   (## pt-BR), verbatim. Voz: Gus, DE DENTRO DO MUNDO (fronteira de registro
   deliberada, D1/D15, §5.4 da pauta: a Reportagem de capa é técnica e nomeia
   tecnologia por decisão do líder; a Galeria fala de dentro do mundo. As
   duas convivem na mesma edição de propósito; nenhum revisor uniformiza uma
   pela outra).

   DOIS casos, um de cada lado da cerca do mês: "O passo que sobrava"
   (aconteceu e foi consertado, 24/jul: o Gus continuava andando sozinho ao
   fechar o menu de pausa, porque o laço do menu engolia a tecla solta) e "O
   que atravessa e o que não atravessa" (aconteceu e está aberto, 07/ago: o
   clipping de colisão jogador x ator, achado pelo Gus Dragon, playtester,
   Revisor Adversarial de Design). Trava §1.1 obrigatória no segundo caso:
   especialização afirmada seca, sem hedge, sem ternura, sem "para a idade",
   sem exclamação.

   Vocabulário do mundo (D15, decidida 04/09/2026): "um inimigo que faz
   ronda", "alguém do lugar", "um bloco". Nunca "NPC", "androide inimigo",
   "prop de cenário" (o bus usa esses termos técnicos; a peça traduz para o
   vocabulário de dentro). Honestidade obrigatória: a correção do clipping
   ainda não foi escolhida (mexe no feel da física; decisão do líder antes de
   qualquer linha).

   Pensamento acima de 72 caracteres (com a marca) vira "pensa longo"
   (comentário de bloco, barra-asterisco); até 72, "pensa" comum (marcador
   barra-barra) - o CSS injeta as marcas; os marcadores de comentário não
   entram no HTML, quem escreve. Nenhuma fala/pensamento do Gus termina em ponto final (pontuação
   interna, quando a fonte tem duas frases no mesmo aparte, é preservada).
   Sem travessão em nenhuma forma, glifo nem código HTML. Erros de digitação
   da fonte (nao, tava, licenca) são deliberados, classe mecânica, e entram
   verbatim - não são corrigidos.

   Zero termo de produção (arquitetura de estados, método de mutação, número
   de linhas de código) - reservados ao Detonado da Pausa (§8) e à Seção de
   Programação (§17). */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">galeria de bugs</span></p>

<p>Desta vez os dois bugs vêm de lados opostos da mesma cerca. Um nasceu, foi visto e morreu no mesmo dia. O outro nasceu, foi visto, e continua vivo, esperando escolherem o que fazer com ele.</p>

<p class="pensa longo">prefiro contar os dois do jeito que aconteceram, sem fingir que sei o fim do segundo</p>

<h3>O passo que sobrava</h3>

<p>Fechava o menu de pausa e continuava andando sozinho, com o dedo já fora da tecla havia um bom tempo. O root sentia isso toda vez: solta a direção, abre a pausa, fecha a pausa, e a cidade seguia andando comigo sem ninguém ter mandado nada. A tecla solta nunca chegava a avisar ninguém, porque o laço do menu engolia esse aviso pra si e não deixava passar pra frente. Consertaram em 24 de julho. Desde então, soltar a tecla é soltar a tecla, e parar é parar.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">eu nao tava desobedecendo. a tecla solta so nao tava chegando</span></p>
<p class="pensa">e mesmo assim doeu um pouco descobrir que o problema nunca fui eu</p>

<h3>O que atravessa e o que não atravessa</h3>

<p>O root jogou o demo inteiro, do título até a vitória, e não achou nada. Quem achou foi o Gus Dragon, playtester, Revisor Adversarial de Design: ele foi direto no tipo de erro que já sabia ser comum, porque estuda jogos, e o filtro dele para essa classe de defeito é mais especializado que o do root.</p>

<p>Ficou parado encostado num bloco, bem no caminho de alguém do lugar em ronda. Quando essa pessoa andou por cima dele, os dois corpos ficaram presos na mesma sobreposição, e a única saída foi apertar Sul. Repetiu o experimento do outro lado, dessa vez perto de um inimigo que faz ronda: o inimigo atravessou ele por um instante, mas dessa vez ninguém ficou preso, porque não havia nada sólido atrás.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">o inimigo entra e sai de mim sem pedir licenca, com ou sem eu no caminho</span></p>
<p class="pensa">so o jogador resolve colisao. e so quando ele se move</p>

<p>É aí que mora a causa: quem trava contra o mundo sou eu, sempre, e só quando eu me movo. Quem faz ronda nunca trava contra nada, nunca desliza, nunca para. Ficar parado no lugar errado foi o único jeito de expor a lacuna. A correção ainda não foi escolhida, porque mexe no jeito que o mundo responde ao corpo, e essa decisão não é minha.</p>
