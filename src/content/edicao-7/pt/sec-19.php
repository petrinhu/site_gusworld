<?php /* Expediente (colofão) #7 - molde da #6: DATA-DRIVEN, título e data saem do $ctx (data/edicoes.php), nunca digitados
   à mão; data_por_extenso() é o formatador do masthead (src/lib/view.php). Separador do título: middot (&middot;), não travessão.
   Montado à mão (PLANO-CONVERSOR 2.5). Fontes de texto: docs/content/edicao-7-copies-curtas.md, peças 8 (Entrevista),
   9 (HQ) e 10 (nota do editor), ocorrências 8, 9 e 10 de ## pt-BR; linha de tradução e direitos: Notas de produção,
   itens 6 e 4 do mesmo arquivo (padrão da #4 e da #5).
   Sai em relação à #6: o crédito e a linha da tirinha. A linha da HQ ocupa o lugar da linha de IA da tirinha; a linha
   da Entrevista ocupa o lugar da linha de respostas da #6. Sem linha sobre o brinquedo desta edição (decisão do líder,
   03/11/2026). O crédito do Gus Dragon não entra (T4); não cita dinheiro (T3).
   Nota do editor: voz do root (nunca nomeado), prompt root@glyfesse:~/expediente$ (caminho sem acento, não se traduz).
   Notas de produção do fonte NUNCA entram aqui. */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Escrito por <span class="prompt">gus@glyfesse:~$</span><br>
    Editado por <span class="prompt">root@glyfesse:~$</span>
  </p>

  <p class="colo-creditos">A HQ desta edição foi criada pela revista: roteiro e arte de agentes de IA, aprovados pelo editor. Não houve artista nesta edição.</p>

  <p class="colo-creditos">As respostas do Brunus são de uma pessoa real, publicadas palavra por palavra. A tradução delas para o inglês é de agente de IA, aprovada pelo editor, e reproduz de propósito erros de digitação equivalentes aos do original. As perguntas do Gus são rascunho de agente de IA, aprovado pelo editor.</p>

  <p class="colo-creditos">Texto: rascunhado com agentes de IA e revisado pelo editor.</p>

  <p class="colo-creditos">As traduções para o inglês são de agente de IA, aprovadas pelo editor.</p>

  <p class="colo-direitos">Todos os direitos reservados.</p>
</div>

<hr class="colo-sep">

<p class="fala"><span class="prompt">root@glyfesse:~/expediente$</span> <span class="dito">nota do editor</span></p>

<p>Na edição passada eu mandei quebrar, e disse que a decisão era minha. Esta edição conta o que veio antes e o que ficou guardado. A decisão de apagar foi minha. A frase que a explica também. As duas estão aqui, com as datas.</p>
