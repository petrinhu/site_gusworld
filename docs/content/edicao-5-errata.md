# Glyfesse #5: Errata (rascunho v1)

> **Seção 9, metade Errata, tamanho S. D9 decidida em 04/09/2026: publica a errata e leva o conserto no
> mesmo deploy da #5.** A metade Cartas desta mesma seção (vazio com graça, D17) está em
> `docs/content/edicao-5-copies-curtas.md`, não aqui.
> **Angle statement:** a primeira errata real da revista, e o erro é sobre o próprio tema da edição: a
> tarja de censura da #3 em inglês dizia "trecho censurado" em português para quem usa leitor de tela.
> **O fato, confirmado por leitura direta do arquivo servido:**
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-3/en/sec-08.php`,
> linhas 50, 60 e 75: três ocorrências de `aria-label="trecho censurado"` (português) dentro de uma página
> em inglês, no ar desde o lançamento da #3 (21/07/2026). Uma quarta ocorrência do mesmo texto vive só no
> comentário de cabeçalho do arquivo (linha 16), que já registrava o defeito por escrito sem que ninguém
> tivesse corrigido o servido; essa não é lida por leitor de tela e não conta como o erro público. Achado
> em 03/09/2026 por quem montou a #4, ao recusar copiar a referência indicada para a mesma peça: a
> referência é que estava errada, e a #4 já nasceu certa, com `aria-label="censored excerpt"` (conferido em
> `/home/petrus/IDrive/Documentos/projetos_claudebrain/Projects/site_gusworld/src/content/edicao-4/en/sec-08.php`,
> quatro ocorrências corretas).
> **Segundo achado, da mesma varredura, maior:** o rodapé do site tinha o rótulo do controle de som fixo em
> português em toda página, nos dois idiomas (pt e en); também foi consertado.
> **Ambos os consertos sobem no mesmo deploy desta edição** (`A11Y-ED3-EN-TARJA`, pré-requisito do deploy
> da #5; prova exigida de que a #3 não regrediu em mais nada, pt e en, antes e depois).
> **Travas verbatim aplicadas:** T4, T5, T6 (fala do Gus, submissão obrigatória ao líder).
> **Status:** rascunho v1, aguardando `GATE-CONTEUDO` + `GATE-COPY` do editor-geral.

---

## pt-BR

`gus@glyfesse:~/errata$ errata`

Quatro edições no ar, e o primeiro erro apareceu. Não foi um leitor que achou: foi alguém daqui, revisando outra peça, e recusando copiar uma referência que parecia certa. Na edição #3 em inglês, a tarja preta do Detonado dizia "trecho censurado" em português, três vezes, para quem lê a página com leitor de tela. Quem ouvia a revista em inglês ouvia, no meio do texto, uma frase que não era da língua. Estava assim desde o dia em que a #3 foi ao ar.

`gus@glyfesse:~/errata$ a gente conferiu a tarja. ninguem conferiu em que lingua ela falava`
`/* a #4 ja nasceu certa. so faltava voltar e trocar o que ja tinha saido errado */`

A mesma varredura achou um segundo defeito, esse maior: o rótulo do controle de som, no rodapé, estava fixo em português em toda página do site, nas duas línguas. Quem navegava em inglês via o resto da página traduzida e o rodapé teimando no idioma errado, do primeiro ao último clique.

Os dois consertos sobem juntos, no mesmo deploy desta edição. A revista corrige o que erra, e diz onde errou.

---

## EN

`gus@glyfesse:~/errata$ errata`

Four issues in print, and the first error showed up. It wasn't a reader who found it: it was someone here, reviewing a different piece, refusing to copy a reference that looked right. In issue #3's English edition, the Detonado's black bar said "trecho censurado" in Portuguese, three times, for anyone reading the page with a screen reader. Whoever listened to the magazine in English heard, mid-sentence, a phrase that wasn't in the language. It had been that way since the day #3 went live.

`gus@glyfesse:~/errata$ we checked the bar. nobody checked what language it was speaking`
`/* #4 was already born correct. it just needed going back to fix what shipped wrong */`

The same sweep found a second defect, a bigger one: the sound control's label, in the footer, was fixed in Portuguese on every page of the site, in both languages. Whoever browsed in English saw the rest of the page translated and the footer stuck in the wrong language, from the first click to the last.

Both fixes ship together, in this same issue's deploy. The magazine corrects what it gets wrong, and says where it got it wrong.

---

## Notas de produção

### Conferências feitas (não presumidas)

| Checagem | Resultado |
| :--- | :--- |
| Contagem de ocorrências do `aria-label` errado | 3, confirmadas por leitura direta (linhas 50, 60, 75 de `edicao-3/en/sec-08.php`); a 4ª ocorrência (comentário de cabeçalho, linha 16) não é user-facing e não entra na contagem publicável |
| Forma correta conferida | `aria-label="censored excerpt"`, presente 4x em `edicao-4/en/sec-08.php`, usada como referência de reescrita, não copiada verbatim (a peça é sobre o erro, não o conserto técnico em si) |
| Segundo achado (rodapé, som) | registrado por instrução direta desta produção; peça o trata como fato já consertado, sem detalhar arquivo/linha (fora do escopo de conteúdo desta peça, é tarefa de `frontend-engineer`) |
| Dependência de deploy | explicitada em texto: "os dois consertos sobem juntos, no mesmo deploy desta edição" / "both fixes ship together, in this same issue's deploy" |
| Travessão / en-dash | zero |
| Ponto final em fala/pensamento do Gus | ausente |
| Erros de digitação | classe mecânica, eventual: `nao` (2x, pt) |
| Emoji | zero |
| Rótulo clínico | nenhum |

### Pendências desta seção

- `GATE-CONTEUDO` e `GATE-COPY` do editor-geral; esta cópia é proposta (adaptação da copy sugerida na
  pauta, §3.2), pendente de leitura final do líder (T6).
- **Dependência dura de deploy:** o conserto dos três `aria-label` em `edicao-3/en/sec-08.php` e do rótulo
  do controle de som no rodapé (nos dois idiomas) precisa subir no mesmo deploy da #5, com prova de que a
  #3 não regrediu em pt e en (risco §11 item 15 da pauta). A correção técnica em si é do
  `frontend-engineer`, fora do escopo deste brief de conteúdo.
- Copyedit formal (`revisor-textual`) e prova final.
