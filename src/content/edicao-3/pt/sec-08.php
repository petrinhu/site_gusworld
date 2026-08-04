<?php
/* Detonado da Simulação (#3, seção NOVA) - fonte: docs/content/edicao-3-detonado.md
   (## pt-BR), verbatim. Arte portada do mock docs/design/mockups/17-detonado-censurado.html
   (a moldura de folha, o masthead, o kicker e o rodapé do mock NÃO vêm: a página da
   edição já tem os seus). Estilos: edicao.css, bloco "§08 · o DOCUMENTO DESCLASSIFICADO".

   ⛔⛔ A TRAVA QUE DOMINA A PEÇA, e ela é de ARQUIVO, não de CSS:
   NÃO EXISTE PALAVRA NENHUMA POR BAIXO DA TARJA. Nem com color:transparent, nem com
   opacity:0, nem em atributo, nem em comentário. A <b class="det-tarja"> é um elemento
   VAZIO. O critério do GATE-RENDER é "procurar cada termo embargado no que foi servido
   e não achar nada": aqui não há o que achar, porque nada foi escrito. Essa é a única
   garantia que vale - CSS se inspeciona, arquivo vazio não.

   ⚠️ LARGURA QUANTIZADA POR POSIÇÃO. As 4 larguras fixas (4ch/11ch/7ch/9ch) são
   atribuídas pelo nth-of-type da LINHA, nunca pelo conteúdo. O tamanho da barra não
   significa nada, e continua não significando nada se alguém trocar o texto das linhas.
   ⚠️ O aria-label diz exatamente "trecho censurado" e mais nada.

   ⚠️ ALINHAMENTO SEM VAZAMENTO: a linha é um FLEX de 3 peças (nome · pontos · ok) e
   quem estica é a peça dos pontos. O "ok" alinha por LAYOUT, não por contagem de
   caractere - senão a largura da tarja voltaria a entregar contagem de letras.

   O CARIMBO é DECORATIVO (aria-hidden + pointer-events:none) e não entra na ordem de
   leitura. `sterling corp.` é autorização expressa de spoiler do criador (2026-08-01). */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/detonado$</span> <span class="dito">detonado da simulação</span></p>

<div class="det-doc">

  <?php /* o carimbo: decorativo, fora da ordem de leitura, por cima de tudo */ ?>
  <div class="det-carimbo" aria-hidden="true">
    <span class="moldura"><span class="txt">CENSURADO!!!</span></span>
    <span class="corp">sterling corp.</span>
  </div>

  <p>Antes de qualquer coisa: aqui não se briga em tempo real. Você não fica apertando botão o mais rápido que consegue e torcendo. Aqui a briga anda em <strong>rodadas</strong>.</p>

  <p>Uma rodada é assim: cada lado tem a sua vez, e só age quando ela chega. O que ataca, ataca; termina; espera. Depois é a vez do outro. Ninguém age em cima de ninguém, e nada acontece enquanto você está pensando. Isso muda o tipo de esforço que o jogo pede: não é reflexo, é decisão. O tempo que você leva para escolher não custa nada. A escolha custa tudo.</p>

  <p>E é por isso que a <strong>ordem importa</strong>. Se o que ataca age antes, ele mexe no estado do campo &#8212; e o que vem depois já encontra um campo diferente daquele que existia quando você planejou. A mesma ação, na vez errada, vira outra ação. Não porque ela mudou, mas porque o mundo em volta dela mudou primeiro.</p>

  <p>Quem já entendeu essa parte, entendeu o suficiente. O resto é detalhe de regra e fica para outro dia.</p>

  <p>Agora a parte que eu acho que interessa mais: como eu sei que isso tudo roda.</p>

  <p>Existe uma bateria de testes que abre a tela de arena sozinha, sem ninguém olhando, e confere se cada peça faz o que promete. Ela roda toda vez que eu mexo em qualquer coisa. Trecho da saída de hoje, transcrito:</p>

  <?php /* ⛔ As tarjas abaixo são elementos VAZIOS. Não há termo embargado neste
     arquivo, em lugar nenhum: nem no HTML, nem no CSS, nem neste comentário. */ ?>
  <div class="det-transcricao">
    <span class="cab">saída da bateria de testes · trecho</span>
    <div class="det-linhas">
      <div class="det-linha">
        <span class="nome">[arena] montando <b class="det-tarja" role="img" aria-label="trecho censurado"></b></span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] ordem da vez respeitada em 3 lados</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] <b class="det-tarja" role="img" aria-label="trecho censurado"></b> não age fora da própria vez</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] alvo inválido é recusado</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] estado do campo depois da ação</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] <b class="det-tarja" role="img" aria-label="trecho censurado"></b></span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[arena] tela fecha sem deixar sujeira</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <span class="total">todos os testes: 2632/2632</span>
    </div>
  </div>

  <p class="det-legenda">As tarjas são minhas. Tem coisa ali que ainda não dá para mostrar.</p>

  <p>O número final é o que vale: <strong>2632/2632</strong>. Nenhum vermelho.</p>

  <p>Para dar tamanho a isso, um comparativo. Em 22 de junho de 2026, no dia do primeiro passo do quadrado azul, a suíte inteira tinha <strong>684</strong> testes. Hoje tem <strong>2632</strong>. É quase quatro vezes mais. Deixo os dois números aí e cada um faz a conta que quiser.</p>

  <p>Vale dizer o que esse número <strong>não</strong> é. Ele não diz que o jogo é bom, nem que é divertido, nem que está pronto. Diz uma coisa só, e é uma coisa pequena: o que já foi construído continua funcionando depois de eu ter mexido em outra parte. É pouco. Mas é o pouco que sustenta o resto.</p>

  <p>Quem testa a mão de verdade é o Gus Dragon, que senta e joga. O Cauã "Volt" também dá palpite, do jeito dele. A bateria só garante que, quando eles sentam, a tela abre.</p>

  <p class="det-fecho">Fico contente quando dá verde. Fim.</p>

  <p>O <code>root</code> mandou isto depois de uma rodada de teste:</p>

  <p class="fala root"><span class="prompt">root@glyfesse:~/detonado$</span> <span class="dito">some ele da tela, some a moldura dele e a caixa de seleção. Sensação que correu tudo certo</span></p>

</div>
