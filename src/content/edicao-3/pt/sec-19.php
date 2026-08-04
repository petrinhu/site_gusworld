<?php /* Expediente (colofão) #3 - molde da #2, agora DATA-DRIVEN: título e data saem do
   $ctx (data/edicoes.php) em vez de digitados à mão, então não há como o colofão
   divergir da fonte de dados quando alguém corrigir a data ou o título da edição.
   data_por_extenso() é o mesmo formatador do masthead (src/lib/view.php).
   O separador do título é o middot " · " (convenção de título do site), não em-dash.

   A NOTA DO EDITOR entrou (2026-08-04), no mesmo lugar da #1 e da #2: depois do
   <hr class="colo-sep">, com a linha de assinatura em .fala e a nota em prosa.
   Registro: o bloco de créditos acima continua MECÂNICO (derivado do $ctx) e não
   se mexe; a nota é a parte autoral. Voz: root@glyfesse (o criador, nunca nomeado),
   seco e curto, no tamanho das notas da #1 e da #2. O refrão de fecho ("nada se
   perde, só espera a vez") é o mesmo das duas edições anteriores, de propósito.
   ⚠️ O prompt usa o FORMATO NOVO da #3 (root@glyfesse:~/expediente$); o caminho
   fica sem acento e NÃO se traduz (é caminho de shell). */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Escrito por <span class="prompt">gus@glyfesse:~$</span><br>
    Editado por <span class="prompt">root@glyfesse:~$</span>
  </p>

  <p class="colo-direitos">Todos os direitos reservados.</p>
</div>

<hr class="colo-sep">

<p class="fala"><span class="prompt">root@glyfesse:~/expediente$</span> <span class="dito">nota do editor</span></p>

<p>Duas trocas de fundação em três dias, e o que fica é um quadrado azul sem cara andando: a primeira coisa que se moveu na tela. A Galeria de Bugs abre porque foi prometida na #2, e promessa publicada é dívida. A Glyfesse é o registro do desenvolvimento: nada se perde, só espera a vez.</p>
