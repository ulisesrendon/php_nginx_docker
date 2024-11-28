FROM php:8-fpm

RUN apt-get update  && apt-get install -y \
    git \
    zip \
    cron \
    unzip \
    redis-tools \
    libmcrypt-dev \
    && apt-get install -y libicu-dev \
    && docker-php-ext-install intl \
    && docker-php-ext-enable intl \
    && docker-php-ext-install sockets \
    && docker-php-ext-enable sockets
#   && pecl install ds
RUN apt-get install -y libpq-dev \
&& docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
&& docker-php-ext-install pdo pdo_pgsql pdo_mysql pgsql mysqli

COPY --from=composer /usr/bin/composer /usr/bin/composer