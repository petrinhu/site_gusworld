#!/usr/bin/env bash
# scripts/testes.sh - comando unico da suite de testes do site (item TESTES-CMD).
#
# Roda, UM ARQUIVO POR VEZ, todo tests/*.test.php e tests/*.test.js e nada fora
# de tests/. Imprime SEMPRE as contagens (mesmo zero) e sai 1 se algo reprova.
#
#   scripts/testes.sh                 roda a suite do repo
#   scripts/testes.sh --raiz DIR      roda a suite de DIR/tests (so o autoteste usa)
#   scripts/testes.sh --piso N        troca o piso de arquivos (so o autoteste usa)
#   scripts/testes.sh --autoteste     prova o portao contra scripts/testes-fixtures/
#
# Aprova um arquivo PHP so se sai 0 E a ultima linha e "ALL GREEN (N asser...)"
# com N > 0. Aprova um arquivo JS so se sai 0, nao tem falha e tem >= 1 caso.
# Sai 1 se: encontrados = 0 em qualquer linguagem (varredura vazia e sinal de
# varredura quebrada, nao de codigo limpo), rodados != encontrados, qualquer
# falha, ou total de arquivos abaixo de PISO_ARQUIVOS.

set -euo pipefail

# Piso de arquivos de teste: 13 .test.php + 9 .test.js (cresce com a trilha do conversor).
# Apagar um teste exige baixar este numero DE PROPOSITO, no mesmo commit.
PISO_ARQUIVOS=22

# Contadores globais preenchidos por rodar_php e rodar_js.
PHP_ENC=0; PHP_ROD=0; PHP_OK=0; PHP_FALHA=0; PHP_ASSERTS=0
JS_ENC=0;  JS_ROD=0;  JS_OK=0;  JS_FALHA=0;  JS_CASOS=0

# Mostra o rabo da saida de um arquivo reprovado (o resto fica no arquivo).
mostrar_falha() { # arquivo motivo saida
  printf 'FALHOU %s: %s\n' "$1" "$2"
  printf '%s\n' "$3" | tail -n 8 | sed 's/^/    /'
}

rodar_php() { # arquivos...
  local f out rc ultima n
  for f in "$@"; do
    PHP_ENC=$((PHP_ENC + 1))
  done
  for f in "$@"; do
    PHP_ROD=$((PHP_ROD + 1))
    if out=$(php -d display_errors=stderr "$f" 2>&1); then rc=0; else rc=$?; fi
    ultima="${out##*$'\n'}"
    if [[ $rc -ne 0 ]]; then
      PHP_FALHA=$((PHP_FALHA + 1)); mostrar_falha "$f" "codigo de saida $rc" "$out"
    elif [[ "$ultima" =~ ^ALL\ GREEN\ \(([0-9]+)\ asser ]] && [[ "${BASH_REMATCH[1]}" -gt 0 ]]; then
      n="${BASH_REMATCH[1]}"
      PHP_OK=$((PHP_OK + 1)); PHP_ASSERTS=$((PHP_ASSERTS + n))
    else
      PHP_FALHA=$((PHP_FALHA + 1)); mostrar_falha "$f" "saiu 0 mas sem 'ALL GREEN (N asser...)' com N > 0" "$out"
    fi
  done
}

# Valor do contador "# nome N" do repórter TAP (0 se a linha nao existe).
tap_valor() { # nome saida
  local v
  v=$(printf '%s\n' "$2" | sed -n "s/^# $1 \([0-9][0-9]*\)\$/\1/p" | tail -n 1)
  printf '%s' "${v:-0}"
}

rodar_js() { # arquivos...
  local f out rc tests fail base fantasma casos
  for f in "$@"; do
    JS_ENC=$((JS_ENC + 1))
  done
  for f in "$@"; do
    JS_ROD=$((JS_ROD + 1))
    if out=$(node --test --test-reporter=tap "$f" 2>&1); then rc=0; else rc=$?; fi
    tests=$(tap_valor tests "$out"); fail=$(tap_valor fail "$out")
    # Arquivo sem nenhum test() o Node conta como 1 teste "ok 1 - <caminho>":
    # esse fantasma nao e caso. Descontamos antes de exigir casos >= 1.
    fantasma=0
    if printf '%s\n' "$out" | grep -qxF "ok 1 - $f"; then fantasma=1; fi
    casos=$((tests - fantasma))
    if [[ $rc -ne 0 || $fail -ne 0 ]]; then
      JS_FALHA=$((JS_FALHA + 1)); mostrar_falha "$f" "codigo de saida $rc, fail=$fail" "$out"
    elif [[ $casos -lt 1 ]]; then
      JS_FALHA=$((JS_FALHA + 1)); mostrar_falha "$f" "nenhum caso de teste (tests=$tests)" "$out"
    else
      JS_OK=$((JS_OK + 1)); JS_CASOS=$((JS_CASOS + casos))
    fi
  done
}

# Roda a suite de RAIZ/tests com o piso informado; devolve 0 (verde) ou 1.
executar_suite() { # raiz piso
  local raiz="$1" piso="$2" veredito=0 total_enc total_rod total_falha
  local php_files=() js_files=()
  shopt -s nullglob
  php_files=("$raiz"/tests/*.test.php)
  js_files=("$raiz"/tests/*.test.js)
  shopt -u nullglob
  command -v php >/dev/null || { echo "php nao encontrado."; return 1; }
  command -v node >/dev/null || { echo "node nao encontrado."; return 1; }
  cd "$raiz"
  if [[ ${#php_files[@]} -gt 0 ]]; then rodar_php "${php_files[@]}"; fi
  if [[ ${#js_files[@]} -gt 0 ]]; then rodar_js "${js_files[@]}"; fi
  total_enc=$((PHP_ENC + JS_ENC)); total_rod=$((PHP_ROD + JS_ROD)); total_falha=$((PHP_FALHA + JS_FALHA))
  printf 'php: encontrados=%s rodados=%s aprovados=%s falharam=%s asserções=%s\n' \
    "$PHP_ENC" "$PHP_ROD" "$PHP_OK" "$PHP_FALHA" "$PHP_ASSERTS"
  printf 'js:  encontrados=%s rodados=%s aprovados=%s falharam=%s casos=%s\n' \
    "$JS_ENC" "$JS_ROD" "$JS_OK" "$JS_FALHA" "$JS_CASOS"
  printf 'total: encontrados=%s rodados=%s falharam=%s\n' "$total_enc" "$total_rod" "$total_falha"
  if [[ $PHP_ENC -eq 0 ]]; then echo "REPROVADO: nenhum .test.php encontrado (varredura vazia)."; veredito=1; fi
  if [[ $JS_ENC -eq 0 ]]; then echo "REPROVADO: nenhum .test.js encontrado (varredura vazia)."; veredito=1; fi
  if [[ $total_rod -ne $total_enc ]]; then echo "REPROVADO: rodados != encontrados."; veredito=1; fi
  if [[ $total_falha -ne 0 ]]; then echo "REPROVADO: $total_falha arquivo(s) falharam."; veredito=1; fi
  if [[ $total_enc -lt $piso ]]; then
    echo "REPROVADO: $total_enc arquivos de teste, abaixo do piso $piso (apagou teste? baixe PISO_ARQUIVOS de proposito)."
    veredito=1
  fi
  return $veredito
}

autoteste() {
  local self="$1" fix="$2"
  local casos=0 conferem=0
  check() { # nome raiz rc_esperado padrao...
    local nome="$1" raiz="$2" rc_esp="$3"; shift 3
    local out rc ok=1 p
    casos=$((casos + 1))
    if out=$("$self" --raiz "$raiz" --piso 0 2>&1); then rc=0; else rc=$?; fi
    [[ "$rc" -eq "$rc_esp" ]] || ok=0
    for p in "$@"; do [[ "$out" == *"$p"* ]] || ok=0; done
    if [[ $ok -eq 1 ]]; then conferem=$((conferem + 1)); printf 'autoteste %s: confere (rc=%s)\n' "$nome" "$rc"
    else printf 'autoteste %s: NAO CONFERE (rc=%s, esperado %s)\n%s\n' "$nome" "$rc" "$rc_esp" "$out"; fi
  }
  check A1 "$fix/a1" 0 "total: encontrados=2 rodados=2 falharam=0"
  check A2 "$fix/a2" 1 "php: encontrados=1 rodados=1 aprovados=0 falharam=1"
  check A3 "$fix/a3" 1 "js:  encontrados=1 rodados=1 aprovados=0 falharam=1"
  check A4 "$fix/a4" 1 "php: encontrados=1 rodados=1 aprovados=0 falharam=1"
  check A5 "$fix/a5" 1 "php: encontrados=2 rodados=2 aprovados=0 falharam=2"
  check A6 "$fix/a6" 1 "js:  encontrados=1 rodados=1 aprovados=0 falharam=1"
  local vazio; vazio=$(mktemp -d /var/tmp/testes-autoteste.XXXXXX); mkdir -p "$vazio/tests"
  check A7 "$vazio" 1 "total: encontrados=0 rodados=0 falharam=0"
  rm -rf "${vazio:?}"
  printf 'casos=%s conferem=%s\n' "$casos" "$conferem"
  [[ "$casos" -eq "$conferem" ]]
}

if [[ "${1:-}" == "--autoteste" ]]; then
  AQUI="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
  if autoteste "$AQUI/testes.sh" "$AQUI/testes-fixtures"; then exit 0; else exit 1; fi
fi

AQUI="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
RAIZ="$(cd "$AQUI/.." && pwd)"
PISO="$PISO_ARQUIVOS"
while [[ $# -gt 0 ]]; do
  case "$1" in
    --raiz)  [[ $# -ge 2 ]] || { echo "uso: --raiz DIR" >&2; exit 2; }; RAIZ="$(cd "$2" && pwd)"; shift 2 ;;
    --piso)  [[ $# -ge 2 ]] || { echo "uso: --piso N" >&2; exit 2; }; PISO="$2"; shift 2 ;;
    *) echo "argumento desconhecido: $1" >&2; exit 2 ;;
  esac
done
if executar_suite "$RAIZ" "$PISO"; then
  echo "ALL GREEN"
else
  exit 1
fi
