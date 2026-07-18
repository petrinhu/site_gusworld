# ADR-001: Stack do site — PHP + includes, servido dinâmico

Status: Aceito
Data: 2026-07-17
Decisores: líder supremo (petrus), software-architect
Escopo: o site `gusworld.site` (a revista Glyfesse). Não toca o jogo — o repo do jogo tem a própria trilha de ADRs (`Projects/gusworld/docs/tech/adr/`), read-only aqui.

> Este ADR **registra** uma decisão já tomada pelo líder (memória `project-d-stack`, 2026-07-17); não a reabre. Documenta o porquê, as alternativas descartadas e as consequências aceitas, para que a escolha não precise ser re-litigada mais tarde.

## Contexto

O site é uma revista retrô de conteúdo (build-in-public do jogo) com um requisito de produto **explicitamente dinâmico**: o líder recusou a ideia de "site parado" (*"se for maçante não quero"*). As forças em jogo quando a stack foi decidida:

- **Uma peça exige servidor.** O poll do cupom (`/api/cupom-voto.php`) precisa **persistir voto sem terceiro** (regra `ZERO-DADO`/zero-terceiro: nada de analytics, cookie ou serviço externo). Persistir estado no lado do cliente não conta como poll. Isso, sozinho, **força um runtime no servidor** — não há como ser 100% estático.
- **A hospedagem é Hostinger Premium: PHP + MySQL, SEM Node.** Verificado na conta real via MCP em 2026-07-16 (memórias `infra-hostinger-herdada`, `hostinger-stack`): Node só existe nos planos Business/Cloud. O projeto irmão `site_consultorio` já roda PHP + MariaDB 11.8 em produção na mesma conta — o caminho está provado. **Logo, o runtime de servidor disponível é o PHP.** A pergunta real nunca foi "qual runtime", e sim *quanto* PHP: só o poll, ou também a montagem das páginas.
- **O conteúdo cresce por gotejamento (drip).** As edições são publicadas uma a uma ao longo do tempo. O site nasce com 3 edições e cresce; a arquitetura de informação (`ia-wireframe.md`) exige que **publicar uma edição não re-edite navegação nenhuma**.
- **Volume no lançamento: 12 páginas HTML** (`ia-wireframe.md` §1.3: banca pt/en, 3 edições × pt/en, secreta do ARG bilíngue, 404 pt/en), mais endpoints não-página (1 backend vivo, 2 feeds RSS, `sitemap.xml`, `robots.txt`, ícones, o redirect da raiz). Fórmula de crescimento: **+1 edição publicada = +2 URLs** (pt+en).
- **i18n é estrutural e one-way-door.** Contrato `I18N-CONTRATO-URL` (memória `project-i18n-switch`): dois prefixos simétricos `/pt/` ⇄ `/en/`, `hreflang` recíproco + `x-default`, redirect fixo da raiz — nunca por IP nem `Accept-Language`. O href do par gêmeo é emitido pelo servidor.
- **Zero terceiro por padrão** (`D-ANALYTICS`/`ZERO-DADO`): fontes e assets self-hosted; sem CDN de fonte externa, sem analytics, sem cookie.
- **A revista tem peças interativas e páginas que envelhecem.** Quadradinho jogável, cupom, álbum (`localStorage`), botões de som, bordas que amarelam pela idade real, CRT desligável. Tudo isso precisa **funcionar mesmo sem JS** para o caminho essencial (navegar, ler, trocar de idioma, desligar o CRT).
- **O CDN da Hostinger está no caminho** (o DNS aponta o domínio para `cdn.hstgr.net`). CDN é cache — e o site tem poll ao vivo e páginas data-driven que mudam ao publicar. É preciso decidir o que não pode ser cacheado.

Os 10 insumos que a stack precisa suportar estão consolidados em `ia-wireframe.md` §4.

## Decisão

**PHP + includes, servido dinâmico; HTML5 é a saída, PHP é a cola.** Item a item:

1. **Páginas montadas por PHP** a partir de uma **fonte única `$edicoes`** (array/dado: data, frame, legenda, estado, idioma). Includes para masthead/índice/nav/rodapé; `foreach $edicoes` na banca, na linha do tempo, no `sitemap.xml` e nos feeds.
2. **Publicar = trocar `rascunho` → `publicada` no `$edicoes`.** Zero HTML tocado, **zero build**. Casa com o drip: o único trabalho manual ao publicar a edição N é o conteúdo dela (que é conteúdo, não arquitetura); banca, linha do tempo, sitemap e RSS crescem sozinhos pelo mesmo `foreach`.
3. **Poll do cupom, 2 feeds RSS (um por idioma) e `sitemap.xml`** gerados em PHP a partir do mesmo `$edicoes`. O poll (`/api/cupom-voto.php`, POST) é o **único backend vivo**.
4. **CDN da Hostinger com purge-on-publish.** O que nasce de `$edicoes` (banca, linha do tempo, sitemap, RSS) compartilha um **único gatilho de invalidação** — o evento "líder publica edição" — e nunca dessincroniza. As edições já publicadas ganham TTL longo (são fixas). O caminho `/api/*` recebe **`Cache-Control: no-store` e bypass total da borda** — nunca passa pelo cache. Detalhe por rota em `ia-wireframe.md` §2.2.
5. **i18n por pastas físicas** `/pt/` e `/en/`; raiz `/` → 301 fixo para `/pt/` (config de servidor, `.htaccess`, **nunca por IP/idioma do navegador**); `hreflang` recíproco + `x-default` emitidos pelo servidor; href do gêmeo gerado no PHP (sem mapeador de URL em JS — 2ª cópia da regra seria código morto).
6. **Zero terceiro por padrão**: fontes e assets servidos do próprio domínio; sem analytics, sem cookie, sem CDN externo.
7. **Cliente (CSS + JS mínimo) é progressive enhancement**: pixel na web (`image-rendering: pixelated` + escala inteira + `steps()`), envelhecimento por idade em CSS, CRT desligável via `:has()`, e as peças interativas (quadradinho, cupom, álbum, som). **O caminho essencial funciona sem JS** — navegação, leitura, troca de idioma e CRT-off nunca dependem de JS. Onde há JS, ele apenas marca o `<html>`; quem anima é o CSS (bug de JS jamais deixa a revista invisível).

**Nota sobre o "sem Node".** O `sem Node` do Hostinger é uma restrição de **runtime de servidor**, não de desenvolvimento. As peças interativas têm a lógica pura **coberta por teste unitário zero-dep** (`node --test` + `node:assert`) rodando em dev/CI (`feedback_tdd_mini_apps`). Testar em Node na máquina de desenvolvimento não conflita com o servidor não ter Node.

## Alternativas consideradas

1. **Gerador estático local (SSG) + PHP só para o poll** — *rejeitada pelo líder.*
   - A favor: HTML puro no servidor, perf máxima, superfície de servidor mínima.
   - Contra (decisivo): build + upload a cada edição publicada é **atrito no drip** que o PHP dinâmico não tem (publicar deixaria de ser um flip de dado). O gerador não poderia ser Node (Hostinger) → seria mais uma peça (PHP/Python) para manter na máquina do líder. E o ganho de perf real é pequeno: o dinâmico já é cacheado pela CDN, então na prática o visitante recebe HTML de borda de qualquer forma. Trocaria um atrito editorial recorrente por um ganho marginal.

2. **Framework PHP (Laravel, Slim ou similar)** — *rejeitada pelo líder.*
   - A favor: roteamento, ORM, ecossistema pronto.
   - Contra (decisivo): **over-engineering** para 12 páginas com um único endpoint de escrita. Arrasta roteador, ORM, Composer e uma superfície de manutenção/segurança que um site de conteúdo com 1 poll não precisa. Anti-pattern clássico (resume-driven / premature abstraction): resolver problemas que o projeto não tem.

**Escolhida: PHP + includes, sem framework, servido dinâmico** — o meio-termo que atende o requisito dinâmico (poll ao vivo, página que envelhece) e o drip (publicar = flip de dado) com a menor superfície possível: exatamente o PHP que já entra obrigatoriamente por causa do poll, esticado para montar as páginas.

## Consequências

**Positivas:**
- **Publicar é um flip de dado, zero build** (`rascunho` → `publicada`). Nenhuma etapa de compilação/upload entre escrever e publicar.
- **A arquitetura de informação é estável sob o crescimento**: +1 edição = +2 URLs, e banca/linha do tempo/sitemap/RSS crescem por `foreach` — nenhuma navegação global é re-editada.
- **Superfície mínima**: sem framework, sem ORM, sem Composer; só PHP + includes + um endpoint. Menos código para manter, menos para auditar.
- **Provado na mesma conta**: o `site_consultorio` já roda PHP + MariaDB na Hostinger em produção; SSH/deploy/DNS/MySQL já resolvidos (fonte canônica herdada).
- **Zero dependência de terceiro** em runtime — coerente com `ZERO-DADO` e com a soberania de dado do líder.
- **Resiliência de cliente**: o caminho essencial funciona sem JS; falha de JS degrada enfeite, nunca conteúdo.

**Negativas / aceitas como custo:**
- **PHP no servidor = superfície de segurança viva.** O poll aceita input (POST) e persiste — exige **prepared statements / parâmetros ligados** (proteção contra SQLi), validação de input na borda e rate-limiting/hardening. É a peça que a trilha de testes/auditorias stack-dependentes (`TESTES.md`/`AUDITORIAS.md`, antes "parciais, stack em aberto") passa a cobrir: SQLi no poll, CVE/SCA das dependências, hardening de servidor.
- **O CDN pode cachear o que é dinâmico.** Mitigado, não eliminado: `no-store` + bypass de `/api/*` e purge-on-publish para tudo que nasce de `$edicoes`. **Risco operacional**: se alguém esquecer o purge ao publicar, a banca/RSS servem conteúdo velho da borda. A mitigação precisa estar **automatizada no evento de publicar**, não depender de memória humana.
- **Sem build = sem etapa natural para minificação/versionamento de asset.** Aceitável no volume atual; assets `.js`/`.css` recebem TTL longo e são versionáveis por querystring/nome quando precisar.

**Riscos / pontos de atenção:**
- **Purge-on-publish é o ponto único de falha da consistência.** Tornar o purge parte do mesmo ato de publicar (não um passo manual separado).
- **Hardening do poll é pré-requisito de go-live**, não item pós-lançamento — é a única superfície de escrita exposta.
- **O `$edicoes` como fonte única é também um ponto único**: um erro de estado ali afeta banca + linha do tempo + sitemap + RSS de uma vez. Contrapartida do benefício (nunca dessincronizam): validar o array ao publicar.

## Reversibilidade

**Two-way door.** A escolha é reversível a custo moderado: PHP + includes sem framework não cria lock-in (nada de ORM/roteador proprietário para desfazer). Se um dia o requisito mudar, migrar para um gerador estático (mantendo o poll em PHP) ou introduzir um framework é possível sem jogar conteúdo fora — o `$edicoes` é dado portável e as páginas são HTML5 na saída. As decisões *dentro* desta que são one-way-door não são de stack, e sim de **URL** (`I18N-CONTRATO-URL`: os prefixos simétricos `/pt/` ⇄ `/en/` foram escolhidos justamente por nunca obrigarem a mover permalink de novo) — essas estão fixadas em `project-i18n-switch`. Não há release em produção do site 1.0 ainda (o que está no ar é a página "em breve", `noindex`), então reverter agora não quebra permalink público.

## Referências

- Memória `project-d-stack` — a decisão canônica do líder (2026-07-17). Não duplicada aqui.
- Memória `project-i18n-switch` — o contrato de i18n e URL (`I18N-CONTRATO-URL`).
- Memórias `infra-hostinger-herdada` e `hostinger-stack` — Hostinger Premium (PHP + MySQL, sem Node), CDN no caminho, deploy herdado do `site_consultorio`.
- `docs/ia-wireframe.md` — §4 (os 10 insumos que a stack precisa suportar), §2.1 (mapa estático × dinâmico), §2.2 (cache/CDN por rota), §1.3 (a contagem de 12 páginas e a fórmula de crescimento).
- CLAUDE.md do site — regra do mini-app interativo = TDD zero-dep; separação push ≠ deploy (`D-GO-LIVE` bloqueado).
- Formato herdado dos 16 ADRs do jogo (`Projects/gusworld/docs/tech/adr/`, read-only) — estrutura Nygard (Contexto / Decisão / Consequências / Reversibilidade).
