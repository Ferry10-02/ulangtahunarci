#!/bin/sh
set -eu

PORT="${PORT:-10000}"

sed -i "s/^Listen 80$/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf
sed -i "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf

php artisan config:clear
php artisan route:cache
php artisan view:cache

exec apache2-foreground
