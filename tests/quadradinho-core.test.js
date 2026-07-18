// tests/quadradinho-core.test.js
// TDD do nucleo PURO do quadradinho (item W6 · QUADRADINHO). node:test +
// node:assert, ZERO dependencia de terceiro. Fica FORA de public_html/ pra nao
// ir no deploy (o deploy.sh rsynca public_html/ inteiro). Roda com:
//   node --test tests/
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const QuadCore = require("../public_html/assets/js/quadradinho-core.js");

const TILE = 22;

// helper: uma parede que cobre EXATAMENTE a hitbox dos pes na posicao alvo.
function paredeNosPes(x, y) {
  const b = QuadCore.feetHitbox(x, y, TILE);
  return { l: b.l, t: b.t, r: b.r, b: b.b };
}

// ── feetHitbox: faixa nos PES (bottom-center), NAO o sprite inteiro ─────────
test("feetHitbox: dims ~= inset*tile, ancorada na base do sprite", () => {
  const box = QuadCore.feetHitbox(100, 200, TILE, 0.6);
  const lado = Math.round(TILE * 0.6); // 13
  assert.equal(box.r - box.l, lado);
  assert.equal(box.b - box.t, lado);
  assert.equal(box.b, 200 + TILE, "base da hitbox = base do sprite (os pes)");
  assert.equal(box.l, 100 + (TILE - lado) / 2, "centralizada na horizontal");
});

test("feetHitbox: o TOPO do sprite fica FORA da hitbox (nao e o AABB inteiro)", () => {
  const y = 200;
  const box = QuadCore.feetHitbox(100, y, TILE);
  assert.ok(box.t > y, "a hitbox comeca bem abaixo do topo, nos pes");
});

test("feetHitbox: inset default = 0.6 quando omitido", () => {
  assert.deepEqual(QuadCore.feetHitbox(0, 0, TILE), QuadCore.feetHitbox(0, 0, TILE, 0.6));
});

// ── colisao BLOQUEIA nas 4 direcoes ─────────────────────────────────────────
for (const [nome, delta] of [
  ["direita", { x: 18, y: 0 }],
  ["esquerda", { x: -18, y: 0 }],
  ["baixo", { x: 0, y: 18 }],
  ["cima", { x: 0, y: -18 }],
]) {
  test(`resolveMove: colisao bloqueia indo para ${nome} (nao sobrepoe a parede)`, () => {
    const start = { x: 100, y: 100 };
    const parede = paredeNosPes(start.x + delta.x, start.y + delta.y);
    const res = QuadCore.resolveMove(start, delta, [parede], TILE);
    // os pes nao entram na parede: a hitbox final nao sobrepoe.
    const fim = QuadCore.feetHitbox(res.x, res.y, TILE);
    const dentro = fim.l < parede.r - 0.5 && fim.r > parede.l + 0.5 &&
                   fim.t < parede.b - 0.5 && fim.b > parede.t + 0.5;
    assert.ok(!dentro, "os pes NAO invadiram a parede");
    // e nao passou para o outro lado (bloqueado, nao teleportou).
    if (delta.x > 0) assert.ok(res.x < start.x + delta.x, "barrado antes do alvo");
    if (delta.x < 0) assert.ok(res.x > start.x + delta.x, "barrado antes do alvo");
    if (delta.y > 0) assert.ok(res.y < start.y + delta.y, "barrado antes do alvo");
    if (delta.y < 0) assert.ok(res.y > start.y + delta.y, "barrado antes do alvo");
  });
}

// ── hitbox nos PES: passa por baixo de parede alta, mas bate na base ─────────
test("hitbox nos pes: parede so no CORPO (acima dos pes) nao bloqueia", () => {
  const start = { x: 100, y: 100 };
  const delta = { x: 18, y: 0 };
  const pes = QuadCore.feetHitbox(start.x + delta.x, start.y, TILE);
  // parede cobre so a faixa ACIMA da hitbox dos pes (o "corpo" do sprite).
  const parede = { l: start.x + delta.x, t: start.y, r: start.x + delta.x + TILE, b: pes.t - 1 };
  const res = QuadCore.resolveMove(start, delta, [parede], TILE);
  assert.ok(Math.abs(res.x - (start.x + delta.x)) < 1e-9, "passou: os pes estavam livres");
});

test("hitbox nos pes: parede na BASE bloqueia (a mesma coluna, mas nos pes)", () => {
  const start = { x: 100, y: 100 };
  const delta = { x: 18, y: 0 };
  const parede = paredeNosPes(start.x + delta.x, start.y);
  const res = QuadCore.resolveMove(start, delta, [parede], TILE);
  assert.ok(res.x < start.x + delta.x, "bateu na base");
});

// ── desliza ao longo da parede (axis separation) ────────────────────────────
test("resolveMove: bloqueio num eixo nao trava o outro (desliza)", () => {
  const start = { x: 100, y: 100 };
  const delta = { x: 18, y: 12 };
  const parede = paredeNosPes(start.x + delta.x, start.y); // so no caminho do X
  const res = QuadCore.resolveMove(start, delta, [parede], TILE);
  assert.ok(res.x < start.x + delta.x, "X barrado");
  assert.ok(res.y > start.y + 1, "Y deslizou");
});

test("resolveMove: sem paredes move livre nos dois eixos", () => {
  const res = QuadCore.resolveMove({ x: 10, y: 10 }, { x: 12, y: -12 }, [], TILE);
  assert.ok(Math.abs(res.x - 22) < 1e-9 && Math.abs(res.y - -2) < 1e-9);
});

test("resolveMove: delta zero nao move (sem anda-sozinho)", () => {
  assert.deepEqual(QuadCore.resolveMove({ x: 5, y: 5 }, { x: 0, y: 0 }, [], TILE), { x: 5, y: 5 });
});

// ── anti-tunneling: passo grande nao ATRAVESSA parede fina ──────────────────
test("resolveMove: salto grande NAO tunela por uma parede fina no caminho", () => {
  const start = { x: 100, y: 100 };
  const delta = { x: 80, y: 0 }; // salto bem maior que o tile
  // parede fina (3px) plantada no MEIO do caminho, cobrindo a faixa dos pes.
  const meioX = start.x + 40;
  const pes = QuadCore.feetHitbox(meioX, start.y, TILE);
  const parede = { l: meioX + TILE / 2 - 1.5, t: pes.t, r: meioX + TILE / 2 + 1.5, b: pes.b };
  const res = QuadCore.resolveMove(start, delta, [parede], TILE);
  const fim = QuadCore.feetHitbox(res.x, start.y, TILE);
  assert.ok(fim.l <= parede.l + 0.5, "parou ANTES da parede fina, nao teleportou para depois");
});

// ── keyToDir: WASD, nao setas ───────────────────────────────────────────────
test("keyToDir: w/a/s/d -> vetor certo (case-insensitive)", () => {
  assert.deepEqual(QuadCore.keyToDir("w"), { x: 0, y: -1 });
  assert.deepEqual(QuadCore.keyToDir("A"), { x: -1, y: 0 });
  assert.deepEqual(QuadCore.keyToDir("s"), { x: 0, y: 1 });
  assert.deepEqual(QuadCore.keyToDir("D"), { x: 1, y: 0 });
});

test("keyToDir: setas e outras teclas -> null (controle e WASD, nao setas)", () => {
  for (const k of ["ArrowUp", "ArrowLeft", "Enter", "", " ", "1"]) {
    assert.equal(QuadCore.keyToDir(k), null);
  }
  assert.equal(QuadCore.keyToDir(null), null);
});

// ── maquina de estado: parado -> andando -> vira o Gus ──────────────────────
test("faseInicial: comeca PARADO, sem passos nem tempo", () => {
  const f = QuadCore.faseInicial();
  assert.equal(f.nome, QuadCore.FASE.PARADO);
  assert.equal(f.passos, 0);
  assert.equal(f.ms, 0);
});

test("aoAndar: o 1o passo sai de PARADO para ANDANDO (ainda nao virou)", () => {
  const f = QuadCore.aoAndar(QuadCore.faseInicial(), 100, { passosPraVirar: 8 });
  assert.equal(f.nome, QuadCore.FASE.ANDANDO);
  assert.equal(f.passos, 1);
});

test("aoAndar: vira o Gus ao atingir passosPraVirar (default 8)", () => {
  let f = QuadCore.faseInicial();
  for (let i = 0; i < 7; i++) f = QuadCore.aoAndar(f, 50);
  assert.equal(f.nome, QuadCore.FASE.ANDANDO, "no 7o passo ainda nao virou");
  f = QuadCore.aoAndar(f, 50);
  assert.equal(f.nome, QuadCore.FASE.GUS, "no 8o passo virou o Gus");
});

test("aoAndar: vira o Gus por TEMPO mesmo com poucos passos (~5s)", () => {
  const cfg = { passosPraVirar: 999, msPraVirar: 5000 };
  let f = QuadCore.aoAndar(QuadCore.faseInicial(), 0, cfg); // passo 1, ms=0
  f = QuadCore.aoAndar(f, 2000, cfg); // ms=2000
  assert.equal(f.nome, QuadCore.FASE.ANDANDO);
  f = QuadCore.aoAndar(f, 3100, cfg); // ms=5100 >= 5000
  assert.equal(f.nome, QuadCore.FASE.GUS, "passou de ~5s andando -> virou");
});

test("aoAndar: GUS e terminal (nao desvira)", () => {
  let f = QuadCore.faseInicial();
  for (let i = 0; i < 8; i++) f = QuadCore.aoAndar(f, 50);
  assert.equal(f.nome, QuadCore.FASE.GUS);
  const depois = QuadCore.aoAndar(f, 999999);
  assert.equal(depois.nome, QuadCore.FASE.GUS);
  assert.equal(depois.passos, f.passos, "nao conta mais passos depois de virar");
});

test("aoAndar: deterministico (mesma entrada -> mesma saida, sem relogio interno)", () => {
  const a = QuadCore.aoAndar({ nome: QuadCore.FASE.ANDANDO, passos: 3, ms: 1000 }, 250);
  const b = QuadCore.aoAndar({ nome: QuadCore.FASE.ANDANDO, passos: 3, ms: 1000 }, 250);
  assert.deepEqual(a, b);
});
