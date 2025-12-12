# copilot-instructions for GamersWay

Summary
- This repository is a minimal static website served from `c:\xampp\htdocs\gamersway` (root). The only present page is [index.html](index.html#L1).

What you should know
- Project type: plain HTML/CSS/JS static site (no build system, no package manager). Keep changes lightweight and browser-first.
- Serve/run: preview changes via a local Apache server (XAMPP). URL: `http://localhost/gamersway/`.
- Key file: [index.html](index.html#L1) is the canonical entrypoint.

Conventions & patterns discovered
- Single-page layout in repo root. New pages or assets should live under predictable folders: `css/`, `js/`, `images/`, or at root for simple pages.
- No bundlers or transpilers detected — ship plain, compatible browser JS/CSS. Prefer ES5/ES6 features that modern browsers support without build steps.

Developer workflows (explicit steps)
- Quick local preview:
  1. Start XAMPP (Apache).
  2. Open `http://localhost/gamersway/` in a browser.
- Debugging and logs:
  - Use browser DevTools for frontend debugging.
  - Apache logs (if needed) are in your XAMPP install, e.g. `C:\xampp\apache\logs\error.log`.

Guidance for AI code agents
- Keep edits minimal and file-scoped. There are no tests or build steps to update.
- When adding assets, create folders under repo root and update paths in [index.html](index.html#L1).
- Don't introduce complex toolchains (Webpack, npm) unless the user requests it explicitly — this project expects zero-install deployment.
- When asked to scaffold features, include a simple runnable example (HTML + small JS file) and instructions to preview via XAMPP.

Examples (how to add a script)
- Add `js/main.js` and include in [index.html](index.html#L1):

  <script src="js/main.js"></script>

Where to ask clarifying questions
- Confirm whether you want to introduce package tooling, automated deployments, or keep the repo strictly static.

Next steps for maintainers
- If you want CI, tests, or a frontend toolchain, state the preferred stack (npm, Vite, GitHub Pages, etc.) and the agent will propose a minimal migration plan.

If anything here is inaccurate or you have extra local workflows (custom Apache vhosts, database backends, external APIs), tell me and I will update this file.
