// glyfa.js
// A camada DOM da GLYFA (item W6 · GLYFA): so cola o nucleo PURO (glyfa-core.js)
// com a tela. O lexico, a juncao fonetica e o filtro anti-palavrao vivem no core
// testado; aqui e so montar os <select>, ouvir a troca e pintar o resultado. JS
// minimo.
//
// Degradacao: SEM JS (ou sem o core) a secao ja mostra o exemplo ESTATICO
// (mor- + lhin- = Morlhin · voz-sombra) + a explicacao, escritos no HTML — nunca
// um bloco vazio. Este script troca o exemplo estatico pela forja interativa
// (progressive enhancement): so quando ha JS os <select> ganham as raizes e o
// nome nasce ao vivo.
//
// O idioma (pt/en) vem do data-lang da secao — o core guarda as duas glosas, o
// JS escolhe qual mostrar, entao nao ha lexico duplicado no PHP.
"use strict";
(function () {
  var secao = document.getElementById("gancho-glyfa");
  if (!secao || !window.GlyfaCore) return; // sem core -> fica no exemplo estatico
  var Core = window.GlyfaCore;

  var selA = document.getElementById("glyfa-a");
  var selB = document.getElementById("glyfa-b");
  var out = document.getElementById("glyfa-out");
  var elNome = secao.querySelector(".glyfa-nome");
  var elSig = secao.querySelector(".glyfa-sig");
  var base = secao.querySelector(".glyfa-base");
  var forja = secao.querySelector(".glyfa-forja");
  if (!selA || !selB || !out || !elNome || !elSig || !forja) return;

  var lang = secao.getAttribute("data-lang") === "en" ? "en" : "pt";
  var glosa = lang === "en" ? "en" : "pt";
  // "significa" sai do data-* (i18n); fallback pt discreto se faltar.
  var lblSig = secao.getAttribute("data-lbl-significa") || "significa";

  // ── monta as opcoes dos dois seletores a partir do lexico do core ───────────
  // rotulo minusculo (guard N->H do pixel nao dispara: sem maiuscula). O value e
  // o stem; o texto e "mor- (sombra)".
  function popular(sel, escolhido) {
    var frag = document.createDocumentFragment();
    for (var i = 0; i < Core.RAIZES.length; i++) {
      var r = Core.RAIZES[i];
      var op = document.createElement("option");
      op.value = r.stem;
      op.textContent = r.raiz + " (" + r[glosa] + ")";
      if (r.stem === escolhido) op.selected = true;
      frag.appendChild(op);
    }
    sel.textContent = "";
    sel.appendChild(frag);
  }

  // defaults: o par canon do lider (mor + lhin = Morlhin).
  popular(selA, "mor");
  popular(selB, "lhin");

  // ── pinta o resultado da forja ──────────────────────────────────────────────
  // Se as duas raizes forem iguais, o core devolve null: mostra o aviso gentil
  // (a forja pede raizes DIFERENTES) em vez de um resultado. Nunca palavrao: o
  // core ja garante (TST-GLYFA-PALAVRAO).
  function forjar() {
    var r = Core.forjar(selA.value, selB.value);
    if (!r) {
      elNome.textContent = "—";
      elSig.textContent = secao.getAttribute("data-lbl-iguais") || "escolha duas raizes diferentes";
      out.classList.remove("aceso");
      return;
    }
    elNome.textContent = r.nome;
    elSig.textContent = lblSig + " " + '"' + (glosa === "en" ? r.significado_en : r.significado_pt) + '"';
    // re-dispara a animacao de "forja" (reduced-motion desliga no CSS).
    out.classList.remove("aceso");
    // reflow barato pra reiniciar a animation sem timer.
    void out.offsetWidth;
    out.classList.add("aceso");
  }

  selA.addEventListener("change", forjar);
  selB.addEventListener("change", forjar);
  // o botao "forjar": re-forja (re-toca o reveal). O som de clique vem de graca
  // do som.js (delegado em .glyfa-btn) quando os efeitos estao ligados.
  var btn = document.getElementById("glyfa-btn");
  if (btn) btn.addEventListener("click", forjar);

  // troca o exemplo estatico pela forja interativa e forja o par default.
  if (base) base.hidden = true;
  forja.hidden = false;
  forjar();
})();
