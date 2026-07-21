<?php
declare(strict_types=1);
/**
 * src/templates/edicao.php — o template de UMA edição (esqueleto data-driven).
 *
 * Recebe do render-edicao.php: $ctx (contexto), $t (i18n), $secoes (lista
 * estrutural), $idade (float 0..1 do envelhecimento).
 *
 * Estrutura (IA-WIREFRAME §3.2, mock 09): masthead → main.folha → capa (h1
 * data-driven) → índice #sumario (entradas + 3 links fixos) → seções #sec-03…
 * #sec-19 em SCAFFOLD → rodapé. Cada seção fecha com "↑ índice". A copy das
 * seções é co-decidida com o líder (W5): aqui é placeholder explícito.
 */

$head = [
    'lang'      => (string) $t['html_lang'],
    'og_locale' => (string) $t['og_locale'],
    'titulo'    => 'GLYFESSE · ' . $ctx['titulo'] . ' · #' . $ctx['numero'],
    'canonical' => (string) $ctx['url_self'],
    'hreflang'  => $ctx['hreflang'],
];
require __DIR__ . '/../includes/head.php';

// dimensões reais do frame (width/height explícitos = zero CLS)
$frame_fs = $ctx['frame'] !== null ? __DIR__ . '/../../public_html' . $ctx['frame'] : null;
$frame_dim = ($frame_fs !== null && is_file($frame_fs)) ? getimagesize($frame_fs) : false;
?>
<body data-material="papel">

<a class="skip" href="#sumario"><?= h((string) $t['skip_indice']) ?></a>

<?php /* a BANCADA do maker: peças decorativas nas guteiras (só desktop, via CSS).
   Puramente ornamental → aria-hidden. Fixa ao viewport, atrás da folha. */ ?>
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

<div class="pagina folha" style="--idade:<?= h((string) $idade) ?>">

<?php require __DIR__ . '/../includes/masthead.php'; ?>

<main>
  <article class="edicao">

    <?php /* ══ 01 · CAPA (data-driven de $edicao) ══ */ ?>
    <div class="capa" id="capa">
      <h1 class="manchete"><?= h((string) $ctx['titulo']) ?></h1>
      <p class="dek"><?= h((string) $ctx['dek']) ?></p>
      <?php if ($ctx['frame'] !== null && $frame_dim !== false): ?>
      <figure class="capa-frame aceso">
        <img src="<?= h((string) $ctx['frame']) ?>"
             alt="<?= h((string) ($ctx['frame_alt'] ?? '')) ?>"
             width="<?= (int) $frame_dim[0] ?>" height="<?= (int) $frame_dim[1] ?>"
             loading="eager" decoding="async">
      </figure>
      <?php endif; ?>
    </div>

    <?php /* ══ 02 · ÍNDICE (#sumario): entradas + 3 links fixos ══ */ ?>
    <nav class="sumario" id="sumario" aria-label="<?= h((string) $t['indice_titulo']) ?>">
      <h2 class="secao-nome"><?= h((string) $t['indice_titulo']) ?></h2>
      <ol class="indice">
        <?php foreach ($secoes as $s): ?>
        <li>
          <a href="#<?= h($s['id']) ?>">
            <span class="pg"><?= h($s['num']) ?></span>
            <span class="pt"><?= h((string) $t['secoes'][$s['nome']]) ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ol>

      <div class="links-fixos">
        <a href="<?= h(SITE_LINKS_FIXOS['repo_jogo']) ?>" rel="external noopener"><?= h((string) $t['links_fixos']['repo_jogo']) ?></a>
        <a href="<?= h(SITE_LINKS_FIXOS['repo_motor']) ?>" rel="external noopener"><?= h((string) $t['links_fixos']['repo_motor']) ?></a>
        <a href="<?= h(SITE_LINKS_FIXOS['todo_jogo']) ?>" rel="external noopener" class="todo"><?= h((string) $t['links_fixos']['todo_jogo']) ?></a>
        <p class="gus"><span class="conector" aria-hidden="true">↳</span> "<?= h((string) $t['links_fixos']['gus']) ?>"</p>
      </div>

      <p class="indice-nota"><?= h((string) $t['indice_nota']) ?></p>
    </nav>

    <?php /* ══ 03 … 19 · as seções fixas ══
       Para cada seção, tenta o partial de conteúdo (src/content/edicao-<n>/<lang>/
       <id>.php, resolvido pela função pura caminho_conteudo_secao). Existe →
       renderiza no lugar do bloco; NÃO existe → cai para o .scaffold (rascunho /
       seção-sem-conteúdo segue seguro, nada de meio-pronto vaza). D-STACK:
       publicar uma seção é o arquivo passar a existir, sem tocar em HTML. */ ?>
    <?php require_once __DIR__ . '/../lib/conteudo.php'; ?>
    <?php foreach ($secoes as $s): ?>
    <?php
      $partial = caminho_conteudo_secao(__DIR__ . '/../content', (int) $ctx['numero'], (string) $ctx['idioma'], $s['id']);
      $tem_conteudo = $partial !== null && is_file($partial);
    ?>
    <section class="secao-bloco" id="<?= h($s['id']) ?>">
      <div class="secao">
        <span class="n"><?= h($s['num']) ?></span>
        <h2 class="secao-nome"><?= h((string) $t['secoes'][$s['nome']]) ?></h2>
        <span class="grupo"><?= h((string) $t['grupos'][$s['grupo']]) ?></span>
      </div>
      <?php if ($tem_conteudo): ?>
      <div class="conteudo"><?php include $partial; ?></div>
      <?php else: ?>
      <div class="scaffold">
        <span class="tag"><?= h((string) $t['scaffold_tag']) ?></span>
        <p><?= h((string) $t['scaffold_texto']) ?></p>
      </div>
      <?php endif; ?>
      <p class="up-wrap"><a class="up" href="#sumario"><?= h((string) $t['up_indice']) ?></a></p>
    </section>
    <?php endforeach; ?>

    <p class="up-wrap up-fim"><a class="up" href="#sumario"><?= h((string) $t['up_voltar']) ?></a></p>

  </article>
</main>

<?php require __DIR__ . '/../includes/rodape.php'; ?>

</div><!-- /.pagina -->

<?php /* GANCHO (W6+): a LCD "recompilando" na chegada por #glyfe (js/lang-core.js)
   ainda é gancho. O SOM já é real: os 2 botões do rodapé (efeitos ON / música
   OFF) com o SFX real do jogo. Progressive enhancement: sem JS a página navega,
   lê, troca de idioma e mostra os botões no default, inertes. */ ?>
<?php /* O CUPOM (encarte, sec-15) é o mesmo mini-app da banca: progressive
   enhancement por cima do <form> nativo. Sem JS o cupom vota (POST nativo); com
   JS liga o fetch/rasgar/idempotência suave. cupom.js se auto-protege (sai cedo
   se a página não tem #cupom), então carregá-lo aqui é inócuo nas edições sem
   encarte. A lógica pura vive no núcleo testado (cupom-core.js). */ ?>
<script src="/assets/js/cupom-core.js" defer></script>
<script src="/assets/js/cupom.js" defer></script>
<?php /* PECAS ARTISTICAS interativas da #1: a digitacao-ao-entrar-na-view (crt-nano,
   §17) e o lightbox das telas reais (§17 e §11). Nucleos PUROS testados
   (typing-core.js / lightbox-core.js); pecas.js e o wrapper fino (observer +
   overlay). Progressive enhancement: sem JS a §17 mostra o comando ja digitado e
   os <a class="zoom-link"> abrem a PNG em tamanho real. Auto-protegido: sai cedo
   se a pagina nao tem os alvos. */ ?>
<script src="/assets/js/typing-core.js" defer></script>
<script src="/assets/js/lightbox-core.js" defer></script>
<script src="/assets/js/pecas.js" defer></script>
<script src="/assets/js/som-core.js" defer></script>
<script src="/assets/js/som.js" defer></script>
</body>
</html>
