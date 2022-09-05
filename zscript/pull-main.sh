#!/bin/bash

cd /home/icyarena/dev.icyarena.com
git checkout storage
git reset --hard
git fetch --all
git pull

echo "Running Composer Commands"
composer install
composer update
composer dump-autoload

echo "Running Artisan Commands"
php artisan migrate --force
php artisan db:seed --force

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

php artisan storage:link

mkdir -p storage/log
chmod 777 -R storage
chmod 777 -R bootstrap/cache
