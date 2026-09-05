<?php

declare(strict_types=1);

/**
 * data/edicoes.php — a FONTE DE DADOS ÚNICA da Glyfesse (`$edicoes`).
 *
 * Item de board: CRONOLOGIA-DADOS. Este array é o motor único que a BANCA, a
 * LINHA DO TEMPO (scrubber), o SITEMAP.XML e os 2 FEEDS RSS percorrem num
 * `foreach`. Um só lugar de verdade — publicar uma edição é trocar
 * `estado` de 'rascunho' para 'publicada' AQUI, sem tocar em HTML.
 *
 * Uso: `$edicoes = require __DIR__ . '/edicoes.php';`
 * Filtros seguros (por estado / linha do tempo) em `data/edicoes-helpers.php`.
 *
 * ────────────────────────────────────────────────────────────────────────────
 * INVARIANTES (as duas são irreversíveis; quebrar = dano público permanente):
 *
 * 1. NUNCA renderizar 'rascunho' na banca nem na linha do tempo — isso spoila
 *    o drip (a cadência editorial). Sempre filtre por estado 'publicada' antes
 *    de exibir. Use `edicoes_publicadas()` — não refaça o filtro à mão em cada
 *    consumidor (um esquecimento = vazamento). Ver a-cadencia-editorial.
 *
 * 2. Toda legenda/dek/alt-text é SPOILER-SAFE (política conservadora,
 *    project-spoiler-policy): descreve o MARCO DE PROGRESSO (o que ficou
 *    visível no build-in-public), nunca lore/feature não anunciada. Datas são
 *    fatos e podem aparecer ("ponha a data das coisas" — o líder). Alt-text é
 *    texto público (AUD-SPOILER) — vale a mesma régua.
 * ────────────────────────────────────────────────────────────────────────────
 *
 * Crescimento (a IA é estável sob o drip): adicionar uma edição = +1 entrada
 * neste array. Os 4 consumidores crescem sozinhos pelo mesmo `foreach`; nenhuma
 * navegação global é re-editada. Ver docs/schema-edicoes.md.
 *
 * Datas: cronologia REAL dos 717 commits do jogo (cronologia-real-datada).
 * Nasce com 3 edições publicadas (#1, #2, #3 — até o quadrado azul). #4+ pinga.
 */

return [

    // ── #1 · A GÊNESE ────────────────────────────────────────────────────────
    // 15/mai/2026: data INICIAL fixada (1º commit rastreável; ebooks + RAG de
    // imediatamente antes, pré-git). A escrita vem antes da compilação — é o
    // `glyfe`. Sem screenshot: a gênese é texto, não imagem jogável.
    [
        'numero'         => 1,
        'revisao'        => 3, // rev.3: home reordenada (banca, linha do tempo, album, glyfa, cupom, brinquedos); chamadas W6 ocultas
        'estado'         => 'publicada',
        'data'           => '2026-05-15',
        'atualizada_em'  => '2026-05-15',
        'slug_pt'        => 'edicao-1',
        'slug_en'        => 'edition-1',
        'titulo_pt'      => 'A Gênese',
        'titulo_en'      => 'The Genesis',
        'dek_pt'         => 'Antes de existir uma linha de código, existiu o texto: '
                          . 'um acervo de ebooks, uma máquina de leitura e um mundo '
                          . 'nascendo em palavras.',
        'dek_en'         => 'Before a single line of code, there was text: a shelf of '
                          . 'ebooks, a reading machine, and a world being born in words.',
        'frame'          => null, // gênese textual — sem captura
        'frame_alt_pt'   => null,
        'frame_alt_en'   => null,
        // Card social desta edição: o card feito PARA o lançamento dela (é o
        // mesmo arquivo que serve de default do head.php). Declarado aqui para
        // que `?ed=1` resolva no card DELA em vez de cair no default por acaso,
        // e para que a capa da estante seja este card.
        'og_image'       => '/assets/og-launch.jpg',
        // A CAPA da estante em INGLÊS (ordem do líder, 2026-07-25). Só a ARTE da
        // prateleira do /en/ troca; o card SOCIAL acima segue em português nos
        // dois idiomas (o preview de post publicado é irreversível). Gerador:
        // docs/design/og-card-en.html. Campo OPCIONAL: sem ele, o /en/ mostra a
        // arte em português (capa_estante() faz o fallback).
        'capa_en'        => '/assets/og-edicao-1-en.jpg',
        'na_linha_tempo' => false, // era textual: fora do scrubber (só era visual)
    ],

    // ── #2 · ARQUITETURA ─────────────────────────────────────────────────────
    // 19/mai a 4/jun/2026: as primeiras engines, as fundações, e um Gus 3D que
    // ainda estava sendo tentado (a morte dele é de junho: vai para a #3, não
    // para cá). Ainda pré-era-visual jogável: fora do scrubber.
    [
        'numero'         => 2,
        'revisao'        => 1,
        'estado'         => 'publicada', // publicada em 2026-07-24 (rev.1): conteúdo completo, prova final E4 passada, card OG próprio
        'data'           => '2026-06-04',
        'atualizada_em'  => '2026-06-04',
        'slug_pt'        => 'edicao-2',
        'slug_en'        => 'edition-2',
        'titulo_pt'      => 'Arquitetura',
        'titulo_en'      => 'Architecture',
        'dek_pt'         => 'As primeiras engines, as escolhas de fundação. E um Gus '
                          . 'em 3D, do jeito que ele foi.',
        'dek_en'         => 'The first engines, the foundation choices. And a 3D Gus, '
                          . 'exactly as he was.',
        // ⚠️ #2 SEM FRAME (2026-07-18): o frame original (gus_3d_visualizacao) era uma
        // FOTO DE TELA com conteúdo pessoal do líder (abas de navegador) — REMOVIDO do
        // repo. A #2 fica sem capa, como a #1 (gênese textual), até haver um frame LIMPO
        // do 3D abandonado. Decisão do líder pendente (recorte/substituição/sem-capa).
        'frame'          => null,
        'frame_alt_pt'   => null,
        'frame_alt_en'   => null,
        // Card social próprio (1200x630) desta edição: o Gus 3D de pé sobre o
        // chão em perspectiva. Gerador em docs/design/og-card-2.html. Campo
        // OPCIONAL: quem não o traz cai no default /assets/og-launch.jpg.
        'og_image'       => '/assets/og-edicao-2.jpg',
        // A CAPA da estante em INGLÊS (ver a nota da #1). Gerador:
        // docs/design/og-card-2-en.html (o mesmo desenho, só o texto muda).
        'capa_en'        => '/assets/og-edicao-2-en.jpg',
        'na_linha_tempo' => false, // 3D abandonado: não é a era visual 2D do scrubber
    ],

    // ── #3 · O QUADRADO AZUL ─────────────────────────────────────────────────
    // 22/jun/2026: a primeira coisa jogável de verdade. É onde a era VISUAL
    // começa (1º ponto do scrubber) e é a edição que sai junto do quadradinho
    // da primeira dobra — banca e home batem.
    [
        'numero'         => 3,
        'revisao'        => 1,
        'estado'         => 'publicada', // conteúdo das 17 seções montado em src/content/edicao-3/
        'data'           => '2026-06-22',
        'atualizada_em'  => '2026-06-22',
        'slug_pt'        => 'edicao-3',
        'slug_en'        => 'edition-3',
        'titulo_pt'      => 'O Quadrado Azul',
        'titulo_en'      => 'The Blue Square',
        'dek_pt'         => 'A primeira coisa jogável: um quadrado azul que anda, '
                          . 'escorrega e esbarra nas paredes.',
        'dek_en'         => 'The first playable thing: a blue square that walks, '
                          . 'slides, and bumps into walls.',
        // Fonte física: resources/frames/primeiro_teste_wasd_e_colisao_placeholder_quadradinho__t2s.png
        // Publicar em: public_html/assets/frames/edicao-3.png
        'frame'          => '/assets/frames/edicao-3.png',
        'frame_alt_pt'   => 'Um quadrado azul num cenário de teste, o primeiro protótipo jogável.',
        'frame_alt_en'   => 'A blue square in a test scene, the first playable prototype.',
        // Card social próprio (1200x630) desta edição: a captura real do
        // primeiro protótipo, dentro da tela. Gerador em docs/design/og-card-3.html.
        // Sem ele, a MAIS NOVA (esta) derrubava o og:image da home no default
        // /assets/og-launch.jpg — a porta da frente saía com o card de lançamento.
        'og_image'       => '/assets/og-edicao-3.jpg',
        // A CAPA da estante em INGLÊS (ver a nota da #1). Gerador:
        // docs/design/og-card-3-en.html (o mesmo desenho, só o texto muda).
        'capa_en'        => '/assets/og-edicao-3-en.jpg',
        // UPTIME das sessões de trabalho no expediente do masthead. Da #3 EM
        // DIANTE (decisão do líder: a #1 e a #2 ficam sem o campo, e por isso
        // sem a linha). Mapa projeto => HORAS; os dias saem derivados no PHP.
        // ⚠️ O número é CAPTURADO no publish (`scripts/uptime-sessoes.sh`) e
        // fica CONGELADO: a Hostinger não enxerga a máquina do líder, e cada
        // edição é registro histórico datado. Re-capturar ao publicar de fato.
        'uptime'         => ['jogo' => 234, 'glintfx' => 234], // capturado em 04/08/2026 16:52
        'na_linha_tempo' => true, // 1º (e único, no lançamento) ponto visual do scrubber
    ],

    // ── #4 · O ROSTO E A VOZ ──────────────────────────────────────────────────
    // Publicada em 03/09/2026: o mecanismo do drip fez a travessia completa
    // (estado 'rascunho' → 'publicada'), a edição sai da banca/linha do zero.
    [
        'numero'         => 4,
        'revisao'        => 1,
        'estado'         => 'publicada',
        'data'           => '2026-07-06',
        'atualizada_em'  => '2026-09-03',
        'slug_pt'        => 'edicao-4',
        'slug_en'        => 'edition-4',
        'titulo_pt'      => 'O Rosto e a Voz',
        'titulo_en'      => 'The Face and the Voice',
        'dek_pt'         => 'Um rosto chegou para o quadrado azul, e semanas depois '
                          . 'alguém no mundo abriu a boca para responder pela primeira vez.',
        'dek_en'         => 'A face arrived for the blue square, and weeks later '
                          . 'somebody in the world finally opened their mouth to answer.',
        // Fonte física: resources/frames/primeiro_teste_animacao_gus_pixelado_varios_sprites__t8s.png
        // Publicar em: public_html/assets/frames/edicao-4.png
        'frame'          => '/assets/frames/edicao-4.png',
        'frame_alt_pt'   => 'O personagem Gus em corpo inteiro: cabelo laranja '
                          . 'espetado, óculos táticos ciano, casaco preto, punhos cerrados '
                          . 'sobre um fundo esverdeado.',
        'frame_alt_en'   => 'The character Gus in full body: spiky orange hair, '
                          . 'cyan tactical goggles, black coat, fists clenched against a '
                          . 'greenish background.',
        // Card social próprio (1200x630) desta edição. Gerador em
        // docs/design/og-card-4.html. Campo OPCIONAL: quem não o traz cai no
        // default /assets/og-launch.jpg — mas como #4 é a MAIS NOVA no momento
        // de publicar, é o og:image dela que a home passa a mostrar por padrão
        // (a #3 já pagou esse preço uma vez com o card faltando; não repetir).
        'og_image'       => '/assets/og-edicao-4.jpg',
        // A CAPA da estante em INGLÊS (decisão do líder, 2026-07-25 — ver a
        // nota da #1). Gerador: docs/design/og-card-4-en.html (o mesmo
        // desenho, só o texto muda).
        'capa_en'        => '/assets/og-edicao-4-en.jpg',
        // UPTIME das sessões de trabalho no expediente do masthead (ver a
        // nota da #3). Capturado no publish real via `scripts/uptime-sessoes.sh`
        // e CONGELADO: registro histórico datado, não um contador vivo.
        'uptime'         => ['jogo' => 108, 'glintfx' => 108], // capturado em 03/09/2026 22:51
        'na_linha_tempo' => true, // era visual — entrará no scrubber quando publicar
    ],

    // ── #5 · O QUE PARECIA CONFERIDO ──────────────────────────────────────────
    // Janela: 22/jul a 8/ago/2026. `data` = 2026-07-22 (D11, decidida pelo líder
    // em 04/09/2026): a data é o dia de abertura da janela, pelo critério das
    // edições anteriores (datam pelo marco de abertura); a janela por extenso
    // ("de 22 de julho a 7 de agosto") vai no 1º parágrafo da Reportagem de
    // capa, não aqui. Título e dek: D10, decididos pelo líder em 04/09/2026
    // (docs/editorial/PAUTA-EDICAO-5.md, §7) — copiados verbatim.
    // ⚠️ RASCUNHO: não publicar (estado permanece 'rascunho' até ordem do líder).
    [
        'numero'         => 5,
        'revisao'        => 1,
        'estado'         => 'rascunho',
        'data'           => '2026-07-22',
        'slug_pt'        => 'edicao-5',
        'slug_en'        => 'edition-5',
        'titulo_pt'      => 'O Que Parecia Conferido',
        'titulo_en'      => 'What Looked Checked',
        'dek_pt'         => 'Tiraram o jogo velho de baixo do novo com todo o cuidado, '
                          . 'e o que se perdeu estava fora do alcance do cuidado. Semanas '
                          . 'depois, dois jogaram o jogo novo inteiro: um foi procurar onde '
                          . 'ele quebrava, e depois perguntou o tamanho dele.',
        'dek_en'         => 'They pulled the old game out from under the new one with '
                          . 'every care, and what got lost sat just outside that care\'s '
                          . 'reach. Weeks later, two people played the new game start to '
                          . 'finish: one went looking for where it would break, and then '
                          . 'asked how big it was.',
        // O plano de `frame` sair dos dois prints do achado do Gus Dragon de
        // 07/08/2026 (D6) morreu: o líder entregou, em 05/09/2026, um arquivo
        // diferente (o brasão da família de Gus - o personagem, não o Gus
        // Dragon playtester -, também logo do jogo GusWorld; imagem do
        // repositório do jogo (que é READ-ONLY), recebida em 05/09/2026,
        // com sha256 conferido idêntico contra a cópia em
        // public_html/assets/edicao-5/logo-gusworld.jpg).
        // `image-rendering:pixelated` em .capa-frame/.ed-frame/.lt-item-frame
        // (edicao.css) é CONSCIENTE, não defeito: o líder viu a comparação
        // renderizada e decidiu manter a regra herdada mesmo a peça não sendo
        // pixel art (decisão de 05/09/2026, mesma que vale para .chapa.retrato
        // do pôster em sec-13.php). O alt abaixo é o de CAPA/banca/linha do
        // tempo - descreve a mesma figura do pôster, sem a moldura de "pôster
        // central"; conferido contra o alt do pôster, não copiado por reflexo.
        'frame'          => '/assets/edicao-5/logo-gusworld.jpg',
        'frame_alt_pt'   => 'O brasão da família de Gus e o logo do jogo '
                          . 'GusWorld: um dragão estilizado em linhas '
                          . 'angulares, com o corpo enrolado em espiral, '
                          . 'entalhado em relevo numa laje de pedra escura. '
                          . 'Os sulcos do entalhe brilham em vermelho, as '
                          . 'pontas das asas são de cobre escurecido, e fios '
                          . 'de fumaça sobem dos sulcos.',
        'frame_alt_en'   => "The coat of arms of Gus's family and the "
                          . 'GusWorld game logo: a stylized angular dragon, '
                          . 'its body coiled into a spiral, carved in relief '
                          . 'into a dark stone slab. The carved grooves glow '
                          . 'red, the wing tips are dark oxidized copper, and '
                          . 'wisps of smoke rise from the grooves.',
        // Card social próprio (1200x630) desta edição. Gerador em
        // docs/design/og-card-5.html (o par pt/en, mesmo padrão da #4).
        'og_image'       => '/assets/og-edicao-5.jpg',
        // A CAPA da estante em INGLÊS (decisão do líder, 2026-07-25 — ver a
        // nota da #1). Gerador: docs/design/og-card-5-en.html (o mesmo
        // desenho, só o texto muda).
        'capa_en'        => '/assets/og-edicao-5-en.jpg',
        'na_linha_tempo' => true, // era visual — entrará no scrubber quando publicar
    ],

];
