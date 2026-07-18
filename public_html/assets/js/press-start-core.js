// press-start-core.js
// O nucleo PURO do PRESS START (item W6 · D-PRESS-START): so a maquina de
// estado da boot-sequence do fliperama e o mapeamento de input. NADA de
// document/window/Date/random aqui dentro, pra ser testado com node:test e ser
// deterministico. O tempo entra por parametro (dtMs); quem tem relogio e a
// camada DOM (press-start.js).
//
// O roteiro (mock 08, C+A decidido pelo lider): REPOUSO (attract "PRESS START"
// piscando) -> apertar liga o BOOT (o BIOS falso imprime linha a linha, ~1.3s)
// -> aterrissa na MENSAGEM honesta que aponta pro quadradinho. Apertar de novo
// na mensagem RESETA pro repouso. Estado terminal do boot = MENSAGEM.
//
// UMD leve: a stack e no-build e o Firefox do lider abre por file://, entao ES
// module (export/import) quebra por CORS. Isto expoe window.PressStartCore via
// <script src> E module.exports pro node:test. NUNCA virar ESM.
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.PressStartCore = Core;
  }
})(this, function () {

  var ESTADO = { REPOUSO: "repouso", BOOT: "boot", MENSAGEM: "mensagem" };

  // config default: 4 linhas de BIOS a 320ms cada = ~1.28s de boot (o ~1.3s do
  // mock). A camada DOM passa cfg.passos = numero real de linhas, pra o nucleo e
  // a tela nunca saírem de sincronia.
  var PASSOS = 4;
  var MS_POR_PASSO = 320;

  function estadoInicial() {
    return { nome: ESTADO.REPOUSO, passo: 0, ms: 0 };
  }

  // ── input: quais teclas LIGAM o START (Enter/Espaco, nao WASD nem setas) ────
  function keyLiga(key) {
    if (typeof key !== "string") return false;
    return key === "Enter" || key === " " || key === "Spacebar";
  }

  // ── apertar START: a transicao disparada por clique/Enter/Espaco ────────────
  // repouso  -> liga o boot (ou, com opts.pularBoot, vai direto pra mensagem:
  //             o caminho reduced-motion, sem animacao).
  // mensagem -> RESETA pro repouso (o "novo clique reseta").
  // boot     -> no-op: apertar no meio do boot nao interrompe.
  function apertar(estado, opts) {
    opts = opts || {};
    switch (estado.nome) {
      case ESTADO.REPOUSO:
        return opts.pularBoot
          ? { nome: ESTADO.MENSAGEM, passo: 0, ms: 0 }
          : { nome: ESTADO.BOOT, passo: 0, ms: 0 };
      case ESTADO.MENSAGEM:
        return { nome: ESTADO.REPOUSO, passo: 0, ms: 0 };
      default:
        return estado;
    }
  }

  // ── avanco por TEMPO: so o BOOT corre. dtMs = ms desde o quadro anterior ────
  // (>= 0). Acumula ms, deriva o passo (quantas linhas do BIOS ja imprimiram) e,
  // ao atingir cfg.passos, transiciona pra MENSAGEM (terminal do boot).
  // REPOUSO e MENSAGEM sao inertes: sem apertar, nada anda sozinho.
  function avancar(estado, dtMs, cfg) {
    if (estado.nome !== ESTADO.BOOT) return estado;
    cfg = cfg || {};
    var passos = cfg.passos || PASSOS;
    var msPorPasso = cfg.msPorPasso || MS_POR_PASSO;
    var ms = estado.ms + Math.max(0, dtMs || 0);
    var passo = Math.floor(ms / msPorPasso);
    if (passo >= passos) {
      return { nome: ESTADO.MENSAGEM, passo: passos, ms: ms };
    }
    return { nome: ESTADO.BOOT, passo: passo, ms: ms };
  }

  return {
    ESTADO: ESTADO,
    PASSOS: PASSOS,
    MS_POR_PASSO: MS_POR_PASSO,
    estadoInicial: estadoInicial,
    keyLiga: keyLiga,
    apertar: apertar,
    avancar: avancar,
  };
});
