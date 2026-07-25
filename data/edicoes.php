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
        'estado'         => 'rascunho', // sem conteúdo de seção ainda; some da banca até ser produzida
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
        'na_linha_tempo' => true, // 1º (e único, no lançamento) ponto visual do scrubber
    ],

    // ── #4+ · EXEMPLO DE RASCUNHO (NÃO renderizado) ──────────────────────────
    // Demonstra o mecanismo do drip: estado 'rascunho' fica no array mas NUNCA
    // aparece na banca/linha (os helpers o filtram). Publicar = trocar a string
    // abaixo para 'publicada'. Mantido deliberadamente vago e sem frame para
    // não spoilar nada. Preencher titulo/dek/frame reais só na hora de publicar.
    [
        'numero'         => 4,
        'revisao'        => 1,
        'estado'         => 'rascunho',
        'data'           => '2026-06-22',
        'atualizada_em'  => '2026-06-22',
        'slug_pt'        => 'edicao-4',
        'slug_en'        => 'edition-4',
        'titulo_pt'      => '',
        'titulo_en'      => '',
        'dek_pt'         => '',
        'dek_en'         => '',
        'frame'          => null,
        'frame_alt_pt'   => null,
        'frame_alt_en'   => null,
        'na_linha_tempo' => true, // era visual — entrará no scrubber quando publicar
    ],

];
