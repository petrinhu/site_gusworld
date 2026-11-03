// tests/portao-bolso-dom.test.js
// TDD da camada DOM do PORTAO DE BOLSO (brinquedo da Edicao #7, brief §4.10 e M6).
// node:test + node:assert, ZERO dependencia de terceiro. Fica FORA de public_html/.
// Roda:
//   node --test tests/portao-bolso-dom.test.js
//
// O DOM aqui e FALSO e em memoria (sem jsdom: nada de terceiro). Cada elemento tem so
// o que a camada usa: dataset, textContent, hidden, disabled, addEventListener/click,
// setAttribute/getAttribute. A busca por seletor e um mapa fixo: se a camada pedir um
// seletor que o mapa nao tem, devolve null e o teste quebra (e o que queremos).
//
// Os casos de contrato (fim do arquivo) leem o partial REAL da #7 e provam que o HTML
// tem os seletores e os textos que a camada e o nucleo usam. Sem isso, o JS e o HTML
// podem divergir em silencio.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
const fs = require("node:fs");
const path = require("node:path");
const Core = require("../public_html/assets/js/portao-bolso-core.js");
const { montar } = require("../public_html/assets/js/portao-bolso.js");

// ── elemento falso: so o que a camada toca ──────────────────────────────────────
function elemento() {
  const ouvintes = {};
  const atributos = {};
  return {
    dataset: {},
    textContent: "",
    hidden: false,
    disabled: false,
    addEventListener(tipo, fn) {
      (ouvintes[tipo] = ouvintes[tipo] || []).push(fn);
    },
    // um botao desabilitado nao dispara click (igual ao browser)
    click() {
      if (this.disabled) return;
      (ouvintes.click || []).forEach((fn) => fn({ type: "click", target: this }));
    },
    setAttribute(nome, valor) {
      atributos[nome] = String(valor);
    },
    getAttribute(nome) {
      return Object.prototype.hasOwnProperty.call(atributos, nome) ? atributos[nome] : null;
    },
  };
}

// ── a pagina falsa: mapa seletor -> elemento, como o partial da #7 ─────────────────
function criarPagina() {
  const semjs = elemento();
  const comjs = elemento();
  comjs.hidden = true; // estado do partial: o bloco com JS nasce escondido
  const conferirBtn = elemento();
  const res = elemento();
  const cont = elemento();
  const botoes = ["cheia", "limpa", "vazia"].map((id) => {
    const b = elemento();
    b.dataset.pasta = id;
    return b;
  });
  const mapa = {
    ".pb-semjs": semjs,
    ".pb-comjs": comjs,
    ".pb-conferir": conferirBtn,
    ".pb-res": res,
    ".pb-cont": cont,
  };
  const raiz = {
    querySelector(sel) {
      return Object.prototype.hasOwnProperty.call(mapa, sel) ? mapa[sel] : null;
    },
    querySelectorAll(sel) {
      return sel === "[data-pasta]" ? botoes : [];
    },
  };
  return { raiz, semjs, comjs, conferirBtn, res, cont, botoes };
}

function escolher(pagina, id) {
  pagina.botoes.find((b) => b.dataset.pasta === id).click();
}

// ── (a) sem raiz: nao lanca e devolve false ─────────────────────────────────────
test("montar: sem raiz (null) nao lanca e devolve false", () => {
  assert.doesNotThrow(() => {
    assert.equal(montar(null, Core, "pt"), false);
  });
});

// ── (a2) sem nucleo: nao lanca, devolve false e deixa as respostas prontas visiveis ─
test("montar: sem nucleo (Core ausente) devolve false e mantem o bloco sem JS", () => {
  const p = criarPagina();
  assert.equal(montar(p.raiz, undefined, "pt"), false);
  assert.equal(p.semjs.hidden, false);
  assert.equal(p.comjs.hidden, true);
});

// ── (b) com raiz: esconde o bloco sem JS e mostra o bloco com JS ────────────────────
test("montar: com raiz esconde .pb-semjs e mostra .pb-comjs, devolvendo true", () => {
  const p = criarPagina();
  assert.equal(montar(p.raiz, Core, "pt"), true);
  assert.equal(p.semjs.hidden, true);
  assert.equal(p.comjs.hidden, false);
});

// ── (b2) o botao conferir nasce desabilitado: nada de "tudo certo" sem pasta ─────────
test("montar: conferir nasce desabilitado e nao responde antes de uma pasta ser escolhida", () => {
  const p = criarPagina();
  montar(p.raiz, Core, "pt");
  assert.equal(p.conferirBtn.disabled, true);
  p.conferirBtn.click();
  assert.equal(p.res.textContent, "");
  assert.equal(p.cont.textContent, "");
});

// ── escolher pasta: habilita conferir e marca so o botao escolhido ───────────────────
test("escolher pasta habilita conferir e marca aria-pressed so no botao escolhido", () => {
  const p = criarPagina();
  montar(p.raiz, Core, "pt");
  escolher(p, "limpa");
  assert.equal(p.conferirBtn.disabled, false);
  assert.equal(p.botoes[0].getAttribute("aria-pressed"), "false");
  assert.equal(p.botoes[1].getAttribute("aria-pressed"), "true");
  assert.equal(p.botoes[2].getAttribute("aria-pressed"), "false");
  escolher(p, "cheia");
  assert.equal(p.botoes[0].getAttribute("aria-pressed"), "true");
  assert.equal(p.botoes[1].getAttribute("aria-pressed"), "false");
});

// ── (c) pasta vazia + conferir: recusa com a contagem zerada, NUNCA o "tudo certo" ──
test("pasta vazia + conferir: mostra a recusa de vazia e a contagem com encontrados=0", () => {
  const p = criarPagina();
  montar(p.raiz, Core, "pt");
  escolher(p, "vazia");
  p.conferirBtn.click();
  const esperada = Core.mensagem(Core.conferir(Core.pasta("vazia")), "pt");
  assert.equal(p.res.textContent, esperada);
  assert.equal(p.res.textContent, Core.TEXTOS.pt.resultado.recusa_vazia);
  assert.notEqual(p.res.textContent, Core.TEXTOS.pt.resultado.limpo);
  assert.match(p.cont.textContent, /encontrados=0/);
  assert.equal(p.cont.textContent, Core.contagem(Core.conferir(Core.pasta("vazia")), "pt"));
});

// ── (d) pasta limpa e pasta cheia: cada uma com o seu resultado ───────────────────────
test("pasta limpa + conferir mostra o texto de limpo com a contagem 3/3/0", () => {
  const p = criarPagina();
  montar(p.raiz, Core, "pt");
  escolher(p, "limpa");
  p.conferirBtn.click();
  assert.equal(p.res.textContent, Core.TEXTOS.pt.resultado.limpo);
  assert.equal(p.cont.textContent, "encontrados=3 analisados=3 falharam=0");
});

test("pasta cheia + conferir mostra o texto de acusa com a contagem 3/3/1", () => {
  const p = criarPagina();
  montar(p.raiz, Core, "pt");
  escolher(p, "cheia");
  p.conferirBtn.click();
  assert.equal(p.res.textContent, Core.TEXTOS.pt.resultado.acusa);
  assert.equal(p.cont.textContent, "encontrados=3 analisados=3 falharam=1");
});

// ── idioma: en usa os textos en, sem misturar ───────────────────────────────────────
test("idioma en: a saida sai em ingles, nunca o texto pt", () => {
  const p = criarPagina();
  montar(p.raiz, Core, "en");
  escolher(p, "limpa");
  p.conferirBtn.click();
  assert.equal(p.res.textContent, Core.TEXTOS.en.resultado.limpo);
  assert.equal(p.cont.textContent, "found=3 checked=3 failed=0");
});

// ── contrato com o partial REAL da #7 (pt e en) ─────────────────────────────────────
const SEC17 = {
  pt: path.join(__dirname, "..", "src", "content", "edicao-7", "pt", "sec-17.php"),
  en: path.join(__dirname, "..", "src", "content", "edicao-7", "en", "sec-17.php"),
};
const normaliza = (s) => s.replace(/\s+/g, " ").trim();

for (const idioma of ["pt", "en"]) {
  test(`partial #7 ${idioma}: tem o bloco do portao com os seletores que a camada usa`, () => {
    const html = normaliza(fs.readFileSync(SEC17[idioma], "utf8"));
    assert.ok(html.includes(`id="portao-bolso" data-idioma="${idioma}"`), "raiz com id e idioma");
    for (const classe of ["pb-semjs", "pb-comjs", "pb-conferir", "pb-res", "pb-cont"]) {
      assert.ok(html.includes(`class="${classe}"`), `classe ${classe}`);
    }
    assert.match(html, /class="pb-comjs"[^>]*\bhidden\b/, "bloco com JS nasce escondido");
    for (const id of Core.PASTA_IDS) {
      assert.ok(html.includes(`data-pasta="${id}"`), `botao data-pasta=${id}`);
    }
    assert.ok(html.includes('aria-live="polite"'), "saida com aria-live");
    assert.ok(!html.includes("BRINQUEDO-PORTAO-DE-BOLSO"), "marcador removido");
  });

  test(`partial #7 ${idioma}: as tres respostas prontas (sem JS) batem com o nucleo`, () => {
    const html = normaliza(fs.readFileSync(SEC17[idioma], "utf8"));
    const T = Core.TEXTOS[idioma];
    for (const id of Core.PASTA_IDS) {
      const r = Core.conferir(Core.pasta(id));
      assert.ok(html.includes(T.pastas[id]), `nome da pasta ${id}`);
      assert.ok(html.includes(Core.mensagem(r, idioma)), `resposta pronta de ${id}`);
      assert.ok(html.includes(Core.contagem(r, idioma)), `contagem de ${id}`);
    }
    assert.ok(html.includes(T.titulo), "titulo");
    assert.ok(html.includes(T.instrucao), "instrucao");
    assert.ok(html.includes(T.conferir), "rotulo conferir");
  });

  test(`partial #7 ${idioma}: nucleo carrega antes da camada DOM (defer, asset)`, () => {
    const html = fs.readFileSync(SEC17[idioma], "utf8");
    const iCore = html.indexOf("portao-bolso-core.js");
    const iDom = html.indexOf("portao-bolso.js");
    assert.ok(iCore > -1 && iDom > -1, "os dois scripts estao no partial");
    assert.ok(iCore < iDom, "nucleo antes da camada");
    // a tag inteira vai do "<script" ate o "</script>" que fecha o nome do arquivo
    // (o src passa por <?= ?>, entao um regex [^>]* quebraria no "?>")
    const tagDe = (pos) => html.slice(html.lastIndexOf("<script", pos), html.indexOf("</script>", pos));
    assert.match(tagDe(iCore), /\bdefer\b/, "nucleo com defer");
    assert.match(tagDe(iDom), /\bdefer\b/, "camada com defer");
  });
}
