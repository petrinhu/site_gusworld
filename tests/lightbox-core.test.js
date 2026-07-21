// tests/lightbox-core.test.js
// TDD do nucleo PURO do LIGHTBOX (correcoes #5 e #6 da #1). node:test + node:assert,
// ZERO dependencia. Fica FORA de public_html/ (nao vai no deploy).
//   node --test tests/lightbox-core.test.js
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const Core = require("../public_html/assets/js/lightbox-core.js");

// ── o estado inicial e fechado e limpo ──────────────────────────────────────
test("criar: estado inicial fechado", () => {
  assert.deepEqual(Core.criar(), { aberto: false, src: null, alt: null });
});

// ── abrir: guarda src + alt e marca aberto ──────────────────────────────────
test("abrir: com src valido -> aberto com src e alt", () => {
  const e = Core.abrir(Core.criar(), "/assets/edicao-1/tui_claude.png", "o monologo");
  assert.equal(e.aberto, true);
  assert.equal(e.src, "/assets/edicao-1/tui_claude.png");
  assert.equal(e.alt, "o monologo");
});

test("abrir: sem src -> NO-OP (nunca abre overlay vazio)", () => {
  const antes = Core.criar();
  assert.deepEqual(Core.abrir(antes, "", "x"), antes);
  assert.deepEqual(Core.abrir(antes, null, "x"), antes);
  assert.deepEqual(Core.abrir(antes, undefined), antes);
});

test("abrir: alt ausente vira string vazia (nunca 'null' no aria-label)", () => {
  const e = Core.abrir(Core.criar(), "/x.png");
  assert.equal(e.alt, "");
  const e2 = Core.abrir(Core.criar(), "/x.png", null);
  assert.equal(e2.alt, "");
});

// ── fechar: sempre volta ao estado limpo ────────────────────────────────────
test("fechar: de aberto volta a fechado e limpo", () => {
  const aberto = Core.abrir(Core.criar(), "/x.png", "alt");
  assert.deepEqual(Core.fechar(aberto), { aberto: false, src: null, alt: null });
});

// ── teclaParaAcao: so ESC fecha ─────────────────────────────────────────────
test("teclaParaAcao: Escape (e Esc legado) fecham", () => {
  assert.equal(Core.teclaParaAcao("Escape"), "fechar");
  assert.equal(Core.teclaParaAcao("Esc"), "fechar");
});

test("teclaParaAcao: qualquer outra tecla -> null", () => {
  assert.equal(Core.teclaParaAcao("Enter"), null);
  assert.equal(Core.teclaParaAcao("a"), null);
  assert.equal(Core.teclaParaAcao(" "), null);
  assert.equal(Core.teclaParaAcao("Tab"), null);
});

// ── fluxo completo: abrir uma tela, fechar por ESC ──────────────────────────
test("fluxo: abrir tui_claude2 -> ESC fecha", () => {
  let e = Core.criar();
  e = Core.abrir(e, "/assets/edicao-1/tui_claude2.png", "o primeiro prompt");
  assert.equal(e.aberto, true);
  assert.equal(Core.teclaParaAcao("Escape"), "fechar");
  e = Core.fechar(e);
  assert.equal(e.aberto, false);
  assert.equal(e.src, null);
});
