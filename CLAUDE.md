# CLAUDE.md — site_gusworld

O site do jogo **GusWorld**: a revista retrô **Glyfesse** que conta o progresso do jogo (build-in-public). Stack HTML5 + PHP + JS mínimo, Hostinger Premium (sem Node). Read-only sobre o repo do jogo.

As decisões, o conceito e o contexto vivem nas **memórias tipadas** em `~/.claude/projects/-home-petrus-...-site-gusworld/memory/` (índice `MEMORY.md`, autocarregado). Comece por `project_site_escopo.md`.

## LEIS CANÔNICAS: leia `GODS_LAWS.md` ANTES de agir

**[`GODS_LAWS.md`](GODS_LAWS.md) contém as ordens expressas do líder e tem precedência sobre este arquivo, sobre os manuais e sobre qualquer preferência sua.** Ele não existe para ser declarado, existe para ser **usado no momento da ação**.

**Como usar, sem exceção:**

1. Antes do primeiro comando de qualquer tarefa, confira se um dos gatilhos casa com o que você vai fazer. Casou: **abra `GODS_LAWS.md` e leia a lei inteira antes de agir**, não depois.
2. Ao despachar subagent, **cole no prompt da task** o texto das leis cujo gatilho casa com ela, mais o caminho absoluto de `GODS_LAWS.md`. Subagent não herda este contexto.
3. Ao relatar ao líder, diga qual lei aplicou e como.
4. Ordem nova do líder entra em `GODS_LAWS.md` **no instante em que ele a dá**, com data e o texto dele verbatim.
5. Agente nenhum revoga, flexibiliza ou reinterpreta lei. Só o líder.

**Os gatilhos vivem no índice do próprio `GODS_LAWS.md`**, na tabela "Índice de gatilhos" no topo do arquivo, com uma linha por lei. Não há cópia deles aqui: índice duplicado envelhece em silêncio e passa a mentir sobre quais leis existem.

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

**Viraram lei e moram em [`GODS_LAWS.md`](GODS_LAWS.md).** Não estão repetidas aqui de propósito: duas cópias da mesma regra divergem, e a cópia velha passa a mentir. As que estavam nesta seção são hoje a `L-00` (o repo do jogo é read-only), a `L-01` (nome de menor e segredo nunca), a `L-03` (nunca decidir sozinho), a `L-11` (push automático, deploy manual), a `L-12` (verificar no Gecko), a `L-13` (mini-app nasce testado) e a `L-15` (avisar o Gus sem ele perguntar).

