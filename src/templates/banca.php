<?php
declare(strict_types=1);
/**
 * src/templates/banca.php — a BANCA (home): a fileira de capas + os ganchos W6.
 *
 * Recebe de render-banca.php: $ctx (chrome, modo 'banca'), $t (i18n), $capas
 * (lista das edições PUBLICADAS já com idade/URL/frame), $idioma.
 *
 * Estrutura (IA-WIREFRAME §3.1, mock 10): masthead → main[ lede → ganchos W6
 * (hero/press-start/chamadas/linha do tempo, em SCAFFOLD) → §banca = a fileira
 * de capas (data-driven, o coração) ] → rodapé.
 *
 * Herda a MESMA mesa/folha do template de edição (edicao.css): .bancada + a
 * .pagina.folha centrada no desktop. A home é a folha mais NOVA (--idade:0); as
 * capas dentro dela amarelam cada uma pela sua idade real (idade_folha()).
 *
 * Os interativos (quadradinho, PRESS START, scrubber, chamadas) NÃO são
 * implementados aqui — são itens W6. Ficam como ganchos/scaffold explícitos.
 */

$banca   = $t['banca'];
$ganchos = $banca['ganchos'];

/* ★ O CARD SOCIAL DA BANCA (líder, 2026-07-25).
   O post de lançamento linka a BANCA (a porta de entrada, onde se vê a estante),
   não a página da edição. Só que o X guarda UM card por ENDEREÇO e atualiza os
   posts JÁ PUBLICADOS: com um endereço só, todo post antigo passaria a exibir o
   card da edição mais nova e o histórico do canal se reescreveria a cada edição.
   Por isso a banca aceita `?ed=N`: cada post ganha um endereço próprio e o card
   dele congela na edição DELE. O parâmetro NÃO muda nada da página: nem uma
   linha do conteúdo, nem uma edição a mais ou a menos na estante; ele só escolhe
   as meta tags. A regra de resolução (e o saneamento do valor cru, que nunca é
   ecoado no HTML) vive em og_card_banca(), pura e testada. */
$og_banca = og_card_banca($capas, $_GET['ed'] ?? null);

/* ⚠️ CANONICAL SEM O `?ed=`: `url_banca()` devolve a URL limpa da home, e é ela
   que vai no <link rel=canonical> (e no og:url). As variantes `?ed=2`, `?ed=3` …
   são o MESMO documento visto pelo buscador, e apontá-las todas para a home
   evita fragmentar o SEO em N endereços quase-duplicados. O card por post é
   assunto do scraper social, não do índice de busca. */
$head = [
    'lang'      => (string) $t['html_lang'],
    'og_locale' => (string) $t['og_locale'],
    'titulo'    => 'GLYFESSE · ' . $banca['secao_titulo'],
    'og_title'  => 'Glyfesse',
    'desc'      => (string) $banca['lede'],
    'canonical' => (string) $ctx['url_banca'],
    'hreflang'  => $ctx['hreflang'],
];
if ($og_banca !== null) {
    $head['og_image'] = $og_banca;
}
require __DIR__ . '/../includes/head.php';
?>
<body data-material="papel">

<a class="skip" href="#banca"><?= h((string) $banca['skip']) ?></a>

<?php /* a BANCADA do maker: peças decorativas nas guteiras (só desktop, via CSS).
   Herdada IGUAL à da edição — a home é a mesma revista na mesma mesa. */ ?>
<div class="bancada" aria-hidden="true">
  <div class="pc bp p-bp1"><span class="cota"></span></div>
  <div class="pc pcb p-pcb1"></div>
  <div class="pc regua p-regua1"></div>
  <div class="pc bp p-bp2"><span class="cota"></span></div>
  <div class="pc pcb p-pcb2"></div>
  <div class="pc lapis p-lapis"><span class="corpo"></span><span class="ferrule"></span><span class="ponta"></span></div>
  <div class="pc chip p-chip1"><span class="corpo"></span></div>
  <div class="pc chip p-chip2"><span class="corpo"></span></div>
</div>

<div class="pagina folha" style="--idade:0">

<?php require __DIR__ . '/../includes/masthead.php'; ?>

<main>
<div class="banca-corpo">

  <?php /* lede da home (W5 placeholder — copy final co-decidida com o líder).
     Também é a PROPOSTA DE VALOR curta do hero (padrão de homepage: headline +
     subheadline enxuta acima da dobra — prismic.io/blog/website-hero-section). */ ?>
  <p class="banca-lede"><?= h((string) $banca['lede']) ?></p>

  <?php /* ══ A BANCA · a ESTANTE de capas, o coração da home (data-driven de $capas) ══
     Decisão do líder (2026-07-21): as EDIÇÕES são as estrelas, e ficam ANTES dos
     brinquedos, no topo da home. Os brinquedos (quadradinho, PRESS START, Glyfa,
     álbum, cupom, linha do tempo) vêm depois. A POSIÇÃO não muda.

     ★ O DESENHO É UM SÓ (restaurado 2026-07-25, ordem do líder): todas as capas
     recebem o MESMO tratamento: mesmo friso, mesma manchete, mesma sombra. O que
     as diferencia é só o ENVELHECIMENTO do papel (--idade, mais velha = mais
     amarela) e o selo "nova" na mais recente. Nada de card em destaque, nada de
     botão de CTA: o CARD INTEIRO é o link (alvo grande, com aria-label próprio).
     A altura é NATURAL: cada capa mede o próprio conteúdo e todas penduram do
     topo (align-items:start), como revistas encostadas numa estante.

     O número de COLUNAS vem de prateleira_colunas() (helper puro, testado) e é
     escolhido pra fileira fechar CHEIA: 2 edições = 2 colunas, nada de capa
     solta num buraco de grid. O grid quebra as fileiras sozinho; não há wrapper
     de fileira. Escala sozinha: publicar a próxima edição é +1 no $edicoes.
     Landmark = <section> (não <nav>): corpo editorial, não menu (§7.3). Só
     PUBLICADAS entram (o guard mora no helper). */ ?>
  <section class="banca" id="banca" aria-labelledby="banca-h2">
    <div class="banca-tit">
      <h2 class="secao-nome" id="banca-h2"><?= h((string) $banca['secao_titulo']) ?></h2>
      <span class="conta"><?= count($capas) ?> <?= h((string) (count($capas) === 1 ? $banca['secao_meta_um'] : $banca['secao_meta'])) ?></span>
    </div>

    <?php $colunas = prateleira_colunas(count($capas)); // helper puro (testado) ?>
    <div class="prateleira" style="--cols:<?= (int) $colunas ?>">
      <?php foreach ($capas as $i => $c): ?>
      <?php
        // dimensões reais do frame (width/height explícitos = zero CLS)
        $frame_fs  = $c['frame'] !== null ? __DIR__ . '/../../public_html' . $c['frame'] : null;
        $frame_dim = ($frame_fs !== null && is_file($frame_fs)) ? getimagesize($frame_fs) : false;
        // ★ A CAPA da edição na estante (líder, 2026-07-25): o CARD SOCIAL dela
        // (o mesmo 1200x630 que o X mostra) vira a arte de capa aqui na banca.
        // O mesmo arquivo serve os dois usos: nada é gerado a mais, e o que o
        // leitor viu no post é exatamente o que ele encontra na prateleira.
        // Edição sem card próprio simplesmente não ganha arte (o card só-texto
        // continua válido); arquivo ausente no disco também cai fora, sem erro.
        $capa_fs  = $c['og_image'] !== null ? __DIR__ . '/../../public_html' . $c['og_image'] : null;
        $capa_dim = ($capa_fs !== null && is_file($capa_fs)) ? getimagesize($capa_fs) : false;
      ?>
      <?php /* o card inteiro é o link. O aria-label dá ao leitor de tela um nome
         curto e acionável ("Ler a edição: TÍTULO") no lugar do bloco inteiro de
         texto; o foco fica visível pelo .ed:focus-visible (outline ciano).
         ★ target=_blank (líder, 2026-07-25): a revista abre em ABA NOVA, então a
         banca continua aberta atrás (é uma estante: pegar uma revista não tira
         você da banca). O rel=noopener é obrigatório com _blank (segurança: sem
         ele a aba nova ganha acesso ao window.opener). */ ?>
      <a class="ed folha" style="--idade:<?= h((string) $c['idade']) ?>"
         href="<?= h((string) $c['url']) ?>"
         target="_blank" rel="noopener"
         aria-label="<?= h((string) $banca['cta'] . ': ' . (string) $c['titulo']) ?>">
        <?php if ($i === 0): ?>
        <span class="nova"><?= h((string) $banca['nova']) ?></span>
        <?php endif; ?>

        <div class="mini-mast">
          <span class="marca">GLYFESSE</span>
          <span class="ref"><?= h((string) $t['exp_vol']) ?> <?= (int) volume_edicao((string) $c['data']) ?> · <?= h((string) $t['exp_num']) ?> <?= (int) $c['numero'] ?> · <?= h(data_por_extenso((string) $c['data'], $idioma, $t)) ?></span>
        </div>

        <?php /* A ARTE DE CAPA: entra LOGO ABAIXO do friso de identidade e ACIMA
           da manchete, na ordem clássica de capa de revista (cabeçalho, foto,
           manchete, linha de apoio). Mantê-la abaixo do friso preserva o
           alinhamento da estante (todas as capas penduram pelo mesmo friso no
           topo, align-items:start). É TELA dentro do PAPEL: mesma moldura acesa
           do frame (.ed-frame), então a luz fica contida na tela, como manda a
           regra papel×tela. width/height reais do arquivo = zero CLS.
           ★ A PRIMEIRA capa NÃO é lazy: ela é a candidata a LCP da home (TST-CWV
           diz "nunca loading=lazy no hero"); as de baixo, sim. */ ?>
        <?php if ($capa_dim !== false): ?>
        <figure class="ed-capa aceso">
          <img src="<?= h(asset((string) $c['og_image'])) ?>"
               alt="<?= h(sprintf((string) $banca['capa_alt'], (int) $c['numero'], (string) $c['titulo'])) ?>"
               width="<?= (int) $capa_dim[0] ?>" height="<?= (int) $capa_dim[1] ?>"
               <?= $i === 0 ? 'fetchpriority="high" decoding="async"' : 'loading="lazy" decoding="async"' ?>>
        </figure>
        <?php endif; ?>

        <h3 class="ct"><?= h((string) $c['titulo']) ?></h3>
        <p class="ch"><?= h((string) $c['dek']) ?></p>

        <?php if ($c['frame'] !== null && $frame_dim !== false): ?>
        <figure class="ed-frame aceso">
          <img src="<?= h((string) $c['frame']) ?>"
               alt="<?= h((string) ($c['frame_alt'] ?? '')) ?>"
               width="<?= (int) $frame_dim[0] ?>" height="<?= (int) $frame_dim[1] ?>"
               loading="lazy" decoding="async">
        </figure>
        <?php endif; ?>

        <?php if ($c['visual']): ?>
        <span class="selo-jogo"><?= h((string) $banca['jogavel']) ?></span>
        <?php endif; ?>
      </a>
      <?php endforeach; ?>
    </div>
  </section>

  <?php /* ══ LINHA DO TEMPO · O SCRUBBER (item W6 · LINHA-TEMPO) ══
     A era VISUAL do jogo: do quadrado azul (22/jun) em diante, um ponto por
     edição visual publicada, cada uma datada. Nasce com 1 ponto e estica sozinha.
     Progressive enhancement: o estado-base (sem JS / reduced-motion) é a LISTA
     estática abaixo (o frame + a data + o título + o dek de cada edição visual)
     — legível, nunca um bloco vazio. linha-tempo.js lê os data-* da lista, monta
     o SCRUBBER (uma tela só, crossfade de frames ao arrastar) e esconde a lista.
     A lógica pura (crossfade por tempo real, pos↔data, passo, clique) vive no
     núcleo testado (assets/js/linha-tempo-core.js). Mock 07. */ ?>
  <?php $lt = $banca['linha_tempo']; ?>
  <section class="lt-hero" id="gancho-linha" aria-labelledby="lt-h2"
           data-lbl-edicao="<?= h((string) $lt['edicao']) ?>"
           data-lbl-slider="<?= h((string) $lt['slider']) ?>"
           data-lbl-dica="<?= h((string) $lt['dica']) ?>">
    <div class="lt-cab">
      <h2 class="secao-nome" id="lt-h2"><?= h((string) $lt['titulo']) ?></h2>
      <span class="conta"><?= h((string) $lt['meta']) ?></span>
    </div>
    <p class="lt-lide"><?= h((string) $lt['lide']) ?></p>

    <?php if ($linha_tempo === []): ?>
    <p class="lt-vazio"><?= h((string) $lt['vazio']) ?></p>
    <?php else: ?>
    <?php /* ESTADO-BASE + FONTE DE DADOS do JS. Cada <li> carrega os data-* que
       linha-tempo.js lê pra montar o scrubber (frame, data ISO, rótulo curto,
       nº, título); o dek e a data por extenso saem do próprio texto renderizado
       (o JS fica sem i18n). Só era visual PUBLICADA entra (guard no helper). */ ?>
    <ol class="lt-lista" id="lt-lista">
      <?php foreach ($linha_tempo as $p): ?>
      <?php
        $frame_fs  = __DIR__ . '/../../public_html' . $p['frame'];
        $frame_dim = is_file($frame_fs) ? getimagesize($frame_fs) : false;
      ?>
      <li class="lt-item"
          data-num="<?= (int) $p['numero'] ?>"
          data-data="<?= h((string) $p['data']) ?>"
          data-rotulo="<?= h((string) $p['rotulo']) ?>"
          data-frame="<?= h((string) $p['frame']) ?>">
        <?php if ($frame_dim !== false): ?>
        <figure class="lt-item-frame aceso">
          <img src="<?= h((string) $p['frame']) ?>"
               alt="<?= h((string) $p['frame_alt']) ?>"
               width="<?= (int) $frame_dim[0] ?>" height="<?= (int) $frame_dim[1] ?>"
               loading="lazy" decoding="async">
        </figure>
        <?php endif; ?>
        <div class="lt-item-txt">
          <span class="lt-item-data"><?= h((string) $p['data_ext']) ?></span>
          <h3 class="lt-item-titulo"><?= h((string) $p['titulo']) ?></h3>
          <p class="lt-item-dek"><?= h((string) $p['dek']) ?></p>
        </div>
      </li>
      <?php endforeach; ?>
    </ol>
    <?php endif; ?>
  </section>

  <?php /* ══ O ÁLBUM · CROMOS DE GLIFO (item W6 · ALBUM) ══
     Um álbum de figurinhas em localStorage: cola criança, colecionou adulto — o
     mesmo objeto pega os dois públicos. Zero conta, zero dado. ⚠️ O TEMA das
     figurinhas é PLACEHOLDER SEGURO: os 13 glifos do Sylvarin (as raízes da
     Glyfa), desenhados em TIPOGRAFIA — zero arte nova, zero sprite de personagem.
     O tema/arte FINAL é decisão do líder (co-decidido, ainda não definido): trocar
     o tema = trocar o array de catálogo em album.js, sem tocar no núcleo nem aqui.
     Progressive enhancement: o estado-base (sem JS) já mostra a grade ESTÁTICA
     (silhuetas + o cromo-exemplo canon + a legenda), nunca um bloco vazio. album.js
     reconstrói a grade do léxico do núcleo (assets/js/album-core.js, testado),
     aplica o álbum salvo e liga o botão de colar. Degradação: localStorage off/
     cheio/anônimo → a loja cai pra in-memory (o núcleo garante) e a UI avisa com
     graça; perder o álbum NÃO quebra a página. É TELA: os cromos colados brilham
     (ciano) DENTRO da moldura; o papel em volta segue sem glow. Glifos/glosas são
     minúsculos → guard N→H do pixel não dispara. */ ?>
  <?php $al = $banca['album']; ?>
  <section class="album-hero" id="gancho-album" aria-labelledby="album-h2"
           data-lang="<?= h($idioma) ?>"
           data-lbl-contador="<?= h((string) $al['contador']) ?>"
           data-lbl-completo="<?= h((string) $al['completo']) ?>"
           data-lbl-off="<?= h((string) $al['off']) ?>"
           data-lbl-falta="<?= h((string) $al['falta']) ?>"
           data-lbl-colada="<?= h((string) $al['colada']) ?>">
    <div class="album-cab">
      <h2 class="secao-nome" id="album-h2"><?= h((string) $al['titulo']) ?></h2>
      <span class="conta"><?= h((string) $al['meta']) ?></span>
    </div>
    <p class="album-lide"><?= h((string) $al['lide']) ?></p>

    <div class="album-moldura">
      <div class="album-tela">

        <?php /* o contador: no estado-base explica a mecânica; album.js o troca por
           "X de N coladas" (aria-live anuncia cada figurinha nova). */ ?>
        <p class="album-contador" id="album-contador" aria-live="polite"><?= h((string) $al['estatico']) ?></p>

        <?php /* ESTADO-BASE (sem JS): a grade estática. O 1º slot mostra o cromo-
           exemplo canon (mor- · sombra) pra comunicar o conceito; os outros são
           silhuetas. album.js reconstrói a grade inteira do léxico e aplica o
           estado salvo — sem JS, esta grade já lê como um álbum. */ ?>
        <ul class="album-grade" id="album-grade" aria-label="<?= h((string) $ganchos['album']['label']) ?>">
          <li class="album-slot colada">
            <span class="album-q" aria-hidden="true">?</span>
            <span class="album-glifo"><?= h((string) $al['ex_glifo']) ?></span>
            <span class="album-glosa"><?= h((string) $al['ex_glosa']) ?></span>
          </li>
          <?php for ($n = 0; $n < 12; $n++): ?>
          <li class="album-slot"><span class="album-q" aria-hidden="true">?</span></li>
          <?php endfor; ?>
        </ul>

        <?php /* o botão de colar só aparece com JS (o estado-base não tem como
           colar); album.js faz btn.hidden=false e liga o clique. */ ?>
        <div class="album-acao">
          <button type="button" class="album-btn" id="album-btn" hidden><?= h((string) $al['colar']) ?></button>
        </div>

        <?php /* aviso de storage off (com graça): album.js revela quando a memória
           do navegador não vale (anônimo / cheio / bloqueado). */ ?>
        <p class="album-nota" id="album-nota" hidden></p>

      </div>
    </div>
    <p class="album-cap"><?= h((string) $al['cap']) ?></p>
  </section>

  <?php /* ══ A GLYFA · A FORJA DE NOMES (item W6 · GLYFA) ══
     Uma forja de nomes em Sylvarin (o idioma do jogo): o leitor combina duas
     raízes e vê o nome nascer com o significado. O vocabulário é FECHADO — é o
     que torna o UGC seguro com criança e dev solo (moderação por design; nenhum
     palavrão sai daqui, garantido pelo núcleo testado + TST-GLYFA-PALAVRAO).
     Progressive enhancement: o estado-base (sem JS) mostra o exemplo ESTÁTICO
     que o líder canonizou (mor- + lhin- = Morlhin · voz-sombra) + a explicação,
     nunca um bloco vazio. glyfa.js esconde o exemplo, popula os 2 seletores a
     partir do léxico do núcleo (assets/js/glyfa-core.js, testado) e forja ao
     vivo. É TELA: o nome forjado brilha (ciano) DENTRO da moldura; o papel em
     volta segue sem glow. O nome é grande (≥15px) → guard N→H do pixel não
     dispara; as glosas são minúsculas → seguras. */ ?>
  <?php $gf = $banca['glyfa']; ?>
  <section class="glyfa-hero" id="gancho-glyfa" aria-labelledby="glyfa-h2"
           data-lang="<?= h($idioma) ?>"
           data-lbl-significa="<?= h((string) $gf['significa']) ?>"
           data-lbl-iguais="<?= h((string) $gf['iguais']) ?>">
    <div class="glyfa-cab">
      <h2 class="secao-nome" id="glyfa-h2"><?= h((string) $gf['titulo']) ?></h2>
      <span class="conta"><?= h((string) $gf['meta']) ?></span>
    </div>
    <p class="glyfa-lide"><?= h((string) $gf['lide']) ?></p>

    <div class="glyfa-moldura">
      <div class="glyfa-tela">

        <?php /* ESTADO-BASE (sem JS): o exemplo estático canon. glyfa.js o esconde. */ ?>
        <p class="glyfa-base">
          <span class="glyfa-ex-pre"><?= h((string) $gf['ex_pre']) ?></span>
          <span class="glyfa-ex-raiz"><?= h((string) $gf['ex_a']) ?></span>
          <span class="glyfa-ex-g">(<?= h((string) $gf['ex_a_g']) ?>)</span>
          <span class="glyfa-mais" aria-hidden="true"><?= h((string) $gf['mais']) ?></span>
          <span class="glyfa-ex-raiz"><?= h((string) $gf['ex_b']) ?></span>
          <span class="glyfa-ex-g">(<?= h((string) $gf['ex_b_g']) ?>)</span>
          <span class="glyfa-ex-igual" aria-hidden="true">=</span>
          <b class="glyfa-ex-nome"><?= h((string) $gf['ex_nome']) ?></b>
          <span class="glyfa-ex-sig"><?= h((string) $gf['significa']) ?> &ldquo;<?= h((string) $gf['ex_sig']) ?>&rdquo;</span>
        </p>

        <?php /* A FORJA interativa (só com JS): 2 seletores + o resultado ao vivo.
           Os <select> nascem VAZIOS e hidden; glyfa.js os popula do léxico do
           núcleo e revela — sem JS ficam fora do caminho (o exemplo acima basta). */ ?>
        <div class="glyfa-forja" hidden>
          <div class="glyfa-sels">
            <span class="glyfa-campo">
              <label class="glyfa-lbl" for="glyfa-a"><?= h((string) $gf['raiz_a']) ?></label>
              <select class="glyfa-sel" id="glyfa-a"></select>
            </span>
            <span class="glyfa-op" aria-hidden="true"><?= h((string) $gf['mais']) ?></span>
            <span class="glyfa-campo">
              <label class="glyfa-lbl" for="glyfa-b"><?= h((string) $gf['raiz_b']) ?></label>
              <select class="glyfa-sel" id="glyfa-b"></select>
            </span>
            <button type="button" class="glyfa-btn" id="glyfa-btn"><?= h((string) $gf['forjar']) ?></button>
          </div>
          <output class="glyfa-out" id="glyfa-out" for="glyfa-a glyfa-b" aria-live="polite">
            <span class="glyfa-nome"><?= h((string) $gf['ex_nome']) ?></span>
            <span class="glyfa-sig"><?= h((string) $gf['significa']) ?> &ldquo;<?= h((string) $gf['ex_sig']) ?>&rdquo;</span>
          </output>
        </div>

      </div>
    </div>
    <p class="glyfa-cap"><?= h((string) $gf['cap']) ?></p>
  </section>

  <?php /* ══ O CUPOM · a ENQUETE RECORTÁVEL (item W6 · CUPOM) ══
     O ÚNICO backend VIVO do site: o poll (api/cupom-voto.php). Ao contrário da
     Glyfa/álbum (que são TELA navy acesa), o cupom é PAPEL — um encarte recortável
     no pontilhado, com tesoura, na cor da tinta. O resultado sai na PRÓXIMA EDIÇÃO
     (a lentidão é estética: enquete aberta = "aguardando", não site morto).
     ★ Progressive enhancement: o estado-base é um <form method="post" action="/api/
     cupom-voto.php"> NATIVO que VOTA SEM JS — o browser navega pro endpoint, que
     responde uma página in-world "resultado na próxima edição". cupom.js troca o
     submit nativo por fetch (fica na página), liga o RASGAR/DESFAZER (a máquina de
     estado pura testada em cupom-core.js — dá pra rasgar errado e desfazer, nunca
     trava) e a idempotência SUAVE "já votou" (localStorage; zero conta, zero dado).
     ⚠️ A PERGUNTA e as OPÇÕES são PLACEHOLDER: o líder define as reais (a whitelist
     casa 1:1 no cliente cupom-core.js e no servidor api/cupom-voto.php). */ ?>
  <?php /* o markup do cupom vive em src/includes/cupom.php (DRY: a mesma peça na
     BANCA e na EDIÇÃO/sec-15). Espera $cp + o estado votado que render-banca.php
     já computou ($cupom_votou/$cupom_pct/$cupom_total). Só PERCENTUAL sai daqui
     (Decisão do líder); a contagem crua nunca vai ao HTML. */
     $cp = $banca['cupom']; ?>
  <?php require __DIR__ . '/../includes/cupom.php'; ?>

  <?php /* ══ HERO · O QUADRADINHO (item W6 · QUADRADINHO) ══
     A capa da banca é o brinquedo. Progressive enhancement: o estado-base
     (sem JS) já mostra o quadrado parado + a legenda escrita; quadradinho.js
     liga o jogo (clique+WASD no desktop, d-pad no mobile) e a evolução pro Gus.
     A lógica (colisão nos pés, movimento, transição) vive no núcleo PURO
     testado (assets/js/quadradinho-core.js). As paredes batem com o mock 05. */ ?>
  <?php $q = $banca['quad']; ?>
  <section class="quad-hero" id="gancho-hero" aria-label="<?= h((string) $ganchos['hero']['label']) ?>">
    <div class="quad-moldura">
      <div class="quad-sala" id="quadradinho" tabindex="0" role="application" aria-label="<?= h((string) $q['sala_aria']) ?>">
        <?php foreach ([
          'left:34%;top:16%;width:31%;height:9%',
          'left:44%;top:25%;width:9%;height:22%',
          'left:33%;top:63%;width:24%;height:8%',
          'left:66%;top:39%;width:14%;height:23%',
        ] as $parede): ?>
        <div class="quad-parede" style="<?= h($parede) ?>"></div>
        <?php endforeach; ?>
        <div class="quad-heroi" aria-hidden="true"></div>
        <div class="quad-dpad" role="group" aria-label="<?= h((string) $q['dpad_aria']) ?>">
          <button type="button" class="dp u" data-dir="w" aria-label="<?= h((string) $q['cima']) ?>"><span aria-hidden="true">▲</span></button>
          <button type="button" class="dp l" data-dir="a" aria-label="<?= h((string) $q['esquerda']) ?>"><span aria-hidden="true">◀</span></button>
          <button type="button" class="dp r" data-dir="d" aria-label="<?= h((string) $q['direita']) ?>"><span aria-hidden="true">▶</span></button>
          <button type="button" class="dp d" data-dir="s" aria-label="<?= h((string) $q['baixo']) ?>"><span aria-hidden="true">▼</span></button>
        </div>
      </div>
    </div>
    <p class="quad-instr"><?= h((string) $q['instr']) ?></p>
    <p class="quad-legenda"><?= h((string) $q['legenda']) ?></p>
  </section>

  <?php /* ══ PRESS START · O PÔSTER DA BANCA (item W6 · D-PRESS-START) ══
     Um pôster-tela de fliperama abaixo do quadradinho (wireframe §3.1, mock 08).
     Progressive enhancement: o estado-base (sem JS / reduced-motion) mostra a
     MENSAGEM honesta ESTÁTICA — a fala do Gus + a seta (um <a> real) que aponta
     pro quadradinho. press-start.js liga o attract "PRESS START" e o boot do CRT
     (~1.3s), aterrissando na mesma mensagem honesta. A máquina de estado vive no
     núcleo PURO testado (assets/js/press-start-core.js). É TELA: a luz (ciano/
     glow) é permitida DENTRO da moldura; o papel em volta segue sem glow. */ ?>
  <?php $ps = $banca['press']; ?>
  <section class="ps-hero" id="gancho-pressstart" aria-label="<?= h((string) $ganchos['pressstart']['label']) ?>">
    <div class="ps-moldura">
      <div class="ps-poster" id="press-start" aria-label="<?= h((string) $ps['poster_aria']) ?>">

        <?php /* attract: só aparece com JS+motion (.ps-poster[data-st=attract]) */ ?>
        <div class="ps-attract" aria-hidden="true">
          <p class="ps-press"><?= h((string) $ps['press']) ?></p>
          <p class="ps-insert"><?= h((string) $ps['insert']) ?></p>
        </div>

        <?php /* boot: o BIOS falso imprime linha a linha (só com JS+motion) */ ?>
        <div class="ps-boot" aria-hidden="true">
          <p class="ps-boot-txt"><?php foreach ((array) $ps['boot'] as $bl): ?><span class="ps-bl"><?= h((string) $bl) ?></span><?php endforeach; ?><span class="ps-cur" aria-hidden="true"></span></p>
        </div>

        <?php /* a MENSAGEM honesta: o ESTADO-BASE (sem JS mostra isto direto) e o
           destino do boot. aria-live anuncia quando o boot aterrissa aqui. */ ?>
        <div class="ps-msg" aria-live="polite">
          <p class="ps-msg-l1"><?= h((string) $ps['boot_ok']) ?></p>
          <p class="ps-fala"><span class="hh">gus@glyfesse&gt;</span> <?= h((string) $ps['fala']) ?></p>
          <p class="ps-pensa">// <?= h((string) $ps['pensa']) ?></p>
          <a class="ps-seta" href="#gancho-hero"><?= h((string) $ps['ir_quad']) ?></a>
        </div>

      </div>
    </div>
    <p class="ps-cap"><?= h((string) $ps['cap']) ?></p>
  </section>

  <?php /* ══ GANCHOS W6 restantes · os interativos ainda em scaffold ══
     Cada um é uma <section> reservada, igual ao scaffold das seções da edição.
     A ordem segue o wireframe §3.1 (o hero e o PRESS START acima já são reais). */ ?>
  <?php /* ⚠️ CHAMADAS DE CAPA ocultas ao vivo (decisão autônoma 2026-07-21): o W6
     'chamadas' ainda é scaffold ("interativo pendente · w6"); placeholder vazio no
     ar fica ruim (igual às edições vazias). Some da home até ser implementado.
     Restaurar = trocar [] por ['chamadas'] abaixo. */ ?>
  <?php foreach ([] as $g): ?>
  <section class="gancho-w6" id="gancho-<?= h($g) ?>" aria-label="<?= h((string) $ganchos[$g]['label']) ?>">
    <div class="scaffold">
      <span class="tag"><?= h((string) $banca['w6_tag']) ?></span>
      <p><b><?= h((string) $ganchos[$g]['nome']) ?></b></p>
    </div>
  </section>
  <?php endforeach; ?>

</div><!-- /.banca-corpo -->
</main>

<?php require __DIR__ . '/../includes/rodape.php'; ?>

</div><!-- /.pagina -->

<?php /* Enhancement client-side dos interativos da home. O QUADRADINHO (hero) já
   é real: o núcleo PURO testado + a cola DOM. Progressive enhancement — sem JS
   a banca lê, navega e troca de idioma, e o hero mostra o quadrado + a legenda.
   O QUADRADINHO, o PRESS START e a LINHA DO TEMPO já são reais (núcleo testado +
   cola DOM); só as CHAMADAS de capa seguem como scaffold (W6). */ ?>
<script src="<?= h(asset('/assets/js/quadradinho-core.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/quadradinho.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/press-start-core.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/press-start.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/linha-tempo-core.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/linha-tempo.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/glyfa-core.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/glyfa.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/album-core.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/album.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/cupom-core.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/cupom.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/som-core.js')) ?>" defer></script>
<script src="<?= h(asset('/assets/js/som.js')) ?>" defer></script>
</body>
</html>
