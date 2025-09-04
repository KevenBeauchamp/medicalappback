# Étape 1 : PHP + FPM
FROM php:8.2-fpm

# Installer extensions nécessaires
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libonig-dev libzip-dev zip curl \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copier les fichiers Laravel
COPY . .

# Installer dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Fixer permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exposer port
EXPOSE 10000

# Lancer Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
