FROM php:8.0.3-apache
RUN apt-get update
RUN apt-get install -y zip unzip libzip-dev libpng-dev
RUN docker-php-ext-install mysqli pdo_mysql gd zip