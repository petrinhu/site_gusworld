<?php
declare(strict_types=1);
/**
 * src/includes/rodape.php — footer[contentinfo]: som + licença + contato.
 *
 * Espera $t (i18n do idioma) e $idioma (bare, já disponível em todo template
 * que requer este partial). ⚠️ Deixou de ser verdade que "não há outras
 * páginas a listar" (afirmação antiga daqui, de antes do REMED-LGPD): a banca
 * segue sendo o HUB editorial, mas agora existe uma segunda página fixa (a
 * Política de Privacidade), e todo rodapé do site linka para ela — não é uma
 * lista de navegação completa, é o único link legal mínimo.
 *
 * Os 2 botões de som (efeitos ON / música OFF por padrão) já são reais: o estado
 * default vai no aria-pressed aqui, e o JS de enhancement (som-core.js + som.js)
 * reflete/persiste a preferência e toca o SFX real do jogo. Sem JS: aparecem no
 * default, inertes. O e-mail é o real (MODERACAO: endereço exibido, sem
 * formulário).
 */
?>
<footer class="rodape" role="contentinfo">
  <div class="rodape-inner">
    <div class="som" aria-label="<?= h((string) $t['rodape_som_aria']) ?>">
      <button type="button" class="som-btn" data-som="efeitos" aria-pressed="true">
        <span class="luz" aria-hidden="true"></span><?= h((string) $t['rodape_som_ef']) ?>
      </button>
      <button type="button" class="som-btn" data-som="musica" aria-pressed="false">
        <span class="luz" aria-hidden="true"></span><?= h((string) $t['rodape_som_mus']) ?>
      </button>
    </div>

    <p class="licenca"><?= h((string) $t['rodape_licenca']) ?></p>

    <p class="contato">
      <a href="mailto:gusworld@gusworld.site"><?= h((string) $t['rodape_contato']) ?></a>
      · <a href="<?= h(url_privacidade($idioma)) ?>"><?= h((string) $t['rodape_privacidade']) ?></a>
    </p>

    <?php /* build-tag EXPERT: o versionamento completo (Vol.Ed.Rev + build) em
       carimbo mono/ASCII. Só na BASE de uma EDIÇÃO (tem $ctx['numero']); a banca
       (home) não é edição e não recebe build-tag — por isso o guard. String de
       build = neutra de idioma (mesmo texto nos dois). */ ?>
    <?php if (isset($ctx['numero'])): ?>
    <p class="build-tag" aria-label="<?= h((string) ($t['build_tag_aria'] ?? 'edition version')) ?>">glyfe <?=
      h((string) $ctx['volume']) ?>.<?= h((string) $ctx['numero']) ?>.<?= h((string) $ctx['revisao'])
      ?> · build <?= h((string) $ctx['build_data']) ?></p>
    <?php endif; ?>
  </div>
</footer>
