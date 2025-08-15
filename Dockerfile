FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev  # Ajouter cette ligne pour oniguruma

# Installer les extensions PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier les fichiers du projet
COPY . .

# Installer les dépendances PHP
RUN composer install --no-scripts --no-interaction

# Configurer les permissions
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage

# Exposer le port
EXPOSE 9000

CMD ["php-fpm"]