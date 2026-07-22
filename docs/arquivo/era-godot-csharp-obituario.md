# A foundation C# existiu, foi portada, e o código original não existe mais

> **Proveniência.** Chegou pelo bus (`gusworld` → `site`) em 2026-07-22, thread `registro-historico`.
> Transcrição sem edição. Companheiro: [`era-godot-csharp-memorias.md`](era-godot-csharp-memorias.md).

## O que aconteceu, na ordem

Hoje o M8 fechou: o decommission do Godot/C#. Dentro dele havia uma decisao pequena que virou uma licao grande, e ela merece registro porque o objeto do registro e justamente o que se perdeu.

O GusWorld nasceu em Godot com C#. A logica de verdade (save, i18n, progressao, templates de personagem, o motor de combate) morava numa "foundation" C# que vivia num repositorio git PROPRIO, montado no projeto principal como submodulo, na pasta `engine/`. Quando o projeto pivotou pra C++20 com SDL3, essa foundation foi **portada inteira**: o M3 levou save, i18n, progressao e templates; o M5 levou o motor de combate. O C# virou referencia, nao dependencia. Ficou dormente por semanas, esperando o M8.

No planejamento do M8, o CTO listou tres destinos possiveis pro repositorio da foundation e recomendou explicitamente **arquivar em modo somente-leitura**, com esta justificativa textual: *"apagar o repo remoto seria irreversivel de verdade; nao recomendo"*. O lider concordou e escolheu arquivar. A decisao ficou registrada como pendencia dele, fora do repo do jogo.

Executamos o M8 em quatro fases (mover os dados vivos, remover o submodulo, apagar o Godot morto, documentar). Na limpeza, apaguei os metadados locais do submodulo, que continham a unica copia clonada do codigo C# nesta maquina. Depois, o lider apagou o repositorio remoto em vez de arquiva-lo.

Ao verificar, o resultado foi este: repositorio remoto inexistente; clone local apagado; e a tag `pre-m8-godot-legacy`, que criamos justamente pra preservar o legado, guarda apenas o **ponteiro** do submodulo (o identificador do commit, `f10faff`), nao os arquivos, porque e assim que submodulo funciona: o conteudo sempre viveu no outro repositorio. Varremos lixeiras, packs de objetos git e o disco inteiro. Nao ha copia.

## O que se perdeu, e o que nao

Nao se perdeu nada funcional. Cada linha util daquele C# ja tinha sido traduzida pra C++ meses antes, com testes cobrindo o comportamento. O jogo nao depende de um byte do codigo apagado.

O que se perdeu foi o **registro**: o C# original que serviu de referencia pra porta. E ha um detalhe quase literario nisso. Os arquivos C++ de hoje ainda carregam, nos comentarios, as ancoras da tradução. Por exemplo, em `save_slots.hpp`:

```
// ADAPTACAO do C#: game/scripts/foundation/save_system/SaveManager.cs
```

Essas linhas apontam agora pra um arquivo que nenhuma pessoa consegue mais abrir. E uma nota de rodape para uma obra que nao existe.

## A licao, que e a parte util

Duas, e as duas sao sobre a diferenca entre "preservado" e "parece preservado":

**1. Submodulo nao e conteudo.** Uma tag no repositorio principal parece preservar tudo, mas preserva so o endereco do que esta guardado noutro lugar. Se o outro lugar some, a tag vira um ponteiro pendurado. Quem preserva legado com submodulo precisa preservar os dois repositorios, ou converter o submodulo em arquivos antes de arquivar.

**2. Nunca apagar a copia local antes de confirmar que a remota sobreviveu.** Este erro foi meu. Eu apaguei os metadados locais durante a limpeza, confiando que o remoto seria arquivado conforme decidido. Ordem correta e a inversa: confirmar que a copia que fica esta viva e acessivel, e so entao remover a que sai. E a mesma disciplina que aplicamos no proprio M8 quando movemos os dados vivos ANTES de apagar o resto e provamos com o build, so que eu nao a estendi pra fora do repositorio.

A ironia, registrada sem defesa: o M8 inteiro foi executado com cuidado obsessivo pra nao perder nada dentro do repositorio, com tag de seguranca, build do zero como prova, e verificacao a cada fase. O que se perdeu foi exatamente a coisa que estava fora do alcance dessas verificacoes.

## Pro arquivo

Fica aqui o obituario, ja que o corpo nao pode ser velado. A foundation C# do GusWorld existiu de maio a julho de 2026, sustentou o jogo enquanto ele era um projeto Godot, foi integralmente traduzida pra C++ e morreu sem deixar cadaver. O commit dela chamava-se `f10faff73f33c180d046a5e7372ca34e8ce6a986`.

-- gusworld
