// som.js
// A camada DOM do SOM (item W6 · SOM-2-BOTOES): so cola o nucleo PURO
// (som-core.js) com o audio real. A maquina de estado (efeitos/musica) e a
// persistencia vivem no core testado; aqui e evento, localStorage e Audio. JS
// minimo. Sem este arquivo os dois botoes ja aparecem no default (efeitos ON /
// musica OFF via aria-pressed no HTML) — inertes: o site funciona 100% sem som.
//
// O clique e o SFX REAL do jogo (menu-click.wav, reusado): quando a pessoa
// jogar, reconhece o som do site. A musica (cidade-tema.mp3) fica OFF por padrao
// e so baixa/toca quando ligada. Politica de autoplay: nenhum audio soa antes do
// 1o gesto do usuario — clicar um botao JA e esse gesto.
"use strict";
(function () {
  var som = document.querySelector(".som");
  if (!som || !window.SomCore) return; // sem core -> os botoes ficam no default
  var Core = window.SomCore;

  var botoes = {};
  Array.prototype.forEach.call(som.querySelectorAll(".som-btn"), function (b) {
    var canal = b.getAttribute("data-som");
    if (Core.canalValido(canal)) botoes[canal] = b;
  });

  // ── persistencia: le/grava o estado, tolerante a storage off/cheio ──────────
  function ler() {
    try {
      return Core.desserializar(window.localStorage.getItem(Core.CHAVE));
    } catch (err) {
      return Core.estadoInicial(); // anonimo / storage bloqueado -> default
    }
  }
  function gravar(estado) {
    try {
      window.localStorage.setItem(Core.CHAVE, Core.serializar(estado));
    } catch (err) {
      // storage cheio/bloqueado: a preferencia vale so nesta sessao. Sem quebra.
    }
  }

  var estado = ler();

  // ── audio: o SFX de clique (real do jogo) e a musica de fundo ───────────────
  // preload: o clique e pequeno (auto); a musica e pesada e OFF por padrao
  // (preload "none": so baixa quando a pessoa ligar).
  var sfxClique = new Audio("/assets/audio/menu-click.wav");
  sfxClique.preload = "auto";
  var sfxHover = new Audio("/assets/audio/menu-hover.wav");
  sfxHover.preload = "auto";
  sfxHover.volume = 0.6;
  var musica = new Audio("/assets/audio/cidade-tema.mp3");
  musica.loop = true;
  musica.preload = "none";
  musica.volume = 0.45;

  var audioDestravado = false;

  function tocaClique() {
    if (!estado.efeitos) return;
    try {
      sfxClique.currentTime = 0;
      var p = sfxClique.play();
      if (p && p.catch) p.catch(function () {}); // gesto ausente / codec: silencia
    } catch (err) { /* nunca deixa o som derrubar a UI */ }
  }

  function tocaHover() {
    if (!estado.efeitos) return;
    try {
      sfxHover.currentTime = 0;
      var p = sfxHover.play();
      if (p && p.catch) p.catch(function () {});
    } catch (err) { /* idem */ }
  }

  function tocaMusica() {
    try {
      var p = musica.play();
      if (p && p.catch) p.catch(function () {});
    } catch (err) { /* idem */ }
  }
  function paraMusica() {
    try { musica.pause(); } catch (err) { /* idem */ }
  }

  // ── pintura: o estado vai no aria-pressed, que acende o LED (.luz) via CSS.
  //    Rotulo FIXO (Efeitos/Musica) como no hardware real — o LED e o sinalizador. ─
  function reflete() {
    for (var canal in botoes) {
      if (botoes.hasOwnProperty(canal)) {
        botoes[canal].setAttribute("aria-pressed", estado[canal] ? "true" : "false");
      }
    }
  }

  // ── destravar audio no 1o gesto: a politica de autoplay so libera apos ele ──
  // se a preferencia salva ja tinha musica ON, ela so arranca AQUI (nao no load).
  function destravaAudio() {
    if (audioDestravado) return;
    audioDestravado = true;
    if (estado.musica) tocaMusica();
  }

  // ── os 2 botoes: alternam o canal, persistem, refletem e agem no audio ──────
  function ligaBotao(canal) {
    var b = botoes[canal];
    if (!b) return;
    b.addEventListener("click", function () {
      destravaAudio();
      estado = Core.alternar(estado, canal);
      gravar(estado);
      reflete();
      if (canal === "musica") {
        if (estado.musica) tocaMusica(); else paraMusica();
      }
      // o clique soa quando efeitos FICA ligado (feedback audivel do gesto):
      // ligar efeitos -> clica; desligar -> silencio confirma.
      tocaClique();
    });
  }
  ligaBotao("efeitos");
  ligaBotao("musica");

  // hover nos 2 botoes: o tick real do menu do jogo. So em ponteiro com hover
  // FINO (desktop) — nunca dispara no toque, onde "hover" e ambiguo e viraria
  // ruido. Enhancement sobre enhancement: passivo, some se efeitos OFF.
  if (matchMedia("(hover:hover) and (pointer:fine)").matches) {
    for (var c in botoes) {
      if (botoes.hasOwnProperty(c)) {
        botoes[c].addEventListener("pointerenter", function () {
          destravaAudio();
          tocaHover();
        });
      }
    }
  }

  // ── SFX de clique nos brinquedos e links da home (quando efeitos ON) ────────
  // delegado, passivo: NUNCA preventDefault — os mini-apps (quadradinho, PRESS
  // START, linha do tempo) e a navegacao seguem intactos; so ganham o som.
  var GATILHOS = ".som-btn,.quad-dpad button,#press-start,.banca a,.contato a,.glyfa-btn,.album-btn";
  document.addEventListener("click", function (e) {
    var alvo = e.target && e.target.closest ? e.target.closest(GATILHOS) : null;
    if (!alvo) return;
    if (alvo.classList && alvo.classList.contains("som-btn")) return; // os botoes de som ja tocam sozinhos
    destravaAudio();
    tocaClique();
  }, true);

  // primeiro gesto de teclado/ponteiro tambem destrava (ex.: WASD no quadradinho).
  window.addEventListener("keydown", destravaAudio, { once: true });

  reflete(); // garante o aria-pressed alinhado ao estado salvo
})();
