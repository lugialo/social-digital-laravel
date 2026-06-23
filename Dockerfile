FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    sqlite \
    sqlite-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

CMD ["php-fpm"]
