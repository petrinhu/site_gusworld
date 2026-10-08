#!/usr/bin/env bash
# scripts/instalar-gancho.sh - liga o gate de pre-push do projeto (item GANCHO-PREPUSH).
#
# Grava .git/hooks/pre-push com UMA linha que executa .githooks/pre-push. Mantem
# os ganchos globais do usuario (o pre-push global repassa para este arquivo).
#
#   scripts/instalar-gancho.sh                instala no repo deste script
#   scripts/instalar-gancho.sh --repo DIR     instala no repo DIR (o autoteste usa)
#
# Idempotente: se o gancho ja e exatamente o esperado, diz "ja instalado" e sai 0.
# Se existe um pre-push DIFERENTE, recusa (sai 1) e nao toca nele.

set -euo pipefail

AQUI="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO="$(cd "$AQUI/.." && pwd)"
while [[ $# -gt 0 ]]; do
  case "$1" in
    --repo) [[ $# -ge 2 ]] || { echo "uso: --repo DIR" >&2; exit 2; }; REPO="$(cd "$2" && pwd)"; shift 2 ;;
    *) echo "argumento desconhecido: $1" >&2; exit 2 ;;
  esac
done

COMMON="$(git -C "$REPO" rev-parse --path-format=absolute --git-common-dir)" \
  || { echo "$REPO nao e um repositorio git." >&2; exit 1; }
DESTINO="$COMMON/hooks/pre-push"

ESPERADO=$'#!/bin/sh\nexec "$(git rev-parse --show-toplevel)/.githooks/pre-push" "$@"\n'

if [[ -e "$DESTINO" || -L "$DESTINO" ]]; then
  if [[ ! -L "$DESTINO" && "$(cat "$DESTINO"; printf x)" == "${ESPERADO}x" ]]; then
    chmod 755 "$DESTINO"
    echo "ja instalado: $DESTINO"
    exit 0
  fi
  echo "RECUSADO: $DESTINO ja existe e e diferente do esperado. Nao sobrescrevo; confira e apague de proposito." >&2
  exit 1
fi

mkdir -p "$COMMON/hooks"
printf '%s' "$ESPERADO" > "$DESTINO"
chmod 755 "$DESTINO"
echo "instalado: $DESTINO"
