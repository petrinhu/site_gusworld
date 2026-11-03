<?php

declare(strict_types=1);

/**
 * Receita da Edicao #7 (dado puro, sem comportamento). Fora daqui, de proposito (feitas a mao, como na #6):
 * Cemiterio (7), Errata + Cartas (9, papel pautado), Classificados (10), HQ (11), Proximos (12), Poster (13),
 * Brinde (14), Cupom (15), Programacao (17), Bus (18) e Expediente (19).
 */

return [
    'secoes' => [
        3 => ['tipo' => 'prosa', 'partes' => [[
            'pt' => ['fonte' => 'edicao-7-editorial.md', 'inicio' => '## pt-BR'],
            'en' => ['fonte' => 'edicao-7-editorial.md', 'inicio' => '## EN'],
        ]]],
        4 => ['tipo' => 'sequencia', 'partes' => [
            [
                'pt' => ['fonte' => 'edicao-7-reportagem.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-7-reportagem.md', 'inicio' => '## EN'],
            ],
            [
                'pt' => ['fonte' => 'edicao-7-caixa-determinismo.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-7-caixa-determinismo.md', 'inicio' => '## EN'],
                'envolver' => ['tag' => 'div', 'id' => 'sec-04-determinismo'],
            ],
        ]],
        5 => ['tipo' => 'prosa', 'partes' => [[
            'pt' => ['fonte' => 'edicao-7-copies-curtas.md', 'inicio' => '## pt-BR', 'ocorrencia' => 1],
            'en' => ['fonte' => 'edicao-7-copies-curtas.md', 'inicio' => '## EN', 'ocorrencia' => 1],
            'classe_lista' => 'placar',
        ]]],
        6 => ['tipo' => 'prosa', 'partes' => [[
            'pt' => ['fonte' => 'edicao-7-galeria-bugs.md', 'inicio' => '## pt-BR'],
            'en' => ['fonte' => 'edicao-7-galeria-bugs.md', 'inicio' => '## EN'],
        ]]],
        8 => ['tipo' => 'prosa', 'partes' => [[
            'pt' => ['fonte' => 'edicao-7-copies-curtas.md', 'inicio' => '## pt-BR', 'ocorrencia' => 2],
            'en' => ['fonte' => 'edicao-7-copies-curtas.md', 'inicio' => '## EN', 'ocorrencia' => 2],
        ]]],
        16 => ['tipo' => 'entrevista', 'partes' => [
            [
                'pt' => ['fonte' => 'edicao-7-entrevista-brunus-perguntas.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-7-entrevista-brunus-perguntas.md', 'inicio' => '## EN'],
            ],
            [
                'pt' => ['fonte' => 'edicao-7-entrevista-brunus-respostas.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-7-entrevista-brunus-respostas.md', 'inicio' => '## EN'],
                'verbatim' => true,
            ],
        ]],
    ],
];
