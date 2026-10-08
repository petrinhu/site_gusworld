<?php /* Cemitério das Ideias Mortas (#6) - fonte: docs/content/edicao-6-cemiterio.md (## pt-BR),
   aprovada pelo líder (GATE-CONTEUDO de 07/10/2026; epitáfio escolhido por ele, PQ10).
   Molde à mão (PLANO-CONVERSOR 2.5): lápide REAPROVEITADA da #5 (.lapide/.lapide-pedra), sem arte nova.
   Datas com a entidade &#8224; (dagger), a mesma convenção das #2 a #5, NÃO é travessão.
   Uma lápide só: RmlUi. Texto: direitos reservados (LICENSE §2). Notas de produção do fonte NUNCA entram aqui. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/cemiterio$</span> <span class="dito">cemitério das ideias mortas</span></p>

<p>A cova da #5 estava vazia: o que devia estar guardado lá dentro sumiu antes de eu terminar a lápide. Esta tem corpo. O que saiu dela foi o nome.</p>

<figure class="lapide">
  <div class="lapide-pedra">
    <p class="lapide-nome">RmlUi</p>
    <p class="lapide-datas"><span>22/jun/2026</span><span>&#8224;20/ago/2026</span></p>
    <p class="lapide-epitafio">Aqui jaz um nome.<br>O corpo continua de pé.</p>
  </div>
</figure>

<p>O RmlUi é uma biblioteca de interface escrita por outras pessoas: é ela que monta os menus e as telas. Aparece pela primeira vez no registro do jogo em 22 de junho de 2026, na troca de base do Qt6 para o SDL3 (o ADR-008, o registro de decisão que listava SDL3, RmlUi e miniaudio). Em 25 de junho, o ADR-009 o escolheu para a interface e para o HUD, o painel de informações que fica por cima do jogo. Em 1º de julho, o ADR-010 passou a usá-lo por dentro do GlintFX, o motor gráfico do jogo (a Edição #4 conta essa troca).</p>

<p>Foi decretado fora em 4 de agosto: o root decidiu tirar as bibliotecas de terceiros uma por uma, começando por ele. A data na pedra é outra, a de 20 de agosto, porque é o dia em que o nome saiu.</p>

<p>Naquele dia, o nome do RmlUi e o das outras bibliotecas de terceiros foram trocados por um marcador em 687 arquivos do GlintFX e em 398 do jogo. A pasta <code>src/rml/</code> virou <code>src/_m_/</code>. Nenhum arquivo foi apagado e nenhuma linha foi apagada. Só o texto mudou, e o buraco ficou à vista.</p>

<p>Também não ficou comentário no lugar. Segundo o registro da sessão de IA que trabalha no GlintFX, a ausência foi decisão explícita. Quem abria o arquivo via o buraco e mais nada. Esta pedra é o comentário que o repositório não deixou.</p>

<p>E o nome saiu, mas o uso não. No placar de dependência do GlintFX, a contagem de 20 de agosto seguia em 31 arquivos de interface, a mesma do início da campanha, segundo o registro. A troca mexeu no texto e não tirou código. Por isso a pedra enterra o nome e deixa o corpo de fora: um corpo de pé não cabe em cova.</p>

<p>A reportagem de capa conta como o mês chegou até aqui. Esta página só cuida da pedra.</p>
