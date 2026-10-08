<?php /* Expediente (colofão) #6 - molde da #5: DATA-DRIVEN, título e data saem do $ctx (data/edicoes.php), nunca digitados
   à mão; data_por_extenso() é o formatador do masthead (src/lib/view.php). Separador do título: middot (&middot;), não travessão.
   Montado à mão (PLANO-CONVERSOR 2.5). Fontes de texto: docs/content/edicao-6-copies-curtas.md, peça 6 (linhas novas do
   colofão, 6ª ocorrência de ## pt-BR) e peça 7 (nota do editor, 7ª).
   ★ NOVO NA #6: (1) crédito do artista da tirinha, D5 do líder ("Seja bem claro que a arte é do artista andré, o mesmo da
   edicao anterior e ponha o link dele e o @ dele do x"); nome e URL copiados de src/content/edicao-5/pt/sec-19.php:36
   (https://x.com/Andre_Suporte), um só <a> para nome e @, target="_blank" rel="noopener", aria-label descrevendo o destino.
   (2) declaração de IA da tira (D5): cita arte do jogo gerada por IA, declarada no rodapé; o traço é do artista.
   (3) declaração do método da Entrevista (PQ13 "Sim, uma linha seca", sem nome), com a cláusula da tradução (GATE-COPY
   "Sim, acrescentar"): só é verdadeira quando a tradução existir; confere-se contra o rodapé antes do GATE-GO.
   Nota do editor: voz do root (nunca nomeado), aprovada no GATE-COPY; prompt root@glyfesse:~/expediente$ (caminho sem
   acento, não se traduz). Não nomeia o Gus Dragon (T4) nem cita dinheiro (T3). Notas de produção do fonte NUNCA entram aqui. */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Escrito por <span class="prompt">gus@glyfesse:~$</span><br>
    Editado por <span class="prompt">root@glyfesse:~$</span><br>
    Tirinha: arte de <a href="https://x.com/Andre_Suporte" target="_blank" rel="noopener" aria-label="Visitar o perfil de André Farias no X">André Farias (@Andre_Suporte, no X)</a>, o mesmo artista da edição passada
  </p>

  <p class="colo-creditos">A tirinha mostra arte do jogo, o brasão e o sprite do Gus, gerada por IA e declarada no rodapé. O traço da tirinha é do artista.</p>

  <p class="colo-creditos">As respostas do Brunus são de uma pessoa real; a tradução para o inglês é de um agente de IA, aprovada pelo editor. As perguntas do Gus são rascunho de agente de IA, aprovado pelo editor.</p>

  <p class="colo-creditos">Texto: rascunhado com agentes de IA e revisado pelo editor.</p>

  <p class="colo-direitos">Todos os direitos reservados, exceto a tirinha, de André Farias, publicada com autorização do artista.</p>
</div>

<hr class="colo-sep">

<p class="fala"><span class="prompt">root@glyfesse:~/expediente$</span> <span class="dito">nota do editor</span></p>

<p>Na edição passada, alguém perguntou o tamanho do jogo e recebeu um número, não uma estimativa. Esta edição fez o caminho inverso: abriu com uma estimativa e fechou com um número que não se moveu. Entre uma coisa e outra, eu mandei quebrar. Foi decisão minha.</p>
