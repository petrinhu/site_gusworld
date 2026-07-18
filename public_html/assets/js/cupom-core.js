// cupom-core.js
// O nucleo PURO do CUPOM (item W6 · CUPOM): a maquina de estado do RASGAR/DESFAZER
// (o recorte pelo pontilhado), a WHITELIST da opcao de voto e a loja "ja votou"
// (idempotencia SUAVE no cliente). NADA de document/window/fetch aqui dentro — o
// nucleo so mexe no ESTADO; a camada DOM (cupom.js) injeta o storage e faz o
// fetch. Assim roda em node:test e e deterministico.
//
// O canon (memoria CUPOM/RIMESSE): o cupom RECORTAVEL — pontilhado, tesoura,
// "resultado na PROXIMA EDICAO" (a lentidao vira estetica; poll aberto = espera,
// nao site morto). ★ "Da pra rasgar errado, COM desfazer" — frustrar crianca NAO
// e o objetivo: por isso `desfazer` sempre volta um segmento e `resetar` recola
// tudo; e IMPOSSIVEL travar. ZERO-DADO: sem conta, sem dado pessoal — a loja so
// lembra QUE voce votou (e em que opcao), nada mais.
//
// ⚠️ A PERGUNTA/OPCOES do poll sao PLACEHOLDER — o lider define as reais depois.
// Trocar o poll = trocar o array OPCOES aqui E o gemeo no servidor
// (api/cupom-voto.php). A whitelist e a MESMA verdade nos dois lados.
//
// UMD leve: a stack e no-build e o Firefox do lider abre por file://, entao ES
// module (export/import) quebra por CORS. Isto expoe window.CupomCore via
// <script src> E module.exports pro node:test. NUNCA virar ESM.
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.CupomCore = Core;
  }
})(this, function () {

  // ── as OPCOES do poll (⚠️ PLACEHOLDER — o lider define a pergunta/opcoes reais) ──
  // Ids curtos, kebab-case, SEM acento (viajam em URL e JSON). Devem casar 1:1 com
  // a whitelist do servidor (api/cupom-voto.php const CUPOM_OPCOES).
  var OPCOES = ["mais-jogo", "mais-bastidores", "mais-gus"];

  // chave namespaced no localStorage (nao colide com album/som).
  var CHAVE = "gw_cupom";

  // quantos segmentos o pontilhado tem (passos de rasgo ate destacar). So um
  // default do nucleo; a UI pode passar outro. Puramente uma contagem.
  var SEG_PADRAO = 6;

  function opcoes() { return OPCOES.slice(); }

  // indexOf tolerante (nao depende de Array.prototype em ambiente exotico).
  function indexOf(arr, v) {
    if (!arr || typeof arr.length !== "number") return -1;
    for (var i = 0; i < arr.length; i++) {
      if (arr[i] === v) return i;
    }
    return -1;
  }

  // ── whitelist: a opcao e uma das validas? ───────────────────────────────────
  // A UNICA porta de entrada de voto. Aceita uma lista custom (teste); sem ela,
  // usa OPCOES. Rejeita nao-string, vazio e qualquer id fora do conjunto.
  function opcaoValida(id, lista) {
    var l = (lista && typeof lista.length === "number") ? lista : OPCOES;
    return typeof id === "string" && id !== "" && indexOf(l, id) >= 0;
  }

  // ── RASGAR / DESFAZER: a maquina de estado do recorte ───────────────────────
  // O cupom rasga em SEGMENTOS ao longo do pontilhado. `rasgar` avanca um;
  // `desfazer` volta um; `resetar` recola. INVARIANTE: feito fica sempre em
  // [0, segmentos] — nunca estoura, nunca fica negativo, nunca trava (undo e
  // reset sempre disponiveis). destacado() = rasgou ate o fim (o cupom soltou).
  function criarRasgo(segmentos) {
    var n = (typeof segmentos === "number" && segmentos > 0)
      ? Math.floor(segmentos) : SEG_PADRAO;
    return { segmentos: n, feito: 0 };
  }

  // normaliza qualquer entrada (inclusive lixo) pra um rasgo valido. Base da
  // robustez: rasgar/desfazer/etc. nunca recebem estado meio-quebrado.
  function normRasgo(r) {
    var seg = (r && typeof r.segmentos === "number" && r.segmentos > 0)
      ? Math.floor(r.segmentos) : SEG_PADRAO;
    var feito = (r && typeof r.feito === "number" && r.feito >= 0)
      ? Math.floor(r.feito) : 0;
    if (feito > seg) feito = seg;
    return { segmentos: seg, feito: feito };
  }

  function rasgar(r) {
    var b = normRasgo(r);
    return { segmentos: b.segmentos, feito: Math.min(b.feito + 1, b.segmentos) };
  }

  function desfazer(r) {
    var b = normRasgo(r);
    return { segmentos: b.segmentos, feito: Math.max(b.feito - 1, 0) };
  }

  function resetar(r) {
    var b = normRasgo(r);
    return { segmentos: b.segmentos, feito: 0 };
  }

  function destacado(r) {
    var b = normRasgo(r);
    return b.feito >= b.segmentos;
  }

  // progresso 0..1 (a UI usa pra desenhar a linha de rasgo).
  function progresso(r) {
    var b = normRasgo(r);
    return b.segmentos === 0 ? 0 : b.feito / b.segmentos;
  }

  // ── loja "ja votou": idempotencia SUAVE no cliente (zero-dado) ──────────────
  // O servidor aceita SEMPRE (best-effort, anti-OE — o lider aceita "12 votos");
  // o cliente so LEMBRA que ja votou (e em que opcao) pra nao empurrar de novo.
  // Storage injetado = 100% testavel e degradavel: anonimo/cheio/off cai pra
  // in-memory e NUNCA quebra a pagina.
  function estadoInicial() { return { opcao: null }; }

  function normalizar(estado) {
    var e = (estado && typeof estado === "object") ? estado : {};
    var op = opcaoValida(e.opcao) ? e.opcao : null;
    return { opcao: op };
  }

  function serializar(estado) { return JSON.stringify(normalizar(estado)); }

  // tolerante a lixo: null/ausente, JSON invalido, tipo errado, opcao fora da
  // whitelist -> default. Nunca lanca.
  function desserializar(raw) {
    if (typeof raw !== "string" || raw === "") return estadoInicial();
    var parsed;
    try {
      parsed = JSON.parse(raw);
    } catch (err) {
      return estadoInicial();
    }
    return normalizar(parsed);
  }

  function criarLoja(storage) {
    var storageOk = true;

    function podeUsar() {
      return !!(storage && typeof storage.getItem === "function"
                && typeof storage.setItem === "function");
    }
    function carregar() {
      if (!podeUsar()) { storageOk = false; return estadoInicial(); }
      try {
        return desserializar(storage.getItem(CHAVE));
      } catch (err) {
        storageOk = false;    // storage bloqueado (SecurityError) na leitura
        return estadoInicial();
      }
    }
    function salvar(estado) {
      if (!podeUsar()) { storageOk = false; return; }
      try {
        storage.setItem(CHAVE, serializar(estado));
      } catch (err) {
        storageOk = false;    // quota / bloqueado: fica so in-memory
      }
    }

    var estado = carregar();

    return {
      // registra o voto localmente (idempotencia suave). id invalido = no-op.
      registrar: function (id) {
        if (!opcaoValida(id)) return false;
        estado = { opcao: id };
        salvar(estado);
        return true;
      },
      jaVotou: function () { return estado.opcao !== null; },
      opcaoVotada: function () { return estado.opcao; },
      // a UI avisa com graca quando o storage nao vale (a idempotencia cai, mas
      // votar continua funcionando — o servidor aceita).
      storageOk: function () { return storageOk; },
    };
  }

  return {
    OPCOES: OPCOES,
    CHAVE: CHAVE,
    SEG_PADRAO: SEG_PADRAO,
    opcoes: opcoes,
    opcaoValida: opcaoValida,
    // rasgar/desfazer
    criarRasgo: criarRasgo,
    normRasgo: normRasgo,
    rasgar: rasgar,
    desfazer: desfazer,
    resetar: resetar,
    destacado: destacado,
    progresso: progresso,
    // ja votou
    estadoInicial: estadoInicial,
    normalizar: normalizar,
    serializar: serializar,
    desserializar: desserializar,
    criarLoja: criarLoja,
  };
});
