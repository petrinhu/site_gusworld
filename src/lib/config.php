<?php

declare(strict_types=1);

/**
 * src/lib/config.php — configuração de site (não é conteúdo, não é $edicoes).
 *
 * A base de URL e os 3 links externos fixos do índice moram aqui, num lugar só.
 * Nada aqui é spoiler nem segredo (são URLs públicas de repositório).
 *
 * Os 3 links fixos do índice de toda edição, apontando para o GitHub (host
 * único desde 2026-07-25). Verificados: os dois repositórios existem e estão
 * sincronizados. O `todo_jogo` usa o formato de arquivo bruto do GitHub
 * (`/blob/main/`), não o do host anterior.
 */

const SITE_BASE_URL = 'https://gusworld.site';

/** Idiomas suportados e seus prefixos de pasta física (I18N-CONTRATO-URL). */
const SITE_IDIOMAS = ['pt', 'en'];

/** O idioma-padrão: destino do 301 da raiz e do hreflang x-default. */
const SITE_IDIOMA_PADRAO = 'pt';

/**
 * Os 3 links fixos que fecham o índice de TODA edição (canon: anatomia-da-edicao).
 * Abrem com rel="external noopener". Um lugar só — todas as edições herdam.
 */
const SITE_LINKS_FIXOS = [
    'repo_jogo'   => 'https://github.com/petrinhu/gusworld',
    'repo_motor'  => 'https://github.com/petrinhu/glintfx',
    'todo_jogo'   => 'https://github.com/petrinhu/gusworld/blob/main/TODO.md',
];

/**
 * Monta a URL absoluta de uma edição num idioma, a partir do slug já no
 * $edicoes (slug_pt / slug_en). A base + o prefixo de pasta são config, não
 * ficam no array (docs/schema-edicoes.md).
 */
function url_edicao(string $idioma, string $slug): string
{
    return SITE_BASE_URL . '/' . $idioma . '/' . $slug;
}

/** A URL absoluta da banca (home) de um idioma — destino do wordmark. */
function url_banca(string $idioma): string
{
    return SITE_BASE_URL . '/' . $idioma . '/';
}
