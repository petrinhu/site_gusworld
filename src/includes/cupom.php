<?php
declare(strict_types=1);
/**
 * src/includes/cupom.php — o CUPOM (item W6 · CUPOM), a peça de UI compartilhada.
 *
 * Extraído de templates/banca.php (era inline lá) para ser reusado por DOIS
 * consumidores sem duplicar o markup (DRY):
 *   - a BANCA (home): templates/banca.php.
 *   - a EDIÇÃO: o partial de conteúdo da seção 15 (content/edicao-<n>/<lang>/
 *     sec-15.php, grupo 'encarte').
 *
 * ⚠️ Este arquivo é só VIEW: assume as variáveis já resolvidas pelo render (o
 * back computa; a borda só pinta). Espera em escopo:
 *   - $cp          array: a copy do cupom (= $t['banca']['cupom']).
 *   - $idioma      string: 'pt' | 'en' (vira data-lang + hidden input).
 *   - $cupom_votou bool:   o cookie booleano "já votou" (sinal canônico).
 *   - $cupom_pct   array<string,int>|null: percentuais (só quando votou).
 *   - $cupom_total int:    total INTERNO (decide "urna vazia"; NUNCA vai ao HTML).
 *
 * ★★ DECISÃO DO LÍDER (2026-07-19): mostra o resultado AO VIVO, mas só em
 * PERCENTUAL — o número absoluto NUNCA sai do servidor. Só barras de %.
 *
 * O ÚNICO backend VIVO do site: o poll (api/cupom-voto.php). Ao contrário da
 * Glyfa/álbum (que são TELA navy acesa), o cupom é PAPEL — um encarte recortável
 * no pontilhado, com tesoura, na cor da tinta. O resultado sai na PRÓXIMA EDIÇÃO
 * (a lentidão é estética: enquete aberta = "aguardando", não site morto).
 * ★ Progressive enhancement: o estado-base é um <form method="post" action="/api/
 * cupom-voto.php"> NATIVO que VOTA SEM JS — o browser navega pro endpoint, que
 * responde uma página in-world "resultado na próxima edição". cupom.js troca o
 * submit nativo por fetch (fica na página), liga o RASGAR/DESFAZER (a máquina de
 * estado pura testada em cupom-core.js — dá pra rasgar errado e desfazer, nunca
 * trava) e a idempotência SUAVE "já votou" (localStorage; zero conta, zero dado).
 *
 * ⚠️ RESULTADO: só PERCENTUAL, nunca a contagem absoluta (Decisão do líder).
 * data-msg-* levam a copy que o cliente pinta (resultado/nota/voto/estados). O
 * cliente lê o `pct` da resposta do endpoint (o servidor não manda contagem crua)
 * e ordena com CupomCore.ordenarPct. As opções (slug→rótulo) o cliente colhe do
 * próprio form.
 */
?>
  <section class="cupom-hero" id="gancho-cupom" aria-labelledby="cupom-h2"
           data-lang="<?= h($idioma) ?>"
           data-msg-obrigado="<?= h((string) $cp['obrigado']) ?>"
           data-msg-javotou="<?= h((string) $cp['ja_votou']) ?>"
           data-msg-erro="<?= h((string) $cp['erro']) ?>"
           data-msg-off="<?= h((string) $cp['off']) ?>"
           data-msg-resultado="<?= h((string) $cp['resultado']) ?>"
           data-msg-resnota="<?= h((string) $cp['res_nota']) ?>"
           data-msg-resvazia="<?= h((string) $cp['res_vazia']) ?>"
           data-msg-votoseu="<?= h((string) $cp['voto_seu']) ?>">
    <div class="cupom-cab">
      <h2 class="secao-nome" id="cupom-h2"><?= h((string) $cp['titulo']) ?></h2>
      <span class="conta"><?= h((string) $cp['meta']) ?></span>
    </div>
    <p class="cupom-lide"><?= h((string) $cp['lide']) ?></p>

    <?php if ($cupom_votou): ?>
    <?php /* JÁ VOTOU (cookie) → RESULTADO server-side, funciona SEM JS. Só as barras
       de %; nenhum número absoluto no HTML. O servidor não sabe QUAL opção este
       visitante marcou (zero-dado: o cookie é só booleano) → sem marca "seu voto"
       aqui; ela só aparece no caminho JS (localStorage). */ ?>
    <div class="cupom-resultado" id="cupom-resultado" role="group" aria-labelledby="cupom-res-tit">
      <p class="cupom-res-tit" id="cupom-res-tit"><?= h((string) $cp['resultado']) ?></p>
      <?php if ($cupom_total <= 0): ?>
      <p class="cupom-res-vazia"><?= h((string) $cp['res_vazia']) ?></p>
      <?php else: ?>
      <?php
        // ordena as opções por % desc (o gêmeo do CupomCore.ordenarPct no cliente),
        // desempatando pela ordem da whitelist (estável).
        $ord = [];
        $ix = 0;
        foreach ((array) $cp['opcoes'] as $oid => $olbl) {
            $ord[] = ['oid' => (string) $oid, 'lbl' => (string) $olbl,
                      'pct' => (int) ($cupom_pct[$oid] ?? 0), 'ix' => $ix++];
        }
        usort($ord, static function ($a, $b) {
            return $a['pct'] !== $b['pct'] ? $b['pct'] <=> $a['pct'] : $a['ix'] <=> $b['ix'];
        });
      ?>
      <ul class="cupom-barras">
        <?php foreach ($ord as $b): ?>
        <li class="cupom-barra">
          <span class="cupom-barra-lbl"><?= h($b['lbl']) ?></span>
          <span class="cupom-barra-trilho" aria-hidden="true">
            <span class="cupom-barra-fill" style="--pct:<?= $b['pct'] ?>"></span>
          </span>
          <span class="cupom-barra-pct"><?= $b['pct'] ?>%</span>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
      <p class="cupom-res-nota"><?= h((string) $cp['res_nota']) ?></p>
    </div>

    <?php else: ?>
    <?php /* O CUPOM = um <form> nativo. Sem JS: seleciona + envia → POST nativo pro
       endpoint (required no 1º radio impede envio vazio; o endpoint revalida a
       whitelist de qualquer jeito). Com JS: cupom.js intercepta e faz fetch. */ ?>
    <form class="cupom" id="cupom" method="post" action="/api/cupom-voto.php">
      <input type="hidden" name="lang" value="<?= h($idioma) ?>">

      <?php /* a serrilha de recorte: pontilhado + tesoura. Decorativa (aria-hidden);
         cupom.js a transforma no gatilho do RASGAR. */ ?>
      <div class="cupom-serra" aria-hidden="true">
        <span class="cupom-tesoura">&#9986;</span>
        <span class="cupom-recorte"><?= h((string) $cp['recorte']) ?></span>
      </div>

      <div class="cupom-papel">
        <fieldset class="cupom-campo">
          <legend class="cupom-pergunta"><?= h((string) $cp['pergunta']) ?></legend>
          <p class="cupom-dica"><?= h((string) $cp['legenda']) ?></p>
          <?php $i = 0; foreach ((array) $cp['opcoes'] as $oid => $olbl): $i++; ?>
          <label class="cupom-opcao">
            <input type="radio" name="opcao" value="<?= h((string) $oid) ?>"<?= $i === 1 ? ' required' : '' ?>>
            <span class="cupom-marca" aria-hidden="true"></span>
            <span class="cupom-txt"><?= h((string) $olbl) ?></span>
          </label>
          <?php endforeach; ?>
        </fieldset>

        <div class="cupom-acao">
          <?php /* rasgar/desfazer aparecem só com JS (hidden por padrão). O ENVIAR
             funciona sempre — é o submit real do form. */ ?>
          <button type="button" class="cupom-rasgar" id="cupom-rasgar" hidden><?= h((string) $cp['rasgar']) ?></button>
          <button type="button" class="cupom-desfazer" id="cupom-desfazer" hidden><?= h((string) $cp['desfazer']) ?></button>
          <button type="submit" class="cupom-btn" id="cupom-enviar"><?= h((string) $cp['enviar']) ?></button>
        </div>

        <p class="cupom-espera"><?= h((string) $cp['espera']) ?></p>
      </div>

      <?php /* status: cupom.js anuncia aqui (obrigado / já votou / erro / storage off) */ ?>
      <p class="cupom-status" id="cupom-status" role="status" aria-live="polite" hidden></p>
    </form>
    <?php endif; ?>

    <p class="cupom-cap"><?= h((string) $cp['cap']) ?></p>
  </section>
