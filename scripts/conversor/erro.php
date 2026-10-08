<?php

declare(strict_types=1);

/**
 * scripts/conversor/erro.php - o erro unico do conversor. Carrega o numero da
 * linha (da fonte original) para a casca montar "arquivo:linha: mensagem".
 * Fundacao: nenhuma outra unidade e dependencia dele alem de lanca-lo.
 */
final class ConversorErro extends RuntimeException
{
    public function __construct(string $mensagem, public readonly int $linha = 0, ?Throwable $anterior = null)
    {
        parent::__construct($mensagem, 0, $anterior);
    }
}
