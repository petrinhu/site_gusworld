<?php /* Cemitério das Ideias Mortas (#5) - fonte: docs/content/edicao-5-cemiterio.md
   (## pt-BR). Voz: Gus-editor (a voz meta da revista; não é personagem
   vivendo dentro do mundo ficcional, por isso nomear "C#", "submódulo" e
   nome de ferramenta não quebra L-25, mesmo registro das lápides da
   #2/#3/#4). Layout de lápide REAPROVEITADO (.lapide/.lapide-pedra), sem
   arte nova, sem re-gate. Uma cova só: "a fundação C#" - a cova é do CORPO,
   não da decisão (a #3 já enterrou a decisão de trocar de motor, lápide
   "C# .NET 8 AOT"; aqui não se re-enterra isso, só se referencia em uma
   linha, conferida contra src/content/edicao-3/pt/sec-07.php, linha 19).
   Datas com a entidade &#8224; (dagger), IDÊNTICA à convenção da #2/#3/#4 -
   NÃO é travessão. Trava T3 integral: nada da refundação, nada de nome de
   host (usa "o servidor remoto"); sem o número "172 arquivos" (só a
   Reportagem tem essa fonte firme); a peça escreve "os arquivos C++ de
   então", nunca "de hoje". Epitáfio ainda PROPOSTO na pauta, não decisão
   fechada - confirmar com o líder antes do GATE-CONTEUDO. Notas de produção
   do fonte NUNCA entram aqui. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/cemiterio$</span> <span class="dito">cemitério das ideias mortas</span></p>

<p>Desta vez é uma cova só, e ela está vazia. Não porque não tenha nome, mas porque o que devia estar guardado lá dentro sumiu antes de eu terminar de escrever a lápide. A #3 já enterrou a decisão de trocar de motor, com a lápide "C# .NET 8 AOT" e a nota de que o corpo ficou instalado no computador até 22 de julho. Esta cova é outra. É a do corpo.</p>

<figure class="lapide">
  <div class="lapide-pedra">
    <p class="lapide-nome">a fundação C#</p>
    <p class="lapide-datas"><span>mai/2026</span><span>&#8224;22/jul/2026</span></p>
    <p class="lapide-epitafio">Aqui não jaz ninguém.<br>O corpo ia ser guardado. Foi apagado.</p>
  </div>
</figure>

<p>O GusWorld nasceu em Godot, com C#. A lógica de verdade (o save, a tradução, a progressão, os modelos de personagem, o motor de combate) morava numa fundação C# que vivia num repositório próprio, montado no projeto principal como submódulo, na pasta <code>engine/</code>. Quando o projeto trocou para C++ com SDL3, essa fundação foi portada inteira: save, tradução, progressão e modelos primeiro, o motor de combate depois. O C# virou referência, não dependência, e ficou dormente por semanas, esperando a limpeza de julho.</p>

<p>No planejamento dessa limpeza (o M8), o parecer técnico recomendou explicitamente arquivar o repositório da fundação em modo somente leitura, com esta justificativa, verbatim: "apagar o repo remoto seria irreversível de verdade, não recomendo". O líder concordou e escolheu arquivar. A decisão ficou registrada como pendência dele, fora do repositório do jogo.</p>

<p>A limpeza foi executada em quatro fases, com cuidado obsessivo pra não perder nada dentro do próprio repositório: tag de segurança, build do zero como prova, verificação a cada fase. Na faxina, os metadados locais do submódulo foram apagados, e eles guardavam a única cópia clonada daquele código nesta máquina. Depois, o repositório remoto foi apagado em vez de arquivado.</p>

<p>A tag <code>pre-m8-godot-legacy</code>, criada justamente pra preservar o legado, guarda só o ponteiro do submódulo: o identificador de um commit, não os arquivos. É assim que submódulo funciona: o conteúdo sempre morou no outro repositório. Varreram lixeira, pacotes de objeto e o disco inteiro. Não há cópia. A preservação parecia feita. Não estava.</p>

<p>Nada funcional se perdeu: cada linha útil daquele C# já tinha sido traduzida, meses antes, com teste cobrindo o comportamento. O jogo não depende de um byte do código apagado. O que se perdeu foi o registro. E os arquivos C++ de então ainda carregam, nos comentários, a âncora da tradução, apontando pra um arquivo que ninguém mais consegue abrir:</p>

<p><code>// ADAPTACAO do C#: game/scripts/foundation/save_system/SaveManager.cs</code></p>

<p>Uma nota de rodapé pra uma obra que não existe.</p>

<p>Um registro técnico do próprio jogo tinha pedido, em 21 de junho, pra arquivar esse repositório; um mês depois recebeu a resposta carimbada em cima do próprio pedido: sem efeito, porque o repositório foi apagado em vez de arquivado, no servidor remoto. A ironia fica registrada sem defesa: o cuidado obsessivo ficou todo dentro do repositório, e a perda aconteceu exatamente fora dele, onde nenhuma das verificações estava olhando. O corpo ia ser guardado. Foi apagado.</p>
