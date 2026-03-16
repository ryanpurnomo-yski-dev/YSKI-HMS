#!/usr/bin/env sh
set -e

if [ -f /var/www/artisan ]; then
  mkdir -p \
  /var/www/storage/framework/cache \
  /var/www/storage/framework/sessions \
  /var/www/storage/framework/views \
  /var/www/storage/logs \
  /var/www/storage /var/www/bootstrap/cache
  
  chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache || true
fi

if [ -f /etc/nginx/http.d/default.conf.template ]; then
  PORT="${PORT:-10000}"
  sed "s/__PORT__/${PORT}/g" /etc/nginx/http.d/default.conf.template > /etc/nginx/http.d/default.conf
fi

exec "$@"
