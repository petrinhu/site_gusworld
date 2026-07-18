// tests/glyfa-core.test.js
// TDD do nucleo PURO da GLYFA (item W6 · GLYFA + TST-GLYFA-PALAVRAO). node:test
// + node:assert, ZERO dependencia de terceiro. Fica FORA de public_html/ pra
// nao ir no deploy. Roda com:
//   node --test tests/glyfa-core.test.js
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const Core = require("../public_html/assets/js/glyfa-core.js");

// ── a juncao fonetica canon: mor + lhin = Morlhin ("voz-sombra") ────────────
// O par que o lider JA canonizou. Ancora todo o resto.
test("forjar(mor, lhin) = Morlhin, voz-sombra (o canon do lider)", () => {
  const r = Core.forjar("mor", "lhin");
  assert.equal(r.nome, "Morlhin");
  assert.equal(r.significado_pt, "voz-sombra");
  assert.equal(r.significado_en, "voice-shadow");
});

// ── o SIGNIFICADO poe a 2a raiz na frente (nucleo final), como no canon ─────
test("mor + sylva = Morsylva, mata-sombra (2a raiz na frente)", () => {
  const r = Core.forjar("mor", "sylva");
  assert.equal(r.nome, "Morsylva");
  assert.equal(r.significado_pt, "mata-sombra");
});

test("a ordem importa: forjar(lhin, mor) != forjar(mor, lhin)", () => {
  const ab = Core.forjar("mor", "lhin");
  const ba = Core.forjar("lhin", "mor");
  assert.equal(ab.nome, "Morlhin");
  assert.equal(ba.nome, "Lhinmor");
  assert.equal(ba.significado_pt, "sombra-voz");
});

// ── a regra eufonica: vogal identica na costura colapsa em uma ──────────────
test("juntar colapsa vogal identica na juntura (glyfa+anh = Glyfanh)", () => {
  assert.equal(Core.juntar("glyfa", "anh"), "Glyfanh");
  assert.equal(Core.juntar("cale", "elen"), "Calelen");
});

test("juntar NAO mexe em consoante+consoante nem vogais diferentes", () => {
  assert.equal(Core.juntar("mor", "lhin"), "Morlhin");
  assert.equal(Core.juntar("sylva", "elen"), "Sylvaelen");
});

// ── forjar exige duas raizes DISTINTAS e validas ────────────────────────────
test("forjar rejeita raiz igual a si mesma (moderacao por design)", () => {
  assert.equal(Core.forjar("glyfa", "glyfa"), null);
  assert.equal(Core.forjar("mor", "mor"), null);
});

test("forjar rejeita raiz inexistente", () => {
  assert.equal(Core.forjar("zzz", "mor"), null);
  assert.equal(Core.forjar("mor", "xyz"), null);
});

// ── o lexico e o esperado (13 raizes canon, sem duplicata) ──────────────────
test("o lexico tem 13 raizes canon, stems unicos", () => {
  assert.equal(Core.RAIZES.length, 13);
  const stems = Core.RAIZES.map((r) => r.stem);
  assert.equal(new Set(stems).size, 13, "sem stem repetido");
  for (const r of Core.RAIZES) {
    assert.ok(r.pt && r.en && r.raiz, "cada raiz tem glosa pt/en e forma de dicionario");
  }
});

// ── o filtro pega palavrao por substring, sem acento ────────────────────────
test("ehProibido pega substring e ignora acento", () => {
  assert.equal(Core.ehProibido("Xmerdax"), true);
  assert.equal(Core.ehProibido("Fuckzor"), true);
  assert.equal(Core.ehProibido("Morlhin"), false);
  assert.equal(Core.ehProibido("Cal- merda"), true);
});

// ★★ ─────────────────────────────────────────────────────────────────────────
// O TESTE MAIS IMPORTANTE (TST-GLYFA-PALAVRAO): FORCA BRUTA.
// Varre TODAS as combinacoes que a forja pode gerar (raiz+raiz distintas, nas
// duas ordens, + raiz+sufixo) e prova que NENHUMA bate num palavrao. E o que
// sustenta liberar o UGC pra crianca com dev solo: moderacao POR DESIGN.
// ─────────────────────────────────────────────────────────────────────────────
test("★ FORCA BRUTA: nenhuma combinacao gera palavrao (pt+en)", () => {
  const nomes = Core.todosOsNomes();
  const sujos = nomes.filter((n) => Core.ehProibido(n));

  // relatorio no proprio teste: quantas combinacoes, quantas sujas
  const rr = Core.RAIZES.length * (Core.RAIZES.length - 1); // raiz+raiz distintas
  const rs = Core.RAIZES.length * Core.SUFIXOS.length;      // raiz+sufixo
  console.log(
    `[TST-GLYFA-PALAVRAO] combinacoes testadas: ${nomes.length} ` +
    `(${rr} raiz+raiz distintas + ${rs} raiz+sufixo) · palavroes: ${sujos.length}` +
    (sujos.length ? ` -> ${sujos.join(", ")}` : "")
  );

  assert.equal(sujos.length, 0, `combinacoes improprias: ${sujos.join(", ")}`);
});

// ── garantia extra: TODA forja valida devolve um nome LIMPO ─────────────────
test("★ toda forja raiz+raiz distinta devolve nome limpo e completo", () => {
  let testadas = 0;
  for (const a of Core.RAIZES) {
    for (const b of Core.RAIZES) {
      if (a.stem === b.stem) continue;
      const r = Core.forjar(a.stem, b.stem);
      testadas++;
      assert.ok(r && r.nome.length > 0, `forjar(${a.stem},${b.stem}) vazio`);
      assert.equal(Core.ehProibido(r.nome), false, `forja suja: ${r.nome}`);
      assert.ok(r.significado_pt.includes("-"), "significado composto tem hifen");
      assert.equal(r.nome[0], r.nome[0].toUpperCase(), "nome capitalizado");
    }
  }
  assert.equal(testadas, 156, "13*12 = 156 pares distintos");
});
