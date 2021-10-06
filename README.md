### BugTracker


Aplikacia zamerana na sledovanie a trackovanie bugov, primarne vytvorená na predmet "Tímový projekt"

Inštalácia
```
git clone git@github.com:dhrinkino/bugtracker.git
composer install
cp .env.example .env / copy .env.example .env
php artisan migrate:fresh
php artisan db:seed --class Roles
php artisan db:seed --class AdminUser
php artisan serve
```
PS: je potrebne vygenerovat aj kluc

Defaultný používateľ je ```administrator@no-reply``` a heslo ```password```
