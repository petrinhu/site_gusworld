<?php /* GERADO por scripts/gerar-secoes.php a partir de docs/content/edicao-6-galeria-bugs.md. Não edite à mão: corrija a fonte e gere de novo. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">galeria de bugs</span></p>

<p>Desta vez é um defeito só, e o que mudou em 35 minutos foi o diagnóstico: de uma área inteira do código para uma linha que faltava numa lista. Aconteceu na quinta, 13 de agosto de 2026, entre duas sessões de IA: a do jogo e a do GlintFX, o motor gráfico que o jogo usa.</p>

<h3>Uma linha numa lista</h3>

<p>Pouco depois das 17h, a sessão do jogo relatou à do GlintFX uma regressão. A sombra de caixa (<code>box-shadow</code>) do RmlUi, a biblioteca de interface que o motor embute, saía como um retângulo opaco de cor constante (24, 26, 34), sem tinta e sem desfoque; apagava o que estava atrás e cortava a borda dos botões vizinhos. Só acontecia no caminho novo de desenho do motor, o da classe <code>App</code>, e não no antigo, o da camada <code>UiLayer</code>. O título atribuía a falha ao "render pass do App", a etapa de desenho como um todo, e o experimento tinha controles: mesmo código do jogo, mesma versão do motor, mesmo driver de GL em software, reconstrução independente e nova execução idêntica, byte a byte.</p>

<p>Trinta e cinco minutos depois veio a retratação. Ela pede que a atribuição seja descartada, porque essa atribuição apontava para "uma área grande e genérica" do código da biblioteca: os sintomas continuavam válidos, o diagnóstico não. Os hexágonos de latão, que o primeiro relato dizia não serem desenhados, aparecem normalmente no caminho novo. Resultado, nas palavras da sessão: "é UM defeito, não três". O primeiro relato já avisava que as duas capturas eram de telas diferentes (a pausa pelo caminho antigo, o título pelo novo); a causa apareceu quando elas foram trocadas por uma sonda que roda a mesma cena e muda uma variável por vez. Ainda nas palavras da sessão: "a evidência anterior estava certa nos sintomas e errada na atribuição. Preferimos corrigir sozinhos e cedo do que defender um diagnóstico raso."</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">a acusação era enorme. o defeito cabia em um numero</span></p>
<p class="pensa">35 minutos entre acusar e corrigir é uma latência boa</p>

<p>A causa foi medida na entrada do gancho do jogo. A cada quadro, o <code>BeginFrame()</code> do RmlUi define a cor de limpar a tela como (0, 0, 0, 0), transparente. Depois roda o gancho do jogo (<code>set_frame_callback</code>), que legitimamente troca essa cor por (24, 26, 34) para pintar o fundo da cidade. Só então o RmlUi desfoca a sombra: o passe chama <code>glClear(GL_COLOR_BUFFER_BIT)</code> sem repor a cor, contando com o valor que o <code>BeginFrame()</code> deixou. Com o valor sujo, a camada da sombra nasce opaca em vez de transparente, com a cor do fundo da cidade. O contrato do gancho prometia restaurar o estado do GL depois dele, e quem cuida disso é o <code>GlStateGuard</code>, que não guardava <code>GL_COLOR_CLEAR_VALUE</code>: a string <code>CLEAR_VALUE</code> aparecia zero vezes no arquivo do guarda. Restaurar exatamente (0, 0, 0, 0) corrigia; restaurar com alfa 1, não.</p>

<p>À noite, a sessão do jogo confirmou o gêmeo do buraco, o valor de limpar o stencil (<code>GL_STENCIL_CLEAR_VALUE</code>), que também vazava e, caindo entre 1 e a profundidade de aninhamento do recorte, fazia o recorte do RmlUi desaparecer por completo, e contou que um teste anterior dela, com o valor 0xFF, tinha dado falso negativo, porque 0xFF fica fora desse intervalo.</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">um teste verde só prova o que ele chegou a testar</span></p>
<p class="pensa">vou lembrar disso na próxima vez que algo meu passar de primeira</p>

<p>A sessão do GlintFX aceitou a retratação na mesma tarde e a chamou de "exatamente o processo funcionando como deveria". O primeiro diagnóstico dela, inverter a ordem do gancho de cena e do <code>BeginFrame()</code>, já tinha sido entregue a um implementador que ainda não havia commitado nada; ele foi redirecionado com a causa corrigida. Na virada de 13 para 14 de agosto, o GlintFX liberou a versão em que o <code>GlStateGuard</code> captura e restaura os dois valores, o de cor e o de stencil.</p>
