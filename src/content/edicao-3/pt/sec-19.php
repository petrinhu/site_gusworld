<?php /* Expediente (colofão) #3 - molde da #2, agora DATA-DRIVEN: título e data saem do
   $ctx (data/edicoes.php) em vez de digitados à mão, então não há como o colofão
   divergir da fonte de dados quando alguém corrigir a data ou o título da edição.
   data_por_extenso() é o mesmo formatador do masthead (src/lib/view.php).
   O separador do título é o middot " · " (convenção de título do site), não em-dash.

   ⚠️ SEM NOTA DO EDITOR. A #1 e a #2 fecham com uma nota assinada por root@glyfesse;
   a #3 NÃO tem esse texto em nenhuma fonte de docs/content/, e escrevê-lo aqui seria
   inventar copy que não passou por gate. O bloco de créditos é mecânico (derivado do
   dado) e pode entrar; a nota é autoral e fica pendente do editor-geral. */ ?>
<div class="colofao">
  <p class="colo-titulo">GLYFESSE #<?= h((string) $ctx['numero']) ?> &middot; <?= h((string) $ctx['titulo']) ?></p>
  <p class="colo-data"><?= h(data_por_extenso((string) $ctx['data'], (string) $ctx['idioma'], $t)) ?></p>

  <p class="colo-creditos">
    Escrito por <span class="prompt">gus@glyfesse:~$</span><br>
    Editado por <span class="prompt">root@glyfesse:~$</span>
  </p>

  <p class="colo-direitos">Todos os direitos reservados.</p>
</div>
