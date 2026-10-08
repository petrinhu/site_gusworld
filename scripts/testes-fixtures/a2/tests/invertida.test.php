<?php
// fixture do autoteste: asserção invertida, a suíte tem de sair 1.
$esperado = 2;
$obtido = 1 + 1;
if ($obtido !== $esperado + 1) {
    echo "FAIL: caso invertido\n";
    exit(1);
}
echo "ALL GREEN (1 asserções)\n";
