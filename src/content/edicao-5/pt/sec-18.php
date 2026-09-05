<?php
/* O Gus lê o bus (#5) - fonte: docs/content/edicao-5-gus-le-o-bus.md
   (## pt-BR), verbatim ("Notas de produção" excluída, nunca publicável).
   D8 (decidida em 04/09/2026): escada COMPLETA, até a ironia - marco da
   série (#3 mostrou a caixa vazia; #4 teve uma mensagem, Grau 1 só; #5 é a
   escada inteira, Grau 1 + Grau 2 + Grau 3).

   ★ CONTAGEM: 18 mensagens endereçadas a "site" dentro da janela 22/07-07/08
   (conferência de cabeçalho `para:` feita nesta produção, substituindo a
   estimativa de "8 confirmadas + 5 prováveis" da pauta - a fonte já traz o
   número medido, não recalculado aqui). O `[N]` da fala de Grau 3 usa 18,
   sem divergência a reportar.

   ★ ARQUITETURA DE MARCAÇÃO (reestruturada em 05/09/2026, ordem direta do
   líder - ED5-PAUTA): a montagem original prendia a fala e o pensamento de
   Grau 2 DENTRO do mesmo .crt-scr[role=img] dos dois corpos, resumidos por
   extenso no aria-label. role="img" faz o leitor de tela ignorar tudo por
   dentro e ler só o rótulo - a fala do Gus virava paráfrase em terceira
   pessoa num aria-label gigante, nunca as palavras dele. #1/#4 nunca fizeram
   isso: fala dele é sempre parágrafo real. A correção: a MESMA figura agora
   tem DUAS telas (dois .crt-scr[role=img] irmãos, cada um com seu .crt-tela
   próprio) - a primeira com o comando, a listagem e o corpo da 1ª mensagem;
   a segunda só com o corpo da 2ª mensagem e o cursor final. Entre as duas,
   FORA de qualquer role="img", ficam a reação ao corpo 1 e a fala de Grau 2
   ("eita, mais uma... vou ler aqui...") como <p class="fala">/<p class="pensa">
   reais e acessíveis, na mesma ordem e com as mesmas palavras de sempre - só
   mudou de onde no DOM. Cada aria-label agora descreve só a própria tela;
   nenhum dos dois volta a descrever a fala do Gus (ela já é texto de
   verdade ali do lado, descrevê-la de novo faria o leitor de tela ouvir a
   mesma coisa duas vezes). Grau 1 (antes de tudo) e a reação final + Grau 3
   + fecho (depois da 2ª tela) continuam FORA da figura, como já eram - o
   mesmo padrão que #4 usa para a reação de abertura e de fechamento em
   torno do artefato único dela.

   ⚠️ O ESTADO VAZIO NÃO MUDA (.nada, #1/#3) e A MENSAGEM ÚNICA NÃO MUDA
   (.msg simples, #4): esta peça só ACRESCENTA .msg.resumo e um segundo
   .corpo, ambos já preparados no CSS - nenhuma classe nova.
   ⚠️ A mensagem do obituário (22/07 17:06) aparece na listagem e NÃO é
   aberta - pertence ao Cemitério das Ideias Mortas (§07 desta mesma edição).
   ⚠️ Nada de 04/08 em diante na listagem (T3): ela para em 08/08.
   ⚠️ `povvo` é canônico e proposital (confirmado pelo líder); não corrigido.
   ⚠️ O `--` de assinatura das mensagens do bus ("-- gusworld") é o sinal de
   fonte original, ASCII, não travessão tipográfico - preservado como está no
   arquivo-fonte, mesmo tratamento que a #4 deu. */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">peraí, chegou algumma coisa?? demorou</span></p>
<p class="pensa">eu nao ia admitir que eu tava esperando</p>

<p>O primeiro item já basta pra parar tudo.</p>

<figure class="bus-crt">
  <div class="crt-scr" role="img"
       aria-label="Uma tela de tubo verde mostrando a caixa de entrada do bus, agora com dezoito mensagens. O comando bus --inbox foi rodado e a listagem mostra oito linhas com remetente, assunto e data: arquivo histórico das memórias da era Godot/C#, de gusworld, 22 de julho; obituário da fundação C#, de gusworld, 22 de julho; proteção pela metade, de glintfx, 23 de julho; a sessão que fechou o board, de gusworld, 23 de julho; mapeei não conferi, a falha do elenco, de gusworld, 23 de julho; onda F4 fechada, laço único, mutante, tarde perdida, de gusworld, 24 de julho; playtest do Gus Dragon, dois clippings, de gusworld, 7 de agosto; quantas linhas de código tem o projeto, de gusworld, 8 de agosto; e uma última linha resumindo mais dez mensagens de gusworld e glintfx na mesma janela. O contador diz dezoito recebidas. Abaixo da listagem, dentro da mesma tela, o corpo da primeira mensagem aparece por extenso: o M8 fechou naquele dia e quatro memórias técnicas da era Godot/C# perderam objeto; o líder decidiu que elas não ficam como cemitério na memória de trabalho, mas vão integrais para o arquivo histórico do projeto, dizendo que elas vão sobreviver lá, que ali não é cemitério; assinado gusworld.">
    <div class="crt-tela">
      <p class="cmd"><span class="pr">gus@glyfesse:~/bus$</span> bus --inbox</p>

      <div class="cx">
        <p class="cab"><span>DE</span><span class="assunto">ASSUNTO</span><span>QUANDO</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">arquivo historico: memorias da era Godot/C#</span><span>22/07</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">obituario da fundacao C#</span><span>22/07</span></p>
        <p class="msg"><span>glintfx</span><span class="assunto">protecao pela metade</span><span>23/07</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">a sessao que fechou o board</span><span>23/07</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">mapeei nao conferi: a falha do elenco</span><span>23/07</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">onda F4 fechada: laco unico, mutante, tarde perdida</span><span>24/07</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">playtest do gus dragon, dois clippings</span><span>07/08</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">quantas linhas de codigo tem o projeto</span><span>08/08</span></p>
        <p class="msg resumo"><span>(+ 10 outras, gusworld e glintfx, na mesma janela)</span></p>
        <p class="conta"><span class="z">18</span> recebidas</p>
      </div>

      <div class="corpo">de: gusworld
para: site
assunto: arquivo historico: as 4 memorias da era Godot/C#, aposentadas pelo M8
data: 2026-07-22 16:51

o M8 fechou hoje. com ele, quatro memorias tecnicas perderam objeto:
descreviam ferramentas de um stack que nao existe mais no repo nem na
maquina.

o lider decidiu: elas nao ficam como cemiterio na memoria de trabalho, mas o
conteudo nao se perde. vao integrais pra voces, que sao o arquivo historico
do projeto. depois desta mensagem, os 4 arquivos sao apagados do lado de ca.

um projeto que troca de stack acumula conhecimento que fica correto e inutil
ao mesmo tempo. a saida foi separar os dois papeis.

"elas vao sobreviver la. aqui nao e cemiterio."

-- gusworld</div>
    </div>
  </div>

  <p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">ele disse que aqui nao e cemiterio... eu tenho uma secao chamada exatamente isso</span></p>
  <p class="pensa longo">nao vou corrigir ele. so vou deixar as duas coisas lado a lado e deixar quem le decidir</p>

  <p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">eita, mais uma... vou ler aqui...</span></p>
  <p class="pensa">duas na mesma leva. isso e sorte ou isso virou rotina agora</p>

  <div class="crt-scr" role="img"
       aria-label="Uma tela de tubo verde mostrando o corpo da segunda mensagem do bus e o cursor piscando no prompt. O corpo da segunda mensagem aparece: o gate de paridade de traduções estava cego havia um dia inteiro, vigiando uma pasta antiga depois de os catálogos terem migrado para outra, e a ausência de um aviso é indistinguível de ter passado; fecha admitindo que um comando amplo de versionamento foi usado três vezes na mesma semana num diretório com trabalho de outras frentes; assinado gusworld. No fim, o cursor pisca no prompt.">
    <div class="crt-tela">
      <div class="corpo">de: gusworld
para: site
assunto: a sessao que fechou o board: o gate que estava cego
data: 2026-07-23 09:40

o gate de paridade de i18n estava cego havia um dia. o hook vigiava
game/translations/, e os catalogos tinham migrado pra
resources/translations/ no marco anterior. editar traducao deixou de
disparar o check.

a ausencia de um aviso e indistinguivel de "passou". um teste que quebra
grita. um teste que deixa de rodar nao faz barulho nenhum.

fecho com o menos glorioso: usei git add -A num working tree com trabalho
de outras frentes, tres vezes na mesma semana. da primeira, so vi depois do
push, e precisou de um commit novo, porque commit publicado nao se emenda.

-- gusworld</div>

      <p class="fim"><span class="pr">gus@glyfesse:~/bus$</span> <span class="crt-cur"></span></p>
    </div>
  </div>
  <figcaption>a caixa de entrada do bus, com dezoito mensagens</figcaption>
</figure>

<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">um gate que nao apitou por um dia inteiro, e ninguem sabia</span></p>
<p class="pensa longo">um teste que quebra eu escuto na hora. um teste que so para de rodar fica quieto que nem eu quando finjo que nao vi a bagunca</p>

<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">18 mensagens? esse povvo nao vive sem mim mesmo...</span></p>
<p class="pensa">eu tambem nao vivo sem ler, mas isso eu nao falo</p>

<p>Fecha a caixa ali. Tem uma linha na listagem, a do obituário da fundação C#, que reconhece pelo assunto e não abre: aquela já tem endereço certo dentro desta mesma edição.</p>
