<?php /* Seção de Programação (#5) · o eixo expert - fonte:
   docs/content/edicao-5-programacao.md (## pt-BR), verbatim. Voz:
   gus@glyfesse, voz editorial da revista em seção técnica (L-25 autoriza
   termo técnico aqui: não é fala de personagem de jogo dentro do mundo do
   jogo). Estrutura canônica herdada das #1-#4: intro acessível -> desculpa
   furada (CRT, nova nesta edição, não repete a da #4) -> transição // -> CRT
   nano -> parte técnica com subtópicos <h3> + tabela -> //by:.

   Lente (D2, decidida pelo líder em 04/09/2026: este é o fio que carrega a
   frase da lente da edição inteira - "o verificador automático achou o
   travamento de ponteiro nulo em objeto já movido, que a revisão adversarial
   humana tinha deixado passar"; a peça se organiza em torno dele): o eixo
   expert de "conferir" - a proteção pela metade que enganava (fio 1), o
   isolamento que pertence a quem executa (fio 2), o analisador estático que
   achou em segundos o crash que a revisão adversarial não achou (fio 3, a
   lente), e o QA do jogo que achou o mesmo tipo de vazamento no dia seguinte
   (fio 4). Datas: 23/07/2026 (glintfx, fios 1 a 3) e 24/07/2026 (o jogo, só
   o fio 4).

   ⛔ NÃO entra aqui a sabotagem que fez o teste travar em vez de reprovar
   (24/07): vai para o Detonado da Pausa, por divisória de LIÇÃO, não só de
   fato (§5.2 da pauta: se as duas peças terminarem na mesma moral, uma delas
   está errada - esta carrega "uma ferramenta barata viu o que a revisão cara
   não viu", o Detonado carrega "a verificação que não sabia falhar").
   ⛔ Reserva: os "5 becos sem saída" do glintfx não aparecem aqui, nem por
   citação de existência (herdado da trava da #4). ⛔ Não piscar: sem elogio a
   ferramenta nenhuma como vitória, sem sinal do que vem em agosto. Sem
   travessão em nenhuma forma, glifo nem código HTML.

   Blocos de código e a citação em bloco reusam <pre><code>/<blockquote>, sem
   classe nova (o .conteudo code já estiliza tokens; o .conteudo blockquote
   já foi usado com este mesmo papel na #3, sec-17). */ ?>
<p>Tem aviso que fecha o perigo, e tem aviso que só descreve o perigo. Vistos de longe, os dois parecem cuidado. Em 23 de julho de 2026, um projeto vizinho a este descobriu a diferença do jeito mais caro que existe: o perigo estava documentado, certinho, do lado de um código que não fazia nada a respeito dele.</p>

<p>O projeto é o glintfx, o framework de jogos que a equipe usa por fora, e o incidente aconteceu de madrugada, na sessão de trabalho ao vivo do dono da máquina: telas de teste abrindo e fechando sozinhas, na tela dele, sem ele ter pedido nada. Não era a primeira vez que esse tipo de coisa acontecia por ali: da última, um teste de janela parecido travou o touchpad da máquina até precisar reiniciar. Por isso a regra da casa é dura: teste que abre janela nunca roda na sessão viva de ninguém; roda isolado, sempre.</p>

<?php /* a DESCULPA FURADA, em bloco de terminal (canon da #3, herdado na #4).
   NÃO é decorativa: é a voz de gus@glyfesse e o leitor lê. Por isso não leva
   aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~$</span> whoami</p>
    <p>gus</p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># dessa vez fui eu que achei o problema?</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># nao. foi um programa que ninguem elogia, rodando sozinho</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># eu so assisto e escrevo depois. doeu o orgulho um pouquinho</span></p>
  </div>
</div>

<p class="pensa longo nota-leitor">Prezado leitor, daqui em diante é a parte técnica de verdade: documentação histórica do código do jogo.</p>
<p class="pensa assinatura">gus@glyfesse</p>

<?php /* crt-nano: o comando sendo DIGITADO ao entrar na view (CSS steps, o JS
   só arma). Decorativo (o texto já diz tudo) -> aria-hidden. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">protecao-pela-metade.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>O aviso que ninguém desligou</h3>

<p>Existia um mecanismo pronto pra isso: um wrapper que isola cada teste antes de rodar. E ele tinha, escrito no próprio comentário, em português e em inglês, a explicação inteira do risco:</p>

<pre><code>RESSALVA (confirmada por teste): remover WAYLAND_DISPLAY sozinho não impede
o motor gráfico de escolher Wayland, porque wl_display_connect(NULL) cai no
nome de socket padrão wayland-0 dentro do $XDG_RUNTIME_DIR quando a variável
está ausente, e esse socket continua vivo (pertence à sessão real do desktop).</code></pre>

<p>A explicação estava certa. O código logo abaixo fazia uma coisa só: apagar a variável <code>WAYLAND_DISPLAY</code>. Documentado e não implementado. Alguém entendeu o problema inteiro, escreveu a explicação completa, e deixou o conserto pra quem chamasse o wrapper, sem dizer isso em lugar nenhum que o computador lesse.</p>

<h3>Isolamento pertence a quem executa, não a quem chama</h3>

<p>Procurando melhor, apareceram três portas de entrada pro mesmo problema, não uma: o wrapper de cada teste (o de cima); o script do gate local, que lançava a suíte inteira sem isolamento próprio nenhum, confiando em quem o chamasse; e o script de cobertura, com o mesmo furo. Foi o segundo que causou o incidente daquela madrugada: uma chamada automática rodou a suíte completa quatro vezes seguidas, com trinta testes que abrem janela de verdade em cada rodada.</p>

<p>O princípio que sobrou disso virou regra permanente do projeto:</p>

<blockquote><em>"O isolamento pertence a quem executa, não a quem chama."</em></blockquote>

<p>Nenhum ponto de entrada pode depender de alguém lembrar de digitar um prefixo antes. Foi exatamente essa dependência que falhou.</p>

<h3>O que a verificação olhava, e onde o problema estava</h3>

<p>No mesmo dia, mais tarde, apareceu o terceiro fato, e é o que carrega a lição da edição inteira. Com tudo consertado e verde, uma verificação automática (a mesma que barra qualquer entrega com problema de estilo, não só de comportamento) apontou isto:</p>

<pre><code>if (!impl_ || !impl_->initialized) {
    impl_->log_warn("...");   // se impl_ é nulo, entra aqui e desreferencia nulo</code></pre>

<p>Se o ponteiro interno for nulo, a condição é verdadeira, entra no bloco, e usa o próprio ponteiro nulo lá dentro. Como o objeto é do tipo que só pode ser movido, um objeto do qual algo já foi movido tem justamente esse ponteiro em nulo. Duas linhas comuns de código bastavam pra travar o programa inteiro.</p>

<p>O que torna o fato interessante: uma revisão adversarial cuidadosa já tinha passado por ali antes, com cinco sabotagens de propósito, entrada hostil, o detector de erro de memória ligado o tempo todo. Ela testou chamar o objeto antes dele estar pronto, o caso óbvio. Não testou chamar o objeto depois de movido. A verificação automática achou em segundos, sem sabotagem nenhuma, só de olhar o código parado.</p>

<table class="specs">
  <thead>
    <tr><th>O que a verificação olhava</th><th>Onde o problema estava</th></tr>
  </thead>
  <tbody>
    <tr><td>Se o objeto foi chamado antes de estar pronto</td><td>Se o objeto foi chamado depois de já ter sido movido</td></tr>
    <tr><td>Apagar a variável de ambiente do processo</td><td>O socket padrão que ela escondia continuava vivo, do lado de fora</td></tr>
    <tr><td>Cada teste isolado, um a um</td><td>O script que chama a suíte inteira, sem isolamento próprio</td></tr>
  </tbody>
</table>

<h3>Do outro lado, no dia seguinte</h3>

<p>No dia seguinte, 24 de julho, do lado do jogo, aconteceu a versão mais simples da mesma história. Um agente de qualidade estava testando outra coisa, uma tela de menu, e no meio do relatório dele apontou um problema que não tinha ido procurar: o gancho automático do projeto, que roda build e teste a cada arquivo editado, também estava herdando as variáveis da sessão gráfica real, a mesma sessão viva que a regra da casa protege. Ele não ficou só no quadrado dele. Se tivesse ficado, o risco continuava lá, sem ninguém saber.</p>

<p>Nenhum dos quatro fatos é sobre uma ferramenta ser melhor que outra. É sobre pra onde cada verificação estava olhando. Documentar o perigo não fecha a porta. Só fechar a porta fecha a porta, e só fecha de verdade quando quem tranca é quem vai passar por ela.</p>

<p class="pensa assinatura">by: gus@glyfesse</p>
