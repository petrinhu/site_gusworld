// album-core.js
// O nucleo PURO do ALBUM (item W6 · ALBUM): a maquina de COLECAO de figurinhas
// e a (de)serializacao pra localStorage. NADA de document/window aqui dentro — o
// nucleo so mexe no ESTADO; quem toca o localStorage e a camada DOM (album.js),
// que INJETA o storage na fabrica criarLoja(). Assim roda em node:test e e
// deterministico.
//
// O canon (memoria ALBUM): um album de figurinhas em localStorage. Zero conta,
// zero dado. ★ "Crianca cola album; adulto COLECIONOU album — o mesmo objeto pega
// os dois publicos." A degradacao e sagrada: anonimo, storage cheio ou storage
// off NAO podem quebrar a pagina — a loja cai pra in-memory e NUNCA lanca.
//
// ⚠️ O CONTEUDO das figurinhas e AGNOSTICO a este nucleo: ele so opera sobre a
// LISTA DE IDS (o "catalogo") que a camada DOM injeta. Por isso nao ha lexico
// duplicado aqui — album.js monta o catalogo a partir do glyfa-core (as 13
// raizes-glifo do Sylvarin), que hoje sao o PLACEHOLDER SEGURO. O TEMA/arte final
// das figurinhas e decisao do LIDER (co-decidido, ainda nao definido): trocar o
// tema = trocar o array de catalogo na camada DOM, sem tocar neste nucleo.
//
// UMD leve: a stack e no-build e o Firefox do lider abre por file://, entao ES
// module (export/import) quebra por CORS. Isto expoe window.AlbumCore via
// <script src> E module.exports pro node:test. NUNCA virar ESM.
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.AlbumCore = Core;
  }
})(this, function () {

  // a chave de persistencia no localStorage. Namespaced pra nao colidir.
  var CHAVE = "gw_album";

  function estadoInicial() {
    return { coladas: [] };
  }

  function ehId(id) {
    return typeof id === "string" && id.length > 0;
  }

  // ── normalizar: forca {coladas:[ids validos, unicos]} ───────────────────────
  // Descarta o que nao e string, deduplica preservando a ordem de insercao, e —
  // se um catalogo for dado — mantem SO os ids que ainda existem nele (um id que
  // saiu do catalogo por troca de tema cai fora, sem quebrar). Base de toda a
  // robustez: nunca devolve estado meio-quebrado.
  function normalizar(estado, catalogo) {
    var e = (estado && typeof estado === "object") ? estado : {};
    var bruto = Array.isArray(e.coladas) ? e.coladas : [];
    var vistos = {};
    var coladas = [];
    for (var i = 0; i < bruto.length; i++) {
      var id = bruto[i];
      if (!ehId(id)) continue;
      if (vistos[id]) continue;
      if (catalogo && indexOf(catalogo, id) < 0) continue;
      vistos[id] = true;
      coladas.push(id);
    }
    return { coladas: coladas };
  }

  // indexOf tolerante (evita depender de Array.prototype em ambiente exotico).
  function indexOf(arr, v) {
    if (!arr || typeof arr.length !== "number") return -1;
    for (var i = 0; i < arr.length; i++) {
      if (arr[i] === v) return i;
    }
    return -1;
  }

  // ── colar: adiciona UMA figurinha, devolve estado NOVO (nao muta a entrada) ──
  // id invalido, fora do catalogo, ou ja colado -> devolve o estado normalizado
  // intacto (no-op seguro, dedup por design). O catalogo e opcional: sem ele,
  // qualquer id-string vale (o teste do nucleo sempre passa o catalogo).
  function colar(estado, id, catalogo) {
    var base = normalizar(estado, catalogo);
    if (!ehId(id)) return base;
    if (catalogo && indexOf(catalogo, id) < 0) return base;
    if (indexOf(base.coladas, id) >= 0) return base;
    return { coladas: base.coladas.concat([id]) };
  }

  // ── tem: a figurinha ja esta colada? ────────────────────────────────────────
  function tem(estado, id) {
    return indexOf(normalizar(estado).coladas, id) >= 0;
  }

  // ── progresso: coladas + faltantes + total, em ORDEM DE CATALOGO ────────────
  // A ordem de exibicao e a do catalogo (estavel), nao a de colagem. Precisa do
  // catalogo pra saber o que falta.
  function progresso(estado, catalogo) {
    var cat = (catalogo && typeof catalogo.length === "number") ? catalogo : [];
    var base = normalizar(estado, cat.length ? cat : undefined);
    var coladas = [];
    var faltantes = [];
    for (var i = 0; i < cat.length; i++) {
      var id = cat[i];
      if (indexOf(base.coladas, id) >= 0) coladas.push(id);
      else faltantes.push(id);
    }
    return {
      coladas: coladas,
      faltantes: faltantes,
      total: cat.length,
      n: coladas.length,
      completo: cat.length > 0 && faltantes.length === 0,
    };
  }

  function completo(estado, catalogo) {
    return progresso(estado, catalogo).completo;
  }

  // ── serializar: estado -> string pra localStorage (sempre canonico) ─────────
  function serializar(estado) {
    return JSON.stringify(normalizar(estado));
  }

  // ── desserializar: string do localStorage -> estado. Tolerante a lixo ───────
  // null/ausente, JSON invalido, tipo errado -> default. Nunca lanca. O catalogo
  // e opcional (a loja passa o dela pra ja podar ids fora de tema).
  function desserializar(raw, catalogo) {
    if (typeof raw !== "string" || raw === "") return estadoInicial();
    var parsed;
    try {
      parsed = JSON.parse(raw);
    } catch (err) {
      return estadoInicial();
    }
    return normalizar(parsed, catalogo);
  }

  // ── criarLoja: a fabrica IMPURA (a unica que fala com o storage injetado) ────
  // Recebe um adapter de storage ({getItem,setItem}, tipicamente window.local-
  // Storage) e o catalogo. Encapsula ler/gravar com try/catch e um estado in-
  // memory: se o storage LANCA (quota / off / anonimo) ou e nulo, o album vale
  // so nesta sessao — mas NUNCA quebra. E aqui que a degradacao com graca vive,
  // e o storage injetado torna isso 100% testavel (storage fake que lanca).
  function criarLoja(storage, catalogo) {
    var cat = (catalogo && typeof catalogo.length === "number") ? catalogo : [];
    var storageOk = true;

    function podeUsar() {
      return !!(storage && typeof storage.getItem === "function"
                && typeof storage.setItem === "function");
    }

    function carregar() {
      if (!podeUsar()) { storageOk = false; return estadoInicial(); }
      try {
        return desserializar(storage.getItem(CHAVE), cat.length ? cat : undefined);
      } catch (err) {
        storageOk = false;      // storage bloqueado (SecurityError) na leitura
        return estadoInicial();
      }
    }

    function salvar(estado) {
      if (!podeUsar()) { storageOk = false; return; }
      try {
        storage.setItem(CHAVE, serializar(estado));
      } catch (err) {
        storageOk = false;      // quota exceeded / bloqueado: fica so in-memory
      }
    }

    var estado = carregar();

    return {
      // acoes
      colar: function (id) {
        estado = colar(estado, id, cat.length ? cat : undefined);
        salvar(estado);
        return progresso(estado, cat);
      },
      // consultas
      estado: function () { return { coladas: estado.coladas.slice() }; },
      tem: function (id) { return tem(estado, id); },
      progresso: function () { return progresso(estado, cat); },
      completo: function () { return completo(estado, cat); },
      // a loja sabe se o storage esta funcionando (a UI avisa com graca quando off)
      storageOk: function () { return storageOk; },
    };
  }

  return {
    CHAVE: CHAVE,
    estadoInicial: estadoInicial,
    ehId: ehId,
    normalizar: normalizar,
    colar: colar,
    tem: tem,
    progresso: progresso,
    completo: completo,
    serializar: serializar,
    desserializar: desserializar,
    criarLoja: criarLoja,
  };
});
