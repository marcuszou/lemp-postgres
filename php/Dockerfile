FROM php:8.2-fpm

# Installing dependencies for the PHP modules
RUN apt-get update
RUN apt-get install -y curl nano libbz2-dev libzip-dev libcurl3-dev libfreetype6-dev libssl-dev libjpeg62-turbo-dev libpng-dev libonig-dev libxml2-dev libpq-dev
# libonig-dev is needed for oniguruma which is needed for mbstring

# Installing additional PHP modules
RUN docker-php-ext-install curl gd mbstring pdo pgsql pdo_pgsql xml zip

# Install and configure ImageMagick
RUN apt-get install -y libmagickwand-dev
RUN pecl install imagick xdebug
RUN docker-php-ext-enable imagick xdebug
RUN apt-get purge -y libmagickwand-dev

# Install Composer so it's available
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
