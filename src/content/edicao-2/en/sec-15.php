<?php
/* Cut-out coupon (insert §15): the site's ONLY LIVE backend, the poll
   (api/cupom-voto.php). Recurring: identical to #1. Same piece as the newsstand
   (DRY): just delegates to the shared include src/includes/cupom.php. The copy is
   bilingual via i18n ($t['banca']['cupom']), so the pt and en partials include the
   same file. The voted state (cupom_votou/cupom_pct/cupom_total) is already
   resolved in render-edicao.php; here we only pass the copy ($cp). Styles:
   edicao.css (.cupom-*). ⚠️ Percentage-only leaves here (leader's call); degrades
   without JS (native form). */
$cp = $t['banca']['cupom'];
require __DIR__ . '/../../../includes/cupom.php';
