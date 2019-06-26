FROM php:7.3.6-apache
RUN apt-get update && apt-get install -y \
  && docker-php-ext-install pdo_mysql mysqli \
  && apt-get clean
WORKDIR /var/www/html

