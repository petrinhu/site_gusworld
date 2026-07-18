// tests/press-start-core.test.js
// TDD do nucleo PURO do PRESS START (item W6 · D-PRESS-START). node:test +
// node:assert, ZERO dependencia de terceiro. Fica FORA de public_html/ pra nao
// ir no deploy. Roda com:
//   node --test tests/press-start-core.test.js
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const Core = require("../public_html/assets/js/press-start-core.js");

// ── estado inicial: comeca em REPOUSO (o attract screen) ────────────────────
test("estadoInicial: comeca em REPOUSO, sem passo nem tempo", () => {
  const e = Core.estadoInicial();
  assert.equal(e.nome, Core.ESTADO.REPOUSO);
  assert.equal(e.passo, 0);
  assert.equal(e.ms, 0);
});

// ── keyLiga: Enter/Espaco LIGAM; WASD, setas e o resto NAO ──────────────────
test("keyLiga: Enter e Espaco ligam o START", () => {
  assert.equal(Core.keyLiga("Enter"), true);
  assert.equal(Core.keyLiga(" "), true);
  assert.equal(Core.keyLiga("Spacebar"), true); // legado
});

test("keyLiga: WASD, setas e outras teclas NAO ligam", () => {
  for (const k of ["w", "a", "s", "d", "ArrowUp", "Escape", "", "1"]) {
    assert.equal(Core.keyLiga(k), false);
  }
  assert.equal(Core.keyLiga(null), false);
  assert.equal(Core.keyLiga(undefined), false);
});

// ── apertar: repouso -> boot; o input dispara a sequencia ───────────────────
test("apertar: de REPOUSO liga o BOOT (passo 0, ms 0)", () => {
  const e = Core.apertar(Core.estadoInicial());
  assert.equal(e.nome, Core.ESTADO.BOOT);
  assert.equal(e.passo, 0);
  assert.equal(e.ms, 0);
});

test("apertar: com pularBoot vai de REPOUSO direto pra MENSAGEM (reduced-motion)", () => {
  const e = Core.apertar(Core.estadoInicial(), { pularBoot: true });
  assert.equal(e.nome, Core.ESTADO.MENSAGEM);
});

// ── avancar: o BOOT corre por TEMPO, na ordem certa ─────────────────────────
test("avancar: o boot avanca o passo por tempo, cumulativo", () => {
  const cfg = { passos: 4, msPorPasso: 320 };
  let e = Core.apertar(Core.estadoInicial()); // boot, passo 0, ms 0
  assert.equal(e.passo, 0);
  e = Core.avancar(e, 320, cfg); // ms 320 -> passo 1
  assert.equal(e.nome, Core.ESTADO.BOOT);
  assert.equal(e.passo, 1);
  e = Core.avancar(e, 320, cfg); // ms 640 -> passo 2
  assert.equal(e.passo, 2);
  e = Core.avancar(e, 320, cfg); // ms 960 -> passo 3
  assert.equal(e.passo, 3);
  assert.equal(e.nome, Core.ESTADO.BOOT, "no passo 3 (de 4) ainda esta bootando");
});

test("avancar: a sequencia so avanca, nunca pula um passo intermediario", () => {
  const cfg = { passos: 4, msPorPasso: 320 };
  let e = Core.apertar(Core.estadoInicial());
  const vistos = [e.passo];
  // fatia o tempo em pedacos pequenos: o passo sobe 0->1->2->3, sem saltos.
  for (let i = 0; i < 12; i++) {
    e = Core.avancar(e, 80, cfg);
    if (e.nome === Core.ESTADO.BOOT && e.passo !== vistos[vistos.length - 1]) {
      vistos.push(e.passo);
    }
  }
  assert.deepEqual(vistos, [0, 1, 2, 3], "passos em ordem, sem buraco");
});

test("avancar: ao completar os passos, o boot aterrissa na MENSAGEM (terminal)", () => {
  const cfg = { passos: 4, msPorPasso: 320 };
  let e = Core.apertar(Core.estadoInicial());
  e = Core.avancar(e, 320 * 4, cfg); // ms 1280 -> passo 4 >= 4
  assert.equal(e.nome, Core.ESTADO.MENSAGEM, "a mensagem honesta e o fim do boot");
});

test("avancar: MENSAGEM e terminal (nao volta a bootar sozinha)", () => {
  const cfg = { passos: 4, msPorPasso: 320 };
  let e = { nome: Core.ESTADO.MENSAGEM, passo: 4, ms: 1280 };
  const depois = Core.avancar(e, 999999, cfg);
  assert.deepEqual(depois, e, "sem apertar, a mensagem nao muda");
});

test("avancar: REPOUSO e inerte (nao anda sem apertar START)", () => {
  const e = Core.estadoInicial();
  assert.deepEqual(Core.avancar(e, 5000), e, "o attract nao boota sozinho");
});

// ── reset: apertar na MENSAGEM volta ao REPOUSO ─────────────────────────────
test("apertar: na MENSAGEM RESETA pro REPOUSO (o novo clique volta ao poster)", () => {
  const e = Core.apertar({ nome: Core.ESTADO.MENSAGEM, passo: 4, ms: 1280 });
  assert.equal(e.nome, Core.ESTADO.REPOUSO);
  assert.equal(e.passo, 0);
  assert.equal(e.ms, 0);
});

test("apertar: no meio do BOOT e no-op (nao interrompe a sequencia)", () => {
  const meio = { nome: Core.ESTADO.BOOT, passo: 2, ms: 700 };
  assert.deepEqual(Core.apertar(meio), meio);
});

// ── determinismo: mesma entrada -> mesma saida, sem relogio interno ─────────
test("avancar: deterministico (mesma entrada -> mesma saida)", () => {
  const cfg = { passos: 4, msPorPasso: 320 };
  const base = { nome: Core.ESTADO.BOOT, passo: 1, ms: 400 };
  assert.deepEqual(Core.avancar(base, 250, cfg), Core.avancar(base, 250, cfg));
});

test("avancar: cfg custom (passos/msPorPasso) manda no ritmo", () => {
  const cfg = { passos: 2, msPorPasso: 100 };
  let e = Core.apertar(Core.estadoInicial());
  e = Core.avancar(e, 100, cfg); // passo 1
  assert.equal(e.nome, Core.ESTADO.BOOT);
  e = Core.avancar(e, 100, cfg); // passo 2 >= 2 -> mensagem
  assert.equal(e.nome, Core.ESTADO.MENSAGEM);
});
