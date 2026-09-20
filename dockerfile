FROM php:8.4-fpm-alpine

# 1. Instalar dependencias del sistema y compilar extensiones PHP
#    Todo en un solo RUN para que las libs de compilación se eliminen después
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

# 2. Configurar Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

COPY docker/supervisord.conf /etc/supervisord.conf

# 3. Configurar PHP-FPM para escuchar en 0.0.0.0:9000
RUN echo "listen = 0.0.0.0:9000" >> /usr/local/etc/php-fpm.d/zz-docker.conf

# 4. Copiar el proyecto Laravel
COPY . /var/www/html
WORKDIR /var/www/html

# 5. Instalar dependencias de producción de Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 6. Dar permisos a storage y bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
