#!/bin/sh
set -e

echo "Preparing storage..."
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/storage/logs
touch /var/www/html/database/database.sqlite 2>/dev/null || true
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

# Esperar a que la base de datos esté lista (con reintentos)
echo "Waiting for database..."
until php artisan migrate --force; do
  echo "Database not ready yet, retrying in 5 seconds..."
  sleep 5
done
echo "Migrations completed!"

exec "$@"
