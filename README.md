# SwiftPOS marketing site (demo)

A small PHP + static asset landing page for a fictional POS product, structured for XAMPP on Windows.

## Structure

- `index.php` — Main page (hero, features, product, pricing, FAQ, contact).
- `process-contact.php` — Validates POST data, checks CSRF, logs submissions, optionally sends mail.
- `thank-you.html` — Shown after a successful form submit.
- `assets/css/style.css` — Layout and theme.
- `assets/js/main.js` — Mobile navigation and smooth in-page scrolling.
- `assets/images/pos-mockup.png` — Product visual.
- `assets/images/icons/*.svg` — Feature icons.

## Run locally

1. Place this folder under your web root (for example `htdocs/spm`).
2. Start Apache in XAMPP.
3. Open `http://localhost/spm/` (adjust the path if your document root differs).

## Contact form

- Submissions append to `data/contact-submissions.log` (the `data/` directory is created automatically).
- `process-contact.php` also attempts `mail()` to `hello@swiftpos.example`; configure `php.ini` / sendmail if you need real delivery.
- A honeypot field (`website`) and CSRF token reduce simple spam and forged posts.

## Customize

- Replace copy and colors in `index.php` and `assets/css/style.css`.
- Swap `assets/images/pos-mockup.png` for your own screenshot.
- Update email addresses and footer links to match your brand.
