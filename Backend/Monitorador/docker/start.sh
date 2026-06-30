#!/bin/sh
set -e

composer install --no-interaction --prefer-dist --optimize-autoloader
chmod -R 775 storage bootstrap/cache
php artisan migrate --force
php artisan db:seed --force
php artisan serve --host=0.0.0.0 --port=8000