<?php
/* Detonado do Diálogo (#4) - fonte: docs/content/edicao-4-detonado-dialogo.md
   (## pt-BR), verbatim. Reusa o mesmo componente do Detonado da Simulação (#3):
   estilos em edicao.css, bloco "§08 · o DOCUMENTO DESCLASSIFICADO".

   ⛔⛔ MESMA TRAVA DA #3, e ela é de ARQUIVO, não de CSS: NÃO EXISTE PALAVRA
   NENHUMA POR BAIXO DA TARJA. A <b class="det-tarja"> é um elemento VAZIO -
   nem em atributo, nem em comentário. Nesta peça, diferente da #3, o
   narrative-writer TEVE a fala real do NPC na mão (mockup
   docs/design/mockups/05-dialogo-bertoldo-retrato-real.html) e decidiu não
   usá-la: a garantia aqui não é "impossível vazar", é "cortada de propósito".
   O token de blocos cheios que marca censura na fonte NUNCA vira texto -
   onde ele aparece, a tarja fica vazia (e esse caractere, de propósito, não
   é reproduzido neste comentário nem em nenhum outro lugar deste arquivo).

   ⚠️ SÓ UMA TARJA nesta peça (a fonte só tem uma ocorrência do token), na 4ª
   linha da transcrição - nth-of-type(4n) já tem regra própria no CSS (9ch),
   não foi preciso nenhuma largura nova.
   ⚠️ Sem fala de `root`: a fonte registra que nenhuma frase dele foi
   autorizada para esta edição. Não se fabrica citação.
   ⚠️ O carimbo (moldura + "CENSURADO!!!") é reaproveitado, mesma peça visual
   da #3. O canto "sterling corp." NÃO é reaproveitado aqui: a fonte registra
   que aquilo foi autorização de spoiler específica do líder para a #3 (a
   tease do vilão) e não presume que valha de novo sem pedir - fica pendente
   de decisão dele, então este arquivo simplesmente não inclui o `.corp`. */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/detonado$</span> <span class="dito">detonado do diálogo</span></p>

<div class="det-doc">

  <?php /* o carimbo: decorativo, fora da ordem de leitura, por cima de tudo -
     sem o canto "sterling corp." (ver nota acima) */ ?>
  <div class="det-carimbo" aria-hidden="true">
    <span class="moldura"><span class="txt">CENSURADO!!!</span></span>
  </div>

  <p>Até seis de julho, dava pra andar a cidade inteira sem ouvir uma palavra de volta. Tinha gente parada nas esquinas. Tinha um velho lendo jornal na praça, de manhã, sempre no mesmo banco. Mas isso ali era cenário. Você passava perto, e o cenário continuava exatamente igual, porque continuar igual é tudo que cenário sabe fazer.</p>

  <p>Isso mudou. E a parte que eu acho que interessa não é o que ele diz: isso eu não vou escrever aqui, por decisão de quem escreve a fala dele, e faz bem. O que interessa é como uma conversa vira alguma coisa que roda de verdade.</p>

  <p>Uma conversa não é um papo solto. É um mapa de paradas, e cada parada só leva a outra parada se uma condição bater. A primeira vez que você chega perto dele, o mapa é um; se você já passou por ali antes, o mapa te joga direto num outro ponto de entrada: ele nota que já te viu, e não repete a saudação do zero. Isso já é diferente de cenário: cenário não sabe se é a primeira vez.</p>

  <p>No meio da conversa, você escolhe como responder: três jeitos, curioso, direto ao ponto, ou só um aceno e seguir andando. Os três valem, os três pesam diferente. Mas os três desembocam no mesmo lugar depois. Nenhum deles trava um caminho que os outros dois não alcançam; a escolha muda o tom de como você chegou ali, não o que existe do outro lado. Isso é de propósito: mais forquilha não é mais profundidade; às vezes é só mais galho pra alguém esquecer de podar.</p>

  <p>E o mapa quase não anota nada. De tudo que acontece nessa conversa, só duas coisas ficam guardadas: que você já esteve ali, e qual dos três jeitos você escolheu. O resto (o que ele já sabe sobre onde você andou, o que você já resolveu por aí), a conversa só LÊ. Ela nunca escreve por cima do resto do mundo. Ele reage ao que você fez. Ele não decide por você.</p>

  <p>Tem uma coisa a mais que eu gosto nisso. A fala dele não mora dentro do jogo. Mora num arquivo de texto que só quem revisa e traduz chega a ler rodando solto: na hora de montar o jogo de verdade, aquele texto fecha dentro de um pacote, selado, e é o pacote que o jogo carrega. O jogo nunca lê texto cru. Isso não foi pensado pra revista nenhuma, foi pensado pra separar o que é fonte do que é produto, mas ajuda até aqui: não tem como eu vazar o que, na hora de escrever isto, eu mesmo decidi não usar.</p>

  <p>Testei, claro. Existe uma bateria que abre essa conversa sozinha, sem ninguém olhando, e confere se cada parada faz o que promete. Trecho de hoje, transcrito:</p>

  <?php /* ⛔ A tarja abaixo é um elemento VAZIO. Não há termo embargado neste
     arquivo, em lugar nenhum: nem no HTML, nem no CSS, nem neste comentário. */ ?>
  <div class="det-transcricao">
    <span class="cab">saída da bateria de testes · trecho</span>
    <div class="det-linhas">
      <div class="det-linha">
        <span class="nome">[dialogo] carrega o mapa de paradas sem erro</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogo] primeira vez != segunda vez</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogo] as 3 respostas desembocam num só lugar</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogo] <b class="det-tarja" role="img" aria-label="trecho censurado"></b></span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogo] só duas anotações saem dessa conversa</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogo] o pacote final não guarda texto cru</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[dialogo] a cena fecha sem deixar sujeira</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <span class="total">todos os testes: 1383/1383</span>
    </div>
  </div>

  <p class="det-legenda">As tarjas são minhas. A fala dele eu tive na mão e escolhi não usar: não tem o que vazar do que ficou de fora por decisão.</p>

  <p>Quando o retrato dele chegou de verdade (antes disso era só um nome dentro de uma caixa, texto e estrutura, nada desenhado), a suíte inteira já rodava esses 1383 sozinha, e verde. Isso não prova que a conversa é boa. Prova só uma coisa pequena: quando alguém aperta o botão de falar com ele, algo responde de verdade, e não trava no meio.</p>

  <p class="det-fecho">Demorou pra virar cenário com cara. Bastou um dia pra esse cenário responder. Fim.</p>

</div>
