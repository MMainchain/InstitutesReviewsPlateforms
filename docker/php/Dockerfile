FROM php:7.3.5-fpm

RUN apt-get update && apt-get install -y zlib1g-dev libpq-dev git libicu-dev libxml2-dev libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-configure mysqli \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-install zip xml

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Berlin /etc/localtime
RUN "date"

# Set user
ARG UID
RUN useradd --create-home --uid $UID user
USER user

WORKDIR /var/www/symfony