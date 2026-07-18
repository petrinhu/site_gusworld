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
    'wordmark_titulo'  => 'GLYFESSE — voltar à banca',
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
    'scaffold_texto'   => 'Seção em scaffold. A copy definitiva (cheia ou vazio-com-graça, na voz do Gus) é co-decidida com o líder — W5.',

    // rodapé
    'rodape_som_ef_on'  => 'Efeitos: ligados',
    'rodape_som_mus_off'=> 'Música: desligada',
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
