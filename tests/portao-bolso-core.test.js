// tests/portao-bolso-core.test.js
// TDD do nucleo PURO do PORTAO DE BOLSO (brinquedo da Edicao #7, brief §4.10).
// node:test + node:assert, ZERO dependencia de terceiro. Fica FORA de public_html/
// (nao vai no deploy). Roda:
//   node --test tests/portao-bolso-core.test.js
//
// O portao se recusa a dizer "tudo certo" quando nao olhou nada: a varredura vazia
// nunca aprova, e a contagem (encontrados, analisados, falharam) sai sempre, mesmo
// quando zero. Este arquivo cobre so a logica; o DOM fica para a camada do brinquedo.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const Core = require("../public_html/assets/js/portao-bolso-core.js");

const ok = (n) => ({ nome: "arq-" + n + ".txt", problema: false });
const ruim = (n) => ({ nome: "arq-" + n + ".txt", problema: true });

// ── (a) pasta cheia com um problema: acusa, e a conta aparece ──────────────────
test("conferir: 3 itens, 1 problema -> acusa com encontrados=3 analisados=3 problemas=1", () => {
  const r = Core.conferir([ok(1), ruim(2), ok(3)]);
  assert.equal(r.resultado, "acusa");
  assert.equal(r.encontrados, 3);
  assert.equal(r.analisados, 3);
  assert.equal(r.problemas, 1);
  assert.equal(r.motivo, null);
});

// ── (b) pasta limpa: aprova, com analisados > 0 ───────────────────────────────
test("conferir: 3 itens limpos -> limpo com analisados > 0", () => {
  const r = Core.conferir([ok(1), ok(2), ok(3)]);
  assert.equal(r.resultado, "limpo");
  assert.equal(r.encontrados, 3);
  assert.equal(r.analisados, 3);
  assert.equal(r.problemas, 0);
});

// ── (c) pasta vazia: recusa, nunca limpo ──────────────────────────────────────
test("conferir: pasta vazia -> recusa (NUNCA limpo), motivo vazia, contagem 0/0/0", () => {
  const r = Core.conferir([]);
  assert.equal(r.resultado, "recusa");
  assert.equal(r.motivo, "vazia");
  assert.equal(r.encontrados, 0);
  assert.equal(r.analisados, 0);
  assert.equal(r.problemas, 0);
});

// ── (d) entrada que nao e lista: recusa ───────────────────────────────────────
test("conferir: entrada que nao e lista -> recusa (motivo invalida), contagem 0/0/0", () => {
  for (const entrada of [null, undefined, "abc", 42, {}, { length: 2 }]) {
    const r = Core.conferir(entrada);
    assert.equal(r.resultado, "recusa", String(entrada));
    assert.equal(r.motivo, "invalida", String(entrada));
    assert.equal(r.encontrados, 0, String(entrada));
    assert.equal(r.analisados, 0, String(entrada));
    assert.equal(r.problemas, 0, String(entrada));
  }
});

// ── (e) invariante: nunca limpo quando analisados != encontrados ──────────────
test("conferir: nunca devolve limpo quando analisados e diferente de encontrados", () => {
  const casos = [
    [ok(1), null],
    [ok(1), {}],
    [ok(1), { nome: "x", problema: "sim" }], // problema nao booleano: nao foi analisado
    [ok(1), { nome: "x" }], // sem campo problema: nao foi analisado
    [null, null],
    [undefined, ok(2)],
  ];
  for (const c of casos) {
    const r = Core.conferir(c);
    assert.notEqual(r.resultado, "limpo", JSON.stringify(r));
    assert.equal(r.resultado, "recusa", JSON.stringify(r));
  }
});

// ── (f) item ilegivel sem problema real: recusa por incompleta ────────────────
test("conferir: item que nao pode ser lido -> recusa incompleta, contagem 2/1/0", () => {
  const r = Core.conferir([ok(1), null]);
  assert.equal(r.resultado, "recusa");
  assert.equal(r.motivo, "incompleta");
  assert.equal(r.encontrados, 2);
  assert.equal(r.analisados, 1);
  assert.equal(r.problemas, 0);
});

// ── (g) problema real vence a incompletude: acusa, nao recusa ─────────────────
test("conferir: problema real com item ilegivel -> acusa (o problema existe)", () => {
  const r = Core.conferir([ruim(1), null]);
  assert.equal(r.resultado, "acusa");
  assert.equal(r.encontrados, 2);
  assert.equal(r.analisados, 1);
  assert.equal(r.problemas, 1);
});

// ── (h) contagem sempre impressa, inclusive zero ──────────────────────────────
test("contagem: imprime encontrados, analisados e falharam, inclusive zero", () => {
  assert.equal(Core.contagem(Core.conferir([]), "pt"), "encontrados=0 analisados=0 falharam=0");
  assert.equal(
    Core.contagem(Core.conferir([ok(1), ruim(2), ok(3)]), "pt"),
    "encontrados=3 analisados=3 falharam=1",
  );
  assert.equal(Core.contagem(Core.conferir([ok(1), ok(2)]), "en"), "found=2 checked=2 failed=0");
});

// ── (i) cada resultado tem o seu texto ────────────────────────────────────────
test("mensagem: cada resultado devolve o texto pt do seu caso", () => {
  const T = Core.TEXTOS.pt.resultado;
  assert.equal(Core.mensagem(Core.conferir([ruim(1)]), "pt"), T.acusa);
  assert.equal(Core.mensagem(Core.conferir([ok(1)]), "pt"), T.limpo);
  assert.equal(Core.mensagem(Core.conferir([]), "pt"), T.recusa_vazia);
  assert.equal(Core.mensagem(Core.conferir(null), "pt"), T.recusa_invalida);
  assert.equal(Core.mensagem(Core.conferir([ok(1), null]), "pt"), T.recusa_incompleta);
});

// ── (j) idioma: en usa en; idioma desconhecido cai no pt ──────────────────────
test("mensagem: idioma en usa o texto en; idioma desconhecido cai no pt", () => {
  const r = Core.conferir([]);
  assert.equal(Core.mensagem(r, "en"), Core.TEXTOS.en.resultado.recusa_vazia);
  assert.equal(Core.mensagem(r, "xx"), Core.TEXTOS.pt.resultado.recusa_vazia);
});

// ── (k) textos pt e en: mesmas chaves, nao vazios, sem travessao nem emoji ────
function folhas(obj, prefixo) {
  const saida = {};
  for (const k of Object.keys(obj)) {
    const caminho = prefixo ? prefixo + "." + k : k;
    if (typeof obj[k] === "string") saida[caminho] = obj[k];
    else Object.assign(saida, folhas(obj[k], caminho));
  }
  return saida;
}

test("textos: pt e en com as mesmas chaves, todas nao vazias", () => {
  const pt = folhas(Core.TEXTOS.pt, "");
  const en = folhas(Core.TEXTOS.en, "");
  assert.deepEqual(Object.keys(en).sort(), Object.keys(pt).sort());
  for (const idioma of [pt, en]) {
    for (const k of Object.keys(idioma)) assert.ok(idioma[k].length > 0, k);
  }
});

test("textos: sem en-dash, em-dash nem emoji (pt e en)", () => {
  for (const idioma of ["pt", "en"]) {
    const todos = folhas(Core.TEXTOS[idioma], "");
    for (const k of Object.keys(todos)) {
      assert.doesNotMatch(todos[k], /[\u2013\u2014]/, idioma + " " + k);
      assert.doesNotMatch(todos[k], /\p{Extended_Pictographic}/u, idioma + " " + k);
    }
  }
});

test("textos: as chaves das pastas batem com PASTA_IDS nos dois idiomas", () => {
  assert.deepEqual(Object.keys(Core.TEXTOS.pt.pastas).sort(), [...Core.PASTA_IDS].sort());
  assert.deepEqual(Object.keys(Core.TEXTOS.en.pastas).sort(), [...Core.PASTA_IDS].sort());
});

// ── (l) as tres pastas do brinquedo ───────────────────────────────────────────
test("pasta: as tres pastas do brinquedo dao acusa, limpo e recusa vazia", () => {
  assert.deepEqual(Core.PASTA_IDS, ["cheia", "limpa", "vazia"]);
  assert.equal(Core.conferir(Core.pasta("cheia")).resultado, "acusa");
  assert.equal(Core.conferir(Core.pasta("limpa")).resultado, "limpo");
  assert.equal(Core.conferir(Core.pasta("vazia")).motivo, "vazia");
});

test("pasta: id desconhecido -> null; devolve copia profunda (mutar nao contamina)", () => {
  assert.equal(Core.pasta("nada"), null);
  assert.equal(Core.pasta("__proto__"), null);
  const a = Core.pasta("limpa");
  a[0].problema = true;
  a.push(ruim(9));
  assert.equal(Core.conferir(Core.pasta("limpa")).resultado, "limpo");
});
