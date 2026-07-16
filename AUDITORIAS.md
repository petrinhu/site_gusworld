# AUDITORIAS.md — site_gusworld

> **Status:** v0.1 (2026-07-15). **Parcial por decisão do líder:** cobre só o que **independe de stack**.
> A stack está em aberto (`D-STACK`) — auditoria de código, dependência e infra entram quando ela fechar.
> Manual do projeto. O board é o `TODO.md`; o conceito é `docs/design/conceito.md`.

---

## Invariante de ordem (inviolável)

**Auditoria é downstream de código + teste.** Todo `AUD-*` tem como `Pré-requisito` os itens de implementação **e** os `TST-*` que a antecedem. **Nunca auditar o vácuo.**

---

## `AUD-SPOILER` — a mais crítica deste projeto

**Por quê:** o único ativo narrativo de um RPG é o que ninguém sabe ainda. **Spoiler publicado é irreversível** (indexado, arquivado, printado).

**O que auditar:**

- **Nada de:** o [redigido], o [redigido], a [redigido], o clímax do ato 3, a [redigido], o [redigido]. *(Sterling Locke em si é **seguro**: vilão canônico desde o início, não é twist.)*
- **Regra canônica do jogo: easter egg NUNCA é rotulado em material público.** O elemento pode aparecer; **a palavra que nomeia o sistema, nunca**. Nem densidade, nem percentual.
- **A superfície inclui o que ninguém lembra de checar:**
  - **`alt-text` de imagem** (é texto público).
  - **Mensagem de commit** — e esta é **irreversível de verdade**: mensagem pushada é imutável (reescrever histórico público é anti-pattern vetado). **Nenhuma auditoria posterior remove.** Logo: a **política** de spoiler é upstream do **push**, mesmo que a auditoria seja downstream.
  - **Nome de arquivo** (fica na URL e no repo).
  - **A `KEY-ART`** — **imagem spoila tanto quanto texto**.
  - **O ARG** (`ARG-SYLVARIN`): o enigma esconde algo real. Auditar **o que ele revela** quando resolvido, e se a página secreta está fora do índice.
- **Superfície dobrada** por manter `COPY-LEIGO` **e** `COPY-EXPERT` (decisão do líder, contra a recomendação de 2 lentes).

**Pré-requisito:** `SPOILER-POLICY` (a régua é do líder: são ~365k palavras de deep-lore e só ele sabe o que é reveal) + copy + devlog + key art + páginas.

---

## `AUD-LICENCA` — três regimes convivendo

**O site vai exibir, no mesmo lugar, coisas com licenças opostas:**

| O quê | Licença |
|---|---|
| Código do jogo | **GPLv3** |
| Assets do jogo (arte, música, texto in-game) | **CC-BY-SA 4.0**, atribuição "petrinhu, 2026" |
| Os dois livros | **Todos os direitos reservados** (obra à parte) |
| **O site em si** (design novo, texto novo) | **a declarar — não herda nenhum dos três** |

**O que auditar:**

- **A premissa correta do share-alike** (a formulação anterior estava errada e foi corrigida): **CC-BY-SA 4.0 morde ADAPTAÇÃO, não agregação.** Sprite **intacto** = atribuição + indicar a licença, e **não contamina** o HTML/CSS/copy em volta. O share-alike só pega se o asset for **adaptado** — recorte, recolorização, composição derivada. **Atenção: a key art de landing tende a ser exatamente isso.**
- **Não inflar pelos PDFs élficos.** Os 71 PDFs de terceiros em `resources/livros/elvish/` do repo do jogo estão **gitignored** e nunca foram ao repo público. **Não são superfície deste site.**
- **A ressalva de IA generativa**, que herda do `ASSETS-LICENSE.md` do jogo: os assets de IA (PixelLab, Tripo3D, Suno, Gemini/Grok) só são CC-BY-SA **"na medida em que os ToS cedem titularidade"**. Rastreabilidade por lote em `docs/tech/ai-assets-provenance.md` (no repo do jogo). **A auditoria depende desse arquivo.**
- **Atribuição por asset exibido**, gerada no build sempre que possível.
- **A fonte `PixelOperatorMono` é CC0** — pode ser dada de brinde sem restrição (crédito por cortesia).
- **Envolver `dr-advogado`/CLO** antes de cravar qualquer constraint de licença como fechado.

**Nota:** repo público **sem** `LICENSE` = todos os direitos reservados por default — conservador e reversível. **Não bloqueia o commit inicial; bloqueia espelhar asset de terceiro.**

---

## `AUD-LGPD` — rebaixada por decisão (`ZERO-DADO`)

**Ficou pequena, e é bom que se saiba por quê.**

O líder decidiu: **sem conta, sem login, sem e-mail, sem data de nascimento.** Crédito do ARG por **apelido escolhido**; álbum, voto e dobra em **`localStorage`**. **O site LEMBRA da pessoa sem SABER quem ela é.**

**Morreram:** LGPD art. 14 (proteção de menor), consentimento parental, gov.br, base de dados de compradores/usuários.

**O que SOBRA para auditar, e não é nada:**

- **O vetor real de um site estático é fonte de terceiro**, não banco de dados. **Google Fonts, CDN, analytics, embed de vídeo, botão de rede social: tudo transfere o IP do visitante.** Auditar **cada requisição que sai para outro host**. O critério é **"zero terceiro por padrão"**.
- **O `access_log` do servidor** grava IP de todo visitante por padrão, criança inclusive, sem TTL e sem propósito declarado. **É configuração no painel da Hostinger, não código** — e é provavelmente a maior coleta de dado pessoal que o site teria, sem ninguém pedir.
- **`localStorage` não é tratamento pelo controlador** (fica no cliente), mas confirmar que nada dali viaja.
- **Se `D-ANALYTICS` decidir por analytics:** só cookieless e agregado (Plausible/Umami self-hosted não exigem base legal nem banner). Se entrar, esta auditoria **sobe** de novo.

---

## `AUD-SEO`

- `schema.org/VideoGame` via JSON-LD, correto e verdadeiro (**não anunciar data que não existe**).
- Open Graph + Twitter Card (o compartilhamento primário é o X, pela conta pessoal do líder).
- `hreflang` recíproco + `x-default`; sitemap; sem conteúdo duplicado entre idiomas.
- **`D-NOME-SERP`**: verificar se "GusWorld" colide na SERP. **Custa minutos e pode invalidar o canal de indexação inteiro.**

---

## `AUD-IA` (proposta) — a auditoria que este projeto precisa e ninguém pediu

**Contexto:** o clima contra IA generativa em jogos está em ~85% negativo, e o projeto usa PixelLab (pixel art gerada por IA). **O ataque vem.**

**O que auditar antes de ir ao ar:**

- **A defesa por LICENÇA está dita e verificável?** GPLv3 + CC-BY-SA + freeware para sempre + zero lucro **fecha o circuito econômico da acusação** (não há artista deslocado de contrato pago, não há lucro, os assets voltam ao commons). **Esta é a defesa que funciona.**
- **A defesa por INTENÇÃO foi removida?** ("eu decido, a IA é ferramenta") — é o que todo mundo alega e ninguém acredita.
- **A defesa por CREDENCIAL foi removida?** Foi ridicularizada publicamente ("estou desempregado e ainda faço meus assets à mão"). **O que fica no lugar é a história** (`conceito.md` §1 e §8): médico, 6:15 às 20h, e a issue #1 do Funplay onde ele **auditou a ferramenta antes de adotar**, achou 2 vulnerabilidades high e fez 3 releases acontecerem. **Isso é fato verificável, não retórica.**
- **O disclosure está seco e no rodapé, nunca na manchete?** *Não existe público que escolha um jogo POR usar IA.* O disclosure protege do downside; nunca é upside.
- **Nada foi negado nem escondido?** **Mentir é ruína documentada** (o Clair Obscur perdeu o GOTY por negar e depois admitir; o vencedor substituto também usou IA e só não mentiu).

---

## O que entra quando a stack fechar (`D-STACK`)

Auditoria de código, dependência/SCA/CVE, secret-scan, hardening de servidor, e — **se e somente se** houver backend — SQLi, autenticação, rate-limit e superfície de ataque.

**Hoje o site não tem backend nem coleta dado, então essa faixa está vazia por decisão, não por esquecimento.**
