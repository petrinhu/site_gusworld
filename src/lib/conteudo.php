<?php

declare(strict_types=1);

/**
 * src/lib/conteudo.php - o RESOLVER do partial de conteúdo de uma seção.
 *
 * D-STACK / publish=flip, zero build: o CONTEÚDO de cada seção de cada edição
 * mora num partial físico em
 *
 *     src/content/edicao-<numero>/<idioma>/<id>.php
 *
 * (ex.: src/content/edicao-1/pt/sec-03.php). O template tenta incluir esse
 * partial no lugar do bloco `.scaffold`; se o arquivo NÃO existe, o scaffold
 * fica (é assim que rascunho / seção-sem-conteúdo continua seguro - nada de
 * meio-pronto vaza). Publicar uma seção é o arquivo passar a existir; despublicar
 * é removê-lo. Nenhum HTML de template muda.
 *
 * A mesma pasta serve os DOIS idiomas (subpasta por idioma); o id `sec-NN` é
 * IDÊNTICO em pt e en (IA-WIREFRAME §2.3), então o link profundo tem gêmeo exato.
 *
 * Esta é a ÚNICA lógica do mecanismo, e por isso é PURA e testada
 * (tests/conteudo-secao.test.php): monta o caminho a partir do dado, sem tocar
 * o disco. A checagem de existência (`is_file`) e o `include` moram no template
 * (I/O de borda), não aqui.
 */

require_once __DIR__ . '/config.php';

/**
 * Monta o caminho do partial de conteúdo de UMA seção de UMA edição, a partir
 * de um diretório base. Fail-fast: entrada suspeita devolve `null` (o chamador
 * cai para o scaffold), NUNCA um caminho meio-montado.
 *
 * Guards (defesa em profundidade - o `id` vem de secoes.php, confiável, mas o
 * padrão `sec-NN` barra path traversal por construção caso um id ruim vaze):
 *   - $numero  precisa ser >= 1 (edição real; 0/negativo = bug do chamador)
 *   - $idioma  precisa estar na allowlist SITE_IDIOMAS ('pt' | 'en')
 *   - $id      precisa casar EXATO com `sec-` + dois dígitos (nada de '..' / '/')
 *
 * Função pura (CONTRACT §5/§14): sem I/O, sem estado global mutável; recebe o
 * base como argumento (o template passa __DIR__ real) para ser testável sem disco.
 *
 * @param string $base    diretório raiz dos partials (ex.: src/content)
 * @param int    $numero  o número da edição (>= 1)
 * @param string $idioma  'pt' | 'en'
 * @param string $id      o id da âncora da seção, formato `sec-NN`
 * @return string|null    o caminho do partial, ou null se a entrada não valida
 */
function caminho_conteudo_secao(string $base, int $numero, string $idioma, string $id): ?string
{
    if ($numero < 1) {
        return null;
    }
    if (!in_array($idioma, SITE_IDIOMAS, true)) {
        return null;
    }
    if (preg_match('/^sec-\d{2}$/', $id) !== 1) {
        return null;
    }

    return $base . '/edicao-' . $numero . '/' . $idioma . '/' . $id . '.php';
}
