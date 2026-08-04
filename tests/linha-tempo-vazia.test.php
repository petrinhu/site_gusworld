<?php

declare(strict_types=1);

/**
 * tests/linha-tempo-vazia.test.php - o VAZIO COM GRAÇA da linha do tempo.
 * ZERO dependência (asserções na unha, igual aos outros .test.php).
 *   php tests/linha-tempo-vazia.test.php  → "ALL GREEN" e exit 0, ou exit 1.
 *
 * ★ Por que existe (ordem do líder, 2026-07-25): sem nenhuma edição visual
 * publicada, a seção da linha do tempo mostrava só um cabeçalho e uma nota seca
 * ("a linha do tempo acende quando..."), e lia como PÁGINA QUEBRADA. A regra da
 * revista é a mesma das seções vazias: o vazio tem que parecer INTENCIONAL. Ou
 * seja, a linha é DESENHADA mesmo sem pontos (o trilho + um ponto apagado, o
 * próximo marco) e quem fala é o Gus, na voz dele.
 *
 * O teste trava as duas pontas:
 *   1. VAZIO: a cena existe, é decorativa (aria-hidden), o ponto está APAGADO
 *      (nunca data-on="1", que é o aceso), a fala é do Gus e sai no idioma
 *      certo, e não existe lista/scrubber nenhum pra montar;
 *   2. COM PONTO: publicando uma edição visual, o caminho de sempre volta
 *      inteiro (a lista estática que o linha-tempo.js lê) e o vazio some.
 */

require_once __DIR__ . '/../src/lib/render-banca.php';

$falhas = 0;
$n = 0;

function eq($esperado, $obtido, string $msg): void
{
    global $falhas, $n;
    $n++;
    if ($esperado === $obtido) {
        return;
    }
    $falhas++;
    fwrite(STDERR, "  FAIL: {$msg}\n");
    fwrite(STDERR, "        esperado: " . json_encode($esperado) . "\n");
    fwrite(STDERR, "        obtido:   " . json_encode($obtido) . "\n");
}

/** Renderiza a home; $edicoes null = o dado real do site. */
function html_banca(string $idioma, ?array $edicoes = null): string
{
    unset($_GET['ed']);
    ob_start();
    render_banca($idioma, $edicoes);

    return (string) ob_get_clean();
}

/** Só a <section> da linha do tempo (o resto da home não interessa aqui). */
function secao_linha(string $html): string
{
    $i = strpos($html, 'id="gancho-linha"');
    if ($i === false) {
        return '';
    }
    $j = strpos($html, '</section>', $i);

    return substr($html, $i, $j === false ? null : $j - $i);
}

$t_pt = require __DIR__ . '/../src/i18n/pt.php';
$t_en = require __DIR__ . '/../src/i18n/en.php';

// ═══ 0. As strings existem nos DOIS idiomas (nada de hard-code pt) ══════════
foreach (['vazio_fala', 'vazio_pensa', 'vazio_rotulo'] as $chave) {
    eq(true, ($t_pt['banca']['linha_tempo'][$chave] ?? '') !== '', "pt tem a string {$chave}");
    eq(true, ($t_en['banca']['linha_tempo'][$chave] ?? '') !== '', "en tem a string {$chave}");
    eq(
        true,
        ($t_pt['banca']['linha_tempo'][$chave] ?? '') !== ($t_en['banca']['linha_tempo'][$chave] ?? ''),
        "{$chave} foi realmente traduzida (pt != en)"
    );
}

// ═══ 1. O VAZIO ══════════════════════════════════════════════════════════════
// ⚠️ MUDOU DE FIXTURE (a #3 foi PUBLICADA, decisão editorial): o vazio já foi o
// dado real, quando nenhuma edição visual estava no ar. Hoje a linha do site
// tem ponto — mas o estado vazio continua sendo comportamento REAL: é o que o
// leitor vê enquanto a primeira edição visual de um volume não sai, e é para
// onde a seção volta se a última visual for despublicada. Como o dado real não
// o produz mais, ele passa a ser exercitado por um fixture EM MEMÓRIA: o dado
// real com as edições visuais de volta a 'rascunho' (o espelho exato do que a
// camada 2 fazia ao contrário). Nada em data/edicoes.php é tocado.
$edicoes = require __DIR__ . '/../data/edicoes.php';

$sem_visual = [];
foreach ($edicoes as $e) {
    if (($e['na_linha_tempo'] ?? false) === true) {
        $e['estado'] = 'rascunho';
    }
    $sem_visual[] = $e;
}

$pt = secao_linha(html_banca('pt', $sem_visual));
$en = secao_linha(html_banca('en', $sem_visual));

eq('', '' === $pt ? 'FALTOU A SEÇÃO' : '', 'a seção da linha do tempo existe na home pt');

// a linha é DESENHADA: trilho + um ponto (as MESMAS classes do scrubber real)
eq(true, str_contains($pt, 'class="lt-vazio"'), 'pt: a cena do vazio-com-graça está lá');
eq(true, str_contains($pt, 'lt-trilho'), 'pt: o trilho da linha aparece mesmo sem pontos');
eq(true, str_contains($pt, 'lt-marca'), 'pt: o ponto do próximo marco aparece');
eq(true, str_contains($pt, 'lt-rot'), 'pt: o ponto vem com rótulo');
eq(true, str_contains($pt, (string) $t_pt['banca']['linha_tempo']['vazio_rotulo']), 'pt: o rótulo do ponto futuro é o do i18n');

// o ponto está APAGADO: data-on="1" é o estado ACESO do scrubber (ciano)
eq(false, str_contains($pt, 'data-on="1"'), 'pt: nenhum ponto aceso (o vazio não finge que a linha acendeu)');

// o desenho é decorativo: quem fala com o leitor é o texto, não o trilho
eq(true, str_contains($pt, 'aria-hidden="true"'), 'pt: a cena desenhada é decorativa para o leitor de tela');

// a voz do Gus no lugar da nota seca
eq(true, str_contains($pt, 'gus@glyfesse&gt;'), 'pt: quem fala é o Gus (prompt dele)');
eq(true, str_contains($pt, h((string) $t_pt['banca']['linha_tempo']['vazio_fala'])), 'pt: a fala do Gus saiu');
eq(true, str_contains($pt, h((string) $t_pt['banca']['linha_tempo']['vazio_pensa'])), 'pt: o pensamento (//) do Gus saiu');
eq(true, str_contains($pt, '//'), 'pt: o pensamento vem com o prefixo //');

// sem pontos não há o que o JS monte: a lista estática nem existe
eq(false, str_contains($pt, 'id="lt-lista"'), 'pt: sem pontos, nenhuma lista para o scrubber montar');
eq(false, str_contains($pt, 'lt-item'), 'pt: nenhum item de linha do tempo vazado');

// EN: a mesma cena, na língua certa
eq(true, str_contains($en, 'class="lt-vazio"'), 'en: a cena do vazio-com-graça está lá');
eq(true, str_contains($en, h((string) $t_en['banca']['linha_tempo']['vazio_fala'])), 'en: a fala do Gus em inglês');
eq(true, str_contains($en, h((string) $t_en['banca']['linha_tempo']['vazio_pensa'])), 'en: o pensamento do Gus em inglês');
eq(false, str_contains($en, (string) $t_pt['banca']['linha_tempo']['vazio_fala']), 'en: nada da fala em português vazou');
eq(false, str_contains($en, (string) $t_pt['banca']['linha_tempo']['vazio_rotulo']), 'en: nem o rótulo em português');

// ═══ 2. COM PONTO: o caminho de sempre, agora no DADO REAL ══════════════════
// Enquanto a #3 era rascunho, este bloco tinha que publicá-la em memória. Com
// ela no ar, quem prova o caminho com ponto é o dado de verdade — e o teste
// ficou mais forte: qualquer regressão no scrubber quebra contra a produção.
$com_ponto = secao_linha(html_banca('pt'));

eq(true, str_contains($com_ponto, 'id="lt-lista"'), 'com 1 ponto: a lista estática (fonte do scrubber) volta');
eq(true, str_contains($com_ponto, 'data-num="3"'), 'com 1 ponto: a #3 (publicada, visual, com frame) é o ponto da linha');
eq(true, str_contains($com_ponto, 'data-rotulo='), 'com 1 ponto: o rótulo curto da marca vai no data-*');
eq(false, str_contains($com_ponto, 'class="lt-vazio"'), 'com 1 ponto: o vazio-com-graça some');

// ═══ 3. O GUARD ANTI-RASCUNHO (mudou de fixture, não de valor) ══════════════
// A #3 era o rascunho que provava "rascunho não entra na linha". Publicada ela,
// o fixture passa a ser a #4 — o exemplo de drip que o data/edicoes.php mantém
// de propósito, e que já nasce com na_linha_tempo => true.
// ⚠️ A #4 nasce SEM frame (para não spoilar), e edição sem frame não vira ponto
// de jeito nenhum: o teste passaria mesmo com o filtro anti-rascunho quebrado.
// Por isso o frame é injetado AQUI, em memória — assim a ÚNICA coisa que segura
// a #4 fora do scrubber é o estado 'rascunho'.
$por_numero = [];
foreach ($edicoes as $e) {
    $por_numero[(int) $e['numero']] = $e;
}
eq('rascunho', (string) ($por_numero[4]['estado'] ?? ''), 'pré-condição: a #4 é o rascunho que serve de fixture deste guard');
eq(true, ($por_numero[4]['na_linha_tempo'] ?? false) === true, 'pré-condição: a #4 é da era visual (só o estado a segura fora)');

$rascunho_visual = [];
foreach ($edicoes as $e) {
    if ((int) $e['numero'] === 4) {
        $e['frame']        = '/assets/frames/edicao-3.png'; // um frame qualquer que exista em disco
        $e['frame_alt_pt'] = 'frame de teste';
        $e['frame_alt_en'] = 'test frame';
    }
    $rascunho_visual[] = $e;
}
$com_rascunho = secao_linha(html_banca('pt', $rascunho_visual));

eq(true, str_contains($com_rascunho, 'data-num="3"'), 'controle: a #3 (publicada) continua sendo ponto da linha');
eq(false, str_contains($com_rascunho, 'data-num="4"'), 'guard: a #4 (RASCUNHO, visual E com frame) fica fora da linha');

if ($falhas > 0) {
    fwrite(STDERR, "\n{$falhas} de {$n} asserções FALHARAM\n");
    exit(1);
}
echo "ALL GREEN ({$n} asserções)\n";
