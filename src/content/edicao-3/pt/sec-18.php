<?php /* O Gus lê o bus (#3) - fonte: docs/content/edicao-3-vazios.md §18 (## pt-BR). Voz: Gus.
   ★★ A frase do // é do CRIADOR e vai VERBATIM (registrada na PAUTA-EDICAO-3, §Seção 18):
   não se reescreve, não se parafraseia, não se troca uma palavra.
   ⚠️ O texto NÃO explica a piada, e não pode: "bus" tem dois sentidos (o cano de
   mensagens e o ônibus), e o ônibus cheio de fantasmas está indo para o Cemitério das
   Ideias Mortas, que nesta mesma edição está cheio, com três lápides. O leitor liga
   sozinho. Vazio honesto: em junho de 2026 o cano ainda não existia.
   ★ A ARTE (a tela de tubo com o bus vazio) foi construída: estilos em edicao.css,
   bloco "§18 · A CAIXA DO BUS VAZIA". Ela é MOLDURA, não copy: as três frases acima
   continuam intocadas, e a tela não acrescenta fala nenhuma do Gus — só o vocabulário
   de terminal (o comando, o cabeçalho de coluna, o contador em zero, o cursor).
   Ordem da seção, que é o canon da própria seção (mock 15): a fala em cima, o
   artefato no meio, o // embaixo.
   ⛔ A ARTE TAMBÉM NÃO EXPLICA A PIADA: nada de fantasma, nada de ônibus. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/bus$</span> <span class="dito">o gus lê o bus</span></p>

<p>Nenhuma mensagem nesta edição. Abri, conferi duas vezes, não tem nada pra ler.</p>

<?php /* A TELA. O comando aparece DUAS VEZES com a mesma saída: é o "conferi duas
   vezes" do parágrafo virando imagem. Repetir É a peça — não enxugar.
   role="img" + aria-label: para o leitor de tela a peça é UMA imagem descrita, não
   uma sopa de linhas de terminal (mesmo padrão da tirinha da §11). */ ?>
<figure class="bus-crt">
  <div class="crt-scr" role="img"
       aria-label="Uma tela de tubo verde mostrando a caixa de entrada do bus. O comando foi rodado duas vezes e a listagem voltou sem nenhuma linha: só o cabeçalho das colunas, o vão vazio e o contador em zero mensagens. No fim, o cursor pisca no prompt.">
    <div class="crt-tela">
      <p class="cmd"><span class="pr">gus@glyfesse:~/bus$</span> bus --inbox</p>

      <div class="cx">
        <p class="cab"><span>DE</span><span class="assunto">ASSUNTO</span><span>QUANDO</span></p>
        <p class="nada">(nenhuma mensagem)</p>
        <p class="conta"><span class="z">0</span> recebidas &middot; <span class="z">0</span> não lidas</p>
      </div>

      <p class="cmd de-novo"><span class="pr">gus@glyfesse:~/bus$</span> bus --inbox</p>
      <p class="conta"><span class="z">0</span> recebidas &middot; <span class="z">0</span> não lidas</p>

      <p class="fim"><span class="pr">gus@glyfesse:~/bus$</span> <span class="crt-cur"></span></p>
    </div>
  </div>
  <figcaption>a caixa de entrada do bus, vazia</figcaption>
</figure>

<p class="pensa">bus está estranhamente vazio... ou repleto de fantasmas rumo ao cemitério?</p>
