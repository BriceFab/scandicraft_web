REM Installation des vendor
composer install --no-dev --optimize-autoloader

REM Build des assets
npm run build
+ upload dans le dossier public/build

REM Mise à jour de la base de données
php bin/console doctrine:migrations:migrate
php bin/console make:migration
php bin/console doctrine:migrations:migrate

REM Clear le cache
APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear
