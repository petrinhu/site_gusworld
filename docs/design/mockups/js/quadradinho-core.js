// quadradinho-core.js
// Nucleo PURO do quadradinho (mock 11a/05/06): colisao nos PES, movimento
// axis-separated, mapeamento de tecla WASD. Sem document/window/canvas aqui
// dentro - so matematica, pra poder ser testado com node:test.
//
// UMD leve: os mocks abrem via file:// no Firefox do lider, entao ES module
// (export/import) quebra por CORS. Isso aqui define um global window.QuadCore
// via <script src>, e module.exports pro node:test.
"use strict";
(function (root, factory) {
  var QuadCore = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = QuadCore;
  }
  if (typeof window !== "undefined") {
    window.QuadCore = QuadCore;
  }
})(this, function () {

  var EPS = 0.5; // tolerancia de sobreposicao (evita falso-positivo na borda)

  // faixa baixa nos PES (bottom-center), NAO o AABB inteiro do sprite.
  // Convencao do jogo: o corpo sobrepoe a parede em profundidade top-down;
  // so os PES bloqueiam (ver GusEngine sprite_anchor/city_scene).
  function feetHitbox(x, y, tileSize, inset) {
    if (inset === undefined) inset = 0.6;
    var lado = Math.round(tileSize * inset);
    var esq = x + (tileSize - lado) / 2;
    var base = y + tileSize; // a base do sprite = os pes
    return { l: esq, t: base - lado, r: esq + lado, b: base };
  }

  function sobrepoe(a, b) {
    return a.l < b.r - EPS && a.r > b.l + EPS && a.t < b.b - EPS && a.b > b.t + EPS;
  }

  function colideEm(x, y, walls, tileSize) {
    var box = feetHitbox(x, y, tileSize);
    for (var i = 0; i < walls.length; i++) {
      if (sobrepoe(box, walls[i])) return true;
    }
    return false;
  }

  // nova posicao apos aplicar delta, com colisao AXIS-SEPARATED: X e Y sao
  // resolvidos em passos distintos, entao bloqueio num eixo nao trava o
  // outro (permite deslizar ao longo de uma parede).
  function resolveMove(pos, delta, walls, tileSize) {
    var x = pos.x, y = pos.y;
    var nx = pos.x + delta.x;
    var ny = pos.y + delta.y;
    if (!colideEm(nx, y, walls, tileSize)) x = nx;
    if (!colideEm(x, ny, walls, tileSize)) y = ny;
    return { x: x, y: y };
  }

  // controle e WASD, nao setas (regra do jogo real). Retorna null pra
  // qualquer tecla que nao seja w/a/s/d.
  function keyToDir(key) {
    if (typeof key !== "string") return null;
    switch (key.toLowerCase()) {
      case "w": return { x: 0, y: -1 };
      case "a": return { x: -1, y: 0 };
      case "s": return { x: 0, y: 1 };
      case "d": return { x: 1, y: 0 };
      default: return null;
    }
  }

  return { feetHitbox: feetHitbox, resolveMove: resolveMove, keyToDir: keyToDir };
});
