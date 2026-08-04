<?php /* Galeria de Bugs (#3, ESTREIA) - fonte: docs/content/edicao-3-galeria-bugs.md (## pt-BR).
   Voz: Gus. Regra da seção: a piada PRIMEIRO, o técnico DEPOIS.
   ⚠️ Aqui o // é a forma APARTE CURTO, embutido logo depois da frase (decisão do
   editor-geral, 2026-08-03): o timing da piada depende de ele vir colado. A forma
   bloco-ao-fim é a do Editorial (§03). Nenhum aparte leva ponto final nem maiúscula
   inicial. Os subtítulos em negrito da fonte viram <h3> (sub-cabeçalhos da seção).
   `root` em <code> (é nome de usuário, ASCII), como o md marca. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">galeria de bugs</span></p>

<p>Na edição passada eu escrevi "Volte na #3". Voltaram. O que eu tenho para mostrar é um boneco que gruda na quina.</p>

<p class="pensa">prometido é prometido, nunca disse que era grande</p>

<h3>O boneco que decidiu morar na quina</h3>

<p>Segunda e terça, 22 e 23 de junho. O quadrado azul mal tinha começado a andar, e a primeira coisa que fez com a liberdade foi raspar num canto e ficar por ali. Havia passagem do lado. Ele não quis. Parede ele já sabia contornar; quina, não.</p>

<p>O conserto: quando o jogador raspa numa quina, o programa o empurra o mínimo para o lado &#8212; o suficiente para contornar o canto, nunca o bastante para atravessar parede sólida. Um tanto a mais e o remédio vira o problema. O Stardew Valley resolve do mesmo jeito; o defeito é clássico o bastante para ter nome de jogo.</p>

<p>O registro daquele dia atribui o achado ao <code>root</code>. O registro está impreciso. Quem achou foi o Gus Dragon, playtester, 11 anos &#8212; e ele não achou depois. Ele avisou antes.</p>

<p class="pensa">o registro serve para a data, para o fato não serve</p>

<h3>A lista</h3>

<p>Ele lê sobre como se fazem jogos porque gosta. Antes de o quadrado dar o primeiro passo, já tinha nomeado o que ia sair torto:</p>

<table class="specs">
  <thead>
    <tr><th>O que ele nomeou</th><th>O que apareceu</th><th>O que o projeto fez</th></tr>
  </thead>
  <tbody>
    <tr><td>arrastar / grudar</td><td>o boneco preso na quina</td><td>consertado no mesmo dia</td></tr>
    <tr><td>olhar na direção errada</td><td>na diagonal, o boneco encara o lado dominante</td><td>aceito de propósito: a arte é de 4 direções, e 8 dobraria a arte inteira. Decisão registrada do <code>root</code>, em aberto</td></tr>
    <tr><td>travar na diagonal</td><td>a diagonal saía mais rápida que o movimento reto</td><td>alavanca deixada pronta e desligada, no ponto único de ajuste</td></tr>
    <tr><td>atravessar parede</td><td>&#8212;</td><td>coberto no conserto da quina. Voltou um mês depois</td></tr>
  </tbody>
</table>

<p>A maior parte da lista não virou defeito. É por isso que esta seção é curta, e é esse o elogio.</p>

<p>E tem a parte que não é elogio: ele avisou, e aconteceu assim mesmo. Ser avisado não é a mesma coisa que evitar. A alavanca da diagonal está pronta e desligada desde o primeiro dia da tela &#8212; ninguém deixa alavanca pronta para um problema que não previu.</p>

<h3>O segundo defeito, que não estava na lista</h3>

<p>Nos mesmos dois dias, escondido no commit do primeiro passo, havia outro defeito, esse sem profecia nenhuma: as peças do programa de desenho se procuravam pelo nome, e os nomes não batiam. Um lado guardava a informação com um nome; o outro pedia por outro. Duas pessoas combinam de se encontrar na esquina, uma anota o nome antigo da rua e a outra o nome novo &#8212; as duas chegam na hora certa, e nenhuma vê a outra.</p>

<p>Nada estava quebrado. Estava mal apresentado.</p>

<p class="pensa">esse é o tipo de defeito que ninguém prevê porque ninguém pensa nele, é de quem escreve a parte que desenha, acontece</p>

<p>A capa desta edição é o mesmo quadrado. Anda melhor agora. Continua sendo o que grudava na parede.</p>
