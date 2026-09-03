<?php
/* A Entrevista (#4) · o Gus entrevista o Cauã "Volt" - a inversão da #3
   (lá o Cauã perguntava, o Gus respondia). Fonte em DOIS arquivos que este
   partial intercala:
     - docs/content/edicao-4-entrevista-perguntas.md (## O texto (pt-br)):
       as 18 perguntas do Gus + os 18 pensamentos dele.
     - docs/content/edicao-4-entrevista-respostas.md (## pt-BR, bloco sem
       cabeçalho "## EN"): as 18 respostas do Cauã, numeradas 1-18, + os 6
       pensamentos dele (nem toda resposta tem: 1, 3, 6, 7, 15, 18).
   Ordem de intercalação, por troca: fala do Gus → pensamento do Gus → fala
   do Volt → pensamento do Volt (quando houver).

   ⚠️ SEM linha de abertura. A fonte da Entrevista não traz "gus@glyfesse:
   ~/entrevista$ a entrevista" - ela começa direto na primeira pergunta do
   Gus. Escrever uma abertura aqui seria inventar copy (mesma regra da #3).

   ⚠️ CLASSIFICAÇÃO pensa/pensa longo por CONTAGEM REAL de caracteres (regra
   da casa, 72 é o corte), não pelo estilo de comentário (linha ou bloco) que
   o rascunho da fonte usava (o rascunho é inconsistente nisso; a contagem é
   que manda).

   ⚠️ PONTUAÇÃO FINAL: nenhuma fala nem pensamento do Gus termina em ponto
   final (a fonte já respeita isso, verbatim). As falas e os pensamentos do
   Volt TERMINAM em ponto - é a voz dele (mesma régua da #3, onde o // do
   Cauã leva ponto final). A fonte de #4 (respostas.md, bloco pt-BR) não tem
   esse ponto final escrito em NENHUMA linha dele (nem fala nem pensamento) -
   diferente do bloco EN da mesma fonte, que já tem o ponto em todo lugar.
   Ponto FINAL adicionado mecanicamente nas falas/pensamentos do Volt em
   pt-BR onde faltava (não em palavra cortada no meio - ver abaixo): é
   normalização de pontuação de fechamento de frase, não invenção de
   conteúdo, e o próprio bloco EN da mesma fonte já vem assim.
   ⚠️ EXCEÇÃO: as respostas 9 e 16 do Volt terminam em palavra CORTADA NO
   MEIO ("caramb", de "caramba" - erro de digitação deliberado, classe
   "palavra cortada", ficha de erros da fonte). Ponto depois de uma palavra
   cortada não faz sentido gramatical nenhum, então NÃO leva ponto - a
   interrupção já é o fechamento.

   ⚠️ A pergunta 4 é só uma interjeição + emoji ("Hã? 🤨"), pergunta inteira e
   deliberada (a fonte é explícita sobre isso). O emoji vai envolvido em
   <span role="img" aria-label="sobrancelha levantada"> para o leitor de tela
   dizer a expressão em vez de soletrar o código do emoji.

   ⚠️ Erros de digitação de AMBOS os personagens são DELIBERADOS e ficam
   verbatim (fichas na própria fonte): Gus - "voce/tambem/provavel/rapido/
   propria/so/desconfortavel/silencio/ninguem/la/radio/proposito" (acento
   comido) + "semmpre" (letra dobrada). Volt - "nãoo/diaa/valeuu/tenhoo"
   (letra dobrada) + "caramb/hor" (palavra cortada no meio).

   ⚠️ L-25 do projeto (GODS_LAWS.md): nenhum personagem sabe que é feito de
   pixel - a fonte já filtrou todo vocabulário de produção antes de chegar
   aqui (não há "sprite"/"hitbox"/"pipeline"/"commit" na boca de nenhum dos
   dois); este partial só transcreve. */
?>
<div class="entrev">

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">22 de junho, 21h57... eu queria saber se a parte que desenha teve algum motivo pra te dar cara primeiro, antes de mim e de qualquer outro, ou se foi só a vez de você chegar primeiro?</span></p>
    <p class="pensa longo">pergunta comprida de propósito. quanto mais eu explico o que eu quero saber, menos eu preciso explicar o resto</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">acho que só calhou, mano. eu não fico pensando muito nisso nãoo, rolou, eu gostei, segui. tem coisa que a gente não escolhe, só recebe.</span></p>
    <p class="pensa volt">tá cedo pra contar. deixa ele suar um pouco mais.</p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">quando a parte que desenha trocou você, a parte que pensa continuou igual, sem precisar mudar nada? porque se continuou, isso prova uma coisa que eu defendo faz tempo, e eu queria ouvir de quem passou por isso, não só imaginar sozinho?</span></p>
    <p class="pensa longo">eu já sei a resposta. eu só queria uma testemunha. isso não é entrevista, é eu procurando prova pra uma coisa que eu já acredito</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">continuou. nem cosquinha. eu ainda sou eu, só que agora com cara. seus fiozinhos de pensar não perguntam satisfação pra roupa nova, gus, eles só continuam fazendo o que sempre fizeram.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">por que você acha que foi logo você, antes de qualquer outro?</span></p>
    <p class="pensa">pergunta de quem organiza as coisas, só isso, ordem não tem sentimento</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">porque eu pedi. antes de qualquer coisa boa acontecer aqui embaixo eu fui lá e falei: manda a minha primeiro. moleque novo não segue voz no escuro, segue cara que reconhece. eu não ia esperar sortear.</span></p>
    <p class="pensa volt">era isso que eu tava segurando na um. bora ver a cara dele agora.</p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">Hã? <span role="img" aria-label="sobrancelha levantada">🤨</span></span></p>
    <p class="pensa longo">eu preparei essa pergunta a semana toda achando que sabia a resposta, e o que ele acabou de falar nem chegou perto... eu tenho mais perguntas escritas pra depois dessa e nenhuma serve mais do jeito que eu escrevi, e eu vou ter que reescrever tudo daqui pra frente sentado exatamente aqui, sem sair da cadeira, é isso que eu tô fazendo agora, não é silencio, é reescrita</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">isso mesmo que você ouviu. eu pedi. surpreendeu, né? nem sempre você fica sem entender rápido assim.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">espera... isso quer dizer que você já tinha decidido tudo isso antes de eu perguntar pra alguém sobre isso?</span></p>
    <p class="pensa">eu ia fingir que ouvi numa boa. não ouvi numa boa</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">já. decidido e pedido, os dois. eu não fiquei esperando ninguém vir perguntar se eu queria, eu fui atrás. voce ainda tá esperando alguém perguntar o que voce quer, isso sim eu reparei.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">voce lembra de mais alguma coisa daquele dia que não tenha nada a ver com a cara nova?</span></p>
    <p class="pensa longo">eu lembro de um monte de coisa daquele dia que não tem nada a ver com cara nenhuma. eu só não sei se ele tambem lembra ou se isso ficou só comigo</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">lembro que rachei o pulso testando salto novo pra escada leste, bem antes de saber que ia rolar a cara. doeu mais que qualquer coisa daquele diaa, e ninguém perguntou disso também.</span></p>
    <p class="pensa volt">ele vai gostar mais dessa do que da cara. aposto.</p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">e ninguém achou que eu ia querer saber?</span></p>
    <p class="pensa longo">talvez ninguém tenha pensado em mim naquele dia. isso não é acusação, é só a resposta mais provavel</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">ninguém pensou nisso, gus, não foi de propósito te deixar de fora. foi dia corrido, um monte de coisa ao mesmo tempo lá embaixo. mas voce tem razão de ficar putinho, eu ficaria também.</span></p>
    <p class="pensa volt">eu quase mandei mensagem naquele dia. quase. depois a noite engoliu.</p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">você ainda defende que pythia resolve tudo mais rapido, ou já perdeu uma aposta pra mim esse mês?</span></p>
    <p class="pensa longo">ele vai defender. ele sempre defende. isso não muda desde que eu conheço ele</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">pythia ainda ganha. sempre vai ganhar. mas perdi uma aposta esse mês sim, aquela do tempo de resposta, e voce trapaceou com uma regra de três que ninguém combinou antes.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">você decide agir antes de eu terminar de calcular, isso sempre foi assim. minha pergunta é se ver a propria cara mudou a velocidade de alguma forma, ou você continua descarregando o pulso antes de pensar?</span></p>
    <p class="pensa longo">ele vai rir dessa. ele semmpre ri quando eu tento imitar o jeito dele de falar</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">cara não muda o pulso. cara muda o espelho. eu ainda descarrego antes de pensar, só que agora eu vejo minha própria cara fazendo isso, e isso é estranho pra caramb</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">o que você faz quando não tá resolvendo emergência com a gente?</span></p>
    <p class="pensa longo">pergunta boba. eu sei que é boba. eu perguntei mesmo assim porque eu percebi que eu não sabia a resposta e isso me incomodou mais do que devia</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">ensino os moleques novos a não escorregar na passarela, testo bota nova até quebrar peça, e de vez em quando só sento e ouço o duto respirar. compila e roda, sabe? nem tudo precisa virar emergência.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">você ainda reclama que eu ando com peça sobrando no bolso?</span></p>
    <p class="pensa longo">ele sempre reclama. eu não vou parar de andar com peça no bolso só porque ele reclama</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">sempre. voce anda que nem oficina ambulante, tilintando toda vez que sobe escada. um dia essa peça sobrando vai te entregar de longe.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">eu sempre quis te contar uma coisa boba e nunca contei... voce sabia que fala "e" antes de quase toda frase quando tá animado?</span></p>
    <p class="pensa longo">eu reparei isso faz mais de um ano. eu guardei isso mais de um ano só porque não sabia se contar ia soar estranho vindo de mim</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">sabia não, mano. e agora que voce falou isso eu vou reparar em mim mesmo toda hora, valeuu por isso.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">voltando pro 22 de junho... entre você ganhar a cara e eu ainda ser so um quadrado, quanto tempo passou de verdade, sem arredondar?</span></p>
    <p class="pensa">eu sei a resposta em minutos. eu só queria ver se ele tambem sabe</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">e essa eu não sei te dar direitinho. não foi muito, um dia, dois no máximo, mas eu não fico contando hor que nem voce, eu conto volta, não relógio.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">isso incomodou você, ou só eu que fiquei pensando nisso a semana toda?</span></p>
    <p class="pensa">as duas hipóteses me deixam desconfortavel de formas diferentes</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">e não, não me incomodou não. eu não fico remoendo esse tipo de coisa, aconteceu, eu sigo. mas fico feliz que voce ficou pensando a semana toda, quer dizer que importou.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">isso mudou como você me via?</span></p>
    <p class="pensa">não tem parte técnica nessa. eu tentei achar uma e não achei nenhuma</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">não. cara não é o que eu sigo, gus. eu sigo quem aparece quando precisa. isso voce sempre foi, quadrado ou não.</span></p>
    <p class="pensa volt longo">essa resposta eu já tinha pronta tambem. mas essa eu não conto que já tinha.</p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">mudando de assunto: seu acumulador do antebraço, quanto tempo ele leva pra carregar de novo depois que você descarrega tudo de uma vez?</span></p>
    <p class="pensa">voltei. bom. isso aqui eu consigo medir e ninguem sai machucado</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">nunca deixo carregar até o talo só pra saber o tempo certo, sempre descarrego antes só pra sentir que rolou. mas de leve pra leve, uns vinte minutos, se eu tiver paciência de esperar, que raramente tenhoo.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">...deixa pra la. minha matriz capta radio até que distância mesmo? nem sei por que perguntei isso agora</span></p>
    <p class="pensa">essa eu garanto que não volta pro assunto de antes</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">não faço ideia, cara, isso é papo de parte que pensa, não meu. só sei que voce já pegou sinal de longe que me deixou de queixo caído, então deve ser bem mais que precisa.</span></p>
  </div>

  <div class="troca">
    <p class="fala"><span class="prompt">gus@glyfesse:~/entrevista$</span> <span class="dito">tem mais alguma coisa daquele dia que ninguém te perguntou ainda?</span></p>
    <p class="pensa longo">essa eu deixo aberta de proposito. se ele quiser fechar, fecha, eu não vou insistir</p>
    <p class="fala"><span class="prompt">volt@glyfesse:~/entrevista$</span> <span class="dito">tem. eu queria que voce fosse o primeiro a ver, antes de qualquer um lá embaixo. não contei isso pra ninguém até agora.</span></p>
    <p class="pensa volt longo">primeira vez que eu falo essa parte alto. fica estranho ouvir do lado de fora.</p>
  </div>

</div>
