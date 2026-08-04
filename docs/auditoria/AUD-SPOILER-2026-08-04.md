# AUD-SPOILER — auditoria de vazamento · Edição #3 "O Quadrado Azul"

> **Data:** 2026-08-04 · **Auditor:** `internal-auditor` (auditoria interna, read-only)
> **Escopo canônico:** [[AUDITORIAS]] capítulo `AUD-SPOILER` (o manual manda mais que qualquer briefing)
> **Natureza:** **read-only**. Nada foi corrigido, nada foi commitado. Este documento é o entregável.
> **Objeto:** a superfície publicável inteira — HTML servido, CSS, JS, imagens, `alt`/`aria-label`,
> nomes de arquivo, **e o histórico do git (patches + mensagens de commit)**.

⚠️ **AVISO DE PRÉ-VOO:** o `TODO.md` existe na raiz e foi usado como referência (INBOX `D-FIGURAS`,
`ENTREVISTAS-PARTY`, e o item de spoiler de carta registrado em `TODO.md:287`). Nenhum item foi alterado.

---

## 0. Regra metodológica que este dossiê obedece

**Este documento não escreve nenhum termo embargado.** A lista concreta de never-reveal vive em
`docs/editorial/LEVANTAMENTO-HISTORICO.md` §"ITENS DE SPOILER", itens 1 a 4. Escrever os termos aqui
reproduziria o próprio vazamento que a auditoria denuncia (ver 🔴 **S-01**). Onde a evidência exige
apontar um termo, ele é referenciado por **ponteiro** (`arquivo:linha`), nunca transcrito.

Isto está alinhado ao [[AUDITORIAS]], que diz literalmente: *"a lista específica de never-reveal vive na
lore privada do líder, **não é enumerada aqui** (enumerá-la num arquivo público seria o próprio spoiler)"*.

**Auto-verificação:** a primeira redação deste dossiê **falhou nesta própria regra** — a varredura
automática encontrou **14 ocorrências** de termo embargado no meu texto (um nome de carta dentro de um ID
de item, a condição do desfecho oculto, e 4 siglas clínicas transcritas nas tabelas de resultado). Foram
todas removidas e substituídas por descrição neutra. O arquivo foi então re-varrido contra os mesmos 34
termos e contra a `scripts/.name-blocklist`:

| Auto-check | Resultado |
|---|---|
| 34 termos da lista de embargo | **2**, ambos o mesmo termo: o nome do conlang, dentro do ID `ARG-SYLVARIN` do próprio [[AUDITORIAS]]. Já é **público por decisão** (aparece 4× no site servido: álbum de figurinhas e forja de nomes). Mantido conscientemente |
| Rótulo clínico transcrito | **0** |
| Nome de batismo de criança | **0** |

Registro a falha porque ela é o dado mais útil deste parágrafo: **o documento que denuncia o vazamento é
exatamente o tipo de documento que o comete.**

---

## 1. Sumário executivo

**A Edição #3, como página servida ao leitor, está LIMPA.** Todas as travas desenhadas para ela
funcionaram, inclusive a mais difícil (a censura na origem do Detonado). Nenhum achado no conteúdo
publicável da #3.

**O repositório público, porém, não está limpo** — e não por causa da #3. O repo
`github.com/petrinhu/site_gusworld` é **público** (confirmado na fonte, ver §5) e contém, em arquivos
rastreados e já pushados, **a lista enumerada de never-reveal**, um **twist de enredo nomeado em mensagem
de commit** (imutável), e a **associação de um rótulo clínico a uma criança real**. Isso é vazamento
real, já acessível a qualquer pessoa, e é exatamente a classe de risco que o `AUD-SPOILER` existe para
pegar.

| Severidade | Qtd. | Onde |
|---|---|---|
| 🔴 **CRÍTICO** | **3** | repositório público (árvore + histórico + mensagem de commit) |
| 🟠 **IMPORTANTE** | **3** | repositório público (2) · conteúdo herdado servido (1) |
| 🟢 **COSMÉTICO** | **3** | asset publicado da #1 (1) · i18n de `aria-label` (1) · escopo de guard (1) |
| ✅ **Limpo** | — | **toda a superfície servida da #3** (pt + en) |

**Veredicto (detalhado em §9):** a **#3 pode ir ao ar**. Os 🔴 são **pré-existentes, independentes da #3**
e **não pioram com a publicação** — mas exigem decisão e ação do líder em trilha própria.

---

## 2. Método e escopo executado

### 2.1 O HTML servido, não o fonte

```
php -S 127.0.0.1:8096 -t public_html
```

Nove rotas baixadas e auditadas sobre o **corpo que o leitor recebe**:

| Rota | Bytes | Auditada |
|---|---|---|
| `/pt/` | 20 720 | ✅ |
| `/en/` | 20 487 | ✅ |
| `/pt/edicao.php?slug=edicao-1` | 60 835 | ✅ |
| `/pt/edicao.php?slug=edicao-2` | 45 090 | ✅ |
| **`/pt/edicao.php?slug=edicao-3`** | **63 358** | ✅ |
| `/en/edition.php?slug=edition-1` | 60 925 | ✅ |
| `/en/edition.php?slug=edition-2` | 45 133 | ✅ |
| **`/en/edition.php?slug=edition-3`** | **64 120** | ✅ |
| `/404.html` | 118 588 | ✅ |

### 2.2 O histórico do git

- `git log --all -p` → **4 562 613 bytes** de patch, 259 commits, 2 refs (`main`, `origin/main`).
- `git log --all --format=%B` → **mensagens de commit isoladas** (sem a linha de autor, para não
  contaminar a contagem — ver a nota de falso positivo em §8.2).
- **Toda busca com `-i`**, sem exceção, e com `\b` onde o termo é substring de palavra comum.
- `git ls-remote origin main` = `ecaaf78…` = `HEAD` local → **tudo que está rastreado já está publicado**.

### 2.3 As imagens

**22 imagens abertas e olhadas uma a uma** (não deduzidas pelo nome): 7 `og-*.jpg`, `frames/edicao-3.png`,
os 3 capturas reais da #1, o pôster 3D da #2, os 4 sprites, `gus-front`, `favicon`, `crt-bezel`,
`placeholder-hostinger`, e o PNG base64 **embutido** no `404.html` (que o nome de arquivo não revela).

### 2.4 Enumerar, não procurar

Onde o espaço era fechado, foi **enumerado inteiro** em vez de buscado:

- **todos** os `alt` (20 ocorrências, 16 distintas)
- **todos** os `aria-label` (69 ocorrências, 55 distintas)
- **todos** os `title`, `aria-labelledby`, `placeholder`, `data-*` (198 ocorrências)
- **todos** os comentários HTML servidos (10, todos fechamento de bloco)
- **todos** os elementos escondidos com conteúdo textual (265)
- **todas** as URLs/nomes de arquivo servidos (81 distintas, excluindo data-URIs de fonte)
- **todos** os tokens capitalizados (proper nouns) do texto da #3 (179 pt / 190 en)
- **todos** os nomes de arquivo que já existiram no repo (362)

---

## 3. Achados 🔴 CRÍTICOS

### 🔴 S-01 — A lista de never-reveal está publicada em arquivo rastreado, num repo público

**Superfície:** repositório (árvore atual + histórico). **Não** a página servida.

**Evidência (verificada no remoto, não na árvore local):**

```
$ curl -s https://api.github.com/repos/petrinhu/site_gusworld
  {'full_name': 'petrinhu/site_gusworld', 'private': False, 'visibility': 'public', ...}

$ curl -s -o raw-lev.md -w "HTTP %{http_code}"  \
    https://raw.githubusercontent.com/petrinhu/site_gusworld/main/docs/editorial/LEVANTAMENTO-HISTORICO.md
  HTTP 200   bytes=25416
```

O arquivo `docs/editorial/LEVANTAMENTO-HISTORICO.md`, **linhas 155-158**, enumera por extenso:

| Item | Linha | O que enumera |
|---|---|---|
| 1 | `:155` | o roster completo do território ★ ALTO, nome por nome, mais o capstone |
| 2 | `:156` | o deep-lore ★ ALTO: eras, facções, cosmologia, os antagonistas, os finais |
| 3 | `:157` | as mecânicas nomeadas MÉDIO, incluindo a condição de destravamento do desfecho oculto |
| 4 | `:158` | o identificador de carta-amostra e o nome de carta que o mock 09 já cita |

A mesma informação está espalhada em mais 4 arquivos rastreados: `docs/editorial/ROTEIRO-ENTREVISTAS.md`,
`TODO.md` (linhas 287 e 310), `docs/editorial/PAUTA-EDICAO-3.md` (`:235`, `:448`),
`docs/design/mockups/09-anatomia-edicao.html` (`:447`, `:451`).

**Por que é 🔴:** contradiz frontalmente o [[AUDITORIAS]] (*"enumerá-la num arquivo público seria o próprio
spoiler"*) e o próprio `.gitignore` do repo, que às linhas 30-33 diz, verbatim:

```
# Inventario de planejamento: referencia a never-reveal list (spoiler) e o
# repo e PUBLICO. Planning LOCAL; para rastrear, redigir sem os nomes. Ver
# AUD-SPOILER + project_spoiler_policy.
docs/inventario-publicavel.md
```

Ou seja: **a política existe, está escrita, e foi aplicada a um arquivo e não aos outros cinco.** O
`inventario-publicavel.md` foi corretamente mantido fora do repo; o `LEVANTAMENTO-HISTORICO.md`, que
contém a mesma classe de conteúdo em forma mais concentrada, entrou.

**Agravante:** vazamento em repo público **não se conserta com commit normal**. O `git log -p` continua
servindo o conteúdo, e o próprio commit de limpeza o exibe no diff. O conserto é **reescrita de
histórico + force-push** (autorizado neste projeto por `feedback_autorizacoes_git`), com verificação por
**clone fresco**, nunca por `git grep`.

**Remediação proposta (decisão do líder):** (a) mover os 5 arquivos para fora do repo ou redigi-los
sem os nomes; (b) `git filter-repo` com `regex:(?i)…` — **caixa insensível obrigatória**, senão a
reescrita passa ao lado das variantes em maiúscula; (c) force-push; (d) verificar por clone anônimo.
**Estado auditado: —**

---

### 🔴 S-02 — Twist de enredo nomeado em mensagem de commit (imutável)

**Superfície:** mensagem de commit. É a superfície que o [[AUDITORIAS]] marca como *"irreversível de
verdade"*.

**Evidência:**

```
$ git log --all --format='%h|%ad|%s' --date=short -i --grep=traidor
a258e5df477adb91cb66202de0328deb5315c3d6 | 2026-07-25 | docs(editorial): o <nome> entra na fila e FECHA a serie de entrevistas (ENTREVISTAS-PARTY)
```

O **assunto** do commit nomeia um personagem e o **corpo** o qualifica na primeira linha
(`git log -1 --format=%b a258e5d`, linha 1). O commit é público desde 2026-07-25.

Mais dois commits carregam material embargado no corpo:

| Commit | Data | O que carrega |
|---|---|---|
| `68545d9` | 2026-07-25 | o assunto cita o conjunto ★ ALTO; o corpo descreve a regra de nomeação e o tratamento da figura viva |
| `6e4a1ee` | 2026-07-16 | o corpo cita, por nome, o item MÉDIO nº 4 da lista — e **avisa disso na própria mensagem** |
| `97536c2` | 2026-07-16 | idem, referência ao mesmo item |
| `4ebb74b` | 2026-07-17 | o corpo lista 4 mecânicas nomeadas do jogo |

**Ironia documentada:** `6e4a1ee` termina com *"⚠️ SPOILER-POLICY: o monólogo cita '<termo>' … marcado
em comentário no HTML para o audit de spoiler antes de publicar"* — a mensagem que sinaliza o risco é
ela mesma o vazamento, e é a única parte que a auditoria posterior não consegue remover.

**Contagem no histórico** (mensagens isoladas, `-i`): item nº 4 da lista = **3** ocorrências; o conjunto
★ ALTO = **2**; o twist do S-02 = **2** (assunto + corpo).

**Remediação:** só reescrita de histórico. Mesma operação do S-01, mesmo `filter-repo`.
**Estado auditado: —**

---

### 🔴 S-03 — Rótulo clínico associado a uma criança real, em arquivo rastreado público

**Superfície:** repositório (árvore + histórico). **Zero na página servida.**

**Evidência:** `docs/editorial/BRIEFS-EDICAO-3.md` cita o identificador de uma thread do bus que **cola
uma sigla clínica ao apelido da criança**, três vezes (`:68`, `:202`, `:320`), e o mesmo arquivo expande
a sigla em `:57`, `:234` e `:324`. Contagens no repo: a sigla aparece em **8** arquivos rastreados e
**11** vezes no histórico de patches.

**A distinção que importa, e que salva a maior parte do material:** em `:57`, `:234` e `:324` os termos
aparecem numa **lista de proibição** (*"NÃO escrever, em lugar nenhum da revista: …"*). Isso é
defensável — é a régua, não o rótulo. **O identificador da thread não tem essa defesa:** ele é uma
**associação afirmativa**, sem negação em volta, e um leitor que expanda a sigla obtém uma
caracterização de saúde de um menor de 11 anos identificável como filho do criador.

O `CLAUDE.md` do usuário registra a correção do líder, em caixa alta, sobre exatamente esta classe de
erro (recusando uma sigla clínica que um agente havia atribuído ao personagem) — o que confirma que
rótulo clínico neste projeto é matéria
de submissão obrigatória, não de julgamento do agente.

**Nota de falso positivo medida:** a sigla também "casa" dentro de `public_html/assets/audio/cidade-tema.mp3`
e de `public_html/assets/edicao-2/gus-3d-poster.png` — são **coincidências de bytes em binário**, não
conteúdo. Descartadas.

**Remediação:** trocar o identificador da thread por um neutro nos 3 pontos; decidir com o líder se a
lista de proibição fica (recomendo que fique — ela é a trava que fez a #3 sair limpa) e se o histórico
entra na mesma reescrita do S-01/S-02. **Estado auditado: —**

---

## 4. Achados 🟠 IMPORTANTES

### 🟠 S-04 — A #3 acrescentou 2 termos embargados ao repo público (não à página)

**Evidência:** varredura restrita ao intervalo real da produção da #3 (`a50c53d..HEAD`, **38 commits**):

| Termo | Patches da #3 | Mensagens da #3 | Onde |
|---|---|---|---|
| near-name da figura viva (item ★ ALTO) | **1** | 0 | `docs/editorial/PAUTA-EDICAO-3.md:448` |
| mecânica nomeada (item MÉDIO nº 3) | **1** | 0 | `docs/editorial/PAUTA-EDICAO-3.md:235` |
| roster ★ ALTO (nomes próprios) | **0** | 0 | — |
| tudo o mais da lista | **0** | 0 | — |

**Leitura honesta:** a #3 **não** introduziu nenhum nome do roster ★ ALTO, e **nenhuma** mensagem de
commit da #3 carrega termo embargado — a disciplina da onda foi boa. Mas dois termos novos entraram no
repo público em 2026-08-01 pela pauta, o que mostra que o vazamento do S-01 **ainda está ativo como
processo**, não é só passivo herdado.

**Remediação:** redigir os 2 pontos da `PAUTA-EDICAO-3.md`. Como são de 3 dias atrás e ainda não houve
release, entram na mesma reescrita. **Estado auditado: —**

### 🟠 S-05 — "Mecânica citada por nome": a varredura anterior tinha um buraco de escopo

**Evidência:** `docs/editorial/AUDITORIA-COERENCIA-EDICAO-3.md:418` declara:

> **Mecânica citada por nome** (carta, …9 termos…) | **0 ocorrências**. O único hit de "carta" é o
> Editorial falando da **carta** (texto epistolar), não de mecânica.

Enumerando **todas** as 8 ocorrências de `\bcartas?\b` no HTML servido de `/pt/edicao-3`, sete são
epistolares (índice, título da seção 09, corpo do Editorial, corpo da 09) — e **a oitava não é**:

```
Classificados in-world · 10.2
gus@glyfesse>  COMPRO: baterias de cartas. as boas somem rápido e eu nao quero ficar sem reserva
               // não vou dizer pra que servem. descobrir sozinho é metade da graça...
```

**Não é erro da auditoria anterior — é escopo:** ela se declara restrita a *"os sete corpos"* (as 7
seções novas), e a seção 10 é **reuso verbatim da #1**, autorizado no `PAUTA-EDICAO-3.md:266`
(*"Reusar #1 (idêntico, com os typos e IDs)"*). Diff das três edições: **byte-idêntico** em `/pt/edicao-1`,
`/pt/edicao-2` e `/pt/edicao-3`.

**Consequência real: baixa.** O texto já está público desde 2026-07-21 (#1 no ar), é in-fiction, e a
própria copy recusa explicar (*"não vou dizer pra que servem"*). Tirá-lo da #3 e deixá-lo na #1 e na #2
não desfaz nada.

**Isto é registro para o editor-geral, não bloqueio.** A decisão de manter ou redigir as três edições é
dele. A lição operacional para a próxima prova final: **varrer também o conteúdo reusado**, não só o
escrito no ciclo. **Estado auditado: —**

### 🟠 S-06 — Guard de higiene varre a árvore, não o histórico

**Evidência:** `scripts/deploy.sh:69`

```bash
if grep -rniE "$_ere" public_html/ src/ data/ 2>/dev/null | grep -qv -i 'iago'; then
```

O guard do nome de batismo (excelente no desenho — a lista negra vive em `scripts/.name-blocklist`,
gitignored, para que o guarda não vaze o que protege) inspeciona **apenas os 3 diretórios que sobem por
rsync, no estado atual**. Quando ele imprime OK, isso significa *"o conteúdo a subir está limpo"*, **não**
*"o repo está limpo"*.

Na prática **não houve dano** (S-08 mostra zero em todas as superfícies, inclusive histórico), mas a
saída do guard não distingue os dois casos, e é exatamente assim que um "LIMPO" falso nasce.

**Remediação:** ou a mensagem do guard declara o escopo, ou entra um segundo check
`git log --all -p | grep -icE "$ere"` no `preci.sh`. **Estado auditado: —**

---

## 5. Achados 🟢 COSMÉTICOS

### 🟢 S-07 — Valor financeiro pessoal legível em asset publicado da #1

`public_html/assets/edicao-1/tui_claude.png` e `tui_claude2.png` são capturas reais do terminal, e a
barra de status é legível: **`cost R$ 15,42`** e **`cost R$ 19,65`**, mais telemetria de máquina
(`memory 497.9 MB`, `disk 77%`, `load 2.35 2.26 1.58`, contagens de token).

**Não é spoiler** e **não é a classe de vazamento** que queimou este projeto antes (não há aba de
navegador pessoal, terminal alheio, dado médico nem desktop — as abas visíveis são `~ : claude`,
`gusworld : claude`, `site_gusworld : claude`, todas do próprio trabalho). As imagens são conteúdo
**deliberado** da #1 e estão no ar desde 2026-07-21.

Registro porque `feedback_frames_vazam_tela_pessoal` lista "custos do Claude em R$" entre os itens que já
vazaram uma vez. **Decisão do líder.** **Estado auditado: —**

### 🟢 S-08 — `aria-label` em português na página em inglês

Nas 3 tarjas do Detonado da rota `/en/edition-3`, o rótulo é `aria-label="trecho censurado"` — texto pt
numa página `lang="en"`. **Não é vazamento** (o rótulo é exatamente o exigido pela D11: *"trecho
censurado" e nada mais*), é defeito de i18n/acessibilidade. Fica registrado aqui porque a enumeração o
encontrou; o dono é o `accessibility-specialist`, não o `AUD-SPOILER`. **Estado auditado: —**

### 🟢 S-09 — Frame da #3 já servível em produção antes da edição

```
https://gusworld.site/pt/edicao-3            → 404
https://gusworld.site/assets/frames/edicao-3.png → 200
```

O frame da capa da #3 já responde em produção (é usado pela linha do tempo da home), enquanto a edição
não está no ar. A imagem em si é limpa (§7), então o impacto é nulo — mas é o padrão a vigiar: **asset
sobe antes da página**, e um asset com spoiler subiria da mesma forma. **Estado auditado: —**

---

## 6. A trava principal da #3: o Detonado (D11) — ✅ APROVADA

O requisito duro, verbatim do líder: *"não deixe hardcoded no código da página para os malandros não irem
atrás lendo o html/css/etc."*

| Critério da D11 | Verificação | Resultado |
|---|---|---|
| **A tarja é elemento VAZIO no HTML servido** | `grep -o '<b class="det-tarja"[^>]*>[^<]*</b>'` sobre o corpo servido | **3 de 3 vazias** em pt e en: `…aria-label="trecho censurado"></b>` — zero caracteres entre as tags |
| Nada por `color:transparent` / `opacity:0` / `visibility:hidden` / `display:none` | varredura das 2 folhas CSS servidas | **0** regras que apliquem texto oculto à tarja |
| Nada por `content:` em CSS | **42** declarações `content:` enumeradas em `tokens.css` + `edicao.css` | todas decorativas (`""`, `"◆"`, `"✓"`, `"ENCARTE"`, `attr(data-visual)`); **nenhuma** injeta termo |
| Nada em atributo | enumeração completa de `alt`/`aria-label`/`title`/`data-*` (§2.4) | **0** |
| Nada em comentário HTML | 10 comentários servidos, todos `/.pagina` e `/.banca-corpo` | **0** |
| Nada em nome de arquivo | 362 nomes de toda a história testados | **0** |
| Nada em mensagem de commit da #3 | 38 commits do intervalo `a50c53d..HEAD` | **0** |
| **Largura da tarja não entrega contagem de letras** | `edicao.css`, 4 regras `nth-of-type(4n+k)` | ✅ largura por **posição da linha** (4ch/11ch/7ch/9ch), nunca por conteúdo — trocar o texto não muda largura nenhuma |
| **`aria-label` diz só "trecho censurado"** | 3 ocorrências, todas idênticas | ✅ nunca `"censurado: <termo>"` |
| Alinhamento não vaza | `.det-linha` é flex de 3 peças; quem estica é a dos pontos | ✅ o `ok` alinha por layout, não por contagem de caractere |
| Cópia por seleção de mouse | `user-select:none` + `pointer-events:none` na tarja | ✅ arrastar não copia nada |
| **A censura aconteceu na ORIGEM** | `src/content/edicao-3/{pt,en}/sec-08.php` e `docs/content/edicao-3-detonado.md` | ✅ o termo **nunca foi escrito** — nem no rascunho, nem no template, nem no mock 17 |
| Mock 17 (`docs/design/mockups/17-detonado-censurado.html`) | mesma varredura | ✅ tarjas vazias; a única ocorrência de um termo da lista (`:35`) é o **comentário que proíbe** usá-lo no `aria-label` |
| **Captura bruta fora do repo** | 362 nomes da história | ✅ nenhum arquivo de saída bruta jamais entrou |

**Nota de rigor:** não há como "achar" o termo aqui porque **não há o que achar** — nenhuma string foi
escrita e depois coberta. Essa é a única garantia que vale, e o `sec-08.php` documenta a razão no próprio
cabeçalho: *"CSS se inspeciona, arquivo vazio não."* A trava está correta em desenho e em execução.

### O `sterling corp.` — ✅ dentro da autorização

| Verificação | Resultado |
|---|---|
| Ocorrências em todas as 9 rotas | **2** — uma em `/pt/edicao-3`, uma em `/en/edition-3` |
| Onde | `<div class="det-carimbo" aria-hidden="true">` → `<span class="corp">sterling corp.</span>`, e **em nenhum outro lugar** |
| `alt` / `aria-label` / nome de arquivo / CSS / JS / commit | **0** |
| Autorização | `docs/editorial/PAUTA-EDICAO-3.md:81-86`, *"Autorizado por ele, in-fiction, em 2026-08-01"*; e o [[AUDITORIAS]] já classificava o vilão como **seguro** (*"canônico desde o início, não é twist"*) |

**Aparece só onde foi autorizado.** ✅

---

## 7. As imagens — 22 abertas e olhadas

| Arquivo | Dim. | Usado por | Veredicto |
|---|---|---|---|
| `og-edicao-3.jpg` | 1200×630 | **#3 pt** (og + twitter) | ✅ card desenhado; só marca, tagline e a cena do quadrado azul |
| `og-edicao-3-en.jpg` | 1200×630 | **#3 en** | ✅ idem |
| `frames/edicao-3.png` | 1024×576 | **#3** + linha do tempo | ✅ foto de monitor **cortada no monitor**: cena de teste (quadrado azul, paredes, alvo ciano) + um cursor. **Sem** aba de navegador, terminal, desktop ou janela alheia |
| `og-cover.jpg`, `og-launch.jpg`, `og-edicao-1-en`, `og-edicao-2`, `og-edicao-2-en` | 1200×630 | #1/#2/home | ✅ cards desenhados |
| `edicao-1/tui_claude.png` | 1911×990 | #1 | ⚠️ ver 🟢 **S-07** (valor em R$ legível). Sem spoiler |
| `edicao-1/tui_claude2.png` | 1914×952 | #1 | ⚠️ idem. O prompt fundador está legível e é conteúdo deliberado |
| `edicao-1/inbox_git.png` | 1862×683 | #1 | ✅ **redigido com tarja de desfoque** sobre org/repo, avatar, autor e parte dos nomes de arquivo. Higiene prévia visível e adequada |
| `edicao-2/gus-3d-poster.png` + `-full` | 1200²/2048² | #2 | ✅ arte pura, fundo branco |
| `crt-bezel.png` | 1280×720 | chrome | ✅ foto de CRT apagado; reflexos escuros ilegíveis, nada identificável |
| `placeholder-hostinger.png` | 1280×900 | **não referenciado** | ✅ página padrão da Hostinger, sem dado de conta. Asset órfão no repo |
| `404.html` — PNG base64 **embutido** | 256×256 | 404 | ✅ sprite do Gus de costas. **O nome de arquivo não revelaria isto** — foi extraído e aberto |
| `gus-front`, 4 sprites, `favicon` | — | home/404 | ✅ arte |

**Nota:** a purga histórica dos frames que vazaram tela pessoal **está confirmada**: comparando os 362
nomes de toda a história com os arquivos atuais, os únicos arquivos que já existiram e não existem mais
são **13 fontes e um `index.html`**. Nenhum frame remanescente. A reescrita anterior funcionou.

---

## 8. Tabela de varreduras — **inclusive os zeros**

> Zero declarado distingue "não há" de "ninguém olhou". Toda linha abaixo foi executada.
> `SERVIDO` = as 9 rotas concatenadas · `ÁRVORE` = `git grep -i` nos rastreados ·
> `HIST-P` = `git log --all -p` · `HIST-M` = `git log --all --format=%B`.

### 8.1 Lista de embargo (`LEVANTAMENTO-HISTORICO` §ITENS DE SPOILER 1-4) — 34 termos

| Grupo | Termos | SERVIDO | ÁRVORE | HIST-P | HIST-M |
|---|---|---|---|---|---|
| Roster ★ ALTO (item 1) — 15 termos | análogos históricos + capstone | **0** | 15/15 presentes | 91 | 3 |
| Deep-lore ★ ALTO (item 2) — 4 termos | antagonista secundário, evento, conlang, finais | **4** (só o conlang) | 4/4 | 119 | 7 |
| Mecânicas MÉDIO (item 3) — 9 termos | os 9 da linha `:157` | **2**, ambos falso positivo | 9/9 | 24 | 0 |
| Carta-amostra MÉDIO (item 4) — 3 termos | id + nome de carta | **0** | 3/3 | 31 | 3 |
| Estruturais (5 termos de sistema/progressão/desfecho) | 5 | **0** | 5/5 | 59 | 2 |

**Falsos positivos identificados e descartados** (a checagem que confirma o que você espera é a que menos
protege):

- os 2 hits de mecânica MÉDIO no servido = **nome de um console portátil** citado como alvo de hardware
  em `/pt/edicao-2` e `/en/edition-2` (*"rodar bem num … , numa GTX 1050"*). Não é mecânica de jogo.
- conlang × 4 no servido = o **álbum de figurinhas** e a **forja de nomes** da home — features públicas
  aprovadas, e o nome da revista deriva dele (explicado na #1). Não é vazamento.
- A sigla clínica "casando" dentro de um `.mp3` e de um `.png` = **bytes de binário**.

### 8.2 Nome de batismo de criança — o guard rodado em 6 superfícies

Executado com a `scripts/.name-blocklist` real (local, gitignored, 1 padrão), via `hygiene_name_ere`:

| Superfície | Ocorrências |
|---|---|
| A) HTML servido, 9 rotas | **0** |
| B) árvore rastreada inteira | **0** arquivos |
| C) histórico de patches (`git log --all -p`, 4,5 MB) | **0** |
| D) mensagens de commit (todas, 259) | **0** |
| E) nomes de arquivo rastreados | **0** |
| F) nomes de arquivo em **toda** a história (362) | **0** |

✅ **Zero absoluto.** No servido só aparece **`Gus`** (205×) e **`Gus Dragon`** (4×) — exatamente as duas
formas permitidas. O amigo aparece como **`Cauã "Volt"`** (2×), que é personagem in-game
(`ROTEIRO-ENTREVISTAS.md:25`, companion #1, 13 anos in-fiction), não criança real.

### 8.3 Rótulo clínico / profissão / condição de família — 34 termos

| Termo | SERVIDO | ÁRVORE | HIST-P | HIST-M | Nota |
|---|---|---|---|---|---|
| sigla de alta capacidade intelectual (a do identificador da thread) | **0** | 8 | 11 | 0 | 🔴 S-03 |
| sigla de transtorno de atenção (pt e en) | **0** | 5 / 1 | 6 / 1 | 0 | lista de proibição + 1 binário |
| 4 sinônimos de alta capacidade (2 pt, 1 composto, 1 en) | **0** | 5/5/5/1 | 7/7/6/1 | 0 | lista de proibição |
| `prodígio` | **0** | 8 | 10 | 2 | 2× em mensagem de commit (`68545d9`) |
| `autis*`, `asperger`, `espectro`, `transtorno`, `psiquiatr*`, `psicolog*`, `terapia`, `medicament*`, `ritalina`, `plantão`, `hospital`, `doutor` | **0** | **0** | **0** | **0** | ✅ zero absoluto |
| `laudo` | **0** | 5 | 5 | 0 | ✅ **falso positivo**: sentido editorial ("o laudo de coerência"), não médico |
| `médico` / `medicina` / `consultório` | **3 / 0 / 1** | 22 / 0 / 3 | 25 / 1 / 3 | 0 | ✅ ver abaixo |
| `QI` | **2** | 47 | 20 | 0 | ✅ **falso positivo**: as 2 do servido estão **dentro do base64** do `404.html` |

**Sobre `médico`/`consultório` (4 ocorrências no servido):** todas em **`/pt/edicao-1`, seção 16**, na
**auto-descrição do criador em primeira pessoa** (*"Sou médico hoje, de formação e de profissão"*). É o
próprio líder falando de si, publicado por decisão dele, e é a **defesa pela história** que o
[[AUDITORIAS]] §`AUD-IA` prescreve explicitamente (*"médico, 6:15 às 20h"*). **Não é pessoa da família,
não é rótulo clínico, e está autorizado.** A **#3 tem zero** ocorrências das três palavras.

### 8.4 Corte do 3D (item 3 do embargo) — ✅ segurou

| Verificação | `/pt/edicao-3` | `/en/edition-3` |
|---|---|---|
| `\b3d\b`, `tridimensional`, `três dimensões`, `three dimensions`, `blender`, `tríp*` | **0** | **0** |
| Insinuação ou promessa ("na #4", "em breve", "volte para ver") | **0** | **0** |

⚠️ **Armadilha registrada:** uma primeira varredura sem fronteira de palavra devolveu ~9 "hits" de `3D` —
**todos eram `%3D` (o `=` percent-encoded) dentro do data-URI SVG do brinde**. Sem `\b`, a #3 teria sido
acusada de furar o corte. O SVG foi decodificado e auditado à parte: contém `gus@glyfesse:~$ glyfe
--world`, `// compilando um mundo...` e `GUSWORLD`. Limpo.

Para contexto: a tentativa 3D **já foi contada na #2** (*"Eu tentei fazer o mundo em três dimensões"*) e o
pôster 3D é asset publicado dela. O que a #3 tinha de calar é o **desfecho do gate 2D-vs-3D**
(`PAUTA-EDICAO-3.md:348`, D2) — e calou, sem sequer prometer.

### 8.5 Enumerações completas

| Enumeração | Total | Distintos | Com material embargado |
|---|---|---|---|
| `alt` | 20 | 16 | **0** |
| `aria-label` | 69 | 55 | **0** |
| `title` | 8 | 2 | **0** |
| `aria-labelledby` / `placeholder` / `aria-describedby` | 16 / 0 / 0 | 6 / 0 / 0 | **0** |
| `data-*` | 198 | 132 | **0** |
| Comentários HTML servidos | 10 | 2 | **0** |
| Elementos escondidos **com** conteúdo textual | 265 | — | **0** |
| URLs/nomes de arquivo servidos | 81 | 81 | **0** |
| Hosts externos requisitados | **0** | — | ✅ zero-terceiro confirmado |
| E-mails no servido | 26 | 3 | ✅ 2 in-fiction (`@glyfesse.gu`) + 1 real de contato |
| Tokens capitalizados na #3 (pt / en) | 179 / 190 | — | **0** |
| Nomes de arquivo em toda a história | 362 | 362 | **0** |
| `gitleaks detect` (257 commits, 2,97 MB) | — | — | ✅ **no leaks found** |

### 8.6 Enumeração de `alt` e `aria-label` da #3, com veredicto item a item

**`alt` (a #3 tem 1 por idioma):**

| # | Rota | Texto | Veredicto |
|---|---|---|---|
| 1 | `/pt/edicao-3` | *"Um quadrado azul num cenário de teste, o primeiro protótipo jogável."* | ✅ descreve o que a imagem mostra; nada além |
| 2 | `/en/edition-3` | *"A blue square in a test scene, the first playable prototype."* | ✅ idem |

**`aria-label` da #3 (11 ocorrências, 9 distintos, por idioma):**

| # | Texto (pt) | Veredicto |
|---|---|---|
| 1-3 | *"trecho censurado"* ×3 (as tarjas) | ✅ **exatamente** o exigido pela D11; nunca `"censurado: <termo>"` |
| 4 | *"Índice"* | ✅ chrome |
| 5 | *"Quadro um: uma sala vazia, vista de lado…"* (HQ) | ✅ descreve desenho; nada de mecânica |
| 6 | *"Quadro dois: o quadrado azul atravessou a sala…"* | ✅ idem |
| 7 | *"Quadro três: o quadrado tenta outra vez…"* | ✅ idem |
| 8 | *"Um quadrado azul sólido, chapado, ocupando a página inteira…"* (pôster) | ✅ idem |
| 9 | *"Uma tela de tubo verde mostrando a caixa de entrada do bus… contador em zero mensagens."* | ✅ descreve o **vazio**; não cita nome de sessão nem conteúdo de mensagem |
| 10 | *"Som"* | ✅ chrome |
| 11 | *"versão desta edição"* | ✅ chrome |

**Na versão EN:** idênticos em conteúdo, **exceto** os 3 da tarja, que permanecem em pt (🟢 S-08).

**Nomes de arquivo servidos pela #3 (enumeração completa):** `og-edicao-3.jpg`, `og-edicao-3-en.jpg`,
`frames/edicao-3.png`, `edicao.css`, `tokens.css`, `favicon.png`, 3 `.woff2`, `cupom{,-core}.js`,
`som{,-core}.js`, `lightbox-core.js`, `pecas.js`, `typing-core.js`. **Todos genéricos.** Nenhum nome
descreve conteúdo embargado. ✅

---

## 9. Veredicto

### ✅ **SIM — a Edição #3 pode ir ao ar do ponto de vista de spoiler.**

**O que sustenta o SIM:**

1. **A trava mais difícil funcionou.** As tarjas do Detonado são elementos vazios no HTML **servido**, em
   pt e en. Não há termo por baixo porque **nenhum termo foi escrito** — nem no rascunho, nem no mock,
   nem no template, nem em atributo, nem em commit. A largura é quantizada por posição, o `aria-label` diz
   só `"trecho censurado"`, e o `user-select:none` impede cópia. **A D11 passa em todos os 13 critérios.**
2. **O `sterling corp.` aparece em exatamente 1 lugar por idioma**, o carimbo, que é onde a autorização
   expressa de 2026-08-01 o colocou. Zero em `alt`, `aria-label`, nome de arquivo, CSS, JS e commit.
3. **O corte do 3D segurou** — zero no texto, zero insinuado, zero prometido, nas duas línguas.
4. **Nome de batismo de criança: zero absoluto** nas 6 superfícies, histórico e nomes de arquivo inclusive.
5. **Rótulo clínico: zero na revista inteira**, nas duas línguas.
6. **As imagens da #3 são limpas** — abertas e olhadas, não deduzidas do nome.
7. **Zero requisição a terceiro**, zero segredo (`gitleaks` limpo), zero comentário HTML com material.
8. **A produção da #3 não pôs um único nome do roster ★ ALTO em lugar nenhum**, e nenhuma mensagem de
   commit da onda carrega termo embargado.

**O que o SIM NÃO cobre, e precisa ficar dito com todas as letras:**

Os três 🔴 são **reais, verificados no remoto público, e independentes da #3**. Publicar a #3 não os cria
nem os agrava — mas **não os apaga**, e eles já estão acessíveis a qualquer pessoa hoje, sem a #3 no ar.
Especificamente:

- 🔴 **S-01** — o roster ★ ALTO e a lista de never-reveal estão em `raw.githubusercontent.com`, HTTP 200,
  agora.
- 🔴 **S-02** — o twist está no **assunto de um commit público**, que é a única superfície que nenhuma
  auditoria posterior remove sem reescrever a história.
- 🔴 **S-03** — o rótulo clínico está colado ao apelido da criança em 3 pontos de arquivo rastreado.

**Recomendação ao editor-geral:** liberar o `GATE-SPOILER` da #3 e abrir uma **trilha própria de
remediação do repositório** (S-01, S-02, S-03, S-04), que é operação de `filter-repo` + force-push +
verificação por clone anônimo — não é trabalho de fechamento de edição e não deve travá-lo.

⚠️ **Duas travas para essa trilha, aprendidas nesta casa:** (a) no `filter-repo`, usar
`regex:(?i)termo==>substituto`, porque substituição só-minúscula deixa as variantes em maiúscula para
trás; (b) **verificar por clone fresco do remoto**, com `git log --all -p | grep -ci`, nunca por
`git grep` na árvore local.

---

## 10. Plano de remediação rastreado

| ID | Sev. | Achado | Ação proposta | Dono | Estado auditado |
|---|---|---|---|---|---|
| S-01 | 🔴 | never-reveal list em 5 arquivos rastreados públicos | redigir/mover + `filter-repo` `(?i)` + force-push + clone de prova | líder (decisão) · `security-engineer` (execução) | **—** |
| S-02 | 🔴 | twist e material embargado em 5 mensagens de commit | mesma reescrita de histórico | líder | **—** |
| S-03 | 🔴 | sigla clínica associada à criança em 3 pontos | trocar o identificador; manter a lista de proibição | líder | **—** |
| S-04 | 🟠 | a #3 acrescentou 2 termos ao repo (`PAUTA-EDICAO-3.md:235,:448`) | redigir; entra na mesma reescrita | `content-seo` / editorial | **—** |
| S-05 | 🟠 | `carta` em conteúdo reusado (seção 10, 3 edições) | decisão do editor-geral: manter ou redigir as 3 | líder | **—** |
| S-06 | 🟠 | guard de deploy varre árvore, não histórico | declarar escopo na saída **ou** somar check de histórico no `preci.sh` | `devops-sre` | **—** |
| S-07 | 🟢 | valor em R$ legível em asset da #1 | decisão: manter ou reemitir a captura | líder | **—** |
| S-08 | 🟢 | `aria-label` pt na página en | traduzir (mantendo "só isso e nada mais") | `accessibility-specialist` | **—** |
| S-09 | 🟢 | asset da #3 servível antes da página | política: asset sobe junto com a página | `devops-sre` | **—** |
| — | ✅ | **Edição #3, superfície servida** | **nenhuma ação** | — | ✅ **aprovado** |

---

## 11. Limitações declaradas desta auditoria

Honestidade sobre o que **não** foi coberto:

1. **A régua de never-reveal não é minha.** Auditei contra a lista enumerada em
   `LEVANTAMENTO-HISTORICO.md` §ITENS DE SPOILER (34 termos) + os 6 itens do briefing. A lore privada do
   líder tem ~365k palavras e **só ele sabe o que é reveal** — um termo fora dessa lista passaria por
   mim. O [[AUDITORIAS]] já registra isso como pré-requisito (`SPOILER-POLICY`).
2. **Auditei o HTML servido pelo `php -S` local, no commit `ecaaf78`**, não o build de produção. Como o
   deploy é `rsync` dos mesmos arquivos e a #3 ainda responde **404** em produção, os dois coincidem — mas
   um deploy que rode entre esta auditoria e a publicação **invalida a verificação visual das páginas**.
3. **Não auditei o `ARG-SYLVARIN`** (§`AUD-SPOILER` do manual pede: "o que ele revela quando resolvido, e
   se a página secreta está fora do índice") — **não encontrei página de ARG implementada** nas 9 rotas
   nem em `public_html/`. Se o ARG existir fora do repo, está **fora do escopo verificado**.
4. **Não auditei o repo do jogo** (`Projects/gusworld/`, read-only) nem o bus. Este dossiê cobre o
   `site_gusworld`.
5. **Uma imagem foi julgada por inspeção visual, não por medida** — o desfoque de `inbox_git.png` parece
   irreversível no raio aplicado, mas não medi entropia. Se isso importar, é trabalho próprio.

---

## 12. Rastro de reprodução

| Passo | Comando |
|---|---|
| Servidor | `php -S 127.0.0.1:8096 -t public_html` |
| Páginas | `curl -s "http://127.0.0.1:8096/{pt/,en/,pt/edicao.php?slug=edicao-N,en/edition.php?slug=edition-N}"` |
| Histórico | `git log --all -p` · `git log --all --format=%B` |
| Busca | `grep -oiE "\bTERMO\b"` — **`-i` e `\b` obrigatórios** |
| Commits por termo | `git log --all -S<termo> --oneline` · `git log --all -i --grep=<termo>` |
| Nomes de arquivo históricos | `git log --all --name-only --format='' \| sort -u` |
| Prova de exposição pública | `curl https://raw.githubusercontent.com/petrinhu/site_gusworld/main/<path>` |
| Visibilidade | `curl -s https://api.github.com/repos/petrinhu/site_gusworld` → `"private": false` |
| Segredos | `gitleaks detect --no-banner --redact -v` |
| Estado do remoto | `git ls-remote origin main` → `ecaaf78…` (= HEAD local) |
| Produção | `curl -o /dev/null -w '%{http_code}' https://gusworld.site/pt/edicao-3` → **404** |

**Commit auditado:** `ecaaf78a64fcabb33ac67e8c3f364f5671055aec` · `main` · árvore limpa no início.
