FROM php:8.2-apache

WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Use the default development configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

ENV APACHE_DOCUMENT_ROOT /app/public_html

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy in composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Copy composer config
COPY composer.json .
COPY composer.lock .

# Install dependencies
RUN composer install

# Copy the src
COPY ./src .