<?php

declare(strict_types=1);

/**
 * src/i18n/en.php — fixed CHROME strings in English. Twin of src/i18n/pt.php.
 *
 * Not an i18n framework: a plain string map for the frame (masthead, index,
 * labels, footer). Section CONTENT (copy, Gus's lines) does NOT live here — it
 * is co-decided with the lead (W5). The section names below are STRUCTURAL
 * labels from the approved anatomy, not editorial text.
 *
 * @return array<string, mixed>
 */

return [
    'html_lang'        => 'en',
    'og_locale'        => 'en_US',

    // navigation / a11y
    'skip_indice'      => 'Skip to contents',
    'wordmark_titulo'  => 'GLYFESSE: back to the stand',
    'up_indice'        => '↑ contents',
    'up_voltar'        => '↑ back to contents',
    // the 3 exits from ONE edition back to the STAND (home): top (wordmark
    // label), end (in Gus's voice) and the 1st index entry.
    'topo_banca'       => 'newsstand',
    'voltar_banca'     => 'back to the newsstand',
    'indice_banca'     => 'the newsstand',

    // masthead / imprint
    'exp_ano'          => 'year',
    'exp_numero'       => 'no.',
    // lay versioning in the masthead (Vol.Ed.Rev): "vol. 1 · no. 3 [· rev. 2]".
    // ⚠️ lowercase on purpose: .meta is PixelOperatorMono at 11px, below the 15px
    // N→H guard (reference-pixelfont-n-maiusculo). A capital "No." is fine (no N?
    // "No" HAS a capital N → renders as "Ho"), and capital "V" reads as "U". So
    // lowercase mirrors the pt side and the house rule for tiny pixel labels.
    'exp_vol'          => 'vol.',
    'exp_num'          => 'no.',
    'exp_rev'          => 'rev.',
    'meses'            => [
        1 => 'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December',
    ],

    // language switch LCD (mock 13, treatment A). This page is en → the LCD
    // NAVIGATES to the Portuguese edition. Labels = a machine readout; the LCD
    // never wears Gus's voice prompt (project-i18n-switch).
    'lcd' => [
        'l1'   => 'BUILD en',
        'cmd'  => 'glyfe --pt',
        'sr'   => 'Edição em português',
    ],

    // ── THE STAND (home) ──
    // Small pixel labels (<15px) are lowercase: the N→H guard
    // (reference-pixelfont-n-maiusculo) renders an uppercase N as an H. 'lede'
    // is a PLACEHOLDER (mock 10 text); final copy is co-decided in W5.
    'banca' => [
        'lede'         => 'the magazine of a game that has not shipped yet. written by someone who lives inside it.',
        'skip'         => 'Skip to the stand',
        'secao_titulo' => 'The stand',
        'secao_meta'   => 'published editions',
        'secao_meta_um' => 'published edition',
        'nova'         => 'new',
        'jogavel'      => 'playable',
        'cta'          => 'Read the issue',
        'w6_tag'       => 'interactive pending · w6',
        'ganchos' => [
            'hero'       => ['label' => 'Playable square',    'nome' => 'The square'],
            'pressstart' => ['label' => 'PRESS START poster', 'nome' => 'PRESS START'],
            'glyfa'      => ['label' => 'The Glyfa: name forge', 'nome' => 'The Glyfa'],
            'album'      => ['label' => 'The sticker album',   'nome' => 'The album'],
            'cupom'      => ['label' => 'The cut-out coupon: the poll', 'nome' => 'The coupon'],
            'chamadas'   => ['label' => 'Cover blurbs',       'nome' => 'Cover blurbs'],
        ],
        // THE SQUARE (real hero · W6 item): game labels + the static caption
        // (the no-JS / reduced-motion path to the same information).
        'quad' => [
            'sala_aria' => 'Playable square: click and use WASD to move. The square bumps into the walls, then turns into Gus.',
            'dpad_aria' => 'Directional pad',
            'cima'      => 'Move up',
            'baixo'     => 'Move down',
            'esquerda'  => 'Move left',
            'direita'   => 'Move right',
            'instr'     => 'click the screen and use WASD to move',
            'legenda'   => 'may: a square. august: Gus.',
        ],
        // PRESS START (stand poster · W6 item · D-PRESS-START): arcade labels
        // (ASCII screen chrome; no uppercase N under 15px, N→H guard) and the
        // honest MESSAGE (Gus's voice). 'fala' is an honest PLACEHOLDER — the
        // final copy is co-decided with the lead.
        'press' => [
            'poster_aria' => 'PRESS START poster: press to boot the arcade',
            'press'       => '▶ PRESS START',
            'insert'      => 'CREDIT 1 · TOKENS 0',
            'boot'        => [
                'GUSWORLD // BOOT',
                'loading the core... ok',
                'building the world... ok',
                'looking for the game...',
            ],
            'boot_ok'     => '▶ BOOT OK',
            'fala'        => "can't really start yet... but the little square up there does move.",
            'pensa'       => 'i move',
            'ir_quad'     => 'go to the square ↑',
            'cap'         => 'FIG. · the center poster. press START.',
        ],
        // THE TIMELINE (scrubber · W6 item · LINHA-TEMPO): the game's VISUAL era,
        // from the blue square (Jun 22) onward. Pixel labels under 15px stay
        // lowercase (N→H guard). 'lide'/'vazio'/'slider' are not pixel: accents
        // and caps are free. 'edicao' composes the "edition #N" caption.
        'linha_tempo' => [
            'titulo' => 'timeline',
            'meta'   => 'visual era',
            'lide'   => 'Drag the time and watch the game evolve: each dot is a published visual edition, on its real date.',
            'dica'   => 'drag · or ← → on the keyboard · or click a dot',
            'slider' => 'Game timeline',
            'edicao' => 'edition',
            'vazio'  => 'The timeline lights up once the first visual edition is published.',
        ],
        // THE GLYFA (name forge · W6 item · GLYFA): combine two Sylvarin roots
        // and watch the name appear with its meaning. The vocabulary is CLOSED =
        // moderation by design (no profanity comes out, TST-GLYFA-PALAVRAO). The
        // forged name is large (>=15px) → pixel N→H guard won't fire; the glosses
        // are lowercase → safe. The lexicon (roots+glosses) lives in the JS core:
        // here only the chrome (labels), no duplicated dictionary.
        'glyfa' => [
            'titulo'    => 'the glyfa',
            'meta'      => 'name forge',
            'lide'      => "In Sylvarin, the game's language, a name is made of roots. Pick two and the forge shows what it means. The vocabulary is closed on purpose: nothing improper is born here.",
            'raiz_a'    => 'first root',
            'raiz_b'    => 'second root',
            'mais'      => '+',
            'forjar'    => 'forge',
            'significa' => 'means',
            'iguais'    => 'pick two different roots',
            'ex_pre'    => 'example:',
            'ex_a'      => 'mor-',
            'ex_a_g'    => 'shadow',
            'ex_b'      => 'lhin-',
            'ex_b_g'    => 'voice',
            'ex_nome'   => 'Morlhin',
            'ex_sig'    => 'voice-shadow',
            'cap'       => 'FIG. · the name forge. combine two roots.',
        ],
        // THE ALBUM (stickers in localStorage · W6 item · ALBUM): kids stick it,
        // adults COLLECTED it. Zero account, zero data (localStorage only). ⚠️ The
        // sticker THEME is a PLACEHOLDER: the 13 Sylvarin glyphs (the Glyfa roots),
        // drawn in typography — no new art, no character sprite. The final theme/
        // art is the lead's call (co-decided, not defined yet). Pixel labels stay
        // lowercase (N→H guard); {n}/{total} are swapped in JS.
        'album' => [
            'titulo'    => 'the album',
            'meta'      => 'glyph stickers',
            'lide'      => 'A sticker album, the old-fashioned way. Each sticker is a Sylvarin glyph. Stick them as you explore the site; the collection is saved in your browser, no account, no sign-up.',
            'contador'  => '{n} of {total} stuck',    // {n}/{total} swapped in JS
            'completo'  => 'album complete!',
            'colar'     => 'stick a sticker',
            'off'       => 'no browser memory: the album only lasts this visit.',
            'falta'     => 'sticker not stuck yet',
            'colada'    => 'stuck',
            'estatico'  => 'stickers get stuck as you explore the site.',
            'ex_glifo'  => 'mor-',
            'ex_glosa'  => 'shadow',
            'cap'       => 'FIG. · the sticker album. stick all 13 glyphs.',
        ],
        // THE COUPON (cut-out · W6 item · CUPOM): the site's ONLY live backend (the
        // poll). Cut it out, pick, send it back — the result comes in the NEXT
        // edition (slowness as an aesthetic: an open poll = "waiting", not a dead
        // site). Zero account, zero data (localStorage only marks "already voted",
        // best-effort). ⚠️ The QUESTION and OPTIONS are PLACEHOLDER — the lead sets
        // the real ones later; swapping = swapping the 'opcoes' array here + the
        // client (cupom-core.js) and server (api/cupom-voto.php) whitelists. Degrades
        // without JS: a native <form method=post>. Pixel labels are lowercase (N→H guard).
        // ⚠️ The vote response shows the result LIVE, but ONLY as a % (never the
        // absolute count — lead's decision 2026-07-19). Labels below are the REAL
        // copy (co-decided); the slugs do NOT change (the whitelist matches 1:1).
        'cupom' => [
            'titulo'    => 'the coupon',
            'meta'      => 'cut-out poll',
            'lide'      => 'The edition coupon: cut along the dotted line, pick one and send it back. The result comes in the next edition. A magazine poll is in no hurry.',
            'pergunta'  => 'What do you want more of in the next Glyfesse?',
            'legenda'   => 'pick one and send the coupon back',
            'opcoes'    => [
                'mais-jogo'       => 'more game',
                'mais-bastidores' => 'more behind-the-scenes',
                'mais-gus'        => 'more Gus',
            ],
            'recorte'   => 'cut here',
            'enviar'    => 'send the coupon',
            'rasgar'    => 'tear along the dotted line',
            'desfazer'  => 'stick it back',
            'espera'    => 'live result, edition by edition',
            // the RESULT (server-rendered when the cookie says "already voted" + the
            // client paints it after voting). Proportion only — no absolute count.
            'resultado'    => 'what the stand wants (so far)',
            'res_nota'     => 'live · proportion only, no absolute count',
            'res_vazia'    => 'the box is still empty here. be the first.',
            'voto_seu'     => 'your vote',
            'obrigado'  => 'coupon in the box. see how the vote is going.',
            'ja_votou'  => 'you already sent your coupon. see how the vote is going.',
            'erro'      => 'could not send right now. try again in a bit.',
            'off'       => 'no browser memory: your coupon counts, I just won\'t remember you voted.',
            'cap'       => 'FIG. · the cut-out coupon. pick one and send it back.',
        ],
    ],

    // index
    'indice_titulo'    => 'Contents',
    'indice_nota'      => 'The index builds itself from $edicoes (the same source as the stand and the timeline). The 3 links are fixed in every edition.',

    // the 3 fixed links (canon: edition anatomy)
    'links_fixos' => [
        'repo_jogo'  => '→ the game code (GusWorld repo)',
        'repo_motor' => '→ the graphics engine (GlintFX repo)',
        'todo_jogo'  => "→ the game's live TODO.md",
        'gus'        => "BET YOU WON'T READ IT! 🤣",
    ],

    // section scaffold placeholder (NOT final copy)
    'scaffold_tag'     => 'content pending',
    'scaffold_texto'   => "Section scaffold. The final copy (full or graceful-empty, in Gus's voice) is co-decided with the lead (W5).",

    // footer
    'rodape_som_ef'     => 'Effects',   // FIXED label: state is signaled by the LED (.luz), like real hardware
    'rodape_som_mus'    => 'Music',
    'rodape_licenca'    => 'Content under a free license. Made with AI as a tool; the creative part is the creator\'s.',
    'rodape_contato'    => 'Contact the newsroom',
    'build_tag_aria'    => 'version of this edition',   // aria-label of the build stamp (expert)

    // 404 (minimal — the in-world microcopy is a ux-writer + lead slot)
    'erro_404_titulo'  => 'Page not found',
    'erro_404_texto'   => 'This edition does not exist (yet) or the address changed.',
    'erro_404_voltar'  => 'Back to the stand',

    // STRUCTURAL section names (anatomy labels, not content)
    'grupos' => [
        'abertura'   => 'opening',
        'corpo'      => 'body',
        'fixa'       => 'standing',
        'encarte'    => 'insert',
        'expert'     => 'expert',
        'fechamento' => 'closing',
    ],
    'secoes' => [
        'editorial'     => "Editorial · Gus's Letter",
        'reportagem'    => 'Cover Story',
        'nota'          => "The Unfinished Game's Score",
        'bugs'          => 'Bug Gallery',
        'cemiterio'     => 'Graveyard of Dead Ideas',
        'detonado'      => 'Walkthrough',
        'errata'        => 'Errata + Letters',
        'classificados' => 'In-world Classifieds',
        'hq'            => 'Comic Strip',
        'proximos'      => 'Upcoming Releases',
        'poster'        => 'Centerfold Poster',
        'brinde'        => 'Cover-mounted Freebie',
        'cupom'         => 'Cut-out Coupon',
        'entrevista'    => 'The Interview',
        'programacao'   => 'Programming Section',
        'bus'           => 'Gus Reads the Bus',
        'expediente'    => 'Colophon',
    ],
];
