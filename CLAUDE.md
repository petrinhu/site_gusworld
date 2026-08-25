# CLAUDE.md — site_gusworld

O site do jogo **GusWorld**: a revista retrô **Glyfesse** que conta o progresso do jogo (build-in-public). Stack HTML5 + PHP + JS mínimo, Hostinger Premium (sem Node). Read-only sobre o repo do jogo.

As decisões, o conceito e o contexto vivem nas **memórias tipadas** em `~/.claude/projects/-home-petrus-...-site-gusworld/memory/` (índice `MEMORY.md`, autocarregado). Comece por `project_site_escopo.md`.

## Ritual de início de sessão (bus git de comunicação)

No **início de cada sessão** (integração `reference-autocomm`):

1. `git -C ~/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm pull`
2. Ler a inbox `inbox/site/` (mensagens novas do jogo/lib); depois de ler+agir: `git mv` para `archive/`, commit `read: ...`, push.
3. ★ **Monitor = HOOK, não watcher** (mudou 2026-07-18, aprovado pelo líder): o `check-inbox-hook.sh site` está registrado em `.claude/settings.local.json` (gitignored) como `UserPromptSubmit` + `SessionStart` → injeta as mensagens novas a cada interação, determinístico. **NÃO relançar o `watch-inbox.sh` de fundo** (aposentado — o harness reciclava o processo e ele morria sem notificar). Se o `.claude/settings.local.json` faltar (clone novo), recriar os 2 hooks. Ver `reference-autocomm`.
4. **Responder** = criar `.md` em `inbox/<destinatário>/` (ex.: `inbox/gusworld/`) + push. **Sempre pull antes de enviar.**

✅ **Repo do bus é PRIVADO** — verificado na fonte em 2026-07-17 (`visibility: PRIVATE`; API anônima dá 404). Este doc e o `PROTOCOL.md` do bus diziam **"público"** e estavam **ERRADOS** (corrigidos): eu vinha me auto-limitando à toa e dei um alarme falso de vazamento. **Logo: spoiler/lore/embargo PODEM trafegar no bus.** ⚠️ Mas **nome de batismo de menor** e **segredo/token** seguem proibidos — essa regra é **global e é sobre versionar**, não sobre publicidade (repo privado vira público um dia).

## Pendências

A tabela de pendências e planejamento está em `TODO.md` na raiz (ordenada por execução; coluna Onda marca passos paralelizáveis).

## Regras que não mudam

- **Nunca decidir sozinho** (stack, design, escopo): opções via **AskUserQuestion**, uma por vez, WIP do líder = 1.
- **`Projects/gusworld/` é READ-ONLY** — proibido modificar sem autorização expressa.
- **Push do repo é AUTOMÁTICO** (autorização permanente do líder, 2026-07-16: "não espere por mim"). `git push` ao GitHub salva sem pedir — **desde que a higiene passe**: o nome de batismo do filho (só "Gus Dragon" é permitido) em arquivo/commit BLOQUEIA; segredo/token BLOQUEIA; gitignored fica fora; sem spoiler em mensagem de commit (imutável). ⚠️ **Push de repo ≠ deploy de produção:** `scripts/deploy.sh` (Hostinger) continua **manual e bloqueado** (`D-GO-LIVE`); auto-push nunca vira auto-produção.
- Mockups de design em `docs/design/`, commitados, verificados no **Firefox (Gecko)**. Integração de design: `reference-integracao-design`.
- **★ Avisar o Gus sem ele perguntar (2026-08-24, pedido dele na issue 8 do bus):** o Gus Dragon é
  avisado **sem precisar perguntar** em dois casos: **(a) tudo que for ideia dele** — quando o líder
  aprova, rejeita ou muda —, e **(b) o que for de alta prioridade** desta revista (edição lançada,
  decisão que muda o que ele propôs). A resposta sai por **comentário na issue do bus**, que é o que
  notifica ele sozinho. Isto é comportamento **desta sessão** e não precisa de autorização a cada vez;
  as outras três sessões adotaram o mesmo (`L-31` gusworld, `L-18` mapeditor, `L-37` glintfx). ⚠️ **O
  limite é dito a ele, nunca escondido:** sessão não é serviço rodando — aviso proativo só sai com
  alguém trabalhando no projeto; decisão tomada com tudo fechado chega quando a sessão abre. ⛔ **Não
  prometer aviso instantâneo.** E o `PROTOCOL.md` do bus já obrigava metade disso (*"Resposta 2 —
  AUTOMÁTICA SEMPRE"*): ele não deveria ter precisado pedir.

- **Mini-app interativo = TDD (2026-07-16):** toda peça interativa (quadradinho, scrubber da linha do tempo, PRESS START, cupom, Glyfa, álbum) tem a **lógica pura** — colisão, **hitbox-nos-pés**, interpolação, boot-sequence, mapeamento de tecla — **extraída e coberta por teste unitário** (TDD red→green→refactor). Harness **zero-dep** (`node --test` + `node:assert`), roda em **dev/CI**: o *no-Node do Hostinger é runtime, não impede teste*. ⚠️ **QA visual não prova lógica** (um print não prova o hitbox a 0.6 tile nos pés nem que a colisão bloqueia em vez de sobrepor). Mini-app novo nasce testado. Ver `feedback_tdd_mini_apps` + `feedback_print_antes_de_entregar`.
