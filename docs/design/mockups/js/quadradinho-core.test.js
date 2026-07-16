// quadradinho-core.test.js
// TDD do nucleo PURO do quadradinho (mock 11a, compartilhado com 05/06).
// node:test + node:assert, ZERO dependencia de terceiro. Roda com:
//   node --test docs/design/mockups/js/
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const QuadCore = require("./quadradinho-core.js");

// ── feetHitbox: faixa nos PES (bottom-center), NAO o sprite inteiro ──
test("feetHitbox: dims ~= inset*tileSize, ancorada na base do sprite", () => {
  const tileSize = 22, inset = 0.6;
  const box = QuadCore.feetHitbox(100, 200, tileSize, inset);
  const esperado = Math.round(tileSize * inset); // 13
  assert.equal(box.r - box.l, esperado);
  assert.equal(box.b - box.t, esperado);
  assert.equal(box.b, 200 + tileSize, "base da hitbox = base do sprite (os pes)");
  assert.equal(box.l, 100 + (tileSize - esperado) / 2, "centralizada horizontalmente");
});

test("feetHitbox: o TOPO do sprite nao esta dentro da hitbox (nao e o AABB inteiro)", () => {
  const tileSize = 22, y = 200;
  const box = QuadCore.feetHitbox(100, y, tileSize);
  assert.ok(box.t > y, "hitbox comeca bem abaixo do topo do sprite, nos pes");
});

test("feetHitbox: usa inset default 0.6 quando omitido", () => {
  const tileSize = 22;
  const comInset = QuadCore.feetHitbox(0, 0, tileSize, 0.6);
  const semInset = QuadCore.feetHitbox(0, 0, tileSize);
  assert.deepEqual(semInset, comInset);
});

// ── resolveMove: colisao axis-separated usando o feetHitbox ──
test("resolveMove: pes entrariam na parede -> movimento bloqueado no eixo", () => {
  const tileSize = 22;
  const start = { x: 0, y: 0 };
  const delta = { x: 20, y: 0 };
  // a parede cobre EXATAMENTE onde os pes cairiam apos o movimento
  const pesDepois = QuadCore.feetHitbox(start.x + delta.x, start.y, tileSize);
  const parede = { l: pesDepois.l, t: pesDepois.t, r: pesDepois.r, b: pesDepois.b };
  const result = QuadCore.resolveMove(start, delta, [parede], tileSize);
  assert.deepEqual(result, start, "bloqueado: posicao nao muda");
});

test("resolveMove: so o corpo (acima dos pes) sobrepoe a parede, pes livres -> permitido", () => {
  const tileSize = 22;
  const start = { x: 0, y: 0 };
  const delta = { x: 20, y: 0 };
  const pesDepois = QuadCore.feetHitbox(start.x + delta.x, start.y, tileSize);
  // parede cobre so a faixa ACIMA da hitbox dos pes (o "corpo" do sprite)
  const parede = {
    l: start.x + delta.x,
    t: start.y,
    r: start.x + delta.x + tileSize,
    b: pesDepois.t - 1,
  };
  const result = QuadCore.resolveMove(start, delta, [parede], tileSize);
  assert.deepEqual(result, { x: start.x + delta.x, y: start.y }, "permitido: pes nao colidem");
});

test("resolveMove: delta zero -> sem movimento (sem anda-sozinho)", () => {
  const tileSize = 22;
  const start = { x: 5, y: 5 };
  const result = QuadCore.resolveMove(start, { x: 0, y: 0 }, [], tileSize);
  assert.deepEqual(result, start);
});

test("resolveMove: desliza ao longo da parede (axis separation) - bloqueio num eixo nao trava o outro", () => {
  const tileSize = 22;
  const start = { x: 0, y: 0 };
  const delta = { x: 20, y: 15 }; // diagonal
  // parede so no caminho do eixo X (posicionada com base no feetHitbox pos-X, y original)
  const pesSoX = QuadCore.feetHitbox(start.x + delta.x, start.y, tileSize);
  const parede = { l: pesSoX.l, t: pesSoX.t, r: pesSoX.r, b: pesSoX.b };
  const result = QuadCore.resolveMove(start, delta, [parede], tileSize);
  assert.equal(result.x, start.x, "eixo X bloqueado");
  assert.equal(result.y, start.y + delta.y, "eixo Y livre: deslizou");
});

test("resolveMove: sem paredes, move livre nos dois eixos", () => {
  const tileSize = 22;
  const start = { x: 10, y: 10 };
  const delta = { x: 13, y: -13 };
  const result = QuadCore.resolveMove(start, delta, [], tileSize);
  assert.deepEqual(result, { x: 23, y: -3 });
});

// ── keyToDir: WASD, nao setas ──
test("keyToDir: w/a/s/d mapeiam pro vetor certo (case-insensitive)", () => {
  assert.deepEqual(QuadCore.keyToDir("w"), { x: 0, y: -1 });
  assert.deepEqual(QuadCore.keyToDir("W"), { x: 0, y: -1 });
  assert.deepEqual(QuadCore.keyToDir("a"), { x: -1, y: 0 });
  assert.deepEqual(QuadCore.keyToDir("A"), { x: -1, y: 0 });
  assert.deepEqual(QuadCore.keyToDir("s"), { x: 0, y: 1 });
  assert.deepEqual(QuadCore.keyToDir("S"), { x: 0, y: 1 });
  assert.deepEqual(QuadCore.keyToDir("d"), { x: 1, y: 0 });
  assert.deepEqual(QuadCore.keyToDir("D"), { x: 1, y: 0 });
});

test("keyToDir: setas e outras teclas retornam null (controle e WASD, nao setas)", () => {
  assert.equal(QuadCore.keyToDir("ArrowUp"), null);
  assert.equal(QuadCore.keyToDir("ArrowDown"), null);
  assert.equal(QuadCore.keyToDir("ArrowLeft"), null);
  assert.equal(QuadCore.keyToDir("ArrowRight"), null);
  assert.equal(QuadCore.keyToDir("Enter"), null);
  assert.equal(QuadCore.keyToDir(""), null);
});
