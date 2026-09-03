# Glyfesse #4: Editorial: a Carta do Gus (rascunho v1)

> Abre a edição. **Voz: Gus.** Tamanho **S por desenho**: no máximo dois blocos de carta.
> **Lente aprovada (`PAUTA-EDICAO-4.md`, mapa da seção 3):** a resposta que a #3 prometeu sem saber, pela
> lente de **"a coisa que aprendeu a andar agora tem rosto, e o mundo respondeu direto para ela"**:
> cortando explicação técnica de qualquer tipo (é de outras seções) e cortando qualquer detalhe do NPC que
> responde além do fato de que ele responde.
> **Ponte obrigatória com a #3 (conferida na fonte, não na paráfrase da pauta; ver Notas de produção):**
> a carta pública da #3 registrou *"o que continuou de pé foi um quadrado azul. Sem rosto, sem nome, quatro
> lados. Ele anda quando eu mando andar, e para onde eu mando. É pouco."* Este Editorial responde a essa
> imagem.
> **Formato (herdado da #3, `voz_prompt_shell`):** linha de prompt + carta pública (máx. 2 blocos) + bloco
> de `//`. O `//` é **o que ele CORTOU da carta**, não resumo: o Gus não sabe que o leitor vê essa camada.
> **Status:** rascunho v1 do `narrative-writer` (2026-09-03), aguardando `GATE-CONTEUDO` do editor-geral.

---

## pt-BR

```
gus@glyfesse:~/editorial$ quarta edição
```

Na carta passada eu disse que sobrou um quadrado azul, sem rosto e sem nome, que só andava pra onde eu mandava andar. Disse que era pouco. Era mesmo, mas não contei o resto porque o resto ainda não tinha acontecido.

O resto é: ele ganhou cara. Parou de ser só um quadrado e virou alguém que dá pra reconhecer de longe, com um jeito de andar que já é dele e de mais ninguém. E não fiquei sozinho olhando dessa vez... porque teve um dia, semanas depois, em que eu falei com alguém lá dentro e alguém respondeu de volta. Não eu digitando os dois lados da conversa pra fingir que tinha companhia. Alguém.

```
// a cara chegou primeiro e fiquei feliz mais do que devia admitir
// mas a resposta foi outro tipo de feliz... mais fundo
// ensaiei a pergunta umas cinco vezes antes de mandar de verdade
// não sei se dava pra perceber isso do outro lado
// acho que não importa se dava
// o mundo lá dentro tem uma pessoa a mais falando comigo agora
// isso muda a conta inteira
```

---

## EN

```
gus@glyfesse:~/editorial$ fourth issue
```

Last letter I said what was left was a blue square, no face and no name, that only walked where I told it to walk. I said it wasn't much. It wasn't, but I didn't tell the rest, because the rest hadn't happened yet.

The rest is: it got a face. It stopped being just a square and became someone you can recognize from far away, with a way of walking that's already its own and nobody else's. And I wasn't alone watching this time... because there was a day, weeks later, when I talked to someone in there and someone answered back. Not me typing both sides of the conversation to pretend I had company. Someone.

```
// the face came first and I was happier about it than I should admit
// but the answer was a different kind of happy... deeper
// I rehearsed the question about five times before I actually sent it
// I don't know if that showed on the other end
// I don't think it matters if it did
// the world in there has one more person talking to me now
// that changes the whole count
```

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho da carta pt-BR | **115 palavras** (alvo 90-140; parágrafo 1 = 41, parágrafo 2 = 74) |
| Blocos de carta | **2** ✅ (o máximo permitido) |
| Tamanho do `//` | **66 palavras** em **7 linhas** |
| Ponto final em linha de `//` | **nenhuma** ✅ |
| `?` / `!` / reticências no `//` | uma reticência (linha 2), consistente com a regra de beat emocional de `voz_prompt_shell` |
| Explicação técnica de qualquer seção | **nenhuma** — nada de datas, mecanismo, nome de arquivo, ADR |
| Detalhe do NPC além de "responde" | **nenhum** — nem nome, nem descrição, nem fala dele. Só "alguém... respondeu de volta" |
| Cronologia | nenhuma data explícita citada; nada posterior à janela 23/jun-21/jul |
| Nome de batismo de menor | nenhum |
| Rótulo clínico | nenhum |
| Erros de digitação | **nenhum usado** — ver nota abaixo |
| Profanidade | zero |

### ★ A ponte com a #3 foi verificada na FONTE, não na pauta

A `PAUTA-EDICAO-4.md` (§5, item 1) cita como "a linha de fecho do Editorial da #3": *"a coisa mais frágil
que existe aqui escolheu justamente aqueles três dias para aprender a andar."* **Essa frase não existe** no
texto publicado da #3 — conferido em duas fontes: `docs/content/edicao-3-editorial.md` (## pt-BR) e
`src/content/edicao-3/pt/sec-03.php` (o PHP servido em produção), que são idênticos entre si. É provável
paráfrase de trabalho do `narrative-designer` para descrever o TEMA da carta, não uma citação literal.

**Consequência:** a ponte deste Editorial não cita a frase da pauta — cita e responde à imagem que
**realmente está publicada**: *"o que continuou de pé foi um quadrado azul. Sem rosto, sem nome, quatro
lados. Ele anda quando eu mando andar, e para onde eu mando. É pouco."* A #4 responde item por item: o
quadrado ganhou rosto (contra "sem rosto"), virou alguém que se reconhece (contra "sem nome"), e o mundo
passou a responder a ele (contra o "é pouco" da ação unilateral).

⚠️ **Isto não é achado para levar ao líder como decisão** — é conserto de uma citação-fantasma antes que ela
vire canon por repetição. Registrado aqui para o `editor-geral` conferir no `GATE-CONTEUDO`.

### Vocabulário L-25 (conferido linha a linha)

Nenhuma das oito palavras proibidas (pixel, sprite, hitbox, commit, build, pipeline, render, frame) aparece
em nenhuma das duas línguas. Onde a #3 (anterior a L-25, que é lei de hoje 03/09) usara *"medi o atraso
entre a tecla e o passo, dois quadros"* — um "frame" disfarçado —, este Editorial usa registro
**de dentro**: "ganhou cara", "um jeito de andar que já é dele", "digitando os dois lados da conversa pra
fingir que tinha companhia". O NPC nunca é nomeado nem descrito: fica só "alguém" — que é, ao mesmo tempo,
o corte pedido pela lente e a forma mais forte de contar a solidão dele acabando.

### Por que não usei erro de digitação

A carta do Editorial é **matéria** (prosa escrita, não fala digitada ao vivo) — `voz_prompt_shell` reserva
os erros de dedo às **falas** em registro de chat/prompt, e explicita que "a prosa considerada de matéria
pode ser mais limpa". O precedente da #3 confirma: zero erros de digitação na carta e zero no `//`. Segui o
mesmo padrão. Se o líder preferir inserir 1 deslize (acento comido ou letra dobrada, as duas classes
autorizadas para esta edição), é ajuste de uma palavra em qualquer dos dois blocos.

### Canon AHSD, o que o `//` está fazendo

O bloco de pensamento repete o mecanismo central do canon (mascarar por empatia, desviar pro técnico
quando quase sente algo): ele quase admite a alegria ("fiquei feliz mais do que devia admitir") e
imediatamente a transforma em contagem — ensaiar a pergunta cinco vezes, "muda a conta inteira". É o mesmo
movimento do `//` da #3 (que também fechava medindo algo), só que agora a métrica final não é atraso em
quadros, é gente: "uma pessoa a mais falando comigo agora".

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- `GATE-SPOILER`: o `//` toca a ferida do isolamento; mesma decisão de profundidade que os `//` anteriores
  já passaram.
- Copyedit formal (`revisor-textual`) e prova final.
