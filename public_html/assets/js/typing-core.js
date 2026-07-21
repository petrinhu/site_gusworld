// typing-core.js
// O nucleo PURO da DIGITACAO-AO-ENTRAR-NA-VIEW (correcao #3 da #1): a maquina de
// estado que decide, a partir de uma "entrada" do IntersectionObserver, QUANDO
// disparar a digitacao (adicionar a classe .is-typing) e quando PARAR de observar.
// NADA de document/window/IntersectionObserver aqui dentro: so logica pura, pra
// ser testada com node:test e ser deterministica. O wrapper fino (pecas.js) cria
// o observer de verdade e chama estas funcoes.
//
// A regra: a digitacao dispara UMA vez, no momento em que o quadro entra no
// viewport (antes o CSS rodava no LOAD e o leitor rolava ate la ja depois de
// pronto — so via texto estatico + cursor). Sem IntersectionObserver OU com
// prefers-reduced-motion, NAO se arma: o estado-base (comando ja digitado) fica.
//
// UMD leve: a stack e no-build e o Firefox do lider abre por file://, entao ES
// module (export/import) quebra por CORS. Expoe window.TypingCore via <script src>
// E module.exports pro node:test. NUNCA virar ESM.
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.TypingCore = Core;
  }
})(this, function () {

  // ── onIntersect: dado uma entrada do observer e se JA disparou, o que fazer? ─
  // Retorna { start, stop }:
  //   start = adicionar .is-typing (comeca a digitar)
  //   stop  = parar de observar (a digitacao e de uma vez so)
  // Dispara SO quando esta visivel E ainda nao disparou. Robusto a entry nulo.
  function onIntersect(entry, jaDisparou) {
    var visivel = !!(entry && entry.isIntersecting);
    if (visivel && !jaDisparou) {
      return { start: true, stop: true };
    }
    return { start: false, stop: false };
  }

  // ── deveArmar: o wrapper deve "armar" o quadro (esconder pra digitar depois)? ─
  // So arma se HA IntersectionObserver E o usuario NAO pede movimento reduzido.
  // Sem uma das duas: mostra o estado final direto (nunca esconde sem poder revelar).
  function deveArmar(temObserver, prefereReduzido) {
    return !!temObserver && !prefereReduzido;
  }

  return {
    onIntersect: onIntersect,
    deveArmar: deveArmar,
  };
});
