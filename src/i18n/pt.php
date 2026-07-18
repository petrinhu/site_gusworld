<?php

declare(strict_types=1);

/**
 * src/i18n/pt.php — strings de CHROME FIXO em pt-br.
 *
 * NÃO é framework de i18n: é um array de strings do enquadramento (masthead,
 * índice, rótulos, rodapé). O CONTEÚDO das seções (copy, falas do Gus) NÃO
 * mora aqui — é co-decidido com o líder (W5). Os nomes de seção abaixo são
 * rótulos ESTRUTURAIS da anatomia aprovada, não texto editorial.
 *
 * @return array<string, mixed>
 */

return [
    'html_lang'        => 'pt-br',
    'og_locale'        => 'pt_BR',

    // navegação / a11y
    'skip_indice'      => 'Pular para o índice',
    'wordmark_titulo'  => 'GLYFESSE: voltar à banca',
    'up_indice'        => '↑ índice',
    'up_voltar'        => '↑ voltar ao índice',

    // masthead / expediente
    'exp_ano'          => 'ano',
    'exp_numero'       => 'nº',
    'meses'            => [
        1 => 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho',
        'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro',
    ],

    // a LCD do switch de idioma (mock 13, tratamento A). Esta página é pt →
    // a LCD NAVEGA para a edição em inglês. Rótulos = mostrador de máquina;
    // a LCD NÃO veste o prompt de voz do Gus (project-i18n-switch).
    'lcd' => [
        'l1'   => 'BUILD pt-br',   // rótulo do build atual (informação)
        'cmd'  => 'glyfe --en',    // o comando (a ação)
        // nome acessível = comando visível + o que ele faz (WCAG 2.5.3)
        'sr'   => 'English edition',
    ],

    // ── A BANCA (home) ──
    // Rótulos pixel pequenos (<15px) são minúsculos: o guard N→H
    // (reference-pixelfont-n-maiusculo) rasteriza o N maiúsculo como H. A 'lede'
    // é PLACEHOLDER (texto do mock 10); a copy final é co-decidida no W5.
    'banca' => [
        'lede'         => 'a revista de um jogo que ainda não saiu. escrita por quem mora dentro dele.',
        'skip'         => 'Pular para a banca',
        'secao_titulo' => 'A banca',
        'secao_meta'   => 'edições publicadas',
        'nova'         => 'nova',      // badge da mais recente (minúsculo: guard N→H)
        'jogavel'      => 'jogável',   // selo da edição-hero (é o quadradinho da home)
        'w6_tag'       => 'interativo pendente · w6',
        // os ganchos dos interativos (scaffold; implementação é item W6)
        'ganchos' => [
            'hero'       => ['label' => 'Quadradinho jogável', 'nome' => 'O quadradinho'],
            'pressstart' => ['label' => 'Poster PRESS START',  'nome' => 'PRESS START'],
            'glyfa'      => ['label' => 'A Glyfa: forja de nomes', 'nome' => 'A Glyfa'],
            'album'      => ['label' => 'O álbum de figurinhas', 'nome' => 'O álbum'],
            'chamadas'   => ['label' => 'Chamadas de capa',    'nome' => 'Chamadas de capa'],
        ],
        // O QUADRADINHO (hero real · item W6): rótulos do jogo e a legenda
        // estática (o caminho sem-JS/reduced-motion pra mesma informação).
        'quad' => [
            'sala_aria' => 'Quadradinho jogável: clique e use WASD para mover. O quadrado bate nas paredes e depois vira o Gus.',
            'dpad_aria' => 'Controle direcional',
            'cima'      => 'Mover para cima',
            'baixo'     => 'Mover para baixo',
            'esquerda'  => 'Mover para a esquerda',
            'direita'   => 'Mover para a direita',
            'instr'     => 'clique na tela e use WASD para movimentar',
            'legenda'   => 'maio: um quadrado. agosto: o Gus.',
        ],
        // O PRESS START (pôster da banca · item W6 · D-PRESS-START): os rótulos
        // do fliperama (chrome ASCII na tela; sem N maiúsculo <15px, guard N→H)
        // e a MENSAGEM honesta (a voz do Gus, acentuada). A 'fala' é PLACEHOLDER
        // honesto — a copy definitiva é co-decidida com o líder.
        'press' => [
            'poster_aria' => 'Pôster PRESS START: aperte para ligar o fliperama',
            'press'       => '▶ PRESS START',
            'insert'      => 'CREDITO 1 · FICHAS 0',
            // linhas do BIOS falso (impressas uma a uma no boot; spoiler-safe)
            'boot'        => [
                'GUSWORLD // BOOT',
                'carregando o núcleo... ok',
                'montando o mundo... ok',
                'procurando o jogo...',
            ],
            'boot_ok'     => '▶ BOOT OK',
            'fala'        => 'não dá pra começar de verdade ainda... mas o quadradinho ali em cima anda.',
            'pensa'       => 'eu ando',
            'ir_quad'     => 'ir pro quadradinho ↑',
            'cap'         => 'FIG. · o pôster central. aperte START.',
        ],
        // A LINHA DO TEMPO (scrubber · item W6 · LINHA-TEMPO): a era VISUAL do
        // jogo, do quadrado azul (22 jun) em diante. Rótulos pixel <15px são
        // minúsculos (guard N→H). 'lide'/'vazio'/'slider' não são pixel:
        // acento e maiúscula livres. 'edicao' compõe a legenda "edição #N".
        'linha_tempo' => [
            'titulo' => 'linha do tempo',
            'meta'   => 'era visual',
            'lide'   => 'Arraste o tempo e veja o jogo evoluir: cada ponto é uma edição visual publicada, na data real dela.',
            'dica'   => 'arraste · ou ← → no teclado · ou clique num ponto',
            'slider' => 'Linha do tempo do jogo',
            'edicao' => 'edição',
            'vazio'  => 'A linha do tempo acende quando a primeira edição visual for publicada.',
        ],
        // A GLYFA (forja de nomes · item W6 · GLYFA): combine duas raízes do
        // Sylvarin e veja o nome nascer com o significado. Vocabulário FECHADO =
        // moderação por design (nenhum palavrão sai daqui, TST-GLYFA-PALAVRAO).
        // O nome forjado é grande (≥15px) → guard N→H do pixel não dispara; as
        // glosas são minúsculas → seguras. O léxico (raízes+glosas) vive no
        // core JS: aqui só o chrome (rótulos), sem duplicar o dicionário.
        'glyfa' => [
            'titulo'    => 'a glyfa',
            'meta'      => 'forja de nomes',
            'lide'      => 'No Sylvarin, o idioma do jogo, um nome é feito de raízes. Escolha duas e a forja mostra o que ele significa. O vocabulário é fechado de propósito: nada impróprio nasce daqui.',
            'raiz_a'    => 'primeira raiz',
            'raiz_b'    => 'segunda raiz',
            'mais'      => '+',
            'forjar'    => 'forjar',
            'significa' => 'significa',
            'iguais'    => 'escolha duas raízes diferentes',
            // o exemplo ESTÁTICO (estado-base sem JS): o par que o líder canonizou
            'ex_pre'    => 'exemplo:',
            'ex_a'      => 'mor-',
            'ex_a_g'    => 'sombra',
            'ex_b'      => 'lhin-',
            'ex_b_g'    => 'voz',
            'ex_nome'   => 'Morlhin',
            'ex_sig'    => 'voz-sombra',
            'cap'       => 'FIG. · a forja de nomes. combine duas raízes.',
        ],
        // O ÁLBUM (figurinhas em localStorage · item W6 · ALBUM): cola criança,
        // colecionou adulto. Zero conta, zero dado (só localStorage). ⚠️ O TEMA
        // das figurinhas é PLACEHOLDER: os 13 glifos do Sylvarin (as raízes da
        // Glyfa), desenhados em tipografia — zero arte nova, zero sprite. O tema/
        // arte FINAL é decisão do líder (co-decidido, ainda não definido). Os
        // rótulos pixel são minúsculos (guard N→H); {n}/{total} são trocados no JS.
        'album' => [
            'titulo'    => 'o álbum',
            'meta'      => 'cromos de glifo',
            'lide'      => 'Um álbum de figurinhas, do jeito antigo. Cada cromo é um glifo do Sylvarin. Cole conforme explora o site; a coleção fica salva no seu navegador, sem conta e sem cadastro.',
            'contador'  => '{n} de {total} coladas',   // {n}/{total} trocados no JS
            'completo'  => 'álbum completo!',
            'colar'     => 'colar figurinha',
            'off'       => 'sem memória no navegador: o álbum vale só nesta visita.',
            'falta'     => 'figurinha ainda não colada',
            'colada'    => 'colada',
            'estatico'  => 'as figurinhas se colam conforme você explora o site.',
            // o exemplo colado no estado-base (sem JS): o glifo que o líder canonizou
            'ex_glifo'  => 'mor-',
            'ex_glosa'  => 'sombra',
            'cap'       => 'FIG. · o álbum de cromos. cole os 13 glifos.',
        ],
    ],

    // índice
    'indice_titulo'    => 'Índice',
    'indice_nota'      => 'O índice se monta de $edicoes (a mesma fonte da banca e da linha do tempo). Os 3 links são fixos em toda edição.',

    // os 3 links fixos (canon: anatomia-da-edicao)
    'links_fixos' => [
        'repo_jogo'  => '→ o código do jogo (repo GusWorld)',
        'repo_motor' => '→ o motor gráfico (repo GlintFX)',
        'todo_jogo'  => '→ o TODO.md vivo do jogo',
        'gus'        => 'DUVIDO VOCÊ LER! 🤣',   // legenda do Gus (canon, mock 09)
    ],

    // placeholder de seção em scaffold (NÃO é copy final)
    'scaffold_tag'     => 'conteúdo pendente',
    'scaffold_texto'   => 'Seção em scaffold. A copy definitiva (cheia ou vazio-com-graça, na voz do Gus) é co-decidida com o líder (W5).',

    // rodapé
    'rodape_som_ef'     => 'Efeitos',   // rótulo FIXO: o estado é sinalizado pelo LED (.luz), como no hardware real
    'rodape_som_mus'    => 'Música',
    'rodape_licenca'    => 'Conteúdo sob licença livre. Feito com IA como ferramenta; a parte criativa é do criador.',
    'rodape_contato'    => 'Fale com a redação',

    // 404 (mínimo — a microcopy in-world definitiva é slot do ux-writer + líder)
    'erro_404_titulo'  => 'Página não encontrada',
    'erro_404_texto'   => 'Esta edição não existe (ainda) ou o endereço mudou.',
    'erro_404_voltar'  => 'Voltar à banca',

    // nomes ESTRUTURAIS das seções (rótulos da anatomia, não conteúdo)
    'grupos' => [
        'abertura'   => 'abertura',
        'corpo'      => 'corpo',
        'fixa'       => 'seção fixa',
        'encarte'    => 'encarte',
        'expert'     => 'expert',
        'fechamento' => 'fechamento',
    ],
    'secoes' => [
        'editorial'     => 'Editorial · a Carta do Gus',
        'reportagem'    => 'Reportagem de capa',
        'nota'          => 'A Nota do jogo inacabado',
        'bugs'          => 'Galeria de Bugs',
        'cemiterio'     => 'Cemitério das Ideias Mortas',
        'detonado'      => 'Detonado',
        'errata'        => 'Errata + Cartas',
        'classificados' => 'Classificados in-world',
        'hq'            => 'HQ · a tirinha',
        'proximos'      => 'Próximos Lançamentos',
        'poster'        => 'Pôster central',
        'brinde'        => 'Brinde colado na capa',
        'cupom'         => 'Cupom recortável',
        'entrevista'    => 'A Entrevista',
        'programacao'   => 'Seção de Programação',
        'bus'           => 'O Gus lê o bus',
        'expediente'    => 'Expediente',
    ],
];
