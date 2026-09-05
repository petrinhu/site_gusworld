<?php /* Expediente (colofão) #5 - molde IDÊNTICO ao da #3/#4: DATA-DRIVEN,
   título e data saem do $ctx (data/edicoes.php), nunca digitados à mão -
   data_por_extenso() é o mesmo formatador do masthead (src/lib/view.php). O
   separador do título é o middot " · " (&middot;), não em-dash.
   ★ CRÉDITO NOVO NESTA EDIÇÃO, ordem do líder (04/09/2026, verbatim: "andre
   farias deve linkar ao perfil X dele", BRIEFS-EDICAO-5.md linhas 823-825):
   o nome do artista da tirinha (Seção 11), André Farias, entra no bloco de
   créditos, LINKADO ao perfil dele no X (https://x.com/Andre_Suporte).
   Mesmo padrão de link externo já usado na banca (src/templates/banca.php,
   linhas ~131-138) e na Seção 11 desta mesma edição: target="_blank"
   rel="noopener", com aria-label descrevendo o destino (nunca o
   comportamento - a banca também não avisa "abre em nova aba"). ⚠️ São DOIS
   links diferentes e nenhum substitui o outro: a arte na sec-11 leva a
   vidadesuporte.com.br; este nome leva ao perfil dele no X. Consentimento
   do artista: dispensado pelo líder (04/09/2026, "Não precisa, é encomenda
   paga").
   O bloco de créditos é MECÂNICO (derivado do $ctx, mais a linha nova de
   crédito acima) e não se mexe fora disso; a NOTA DO EDITOR é a parte
   autoral, fonte: docs/content/edicao-5-copies-curtas.md (bloco "3. Seção
   19, Expediente: nota do editor"). Trava §1.1 aplicada nela: afirma a
   especialização do Gus Dragon sem hedge, sem número de linhas de código
   (fala em "um número", não o valor).
   Voz: root@glyfesse (o criador, nunca nomeado), seco e curto, no tamanho
   das notas anteriores (#1/#2/#3/#4). O prompt usa o formato já publicado
   (root@glyfesse:~/expediente$); o caminho fica sem acento e NÃO se traduz
   (é caminho de shell). Rascunho v1, fala do root, submissão obrigatória ao
   líder antes de qualquer render (L-08, T6). Notas de produção do fonte
   NUNCA entram aqui. */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Escrito por <span class="prompt">gus@glyfesse:~$</span><br>
    Editado por <span class="prompt">root@glyfesse:~$</span><br>
    Tirinha por <a href="https://x.com/Andre_Suporte" target="_blank" rel="noopener" aria-label="Visitar o perfil de André Farias no X">André Farias</a>
  </p>

  <p class="colo-direitos">Todos os direitos reservados.</p>
</div>

<hr class="colo-sep">

<p class="fala"><span class="prompt">root@glyfesse:~/expediente$</span> <span class="dito">nota do editor</span></p>

<p>Na edição passada escrevi que nada se perde, só espera a vez. Desta vez algo se perdeu, e foi justamente o que estava marcado para ser guardado. Fica registrado onde deve: numa lápide. O resto do mês foi conferir. No fim, joguei o jogo inteiro e não achei nada. O Gus Dragon jogou depois e achou dois defeitos, porque estuda jogos e o filtro dele para isso é mais especializado que o meu. Aí perguntou o tamanho do jogo e recebeu um número, não uma estimativa.</p>
