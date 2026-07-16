# Design doc da Glyfesse

> **Status:** v1.0 (2026-07-16). Registra a **vibe** e os **tokens**, decididos com o líder.
> Hub: linka, não duplica. Conceito em [`conceito.md`](conceito.md); tokens em [`tokens.md`](tokens.md) / [`tokens.css`](tokens.css); mockups em [`mockups/INDEX.md`](mockups/INDEX.md).
> Avança `DESIGN-IDENTIDADE` (W4) e fecha `PALETA-CONTRASTE`.

---

## 1. A personalidade, em uma frase

**Uma revista de videogame dos anos 90 impressa em papel, com buracos de tela acesa nela.**

O papel é a casca (a camada do adulto: edição, capa, sumário, nota, cupom). A tela acesa é onde o Gus vive (a camada da criança: o jogo, o Diário, o brinquedo). **A pessoa mexe na tela; a memória está no papel em volta.**

Isso atende a régua do líder na ordem certa: **brinquedo primeiro, memória depois.** A criança de 2026 nunca segurou uma revista, mas ela reconhece um retângulo que se mexe. O adulto reconhece a página.

---

## 2. A decisão: o material (`D-IDENTIDADE`, `DESIGN-IDENTIDADE`)

**Escolhido: papel como chão + a foto de 21h como TRATAMENTO das fotos de arquivo.**

Palavras do líder:

> "A conta que decidiu: o navy do jogo dá **15.99:1 sobre papel**, ou seja, **ele já é a tinta preta da revista**, e a mesma cor serve nos dois materiais. E o ciano dá **1.48:1 sobre papel: some**. Isso **não é um defeito da paleta, é a informação**: a paleta do jogo é feita de **LUZ**. No papel ela só aparece **onde há tela**, que é exatamente **onde o Gus vive**. O site vira **um objeto impresso com buracos de tela acesa nele**."

### Por que não a tela (a direção recusada, e o porquê importa)

Um site todo em navy + ciano + mono seria o caminho fácil: a paleta entraria sem tradução. **Foi recusado com razão técnica e estética:**

1. **É o visual padrão de indie retrô em 2026.** É o "pixel sem motivo" que a pesquisa identificou como a fadiga real ("retro is the easiest aesthetic to fake and the hardest to pull off"). A fadiga não é com o pixel, é com pixel **sem motivo**.
2. **A revista deixaria de ser objeto e viraria skin.** O adulto de 1991 não sentiria banca, sentiria hacker.
3. **Tela não amarela.** O envelhecimento, a peça mais original do projeto, perderia o sentido.

### ★ Isso desambiguou o `D-IDENTIDADE` de graça

O board registrava "opção 1+2+3" (pixel art + key art pintada + retratos cel-shaded **juntos**) como pendência a desambiguar.

**A revista é o único formato que comporta os três estilos na mesma página sem incoerência:** a matéria tem screenshot pixelado, o pôster central é pintado (`catedral_mae.png`), a ficha tem retrato. Numa tela ou OS falso, misturar pixel art com pintura fica desconexo. **Numa revista, é o normal.** O líder não precisava escolher: era isso que ele estava dizendo.

---

## 3. A decisão: light e dark são dois materiais

- **Light = o papel da revista.**
- **Dark = a tela do Tavus-Drive**, o Diário do Gus por dentro. **"De dia você lê a revista, de noite você está no laptop dele."**

**Não é o papel invertido: é outro objeto.** A tinta preta vira luz ciano, o halftone vira brilho, o raio sai de 0 para 2px. Nenhuma cor é invertida. Isso atende "dark mode é redesenho, não inversão" sem inventar nada, porque o objeto já existia no canon.

---

## 3b. A decisão: a tipografia

**Escolhido: o par A. Archivo Narrow (manchete) + Vollkorn (corpo) + PixelOperatorMono (display).** Decidido vendo os três **renderizados lado a lado em 420px**, não no abstrato. Detalhe e licenças em [`tokens.md` §7](tokens.md).

**O argumento que decidiu, e o número precisa sobreviver:** a manchete tem que caber em **390px**, porque a criança chega de celular. O par A foi o único que disse a frase inteira em uma linha e com o maior corpo. **Se isto for "simplificado" para uma família só, a manchete quebra no celular.**

### ★ O pixel só é especial enquanto é raro

> **O lugar do pixel é onde o jogo está:** logo, rótulo, numeral, e dentro das telas acesas. **A manchete é a revista falando, não o jogo.**

O par C (manchete na fonte do próprio jogo, custo zero, vazando do Tavus-Drive) era o mais tentador e perdeu por dois motivos permanentes: **pixel não condensa** (largura fixa, quebra no celular), e **se estiver em todo título vira o fundo e para de significar**. É **regra de identidade**, não preferência: quando alguém perguntar "por que não usar a fonte do jogo no título?", a resposta é esta.

---

## 4. Os achados que mudaram o desenho

Todos vieram de **calcular em vez de estimar**, e nenhum estava no radar.

### 4.1 O navy já é a tinta (`15.99:1`)
A mesma cor serve nos dois materiais. Um token a menos, e a paleta do jogo entra no papel sem tradução no lugar que importa.

### 4.2 O ciano some no papel (`1.48:1`)
Não é defeito: é o que define onde o neon pode existir. **A paleta do jogo é feita de luz.**

### 4.3 ★ Envelhecer a página derrubava o contraste
O ciano de tinta calibrado no papel novo dava `5.59:1` e **caía para `3.89:1` na edição #1 encardida: reprovava AA**. A peça "as bordas amarelam com a idade" tinha um custo de acessibilidade embutido que ninguém tinha visto.

**Correção:** não desistir do envelhecimento, e sim **calibrar toda a tinta no PIOR papel da banca**. Agora o mesmo token passa AA na #1 e sobra na edição nova. **A revista pode envelhecer para sempre sem nunca ficar ilegível.**

### 4.4 O magenta custa um degrau, não a cor
`#c23fd9` falha AA (4.37:1). `#cd58e1` passa sobre o fundo **e** sobre a superfície elevada onde a NOTA vive (5.31 e 4.50). Mesmo matiz. O original fica no arquivo para **área**, que é o que ele é no jogo.

### 4.5 ★ A textura do papel não renderizava no Firefox
Verifiquei no Blink; o líder vê no Gecko. O `feTurbulence` sem `width`/`height` explícitos **é descartado pelo Gecko**: o papel ficava liso, e a direção recomendada estava sendo julgada sem a textura que a sustenta.

**Vale em produção, não só no mock: todo filtro SVG com dimensão explícita.** E todo mock se verifica **no browser do líder**, porque esta estética depende inteira de textura, blend mode e filtro SVG, que é onde os motores divergem.

### 4.6b O CRT era menos perigoso, e o café era muito pior

Os dois véus foram medidos, e os dois surpreenderam **em direções opostas**:

- **O scanline** cai por cima do texto **e** do fundo, na mesma proporção, então **a razão quase não muda** (texto-1 vai de 14.76 para 8.09 e segue AA). Ele só é perigoso se cair só no fundo. **Consequência real:** com o CRT ligado o magenta cai para 3.26 e **deixa de servir como texto normal**, o que está coberto porque ele só é numeral grande.
- **A mancha de café** derruba o secundário abaixo de AA **já com alpha 0.08**, na edição encardida, quando está quase invisível. **Não existe mancha visível que possa cair sobre texto.** Virou restrição estrutural: a `.zona-cafe` com `overflow:hidden` **clipa** a mancha, então errar a coordenada corta a mancha em vez de invadir o texto. **E como o guard resolve o problema, o alpha do café ficou livre (.42): ela pode ser uma mancha de verdade.**

### 4.6 ★ O `color-mix` no `:root` não envelhece nada
Custom property é substituída **onde é declarada**. Com `--papel` no `:root`, o `--idade` do filho é ignorado e **a banca inteira sai da mesma cor**. Tem que ser declarado na `.folha`. Detalhe em [`tokens.md` §3](tokens.md).

---

## 4b. A primeira dobra: a abertura e o mobile (decididos com o líder, 2026-07-16)

O coração do site, decidido vendo e jogando, não no abstrato. Prova renderizada e jogável em [`mockups/05-primeira-dobra.html`](mockups/05-primeira-dobra.html) (desktop) e [`mockups/06-mobile.html`](mockups/06-mobile.html) (o celular). Os dois avançam `QUADRADINHO` e fecham `MOBILE-RISCO` no lado de design.

### A abertura: o quadradinho É a capa (brinquedo primeiro)

**Escolhido: a opção A.** A pessoa cai no site e a primeira coisa é o quadradinho jogável, no centro; a revista emoldura, com um masthead fino. O quadradinho abre como um **retângulo ciano de contorno** numa sala vazia, as setas já o movem (sem graça de propósito por ~5s), e então ele **vira o Gus**, com 4 direções e diagonal. **A pessoa sente a evolução na mão, não lê sobre ela.**

**Por quê, e o número não pode ser esquecido:** é a régua do projeto ao pé da letra, *brinquedo primeiro, memória depois*. A criança de 2026 chega de celular, por link, e **mexe em 2 segundos** antes de precisar entender que aquilo é uma revista; o adulto ainda reconhece a banca na moldura. As recusadas: a **capa de banca** (opção B) é a mais bonita, mas a criança nunca segurou uma revista e sai em 4s sem descobrir que dava para mexer; o **boot CRT** (opção C) adia o papel, a decisão de identidade recém-tomada, e vira "mais um site retrô de tela escura" na primeira dobra. O CRT continua perfeito para o boot da Edição #0 e para o dark mode, **não** para a capa.

### O mobile: auto-anda, toque para assumir

**Escolhido: a opção 3.** No celular não há teclado, e é ali que a criança chega. O quadrado **anda sozinho** quando a pessoa abre a página; ao **tocar**, ela assume o controle e ganha um d-pad na tela.

**Por quê:** é a única das quatro saídas que preserva o roteiro do conceito (*sem graça de propósito, então evolui*) **sem exigir teclado**. A criança vê o **brinquedo vivo no primeiro segundo**, antes mesmo de tocar, e a evolução continua "sentida na mão" no público que mais importa. Custo aceito: dois momentos (ver, depois assumir), um passo a mais, que pede deixar claro que dá para assumir. As recusadas: **d-pad sempre visível** (cheira a emulador e rouba área do quadradinho); **toque-e-arraste** (vira empurrar em vez de pilotar, o dedo tapa o quadrado, e a diagonal fica trivial, perdendo o "antes 4 vetores, agora 8"); **desktop-only** (o risco central do projeto, entrega o brinquedo a quem menos precisa dele, já que a criança chega de celular, vê a capa parada e sai).

### Como a capa A4 degrada para 390px (parte da decisão, não detalhe)

A metáfora de revista é A4, retrato, duas colunas, e **não cabe em 390px**. No celular a capa vira **coluna única**: o masthead afina, a sala (o quadradinho) **cresce e fica quase quadrada** para ganhar área de dedo, e as chamadas descem para uma tira que continua ao rolar. **Ainda é a revista, no formato do celular**, não uma versão amputada dela.

### A garantia de acessibilidade (nos dois tamanhos, desde o mock)

`prefers-reduced-motion` num elemento que **é** movimento não pode virar site quebrado. Quem desliga movimento vê o Gus **parado no destino** (já virado), e uma **legenda escrita** sob a tela ("maio: um quadrado. depois: o Gus.") conta a história por texto. **O jogo nunca é o único caminho para a informação**, com movimento ou sem. No mobile isso vale igual: sem movimento não há auto-anda, o quadrado já entra virado e o d-pad já aparece.

### O que estes dois mocks provaram, e o que falta

**Provado e jogável:** o quadradinho no desktop (setas do teclado, mock 05) e no celular (Pointer Events, mock 06, testável com o mouse numa janela estreita e no toque de um celular de verdade). Um só código de controle serve para os dois, dentro das três exceções de JS que a stack já previa.

**Falta, e é a próxima rodada (sob nova pergunta, o WIP do líder é 1):** a **linha do tempo jogável** (maio quadrado → junho um lado → julho diagonal → agosto cockpit, cada marco esticando a linha sozinho), o **PRESS START** (com a key art `catedral_mae.png`), e a **capa da edição** com as chamadas.

---

## 4c. A linha do tempo, o PRESS START e a anatomia da edição (2026-07-16)

Continuação da primeira dobra e início do template da edição. Detalhe canônico na memória `anatomia-da-edicao` e `a-cadencia-editorial`; aqui fica o resumo com ponteiro para os mockups.

### A linha do tempo jogável (`LINHA-TEMPO`) — decidido: A, o scrubber

Mock: [`mockups/07-linha-tempo.html`](mockups/07-linha-tempo.html). Arrasta o tempo, o jogo evolui: a foto de um marco dissolve na do seguinte, com os frames reais das gravações do líder (a estética foto-de-21h, o terminal ao fundo). Escolhida a forma A (scrubber) contra a tira de filme e as abas, porque é a única que faz a evolução ser sentida na mão, o mesmo princípio do quadradinho.

**A correção de cronologia que isso trouxe:** o quadradinho não é o começo. A gênese (ebooks, RAG, lore) é a Edição #1, de 15 de maio de 2026; a era visual (o quadrado azul, GusEngine em C++) começa em 22 de junho. O scrubber cobre só a era visual, com datas reais; a gênese e o 3D abandonado são edições textuais, entram na banca mas ficam fora do scrubber.

**A decisão de fundo (data-driven):** a linha do tempo e a banca leem do mesmo array `$edicoes`, com campos `tipo` (textual/visual), `estado` (publicada/rascunho) e `data`. O scrubber filtra visual e publicada; a banca filtra publicada. O líder publica uma edição trocando uma palavra, e a linha e a banca crescem juntas. Nunca mostra rascunho (não spoila o drip).

**O lançamento (decidido):** o site nasce com **3 edições publicadas**, o suficiente para chegar ao quadradinho: #1 gênese (textual, 15 mai), #2 arquitetura + 3D (textual), #3 o quadrado azul (visual, 22 jun). No `$edicoes`, #1 a #3 ficam `publicada` e #4 em diante `rascunho`. Assim a **banca nasce com 3 edições** e o **scrubber (só visual) nasce com 1 ponto** (o quadrado, #3); #4+ pinga. Isso faz a edição do quadradinho sair junto com o quadradinho jogável da home, então banca e home batem.

### Brinquedos por edição, e a home é a banca (decidido)

**Não há chrome persistente de brinquedos.** Cada edição carrega seus próprios interativos (a #3 tem o quadradinho; a #6, a bancada de cartas; etc.), instanciados de componentes reusáveis, não copiados à mão. A **banca só enfileira** as edições. Isso reconcilia "o quadradinho é a capa": a **home É a banca**, e o **hero/capa da home é o quadradinho** (o interativo da edição #3, em destaque). O layout home ↔ edição sai disto: a home é a banca com o quadradinho no topo; cada edição, aberta, é o template das 19 seções em rolagem única.

### O PRESS START (`PRESS-START`) — decidido: C+A (o boot + a honestidade)

Mock: [`mockups/08-press-start.html`](mockups/08-press-start.html). A key art pintada da Catedral-Mãe (otimizada para 120 KB) como pôster central aceso, com PRESS START piscando; o ciano da catedral casa com a paleta do jogo. **Decidido: a combinação C+A.** Apertar START liga o boot do CRT (o payoff de fliperama, reusa a linguagem do em-breve, ~1.3s) e aterrissa numa fala honesta na voz nova (`gus@glyfesse> não dá pra começar de verdade ainda... mas o quadradinho anda. // eu ando`) que aponta pro quadradinho, o único jogável hoje. Satisfação e honestidade no mesmo gesto; quando o jogo sair, o START passa a funcionar de verdade. B (levar direto ao quadradinho) ficou de fora. O `prefers-reduced-motion` pula o boot e vai direto para a fala.

### A anatomia da edição (`ANATOMIA-DA-EDICAO`) — modelo revista cheia, leitura A

Mock: [`mockups/09-anatomia-edicao.html`](mockups/09-anatomia-edicao.html). Template das 18 seções fixas em toda edição (modelo revista cheia), na ordem clássica BR (leve na frente, expert no fim). O índice e a capa saem do `$edicoes` datado, e o índice fecha com os 3 links fixos (repo GusWorld, GlintFX, TODO.md vivo do jogo). **Leitura decidida: A, rolagem única com o índice ancorando** (web-native, resolve o mobile, e o vazio-com-graça aparece no fluxo).

**A regra que sustenta a revista cheia no gargalo do líder:** seção fixa sem material naquele número não vira produção, mostra um vazio-com-graça honesto na voz do Gus (mesmo DNA do detonado em branco). A copy de cada vazio é decidida sempre com o líder, uma por vez; no mock ela está marcada como copy de exemplo. A acentuação pt-br do texto de papel (o texto de tela fica ASCII) é uma passada do `ux-writer`.

**A voz em prompt de shell (`D-VOZ-PROMPT`, memória `voz-prompt-shell`).** Toda fala do Gus vem como `gus@glyfesse> [fala]`, e o pensamento ou aparte vem logo abaixo como `// comentário` esmaecido: o `//` é o que não é executado, a reticência do Gus tornada visível. O prefixo `nome@glyfesse>` é sempre ASCII (é um prompt); a fala depois segue o material (acentuada no papel, ASCII na tela). O criador é `root@glyfesse>` (superusuário), nunca nomeado Pyotor: encoda criador para filho sem dizê-lo. No mock 09 a convenção está aplicada no Editorial, nos vazios-com-graça e na Entrevista (onde o `root@glyfesse>` responde pouco, como quem escreve "use bem").

---

## 5. O que a identidade restringe e confirma na stack

A stack (`HTML5 → PHP → JS`, sem framework, sem build) **sai reforçada**. Nada aqui pede JavaScript.

| Peça | Como sai | Custo de JS |
|---|---|---|
| **O envelhecimento** | `color-mix` + uma variável `--idade` por edição | **zero** |
| **A banca inteira** | `foreach` PHP passando `--idade` | **zero** |
| **A fibra do papel** | `feTurbulence` inline (com dimensão explícita) | **zero** |
| **A dobra, o halftone, o brilho** | gradiente e `background-size` | **zero** |
| **O sprite andando** | `steps()` nos walk cycles que já existem | **zero** |
| **Os dois materiais** | `[data-material]` + `prefers-color-scheme` | **zero** |

**Confirma:** zero dependência de rede. Bom para a CSP, para o "zero terceiro por padrão" e para o peso. **Custo real da identidade: 96,7 KB de fonte, e nada mais.** As texturas (fibra, halftone, dobra, brilho) são geradas em CSS/SVG inline e custam **0 byte de download**. Referência: o Animal Well inteiro tem 33 MB.

**Restringe:**
- **A tinta é calibrada no pior papel.** Novo token de tinta **tem** que passar AA sobre `--papel-fim`.
- **Raio zero no papel.** Componente de papel com canto arredondado contradiz o material.
- **O neon só existe dentro de `.aceso`.** Ciano solto sobre papel é invisível (1.48:1) e está proibido.
- **Pixel nunca em parágrafo.** E isto não é regra a decorar: é consequência do material. Tinta em papel quer legibilidade; o pixel vive no título e dentro dos buracos de tela.
- **Zero terceiro por padrão.** Nenhuma fonte de CDN externo (Google Fonts transfere o IP do visitante, e **há criança no público**). Fonte **self-hosted** ou nativa do sistema, sempre.
- **CDN é cache:** o poll ao vivo não pode ser cacheado.

### ⚠️ REGRA DE PRODUÇÃO: todo filtro SVG com `width`/`height` explícitos

**Não é uma curiosidade do mock: é o CSS de produção.** O `feTurbulence` da fibra do papel vai estar no site real.

```css
/* ERRADO: some no Firefox, funciona no Chrome. */
background-image:url("data:image/svg+xml,%3Csvg xmlns='...'%3E%3Cfilter id='f'%3E...");

/* CERTO: dimensão explícita no <svg> E no <rect>, mais background-size. */
background-image:url("data:image/svg+xml,%3Csvg xmlns='...' width='180' height='180'%3E...");
background-size:180px 180px;
```

O Blink infere a dimensão de um SVG de background pelo tamanho do elemento; **o Gecko não, e descarta a imagem inteira**. O líder usa Firefox. Sem isso, **a fibra do papel some e a revista vira uma div bege**, silenciosamente, só num dos motores.

**Quem implementar (`frontend-engineer`): esta regra vale para qualquer filtro SVG que entrar no site.** Sem ela o bug volta em produção e ninguém vai lembrar por quê.

---

## 6. Escopo

**Nesta rodada (fechado):** a vibe, os dois materiais, a paleta tokenizada com a conta, a escala de idade, e a prova renderizada nos dois motores.

**Nesta rodada também fechou:** a **tipografia** (par A), com as fontes self-hosted, convertidas para woff2 e as licenças commitadas ao lado.

**Aberto, na ordem:**
1. ⏳ **A primeira dobra** com o quadradinho jogável (`QUADRADINHO`). O coração do site. Já decidido e não se re-litiga: **não tem arte** (é um retângulo que anda, e **essa é a graça**), **ele já era ciano**, e a evolução se **sente na mão**, não se lê.
2. ⏳ **Mobile** (`MOBILE-RISCO`, o maior risco prático). A revista é A4 e não cabe em 390px. Os mocks já nascem em ~400px, o que ajuda, mas **falta o problema duro: o quadradinho precisa de teclado, e no celular não há teclado.** O líder quer decidir isto junto.
**Também fechou nesta rodada** (aplicação, sem decisão nova): o **CRT desligável com zero JS**, a **mancha de café com o guard de zona segura**, e o **motion reduzido**. Detalhe em [`tokens.md` §10](tokens.md).

---

## 7. Referências de pesquisa

Ver [`conceito.md`](conceito.md) §2, §3 e a memória `pesquisa_retro_revista_web` (pesquisa já feita, **não refazer**). O que sustenta a direção aqui: a fadiga de 2026 é de **intenção**, não de estética; o teste de cada elemento é *"isso tem motivo dentro da ficção do Gus, ou é só referência?"*. **O papel tem motivo: a revista existe porque a espera precisava de formato, e o Gus recorta cupom.**
