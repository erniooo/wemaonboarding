# WEMA Onboarding Demo

Dieses Repo enthält eine kleine Demo-Lernplattform als Mock-Onboarding.

- PDF im Root: `Hallo, ich brauche ein paar Informationen zu folge.pdf`
- Laravel Portal: `portal/`

## Starten

```bash
cd portal
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run dev
php artisan serve
```

## HeyGen

Die HeyGen-Embeds werden über `.env` konfiguriert:

```env
HEYGEN_VIDEO_URL="https://…"
HEYGEN_AVATAR_URL="https://…"
```

