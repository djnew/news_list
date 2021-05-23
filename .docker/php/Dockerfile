FROM php:7.4-fpm


ADD ./.docker/php/php.ini /etc/php/7.4/fpm/conf.d/90-php.ini
ADD ./.docker/php/php.ini /etc/php/7.4/cli/conf.d/90-php.ini
RUN apt-get update \
    && apt-get install -y --no-install-recommends apt-utils
RUN apt-get install -y curl \
            zip \
            libzip-dev \
            libpng-dev \
            openssl \
            libpq-dev \
            jpegoptim optipng pngquant gifsicle \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure sockets \
    && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache \
    && docker-php-ext-install \
        pgsql \
        pdo_pgsql \
        zip \
        exif \
        pcntl \
        gd \
        sockets \
        zip \
    && pecl install redis \
    && docker-php-ext-enable redis sockets
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN usermod -u 1000 www-data
#RUN composer install

WORKDIR "/var/www"

EXPOSE 9000
