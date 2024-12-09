# Gunakan base image untuk production
FROM php:8.2-apache

# Install ekstensi PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    zip \
    && a2enmod rewrite

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Salin composer.json dan composer.lock terlebih dahulu
COPY composer.json composer.lock ./

# Salin semua file proyek
COPY . .

# Salin file proyek ke folder yang benar
COPY . /var/www/html

# Ubah document root ke folder public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set permission untuk Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Jalankan optimasi Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Set permission
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80

CMD ["apache2-foreground"]
