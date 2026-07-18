// linha-tempo-core.js
// O nucleo PURO da LINHA DO TEMPO (item W6 · LINHA-TEMPO): so matematica de
// tempo. NADA de document/window/Date/random aqui dentro, pra ser testado com
// node:test e ser deterministico. A camada DOM (linha-tempo.js) tem o relogio,
// o ponteiro e a pintura; aqui so entra a lista de pontos (edicoes visuais
// publicadas, ja filtrada e em ordem cronologica ASC pelo helper PHP) e uma
// posicao de scrub 0..1.
//
// O que o core resolve:
//   - crossfade: dado o scrub, qual PAR de frames dissolve e o fator (0..1).
//     O dissolve segue o TEMPO REAL entre as datas, nao o indice (dois marcos
//     no mesmo dia nao ficam meio trilho de distancia).
//   - posicao <-> data: interpolacao linear no eixo do tempo real.
//   - passo de teclado: seta pula pro ponto vizinho (com clamp).
//   - clique: um ponto vira a posicao que o traz de volta como o mais proximo.
//   - casos degenerados: 1 ponto (sem crossfade, so o frame) e 0 pontos (nada
//     e inventado). A lista JAMAIS contem rascunho: o filtro mora no PHP.
//
// UMD leve: a stack e no-build e o Firefox do lider abre por file://, entao ES
// module (export/import) quebra por CORS. Isto expoe window.LinhaTempoCore via
// <script src> E module.exports pro node:test. NUNCA virar ESM.
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.LinhaTempoCore = Core;
  }
})(this, function () {

  function clamp01(s) {
    return s < 0 ? 0 : s > 1 ? 1 : s;
  }

  // ── diasDesdeEpoch: ISO 'YYYY-MM-DD' -> inteiro de dias (algoritmo de Howard
  // Hinnant, days-from-civil). PURO: nao usa Date (evita fuso/DST) e da a
  // distancia REAL em dias entre duas datas, que e o que o crossfade precisa.
  function diasDesdeEpoch(iso) {
    if (typeof iso !== "string") return NaN;
    var m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(iso);
    if (!m) return NaN;
    var y = +m[1], mo = +m[2], d = +m[3];
    if (mo < 1 || mo > 12 || d < 1 || d > 31) return NaN;
    y -= mo <= 2 ? 1 : 0;
    var era = Math.floor((y >= 0 ? y : y - 399) / 400);
    var yoe = y - era * 400;
    var doy = Math.floor((153 * (mo + (mo > 2 ? -3 : 9)) + 2) / 5) + d - 1;
    var doe = yoe * 365 + Math.floor(yoe / 4) - Math.floor(yoe / 100) + doy;
    return era * 146097 + doe - 719468;
  }

  // lista de pontos -> array de dias. Cada ponto e {data:'YYYY-MM-DD', ...}.
  function tempos(pontos) {
    if (!pontos || !pontos.length) return [];
    var out = [];
    for (var i = 0; i < pontos.length; i++) {
      out.push(diasDesdeEpoch(pontos[i] && pontos[i].data));
    }
    return out;
  }

  function extentTempo(t) {
    if (!t || !t.length) return { min: 0, max: 0 };
    return { min: t[0], max: t[t.length - 1] }; // ja vem ASC do helper
  }

  // scrub [0,1] -> dia (interpolacao linear no tempo real).
  function scrubParaTempo(s, ext) {
    return ext.min + clamp01(s) * (ext.max - ext.min);
  }

  // indice de um ponto -> scrub [0,1], pela sua posicao no eixo do tempo real.
  // Com 1 ponto (span 0) o unico ponto senta no inicio do trilho.
  function posDoIndice(t, i) {
    if (!t || !t.length) return 0;
    var span = t[t.length - 1] - t[0];
    if (span <= 0) return 0;
    return clamp01((t[i] - t[0]) / span);
  }

  // par de frames ativo + fator de crossfade [0,1]. i = frame que sai, j = que
  // entra; f = quanto ja entrou. 1 ponto ou ponta => i==j, f=0 (frame unico).
  function crossfade(t, s) {
    var n = t ? t.length : 0;
    if (n === 0) return { i: -1, j: -1, f: 0 }; // sem ponto: nada acende
    if (n === 1) return { i: 0, j: 0, f: 0 };
    var alvo = scrubParaTempo(s, extentTempo(t));
    // ultimo indice cujo tempo <= alvo (a lista e ASC).
    var i = 0;
    for (var k = 0; k < n; k++) {
      if (t[k] <= alvo) i = k; else break;
    }
    if (i >= n - 1) return { i: n - 1, j: n - 1, f: 0 }; // no fim: so o ultimo
    var gap = t[i + 1] - t[i];
    var f = gap > 0 ? clamp01((alvo - t[i]) / gap) : 0; // mesmo dia: sem fracao
    return { i: i, j: i + 1, f: f };
  }

  // opacidade de UM frame dado o crossfade. O frame que sai fica (1-f), o que
  // entra fica f, o resto some. Quando i==j (frame unico), fica 100%.
  function opacidadeFrame(k, cf) {
    if (!cf) return 0;
    if (k === cf.i && k === cf.j) return 1;
    if (k === cf.i) return 1 - cf.f;
    if (k === cf.j) return cf.f;
    return 0;
  }

  // indice do ponto mais perto do scrub (pra rotular e pra encaixar ao soltar).
  // Lista vazia => -1 (o core nao inventa ponto).
  function indiceMaisProximo(t, s) {
    var n = t ? t.length : 0;
    if (n === 0) return -1;
    if (n === 1) return 0;
    var alvo = scrubParaTempo(s, extentTempo(t));
    var melhor = 0, dist = Infinity;
    for (var k = 0; k < n; k++) {
      var d = Math.abs(t[k] - alvo);
      if (d < dist) { dist = d; melhor = k; }
    }
    return melhor;
  }

  // passo de teclado: vizinho na direcao dir (+1/-1), com clamp em [0, n-1].
  function passo(i, dir, n) {
    var alvo = i + (dir < 0 ? -1 : 1);
    if (alvo < 0) return 0;
    if (alvo > n - 1) return n - 1;
    return alvo;
  }

  return {
    diasDesdeEpoch: diasDesdeEpoch,
    tempos: tempos,
    extentTempo: extentTempo,
    scrubParaTempo: scrubParaTempo,
    posDoIndice: posDoIndice,
    crossfade: crossfade,
    opacidadeFrame: opacidadeFrame,
    indiceMaisProximo: indiceMaisProximo,
    passo: passo,
  };
});
