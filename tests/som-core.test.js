// tests/som-core.test.js
// TDD do nucleo PURO do SOM (item W6 · SOM-2-BOTOES). node:test + node:assert,
// ZERO dependencia de terceiro. Fica FORA de public_html/ pra nao ir no deploy.
// Roda com:
//   node --test tests/som-core.test.js
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const Core = require("../public_html/assets/js/som-core.js");

// ── defaults: EFEITOS liga, MUSICA desliga (o canon) ────────────────────────
test("estadoInicial: efeitos ON, musica OFF", () => {
  const e = Core.estadoInicial();
  assert.equal(e.efeitos, true);
  assert.equal(e.musica, false);
});

test("estadoInicial: devolve copia nova (nao a mesma referencia)", () => {
  const a = Core.estadoInicial();
  const b = Core.estadoInicial();
  assert.notEqual(a, b, "cada chamada e um objeto novo");
  a.efeitos = false;
  assert.equal(Core.estadoInicial().efeitos, true, "mutar a copia nao contamina o default");
});

// ── alternar: inverte o canal pedido, sem tocar no outro ────────────────────
test("alternar: efeitos inverte true->false", () => {
  const e = Core.alternar(Core.estadoInicial(), "efeitos");
  assert.equal(e.efeitos, false);
  assert.equal(e.musica, false, "musica nao muda");
});

test("alternar: musica inverte false->true", () => {
  const e = Core.alternar(Core.estadoInicial(), "musica");
  assert.equal(e.musica, true);
  assert.equal(e.efeitos, true, "efeitos nao muda");
});

test("alternar: duas vezes o mesmo canal volta ao original", () => {
  let e = Core.estadoInicial();
  e = Core.alternar(e, "musica");
  e = Core.alternar(e, "musica");
  assert.deepEqual(e, Core.estadoInicial());
});

test("alternar: nao muta a entrada (imutabilidade)", () => {
  const antes = Core.estadoInicial();
  const copia = { efeitos: antes.efeitos, musica: antes.musica };
  Core.alternar(antes, "efeitos");
  assert.deepEqual(antes, copia, "a entrada fica intacta");
});

test("alternar: canal invalido e no-op seguro (copia intacta)", () => {
  for (const bad of ["", "brilho", "MUSICA", null, undefined, 3]) {
    const e = Core.alternar(Core.estadoInicial(), bad);
    assert.deepEqual(e, Core.estadoInicial(), `canal ${String(bad)} nao muda nada`);
  }
});

// ── canalValido: so os dois canais reais ────────────────────────────────────
test("canalValido: so 'efeitos' e 'musica'", () => {
  assert.equal(Core.canalValido("efeitos"), true);
  assert.equal(Core.canalValido("musica"), true);
  for (const bad of ["", "Efeitos", "som", null, undefined, 0]) {
    assert.equal(Core.canalValido(bad), false);
  }
});

// ── normalizar: forca {efeitos,musica} booleanos, canal ruim -> default ──────
test("normalizar: canal ausente cai pro default daquele canal", () => {
  assert.deepEqual(Core.normalizar({}), { efeitos: true, musica: false });
  assert.deepEqual(Core.normalizar({ musica: true }), { efeitos: true, musica: true });
});

test("normalizar: canal nao-booleano cai pro default", () => {
  assert.deepEqual(Core.normalizar({ efeitos: "sim", musica: 1 }), { efeitos: true, musica: false });
  assert.deepEqual(Core.normalizar({ efeitos: 0, musica: null }), { efeitos: true, musica: false });
});

test("normalizar: entrada nao-objeto -> default", () => {
  for (const bad of [null, undefined, 42, "x", true]) {
    assert.deepEqual(Core.normalizar(bad), Core.estadoInicial());
  }
});

test("normalizar: descarta chaves extras (so efeitos/musica saem)", () => {
  const out = Core.normalizar({ efeitos: false, musica: true, volume: 9, hack: "x" });
  assert.deepEqual(out, { efeitos: false, musica: true });
});

// ── serializar/desserializar: round-trip fiel ───────────────────────────────
test("round-trip: serializar depois desserializar preserva o estado", () => {
  for (const estado of [
    { efeitos: true, musica: false },
    { efeitos: false, musica: true },
    { efeitos: false, musica: false },
    { efeitos: true, musica: true },
  ]) {
    assert.deepEqual(Core.desserializar(Core.serializar(estado)), estado);
  }
});

test("serializar: sempre emite o formato canonico (so os dois canais)", () => {
  const raw = Core.serializar({ efeitos: false, musica: true, lixo: 1 });
  assert.equal(raw, JSON.stringify({ efeitos: false, musica: true }));
});

// ── desserializar: tolerante a lixo do localStorage -> default ──────────────
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

test("desserializar: JSON valido de tipo errado -> default", () => {
  for (const bad of ["null", "42", '"texto"', "[]", "true"]) {
    assert.deepEqual(Core.desserializar(bad), Core.estadoInicial());
  }
});

test("desserializar: objeto parcial completa com o default", () => {
  assert.deepEqual(Core.desserializar('{"musica":true}'), { efeitos: true, musica: true });
  assert.deepEqual(Core.desserializar('{"efeitos":false}'), { efeitos: false, musica: false });
});

// ── determinismo: mesma entrada -> mesma saida ──────────────────────────────
test("determinismo: alternar e puro (mesma entrada -> mesma saida)", () => {
  const base = { efeitos: true, musica: false };
  assert.deepEqual(Core.alternar(base, "musica"), Core.alternar(base, "musica"));
});

// ── a chave de persistencia e estavel e namespaced ──────────────────────────
test("CHAVE: e a string namespaced esperada", () => {
  assert.equal(Core.CHAVE, "gw_som");
});
