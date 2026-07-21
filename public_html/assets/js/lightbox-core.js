// lightbox-core.js
// O nucleo PURO do LIGHTBOX (correcoes #5 e #6 da #1): a maquina de estado do
// zoom das telas (o primeiro prompt tui_claude2 na §17; o monologo do HAL
// tui_claude na §11). So estado: aberto/fechado, qual src/alt mostrar, e a
// reducao de tecla -> acao (ESC fecha). NADA de document/window aqui: logica
// pura, testada com node:test. O wrapper fino (pecas.js) monta o overlay no DOM,
// intercepta o clique e chama estas funcoes.
//
// Progressive enhancement: SEM JS os <a class="zoom-link"> abrem a PNG em tamanho
// real (o href nativo). COM JS, pecas.js intercepta e usa este nucleo pra abrir o
// overlay in-page. Este arquivo NAO sabe nada de DOM: so transforma estado.
//
// UMD leve (mesma razao do glyfa-core/typing-core): expoe window.LightboxCore E
// module.exports. NUNCA virar ESM (Firefox file:// quebra por CORS).
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.LightboxCore = Core;
  }
})(this, function () {

  // ── criar: o estado inicial, fechado ────────────────────────────────────────
  function criar() {
    return { aberto: false, src: null, alt: null };
  }

  // ── abrir: transiciona pra aberto com uma imagem. Sem src valido -> NO-OP ───
  // (nunca abre um overlay vazio). Normaliza alt pra string (aria-label do dialog).
  function abrir(estado, src, alt) {
    if (!src) return estado;
    return { aberto: true, src: String(src), alt: alt == null ? "" : String(alt) };
  }

  // ── fechar: sempre volta ao estado fechado limpo ────────────────────────────
  function fechar() {
    return { aberto: false, src: null, alt: null };
  }

  // ── teclaParaAcao: reduz uma tecla a uma acao do lightbox ───────────────────
  // So o Escape fecha (aceita "Esc" legado). Qualquer outra tecla -> null.
  function teclaParaAcao(key) {
    return key === "Escape" || key === "Esc" ? "fechar" : null;
  }

  // ── deveInjetarOlho: o link ampliado carrega o olho do HAL? (correcao #6 da #1) ─
  // O zoom da §11 marca o <a> com data-hal-eye="1"; so nesse caso o wrapper injeta
  // o olho vermelho (respirando) no header-direito da imagem ampliada. Qualquer
  // outro valor/ausencia -> false (os demais zooms abrem sem olho). Logica pura: a
  // DECISAO fica testada aqui; o DOM/posicionamento vive no wrapper (pecas.js).
  function deveInjetarOlho(flag) {
    return flag === "1" || flag === true;
  }

  return {
    criar: criar,
    abrir: abrir,
    fechar: fechar,
    teclaParaAcao: teclaParaAcao,
    deveInjetarOlho: deveInjetarOlho,
  };
});
