#!/bin/sh
set -e

mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/storage/app/public

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

# Quita las migraciones de aquí — en el plan gratis la DB "duerme"
# y puede no estar lista. Las corres manual desde el Shell de Render:
# php artisan migrate --force

exec "$@"
