// pecas.js
// A camada DOM (wrapper fino, NAO testado) das pecas artisticas da #1 que ganharam
// interacao nas correcoes do lider:
//   #3  DIGITACAO-AO-ENTRAR-NA-VIEW (crt-nano da §17): IntersectionObserver dispara
//       a digitacao so quando o quadro entra no viewport. Logica pura: typing-core.js.
//   #5/#6 LIGHTBOX (zoom das telas §17 e §11): clique-pra-ampliar in-page. Logica
//       pura: lightbox-core.js.
//
// Progressive enhancement em todos:
//   - sem este JS a §17 mostra o comando JA digitado (estado-base) e os <a> abrem
//     a PNG em tamanho real (href nativo). Nada quebra.
//   - o IntersectionObserver e o overlay ficam AQUI (fino, sem logica); as decisoes
//     ("entrou na view?", "abrir/fechar?", "ESC fecha?") vivem nos nucleos testados.
"use strict";
(function () {
  var doc = document;

  // ── 1. DIGITACAO AO ENTRAR NA VIEW (crt-nano) ───────────────────────────────
  (function typingOnView() {
    var Core = window.TypingCore;
    if (!Core) return;
    var alvos = doc.querySelectorAll(".crt-scr.crt-nano");
    if (!alvos.length) return;

    var temIO = typeof window.IntersectionObserver === "function";
    var reduz = !!(window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches);
    // sem observer ou movimento reduzido: NAO arma -> o estado-base (ja digitado) fica
    if (!Core.deveArmar(temIO, reduz)) return;

    Array.prototype.forEach.call(alvos, function (el) {
      el.classList.add("armed"); // esconde o comando ate entrar na view
      var disparou = false;
      var obs = new IntersectionObserver(function (entries) {
        for (var i = 0; i < entries.length; i++) {
          var acao = Core.onIntersect(entries[i], disparou);
          if (acao.start) {
            disparou = true;
            el.classList.add("is-typing");
          }
          if (acao.stop) obs.unobserve(el);
        }
      }, { threshold: 0.6 });
      obs.observe(el);
    });
  })();

  // ── 2. LIGHTBOX (zoom das telas) ────────────────────────────────────────────
  (function lightbox() {
    var Core = window.LightboxCore;
    if (!Core) return;
    var links = doc.querySelectorAll("a.zoom-link");
    if (!links.length) return;

    var estado = Core.criar();
    var overlay = null, imgEl = null, btnFechar = null, ultimoFoco = null;

    function montar() {
      overlay = doc.createElement("div");
      overlay.className = "lightbox";
      overlay.setAttribute("role", "dialog");
      overlay.setAttribute("aria-modal", "true");
      overlay.hidden = true;

      imgEl = doc.createElement("img");
      imgEl.decoding = "async";

      btnFechar = doc.createElement("button");
      btnFechar.type = "button";
      btnFechar.className = "lightbox-fechar";
      btnFechar.textContent = "fechar ✕";
      btnFechar.setAttribute("aria-label", "Fechar (Esc)");

      overlay.appendChild(imgEl);
      overlay.appendChild(btnFechar);
      doc.body.appendChild(overlay);

      overlay.addEventListener("click", function (e) {
        if (e.target === overlay) fechar(); // clique no fundo fecha
      });
      btnFechar.addEventListener("click", fechar);
    }

    function pintar() {
      if (estado.aberto) {
        imgEl.setAttribute("src", estado.src);
        imgEl.setAttribute("alt", estado.alt);
        overlay.setAttribute("aria-label", estado.alt || "Imagem ampliada");
        overlay.hidden = false;
        doc.documentElement.classList.add("lightbox-aberto");
        btnFechar.focus();
      } else {
        overlay.hidden = true;
        imgEl.removeAttribute("src");
        doc.documentElement.classList.remove("lightbox-aberto");
        if (ultimoFoco && typeof ultimoFoco.focus === "function") ultimoFoco.focus();
      }
    }

    function abrir(src, alt, origem) {
      if (!overlay) montar();
      ultimoFoco = origem || doc.activeElement;
      estado = Core.abrir(estado, src, alt);
      if (estado.aberto) pintar();
    }
    function fechar() {
      estado = Core.fechar(estado);
      pintar();
    }

    Array.prototype.forEach.call(links, function (a) {
      a.addEventListener("click", function (e) {
        e.preventDefault();
        var img = a.querySelector("img");
        var alt = img ? img.getAttribute("alt") : a.getAttribute("aria-label");
        abrir(a.getAttribute("href"), alt, a);
      });
    });

    doc.addEventListener("keydown", function (e) {
      if (!estado.aberto) return;
      if (Core.teclaParaAcao(e.key) === "fechar") {
        e.preventDefault();
        fechar();
        return;
      }
      // trap de foco minimo: o unico focavel do overlay e o botao fechar
      if (e.key === "Tab") {
        e.preventDefault();
        btnFechar.focus();
      }
    });
  })();
})();
