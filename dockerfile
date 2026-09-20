# Usa la imagen base oficial de Render que ya trae Nginx y PHP-FPM
FROM richarvey/nginx-php-fpm:latest

# Copia tu código de Laravel al directorio de trabajo estándar
COPY . /var/www/html

# Asegura que se instalen las dependencias de producción
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configuración para el contenedor
EXPOSE 80

ENTRYPOINT ["./docker-entrypoint.sh"]
CMD ["/start.sh"] # Este es el comando por defecto de la imagen richarvey
