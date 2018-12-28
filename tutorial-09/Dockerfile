FROM php:7.2-apache

COPY ./src/index.php /var/www/html/index.php

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
