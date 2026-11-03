// portao-bolso.js
// A camada DOM do PORTAO DE BOLSO (brinquedo da Edicao #7, brief §4.10 e M6). So
// FIACAO: evento -> Core.pasta -> Core.conferir -> Core.mensagem / Core.contagem ->
// textContent. Nenhum texto mora aqui (os textos vem do nucleo, portao-bolso-core.js),
// e nenhuma regra de negocio: o nucleo decide, esta camada so pinta.
//
// Degradacao: sem JS, o bloco .pb-semjs (as tres respostas prontas, no HTML) fica
// visivel. Com JS, esta camada esconde esse bloco e mostra .pb-comjs. O botao conferir
// nasce desabilitado: sem pasta escolhida nao ha o que conferir.
//
// UMD leve como o nucleo (a stack e no-build e o Firefox do lider abre por file://):
// expoe window.PortaoBolsoDom e module.exports. NUNCA virar ESM. Sem fetch, sem storage.
"use strict";
(function (root, factory) {
  var Dom = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Dom;
  }
  if (typeof window !== "undefined") {
    window.PortaoBolsoDom = Dom;
  }
})(this, function () {

  // Liga o brinquedo numa raiz. Devolve false se nao ha raiz, nucleo ou o bloco com JS.
  function montar(raiz, Core, idioma) {
    if (!raiz || !Core) return false;
    var semjs = raiz.querySelector(".pb-semjs");
    var comjs = raiz.querySelector(".pb-comjs");
    if (!semjs || !comjs) return false;

    var conferirBtn = raiz.querySelector(".pb-conferir");
    var res = raiz.querySelector(".pb-res");
    var cont = raiz.querySelector(".pb-cont");
    var botoes = raiz.querySelectorAll("[data-pasta]");
    var escolhida = null;

    semjs.hidden = true;
    comjs.hidden = false;
    conferirBtn.disabled = true;

    Array.prototype.forEach.call(botoes, function (botao) {
      botao.setAttribute("aria-pressed", "false");
      botao.addEventListener("click", function () {
        escolhida = botao.dataset.pasta;
        Array.prototype.forEach.call(botoes, function (outro) {
          outro.setAttribute("aria-pressed", outro === botao ? "true" : "false");
        });
        conferirBtn.disabled = false;
      });
    });

    conferirBtn.addEventListener("click", function () {
      var r = Core.conferir(Core.pasta(escolhida));
      res.textContent = Core.mensagem(r, idioma);
      cont.textContent = Core.contagem(r, idioma);
    });

    return true;
  }

  // Auto-mount no navegador: procura #portao-bolso, le data-idioma e sai cedo se nao ha.
  function iniciar() {
    var el = document.getElementById("portao-bolso");
    if (!el || !window.PortaoBolsoCore) return;
    montar(el, window.PortaoBolsoCore, el.getAttribute("data-idioma"));
  }
  if (typeof window !== "undefined" && typeof document !== "undefined") {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", iniciar);
    } else {
      iniciar();
    }
  }

  return { montar: montar };
});
