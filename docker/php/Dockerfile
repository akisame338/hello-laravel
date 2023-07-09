FROM php:8.2.7-fpm

# see: https://yaruki-strong-zero.hatenablog.jp/entry/docker_container_uid_gid
ARG USERNAME=app
ARG GROUPNAME=app
ARG UID=1000
ARG GID=1000
RUN groupadd -g ${GID} ${GROUPNAME} && \
    useradd -m -s /bin/bash -u ${UID} -g ${GID} ${USERNAME}

RUN apt-get update && \
    apt-get install -y zip unzip

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

USER ${USERNAME}

RUN composer global require laravel/installer

WORKDIR /var/www/html
