FROM php:7.4-fpm

RUN apt-get update && apt-get install -y --allow-unauthenticated \
    gnupg \
    libcurl4-openssl-dev \
    libzip-dev \
    git \
    sendmail \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install tokenizer \
    && docker-php-ext-install curl \
    && docker-php-ext-install zip;

RUN cd ~ \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer;

WORKDIR /usr/share/nginx/html
