FROM php:8-fpm

RUN apt-get update && apt-get install -y \
git \
zip \
cron \
unzip \
redis-tools \
libmcrypt-dev \
libicu-dev \
libpq-dev \
&& docker-php-ext-install intl sockets pdo pdo_pgsql pdo_mysql pgsql mysqli \
&& pecl install ds \
&& docker-php-ext-enable ds

COPY --from=composer /usr/bin/composer /usr/bin/composer