# CLAUDE.md — site_gusworld

O site do jogo **GusWorld**: a revista retrô **Glyfesse** que conta o progresso do jogo (build-in-public). Stack HTML5 + PHP + JS mínimo, Hostinger Premium (sem Node). Read-only sobre o repo do jogo.

As decisões, o conceito e o contexto vivem nas **memórias tipadas** em `~/.claude/projects/-home-petrus-...-site-gusworld/memory/` (índice `MEMORY.md`, autocarregado). Comece por `project_site_escopo.md`.

## Ritual de início de sessão (bus git de comunicação)

No **início de cada sessão** (integração `reference-autocomm`):

1. `git -C ~/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm pull`
2. Ler a inbox `inbox/site/` (mensagens novas do jogo/lib); depois de ler+agir: `git mv` para `archive/`, commit `read: ...`, push.
3. Ligar o monitor em background: `bash ~/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm/watch-inbox.sh site 300` (re-invoca ao chegar mensagem; ao acordar, ler+arquivar+relançar).
4. **Responder** = criar `.md` em `inbox/<destinatário>/` (ex.: `inbox/gusworld/`) + push. **Sempre pull antes de enviar.**

⚠️ **Repo do bus é PÚBLICO** (`github.com/petrinhu/gusworld_ia_autocomm`): zero dado sensível — nome real de menor nunca, nem segredo/token.

## Pendências

A tabela de pendências e planejamento está em `TODO.md` na raiz (ordenada por execução; coluna Onda marca passos paralelizáveis).

## Regras que não mudam

- **Nunca decidir sozinho** (stack, design, escopo): opções via **AskUserQuestion**, uma por vez, WIP do líder = 1.
- **`Projects/gusworld/` é READ-ONLY** — proibido modificar sem autorização expressa.
- **Push de código** (Codeberg do site, produção) **só com autorização por ocasião**. O push do *bus* é o fluxo autorizado acima.
- Mockups de design em `docs/design/`, commitados, verificados no **Firefox (Gecko)**. Integração de design: `reference-integracao-design`.
