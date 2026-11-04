# APROVADO pelo líder em 04/11/2026 ("Aprovo como está"): lançamento da Edição #7, "Apagar Tudo" (item de board: `ED7-PAUTA`)

> **APROVADO. Não publica nada. Quem posta no X é sempre o líder.**
>
> Escrito em 2026-11-04 (data do ambiente da sessão). A sessão não tinha Bash, então `date` não foi consultado e o texto não carrega hora. A contagem de caracteres é manual (ver Verificação).
>
> Fontes lidas antes de escrever: `docs/editorial/PIPELINE-EDICAO.md` §1.5; `docs/editorial/LANCAMENTO-EDICAO-6.md` (molde, incluindo a nota 6 sobre a frase do root) e `docs/editorial/LANCAMENTO-EDICAO-5.md` (molde de forma); `docs/content/edicao-7-reportagem.md` (bloco pt e Notas); `docs/content/edicao-7-editorial.md` (bloco pt e Notas); `data/edicoes.php` (entrada da #7); `docs/editorial/PAUTA-EDICAO-7.md` (cabeçalho e §0); `GODS_LAWS.md` do site (L-25); e as memórias `canon_gus_ahsd_personalidade`, `voz_prompt_shell`, `a_voz_do_site` e `reference_disclosure_ia_e_licenca`.

---

## Notas (registro após a aprovação)

1. **Ordem do release.** A #7 está publicada: `data/edicoes.php`, entrada da #7, estado `publicada`, ficha montada em 03/11 e publicada em 04/11. O fetch desta rodada de `https://gusworld.site/pt/?ed=7` devolveu a página com "Apagar Tudo" e "nº 7". O `<head>` não veio no fetch, então as meta tags `og:` não foram lidas. Antes de postar, conferir a prévia do card na caixa de composição do X.
2. **Card.** O card que aparece no X é `public_html/assets/og-edicao-7.jpg` (e `og-edicao-7-en.jpg` na versão en). É CSS convertido em PNG (D12), sem questão de arte gerada.
3. **Declaração de IA.** O post não declara, por decisão do líder de 05/09/2026 (memória `reference_disclosure_ia_e_licenca`). Nenhuma frase foi acrescentada. A linha do rodapé cobre.
4. **Frase do root (a causa).** Fica fora do texto aprovado, pelo mesmo motivo da #6 (`LANCAMENTO-EDICAO-6.md`, item 6): a frase da #7 é uma acusação dirigida à sessão de IA.
5. **Título no corpo.** O texto aprovado não traz "Apagar Tudo", como a #5 e a #6.
6. **Aviso ao Gus Dragon.** A L-15 do `CLAUDE.md` do site pede aviso ao Gus Dragon quando a edição sai. Esse texto não foi escrito, porque não estava no pedido. Decisão do main.
7. **Hora e contagem.** Sem Bash, a hora não foi medida (L-03). A contagem do texto aprovado foi conferida pelo main (406 caracteres).
8. **Erro de digitação.** Zero, como nos moldes da #5 e da #6.
9. **Alternativas não escolhidas.** Existiram, no rascunho desta rodada, uma versão só com a voz do Gus, uma versão com a frase do root verbatim e uma variante com o título. Foram apagadas na aprovação, por decisão do líder.

---

## Texto 1: o post do X (aprovado em 04/11/2026)

**Forma do molde #6:** prompt `gus@glyfesse:~$` (fala solta, sem seção, por isso `~`); fala; `//` logo abaixo; linha em branco; `root@glyfesse:~$`; `//`; linha em branco; link. Acentuação completa nas duas vozes. Fala do Gus sem ponto final, com reticências. Cada `//` cabe numa linha de até 72 caracteres.

**Trava de L-08 e L-07 registrada:** a fala e o pensamento do Gus foram redigidos pelo agente, a partir de imagens da Carta aprovada, e foram aprovados pelo líder em 04/11/2026. A fala diz "tinha", a Carta diz "havia". Travas de L-25 conferidas: a fala do Gus não tem palavra de produção (nada de pixel, sprite, commit, repositório, build) e não tem a palavra "jogo". Sem nome real, sem usuário de GitHub, sem marcação de pessoa, sem travessão, meia-risca ou emoji. Nada posterior a 03/09/2026.

```
gus@glyfesse:~$ Glyfesse #7 no ar. a casa foi desmontada de novo, e entre as coisas que puseram de volta tinha uma regra escrita... achei que ela ia me ensinar a esperar
// ela só diz o que alguém tem que olhar

root@glyfesse:~$ cinco arquivos de regras nasceram entre 21 e 29 de agosto. o primeiro, no dia do recomeço
// a reportagem para no ponto em que a regra já estava escrita

https://gusworld.site/pt/?ed=7
```

**Contagem: 406 caracteres, com a URL contada como 23.** Passa de 280, então exige conta X Premium (premissa confirmada em 25/07/2026 e usada nos moldes #5 e #6).

### Versão EN (escrita por referência, não postada)

Mesmo padrão do PT. O link segue `/pt/?ed=7`, como manda o `PIPELINE-EDICAO.md` §1.5. Se o líder preferir `/en/?ed=7` na versão en, a troca é de uma linha.

```
gus@glyfesse:~$ Glyfesse #7 is up. the house was taken apart again, and among the things they put back there was a written rule... I thought the rule would teach me to wait
// it only says what someone has to look at

root@glyfesse:~$ five rule files were born between august 21 and 29. the first one on the restart day
// the story stops where the rule was already written

https://gusworld.site/pt/?ed=7
```

**Contagem EN: 398 caracteres, com a URL como 23.**

---

## Verificação

Contagem do Texto 1 (PT), por bloco:

| Bloco | Caracteres |
|---|---|
| Fala do Gus (`gus@glyfesse:~$ ...`) | 169 |
| Pensamento do Gus (`// ...`) | 40 |
| Fala do root (`root@glyfesse:~$ ...`) | 106 |
| Pensamento do root (`// ...`) | 62 |
| Quebras de linha (6) | 6 |
| Link (contado como 23) | 23 |
| **Total** | **406** |

Versão EN: 398.

Conferências no arquivo, com a ferramenta Grep (reconferidas após a aprovação):

- Travessão longo (U+2014), meia-risca (U+2013) e ponto de exclamação: 0 no arquivo inteiro.
- Emoji: 0 no arquivo inteiro.
- Usuário de GitHub e nome de batismo de menor: 0 no arquivo inteiro. O nome do usuário não é repetido aqui.
- "Dragon" e "Brunus": 0 dentro dos blocos de post. Aparece só na nota 6, que não vai ao X.
- "Claude": 0 dentro dos blocos de post.
- Palavras de produção (pixel, sprite, commit, repo, build) e a palavra "jogo" na fala do Gus: 0.

---

## O que eu NÃO toquei

Não usei git (sem commit, sem `git add`). Não postei nada. Não alterei `data/`, `src/`, `public_html/` nem nenhum outro arquivo. O único arquivo tocado é este.
