# CLAUDE.md: site_gusworld

O site do jogo **GusWorld**: a revista retrô **Glyfesse**, que conta o progresso do jogo (build-in-public). Stack HTML5 + PHP + JS mínimo, Hostinger Premium (sem Node). Leia o repo do jogo, sem escrever nele (L-00).

Leia as decisões, o conceito e o contexto nas **memórias tipadas** em `~/.claude/projects/-home-petrus-...-site-gusworld/memory/` (índice `MEMORY.md`, autocarregado), começando por `project_site_escopo.md`.

## Leis: leia `GODS_LAWS.md` antes de agir

Siga as ordens expressas do líder em [`GODS_LAWS.md`](GODS_LAWS.md), que vencem este arquivo, os manuais e qualquer preferência sua. Antes do primeiro comando de cada tarefa, varra o índice de gatilhos no topo de lá e leia inteira a lei cujo gatilho casa, antes de agir; o protocolo de uso (subagent, relato, lei nova) também mora lá. Não copie para cá leis nem o índice, porque duas cópias da mesma regra divergem e a velha mente.

## Ritual de início de sessão (bus git de comunicação)

No **início de cada sessão** (integração `reference-autocomm`):

1. Rode `git -C ~/IDrive/Documentos/projetos_claudebrain/gusworld_ia_autocomm pull`.
2. Leia a inbox `inbox/site/` (mensagens novas do jogo e da lib); depois de ler e agir, faça `git mv` para `archive/`, commit `read: ...` e push.
3. **Use o HOOK, não watcher**, aprovado pelo líder: o `check-inbox-hook.sh site` registrado em `.claude/settings.local.json` (gitignored) como `UserPromptSubmit` + `SessionStart` injeta as mensagens novas a cada interação, de forma determinística. **Não relance o `watch-inbox.sh` de fundo**, porque o harness reciclava o processo e ele morria sem notificar. Se o `.claude/settings.local.json` faltar (clone novo), recrie os 2 hooks (ver `reference-autocomm`).
4. Para **responder**, crie `.md` em `inbox/<destinatário>/` (ex.: `inbox/gusworld/`) e dê push, **sempre com pull antes de enviar**.

Trate o **repo do bus como PRIVADO**, como a fonte mostra (`visibility: PRIVATE`; API anônima dá 404): spoiler, lore e embargo **podem** trafegar nele. Nunca ponha nele **nome de batismo de menor** nem **segredo ou token**, porque essa regra é global e é sobre versionar, não sobre publicidade: repo privado vira público um dia (L-01).

## Pendências

A tabela de pendências e planejamento está em `TODO.md` na raiz (ordenada por execução; coluna Onda marca passos paralelizáveis).
