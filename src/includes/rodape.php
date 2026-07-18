<?php
declare(strict_types=1);
/**
 * src/includes/rodape.php — footer[contentinfo]: som + licença + contato.
 *
 * Espera $t (i18n do idioma). SEM lista de navegação: não há outras páginas a
 * listar (IA-WIREFRAME §3.1) — a banca é o hub, o índice é o roteador interno.
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
    <div class="som" aria-label="Som">
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
    </p>
  </div>
</footer>
