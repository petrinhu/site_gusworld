# TESTES.md — site_gusworld

> **Status:** v0.1 (2026-07-15). **Parcial por decisão do líder:** cobre só o que **independe de stack**.
> A stack está em aberto (`D-STACK`) — framework de teste, CI, SAST e runner entram quando ela fechar.
> Manual do projeto. O board é o `TODO.md`; o conceito é `docs/design/conceito.md`.

---

## Regra de ouro deste projeto

O teste existe para **proteger a experiência**, não para produzir relatório verde. A régua do líder vale aqui também: **se o site ficar correto e morto, o teste passou e o projeto falhou.**

E o critério de sucesso **não é métrica** (ver `conceito.md` §4): *"se apenas meu filho jogar, já fico feliz"*. Logo, **nenhum teste mede audiência**. Testes medem se a coisa funciona e se não machuca ninguém.

---

## Invariante de ordem (inviolável)

- **Teste unitário (TDD) NÃO vira item de tabela.** Ride com a implementação. *(Nota: este projeto ainda não tem hook de TDD — sem `.claude/tdd-guard.json`. Quando houver código, ou se ativa o hook, ou os unitários entram à mão na Definition of Done do item.)*
- **`TST-*` são downstream da implementação.** Não existem antes de haver página.
- **`AUD-*` são downstream de código + teste** (ver `AUDITORIAS.md`).
- **Nunca agendar teste antes do que ele cobre.** Se a ordenação produzir isso, o `Pré-requisito` está errado.

---

## Os testes que independem de stack

### `TST-A11Y` — Acessibilidade (o mais importante deste site)

Este site **é** movimento, e é aí que a estética retrô costuma matar acessibilidade. Pontos obrigatórios:

- **Contraste.** Já calculado (WCAG 2.x, sRGB), é **constraint de entrada** do `/design`, não achado tardio:

| Par | Razão | Veredito |
|---|---|---|
| ciano `#4dd9e8` sobre navy `#0d1520` | **10.83:1** | passa AA e AAA |
| magenta `#c23fd9` sobre navy | **4.37:1** | **falha AA em texto normal** (mín. 4.5) por ~3% de luminância; passa em texto grande e componentes de UI (3:1) |
| magenta sobre ciano | **2.48:1** | falha tudo — **nunca encostar um no outro** |

- **`prefers-reduced-motion`** deve desligar/reduzir: a linha do tempo, o envelhecimento da página, a scanline, o cupom sendo cortado, qualquer sprite animado. **Tensão real:** o site *é* movimento; a versão reduzida precisa continuar fazendo sentido, não virar um site quebrado.
- **Fonte pixelada NUNCA em parágrafo.** `PixelOperatorMono` em display e título; corpo de texto em fonte legível. Pixel em texto corrido destrói leitura, e pior para dislexia.
- **Teclado.** Tudo alcançável e operável sem mouse, com foco visível. **O quadradinho jogável é teclado por natureza** (setinhas) — mas o resto da página também precisa ser.
- **O elemento quebrável não pode ser o único caminho para a informação.** A página que envelhece, a dobra, o cupom que rasga: tudo isso é camada. Por baixo tem que haver navegação que funcione com leitor de tela.
- **Sem flash.** Risco de epilepsia fotossensível. Scanline e glitch não piscam em frequência perigosa.
- Ferramenta: axe, pa11y ou Lighthouse a11y — a escolha depende da stack.

### `TST-CWV` — Core Web Vitals

- **LCP ≤ 2,5s.** Imagem é o LCP em 85% dos sites. **Nunca `loading="lazy"` no hero** (16% dos sites erram isso); usar `preload` + `fetchpriority="high"`.
- **O site não pode pesar mais que o jogo.** Referência honesta: o Animal Well inteiro tem **33 MB**.
- Sprite sheet único em vez de N imagens (menos requisição, e o site não tem CDN robusto).
- **Mobile é o caso de teste, não o desktop** (`MOBILE-RISCO`): a criança chega de celular, por link.

### `TST-LINKS` — Links quebrados

- Varredura de todos os links, internos e externos.
- **Atenção aos links para fora que o site vai ter por design:** os dois repos (Codeberg canônico + espelho GitHub), a wiki do jogo, o `AI-DISCLOSURE.md` canônico. Link para repo alheio apodrece.
- Ferramenta: lychee, htmltest ou equivalente.

### `TST-HTML-VALID` — HTML válido

- Validação (vnu ou equivalente). Barato e pega erro estrutural que quebra leitor de tela.

### `TST-I18N` — O bilíngue

**Este item só existe porque o site é bilíngue: é o custo escondido do requisito.**

- **Paridade en/pt-br**: nenhuma página órfã, nenhuma chave faltando.
- **`hreflang` recíproco + `x-default`.** Se A aponta para B, B aponta para A.
- **NUNCA redirecionar por IP ou idioma do navegador.** Seletor visível, sempre. URL canônica por idioma.
- **A regra editorial do líder:** *"um post monolíngue publicado vale mais que dois posts nunca publicados"*. Se a tradução for assíncrona, o teste verifica o **aviso honesto** ("tradução em breve"), não a ausência.

---

## Testes específicos das peças do site

Estes nascem quando a peça nascer, mas ficam registrados desde já:

- **O quadradinho jogável** (`QUADRADINHO`): anda nas 4 direções, colide, funciona **sem teclado no mobile** (a resolver no `/design`), e não trava a página se o JS falhar.
- **O cupom** (`CUPOM`): rasgar errado tem **desfazer** (frustrar criança não é o objetivo); voto duplo é barrado; o resultado só aparece na próxima edição.
- **O envelhecimento** (`ENVELHECER`): a dobra e o amarelado não podem prejudicar a legibilidade. **A mancha de café não pode cair em cima de texto.**
- **O som** (`SOM-2-BOTOES`): efeitos ON e música OFF por padrão; o navegador não bloqueia (a interação precede o áudio); os dois botões são independentes e o estado persiste.
- **O ARG** (`ARG-SYLVARIN`): tem resposta certa e ela é alcançável; a página secreta não é indexável por acidente (senão vaza no Google e mata o enigma).
- **A Glyfa** (`GLYFA`): o vocabulário fechado **não pode gerar palavrão** em nenhuma combinação. **É o teste mais importante da peça** — testar exaustivamente todas as combinações possíveis (o vocabulário é pequeno; dá para fazer força bruta).
- **O álbum** (`ALBUM`): `localStorage` degrada com graça (navegador em anônimo, storage cheio, storage desabilitado). Perder o álbum não pode quebrar a página.

---

## O que entra quando a stack fechar (`D-STACK`)

Framework de teste, runner, CI (o runner `claudio`/`docker` já existe via systemd — **não registrar novo**; **o log de CI do Forgejo não existe na API**, ler erro exige `forgejo-runner exec` local), SAST/lint, teste de integração, e — **se e somente se** houver backend — SQLi, flood/rate-limit, e teste de carga.

**Hoje o site não tem backend nem coleta dado** (`ZERO-DADO`), então essa faixa inteira está vazia por decisão, não por esquecimento.
