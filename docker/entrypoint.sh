#!/bin/sh
set -e

if [ ! -f .env ]; then
    cp .env.example .env
fi

composer install --no-interaction --prefer-dist --no-progress

if ! grep -q "^APP_KEY=base64:" .env; then
    php artisan key:generate --force --no-ansi
fi

if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
fi

php artisan migrate --force

chmod -R 775 storage bootstrap/cache

exec "$@"
