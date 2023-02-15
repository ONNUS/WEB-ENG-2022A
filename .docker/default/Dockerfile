# PHP Apache Server
FROM php:8.1-apache

# Install Packages
# RUN apt-get update && \
#     apt-get install \
#     git \
#     -y --no-install0recommends

# Install PHP Extensions
# RUN docker-php-ext-install zip pdo_mysql

# RUN pecl install -o -f xbebug-3.1.3 \
#   && rm -rf /tmp/pear

RUN a2enmod rewrite

RUN apt-get update && \ 
    apt-get upgrade -y

RUN service apache2 restart

# RUN pecl install xdebug