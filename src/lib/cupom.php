<?php

declare(strict_types=1);

/**
 * src/lib/cupom.php — o CÉREBRO COMPARTILHADO do poll do cupom (o ÚNICO backend
 * vivo do site). Uma verdade só, incluída por DOIS chamadores:
 *   - o ENDPOINT (public_html/api/cupom-voto.php) — ESCREVE o voto.
 *   - o RENDER da banca (src/lib/render-banca.php) — LÊ pra mostrar o resultado
 *     server-side (funciona SEM JS) quando o visitante já votou (cookie).
 *
 * O que mora aqui (o que os dois lados PRECISAM concordar):
 *  - CUPOM_OPCOES: a WHITELIST das opções. Casa 1:1 com cupom-core.js (OPCOES).
 *  - os caminhos do storage (FORA de public_html) e o nome do cookie.
 *  - cupom_ler_tally(): lê o tally do JSON, TOLERANTE (ausente/corrompido → zera).
 *  - cupom_percentuais(): converte contagem → PERCENTUAL INTEIRO (maior resto).
 *  - cupom_total(): total interno (só pra decidir "urna vazia" — NUNCA vai à rede).
 *  - cupom_votou_cookie(): lê o cookie funcional booleano "já votou" (zero-dado).
 *
 * ★★ DECISÃO DO LÍDER (2026-07-19): mostra o resultado AO VIVO, mas só em
 * PERCENTUAL — o número ABSOLUTO NUNCA sai do servidor (anti-scraping: um scraper
 * não deduz a contagem crua de um % arredondado). Por isso a conversão
 * contagem→percentual é a fronteira: tudo que cruza pra fora é `pct` inteiro.
 *
 * ⚠️ ESCRITA NÃO mora aqui — cupom_gravar_tally() fica no endpoint (a única peça
 * que escreve), sob flock. Este arquivo é read + transform puros.
 */

// ── a whitelist das opções (casa 1:1 com cupom-core.js OPCOES) ───────────────
const CUPOM_OPCOES = ['mais-jogo', 'mais-bastidores', 'mais-gus'];

// storage FIXO, FORA do public_html (irmão de public_html/, inalcançável pela
// web). __DIR__ = src/lib → ../../data = raiz-do-projeto/data. O endpoint em
// public_html/api chega no MESMO alvo por ../../data.
const CUPOM_STORE = __DIR__ . '/../../data/cupom-votos.json';
// arquivo de lock dedicado: o flock mora nele, não no store (que o rename troca).
const CUPOM_LOCK  = __DIR__ . '/../../data/cupom-votos.lock';

// o cookie funcional "já votou": BOOLEANO, sem ID, sem dado pessoal (compatível
// com ZERO-DADO; é cookie essencial/funcional, sem banner). NÃO é anti-fraude —
// limpar o cookie deixa votar de novo, e tudo bem (poll-brinquedo, sem conta).
const CUPOM_COOKIE      = 'glyfesse_votou';
const CUPOM_COOKIE_VIDA = 60 * 60 * 24 * 180; // ~6 meses (uma "temporada" de edições)

/**
 * Lê o tally do JSON. TOLERANTE: ausente/vazio/corrompido/tipo-errado → zera.
 * Só conta as chaves da whitelist (ignora qualquer lixo que tenha entrado no
 * arquivo). Contador negativo/não-inteiro vira 0. Nunca lança.
 *
 * @return array<string,int>
 */
function cupom_ler_tally(string $path): array
{
    $tally = array_fill_keys(CUPOM_OPCOES, 0);
    if (!is_file($path)) {
        return $tally;
    }
    $raw = @file_get_contents($path);
    if ($raw === false || $raw === '') {
        return $tally;
    }
    $dados = json_decode($raw, true);
    if (!is_array($dados)) {
        return $tally; // corrompido → recomeça do zero
    }
    foreach (CUPOM_OPCOES as $op) {
        $v = $dados[$op] ?? 0;
        if (is_int($v) && $v >= 0) {
            $tally[$op] = $v;
        } elseif (is_float($v) && $v >= 0 && is_finite($v)) {
            $tally[$op] = (int) $v;
        }
        // qualquer outra coisa (string, negativo, NaN, array) fica em 0
    }
    return $tally;
}

/**
 * Total de votos válidos (só a whitelist, só contadores > 0). USO INTERNO: decide
 * se a urna está vazia (server-render mostra "seja o primeiro" em vez de barras).
 * ⚠️ NUNCA exponha este número na rede — é a contagem crua que a Decisão do líder
 * manda esconder.
 *
 * @param array<string,int> $tally
 */
function cupom_total(array $tally): int
{
    $total = 0;
    foreach (CUPOM_OPCOES as $op) {
        $v = $tally[$op] ?? 0;
        if (is_int($v) && $v > 0) {
            $total += $v;
        }
    }
    return $total;
}

/**
 * Converte o tally (contagem crua) em PERCENTUAIS INTEIROS que somam 100 — método
 * do MAIOR RESTO (largest remainder / Hamilton): dá o piso de cada e distribui a
 * sobra pras maiores frações restantes, desempatando pela ordem da whitelist
 * (determinístico, independe da estabilidade do sort). Com 0 votos devolve tudo 0
 * (sem divisão por zero) — o chamador decide mostrar "urna vazia".
 *
 * ★★ ESTA é a fronteira anti-scraping: o resultado desta função é a ÚNICA forma
 * do tally que cruza pra fora. O absoluto fica aqui dentro.
 *
 * ⚠️ ESPELHO: o gêmeo puro em JS é CupomCore.percentuais() (cupom-core.js) — o
 * MESMO algoritmo, testado em node --test. Mudou aqui, mude lá (e nos testes).
 *
 * @param array<string,int> $tally
 * @return array<string,int>  op => percentual inteiro (0..100), soma == 100 (ou tudo 0)
 */
function cupom_percentuais(array $tally): array
{
    $pct   = array_fill_keys(CUPOM_OPCOES, 0);
    $limpo = [];
    $total = 0;
    foreach (CUPOM_OPCOES as $op) {
        $v = $tally[$op] ?? 0;
        $v = (is_int($v) && $v > 0) ? $v : 0;
        $limpo[$op] = $v;
        $total += $v;
    }
    if ($total <= 0) {
        return $pct; // 0 votos → tudo 0, sem dividir por zero
    }

    $itens = [];
    $soma  = 0;
    $idx   = 0;
    foreach (CUPOM_OPCOES as $op) {
        $exato    = $limpo[$op] * 100 / $total;
        $piso     = (int) floor($exato);
        $pct[$op] = $piso;
        $soma    += $piso;
        $itens[]  = ['op' => $op, 'resto' => $exato - $piso, 'idx' => $idx++];
    }

    // distribui os pontos que faltam pra 100 (0..n-1) pras maiores frações
    $sobra = 100 - $soma;
    usort($itens, static function (array $a, array $b): int {
        if ($a['resto'] !== $b['resto']) {
            return $b['resto'] <=> $a['resto']; // maior resto primeiro
        }
        return $a['idx'] <=> $b['idx'];         // empate → ordem da whitelist (estável)
    });
    $n = count($itens);
    for ($k = 0; $k < $sobra && $k < $n; $k++) {
        $pct[$itens[$k]['op']]++;
    }
    return $pct;
}

/**
 * O visitante já votou nesta "temporada"? Lê o cookie funcional booleano. É o
 * SINAL CANÔNICO do estado votado (o localStorage do cliente é só enhancement).
 * Zero-dado: só um "1", sem ID nem nada pessoal.
 */
function cupom_votou_cookie(): bool
{
    return (string) ($_COOKIE[CUPOM_COOKIE] ?? '') === '1';
}
