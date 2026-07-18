// linha-tempo.js
// A camada DOM da LINHA DO TEMPO (item W6 · LINHA-TEMPO): so cola o nucleo PURO
// (linha-tempo-core.js) com a tela. Toda a matematica de crossfade por tempo
// real, pos<->data, passo de teclado e clique vive no core testado; aqui e
// leitura do DOM, input (arraste/teclado/clique), loop e pintura.
//
// Progressive enhancement: sem este arquivo a banca ja mostra a LISTA estatica
// das edicoes visuais (o frame + a data + o titulo + o dek de cada) — legivel,
// nunca um bloco vazio. Este script LE essa lista, monta o SCRUBBER (uma tela
// so, com crossfade dos frames) e esconde a lista. Com prefers-reduced-motion
// ele NAO liga: a lista estatica fica (o canon de degradacao).
"use strict";
(function () {
  var sec = document.getElementById("gancho-linha");
  if (!sec || !window.LinhaTempoCore) return;      // sem core -> lista estatica
  var lista = sec.querySelector("#lt-lista");
  if (!lista) return;                               // 0 pontos (vazio-com-graca)

  var Core = window.LinhaTempoCore;
  var reduz = matchMedia("(prefers-reduced-motion:reduce)").matches;
  if (reduz) return;                                // reduced-motion -> lista estatica

  // ── le os pontos da lista estatica (a fonte de dados; JS fica sem i18n) ──
  var itens = Array.prototype.slice.call(lista.querySelectorAll(".lt-item"));
  var pontos = itens.map(function (li) {
    var img = li.querySelector(".lt-item-frame img");
    var dek = li.querySelector(".lt-item-dek");
    var dataExt = li.querySelector(".lt-item-data");
    return {
      num: li.getAttribute("data-num") || "",
      data: li.getAttribute("data-data") || "",
      rotulo: li.getAttribute("data-rotulo") || "",
      frame: li.getAttribute("data-frame") || "",
      alt: img ? img.getAttribute("alt") || "" : "",
      titulo: li.querySelector(".lt-item-titulo") ? li.querySelector(".lt-item-titulo").textContent : "",
      dek: dek ? dek.textContent : "",
      dataExt: dataExt ? dataExt.textContent : "",
    };
  });
  if (!pontos.length) return;

  var LBL_EDICAO = sec.getAttribute("data-lbl-edicao") || "";
  var LBL_SLIDER = sec.getAttribute("data-lbl-slider") || "";
  var LBL_DICA = sec.getAttribute("data-lbl-dica") || "";

  var T = Core.tempos(pontos);           // os dias de cada ponto (tempo real)
  var N = pontos.length;
  var pos = 0;                           // scrub continuo em [0,1]

  // ── monta o DOM do scrubber (inserido ANTES da lista, que sera escondida) ──
  function el(tag, cls) { var e = document.createElement(tag); if (cls) e.className = cls; return e; }

  var jogo = el("div", "lt-jogo");

  var palco = el("div", "lt-palco aceso");
  palco.setAttribute("aria-live", "polite");
  var legenda = el("span", "lt-legenda");
  palco.appendChild(legenda);

  var frames = pontos.map(function (p) {
    var f = el("div", "lt-frame");
    var img = document.createElement("img");
    img.src = p.frame; img.alt = p.alt;
    img.setAttribute("decoding", "async");
    f.appendChild(img);
    palco.appendChild(f);
    return f;
  });

  var moldura = el("div", "lt-moldura");
  moldura.appendChild(palco);
  jogo.appendChild(moldura);

  var fala = el("div", "lt-fala");
  var tituloMes = el("h3", "lt-titulo-mes");
  var dek = el("p", "lt-dek");
  fala.appendChild(tituloMes); fala.appendChild(dek);
  jogo.appendChild(fala);

  var scrub = el("div", "lt-scrub");
  var trilho = el("div", "lt-trilho");
  var feito = el("div", "lt-feito");
  trilho.appendChild(feito);
  scrub.appendChild(trilho);

  var marcas = pontos.map(function (p, i) {
    var mk = el("div", "lt-marca");
    mk.style.left = (Core.posDoIndice(T, i) * 100) + "%";
    var rot = el("span", "lt-rot");
    rot.textContent = p.rotulo;
    mk.appendChild(rot);
    mk.addEventListener("click", function () { irParaIndice(i); });
    scrub.appendChild(mk);
    return mk;
  });

  var puxador = el("div", "lt-puxador");
  puxador.tabIndex = 0;
  puxador.setAttribute("role", "slider");
  puxador.setAttribute("aria-label", LBL_SLIDER);
  puxador.setAttribute("aria-valuemin", "0");
  puxador.setAttribute("aria-valuemax", String(N - 1));
  scrub.appendChild(puxador);
  jogo.appendChild(scrub);

  var dica = el("p", "lt-dica");
  dica.textContent = LBL_DICA;
  jogo.appendChild(dica);

  sec.insertBefore(jogo, lista);
  sec.classList.add("lt-ligado");        // CSS esconde a lista estatica

  // ── pintura: o core diz o par ativo + o fator; aqui so aplico opacidade ──
  function render() {
    var cf = Core.crossfade(T, pos);
    for (var k = 0; k < frames.length; k++) {
      frames[k].style.opacity = Core.opacidadeFrame(k, cf);
    }
    var near = Core.indiceMaisProximo(T, pos);
    if (near < 0) return;
    var p = pontos[near];
    legenda.textContent = LBL_EDICAO + " #" + p.num + " · " + p.rotulo;
    tituloMes.textContent = p.titulo;
    dek.textContent = p.dek;
    var pct = (pos * 100) + "%";
    puxador.style.setProperty("--px", pct);
    feito.style.setProperty("--p", pct);
    puxador.setAttribute("aria-valuenow", String(near));
    puxador.setAttribute("aria-valuetext", p.dataExt + ", " + p.titulo);
    for (var m = 0; m < marcas.length; m++) {
      marcas[m].dataset.on = (m === near) ? "1" : "0";
    }
  }

  function irParaIndice(i) {
    pos = Core.posDoIndice(T, i);
    render();
  }

  // ── arraste (Pointer Events: mouse e toque). O crossfade acompanha o dedo;
  //    ao soltar, encaixa no ponto mais perto. ──
  var arrastando = false;
  function posDeX(clientX) {
    var r = trilho.getBoundingClientRect();
    if (r.width <= 0) return pos;
    var t = (clientX - r.left) / r.width;
    return t < 0 ? 0 : t > 1 ? 1 : t;
  }
  scrub.addEventListener("pointerdown", function (e) {
    if (e.target.classList.contains("lt-marca") || e.target.classList.contains("lt-rot")) return;
    arrastando = true;
    jogo.classList.add("lt-arrastando");
    scrub.setPointerCapture(e.pointerId);
    pos = posDeX(e.clientX); render();
  });
  scrub.addEventListener("pointermove", function (e) {
    if (arrastando) { pos = posDeX(e.clientX); render(); }
  });
  ["pointerup", "pointercancel"].forEach(function (ev) {
    scrub.addEventListener(ev, function () {
      if (!arrastando) return;
      arrastando = false;
      jogo.classList.remove("lt-arrastando");
      irParaIndice(Core.indiceMaisProximo(T, pos)); // solta e encaixa no vizinho
    });
  });

  // ── teclado: setas pulam pro ponto vizinho; Home/End vao pras pontas ──
  puxador.addEventListener("keydown", function (e) {
    var near = Core.indiceMaisProximo(T, pos);
    if (e.key === "ArrowRight" || e.key === "ArrowUp") { e.preventDefault(); irParaIndice(Core.passo(near, +1, N)); }
    else if (e.key === "ArrowLeft" || e.key === "ArrowDown") { e.preventDefault(); irParaIndice(Core.passo(near, -1, N)); }
    else if (e.key === "Home") { e.preventDefault(); irParaIndice(0); }
    else if (e.key === "End") { e.preventDefault(); irParaIndice(N - 1); }
  });

  // reancora as marcas se a largura mudar (rotacao/resize nao muda o tempo,
  // so a projecao em px; posDoIndice e por tempo real, entao basta repintar).
  render();
})();
