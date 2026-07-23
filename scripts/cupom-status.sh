#!/usr/bin/env bash
# cupom-status.sh — mostra a APURACAO do cupom da Glyfesse, direto da producao.
#
# Por que existe: a urna (data/cupom-votos.json) mora FORA do public_html no
# servidor, entao nao da pra ver pela web (de proposito: o numero absoluto nunca
# sai do servidor, so o percentual — decisao do lider, 2026-07-19). O arquivo
# local NAO e a urna: o deploy protege o do servidor e nunca sobrescreve.
# Logo, a unica forma de conferir e ler o arquivo remoto por SSH. Isto aqui faz
# isso e formata.
#
# Uso:
#   scripts/cupom-status.sh          # apuracao atual (contagem + percentual)
#   scripts/cupom-status.sh --json   # o JSON cru do servidor, sem formatacao
#
# Read-only: nao escreve nada, nem local nem remoto. Rodar quantas vezes quiser.
# Acesso: alias ssh `hostinger` (o mesmo do deploy).

set -euo pipefail

REMOTE_HOST="hostinger"
REMOTE_FILE="domains/gusworld.site/data/cupom-votos.json"

C_OK=$'\033[0;32m'; C_DIM=$'\033[2m'; C_ERR=$'\033[0;31m'; C_NC=$'\033[0m'
die(){ printf '%s%s%s\n' "$C_ERR" "$*" "$C_NC" >&2; exit 1; }

command -v ssh >/dev/null || die "ssh nao encontrado."

JSON="$(ssh -o ConnectTimeout=20 -o BatchMode=yes "$REMOTE_HOST" \
        "cat '$REMOTE_FILE' 2>/dev/null || true")" \
  || die "nao consegui falar com o servidor (ssh $REMOTE_HOST)."

if [[ -z "${JSON//[[:space:]]/}" ]]; then
  printf '%s\n' "A urna esta vazia: nenhum voto ate agora."
  exit 0
fi

if [[ "${1:-}" == "--json" ]]; then
  printf '%s\n' "$JSON"
  exit 0
fi

# a apuracao usa o MESMO codigo do site (src/lib/cupom.php), pra o percentual
# aqui bater exatamente com o que o visitante ve na tela.
ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
command -v php >/dev/null || { printf '%s\n' "$JSON"; exit 0; }

JSON="$JSON" ROOT_LIB="$ROOT/src/lib/cupom.php" php -d error_reporting=E_ALL -r '
require getenv("ROOT_LIB");
$tally = json_decode(getenv("JSON"), true) ?: [];
$limpo = [];
foreach (CUPOM_OPCOES as $op) {
    $v = $tally[$op] ?? 0;
    $limpo[$op] = (is_int($v) && $v > 0) ? $v : 0;
}
$total = cupom_total($limpo);
$pct   = cupom_percentuais($limpo);
$rotulo = [
    "mais-jogo"       => "Mais do jogo",
    "mais-bastidores" => "Mais bastidores",
    "mais-gus"        => "Mais o Gus",
];
printf("\n  APURACAO DO CUPOM  %s(gusworld.site, ao vivo)%s\n\n", "\033[2m", "\033[0m");
foreach (CUPOM_OPCOES as $op) {
    $barra = str_repeat("#", (int) round($pct[$op] / 4));
    printf("  %-18s %3d%%  %-25s %d voto%s\n",
        $rotulo[$op] ?? $op, $pct[$op], $barra,
        $limpo[$op], $limpo[$op] === 1 ? "" : "s");
}
printf("\n  %sTotal: %d voto%s%s\n\n", "\033[0;32m", $total, $total === 1 ? "" : "s", "\033[0m");
' 2>/dev/null || printf '%s\n' "$JSON"
