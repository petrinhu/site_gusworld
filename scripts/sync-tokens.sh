#!/usr/bin/env bash
# sync-tokens.sh — gera o tokens.css de PRODUÇÃO a partir do canônico de design.
#
# O docs/design/tokens.css é a FONTE ÚNICA dos valores de token ("este arquivo é
# o CSS de produção", diz o próprio header). A única diferença em produção é o
# caminho das fontes: no design elas moram em `mockups/fonts/`; servidas de
# public_html/assets/css/tokens.css, o caminho vira `../fonts/`.
#
# Este script torna a cópia um ARTEFATO REPRODUTÍVEL (não editado à mão), então
# os valores nunca divergem do design. Rode-o quando o tokens.css de design mudar.
set -euo pipefail

raiz="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
origem="$raiz/docs/design/tokens.css"
destino="$raiz/public_html/assets/css/tokens.css"

mkdir -p "$(dirname "$destino")"
{
  echo "/* GERADO por scripts/sync-tokens.sh a partir de docs/design/tokens.css."
  echo "   NÃO edite à mão: edite o canônico de design e rode o script. */"
  sed 's#mockups/fonts/#../fonts/#g' "$origem"
} > "$destino"

echo "ok: $destino"
