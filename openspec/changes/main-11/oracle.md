# Oracle verdict (Connect lane, API session)

Verdict: ACCEPT
Date: 2026-10-27. Builder self-check.
- API live on new key 4fPUI...: /files 200, /images 200, /nodes 404 (CLI fallback added, 7/7).
- API render == main.png (diff 0.6): sources current.
- Hero geometry pixel-exact (logo/burger/trip/word/subs/quote per API).
- Subs per API (tracking -0.8px, true gradient): zone 44.9 -> 40.7.
- Exact-blur ground attempt failed in browser (27.1), reverted; approximation kept.
- Hero vs API: 22.1. 0 errors.

ACCEPT — API connected, truth applied where the browser can reproduce it.
