// lang-core.js
// Nucleo PURO do switch de idioma (mock 13). Sem DOM aqui dentro.
//
// O CONCEITO, em uma linha: em Sylvarin `glyfe` quer dizer escrever E
// compilar - a edicao E o build. Entao trocar de lingua nao e "selecionar
// idioma": e RECOMPILAR a revista. A LCD do masthead mostra o log desse
// build, e este arquivo e a maquina de estado desse log.
//
// ⚠️ O QUE ESTE ARQUIVO **NAO** FAZ, de proposito: nao monta a URL da outra
// lingua. Em producao o href do switch e renderizado pelo PHP (o link tem
// que existir no HTML pra funcionar SEM JS e pra o hreflang ser real). Um
// mapeador de URL em JS seria codigo morto - e uma 2a copia da regra, que
// e pior que nao ter nenhuma. Ver CONVENCOES-JS-PHP (YAGNI/DRY).
//
// UMD leve: os mocks abrem via file:// no Firefox do lider, entao ES module
// (import/export) quebra por CORS. Global window.LangCore via <script src>,
// e module.exports pro node:test.
"use strict";
(function (root, factory) {
  var dep = null;
  if (typeof module !== "undefined" && module.exports && typeof require !== "undefined") {
    dep = require("./compile-core.js");
  } else if (typeof window !== "undefined") {
    dep = window.CompileCore; // ⚠️ compile-core.js tem que carregar ANTES deste
  }
  var LangCore = factory(dep);
  if (typeof module !== "undefined" && module.exports) module.exports = LangCore;
  if (typeof window !== "undefined") window.LangCore = LangCore;
})(this, function (CompileCore) {

  // O hash que a revista assina quando o switch e clicado.
  // ★ Por que hash e nao querystring: `?glyfe` criaria uma 2a URL indexavel
  // pra mesma pagina (a URL canonica por idioma e o motivo de o switch
  // NAVEGAR em vez de trocar texto no cliente). O fragmento nunca e enviado
  // ao servidor nem indexado: custo zero de SEO.
  var HASH_RECOMPILA = "#glyfe";

  // Ligar a animacao de chegada? So o switch assina; quem cai de busca ou
  // de link direto le a pagina parada, como deve ser.
  // ⚠️ Igualdade EXATA: o hash vem de fora (CONVENCOES: nao confie em
  // querystring). "contem glyfe" deixaria qualquer link forjado disparar.
  function shouldCompile(hash) {
    if (typeof hash !== "string") return false;
    return hash === HASH_RECOMPILA;
  }

  function assertScript(script) {
    if (!Array.isArray(script) || script.length === 0) {
      throw new TypeError("lang-core: script precisa ser array nao-vazio de strings");
    }
    for (var i = 0; i < script.length; i++) {
      if (typeof script[i] !== "string") {
        throw new TypeError("lang-core: linha " + i + " do script nao e string");
      }
    }
  }

  function assertTicksPerChar(n) {
    if (typeof n !== "number" || !isFinite(n) || n < 1 || Math.floor(n) !== n) {
      throw new TypeError("lang-core: ticksPerChar precisa ser inteiro >= 1");
    }
  }

  // Quantos ticks uma linha leva pra assentar inteira.
  function lineDuration(target, ticksPerChar) {
    return target.length * ticksPerChar;
  }

  // Quanto dura o log inteiro. O glue usa isto pra casar o tempo da TELA
  // (o log compilando) com o do PAPEL (a tinta assentando).
  function totalTicks(script, ticksPerChar) {
    if (ticksPerChar === undefined) ticksPerChar = 1;
    assertScript(script);
    assertTicksPerChar(ticksPerChar);
    var soma = 0;
    for (var i = 0; i < script.length; i++) soma += lineDuration(script[i], ticksPerChar);
    return soma;
  }

  // O estado da LCD no tick: as linhas ja visiveis (as passadas inteiras, a
  // atual em glifo resolvendo esq->dir) e se o build acabou.
  // A compilacao char-a-char e do CompileCore (mock 12), ja testada: aqui so
  // a SEQUENCIA das linhas.
  function logStateAt(tick, script, ticksPerChar) {
    if (ticksPerChar === undefined) ticksPerChar = 1;
    assertScript(script);
    assertTicksPerChar(ticksPerChar);
    if (!CompileCore) throw new Error("lang-core: CompileCore ausente (carregue compile-core.js antes)");

    var t = (typeof tick === "number" && tick > 0) ? tick : 0;
    var lines = [];
    for (var i = 0; i < script.length; i++) {
      var dur = lineDuration(script[i], ticksPerChar);
      if (t >= dur) {          // esta linha ja assentou: fica inteira e o resto do tick passa adiante
        lines.push(script[i]);
        t -= dur;
        continue;
      }
      lines.push(CompileCore.compileText(script[i], t, ticksPerChar));
      return { lines: lines, done: false };
    }
    return { lines: lines, done: true };
  }

  return {
    HASH_RECOMPILA: HASH_RECOMPILA,
    shouldCompile: shouldCompile,
    lineDuration: lineDuration,
    totalTicks: totalTicks,
    logStateAt: logStateAt,
  };
});
