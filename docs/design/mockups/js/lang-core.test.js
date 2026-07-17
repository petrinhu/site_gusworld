// lang-core.test.js
// TDD do nucleo do switch de idioma (mock 13). Zero-dep: node --test + node:assert.
// Roda em DEV/CI (o Hostinger nao tem Node - isso e teste, nao runtime).
"use strict";

const test = require("node:test");
const assert = require("node:assert");
const LangCore = require("./lang-core.js");

// ─────────────────────────────────────────────────────────────────
// shouldCompile: o unico dado EXTERNO que o switch consome e o hash da
// URL. CONVENCOES-JS-PHP: "nao confie em localStorage, querystring, nem
// resposta de fetch" - entao o hash e validado por igualdade exata, nao
// por "contem glyfe". Um `#glyfe-qualquer-coisa` vindo de fora NAO liga
// a animacao.
// ─────────────────────────────────────────────────────────────────
test("shouldCompile: o hash exato #glyfe liga a recompilacao", () => {
  assert.strictEqual(LangCore.shouldCompile("#glyfe"), true);
});

test("shouldCompile: hash ausente ou vazio nao liga (visita normal/SEO)", () => {
  assert.strictEqual(LangCore.shouldCompile(""), false);
  assert.strictEqual(LangCore.shouldCompile("#"), false);
});

test("shouldCompile: outro hash nao liga (ancora de secao da revista)", () => {
  assert.strictEqual(LangCore.shouldCompile("#pag-3"), false);
  assert.strictEqual(LangCore.shouldCompile("#glyfesse"), false);
});

test("shouldCompile: prefixo/sufixo NAO passa (igualdade exata, nao 'contem')", () => {
  assert.strictEqual(LangCore.shouldCompile("#glyfe-x"), false);
  assert.strictEqual(LangCore.shouldCompile("#xglyfe"), false);
  assert.strictEqual(LangCore.shouldCompile("glyfe"), false);
});

test("shouldCompile: case-sensitive (hash e case-sensitive de verdade)", () => {
  assert.strictEqual(LangCore.shouldCompile("#GLYFE"), false);
});

test("shouldCompile: entrada nao-string nunca explode, so devolve false", () => {
  assert.strictEqual(LangCore.shouldCompile(null), false);
  assert.strictEqual(LangCore.shouldCompile(undefined), false);
  assert.strictEqual(LangCore.shouldCompile(42), false);
  assert.strictEqual(LangCore.shouldCompile({}), false);
});

// ─────────────────────────────────────────────────────────────────
// lineDuration: quantos ticks uma linha do log leva pra compilar.
// ─────────────────────────────────────────────────────────────────
test("lineDuration: len * ticksPerChar", () => {
  assert.strictEqual(LangCore.lineDuration("abc", 1), 3);
  assert.strictEqual(LangCore.lineDuration("abc", 2), 6);
  assert.strictEqual(LangCore.lineDuration("", 2), 0);
});

// ─────────────────────────────────────────────────────────────────
// logStateAt: a maquina de estado do log de build da LCD do masthead.
// As linhas compilam EM SEQUENCIA (uma de cada vez, esq->dir), reusando
// o CompileCore ja testado (mock 12). O off-by-one na fronteira entre
// linhas e exatamente a classe de bug que este teste existe pra pegar.
// ─────────────────────────────────────────────────────────────────
const SCRIPT = ["ab", "cd"]; // 2 linhas x 2 chars

test("logStateAt: no tick 0 so a 1a linha existe, e ilegivel", () => {
  const st = LangCore.logStateAt(0, SCRIPT, 1);
  assert.strictEqual(st.lines.length, 1);
  assert.strictEqual(st.lines[0].length, 2);
  assert.notStrictEqual(st.lines[0], "ab"); // ainda em glifo
  assert.strictEqual(st.done, false);
});

test("logStateAt: a 1a linha assenta char a char, esq->dir", () => {
  const st = LangCore.logStateAt(1, SCRIPT, 1);
  assert.strictEqual(st.lines[0].charAt(0), "a"); // 1o char ja assentou
  assert.notStrictEqual(st.lines[0], "ab"); // o 2o ainda nao
});

test("logStateAt: na FRONTEIRA a 1a fica inteira e a 2a comeca (off-by-one)", () => {
  const st = LangCore.logStateAt(2, SCRIPT, 1); // dur da linha 1 = 2
  assert.strictEqual(st.lines.length, 2);
  assert.strictEqual(st.lines[0], "ab"); // linha 1 completa e PERMANECE
  assert.strictEqual(st.lines[1].length, 2); // linha 2 nascendo
  assert.strictEqual(st.done, false);
});

test("logStateAt: no fim exato tudo esta legivel e done vira true", () => {
  const st = LangCore.logStateAt(4, SCRIPT, 1); // 2 + 2
  assert.deepStrictEqual(st.lines, ["ab", "cd"]);
  assert.strictEqual(st.done, true);
});

test("logStateAt: depois do fim o estado CONGELA (nao volta a embaralhar)", () => {
  const st = LangCore.logStateAt(9999, SCRIPT, 1);
  assert.deepStrictEqual(st.lines, ["ab", "cd"]);
  assert.strictEqual(st.done, true);
});

test("logStateAt: tick negativo e tratado como 0 (nunca quebra)", () => {
  const st = LangCore.logStateAt(-5, SCRIPT, 1);
  assert.strictEqual(st.lines.length, 1);
  assert.strictEqual(st.done, false);
});

test("logStateAt: espaco continua espaco enquanto compila (a palavra respira)", () => {
  const st = LangCore.logStateAt(0, ["a b"], 1);
  assert.strictEqual(st.lines[0].charAt(1), " ");
});

test("logStateAt: e DETERMINISTICO (mesmo tick -> mesmo frame; print estavel)", () => {
  assert.deepStrictEqual(
    LangCore.logStateAt(3, SCRIPT, 2).lines,
    LangCore.logStateAt(3, SCRIPT, 2).lines
  );
});

test("logStateAt: ticksPerChar=2 leva o dobro do tempo", () => {
  assert.strictEqual(LangCore.logStateAt(4, SCRIPT, 2).done, false);
  assert.strictEqual(LangCore.logStateAt(8, SCRIPT, 2).done, true);
});

// ─────────────────────────────────────────────────────────────────
// Fail-Fast (CONTRACT §14.3): entrada invalida explode no ponto de
// entrada, em vez de renderizar lixo silencioso na LCD.
// ─────────────────────────────────────────────────────────────────
test("logStateAt: script invalido explode (Fail-Fast, nao lixo na tela)", () => {
  assert.throws(() => LangCore.logStateAt(0, [], 1), TypeError);
  assert.throws(() => LangCore.logStateAt(0, "abc", 1), TypeError);
  assert.throws(() => LangCore.logStateAt(0, [1, 2], 1), TypeError);
  assert.throws(() => LangCore.logStateAt(0, null, 1), TypeError);
});

test("logStateAt: ticksPerChar invalido explode", () => {
  assert.throws(() => LangCore.logStateAt(0, SCRIPT, 0), TypeError);
  assert.throws(() => LangCore.logStateAt(0, SCRIPT, -1), TypeError);
  assert.throws(() => LangCore.logStateAt(0, SCRIPT, 1.5), TypeError);
});

test("logStateAt: ticksPerChar default = 1", () => {
  assert.deepStrictEqual(
    LangCore.logStateAt(3, SCRIPT).lines,
    LangCore.logStateAt(3, SCRIPT, 1).lines
  );
});

// ─────────────────────────────────────────────────────────────────
// totalTicks: quanto dura o log inteiro. O glue precisa disto pra
// casar o tempo da TELA (o log compilando) com o do PAPEL (a tinta
// assentando) - os dois materiais terminam juntos.
// ─────────────────────────────────────────────────────────────────
test("totalTicks: soma a duracao de todas as linhas", () => {
  assert.strictEqual(LangCore.totalTicks(SCRIPT, 1), 4);
  assert.strictEqual(LangCore.totalTicks(SCRIPT, 2), 8);
});

test("totalTicks: no tick devolvido, logStateAt ja esta done (contrato casado)", () => {
  const t = LangCore.totalTicks(SCRIPT, 2);
  assert.strictEqual(LangCore.logStateAt(t, SCRIPT, 2).done, true);
  assert.strictEqual(LangCore.logStateAt(t - 1, SCRIPT, 2).done, false);
});
