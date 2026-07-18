// tests/linha-tempo-core.test.js
// TDD do nucleo PURO da LINHA DO TEMPO (item W6 · LINHA-TEMPO). node:test +
// node:assert, ZERO dependencia de terceiro. Fica FORA de public_html/ pra nao
// ir no deploy. Roda com:  node --test tests/
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
//
// O core so faz matematica de tempo: dada a lista de pontos (edicoes visuais
// publicadas, ja filtrada e em ordem cronologica ASC pelo helper PHP) e uma
// posicao de scrub 0..1, calcula o par de frames ativo + o fator de crossfade,
// mapeia posicao<->data por tempo REAL, o passo de teclado e o clique. Sem DOM,
// sem Date, sem random: deterministico.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const LT = require("../public_html/assets/js/linha-tempo-core.js");

// datas reais da era visual (cronologia-real-datada): o quadrado (22/jun) em
// diante. Aqui uso listas sinteticas pra exercitar o core; a producao passa a
// lista real (hoje 1 ponto).
const UM = [{ data: "2026-06-22" }];
const DOIS = [{ data: "2026-06-22" }, { data: "2026-06-24" }];
const TRES = [{ data: "2026-06-22" }, { data: "2026-06-24" }, { data: "2026-07-15" }];

const perto = (a, b, eps = 1e-9) => Math.abs(a - b) <= eps;

// ── diasDesdeEpoch: ISO 'YYYY-MM-DD' -> inteiro de dias (puro, sem Date) ──────
test("diasDesdeEpoch: diferenca em dias bate com o calendario real", () => {
  const a = LT.diasDesdeEpoch("2026-06-22");
  const b = LT.diasDesdeEpoch("2026-06-24");
  const c = LT.diasDesdeEpoch("2026-07-15");
  const g = LT.diasDesdeEpoch("2026-05-15");
  assert.equal(b - a, 2, "22->24 jun = 2 dias");
  assert.equal(c - a, 23, "22 jun -> 15 jul = 23 dias");
  assert.equal(a - g, 38, "15 mai -> 22 jun = 38 dias");
});

test("diasDesdeEpoch: string invalida vira NaN (nao inventa data)", () => {
  assert.ok(Number.isNaN(LT.diasDesdeEpoch("nao-e-data")));
  assert.ok(Number.isNaN(LT.diasDesdeEpoch("")));
});

// ── tempos / extentTempo ─────────────────────────────────────────────────────
test("tempos: mapeia cada ponto pro seu dia, preservando ordem e tamanho", () => {
  const t = LT.tempos(TRES);
  assert.equal(t.length, 3);
  assert.ok(t[0] < t[1] && t[1] < t[2], "ascendente, como o helper entrega");
});

test("extentTempo: min e max da lista; 1 ponto => min==max", () => {
  assert.deepEqual(LT.extentTempo(LT.tempos(UM)), {
    min: LT.diasDesdeEpoch("2026-06-22"),
    max: LT.diasDesdeEpoch("2026-06-22"),
  });
  const e = LT.extentTempo(LT.tempos(TRES));
  assert.ok(e.min < e.max);
});

// ── 1 PONTO: degenerado, NAO quebra (canon do item LINHA-TEMPO) ──────────────
test("1 ponto: sem crossfade (i==j, f=0), so o unico frame aceso", () => {
  const t = LT.tempos(UM);
  const cf = LT.crossfade(t, 0);
  assert.equal(cf.i, 0);
  assert.equal(cf.j, 0);
  assert.equal(cf.f, 0);
  assert.equal(LT.opacidadeFrame(0, cf), 1, "o unico frame fica 100% aceso");
});

test("1 ponto: qualquer scrub cai no unico ponto (pos e data colapsam)", () => {
  const t = LT.tempos(UM);
  for (const s of [0, 0.3, 0.7, 1]) {
    assert.equal(LT.indiceMaisProximo(t, s), 0);
    assert.equal(LT.posDoIndice(t, 0), 0, "o unico ponto senta no inicio do trilho");
    assert.equal(LT.scrubParaTempo(s, LT.extentTempo(t)), t[0], "data colapsa no unico dia");
  }
});

test("1 ponto: passo de teclado nunca sai do indice 0", () => {
  assert.equal(LT.passo(0, +1, 1), 0);
  assert.equal(LT.passo(0, -1, 1), 0);
});

// ── 2+ PONTOS: crossfade correto no meio, 0/1 nas pontas ─────────────────────
test("2 pontos: s=0 -> so o 1o frame; s=1 -> so o ultimo (pontas limpas)", () => {
  const t = LT.tempos(DOIS);
  const ini = LT.crossfade(t, 0);
  assert.equal(LT.opacidadeFrame(0, ini), 1);
  assert.equal(LT.opacidadeFrame(1, ini), 0);
  const fim = LT.crossfade(t, 1);
  assert.equal(LT.opacidadeFrame(0, fim), 0);
  assert.equal(LT.opacidadeFrame(1, fim), 1);
});

test("2 pontos: no meio do tempo, crossfade meio-a-meio", () => {
  const t = LT.tempos(DOIS); // 22 e 24 jun: o meio real e 23 jun (s=0.5)
  const cf = LT.crossfade(t, 0.5);
  assert.equal(cf.i, 0);
  assert.equal(cf.j, 1);
  assert.ok(perto(cf.f, 0.5), "dissolve meio-a-meio no ponto medio do tempo");
  assert.ok(perto(LT.opacidadeFrame(0, cf), 0.5));
  assert.ok(perto(LT.opacidadeFrame(1, cf), 0.5));
});

test("3 pontos: as marcas se espacam por TEMPO REAL, nao por indice", () => {
  const t = LT.tempos(TRES); // dias relativos 0, 2, 23
  assert.equal(LT.posDoIndice(t, 0), 0);
  assert.equal(LT.posDoIndice(t, 2), 1);
  assert.ok(perto(LT.posDoIndice(t, 1), 2 / 23), "o 2o ponto fica em 2/23, nao em 0.5");
});

test("3 pontos: crossfade sempre entre vizinhos e dentro dos limites", () => {
  const t = LT.tempos(TRES);
  for (let s = 0; s <= 1.0001; s += 0.05) {
    const cf = LT.crossfade(t, Math.min(1, s));
    assert.ok(cf.i >= 0 && cf.i < t.length, "i dentro da lista");
    assert.ok(cf.j >= 0 && cf.j < t.length, "j dentro da lista");
    assert.ok(cf.j - cf.i === 0 || cf.j - cf.i === 1, "so vizinhos dissolvem");
    assert.ok(cf.f >= 0 && cf.f <= 1, "fator normalizado");
  }
});

// ── teclado: seta pula pro ponto vizinho, com clamp ──────────────────────────
test("passo: seta move pro vizinho e nunca estoura os limites", () => {
  assert.equal(LT.passo(0, +1, 3), 1);
  assert.equal(LT.passo(1, +1, 3), 2);
  assert.equal(LT.passo(2, +1, 3), 2, "clamp no fim");
  assert.equal(LT.passo(0, -1, 3), 0, "clamp no inicio");
});

// ── clique num mes/ponto -> posicao; a posicao volta pro mesmo ponto ─────────
test("clique: cada ponto vira a posicao que o traz de volta como o mais proximo", () => {
  const t = LT.tempos(TRES);
  for (let k = 0; k < t.length; k++) {
    const s = LT.posDoIndice(t, k);
    assert.ok(s >= 0 && s <= 1, "posicao normalizada");
    assert.equal(LT.indiceMaisProximo(t, s), k, "clicar no ponto k aterrissa no ponto k");
  }
});

// ── 0 PONTOS: o core nao inventa pontos (a lista ja vem filtrada) ────────────
test("0 pontos: nada e inventado (indices vazios, sem frame aceso)", () => {
  assert.equal(LT.indiceMaisProximo([], 0.5), -1, "sem ponto = sem indice");
  const cf = LT.crossfade([], 0.5);
  assert.equal(LT.opacidadeFrame(0, cf), 0, "nenhum frame acende do nada");
});
