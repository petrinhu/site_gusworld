<?php /* O Gus lê o bus - fonte: docs/content/edicao-1-gus-le-o-bus.md (## pt-BR).
   Voz: Gus. A figura (tela do inbox git) é peça VISUAL de outra leva → hook +
   figcaption. ⚠️ typos preservados: "mesnagem". "meu pai" é registro permitido. */ ?>
<?php /* recriacao em CSS da tela de um forge listando a pasta inbox/ do BUS git
   (ref. resources/referencias/inbox_git.png): barra de arquivos + colunas
   Name / Last commit message / Last commit date + 3 pastas. Mensagens de commit
   IN-FICTION, curadas, spoiler-safe (NUNCA os commits reais); zero owner, user,
   avatar ou dominio (o print borra isso de proposito). Ilustra o bus que o Gus
   le -> aria-hidden; a figcaption carrega o sentido. Estilos: edicao.css. */ ?>
<figure class="bus-figura">
  <div class="bus-inbox" aria-hidden="true">
    <div class="bus-inbox-bar">
      <span class="bus-branch">main</span>
      <span class="bus-path"><b>inbox</b>&nbsp;/</span>
    </div>
    <div class="bus-inbox-head">
      <span>Name</span><span>Last commit message</span><span class="bus-c3">Last commit date</span>
    </div>
    <div class="bus-row">
      <span class="bus-name"><svg class="bus-folder" viewBox="0 0 16 16" aria-hidden="true"><path d="M1.75 2.5A.75.75 0 0 0 1 3.25v9.5c0 .414.336.75.75.75h12.5a.75.75 0 0 0 .75-.75V5.25a.75.75 0 0 0-.75-.75H7.5L6 2.5H1.75Z"/></svg>glintfx</span>
      <span class="bus-msg">read: o site leu a pauta e respondeu</span>
      <span class="bus-c3 bus-date">há 3 h</span>
    </div>
    <div class="bus-row">
      <span class="bus-name"><svg class="bus-folder" viewBox="0 0 16 16" aria-hidden="true"><path d="M1.75 2.5A.75.75 0 0 0 1 3.25v9.5c0 .414.336.75.75.75h12.5a.75.75 0 0 0 .75-.75V5.25a.75.75 0 0 0-.75-.75H7.5L6 2.5H1.75Z"/></svg>gusworld</span>
      <span class="bus-msg">chore(bus): arquiva a conversa do dia</span>
      <span class="bus-c3 bus-date">há 3 h</span>
    </div>
    <div class="bus-row">
      <span class="bus-name"><svg class="bus-folder" viewBox="0 0 16 16" aria-hidden="true"><path d="M1.75 2.5A.75.75 0 0 0 1 3.25v9.5c0 .414.336.75.75.75h12.5a.75.75 0 0 0 .75-.75V5.25a.75.75 0 0 0-.75-.75H7.5L6 2.5H1.75Z"/></svg>site</span>
      <span class="bus-msg">feat(bus): o Gus mandou uma ideia nova</span>
      <span class="bus-c3 bus-date">há 5 h</span>
    </div>
  </div>
  <figcaption>A tela do BUS git: três caixas de entrada (glintfx, gusworld, site) passando recados umas pras outras. O Gus lê por cima do ombro.</figcaption>
</figure>

<p class="fala"><span class="prompt">gus@glyfesse&gt;</span> <span class="dito">boa ideia do meu pai... 3 sessoes conversando entre si por um <code>BUS</code> git, e eu ainda posso mandar mesnagem pra elas! gostei. ainda bem que sei usar isso, <code>git</code> e <code>gh</code></span></p>

<p class="pensa">eu nao tava nessa conversa. mas eu sei git, sei gh... eu consigo entrar</p>
