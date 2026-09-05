# Política de Privacidade da Glyfesse (RASCUNHO) / Glyfesse Privacy Policy (DRAFT)

> **Item de board:** `REMED-LGPD` (`TODO.md`, linha 203). Residuo da auditoria `AUD-LGPD`
> (`docs/auditoria/AUD-LGPD-2026-08-04.md`, rodada em 2026-08-04). Este documento e o
> texto pedido por aquela auditoria: uma peca de privacidade curta, em linguagem de
> leigo, cobrindo os pontos que o dossie listou.
>
> **⚠️ Isto NAO e parecer juridico vinculante.** E orientacao tecnico-regulatoria. O
> `TODO.md` (linha 90) registra sign-off de advogado humano pendente antes de qualquer
> texto de privacidade ir ao ar. O papel deste documento e chegar pronto para esse
> advogado revisar, nao substitui a revisao dele.
>
> **⚠️ Isto e um RASCUNHO de TEXTO, nao uma pagina.** Nenhum arquivo de `src/`,
> `public_html/`, `data/` ou `api/` foi tocado para produzir este documento. Onde este
> texto entra no site (secao do Expediente ou pagina propria) e uma decisao do lider,
> ainda em aberto ao decision 1 no fim deste dossie.
>
> **Nao decido por conta propria** onde falta decisao do lider: os dois lugares
> marcados `[A DEFINIR PELO LIDER]` no corpo da politica (retencao do registro do
> servidor) ficam assim ate a decisao 2, no fim deste dossie, ser resolvida.

---

## O que foi medido, hoje, na arvore (2026-09-05)

A auditoria original rodou em 2026-08-04. Como o proprio item de board avisa que a
documentacao ja mentiu uma vez sobre este assunto, os achados abaixo foram
**remedidos agora**, nao copiados do dossie antigo. Onde bate com o dossie, esta dito;
onde mudou (a Edicao #5 entrou em producao desde entao), esta dito tambem.

### 1. Cookies e armazenamento local

| Mecanismo | Ocorrencias medidas agora | Onde |
|---|---|---|
| `setcookie()` (PHP) | **1** | `public_html/api/cupom-voto.php:231` |
| `Set-Cookie` bruto via `header()` | **0** | varredura em todos os `.php` de `public_html/` e `src/` |
| `$_COOKIE` (leitura) | **1** | `src/lib/cupom.php:162` |
| `session_start()` / cookie de sessao PHP | **0** | idem |
| `document.cookie` (JS) | **0** | `public_html/assets/js/**` |
| `localStorage` | **4 usos** (som, album, cupom-core, cupom) | `public_html/assets/js/{som,som-core,album,album-core,cupom,cupom-core}.js` |
| `sessionStorage` | **0** | idem |
| `IndexedDB` | **0** | idem |

O cookie unico: nome `glyfesse_votou` (`src/lib/cupom.php:42`), valor literal `"1"`
(nao e identificador, e igual para todo visitante), duracao `60*60*24*180` segundos
(~180 dias, `src/lib/cupom.php:43`), `httponly`, `samesite=Lax`, `secure` condicional a
HTTPS. Grava so quando o visitante clica em votar no cupom (`public_html/api/cupom-voto.php:231-237`).
**Isto confirma o achado LGPD-01 do dossie de 04/08: ainda existe, sem mudanca.**

Os 4 usos de `localStorage` (som, album de figurinhas, "ja votei") ficam so no
navegador do leitor; nenhum deles viaja ao servidor (o unico `fetch()` do site,
`cupom.js:240`, manda so a opcao escolhida, nunca o conteudo do `localStorage`).

### 2. Terceiros que recebem o IP do visitante

Enumeracao de todo `https?://` servido em `src/**` e `public_html/**`:

| Host | Tipo | O navegador busca sozinho? | Transfere IP? |
|---|---|---|---|
| `gusworld.site` | proprio dominio | sim | e o proprio controlador, nao e terceiro |
| `github.com` (3 links do indice) | `<a href>` de navegacao | **nao** | so se o leitor clicar |
| `www.w3.org/2000/svg` | namespace XML (SVG inline) | **nao** | nunca (nao e dereferenciado) |
| `x.com/Andre_Suporte` (novo, Edicao #5) | `<a href>` de navegacao, credito de artista | **nao** | so se o leitor clicar |
| `vidadesuporte.com.br` (novo, Edicao #5) | `<a href>` de navegacao, tira clicavel | **nao** | so se o leitor clicar |

**Mudanca desde o dossie de 04/08:** a Edicao #5 (em producao) adicionou dois links de
navegacao novos (credito ao artista da tirinha e o site do parceiro editorial). Sao da
MESMA categoria que o link do GitHub que ja existia: `<a href target="_blank">`, nunca
buscados automaticamente pelo navegador. **O veredicto "zero sub-recurso externo" do
dossie de 04/08 continua valendo**, com uma ressalva honesta: o numero de links
clicaveis para fora cresceu de 1 para 3.

Zero `<iframe>`, `<embed>`, `<video>`, `@import` de CSS externo, fonte de terceiro,
analytics, pixel de rastreio ou script remoto em toda a arvore (mesma varredura do
dossie de 04/08, reconferida agora, sem mudanca).

O unico operador que ve o IP de todo visitante antes do codigo do site rodar e o
servico de hospedagem (a conexao passa pela CDN dele por configuracao de DNS). Isso
nao e um terceiro no sentido de rastreamento: e a infraestrutura do proprio provedor,
atuando como operador de dados.

### 3. O que a API guarda

`public_html/api/cupom-voto.php` e o unico backend vivo do site. Lido na integra
agora: grava exclusivamente o array de contagem em `data/cupom-votos.json`, um
inteiro por opcao da enquete (`cupom_gravar_tally()`, linhas 130-151). Nao grava IP,
User-Agent, timestamp por voto, nem qualquer identificador. O arquivo fica fora do
docroot publico e tem `Require all denied` no `.htaccess` do diretorio. Sem
rate-limit por IP (decisao deliberada registrada no proprio codigo, linha 24, para
nao violar a regra de minimizacao do projeto). **Confirma o achado do dossie de
04/08, sem mudanca: nao ha dado pessoal neste arquivo.**

### 4. Os cinco documentos que ainda afirmam "sem cookie"

Confirmado agora, texto por texto, que **nenhum foi corrigido** desde 04/08:

| Arquivo | Linha (hoje) | Frase, citada |
|---|---|---|
| `TODO.md` | 304 (era 94 em 04/08; o arquivo cresceu) | "Nao ha analytics, **nao ha cookie**, nao ha identificador." |
| `docs/adr/ADR-001-stack-php-includes.md` | 14 | "regra `ZERO-DADO`/zero-terceiro: nada de analytics, **cookie** ou servico externo" |
| `docs/adr/ADR-001-stack-php-includes.md` | 19 | "fontes e assets self-hosted; sem CDN de fonte externa, sem analytics, **sem cookie**" |
| `docs/adr/ADR-001-stack-php-includes.md` | 34 | "sem analytics, **sem cookie**, sem CDN externo" |
| `docs/ia-wireframe.md` | 322 | "sem analytics, **sem cookie**, sem CDN de fonte externa" |

⛔ **Nao corrigidos aqui.** A ordem de servico desta tarefa proibe editar documento
existente. A correcao das 5 linhas e outra ordem de servico (o proprio dossie de 04/08
ja recomenda `technical-writer` para isso). Ver decisao 4, no fim.

### 5. O registro do servidor (fora do codigo, do lider)

Nenhum `.htaccess` do projeto configura `CustomLog`/`LogFormat`/`ErrorLog`; o
`deploy.sh` exclui `*.log` do envio (reconhece que o servico de hospedagem grava log,
mas nao o governa). Por padrao, um servidor Apache grava por requisicao: IP,
data/hora, URL, codigo de resposta, navegador (User-Agent) e de onde veio o clique
(Referer). **IP e dado pessoal** para efeito de LGPD e GDPR. Isto e a UNICA coleta de
dado pessoal continua do site, e vive inteiramente no painel do servico de
hospedagem, fora deste repositorio. **So o lider pode mexer nisso.** Ver decisao 2,
no fim deste dossie.

---

## pt-BR

*(Texto para publicacao. Sujeito a aprovacao do lider e a sign-off de advogado
humano antes de ir ao ar. Local de publicacao: a definir, ver decisao 1.)*

### Politica de Privacidade da Glyfesse

**Ultima atualizacao:** [DATA A DEFINIR NA PUBLICACAO]

A Glyfesse e a revista deste site, que conta a producao do jogo GusWorld. Este texto
explica, em linguagem simples, o que o site guarda sobre quem visita, o que ele nao
guarda, e como falar com a gente sobre isso.

**Quem responde por este site.** Voce pode escrever para
`gusworld@gusworld.site` a qualquer momento, com qualquer duvida ou pedido sobre
seus dados.

**O que a Glyfesse NAO faz.** Nao existe cadastro, nao existe login, nao existe conta
de usuario. Nao vendemos nem compartilhamos nenhuma informacao sua com ninguem. Nao
usamos ferramentas de propaganda nem de rastreamento (nada de Google Analytics ou
parecido). Nao existe um perfil seu guardado em lugar nenhum.

**O unico "bilhete" que guardamos no seu navegador: um cookie.** Um cookie e um
pequeno arquivo que o seu navegador guarda a pedido de um site, para lembrar de
alguma coisa depois. O nosso se chama `glyfesse_votou`. Ele so aparece quando voce
vota na enquete do cupom, no rodape de uma edicao. Ele serve so para lembrar "esta
pessoa ja votou", para que a pagina mostre o resultado em vez do formulario de novo.
Ele dura ate 180 dias (mais ou menos uma temporada de edicoes da revista). Ele nao
tem o seu nome, nem numero, nem nada que separe voce de outra pessoa: e sempre o
mesmo valor para todo mundo que vota. Se voce apagar os cookies do seu navegador,
nada quebra: voce so pode votar de novo.

**O que fica guardado so no seu proprio aparelho.** Algumas partes do site guardam
coisas direto no seu navegador (a tecnologia chama isso de `localStorage`), sem
mandar nada para o nosso servidor: quais figurinhas do album voce ja colou, se o som
e a musica estao ligados ou desligados, e se voce ja votou no cupom desta edicao.
Isso fica so no seu aparelho. Nos nao vemos nem guardamos essa informacao. Se voce
limpar os dados deste site no seu navegador, tudo isso some, e ninguem mais tem uma
copia.

**A enquete do cupom.** Quando voce vota, a gente soma mais um numero numa lista de
contagem (por exemplo: "opcao A: 41 votos"). Nao guardamos quem votou em que. O
servidor nao sabe, e nem consegue saber, qual foi a sua escolha depois que a pagina
fecha.

**Se voce nos escrever um e-mail.** Guardamos a mensagem so para poder responder.
Nao usamos seu e-mail para lista de avisos, nao repassamos para ninguem.

**O registro automatico do servidor.** Como quase todo site na internet, o servico
de hospedagem que usamos grava, automaticamente, uma lista tecnica de visitas: o
numero de identificacao da sua conexao (chamado de IP), a pagina pedida, a data e
hora, e o tipo de navegador. Isso e feito pelo proprio servico de hospedagem, para
manter o site funcionando e seguro, e serve principalmente para diagnosticar
problemas. **Por quanto tempo esse registro fica guardado:** [A DEFINIR PELO LIDER
-- ver decisao 2 deste projeto]. Assim que isso for decidido, esta linha sera
atualizada com o prazo exato.

**Voce tambem pode notar links para fora do site.** Algumas materias linkam para
outros lugares: o repositorio do jogo no GitHub, o perfil de um artista convidado,
o site de um parceiro editorial. Clicar neles abre outro site, com as proprias
regras. Nos nao mandamos nada automaticamente para esses lugares so por voce
visitar a Glyfesse.

**Criancas.** Sabemos que parte de quem le esta revista tem 11, 12, 13 anos. O site
nao pede idade, nao pede cadastro, e nao guarda nenhuma informacao pessoal de
ninguem, criança ou adulto.

**Seus direitos.** Voce pode pedir para saber o que guardamos sobre voce, corrigir
algo errado, ou pedir para apagar. A resposta honesta, porque e a verdade: como
nao existe cadastro nem login, normalmente nao temos como saber "qual visitante e
voce" para atender um pedido individual -- o que ja e, por si so, uma forma de
proteger sua privacidade. Se voce quiser apagar o que fica no seu navegador (album,
som, "ja votei"), pode fazer isso voce mesmo, limpando os dados do site nas
configuracoes do seu navegador. Para qualquer outro pedido, escreva para
`gusworld@gusworld.site`.

**Mudancas nesta politica.** Se este texto mudar, a data no topo muda junto.

---

## EN

*(Draft text for publication. Subject to the lead's approval and human legal
sign-off before going live. Where it is published on the site: to be decided, see
decision 1.)*

### Glyfesse Privacy Policy

**Last updated:** [DATE TO BE SET AT PUBLICATION]

Glyfesse is this site's magazine, telling the story of making the game GusWorld.
This text explains, in plain language, what the site keeps about visitors, what it
does not keep, and how to reach us about it.

**Who is responsible for this site.** You can write to `gusworld@gusworld.site`
anytime, with any question or request about your data.

**What Glyfesse does NOT do.** There is no sign-up, no login, no user account. We
do not sell or share any information about you with anyone. We do not use
advertising or tracking tools (no Google Analytics or anything like it). There is
no profile of you stored anywhere.

**The only "token" we keep in your browser: a cookie.** A cookie is a small file
your browser stores at a site's request, to remember something later. Ours is
called `glyfesse_votou`. It only shows up when you vote in the coupon poll, in an
issue's footer. It exists only to remember "this person already voted," so the
page shows the result instead of the form again. It lasts up to 180 days (roughly
one magazine season). It does not carry your name, or a number, or anything that
tells you apart from anyone else: it is the exact same value for everyone who
votes. If you clear your browser's cookies, nothing breaks: you can just vote
again.

**What stays only on your own device.** Some parts of the site store things
directly in your browser (the technology is called `localStorage`), without
sending anything to our server: which stickers you already stuck in the album,
whether sound and music are on or off, and whether you already voted in this
issue's coupon. That stays only on your device. We do not see or keep that
information. If you clear this site's data in your browser, all of it disappears,
and nobody keeps a copy.

**The coupon poll.** When you vote, we add one to a running count (for example:
"option A: 41 votes"). We do not store who voted for what. The server does not
know, and cannot know, what your choice was once the page closes.

**If you email us.** We keep the message only to be able to reply. We do not use
your email for a mailing list, and we do not pass it on to anyone.

**The server's automatic log.** Like almost every site on the internet, the
hosting service we use automatically records a technical list of visits: your
connection's number (called an IP address), the page requested, the date and
time, and the type of browser. This is done by the hosting service itself, to
keep the site running and secure, and mainly serves to diagnose problems. **How
long that log is kept:** [TO BE SET BY THE LEAD -- see decision 2 of this
project]. Once that is decided, this line will be updated with the exact
retention period.

**You may also notice links off the site.** Some articles link elsewhere: the
game's repository on GitHub, a guest artist's profile, an editorial partner's
site. Clicking them opens another site, with its own rules. We do not
automatically send anything to those places just because you visited Glyfesse.

**Children.** We know part of this magazine's readership is 11, 12, 13 years old.
The site does not ask for age, does not ask for sign-up, and does not store any
personal information about anyone, child or adult.

**Your rights.** You can ask what we keep about you, ask us to correct something
wrong, or ask us to delete it. The honest answer, because it is true: since there
is no sign-up or login, we usually have no way to know "which visitor is you" to
answer an individual request -- which is, by itself, a form of protecting your
privacy. If you want to delete what stays in your browser (album, sound, "already
voted"), you can do that yourself by clearing this site's data in your browser
settings. For any other request, write to `gusworld@gusworld.site`.

**Changes to this policy.** If this text changes, the date at the top changes
with it.

---

## O que e do lider decidir

### 1. Onde esta peca mora no site

O `AUD-LGPD` ja registrou que o site nao tem pagina fora da banca e das edicoes
(nota de integracao do dossie de 04/08), e uma "Politica de Privacidade"
institucional colide com a ficcao de revista de banca. Duas saidas, nenhuma
escolhida ainda:

- **Opcao A -- uma secao do Expediente.** Revista de banca sempre teve expediente
  com dados do editor; e o lugar canonico e in-world para "quem responde por isto
  e o que a gente faz com o que voce deixa aqui". Custo: cabe dentro de uma pagina
  que ja existe (a Edicao), sem URL nova; mas o texto compete por espaco com o
  conteudo editorial daquela edicao, e precisa reaparecer a cada edicao nova (ou
  virar link fixo dentro do Expediente).
- **Opcao B -- pagina propria** `/pt/privacidade` + `/en/privacy`, linkada so do
  rodape, em chrome de revista. Custo: +2 URLs novas, um par de `hreflang`, e uma
  rota nova no roteador -- trabalho de implementacao (`backend-engineer` ou quem
  mantiver `src/lib/config.php` e o roteador), fora do escopo desta tarefa. Em
  troca, fica sempre acessivel, independente de qual edicao esta em cartaz, e nao
  compete por espaco com conteudo editorial.

### 2. Retencao do registro do servidor (`access_log`)

Esta e a unica coleta continua de dado pessoal (IP) que o site teria no ar, e o
`TODO.md:90` ja registra que trava o sign-off de advogado antes do go-live. Nao
invento um prazo: as tres saidas identificadas pelo dossie de 04/08, do mais simples
ao mais completo:

- **Opcao A -- declarar e prazar.** Manter o log, declarar a finalidade (seguranca
  e diagnostico), fixar uma retencao curta. O intervalo que a pratica aceita como
  proporcional para um site sem conta e **7 a 30 dias**. Custo: exige conferir, no
  painel do servico de hospedagem, se ha controle de rotacao/expurgo automatico
  nesse prazo -- se o painel so oferecer rotacao mensal ou anual, a promessa escrita
  pode nao bater com o que o painel realmente faz, e isso teria que ser verificado
  antes de publicar a frase.
- **Opcao B -- anonimizar o IP.** Se o plano permitir configurar o formato do log,
  truncar o ultimo numero do IP (ou o equivalente em IPv6). Reduz a superficie
  bastante. Custo: planos de hospedagem compartilhada normalmente **nao** liberam
  essa configuracao ao cliente -- precisa verificar se e possivel antes de prometer.
- **Opcao C -- nao coletar.** Desligar o log de acesso no painel, se for permitido.
  E a opcao mais alinhada com a regra de guardar o minimo possivel que o projeto ja
  segue em tudo o mais. Custo: perde-se a capacidade de diagnosticar problema
  tecnico via log (ex.: descobrir de onde veio um pico de erro).

Qualquer que seja a escolha, a linha marcada `[A DEFINIR PELO LIDER]` no texto pt-BR
e EN acima e atualizada com o prazo ou a decisao exata.

### 3. Enquadramento como agente de pequeno porte (dispensa de Encarregado/DPO formal)

O dossie de 04/08 aponta que a LGPD (art. 41 par. 3o) e a Resolucao CD/ANPD no
2/2022 dispensam agente de tratamento de pequeno porte de nomear um
Encarregado/DPO formal, mas marca isto como "a confirmar com o juridico". Duas
saidas:

- **Opcao A -- publicar ja citando o enquadramento**, com a ressalva de que e uma
  leitura tecnica pendente de confirmacao formal. Custo: se o juridico depois
  discordar do enquadramento, a politica ja publicada precisa de correcao (baixo
  custo de correcao, mas e uma correcao publica).
- **Opcao B -- segurar a publicacao da politica** ate o juridico confirmar o
  enquadramento. Custo: atrasa a publicacao da politica inteira (nao so este ponto)
  por um item que, tecnicamente, nao muda o conteudo do que o site guarda -- so
  muda se um Encarregado formal precisa ser nomeado.

### 4. Quando corrigir os 5 documentos que dizem "sem cookie"

Esta tarefa foi instruida a nao editar nenhum documento existente, entao a correcao
das 5 linhas (`TODO.md:304`, `docs/adr/ADR-001-stack-php-includes.md:14,19,34`,
`docs/ia-wireframe.md:322`) fica pendente como outra ordem de servico. Duas saidas:

- **Opcao A -- corrigir agora, em paralelo**, antes mesmo do texto final da
  politica sair. Custo: nenhum real -- e uma correcao de documentacao interna, nao
  depende do texto da politica. Beneficio: fecha o risco descrito no proprio dossie
  (uma frase interna errada podendo migrar para texto publico) o quanto antes.
- **Opcao B -- corrigir junto, no mesmo lote** que aprovar e publicar esta
  politica. Custo: mantem as 5 linhas erradas por mais tempo (elas sao internas,
  entao o risco de um leitor real ve-las e baixo, mas nao e zero -- todas estao em
  arquivos do repositorio publico do jogo/site).

Nenhuma das duas exige decisao tecnica complexa; e so uma questao de ordem de
execucao, e por isso listada aqui em vez de decidida sozinha.
