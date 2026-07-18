// tests/album-core.test.js
// TDD do nucleo PURO do ALBUM (item W6 · ALBUM). node:test + node:assert, ZERO
// dependencia de terceiro. Fica FORA de public_html/ pra nao ir no deploy. Roda:
//   node --test tests/album-core.test.js
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
//
// O CATALOGO das figurinhas e PLACEHOLDER SEGURO: os 13 ids-glifo do Sylvarin
// (os mesmos stems da Glyfa). O nucleo de COLECAO e AGNOSTICO ao conteudo — so
// opera sobre a LISTA DE IDS injetada; por isso o teste passa seu proprio
// catalogo e nao duplica o lexico do glyfa-core. O TEMA final e do lider.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const Core = require("../public_html/assets/js/album-core.js");

// um catalogo de teste: os 13 stems do Sylvarin (ids das figurinhas).
const CAT = ["sylva", "vyr", "tavus", "nenh", "ondh", "cale", "mor",
             "rime", "glyfa", "elen", "eryn", "lhin", "anh"];

// ── estado inicial: album vazio, sem nenhuma colada ─────────────────────────
test("estadoInicial: nenhuma figurinha colada", () => {
  const e = Core.estadoInicial();
  assert.deepEqual(e.coladas, []);
});

test("estadoInicial: devolve copia nova (nao a mesma referencia)", () => {
  const a = Core.estadoInicial();
  const b = Core.estadoInicial();
  assert.notEqual(a, b);
  a.coladas.push("mor");
  assert.deepEqual(Core.estadoInicial().coladas, [], "mutar a copia nao contamina o default");
});

// ── colar: adiciona uma figurinha valida ────────────────────────────────────
test("colar: adiciona a figurinha ao album", () => {
  const e = Core.colar(Core.estadoInicial(), "mor", CAT);
  assert.deepEqual(e.coladas, ["mor"]);
});

test("colar: nao muta a entrada (imutabilidade)", () => {
  const antes = Core.estadoInicial();
  Core.colar(antes, "mor", CAT);
  assert.deepEqual(antes.coladas, [], "a entrada fica intacta");
});

// ── colar repetido NAO duplica (dedup) ──────────────────────────────────────
test("colar: colar a mesma figurinha duas vezes nao duplica", () => {
  let e = Core.estadoInicial();
  e = Core.colar(e, "mor", CAT);
  e = Core.colar(e, "mor", CAT);
  assert.deepEqual(e.coladas, ["mor"], "so uma vez, mesmo colando de novo");
});

// ── colar id fora do catalogo e no-op seguro ────────────────────────────────
test("colar: id fora do catalogo e no-op (nao entra)", () => {
  const e = Core.colar(Core.estadoInicial(), "dragao", CAT);
  assert.deepEqual(e.coladas, [], "id desconhecido nao cola");
});

test("colar: id invalido (nao-string/vazio) e no-op", () => {
  for (const bad of [null, undefined, "", 3, {}, []]) {
    const e = Core.colar(Core.estadoInicial(), bad, CAT);
    assert.deepEqual(e.coladas, [], `id ${String(bad)} nao cola`);
  }
});

// ── tem: consulta se uma figurinha ja esta colada ───────────────────────────
test("tem: reflete o que foi colado", () => {
  const e = Core.colar(Core.estadoInicial(), "mor", CAT);
  assert.equal(Core.tem(e, "mor"), true);
  assert.equal(Core.tem(e, "vyr"), false);
});

// ── progresso: coladas + faltantes + total, em ordem de catalogo ────────────
test("progresso: album vazio -> 0 coladas, 13 faltantes", () => {
  const p = Core.progresso(Core.estadoInicial(), CAT);
  assert.deepEqual(p.coladas, []);
  assert.equal(p.faltantes.length, 13);
  assert.equal(p.total, 13);
  assert.equal(p.n, 0);
  assert.equal(p.completo, false);
});

test("progresso: uma colada -> 1 colada, 12 faltantes; faltantes exclui a colada", () => {
  const e = Core.colar(Core.estadoInicial(), "mor", CAT);
  const p = Core.progresso(e, CAT);
  assert.deepEqual(p.coladas, ["mor"]);
  assert.equal(p.faltantes.length, 12);
  assert.equal(p.faltantes.indexOf("mor"), -1, "a colada nao aparece em faltantes");
  assert.equal(p.n, 1);
  assert.equal(p.completo, false);
});

test("progresso: coladas e faltantes saem na ORDEM do catalogo (nao a de colagem)", () => {
  let e = Core.estadoInicial();
  e = Core.colar(e, "anh", CAT);   // ultimo do catalogo, colado primeiro
  e = Core.colar(e, "sylva", CAT); // primeiro do catalogo, colado depois
  const p = Core.progresso(e, CAT);
  assert.deepEqual(p.coladas, ["sylva", "anh"], "ordem do catalogo, nao de colagem");
});

// ── completo: verdadeiro so quando TODAS as 13 estao coladas ─────────────────
test("completo: falso ate colar todas, verdadeiro quando completa", () => {
  let e = Core.estadoInicial();
  for (let i = 0; i < CAT.length; i++) {
    assert.equal(Core.completo(e, CAT), false, `incompleto com ${i} coladas`);
    e = Core.colar(e, CAT[i], CAT);
  }
  assert.equal(Core.completo(e, CAT), true, "completo com as 13");
  assert.equal(Core.progresso(e, CAT).faltantes.length, 0);
});

// ── normalizar: forca {coladas:[ids validos unicos]}, descarta lixo ─────────
test("normalizar: entrada nao-objeto -> default", () => {
  for (const bad of [null, undefined, 42, "x", true]) {
    assert.deepEqual(Core.normalizar(bad), { coladas: [] });
  }
});

test("normalizar: coladas nao-array -> vazio", () => {
  assert.deepEqual(Core.normalizar({ coladas: "mor" }), { coladas: [] });
  assert.deepEqual(Core.normalizar({ coladas: 3 }), { coladas: [] });
});

test("normalizar: descarta itens nao-string e deduplica", () => {
  const out = Core.normalizar({ coladas: ["mor", "mor", 5, null, "vyr", ""] });
  assert.deepEqual(out.coladas, ["mor", "vyr"]);
});

test("normalizar: com catalogo, descarta ids fora dele (troca de tema)", () => {
  const out = Core.normalizar({ coladas: ["mor", "personagem-antigo", "vyr"] }, CAT);
  assert.deepEqual(out.coladas, ["mor", "vyr"], "id que saiu do catalogo cai fora");
});

// ── serializar/desserializar: round-trip fiel e idempotente ─────────────────
test("round-trip: serializar depois desserializar preserva as coladas", () => {
  let e = Core.estadoInicial();
  e = Core.colar(e, "mor", CAT);
  e = Core.colar(e, "lhin", CAT);
  assert.deepEqual(Core.desserializar(Core.serializar(e)), e);
});

test("desserializar: idempotente (aplicar duas vezes da o mesmo)", () => {
  const raw = Core.serializar(Core.colar(Core.estadoInicial(), "mor", CAT));
  const a = Core.desserializar(raw);
  const b = Core.desserializar(Core.serializar(a));
  assert.deepEqual(a, b);
});

test("desserializar: null/vazio/ausente -> default", () => {
  for (const bad of [null, undefined, "", 0, false]) {
    assert.deepEqual(Core.desserializar(bad), Core.estadoInicial());
  }
});

test("desserializar: JSON invalido -> default (nao lanca)", () => {
  for (const bad of ["{", "not json", "[1,2,", "undefined"]) {
    assert.deepEqual(Core.desserializar(bad), Core.estadoInicial());
  }
});

test("desserializar: JSON de tipo errado -> default", () => {
  for (const bad of ["null", "42", '"texto"', "[]", "true"]) {
    assert.deepEqual(Core.desserializar(bad), Core.estadoInicial());
  }
});

// ── a chave de persistencia e estavel e namespaced ──────────────────────────
test("CHAVE: e a string namespaced esperada", () => {
  assert.equal(Core.CHAVE, "gw_album");
});

// ★★ ─────────────────────────────────────────────────────────────────────────
// A DEGRADACAO COM GRACA (o teste que sustenta o brief): um storage que LANCA
// em getItem E em setItem (quota exceeded / storage OFF / modo anonimo) NAO pode
// quebrar o album. A loja cai pra in-memory: carrega o default, cola na sessao,
// e NUNCA lanca. Perder o album nao derruba a pagina.
// ─────────────────────────────────────────────────────────────────────────────
const CAT2 = CAT;

// um storage que LANCA em tudo (simula quota exceeded / SecurityError / off)
function storageQueLanca() {
  return {
    getItem() { throw new Error("SecurityError: storage bloqueado"); },
    setItem() { throw new Error("QuotaExceededError"); },
  };
}

// um storage em memoria (fake fiel do localStorage, pra o caminho feliz)
function storageFake() {
  const mapa = {};
  return {
    getItem(k) { return Object.prototype.hasOwnProperty.call(mapa, k) ? mapa[k] : null; },
    setItem(k, v) { mapa[k] = String(v); },
    _mapa: mapa,
  };
}

test("★ criarLoja: carrega o default e persiste no caminho feliz", () => {
  const st = storageFake();
  const loja = Core.criarLoja(st, CAT2);
  assert.equal(loja.progresso().n, 0);
  loja.colar("mor");
  assert.equal(loja.progresso().n, 1);
  assert.equal(loja.tem("mor"), true);
  // gravou de verdade: uma loja nova sobre o MESMO storage relê o album
  const loja2 = Core.criarLoja(st, CAT2);
  assert.equal(loja2.tem("mor"), true, "persistiu no storage");
  assert.equal(loja.storageOk(), true);
});

test("★★ criarLoja: storage que LANCA no getItem -> cai pro default, NAO quebra", () => {
  let loja;
  assert.doesNotThrow(() => { loja = Core.criarLoja(storageQueLanca(), CAT2); },
    "construir a loja com storage que lanca nunca joga");
  assert.equal(loja.progresso().n, 0, "carregar falhou -> album vazio, sem excecao");
  assert.equal(loja.storageOk(), false, "a loja sabe que o storage nao funciona");
});

test("★★ criarLoja: storage que LANCA no setItem -> cola in-memory, NAO quebra", () => {
  const loja = Core.criarLoja(storageQueLanca(), CAT2);
  assert.doesNotThrow(() => { loja.colar("mor"); }, "colar com storage que lanca nunca joga");
  assert.equal(loja.tem("mor"), true, "a figurinha vale NESTA sessao (in-memory)");
  assert.equal(loja.progresso().n, 1);
  assert.equal(loja.storageOk(), false, "gravar falhou -> storage marcado como off");
});

test("★★ criarLoja: storage nulo/ausente -> in-memory puro, NAO quebra", () => {
  for (const st of [null, undefined, {}]) {
    let loja;
    assert.doesNotThrow(() => { loja = Core.criarLoja(st, CAT2); });
    assert.doesNotThrow(() => { loja.colar("vyr"); });
    assert.equal(loja.tem("vyr"), true, "funciona na sessao mesmo sem storage");
    assert.equal(loja.storageOk(), false);
  }
});

test("★ criarLoja: completo() reflete a colecao inteira via loja", () => {
  const loja = Core.criarLoja(storageFake(), CAT2);
  assert.equal(loja.completo(), false);
  for (const id of CAT2) loja.colar(id);
  assert.equal(loja.completo(), true);
  assert.equal(loja.progresso().faltantes.length, 0);
});
