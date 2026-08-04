<?php
/* Cupom recortável (encarte §15): o ÚNICO backend VIVO do site — o poll
   (api/cupom-voto.php). Recorrente na #3: o MESMO mini-app da #1 e da #2. O markup é a MESMA peça da banca (DRY): só delega ao
   include compartilhado src/includes/cupom.php. A copy é bilíngue via i18n
   ($t['banca']['cupom']), então o partial pt e o en incluem o mesmo arquivo.
   O estado votado (cupom_votou/cupom_pct/cupom_total) já vem resolvido de
   render-edicao.php; aqui só passo a copy ($cp). Estilos: edicao.css (.cupom-*).
   ⚠️ Só PERCENTUAL sai daqui (Decisão do líder); degrada sem JS (form nativo). */
$cp = $t['banca']['cupom'];
require __DIR__ . '/../../../includes/cupom.php';
