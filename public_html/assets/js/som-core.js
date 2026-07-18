// som-core.js
// O nucleo PURO do SOM (item W6 · SOM-2-BOTOES): so a maquina de estado das
// duas preferencias de audio (efeitos e musica) e a (de)serializacao pra
// localStorage. NADA de Audio/document/window aqui dentro — o nucleo so mexe no
// ESTADO; quem TOCA o audio e a camada DOM (som.js). Assim roda em node:test e e
// deterministico.
//
// O canon (memoria o_arco_completo_e_o_som): 2 botoes. EFEITOS liga por padrao,
// MUSICA desliga por padrao. O clique e o SFX real do jogo (a camada DOM reusa o
// arquivo). Som e enhancement: sem JS os botoes ficam no default, inertes.
//
// UMD leve: a stack e no-build e o Firefox do lider abre por file://, entao ES
// module (export/import) quebra por CORS. Isto expoe window.SomCore via
// <script src> E module.exports pro node:test. NUNCA virar ESM.
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.SomCore = Core;
  }
})(this, function () {

  // a chave de persistencia no localStorage. Namespaced pra nao colidir.
  var CHAVE = "gw_som";

  // os dois canais e seus defaults canonicos: efeitos LIGA, musica DESLIGA.
  var CANAIS = ["efeitos", "musica"];
  var DEFAULT = { efeitos: true, musica: false };

  function estadoInicial() {
    return { efeitos: DEFAULT.efeitos, musica: DEFAULT.musica };
  }

  function canalValido(canal) {
    return canal === "efeitos" || canal === "musica";
  }

  // ── alternar: inverte UM canal, devolve estado NOVO (nao muta a entrada) ─────
  // canal invalido -> devolve uma copia intacta (no-op seguro).
  function alternar(estado, canal) {
    var base = normalizar(estado);
    if (!canalValido(canal)) return base;
    base[canal] = !base[canal];
    return base;
  }

  // ── normalizar: forca o formato canonico {efeitos,musica} so com booleanos ──
  // qualquer canal ausente ou nao-booleano cai pro default DAQUELE canal. Base de
  // toda a robustez: nunca devolve estado meio-quebrado.
  function normalizar(estado) {
    var e = (estado && typeof estado === "object") ? estado : {};
    return {
      efeitos: typeof e.efeitos === "boolean" ? e.efeitos : DEFAULT.efeitos,
      musica: typeof e.musica === "boolean" ? e.musica : DEFAULT.musica,
    };
  }

  // ── serializar: estado -> string pra localStorage (sempre canonico) ─────────
  function serializar(estado) {
    return JSON.stringify(normalizar(estado));
  }

  // ── desserializar: string do localStorage -> estado. Tolerante a lixo ───────
  // null/ausente, JSON invalido, tipo errado -> default. Nunca lanca.
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

  return {
    CHAVE: CHAVE,
    CANAIS: CANAIS,
    DEFAULT: DEFAULT,
    estadoInicial: estadoInicial,
    canalValido: canalValido,
    normalizar: normalizar,
    alternar: alternar,
    serializar: serializar,
    desserializar: desserializar,
  };
});
