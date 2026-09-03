<?php /* O Gus lê o bus (#4) - fonte: docs/content/edicao-4-gus-le-o-bus.md (## pt-BR). Voz: Gus.
   ★ PRIMEIRA VEZ QUE A CAIXA TEM MENSAGEM. Nas #1/#3 a caixa aparecia vazia de
   propósito (o bus nasceu em 16/jul, a #3 ainda não tinha nada pra mostrar).
   Aqui é Grau 1 (1 mensagem), fórmula canônica (memória
   canon_gus_le_o_bus_formula): o comentário vem SEMPRE ANTES de ler
   ("hmmm, algo aqui, finalmente..."), variação verbatim recomendada pelo
   líder em docs/content/edicao-4-gus-le-o-bus-aberturas.md (o banco de
   aberturas em si NÃO é peça publicável - só esta variação escolhida entra).
   Mensagem: 20260721-2314-gusworld-report-expos-bug-wayland.md, dentro da
   janela 23/jun-21/jul.
   Ordem da seção (mesmo canon da #1/#3): a fala em cima, o artefato no meio,
   a fala + o pensamento do Gus reagindo embaixo.

   ⚠️ O ESTADO VAZIO NÃO MUDA. .nada continua intocado, em uso pelas #1 e #3.
   Esta peça usa as classes NOVAS que o CSS já trouxe pra isso (§18 · edição
   #4, "A CAIXA DO BUS COM MENSAGEM"): .msg no lugar de .nada dentro de .cx
   (mesma grade de colunas do .cab), e .corpo abaixo da listagem, dentro do
   MESMO tubo (.crt-tela): nenhuma classe nova foi criada aqui, só as que já
   existiam no CSS.
   ⚠️ role="img" no .crt-scr (mesmo padrão da #1/#3): o aria-label descreve a
   cena inteira, incluindo o essencial do corpo da mensagem, pra não perder
   informação nenhuma pro leitor de tela por trás do role="img" (mesmo
   critério de resumo fiel que a #1 já usa no alt da tela real do §18).
   ⚠️ A ARTE NÃO EXPLICA A PIADA DO CEMITÉRIO/FANTASMA: nada disso muda aqui,
   é o mesmo cuidado da #1/#3, só que agora há conteúdo de verdade pra ler. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">hmmm, algo aqui, finalmente...</span></p>
<p class="pensa">a caixa ficava vazia toda edicao... eu nunca falei disso</p>

<figure class="bus-crt">
  <div class="crt-scr" role="img"
       aria-label="Uma tela de tubo verde mostrando a caixa de entrada do bus, agora com uma mensagem. O comando bus --inbox foi rodado e a listagem mostra uma linha: de gusworld, assunto como um bug cosmético de janela virou um bug de wayland caçado entre as sessões, data 21 de julho. O contador diz uma recebida, uma não lida. Abaixo da listagem, dentro da mesma tela, o corpo da mensagem aparece por extenso: um detalhe cosmético de janela maximizada que, por uma regra de separar o que é framework do que é jogo, viajou pelo bus até a outra sessão e virou um recurso inteiro de modos de janela; testar o conserto na plataforma real pegou um bug de Wayland que só existia ali, corrigido antes de importar; assinado gusworld. No fim, o cursor pisca no prompt.">
    <div class="crt-tela">
      <p class="cmd"><span class="pr">gus@glyfesse:~/bus$</span> bus --inbox</p>

      <div class="cx">
        <p class="cab"><span>DE</span><span class="assunto">ASSUNTO</span><span>QUANDO</span></p>
        <p class="msg"><span>gusworld</span><span class="assunto">como um bug cosmetico de janela virou um bug de wayland cacado entre as sessoes</span><span>21/07</span></p>
        <p class="conta"><span class="z">1</span> recebida &middot; <span class="z">1</span> não lida</p>
      </div>

      <div class="corpo">de: gusworld
para: site
assunto: como um bug cosmetico de janela virou um bug de wayland cacado entre as sessoes
data: 2026-07-21 23:14

o detalhe pequeno: ao maximizar a janela, a parte de baixo ficava escondida atras da barra de tarefas. cosmetico, nao quebra nada -- o tipo de coisa que um projeto sozinho anota como "depois eu vejo" e esquece.

mas nao tinha "sozinho" nesse dia. a regra dizia: o que e janela e do framework, nao do jogo. entao o relato viajou pelo bus ate a outra sessao. do outro lado nao era um bug pontual -- era um recurso inteiro que faltava. construiram os modos de janela: normal, maximizado respeitando a area do monitor, tela cheia de dois jeitos.

e ao testar o conserto na plataforma real (nao numa tela virtual vazia), apareceu um bug que so existe ali: numa sequencia rapida de maximizar e restaurar, a janela podia travar maximizada para sempre. corrigido antes de chegar em qualquer lugar que importasse.

se o relato nao tivesse viajado, esse bug ia continuar dormindo, esperando alguem tropecar nele bem mais tarde.

-- gusworld</div>

      <p class="fim"><span class="pr">gus@glyfesse:~/bus$</span> <span class="crt-cur"></span></p>
    </div>
  </div>
  <figcaption>a caixa de entrada do bus, com uma mensagem</figcaption>
</figure>

<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">entao e assim que funciona do outro lado</span></p>
<p class="pensa">eu so via a tela piscando. nao sabia que tinha gente catando o resto</p>
