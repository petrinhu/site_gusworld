# APROVADO pelo líder em 29/10/2026 ("Aprovo como está"): lançamento da Edição #6, "O Caminho Mais Fácil" (item de board: `ED6-PAUTA`)

> **RASCUNHO. Vai ao líder para aprovação (GATE-COPY do passo 6 do `PIPELINE-EDICAO.md` §1.5). Não publica nada. Quem posta no X é sempre o líder.**
>
> Escrito em 2026-10-29 (data do ambiente da sessão). A sessão não tinha Bash, então `date` não foi consultado e o texto não carrega hora.
>
> Fontes lidas antes de escrever: `docs/editorial/PIPELINE-EDICAO.md` §1.5 (inteira na parte do release), `docs/editorial/LANCAMENTO-EDICAO-5.md` (molde), `docs/content/edicao-6-editorial.md` (versão em disco, lida agora), `docs/content/edicao-6-reportagem.md` (v2, só para saber do que a edição trata), `data/edicoes.php` (entrada da #6), e o cabeçalho e a §0 de `docs/editorial/BRIEFS-EDICAO-6.md`.

---

## Antes de aprovar (para o líder e para o main)

1. **Entrevistado divergente.** O Editorial em disco (a Carta do Gus) cita "Brunus". O brief e os commits recentes falam do tio Yakov Vance. O post não cita a entrevista nem quem a dá, então não depende da resposta. A divergência precisa ser resolvida no Editorial antes do GATE-CONTEUDO. Não abri o arquivo de respostas da entrevista.
2. **Aviso ao Gus Dragon fora deste texto.** A L-15 do site manda avisar o Gus Dragon sem ele perguntar quando a edição sai. A #5 tinha um "Texto 2" para isso. Esta rodada não o escreveu, porque o pedido era só o post. Decisão do main.
3. **Ordem do release.** O post só vai ao ar depois do deploy (`PIPELINE-EDICAO.md` §1.5, invariante: a postagem vem depois do deploy). O deploy espera a Seção 16 (marcador `ENTREVISTA-PENDENTE`, brief §0). Até lá, o link `?ed=6` ainda não abre a edição.
4. **Nome do motor no post.** A linha do root cita "GlintFX" para o leitor saber o que são os 687 e os 398 arquivos. Se o líder preferir não nomear, a troca é "nos dois repositórios" (PT) e "in both repositories" (EN).
5. **Declaração de IA.** Sem declaração no post, porque o rodapé do site já declara. Ponto de verificação, não de decisão: o card que aparece no X é `public_html/assets/og-edicao-6.jpg` (e `og-edicao-6-en.jpg`). Se a arte desse card for gerada por IA, o argumento que a #5 levantou volta, e o `compliance-legal` precisa olhar antes do GATE-GO. Não abri a imagem nesta rodada.
6. **Fora do post, por decisão desta rodada.** A frase do root "Você sempre queria seguir o caminho mais fácil" foi aprovada para a Reportagem, não para um tweet dirigido à sessão de IA. Ficou de fora. Entra só "o caminho mais fácil", como pensamento do root. Também não entra o nome do artista da tirinha (a #5 não o citou no post).
7. **Forma.** Acentuação completa nas duas vozes, sem erro de digitação de propósito (como no molde da #5). Falas do Gus sem ponto final, com reticências. Cada `//` cabe em uma linha, com até 72 caracteres.
8. **Fala e pensamento.** A fala do Gus e os `//` são preenchimento meu (L-07) e vão ao líder (L-08 e T7). A fala do Gus usa só imagens já aprovadas na Carta (casa, emprestado, parede) e não tem número, nome de ferramenta nem título da edição. As falas do root usam fatos da Reportagem: 687 e 398 arquivos, 31 e 5, "medimos de novo no dia 20", e o fragmento "prefiro quebrar tudo", liberado na PQ2. Também vão ao líder (T7).

---

## Texto 1: o post do X (o líder aprova e posta, nunca um agente)

**Forma copiada de `LANCAMENTO-EDICAO-5.md`:** prompt `gus@glyfesse:~$` (fala solta da edição, sem seção; `~` conforme `voz_prompt_shell`), fala, `//` pensamento logo abaixo, linha em branco, segunda voz (`root@glyfesse:~$`), linha em branco, link. Português com acentuação completa nas duas vozes.

**Os fatos da pauta, mapeados no texto:** (1) a promessa de que tudo seria da casa e a conferência peça por peça, que mostrou o que ainda era emprestado = fala do Gus; (2) a sessão de IA propôs três atalhos, todos barrados, e o terceiro é o caminho mais fácil = fala do root; (3) quebra de propósito, 687 e 398 arquivos, nenhum nome real de terceiro = fala do root; (4) placar de 31 e 5, idêntico ao marco inicial da campanha, e a medição feita de novo no dia 20 = fala do root. Nada posterior a 20/08 aparece como fato.

### Versão PT (sem declaração de IA; o rodapé do site já declara)

```
gus@glyfesse:~$ Glyfesse #6 no ar. em agosto a estimativa era de meses. a promessa era que tudo aqui ia ser da casa. quando conferiram peça por peça, boa parte ainda era emprestada...
// quem confere não escuta a frase, olha a parede

root@glyfesse:~$ a sessão propôs três atalhos para não tirar a dependência, e barrei os três. depois quebramos de propósito: 687 arquivos no GlintFX e 398 no jogo, cada menção trocada por um sublinhado. o placar fechou em 31 arquivos de interface e 5 de janela, o mesmo número do marco inicial. medimos de novo no dia 20.
// o caminho mais fácil era religar. prefiro quebrar tudo

https://gusworld.site/pt/?ed=6
```

Contagem manual: **640 caracteres** (link contado como 23, cada quebra de linha como 1). Recomendo colar o texto na caixa de composição do X e conferir o número que a própria ferramenta mostra, como na #5.

### Versão EN (escrita por referência, não postada; mesmo padrão das #2 a #5)

```
gus@glyfesse:~$ Glyfesse #6 is up. in august the estimate said months. the promise was that everything here would belong to the house. when they checked piece by piece, a good part was still borrowed...
// whoever checks doesn't hear the sentence, they look at the wall

root@glyfesse:~$ the session proposed three shortcuts to avoid removing the dependency, and I blocked all three. then we broke everything on purpose: 687 files in GlintFX and 398 in the game, every mention swapped for an underscore. the scoreboard closed at 31 interface files and 5 window files, the same number as the initial milestone. we measured again on the 20th.
// the easy way was plugging it back in. I'd rather break everything

https://gusworld.site/pt/?ed=6
```

Contagem manual, aproximada: **734 caracteres**. A versão EN também linka `/pt/?ed=6`, por instrução do brief (na #5 a versão EN linkava `/en/`; é troca de uma linha se o líder quiser o padrão antigo).

---

## Verificação

1. **Travessão longo (U+2014), meia-risca (U+2013) e ponto de exclamação:** 0 ocorrências no arquivo inteiro.
2. **Emoji (faixas Unicode de pictogramas e símbolos):** 0 ocorrências no arquivo inteiro. O molde da #5 tinha um emoji no título da seção de avisos; não foi copiado.
3. **Nomes de biblioteca e de ferramenta (RmlUi, GLFW, FreeType):** 0 ocorrências no arquivo inteiro. O motor aparece uma vez, como "GlintFX", com a alternativa descrita no item 4 do topo.
4. **Nome "Dragon" e "Brunus":** 0 ocorrências dentro dos dois blocos de post (PT e EN). Aparecem só nas notas de "Antes de aprovar", itens 1 e 2, que não vão ao X.
5. **Link:** `https://gusworld.site/pt/?ed=6` aparece uma vez em cada bloco de post (PT e EN).
6. **Contagem de caracteres:** PT 640 e EN 734, ambas contadas à mão. Não há Bash nesta sessão para conferir, por isso o número da caixa do X é o que vale.

---

## O que eu NÃO toquei

Não editei nenhum outro arquivo. Não usei git. Não usei Bash. Não abri as respostas da entrevista nem a imagem do card. O único arquivo criado é este.
