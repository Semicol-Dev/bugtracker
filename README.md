### BugTracker


Aplikacia zamerana na sledovanie a trackovanie bugov, primarne vytvorená na predmet "Tímový projekt"

### Inštalácia

Stiahnutie repozitára
```
git clone https://github.com/Semicol-Dev/bugtracker.git
```

Inštalácia závislostí 
```
composer install
```

Vytvorenie .env súboru.
```
cp .env.example .env # Mac/UNIX/Linux
copy .env.example .env # Windows
```
V .env súbore je potrebné definovať databázový systém, databázu, používateľa a hesla!

Naplnenie databázy údajmi
```
php artisan migrate:fresh
php artisan db:seed --class Roles
php artisan db:seed --class AdminUser
```

Vygenerovanie kľúču pre Laravel aplikáciu
```
php artisan key:generate
```

Spustenie interného webového servera. V prípade nasadenia do produkcie prosím použite plnohodnotný webový server ako je NGINX alebo Apache. 
```
php artisan serve
```


Predvolený používateľ je ```administrator@no-reply``` a heslo ```password```
