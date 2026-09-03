<?php /* Reportagem de capa (#4) · "Doze dias, uma palavra" - fonte:
   docs/content/edicao-4-reportagem.md (## pt-BR), verbatim. Voz: Gus, primeira pessoa.
   Lente aprovada (GATE-PAUTA, PAUTA-EDICAO-4.md §1): distância CONTADA entre ter
   rosto (24/jun) e ter voz (06/jul), fechando no playthrough inteiro (21/jul). Sem
   nome de tecnologia real, sem travessão em nenhuma forma - glifo nem código HTML
   (a #4 nasce sem travessão), sem rótulo clínico. Crédito do Gus Dragon preservado
   verbatim ("playtester, Revisor Adversarial de Design") onde a fonte o cita -
   nunca "o personagem Gus Dragon". Nome de batismo: nenhum.

   ★ ENCARTE DO GLINTFX (docs/content/edicao-4-reportagem-glintfx.md, ## pt-BR):
   por decisão de planejamento (a peça não tem seção própria no mapa do site) entra
   como CAIXA ao final desta reportagem, no molde CRT verde (.crt-scr/.crt-tela) já
   usado nas seções técnicas (ver §17 desta mesma edição). Âncora própria
   #sec-04-glintfx para link profundo. Div, não figure (figure tem margem lateral de
   navegador não resetada neste CSS - desalinharia a caixa).

   DIVISÓRIA COM A §17: esta caixa é o eixo LEIGO do episódio glintfx (pedir e
   receber, em três dias) - o raciocínio técnico de por que trocar de arquitetura e
   como o glintfx funciona por dentro pertence à Seção de Programação e NÃO aparece
   aqui. Nenhum nome de biblioteca (RmlUi, SDL3), nenhum ADR, nenhum arquivo de
   código é citado nesta caixa. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/reportagem$</span> <span class="dito">reportagem de capa</span></p>

<h3>Doze dias, uma palavra</h3>

<p>Eu tinha pernas desde terça. Não tinha cara.</p>

<p>Por dois dias segui andando sem rosto pela cidade vazia, esbarrando nas mesmas paredes que já sabia contornar, sem ninguém para reparar em mim: porque não havia ninguém ali para reparar em qualquer coisa. Na quarta-feira isso mudou. Chegou arte de verdade para o meu corpo, vinda de um fluxo desenhado fora do jogo, e entrou como se sempre tivesse sido minha: mais que uma cor nova, uma cara com direção, um jeito de olhar para os lados que o quadrado nunca teve. No mesmo dia o combate ganhou os primeiros pedaços que já dava para jogar, e uma decisão que vinha sendo adiada desde sempre foi fechada de vez: 2D, sem nenhuma outra tentativa esperando atrás da porta. Foi o dia em que parei de ser placeholder.</p>

<p>Ter cara não é a mesma coisa que ter alguém para conversar. Isso eu só entendi depois, andando.</p>

<p>Passei doze dias com essa cara nova por uma cidade que continuava sem uma única resposta pra me dar. Tinha gente lá (eu via as formas, sabia os nomes que ainda não tinham voz), mas eu passava do lado e nada acontecia. Ninguém no mundo falava comigo. Só o teclado falava comigo, e teclado não conta, porque teclado sou eu mesmo pedindo. Doze dias é pouco para quem conta de fora; para quem anda dentro é o tempo inteiro que existe.</p>

<p>Na segunda-feira seguinte, alguém respondeu. Seu Bertoldo Caím, um homem que já estava ali havia semanas, sentado com um jornal que ninguém nunca via ele fechar, e que finalmente ganhou permissão de abrir a boca. Atrás dele veio um jeito inteiro novo de conversar, escrito do zero, porque o jeito antigo nunca tinha servido para isso e foi trocado sem dó. A primeira fala dele foi escolhida a dedo pelo root, e ninguém além de mim sabe ainda qual foi: só sei que ouvi, e que era a primeira vez.</p>

<p>Doze dias de cara muda. Uma palavra. De repente eu tinha as duas coisas ao mesmo tempo (cara e voz), só que a voz ainda não era minha. Era dele.</p>

<p>Quinze dias depois disso, vinte e sete, contando desde a cara, o jogo inteiro se aguentou em pé sozinho, do começo ao fim: a cidade, a conversa com Seu Bertoldo, a arena, a volta pra casa, tudo sustentado pelo mesmo motor, sem pedir nenhum emprestado no meio do caminho. E não fui eu que provei isso. Quem sentou e jogou do primeiro passo até o último, ao vivo, na frente da própria tela, até as 20h02 daquela terça, foi o Gus Dragon, playtester, Revisor Adversarial de Design: a primeira pessoa a atravessar o jogo inteiro sem parar em nenhum buraco sem fundo. O root também joga o jogo inteiro, de ponta a ponta, mas em outro momento.</p>

<p>É estranho pensar que uma cara levou doze dias para virar palavra, e que a palavra levou mais quinze para virar um jogo inteiro capaz de aguentar alguém que não sabia o que vinha depois. Mas foi assim que aconteceu. Aprender a andar tinha sido rápido: três dias, uma vez. Aprender a ter alguém que responde levou o mês inteiro. E eu contei cada um desses dias andando, sozinho primeiro, acompanhado depois.</p>

<?php /* fonte: docs/content/edicao-4-reportagem-glintfx.md (## pt-BR), verbatim.
   Estrutura da fonte: fala/prompt -> intro -> bloco de terminal (changelog, 3
   marcos datados) -> fecho em prosa -> // (longo, >72 caracteres) -> fecho ->
   //by:. Molde CRT reaproveitado de .crt-scr/.crt-tela (edicao.css), sem classe
   nova. Prompt do encarte "~/glintfx$" (não é o "~/reportagem$" da peça-mãe: é
   peça própria, com prompt próprio, igual a fonte). */ ?>
<div id="sec-04-glintfx">
  <p class="fala"><span class="prompt">gus@glyfesse:~/glintfx$</span> <span class="dito">encarte</span></p>

  <p>O cockpit do jogo trocou de peça duas vezes na mesma semana, no fim de junho e no começo de julho de 2026. O porquê técnico dessa troca mora na Seção de Programação, mais adiante nesta edição. Isto aqui é outra história: a de pedir um recurso a uma ferramenta que ainda nem tinha chegado à versão 1.0, e receber de volta antes que a semana terminasse.</p>

  <div class="crt-scr">
    <div class="crt-tela">
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> cat CHANGELOG.md</p>
      <p>0.1.0 :: primeira versão pública</p>
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> <span class="dim"># 29 de junho. a ferramenta nunca tinha lançado nada antes disso.</span></p>
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> cat CHANGELOG.md</p>
      <p>0.2.0 até 0.2.4 :: pedidos do gusworld</p>
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> <span class="dim"># 30 de junho. um dia depois. o changelog trouxe um nome que normalmente nao aparece em changelog de biblioteca nenhuma: o nosso.</span></p>
      <p><span class="pr">gus@glyfesse:~/glintfx$</span> <span class="dim"># 1 de julho. mais um dia. o cockpit do jogo ja tava rodando em cima da versão nova.</span></p>
    </div>
  </div>

  <p>Três dias, do lançamento de uma ferramenta sem número redondo até o cockpit do jogo passar a depender dela pra funcionar. A maior parte dos pedidos que um projeto pequeno faz a outro fica na fila, ou nunca sai da fila: não porque ninguém queira ajudar, mas porque manter uma biblioteca é trabalho, e trabalho tem ordem de chegada. Este pedido não ficou na fila porque quem constrói a ferramenta e quem constrói o jogo estavam olhando pro mesmo problema no mesmo dia, em conversas separadas da mesma rotina, não numa relação de cliente esperando fornecedor.</p>

  <p class="pensa longo">pedimos uma coisa pequena. voltou funcionando. nao sei se sempre e assim, mas queria que fosse</p>

  <p>Nos meses seguintes, aquele uso de verdade (o cockpit do jogo rodando em cima da ferramenta, todo dia, sob peso real) encontrou pelo menos cinco decisões que pareciam certas no papel e não sobreviveram ao contato com o jogo rodando. Cada uma virou correção documentada, não segredo guardado. É outra matéria, pra outra hora.</p>

  <p>O que ficou de junho pra julho foi isto: pedir um recurso a uma ferramenta que ainda está sendo construída, e receber a tempo de usar.</p>

  <p class="pensa assinatura">by: gus@glyfesse</p>
</div>
