# WEMA Onboarding Portal (Demo)

Mock Onboarding/Lernportal für eine Demo: modernes Dashboard mit Modulen, ein Mock-Login (nur Name) und ein ausgearbeitetes Modul **„Grundlagen & Compliance“** inkl. Fortschritt und HeyGen-Embeds (per `iframe`).

## Quickstart

Voraussetzungen: PHP 8.2+, Composer, Node.js/NPM.

```bash
cd portal
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run dev
php artisan serve
```

Dann im Browser öffnen: `http://127.0.0.1:8000`

## HeyGen einbinden

Trage die Embed-URLs in `.env` ein:

```env
HEYGEN_VIDEO_URL="https://…"
HEYGEN_AVATAR_URL="https://…"
```

## Inhalte anpassen

Module & Lessons liegen in `config/onboarding.php`.

## Wie Fortschritt funktioniert

Fortschritt (erledigte Lessons) wird in der Session gespeichert (kein DB-Setup nötig).

