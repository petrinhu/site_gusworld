// glyfa-core.js
// O nucleo PURO da GLYFA (item W6 · GLYFA): a forja de nomes em Sylvarin, o
// idioma fictico do jogo. So o lexico, a juncao fonetica de duas raizes e o
// filtro anti-palavrao. NADA de document/window/Date/random aqui dentro, pra
// ser testado com node:test e ser deterministico. A camada DOM (glyfa.js)
// monta os seletores e pinta o resultado.
//
// O CANON (docs/narrative/lingua/02-lexico-semente.md e 01-fonologia.md do repo
// do jogo, READ-ONLY): 13 raizes-ancora, cada uma com um significado. Um nome
// e raizA + raizB; o significado composto poe a 2a raiz na frente (nucleo final,
// como no portugues): mor- (sombra) + lhin- (voz) = "Morlhin" · "voz-sombra" —
// o par que o lider JA canonizou. Assim tambem "morsylva" (mor+sylva) = "mata-
// sombra". A ordem do NOME e A depois B; a ordem do SIGNIFICADO e B depois A.
//
// ★ A REGRA DE OURO (TST-GLYFA-PALAVRAO): o vocabulario e FECHADO e pequeno, e e
// exatamente isso que torna o UGC seguro com crianca e dev solo — moderacao POR
// DESIGN. NENHUMA combinacao pode gerar palavrao (pt-br OU ingles). Como o
// espaco e pequeno, da pra forca-bruta: o teste varre TODAS as combinacoes e
// verifica contra a lista PROIBIDOS (substring, sem acento). A forja combina
// duas raizes DISTINTAS (a unica combinacao que gerava algo improprio era a
// raiz consigo mesma — glyfa+glyfa -> "Glyfaglyfa", que contem o insulto ingles
// "fag"; exigir raizes distintas remove esse caso sem cortar nenhuma raiz canon).
//
// UMD leve: a stack e no-build e o Firefox do lider abre por file://, entao ES
// module (export/import) quebra por CORS. Isto expoe window.GlyfaCore via
// <script src> E module.exports pro node:test. NUNCA virar ESM.
"use strict";
(function (root, factory) {
  var Core = factory();
  if (typeof module !== "undefined" && module.exports) {
    module.exports = Core;
  }
  if (typeof window !== "undefined") {
    window.GlyfaCore = Core;
  }
})(this, function () {

  // ── O LEXICO: as 13 raizes-ancora canon do Sylvarin ────────────────────────
  // stem  = a forma nua usada na juncao (a raiz sem o hifen de dicionario).
  // raiz  = a forma de dicionario, so pra exibir ("mor-").
  // pt/en = o glossario CURTO de UMA palavra (o composto le melhor com glosas de
  //         uma palavra). Fonte: 02-lexico-semente.md. Onde a glosa canon tinha
  //         varias palavras, peguei a mais concreta; "lhin- = voz" segue o
  //         exemplo canonico Morlhin do lider ("voz-sombra").
  var RAIZES = [
    { stem: "sylva", raiz: "sylva-", pt: "mata",     en: "forest" },
    { stem: "vyr",   raiz: "vyr-",   pt: "fogo",     en: "fire"   },
    { stem: "tavus", raiz: "tavus-", pt: "pulso",    en: "pulse"  },
    { stem: "nenh",  raiz: "nenh-",  pt: "agua",     en: "water"  },
    { stem: "ondh",  raiz: "ondh-",  pt: "pedra",    en: "stone"  },
    { stem: "cale",  raiz: "cale-",  pt: "luz",      en: "light"  },
    { stem: "mor",   raiz: "mor-",   pt: "sombra",   en: "shadow" },
    { stem: "rime",  raiz: "rime-",  pt: "numero",   en: "number" },
    { stem: "glyfa", raiz: "glyfa-", pt: "glifo",    en: "glyph"  },
    { stem: "elen",  raiz: "elen-",  pt: "estrela",  en: "star"   },
    { stem: "eryn",  raiz: "eryn-",  pt: "bosque",   en: "grove"  },
    { stem: "lhin",  raiz: "lhin-",  pt: "voz",      en: "voice"  },
    { stem: "anh",   raiz: "anh-",   pt: "tempo",    en: "time"   },
  ];

  // ── OS SUFIXOS canon (raiz + sufixo, so pra ampliar a varredura do teste) ───
  // A forja da UI e raiz+raiz; mas TST-GLYFA-PALAVRAO tambem varre raiz+sufixo.
  // Regras de derivacao de 02-lexico-semente.md (sem a mutacao consonantal do
  // plural, que so muda a 1a letra e nao cria palavra nova de risco).
  var SUFIXOS = ["a", "an", "in", "en", "e", "esse", "i", "rim"];

  // ── A LISTA DE PROIBIDOS: palavroes e ofensas pt-br + ingles ────────────────
  // Casado como SUBSTRING (sem acento, minusculo). O objetivo e a SEGURANCA da
  // crianca: e melhor a raiz cair do que um nome improprio passar. Se um dia uma
  // raiz nova colidir, ela cai daqui — nunca se afrouxa a lista.
  var PROIBIDOS = [
    // pt-br
    "caralho", "carai", "porra", "merda", "bosta", "puta", "puto", "putaria",
    "buceta", "boceta", "xoxota", "xereca", "ppk", "piroca", "pica", "rola",
    "cacete", "punheta", "siririca", "corno", "chifrudo", "viado", "viadinho",
    "bicha", "boiola", "traveco", "sapatao", "cu", "cuzao", "cuzinho", "fdp",
    "otario", "babaca", "escroto", "arrombado", "vagabunda", "vagabundo",
    "piranha", "biscate", "safado", "safada", "tarado", "pau", "pinto", "saco",
    "peido", "cocô", "coco", "xixi", "estupro", "estuprar", "nazista", "racista",
    // ingles
    "fuck", "shit", "bitch", "cunt", "twat", "dick", "cock", "pussy", "slut",
    "whore", "bastard", "asshole", "ass", "arse", "damn", "hell", "piss",
    "crap", "wank", "boob", "tit", "penis", "vagina", "anus", "anal", "sex",
    "cum", "jizz", "fag", "faggot", "dyke", "queer", "nigger", "nigga", "spic",
    "chink", "kike", "retard", "nazi", "rape", "rapist", "hoe", "gay",
  ];

  var VOGAIS = "aeiou";

  // ── normalizar: minuscula + sem acento, pros dois lados do casamento ────────
  function normalizar(s) {
    return String(s).toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
  }

  // ── juntar: a juncao fonetica de dois radicais nus ──────────────────────────
  // Concatena stemA + stemB e capitaliza a inicial. Regra eufonica minima: se a
  // juntura encosta a MESMA vogal (ex.: glyfa+anh -> glyfaanh), colapsa as duas
  // em uma (glyfanh) — o Sylvarin prefere silaba aberta e nao repete vogal na
  // costura (01-fonologia.md). Consoante+consoante (mor+lhin) nao muda: Morlhin.
  function juntar(a, b) {
    a = String(a).toLowerCase();
    b = String(b).toLowerCase();
    if (a.length && b.length) {
      var ultimo = a.charAt(a.length - 1);
      var primeiro = b.charAt(0);
      if (ultimo === primeiro && VOGAIS.indexOf(ultimo) >= 0) {
        b = b.slice(1);
      }
    }
    var nome = a + b;
    return nome.charAt(0).toUpperCase() + nome.slice(1);
  }

  // ── ehProibido: o nome bate em algum termo da lista (por substring)? ────────
  function ehProibido(nome) {
    var n = normalizar(nome);
    for (var i = 0; i < PROIBIDOS.length; i++) {
      if (n.indexOf(normalizar(PROIBIDOS[i])) >= 0) return true;
    }
    return false;
  }

  function porStem(stem) {
    var s = String(stem).toLowerCase();
    for (var i = 0; i < RAIZES.length; i++) {
      if (RAIZES[i].stem === s) return RAIZES[i];
    }
    return null;
  }

  // ── forjar: o coracao da forja. Duas raizes -> nome + significado composto ──
  // Aceita o stem ("mor") ou o objeto-raiz. Exige raizes DISTINTAS e validas;
  // devolve null se alguma nao existe ou se sao iguais (a UI trata o null). O
  // significado poe a 2a raiz na frente (nucleo final): forjar(mor, lhin) ->
  // "Morlhin" · "voz-sombra".
  function forjar(a, b) {
    var ra = typeof a === "object" && a ? a : porStem(a);
    var rb = typeof b === "object" && b ? b : porStem(b);
    if (!ra || !rb) return null;
    if (ra.stem === rb.stem) return null;
    return {
      nome: juntar(ra.stem, rb.stem),
      significado_pt: rb.pt + "-" + ra.pt,
      significado_en: rb.en + "-" + ra.en,
      raizes: [ra.stem, rb.stem],
    };
  }

  // ── todosOsNomes: TODO o espaco que a forja pode gerar (pra o teste varrer) ─
  // raiz+raiz distintas (ordenadas: A,B != B,A, ambas contam) + raiz+sufixo.
  // Retorna a lista de nomes gerados, ja capitalizados.
  function todosOsNomes() {
    var nomes = [];
    for (var i = 0; i < RAIZES.length; i++) {
      for (var j = 0; j < RAIZES.length; j++) {
        if (i === j) continue;
        nomes.push(juntar(RAIZES[i].stem, RAIZES[j].stem));
      }
      for (var k = 0; k < SUFIXOS.length; k++) {
        nomes.push(juntar(RAIZES[i].stem, SUFIXOS[k]));
      }
    }
    return nomes;
  }

  return {
    RAIZES: RAIZES,
    SUFIXOS: SUFIXOS,
    PROIBIDOS: PROIBIDOS,
    normalizar: normalizar,
    juntar: juntar,
    ehProibido: ehProibido,
    porStem: porStem,
    forjar: forjar,
    todosOsNomes: todosOsNomes,
  };
});
