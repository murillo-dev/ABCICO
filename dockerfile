# ---------- ETAPA 1: Build de assets con Node ----------
FROM node:20-alpine AS assets
WORKDIR /build
COPY package.json package-lock.json* ./
RUN npm ci --no-audit --no-fund
COPY . .
RUN npm run build

# ---------- ETAPA 2: PHP ----------
FROM php:8.4-fpm-alpine

# 1. Instalar dependencias del sistema y extensiones PHP
RUN apk add --no-cache --virtual .build-deps \
        postgresql-dev \
        libzip-dev \
        build-base \
        autoconf \
    && apk add --no-cache \
        nginx \
        supervisor \
        libpq \
        libzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql bcmath zip \
    && apk del .build-deps

# 2. Configurar Nginx y Supervisor
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf

# 3. PHP-FPM en 0.0.0.0:9000
RUN echo "listen = 0.0.0.0:9000" >> /usr/local/etc/php-fpm.d/zz-docker.conf

# 4. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Copiar el proyecto Laravel
COPY . /var/www/html
WORKDIR /var/www/html

# 6. Copiar los assets compilados desde la etapa 1 👇
COPY --from=assets /build/public/build /var/www/html/public/build

# 7. Dependencias de producción
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 8. Permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
