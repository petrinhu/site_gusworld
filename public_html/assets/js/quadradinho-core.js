// quadradinho-core.js
// O nucleo PURO do quadradinho (item W6 · QUADRADINHO): so matematica e a
// maquina de estado. NADA de document/window/canvas/Date/random aqui dentro,
// pra poder ser testado com node:test e ser deterministico. O tempo entra por
// parametro (dtMs); quem tem relogio e a camada DOM (quadradinho.js).
//
// UMD leve: a stack e no-build e o Firefox do lider abre por file://, entao ES
// module (export/import) quebra por CORS. Isto expoe window.QuadCore via
// <script src> E module.exports pro node:test. NUNCA virar ESM.
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

  // ── colisao: hitbox nos PES, nao o corpo inteiro ─────────────────────────
  // Convencao do jogo (GusEngine sprite_anchor/city_scene): num top-down o
  // corpo do sprite sobrepoe a parede em profundidade; so os PES bloqueiam.
  // Faixa baixa (~0.6 tile) ancorada na base do sprite (bottom-center).
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

  // ── movimento com colisao AXIS-SEPARATED + varredura anti-tunneling ───────
  // X e Y resolvem em passos distintos, entao bloqueio num eixo nao trava o
  // outro (permite deslizar ao longo de uma parede). O delta e fatiado em
  // sub-passos <= maxPasso pra um salto grande nao ATRAVESSAR uma parede fina
  // (o teste so-na-posicao-final deixava tunelar); default = meio tile.
  function resolveMove(pos, delta, walls, tileSize, maxPasso) {
    if (!maxPasso) maxPasso = Math.max(1, Math.round(tileSize * 0.5));
    var dist = Math.max(Math.abs(delta.x), Math.abs(delta.y));
    var n = Math.max(1, Math.ceil(dist / maxPasso));
    var sx = delta.x / n, sy = delta.y / n;
    var x = pos.x, y = pos.y;
    for (var i = 0; i < n; i++) {
      if (!colideEm(x + sx, y, walls, tileSize)) x = x + sx;
      if (!colideEm(x, y + sy, walls, tileSize)) y = y + sy;
    }
    return { x: x, y: y };
  }

  // ── mapeamento de tecla: WASD, NAO setas (regra do jogo real) ─────────────
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

  // ── maquina de estado da evolucao: parado -> andando -> vira o Gus ────────
  // O roteiro do conceito: quadrado PARADO ate o input; anda (sem graca, de
  // proposito); depois de um pouco de MOVIMENTO OU de TEMPO andando, vira o
  // Gus. Deterministico: o tempo decorrido desde o passo anterior (dtMs) entra
  // por parametro. Estado terminal = GUS (nao desvira).
  var FASE = { PARADO: "parado", ANDANDO: "andando", GUS: "gus" };

  function faseInicial() {
    return { nome: FASE.PARADO, passos: 0, ms: 0 };
  }

  // Aplica UM passo de movimento efetivo (o heroi respondeu a um input). dtMs =
  // ms desde o passo anterior (>= 0; ignorado no 1o passo). cfg.passosPraVirar
  // (default 8) e cfg.msPraVirar (default 5000): vira no que vier primeiro.
  function aoAndar(fase, dtMs, cfg) {
    if (fase.nome === FASE.GUS) return fase; // terminal
    cfg = cfg || {};
    var passosPraVirar = cfg.passosPraVirar || 8;
    var msPraVirar = cfg.msPraVirar || 5000;
    var passos = fase.passos + 1;
    var ms = fase.ms + (passos > 1 ? Math.max(0, dtMs || 0) : 0);
    var virou = passos >= passosPraVirar || ms >= msPraVirar;
    return { nome: virou ? FASE.GUS : FASE.ANDANDO, passos: passos, ms: ms };
  }

  return {
    feetHitbox: feetHitbox,
    resolveMove: resolveMove,
    keyToDir: keyToDir,
    FASE: FASE,
    faseInicial: faseInicial,
    aoAndar: aoAndar,
  };
});
