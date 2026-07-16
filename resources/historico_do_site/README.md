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
