#!/usr/bin/env bash
# preview-edicao.sh — sobe um `php -S` local que renderiza uma edicao em
# RASCUNHO como se estivesse publicada, SEM tocar data/edicoes.php.
#
# Por que existe (ED4-MONTAGEM): data/edicoes.php tem `estado => 'rascunho'`
# pra edicao 4 de proposito (a trava que impede vazar edicao nao publicada —
# o site devolve 404). Pra o QA local ver o render antes do publish real, o
# `scripts/preview-router.php` intercepta so as 2 rotas de render_edicao() e
# chama a funcao com o SEAM ja documentado nela (@param $edicoes): uma copia
# do array em memoria, com a edicao-alvo forcada para 'publicada' so nesta
# copia, nunca gravada em disco. O resto do site (CSS/JS/index/api) passa
# direto pro servidor embutido, sem alteracao nenhuma.
#
# Uso:
#   scripts/preview-edicao.sh                # edicao 4, porta 8098
#   scripts/preview-edicao.sh 4 8099          # edicao 4, porta 8099
#
# So serve por HTTP local (127.0.0.1) via `php -S` + requisicao de linha de
# comando (curl). NAO abre navegador, NAO interage com a sessao grafica do
# lider (regra da casa — este e um app de terminal, nao janela).
#
# Read-only sobre data/edicoes.php: nunca escreve nele. Ctrl+C encerra.

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

NUMERO="${1:-4}"
PORTA="${2:-8098}"

command -v php >/dev/null || { printf 'php nao encontrado no PATH.\n' >&2; exit 1; }

printf 'Preview da edicao %s em http://127.0.0.1:%s/pt/edicao.php?slug=edicao-%s\n' \
  "$NUMERO" "$PORTA" "$NUMERO"
printf '  (en: http://127.0.0.1:%s/en/edition.php?slug=edition-%s)\n' "$PORTA" "$NUMERO"
printf 'data/edicoes.php NUNCA e escrito por este script. Ctrl+C encerra.\n\n'

PREVIEW_EDICAO_NUM="$NUMERO" \
  php -S "127.0.0.1:$PORTA" -t "$ROOT/public_html" "$ROOT/scripts/preview-router.php"
