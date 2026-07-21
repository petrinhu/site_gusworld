// tests/typing-core.test.js
// TDD do nucleo PURO da DIGITACAO-AO-ENTRAR-NA-VIEW (correcao #3 da #1). node:test
// + node:assert, ZERO dependencia. Fica FORA de public_html/ (nao vai no deploy).
//   node --test tests/typing-core.test.js
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const Core = require("../public_html/assets/js/typing-core.js");

// ── onIntersect: dispara UMA vez, ao entrar na view ─────────────────────────
test("onIntersect: visivel e ainda nao disparou -> start + stop", () => {
  const r = Core.onIntersect({ isIntersecting: true }, false);
  assert.deepEqual(r, { start: true, stop: true });
});

test("onIntersect: NAO visivel -> nao faz nada (aguarda entrar)", () => {
  const r = Core.onIntersect({ isIntersecting: false }, false);
  assert.deepEqual(r, { start: false, stop: false });
});

test("onIntersect: ja disparou -> nunca re-dispara (uma vez so)", () => {
  const r = Core.onIntersect({ isIntersecting: true }, true);
  assert.deepEqual(r, { start: false, stop: false });
});

test("onIntersect: entry nulo/indefinido nao quebra", () => {
  assert.deepEqual(Core.onIntersect(null, false), { start: false, stop: false });
  assert.deepEqual(Core.onIntersect(undefined, false), { start: false, stop: false });
});

// ── deveArmar: so arma com observer E sem movimento reduzido ────────────────
test("deveArmar: com observer e sem reduced-motion -> true", () => {
  assert.equal(Core.deveArmar(true, false), true);
});

test("deveArmar: prefers-reduced-motion -> NAO arma (estado final fica)", () => {
  assert.equal(Core.deveArmar(true, true), false);
});

test("deveArmar: sem IntersectionObserver -> NAO arma (nunca esconde sem revelar)", () => {
  assert.equal(Core.deveArmar(false, false), false);
  assert.equal(Core.deveArmar(false, true), false);
});

// ── o fluxo completo simulado: entra, digita, para de observar ──────────────
test("fluxo: fora da view -> entra -> digita uma vez, depois ignora", () => {
  let disparou = false;
  // 1) ainda fora da tela: nada acontece
  let a = Core.onIntersect({ isIntersecting: false }, disparou);
  assert.equal(a.start, false);
  // 2) entrou na tela: dispara e manda parar de observar
  a = Core.onIntersect({ isIntersecting: true }, disparou);
  assert.equal(a.start, true);
  assert.equal(a.stop, true);
  disparou = true;
  // 3) se por acaso reentrar, nao re-digita
  a = Core.onIntersect({ isIntersecting: true }, disparou);
  assert.equal(a.start, false);
});
