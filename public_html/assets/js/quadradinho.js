// quadradinho.js
// A camada DOM do quadradinho (item W6 · QUADRADINHO): so cola o nucleo PURO
// (quadradinho-core.js) com a tela. Toda a matematica de colisao/movimento e a
// maquina de estado da evolucao vivem no core testado; aqui e input, loop e
// pintura. JS minimo, e a stack permite (o quadradinho e um dos poucos usos de
// JS justificados). Sem este arquivo a banca ja le, navega e troca de idioma:
// o quadradinho e progressive enhancement.
//
// Degradacao: sem JS (ou prefers-reduced-motion) a sala fica no estado-base do
// HTML/CSS (o quadrado parado + a legenda escrita), NUNCA um bloco vazio. Este
// script so LIGA a interatividade quando ha JS e movimento e permitido.
"use strict";
(function () {
  var sala = document.getElementById("quadradinho");
  if (!sala || !window.QuadCore) return; // sem core -> fica o estado-base
  var heroi = sala.querySelector(".quad-heroi");
  if (!heroi) return;

  var Core = window.QuadCore;
  var hero = sala.closest(".quad-hero") || sala; // onde vive o estado ligado/reduz
  var reduz = matchMedia("(prefers-reduced-motion:reduce)").matches;

  // sprites do Gus (gustaf_i_tavus_vance) por direcao.
  var SPR = {
    up: "/assets/sprites/gus-north.png",
    down: "/assets/sprites/gus-south.png",
    left: "/assets/sprites/gus-west.png",
    right: "/assets/sprites/gus-east.png",
  };

  var FRAME = 12;   // recuo da moldura interna (px)
  var PASSO = 14;   // px por input
  var x = 0, y = 0;
  var fase = Core.faseInicial();
  var ultimoMs = 0; // performance.now() do passo anterior (relogio fica AQUI)

  function tam() {
    return fase.nome === Core.FASE.GUS ? { w: 120, h: 208 } : { w: 26, h: 26 };
  }

  function paredes() {
    var s = sala.getBoundingClientRect();
    return Array.prototype.map.call(sala.querySelectorAll(".quad-parede"), function (w) {
      var r = w.getBoundingClientRect();
      return { l: r.left - s.left, t: r.top - s.top, r: r.right - s.left, b: r.bottom - s.top };
    });
  }

  function pinta() {
    heroi.style.setProperty("--x", x + "px");
    heroi.style.setProperty("--y", y + "px");
  }

  function olhar(dir) {
    if (fase.nome === Core.FASE.GUS && SPR[dir]) {
      heroi.style.setProperty("--sprite", "url('" + SPR[dir] + "')");
    }
  }

  function reclamp() {
    var t = tam();
    x = Math.max(FRAME, Math.min(sala.clientWidth - FRAME - t.w, x));
    y = Math.max(FRAME, Math.min(sala.clientHeight - FRAME - t.h, y));
  }

  function evoluir() {
    heroi.classList.add("virou");
    sala.classList.add("evoluiu");
    reclamp();
    olhar("down");
    pinta();
  }

  // nome da direcao (pro sprite) a partir do vetor eixo-unico do core.
  function nomeDir(v) {
    if (v.x < 0) return "left";
    if (v.x > 0) return "right";
    if (v.y < 0) return "up";
    if (v.y > 0) return "down";
    return null;
  }

  function mover(dir) {
    var t = tam(), W = paredes();
    var maxx = sala.clientWidth - FRAME - t.w, maxy = sala.clientHeight - FRAME - t.h;
    var nxAlvo = Math.max(FRAME, Math.min(maxx, x + dir.x * PASSO));
    var nyAlvo = Math.max(FRAME, Math.min(maxy, y + dir.y * PASSO));
    // a feetHitbox do core e quadrada (tileSize = t.w); com o sprite retangular
    // (30x52 depois de virar) desloca o y de entrada por (t.h - t.w) pra base
    // calculada (y + tileSize) seguir caindo nos pes reais.
    var yAjust = y + (t.h - t.w);
    var delta = { x: nxAlvo - x, y: nyAlvo - y };
    var res = Core.resolveMove({ x: x, y: yAjust }, delta, W, t.w);
    x = res.x;
    y = res.y - (t.h - t.w);
    olhar(nomeDir(dir));

    // avanca a maquina de estado: o relogio (impuro) vive aqui, o dt entra puro.
    if (fase.nome !== Core.FASE.GUS) {
      var agora = (window.performance && performance.now) ? performance.now() : Date.now();
      var dt = ultimoMs ? agora - ultimoMs : 0;
      ultimoMs = agora;
      fase = Core.aoAndar(fase, dt);
      if (fase.nome === Core.FASE.GUS) evoluir();
    }
    pinta();
  }

  function irPara(letra) {
    var dir = Core.keyToDir(letra);
    if (dir) mover(dir);
  }

  // ── input: teclado (WASD, nao setas) ──
  sala.addEventListener("keydown", function (e) {
    var dir = Core.keyToDir(e.key);
    if (!dir) return;
    e.preventDefault();
    mover(dir);
  });

  // ── input: d-pad (toque/ponteiro), com repeticao enquanto segura ──
  var repet = null;
  function pressiona(letra) {
    irPara(letra);
    clearInterval(repet);
    repet = setInterval(function () { irPara(letra); }, 110);
  }
  function solta() { clearInterval(repet); repet = null; }

  Array.prototype.forEach.call(sala.querySelectorAll(".quad-dpad button"), function (b) {
    var letra = b.getAttribute("data-dir");
    b.addEventListener("pointerdown", function (e) {
      e.preventDefault();
      sala.focus({ preventScroll: true });
      pressiona(letra);
    });
    b.addEventListener("pointerup", solta);
    b.addEventListener("pointerleave", solta);
    b.addEventListener("pointercancel", solta);
    // teclado no proprio botao do d-pad (Enter/Espaco): um passo.
    b.addEventListener("click", function () { irPara(letra); });
  });

  // ── boot ──
  function posicaoInicial() {
    var r = sala.getBoundingClientRect();
    x = Math.round(r.width * 0.18);
    y = Math.round(r.height * 0.68);
    reclamp();
  }

  if (reduz) {
    // reduced-motion: o Gus PARADO no destino + a legenda (canon). Sem loop,
    // sem input; a pessoa ve o resultado da evolucao, nao a evolucao.
    fase = { nome: Core.FASE.GUS, passos: 99, ms: 99999 };
    hero.classList.add("reduz");
    posicaoInicial();
    evoluir();
    return;
  }

  // ha JS e movimento e permitido: LIGA a interatividade. O CSS de .ligado
  // troca a legenda estatica pela instrucao "clique e use WASD" e mostra o d-pad.
  hero.classList.add("ligado");
  posicaoInicial();
  pinta();

  // clicar na sala foca o teclado (desktop).
  sala.addEventListener("pointerdown", function (e) {
    if (e.target.closest(".quad-dpad")) return; // o d-pad cuida do proprio
    sala.focus({ preventScroll: true });
  });

  // se a sala mudar de tamanho (rotacao/resize), reancora dentro da moldura.
  var reflow;
  window.addEventListener("resize", function () {
    clearTimeout(reflow);
    reflow = setTimeout(function () { reclamp(); pinta(); }, 120);
  });
})();
