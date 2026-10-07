# Pesquisa de stack e bibliotecas para produzir a Glyfesse (site_gusworld)

Autor: Caetano (CTO). Data: 07/10/2026. Natureza: pesquisa e recomendação. **Nada aqui está decidido**: toda escolha é do líder (L-03 do site, L-01 global), e a recomendada vem primeiro.

Ordem que abriu esta pesquisa (verbatim do líder): *"Pode procurar por outros stacks / libs para ajudar a facilitar a produzir esta edicao e daqui por diante, como vue, typescipt etc. Só lembando que o hostinger não aceita node.js no meu plano."*

**Sobre o canon.** O `docs/adr/ADR-001-stack-php-includes.md` (aceito pelo líder em 17/07/2026) escolheu PHP com includes, servido dinâmico, e **rejeitou** dois caminhos: gerador estático local e framework PHP com Composer. A memória `project_d_stack` registra "publicar = flip de dado, zero build" e "zero terceiro por padrão". A ordem de hoje é o que reabre a pergunta; **este documento não revoga nem declara obsoleta nenhuma dessas decisões** (L-18 do site, L-67 global). Onde uma opção esbarra nelas, isso está dito na linha da opção.

---

## 1. O que a hospedagem aceita (duas evidências, nomeadas)

| Fato | Fonte oficial | Medido nesta máquina em 07/10/2026 |
|---|---|---|
| Premium não roda Node | Tabela de limites: Premium, "Node.js websites: Not available" ([6976044](https://www.hostinger.com/support/6976044-parameters-and-limits-of-hosting-plans-in-hostinger/)); Node só em Business e Cloud ([1583661](https://www.hostinger.com/support/1583661-is-node-js-supported-at-hostinger/), [Node web app](https://www.hostinger.com/support/how-to-deploy-a-nodejs-website-in-hostinger)) | `ssh hostinger`: `node` e `npm` ausentes no PATH |
| Versão de PHP | hPanel oferece 8.2 a 8.5 ([1575755](https://www.hostinger.com/support/1575755-how-to-change-the-php-version-of-your-hostinger-hosting-plan/)) | Produção serve **PHP 8.3.33** (cabeçalho `x-powered-by` de `gusworld.site/pt/` e `php -v` por SSH); o servidor tem `php84` e `php85` instalados em `/opt/alt` |
| SSH no Premium | A tabela oficial não lista SSH; artigo de terceiros diz "jailed SSH no Premium e acima" ([temperstack](https://www.temperstack.com/learn/hostinger/configure-ssh-access/)). **Fonte não oficial; a prova é a medição ao lado** | SSH funciona: o `scripts/deploy.sh` já depende dele (rsync), e `git` e `rsync` existem no servidor |
| Node só fora do servidor | O próprio Astro manda **compilar localmente e subir a pasta `dist/`** por FTP ou gerenciador de arquivos para a Hostinger ([Astro, deploy Hostinger](https://docs.astro.build/en/guides/deploy/hostinger/)) | O site já faz isso com teste: `node --test` roda só aqui (L-13: "o no-Node da Hostinger é runtime, não impede teste") |

**Conclusão do ponto central.** Confirmado com fonte e com medição: Node pode existir **na máquina do líder ou num CI**, para testar ou para gerar arquivos, e o resultado sobe por rsync/SSH como hoje. O servidor nunca vê Node.

**Achado colateral (risco real, não opção de stack):** a máquina local roda **PHP 8.5.11** e a produção **8.3.33**. A suíte verde aqui não prova que o código roda lá: qualquer recurso de 8.4 ou 8.5 que entrar passa no teste local e quebra em produção. Decisão do líder. Recomendado: subir o site para 8.5 no hPanel, depois da #6 publicada (casa com o local). Alternativa: manter 8.3 e rodar a suíte também contra 8.3 (pergunta 4 da §7).

---

## 2. Onde está o trabalho mecânico de cada edição (a régua)

O `PIPELINE-EDICAO.md` §0 e §7 dizem que os gates do líder são **escolha deliberada** e não se enxugam. Logo nenhuma ferramenta tira gate; ela só pode tirar **passo mecânico**. Os passos mecânicos que se repetem por edição, medidos na #5:

| # | Passo mecânico | Tamanho na #5 |
|---|---|---|
| M1 | Transcrever à mão cada `docs/content/edicao-N-*.md` (pt e en no mesmo arquivo) para `src/content/edicao-N/{pt,en}/sec-NN.php`, trocando `gus@...$ texto` por `<p class="fala">...`, `// x` por `<p class="pensa">`, `/* x */` por `<p class="pensa longo">`, `###` por `<h3>` | 34 partials; cerca de 10 arquivos-fonte `.md` |
| M2 | Conferir à mão as travas mecânicas de copy: sem ponto final em fala do Gus, sem travessão, limite de 72 caracteres entre `pensa` e `pensa longo`, `&#8224;` na lápide | hoje vive em comentário no topo de cada partial e na S4 |
| M3 | Reescrever moldes estruturais idênticos (lápide sec-07, detonado sec-08, classificados sec-10, pôster sec-13, colofão sec-19) | 5 seções x 2 idiomas |
| M4 | Gerar os dois cards OG 1200x630 | 2 arquivos |
| M5 | Capturar uptime (`scripts/uptime-sessoes.sh`) | 1 comando |
| M6 | Virar `rascunho` para `publicada`, criar o rascunho seguinte, **rodar a suíte inteira**, push | 1 commit |
| M7 | Deploy (`scripts/deploy.sh`, L-11, manual) | 1 comando |
| M8 | Render e QA no Firefox (S8, L-12) | 17 seções x 2 idiomas |

**Achado sobre M6, medido:** não existe comando único que rode os 18 testes de `tests/` (10 `.test.php` e 8 `.test.js`). O `scripts/preci.sh` roda `node --test 'docs/design/mockups/js/**/*.test.js'`, ou seja, os testes dos mockups, **não** os de `tests/`, e não roda nenhum teste PHP. E o `.githooks/pre-push` do projeto não dispara: `git config core.hooksPath` aponta para o global `~/.claude/githooks`. Isso casa com a armadilha registrada na memória de sessão ("publicar apaga o rascunho e a suíte fica vermelha", 27 asserções, aconteceu na #4 e na #5, nas duas vezes por não rodar a suíte antes).

---

## 3. O que o projeto da Unibra usa (lido só para aprender a técnica, L-37)

Projeto: `/home/petrus/IDrive/Documentos/direito/unibra/1o_periodo/interdisciplinar/` (livreto impresso).

- **Stack:** Vite 8.3, Vue 3.5, TypeScript 5.9 em modo estrito (`vue-tsc --noEmit`), Vitest 5 com happy-dom e `@vue/test-utils`, Playwright 1.63 dirigindo o **Chromium do sistema** (`executablePath: '/usr/bin/chromium-browser'`), Paged.js para paginação de impressão, ESLint e Prettier, pandoc com filtros Lua para gerar `.docx`.
- **Técnica que vale aprender:** o conteúdo é **Markdown** (`content/capitulos/cap-NN.md`) com uma **lista fechada de componentes** (`scripts/markdown/listaFechada.ts`: `Lei`, `Julgado`, `Termo`, `Sigla`, `Quadro`...). Um validador lê o `.md` bruto e **reprova a geração com arquivo e linha** quando aparece tag fora da lista, título fora de nível ou cabeçalho incompleto. O redator escreve texto; a marcação vem da regra.
- **Disciplina de máquina:** `node_modules` e saída de build ficam em `/var/tmp/builds/...` (link simbólico), nada pesado na pasta sincronizada.
- **Páginas avulsas** (`dossie`, `mapa_mental`, `cards_estudo`, filosofia, intro ao direito): HTML de arquivo único, CSS e SVG embutidos, JS puro, **zero biblioteca externa** (contagem de `src="http..."` = 0 nas cinco).
- **O que NÃO se importa para o site:** a verificação visual em Chromium. No site, a L-12 exige Firefox (Gecko), e a documentação do Playwright diz que ele "doesn't work with the branded version of Firefox since it relies on patches" ([Playwright, browsers](https://playwright.dev/docs/browsers)).

---

## 4. Tabela de opções

Legenda de ganho: quais passos mecânicos da §2 somem ou encolhem. "Instala" = exige autorização do líder (L-22 do site, L-51 global).

| Opção | Custo de migrar o que existe | Ganho por edição | Risco L-12 (Firefox) | Risco L-13 (lógica testada) | Deploy manual L-11 | Choque com canon |
|---|---|---|---|---|---|---|
| **A. Comando único de testes** (`scripts/testes.sh`: roda os 10 `.php` e os 8 `.js` de `tests/`, imprime encontrados/rodados/falhos, reprova se rodar zero) + `preci.sh` apontando para `tests/` | 1 arquivo novo, 1 editado; zero dependência | M6 vira um comando; fecha a armadilha das 27 asserções | nenhum | **reforça** (a suíte passa a rodar inteira) | inalterado | nenhum. Ativar o hook é decisão do líder |
| **B. Conversor md para partial, próprio, em PHP** (CLI na máquina do líder; dialeto fechado da revista; validador com arquivo e linha, técnica aprendida da Unibra; partials gerados são commitados) | 3 a 4 arquivos (núcleo puro, CLI, teste, fixtures); zero dependência; edições 1 a 5 **não** são migradas | M1 some nas seções de prosa (cerca de 10 de 17); M2 vira erro automático em vez de conferência manual | nenhum se a saída for idêntica (ver prova na §5) | núcleo puro com TDD no harness PHP que já existe | inalterado: publicar continua flip de dado | Nuance do ADR-001: é passo de geração na autoria, como o `scripts/sync-tokens.sh` já existente. O líder decide se isso é "build" |
| B'. Mesmo conversor via **pandoc 3.7 + filtro Lua** (já instalado aqui) | 2 a 3 arquivos, mas em Lua, linguagem nova no repo e sem harness de teste | igual a B | igual a B | pior: não há harness Lua; testar só pela saída | inalterado | igual a B |
| B''. Conversor com **league/commonmark** (PHP) | Composer entra no repo | igual a B | igual a B | igual a B | inalterado | ADR-001 rejeitou Composer |
| **C. Moldes estruturais como funções PHP** (`componente_lapide()`, detonado, classificado, colofão): seção vira dado, não marcação | 5 a 8 arquivos novos + testes; mexe em `src/includes` | M3 encolhe para preencher dados | **alto se tocar edição publicada**: cada molde alterado pede novo GATE-RENDER; só aplicar da edição nova em diante | funções puras testáveis | inalterado | nenhum (é o PHP de sempre) |
| **D. TypeScript via JSDoc + `tsc --noEmit --checkJs`** | tsc é instalação (npm, só dev); anotações nos 17 `.js` aos poucos; o JS servido **não muda** (continua UMD, abre em `file://`) ([handbook](https://www.typescriptlang.org/docs/handbook/intro-to-js-ts.html)) | **zero passo de edição**; ajuda só quando nasce brinquedo novo | nenhum | neutro a positivo | inalterado | nenhum |
| D'. Testes em `.ts` direto no `node --test` | nenhuma instalação: Node 22.23 local já remove tipos por padrão desde v22.18 ([Node, TypeScript](https://nodejs.org/download/release/v22.18.0/docs/api/typescript.html)) | zero passo de edição | nenhum | neutro | inalterado | nenhum; mas o código servido continua JS |
| D''. TypeScript **compilado** para o navegador (tsc/esbuild) | build obrigatório antes de todo deploy; o JS servido passa a ser artefato | zero passo de edição; acrescenta passo | baixo | neutro | **acrescenta etapa** antes do rsync | colide com "zero build" e com o comentário "NUNCA virar ESM" dos núcleos |
| **E. Firefox automatizado em lote** com o que já existe (`firefox --headless --new-instance --profile --screenshot` sobre o `scripts/preview-edicao.sh`, para pt e en, larguras 390 e desktop) | 1 script; zero instalação | M8 encolhe: prints de todas as seções num comando | **preserva** a L-12 (Gecko de marca) | n/a | inalterado | nenhum |
| E'. Puppeteer 23+ com Firefox do sistema via WebDriver BiDi ([Mozilla](https://hacks.mozilla.org/2024/08/puppeteer-support-for-firefox/), [Chrome dev](https://developer.chrome.com/blog/firefox-support-in-puppeteer-with-webdriver-bidi)) | instalação npm (só dev) + 1 a 2 scripts | igual a E, com clique e rolagem programáveis | preserva | n/a | inalterado | nenhum |
| E''. Playwright (o que a Unibra usa) | instalação + navegador próprio | igual a E | **viola**: não roda Firefox de marca | n/a | inalterado | L-12 |
| **F. CI no GitHub Actions** rodando A (Node e PHP 8.3 no container, casando com produção) | 1 workflow | M6 passa a ser conferido a cada push também fora da máquina | nenhum | **reforça** | inalterado (CI não faz deploy) | nenhum; gêmeo local é o hook (L-56 global) |
| G. Alpine.js self-hosted ([sem build](https://alpinejs.dev/essentials/installation)) | 1 arquivo de terceiro servido | **zero**: as peças interativas já existem e a #6 não tem brinquedo (D6 da pauta) | baixo | **piora**: a lógica migra para atributos no HTML, fora do núcleo puro testável | inalterado | ADR-001 item 6, zero terceiro servido |
| H. Vue 3 sem build (global ou ESM com import map) ([Vue quick start](https://vuejs.org/guide/quick-start)) | terceiro servido; componente `.vue` exige build; ESM não abre em `file://` | **zero** | baixo | piora (mesma razão de G) | inalterado | zero terceiro; "NUNCA virar ESM" |
| I. petite-vue | igual a H | zero | baixo | piora | inalterado | zero terceiro; **projeto inativo**, último release v0.4.1 em jan/2022 ([Snyk](https://snyk.io/advisor/npm-package/petite-vue)) |
| J. Motor de template PHP (Twig, Latte, Plates) | Composer; reescrever 4 templates e 4 includes | marginal: o PHP nativo já é o motor | médio: re-render de tudo | neutro | inalterado | ADR-001 rejeitou framework e Composer |
| **K. Gerador estático** Astro ou Eleventy (Node local) ou Hugo (binário Go, `dnf install hugo`) ([Eleventy](https://en.wikipedia.org/wiki/Eleventy_(software)), [Hugo no Fedora](https://packages.fedoraproject.org/pkgs/hugo/hugo/)) | reescrever `src/` (cerca de 2.800 linhas: banca 524, edição 173, includes, i18n) e os 168 partials das 5 edições, ou congelá-las; refazer os 10 testes PHP. **Não substitui o PHP**: cupom com cookie, `?ed=N` do card, `idade_folha`, 404 do Gus e hreflang servido continuam exigindo PHP, logo vira **dois stacks** | M1 e M3 somem (Markdown e componentes nativos), mas B e C entregam isso sem reescrever | **alto**: todas as 5 edições x 2 idiomas re-renderizadas e re-verificadas no Firefox, com GATE-RENDER novo | depende do porte | **acrescenta** etapa de build antes do rsync; publicar deixa de ser flip | ADR-001 rejeitou esta alternativa por nome |

---

## 5. Recomendação (três caminhos, ordenados)

### Caminho 1, recomendado: esteira de montagem sem trocar a stack (A, depois B, depois E)

1. **A, antes da #6, sem condição.** Não toca conteúdo nem render. Porte: 1 script novo + 1 caminho corrigido no `preci.sh`. Ativar o hook do projeto é decisão do líder (hoje o `core.hooksPath` global o sombreia).
2. **B, antes da montagem (S7) da #6, mas só com prova.** Nenhum partial da #6 existe ainda (só pauta, perguntas da entrevista, a entrada em rascunho no `$edicoes` e o original da tirinha), então o conversor não refaz nada montado. Ele entra no lugar das 34 transcrições que a #6 vai exigir, e o texto continua sendo escrito em `.md` como hoje, pelos mesmos gates S1 a S6. Porte: 3 a 4 arquivos, zero dependência, zero instalação.
   - **Critério de aceite, fixado antes de existir resultado (L-43 global):** o conversor regenera os partials de prosa da #5 a partir dos `.md` dela e o resultado bate **byte a byte, em pt e em en**, depois de descartar o bloco `<?php /* ... */ ?>` de notas de produção e normalizar espaço em branco. Dois lados, duas evidências. Falhou: fica para depois da #6, e a #6 é transcrita à mão como sempre.
   - **Armadilha prevista:** os `.md` da #5 dizem "rascunho v1". Se algum partial foi corrigido depois do gate sem a correção voltar ao `.md`, o diff reprova, e isso **não** é defeito do conversor: é prova de que hoje o `.md` não é a fonte de verdade. Isso vira pergunta ao líder (ver as perguntas).
   - **Ganho além da digitação:** as travas M2 deixam de ser conferência e passam a reprovar a geração com arquivo e linha (técnica da lista fechada da Unibra, reescrita do zero, L-37).
   - Seções de molde e de layout livre (lápide, detonado, classificados, tirinha, pôster, brinde, programação com CRT, bus, colofão) continuam escritas à mão nesta fase: o conversor aceita HTML cru passando direto, como o Markdown padrão.
3. **E, junto com B ou logo depois.** 1 script, zero instalação, Firefox de marca. Gera os prints de todas as seções em pt e en para o `qa-engineer`, que continua sendo quem olha (L-06 do site).

Porte total do Caminho 1: **5 a 6 arquivos novos, 1 editado, 3 etapas, nenhuma instalação, nenhuma mudança no que o servidor executa, nenhum GATE-RENDER novo em edição publicada.**

### Caminho 2, depois da #6: moldes e qualidade de código (C, F, D, E')

- C para os moldes estruturais, só da #7 em diante (não re-renderiza edição publicada).
- F, CI com PHP 8.3 (ou 8.5, conforme a decisão sobre a versão) e Node, rodando o comando de A.
- D (JSDoc + `tsc --noEmit`) quando nascer o próximo brinquedo; não antes, porque não tira passo de edição.
- E' só se E se mostrar curto (clique e rolagem programados).

Porte: 8 a 12 arquivos, 1 a 2 instalações só de desenvolvimento (tsc, puppeteer), cada uma com autorização.

### Caminho 3, não recomendado agora: gerador estático híbrido (K)

Só faz sentido se o líder quiser reabrir o ADR-001 por inteiro. Porte: reescrever cerca de 2.800 linhas de `src/`, decidir o destino de 168 partials publicados, refazer 10 testes PHP, manter o PHP para cupom, `?ed=N`, envelhecimento e 404, acrescentar etapa de build ao deploy, e re-verificar as 5 edições x 2 idiomas no Firefox com GATE-RENDER novo. O que ele ganharia por edição (Markdown e componentes), B e C entregam sem reescrever.

### Vue, Alpine, petite-vue, TypeScript compilado

Ficam fora pelo canon, não por gosto: servem terceiro no runtime (ADR-001 item 6), tiram a lógica do núcleo puro que a L-13 testa, e o ESM não abre em `file://` (o comentário dos núcleos manda "NUNCA virar ESM"). E o ganho por edição é zero: o custo recorrente da revista é conteúdo, não interatividade.

---

## 6. Antes ou depois da #6

- **Antes:** A (sem condição) e B (com a prova byte a byte da §5). Nenhum dos dois cria gate novo para o líder; o gargalo da #6 é o tempo de gate dele, e B tira trabalho de agente, não acrescenta trabalho dele.
- **Depois:** C, D, F, E' e qualquer decisão de porte do ADR-001 (K). Tudo isso dispara re-render ou instalação.
- Se o líder preferir risco zero na #6: só A antes, e B entra depois, testado na #7.

---

## 7. Perguntas de decisão ao líder (uma por vez, recomendada primeiro)

1. O `.md` de `docs/content/` passa a ser a fonte de verdade, e toda correção de copy depois do gate volta para ele? Recomendo sim (é condição para o conversor valer).
2. Construir o conversor md para partial agora e usá-lo na #6 só se ele reproduzir a #5 byte a byte em pt e en? Recomendo sim.
3. Criar o comando único que roda os 18 testes de `tests/` e corrigir o `preci.sh` antes da #6? Recomendo sim.
4. Subir o PHP do site para 8.5 no hPanel, para casar com a máquina local, em vez de testar contra 8.3? Recomendo sim, depois da #6 publicada.
5. Vue, Alpine e petite-vue ficam fora pela regra de zero terceiro do ADR-001? Recomendo sim.

---

## 8. Fontes

- Hostinger, limites por plano: https://www.hostinger.com/support/6976044-parameters-and-limits-of-hosting-plans-in-hostinger/
- Hostinger, Node só em Business e Cloud: https://www.hostinger.com/support/1583661-is-node-js-supported-at-hostinger/
- Hostinger, Node web app: https://www.hostinger.com/support/how-to-deploy-a-nodejs-website-in-hostinger
- Hostinger, versão de PHP (8.2 a 8.5): https://www.hostinger.com/support/1575755-how-to-change-the-php-version-of-your-hostinger-hosting-plan/
- SSH em planos compartilhados (fonte de terceiro): https://www.temperstack.com/learn/hostinger/configure-ssh-access/
- Astro, deploy na Hostinger (build local, sobe `dist/`): https://docs.astro.build/en/guides/deploy/hostinger/
- Eleventy: https://en.wikipedia.org/wiki/Eleventy_(software)
- Hugo no Fedora: https://packages.fedoraproject.org/pkgs/hugo/hugo/
- Vue sem build: https://vuejs.org/guide/quick-start
- Alpine.js, instalação: https://alpinejs.dev/essentials/installation
- petite-vue, estado de manutenção: https://snyk.io/advisor/npm-package/petite-vue
- TypeScript em projeto JS (JSDoc, checkJs): https://www.typescriptlang.org/docs/handbook/intro-to-js-ts.html
- Node, remoção de tipos por padrão: https://nodejs.org/download/release/v22.18.0/docs/api/typescript.html
- Playwright e o Firefox de marca: https://playwright.dev/docs/browsers
- Puppeteer com Firefox via WebDriver BiDi: https://hacks.mozilla.org/2024/08/puppeteer-support-for-firefox/ e https://developer.chrome.com/blog/firefox-support-in-puppeteer-with-webdriver-bidi
- league/commonmark (referência da alternativa B''): https://commonmark.thephpleague.com/2.x/extensions/attributes/

Medições locais e remotas (07/10/2026): `ssh hostinger 'php -v; command -v node npm git rsync'`; `curl -sI https://gusworld.site/pt/`; `php --version` (8.5.11); `node --version` (v22.23.1); `pandoc --version` (3.7.0.2); `firefox --version` (157.0); `git config --get core.hooksPath` (global); leitura de `scripts/preci.sh`, `scripts/deploy.sh`, `src/lib/*.php`, `src/content/edicao-5/*`, `docs/content/edicao-5-*.md`, `data/edicoes.php`, `docs/adr/ADR-001-stack-php-includes.md`, e do projeto da Unibra (só leitura).

---

## Decisões do líder (07/10/2026 16:09:12, por AskUserQuestion)

- **Conversor:** "Sim, construir agora". É um conversor próprio em PHP do texto aprovado (`docs/content`) para as páginas pt e en. Só vale na #6 se reproduzir a #5 idêntica; se não reproduzir, a #6 sai no processo de hoje.
- **Fonte única:** "Sim, fonte única". O texto em `docs/content` é a fonte, e toda correção volta para ele.
- **Testes:** "Sim, antes da #6". Um comando único roda todos os testes de `tests/` antes de publicar.
- **Resto:** "Sim aos dois". Vue, Alpine e petite-vue ficam fora, e o servidor sobe para o PHP 8.5 depois da #6.
