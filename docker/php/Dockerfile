FROM php:8.2-fpm

# Instalacja systemowych paczek i rozszerzeń PHP
RUN apt-get update && apt-get install -y \
    git zip unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalacja Composera
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalacja Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Ustawienie katalogu roboczego
WORKDIR /var/www/html

# Dodanie skryptu startowego
COPY ./entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Domyślny entrypoint
ENTRYPOINT ["entrypoint.sh"]

# Domyślna komenda
CMD ["php-fpm"]
