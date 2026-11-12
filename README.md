# Food donation and logistics platform

A Laravel 9 application with user/admin workflows for restaurants, associations, beneficiaries, donations, products, stock, deliveries and events. The repository includes Blade views, controllers, routes and database migrations.

An academic application in Ameni Ben Saada’s public learning history. Its features describe the repository as a whole; they are not claims that every component was implemented individually by Ameni. [Current portfolio and project contributions](https://amenibensaada.tn/?utm_source=github&utm_medium=profile&utm_campaign=personal_brand).

## Explore the application

- `routes/web.php`: authentication and user/admin route groups.
- `app/Http/Controllers`: donation, logistics, partner and management workflows.
- `resources/views`: Blade interfaces for the domain workflows.
- `database/migrations`: schema definitions.

## Development setup

Use a PHP 8 toolchain and database compatible with the locked Laravel 9 dependencies, Composer, Node.js and npm. Copy `.env.example` and set your local database configuration before migrating.

```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm ci
npm run dev
php artisan serve
```

Open the URL printed by Artisan. Use `php artisan test` to run the repository’s available PHPUnit tests; no comprehensive workflow coverage is claimed. Historical dependencies and environment-specific route/import casing should be reviewed when setting up on Linux. These instructions describe the development workflow; no current public demo is advertised.

## Status and attribution

Academic reference application, with a historical Laravel dependency baseline. A production deployment requires a separate compatibility, access-control and security review. Laravel and the included frontend assets retain their original copyright/license notices; the framework credits are available in dependency metadata. This README describes the application rather than the Laravel framework itself.
