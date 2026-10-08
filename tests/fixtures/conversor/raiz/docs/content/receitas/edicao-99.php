<?php

declare(strict_types=1);

return [
    'secoes' => [
        3 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'brinquedo.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'brinquedo.md', 'inicio' => '## EN'],
                'classe_lista' => 'placar',
            ]],
        ],
        5 => [
            'tipo' => 'entrevista',
            'partes' => [
                [
                    'pt' => ['fonte' => 'brinquedo-perguntas.md', 'inicio' => '## pt-BR'],
                    'en' => ['fonte' => 'brinquedo-perguntas.md', 'inicio' => '## EN'],
                ],
                [
                    'pt' => ['fonte' => 'brinquedo-respostas.md', 'inicio' => '## pt-BR'],
                    'en' => ['fonte' => 'brinquedo-respostas.md', 'inicio' => '## EN'],
                ],
            ],
        ],
    ],
];
