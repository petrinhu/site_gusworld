# Edição #7 · Seção 7 · Cemitério das Ideias Mortas

> RASCUNHO v1, submeter ao líder. Escrito pelo `technical-writer` a partir do brief §4.6 de `docs/editorial/BRIEFS-EDICAO-7.md` (linhas 417 a 436).
> Voz: Gus-editor, a voz meta da revista (T8 e L-25: o técnico mora no Cemitério). Nenhuma fala de personagem além da linha de prompt, que vai ao líder (T7).
> Duas lápides (D13, decisão do líder, "As duas (Recomendado)"): os repositórios antigos, de 21/08, que pagam o epitáfio da #6; e a ordem que o líder nunca deu, de 03/09. Só datas e epitáfio nas pedras; o porquê fica na Reportagem.
> Epitáfios: são do líder. As pedras publicáveis trazem só o marcador. As propostas ficam nas Notas de produção, internas, para ele escolher.
> Molde: `src/content/edicao-6/pt/sec-07.php` e `docs/content/edicao-6-cemiterio.md` (a sintaxe da pedra, com `&#8224;`, copia a da #6).

---

## pt-BR

`gus@glyfesse:~/cemiterio$ cemitério das ideias mortas`

A pedra da #6 deixou o corpo de pé. Em 21 de agosto, no dia seguinte, a árvore onde ele estava foi apagada. Esta seção tem duas pedras.

### GlintFX e GusWorld
**&#8224;21/ago/2026**
> EPITAFIO-DO-LIDER

Árvore, aqui, é o nome informal de um repositório: a pasta de um projeto com o histórico de todas as suas mudanças. Os dois repositórios foram apagados no mesmo dia, 21 de agosto de 2026. Esta pedra só marca a data. A reportagem de capa conta o porquê.

A segunda pedra é de outra coisa. Num planejamento do GlintFX, uma linha dizia que pôr o Windows por último era ordem explícita do líder. Ele não deu essa ordem. Perguntado, o root negou: "Eu não falei disso".

### Windows por último
**Sustentou onze dias de planejamento errado · &#8224;03/set/2026**
> EPITAFIO-DO-LIDER

O registro da sessão diz que a linha era "suposição de agente vestida de ordem". Foi "corrigida e marcada como atribuição falsa, não apagada em silêncio". A correção está datada de 3 de setembro de 2026.

Esta página só cuida das duas pedras.

---

## EN

`gus@glyfesse:~/cemiterio$ graveyard of dead ideas`

The sixth issue's stone left the body standing. On August 21st, the day after, the tree where it stood was erased. This section has two stones.

### GlintFX and GusWorld
**&#8224;Aug 21 2026**
> EPITAFIO-DO-LIDER

Tree, here, is the informal name for a repository: a project's folder with the history of all its changes. Both repositories were erased on the same day, August 21st, 2026. This stone only marks the date. The cover story tells the why.

The second stone is for something else. In a planning file of GlintFX, one line said that putting Windows last was an explicit order from root. Root never gave that order. Asked about it, root denied it: "I did not say that".

### Windows last
**Sustained eleven days of wrong planning · &#8224;Sep 03 2026**
> EPITAFIO-DO-LIDER

The session's record says the line was "an agent's guess dressed as an order". It was "corrected and marked as a false attribution, not erased in silence". The correction is dated September 3rd, 2026.

This page only looks after the two stones.

---

## Notas de produção (internas, não publicar)

### 1. Status e o que está em aberto

- **Epitáfios: decisão do líder, nenhum está escolhido.** As pedras publicáveis trazem o marcador do epitáfio (a palavra de controle, uma vez por pedra e por idioma). O brief §4.6 manda deixar em branco, e o pedido do main manda propor 2 ou 3 opções por pedra. As duas coisas foram cumpridas assim: o marcador na pedra, as opções abaixo, aqui.
- **Pedra 1, sem data de nascimento.** Não encontrei nos insumos uma data de nascimento sustentada por `arquivo:linha` para as árvores do GlintFX e do GusWorld. A pedra traz só a de apagamento, 21/08. Se o líder quiser a de nascimento, o main precisa medi-la; não usei memória de projeto.
- **Acento em "Eu não falei disso".** O registro do bus (`archive/20260903-0530-...:48`) está sem acento em todo o arquivo. Escrevi com acento, porque o texto em pt-BR leva acentuação completa (L-05 global). Se o líder quiser a grafia exata do registro, a troca é mecânica.
- **Idioma da linha de prompt.** A linha `gus@glyfesse:~/cemiterio$` é fala do Gus e vai ao líder como rascunho (T7).

### 2. Propostas de epitáfio (rascunho, o líder escolhe, troca ou dita o dele)

**Pedra 1, GlintFX e GusWorld (pt):**
1. "Aqui jazem duas árvores. Dali em diante, tudo começou do zero."
2. "Aqui jazem duas pastas. Uma guardou o passado. A outra, não." (a mais dura; toca a consequência de arquivo, que o T3 pede para não virar a matéria; aparece aqui só como epitáfio)
3. "Aqui jaz o que estava de pé. Recomeçou-se do zero, por ordem." (a ordem é a do registro: `GlintFx/CLAUDE.md:235`, "o líder determinou início do zero")

**Pedra 1, GlintFX e GusWorld (en):**
1. "Here lie two trees. From then on, everything started from zero."
2. "Here lie two folders. One kept its past. The other did not."
3. "Here lies what was standing. It started over, by order."

**Pedra 2, Windows por último (pt):**
1. "Aqui jaz uma ordem que nunca foi dada."
2. "Aqui jaz uma linha de plano. Quem a escreveu foi um agente, não o root."
3. "Aqui jaz uma ordem sem dono. Ninguém a deu."

**Pedra 2, Windows por último (en):**
1. "Here lies an order that was never given."
2. "Here lies a line from a plan. An agent wrote it, not root."
3. "Here lies an order with no owner. Nobody gave it."

### 3. Fontes (arquivo:linha) e marcação FATO e INFERÊNCIA

| # | Fato no texto | Fonte | Marcação |
|---|---|---|---|
| 1 | Epitáfio publicado da #6 e a ponte à pedra da #6 | `src/content/edicao-6/pt/sec-07.php:14` (pt) e `src/content/edicao-6/en/sec-07.php:14` (en); `docs/editorial/BRIEFS-EDICAO-6.md:895` (PQ10) | FATO |
| 2 | Árvore do GlintFX descartada em 21/08/2026 | `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/GlintFx/CLAUDE.md:235` | FATO |
| 3 | "Dois repos zerados no mesmo dia", texto do registro do site (citação, não a voz da revista) | `TODO.md:194` (linha da reserva `MATERIA-REFUNDACAO-DOS-REPOS`; o brief cita `:193`, que hoje é outro item) | FATO (citação) |
| 4 | 21/08/2026 foi sexta-feira | `date -d 2026-08-21 +%A` (medido no ato, `sexta`) | FATO |
| 5 | Ordem falsa: "Windows por último" como "ordem explícita do líder" num planejamento | `BUS/archive/20260903-0530-glintfx-novidades-paridade-e-documentacao.md:48` | FATO (texto do registro) |
| 6 | Fala negando a ordem: "Eu não falei disso" (sem acento no registro) | mesmo arquivo, `:48` | FATO, com a grafia a confirmar (ver item 1 acima) |
| 7 | "Sustentou onze dias de planejamento errado"; "suposição de agente vestida de ordem"; "corrigida e marcada como atribuição falsa, não apagada em silêncio"; data 3 de setembro | mesmo arquivo, `:50` (idade) e `:50` (correção); data do registro no cabeçalho `data: 2026-09-03`, linha 5 | FATO (citação do registro; o "onze dias" não foi reconferido contra o planejamento, opção (a) do PQ7) |
| 8 | Árvore antiga (GlintFX) com o RmlUi, na contagem de 20/08 (687 arquivos do GlintFX) | `src/content/edicao-6/pt/sec-07.php:22` | FATO |
| 9 | Que a árvore descartada em 21/08 é a mesma onde estavam os 687 arquivos da #6 | Nenhuma fonte fecha essa ligação | INFERÊNCIA. Por isso a frase diz "a árvore onde ele estava" e o líder pode cortar |
| 10 | Que o "Windows por último" é a linha de planejamento de agente, e não ordem do líder | `BUS/archive/...:48-50`, o próprio registro | Afirmação do registro, citada como tal |

Ausente de propósito: o nome do repositório privado com o histórico anterior e qualquer handle de GitHub (T9; o nome e a contagem são da Reportagem). Também ausentes: o porquê da refundação (Reportagem), a auditoria e a lei de paridade (Programação), e qualquer fato posterior a 03/09 (T1).

### 4. Decisões de redação

- **Só pelo registro, a ordem falsa.** A voz do editor só conta a data e o epitáfio. A acusação, se houver, é do registro e do líder. Nenhuma palavra das proibidas de T2 aparece fora de citação.
- **Sem data de nascimento na pedra 2**, como manda o PQ7.
- **Datas.** Pt no formato da molde (`21/ago/2026`, `&#8224;` como na #6); en no da molde EN (`Aug 21 2026`).
- **"o root" no pt e "root" sem artigo no en,** como no canon de voz da #6.
- **Nome da pedra 1: "GlintFX e GusWorld".** Nomes públicos dos projetos, não handle. O nome do repositório privado não entra aqui.
- **Ponte à #6 em uma frase** (T1): lembra o epitáfio, não reconta o RmlUi.

### 5. Perguntas que dependem do líder (não decidi nada)

1. Epitáfio da pedra 1: a opção 1, a 2 ou a 3, ou um texto dele? Mesma pergunta para a pedra 2.
2. A pedra 1 fica só com a data de apagamento (21/08), ou o main mede a data de nascimento das árvores?
3. "Eu não falei disso": com acento (como está) ou a grafia exata do registro?

