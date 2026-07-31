FROM php:8.3-cli

# Dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    zip \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql zip

WORKDIR /var/www

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier le projet
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Installer les dépendances Node et compiler les assets
RUN npm install
RUN npm run build

# Optimiser Laravel
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=$PORT