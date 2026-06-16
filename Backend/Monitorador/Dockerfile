FROM php:8.4-cli

# System deps
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project
COPY . .

# Install PHP deps (needed for artisan during build)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Setup env
RUN cp .env.example .env \
    && php artisan key:generate

EXPOSE 8000

CMD sh -c "composer install --no-interaction --prefer-dist --optimize-autoloader && chmod -R 775 storage bootstrap/cache && php artisan serve --host=0.0.0.0 --port=8000"