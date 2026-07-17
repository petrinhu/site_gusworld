// compile-core.test.js
// TDD do nucleo PURO do hook "o texto compila" (mock 12, capa da Edicao #1).
// node:test + node:assert, ZERO dependencia de terceiro. Roda com:
//   node --test docs/design/mockups/js/
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const CompileCore = require("./compile-core.js");

const ALVO = "no comeco, o mundo era so uma frase";

// ── revealedCount: assenta esquerda -> direita, ticksPerChar default 2 ──
test("revealedCount: 0 no tick 0, e monotonico nao-decrescente", () => {
  assert.equal(CompileCore.revealedCount(0), 0);
  let ant = -1;
  for (let t = 0; t <= 40; t++) {
    const r = CompileCore.revealedCount(t);
    assert.ok(r >= ant, "nunca anda pra tras");
    ant = r;
  }
});

test("revealedCount: ticksPerChar default e 2 (um char a cada 2 ticks)", () => {
  assert.equal(CompileCore.revealedCount(0, 2), CompileCore.revealedCount(0));
  assert.equal(CompileCore.revealedCount(2), 1);
  assert.equal(CompileCore.revealedCount(3), 1);
  assert.equal(CompileCore.revealedCount(4), 2);
});

test("revealedCount: tick negativo -> 0 (nunca quebra)", () => {
  assert.equal(CompileCore.revealedCount(-5), 0);
});

// ── scrambleChar: deterministico e sempre dentro do pool ──
test("scrambleChar: deterministico (mesma entrada -> mesma saida)", () => {
  assert.equal(CompileCore.scrambleChar(3, 7), CompileCore.scrambleChar(3, 7));
});

test("scrambleChar: SEMPRE um glifo do pool (nunca uma letra do alvo)", () => {
  for (let i = 0; i < 50; i++) {
    for (let t = 0; t < 50; t++) {
      assert.ok(CompileCore.GLYPHS.includes(CompileCore.scrambleChar(i, t)));
    }
  }
});

// ── compileText: comprimento, espacos, prefixo assentado, fim ──
test("compileText: comprimento SEMPRE igual ao do alvo", () => {
  for (let t = 0; t <= 100; t += 3) {
    assert.equal(CompileCore.compileText(ALVO, t).length, ALVO.length);
  }
});

test("compileText: espacos sao preservados em qualquer tick", () => {
  const idxEspacos = [];
  for (let i = 0; i < ALVO.length; i++) if (ALVO[i] === " ") idxEspacos.push(i);
  assert.ok(idxEspacos.length > 0, "o alvo tem espacos");
  for (const t of [0, 5, 12, 30]) {
    const out = CompileCore.compileText(ALVO, t);
    for (const i of idxEspacos) assert.equal(out[i], " ");
  }
});

test("compileText: o prefixo ja assentado bate EXATAMENTE com o alvo", () => {
  const t = 20;
  const revealed = CompileCore.revealedCount(t);
  const out = CompileCore.compileText(ALVO, t);
  assert.equal(out.slice(0, revealed), ALVO.slice(0, revealed));
});

test("compileText: chars ainda NAO assentados (nao-espaco) sao glifos do pool", () => {
  const t = 6;
  const revealed = CompileCore.revealedCount(t);
  const out = CompileCore.compileText(ALVO, t);
  for (let i = revealed; i < ALVO.length; i++) {
    if (ALVO[i] === " ") continue;
    assert.ok(CompileCore.GLYPHS.includes(out[i]), `char ${i} deveria ser glifo`);
  }
});

test("compileText: quando compilou tudo, o texto E o alvo (ipsis litteris)", () => {
  const tFim = ALVO.length * 2; // ticksPerChar 2
  assert.ok(CompileCore.isDone(ALVO, tFim));
  assert.equal(CompileCore.compileText(ALVO, tFim), ALVO);
});

// ── isDone ──
test("isDone: falso antes de assentar o ultimo char, verdadeiro depois", () => {
  const quaseFim = (ALVO.length - 1) * 2;
  assert.equal(CompileCore.isDone(ALVO, quaseFim), false);
  assert.equal(CompileCore.isDone(ALVO, ALVO.length * 2), true);
});

test("isDone: alvo vazio ja esta pronto no tick 0", () => {
  assert.equal(CompileCore.isDone("", 0), true);
});
