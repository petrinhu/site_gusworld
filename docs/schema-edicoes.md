# Schema `$edicoes` — a fonte de dados única da Glyfesse

> Item de board: **CRONOLOGIA-DADOS** (W6). Arquivos: `data/edicoes.php` (o array) e
> `data/edicoes-helpers.php` (os filtros puros). Este doc descreve cada campo e
> quem o consome. Fontes: memórias `cronologia-real-datada`, `a-cadencia-editorial`,
> `project-d-stack`, `project-i18n-switch`, `project-spoiler-policy`; `docs/ia-wireframe.md`.

## O que é

Um array PHP retornado por `data/edicoes.php`. Cada entrada é uma edição da revista.
É a **fonte única** que quatro consumidores percorrem num `foreach`:

| Consumidor | Rota / arquivo | O que faz com o array |
|---|---|---|
| **Banca** (home) | `/pt/`, `/en/` | fileira de capas; borda amarela pela idade real da edição |
| **Linha do tempo** (scrubber) | dentro da banca | pontos da era visual; foto de um marco dissolve na do seguinte |
| **`sitemap.xml`** | `/sitemap.xml` | uma `<url>` por edição publicada × 2 idiomas, com `<lastmod>` |
| **RSS** (2 feeds) | `/pt/rss.xml`, `/en/rss.xml` | um `<item>` por edição publicada, filtrado por idioma |

**Publicar = trocar `estado` de `'rascunho'` para `'publicada'`** nesse array. Zero
HTML tocado; os quatro consumidores crescem sozinhos.

## Como carregar

```php
$edicoes    = require __DIR__ . '/../data/edicoes.php';
require_once __DIR__ . '/../data/edicoes-helpers.php';

$publicadas = edicoes_publicadas($edicoes);        // banca, sitemap, RSS
$scrubber   = edicoes_na_linha_tempo($edicoes);    // linha do tempo
```

## Campos

| Campo | Tipo | Obrig. | Descrição | Quem consome |
|---|---|:---:|---|---|
| `numero` | `int` | sim | Número da edição (1, 2, 3…). | banca, linha do tempo, sitemap, RSS |
| `estado` | `'publicada'` \| `'rascunho'` | sim | Estado de publicação. **Só `'publicada'` é exibível.** Rascunho fica no array mas nenhum consumidor o mostra (spoila o drip). | todos (filtro) |
| `data` | `string` ISO 8601 (`YYYY-MM-DD`) | sim | Data REAL do marco (cronologia dos commits). Usada como carimbo na banca, como idade da borda (envelhecimento), como ponto no scrubber e como `pubDate` do RSS. | banca, linha do tempo, RSS |
| `atualizada_em` | `string` ISO 8601 | sim | Última alteração de conteúdo da edição. Alimenta `<lastmod>` do sitemap e `<lastBuildDate>` do RSS. Separado de `data` (o marco é histórico; a atualização é técnica). | sitemap, RSS |
| `slug_pt` | `string` | sim | Slug da rota pt (`edicao-1` → `/pt/edicao-1`). | banca, sitemap, RSS pt |
| `slug_en` | `string` | sim | Slug da rota en (`edition-1` → `/en/edition-1`). Independente do pt. | banca, sitemap, RSS en |
| `titulo_pt` | `string` | sim¹ | Título em pt-br. | banca, RSS pt |
| `titulo_en` | `string` | sim¹ | Título em inglês. | banca, RSS en |
| `dek_pt` | `string` | sim¹ | Chamada/subtítulo em pt-br. **Spoiler-safe.** | banca, RSS pt |
| `dek_en` | `string` | sim¹ | Chamada/subtítulo em inglês. **Spoiler-safe.** | banca, RSS en |
| `frame` | `string` \| `null` | sim | Caminho web do asset visual da capa/scrubber (`/assets/frames/edicao-N.png`), ou `null` se não houver (a #1 é gênese sem screenshot). | banca, linha do tempo |
| `frame_alt_pt` | `string` \| `null` | sim | Texto alternativo do frame em pt-br. **Spoiler-safe** (alt-text é texto público — AUD-SPOILER). `null` quando `frame` é `null`. | banca, linha do tempo |
| `frame_alt_en` | `string` \| `null` | sim | Texto alternativo do frame em inglês. **Spoiler-safe.** | banca, linha do tempo |
| `og_image` | `string` | **não** | Caminho web root-absoluto do card social 1200x630 próprio da edição (`/assets/og-edicao-N.jpg`). Ausente ou `null` → o `head.php` aplica o default `/assets/og-launch.jpg`. | página da edição (Open Graph / Twitter Card) |
| `na_linha_tempo` | `bool` | sim | Se a edição entra no scrubber (era **visual**, #3+). A gênese textual (#1) e o 3D abandonado (#2) são `false`. | linha do tempo |

¹ Obrigatório **quando publicada**. Numa entrada `rascunho` esses campos podem
ficar vazios/placeholder — nunca são renderizados enquanto rascunho.

### Notas de campo

- **`slug` sem prefixo de idioma.** O prefixo `/pt/` ou `/en/` é a pasta física
  (`I18N-CONTRATO-URL`); o slug é só a parte final. O href do par gêmeo sai do PHP.
- **RSS/sitemap montam a URL absoluta** prefixando a base (`https://gusworld.site`)
  + `/{pt|en}/` + o slug. A base é config, não vai no array.
- **`data` vs `atualizada_em`.** `data` é o fato histórico ("ponha a data das
  coisas" — o líder) e não muda. `atualizada_em` é frescor técnico do sitemap;
  bump quando o conteúdo da edição for corrigido.
- **`og_image` é opcional e o único campo com fallback.** O caminho atravessa
  `montar_contexto()` → `$ctx['og_image']` → `$head['og_image']` → `head.php`, que
  prefixa a `SITE_BASE_URL` (o crawler não resolve caminho relativo). Sem o campo,
  a chave nem entra no `$head` e vale o default. Card novo = 1 linha de dado, sem
  `if` de número de edição no template. Geradores em `docs/design/og-card*.html`
  (#1 = `og-card.html`; #2 = `og-card-2.html`).

## As invariantes (não negociáveis)

1. **Nunca exibir `rascunho`.** Banca e linha do tempo só mostram publicadas — do
   contrário, spoila o drip (`a-cadencia-editorial`). Enforcement num lugar só:
   `edicoes_publicadas()` / `edicoes_na_linha_tempo()`. Consumidores **não** refazem
   o `array_filter` à mão (um esquecimento = vazamento irreversível).
2. **Legenda/dek/alt-text spoiler-safe** (política conservadora,
   `project-spoiler-policy`): descrevem o **marco de progresso** visível no
   build-in-public, nunca lore/feature não anunciada. Datas são fatos e podem
   aparecer.

## Helpers (`data/edicoes-helpers.php`)

Funções puras (sem I/O, sem DOM — testáveis por `node`/CLI isoladamente):

| Função | Devolve | Para quem |
|---|---|---|
| `edicoes_publicadas($e)` | publicadas, mais nova primeiro | banca, sitemap, RSS |
| `edicoes_na_linha_tempo($e)` | publicadas + visuais, mais antiga primeiro | linha do tempo |
| `edicoes_ultima_atualizacao($e)` | data ISO mais recente, ou `null` | `<lastmod>`/`<lastBuildDate>` |
| `edicoes_ordena_desc($e)` | ordena por `data` desc (interno) | — |

## Crescimento sob o drip

Adicionar uma edição = **+1 entrada** no array (e virar o `estado` quando publicar).
Os quatro consumidores crescem sozinhos pelo mesmo `foreach`; nenhuma navegação
global é re-editada. Cada edição publicada = **+2 URLs** (pt+en) na fórmula do
`IA-WIREFRAME`.

## As 3 que nascem publicadas (cronologia real)

| # | Título | Data (marco) | Frame | No scrubber? |
|---|---|---|---|---|
| 1 | A Gênese | 2026-05-15 | — (gênese textual) | não |
| 2 | Arquitetura | 2026-06-04 | 3D abandonado | não |
| 3 | O Quadrado Azul | 2026-06-22 | quadrado azul jogável | **sim** (1º ponto) |

A #4 fica como `rascunho` de exemplo (não renderizada) só para demonstrar o
mecanismo do flip. #4+ pinga no drip.

## Assets dos frames

Os frames vêm de `resources/frames/` (fora do `public_html`). Ao publicar, o
asset é copiado para `public_html/assets/frames/edicao-N.png` (o caminho web que
está no campo `frame`). Fontes atuais registradas em comentário no `data/edicoes.php`:

- #2 → `resources/frames/gus_3d_visualizacao_xyz__t4s.png`
- #3 → `resources/frames/primeiro_teste_wasd_e_colisao_placeholder_quadradinho__t2s.png`
