<?php
declare(strict_types=1);
/**
 * src/includes/rodape.php — footer[contentinfo]: som + licença + contato.
 *
 * Espera $t (i18n do idioma). SEM lista de navegação: não há outras páginas a
 * listar (IA-WIREFRAME §3.1) — a banca é o hub, o índice é o roteador interno.
 *
 * Os 2 botões de som são MARCAÇÃO apenas: o áudio (efeitos ON / música OFF por
 * padrão) é peça posterior. O estado default vai no aria-pressed; ao ligar o
 * áudio, o JS de enhancement passa a refleti-lo. O e-mail é o real (MODERACAO:
 * endereço exibido, sem formulário).
 */
?>
<footer class="rodape" role="contentinfo">
  <div class="rodape-inner">
    <div class="som" aria-label="Som">
      <button type="button" class="som-btn" data-som="efeitos" aria-pressed="true">
        <span class="luz" aria-hidden="true"></span><?= h((string) $t['rodape_som_ef_on']) ?>
      </button>
      <button type="button" class="som-btn" data-som="musica" aria-pressed="false">
        <span class="luz" aria-hidden="true"></span><?= h((string) $t['rodape_som_mus_off']) ?>
      </button>
    </div>

    <p class="licenca"><?= h((string) $t['rodape_licenca']) ?></p>

    <p class="contato">
      <a href="mailto:gusworld@gusworld.site"><?= h((string) $t['rodape_contato']) ?></a>
    </p>
  </div>
</footer>
