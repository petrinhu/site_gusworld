// tests/cupom-core.test.js
// TDD do nucleo PURO do CUPOM (item W6 · CUPOM). node:test + node:assert, ZERO
// dependencia de terceiro. Fica FORA de public_html/ pra nao ir no deploy. Roda:
//   node --test tests/cupom-core.test.js
// O no-Node do Hostinger e RUNTIME; nao impede testar a logica em dev/CI.
//
// Cobre os 3 nucleos: (1) whitelist da opcao, (2) rasgar/desfazer (a maquina de
// estado do recorte, INVARIANTE feito em [0, segmentos], nunca trava), (3) a loja
// "ja votou" (idempotencia suave, storage injetado, degradacao sem quebrar).
// As OPCOES sao PLACEHOLDER (o lider define as reais); os testes usam Core.opcoes()
// pra nao acoplar ao conteudo.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const Core = require("../public_html/assets/js/cupom-core.js");

const OPS = Core.opcoes();
const OP = OPS[0]; // uma opcao valida qualquer

// storage fake (como o localStorage), injetavel. Pode ser mandado a LANCAR.
function fakeStorage(opts) {
  opts = opts || {};
  const mapa = Object.create(null);
  return {
    getItem: function (k) {
      if (opts.lerLanca) throw new Error("SecurityError");
      return Object.prototype.hasOwnProperty.call(mapa, k) ? mapa[k] : null;
    },
    setItem: function (k, v) {
      if (opts.gravarLanca) throw new Error("QuotaExceeded");
      mapa[k] = String(v);
    },
    _mapa: mapa,
  };
}

// ── whitelist ───────────────────────────────────────────────────────────────
test("opcoes: devolve copia (mutar nao contamina o nucleo)", () => {
  const a = Core.opcoes();
  a.push("hack");
  assert.deepEqual(Core.opcoes(), OPS, "a lista interna fica intacta");
});

test("opcaoValida: aceita cada opcao do catalogo", () => {
  for (const op of OPS) assert.equal(Core.opcaoValida(op), true, op);
});

test("opcaoValida: rejeita id fora da whitelist", () => {
  assert.equal(Core.opcaoValida("mais-dinheiro"), false);
  assert.equal(Core.opcaoValida("../../etc/passwd"), false);
  assert.equal(Core.opcaoValida("<script>"), false);
});

test("opcaoValida: rejeita nao-string e vazio", () => {
  assert.equal(Core.opcaoValida(""), false);
  assert.equal(Core.opcaoValida(null), false);
  assert.equal(Core.opcaoValida(undefined), false);
  assert.equal(Core.opcaoValida(42), false);
  assert.equal(Core.opcaoValida({}), false);
  assert.equal(Core.opcaoValida([OP]), false);
});

test("opcaoValida: aceita whitelist custom (teste injeta a sua)", () => {
  assert.equal(Core.opcaoValida("x", ["x", "y"]), true);
  assert.equal(Core.opcaoValida(OP, ["x", "y"]), false, "com lista custom, a padrao nao vale");
});

// ── rasgar / desfazer: a maquina de estado do recorte ───────────────────────
test("criarRasgo: nasce inteiro (feito 0), com N segmentos", () => {
  const r = Core.criarRasgo(6);
  assert.equal(r.feito, 0);
  assert.equal(r.segmentos, 6);
  assert.equal(Core.destacado(r), false);
  assert.equal(Core.progresso(r), 0);
});

test("criarRasgo: sem argumento usa o segmento padrao", () => {
  const r = Core.criarRasgo();
  assert.equal(r.segmentos, Core.SEG_PADRAO);
});

test("criarRasgo: segmentos invalido (0/neg/NaN) cai no padrao", () => {
  assert.equal(Core.criarRasgo(0).segmentos, Core.SEG_PADRAO);
  assert.equal(Core.criarRasgo(-3).segmentos, Core.SEG_PADRAO);
  assert.equal(Core.criarRasgo("6").segmentos, Core.SEG_PADRAO);
});

test("rasgar: avanca um segmento por vez", () => {
  let r = Core.criarRasgo(3);
  r = Core.rasgar(r); assert.equal(r.feito, 1);
  r = Core.rasgar(r); assert.equal(r.feito, 2);
  assert.equal(Core.destacado(r), false);
  r = Core.rasgar(r); assert.equal(r.feito, 3);
  assert.equal(Core.destacado(r), true, "rasgou ate o fim = destacado");
});

test("rasgar: nao passa do total (clampa no topo, nao trava)", () => {
  let r = Core.criarRasgo(2);
  r = Core.rasgar(r); r = Core.rasgar(r); r = Core.rasgar(r); r = Core.rasgar(r);
  assert.equal(r.feito, 2, "feito nunca estoura segmentos");
  assert.equal(Core.destacado(r), true);
});

test("rasgar: nao muta a entrada (imutabilidade)", () => {
  const antes = Core.criarRasgo(4);
  Core.rasgar(antes);
  assert.equal(antes.feito, 0, "a entrada fica intacta");
});

test("desfazer: volta um segmento (rasgar errado tem conserto)", () => {
  let r = Core.criarRasgo(4);
  r = Core.rasgar(r); r = Core.rasgar(r); // feito 2
  r = Core.desfazer(r);
  assert.equal(r.feito, 1);
});

test("desfazer: no cupom inteiro e no-op (nunca fica negativo)", () => {
  let r = Core.criarRasgo(4);
  r = Core.desfazer(r);
  assert.equal(r.feito, 0, "feito nunca vai abaixo de 0");
});

test("desfazer: desfaz um destacado (da pra recolar do fim)", () => {
  let r = Core.criarRasgo(2);
  r = Core.rasgar(r); r = Core.rasgar(r); // destacado
  assert.equal(Core.destacado(r), true);
  r = Core.desfazer(r);
  assert.equal(Core.destacado(r), false, "desfazer solta o destaque");
  assert.equal(r.feito, 1);
});

test("resetar: recola tudo de uma vez (volta a inteiro)", () => {
  let r = Core.criarRasgo(5);
  r = Core.rasgar(r); r = Core.rasgar(r); r = Core.rasgar(r);
  r = Core.resetar(r);
  assert.equal(r.feito, 0);
  assert.equal(Core.destacado(r), false);
});

test("progresso: fracao 0..1 conforme rasga", () => {
  let r = Core.criarRasgo(4);
  assert.equal(Core.progresso(r), 0);
  r = Core.rasgar(r); r = Core.rasgar(r);
  assert.equal(Core.progresso(r), 0.5);
  r = Core.rasgar(r); r = Core.rasgar(r);
  assert.equal(Core.progresso(r), 1);
});

test("normRasgo: conserta estado-lixo (feito negativo/alem/NaN)", () => {
  assert.deepEqual(Core.normRasgo({ segmentos: 4, feito: -2 }), { segmentos: 4, feito: 0 });
  assert.deepEqual(Core.normRasgo({ segmentos: 4, feito: 99 }), { segmentos: 4, feito: 4 });
  assert.deepEqual(Core.normRasgo({ segmentos: 4, feito: "x" }), { segmentos: 4, feito: 0 });
  assert.equal(Core.normRasgo(null).segmentos, Core.SEG_PADRAO);
  assert.equal(Core.normRasgo(undefined).feito, 0);
});

test("rasgar/desfazer INVARIANTE: fuzz — feito sempre em [0, segmentos]", () => {
  let r = Core.criarRasgo(5);
  const acoes = [Core.rasgar, Core.rasgar, Core.desfazer, Core.rasgar,
                 Core.desfazer, Core.desfazer, Core.rasgar, Core.rasgar,
                 Core.rasgar, Core.rasgar, Core.rasgar, Core.desfazer];
  for (const f of acoes) {
    r = f(r);
    assert.ok(r.feito >= 0 && r.feito <= r.segmentos, "feito=" + r.feito);
  }
});

// ── loja "ja votou": serializacao ────────────────────────────────────────────
test("estadoInicial: ninguem votou ainda", () => {
  assert.deepEqual(Core.estadoInicial(), { opcao: null });
});

test("serializar/desserializar: round-trip de um voto valido", () => {
  const s = Core.serializar({ opcao: OP });
  assert.deepEqual(Core.desserializar(s), { opcao: OP });
});

test("desserializar: lixo vira estado inicial (nunca lanca)", () => {
  assert.deepEqual(Core.desserializar("{"), { opcao: null });
  assert.deepEqual(Core.desserializar(""), { opcao: null });
  assert.deepEqual(Core.desserializar(null), { opcao: null });
  assert.deepEqual(Core.desserializar("[1,2,3]"), { opcao: null });
  assert.deepEqual(Core.desserializar('{"opcao":"hack"}'), { opcao: null }, "opcao fora da whitelist cai fora");
  assert.deepEqual(Core.desserializar('{"opcao":123}'), { opcao: null });
});

// ── loja "ja votou": comportamento com storage injetado ─────────────────────
test("loja: nasce sem voto", () => {
  const loja = Core.criarLoja(fakeStorage());
  assert.equal(loja.jaVotou(), false);
  assert.equal(loja.opcaoVotada(), null);
  assert.equal(loja.storageOk(), true);
});

test("loja: registrar um voto valido gruda e persiste", () => {
  const st = fakeStorage();
  const loja = Core.criarLoja(st);
  assert.equal(loja.registrar(OP), true);
  assert.equal(loja.jaVotou(), true);
  assert.equal(loja.opcaoVotada(), OP);
  // uma NOVA loja sobre o mesmo storage LEMBRA (persistencia real)
  const loja2 = Core.criarLoja(st);
  assert.equal(loja2.jaVotou(), true);
  assert.equal(loja2.opcaoVotada(), OP);
});

test("loja: registrar opcao invalida e no-op (nao marca votou)", () => {
  const loja = Core.criarLoja(fakeStorage());
  assert.equal(loja.registrar("hack"), false);
  assert.equal(loja.jaVotou(), false);
});

test("loja: storage que LANCA na leitura degrada (storageOk=false), nao quebra", () => {
  const loja = Core.criarLoja(fakeStorage({ lerLanca: true }));
  assert.equal(loja.storageOk(), false);
  assert.equal(loja.jaVotou(), false, "sem storage, comeca sem voto — mas nao lanca");
});

test("loja: storage que LANCA na gravacao degrada pra in-memory", () => {
  const loja = Core.criarLoja(fakeStorage({ gravarLanca: true }));
  assert.equal(loja.registrar(OP), true, "registra em memoria");
  assert.equal(loja.jaVotou(), true, "vale nesta sessao");
  assert.equal(loja.storageOk(), false, "mas sabe que nao persistiu");
});

test("loja: storage nulo/ausente nao quebra (cai pra in-memory)", () => {
  const loja = Core.criarLoja(null);
  assert.equal(loja.storageOk(), false);
  assert.equal(loja.registrar(OP), true);
  assert.equal(loja.jaVotou(), true);
});
