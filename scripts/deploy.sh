#!/usr/bin/env bash
# scripts/deploy.sh - publica o gusworld.site na Hostinger.
#
# MANUAL por decisao do lider (2026-07-16): `git push` salva no Codeberg,
# ESTE script publica na producao. Separa "salvar" de "publicar", coerente
# com "producao so com autorizacao por ocasiao". Nada de deploy automatico
# no push, nada de versionamento (git-cliff/tag) por enquanto: o site ainda
# e uma pagina. Isso entra quando a Glyfesse #1 real subir.
#
# O que faz:
#   1. Sanity: rsync/ssh presentes; public_html/ existe; index.html existe.
#   2. Higiene: barra o deploy se houver nome real de menor no que vai subir.
#   3. rsync -az public_html/ -> Hostinger, com --delete + allowlist (protege
#      conteudo server-only legitimo, ex.: ../_arquivo_default esta FORA de
#      public_html entao nao e tocado; dentro, protege .htaccess e afins).
#   4. Verificacao no ar: a home responde 200 e serve a pagina certa.
#
# Uso:
#   ./scripts/deploy.sh              publica
#   ./scripts/deploy.sh --dry-run    mostra o que faria, sem enviar nada
#
# Acesso: alias ssh `hostinger` (porta 65002, chave id_ed25519). Regra de
# ordem: MCP > API > SSH; a API da Hostinger NAO faz upload, entao aqui e SSH.

set -euo pipefail

# --- localizacao (roda de qualquer lugar) ---
ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

LOCAL="public_html/"
REMOTE="hostinger:domains/gusworld.site/public_html/"
URL="https://gusworld.site/"

DRY=0
[[ "${1:-}" == "--dry-run" ]] && DRY=1

C_OK=$'\033[0;32m'; C_WARN=$'\033[0;33m'; C_ERR=$'\033[0;31m'; C_DIM=$'\033[2m'; C_NC=$'\033[0m'
say(){ printf '%s\n' "$*"; }
die(){ printf '%s%s%s\n' "$C_ERR" "$*" "$C_NC" >&2; exit 1; }

# --- 1. sanity ---
command -v rsync >/dev/null || die "rsync nao encontrado."
command -v ssh   >/dev/null || die "ssh nao encontrado."
[[ -d "$LOCAL" ]]           || die "public_html/ nao existe."
[[ -f "public_html/index.html" ]] || die "public_html/index.html nao existe."

# --- 2. higiene: nome real de menor nunca sobe (regra global) ---
# o filho do lider so aparece como "Gus Dragon"; nome de batismo, nunca.
# A lista negra vive em scripts/.name-blocklist (gitignored): o nome real
# NAO fica neste script rastreado. Ver scripts/lib-hygiene.sh.
source "$ROOT/scripts/lib-hygiene.sh"
if _ere="$(hygiene_name_ere)"; then
  if grep -rniE "$_ere" public_html/ 2>/dev/null | grep -qv -i 'iago'; then
    die "HIGIENE: nome real de menor encontrado em public_html/. Deploy abortado."
  fi
else
  die "HIGIENE: scripts/.name-blocklist ausente - nao da pra verificar nome de menor. Deploy abortado (fail-safe)."
fi

# --- 3. rsync ---
# allowlist: propaga delecoes do repo SEM apagar arquivos server-only legitimos.
RSYNC_EXCLUDE=(
  --exclude='.htaccess'        # se um dia existir, e config de servidor
  --exclude='.well-known/'     # verificacoes de dominio / ACME
  --exclude='db_config.php'    # segredo, se houver backend algum dia
  --exclude='*.log'
)

RSYNC_FLAGS=(-az --delete --human-readable "${RSYNC_EXCLUDE[@]}" -e ssh)
[[ $DRY == 1 ]] && RSYNC_FLAGS+=(--dry-run --itemize-changes)

say "${C_DIM}== gusworld.site :: deploy ==${C_NC}"
say "  local:  $LOCAL"
say "  remoto: $REMOTE"
[[ $DRY == 1 ]] && say "${C_WARN}  DRY-RUN (nada sera enviado)${C_NC}"

rsync "${RSYNC_FLAGS[@]}" "$LOCAL" "$REMOTE"

if [[ $DRY == 1 ]]; then
  say "${C_WARN}dry-run: nada foi publicado.${C_NC}"
  exit 0
fi

# --- 4. verificacao no ar (nao confiar no upload; conferir o que o dominio serve) ---
say "${C_DIM}verificando $URL ...${C_NC}"
sleep 2
code=$(curl -sS -o /tmp/gw_deploy_check.html -w '%{http_code}' -m 20 -A 'deploy-check' "$URL" || echo "000")
if [[ "$code" != "200" ]]; then
  die "no ar retornou HTTP $code (esperado 200). Confira o dominio/DNS."
fi
if ! grep -qi 'SOON\|GUSWORLD\|glyfesse' /tmp/gw_deploy_check.html; then
  say "${C_WARN}AVISO: 200 OK, mas nao achei o conteudo esperado no HTML servido."
  say "  (o CDN da Hostinger pode levar alguns minutos para propagar.)${C_NC}"
else
  say "${C_OK}publicado. $URL serve a pagina certa (HTTP 200).${C_NC}"
fi
