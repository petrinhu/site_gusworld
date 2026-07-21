<?php /* Seção de Programação (eixo expert) - fonte: docs/content/edicao-1-programacao.md (## pt-BR).
   Vozes: intro Gus (gus@glyfesse> + //) + editor (root@glyfesse>); corpo técnico root.
   D-ACENTOS: prosa acentuada; tokens de código (backtick na fonte) em <code>. Sem em-dash.
   O [VISUAL: CRT...] vira crt-hook (efeito CRT/nano = proxima leva). */ ?>
<p class="fala"><span class="prompt">gus@glyfesse&gt;</span> <span class="dito">como é que se escreve u mmundo inteiro do zero sem copiar de ninguém</span></p>
<p class="pensa">pergunta séria. eu queria mesmo saber</p>

<p>Imagine que você vai escrever um mundo original. Não um mapa, não uma ficha: um mundo, com eras datadas, com um idioma que tem gramática, com gente que tem passado. Você quer que ele seja seu, inteiro, sem uma linha roubada de ninguém. Mas ninguém escreve no vácuo. Antes de começar, você juntou uma biblioteca: centenas de livros que te formaram, ficção científica, mito, filosofia, poesia. Quando você trava numa cena, a resposta não é copiar um trecho. É lembrar de como aqueles autores resolveram problemas parecidos e pensar com eles. O detalhe: são centenas de livros. Reler todos a cada dúvida é impossível.</p>

<p>Então você constrói um assistente de leitura. Não um que responde no seu lugar, e muito menos um que copia: um que, quando você descreve o que está tentando escrever, vasculha a biblioteca inteira e devolve os poucos trechos que ressoam com a sua ideia. Você lê aqueles trechos, fecha o livro e escreve o SEU texto, do zero, com a cabeça mais cheia. Ele não te dá a lore. Ele te dá inspiração para escrevê-la. Essa é a ideia inteira desta seção. A primeira peça de engenharia do GusWorld não foi o jogo. Foi esse assistente de leitura, e a lore massiva que ele ajudou a escrever nasceu original.</p>

<p>E ele coube num laptop, em cima da mesa, sem nuvem nenhuma. Centenas de livros indexados dentro de uma máquina que dá pra fechar e botar na mochila. O como disso é o resto desta página, e a partir daqui quem fala sou eu, o editor.</p>

<p class="fala"><span class="prompt">root@glyfesse&gt;</span> <span class="dito">antes que perguntem por que eu assino da conta root numa revista: tudo que é meu é open source. Não tenho o que esconder, então não finjo que tenho.</span></p>
<p class="pensa">e o sudo cansa</p>

<p class="pensa nota-leitor">Prezado leitor, daqui por diante é a parte técnica de verdade: a documentação histórica de como o desenvolvimento começou. Se você não é de TI, a intro acima já te deu o essencial e você pode pular pro Cupom sem culpa.</p>
<p class="pensa assinatura">root@glyfesse</p>

<?php /* crt-nano: o prompt sendo digitado (CSS steps, zero JS). Decorativo (a prosa
   acima ja diz tudo) -> aria-hidden. Estilos em edicao.css (.crt-scr/.crt-nano). */ ?>
<div class="crt-scr crt-nano" aria-hidden="true">
  <div class="crt-tela">
    <p><span class="pr">root@glyfesse&gt;~$</span> <span class="crt-typed">nano&nbsp;</span><span class="crt-key dim">&lt;enter&gt;</span> <span class="crt-cur"></span></p>
  </div>
</div>

<h3>1. O problema: inspiração sem reler tudo e sem copiar</h3>

<p>O acervo de referência do GusWorld é grande: <strong>306 obras</strong> catalogadas, quebradas em cerca de <strong>163 mil trechos indexáveis</strong>. Ficção científica, mito, filosofia, poesia, ciência popular: a biblioteca que forma quem escreve. O que é massivo aqui não é a lore (essa é escrita à mão, do zero, e validada pelo criador); é o corpus de referência que fica ao lado da escrivaninha.</p>

<p>O problema tem duas travas ao mesmo tempo. A primeira: ninguém relê 306 livros a cada dúvida de escrita. Quando você está escrevendo, digamos, a queda de uma cidade e quer que ela ressoe com as melhores quedas que já leu, folhear a estante inteira está fora de cogitação. A segunda trava é mais séria: recuperar não pode virar copiar. O objetivo é achar a analogia, o padrão, a imagem que faz a sua cabeça girar, e depois fechar o livro e escrever a SUA versão. Recuperação de inspiração, nunca de texto pronto.</p>

<p>A tentação preguiçosa seria pedir ao modelo de linguagem que "escrevesse o mundo". Isso é o oposto do que se quer: o modelo inventaria genérico, e o mundo sairia sem dono. O que se quer é uma ferramenta que amplifica a leitura de quem escreve, não que substitui a escrita. A lore continua sendo escrita por uma pessoa. A ferramenta só encurta o caminho até a estante certa.</p>

<h3>2. O RAG caseiro: dois índices, um pipeline</h3>

<p>A técnica se chama <strong>RAG</strong>, retrieval-augmented generation: geração aumentada por recuperação. A ideia: em vez de pedir ao modelo que crie do nada, você primeiro recupera do acervo o material que ressoa com a sua consulta e usa esse material como estímulo. Aqui, o "aumento" não escreve a lore: alimenta a cabeça de quem escreve. Tudo foi construído à mão, pelo próprio autor, sem serviço de terceiro.</p>

<p>O pipeline tem cinco estágios:</p>

<ol class="pipeline">
  <li><strong>Chunking.</strong> Cada obra é quebrada em trechos (chunks) de tamanho controlado, com sobreposição entre trechos vizinhos para não cortar uma ideia no meio. Cada trecho vira uma unidade recuperável. As 306 obras rendem cerca de 163 mil desses trechos.</li>
  <li><strong>Embeddings.</strong> Cada trecho é convertido em um vetor por um modelo de embeddings. Vetor aqui é uma lista de números que representa o SENTIDO do trecho: textos que falam de coisas parecidas caem perto no mesmo espaço, mesmo sem repetir as mesmas palavras. O modelo é o <code>bge-m3</code>, servido localmente pelo <code>ollama</code>, escolhido por ser multilíngue (o acervo mistura português e inglês) e por produzir vetores densos de 1024 dimensões.</li>
  <li><strong>Busca por similaridade.</strong> A consulta também vira vetor, e o sistema procura no acervo os trechos cujos vetores estão mais próximos (proximidade medida por similaridade de cosseno). Os vetores vivem num banco vetorial <code>Lance</code> (o arquivo <code>chunks.lance</code>), com o inventário em <code>manifest.json</code>.</li>
  <li><strong>Rerank.</strong> Os primeiros candidatos da busca passam por um segundo modelo, o reranker <code>bge-reranker-v2-m3</code>, que relê cada par consulta-trecho e reordena por relevância real. A busca por vetor é rápida e grosseira; o reranker é lento e fino. É aqui que mora o achado do próximo tópico.</li>
  <li><strong>Injeção de contexto.</strong> Os melhores trechos, já reordenados, vão para o gerador como estímulo de leitura. Não para virar texto final: para o autor ler, absorver e escrever a versão dele.</li>
</ol>

<p>Toda consulta passa por um wrapper, o <code>rag-safe query "..."</code>, que serializa o acesso com <code>flock</code>: uma consulta por vez, para respeitar os limites de hardware da máquina (o RAG e o reranker são pesados; rodar dois de uma vez derruba tudo). Uma consulta típica de design é densa, de 15 a 30 palavras ou mais, com um piso de score de <code>0.499</code>; costuma render umas 10 boas passagens em até 30 tentativas.</p>

<p>E não é um índice só, são dois, isolados de propósito. O <strong>índice principal</strong> guarda as 306 obras e seus ~163 mil trechos. Um <strong>segundo índice</strong> à parte, o <code>rag_elvish</code>, com 1.989 trechos, guarda só material filológico que inspira o idioma próprio do mundo (existe um, com gramática; o que ele é fica pro jogo contar). Ficam separados para que uma consulta sobre um tema geral não seja poluída pelo material linguístico especializado, e vice-versa.</p>

<h3>3. O achado: o reranker não mede tema, mede tipo de texto</h3>

<p>Aqui está a descoberta empírica desta seção, e ela só apareceu rodando o sistema de verdade. Aquele piso de score de <code>0.499</code> no reranker deveria, em teoria, separar trecho on-tema de trecho off-tema. Não é o que ele faz. Medindo os scores ao longo de centenas de consultas, o padrão que emergiu foi outro: <strong>o reranker pontua o TIPO TEXTUAL do trecho, não o assunto dele.</strong></p>

<p>Texto expositivo e argumentativo crava alto, na faixa de 0.7 a 0.98: um tratado, um ensaio didático, uma exposição que arma uma tese passo a passo. A estrutura desse tipo de texto (afirmação, razão, conclusão) casa com a forma de uma consulta, que também é uma proposição. O reranker, que é um cross-encoder treinado para casar pergunta com resposta, reconhece essa forma e a premia.</p>

<p>Prosa narrativa pura faz o oposto: reprova, na faixa de 0.01 a 0.45, <strong>mesmo quando está exatamente no tema.</strong> Uma cena de romance cyberpunk sobre uma megacidade, consultada com uma pergunta sobre megacidades, pontua baixíssimo. A imagética, o "mostrar sem dizer" que define boa prosa, não se cross-encoda bem contra uma consulta temática em português. O trecho fala do tema inteiro, mas não na forma que o reranker sabe premiar.</p>

<p>A consequência é de método, e é honesta: <strong>o RAG não é fonte única, é camada bônus.</strong> Para os temas em que o acervo tem forte match expositivo, deixa o RAG sugerir, porque ali ele acerta. Para a imagética narrativa (a queda, o êxodo, a textura de uma cidade), o reranker é cego, então esse material se escreve do canon do próprio jogo, não da estante. Saber ONDE a ferramenta enxerga e onde ela é cega é o que separa usar o RAG de confiar cego nele. A ferramenta tem um ponto cego medido, e o método foi desenhado em volta dele.</p>

<h3>4. A infraestrutura: um acervo inteiro num laptop</h3>

<p>Tudo isto rodou <strong>local</strong>, na máquina do autor, sem nuvem para o RAG. O ângulo não é economia: é <strong>soberania do dado.</strong> O acervo e a lore inédita nunca saíram do disco de quem os juntou e escreveu, e todo o processamento aconteceu on-device. É a diferença entre confiar um mundo ainda não lançado a um servidor de terceiro e guardá-lo numa máquina que você fecha e leva embora.</p>

<p>O hardware, por componente:</p>

<table class="specs">
  <thead>
    <tr><th>Componente</th><th>Especificação</th></tr>
  </thead>
  <tbody>
    <tr><td>CPU</td><td>i5-12500H (16 threads)</td></tr>
    <tr><td>RAM</td><td>~32 GB</td></tr>
    <tr><td>GPU dedicada</td><td>RTX 3050 Mobile</td></tr>
    <tr><td>GPU integrada</td><td>Iris Xe</td></tr>
    <tr><td>Sistema</td><td>Fedora Linux</td></tr>
  </tbody>
</table>

<p>Não é uma estação de data center. É um laptop de mesa. E é justamente por isso que o <code>flock</code> do <code>rag-safe</code> existe: numa máquina dessas, embeddings e reranker disputam a mesma GPU e a mesma RAM; deixar duas consultas rodarem juntas trava o sistema. Serializar uma por vez é o que torna o acervo consultável sem derrubar a máquina. A tese fica melhor por causa da modéstia do hardware: um acervo inteiro indexado e um mundo inteiro escrito, numa máquina que qualquer um pode ter.</p>

<h3>5. O método: AI-assisted, não vibe coding</h3>

<p>Esta é a parte que sustenta o resto do projeto, e a que mais se confunde por fora. Existem dois jeitos muito diferentes de trabalhar com IA, e eles não são graus do mesmo jeito: são opostos.</p>

<p><strong>Vibe coding</strong> é dirigir pela sensação: você pede solto, aceita o que a IA gera sem ler com rigor, e segue no "parece que funciona". A IA decide, o humano aprova no reflexo. <strong>AI-assisted</strong> é o inverso: o humano arquiteta e decide TUDO; a IA executa e propõe, e nunca decide sozinha. Cada saída passa por revisão e aprovação explícita antes de existir no projeto.</p>

<p>A prova documental de que o GusWorld é AI-assisted é o <strong>primeiro prompt real</strong> do projeto, o mandato que abriu a primeira sessão e passou a abrir todas as outras. Está reproduzido aqui na íntegra, sem retoque:</p>

<?php /* a tela REAL do primeiro prompt (resources/referencias/tui_claude2.png),
   embutida inteira e sem retoque. width/height reais p/ zero CLS; rola na
   horizontal dentro da figura se preciso (o body nunca rola). O <a class="zoom-link">
   liga o CLIQUE-PRA-AMPLIAR: SEM JS abre a PNG em tamanho real (progressive
   enhancement); COM JS o lightbox (pecas.js) intercepta e amplia in-page pra ler. */ ?>
<figure class="tela-real">
  <a class="zoom-link" href="/assets/edicao-1/tui_claude2.png"
     aria-label="Ampliar o primeiro prompt para ler à vontade">
    <img src="/assets/edicao-1/tui_claude2.png" width="1914" height="952"
         loading="lazy" decoding="async"
         alt="O primeiro prompt do GusWorld, no terminal: o mandato que define a IA como coder e o criador como dono de todas as decisões de design, arquitetura, stack e escopo.">
    <span class="zoom-badge" aria-hidden="true">clique para ampliar</span>
  </a>
  <figcaption>reprodução do primeiro prompt, o original não foi capturado com print</figcaption>
</figure>
<p class="pensa">mas foi bem parecido</p>

<p>Não é um slogan escrito depois. É a primeira coisa que foi digitada, e cada cláusula é uma trava:</p>

<ul class="clausulas">
  <li><strong>"você é meu coder apenas"</strong> rebaixa a IA de co-autora a executora. O papel dela é implementar, não conceber.</li>
  <li><strong>"todo o processo criativo é meu"</strong> fixa a autoria criativa no humano, por contrato, na primeira linha.</li>
  <li><strong>"as decisões ... são MINHAS" / "não tome nenhuma decisão de forma autônoma"</strong> proíbe a decisão unilateral: nada de arquitetura, stack ou escopo escolhido pela máquina.</li>
  <li><strong>"apresente 2-3 opções com prós/contras, impacto e esforço"</strong> obriga a IA a devolver alternativas com trade-offs, não um fato consumado.</li>
  <li><strong>"aguarde minha aprovação explícita"</strong> insere um gate humano antes de qualquer coisa entrar. Nada compila por conta própria.</li>
  <li><strong>"duas frentes sequenciais: fundação técnica, depois a Lore"</strong> ordena o trabalho: primeiro a base, depois a escrita do mundo. E a escrita (a Lore) foi a segunda frente, começada muito antes do código, que só chegou em junho. É a tese desta revista já em ação no primeiro prompt: a escrita vem antes da compilação.</li>
</ul>

<p>E o RAG obedece à mesma disciplina. Recuperar inspiração é o gêmeo de "apresente opções": a ferramenta traz trechos, o humano lê e decide o que fazer com eles. Inspiração não é cópia pela mesma razão que assistência não é autoria: em ambos os casos, quem decide o que vira texto é a pessoa. A máquina sugere; o autor escreve. É por isso que o AI-disclosure deste projeto é uma defesa, não uma confissão. Declarar que a IA ajudou não dilui a autoria quando o método está documentado e o decisor é sempre o humano. A honestidade é o argumento, e o método é a prova.</p>

<h3>6. Fecho: a lore nasceu ancorada em 300 obras sem copiar nenhuma</h3>

<p>O assistente de leitura funcionou. Um acervo de 306 obras, quebrado em 163 mil trechos, virou uma estante que responde à pergunta certa com o parágrafo certo, e a lore que ele ajudou a escrever nasceu original, linha por linha, de uma pessoa. Ele nasceu antes do jogo, num laptop, sem nuvem, e ensinou pelo caminho onde uma ferramenta enxerga (a exposição) e onde ela é cega (a imagética), uma lição de método que não estava no plano.</p>

<p>Essa é a gênese. Não do código, que só chega em junho. Do método. A IA é a ferramenta; o criativo é do criador. Esta seção existe para provar que a frase não é slogan: é procedimento, medido, com ponto cego mapeado, e está documentado.</p>

<h3>7. Bibliografia: as âncoras</h3>

<p>O acervo tem cerca de 306 obras. Listar todas encheria a revista, então aqui vão só as âncoras: os autores e livros que mais moldaram a leitura por trás da lore. Formato: autor - obra.</p>

<ul class="bibliografia">
  <li><strong>J.R.R. Tolkien</strong> - O Hobbit; O Senhor dos Anéis (trilogia); O Silmarillion; Contos Inacabados; a série History of Middle-earth (12 volumes)</li>
  <li><strong>Isaac Asimov</strong> - Fundação (saga); a série dos Robôs (Eu, Robô; As Cavernas de Aço); a divulgação científica ("Como Descobrimos...")</li>
  <li><strong>Frank Herbert</strong> - Duna (saga)</li>
  <li><strong>George R. R. Martin</strong> - As Crônicas de Gelo e Fogo; Fogo &amp; Sangue</li>
  <li><strong>Cyberpunk</strong> - William Gibson (Neuromancer); Neal Stephenson (Snow Crash); Philip K. Dick (Androides Sonham com Ovelhas Elétricas?); entre outros</li>
  <li><strong>Homero</strong> - Ilíada; Odisseia</li>
  <li><strong>George Orwell</strong> - 1984; A Revolução dos Bichos</li>
  <li><strong>Umberto Eco</strong> - O Nome da Rosa; O Pêndulo de Foucault</li>
  <li><strong>Dan Brown</strong> - O Código Da Vinci; Fortaleza Digital</li>
  <li><strong>Estratégia e poder</strong> - Maquiavel (O Príncipe); Sun Tzu (A Arte da Guerra); Robert Greene (As 48 Leis do Poder)</li>
  <li><strong>Corpus élfico</strong> (inspira o idioma do mundo) - cursos de Sindarin e Quenya, filologia tolkieniana, num índice à parte</li>
</ul>

<p class="pensa assinatura">by: root@glyfesse</p>
