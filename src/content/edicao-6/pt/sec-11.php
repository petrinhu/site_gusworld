<?php
/* HQ · a tirinha (#6) - OBRA DE TERCEIRO, encomendada e paga pelo líder (ED6-PAUTA). Nada de desenho, roteiro ou
   retoque nosso: a arte é intocável, só a MONTAGEM (HTML/CSS) é nossa. A piada é da arte, nenhum texto nosso a explica.

   Arte: public_html/assets/edicao-6/tirinha-edicao-6-vertical.jpg, 600x668 (medido), SÓ a vertical (decisão do líder
   de 07/10/2026: "Só a vertical, como veio"): grade 2x2 mais a faixa do dragão embaixo, sem cortar, recompor nem
   redimensionar. Uma só imagem, sem <picture> (a #6 não tem corte de largura). width/height reais trancam o layout
   antes do carregamento (zero CLS). max-width = tamanho nativo (.tirinha-vertical, edicao.css): é JPEG de mensageiro,
   não se amplia (A15 do brief).

   A tira é CLICÁVEL como na #5: abre https://vidadesuporte.com.br em aba nova (target="_blank" rel="noopener"); o
   aria-label descreve o DESTINO, nunca o comportamento (mesmo padrão da banca, banca.php:131-138). Se isso for
   revisto, revê-se nos DOIS lugares.

   Fonte do texto: docs/content/edicao-6-copies-curtas.md (peças 8 e 9, ## pt-BR, 8ª e 9ª ocorrências). O alt é o da
   peça 9, aspas curvas escapadas como &ldquo;/&rdquo;. Abertura do Gus: PQ11 "Nova e curta", sem reagir ao sprite (T8).
   CRÉDITO ao artista: no Expediente (sec-19). DIREITOS: arte propriedade do líder, licença editorial do site
   (LICENSE §2, todos os direitos reservados). A arte NÃO foi feita com IA; a tira CITA arte do jogo (brasão e sprite do
   Gus), gerada por IA e declarada no rodapé: o Expediente diz isso. Notas de produção do fonte NUNCA entram aqui. */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/hq$</span> <span class="dito">a tirinha, de novo</span></p>
<p class="pensa">mesmo artista da última edição... duas seguidas já contam como série</p>

<figure class="tirinha tirinha-vertical">
  <a class="tirinha-link" href="https://vidadesuporte.com.br" target="_blank" rel="noopener"
     aria-label="Visitar vidadesuporte.com.br">
    <img src="/assets/edicao-6/tirinha-edicao-6-vertical.jpg"
         width="600" height="668"
         loading="lazy" decoding="async"
         alt="Tirinha em quatro quadros, mais uma faixa embaixo. No primeiro, fundo preto com o logotipo pixelado &ldquo;SUPORTE_&rdquo;, com uma caveira no lugar do O. Nos outros três, dois atendentes de camisa branca e crachá conversam ao lado de um notebook aberto; na tela dele, um personagem de cabelo laranja. O que está sentado diante do notebook pergunta: &ldquo;O que deve ser mais difícil na criação de um game?&rdquo;. Em seguida ele mesmo sugere: &ldquo;A criação da história? A elaboração dos personagens? A programação?&rdquo;. O outro, de pé e com uma xícara fumegante, responde: &ldquo;Não conseguir passar da fase que você mesmo criou.&rdquo; Sob o último quadro, o endereço vidadesuporte.com.br. Na faixa escura abaixo, um brasão de dragão em vermelho, sobre uma laje de pedra.">
  </a>
  <figcaption>&rarr; vidadesuporte.com.br</figcaption>
</figure>
