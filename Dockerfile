FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY vite.config.js postcss.config.js tailwind.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm run build

FROM composer:2 AS dependencies

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

FROM php:8.3-apache

WORKDIR /var/www/html

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev libxml2-dev libzip-dev unzip \
    && docker-php-ext-install mbstring pdo pdo_mysql xml zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY . ./
COPY --from=dependencies /app/vendor ./vendor
COPY --from=frontend /app/public/build ./public/build

RUN composer dump-autoload --no-dev --optimize \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod +x scripts/start.sh

EXPOSE 10000

CMD ["./scripts/start.sh"]
