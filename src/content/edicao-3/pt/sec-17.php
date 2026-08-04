<?php /* Seção de Programação (#3) · o eixo expert - fonte: docs/content/edicao-3-programacao.md
   (## pt-BR), verbatim. Voz: root@glyfesse (o criador, nunca nomeado).
   Estrutura canônica (igual #1 e #2): intro acessível -> desculpa furada -> transição //
   -> CRT nano digitando o comando -> parte técnica com subtópicos <h3> + tabelas -> //by:.

   ★ CANON DE FORMATO NOVO, da #3 em diante (decidido pelo editor-geral, 2026-08-03):
   a DESCULPA FURADA deixa de ser prosa corrida e vira um BLOCO DE TERMINAL, com o furo
   do argumento aparecendo como COMENTÁRIO do próprio root (#), não como frase de prosa.
   Casa com a estreia do formato novo de prompt nesta mesma edição.
   ⚠️ A #1 e a #2 NÃO se reajustam: a divergência entre edições não é defeito.

   D-ACENTOS: prosa acentuada; tokens de código em ASCII, dentro de <code>. O quadro CRT
   reusa .crt-scr/.crt-tela/.crt-nano; o comando "nano " digita (5ch) e revela o arquivo
   (progressive enhancement: sem JS o comando já aparece digitado). */ ?>
<p>Quantas vezes uma casa pode trocar de alicerce antes de cair? A resposta honesta é: depende de quanto da casa está apoiada nele. Se as paredes, o telhado e a fiação foram construídos amarrados no alicerce, a resposta é zero. Se foram construídos sem nem saber que o alicerce existe, a resposta é: quantas vezes for preciso, e num dia útil.</p>

<p>Em 22 de junho de 2026, às 23h34, a base do desenho de tela do GusWorld foi trocada. Não a arte, não o jogo &#8212; a peça de software que abre a janela e pinta os pixels nela. Ela tinha sido escolhida <strong>um dia antes</strong>. O registro dessa troca é um arquivo chamado ADR-008, e a linha mais importante dele não fala de biblioteca nenhuma: fala do que <strong>não</strong> precisou ser mexido.</p>

<p>Daqui a três parágrafos isto vira técnico de verdade &#8212; com nomes de biblioteca, contagem de testes e tabela. Antes disso, uma pergunta que quase ninguém faz e que é a matéria inteira: <strong>como é que se joga fora uma fundação sem perder o trabalho inteiro?</strong></p>

<?php /* a DESCULPA FURADA, agora em bloco de terminal (canon novo da #3). NÃO é
   decorativa: é a voz do root e o leitor lê. Por isso não leva aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">root@glyfesse:~$</span> whoami</p>
    <p>root</p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># a essa altura já quebrei a fundação duas vezes em dois dias.</span></p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># não sobrou nada aqui dentro que eu possa estragar mais do que já estraguei.</span></p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># logo: usar root pra escrever revista é risco zero.</span></p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># ...isso é exatamente o contrário de como risco funciona. eu sei.</span></p>
    <p><span class="pr">root@glyfesse:~$</span> <span class="dim"># o argumento é ruim. o commit é bom. seguimos.</span></p>
  </div>
</div>

<p class="pensa nota-leitor">Prezado leitor, daqui por diante é parte técnica real de documentação histórica do código do jogo.</p>
<p class="pensa assinatura">root@glyfesse</p>

<?php /* crt-nano: o comando sendo DIGITADO ao entrar na view (CSS steps, o JS só arma).
   Decorativo (o texto já diz tudo) -> aria-hidden. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">root@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">adr-008.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>Contexto: o que estava em jogo em 21 e 22 de junho de 2026</h3>

<p>Em <strong>21/jun/2026</strong> o projeto abandonou o motor de jogo pronto que vinha usando &#8212; motor pronto é um pacote que já traz janela, desenho, física e editor &#8212; e passou a escrever engine própria em <strong>C++20</strong> (a versão de 2020 da linguagem C++), com <strong>Qt6</strong> encarregado da camada de janela e desenho.</p>

<p>Em <strong>22/jun/2026, às 23h34</strong>, o Qt6 saiu e entrou o <strong>SDL3</strong>. Um dia de diferença. A decisão está registrada no <strong>ADR-008</strong> &#8212; ADR é <em>Architecture Decision Record</em>, um documento curto que registra uma decisão de arquitetura, o motivo dela e o preço aceito, para que ninguém precise adivinhar seis meses depois por que as coisas são como são.</p>

<h3>O risco que o Qt6 trazia</h3>

<p>O Qt6 funcionava. O problema não era desempenho nem qualidade: era <strong>onde</strong> a solução se apoiava. O caminho adotado dependia de uma peça <strong>semi-privada</strong> da biblioteca &#8212; uma API (o conjunto de funções que o programador tem permissão para chamar) que existe, está lá, funciona, mas <strong>não tem garantia pública de continuar existindo</strong>. Não é contrato: é cortesia.</p>

<p>Fundação apoiada em cortesia é dívida com data de vencimento marcada &#8212; e ninguém sabe a data. Pode vencer na próxima versão da biblioteca, pode vencer em 2031. A diferença entre pagar essa dívida em junho de 2026, com o projeto novo, e pagá-la depois, com o jogo inteiro em cima, é a diferença entre um dia e um trimestre.</p>

<h3>Onde o SDL3 ganhou</h3>

<table class="specs">
  <thead>
    <tr><th>Critério</th><th>Qt6</th><th>SDL3</th></tr>
  </thead>
  <tbody>
    <tr><td>Base da solução</td><td>peça semi-privada, sem garantia pública</td><td>superfície pública, estável</td></tr>
    <tr><td>Controle do que acontece na tela</td><td>intermediado pelo framework</td><td>direto, explícito</td></tr>
    <tr><td>Tamanho do programa final</td><td>maior</td><td>menor</td></tr>
    <tr><td>Caminho para console</td><td>não abria</td><td>abria</td></tr>
  </tbody>
</table>

<p>Três ganhos concretos: <strong>controle</strong> &#8212; menos camadas decidindo por conta própria entre o código e a tela; <strong>tamanho</strong> &#8212; o programa entregue ao jogador fica menor; e um <strong>caminho para console</strong>, que o outro simplesmente não abria.</p>

<h3>Por que custou pouco: a resposta da pergunta lá de cima</h3>

<p>Aqui está a matéria.</p>

<p>A parte do jogo <strong>que pensa</strong> &#8212; as regras, o combate, a colisão, a progressão &#8212; foi construída <strong>sem saber quem desenha a janela</strong>. Ela não conhece o nome de nenhuma biblioteca gráfica. Não existe, dentro dela, uma linha sequer escrita em Qt6 ou em SDL3. Ela decide <em>"este golpe tira tanto"</em>, <em>"este corpo não passa por esta parede"</em>, <em>"este nível abriu"</em> &#8212; e entrega a decisão pronta para quem quer que esteja encarregado de mostrar.</p>

<p>Consequência direta: quando a camada que desenha foi <strong>inteiramente substituída</strong>, a camada que pensa <strong>não precisou ser tocada</strong>. É por isso que a linha mais importante do registro daquele dia é esta, verbatim:</p>

<blockquote><em>"a lógica pura (core/domain, ~590 testes) fica INTACTA"</em></blockquote>

<p>Teste automatizado é um programa pequeno que roda o código de verdade e confere se o resultado bate com o esperado &#8212; se alguém quebra a regra sem perceber, o teste acusa em segundos. Havia <strong>~590</strong> deles cobrindo a camada que pensa. Depois da troca de fundação, os mesmos ~590 continuaram valendo, <strong>sem alteração</strong>, porque nenhum deles jamais soube quem estava desenhando.</p>

<p>E o número que fecha o argumento: <strong>no mesmo commit da troca, a suíte foi de 685 para 752 testes passando</strong>.</p>

<table class="specs">
  <thead>
    <tr><th>Momento</th><th>Testes passando</th></tr>
  </thead>
  <tbody>
    <tr><td>Antes do commit da troca</td><td>685</td></tr>
    <tr><td>Depois do commit da troca</td><td>752</td></tr>
  </tbody>
</table>

<p>Repare no sinal. Trocar a fundação <strong>não derrubou</strong> a contagem: subiu 67. A camada nova entrou com verificação própria em cima, e a antiga continuou de pé. Não é sorte &#8212; é o retorno de ter separado, desde o começo, <strong>o que decide</strong> do <strong>que mostra</strong>. Foi isso que fez a troca custar um dia em vez de um mês.</p>

<h3>O custo que foi aceito</h3>

<p>Nada disto sai de graça. O preço aqui foi <strong>uma segunda porta sem volta no mesmo mês</strong>: duas trocas de fundação em dois dias, com o retrabalho e o risco que isso carrega.</p>

<p>Trocar de fundação é barato quando a casa é nova. Cada semana que passa, cada tela nova, cada sistema novo apoiado na camada de desenho encarece a próxima troca &#8212; de forma silenciosa, sem aviso, até o dia em que "trocar" deixa de ser uma opção de fim de semana e vira um projeto próprio.</p>

<p>A decisão de 22/jun foi tomada <strong>sabendo disso</strong>. Não foi reação: foi a leitura de que aquele era o momento mais barato que existiria, e que empurrar a conta para frente só aumentaria o valor. É o cálculo mais chato da engenharia, e o único que envelhece bem.</p>

<p class="pensa assinatura">by: root@glyfesse</p>
