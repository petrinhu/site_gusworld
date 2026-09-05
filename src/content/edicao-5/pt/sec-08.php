<?php
/* Detonado da Pausa (#5) - fonte: docs/content/edicao-5-detonado.md (## pt-BR),
   verbatim ("Notas de produção" excluída, nunca publicável). Reusa o mesmo
   componente do Detonado da Simulação (#3) e do Detonado do Diálogo (#4):
   estilos em edicao.css, bloco "§08 · o DOCUMENTO DESCLASSIFICADO".

   D4 (decidida em 04/09/2026): entra CHEIA. Serviço ATEMPORAL (como #3/#4):
   conta como o menu de pausa funciona por trás da tela HOJE, ancorado em
   24/07/2026 (a conversão de arquitetura e a bateria de mutação), sem narrar
   o mês inteiro.

   ⛔ SEM CARIMBO "CENSURADO!!!" nesta peça, ao contrário de #3/#4: a fonte é
   explícita ("nenhuma tarja/token foi usada nesta peça" - nenhum termo
   embargado apareceu na pesquisa, nada de lore aqui). Carimbar um documento
   que não tem nada censurado seria decoração falsa, o oposto do que o
   mecanismo protege. Pela mesma razão, nenhuma linha da transcrição usa
   <b class="det-tarja"> - as 4 linhas de teste abaixo são texto pleno.

   Divisória contra a Programação (edicao-5-programacao.md, §5.2 da pauta):
   esta peça carrega a lição "teste que pendura fica quieto, e quieto parece
   verde"; a Programação carrega "uma ferramenta barata viu o que a revisão
   cara não viu". Nenhuma das duas repete o fato ou a lição da outra (o bug do
   "andar sozinho" como EVENTO fica de fora daqui, é da Galeria de Bugs; aqui
   só a arquitetura de hoje). */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/detonado$</span> <span class="dito">detonado da pausa</span></p>

<div class="det-doc">

  <p>Até pouco tempo, cada tela do jogo (o título, a dificuldade, salvar e carregar, a própria pausa, a batalha, o visualizador de animação) tinha o próprio jeito de escutar o teclado: um laço que só ela controlava, bombeando pra si os eventos do sistema inteiro enquanto estivesse no ar. Hoje existe um laço só. Cada tela é um estado dentro dele: entra, trata o que chegou, avança, termina, sai. Nenhuma tela mais monopoliza nada.</p>

  <p>Duas telas são pais de outra: o título abre a tela de dificuldade, e a pausa abre salvar e carregar. Isso pedia cuidado, porque duas telas vivas ao mesmo tempo é exatamente o tipo de situação que já rendeu problema sério no passado do projeto. A solução foi um mini-condutor por fora, dono do próprio laço: ele roda a tela-pai até ela terminar; se a resposta foi "abrir a filha", roda a filha; se a filha foi cancelada, volta pro topo e roda o mesmo objeto-pai de novo, não um novo; se a filha confirmou, os dois terminam juntos.</p>

  <p>Esse detalhe do "mesmo objeto" é o que preserva o foco. O que está em destaque numa lista, o que já foi escaneado: isso nasce no construtor da tela, não toda vez que ela reabre. Se nascesse toda vez, cancelar a dificuldade e voltar ao título jogaria o destaque de volta pro primeiro item, e quem estava navegando perderia o lugar sem aviso.</p>

  <p>Prova de vida: existe uma bateria que passeia pelas seis telas sozinha, sem ninguém olhando, e confere se cada uma faz o que promete. Em 24 de julho ela fechou em 2.536 testes verdes, contra 2.424 antes da conversão.</p>

  <div class="det-transcricao">
    <span class="cab">saída da bateria de testes · trecho</span>
    <div class="det-linhas">
      <div class="det-linha">
        <span class="nome">[pausa] cada tela entra, trata evento, avanca e sai sem monopolizar</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[pausa] cancelar a filha reentra no mesmo objeto pai, foco preservado</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[pausa] fechar a janela em qualquer fase da tela pula o resto</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <div class="det-linha">
        <span class="nome">[pausa] nenhum laco sobrevive fora do laco central</span>
        <span class="pontos" aria-hidden="true">..........................................................................................</span>
        <span class="ok">ok</span>
      </div>
      <span class="total">todos os testes: 2536/2536</span>
    </div>
  </div>

  <p>O número por si só prova pouco: só diz que o que já funcionava continuou funcionando depois de mexer em outra parte. A parte que importa de verdade aconteceu antes desse número fechar limpo.</p>

  <p>Cada tela, ao entrar no molde novo, foi sabotada de propósito antes de ser aceita: alguém quebra uma linha, compila de verdade, roda a suíte de verdade, e confere se algum teste morre. Na primeira tela, sete sabotagens, seis testes morreram. Uma sobreviveu: quebrar a linha que fecha a janela. Nenhum teste, puro ou de integração, apertava o X daquela tela. Corrigiram, e a sabotagem foi reconferida à mão, não só pelo relatório. E aí veio o detalhe que vale a peça inteira: com a linha quebrada, o teste não falhava. Ele <strong>travava</strong>. O laço nunca chegava à condição de saída, então ele ficava pendurado pra sempre. A suíte não tinha limite de tempo por teste, e um travamento penduraria a integração inteira em vez de reprovar rápido. Entrou o limite ali mesmo: o buraco achado ao caçar outro buraco.</p>

  <p>Nas telas seguintes o buraco não voltou, porque o teste de fechar janela já nasceu dentro do molde. Nenhuma delas travou depois disso: ou passava, ou reprovava, nunca ficava quieta esperando alguém notar.</p>

  <p class="det-fecho">Teste que pendura fica quieto, e quieto parece verde. É a lição desta peça, e é diferente da lição de qualquer analisador automático que aponta erro na hora: aqui o problema não era o que a verificação via. Era o que ela fazia quando o próprio teste parava de responder. Fim.</p>

</div>
