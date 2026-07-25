#!/usr/bin/env bash
# scripts/uptime-sessoes.sh - captura o UPTIME das sessoes de trabalho (jogo e
# glintfx) e imprime o valor pronto pra colar em data/edicoes.php.
#
# ★ POR QUE ESTE SCRIPT EXISTE (leia antes de "otimizar"):
#   O masthead das edicoes (#3 em diante) mostra ha quanto tempo a sessao de
#   trabalho de cada projeto esta aberta. Esse dado so existe NESTA maquina
#   (os arquivos de transcricao em ~/.claude/projects/). A producao roda na
#   HOSTINGER, que nao enxerga maquina nenhuma - logo o numero NAO pode ser
#   calculado em runtime no site. Ele e CAPTURADO no momento de publicar a
#   edicao e gravado como dado dela.
#   Isso e coerente com o canon da revista: cada edicao e registro historico
#   DATADO. O numero fica congelado como estava no dia daquela edicao - nao e
#   um contador ao vivo, e uma fotografia.
#
# Uptime = AGORA menos a PRIMEIRA mensagem da sessao mais recente do projeto.
# Zero dependencia alem do que ja existe na maquina: bash + jq + date (GNU).
#
# Uso:
#   scripts/uptime-sessoes.sh          # linha humana + o bloco PHP pra colar
#   scripts/uptime-sessoes.sh --php    # so o bloco PHP (pra pipe/clipboard)

set -euo pipefail

# ── Os projetos: rotulo => diretorio do repo ─────────────────────────────────
# O rotulo e a CHAVE do campo 'uptime' no $edicoes (a traducao do rotulo mora
# no i18n: src/i18n/{pt,en}.php, 'exp_uptime'). O caminho e resolvido RELATIVO a
# este repo (os tres projetos sao irmaos em Projects/) e depois virado absoluto:
# nenhum caminho pessoal fica versionado num repo PUBLICO, e o script funciona
# em qualquer maquina com o mesmo layout. Override por env quando nao for o caso:
#   UPTIME_DIR_JOGO=/outro/caminho UPTIME_DIR_GLINTFX=/outro scripts/uptime-sessoes.sh
RAIZ="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
IRMAOS="$(dirname "$RAIZ")"

PROJ_ROTULOS=(jogo glintfx)
PROJ_CAMINHOS=(
  "${UPTIME_DIR_JOGO:-$IRMAOS/gusworld}"
  "${UPTIME_DIR_GLINTFX:-$IRMAOS/loucura_c_asm}"
)

RAIZ_TRANSCRICOES="${UPTIME_DIR_TRANSCRICOES:-$HOME/.claude/projects}"

command -v jq >/dev/null || { echo "uptime-sessoes: jq nao encontrado." >&2; exit 1; }

# O Claude Code guarda a transcricao num dir cujo nome e o caminho absoluto do
# projeto com todo caractere fora de [A-Za-z0-9] virando '-'
# (/home/x/projetos_claudebrain/Projects/loucura_c_asm
#   -> -home-x-projetos-claudebrain-Projects-loucura-c-asm).
dir_transcricao() {
  local caminho="$1"
  # o dir de transcricao usa o caminho ABSOLUTO REAL (sem symlink, sem '..')
  local abs
  abs="$(cd "$caminho" 2>/dev/null && pwd -P)" || return 1
  printf '%s' "$RAIZ_TRANSCRICOES/$(printf '%s' "$abs" | sed 's/[^A-Za-z0-9]/-/g')"
}

# A sessao MAIS RECENTE do projeto: o .jsonl de mtime mais novo. Glob, nunca
# nome de arquivo fixo - o id da sessao muda a cada nova sessao.
sessao_mais_recente() {
  local dir="$1"
  [ -d "$dir" ] || return 1
  local mais_novo=""
  local f
  for f in "$dir"/*.jsonl; do
    [ -e "$f" ] || continue
    if [ -z "$mais_novo" ] || [ "$f" -nt "$mais_novo" ]; then
      mais_novo="$f"
    fi
  done
  [ -n "$mais_novo" ] || return 1
  printf '%s' "$mais_novo"
}

# O nascimento da sessao: o menor timestamp nao-nulo do inicio do arquivo. As
# primeiras linhas sao registros de estado (last-prompt, permission-mode...)
# com timestamp null, e as primeiras com hora nao vem em ordem perfeita - por
# isso o MINIMO das primeiras linhas, e nao "a primeira que tiver hora".
nascimento_sessao() {
  local arquivo="$1"
  head -n 200 "$arquivo" \
    | jq -r 'select(type == "object" and .timestamp != null) | .timestamp' 2>/dev/null \
    | sort | head -n 1
}

so_php=0
[ "${1:-}" = "--php" ] && so_php=1

agora_epoch="$(date +%s)"
linha_php=""
linha_preview=""

for i in "${!PROJ_ROTULOS[@]}"; do
  rotulo="${PROJ_ROTULOS[$i]}"
  caminho="${PROJ_CAMINHOS[$i]}"
  dir="$(dir_transcricao "$caminho")" || {
    echo "uptime-sessoes: projeto '$rotulo' nao encontrado em $caminho" >&2
    echo "                (use UPTIME_DIR_${rotulo^^}=/caminho/do/repo)" >&2
    exit 1
  }

  arquivo="$(sessao_mais_recente "$dir")" || {
    echo "uptime-sessoes: sem transcricao para '$rotulo' em $dir" >&2
    exit 1
  }
  nascimento="$(nascimento_sessao "$arquivo")"
  [ -n "$nascimento" ] || {
    echo "uptime-sessoes: nenhum timestamp no inicio de $arquivo" >&2
    exit 1
  }

  nascimento_epoch="$(date -d "$nascimento" +%s)"
  horas=$(( (agora_epoch - nascimento_epoch) / 3600 ))
  dias=$(( horas / 24 ))

  if [ "$so_php" -eq 0 ]; then
    printf '%-8s %s\n' "$rotulo:" "${horas}h (${dias}d)"
    printf '         sessao %s\n' "$(basename "$arquivo")"
    printf '         aberta em %s\n' "$(date -d "$nascimento" '+%d/%m/%Y %H:%M')"
  fi

  linha_php+="'${rotulo}' => ${horas}, "
  linha_preview+="${rotulo} ${horas}h (${dias}d) · "
done

linha_php="${linha_php%, }"
linha_preview="${linha_preview% · }"

if [ "$so_php" -eq 0 ]; then
  echo
  echo "no masthead vai sair assim (pt):"
  echo "  ${linha_preview}"
  echo
  echo "cole na entrada da edicao em data/edicoes.php:"
fi

# So as HORAS viram dado; os dias sao derivados no PHP (floor h/24) pra os dois
# numeros nunca se contradizerem no papel.
printf "        'uptime'         => [%s], // capturado em %s\n" \
  "$linha_php" "$(date '+%d/%m/%Y %H:%M')"
