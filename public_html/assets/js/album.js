// album.js
// A camada DOM do ALBUM (item W6 · ALBUM): so cola o nucleo PURO (album-core.js)
// com a tela. A maquina de colecao, a (de)serializacao e a degradacao vivem no
// nucleo testado; aqui e so montar a grade, ouvir o botao e persistir. JS minimo.
//
// ⚠️ O CATALOGO das figurinhas e PLACEHOLDER SEGURO: os 13 ids-glifo do Sylvarin,
// montados a partir do glyfa-core (as mesmas raizes+glosas da Glyfa) — SEM
// duplicar o lexico e SEM arte nova / sprite de personagem. O TEMA/arte final e
// decisao do LIDER (co-decidido, ainda nao definido): trocar o tema = trocar o
// array `catalogo` abaixo (ou a fonte dele), sem tocar no nucleo nem no HTML.
//
// Degradacao (o brief): SEM JS a grade estatica ja aparece (silhuetas + o exemplo
// canon + a legenda), nunca um bloco vazio. localStorage OFF/cheio/anonimo -> a
// loja cai pra in-memory (o nucleo garante) e a UI avisa com graca; o album vale
// so nesta visita, mas a pagina NUNCA quebra.
"use strict";
(function () {
  var secao = document.getElementById("gancho-album");
  if (!secao || !window.AlbumCore || !window.GlyfaCore) return; // sem core -> grade estatica
  var Core = window.AlbumCore;

  var grade = document.getElementById("album-grade");
  var contador = document.getElementById("album-contador");
  var btn = document.getElementById("album-btn");
  var nota = document.getElementById("album-nota");
  if (!grade || !contador || !btn) return;

  var lang = secao.getAttribute("data-lang") === "en" ? "en" : "pt";
  var glosa = lang === "en" ? "en" : "pt";

  // rotulos i18n (do PHP, via data-*): fallback pt discreto se faltar.
  var tplContador = secao.getAttribute("data-lbl-contador") || "{n} de {total} coladas";
  var lblCompleto = secao.getAttribute("data-lbl-completo") || "album completo";
  var lblOff      = secao.getAttribute("data-lbl-off") || "sem memoria no navegador: o album vale so nesta visita.";
  var lblFalta    = secao.getAttribute("data-lbl-falta") || "figurinha ainda nao colada";
  var lblColada   = secao.getAttribute("data-lbl-colada") || "colada";

  // ── o CATALOGO: as 13 raizes-glifo do glyfa-core (placeholder seguro) ───────
  // id = stem (a chave de colecao); glifo = a forma de dicionario ("mor-"); glosa
  // = a traducao curta no idioma da pagina. Zero raster: o "cromo" e o glifo +
  // a glosa em tipografia. Reusa o lexico do core da Glyfa, sem duplicar.
  var catalogo = [];
  var ids = [];
  for (var i = 0; i < window.GlyfaCore.RAIZES.length; i++) {
    var r = window.GlyfaCore.RAIZES[i];
    catalogo.push({ id: r.stem, glifo: r.raiz, glosa: r[glosa] });
    ids.push(r.stem);
  }

  // ── storage: pegar window.localStorage pode LANCAR (SecurityError) so no
  // acesso; embrulha e passa null se falhar. A loja tolera null e storage que
  // lanca — a degradacao mora no nucleo. ──────────────────────────────────────
  var storage = null;
  try { storage = window.localStorage; } catch (err) { storage = null; }
  var loja = Core.criarLoja(storage, ids);

  // ── monta os slots da grade a partir do catalogo (substitui a grade estatica) ─
  var slots = {};
  function montarGrade() {
    var frag = document.createDocumentFragment();
    for (var k = 0; k < catalogo.length; k++) {
      var fig = catalogo[k];
      var li = document.createElement("li");
      li.className = "album-slot";
      li.setAttribute("data-id", fig.id);

      var glifoEl = document.createElement("span");
      glifoEl.className = "album-glifo";
      glifoEl.textContent = fig.glifo;

      var glosaEl = document.createElement("span");
      glosaEl.className = "album-glosa";
      glosaEl.textContent = fig.glosa;

      // a silhueta do slot faltante (o "verso" do cromo): um ? decorativo
      var qEl = document.createElement("span");
      qEl.className = "album-q";
      qEl.setAttribute("aria-hidden", "true");
      qEl.textContent = "?";

      li.appendChild(qEl);
      li.appendChild(glifoEl);
      li.appendChild(glosaEl);
      slots[fig.id] = { li: li, fig: fig };
      frag.appendChild(li);
    }
    grade.textContent = "";
    grade.appendChild(frag);
  }

  // ── pinta o estado: coladas acendem (glifo+glosa), faltantes ficam silhueta ──
  function pintar(idNovo) {
    var p = loja.progresso();
    for (var id in slots) {
      if (!slots.hasOwnProperty(id)) continue;
      var s = slots[id];
      var colada = loja.tem(id);
      s.li.classList.toggle("colada", colada);
      if (colada) {
        s.li.setAttribute("aria-label", s.fig.glifo + " " + s.fig.glosa + " · " + lblColada);
      } else {
        s.li.setAttribute("aria-label", lblFalta);
      }
    }
    // o carimbo de reveal so na figurinha recem-colada (reduced-motion desliga no CSS)
    if (idNovo && slots[idNovo]) {
      var el = slots[idNovo].li;
      el.classList.remove("colando");
      void el.offsetWidth; // reflow barato pra reiniciar a animation sem timer
      el.classList.add("colando");
    }
    // contador "X de N coladas"
    contador.textContent = tplContador.replace("{n}", String(p.n)).replace("{total}", String(p.total));
    // botao: some/avisa quando o album fecha
    if (p.completo) {
      btn.disabled = true;
      btn.textContent = lblCompleto;
    }
    // aviso de storage off (com graca): so aparece quando a memoria nao vale
    if (nota) {
      if (loja.storageOk()) {
        nota.hidden = true;
      } else {
        nota.textContent = lblOff;
        nota.hidden = false;
      }
    }
  }

  // ── o botao "colar figurinha": revela UMA faltante aleatoria (o modo demo) ───
  // O jeito de GANHAR de verdade (votar/ler/forjar) e co-decidido depois; por ora
  // este botao demonstra a mecanica. O random vive AQUI (a camada DOM), nunca no
  // nucleo, que e deterministico.
  btn.addEventListener("click", function () {
    var faltam = loja.progresso().faltantes;
    if (faltam.length === 0) return;
    var escolhida = faltam[Math.floor(Math.random() * faltam.length)];
    loja.colar(escolhida);
    pintar(escolhida);
  });

  montarGrade();
  btn.hidden = false;   // so aparece com JS (o estado-base nao tem como colar)
  pintar(null);
})();
