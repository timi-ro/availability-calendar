FROM php:7.4-apache

##### Install required php extensions
RUN apt-get update && apt-get install -y \
        zlib1g-dev \
        libpng-dev \
        libzip-dev \
    && docker-php-ext-install -j$(nproc) gd zip pdo_mysql

##### PHP configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN sed -ri -e 's/memory_limit = [0-9]+[MG]/memory_limit = 512M/' "$PHP_INI_DIR/php.ini"

##### Set up Apache
COPY app.conf /etc/apache2/sites-available/app.conf
RUN a2ensite app \
    && a2dissite 000-default \
    && a2enmod rewrite

##### Add project files
COPY --chown=www-data:www-data . /app
WORKDIR /app

##### Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \ 
    && php -r "unlink('composer-setup.php');"

##### Install required dependencies
RUN php composer.phar install
