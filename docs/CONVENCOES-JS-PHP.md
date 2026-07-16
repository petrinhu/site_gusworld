# Convenções JS / PHP — site_gusworld

> O `CONTRACT.md` canônico do vault é **C++/Qt**; esta nota cobre o vazio para o stack do site (**HTML5 + JS mínimo + PHP**), sem repetir o universal. As seções universais do CONTRACT **valem aqui**: §5 (camadas), §6 (clean code), §8 (segurança), §14 (KISS, YAGNI, Fail-Fast, POLA, imutabilidade, CQS).

## Camadas (CONTRACT §5 aplicado a JS)
- **Lógica pura ≠ DOM.** A lógica de um mini-app (colisão, interpolação, mapeamento de tecla, máquina de estado) vive em **módulo puro** — sem `document`/`window`/`canvas` — **testável em isolamento** por `node --test`. O DOM/canvas/eventos são a **casca impura** que consome o módulo.
- Referência viva: `docs/design/mockups/js/quadradinho-core.js` (puro) ↔ o `<script>` do mock (casca). Todo mini-app novo segue esse padrão (é o que torna a DoD "testes verdes" possível).

## `file://` e Firefox (Gecko)
- Mockups abrem via **`file://`** no Firefox do líder. **ES modules (`import`/`export`) quebram no `file://`** por CORS.
- Use **`<script src>`** que define um **global** (padrão UMD leve: `window.X` no browser, `module.exports` no node). Nunca `type="module"` num mock aberto por `file://`.

## Segurança / privacidade
- **Zero segredo no cliente** — tudo em JS é público; nenhum token/chave.
- **Zero terceiro por padrão** — sem CDN, Google Fonts, analytics ou embed que transfira o IP do visitante (AUD-LGPD). Fonte e asset **self-hosted**.
- **Valide toda entrada externa** no ponto de entrada (Fail-Fast, CONTRACT §14.3); não confie em `localStorage`, querystring, nem resposta de fetch.

## Qualidade (CONTRACT §6)
- Função **≤ 40 linhas**, **≤ 4 params**, **≤ 3 níveis** de aninhamento; **guard clauses** (return cedo).
- Nomes revelam intenção; boolean com `is`/`has`/`can`; **constante nomeada** em vez de número mágico.
- **DRY regra-de-três** — não abstraia antes da 3ª ocorrência real.
- Comente o **porquê**, nunca o quê.

## PHP (quando/se entrar — stack não decidida, `D-STACK`)
- **Prepared statements** para TODA query (nunca concatenar) — CONTRACT §8 / OWASP A03.
- **Escapar toda saída** (XSS); **validar + allowlist** toda entrada.
- Segredo em variável de ambiente / storage seguro — **nunca** no código.
- Detalhe fica para o `D-STACK`. Hoje o site é estático + JS, **sem backend** (`ZERO-DADO`).
