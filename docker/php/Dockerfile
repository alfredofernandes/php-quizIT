FROM php:7.1-apache

RUN apt-get update && \
    apt-get dist-upgrade -y && \
    apt-get install -y \
            libsqlite3-dev \
            sqlite3 \
            git


RUN docker-php-ext-install mysqli \
 && docker-php-ext-install pdo \
 && docker-php-ext-install pdo_mysql \
 && docker-php-ext-install pdo_sqlite \
 && docker-php-ext-install json


RUN a2enmod rewrite

# Install Composer and make it available in the PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

VOLUME ["/var/www/html"]
WORKDIR /var/www/html

EXPOSE 80
