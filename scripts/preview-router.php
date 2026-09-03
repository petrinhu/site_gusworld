<?php

declare(strict_types=1);

/**
 * scripts/preview-router.php — router do `php -S` pra ver uma edição em
 * RASCUNHO renderizada, sem tocar `data/edicoes.php` (ED4-MONTAGEM).
 *
 * Uso: scripts/preview-edicao.sh [numero] [porta]
 * (wrapper que sobe `php -S 127.0.0.1:<porta> -t public_html` com este router)
 *
 * Mecanismo: intercepta só as duas rotas que instanciam render_edicao()
 * (pt/edicao.php, en/edition.php) e chama a função pelo SEAM já documentado
 * em src/lib/render-edicao.php (@param array|null $edicoes — "o teste injeta
 * um array em memória para exercitar uma edição que ainda não está publicada
 * no disco, sem tocar no `estado` do dado real"): uma cópia de
 * data/edicoes.php com a edição-alvo forçada para 'estado' => 'publicada'
 * SÓ NESTA VARIÁVEL LOCAL, refeita a cada request, nunca gravada em disco.
 *
 * Tudo o mais (CSS, JS, fontes, index.php, /en/, /api/, imagens) passa direto
 * pro servidor embutido do PHP (return false) — zero alteração de rota.
 *
 * ⚠️ Isto é ferramenta de QA local. Não expõe a edição em produção: a
 * .htaccess/config real do deploy não roda por este router, e o
 * `estado: rascunho` de data/edicoes.php segue intocado no repositório.
 */

$numero = (int) (getenv('PREVIEW_EDICAO_NUM') ?: 4);

$uri = (string) (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/');

$rotas = [
    '/pt/edicao.php'  => 'pt',
    '/en/edition.php' => 'en',
];

if (!isset($rotas[$uri])) {
    return false; // deixa o servidor embutido servir o caminho normalmente
}

require __DIR__ . '/../src/lib/render-edicao.php';

/** @var array<int, array<string, mixed>> $edicoes */
$edicoes = require __DIR__ . '/../data/edicoes.php';
foreach ($edicoes as &$edicao) {
    if ((int) ($edicao['numero'] ?? 0) === $numero) {
        $edicao['estado'] = 'publicada'; // só nesta cópia em memória
    }
}
unset($edicao);

render_edicao($rotas[$uri], $edicoes);
