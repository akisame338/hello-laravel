FROM php:8.2.7-fpm

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install -y zip unzip

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer global require laravel/installer
