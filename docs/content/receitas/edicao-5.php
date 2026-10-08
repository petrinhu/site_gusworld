<?php

declare(strict_types=1);

/**
 * Receita da Edicao #5 (dado puro, sem comportamento): de que blocos de docs/content/ cada secao e feita.
 * Universo do aceite (docs/tecnico/ACEITE-CONVERSOR.md): as 6 secoes de texto corrido, em pt e en.
 * As variantes de cabecalho da #5 sao resolvidas AQUI (inicio/fim/ocorrencia); o .md nao e tocado.
 * Chaves: tipo, partes{pt,en{fonte,inicio,fim,ocorrencia},envolver{tag,id,classe},classe_lista}.
 */

return [
    'secoes' => [
        // Editorial
        3 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'edicao-5-editorial.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-5-editorial.md', 'inicio' => '## EN'],
            ]],
        ],
        // Reportagem de capa + o menu, dentro de uma caixa propria
        4 => [
            'tipo' => 'sequencia',
            'partes' => [
                [
                    'pt' => ['fonte' => 'edicao-5-reportagem.md', 'inicio' => '## pt-BR'],
                    'en' => ['fonte' => 'edicao-5-reportagem.md', 'inicio' => '## EN'],
                ],
                [
                    'pt' => ['fonte' => 'edicao-5-reportagem-menu.md', 'inicio' => '## pt-BR'],
                    'en' => ['fonte' => 'edicao-5-reportagem-menu.md', 'inicio' => '## EN'],
                    'envolver' => ['tag' => 'div', 'id' => 'sec-04-menu'],
                ],
            ],
        ],
        // A Nota (bloco 1 das copies curtas): o pt termina onde o en comeca, sem "---" entre eles
        5 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'edicao-5-copies-curtas.md', 'inicio' => '## 1. Seção 5, A Nota (pt-BR)', 'fim' => '### Seção 5, A Nota (EN)'],
                'en' => ['fonte' => 'edicao-5-copies-curtas.md', 'inicio' => '### Seção 5, A Nota (EN)'],
                'classe_lista' => 'placar',
            ]],
        ],
        // Galeria de Bugs
        6 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'edicao-5-galeria-bugs.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-5-galeria-bugs.md', 'inicio' => '## EN'],
            ]],
        ],
        // Errata + Cartas (bloco 2 das copies curtas, mesma regra do bloco 1)
        9 => [
            'tipo' => 'sequencia',
            'partes' => [
                [
                    'pt' => ['fonte' => 'edicao-5-errata.md', 'inicio' => '## pt-BR'],
                    'en' => ['fonte' => 'edicao-5-errata.md', 'inicio' => '## EN'],
                ],
                [
                    'pt' => ['fonte' => 'edicao-5-copies-curtas.md', 'inicio' => '## 2. Seção 9, Cartas (vazio com graça, D17) (pt-BR)', 'fim' => '### Seção 9, Cartas (EN)'],
                    'en' => ['fonte' => 'edicao-5-copies-curtas.md', 'inicio' => '### Seção 9, Cartas (EN)'],
                ],
            ],
        ],
        // A Entrevista: perguntas (cabecalho proprio no pt) e respostas (o pt abre no primeiro "---")
        16 => [
            'tipo' => 'entrevista',
            'partes' => [
                [
                    'pt' => ['fonte' => 'edicao-5-entrevista-perguntas.md', 'inicio' => '## O texto (pt-br): só as perguntas'],
                    'en' => ['fonte' => 'edicao-5-entrevista-perguntas.md', 'inicio' => '## EN'],
                ],
                [
                    'pt' => ['fonte' => 'edicao-5-entrevista-respostas.md', 'inicio' => '---', 'ocorrencia' => 1],
                    'en' => ['fonte' => 'edicao-5-entrevista-respostas.md', 'inicio' => '## EN'],
                ],
            ],
        ],
    ],
];
