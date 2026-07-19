// cupom.js
// A camada DOM do CUPOM (item W6 · CUPOM): so cola o nucleo PURO (cupom-core.js)
// com o DOM, o fetch e o localStorage. A maquina de RASGAR/DESFAZER, a WHITELIST
// e a idempotencia "ja votou" vivem no core testado; aqui e evento e pintura. JS
// minimo. Sem este arquivo, o cupom JA funciona: e um <form method=post> nativo
// que vota SEM JS (o browser navega pro endpoint, que responde in-world).
//
// O que este arquivo LIGA (progressive enhancement, tudo por cima do form nativo):
//  1. fetch no lugar do submit nativo (fica na pagina; erro/500 → volta pro nativo).
//  2. o RASGAR/DESFAZER: clicar a serrilha rasga um segmento (core.rasgar); um botao
//     "colar de volta" desfaz (core.desfazer). Nunca trava (o core garante).
//  3. "ja votou": idempotencia SUAVE por localStorage (zero-dado). Se ja votou nesta
//     edicao, mostra o estado agradecido e nao empurra de novo.
// Degradacao: sem fetch/localStorage/core, nada disso liga e o form nativo resolve.
"use strict";
(function () {
  var form = document.getElementById("cupom");
  var sec = document.getElementById("gancho-cupom");
  if (!form || !sec || !window.CupomCore) return; // sem core → o form nativo basta
  var Core = window.CupomCore;

  var status = document.getElementById("cupom-status");
  var btnEnviar = document.getElementById("cupom-enviar");
  var btnRasgar = document.getElementById("cupom-rasgar");
  var btnDesfazer = document.getElementById("cupom-desfazer");
  var serra = form.querySelector(".cupom-serra");

  var MSG = {
    obrigado: sec.getAttribute("data-msg-obrigado") || "",
    javotou: sec.getAttribute("data-msg-javotou") || "",
    erro: sec.getAttribute("data-msg-erro") || "",
    off: sec.getAttribute("data-msg-off") || "",
    resultado: sec.getAttribute("data-msg-resultado") || "",
    resnota: sec.getAttribute("data-msg-resnota") || "",
    resvazia: sec.getAttribute("data-msg-resvazia") || "",
    votoseu: sec.getAttribute("data-msg-votoseu") || "",
  };

  // marca o cupom como "turbinado" (o CSS revela o que e enhancement).
  form.classList.add("js");

  // ── a loja "ja votou" (storage injetado no core; degrada sozinha) ───────────
  var loja = Core.criarLoja(safeStorage());

  function safeStorage() {
    // devolve o localStorage se der pra tocar; senao null (o core cai in-memory).
    try {
      var s = window.localStorage;
      // toque de fumaca: alguns navegadores expoem o objeto mas lancam ao usar
      s.getItem(Core.CHAVE);
      return s;
    } catch (err) {
      return null;
    }
  }

  // ── o estado do RASGAR (a maquina de estado pura) ───────────────────────────
  var rasgo = Core.criarRasgo();
  function pintaRasgo() {
    form.style.setProperty("--rasgo", String(Core.progresso(rasgo)));
    var destacado = Core.destacado(rasgo);
    form.classList.toggle("rasgando", Core.progresso(rasgo) > 0 && !destacado);
    form.classList.toggle("destacado", destacado);
    // desfazer so faz sentido se ha algo rasgado
    if (btnDesfazer) btnDesfazer.hidden = Core.progresso(rasgo) === 0;
  }
  function rasga() {
    rasgo = Core.rasgar(rasgo);
    pintaRasgo();
  }
  function desfaz() {
    rasgo = Core.desfazer(rasgo);
    pintaRasgo();
  }

  // liga o rasgar: a serrilha inteira e o botao (redundantes, ambos por cima do
  // form nativo). A serrilha e aria-hidden → o botao carrega a acessibilidade.
  if (btnRasgar) {
    btnRasgar.hidden = false;
    btnRasgar.addEventListener("click", rasga);
  }
  if (btnDesfazer) {
    btnDesfazer.addEventListener("click", desfaz);
  }
  if (serra) {
    serra.addEventListener("click", rasga);
    serra.style.cursor = "pointer";
  }

  // ── mostrar um estado final (agradecido / ja votou / erro) ──────────────────
  function anuncia(msg, tipo) {
    if (!status) return;
    status.textContent = msg;
    status.hidden = false;
    status.setAttribute("data-tipo", tipo || "");
  }

  // trava a interacao apos votar (o cupom foi mandado): some os controles.
  function selaFormulario() {
    disableRadios();
    if (btnEnviar) btnEnviar.disabled = true;
    if (btnRasgar) btnRasgar.hidden = true;
    if (btnDesfazer) btnDesfazer.hidden = true;
    form.classList.add("enviado");
  }
  function disableRadios() {
    var rs = form.querySelectorAll('input[name="opcao"]');
    Array.prototype.forEach.call(rs, function (r) { r.disabled = true; });
  }

  // ── se JA votou nesta edicao, sela e agradece (idempotencia suave) ──────────
  if (loja.jaVotou()) {
    var votada = loja.opcaoVotada();
    var radio = votada
      ? form.querySelector('input[name="opcao"][value="' + cssEscape(votada) + '"]')
      : null;
    if (radio) radio.checked = true;
    selaFormulario();
    anuncia(MSG.javotou, "javotou");
  } else if (!loja.storageOk()) {
    // storage off/anonimo: vota, so nao lembra. Avisa com graca (nao bloqueia).
    anuncia(MSG.off, "off");
  }

  // escape minimo pra montar o seletor de atributo com o value do radio. Os
  // values sao ids kebab (whitelist), mas escapamos por seguranca de qualquer jeito.
  function cssEscape(v) {
    if (window.CSS && CSS.escape) return CSS.escape(String(v));
    return String(v).replace(/[^a-zA-Z0-9_-]/g, "");
  }

  // ── o RESULTADO em barras (Decisao do lider: so %, nunca o numero absoluto) ──
  // Colhe os rotulos (slug→texto) do proprio form: nao inventa copy, casa com o
  // que o servidor renderizaria sem-JS. Usado depois do voto (o cliente tem o
  // `pct` da resposta em maos; NUNCA recebe/reconstroi a contagem crua).
  function rotulosDoForm() {
    var mapa = {};
    var labels = form.querySelectorAll(".cupom-opcao");
    Array.prototype.forEach.call(labels, function (lab) {
      var input = lab.querySelector('input[name="opcao"]');
      var txt = lab.querySelector(".cupom-txt");
      if (input && txt) mapa[input.value] = txt.textContent || input.value;
    });
    return mapa;
  }

  // monta o bloco de resultado (barras) a partir do pct do servidor e substitui o
  // form. `votada` (do localStorage) ganha a marca "seu voto" — o servidor sozinho
  // nao sabe qual foi (zero-dado), so o cliente. DOM por createElement/textContent
  // (nada de innerHTML com dado dinamico).
  function renderResultado(pct, votada) {
    if (!window.CupomCore || typeof Core.ordenarPct !== "function") return false;
    var rotulos = rotulosDoForm();
    var ord = Core.ordenarPct(pct);   // [{op, pct}] desc, estavel; ja saneado

    var bloco = document.createElement("div");
    bloco.className = "cupom-resultado";
    bloco.id = "cupom-resultado";
    bloco.setAttribute("role", "group");

    var tit = document.createElement("p");
    tit.className = "cupom-res-tit";
    tit.textContent = MSG.resultado;
    bloco.appendChild(tit);

    var temVoto = false;
    for (var i = 0; i < ord.length; i++) if (ord[i].pct > 0) { temVoto = true; break; }

    if (!temVoto) {
      var vazia = document.createElement("p");
      vazia.className = "cupom-res-vazia";
      vazia.textContent = MSG.resvazia;
      bloco.appendChild(vazia);
    } else {
      var ul = document.createElement("ul");
      ul.className = "cupom-barras";
      for (var j = 0; j < ord.length; j++) {
        var op = ord[j].op, p = ord[j].pct;
        var li = document.createElement("li");
        li.className = "cupom-barra";
        if (op === votada) li.setAttribute("data-eu", "1");

        var lbl = document.createElement("span");
        lbl.className = "cupom-barra-lbl";
        lbl.textContent = rotulos[op] || op;
        if (op === votada && MSG.votoseu) {
          var marca = document.createElement("span");
          marca.className = "cupom-barra-eu";
          marca.textContent = MSG.votoseu;
          lbl.appendChild(document.createTextNode(" "));
          lbl.appendChild(marca);
        }

        var trilho = document.createElement("span");
        trilho.className = "cupom-barra-trilho";
        trilho.setAttribute("aria-hidden", "true");
        var fill = document.createElement("span");
        fill.className = "cupom-barra-fill";
        fill.style.setProperty("--pct", String(p));
        trilho.appendChild(fill);

        var pctxt = document.createElement("span");
        pctxt.className = "cupom-barra-pct";
        pctxt.textContent = p + "%";

        li.appendChild(lbl);
        li.appendChild(trilho);
        li.appendChild(pctxt);
        ul.appendChild(li);
      }
      bloco.appendChild(ul);
    }

    var nota = document.createElement("p");
    nota.className = "cupom-res-nota";
    nota.textContent = MSG.resnota;
    bloco.appendChild(nota);

    // troca o form pelo resultado (o form ja cumpriu o papel).
    if (form.parentNode) form.parentNode.replaceChild(bloco, form);
    return true;
  }

  // ── o SUBMIT: intercepta e faz fetch (fica na pagina). Sem fetch → nativo ───
  form.addEventListener("submit", function (e) {
    // sem fetch (browser velho) → deixa o submit NATIVO acontecer (nao previne)
    if (typeof window.fetch !== "function") return;

    var escolhido = form.querySelector('input[name="opcao"]:checked');
    // sem opcao marcada → deixa a validacao nativa (required) barrar
    if (!escolhido) return;

    var opcao = escolhido.value;
    // whitelist tambem no cliente (defesa; o servidor revalida sempre)
    if (!Core.opcaoValida(opcao)) return; // deixa o nativo/servidor recusar

    e.preventDefault();
    if (btnEnviar) btnEnviar.disabled = true;

    fetch(form.action, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
      },
      body: JSON.stringify({ opcao: opcao }),
    }).then(function (resp) {
      if (!resp.ok) throw new Error("http " + resp.status);
      return resp.json();
    }).then(function (dados) {
      if (!dados || dados.ok !== true) throw new Error("payload");
      loja.registrar(opcao);       // idempotencia suave (best-effort)
      // Decisao do lider: mostra o RESULTADO ao vivo em % (nunca o absoluto). O
      // `pct` veio da resposta; renderResultado troca o form pelas barras. Se o
      // endpoint nao expos o pct (flag off), cai no selo + "obrigado" antigo.
      if (dados.pct && renderResultado(dados.pct, opcao)) return;
      selaFormulario();
      anuncia(MSG.obrigado, "obrigado");
    }).catch(function () {
      // falhou o fetch (offline / 5xx): reabilita e avisa. O usuario pode tentar
      // de novo — o submit seguinte pode ate cair no nativo se preferir.
      if (btnEnviar) btnEnviar.disabled = false;
      anuncia(MSG.erro, "erro");
    });
  });

  pintaRasgo();
})();
