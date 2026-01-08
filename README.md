# WEMA Onboarding Portal (Demo)

Mock Onboarding/Lernportal für eine Demo: modernes Dashboard mit Modulen, ein Mock-Login (nur Name) und ein ausgearbeitetes Modul **„Grundlagen & Compliance“** inkl. Fortschritt und HeyGen-Embeds (per `iframe`).

## Quickstart

Voraussetzungen: PHP 8.2+, Composer, Node.js/NPM.

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate

# Terminal 1
npm run dev

# Terminal 2
php artisan serve
```

Dann im Browser öffnen: `http://127.0.0.1:8000`

## Deploy auf Railway

- Build/Deploy ist via `nixpacks.toml` vorbereitet (Composer + Vite Build + DB-Migration).
- Wichtig hinter Reverse-Proxy (Railway): damit CSS/JS korrekt per HTTPS geladen werden, müssen `X-Forwarded-*` Header vertraut werden (siehe `bootstrap/app.php`).
- Railway ENV: Booleans/`null` ohne Anführungszeichen setzen (z.B. `APP_DEBUG=false`, `LOG_DEPRECATIONS_CHANNEL=null`, `SESSION_DOMAIN=null`).

## HeyGen einbinden

Trage die Embed-URLs in `.env` ein:

```env
HEYGEN_VIDEO_URL="https://..."
HEYGEN_AVATAR_URL="https://..."
```

## LiveAvatar einbinden

Der FAQ-/Buddy-Bereich nutzt einen LiveAvatar `iframe`. Optional in `.env` setzen:

```env
LIVEAVATAR_URL="https://embed.liveavatar.com/v1/..."
```

## Lokale Videos (Demo)

MP4-Dateien können unter `public/videos/` liegen und werden in `config/onboarding.php` referenziert.

## Inhalte anpassen

Module & Lessons liegen in `config/onboarding.php`.

## Wie Fortschritt funktioniert

Fortschritt (erledigte Lessons) wird in der Session gespeichert (kein DB-Setup nötig).
