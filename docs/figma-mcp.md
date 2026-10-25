# Figma MCP — стоит ли подключать

Проверено на этой машине, 2026-10-25.

## Что мешает прямо сейчас

| Факт | Проверка |
|---|---|
| Аккаунт Figma — **Starter** (бесплатный) | `x-figma-plan-tier: starter` в ответе API |
| REST API заблокирован на ~86 часов | `Retry-After: 312070`, `x-figma-rate-limit-type: low` |
| `/meta` работает, `/files` и `/nodes` — нет | 200 против 429 |
| Figma desktop **не установлен** | нет ни в `AppData/Local/Figma`, ни в реестре |
| Локальный MCP `127.0.0.1:3845` не слушает | порт закрыт |
| Токен `FIGMA_TOKEN` в `.env.local` рабочий | `/v1/me` → 200, `good22067@gmail.com` |

## Два пути

### 1. REST API (уже есть токен)

Работает без MCP вообще: `/v1/files/:key?depth=N` даёт дерево слоёв, `/v1/images/:key`
— экспорт любого узла в PNG/SVG в любом масштабе.

Плюс: ничего ставить не нужно, токен уже лежит в `.env.local`.
Минус: только сырые данные — ни текста «сгенерируй Tailwind», ни скриншота для глаз.
И на Starter держит лимит: сейчас `Retry-After` ~86 часов.

### 2. Figma MCP

Два сервера, и они разные:

- **Удалённый** `https://mcp.figma.com/mcp` — только для клиентов из каталога Figma
  (VS Code, Cursor, Claude Code, Codex, Gemini CLI, Xcode). Наш клиент в каталог
  не входит; прямой `initialize` вернул **401**. Нужен либо OAuth-клиент из списка,
  либо ожидание, пока Figma откроет каталог.
- **Локальный (desktop)** `http://127.0.0.1:3845/mcp` — обычный HTTP MCP, без каталога,
  подключается к любому клиенту. Но требует:
  - установленного Figma desktop,
  - **платного seat** (Dev или Full) на плане Professional и выше — на Starter его нет,
  - открытого файла в Dev Mode с включённым сервером.

### Что даёт MCP, чего не даёт REST

`get_design_context` — готовый код слоя (по умолчанию React + Tailwind, можно попросить
чистый HTML/CSS), `get_metadata` — облегчённый XML-контур, `get_screenshot` — картинка
для сверки, `get_variable_defs` — токены цветов и типографики,
`download_assets` — оригиналы картинок в исходном качестве.

## Вывод

**Для этого проекта MCP сейчас не нужен.** Причина не в удобстве, а в том, что все
данные уже есть локально и в лучшем виде, чем отдаёт MCP:

- `AUTODNA/*.svg` — векторные оригиналы с растрами **3840×2160** внутри;
- `figma/*.png` — все состояния, включая мобильные;
- `fonts/HelveticaNeue.ttc` — 14 начертаний;
- точные значения берутся прямо из SVG: `fill-opacity="0.44"`, `#262548`, `#C2B9FF`,
  координаты `Frame 1649…1654`.

Скриншоты от тебя больше не нужны — они и так лежат в `figma/`. Чего не хватает,
я добираю из SVG-исходников, и это точнее скриншота: видно `fill-opacity`, обводки
и настоящие размеры.

**Когда MCP реально окупится:** если правки идут в Figma постоянно и нужно тянуть
изменения без ручного экспорта, или если понадобится писать обратно в макет
(`use_figma`, `generate_figma_design`). Тогда минимум — план Professional с Dev-seat
и установленный desktop-клиент; удалённый сервер отпадёт, пока нашего клиента нет
в каталоге Figma.

## Если включать локальный сервер потом

1. Установить Figma desktop, открыть файл, `Shift+D` (Dev Mode).
2. В правой панели → MCP server → **Enable desktop MCP server**.
3. Добавить в `~/.omp/agent/mcp.json`:

```json
"figma-desktop": {
  "type": "http",
  "url": "http://127.0.0.1:3845/mcp"
}
```

4. В настройках сервера выбрать **Download assets**, чтобы картинки скачивались
   в проект, а не отдавались ссылками на localhost.

## Пока MCP нет — как тянуть макет через REST

```bash
set -a && . ./.env.local && set +a

# дерево слоёв (когда лимит спадёт)
curl -H "X-Figma-Token: $FIGMA_TOKEN" \
  "https://api.figma.com/v1/files/0Juy3YhdvAU4IML7d2gyh2?depth=2"

# экспорт конкретного узла в PNG @2x
curl -H "X-Figma-Token: $FIGMA_TOKEN" \
  "https://api.figma.com/v1/images/0Juy3YhdvAU4IML7d2gyh2?ids=464:3570&format=png&scale=2"
```

Файл: `0Juy3YhdvAU4IML7d2gyh2` (AUTODNA).
