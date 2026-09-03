<?php /* Expediente (colofão) #4 - molde IDÊNTICO ao da #3: DATA-DRIVEN,
   título e data saem do $ctx (data/edicoes.php), nunca digitados à mão -
   data_por_extenso() é o mesmo formatador do masthead (src/lib/view.php). O
   separador do título é o middot " · " (&middot;), não em-dash.
   O bloco de créditos é MECÂNICO (derivado do $ctx) e não se mexe; a NOTA DO
   EDITOR é a parte autoral.
   ⚠️ A NOTA DO EDITOR abaixo é COPY PROPOSTA, PENDENTE DE APROVAÇÃO DO LÍDER - sem
   fonte em docs/content/, texto de working do orquestrador ED4-MONTAGEM
   (2026-09-03); ele lê na revisão final.
   Voz: root@glyfesse (o criador, nunca nomeado), seco e curto, no tamanho das
   notas anteriores (#1/#2/#3). O prompt usa o FORMATO da #3
   (root@glyfesse:~/expediente$); o caminho fica sem acento e NÃO se traduz (é
   caminho de shell). */ ?>
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

<p>Um rosto em 24 de junho e uma voz em 6 de julho; no fim do mês, o jogo inteiro de pé, jogado de ponta a ponta por quem tinha avisado dos buracos antes de existirem. O Cemitério paga a lápide que a #3 prometeu, e o bus, pela primeira vez, tem o que ler. A Glyfesse é o registro do desenvolvimento: nada se perde, só espera a vez.</p>
