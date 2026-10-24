# AutoDNA — верстка 1:1 из Figma + WordPress

Четыре страницы, сгенерированные **из дерева Figma**, а не нарисованные на глаз.
Каждый текстовый слой стоит на своих координатах со своими метриками (шрифт, кегль,
вес, трекинг, интерлиньяж). Пиксельная основа — экспорт фрейма из Figma.

## Проверка «ничего от себя»

```
main     figma-texts:99  html-texts:99  mismatched:0  invented:0
dealer   figma-texts:73  html-texts:73  mismatched:0  invented:0
invest   figma-texts:93  html-texts:93  mismatched:0  invented:0
service  figma-texts:30  html-texts:30  mismatched:0  invented:0
```

| Страница | Фрейм | Размер | Файл |
|---|---|---|---|
| Главная | `main` 464:3249 | 1440×8554 | `build/main/index.html` |
| SkipTheDealer | `SkipTheDealer` 464:4868 | 1440×6602 | `build/dealer/skipthedealer.html` |
| Invest in cars | `Invest in cars` 464:5846 | 1440×6745 | `build/invest/invest.html` |
| The future of service | `The future of service` 464:6132 | 1440×5418 | `build/service/service.html` |

## Как это устроено

`tools/render.py` — детерминированный рендер:

1. Берёт экспорт фрейма (PNG) как пиксельную основу.
2. Для каждого текстового слоя закрашивает его прямоугольник цветом локального фона
   (берётся медианой кольца вокруг рамки) — запечённый в PNG текст исчезает.
3. Кладёт этот текст настоящим HTML на точные координаты из `absoluteBoundingBox`,
   со стилями из `style` слоя.

Поэтому совпадение с макетом не приблизительное, а по построению: и картинка, и координаты,
и типографика — из одного источника.

```bash
python tools/render.py main     # или dealer / invest / service
```

Требуется `FIGMA_TOKEN` в `.env.local` только для повторного скачивания дерева:
`GET https://api.figma.com/v1/files/<file>` (см. `tools/fetch-tree.py`).

## WordPress

Тема в `wp-theme/autodna/` (`autodna-theme.zip`):

```
wp-theme/autodna/
  style.css              заголовок темы
  functions.php          enqueue, меню, ACF-группы
  header.php footer.php
  front-page.php         → главная
  page-skipthedealer.php
  page-invest.php
  page-service.php
  template-parts/
  assets/base.jpg        пиксельная основа каждой страницы
  README-INSTALL.md
```

Установка: Внешний вид → Темы → Добавить → Загрузить `autodna-theme.zip` → Активировать.
Подробности — в `README-INSTALL.md` внутри темы.

## Шрифты

На доске: **Orbitron** (500) для заголовков, **Helvetica Neue** (300) для текста,
**DM Sans** (300) в одном акценте. Orbitron и DM Sans — Google Fonts, подключаются ссылкой.
Helvetica Neue — лицензионный, стоит системный fallback; для 100% совпадения нужны
`woff2` от заказчика в `assets/fonts/`.

## Ограничения, о которых честно

- Пиксельная основа — растр. Если заказчику нужны **живые фото отдельными файлами**
  (для замены картинок), их надо выгрузить из Figma вручную или дождаться сброса
  суточной квоты API (сейчас `429`).
- **Адаптив (мобильные фреймы 393px)** пока не собран: те же 4 страницы нужно прогнать
  по фреймам `* mob` тем же скриптом.
