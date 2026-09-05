<?php
/* HQ · a tirinha (#5) — OBRA DE TERCEIRO, encomendada e paga pelo líder. Item
   de board: ED5-PAUTA. ⛔ Nada de desenho, roteiro ou retoque nosso: a arte é
   intocável, só a MONTAGEM (marcação HTML/CSS) é nossa.

   Fonte: resources/arquivo_pessoal_petrus/Tirinha-Petrus-082026-02-{Horizontal,
   quadrada}.png (pasta gitignored — os originais NÃO entram no repo; só a
   cópia em public_html/assets/edicao-5/, byte-a-byte idêntica, sha256 conferido
   na produção desta seção). Duas montagens da MESMA tira, pelo artista:
     - Horizontal (1196×284, 4,2:1): 4 quadros lado a lado.
     - Quadrada   (659×585, 1,13:1): os mesmos 4 quadros em grade 2×2.
   ★ O CORTE É 680px, MEDIDO (não chutado) — e a medição corrigiu uma conta
   errada minha no meio do caminho; registro as duas contas para quem revisar
   depois não repetir o erro.
   MÉTODO: os dois arquivos são o MESMO conjunto de 4 quadros, desenhados
   quase no mesmo tamanho nativo (cada quadro da horizontal mede ≈299×284px;
   cada quadro da quadrada, ≈330×293px — a mesma arte, só REARRANJADA em 1
   fileira ou em grade 2×2). Como cada layout é so uma disposição diferente
   dos MESMOS quadros, "legibilidade" não depende do layout: depende só da
   ESCALA — largura renderizada da coluna ÷ largura ORIGINAL do arquivo
   inteiro (1196px na horizontal, 659px na quadrada). Achar o corte é achar o
   viewport em que a escala da horizontal alcança a escala da quadrada no
   ponto que o líder já validou como legível (390px de viewport).
   MEDIÇÃO REAL (Chromium headless, CDP, perfil descartável — não a estimativa
   de antes de implementar): a .conteudo desta edição, a 390px de viewport,
   renderiza com 348px de largura (não os ~299px assumidos antes de existir
   CSS real — o padding real da folha é um pouco menor). Isso dá pra quadrada
   uma escala de 348÷659 = 0,528 (altura real medida: 309px — mais alta que a
   estimativa inicial de 265px pela mesma razão: coluna real um pouco mais
   larga). Igualar essa escala (0,528) na horizontal exige uma coluna de
   0,528×1196 ≈ 631,6px, e a .conteudo real atinge 632,4px de largura
   exatamente em viewport:680px (medido ponto a ponto, 660→700px, passo de
   5px). Por isso o corte é 680px, e não os 640px de um rascunho anterior
   desta mesma seção (640px dava só 593px de coluna → escala 0,496 na
   horizontal, ~6% abaixo da referência validada — perto, mas MEDIDO como
   insuficiente, não escolhido por já existir em outro lugar da folha).
   Abaixo de 680px: quadrada. A partir de 680px (inclusive): horizontal.

   width/height em CADA <source> e no <img> de fallback = as dimensões REAIS
   dos dois arquivos (não escaladas) — trava o aspect-ratio antes do arquivo
   carregar, então a troca de fonte pela media query não empurra o layout
   (zero CLS nas duas pontas).

   A tira é CLICÁVEL: ordem do líder, verbatim, "Apenas devemos deixar ela
   clicável para ir ao site vidadesuporte.com.br" — e, depois, "o clique abre
   em aba separada, não sai do nosso site". Os atributos são os MESMOS que a
   banca (src/templates/banca.php, linhas ~131-138, decisão do líder de
   2026-07-25) já usa pro card de cada edição: target="_blank" rel="noopener"
   (o noopener é obrigatório com _blank: sem ele a aba nova ganha acesso à
   janela de origem). ⚠️ Nenhum "noreferrer" a mais — coerência com o padrão
   publicado pesa mais que preferência nova.
   ⚠️ A banca NÃO avisa o leitor de que o link abre em nova aba: o aria-label
   dela descreve o DESTINO ("Ler a edição: TÍTULO"), nunca o comportamento.
   Aqui é igual, de propósito — herdado, não esquecido: o aria-label abaixo só
   diz para onde o link leva. Se um dia isso for revisto (ex.: acrescentar um
   aviso de "abre em nova aba" por acessibilidade), tem que ser revisto nos
   DOIS lugares ao mesmo tempo — a banca e esta seção —, nunca só aqui.

   CRÉDITO AO ARTISTA: o líder decidiu que o nome André Farias vai no
   EXPEDIENTE (sec-19, que ainda não existe/não é desta ordem de serviço),
   LINKADO ao perfil dele no X, `https://x.com/Andre_Suporte` — fato, não
   inferência minha: verbatim do líder ("andre farias deve linkar ao perfil
   X dele"), registrado em docs/editorial/BRIEFS-EDICAO-5.md linhas 823-825
   (fonte primária: docs/editorial/PAUTA-EDICAO-5.md linha 548). Esta seção
   NÃO cita o nome dele nem esse link — só o link clicável para
   vidadesuporte.com.br, que foi o único pedido do líder para esta peça (são
   DOIS links diferentes, nenhum substitui o outro). Quem montar a sec-19
   precisa abrir a fonte acima, não só este comentário.
   ⚠️ GATE DE PUBLICAÇÃO AINDA ABERTO (não é desta seção resolver, só
   registrar): docs/editorial/PAUTA-EDICAO-5.md linha 550 (item 3) lista
   "consentimento do profissional para o nome ir a público" como pendência
   com dono = o líder, e a linha 690 (D7) trava a publicação da seção 11
   nos QUATRO itens (crédito, licença, consentimento, declaração de IA)
   juntos. Crédito, licença e declaração de IA já aparecem fechados nas
   "Decisões do líder de 04/09/2026" (BRIEFS-EDICAO-5.md linhas 806-825); o
   consentimento não aparece fechado em nenhum documento que eu tenha
   encontrado. Não bloqueei a montagem por causa disso (o líder pediu o
   link agora, nesta sessão), mas quem publicar de fato precisa confirmar
   esse item com ele antes do deploy.

   DIREITOS (cabeçalho, p/ o Expediente/QA): a arte é PROPRIEDADE DO LÍDER, que
   pagou pela encomenda; licença = a mesma do site para conteúdo editorial
   (LICENSE §2, "Conteúdo editorial da revista — todos os direitos
   reservados a petrinhu"). NÃO houve uso de IA na produção da arte (confirmado
   pelo líder na data desta produção) — a declaração de AI-disclosure do
   rodapé do site NÃO muda por causa desta peça (ela já cobre o que É e o que
   NÃO é feito com IA por categoria; esta arte entra na categoria "não-IA",
   sem exigir texto novo no rodapé).

   Estilos: edicao.css, bloco "§11 (edição #5) · a TIRINHA ENCOMENDADA". Voz de
   abertura: Gus, formato pós-#3 (`gus@glyfesse:~/hq$`). ⚠️ COPY PROPOSTA,
   PENDENTE DE APROVAÇÃO DO LÍDER — toda fala do Gus vai a ele na leitura
   final; não explica a piada da tira (a piada é da arte, não nossa). */
?>
<p class="fala"><span class="prompt">gus@glyfesse:~/hq$</span> <span class="dito">a tirinha desta edição</span></p>
<p class="pensa">essa aqui não fui eu que desenhei...</p>

<figure class="tirinha">
  <a class="tirinha-link" href="https://vidadesuporte.com.br" target="_blank" rel="noopener"
     aria-label="Visitar vidadesuporte.com.br">
    <picture>
      <source media="(min-width:680px)"
              srcset="/assets/edicao-5/Tirinha-Petrus-082026-02-Horizontal.png"
              width="1196" height="284">
      <img src="/assets/edicao-5/Tirinha-Petrus-082026-02-quadrada.png"
           width="659" height="585"
           loading="lazy" decoding="async"
           alt="Tirinha em quatro quadros. No primeiro, fundo preto com o logotipo pixelado &ldquo;SUPORTE_&rdquo;, uma caveira no lugar do O. Nos outros três, dois atendentes de camisa branca e crachá conversam ao lado de um notebook aberto: na tela dele, um personagem de cabelo laranja. Um deles pergunta que perigos obscuros se escondem na Selve Sombria Tecnorgânica; o outro (que troca de nome no crachá a cada quadro: Thomas, depois Alva, depois Edison) responde só &ldquo;raízes quadradas&rdquo;; o primeiro reage que isso não tem nada de obscuro, e o segundo devolve que ele nunca viu o boletim de matemática dele. No rodapé da arte, o endereço vidadesuporte.com.br.">
    </picture>
  </a>
  <figcaption>&rarr; vidadesuporte.com.br</figcaption>
</figure>
