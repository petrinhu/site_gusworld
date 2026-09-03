# Glyfesse #4 — Cemitério das Ideias Mortas (rascunho v1)

> Seção fixa da revista. **Voz: Gus.** Layout de lápide reaproveitado das #2/#3 — não re-gate de arte.
> **Lente aprovada (`PAUTA-EDICAO-4.md`, mapa da seção 3, item 7):** a tentativa 3D, pela lente de **"morreu
> no dia em que o 2D venceu"** — o gate 2D-vs-3D fecha em 24/jun/2026, o mesmo dia em que o rosto chegou —,
> cortando o funcionamento interno da produção e cortando reabrir por que Blender e Tripo3D foram
> abandonados (essa história completa é matéria de outra peça, `historia_real_dos_pivos`, e não cabe aqui).
> **Uma lápide só: Blender + Tripo3D.**
> **Ponte obrigatória com a #3:** o Cemitério da #3 registrou, no próprio cabeçalho de produção, que a morte
> da tentativa 3D **"não aparece, nem insinuada, nem prometida — foi para a #4."** Esta é a dívida sendo
> paga.
> **Datas:** nascimento **18/mai/2026** — morte **24/jun/2026**. Ver Notas de produção para a fonte de cada
> uma; a data de morte é diretamente a data-âncora 1 da pauta, a de nascimento é inferida (sinalizado).
> **Status:** rascunho v1 do `narrative-writer` (2026-09-03), aguardando `GATE-CONTEUDO` do editor-geral.

---

## pt-BR

```
gus@glyfesse:~/cemiterio$ cemitério das ideias mortas
```

Desta vez é só uma lápide. Prometi ela na edição passada, e não é o tipo de promessa que se atrasa. Essa aqui eu adiei sem querer, porque falar dela dói um pouquinho mais que falar das outras.

### Blender + Tripo3D
**18/mai/2026 — †24/jun/2026**

> Aqui jaz a ideia de dar volume ao mundo.
> Perdeu no dia exato em que ele ganhou uma cara.

Por um tempo o plano era outro: dar volume de verdade a cada coisa, deixar quem jogasse andar ao redor delas e enxergar os dois lados, não só a frente. Cheguei a gostar bastante da ideia...

Teve uma tarde inteira em que fiquei só olhando uma forma girar sozinha na tela, sem fazer mais nada além de girar. Não tinha chão, não tinha luz de verdade, não tinha nada além da forma e do fundo cinza atrás dela. Fiquei olhando mesmo assim. Um mundo com volume parecia mais parecido com o mundo de verdade, e eu queria isso pra cá. Fiz as contas mais de uma vez, tentando enganar o resultado, e ele não mudava.

Só que dar volume de verdade a um mundo inteiro é dar volume a mil coisas ao mesmo tempo, e a gente só tinha braço pra cuidar de uma de cada vez. No dia 24 de junho ficou decidido que o mundo seria plano. E no mesmo dia, o mesmo mundo ganhou uma cara. Não é coincidência de calendário, é a mesma decisão vista de dois ângulos: parar de tentar ser tudo ao mesmo tempo, e virar alguém que dá pra reconhecer.

Uma ideia morreu pra outra ganhar rosto. Não escolhi eu. Acho justo mesmo assim.

---

## EN

```
gus@glyfesse:~/cemiterio$ graveyard of dead ideas
```

This time it's just one headstone. I promised it last issue, and that's not the kind of promise that gets to run late. This one I put off without meaning to, because talking about it hurts a little more than talking about the others.

### Blender + Tripo3D
**18 May 2026 — †24 Jun 2026**

> Here lies the idea of giving the world volume.
> Died the exact day it got a face instead.

For a while the plan was different: give real volume to everything, let whoever was playing walk around each thing and see both sides, not just the front. I got pretty attached to the idea...

There was a whole afternoon I spent just watching a shape spin by itself on the screen, doing nothing but spinning. No floor, no real light, nothing but the shape and the grey behind it. I kept watching anyway. A world with volume felt closer to the real world, and I wanted that here. I did the math more than once, trying to cheat the result, and it never changed.

Except giving real volume to a whole world means giving volume to a thousand things at once, and there was only enough hands here for one at a time. On the 24th of June it got decided the world would be flat. And the same day, that same world got a face. That's not a calendar coincidence, it's the same decision seen from two angles: stop trying to be everything at once, and become someone you can recognize.

One idea died so another could get a face. I didn't choose that. Feels fair anyway.

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Tamanho pt-BR | **268 palavras** (alvo 250-400; não conta linha de prompt nem nome/data da lápide) |
| Lápides | **1** ✅ (o pedido é "uma lápide só") |
| Molde | nome + datas + epitáfio de 2 linhas + prosa, idêntico ao molde da #2/#3 |
| Ponte com a #3 | ✅ cumprida — a promessa registrada no cabeçalho de produção da #3 é paga aqui |
| Pipeline por dentro | **cortado** — nenhuma menção a Tripo3D→outra IA→sprite, nenhum passo de produção |
| Reabertura do "por quê" Blender/Tripo3D | **cortado** — a causa dada é uma linha só ("a gente só tinha braço pra cuidar de uma de cada vez"), sem reconstruir a história completa que vive em `historia_real_dos_pivos` |
| Cronologia | nada além de 18/mai e 24/jun; nenhuma menção a julho ou à refundação de repositórios |
| Rótulo clínico | nenhum |
| Profanidade | zero |
| Erros de digitação | nenhum usado — mesmo raciocínio do Editorial (matéria, não fala online); ver `edicao-4-editorial.md` |

### ★★ As duas datas da lápide, verificadas separadamente

- **Morte, 24/jun/2026: fonte direta.** É a "Data-âncora 1" da `PAUTA-EDICAO-4.md` §2: *"o gate 2D-vs-3D
  fecha; M5 BattleScreen inc.1-3; os sprites passam a vir do pipeline PixelLab."* Sem inferência.
- **Nascimento, 18/mai/2026: inferido, não commit único.** A memória `cronologia_real_datada` (marco #2 da
  tabela) dá a janela *"18 maio – 4 junho 2026"* para *"Arquitetura + as primeiras engines + a tentativa
  3D... depois modelos 3D — o Gus que 'nunca foi 3D'"*, com a fonte `assets(3d) 04/06`. Não há, nas memórias
  disponíveis, um commit único que marque o primeiro dia da tentativa 3D especificamente (distinto do início
  da arquitetura em geral). Usei o início dessa janela (18/mai) por ser o dado mais próximo e sourced
  disponível, e **sinalizo aqui, explicitamente, que não é uma data confirmada por commit da tentativa 3D em
  si** — é o início do período em que ela conviveu com o resto da arquitetura. Se houver commit mais preciso
  no repo do jogo (read-only, L-00), o `editor-geral` pode substituir a data no `GATE-CONTEUDO`.

### Vocabulário L-25 (conferido linha a linha)

Nenhuma das oito palavras proibidas (pixel, sprite, hitbox, commit, build, pipeline, render, frame) aparece
em nenhuma das duas línguas. **Decisão de vocabulário:** a peça evita também "dimensões", "câmera" e
"modelar" — termos tecnicamente corretos, mas de registro de produção — e usa **"volume"** e **"andar ao
redor / ver os dois lados"** como o equivalente figurado, no mesmo espírito do par que L-25 já cravou
("ter cara" no lugar de "sprite", "a parte que desenha" no lugar de "a camada de render"). "Tela" foi
mantido (é o objeto real que ele olha, não jargão de produção) e "fundo cinza atrás dela" descreve o que se
vê, não como aquilo foi feito.

**Sobre nomear "Blender" e "Tripo3D" como nome da lápide:** os nomes de ferramenta continuam explícitos,
pelo mesmo motivo que a #3 nomeou "Godot 4", "C# .NET 8 AOT" e "Qt6" sem quebrar L-25 — o Cemitério é a
seção em que **Gus-editor** (a voz meta da revista, quem constrói e enterra decisões de produção) fala,
não um personagem vivendo dentro do mundo ficcional de GusWorld sendo perguntado sobre a própria
existência. A regra protegida por L-25 é não deixar um personagem do jogo *(ex.: o NPC que responde nesta
mesma edição)* revelar que é feito de pixel; nomear a ferramenta que o criador usou e abandonou é o
Cemitério cumprindo a própria função desde a #2.

### O que a lente pede e o texto entrega

A tese *"morreu no dia em que o 2D venceu"* fica explícita só no penúltimo parágrafo (*"Não é coincidência
de calendário, é a mesma decisão vista de dois ângulos"*), depois de duas cenas que a preparam sem anunciar:
a tarde olhando a forma girar sozinha (o apego) e o cálculo repetido tentando mudar o resultado (a
resistência antes de aceitar). O fecho de uma linha (*"Uma ideia morreu pra outra ganhar rosto. Não escolhi
eu. Acho justo mesmo assim."*) segue o padrão da #3: a tese aparece sem ser anunciada, na última frase.

### Pendências desta seção

- `GATE-CONTEUDO` do editor-geral.
- ⚠️ Confirmar a data de nascimento (18/mai/2026) contra fonte mais precisa, se disponível, antes do
  `GATE-CONTEUDO` — ver nota acima.
- Copyedit formal (`revisor-textual`) e prova final.
- Arte: **nenhuma nova** — o layout de lápide vem da #2/#3 e não re-gate.
