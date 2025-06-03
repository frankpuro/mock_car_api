#!/bin/sh
chown -R www-data:www-data storage bootstrap/cache
composer install
npm install
sleep 20
php artisan migrate --force
php artisan db:seed --class=VeiculoSeeder
php-fpm &
php artisan serve --host=0.0.0.0 --port=80
