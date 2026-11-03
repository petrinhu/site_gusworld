<?php /* Seção de Programação (#7) · o eixo expert - fonte: docs/content/edicao-7-programacao.md (## pt-BR).
   Molde à mão (PLANO-CONVERSOR 2.5): estrutura da #6 (intro, desculpa no terminal, transição //, nano, subtópicos <h3>
   e tabela, //by:), sem classe nova. Transcrição fiel: o texto NÃO foi alterado. A linha do marcador do brinquedo é um
   marcador de montagem, foi trocada pelo brinquedo do portão no M6.
   Notas de produção do fonte NUNCA entram aqui. */ ?>
<p>Um portão é um programa que confere o trabalho antes de ele ser aceito. Ele segue uma regra escrita, por exemplo "só pode usar bibliotecas desta lista (conjuntos de código pronto que outros escreveram)", e responde de um de dois jeitos: "tudo certo" ou "reprovado". A pergunta que quase ninguém faz é outra: o portão olhou para alguma coisa?</p>

<p>Em 21 de agosto de 2026, a sessão de IA que trabalha no GlintFX, a biblioteca, montou um portão que disse "tudo certo" depois de olhar zero arquivos. A reportagem de capa conta por que o projeto estava recomeçando. Esta seção fica com a conferência.</p>

<?php /* a DESCULPA, em bloco de terminal. Voz de gus@glyfesse: o leitor lê. Por isso não leva aria-hidden. */ ?>
<div class="crt-scr desculpa">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~$</span> whoami</p>
    <p>gus</p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># o portao e velho e nunca quebrou. entao ele funciona</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># eu nao confiro o verde, ele jaa disse que esta tudo certo</span></p>
    <p><span class="pr">gus@glyfesse:~$</span> <span class="dim"># ...tudo bem, nunca quebrou porque nunca olhou para nada</span></p>
  </div>
</div>

<p class="pensa longo nota-leitor">Prezado leitor, daqui em diante é a parte técnica: o portão, a conta que ele devia ter feito e o que a conta mostrou</p>
<p class="pensa assinatura">gus@glyfesse</p>

<?php /* crt-nano: o comando sendo DIGITADO ao entrar na view (CSS steps, o JS só arma). Decorativo (o texto já diz tudo) -> aria-hidden. */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">gus@glyfesse:~/programacao$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key">portao-varredura-vazia.md</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>Um "tudo certo" sem nenhum arquivo</h3>

<p>O portão de dependência (o que confere quais códigos de terceiros o projeto usa) foi escrito com uma regra de lista: só passa o que está na lista do permitido, e o resto é acusado. Ele passou nos dois controles de autoteste (testes que conferem se o próprio portão funciona) exigidos. O primeiro planta uma violação e prova que ela é acusada. O segundo prova que uma entrada limpa sai sem erro. Foram 35 casos e nenhuma falha.</p>

<p>Depois, a sessão montou um repositório de teste com quatro ligações proibidas óbvias (usos de código de fora que a regra veta) e rodou o portão contra ele, com os arquivos ainda fora do controle de versão (o registro que guarda cada mudança no código). A saída foi esta:</p>

<div class="crt-scr">
  <div class="crt-tela">
    <p>0 arquivos de compilação, 0 de código, 0 fluxos varridos</p>
    <p>resumo: proibido=0</p>
    <p>OK -- nenhuma ligacao fora da lista permitida.</p>
    <p>saída: 0</p>
  </div>
</div>

<p>Depois que os arquivos entraram no controle de versão, o mesmo portão acusou as quatro ligações e saiu com erro. No registro, a sessão escreveu: "A detecção funciona. O buraco é outro."</p>

<p>O portão perguntava ao controle de versão quais arquivos existiam. Se a resposta vinha vazia, por caminho errado, por repositório em estado estranho ou por comando que falhava sem avisar, o portão não varria nada, não achava nada e concluía que estava tudo certo.</p>

<p>No registro de 21 de agosto, a sessão do GlintFX resumiu o defeito numa frase:</p>

<blockquote>
  <p>"Olhei e está limpo" e "não olhei nada" produzem a mesma saída verde.</p>
</blockquote>

<p>Os dois controles não pegavam o caso porque ambos rodavam sobre arquivos que existiam. Nenhum exercitava a entrada vazia.</p>

<p>A tabela põe lado a lado o que o portão disse e o que ele tinha olhado. Além do portão de dependência, a revisão feita em seguida, no mesmo 21 de agosto, achou o mesmo defeito em mais sete portões do repositório:</p>

<table class="specs">
  <thead>
    <tr><th>O que o portão disse</th><th>O que ele tinha olhado</th></tr>
  </thead>
  <tbody>
    <tr><td>"OK -- nenhuma ligacao fora da lista permitida" (portão de dependência, repositório de teste)</td><td>0 arquivos de compilação, 0 de código, 0 fluxos varridos</td></tr>
    <tr><td>"40 contadores dentro do teto" (portão que vigia o tamanho da dependência, repositório vazio)</td><td>Nada medido</td></tr>
    <tr><td>Nada: o portão só rodava quando alguém lembrava de chamá-lo à mão</td><td>Nada, porque ele não rodava em nenhum fluxo</td></tr>
  </tbody>
</table>

<p>Todos os portões achados foram consertados, com um teste de varredura vazia (um caso em que o portão não encontra nenhum arquivo para conferir) gravado no repositório.</p>

<?php /* O brinquedo do portão de bolso (M6). Sem JS, o bloco pb-semjs mostra as três respostas prontas, com o texto aprovado do núcleo. Com JS, a camada esconde esse bloco e liga o pb-comjs. Os dois scripts existem só nesta edição: a #5 e a #6 não carregam nada disso. */ ?>
<div class="portao-bolso" id="portao-bolso" data-idioma="pt">
  <h4 class="pb-titulo">Portão de bolso</h4>
  <div class="crt-scr">
    <div class="crt-tela">
      <div class="pb-semjs">
        <div class="pb-pasta">
          <p class="pb-nome">pasta cheia</p>
          <p class="pb-pronta">Reprovado. Achei um problema nesta pasta.</p>
          <p class="pb-pronta-cont">encontrados=3 analisados=3 falharam=1</p>
        </div>
        <div class="pb-pasta">
          <p class="pb-nome">pasta limpa</p>
          <p class="pb-pronta">Tudo certo. Olhei cada arquivo da pasta e nenhum tem problema.</p>
          <p class="pb-pronta-cont">encontrados=3 analisados=3 falharam=0</p>
        </div>
        <div class="pb-pasta">
          <p class="pb-nome">pasta vazia</p>
          <p class="pb-pronta">Não disse tudo certo. A pasta está vazia: não olhei nada, e portão que não olha nada não aprova.</p>
          <p class="pb-pronta-cont">encontrados=0 analisados=0 falharam=0</p>
        </div>
      </div>
      <div class="pb-comjs" hidden>
        <p class="pb-instrucao" id="pb-instrucao-pt">Escolha uma pasta e aperte conferir.</p>
        <div class="pb-pastas" role="group" aria-labelledby="pb-instrucao-pt">
          <button type="button" data-pasta="cheia" aria-pressed="false">pasta cheia</button>
          <button type="button" data-pasta="limpa" aria-pressed="false">pasta limpa</button>
          <button type="button" data-pasta="vazia" aria-pressed="false">pasta vazia</button>
        </div>
        <button type="button" class="pb-conferir" disabled>conferir</button>
        <div class="pb-saida" aria-live="polite">
          <p class="pb-res"></p>
          <p class="pb-cont"></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /* echo em vez do atalho de saída curta: o conferir.php não lê o src com o atalho. O HTML gerado é o mesmo. */ ?>
<script src="<?php echo h(asset('/assets/js/portao-bolso-core.js')); ?>" defer></script>
<script src="<?php echo h(asset('/assets/js/portao-bolso.js')); ?>" defer></script>

<h3>O terceiro controle: varredura vazia não é sucesso</h3>

<p>O conserto tem três partes. A primeira: varredura vazia não é sucesso. Zero arquivos enumerados, ou um número implausivelmente baixo, sai com erro ou grita de um jeito inconfundível, e nunca imprime a linha de tudo certo. A segunda é um terceiro controle de autoteste, que prova que, com a varredura vazia, o portão não diz que está tudo certo. Sem ele, o conserto não está provado, pela mesma lógica que torna obrigatório o controle positivo. A terceira: medir se a trava antes do commit (um registro de mudança no código) está coberta, e escrever no próprio arquivo qualquer caso que fique invisível ao portão. O registro é direto: "Limitação declarada é aceitável; limitação silenciosa não."</p>

<p>No mesmo registro, a lição cabe numa frase:</p>

<blockquote>
  <p>"Portão que passou nos próprios testes não está verificado: os testes dele cobrem os casos que quem o escreveu imaginou."</p>
</blockquote>

<p>O que pegou o defeito foi rodar o portão contra uma entrada que ninguém tinha previsto: um repositório onde não havia nada para achar.</p>

<h3>A regra de paridade, de 2 de setembro</h3>

<p>Em 2 de setembro de 2026, o root fixou uma regra: "O comportamento deve ser igual em qualquer OS para todas as ondas/fatias entregues" (OS é o sistema operacional; ondas e fatias são blocos de trabalho entregues de uma vez). O alcance veio no mesmo dia: igual e provado em cada sistema onde a fatia existe.</p>

<p>Antes disso, o projeto entregava primeiro no Linux e deixava o Windows para o fim, e cada entrega era declarada pronta assim mesmo. Pela regra nova, a entrega do Linux e a do Windows deixaram de ser duas tarefas em momentos diferentes e viraram uma entrega só.</p>

<p>A regra de paridade é um trecho novo da lei dos sistemas operacionais, no arquivo de leis do GlintFX, que existe desde 21 de agosto. A regra obrigou a auditoria que veio a seguir.</p>

<p>O root recusou uma exceção que dois agentes técnicos (sessões de IA com papel técnico) tinham recomendado: a peça que descobre teclado e mouse não tem cara pública (não aparece para quem usa o programa), e eles propuseram que, por isso, ela fechasse sozinha. Segundo o registro, a opção escolhida foi uma regra uniforme, sem julgamento caso a caso, porque julgamento é onde se erra.</p>

<h3>A auditoria: 45 itens e 19 reabertos</h3>

<p>Foram 45 itens dados como concluídos, verificados um a um com evidência. Dezenove foram reabertos. Três achados pesaram mais:</p>

<ul>
  <li>A biblioteca chega ao Windows sem camada de plataforma nenhuma (o trecho do código que fala com cada sistema). Até os testes que não dependem de sistema estavam trancados atrás de uma condição de Linux.</li>
  <li>Nenhuma verificação interna do código tinha rodado no compilador da Microsoft (o programa que transforma o código em algo que o computador executa), porque o Windows só era compilado no modo de entrega final (a versão otimizada que vai para quem usa). O registro resume: "metade da rede de segurança do código nunca existiu lá."</li>
  <li>Onze portões de qualidade nunca rodaram no Windows: licença, dependência zero, violação de camada e colisão de nome público (dependência zero: sem código de terceiros; violação de camada: uma parte do código usando outra que não deveria; colisão de nome público: dois nomes iguais visíveis de fora).</li>
</ul>

<p>Dois desses portões já foram consertados e provados num servidor de testes (um computador que roda o código e confere o resultado), nos cinco sistemas.</p>

<p>O registro de 3 de setembro lista cinco itens e diz que quatro deles são a mesma coisa em roupas diferentes:</p>

<blockquote>
  <p>"uma verificação que parecia estar funcionando e não estava olhando nada."</p>
</blockquote>

<p>Esta seção fica com a conta: um portão que olhou zero arquivos disse que estava tudo certo, e a auditoria que veio depois reabriu 19 de 45 itens dados como prontos.</p>

<p>Quem quiser o caso técnico inteiro, com os registros, os portões e os números, pode pedir pelo contato no rodapé do site. Este texto é a entrada, não o caso completo.</p>

<p class="pensa assinatura">by: gus@glyfesse</p>
