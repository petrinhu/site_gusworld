<?php

declare(strict_types=1);

/**
 * src/lib/secoes.php — a LISTA ESTRUTURAL das seções fixas da edição.
 *
 * NÃO é conteúdo: é o esqueleto de âncoras da anatomia aprovada (mock 09 +
 * memória anatomia-da-edicao). As seções 01 (capa) e 02 (índice) são
 * renderizadas à parte pelo template (data-driven de $edicao); esta lista
 * cobre as âncoras #sec-03 … #sec-19, cada uma em SCAFFOLD (placeholder de
 * "conteúdo pendente"). A copy de cada seção é co-decidida com o líder (W5) e
 * NÃO mora aqui.
 *
 * Ids `sec-NN` são IDÊNTICOS em pt e en (IA-WIREFRAME §2.3): link profundo tem
 * gêmeo exato e a LCD troca só o prefixo de URL mantendo o fragmento.
 *
 * Cada entrada:
 *   'id'    → o id da âncora (#sec-NN), estável e bilíngue
 *   'num'   → o rótulo de número da seção (chip)
 *   'nome'  → CHAVE de i18n (o texto sai de src/i18n/<lang>.php: secoes[nome])
 *   'grupo' → CHAVE de i18n do rótulo de grupo (abertura/corpo/fixa/…)
 *
 * @return array<int, array{id:string, num:string, nome:string, grupo:string}>
 */

return [
    ['id' => 'sec-03', 'num' => '03', 'nome' => 'editorial',      'grupo' => 'abertura'],
    ['id' => 'sec-04', 'num' => '04', 'nome' => 'reportagem',     'grupo' => 'corpo'],
    ['id' => 'sec-05', 'num' => '05', 'nome' => 'nota',           'grupo' => 'fixa'],
    ['id' => 'sec-06', 'num' => '06', 'nome' => 'bugs',           'grupo' => 'fixa'],
    ['id' => 'sec-07', 'num' => '07', 'nome' => 'cemiterio',      'grupo' => 'fixa'],
    ['id' => 'sec-08', 'num' => '08', 'nome' => 'detonado',       'grupo' => 'fixa'],
    ['id' => 'sec-09', 'num' => '09', 'nome' => 'errata',         'grupo' => 'fixa'],
    ['id' => 'sec-10', 'num' => '10', 'nome' => 'classificados',  'grupo' => 'fixa'],
    ['id' => 'sec-11', 'num' => '11', 'nome' => 'hq',             'grupo' => 'fixa'],
    ['id' => 'sec-12', 'num' => '12', 'nome' => 'proximos',       'grupo' => 'fixa'],
    ['id' => 'sec-13', 'num' => '13', 'nome' => 'poster',         'grupo' => 'encarte'],
    ['id' => 'sec-14', 'num' => '14', 'nome' => 'brinde',         'grupo' => 'encarte'],
    ['id' => 'sec-15', 'num' => '15', 'nome' => 'cupom',          'grupo' => 'encarte'],
    ['id' => 'sec-16', 'num' => '16', 'nome' => 'entrevista',     'grupo' => 'expert'],
    ['id' => 'sec-17', 'num' => '17', 'nome' => 'programacao',    'grupo' => 'expert'],
    ['id' => 'sec-18', 'num' => '18', 'nome' => 'bus',            'grupo' => 'expert'],
    ['id' => 'sec-19', 'num' => '19', 'nome' => 'expediente',     'grupo' => 'fechamento'],
];
