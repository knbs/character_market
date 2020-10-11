FROM php:7.4-apache
RUN apt-get update && apt-get upgrade -y && apt-get install -y git
RUN apt-get install -y libzip-dev zip && docker-php-ext-install zip
RUN apt-get install -y nodejs npm
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
RUN a2enmod rewrite
RUN a2enmod headers
RUN service apache2 restart
RUN mkdir /var/www/.composer
RUN chown 1001:1002 /var/www/.composer
RUN mkdir /var/www/.npm
RUN chown 1001:1002 /var/www/.npm
RUN usermod -u 1001 www-data
RUN groupmod -g 1002 www-data

