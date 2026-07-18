// press-start.js
// A camada DOM do PRESS START (item W6 · D-PRESS-START): so cola o nucleo PURO
// (press-start-core.js) com a tela. A maquina de estado (repouso/boot/mensagem)
// e o input vivem no core testado; aqui e evento, relogio e pintura. JS minimo.
// Sem este arquivo a banca ja le e navega: o PRESS START e progressive
// enhancement.
//
// Degradacao: sem JS (ou prefers-reduced-motion) o poster fica no estado-base
// do HTML/CSS — a MENSAGEM honesta estatica que aponta pro quadradinho (a seta
// e um <a href="#gancho-hero"> que funciona sem JS), NUNCA um bloco vazio. Este
// script so LIGA o attract "PRESS START" e o boot quando ha JS e movimento e
// permitido.
"use strict";
(function () {
  var poster = document.getElementById("press-start");
  if (!poster || !window.PressStartCore) return; // sem core -> estado-base
  var Core = window.PressStartCore;

  // reduced-motion: nao liga o fliperama. O estado-base (a mensagem honesta
  // estatica) ja e a informacao; sem animacao nao ha o que "revelar".
  if (matchMedia("(prefers-reduced-motion:reduce)").matches) return;

  var linhas = Array.prototype.slice.call(poster.querySelectorAll(".ps-bl"));
  var cfg = { passos: linhas.length || Core.PASSOS, msPorPasso: Core.MS_POR_PASSO };
  var estado = Core.estadoInicial();
  var raf = null, ultimoMs = 0;

  // ── pintura: reflete o estado do core na tela ──
  function mostraLinhas(passo) {
    // no boot o BIOS imprime cumulativamente: revela as linhas 0..passo.
    for (var i = 0; i < linhas.length; i++) {
      linhas[i].classList.toggle("vis", i <= passo);
    }
  }

  function pinta() {
    switch (estado.nome) {
      case Core.ESTADO.BOOT:
        poster.dataset.st = "boot";
        mostraLinhas(estado.passo);
        break;
      case Core.ESTADO.MENSAGEM:
        poster.dataset.st = "msg";
        break;
      default:
        poster.dataset.st = "attract";
        mostraLinhas(-1); // esconde todas as linhas do BIOS
    }
  }

  // ── loop do boot: o relogio (impuro) vive AQUI, o dt entra puro no core ──
  function passoDoLoop(agora) {
    var dt = ultimoMs ? agora - ultimoMs : 0;
    ultimoMs = agora;
    estado = Core.avancar(estado, dt, cfg);
    pinta();
    if (estado.nome === Core.ESTADO.BOOT) {
      raf = requestAnimationFrame(passoDoLoop);
    } else {
      raf = null; // aterrissou na mensagem: o aria-live anuncia
    }
  }

  function apertar(opts) {
    if (raf) { cancelAnimationFrame(raf); raf = null; }
    estado = Core.apertar(estado, opts);
    ultimoMs = 0;
    pinta();
    if (estado.nome === Core.ESTADO.BOOT) {
      raf = requestAnimationFrame(passoDoLoop);
    }
  }

  // ── liga o poster como botao (so agora que ha JS + movimento) ──
  poster.setAttribute("role", "button");
  poster.setAttribute("tabindex", "0");
  poster.addEventListener("click", function () { apertar(); });
  poster.addEventListener("keydown", function (e) {
    if (Core.keyLiga(e.key)) { e.preventDefault(); apertar(); }
  });

  // arranca no attract (esconde a mensagem estatica, mostra o "PRESS START").
  pinta();
})();
