<?php
declare(strict_types=1);
/**
 * src/templates/privacidade.php — a Política de Privacidade (REMED-LGPD).
 *
 * ⚠️ ESTE TEXTO AGUARDA LEITURA E APROVAÇÃO DO LÍDER ANTES DE QUALQUER DEPLOY.
 * O `TODO.md` registra um sign-off de advogado humano PENDENTE antes deste
 * texto ir ao ar (item REMED-LGPD). Este arquivo entra no repositório para
 * revisão; não é autorização para publicar em produção.
 *
 * Recebe do front controller (pt/privacidade.php, en/privacy.php): $idioma e
 * $t. Página ESTÁTICA — não vem de $edicoes, sem slug, sem número de edição.
 * O texto vem de $t['privacidade'] (docs/legal/politica-privacidade-rascunho.md,
 * blocos pt-BR/EN, copiados verbatim — inclusive a ausência de acentos do
 * rascunho original, que não foi "corrigida" aqui por não ser deste escopo).
 *
 * Chrome igual ao de erro-404.php/banca.php: mesmo <head> (head.php), um
 * masthead simplificado (sem número/data de edição, como o 404) e o mesmo
 * rodapé (rodape.php). Zero JS, zero classe CSS nova (só o que já existe em
 * edicao.css): .capa/.manchete/.dek para o título e .conteudo para o corpo
 * (o mesmo container de prosa usado nos partials de seção das edições).
 */
$outro = $idioma === 'pt' ? 'en' : 'pt';
$p = $t['privacidade'];

$head = [
    'lang'      => (string) $t['html_lang'],
    'og_locale' => (string) $t['og_locale'],
    'titulo'    => 'GLYFESSE · ' . $p['titulo'],
    'og_title'  => 'Glyfesse · ' . $p['titulo'],
    'desc'      => (string) $p['meta_desc'],
    'canonical' => url_privacidade($idioma),
    'hreflang'  => [
        'pt-br'     => url_privacidade('pt'),
        'en'        => url_privacidade('en'),
        'x-default' => url_privacidade(SITE_IDIOMA_PADRAO),
    ],
];
require __DIR__ . '/../includes/head.php';
?>
<body data-material="papel">

<a class="skip" href="#privacidade"><?= h((string) $t['skip_indice']) ?></a>

<div class="pagina folha" style="--idade:.5">

<header class="masthead" role="banner">
  <div class="masthead-inner">
    <a class="logo" href="<?= h(url_banca($idioma)) ?>" title="<?= h((string) $t['wordmark_titulo']) ?>">GLYFESSE</a>
    <div class="col-meta">
      <?php /* a LCD troca de idioma NA MESMA página (par gêmeo real), igual à
         LCD de uma edição — não é a home do outro idioma (erro-404 não tem
         par, esta página tem). */ ?>
      <a class="imprint aceso" href="<?= h(url_privacidade($outro)) ?>" hreflang="<?= h($outro) ?>" lang="<?= h($outro) ?>">
        <span class="l1" aria-hidden="true"><?= h((string) $t['lcd']['l1']) ?></span>
        <span class="l2"><span class="cmd"><?= h((string) $t['lcd']['cmd']) ?></span><i class="run" aria-hidden="true"></i></span>
        <span class="sr"><?= h((string) $t['lcd']['sr']) ?></span>
      </a>
    </div>
  </div>
</header>

<main>
  <article class="edicao">

    <div class="capa" id="privacidade">
      <h1 class="manchete"><?= h((string) $p['titulo']) ?></h1>
      <p class="dek"><?= h((string) $p['atualizado']) ?></p>
    </div>

    <div class="conteudo">

      <p><?= h((string) $p['intro']) ?></p>

      <p><strong><?= h((string) $p['responsavel_lead']) ?></strong>
        <?= h((string) $p['responsavel_antes']) ?> <code>gusworld@gusworld.site</code>
        <?= h((string) $p['responsavel_depois']) ?></p>

      <p><strong><?= h((string) $p['nao_faz_lead']) ?></strong> <?= h((string) $p['nao_faz_corpo']) ?></p>

      <p><strong><?= h((string) $p['cookie_lead']) ?></strong>
        <?= h((string) $p['cookie_antes']) ?> <code>glyfesse_votou</code><?= h((string) $p['cookie_depois']) ?></p>

      <p><strong><?= h((string) $p['localstorage_lead']) ?></strong>
        <?= h((string) $p['localstorage_antes']) ?> <code>localStorage</code><?= h((string) $p['localstorage_depois']) ?></p>

      <p><strong><?= h((string) $p['cupom_lead']) ?></strong> <?= h((string) $p['cupom_corpo']) ?></p>

      <p><strong><?= h((string) $p['email_lead']) ?></strong> <?= h((string) $p['email_corpo']) ?></p>

      <p><strong><?= h((string) $p['log_lead1']) ?></strong> <?= h((string) $p['log_corpo_a']) ?>
        <strong><?= h((string) $p['log_lead2']) ?></strong> <?= h((string) $p['log_prazo']) ?><!--
          [A DEFINIR PELO LIDER] / [TO BE SET BY THE LEAD]: prazo de retencao do
          access_log do servidor de hospedagem. Decisao do lider, depende do
          painel de hospedagem (nao e codigo, nao se inventa aqui). Ver
          docs/legal/politica-privacidade-rascunho.md, secao "O que e do lider
          decidir", decisao 2. Quando a decisao sair, esta linha e o comentario
          sao atualizados juntos.
        --> <?= h((string) $p['log_corpo_b']) ?></p>

      <p><strong><?= h((string) $p['links_lead']) ?></strong> <?= h((string) $p['links_corpo']) ?></p>

      <p><strong><?= h((string) $p['criancas_lead']) ?></strong> <?= h((string) $p['criancas_corpo']) ?></p>

      <p><strong><?= h((string) $p['direitos_lead']) ?></strong>
        <?= h((string) $p['direitos_antes']) ?> <code>gusworld@gusworld.site</code><?= h((string) $p['direitos_depois']) ?></p>

      <p><strong><?= h((string) $p['mudancas_lead']) ?></strong> <?= h((string) $p['mudancas_corpo']) ?></p>

    </div>

    <p class="up-wrap"><a class="up" href="<?= h(url_banca($idioma)) ?>"><?= h((string) $t['erro_404_voltar']) ?></a></p>

  </article>
</main>

<?php require __DIR__ . '/../includes/rodape.php'; ?>

</div><!-- /.pagina -->
</body>
</html>
