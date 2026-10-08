<?php

declare(strict_types=1);

/**
 * Receita da Edicao #6 (dado puro, sem comportamento): de que blocos de docs/content/ cada secao e feita.
 * Universo: as secoes de texto corrido da #6 que ja tem fonte aprovada e seguem o dialeto (docs/content/DIALETO.md).
 * Da #6 em diante os cabecalhos sao `## pt-BR` e `## EN`; quando o mesmo cabecalho se repete no arquivo
 * (edicao-6-copies-curtas.md), a ocorrencia escolhe o bloco (tabela de ocorrencias nas Notas de producao da fonte).
 * Fora daqui, de proposito: Editorial (3) e Bus (18) esperam o texto; Entrevista (16) espera a decisao sobre a R4 (ver abaixo); Cemiterio (7), Programacao (17), HQ (11),
 * Proximos (12), Poster (13) e Expediente (19) sao molde a mao (PLANO-CONVERSOR 2.5).
 * Chaves: tipo, partes{pt,en{fonte,inicio,fim,ocorrencia},envolver{tag,id,classe},classe_lista}.
 */

return [
    'secoes' => [
        // Reportagem de capa
        4 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'edicao-6-reportagem.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-6-reportagem.md', 'inicio' => '## EN'],
            ]],
        ],
        // A Nota (peca 1 das copies curtas)
        5 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'edicao-6-copies-curtas.md', 'inicio' => '## pt-BR', 'ocorrencia' => 1],
                'en' => ['fonte' => 'edicao-6-copies-curtas.md', 'inicio' => '## EN', 'ocorrencia' => 1],
                'classe_lista' => 'placar',
            ]],
        ],
        // Galeria de Bugs
        6 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'edicao-6-galeria-bugs.md', 'inicio' => '## pt-BR'],
                'en' => ['fonte' => 'edicao-6-galeria-bugs.md', 'inicio' => '## EN'],
            ]],
        ],
        // Detonado, vazio com graca (peca 2)
        8 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'edicao-6-copies-curtas.md', 'inicio' => '## pt-BR', 'ocorrencia' => 2],
                'en' => ['fonte' => 'edicao-6-copies-curtas.md', 'inicio' => '## EN', 'ocorrencia' => 2],
            ]],
        ],
        // Errata + Cartas, vazio com graca (peca 3)
        9 => [
            'tipo' => 'prosa',
            'partes' => [[
                'pt' => ['fonte' => 'edicao-6-copies-curtas.md', 'inicio' => '## pt-BR', 'ocorrencia' => 3],
                'en' => ['fonte' => 'edicao-6-copies-curtas.md', 'inicio' => '## EN', 'ocorrencia' => 3],
            ]],
        ],
        // A Entrevista (16) FICA FORA desta receita por enquanto: a fonte aprovada
        // (edicao-6-entrevista-perguntas.md) reprova a trava R4 em 7 linhas (52, 60, 79, 83, 110, 136, 154:
        // a marca // ou /* */ contradiz o comprimento) e o gerador e tudo-ou-nada. Marca e do autor, o
        // conversor nao troca. Quando o lider decidir, a parte volta aqui:
        //   16 => tipo 'entrevista', partes: [perguntas (inicio '## O texto (pt-br): só as perguntas' / '## EN'),
        //   copies-curtas (inicio '## pt-BR' / '## EN', ocorrencia 10, as 18 casas ENTREVISTA-PENDENTE)].
    ],
];
