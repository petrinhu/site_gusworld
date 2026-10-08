<?php

declare(strict_types=1);

/**
 * tests/gancho-instalador.test.php - prova scripts/instalar-gancho.sh e o
 * .githooks/pre-push num repositorio descartavel em /var/tmp (nunca no real).
 * GIT_CONFIG_GLOBAL=/dev/null isola do core.hooksPath global do usuario, para o
 * .git/hooks do repo descartavel valer. O preci.sh real e trocado por um stub
 * controlavel: aqui se testa a LIGACAO do gancho, nao o preci.
 *   php tests/gancho-instalador.test.php
 */

require __DIR__ . '/apoio/afirmar.php';

const RAIZ = __DIR__ . '/..';
const LINHA_ESPERADA = "#!/bin/sh\nexec \"\$(git rev-parse --show-toplevel)/.githooks/pre-push\" \"\$@\"\n";

/** Roda um comando de shell e devolve [codigo, saida]. */
function sh(string $cmd): array
{
    $saida = [];
    exec('GIT_CONFIG_GLOBAL=/dev/null GIT_CONFIG_SYSTEM=/dev/null ' . $cmd . ' 2>&1', $saida, $rc);
    return [$rc, implode("\n", $saida)];
}

function novo_diretorio(string $prefixo): string
{
    $d = sys_get_temp_dir() . '/' . $prefixo . bin2hex(random_bytes(4));
    mkdir($d, 0700, true);
    return $d;
}

function limpar(string $dir): void
{
    if ($dir !== '' && str_starts_with($dir, sys_get_temp_dir() . '/gancho-')) {
        sh('rm -rf ' . escapeshellarg($dir));
    }
}

/** Cria um repo de brinquedo com o .githooks/pre-push real e um preci.sh stub. */
function repo_de_brinquedo(string $dir, int $codigoPreci): void
{
    sh('git init -q -b main ' . escapeshellarg($dir));
    mkdir($dir . '/.githooks');
    mkdir($dir . '/scripts');
    copy(RAIZ . '/.githooks/pre-push', $dir . '/.githooks/pre-push');
    chmod($dir . '/.githooks/pre-push', 0755);
    file_put_contents($dir . '/scripts/preci.sh', "#!/bin/sh\nexit {$codigoPreci}\n");
    chmod($dir . '/scripts/preci.sh', 0755);
    file_put_contents($dir . '/a.txt', "a\n");
    $d = escapeshellarg($dir);
    sh("git -C {$d} add -A");
    sh("git -C {$d} -c user.name=t -c user.email=t@t commit -q -m inicial");
}

$instalador = RAIZ . '/scripts/instalar-gancho.sh';
$tmp = [];

// 1. instalacao num repo novo
$r1 = novo_diretorio('gancho-r1-');
$tmp[] = $r1;
repo_de_brinquedo($r1, 0);
$hook = $r1 . '/.git/hooks/pre-push';
[$rc, $out] = sh(escapeshellarg($instalador) . ' --repo ' . escapeshellarg($r1));
eq(0, $rc, 'instalar num repo sem gancho sai 0: ' . $out);
verdadeiro(is_file($hook), 'cria .git/hooks/pre-push');
verdadeiro(is_executable($hook), 'o gancho instalado e executavel');
eq(LINHA_ESPERADA, (string) @file_get_contents($hook), 'conteudo do gancho e a linha exata');
verdadeiro(!is_link($hook), 'o gancho nao e link simbolico');

// 2. idempotente
$antes = (string) @file_get_contents($hook);
[$rc, $out] = sh(escapeshellarg($instalador) . ' --repo ' . escapeshellarg($r1));
eq(0, $rc, 'segunda instalacao sai 0');
eq($antes, (string) @file_get_contents($hook), 'segunda instalacao nao muda o arquivo');
verdadeiro(str_contains($out, 'ja instalado'), 'segunda instalacao diz que ja esta instalado: ' . $out);

// 3. recusa sobrescrever gancho diferente
$r2 = novo_diretorio('gancho-r2-');
$tmp[] = $r2;
repo_de_brinquedo($r2, 0);
$alheio = "#!/bin/sh\necho gancho do usuario\n";
file_put_contents($r2 . '/.git/hooks/pre-push', $alheio);
chmod($r2 . '/.git/hooks/pre-push', 0755);
[$rc, $out] = sh(escapeshellarg($instalador) . ' --repo ' . escapeshellarg($r2));
eq(1, $rc, 'gancho diferente ja existente: recusa com saida 1');
eq($alheio, (string) @file_get_contents($r2 . '/.git/hooks/pre-push'), 'gancho alheio fica intacto');

// 3b. pre-push que e link simbolico, mesmo com conteudo igual ao esperado, NAO e "ja instalado"
$r6 = novo_diretorio('gancho-r6-');
$tmp[] = $r6;
repo_de_brinquedo($r6, 0);
file_put_contents($r6 . '/alvo-do-link', LINHA_ESPERADA);
chmod($r6 . '/alvo-do-link', 0755);
symlink($r6 . '/alvo-do-link', $r6 . '/.git/hooks/pre-push');
[$rc, $out] = sh(escapeshellarg($instalador) . ' --repo ' . escapeshellarg($r6));
eq(1, $rc, 'link simbolico com conteudo igual: recusa com saida 1');
verdadeiro(str_contains($out, 'RECUSADO'), 'e diz RECUSADO: ' . $out);
verdadeiro(is_link($r6 . '/.git/hooks/pre-push'), 'o link continua sendo link');
$r7 = novo_diretorio('gancho-r7-');
$tmp[] = $r7;
repo_de_brinquedo($r7, 0);
symlink($r7 . '/nao-existe', $r7 . '/.git/hooks/pre-push');
[$rc] = sh(escapeshellarg($instalador) . ' --repo ' . escapeshellarg($r7));
eq(1, $rc, 'link simbolico quebrado tambem e recusado');

// 4. o gancho instalado barra o push quando o preci falha, e deixa passar quando passa
foreach ([[1, false], [0, true]] as [$codigoPreci, $deveAceitar]) {
    $r = novo_diretorio('gancho-r3-');
    $tmp[] = $r;
    $remoto = novo_diretorio('gancho-bare-');
    $tmp[] = $remoto;
    sh('git init -q --bare -b main ' . escapeshellarg($remoto));
    repo_de_brinquedo($r, $codigoPreci);
    sh(escapeshellarg($instalador) . ' --repo ' . escapeshellarg($r));
    $d = escapeshellarg($r);
    sh("git -C {$d} remote add origin " . escapeshellarg($remoto));
    [$rc] = sh("git -C {$d} push origin main");
    $local = trim(sh("git -C {$d} rev-parse main")[1]);
    $noRemoto = sh('git -C ' . escapeshellarg($remoto) . ' rev-parse --verify -q refs/heads/main')[1];
    if ($deveAceitar) {
        eq(0, $rc, 'preci verde: push aceito');
        eq($local, trim($noRemoto), 'preci verde: o remoto recebeu o commit (conferido no bare)');
    } else {
        verdadeiro($rc !== 0, 'preci vermelho: push recusado');
        eq('', trim($noRemoto), 'preci vermelho: o remoto nao recebeu nada (conferido no bare)');
    }
}

// 5. o gancho do projeto acha a raiz por git, mesmo chamado por um link fora de .githooks/
$r5 = novo_diretorio('gancho-r5-');
$tmp[] = $r5;
repo_de_brinquedo($r5, 0);
symlink($r5 . '/.githooks/pre-push', $r5 . '/.git/hooks/por-link');
[$rc, $out] = sh('cd ' . escapeshellarg($r5) . ' && ' . escapeshellarg($r5 . '/.git/hooks/por-link'));
eq(0, $rc, 'chamado por link em .git/hooks, acha scripts/preci.sh pela raiz do git: ' . $out);

foreach ($tmp as $d) {
    limpar($d);
}
terminar();
