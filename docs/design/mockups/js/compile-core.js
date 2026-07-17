// compile-core.js
// Nucleo PURO do hook "o texto compila" (mock 12, capa da Edicao #1 = a
// genese). A 1a linha legivel do mundo nasce de um campo de glifos que
// RESOLVEM da esquerda pra direita: o glyfe (escrever = compilar) feito
// tatil. Sem DOM aqui dentro: so a logica (qual char ja assentou, qual
// glifo cobre o resto), DETERMINISTICA pra poder ser testada com node:test.
//
// UMD leve: os mocks abrem via file:// no Firefox do lider, entao ES module
// (export/import) quebra por CORS. Define global window.CompileCore via
// <script src>, e module.exports pro node:test.
"use strict";
(function (root, factory) {
  var CompileCore = factory();
  if (typeof module !== "undefined" && module.exports) module.exports = CompileCore;
  if (typeof window !== "undefined") window.CompileCore = CompileCore;
})(this, function () {

  // pool de glifos "ilegiveis" (cifra/codigo). ASCII puro de proposito:
  // renderiza em qualquer mono (PixelOperatorMono nao tem grego), e o print
  // headless nao depende de fonte com cobertura unicode ampla.
  var GLYPHS = "/\\|<>{}[]()=+*#%&$@:;~^?!".split("");

  // glifo deterministico pra (indice, tick): SEM random real, pra o teste
  // ser estavel entre rodadas. i*31 + tick*17 espalha o suficiente pro olho.
  function scrambleChar(i, tick) {
    var n = (i * 31 + tick * 17) % GLYPHS.length;
    if (n < 0) n += GLYPHS.length;
    return GLYPHS[n];
  }

  // quantos chars ja assentaram neste tick (esquerda -> direita).
  function revealedCount(tick, ticksPerChar) {
    if (ticksPerChar === undefined) ticksPerChar = 2;
    if (tick < 0) return 0;
    return Math.floor(tick / ticksPerChar);
  }

  // o texto exibido no tick: prefixo ja assentado (o alvo) + o resto em
  // glifos. Espaco e sempre espaco (a palavra respira mesmo compilando).
  function compileText(target, tick, ticksPerChar) {
    var revealed = revealedCount(tick, ticksPerChar);
    var out = "";
    for (var i = 0; i < target.length; i++) {
      var ch = target.charAt(i);
      if (ch === " ") out += " ";
      else if (i < revealed) out += ch;
      else out += scrambleChar(i, tick);
    }
    return out;
  }

  // ja compilou tudo? (o ultimo char assentou)
  function isDone(target, tick, ticksPerChar) {
    return revealedCount(tick, ticksPerChar) >= target.length;
  }

  return {
    GLYPHS: GLYPHS,
    scrambleChar: scrambleChar,
    revealedCount: revealedCount,
    compileText: compileText,
    isDone: isDone,
  };
});
