# Definition of Done — site_gusworld

> Baseada em **AGILE.md §3.3** + a régua do líder + o gate de QA do projeto.
> Board: `TODO.md`. Testes: `TESTES.md`. Auditorias: `AUDITORIAS.md`. Convenções de código: `docs/CONVENCOES-JS-PHP.md`.

Uma **peça** (página, seção, mini-app, ou mock que vira produção) só está **PRONTA** quando todos os itens abaixo passam. Na entrega, o `Status` no `TODO.md` vai a **`🔍 Pendente verificação`** — **`✅ Concluído` só depois** da onda `TST-*`/`AUD-*` correspondente (nunca `✅` direto).

- [ ] **Renderiza/carrega sem erro** (build/abertura ok; console limpo).
- [ ] **Lógica interativa testada.** Se a peça tem lógica (colisão, hitbox, scrubber, boot-sequence, cupom, Glyfa, álbum): **testes unitários da lógica pura verdes** (TDD, `node --test`). ⚠️ **QA visual NÃO substitui teste de lógica** — um print não prova o hitbox a 0.6 tile nos pés.
- [ ] **QA visual independente.** O `qa-engineer` (≠ implementer, ≠ orquestrador, ≠ líder) tirou o print headless e conferiu contra o checklist — **pass**. O orquestrador re-confere o relatório do QA. O líder **não é** o QA.
- [ ] **Acessibilidade** (ver `TESTES.md` → TST-A11Y): contraste **AA** (≥4.5:1 texto normal; ≥3:1 grande); `prefers-reduced-motion` continua fazendo sentido; teclado alcança tudo com foco visível; pixel só em display/título; sem flash em frequência perigosa.
- [ ] **Tokens, não hex solto.** Usa `docs/design/tokens.css` para cor/tipo/espaçamento — sem valor hardcoded no código (CONTRACT §7.4).
- [ ] **Zero terceiro por padrão** (sem CDN/Google Fonts/analytics/embed que vaze o IP do visitante — AUD-LGPD) e **zero segredo** (CONTRACT §8).
- [ ] **Sem spoiler e sem nome de menor** (só "Gus"/"Gus Dragon") em arquivo, `alt-text`, nome-de-arquivo **ou mensagem de commit** (imutável, irreversível — ver AUD-SPOILER).
- [ ] **Commit Conventional Commits** citando o **ID do item** do `TODO.md` (frescor: o hook `todo_sync` depende do ID na mensagem).
- [ ] **`scripts/preci.sh` passa** (testes + higiene) antes do push.

---

### Fora do escopo desta DoD (por decisão, não esquecimento)
- Testes/auditorias travados por stack (SQLi, CVE/SCA, CI, carga, SAST) → entram no **`D-STACK`**. Hoje o site é estático + JS mínimo, sem backend (`ZERO-DADO`).
- **SAFe/ART/PI** (AGILE §15-21) **não se aplica** — projeto solo; seria "cerimônia parasitária" (AGILE §15.2). O que se usa da AGILE aqui: DoD, INVEST, WSJF/ondas (via a skill `/tab_pendencias`).
