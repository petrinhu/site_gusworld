#!/usr/bin/env bash
# scripts/preci.sh - gate de pre-push dos mini-apps (quadradinho e afins).
#
# NAO esta ativado por padrao (nenhum agent mexe na config git do usuario).
# Pra ligar como hook automatico, o lider roda:
#   git config core.hooksPath .githooks
# (.githooks/pre-push chama este script antes de todo `git push`)
#
# Roda em ordem e FALHA (exit != 0) no primeiro erro. Se tudo passar,
# termina com "ALL GREEN".
#   1. testes puros dos mini-apps (node --test + node:assert - ZERO npm/vitest/jest)
#   2. varredura de segredo versionado
#   3. varredura de nome de menor (ver NOTA abaixo - e TODO de proposito)
#   4. validador HTML (vnu/tidy) - se nenhum estiver no PATH, PULA com aviso
#
# Teste e DEV/CI, nunca runtime: o Hostinger Premium (producao) nao tem
# Node - isso so roda na maquina de dev / no hook local.

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

C_OK=$'\033[0;32m'; C_WARN=$'\033[0;33m'; C_ERR=$'\033[0;31m'; C_DIM=$'\033[2m'; C_NC=$'\033[0m'
say(){ printf '%s\n' "$*"; }
die(){ printf '%s%s%s\n' "$C_ERR" "$*" "$C_NC" >&2; exit 1; }

say "${C_DIM}== preci :: gate de pre-push ==${C_NC}"

# --- 1. testes puros dos mini-apps ---
command -v node >/dev/null || die "node nao encontrado (teste e DEV/CI, roda na maquina de dev)."
say "${C_DIM}[1/4] node --test dos mini-apps...${C_NC}"
# NOTA: `node --test <dir>/` sem glob NAO descobre os arquivos nesta versao
# de Node (confirmado v22.22.2: precisa de padrao glob explicito, ou
# nenhum argumento pra auto-discovery no cwd). Por isso o glob abaixo.
node --test 'docs/design/mockups/js/**/*.test.js' || die "testes falharam. Corrija antes de fazer push."

# --- 2. segredo versionado ---
say "${C_DIM}[2/4] varredura de segredo...${C_NC}"
SEGREDO_PADRAO='sk-[A-Za-z0-9]{10,}|api[_-]?key\s*[:=]|BEGIN (RSA |EC |OPENSSH )?PRIVATE KEY|token\s*=|senha\s*=|password\s*=|AKIA[0-9A-Z]{16}'
if git grep -InE "$SEGREDO_PADRAO" -- . 2>/dev/null; then
  die "HIGIENE: possivel segredo encontrado no versionado (linhas acima). Push abortado."
fi

# --- 3. nome de menor ---
# TODO(lider): a lista negra do nome de batismo real do filho NAO esta aqui
# de proposito - este script (e o agent que o escreveu) nao a possui e NAO
# deve inventa-la. So "Gus" / "Gus Dragon" e permitido versionado. A
# higiene do auto-push do repo (regra global, fora deste script) ja cobre
# isso hoje; quando o lider fornecer o padrao exato, plugar aqui um
# `git grep -InE` analogo ao ja existente em scripts/deploy.sh.
say "${C_DIM}[3/4] varredura de nome de menor...${C_NC}"
say "${C_WARN}  aviso: check de nome de menor e TODO (ver comentario no script) - nao bloqueia por si so aqui.${C_NC}"

# --- 4. validador HTML (opcional: nao falha por ferramenta ausente) ---
say "${C_DIM}[4/4] validador HTML...${C_NC}"
if command -v vnu >/dev/null 2>&1; then
  vnu docs/design/mockups/*.html || die "vnu encontrou erro de HTML."
elif command -v tidy >/dev/null 2>&1; then
  erro=0
  for f in docs/design/mockups/*.html; do
    # tidy: exit 0 = ok, 1 = so avisos (nao bloqueia), >=2 = erro de verdade
    if tidy -qe "$f" >/dev/null 2>&1; then code=0; else code=$?; fi
    if [[ $code -ge 2 ]]; then say "${C_ERR}  erro de HTML em $f${C_NC}"; erro=1; fi
  done
  [[ $erro -eq 1 ]] && die "tidy encontrou erro(s) de HTML."
else
  say "${C_WARN}  vnu/tidy ausentes no PATH - pulando validacao HTML (nao bloqueia).${C_NC}"
fi

say "${C_OK}ALL GREEN${C_NC}"
