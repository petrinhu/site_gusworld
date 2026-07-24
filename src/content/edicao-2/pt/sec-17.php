<?php /* Seção de Programação (#2) · o eixo expert - fonte: docs/content/edicao-2-programacao.md (## pt-BR).
   Estrutura canonica (igual #1): intro acessivel -> desculpa furada do root -> transicao // ->
   CRT nano digitando o comando -> parte tecnica com subtopicos <h3> + a tabela das 4 opcoes -> //by:root.
   Vozes: intro em prosa (narrador) + root@glyfesse> (o criador, nunca nomeado).
   D-ACENTOS: prosa acentuada; tokens backtick da fonte (rm, dotnet build) em <code>. Sem em-dash.
   O quadro CRT reusa .crt-scr/.crt-nano; o comando "nano " digita (5ch) e revela o arquivo. */ ?>
<p>Tem uma pergunta que quase ninguém faz sobre um jogo pequeno, feito por uma pessoa só: por que ele roda? Não por que ele existe, isso é fácil de responder. Por que ele roda liso numa máquina que já viu dias melhores, num laptop de sete anos, num aparelho portátil que cabe na mochila. A resposta não está no que você vê na tela. Está numa decisão chata, tomada numa terça-feira, escrita num arquivo de texto que ninguém deveria precisar ler.</p>

<p>Esta é a seção onde a gente abre esse arquivo. Todo número que a máquina precisa cuspir por segundo passou por uma escolha de linguagem, e linguagem, no fim, é o material com que a coisa é erguida. Este número da revista é sobre construção: fundação, concreto, alicerce. Então nada mais justo do que começar pela fundação de tudo, a pergunta seca de qual língua o computador vai falar por baixo do jogo.</p>

<p>Vou avisar de uma vez: daqui a pouco isto vira técnico de verdade. Mas prometo abrir devagar, com a porta destrancada, para quem nunca instalou nada na vida entender por que uma terça-feira de maio de 2026 virou o alicerce de tudo o que veio depois.</p>

<p class="fala"><span class="prompt">root@glyfesse&gt;</span> <span class="dito">Sim, eu montei a revista inteira logado como root, e não, não vou me defender direito. Antes que perguntem: todo o meu código é open source, cada linha da fundação está exposta no repositório, então não há segredo nenhum para proteger nesta máquina. Rodar como superusuário, portanto, não me assusta: quem não esconde nada não tem o que perder. A lógica não fecha, eu sei; abrir o código não impede que um <code>rm</code> distraído leve o concreto todo junto. Mas a viga já está no lugar, o build compilou, e reconstruir a permissão é problema do próximo commit.</span></p>

<p class="pensa nota-leitor">Prezado leitor, daqui por diante é parte técnica real de documentação histórica do código do jogo.</p>
<p class="pensa assinatura">root@glyfesse</p>

<?php /* crt-nano: o comando sendo digitado (CSS steps, zero JS). Decorativo (a prosa
   ja diz tudo) -> aria-hidden. .crt-typed digita "nano " (5ch, reusa a animacao da #1);
   .crt-key revela o arquivo adr-002.md logo depois. Estilos em edicao.css. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">root@glyfesse&gt;~$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">adr-002.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>O problema</h3>

<p>Um jogo tem um orçamento de tempo por quadro. Se você quer sessenta quadros por segundo, cada quadro tem cerca de 16 milissegundos para nascer, viver e morrer, e dentro dele cabe tudo: física, desenho, lógica, som. O alvo aqui nunca foi uma máquina de sonho. Foi o chão real: rodar bem num Steam Deck, numa placa GTX 1050, em laptops de 2017 para frente. Máquina fraca não perdoa desperdício.</p>

<p>Os caminhos quentes, os hot paths, são os pedaços de código que rodam muitas vezes por quadro e por isso mandam na conta. Aqui são três: a resolução de turno, o HMAC do save (a assinatura que prova que ninguém adulterou o arquivo salvo) e a IA. Esses três precisavam caber em menos de metade do orçamento de quadro numa GTX 1050, para sobrar folga para todo o resto.</p>

<p>O jogo nasceu em GDScript. GDScript é interpretado: o código vira bytecode que roda dentro de uma máquina virtual, um tradutor que fica no meio do caminho lendo as instruções uma a uma enquanto o jogo roda. Isso é ótimo para iterar, você troca uma linha e vê o resultado quase na hora, com hot-reload. Mas o tradutor no meio do caminho cobra pedágio, e em máquina fraca o pedágio aparece.</p>

<h3>As 4 opções na mesa</h3>

<table class="specs">
  <thead>
    <tr><th>Opção</th><th>Ganho nos hot paths</th><th>Custo</th></tr>
  </thead>
  <tbody>
    <tr><td>GDScript puro</td><td>1x (linha de base)</td><td>Interpretado; iteração rápida com hot-reload</td></tr>
    <tr><td>GDExtension C++, módulo a módulo</td><td>~10-20x</td><td>Build cross-platform pesado, sem hot-reload, lento para solo</td></tr>
    <tr><td>C# .NET 8 AOT</td><td>~3-5x</td><td>Compilação nativa; iteração via <code>dotnet build</code> em ~5-15s</td></tr>
    <tr><td>Rewrite para Unity IL2CPP</td><td>~3-5x</td><td>Porta sem volta catastrófica</td></tr>
  </tbody>
</table>

<h3>Por que o AOT ganhou</h3>

<p>O detalhe que decidiu tudo: os outros ganhos moravam só nos hot paths. Você acelera três trechos e o resto do jogo continua no mesmo passo. A compilação nativa AOT (ahead-of-time: traduz o código inteiro para linguagem de máquina antes de rodar, em vez de interpretar instrução por instrução em runtime) não escolhe trechos. Ela acelera 100% do código, o quente e o morno e o frio, porque tira o tradutor do meio do caminho de vez.</p>

<p>E a iteração continuava tolerável para quem trabalha sozinho: um <code>dotnet build</code> fecha em segundos, não em minutos de build cross-platform. Somando, .NET 8 ainda é LTS, suporte de longo prazo, o que para uma fundação importa: você não quer que o alicerce saia de linha no ano que vem. Decisão registrada: C# .NET 8 AOT como linguagem primária, GDScript 100% deprecado.</p>

<h3>O custo assumido</h3>

<p>Nada disso saiu de graça. O próprio ADR classificou a escolha como "one-way door massivo", uma porta de sentido único de tamanho grande: reverter não seria mexer numa linha, seria um rewrite paralelo de 2 a 4 semanas de trabalho. Por isso não passou no grito. Foi aprovado com cuidado, granular, em 8 rodadas de decisão, 30 diretrizes canonizadas, em 19 de maio de 2026.</p>

<h3>A sombra</h3>

<p>Fechei o arquivo naquele 19 de maio de 2026 com a expressão "porta sem volta" anotada, e a tratei como uma parede de concreto. Só não sabia, ainda, o quanto uma parede de concreto pode ser testada, nem quão fina "sem volta" às vezes se prova ser.</p>

<p class="pensa assinatura">by: root@glyfesse</p>
