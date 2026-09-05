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
    // as 3 saídas de UMA edição de volta pra BANCA (a home): topo (rótulo do
    // wordmark), fim (na voz do Gus) e a 1ª entrada do índice.
    'topo_banca'       => 'banca',
    'voltar_banca'     => 'voltar pra banca',
    'indice_banca'     => 'a banca',

    // masthead / expediente
    'exp_ano'          => 'ano',
    'exp_numero'       => 'nº',
    // versionamento leigo no masthead (Vol.Ed.Rev): "vol. 1 · nº 3 [· rev. 2]".
    // ⚠️ MINÚSCULO de propósito: o .meta é PixelOperatorMono a 11px, abaixo dos
    // 15px do guard N→H (reference-pixelfont-n-maiusculo). Um "Nº" maiúsculo
    // rasteriza como "Hº" e o "V" de "Vol." lê como "U" ("Uol."). O líder pediu
    // "Vol./Nº" capitalizados — colisão sinalizada; só cabe capital ≥15px.
    'exp_vol'          => 'vol.',
    'exp_num'          => 'nº',
    'exp_rev'          => 'rev.',
    // uptime das sessões de trabalho no expediente (só a partir da #3, e só nas
    // edições que trazem o campo 'uptime'). Rótulo POR PROJETO; os números vêm do
    // $edicoes (capturados no publish por scripts/uptime-sessoes.sh: a produção
    // não enxerga a máquina do líder). ⚠️ MINÚSCULO pelo mesmo guard N→H acima.
    'exp_uptime'       => ['jogo' => 'jogo', 'glintfx' => 'glintfx'],
    // rótulo só-leitor-de-tela: sem ele, o leitor lê "jogo 1456h (60d)" sem
    // dizer o que o número é. O visual segue enxuto (o rótulo não ocupa pixel).
    'exp_uptime_sr'    => 'tempo de sessão de trabalho aberta:',
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
        'secao_meta_um' => 'edição publicada',
        'nova'         => 'nova',      // badge da mais recente (minúsculo: guard N→H)
        'jogavel'      => 'jogável',   // selo da edição-hero (é o quadradinho da home)
        'cta'          => 'Ler a edição', // CTA da capa (display font, não pixel: sem guard N→H)
        // alt da arte de capa da estante (o card social da edição). %d = número,
        // %s = título. Aparece na tela quando a imagem não carrega.
        'capa_alt'     => 'Capa da edição %d: %s',
        'w6_tag'       => 'interativo pendente · w6',
        // os ganchos dos interativos (scaffold; implementação é item W6)
        'ganchos' => [
            'hero'       => ['label' => 'Quadradinho jogável', 'nome' => 'O quadradinho'],
            'pressstart' => ['label' => 'Poster PRESS START',  'nome' => 'PRESS START'],
            'glyfa'      => ['label' => 'A Glyfa: forja de nomes', 'nome' => 'A Glyfa'],
            'album'      => ['label' => 'O álbum de figurinhas', 'nome' => 'O álbum'],
            'cupom'      => ['label' => 'O cupom recortável: a enquete', 'nome' => 'O cupom'],
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
        // minúsculos (guard N→H). 'lide'/'slider' não são pixel: acento e
        // maiúscula livres. 'edicao' compõe a legenda "edição #N". As chaves
        // 'vazio_*' são o vazio-com-graça (pixel, minúsculas).
        'linha_tempo' => [
            'titulo' => 'linha do tempo',
            'meta'   => 'era visual',
            'lide'   => 'Arraste o tempo e veja o jogo evoluir: cada ponto é uma edição visual publicada, na data real dela.',
            'dica'   => 'arraste · ou ← → no teclado · ou clique num ponto',
            'slider' => 'Linha do tempo do jogo',
            'edicao' => 'edição',
            // ── VAZIO COM GRAÇA (líder, 2026-07-25) ──────────────────────────
            // Sem nenhuma edição visual publicada, a seção NÃO mostra uma nota
            // seca de sistema (lia como página quebrada): a linha é desenhada
            // apagada e quem explica é o GUS, na voz dele (fala sem ponto final,
            // reticências como assinatura, os "erros" de digitação são de
            // propósito). Minúsculo de ponta a ponta = guard N→H não dispara.
            'vazio_fala'   => 'a linha ainda nao acendeu',
            'vazio_pensa'  => 'falta o quadrado azul aparecer... ele é o primeiro ponto',
            'vazio_rotulo' => 'em breve',
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
        // O CUPOM (recortável · item W6 · CUPOM): o ÚNICO backend vivo do site (o
        // poll). Recorte, escolha, mande de volta — o resultado sai na PRÓXIMA
        // edição (a lentidão vira estética: enquete aberta = "aguardando", não site
        // morto). Zero conta, zero dado (só localStorage marca "já votou", best-
        // effort). ⚠️ A PERGUNTA e as OPÇÕES são PLACEHOLDER — o líder define as
        // reais depois; trocar = trocar o array 'opcoes' aqui + a whitelist do
        // cliente (cupom-core.js) e do servidor (api/cupom-voto.php). Degrada sem
        // JS: é um <form method=post> nativo. Rótulos pixel são minúsculos (guard N→H).
        // ⚠️ A resposta ao voto mostra o resultado AO VIVO, mas SÓ em % (nunca o
        // número absoluto — Decisão do líder 2026-07-19). Os rótulos abaixo são a
        // COPY REAL (co-decidida); os slugs NÃO mudam (a whitelist casa 1:1).
        'cupom' => [
            'titulo'    => 'o cupom',
            'meta'      => 'enquete recortável',
            'lide'      => 'O cupom da edição: recorte no pontilhado, escolha e mande de volta. O resultado sai na próxima edição. Enquete de revista não tem pressa.',
            // é PAPEL (não é tela) → com acento pt-br. Na voz do Gus (registro seco).
            'pergunta'  => 'O que você quer ver mais na próxima Glyfesse?',
            'legenda'   => 'escolha uma opção e mande o cupom de volta',
            'opcoes'    => [
                'mais-jogo'       => 'mais do jogo',
                'mais-bastidores' => 'mais bastidores',
                'mais-gus'        => 'mais do Gus',
            ],
            'recorte'   => 'recorte aqui',   // rótulo do pontilhado (aria/legenda da tesoura)
            'enviar'    => 'mandar o cupom',
            'rasgar'    => 'rasgar no pontilhado',
            'desfazer'  => 'colar de volta',
            'espera'    => 'resultado ao vivo, edição a edição',
            // o RESULTADO (server-render quando o cookie diz "já votou" + o cliente
            // pinta depois do voto). Só proporção — sem número absoluto.
            'resultado'    => 'o que a banca quer (até agora)',
            'res_nota'     => 'ao vivo · só a proporção, sem número absoluto',
            'res_vazia'    => 'urna ainda vazia por aqui. seja o primeiro.',
            'voto_seu'     => 'seu voto',
            // estados que só o JS mostra (enhancement):
            'obrigado'  => 'cupom na urna. veja como anda a votação.',
            'ja_votou'  => 'você já mandou seu cupom. veja como anda a votação.',
            'erro'      => 'não deu pra mandar agora. tente de novo daqui a pouco.',
            'off'       => 'sem memória no navegador: seu cupom vale, só não vou lembrar que você votou.',
            'cap'       => 'FIG. · o cupom recortável. escolha e mande de volta.',
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
    // nome acessível do grupo (WCAG 2.5.3): descreve a FUNÇÃO do controle
    // (liga/desliga efeitos e música), não a tradução literal da palavra.
    'rodape_som_aria'   => 'Controles de som: efeitos e música',
    'rodape_som_ef'     => 'Efeitos',   // rótulo FIXO: o estado é sinalizado pelo LED (.luz), como no hardware real
    'rodape_som_mus'    => 'Música',
    // ⚠️ NÃO reescrever sem ler AUD-IA §IA-01/IA-02/IA-03 e AUD-LICENCA §LIC-01/LIC-02.
    // Regras que a linha tem de cumprir: (1) nomear a licença de verdade e bater com o
    // colofão da §19 ("todos os direitos reservados"); (2) declarar o uso de IA em ARTE,
    // não só em código, NOMEANDO a ferramenta; (3) zero defesa por intenção ("a IA é
    // ferramenta, o criativo é do criador") e zero defesa por credencial. Declarar é a defesa.
    'rodape_licenca'    => 'Código do site: Apache 2.0. Texto e arte da revista: todos os direitos reservados. Feito com IA: o código com Claude; a arte com PixelLab (sprites; logo, gerado), Grok Imagine (logo, tratado) e Tripo3D (pôster 3D).',
    'rodape_contato'    => 'Fale com a redação',
    // link do rodapé para a Política de Privacidade (REMED-LGPD) — presente em
    // todo rodapé, nos dois idiomas.
    'rodape_privacidade' => 'Política de Privacidade',
    'build_tag_aria'    => 'versão desta edição',   // aria-label do carimbo de build (expert)

    // 404 (mínimo — a microcopy in-world definitiva é slot do ux-writer + líder)
    'erro_404_titulo'  => 'Página não encontrada',
    'erro_404_texto'   => 'Esta edição não existe (ainda) ou o endereço mudou.',
    'erro_404_voltar'  => 'Voltar à banca',

    // ── POLÍTICA DE PRIVACIDADE (REMED-LGPD) ──────────────────────────────────
    // Texto copiado VERBATIM de docs/legal/politica-privacidade-rascunho.md,
    // bloco pt-BR — inclusive a ausência de acentos do rascunho original (o
    // texto está pendente de aprovação do líder e sign-off de advogado; não é
    // escopo desta tarefa "corrigir" a prosa). As chaves *_lead são o trecho em
    // negrito de abertura de cada parágrafo; *_antes/*_depois cercam um trecho
    // <code> que o template insere sem tradução (e-mail, nome de cookie,
    // localStorage). 'log_lead2', 'log_prazo' e 'log_corpo_b' não são cópia
    // literal do rascunho: descrevem o que se sabe sobre o registro do
    // servidor (quem grava, para que serve, que o site não usa nem mistura
    // esse registro com mais nada) sem prometer prazo de retenção. O prazo
    // depende de configuração do painel de hospedagem, ainda não conferida.
    // Ver docs/legal/politica-privacidade-rascunho.md, decisão 2.
    'privacidade' => [
        'titulo'     => 'Política de Privacidade da Glyfesse',
        'atualizado' => 'Última atualização: [DATA A DEFINIR NA PUBLICACAO]',
        'meta_desc'  => 'A Glyfesse é a revista deste site, que conta a produção do jogo GusWorld. Este texto explica, em linguagem simples, o que o site guarda sobre quem visita, o que ele não guarda, e como falar com a gente sobre isso.',
        'intro'      => 'A Glyfesse é a revista deste site, que conta a produção do jogo GusWorld. Este texto explica, em linguagem simples, o que o site guarda sobre quem visita, o que ele não guarda, e como falar com a gente sobre isso.',

        'responsavel_lead'   => 'Quem responde por este site.',
        'responsavel_antes'  => 'Você pode escrever para',
        'responsavel_depois' => 'a qualquer momento, com qualquer dúvida ou pedido sobre seus dados.',

        'nao_faz_lead'  => 'O que a Glyfesse NÃO faz.',
        'nao_faz_corpo' => 'Não existe cadastro, não existe login, não existe conta de usuário. Não vendemos nem compartilhamos nenhuma informação sua com ninguém. Não usamos ferramentas de propaganda nem de rastreamento (nada de Google Analytics ou parecido). Não existe um perfil seu guardado em lugar nenhum.',

        'cookie_lead'   => 'O único "bilhete" que guardamos no seu navegador: um cookie.',
        'cookie_antes'  => 'Um cookie é um pequeno arquivo que o seu navegador guarda a pedido de um site, para lembrar de alguma coisa depois. O nosso se chama',
        'cookie_depois' => '. Ele só aparece quando você vota na enquete do cupom, no rodapé de uma edição. Ele serve só para lembrar "esta pessoa já votou", para que a página mostre o resultado em vez do formulário de novo. Ele dura até 180 dias (mais ou menos uma temporada de edições da revista). Ele não tem o seu nome, nem número, nem nada que separe você de outra pessoa: é sempre o mesmo valor para todo mundo que vota. Se você apagar os cookies do seu navegador, nada quebra: você só pode votar de novo.',

        'localstorage_lead'   => 'O que fica guardado só no seu próprio aparelho.',
        'localstorage_antes'  => 'Algumas partes do site guardam coisas direto no seu navegador (a tecnologia chama isso de',
        'localstorage_depois' => '), sem mandar nada para o nosso servidor: quais figurinhas do álbum você já colou, se o som e a música estão ligados ou desligados, e se você já votou no cupom desta edição. Isso fica só no seu aparelho. Nós não vemos nem guardamos essa informação. Se você limpar os dados deste site no seu navegador, tudo isso some, e ninguém mais tem uma cópia.',

        'cupom_lead'  => 'A enquete do cupom.',
        'cupom_corpo' => 'Quando você vota, a gente soma mais um número numa lista de contagem (por exemplo: "opção A: 41 votos"). Não guardamos quem votou em que. O servidor não sabe, e nem consegue saber, qual foi a sua escolha depois que a página fecha.',

        'email_lead'  => 'Se você nos escrever um e-mail.',
        'email_corpo' => 'Guardamos a mensagem só para poder responder. Não usamos seu e-mail para lista de avisos, não repassamos para ninguém.',

        'log_lead1'   => 'O registro automático do servidor.',
        'log_corpo_a' => 'Como quase todo site na internet, o serviço de hospedagem que usamos grava, automaticamente, uma lista técnica de visitas: o número de identificação da sua conexão (chamado de IP), a página pedida, a data e hora, e o tipo de navegador. Isso é feito pelo próprio serviço de hospedagem, para manter o site funcionando e seguro, e serve principalmente para diagnosticar problemas.',
        'log_lead2'   => 'O que a Glyfesse faz com esse registro:',
        // NÃO é cópia literal do rascunho: descreve o que se sabe sobre o
        // registro do servidor, sem prometer prazo de retenção (isso depende
        // do painel de hospedagem, ainda não conferido). Ver
        // docs/legal/politica-privacidade-rascunho.md, seção "O que é do
        // líder decidir", decisão 2.
        'log_prazo'   => 'Não usamos essa lista para mais nada.',
        'log_corpo_b' => 'Ela também não é misturada com nenhuma outra informação do site.',

        'links_lead'  => 'Você também pode notar links para fora do site.',
        'links_corpo' => 'Algumas matérias linkam para outros lugares: o repositório do jogo no GitHub, o perfil de um artista convidado, o site de um parceiro editorial. Clicar neles abre outro site, com as próprias regras. Nós não mandamos nada automaticamente para esses lugares só por você visitar a Glyfesse.',

        'criancas_lead'  => 'Crianças.',
        'criancas_corpo' => 'Sabemos que parte de quem lê esta revista tem 11, 12, 13 anos. O site não pede idade, não pede cadastro, e não guarda nenhuma informação pessoal de ninguém, criança ou adulto.',

        'direitos_lead'   => 'Seus direitos.',
        'direitos_antes'  => 'Você pode pedir para saber o que guardamos sobre você, corrigir algo errado, ou pedir para apagar. A resposta honesta, porque é a verdade: como não existe cadastro nem login, normalmente não temos como saber "qual visitante é você" para atender um pedido individual (o que já é, por si só, uma forma de proteger sua privacidade). Se você quiser apagar o que fica no seu navegador (álbum, som, "já votei"), pode fazer isso você mesmo, limpando os dados do site nas configurações do seu navegador. Para qualquer outro pedido, escreva para',
        'direitos_depois' => '.',

        'mudancas_lead'  => 'Mudanças nesta política.',
        'mudancas_corpo' => 'Se este texto mudar, a data no topo muda junto.',
    ],

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
