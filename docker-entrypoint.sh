#!/usr/bin/env bash

# Activa el modo de parada inmediata si hay errores
set -e

# Crea los directorios de storage si no existen y da permisos
mkdir -p /var/www/html/storage/framework/{sessions,views,cache}
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ejecuta las tareas típicas de despliegue de Laravel
echo "Running composer..."
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

# Ejecuta el comando por defecto del contenedor (inicia Nginx y PHP-FPM)
exec "$@"
