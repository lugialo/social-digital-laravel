FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    sqlite \
    sqlite-dev \
    nodejs \
    npm \
    unzip \
    autoconf \
    g++ \
    make \
    linux-headers \
    && docker-php-ext-install pdo_sqlite \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del autoconf g++ make linux-headers

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
CMD ["php-fpm"]
