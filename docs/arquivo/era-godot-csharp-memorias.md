# Arquivo histórico: as 4 memórias da era Godot/C#

> **Proveniência.** Chegou pelo bus (`gusworld` → `site`) em 2026-07-22, thread `registro-historico`.
> A sessão do jogo apagou os 4 arquivos do lado dela depois de enviar; **esta cópia é a que resta**.
> Transcrição sem edição (inclusive as marcações de DORMENTE originais). Única alteração:
> o e-mail de contato de um mantenedor terceiro foi redigido, porque este repositório é público.
> Companheiro: [`era-godot-csharp-obituario.md`](era-godot-csharp-obituario.md).

## Por que isto esta chegando pra voces

O M8 (decommission do Godot/C#) fechou hoje. Com ele, quatro memorias tecnicas da sessao gusworld perderam objeto: descreviam ferramentas e APIs de um stack que nao existe mais no repo nem na maquina (o Godot foi desinstalado, 220 MB, e o MCP que falava com o editor morreu junto).

O lider decidiu: **elas nao ficam como cemiterio na memoria de trabalho, mas o conteudo nao se perde**. Vao integrais pra voces, que sao o arquivo historico do projeto. Depois desta mensagem, os 4 arquivos sao apagados do lado de ca. Se um dia alguem precisar saber como era, esta aqui.

Sao 486 linhas no total, transcritas SEM EDICAO (inclusive as marcacoes de DORMENTE que elas ja carregavam). Contexto de cada uma no cabecalho da secao.

---

# 1. reference_godot_docs.md

*Referencia de documentacao do Godot 4 / GDScript. Aposentada: o editor nao existe mais na maquina.*

```markdown
---
name: reference-godot-docs
description: "Síntese chave docs.godotengine.org consultada 2026-05-19 — AutoLoad, GDScript style, i18n, save, scene org, Resources, Input, SpringArm3D. Use proativamente quando codar GDScript GusWorld"
metadata: 
  node_type: memory
  type: reference
  source: https://docs.godotengine.org/en/stable/
  consulted: 2026-05-19
  originSessionId: 1b428319-afc2-4856-9b2e-5114879ace70
---

> **[DORMENTE ATÉ M8 — era Godot/C# superada]** O projeto pivotou pra C++20+SDL3 (ADR-008, 2026-06-22; antes disso ADR-002 Godot C# e engine-design.md Qt). `game/` (Godot) e `engine/` (C#) seguem no repo APENAS como referência de leitura até o decommission no M8. NÃO usar este doc como guia de implementação atual; consultar só em arqueologia do legado. Candidato a remoção definitiva quando o M8 fechar.

# Godot 4 docs — síntese canônica pra GusWorld

Páginas relevantes consultadas + memorizadas. Use como reference rápido pra evitar re-fetch.

## AutoLoad / Singletons

- Setup via **Project > Project Settings > Globals > Autoload** (também grava em `project.godot` seção `[autoload]` com prefixo `*` = enable).
- AutoLoads carregam ANTES de qualquer cena. Last child de root = cena ativa.
- Ordem: declarados em project.godot é a ordem de instanciação + `_ready`.
- Acesso direto via nome: `EventBus.game_paused.emit()`.
- **CRÍTICO Anti-pattern:** NUNCA `free()` ou `queue_free()` em AutoLoad em runtime, **crash engine**.
- C# difere: `public static Instance; _Ready() { Instance = this; }`.

## GDScript style guide

**Ordem canônica membros script:**
1. `@tool`, `@icon`, `@abstract` annotations
2. `class_name`
3. `extends`
4. Docstring `## ...`
5. Signals
6. Enums
7. Constants
8. Static vars
9. `@export` vars
10. Regular vars
11. `@onready` vars
12. Methods (`_init`, `_ready`, virtual callbacks, public, private)
13. Inner classes

**Naming conventions:**
| Element | Conv | Ex |
|---|---|---|
| Files | snake_case | `yaml_parser.gd` |
| Classes | PascalCase | `class_name YAMLParser` |
| Functions | snake_case | `func load_level()` |
| Vars | snake_case | `var particle_effect` |
| Signals | snake_case past tense | `signal door_opened` |
| Constants | CONSTANT_CASE | `MAX_SPEED = 200` |
| Enums | PascalCase singular | `enum Element` |
| Enum members | CONSTANT_CASE | `{EARTH, WATER}` |
| Private | leading `_` | `_counter`, `_recalculate()` |

**Typing:** Explicit quando ambíguo, `:=` (inferência) quando óbvio. `@onready var bar: ProgressBar = ...`.

**Docstring:** `##` linhas. Primeira linha resumo, blank line, depois extended.

**Anti-patterns:**
- Múltiplos statements/linha (exceto ternário)
- Parênteses desnecessários em conditional
- `.234` em vez de `0.234`
- Hex em UPPERCASE
- Var membro pra uso só local
- Alinhamento vertical com espaços

## i18n

- Função `tr()` lookup chave em TranslationServer; fallback chain: locale corrente → fallback config (Project Settings) → `en`.
- Formato canon: **CSV ou PO** (importados via tutorial "Importing translations").
- **DirAccess em res:// só vê arquivos IMPORTADOS.** Formatos não-conhecidos (`.md` custom) ficam invisíveis pra `DirAccess.list_dir()`.
  - Workaround: hardcode list de arquivos (`SUPPORTED_LOCALES` array) + `FileAccess.file_exists()` direto.
  - `FileAccess` lê qualquer arquivo em res:// se o path é exato, NÃO precisa de import.
- `TranslationServer.add_translation()` + `remove_translation()` em runtime.
- Strings hardcoded pra `tr()` = chave: se texto = `MAIN_MENU_START`, `tr()` retorna tradução ou literal.

## Save games

- Recomendados 2 approaches:
  - **JSON**: legível, debug-friendly, tamanho maior, NÃO suporta Vector2/3/Color (precisa serializar manual em arrays).
  - **Binary** (`get_var`/`store_var`): menor, suporta tipos Godot completos, NÃO-debuggable em editor de texto.
- `user://` path → cross-platform user data:
  - Linux: `~/.local/share/godot/app_userdata/<project>/`
  - Windows: `%APPDATA%/Godot/app_userdata/<project>/`
  - macOS: `~/Library/Application Support/Godot/app_userdata/<project>/`
- ConfigFile pra **settings**, não saves.
- **NÃO** salve Node references ou Callables direto (não serializam corretamente).
- Versionamento + migrations: **NÃO COBERTO** em docs (estratégia decisão própria; GusWorld canon: forward-only chain ver CONTRACT §7).

## Scene organization (best practices)

Princípio core: **"scenes operate best when they operate alone."**

- **Loose coupling:** cenas sem dependências externas; quando precisa, **dependency injection** (parent provê pro child).
- **Signal-up, call-down:**
  - Child emite signal pra ações que parent reage
  - Parent chama método em child pra dirigir comportamento
- **Hierarquia é relação, não espaço:** child só sob parent se depende dele.
- **Anti-pattern:** Hidden dependencies (scene espera config externa sem documentar). Usar `_get_configuration_warnings()` em tool scripts.
- **Estrutura recomendada:**
  ```
  Main (entry point)
  ├── World (swappable levels)
  └── GUI (persistent interface)
  ```
  + AutoLoads pra sistemas globais isolados.

## Custom Resources

- **Quando usar Resource vs Dictionary:** Resource quando precisa Inspector + serialização auto + setter/getter + heredo + class_name. Dict pra dados ad-hoc internos.
- Sintaxe:
  ```gdscript
  class_name BotStats
  extends Resource

  @export var health: int = 100
  @export var sub_resource: Resource

  func _init(p_health = 0):
      health = p_health
  ```
- **.tres** = text format, dev (versionável Git, diff-able).
- **.res** = binary, export release (Godot converte auto).
- **Anti-patterns:**
  - Inner classes NÃO serializam em Resource.
  - Callables em Resource = path inválido.
  - References circulares quebram persistência.
- Load: `preload("res://path.tres")` em compile time, `load(...)` em runtime.

## InputMap (controles remappáveis)

- **Action-based input** (não keycode raw): `Input.is_action_pressed("move_up")`.
- Cada ação aceita múltiplos eventos (keyboard + gamepad simultâneo).
- **Remap runtime** (canon CONTRACT §6 Gate 1):
  - `InputMap.action_add_event(action, event)`
  - `InputMap.action_erase_event(action, event)`
  - Persist em save (canon).
- Callbacks:
  - `_process()` + `Input.is_action_pressed()` pra polling contínuo
  - `_unhandled_input(event)` pra event-driven (preferido pra gameplay, GUI intercepta first)
- **Anti-pattern:** keycodes raw em código gameplay; usar action sempre.

## SpringArm3D (orbital camera 3rd-person)

Setup canon Godot 4:
```
Node3D (pivot, follows player position)
└── SpringArm3D
    └── Camera3D
```

- `spring_length` = extensão máxima braço (zoom max).
- `margin` = distância segurança colisão (default 0.01).
- `shape` = define raycast (default) ou shape cast (mais custoso, evita clipping fino).
- `collision_mask` = layers a verificar.
- **Comportamento auto:** SpringArm reduz length quando obstáculo bloqueia, recupera quando livre.
- **Anti-patterns:**
  - NÃO incluir player collider em mask (câmera oscila errática).
  - Shape cast sem profile = perf overhead.
  - Sem margin = clipping geometria.

Pra GusWorld câmera 3/4 rotacional + zoom orbital (Chrono Trigger ref):
- Node3D pivot recebe input rotation (mouse drag ou gamepad right stick).
- SpringArm rotaciona em ângulo fixo X (~45°) + Y livre (mouse/stick).
- spring_length varia com zoom in/out.
- collision_mask exclui player layer.

## Decisões aplicáveis a GusWorld (cross-ref pra projeto)

- **F2-E.1 orbital_camera:** seguir padrão Node3D + SpringArm3D + Camera3D canônico.
- **F2-E.2 event_bus:** AutoLoad pattern correto. Já implementado.
- **F2-S.11 i18n custom MD:** desvio canon Godot CSV/PO. Solução: hardcode `SUPPORTED_LOCALES` array + `FileAccess.file_exists()`. Já implementado.
- **F2-E.3 save_system:** JSON (canon CONTRACT §7) + forward-only migrators. Vector3/Color serializar manualmente como arrays.
- **F2-E.7 input_remap:** InputMap action-based + persist em save. Acessibilidade D1 Gate 1.
- **Scenes:** Main > World + GUI + AutoLoads pattern. Composition over inheritance.

## Próximos fetches (sob demanda)

Quando entrar em fase, consultar:
- `tutorials/3d/using_transforms.html` (Vector3, Quaternion, look_at)
- `tutorials/animation/animation_tree.html` (state machine + blend tree game-animator)
- `tutorials/performance/general_optimization.html` (perf budget GTX 1050)
- `tutorials/io/runtime_file_loading_and_saving.html` (save patterns avançados)
- `tutorials/scripting/gdscript/static_typing.html` (typing benefits perf + segurança)
- `tutorials/best_practices/godot_notifications.html` (NOTIFICATION_* lifecycle)

## Limites desta sessão de leitura

User pediu "leia COMPLETAMENTE". Repo godot-docs tem centenas de páginas (`master` branch). Esta sessão cobriu **8 páginas chave** suficientes pra F2-S.11 + F2-E.2 + planejamento F2-E.1/E.3/E.7. Páginas adicionais sob demanda conforme task entrar.
```

---

# 2. reference_godot_csharp.md

*Referencia de Godot 4 com C#. Aposentada junto com o projeto Godot (game/, 172 arquivos apagados no M8).*

```markdown
---
name: reference-godot-csharp
description: "Síntese Godot 4 C# .NET 8 — basics, signals, AOT, type conversion, preprocessor defines. Use ao codar C# em GusWorld pós-ADR-002"
metadata: 
  node_type: memory
  type: reference
  source: https://docs.godotengine.org/en/stable/tutorials/scripting/c_sharp/
  consulted: 2026-05-19
  originSessionId: 1b428319-afc2-4856-9b2e-5114879ace70
---

> **[DORMENTE ATÉ M8 — era Godot/C# superada]** O projeto pivotou pra C++20+SDL3 (ADR-008, 2026-06-22; antes disso ADR-002 Godot C# e engine-design.md Qt). `game/` (Godot) e `engine/` (C#) seguem no repo APENAS como referência de leitura até o decommission no M8. NÃO usar este doc como guia de implementação atual; consultar só em arqueologia do legado. Candidato a remoção definitiva quando o M8 fechar.

# Godot 4 C# (.NET 8) — síntese canônica pós-ADR-002

## Requisitos

- **.NET SDK 8+** (LTS). 64-bit se Godot 64-bit.
- **Godot 4.5+ Mono** com suporte .NET habilitado. (GusWorld em 4.6.1 ✅)
- Android exige .NET 9+ (não aplicável G1).
- Godot bundleia .NET runtime pra rodar; SDK separado pra build.

## Sintaxe básica

```csharp
using Godot;

public partial class EventBus : Node
{
    private int _signalCounter;

    public override void _Ready()
    {
        GD.Print("EventBus ready");
    }

    public override void _Process(double delta) { }
}
```

**Regra:** nome da classe MUST bater com nome do arquivo (`EventBus` ↔ `EventBus.cs`).

`partial` keyword obrigatório (Godot source generators usam).

## Diferenças GDScript vs C#

| Aspecto | GDScript | C# |
|---|---|---|
| Naming | snake_case | PascalCase (classes, métodos, propriedades) / _camelCase (private fields) |
| Print | `print()` | `GD.Print()` |
| _ready / _process | snake_case | `_Ready()` / `_Process(double delta)` |
| Tipos | dinâmico opcional | static typing forte obrigatório |
| Exports | `@export var foo: int` | `[Export] public int Foo { get; set; }` |
| Tool | `@tool` | `[Tool]` |
| Hot-reload | sim, editor | parcial; rebuild .csproj exigido pra signature changes |

## Signals C#

**Declarar:**
```csharp
[Signal]
public delegate void GameStartedEventHandler();

[Signal]
public delegate void PlayerHpChangedEventHandler(int current, int maximum);
```

Naming convention: delegate termina em `EventHandler`. Godot gera event sem sufixo:

**Connect (typed):**
```csharp
EventBus.Instance.GameStarted += OnGameStarted;
EventBus.Instance.PlayerHpChanged += (current, max) => GD.Print($"HP: {current}/{max}");
```

**Emit:**
```csharp
EmitSignal(SignalName.GameStarted);
EmitSignal(SignalName.PlayerHpChanged, 80, 100);
```

**Disconnect (cleanup obrigatório):**
```csharp
EventBus.Instance.GameStarted -= OnGameStarted;
```

**Cross-language (signal GDScript → connect em C#):**
```csharp
button.Connect(Button.SignalName.Pressed, Callable.From(OnPressed));
```

**Anti-pattern crítico:**
- Lambda capturing vars sem cleanup = `ObjectDisposedException`.
- Solution: salvar Action field + `-=` em `_ExitTree`.

## Type conversion + casting

```csharp
// Direct cast
var node = (CharacterBody3D)GetNode("Player");

// as operator (null se falhar)
var node = GetNode("Player") as CharacterBody3D;

// Generic GetNode<T> (preferido)
var node = GetNode<CharacterBody3D>("Player");

// is operator (type check)
if (node is CharacterBody3D player) { player.Move(); }
```

## Preprocessor defines

- `GODOT` (sempre em Godot)
- `TOOLS` (editor only)
- `GODOT_WINDOWS`, `GODOT_LINUXBSD`, `GODOT_MACOS`, `GODOT_MOBILE`
- `GODOT4_3_OR_GREATER`, `GODOT4_5_OR_GREATER` (version-specific)

Uso:
```csharp
#if GODOT_LINUXBSD
    GD.Print("Linux build");
#endif

#if TOOLS
    public override void _EnterTree() { /* editor-only setup */ }
#endif
```

## .csproj + NuGet

Godot gera `.sln` + `.csproj` automaticamente ao criar primeiro script C#.

Adicionar dependência NuGet:
```xml
<ItemGroup>
    <PackageReference Include="Newtonsoft.Json" Version="13.0.3" />
</ItemGroup>
```

Godot baixa + restaura no próximo build.

## AOT compilation

- Documentação oficial Godot escassa em AOT na versão atual.
- Habilitado via `export_presets.cfg` flag `dotnet/include_debug_symbols=false` + AOT runtime config.
- AOT limitations canon (.NET):
  - Reflection limitada (precisa `[DynamicallyAccessedMembers]` ou trimming-friendly code).
  - `dynamic` keyword não funciona.
  - Type/method generation runtime restrita.
- Trade-off: binário maior (~50-100MB vs ~30MB GDScript) mas zero JIT runtime + perf máximo.

## Performance

- C# AOT: ~3-5× GDScript em CPU-bound hot paths.
- C# JIT (default editor): ~2-3× GDScript.
- Equivalente em alguns workloads (allocations Variant marshal podem ser bottleneck).

**Best practices perf:**
- Evitar `Variant` boxing repetido (preferir tipos C# nativos).
- Use `GetNode<T>` em vez de `GetNode()` + cast manual.
- Cache references em `_Ready` (não `GetNode` cada `_Process`).
- `[Export]` properties + Inspector setup eficiente.

## AutoLoad C# pattern

Não há doc oficial dedicada, mas convenção:

```csharp
// engine/event_bus/EventBus.cs
using Godot;

public partial class EventBus : Node
{
    public static EventBus Instance { get; private set; }

    [Signal]
    public delegate void GameStartedEventHandler();

    public override void _Ready()
    {
        Instance = this;
    }

    public override void _ExitTree()
    {
        if (Instance == this) Instance = null;
    }
}
```

Registrar em `project.godot`:
```ini
[autoload]
EventBus="*res://engine/event_bus/EventBus.cs"
```

Acesso global: `EventBus.Instance.EmitSignal(EventBus.SignalName.GameStarted);`

## Cross-refs aplicáveis GusWorld

- **F2-S.MIG (futura):** migrar event_bus.gd + localization.gd + tests pra C#.
- **CONTRACT §2:** scopes mantém (engine/game/...), mas naming convention vira PascalCase.
- **CONTRACT §4 DoD:** substituir gdformat/gdlint por `dotnet format` + analyzer (Roslyn).
- **TESTES T1:** GUT → xUnit ou NUnit via .csproj test project.
- **build.md:** `dotnet restore` + `dotnet build -c Release` + Godot export.

## Páginas docs Godot C# consultadas

1. `c_sharp_basics.html` — requisitos + sintaxe
2. `c_sharp_signals.html` — signals + AutoLoad pattern + anti-patterns
3. `c_sharp_features.html` — type conversion + preprocessor defines

**Páginas ainda não fetched (futuro on-demand):**
- `c_sharp_style_guide.html`
- `c_sharp_collections.html`
- `c_sharp_variant.html`
- `c_sharp_exports.html`
- `c_sharp_differences.html` (GDScript vs C# completo)
- AOT/export tutorial (URL 404 atual; pesquisar versão mais recente)
```

---

# 3. reference_csharp_lsp_dotnet10.md

*LSP de C# e o pin do .NET SDK. Aposentada: o global.json que pinava o SDK 8 existia SO por causa do submodulo engine/ (foundation C#), removido no M8. O .NET em si continua instalado na maquina, mas nao serve mais a este projeto.*

```markdown
---
name: reference-csharp-lsp-dotnet10
description: Plugin csharp-lsp (csharp-ls) instalado — gotcha do TFM net10 vs SDK + global.json pin SDK 8
metadata: 
  node_type: memory
  type: reference
  originSessionId: cb06df2e-ba27-4b40-a6ec-4a14597113cd
---

> **[DORMENTE ATÉ M8 — era Godot/C# superada]** O projeto pivotou pra C++20+SDL3 (ADR-008, 2026-06-22; antes disso ADR-002 Godot C# e engine-design.md Qt). `game/` (Godot) e `engine/` (C#) seguem no repo APENAS como referência de leitura até o decommission no M8. NÃO usar este doc como guia de implementação atual; consultar só em arqueologia do legado. Candidato a remoção definitiva quando o M8 fechar.
> Ressalva: o pin `global.json` (SDK 8) AINDA está na raiz do repo por causa do `engine/` C# legado; o gotcha dotnet-TFM continua verdadeiro pra qualquer instalação de dotnet tool nesta máquina.

Plugin **`csharp-lsp@claude-plugins-official`** v1.0.0 instalado (LSP C# — diagnósticos/navegação em `.cs`). Backend = `csharp-ls` (razzmatazz/csharp-language-server), instalado como dotnet global tool em `~/.dotnet/tools/csharp-ls` (v0.24.0).

## Gotcha resolvido 2026-06-05 (não reaprender)
`dotnet tool install --global csharp-ls` falhava com **"O arquivo de configurações 'DotnetToolSettings.xml' não foi encontrado no pacote"** — erro ENGANOSO. Causa real = **mismatch de TFM**: o `dotnet tool install` decide compatibilidade pela versão do **SDK** (não do runtime), e o pacote só traz `tools/<tfm>/`.

Mapa de TFM do csharp-ls por versão:
- 0.21–0.24 → **net10.0**
- 0.16–0.20 → net9.0
- ≤ 0.15 → net8.0

Máquina tinha só SDK .NET 8 → não consumia tool net10. **Instalar o runtime 10 NÃO basta** (tool install olha o SDK). Fix aplicado: `sudo dnf install dotnet-sdk-10.0` (Fedora 44 tem nos repos: runtime + sdk 9 e 10, pacotes limpos). SDK 10 convive com SDK 8.

## Blindagem do build (CRÍTICO)
GusWorld é **net8.0** (Game/Engine/EngineTests .csproj). Pra build não pular pro SDK 10, criado **`global.json` na raiz do repo**:
```json
{ "sdk": { "version": "8.0.127", "rollForward": "latestFeature" } }
```
`rollForward: latestFeature` = fica em 8.0.1xx, nunca salta pra 9/10. Confirmado: `dotnet --version` no repo = 8.0.127; engine compila 0/0; **598 testes verdes** sob SDK 8. global.json afeta build/test/tool-install no tree — por isso instalar o csharp-ls (net10) tem que rodar de **diretório neutro** (ex. `/tmp`), senão cai no pin do 8.

## PATH
`~/.dotnet/tools` somado ao `~/.bashrc` (linha `export PATH="$PATH:$HOME/.dotnet/tools"`) — sem isso o plugin não acha o csharp-ls. **Sessão Claude Code precisa reiniciar** pra o plugin spawnar o csharp-ls com o PATH novo (PIDs antigos iniciaram antes do backend existir).

Ver [[reference_godot_csharp]].
```

---

# 4. reference_funplay_mcp.md

*O MCP que conversava com o editor Godot. Aposentada: o addon vivia dentro de game/addons/funplay_mcp/ e o .mcp.json que o apontava foi apagado no M8. Verificado na maquina: nenhum processo, nenhuma config, porta 8765 livre.*

```markdown
---
name: reference-funplay-mcp
description: "Addon Funplay MCP for Godot v0.9.2 — segurança auditada (2 críticos fecham), token, como usar com segurança, disclosure"
metadata: 
  node_type: memory
  type: reference
  originSessionId: cb06df2e-ba27-4b40-a6ec-4a14597113cd
---

> **[DORMENTE ATÉ M8 — era Godot/C# superada]** O projeto pivotou pra C++20+SDL3 (ADR-008, 2026-06-22; antes disso ADR-002 Godot C# e engine-design.md Qt). `game/` (Godot) e `engine/` (C#) seguem no repo APENAS como referência de leitura até o decommission no M8. NÃO usar este doc como guia de implementação atual; consultar só em arqueologia do legado. Candidato a remoção definitiva quando o M8 fechar.

**Funplay MCP for Godot** v0.9.2 (MIT, `FunplayAI/funplay-godot-mcp`) em `game/addons/funplay_mcp/`. **Atualizado v0.8.0→v0.9.2 em 2026-06-14.** Addon SÓ-editor: sobe servidor HTTP MCP em `127.0.0.1:8765` com ~120 ferramentas (create_node, write_file, execute_code, play-mode…) — dirige o editor Godot via MCP (destrava trabalho de cena/.tscn).

## Estado / git
- **gitignored** (`game/addons/funplay_mcp/` + `.mcp.json` no `.gitignore` raiz). NÃO versionar — ferramenta de dev de terceiro.
- `.mcp.json` (raiz gusworld) aponta o Claude Code pro servidor: `type http`, url `http://127.0.0.1:8765/`, header `x-funplay-mcp-token`. Configurado À MÃO (NÃO usar o botão "Configure" do dock — reescreve `~/.claude.json` sem backup).
- **Token (auth, novo na v0.9.x):** vive em `user://funplay_mcp_settings.cfg` `[server] auth_token` (= `~/.local/share/godot/app_userdata/GusWorld/`). Configurado um token forte (64 hex) IGUAL nos dois lados (settings.cfg + `.mcp.json` header). Ambos fora do repo. Porta reconciliada em **8765** (o cfg da v0.8.0 estava em 8766 por engano).

## Auditoria de segurança v0.9.2 (security-engineer, 2026-06-14) — patches locais DESCARTADOS
v0.9.1/v0.9.2 são byte-idênticas nos arquivos de segurança; os fixes entraram na v0.9.1. Os 2 patches locais da v0.8.0 (clamp de path + `var class_name`→`cls_name`) viraram REDUNDANTES (upstream cobre, às vezes mais estrito) e foram descartados na atualização. **Nenhum patch local a manter.**
- **CRÍTICO-1 path traversal — FECHA (validado empírico).** `_normalize_path` + `_virtual_path_escapes_root` (`funplay_core_tools.gd:4357+`) conta profundidade de segmentos, rejeita `..` acima da raiz res://. Harness 30 vetores → 0 leaks. file-tools de escrita usam `_normalize_project_path` (mais estrito, exige `res://`, rejeita `user://`+traversal).
- **CRÍTICO-2 CSRF/auth — FECHA-PARCIAL.** Token SHA256 auto-gerado fail-closed (sem token = 401), Origin/Referer allow-list `127.0.0.1`/`localhost`/`::1` (só em POST), bind estrito loopback `127.0.0.1`. `/health` não vaza o token.

## Resíduos (menores, nenhum bloqueante)
- **R-1 symlink (NÃO fecha):** file-tools seguem symlink DENTRO do projeto que aponte pra fora (sem `realpath`/canonicalize). Precondição: write no projeto (= já comprometido). Nosso patch antigo tinha o mesmo furo. Único ganho real de uma trava extra anti-symlink.
- **R-2 Host header não validado:** DNS-rebind mitigado (não eliminado) por token + Origin.
- **R-3 /health (BAIXO):** GET sem auth vaza `project_name` + hash SHA256-16 do path (fingerprinting; sem efeito colateral, sem token).
- **R-4 execute_code (por design):** roda GDScript arbitrário; token é a única barreira (editor aberto + token vazado = RCE no editor). Manter `execute_code_safety_checks_enabled=true` (default). Considerar `disabled_tools` p/ as que não usa.

## Mitigação operacional (AINDA necessária com v0.9.2)
**Fechar o editor quando não estiver usando o MCP; não navegar na web com o Godot aberto.** Com editor fechado, a porta 8765 nem existe (zera R-1/R-2/R-4). Token mitiga mas é segredo em arquivo no mesmo trust-zone. Rotacionar token (`rotate_server_auth_token`, dock) se suspeitar de exposição.

## Para USAR (passos do editor, mãos do criador)
1. Abrir o editor Godot → Projeto → Configurações → Plugins → ativar "Funplay MCP for Godot" (v0.9.2). Lê o token já configurado no `.cfg` (não regenera, pois não está vazio).
2. Manter o editor ABERTO (servidor só roda com editor aberto).
3. Reiniciar o Claude Code (pega o `.mcp.json` com o header do token e conecta).
4. Recomendado: no dock do Funplay, desabilitar ferramentas perigosas que não usa (`execute_code`, `install_runtime_bridge`, `set_autoload`, `delete_file`, `move_file`).

## Disclosure
Issue público `FunplayAI/funplay-godot-mcp#1` (conta petrinhu, sem exploit). Mantenedor (Winlifes, MEMBER) respondeu 2026-06-12: deu canal privado (e-mail de contato do mantenedor, redigido neste arquivo público) e lançou v0.9.1/v0.9.2 corrigindo as 3 questões. Plano (2026-06-14, decisão criador): comentar no issue #1 confirmando o fix validado + reportar R-1/R-2 em alto nível + fechar. Ver [[reference_csharp_lsp_dotnet10]], [[reference_godot_csharp]].
```

---

## O angulo editorial, se servir

Ha uma materia pequena aqui sobre memoria de projeto: um projeto que troca de stack acumula conhecimento que fica correto e inutil ao mesmo tempo. Estas 4 memorias descreviam bem o Godot; so que o Godot saiu. Manter isso no lugar onde se busca resposta pra trabalho de hoje polui a busca; jogar fora perde o registro de como o projeto pensava. A saida foi separar os dois papeis: memoria de trabalho fica so com o vivo, e o arquivo historico (voces) guarda o resto. A frase do lider foi: *"elas vao sobreviver la. Aqui nao e cemiterio."*

-- gusworld
