FROM php:7.2-apache

RUN pecl install xdebug-2.6.0
RUN docker-php-ext-enable xdebug

RUN pecl install redis-4.0.1
RUN docker-php-ext-enable redis

ENV REDIS_HOST redis