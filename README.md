# Elden Ring Community Website

Een community website voor Elden Ring fans, gebouwd met Laravel 11 en Tailwind CSS.

## Features

-  Nieuws artikelen met comments
-  Boss database met moeilijkheidsgraad indicators
-  FAQ systeem met categorieën
-  Favoriete bosses (Many-to-Many relatie)
-  User authenticatie met admin panel
-  Comment systeem op nieuws
-  Contact formulier

## Technische Requirements

- PHP 8.2 of hoger
- Composer
- MySQL/SQLite database
- Node.js & NPM

## Installatie Instructies

### 1. Clone de repository
```bash
git clone <jouw-github-url>
cd eldenring_site
```

### 2. Installeer dependencies
```bash
composer install
npm install
```

### 3. Environment configuratie

Kopieer `.env.example` naar `.env`:
```bash
cp .env.example .env
```

Genereer application key:
```bash
php artisan key:generate
```

### 4. Database configuratie

Open `.env` en configureer je database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eldenring_site
DB_USERNAME=root
DB_PASSWORD=
```

Voor SQLite (simpeler):
```env
DB_CONNECTION=sqlite
```

En maak een leeg database bestand:
```bash
touch database/database.sqlite
```

### 5. Run migrations en seeders
```bash
php artisan migrate:fresh --seed
```

Dit creëert:
- Admin user: `admin@ehb.be` / `Password!321`
- Test nieuws artikelen
- Boss data
- FAQ items en categorieën

### 6. Storage link
```bash
php artisan storage:link
```

### 7. Start de development server
```bash
php artisan serve
```

Bezoek: `http://localhost:8000`

## Test Accounts

### Admin Account (vereist)
- **Email:** admin@ehb.be
- **Password:** Password!321

### Test Users
- **Email:** test@test.com / **Password:** password
- **Email:** john@test.com / **Password:** password

## Project Structuur

- **Models:** User, News, Boss, Faq, FaqCategory, Comment
- **Controllers:** Admin controllers voor CRUD operaties
- **Views:** Blade templates met Tailwind CSS
- **Middleware:** Auth en Admin middleware
- **Seeders:** Database seeders voor test data

## Relaties

### One-to-Many
- User → News (één user, meerdere nieuws artikelen)
- User → Comments (één user, meerdere comments)
- News → Comments (één nieuws artikel, meerdere comments)
- FaqCategory → Faqs (één categorie, meerdere FAQs)

### Many-to-Many
- User ↔ Boss (favoriete bosses via pivot table `boss_user`)

## Bronvermelding

- **Laravel Framework:** https://laravel.com
- **Tailwind CSS:** https://tailwindcss.com
- **Elden Ring Content:** FromSoftware / Bandai Namco
- **Google Fonts (Cinzel):** https://fonts.google.com
- **Boss afbeeldingen:** Elden Ring Wiki / FromSoftware
- **Inspiratie design:** Elden Ring game UI
- **extra's:** claude.ai/chatgpt
- **laatste check:** https://gemini.google.com/share/b3981aaff0fb
## Ontwikkelaar

- **Naam:** Arnaud Raspe
- **School:** Erasmushogeschool Brussel
- **Vak:** backend web
- **Jaar:** 2024-2025

## Licentie

Dit is een educatief project. Elden Ring is eigendom van FromSoftware en Bandai Namco Entertainment.
