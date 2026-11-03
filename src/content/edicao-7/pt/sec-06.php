<?php /* GERADO por scripts/gerar-secoes.php a partir de docs/content/edicao-7-galeria-bugs.md. Não edite à mão: corrija a fonte e gere de novo. */ ?>
<p class="fala"><span class="prompt">gus@glyfesse:~/galeria$</span> <span class="dito">galeria de bugs</span></p>

<h3>O baú que abre duas vezes</h3>

<p>Um baú de jogo tem uma regra só: abriu, esvaziou. Ninguém avisou o baú. No exemplo do item (2), de The Legend of Zelda: The Wind Waker, o baú abria uma segunda vez e deixava o jogador num estado bugado, isto é, num ponto em que o jogo deixa de se comportar como foi desenhado. No GusWorld o caso é outro: a coleta de itens ainda não existia em código.</p>

<h3>O catálogo</h3>

<p>Em 22 de agosto de 2026, às 8h56 (horário de Brasília), Gus Dragon, playtester, Revisor Adversarial de Design, abriu no bus uma discussão. O bus é um repositório git (uma pasta de código com o histórico de todas as mudanças) que funciona como caixa de mensagens entre o jogo e o site. Uma discussão é um tópico com respostas, como num fórum. O título é "Ultra-Post: TODOS os bugs que aconteceram, acontecem e podem acontecer". A discussão virou um catálogo permanente de bugs do GusWorld e do GlintFX, a biblioteca que desenha as imagens do jogo, e vem com três regras.</p>

<p>A primeira regra exige carimbo de data e hora em cada resposta de IA, isto é, a data e a hora exatas em que ela foi escrita. O argumento, dado pela sessão do jogo ao site, é este: uma IA não percebe a passagem do tempo, e sem carimbo "ontem" e "três semanas atrás" ficam indistinguíveis. Pedir a hora obriga a consultar o relógio de verdade.</p>

<p>A segunda regra classifica cada bug pelo tempo, em uma de três casas. Bug Consertado é o que já aconteceu e foi resolvido. Bug Funcional é o que acontece no presente. Bug Possível é o que ainda não aconteceu. A terceira casa é a que um rastreador de bugs comum não tem. Essas ferramentas, onde a equipe anota os defeitos, costumam trazer só "aberto" e "fechado", sem lugar para o defeito que ainda não existe. Essa casa também é a mais barata de tratar, porque não há código para consertar, só um desenho para corrigir.</p>

<p>A terceira regra põe os itens numerados, (1), (2) e assim por diante, numa única publicação. Um defeito espalhado em avisos avulsos perde a vizinhança. Numa lista numerada, dois itens distantes podem revelar que são o mesmo erro com outra roupa.</p>

<h3>O item (2)</h3>

<p>Às 9h18 do mesmo dia (horário de Brasília), Gus Dragon, playtester, Revisor Adversarial de Design, classificou o item (2) como Bug Possível e escreveu:</p>

<p>"Um bug comum em zelda wind waker é conseguir abrir um bau 2 vezes, ficando num estado bugado. Apenas comentando para que nao seja possivel abrir 2 coletas de items ao mesmo tempo, seja para mudar hitboxes ou duplicacao de items"</p>

<p>A grafia é a original, sem correção. Hitbox é a área invisível que decide quando um objeto é tocado pelo jogador. Coleta é o momento em que o item nasce e entra no inventário, a lista do que o personagem carrega. Antes de responder, a sessão do jogo conferiu o caso e confirmou.</p>

<h3>O buraco</h3>

<p>Exploit é uma brecha que o jogador usa para tirar vantagem de algo que o criador não previu. O jogo tem nove invariantes anti-exploit, regras que o projeto declara inegociáveis. Invariante é uma regra que o sistema promete nunca quebrar.</p>

<p>Essas regras protegem o item depois que ele existe: onde ele mora, como se move e como sai. A coleta é o instante em que o item nasce. Duas coletas criam dois itens, cada um legítimo, e nenhuma regra é violada, porque todas começam a valer depois daquele instante. Na palavra da sessão do jogo, "a regra não é quebrada; ela chega tarde".</p>

<p>A checagem seguinte confirmou o tamanho do buraco: a lista de pendências do jogo, o TODO, não tinha nenhum item de coleta nem de loot. Loot é o item que cai como recompensa. Aquele pedaço ainda não tinha sido pensado.</p>

<h3>Duas defesas, duas ferramentas</h3>

<p>O item (1) trata da tela de carregamento, e a comparação com a coleta mostra a diferença. No carregamento, a defesa é uma máquina de estados. Máquina de estados é um jeito de o programa saber em que fase está e recusar o comando que não cabe naquela fase. O segundo comando de carregar é rejeitado, porque carregar duas vezes nunca faz sentido.</p>

<p>Na coleta, a defesa é a idempotência. Idempotência é a propriedade de uma ação que, repetida, não muda nada depois da primeira vez. O segundo comando de coleta é aceito e não faz nada, porque abrir de novo um baú vazio é inofensivo.</p>

<p>Na leitura da sessão do jogo, as duas são da mesma família de bug, pedem ferramentas opostas, e escolher a ferramenta errada é justamente o que faz esse tipo de bug voltar depois de dado como consertado. A mesma sessão diz que o formato numerado do catálogo provou esse ponto em menos de meia hora.</p>

<h3>Em 22 de agosto</h3>

<p>Na mensagem de 22 de agosto, a sessão do jogo fecha o registro do item com esta frase:</p>

<p>"Nada disto existe em código, e nenhuma data foi dada a ele."</p>

<p>Esta galeria registra o defeito e a casa em que ele está.</p>
