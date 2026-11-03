// portao-bolso-core.js
// O nucleo PURO do PORTAO DE BOLSO (brinquedo da Edicao #7, Programacao, brief §4.10).
// O leitor escolhe uma pasta e aperta conferir. O portao so diz "tudo certo" quando
// olhou cada item; varredura vazia ou incompleta nunca aprova. NADA de document,
// window ou fetch aqui dentro: so logica e textos. A camada DOM (portao-bolso.js) so
// pinta o resultado. Assim roda em node:test e e deterministico.
//
// Contagem igual a da varredura do site (scripts/testes.sh): encontrados, analisados
// e falharam. Os tres numeros saem SEMPRE, inclusive zero.
//
// Os TEXTOS sao RASCUNHO para o lider (GATE-COPY): curtos, sem travessao e sem emoji.
//
// UMD leve (a stack e no-build e o Firefox do lider abre por file://, entao ES module
// quebra por CORS). Expoe window.PortaoBolsoCore e module.exports. NUNCA virar ESM.
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.PortaoBolsoCore = Core;
  }
})(this, function () {

  // ── os textos do brinquedo (rascunho, pt e en com as mesmas chaves) ──────────
  var TEXTOS = {
    pt: {
      titulo: "Portão de bolso",
      instrucao: "Escolha uma pasta e aperte conferir.",
      conferir: "conferir",
      pastas: { cheia: "pasta cheia", limpa: "pasta limpa", vazia: "pasta vazia" },
      resultado: {
        acusa: "Reprovado. Achei um problema nesta pasta.",
        limpo: "Tudo certo. Olhei cada arquivo da pasta e nenhum tem problema.",
        recusa_vazia: "Não disse tudo certo. A pasta está vazia: não olhei nada, e portão que não olha nada não aprova.",
        recusa_invalida: "Não disse tudo certo. A entrada não é uma lista de arquivos.",
        recusa_incompleta: "Não disse tudo certo. Não consegui olhar todos os arquivos.",
      },
      contagem: { encontrados: "encontrados", analisados: "analisados", falharam: "falharam" },
    },
    en: {
      titulo: "Pocket gate",
      instrucao: "Pick a folder and press check.",
      conferir: "check",
      pastas: { cheia: "full folder", limpa: "clean folder", vazia: "empty folder" },
      resultado: {
        acusa: "Rejected. I found a problem in this folder.",
        limpo: "All clear. I checked every file in the folder and none has a problem.",
        recusa_vazia: "Not all clear. The folder is empty: I checked nothing, and a gate that checks nothing does not approve.",
        recusa_invalida: "Not all clear. The input is not a list of files.",
        recusa_incompleta: "Not all clear. I could not check every file.",
      },
      contagem: { encontrados: "found", analisados: "checked", falharam: "failed" },
    },
  };

  // ── as tres pastas do brinquedo (dados, copiados a cada leitura) ─────────────
  var PASTA_IDS = ["cheia", "limpa", "vazia"];
  var PASTAS = {
    cheia: [
      { nome: "modulo-a.txt", problema: false },
      { nome: "modulo-b.txt", problema: true },
      { nome: "modulo-c.txt", problema: false },
    ],
    limpa: [
      { nome: "modulo-a.txt", problema: false },
      { nome: "modulo-b.txt", problema: false },
      { nome: "modulo-c.txt", problema: false },
    ],
    vazia: [],
  };

  function pasta(id) {
    if (!Object.prototype.hasOwnProperty.call(PASTAS, id)) return null;
    return PASTAS[id].map(function (it) {
      return { nome: it.nome, problema: it.problema };
    });
  }

  // ── um item so conta como analisado se foi lido: objeto com problema booleano ─
  function foiAnalisado(item) {
    return item !== null && typeof item === "object" && typeof item.problema === "boolean";
  }

  function resultado(tipo, motivo, encontrados, analisados, problemas) {
    return {
      resultado: tipo,
      motivo: motivo,
      encontrados: encontrados,
      analisados: analisados,
      problemas: problemas,
    };
  }

  // ── conferir: a regra do portao ─────────────────────────────────────────────
  // Ordem: entrada invalida recusa; problema real acusa (mesmo com item ilegivel);
  // pasta vazia recusa; item ilegivel recusa; so o resto e limpo.
  function conferir(itens) {
    if (!Array.isArray(itens)) return resultado("recusa", "invalida", 0, 0, 0);
    var encontrados = itens.length;
    var analisados = 0;
    var problemas = 0;
    for (var i = 0; i < encontrados; i++) {
      if (!foiAnalisado(itens[i])) continue;
      analisados++;
      if (itens[i].problema === true) problemas++;
    }
    if (problemas > 0) return resultado("acusa", null, encontrados, analisados, problemas);
    if (encontrados === 0) return resultado("recusa", "vazia", 0, 0, 0);
    if (analisados !== encontrados) {
      return resultado("recusa", "incompleta", encontrados, analisados, 0);
    }
    return resultado("limpo", null, encontrados, analisados, 0);
  }

  function idiomaDe(idioma) {
    return idioma === "en" ? "en" : "pt";
  }

  // ── contagem: a linha de numeros, sempre com os tres ────────────────────────
  function contagem(r, idioma) {
    var rot = TEXTOS[idiomaDe(idioma)].contagem;
    return rot.encontrados + "=" + r.encontrados + " " +
      rot.analisados + "=" + r.analisados + " " +
      rot.falharam + "=" + r.problemas;
  }

  // ── mensagem: o texto do resultado no idioma pedido ─────────────────────────
  function mensagem(r, idioma) {
    var chave = r.resultado === "recusa" ? "recusa_" + r.motivo : r.resultado;
    return TEXTOS[idiomaDe(idioma)].resultado[chave];
  }

  return {
    TEXTOS: TEXTOS,
    PASTA_IDS: PASTA_IDS.slice(),
    pasta: pasta,
    conferir: conferir,
    contagem: contagem,
    mensagem: mensagem,
  };
});
