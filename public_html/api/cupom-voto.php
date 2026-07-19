<?php

declare(strict_types=1);

/**
 * public_html/api/cupom-voto.php — o POLL do cupom. O UNICO backend VIVO do site
 * (ADR-001 §Decisao; memoria project-d-stack). E a UNICA superficie de ESCRITA
 * exposta → e a peca com cuidado EXTRA de seguranca (a onda de auditoria W9 cobra).
 *
 * DECISAO DO LIDER (2026-07-17): storage = ARQUIVO JSON + flock, ZERO SQL, zero
 * banco → zero SQLi. Persistir os votos num JSON com escrita ATOMICA (tmp+rename)
 * sob flock(LOCK_EX) pra concorrencia nao corromper.
 *
 * ★★ SEGURANCA (as invariantes que este arquivo garante):
 *  - POST-only (GET/outros → 405 + Allow).
 *  - WHITELIST das opcoes (CUPOM_OPCOES): qualquer id fora do conjunto → 400. O
 *    input NUNCA e confiado; nada dele toca o filesystem.
 *  - O filename do storage e FIXO no codigo (CUPOM_STORE) — jamais vem do input
 *    → sem path traversal.
 *  - Corpo LIMITADO (CUPOM_MAX_BODY): corpo grande → 413.
 *  - ZERO-DADO: grava SO { "opcao_id": contador }. Nada de IP, cookie, User-Agent,
 *    timestamp por-voto — nada pessoal. Anti-spam e SUAVE e no cliente (localStorage);
 *    o servidor aceita (o lider aceita "12 votos"; anti-OE). SEM rate-limit por IP
 *    (violaria ZERO-DADO).
 *  - Parse TOLERANTE: arquivo ausente/corrompido → recomeca do zero, nunca 500 feio.
 *  - Cache-Control: no-store (o /api/* faz bypass da CDN — ADR §Cache/CDN por rota).
 *  - Erros: mensagem clara + status certo, SEM stack trace / SEM vazar caminho.
 *
 * ★★ DECISAO DO LIDER (2026-07-19): a resposta mostra o resultado AO VIVO, mas
 * SO em PERCENTUAL — o numero ABSOLUTO NUNCA sai daqui (anti-scraping: um scraper
 * nao deduz a contagem crua de um % arredondado). A conversao contagem→percentual
 * e a lib compartilhada (cupom_percentuais); a resposta leva `pct`, jamais `votos`.
 * No sucesso o endpoint tambem seta um COOKIE funcional booleano ("ja votou"),
 * o sinal canonico do estado votado (server-render mostra o resultado no reload).
 *
 * A WHITELIST (CUPOM_OPCOES), os caminhos do storage, o nome do cookie e o
 * read+transform do tally moram em src/lib/cupom.php — a MESMA verdade que o
 * render da banca usa pra mostrar o resultado sem-JS. So a ESCRITA
 * (cupom_gravar_tally) fica aqui: e a unica peca que escreve.
 */

require_once __DIR__ . '/../../src/lib/cupom.php';

// o corpo e minusculo ({"opcao":"mais-bastidores"} ~ 34 bytes). Teto folgado.
const CUPOM_MAX_BODY = 256;

// expor o resultado na resposta? Quando true, a resposta leva `pct` (PERCENTUAL
// inteiro, NUNCA a contagem crua). O lider pode virar false pra ocultar o tally
// 100% ate a revelacao editorial — ai o cliente cai no "obrigado" sem barras.
const CUPOM_EXPOR_PCT = true;

header('Cache-Control: no-store, max-age=0');
header('Vary: Accept');

// ─────────────────────────────────────────────────────────────────────────────
// helpers

/** O cliente quer HTML (navegacao nativa do form sem-JS) em vez de JSON (fetch)? */
function cupom_quer_html(): bool
{
    $accept = (string) ($_SERVER['HTTP_ACCEPT'] ?? '');
    // fetch do nosso JS manda Accept: application/json → JSON. Navegador nativo
    // manda text/html sem application/json → HTML amigavel.
    if (stripos($accept, 'application/json') !== false) {
        return false;
    }
    return stripos($accept, 'text/html') !== false;
}

/** Idioma seguro (whitelist) pro link-de-volta da pagina HTML sem-JS. */
function cupom_lang(): string
{
    $l = (string) ($_POST['lang'] ?? '');
    return in_array($l, ['pt', 'en'], true) ? $l : 'pt';
}

/**
 * Responde e ENCERRA. JSON por padrao; HTML minimo in-world quando o cliente
 * navegou (form nativo sem-JS). Nunca vaza caminho nem stack.
 *
 * @param array<string,mixed> $payload
 */
function cupom_responder(int $status, array $payload): never
{
    http_response_code($status);
    if (cupom_quer_html()) {
        $lang = cupom_lang();
        $ok   = ($payload['ok'] ?? false) === true;
        header('Content-Type: text/html; charset=utf-8');
        $titulo = $ok
            ? ($lang === 'en' ? 'Vote registered' : 'Voto registrado')
            : ($lang === 'en' ? 'Could not vote' : 'Nao deu pra votar');
        $msg = $ok
            ? ($lang === 'en'
                ? 'Your coupon is in the box. The result comes in the next edition.'
                : 'Seu cupom entrou na urna. O resultado sai na proxima edicao.')
            : ($lang === 'en'
                ? 'The coupon came back. Try again from the stand.'
                : 'O cupom voltou. Tente de novo pela banca.');
        $volta = $lang === 'en' ? 'Back to the stand' : 'Voltar a banca';
        $href  = '/' . $lang . '/';
        echo "<!doctype html>\n<html lang=\"" . htmlspecialchars($lang, ENT_QUOTES) . "\">\n"
           . "<head><meta charset=\"utf-8\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">"
           . "<meta name=\"robots\" content=\"noindex\">"
           . "<title>" . htmlspecialchars($titulo, ENT_QUOTES) . " · GLYFESSE</title></head>\n"
           . "<body style=\"font-family:Georgia,serif;max-width:34rem;margin:14vh auto;padding:0 6vw;line-height:1.6;color:#1a1614;background:#f4efe4\">\n"
           . "<h1 style=\"font-size:1.4rem\">" . htmlspecialchars($titulo, ENT_QUOTES) . "</h1>\n"
           . "<p>" . htmlspecialchars($msg, ENT_QUOTES) . "</p>\n"
           . "<p><a href=\"" . htmlspecialchars($href, ENT_QUOTES) . "\" style=\"color:#0d5e67\">&larr; "
           . htmlspecialchars($volta, ENT_QUOTES) . "</a></p>\n"
           . "</body></html>\n";
        exit;
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

// cupom_ler_tally() / cupom_percentuais() / cupom_votou_cookie() e as consts
// (CUPOM_OPCOES, CUPOM_STORE, CUPOM_LOCK, CUPOM_COOKIE) vem de src/lib/cupom.php.

/**
 * Grava o tally de forma ATOMICA: escreve num tmp no MESMO diretorio e rename()
 * (rename e atomico no mesmo filesystem → um leitor nunca ve arquivo pela metade).
 * Deve rodar sob o flock do chamador. Devolve false se algo falhou (o chamador
 * responde 503 sem vazar o motivo).
 *
 * @param array<string,int> $tally
 */
function cupom_gravar_tally(string $path, array $tally): bool
{
    $dir = dirname($path);
    $json = json_encode($tally, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    if ($json === false) {
        return false;
    }
    $tmp = @tempnam($dir, 'cvt');
    if ($tmp === false) {
        return false;
    }
    if (@file_put_contents($tmp, $json) === false) {
        @unlink($tmp);
        return false;
    }
    @chmod($tmp, 0640);
    if (!@rename($tmp, $path)) {
        @unlink($tmp);
        return false;
    }
    return true;
}

// ─────────────────────────────────────────────────────────────────────────────
// 1) metodo: POST-only

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Allow: POST');
    cupom_responder(405, ['ok' => false, 'erro' => 'metodo_nao_permitido']);
}

// 2) tamanho do corpo: rejeita corpo grande ANTES de ler (defesa barata)
$clen = (int) ($_SERVER['CONTENT_LENGTH'] ?? 0);
if ($clen > CUPOM_MAX_BODY) {
    cupom_responder(413, ['ok' => false, 'erro' => 'corpo_grande']);
}

// 3) extrai a opcao. Aceita application/json (fetch) E form-urlencoded (form
//    nativo sem-JS). Qualquer outro Content-Type cai no $_POST (multipart/form
//    o PHP ja parseia); se nada vier, `opcao` fica '' e a whitelist barra.
$ctype = strtolower((string) ($_SERVER['CONTENT_TYPE'] ?? ''));
$opcao = '';

if (str_contains($ctype, 'application/json')) {
    // le no maximo CUPOM_MAX_BODY+1 bytes do corpo cru
    $corpo = (string) @file_get_contents('php://input', false, null, 0, CUPOM_MAX_BODY + 1);
    if (strlen($corpo) > CUPOM_MAX_BODY) {
        cupom_responder(413, ['ok' => false, 'erro' => 'corpo_grande']);
    }
    $json = json_decode($corpo, true);
    if (is_array($json) && isset($json['opcao']) && is_string($json['opcao'])) {
        $opcao = $json['opcao'];
    }
} else {
    // form-urlencoded / multipart: o PHP populou $_POST
    $raw = $_POST['opcao'] ?? '';
    if (is_string($raw)) {
        $opcao = $raw;
    }
}

// tamanho defensivo do proprio valor (o maior id da whitelist e curto)
if (strlen($opcao) > 64) {
    $opcao = '';
}

// 4) WHITELIST: a UNICA porta. Nada fora do conjunto grava.
if (!in_array($opcao, CUPOM_OPCOES, true)) {
    cupom_responder(400, ['ok' => false, 'erro' => 'opcao_invalida']);
}

// 5) registra sob flock(LOCK_EX): read-modify-write ATOMICO. A secao critica
//    protege o JSON de escritas concorrentes (2 votos ao mesmo tempo nao se
//    perdem nem corrompem o arquivo).
$lock = @fopen(CUPOM_LOCK, 'c');
if ($lock === false || !flock($lock, LOCK_EX)) {
    if (is_resource($lock)) {
        fclose($lock);
    }
    cupom_responder(503, ['ok' => false, 'erro' => 'indisponivel']);
}

$tally = cupom_ler_tally(CUPOM_STORE);
$tally[$opcao]++;
$gravou = cupom_gravar_tally(CUPOM_STORE, $tally);

flock($lock, LOCK_UN);
fclose($lock);

if (!$gravou) {
    // nao conseguiu persistir (disco cheio / permissao): erro honesto, sem vazar
    cupom_responder(503, ['ok' => false, 'erro' => 'indisponivel']);
}

// 6) sucesso. Seta o COOKIE funcional booleano (o sinal canonico do "ja votou":
//    no reload o server-render mostra o resultado sem-JS). HttpOnly — so o PHP o
//    le (o cliente decide o estado pelo pct da resposta / localStorage); Secure so
//    em https (dev roda http). SameSite=Lax. Zero-dado: so um "1", sem ID.
//    setcookie() manda um header → tem que vir ANTES de qualquer echo do corpo.
$secure = (!empty($_SERVER['HTTPS']) && strtolower((string) $_SERVER['HTTPS']) !== 'off')
    || ((string) ($_SERVER['SERVER_PORT'] ?? '') === '443');
setcookie(CUPOM_COOKIE, '1', [
    'expires'  => time() + CUPOM_COOKIE_VIDA,
    'path'     => '/',
    'samesite' => 'Lax',
    'secure'   => $secure,
    'httponly' => true,
]);

// A resposta leva SO o PERCENTUAL (Decisao do lider): calculado no servidor a
// partir do tally, NUNCA a contagem crua. `pct` inteiro somando 100 (ou tudo 0).
// ⚠️ Nada de `votos` absoluto aqui — senao um scraper leria o numero direto.
$resposta = ['ok' => true, 'opcao' => $opcao];
if (CUPOM_EXPOR_PCT) {
    $resposta['pct'] = cupom_percentuais($tally);
}
cupom_responder(200, $resposta);
