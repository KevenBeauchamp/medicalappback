# Étape 1 : PHP + Composer
FROM php:8.2-fpm

# Installer extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier les fichiers Laravel
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Générer la clé Laravel
RUN php artisan key:generate

# Permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Lancer PHP-FPM
CMD ["php-fpm"]
