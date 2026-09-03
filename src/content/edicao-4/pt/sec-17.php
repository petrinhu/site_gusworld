<?php /* Seção de Programação (#4) · o eixo expert - fonte: docs/content/edicao-4-programacao.md
   (## pt-BR), verbatim. Voz: gus@glyfesse - AQUI é a voz EDITORIAL da revista, em
   seção técnica (L-25 não restringe: não é fala do personagem dentro do mundo do
   jogo). Estrutura canônica herdada da #3: intro acessível -> desculpa furada
   (CRT, .crt-scr.desculpa) -> transição // -> CRT nano -> parte técnica com
   subtópicos <h3> + tabela -> //by:.

   Lente: por que o cockpit trocou de mãos duas vezes em sete dias (25/jun
   ADR-009 -> 01/jul ADR-010), pela lente de "a peça que pensa nunca soube quem
   desenha". Fecho obrigatório: o link "Repo GlintFX" do índice, sem texto desde a
   #1, ganha explicação no último parágrafo.

   DIVISÓRIA COM A CAIXA DA §04 (glintfx): aqui mora o raciocínio técnico (RmlUi,
   SDL3/OpenGL, embed mode, ADR-009/010, o arquivo RmlUi_Renderer_SDL) - o lado
   humano de pedir/receber o recurso, o CHANGELOG e as datas de 29-30/jun e 01/jul
   NÃO aparecem aqui (pertencem à §04). Nenhuma menção aos "5 becos sem saída" do
   glintfx (reserva da pauta). Sem travessão (a #4 nasce sem travessão). */ ?>
<p>Um roteiro de teatro não muda se trocar o ator que lê as falas em voz alta, desde que as falas continuem as mesmas e cheguem na hora certa. O cockpit do jogo funciona assim: uma parte dele decide o que precisa ser mostrado (esta vida, aquele botão, este aviso), e outra parte pega essa decisão pronta e desenha na tela. Entre 25 de junho e 1º de julho de 2026, a parte que desenha trocou de dono duas vezes. A parte que decide não percebeu.</p>

<p>No dia 25 de junho, o registro chamado ADR-009 escolheu o RmlUi para desenhar a interface e o painel de comando do jogo: o RmlUi é uma biblioteca que monta tela a partir de marcação parecida com HTML e CSS. Sete dias depois, em 1º de julho, outro registro, o ADR-010, trocou de novo: entra o glintfx, envelopando o próprio RmlUi por dentro, e sai o código que a equipe do jogo tinha escrito à mão pra ligar um ao outro. Duas trocas, uma semana, e o motivo de a segunda ter custado tão pouco é a matéria desta seção.</p>

<?php /* a DESCULPA FURADA, em bloco de terminal (canon da #3). NÃO é decorativa:
   é a voz de gus@glyfesse e o leitor lê. Por isso não leva aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~$</span> whoami</p>
    <p>gus</p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># ninguem me perguntou antes de trocar a interface do jogo. nas duas vezes.</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># da primeira eu fiquei bravo. da segunda eu so liguei o cronometro pra ver quanto ia durar.</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># durou uma semana. bati o recorde de paciencia e o de troca de fundação no mesmo mes.</span></p>
  </div>
</div>

<p class="pensa longo nota-leitor">Prezado leitor, daqui em diante é a parte técnica de verdade: documentação histórica do código do jogo.</p>
<p class="pensa assinatura">gus@glyfesse</p>

<?php /* crt-nano: o comando sendo DIGITADO ao entrar na view (CSS steps, o JS só
   arma). Decorativo (o texto já diz tudo) -> aria-hidden. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">adr-010.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>Contexto: o que estava em jogo entre 25 de junho e 1º de julho de 2026</h3>

<p>Em 21 de junho, a engine do jogo passou a rodar sobre SDL3 (a história dessa troca está na Seção de Programação da Edição #3). SDL3 dá janela, entrada e desenho de baixo nível, mas não dá interface: barra de vida, menus, o painel de comando da tela de batalha. Pra isso, em 25 de junho, o ADR-009 escolheu o RmlUi: uma biblioteca que já vinha sendo usada por outros projetos de jogo antes deste. A decisão veio junto com o redesenho do cockpit tático da tela de batalha, em 960 por 540 pixels.</p>

<p>O RmlUi resolve a interface, mas não fala SDL3/OpenGL sozinho: alguém precisa escrever a ponte entre o que o RmlUi decide desenhar e a chamada real de vídeo que coloca aquilo na tela. Essa ponte, no jogo, foi escrita à mão: um arquivo próprio do projeto, chamado <code>RmlUi_Renderer_SDL</code>.</p>

<p>Sete dias depois, em 1º de julho, o ADR-010 trocou de novo. Entra o glintfx: uma biblioteca de interface sendo construída em paralelo, num projeto irmão, que já envelopa o RmlUi por dentro do próprio modo de uso ("embed mode": o jogo hospeda o glintfx, o glintfx cuida do resto). A ponte que o jogo tinha escrito à mão deixou de ser necessária, porque o glintfx já trazia a sua. Cinco dias depois, em 6 de julho, um commit removeu o arquivo órfão: o <code>RmlUi_Renderer_SDL</code> que ninguém mais chamava.</p>

<h3>Onde a ponte mudou de mãos</h3>

<table class="specs">
  <thead>
    <tr><th>Critério</th><th>RmlUi à mão (ADR-009, 25/jun)</th><th>glintfx em modo embed (ADR-010, 01/jul)</th></tr>
  </thead>
  <tbody>
    <tr><td>Quem escreve a ponte com SDL3/OpenGL</td><td>o projeto do jogo, num arquivo próprio</td><td>o glintfx, por dentro do próprio embed mode</td></tr>
    <tr><td>Quem mantém essa ponte em dia</td><td>o time do jogo, sozinho</td><td>outro projeto, em paralelo, do lado de fora</td></tr>
    <tr><td>O que sobrou no repositório do jogo, 5 dias depois</td><td>n/a</td><td>nada: <code>RmlUi_Renderer_SDL</code> removido em 06/jul</td></tr>
  </tbody>
</table>

<h3>Por que custou tão pouco</h3>

<p>A parte do jogo que decide o que aparece na tela de batalha (quanto de vida sobrou, qual botão está disponível) nunca soube o nome de nenhuma das duas bibliotecas de interface. Ela manda a decisão pronta pra quem estiver do outro lado, do mesmo jeito que a lógica de combate, meses antes, nunca soube se estava rodando sobre Qt6 ou sobre SDL3. Por isso a segunda troca, mesmo vindo sete dias depois da primeira, não pediu reescrever regra nenhuma de jogo: pediu trocar a ponte, e apagar a que ficou sem uso. O commit de 6 de julho que tira o <code>RmlUi_Renderer_SDL</code> do repositório é o registro desse apagar: não uma correção de erro, uma limpeza de código que parou de ter dono.</p>

<h3>O custo que foi aceito</h3>

<p>O preço aqui foi outro tipo de dependência: o glintfx, em 1º de julho, ainda não tinha lançado versão 1.0. É uma ferramenta sendo construída ao lado do próprio jogo, por outro projeto, com o próprio ritmo de mudança. Trocar uma peça de terceiro estável por uma peça de terceiro em construção troca um risco por outro: o de ficar preso a uma API antiga pelo de acompanhar uma API que ainda está se formando. O ADR-010 registra essa troca sabendo dela; não é o tipo de custo que se paga uma vez só.</p>

<p>É esse o link chamado "Repo GlintFX", que está no índice desta revista desde a primeira edição sem nunca ter ganhado uma linha de explicação ao lado. Agora tem: é o repositório da ferramenta que passou a desenhar o cockpit do jogo a partir de 1º de julho de 2026: a peça que pensa continuou sem saber o nome dela, e é exatamente por isso que a troca coube em uma semana.</p>

<p class="pensa assinatura">by: gus@glyfesse</p>
