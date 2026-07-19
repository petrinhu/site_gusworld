#!/usr/bin/env bash
# scripts/deploy.sh - publica o gusworld.site (site PHP real) na Hostinger.
#
# MANUAL por decisao do lider: `git push` salva no Codeberg, ESTE script publica
# na producao. Separa "salvar" de "publicar". Nao ha deploy automatico no push.
# ⚠️ Rodar SEM --dry-run = GO-LIVE (transforma a "em-breve" no site real). Isso
# e o gate D-GO-LIVE, decisao do lider por ocasiao.
#
# ESTRUTURA RUNTIME (critica): os front controllers em public_html/{pt,en}/*.php
# incluem de `__DIR__ . '/../../src/lib/...'`. De public_html/pt/index.php, o
# `../../` sobe pra RAIZ do dominio. Logo, no servidor precisam existir como
# IRMAOS: domains/gusworld.site/{public_html, src, data}. Este script envia os
# tres. Localmente a mesma arvore: repo tem public_html/ + src/ + data/.
#
# O que faz:
#   1. Sanity: rsync/ssh presentes; public_html/pt/index.php + os alvos de
#      include (src/lib/render-banca.php, data/edicoes.php) existem.
#   2. Higiene: barra o deploy se houver nome real de menor no que vai subir.
#   3. rsync dos 3 dirs pros lugares certos, com --delete + allowlist:
#        public_html/ -> .../public_html/   (conteudo servido)
#        src/         -> .../src/           (lib/i18n/includes/templates)
#        data/        -> .../data/          (edicoes.php + helpers)
#      ⚠️ data/cupom-votos.json + data/*.lock sao RUNTIME (votos ao vivo):
#      excluidos do transfer E protegidos da delecao (nunca clobber).
#   4. Verificacao no ar: a raiz serve a banca (200), path inexistente serve o
#      404 do Gus, /pt/ e /en/ respondem.
#
# Uso:
#   ./scripts/deploy.sh              publica (GO-LIVE)
#   ./scripts/deploy.sh --dry-run    mostra o que faria, sem enviar nada
#
# Acesso: alias ssh `hostinger` (porta 65002, chave id_ed25519). Regra de
# ordem: MCP > API > SSH; a API da Hostinger NAO faz upload, entao aqui e SSH.

set -euo pipefail

# --- localizacao (roda de qualquer lugar) ---
ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

REMOTE_BASE="hostinger:domains/gusworld.site"
URL="https://gusworld.site/"

DRY=0
[[ "${1:-}" == "--dry-run" ]] && DRY=1

C_OK=$'\033[0;32m'; C_WARN=$'\033[0;33m'; C_ERR=$'\033[0;31m'; C_DIM=$'\033[2m'; C_NC=$'\033[0m'
say(){ printf '%s\n' "$*"; }
die(){ printf '%s%s%s\n' "$C_ERR" "$*" "$C_NC" >&2; exit 1; }

# --- 1. sanity ---
command -v rsync >/dev/null || die "rsync nao encontrado."
command -v ssh   >/dev/null || die "ssh nao encontrado."
[[ -d public_html ]] || die "public_html/ nao existe."
[[ -d src ]]         || die "src/ nao existe."
[[ -d data ]]        || die "data/ nao existe."
# a home real e servida por PHP (o .htaccess raiz reescreve / -> /pt/).
[[ -f public_html/pt/index.php ]]    || die "public_html/pt/index.php nao existe (home real)."
# os alvos de include ../../src e ../../data precisam existir pra pagina montar.
[[ -f src/lib/render-banca.php ]]    || die "src/lib/render-banca.php nao existe (alvo de include)."
[[ -f data/edicoes.php ]]            || die "data/edicoes.php nao existe (\$edicoes)."

# --- 2. higiene: nome real de menor nunca sobe (regra global) ---
# o filho do lider so aparece como "Gus Dragon"; nome de batismo, nunca.
# A lista negra vive em scripts/.name-blocklist (gitignored): o nome real
# NAO fica neste script rastreado. Ver scripts/lib-hygiene.sh.
source "$ROOT/scripts/lib-hygiene.sh"
if _ere="$(hygiene_name_ere)"; then
  if grep -rniE "$_ere" public_html/ src/ data/ 2>/dev/null | grep -qv -i 'iago'; then
    die "HIGIENE: nome real de menor encontrado no conteudo a subir. Deploy abortado."
  fi
else
  die "HIGIENE: scripts/.name-blocklist ausente - nao da pra verificar nome de menor. Deploy abortado (fail-safe)."
fi

# --- 3. rsync ---
# Flags comuns. --delete propaga delecoes do repo; arquivos --exclude sao
# tambem PROTEGIDOS da delecao no receiver (default do rsync, sem
# --delete-excluded), entao os dados de runtime remotos ficam intactos.
RSYNC_COMMON=(-az --delete --human-readable -e ssh)
[[ $DRY == 1 ]] && RSYNC_COMMON+=(--dry-run --itemize-changes)

# public_html/: conteudo servido. Protege server-only legitimo dentro da pasta.
#   .well-known/ = desafios ACME/verificacao de dominio criados pelo painel.
#   db_config.php = segredo, se um dia existir um backend com credencial.
#   *.log = logs que a Hostinger possa depositar no docroot.
# (_arquivo_default e DO_NOT_UPLOAD_HERE sao IRMAOS de public_html no servidor,
#  fora do escopo deste rsync — nunca tocados.)
PUBLIC_EXCLUDE=(
  --exclude='.well-known/'
  --exclude='db_config.php'
  --exclude='*.log'
)

# src/: so codigo versionado, sem estado de runtime. --delete limpo.

# data/: ⚠️ os votos ao vivo NAO podem ser sobrescritos nem apagados.
#   cupom-votos.json e *.lock sao gitignored (dev local) e RUNTIME no servidor:
#   o endpoint api/cupom-voto.php os recria se ausentes. Exclui-los do transfer
#   preserva os votos remotos; sem --delete-excluded, o --delete nao os remove.
DATA_EXCLUDE=(
  --exclude='cupom-votos.json'
  --exclude='*.lock'
  --exclude='db_config.php'
  --exclude='*.log'
)

say "${C_DIM}== gusworld.site :: deploy (site PHP) ==${C_NC}"
say "  remoto base: $REMOTE_BASE/"
if [[ $DRY == 1 ]]; then
  say "${C_WARN}  DRY-RUN (nada sera enviado)${C_NC}"
else
  say "${C_ERR}  GO-LIVE: isto publica em PRODUCAO.${C_NC}"
fi

say "${C_DIM}-- public_html/ --${C_NC}"
rsync "${RSYNC_COMMON[@]}" "${PUBLIC_EXCLUDE[@]}" public_html/ "$REMOTE_BASE/public_html/"

say "${C_DIM}-- src/ --${C_NC}"
rsync "${RSYNC_COMMON[@]}" --exclude='*.log' src/ "$REMOTE_BASE/src/"

say "${C_DIM}-- data/ (protege cupom-votos.json + *.lock) --${C_NC}"
rsync "${RSYNC_COMMON[@]}" "${DATA_EXCLUDE[@]}" data/ "$REMOTE_BASE/data/"

if [[ $DRY == 1 ]]; then
  say "${C_WARN}dry-run: nada foi publicado.${C_NC}"
  exit 0
fi

# --- 4. verificacao no ar (nao confiar no upload; conferir o que o dominio serve) ---
say "${C_DIM}verificando $URL ...${C_NC}"
sleep 2

# (a) raiz -> segue o 301 pra /pt/ e serve a BANCA (nao mais a "em-breve").
# caminho fixo, sobrescrito a cada run (sem rm: o hook anti-rm barra remocao).
home="${TMPDIR:-/tmp}/gw_deploy_home.html"
code=$(curl -sSL -o "$home" -w '%{http_code}' -m 20 -A 'deploy-check' "$URL" || echo "000")
[[ "$code" == "200" ]] || die "raiz retornou HTTP $code (esperado 200). Confira dominio/DNS."
if grep -qi 'SOON\|EM BREVE' "$home"; then
  say "${C_WARN}AVISO: a raiz ainda serve a pagina 'em-breve' (achei SOON/EM BREVE)."
  say "  A propagacao do CDN pode levar minutos; reconfira em seguida.${C_NC}"
elif grep -qi 'glyfesse' "$home"; then
  say "${C_OK}raiz OK: serve a banca (Glyfesse, HTTP 200).${C_NC}"
else
  say "${C_WARN}AVISO: 200 OK, mas nao achei 'glyfesse' nem 'SOON' no HTML da raiz.${C_NC}"
fi

# (b) path inexistente -> 404 do Gus.
c404=$(curl -sS -o /dev/null -w '%{http_code}' -m 20 -A 'deploy-check' "${URL}nao-existe-$(date +%s)" || echo "000")
if [[ "$c404" == "404" ]]; then
  say "${C_OK}404 OK: path inexistente retorna HTTP 404.${C_NC}"
else
  say "${C_WARN}AVISO: path inexistente retornou HTTP $c404 (esperado 404).${C_NC}"
fi

# (c) /pt/ e /en/ respondem.
for lang in pt en; do
  cl=$(curl -sSL -o /dev/null -w '%{http_code}' -m 20 -A 'deploy-check' "${URL}${lang}/" || echo "000")
  if [[ "$cl" == "200" ]]; then
    say "${C_OK}/${lang}/ OK (HTTP 200).${C_NC}"
  else
    say "${C_WARN}AVISO: /${lang}/ retornou HTTP $cl (esperado 200).${C_NC}"
  fi
done

say "${C_DIM}verificacao concluida.${C_NC}"
