#!/bin/sh

set -e
cd /var/www/html

# Instalacja zależności przez Composer
if [ -f composer.json ]; then
    echo "📦 Instalowanie zależności..."
    composer install --no-interaction --prefer-dist
fi

exec "$@"
