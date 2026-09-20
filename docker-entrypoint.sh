#!/bin/sh
set -e

mkdir -p /var/www/html/storage/framework/{sessions,views,cache}
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

exec "$@"
