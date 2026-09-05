<?php
/* Pôster central (#5) · PLACEHOLDER, por ordem do líder (04/09/2026, verbatim:
   "faça tudo, deixe as partes faltantes com placeholder para quando eu
   entregar"). Molde herdado de edicao-4/pt/sec-13.php: moldura, marcas de
   corte, cruzes de registro, .chapa (SEM o modificador .retrato, porque não
   há retrato ainda), filete, ficha e vinco.

   ⚠️ O QUE FALTA, exatamente, para o líder entregar (docs/editorial/
   BRIEFS-EDICAO-5.md, Apêndice A2, D5/D6): DOIS PRINTS do achado do Gus
   Dragon de 07/08/2026 (o playtest do clipping). Um dos dois vira o `frame`
   da capa da edição, o outro vira este Pôster - qual vai para onde, o líder
   escolhe no gate de capa, vendo os dois. Até lá:
     - SEM QUALQUER <img>: nenhum src apontando para arquivo inexistente
       (quebraria a página). O lugar da imagem é um bloco vazio, comentado.
     - Faltam os DOIS `alt` (pt e en) descrevendo só a FIGURA (o que a tela
       mostra: o inimigo em ronda, o bloco, a cidade - zero lore, zero função
       de jogo não anunciada), que só podem ser escritos depois de ver o
       print e passar pelo GATE-SPOILER.
     - Falta a legenda/crédito definitivos (título do pôster, ficha de
       dimensão medida do arquivo real).
     - Se qualquer um dos dois prints reprovar na higiene (L-02: abrir e
       olhar antes de versionar, zero desktop/barra/terminal/tela pessoal) ou
       no GATE-SPOILER, a decisão volta ao líder - não vira "usa o outro" por
       conta própria (regra explícita da pauta, D5/D6).
     - Existem DUAS alternativas de contingência já desenhadas na pauta, se
       os dois prints reprovarem: (A) o identificador do commit da fundação
       C# composto em pixel na chapa ("40 caracteres, nenhum arquivo"); (C)
       chapa vazia com a legenda "retrato de um arquivo que não existe mais".
       Nenhuma das duas foi escolhida aqui - é decisão do líder no gate de
       capa, não desta montagem.

   A seção RENDERIZA sem erro neste estado: nenhum <img>, nenhum atributo
   src, nada quebrado. O que existe é só a moldura vazia + o próprio
   comentário acima, para quem for completar não perder o que falta. */
?>
<div class="enc">
  <div class="quadro">
    <span class="registro topo" aria-hidden="true"></span>
    <span class="registro base" aria-hidden="true"></span>
    <span class="corte tl" aria-hidden="true"></span>
    <span class="corte tr" aria-hidden="true"></span>
    <span class="corte bl" aria-hidden="true"></span>
    <span class="corte br" aria-hidden="true"></span>

    <p class="kicker">encarte destacável</p>

    <div class="cabeca">
      <h3 class="titulo">Pôster<br>pendente</h3>
      <span class="tarja">aguardando o material de 07/08</span>
    </div>

    <div class="filete" aria-hidden="true"></div>

    <div class="chapa">
      <?php /* PLACEHOLDER: nenhum <img> aqui de propósito (ver comentário de
         cabeçalho). Quando o líder entregar um dos dois prints de 07/08:
           1. copiar sem alteração para public_html/assets/edicao-5/ com
              sha256 conferido idêntico entre origem e cópia (mesmo processo
              do retrato-bertoldo.png da #4);
           2. acrescentar .chapa.retrato (mesmo modificador da #4) e o <img>
              com width/height reais, loading="lazy", decoding="async";
           3. escrever os DOIS alt (pt/en) só depois do GATE-SPOILER aprovar
              o que a figura mostra;
           4. atualizar a .ficha abaixo com a dimensão real medida. */ ?>
    </div>

    <p class="ficha">
      <span><b>pendente de material</b></span>
      <span class="barra" aria-hidden="true">
        <i class="k"></i><i class="c"></i><i class="m"></i><i class="g"></i><i class="w"></i>
      </span>
    </p>
  </div>

  <p class="credito">
    <span>Glyfesse nº 5 &middot; pôster central</span>
    <span>destaque pela dobra</span>
  </p>

  <span class="vinco" aria-hidden="true"></span>
</div>
