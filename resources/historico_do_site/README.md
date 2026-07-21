# Histórico do site: o build-in-public do próprio site

> **O site GusWorld é documentação histórica de si mesmo.** Assim como a Glyfesse conta a evolução do jogo (o quadradinho vira o Gus), o **próprio site** tem uma evolução, e ela também é conteúdo. Cada estado do domínio é uma edição.
>
> **Regra:** todo estado é **perecível**, some no deploy seguinte. **Capturar antes de substituir.** Como o líder cravou em 2026-07-16: *"o site É documentação histórica."*

## Edição #0: "A Página Padrão" (2026-07-16)

O que o `gusworld.site` servia no dia em que o domínio começou a funcionar: **o placeholder da Hostinger.** Uma sala vazia. O "quadradinho numa sala" do site.

- **`2026-07-16_edicao-0_placeholder.html`**: o HTML servido (16 KB). `<title>Página padrão</title>`, favicon da Hostinger.
- **`2026-07-16_edicao-0_placeholder.png`**: screenshot (1280x900).
- **`2026-07-16_headers.txt`**: os headers HTTP (HTTP/2 200, servido pelo CDN da Hostinger).

**Contexto:** o domínio `gusworld.site` foi comprado e configurado pelo líder em 2026-07-15 (23h47 Recife). O DNS propagou; o `public_html/` ainda tinha só o index de placeholder que a Hostinger põe em todo site novo. **Nenhum conteúdo do líder foi ao ar ainda:** publicar é `D-GO-LIVE`, que está bloqueado por decisão dele até as auditorias.

**Por que isto importa:** daqui a um ano, a Edição #0 do site é a prova de que ele começou do zero, igual ao jogo. É o mesmo gesto do quadradinho de maio: mostrar o antes cru, sem vergonha. **Uma publisher não guardaria o placeholder da hospedagem. O líder guarda:** é a vantagem estrutural do build-in-public.

## Canal: o primeiro post (2026-07-16)

O primeiro post público do projeto, na conta pessoal do líder no X (`@PetrusSilva`), tom "olha o que eu fiz num feriado", começando pelos amigos (a estratégia de canal dele). Texto:

> **gusworld.site** 🖥️
> Passei o feriado montando isto. Ainda não tem nada lá, mas já tem endereço.
> "em breve" nunca foi tão literal, hehe.
> (sou eu sim, não é agência de mkt não)

O card do Open Graph renderizou certo no X: o CRT com SOON, o Gus e o selo GusWorld. A captura crua está em `canal_x/` (gitignored: contém o feed pessoal do líder e trending de terceiros, não vai ao repo público).

**Por que isto é histórico:** é a Edição #0 do canal. O primeiro momento em que o gusworld.site existiu para outra pessoa além do líder.

## Edição #1: a Glyfesse no ar (2026-07-21): o GO-LIVE

O dia em que o `gusworld.site` deixou de ser "em breve" e virou a **revista de verdade.** O primeiro deploy de produção (`scripts/deploy.sh`, o gate `D-GO-LIVE`, acionado pelo líder) substituiu o placeholder pela **Glyfesse #1 (A Gênese)** mais a banca (home) com os brinquedos interativos (o quadradinho jogável, PRESS START, a Glyfa) e as 3 edições enfileiradas.

- **`2026-07-21_pre-lancamento_placeholder.{html,png,headers}`**: o "em breve" que estava no ar minutos ANTES do go-live (o último estado do placeholder, capturado antes de substituir).
- **`2026-07-21_lancamento_glyfesse.{html,png,headers}`**: a banca real da Glyfesse, o primeiro estado pós-lançamento.

**Verificado no ar:** raiz serve a banca (Glyfesse, HTTP 200); `/pt/edicao-1` e `/en/edition-1` dão 200; path inexistente cai no 404 do Gus. As URLs bonitas (rewrite do `.htaccess`) funcionando em produção.

**Por que isto importa:** é o marco. O quadradinho de maio (um retângulo numa sala) chegou à revista publicada que conta a própria gênese. O antes (placeholder) e o depois (a revista) estão os dois guardados aqui: a prova do build-in-public do próprio site.

## Como capturar a próxima edição (quando o domínio mudar de estado)

```bash
cd resources/historico_do_site
DATA=$(date +%F)
curl -sS -L -A "Mozilla/5.0 (arquivo historico Glyfesse)" \
  -D "${DATA}_headers.txt" "https://gusworld.site/" \
  -o "${DATA}_edicao-N_descricao.html"
# screenshot headless, perfil isolado (NUNCA a janela viva do lider):
D=$(mktemp -d)
firefox --headless --new-instance --profile "$D" \
  --screenshot "$(pwd)/${DATA}_edicao-N_descricao.png" \
  --window-size 1280,900 "https://gusworld.site/"
```

**Marcos que valem captura:** a primeira página "em breve"; a primeira Glyfesse real (#1); cada mudança grande de home. O momento de capturar é **antes** do deploy que substitui.
