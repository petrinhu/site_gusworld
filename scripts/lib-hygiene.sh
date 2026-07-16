#!/usr/bin/env bash
# scripts/lib-hygiene.sh - helpers de higiene de conteudo (compartilhado
# por deploy.sh e preci.sh).
#
# ⚠️ A LISTA NEGRA do nome de batismo real do filho do lider NAO vive aqui.
# Ela fica em scripts/.name-blocklist, que e GITIGNORED e NUNCA sobe ao repo.
# Assim o guarda funciona sem que o proprio guarda vaze o nome no conteudo
# rastreado. So "Gus" / "Gus Dragon" e permitido em arquivo versionado.
# Ver docs/DEFINITION-OF-DONE.md e docs/CONVENCOES-JS-PHP.md.

HYGIENE_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
HYGIENE_BLOCKLIST="${HYGIENE_BLOCKLIST:-$HYGIENE_DIR/.name-blocklist}"

# Ecoa os padroes ERE de nome bloqueado, um por linha (ignora #comentario e
# linhas vazias). Sai com 1 se a lista local nao existir - o chamador decide
# se avisa (pre-push) ou bloqueia (deploy de producao, fail-safe).
hygiene_name_patterns() {
  [[ -f "$HYGIENE_BLOCKLIST" ]] || return 1
  grep -vE '^[[:space:]]*(#|$)' "$HYGIENE_BLOCKLIST" || true
}

# Junta os padroes num unico ERE "a|b|c". Sai com 1 se a lista nao existir.
hygiene_name_ere() {
  local p
  p="$(hygiene_name_patterns)" || return 1
  [[ -n "$p" ]] || return 1
  paste -sd'|' <<<"$p"
}
