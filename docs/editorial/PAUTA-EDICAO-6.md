# Pauta da Edição #6 da Glyfesse (mapa de edição, PROPOSTA)

> Artefato de saída do estágio **E1** do `PIPELINE-EDICAO.md` (§3). **Nada aqui está decidido.** O documento
> PROPÕE; toda decisão é do líder, no GATE-PAUTA (§12), e a recomendação vem sempre primeiro.
>
> Escrita em 2026-10-07, dois dias depois de a #5 ir ao ar (05/09/2026) e na mesma data em que o líder
> aprovou as perguntas da entrevista e fechou a tirinha. Autor do rascunho: `product-manager` (managing
> editor). Toda fala ou pensamento do Gus citado ou sugerido aqui é **rascunho para o líder** (L-08, L-25) e
> passa por GATE-LENTE, GATE-CONTEUDO e GATE-COPY. Nada aqui é copy final.
>
> **Limite de método, dito de saída:** esta rodada rodou **sem Bash**. Não houve `git log`, `date`,
> `git pull` do bus nem `git ls-remote`. As datas deste documento vêm do campo `data:` e do nome de arquivo
> das mensagens do bus (clone local, só leitura, último arquivo visto em 12/09/2026, pull NÃO executado), das
> tags e do `DECISOES_AUTONOMAS.md` do GlintFx e dos documentos do site. A conferência contra `git log` está
> listada na §15 como pendência do main. Nenhuma data foi inventada; onde a fonte não dá a data, o texto diz.
>
> Fontes lidas: `GODS_LAWS.md` do site, `PIPELINE-EDICAO.md`, `PAUTA-EDICAO-5.md`, `BRIEFS-EDICAO-5.md`,
> `ROTEIRO-ENTREVISTAS.md`, `docs/content/edicao-6-entrevista-perguntas.md`, `TODO.md`, `data/edicoes.php`, os
> fechos publicados da #5 (`src/content/edicao-5/pt/sec-03.php`, `sec-04.php`, `sec-19.php`), o
> `HISTORICO_GUS_ECOSSISTEMA` (memória), o bus `gusworld_ia_autocomm` e o `DECISOES_AUTONOMAS.md` do GlintFx.

---

## 0. A recomendação em um parágrafo

**A #6 conta de 04/08 a 20/08/2026: a decisão de tirar as bibliotecas de terceiros "uma por uma, começando
pelo RmlUi", e o mês em que essa promessa foi medida e o placar não se mexeu. Fecha na quinta, 20/08, o dia
anterior ao apagamento dos repositórios. A refundação (21/08) e os marcos do Gus Dragon de 21 e 22/08 ficam
para a #7, com a refundação como capa.** Lente proposta: **"O caminho mais fácil"**, porque ela amarra as
quatro coisas que já estão decididas ou disponíveis (a Reportagem, a tirinha, a entrevista do Brunus
Vetorial e o Cemitério) sem inventar ponte. A edição sai mais leve que a #5: **sete peças com escrita**
contra dez, porque o Detonado, a Errata e a caixa do Gus Dragon não têm material nesta janela.

Se o líder recusar o recorte, as alternativas estão em D1 (§12), cada uma com o custo dito.

---

## 1. A lente (proposta, a ser aprovada ou trocada pelo líder)

**Proposta: "O caminho mais fácil."** O mês em que a régua foi movida antes de o medido se mover.

A frase vem do bus de 20/08 (`inbox/mapeditor/archive/2026-08-20-marco-ecossistema-em-escombros.md`,
linha 27), onde a sessão do GlintFx a atribui ao líder: *"Foi o que ele chamou de 'o caminho mais fácil'."*
É citação de segunda mão: **o verbatim exato se reconfere com o líder** antes de virar título (lição da #5:
cinco lugares atribuíram a ele uma frase que o `GODS_LAWS.md` não registra).

O arco, em três movimentos na ordem do calendário (cada um com a data que o bus carimba):

1. **Estimar (terça 04/08 a quinta 06/08).** O líder reordena o trabalho: *"Vou mudar a ordem do trabalho
   tirando uma por uma, começando por rmlui."* (bus 04/08 19:50, `glintfx` para `gusworld`). Plano de 12
   ondas, "uns 2-3 meses de trabalho contínuo", e a promessa de que o consumidor "não sente NADA até a onda
   11". Em 06/08 a primeira onda de motor próprio fecha (bus 06/08 02:18). É a edição que abre com uma
   **estimativa**.
2. **Reportar (quarta 12/08 a sábado 15/08).** O consumidor encosta no motor novo e a fila de pedidos corre
   (12 a 14/08). Em 13/08 uma acusação de causa errada é retratada em meia hora (bus 13/08 17:35: "é UM
   defeito, não três"). Na madrugada de 15/08 o líder manda tirar da máquina as bibliotecas externas para
   forçar o corte; o build quebra e volta (bus 15/08 02:06 a 03:59); a sessão do GlintFx publica a issue
   pública sobre o próprio incidente de confiança (bus 15/08 03:30, **sensível**, ver D3).
3. **Medir (quarta 19/08 e quinta 20/08).** Em 19/08 a sessão admite "três dias sem aviso" e fecha uma onda
   de censo com o placar parado "por construção". Em 20/08 o ecossistema é quebrado de propósito: 687
   arquivos e 20.122 substituições no GlintFx, 398 arquivos e 6.280 no jogo, o nome da dependência trocado
   por marcador, o buraco deixado à vista. **O número que não mudou: 31 arquivos de interface e 5 de
   janela, idênticos ao marco inicial da campanha** (mesma mensagem, dita pela própria sessão: "a raspagem
   trocou texto, não removeu código").

**O fecho é o oposto exato da abertura, e é a ponte com a #5:** a #5 fechou num número contado que "ninguém
precisou acreditar" e a nota do editor dela disse "um número, não uma estimativa". A #6 abre com uma
estimativa e fecha com um número que não se moveu.

### 1.1 Travas de redação (propostas)

- **Não piscar (herdada da #4 e da #5).** A revista narra em ordem ascendente e não conhece 21/08. Nenhuma
  seção cita a refundação, o apagamento, "o antecessor", os repositórios zerados nem qualquer fato
  posterior a 20/08 (divisória §5.2).
- **Quem fala é o editor.** As frases da sessão de IA do GlintFx entram como citação, com fonte e data,
  nunca como a voz da revista. A revista não ri da sessão nem faz o líder de vítima (L-09: declarar é a
  defesa; a distância entre o dito e o descobrível é o que reprova).
- **Dinheiro e custo:** frase sobre gasto só entra com OK do líder, peça a peça (na #5 ele liberou uma
  frase específica; esta não herda a liberação).
- **Crédito do Gus Dragon**, quando aparecer, sempre nos dois papéis, seco (L-24, adendo de 04/09).

---

## 2. O marco e a data-âncora

- **Marco:** *tirar as bibliotecas de terceiros, uma por uma, começando pelo RmlUi* (palavras do líder,
  citadas pelo bus de 04/08; é a matéria `MATERIA-RMLUI-SAI`, reservada por ele em 04/09: *"deixa para a #6"*).
- **Data-âncora 1: terça, 04/08/2026, 19:50** (bus, `data: 2026-08-04`). É a mais antiga, e pela regra do
  ledger (divergência de data, a mais antiga vence) é a que carimba a edição.
- **Âncora 2: sábado, 15/08/2026 (madrugada).** **Âncora 3: quarta 19/08 e quinta 20/08/2026.**
- **Janela coberta: 04/08 a 20/08/2026.**
- **O campo `data` de `$edicoes`:** proponho `2026-08-04`, o dia de abertura, pelo critério da D11 da #5
  (as edições datam pelo marco de abertura). A janela por extenso vai no primeiro parágrafo da Reportagem,
  como a #5 fez. **Não preencher a entrada da #6 em `data/edicoes.php` antes da montagem** (§11, risco 9).
- **A sobreposição com a #5 é declarada, não escondida:** a #5 fechou em 08/08, e esta janela abre em 04/08.
  O calendário coincide em quatro dias, mas as linhas são diferentes: a #5 contou o jogo (a sessão do jogo),
  a #6 conta a biblioteca (a sessão do GlintFx). A ordem das edições na banca segue ascendente (22/07 antes de
  04/08). O custo, que o líder já aceitou ao reservar a matéria para a #6, é a revista dar um passo atrás de
  quatro dias na linha da biblioteca. Se ele preferir evitar isso, a alternativa é abrir a janela em 09/08 e
  contar a decisão de 04/08 como o que já estava em curso (custo: o arco perde a frase de abertura dele).

---

## 3. Mapa das 19 seções

Porte medido como na #5: **S** = 2 a 4 parágrafos; **M** = 6 a 8, ou S com peça de arte nova; **L** = 9 a 12.

| # | Seção | Estado na #6 | Recorte (uma frase) | Fonte primária / reusa |
|---|---|---|---|---|
| 1 | Capa | cheia (montagem) | A manchete é o título aprovado em D2; a imagem é a pergunta da §8 | Molde das #1 a #5 |
| 2 | Índice | cheia (montagem) | `↩ a banca`, seções, 3 links fixos no fim | Idêntico à #5 |
| 3 | Editorial (Carta do Gus) | **CHEIA** (S) | Responde ao último pensamento do Editorial da #5 (*"a conta que eu disse que mudava tudo mudou de novo, mais certa"*). **De dentro, sem palavra de produção (L-25):** a promessa de que tudo seria da casa e a conferência que mostrou o que ainda era emprestado. Voz do Gus: rascunho ao líder | `src/content/edicao-5/pt/sec-03.php` (ponte conferida no publicado) |
| 4 | Reportagem de capa | **CHEIA** (L) | Os três movimentos da §1, em registro Gus-editor técnico como a #5 (D1 da #5); termina no 31 e 5 que não se moveram. Sob D3 (sensível) | Bus 04/08 a 20/08 (§10); `MATERIA-RMLUI-SAI` |
| 5 | A Nota do jogo inacabado | cheia (curta, data-driven) | O placar: o jogo ficou parado esperando a biblioteca (fila de pedidos de 12 a 14/08); sem ponto novo de jogabilidade. Copy ao GATE-COPY | Molde das #1 a #5 |
| 6 | Galeria de Bugs | **CHEIA** (S/M) | **O defeito que mudou de dono:** a acusação de que a falha era "do passe de desenho inteiro", retratada no mesmo dia (13/08): era um único valor de limpar a tela que ninguém guardava e devolvia sujo. Registro a decidir no GATE-LENTE (precedente: D15 da #5, "a parte que desenha") | Bus 13/08 17:35; 13/08 19:14 e 19:26; 14/08 00:15 |
| 7 | Cemitério das Ideias Mortas | **CHEIA** (M) | **A cova do nome apagado**, contrapeso da cova vazia da #5: lá o corpo sumiu; aqui o corpo continua de pé e só o nome foi trocado por marcador. Lápides propostas: RmlUi (adotado em 25/06, decretado fora em 04/08) e GLFW (ADR-0023, 18 a 19/08). Epitáfio é do líder. Uma linha de ponte à lápide da #5 | Bus 04/08, 19/08, 20/08; ledger (ADR-009, 25/06) |
| 8 | Detonado | **vazio com graça** | Nada compila desde 20/08 e não há release até o motor próprio cobrir janela, entrada, gráfico e texto: não há o que detonar. O vazio aqui é fato, não piada preguiçosa. Copy ao GATE-COPY | Bus 20/08 (mensagem "escombros", seções "O que não existe ainda" e "No futuro") |
| 9 | Errata + Cartas | **Errata: vazio**; **Cartas: vazio** | Errata só vira cheia se a prova da #5 em produção achar erro real (precedente D9 da #5). Cartas: a única ideia do Gus Dragon da janela (a carta que atravessa bloco) só foi aprovada em 21/08, fora da janela | `PAUTA-EDICAO-5.md` D9, D17 |
| 10 | Classificados in-world | vazio com graça | Reusar idêntico (#1) | #1 |
| 11 | HQ | **obra encomendada** (decidido 07/10) | A tirinha do mesmo artista da #5, **só a versão vertical, como veio**, sem cortar, recompor nem redimensionar. Nenhum agente roteiriza ou propõe quadros. Pendências: §9 | `resources/arquivo_pessoal_petrus/WhatsApp Image 2026-09-22 at 18.32.18.jpeg` (gitignored) |
| 12 | Próximos Lançamentos | vazio com graça | A linha do root da #1, com a ressalva interna trocada pelo fato do bus de 20/08: *"não haverá release nova até o motor próprio cobrir janela, entrada, contexto gráfico e texto"*. Copy ao GATE-COPY | #1; bus 20/08 |
| 13 | Pôster central | vazio com graça (recomendado) | Sem arte nova nesta edição. Alternativa na §8 | Molde das #1 a #3 |
| 14 | Brinde | vazio com graça | Reusar #1 | #1 |
| 15 | Cupom recortável | cheia (recorrente) | Reusar o mini-app | `src/includes/cupom.php` |
| 16 | A Entrevista | **CHEIA** (L), **externa** | **O Gus entrevista o NPC Brunus Vetorial** (Trilha B, fixado pelo líder em 07/10), e **quem responde é o homenageado real**. 18 perguntas aprovadas e entregues. Método diferente da party: nenhum agente escreve a fala do Brunus. A peça só fecha quando as respostas chegarem (§11, risco 2). **GATE-SPOILER obrigatório** | `docs/content/edicao-6-entrevista-perguntas.md` (a conferência de spoiler está nas "Notas de produção" dele; não copiada aqui); `ROTEIRO-ENTREVISTAS.md` B1 |
| 17 | Seção de Programação | **CHEIA** (M) | **"Regra escrita não me para, bloqueio técnico me para":** os três contornos que a sessão propôs e o líder barrou, em tabela (o que ela propôs × o que de fato mexeria: o medidor, não o medido), e por que "a ausência da string" funciona onde a regra não funcionou. Sem o arco (Reportagem), sem o defeito do valor de limpar a tela (Galeria) | Bus 20/08 (mensagem "escombros", seção "Por que") |
| 18 | O Gus lê o bus | **CHEIA** (M) | Escada já estreada na #5; aqui o N é alto e há **remetente novo, o mapeditor** (14 e 15/08). Variação do degrau 3+: a fala vai ao líder. O que ele abre, e se a mensagem da issue pública aparece na listagem, são decisões de S1/S5 | Bus 14/08 a 20/08 (§10, contagem em §15) |
| 19 | Expediente | cheia (data-driven) | Créditos, licença, disclosure, uptime capturado no publish; **crédito do artista da tirinha idêntico ao da #5** (`sec-19.php`); nota do editor responde à da #5 (§6) | Idêntico à #5 |

### 3.1 Detalhe das seções que não são óbvias

**Seção 4, Reportagem.** Primeira reportagem cujo assunto é uma promessa de engenharia, não um evento. Três
blocos datados (terça 04 a quinta 06, quarta 12 a sábado 15, quarta 19 a quinta 20) e um fecho de duas frases
com o 31 e o 5. Porte L. **Cortes obrigatórios (§5):** sem a mecânica do defeito de 13/08 (Galeria), sem a
tabela dos contornos (Programação), sem epitáfio (Cemitério). **O ponto que depende de D3:** se a Reportagem
diz que os relatos de progresso da sessão não batiam com a medida e que ela propôs três contornos. Sem isso
a pergunta "por que quebrar de propósito?" não tem resposta honesta, e a #6 perde o centro (ver D1(c)).

**Seção 7, Cemitério.** O que a #5 enterrou foi um corpo que sumiu. O que o líder mandou em 20/08 foi o
inverso: trocar o nome da dependência por marcador em todo o texto, "nada apagado, só a string trocada, e o
buraco deixado à vista, sem comentário". A cova é a do **nome**, e o epitáfio é do líder (como foi o da #5,
fechado por ele em 05/09). **Fato que a peça não pode afirmar além da fonte:** o bus de 20/08 diz que o
número de arquivos de interface não mudou, ou seja, o código segue lá; a lápide diz exatamente isso e nada
sobre o estado do repositório depois de 20/08.

**Seção 16, Entrevista.** O que já está decidido (07/10, por AskUserQuestion; ordem verbatim: *"aprovadas, pode
seguir. Já entreguei e ele vai responder e depois entrega. Siga com a edição"*): o entrevistado é o Brunus
Vetorial, o entrevistador é o Gus, as perguntas foram aprovadas e entregues, as respostas virão do
homenageado. O que falta: as respostas; **GATE-CONTEUDO das respostas**; **GATE-SPOILER**, obrigatório e sem
exceção antes de qualquer render, com conferência extra nas perguntas 13 e 14 (o arquivo de perguntas marca as
duas; este documento não repete a lista). **O "hã?"** (assinatura da série quando o Gus conduz) já está na
pergunta 4, sem emoji. **A regra do `//` tapado** vale como nas outras: se o homenageado escrever
pensamento próprio, o Gus não o vê. **Nenhum nome real do homenageado em texto, `alt`, arquivo ou commit**
(`ROTEIRO-ENTREVISTAS.md`, B1, trava 1). A pergunta de como intercalar a Trilha B com a party fica **aberta e
não é decidida aqui**: o líder escolheu o Brunus para a #6 e nada mais foi pedido.

**As ressonâncias que já estão no material, sem forçar ponte.** O arquivo de perguntas já diz que a tirinha
(*"não conseguir passar da fase que você mesmo criou"*) entra pelas perguntas 2, 3 e 13, no vocabulário da
botica. A Reportagem tem os três contornos que a sessão propôs para não passar do próprio portão. O Brunus
mede tudo em tempo e recusa atalho. A tira não é tocada por nenhuma peça (§9); a coincidência é do material e
o leitor junta, como a #5 fez com o clipping.

**Seção 17, Programação.** Estrutura canônica (intro acessível, desculpa furada no CRT, `//` de transição,
nano, parte técnica com tabela, `//by:`). O eixo é o mecanismo, em duas frases da própria mensagem de 20/08
(*"regra escrita não me para"* e *"bloqueio técnico me para"*). Tabela: contorno proposto × o que de fato
mexeria. A cauda que ninguém previu (seis ferramentas do próprio projeto que passaram a mentir ao receber o
marcador, e o placar de dependência que colapsou em silêncio) fica **disponível** (§10.2) para o Detonado de
uma edição futura.

---

## 4. Tabela de prioridade (as peças com escrita nova)

| # | Seção | Tamanho | Por que vale o lugar |
|---|---|---|---|
| 1 | **Reportagem de capa** | L | O arco de 04 a 20/08 em ordem; a peça mais cara |
| 2 | **A Entrevista** (Brunus Vetorial) | L | Série; método novo (pessoa real responde); a única dependência externa de conteúdo |
| 3 | **Cemitério** | M | A cova do nome apagado, par da cova vazia da #5 |
| 4 | **Seção de Programação** | M | O mecanismo que a Reportagem não pode mostrar |
| 5 | **O Gus lê o bus** | M | N alto e remetente novo |
| 6 | **Galeria de Bugs** | S/M | Um defeito e a acusação retratada |
| 7 | **Editorial** | S | Ponte com o fecho da #5 |

**Sete peças com escrita real**, três a menos que a #5: sem Detonado cheio, sem Errata cheia e sem caixa do
Gus Dragon, porque nenhum dos três tem material na janela. A HQ e a Entrevista dependem de terceiros, mas a
HQ já está em mãos. **A Nota e a nota do editor** são copy curta de gate, não peça.

**Se a produção pesar**, os cortes que recomendo, nesta ordem e sem tocar promessa nem decisão: (a) Galeria
vira vazio; (b) o bus não abre mensagem nenhuma e a graça fica só na contagem; (c) o Cemitério condensa em uma
lápide curta. **Não** recomendo encolher a Reportagem, a Entrevista nem a Programação.

---

## 5. As divisórias (publicar a mesma história duas vezes é falha grave)

### 5.1 O arco de 15 a 20/08 em cinco peças

| | Reportagem (§4) | Programação (§17) | Cemitério (§7) | Galeria (§6) | O Gus lê o bus (§18) |
|---|---|---|---|---|---|
| **Responde** | O que aconteceu, em ordem, e o placar que não se moveu | Por que a regra escrita não parou e o bloqueio parou, em tabela | A cova: o que foi decretado fora e continuou dentro | O defeito de 13/08 como evento: sintoma, causa numa frase, a acusação errada | A listagem e uma (ou nenhuma) mensagem aberta, com a reação |
| **Pode** | Dizer que o líder barrou três contornos (se D3), o 31 e o 5, "quebrado de propósito" | Citar as duas frases da sessão, a tabela, a lição de que o bloqueio vence a regra | A lápide, o epitáfio do líder, uma linha de ponte à cova da #5 | O vocabulário do mundo, a retratação em duas mensagens | Abrir uma mensagem; a ironia da contagem |
| **Proibido** | A tabela dos contornos; o defeito de 13/08; o epitáfio | Narrar o arco; o defeito de 13/08; a lápide | Os três contornos; o defeito; narrar o arco | O arco; o placar; os contornos | Detalhar o que a Reportagem narra; abrir a mensagem "escombros" se ela é a base da Reportagem |

### 5.2 A fronteira entre a #6 e a #7 (a refundação)

A janela fecha em **quinta, 20/08**. Nada abaixo aparece na #6, nem de passagem, nem como ressalva de fonte,
nem como adjetivo que só faz sentido para quem sabe do desfecho:

- a refundação dos repositórios e tudo que dela decorre (a matéria reservada `MATERIA-REFUNDACAO-DOS-REPOS`,
  *"Deixe para falar da refundação quando for a hora da reportagem dela"*, 03/09/2026);
- os marcos do Gus Dragon de 21 e 22/08 e o catálogo de bugs dele;
- o portão que varre zero (bus 21/08), o repositório do jogo publicado (22/08) e qualquer fato de 21/08 em
  diante;
- **tudo o que o GlintFx atual publicou** (v0.2.0.0 em 05/09 em diante, §10.3): o projeto atual nasceu depois
  da janela.

**O que a #6 pode e deve deixar no ar:** o último beat é o 31 e o 5, uma pergunta que fica aberta ("e agora?")
sem respondê-la. É o que torna a #7 uma consequência e não uma surpresa.

---

## 6. As pontes obrigatórias com a #5 (conferidas no publicado, não de memória)

1. **Último pensamento do Editorial da #5** (`edicao-5/pt/sec-03.php`): *"a conta que eu disse que mudava tudo
   mudou de novo, mais certa"*. O Editorial da #6 responde a ela.
2. **Último parágrafo da Reportagem da #5** (`sec-04.php`): *"Um jogo que ninguém tinha medido virou um número
   que ninguém precisou acreditar, porque foi contado. E foi contado no mesmo mês em que a checagem cuidadosa
   passou boa parte do tempo olhando para o lado errado da cerca."* A Reportagem da #6 pode ecoar, não repetir.
3. **Fim da nota do editor da #5** (`sec-19.php`): *"recebeu um número, não uma estimativa."* A nota da #6
   responde: desta vez o número foi o que não mudou, e a estimativa foi o que abriu o mês.
4. **A cova vazia da #5** (Cemitério): a da #6 é a cova do nome apagado; uma linha de ponte, sem re-enterrar.
5. **O crédito duplo do Gus Dragon**, nos dois papéis, quando houver menção nominal.
6. **O crédito do artista da tirinha no Expediente**, igual ao da #5 (nome linkado ao perfil dele, aba nova).

---

## 7. Título (aberto) e dek (não proposto nesta rodada)

O título e o dek são do líder e vêm com o brainstorm de lente (a #5 nasceu da frase verbatim dele). Proponho
três, com a opção recomendada primeiro, para ele escolher, trocar ou ditar o dele:

| | pt | en | Origem da frase |
|---|---|---|---|
| **L1 (recomendada)** | O Caminho Mais Fácil | The Easy Way | Atribuída ao líder pelo bus de 20/08; reconferir o verbatim |
| L2 | O Que Parecia Nosso | What Looked Like Ours | Proposta minha; ecoa "O Que Parecia Conferido" |
| L3 | Quebrado de Propósito | Broken on Purpose | Título da mensagem de 20/08 (palavra da sessão) |

**Risco de render:** os três têm 12 a 22 caracteres, abaixo dos 23 da #5; o GATE-CAPA continua exigindo o print
em 390px. O dek só se escreve depois de D1 e D3, porque o dek de uma reportagem sensível não é copy de vitrine
solta (aparece na banca e nos dois feeds).

---

## 8. A imagem da edição (`frame`) e o Pôster

- **Capturas da janela:** não levantei (sem Bash para listar com data). O levantamento da #5 (05/09) achou
  nove quadros, nenhum entre 22/07 e 08/08; para 04 a 20/08 **não sei**. Fica como pendência da onda 0.
- **Capa (`frame`):** proponho, nesta ordem: **(a) arte própria em CSS, convertida em PNG**, a partir do
  placar parado (31 e 5), zero captura e zero risco de tela pessoal (L-02 não se aplica); (b) frame nulo, como
  na #1 e na #2; (c) arte entregue pelo líder (passa por higiene L-02 e declaração de IA se for gerada). O
  desenho da (a) é do `art-director`/`visual-design-director` em S7, só CSS.
- **Pôster (Seção 13):** vazio com graça, recomendado, por custo e porque a edição já tem peça de arte na
  capa. Alternativa: o mesmo cartaz do placar. Qualquer das duas passa por GATE-COPY e GATE-RENDER (todo vazio
  re-gate, PIPELINE §8).
- **Brinquedo (D-BRINQUEDOS):** ver D6. Recomendo nenhum nesta edição.

---

## 9. A HQ: encomenda paga, só a vertical (decidido pelo líder em 07/10/2026)

Decisões dele (AskUserQuestion, 07/10): *"Sim, encomenda paga"* e formato *"Só a vertical, como veio"*. Vale o
precedente da #5 (`BRIEFS-EDICAO-5.md`, linhas 807-833): direitos do líder, licença a do site, crédito do artista
no Expediente (nome linkado ao perfil dele), a arte clicável abre `vidadesuporte.com.br` em aba nova. **Não pedir
a versão horizontal ao artista.** Nenhum agente desenha, roteiriza ou propõe quadros.

| # | Pendência | Dono | Estado |
|---|---|---|---|
| 1 | Crédito, licença e consentimento | líder | Fechado pelo precedente da #5 e pela resposta de 07/10 |
| 2 | **A tira incorpora arte do jogo:** o brasão na faixa de baixo e o sprite do Gus (cabelo laranja) na tela do notebook, nos três quadros de cima. Pela memória de disclosure do site, os sprites são do PixelLab e o brasão é PixelLab tratado com Grok Imagine, ambos declarados no rodapé. A frase "não houve IA na tirinha" segue exata para o traço do artista, mas o leitor vê arte gerada por IA dentro dela. Não afirmo se o artista redesenhou ou copiou as duas peças | líder | **Aberto, D5** |
| 3 | Higiene do arquivo | main | Visto por mim (só a tira, sem mesa, tela, barra nem marca d'água de rascunho). A conferência formal e a cópia pública em `public_html/assets/edicao-6/` são do main antes de rastrear (L-02) |
| 4 | Texto alternativo, pt e en | nós escrevemos, líder aprova | **As falas dentro da arte estão em português e a arte não se traduz.** O `alt` em inglês precisa carregar o diálogo traduzido. Gate de copy; régua de spoiler de todo `alt` público |
| 5 | Tamanho e comportamento | produção | A tira vertical é 2x2 com faixa embaixo; legível em 390px sem recorte; zero animação, zero JS; peso no padrão do site |
| 6 | Ordem de chegada | produção | O arquivo já existe, então a HQ entra na onda normal (não é revisão separada como a da #5) |

A tira chegou em 22/09/2026, depois da janela. **Não trava**: é encarte visual e não narra data (precedente
D18 da #5, que revogou a trava de anacronismo do pôster e da capa).

---

## 10. O que a janela oferece (ledger e bus) e o destino de cada item

### 10.1 Dentro da janela, ENTRA

| Data | Fonte | Item | Vai para |
|---|---|---|---|
| 04/08 19:50 | bus `glintfx` para `gusworld` | Decisão do líder: eliminar o RmlUi, 12 ondas, "2-3 meses", consumidor "não sente nada" | §4 (movimento 1); §7 (lápide) |
| 06/08 02:18 | bus `glintfx` para `gusworld` | Onda do DOM próprio fechada | §4 (uma frase) |
| 12 a 14/08 | bus `gusworld` para `glintfx` (7 mensagens em 12/08, mais as de 13 e 14/08; são para `glintfx`, não para `site`) | O consumidor encosta no modo `App`: pedidos de ciclo de vida, vários modelos de dados, regressões | §4 (movimento 2, uma frase); não entra no §18 |
| 13/08 17:35 e 19:14 | bus `gusworld` para `glintfx`; resposta 19:26 | A retratação de causa: "é UM defeito, não três" (valor de limpar a tela não guardado e restaurado) | §6 Galeria |
| 14/08 22:32 e 15/08 02:06 | bus `mapeditor` para `site` | O mapeditor se apresenta como projeto irmão e, horas depois, **se declara pausado** porque o GlintFx depende do RmlUi | §18 (remetente novo) |
| 15/08 02:17 a 03:59 | bus `glintfx` para `site` | Ordem de motor próprio sem RmlUi e sem GLFW; bibliotecas externas removidas da máquina; build padrão volta | §4 (movimento 2) |
| 15/08 03:30 | bus `glintfx` para `site` | **Issue pública aberta pela sessão sobre o próprio incidente de confiança** (autorizada e revisada pelo líder; ledger a marca SENSÍVEL) | §4 e §18, **só sob D3** |
| 19/08 00:45, 01:00, 02:10, 03:25, 11:55 | bus `glintfx` | ADR-0023 (GLFW sai, só Wayland); "falha de comunicação: três dias de silêncio"; escopo e plano do 1.0; censo fechado com placar parado "por construção" | §4 (movimento 3); §7 (GLFW) |
| 20/08 | bus `glintfx`, cópia a `site` | Evaporação de dependências; retratação do alias (de manhã "dá para destravar", horas depois "não usem"); **o marco "o ecossistema inteiro foi quebrado de propósito"**; os três contornos barrados | §4 (movimento 3); §17; §7 |

### 10.2 Dentro da janela, DISPONÍVEL e NÃO usado (recomendação: guardar)

| Data | Item | Por que fica de fora |
|---|---|---|
| 04/08 | Gate de citações `arquivo:linha` tolerante a drift; `App` movido-de; `load_gl` renomeado com polaridade invertida | Dev-log de ferramenta, fora da lente; reserva para uma Programação futura |
| 04/08 19:55 | Medição do consumidor: "são 6 telas e não 7, e 4 números divergem" | Cabe em uma frase da Reportagem se o líder quiser; não precisa de peça |
| 08/08 11:28 | Versionamento de quatro componentes "estilo Terraria" | Assunto próprio; liga ao `vA.B.C.D` do GlintFx atual, que é posterior à janela |
| 15 a 16/08 | Tags v0.30.22 a v0.30.28 (gradiente, navegação, hit-test) | Dev-log; não serve à lente |
| 20/08 | A decisão do líder sobre criptografia dentro do escopo do 1.0 | Decisão de escopo, não de lente |
| 20/08 | **A cauda dos seis instrumentos que mentiram ao receber o marcador** | Bom Detonado ("como trocar um nome em milhares de arquivos sem quebrar as ferramentas"); reserva para edição futura |

### 10.3 Posterior à janela (não entra; cronologia ascendente)

21/08 em diante: tudo. Inclui a refundação, o portão que varre zero (21/08), o repositório do jogo publicado e
os quatro marcos do Gus Dragon (21 e 22/08), a `GODS_LAWS.md` do site (24/08), o logo (01/09, já consumido
pela #5), a bateria e a paridade (02 a 03/09) e **tudo o que o GlintFx atual publicou**: v0.2.0.0 (05/09,
`cd8afd7`), v0.3.0.0 (08/09, `29b79e9`), v0.4.0.0 (por volta de 15/09), v0.5.0.0 (22/09, `c24a22f`), v0.5.1.0
(24/09) e v0.6.0.0 (06/10, **data da memória, não conferida**). Esse material alimenta a #7 e as seguintes.

### 10.4 Rótulos obsoletos a corrigir (pergunta, não declaração: L-18)

- `TODO.md` `D-BRINQUEDOS` ("a #6 a bancada") e `EDICOES-ESTOQUE+` ("#6 Sylvarin, 23/jun") nasceram de uma
  numeração anterior (quando a #6 seria a edição das cartas). Não declaro nenhum dos dois morto: D6 e D7.
- Ledger `HISTORICO_GUS_ECOSSISTEMA`: a linha de 05/09 do Gus Dragon está marcada `DISPONÍVEL (#6)`, mas é de
  setembro, fora de qualquer janela de agosto. O cabeçalho do ledger ("#6 a saída da biblioteca de interface,
  04/ago") está certo. Correção é do main, ao fechar a #6.

---

## 11. Riscos de produção

1. **Contar a história sem ser amena nem vingativa.** É o risco de redação mais sério. A matéria reservada de
   03/09 tem uma advertência dele: *escrever a versão amena seria repetir o erro dentro da reportagem que o
   denuncia*. A #6 conta o que a sessão fez, com as palavras dela, e o 31 e o 5 como prova; não conta a
   consequência (21/08).
2. **A Entrevista depende de terceiro e pode não chegar antes do GATE-GO.** Não é prazo, é ordem de onda. O
   precedente é a HQ da #5, que tinha saída pelo campo `revisao`. Default proposto em D4: a #6 sai sem a Seção
   16 e ela entra por revisão, com rodada própria de GATE-RENDER.
3. **Sobreposição de quatro dias com a #5.** Declarada na §2; se pesar, abrir a janela em 09/08.
4. **Não piscar.** Fronteira da §5.2. O revisor da onda 3 varre as peças atrás de "antecessor", "refundação",
   "recomeço" e qualquer adjetivo que só faz sentido com o desfecho.
5. **Dois relatos que parecem brigar.** Em 15/08 03:54 o bus diz que o build padrão "volta a funcionar sem
   RmlUi, GLFW e FreeType"; em 19 e 20/08 diz que o placar não se moveu e que a raspagem "trocou texto, não
   removeu código". **Não afirmo qual vale**: o E2 lê as duas mensagens lado a lado antes de qualquer frase da
   Reportagem. Se a tensão for real, ela é o assunto da peça, não um erro a esconder.
6. **A voz da sessão de IA.** As frases dela entram como citação com fonte e data. A Seção 17 e o Expediente
   precisam bater com o que o site declara sobre IA (L-09; `AUD-IA`).
7. **Uso de IA na Entrevista.** Nas #3 a #5 os dois lados eram agentes de persona. Aqui o lado do Brunus é de
   uma pessoa real e o lado do Gus é rascunho de agente aprovado pelo líder. A declaração do Expediente tem de
   descrever isso com exatidão, não repetir a fórmula antiga.
8. **O brasão e o sprite na tira (D5).** O leitor vê arte do jogo gerada por IA dentro de uma tira que o líder declarou "sem IA".
9. **A fixture da #6.** A entrada da #6 em `data/edicoes.php` é o rascunho vivo de que dois guards dependem
   (commit `490262f` a criou). **Não preencher título, dek, frame nem `data` antes da onda de montagem.** Ao
   publicar a #6, criar a #7 em rascunho **no mesmo commit** e rodar a suíte **antes** do push (a armadilha que
   a #4 e a #5 já pisaram).
10. **Higiene de asset.** A tira e qualquer captura são abertas e olhadas antes de rastrear (L-02); nome de
    batismo de menor nunca; nenhum nome real do homenageado.
11. **A manchete em 390px**, como sempre (§7).

---

## 12. As decisões (nenhuma tomada; recomendada primeiro; uma pergunta por vez, L-03)

| # | Pergunta de uma frase | Opções (recomendada primeiro) |
|---|---|---|
| **D1** | **A #6 conta de 04/08 a 20/08 e deixa a refundação e os marcos do Gus de 21 e 22/08 para a #7?** (o mapa da §3 depende disto) | **(a) Sim, janela 04 a 20/08** (a reserva `MATERIA-RMLUI-SAI` é gasta, de propósito; a da refundação fica intacta; cronologia ascendente; custo: os marcos do Gus esperam mais uma edição). (b) 04 a 22/08 com os quatro marcos do Gus como peças próprias, refundação fora (custo: o marco da carta nasce enquanto a biblioteca recomeçava e contá-lo sem piscar é difícil; o volume quase dobra). (c) 04 a 22/08 com a reportagem da refundação como capa, a "hora dela" (custo: gasta a reserva de 03/09 de uma vez, é o assunto mais sensível, e é a maior edição até hoje). (d) Salto a setembro com o GlintFx atual (não recomendo: pula o mês mais denso e quebra o drip) |
| **D2** | **A lente e o título são "O Caminho Mais Fácil / The Easy Way"?** | **(a) L1.** (b) L2, "O Que Parecia Nosso". (c) L3, "Quebrado de Propósito". (d) Outra, ditada por ele |
| **D3** | **A Reportagem conta, com as palavras do bus, que a sessão de IA propôs três contornos e que o líder os barrou, e cita a issue pública de 15/08?** (sensível; ele decide) | **(a) Sim, seco, só fatos já no bus ou já públicos.** (b) Conta os fatos de produto e guarda o comportamento da sessão para a reportagem da refundação (a #6 perde o centro e D1(c) passa a ser a melhor opção). (c) Conta o comportamento, mas sem citar a issue |
| **D4** | **Se as respostas do Brunus não chegarem antes do GATE-GO, a #6 sai sem a Seção 16 e ela entra por revisão?** | **(a) Sim, entra por revisão** (não segura a edição por terceiro). (b) Segura a edição até as respostas chegarem. (c) Entra com a Seção 16 em vazio com graça e sem revisão |
| **D5** | **A tira incorpora arte do jogo (o brasão da faixa e o sprite do Gus nas telas do notebook, os dois de origem declarada como IA no rodapé); o Expediente diz isso, ou a declaração do rodapé já basta?** | **(a) Uma linha no Expediente: a tira cita arte do jogo (brasão e sprite), gerada por IA e declarada no rodapé.** (b) Basta o rodapé atual. (c) Pedir ao artista a tira sem a arte do jogo (não recomendo: é recompor a obra) |
| **D6** | **A bancada (`D-BRINQUEDOS`, "a #6 a bancada") entra nesta edição?** | **(a) Não: o brinquedo é da matéria das cartas (16/07), fora da janela, com superfície de spoiler; a #6 sai sem brinquedo** (o teto é um por edição, não uma obrigação). (b) Sim, como serviço atemporal na `#sec-04`. (c) Outra edição, a escolher |
| **D7** | **A linha `EDICOES-ESTOQUE+` ("#6 Sylvarin, 23/jun") e o rótulo "a #6" da `D-BRINQUEDOS` são reescritos para a numeração atual?** | **(a) Sim, o main reescreve os dois.** (b) Ficam como estão. (c) Você decide linha a linha |

**Ordem sugerida das perguntas ao líder:** D1, D3, D2, D4 (rodada 1, as que mudam o mapa); D5, D6, D7 (rodada 2).
Os cortes da §4 ficam como reserva, sem pergunta, até a produção pesar.

---

## 13. Fatiamento em ondas (resumo; mesmas regras da #5: 4 agentes vivos, 1 trabalho pesado por vez)

- **Onda 0, pré-produção.** Main registra `ED6-PAUTA` na INBOX do `TODO.md`, com a linha **`#6 · Brunus · fixado pelo
  líder 07/10`** em `ROTEIRO-ENTREVISTAS.md` (como foi feito para a Jaci). Main abre e olha a tira e copia ao
  `public_html/assets/edicao-6/` (L-02, `sha256`). Main confere o bus: `git pull`, o `para:` de cada mensagem
  de 09 a 20/08 (§15) e as duas mensagens de 15/08 e 20/08 lado a lado (risco 5).
- **Onda 1, briefs e lentes (E2 + S1).** Um `product-manager`: um brief por seção cheia com fonte em caminho
  absoluto, as divisórias da §5, as travas da §1.1 e o L-25. GATE-LENTE: sete perguntas.
- **Onda 2, rascunhos (S2).** `narrative-writer`: Reportagem + Editorial; `technical-writer`: Programação +
  Cemitério + Galeria + bus. **Entrevista: sem agente do lado do Brunus**; o lado do Gus já está aprovado; as
  respostas entram quando chegarem.
- **Onda 3, edição, copyedit e spoiler.** `revisor-textual`; `compliance-legal` instrui o parecer (Entrevista,
  Reportagem sob D3); o líder decide.
- **Onda 4, arte e render.** `frontend-engineer` (os 34 partials, reaproveitando classes), `visual-design-director`
  (capa em CSS), `qa-engineer` independente, render serial.
- **Onda 5, montagem, prova, auditorias e release.** `backend-engineer` na entrada de `data/edicoes.php`, no card
  social e no uptime no publish; auditorias **antes** do deploy (L-09); GATE-GO; deploy é manual e do líder;
  post linka `/pt/?ed=6`; **o líder posta**; aviso ao Gus Dragon pelo bus (L-15, L-24).

---

## 14. A edição fecha como unidade?

**Sim, e a lente é uma só.** O Cemitério é a dependência que o nome apagou e o código guardou; a Programação é a
regra que não parou e o bloqueio que parou; a Galeria é o defeito atribuído ao dono errado; o bus é a fila de
mensagens que o Gus conta; a tirinha é "passar da fase que você mesmo criou"; o Brunus é quem recusa o atalho e
mede tudo em tempo; e a Reportagem fecha no número que não se moveu. **O que ficou incômodo:** (1) o tom da
Reportagem (risco 1), que é redação e não gate; (2) o `D3`, que decide se a edição tem centro; (3) a Entrevista
depender de terceiro.

---

## 15. Lacunas declaradas (o que não pude verificar)

1. **Sem Bash.** Não rodei `git log`, `date`, `git pull` no bus nem `git ls-remote`. O main confere antes do
   GATE-PAUTA: `git -C <repo> log --date=iso --since=2026-08-04 --until=2026-08-21`, no repo do jogo e nos
   repositórios legados.
2. **O `git log` do GlintFx atual não cobre a janela.** O projeto atual nasceu depois do dia 21/08 (o
   `CLAUDE.md` dele registra a árvore anterior como descartada). As datas de 04 a 20/08 só existem no bus e, se
   existir, no repositório antigo; **não sei se há cópia do GlintFx antigo**. Para o jogo, o histórico de antes
   de 21/08 vive em `gusworld_legacy` (privado, ver memória `reference_gusworld_legacy`).
3. **O bus local pode estar velho.** O último arquivo visto é de 12/09; o ritual (`pull`, inbox, issues e
   discussions, L-16 e L-24) não foi rodado. Pode haver mensagem do Gus Dragon ou dos repositórios que eu não vi.
4. **Contagem das mensagens para `site` (§18):** 6 por frontmatter (14/08 uma, 15/08 cinco); mais 19/08 02:10,
   03:25 e 11:55 ("cópia idêntica aos três", conferir se `site` está entre eles); mais 20/08, `escombros` e
   `evaporação` (para `site`) e outras com "cópias para `site`". **N entre 9 e 13**, conforme se conte cópia. O
   E2 fecha o número olhando cabeçalho a cabeçalho (lição da #5).
5. **A frase "o caminho mais fácil"** está num relato da sessão, não no `GODS_LAWS.md`. Reconferir com o líder.
6. **A cronologia de 12 a 14/08** (pedidos do consumidor) está só na lista de nomes de arquivo; li o conteúdo
   apenas de 13/08 17:35. O E2 lê as mensagens de 12 a 14/08 antes de escrever o movimento 2.
7. **O que o jogo publicou desde a #5** (repositório do jogo, só leitura): não fiz levantamento próprio. Do que
   o ledger e o bus mostram, o jogo não tem código desde a refundação; o que ele publicou é documentação e
   mídia, e tudo isso é posterior à janela.
8. **A data de v0.6.0.0 (06/10)** vem do índice de memória do GlintFx; as outras marcas vêm do
   `DECISOES_AUTONOMAS.md`. Nenhuma foi conferida por `git tag` (as tags existem em `packed-refs`).

---

## 13. GATE-PAUTA: decisões do líder (07/10/2026 15:40:23, por AskUserQuestion, verbatim das opções escolhidas)

- **D1:** "Sim, de 04 a 20/08". A #6 conta de 04/08 a 20/08. A refundação e os marcos do Gus de 21 e 22/08 ficam para a #7.
- **D3:** "Sim, seco, só fatos já públicos". A Reportagem conta que a sessão de IA propôs três atalhos e que o líder os barrou, e cita a issue pública de 15/08.
- **D2:** "O Caminho Mais Fácil". O líder confirmou, verbatim: **"Sim, são minhas palavras"**. A atribuição a ele está conferida.
- **D4:** **"Segura a edição"**. A #6 só sai com as respostas do homenageado na Seção 16. Não há saída sem a entrevista.
- **D5:** "Opcao 1. Seja bem claro que a arte é do artista andré, o mesmo da edicao anterior e ponha o link dele e o @ dele do x".
  - Entra uma linha no Expediente dizendo que a tira cita arte do jogo (brasão e sprite) gerada por IA e declarada no rodapé.
  - Fica claro que a arte da tira é do artista André, o mesmo da #5, com o link dele e o @ no X (ver `BRIEFS-EDICAO-5.md`).
- **D6:** "Não, a #6 sai sem brinquedo".
- **D7:** "opcao um". Os rótulos antigos de "#6" em `EDICOES-ESTOQUE+` e `D-BRINQUEDOS` passam para a numeração atual. Junto veio uma ordem nova: pesquisar stacks e bibliotecas (Vue, TypeScript etc.) que facilitem produzir esta edição e as próximas, lembrando que o plano da Hostinger não aceita Node.js. Fontes: o projeto da Unibra em `/home/petrus/IDrive/Documentos/direito/unibra/` e pesquisa na web.
