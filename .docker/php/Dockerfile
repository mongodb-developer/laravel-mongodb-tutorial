# defined in docker-compose.yml, from docker-env.env
ARG RUNTIME_PHP_IMAGE

# Use the specified image as the base
FROM ${RUNTIME_PHP_IMAGE}

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Test if already installed and
# install the <latest> mongodb PHP extension
# RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN bash -c '[[ -n "$(pecl list | grep mongodb)" ]]\
 || (pecl install mongodb && docker-php-ext-enable mongodb)'

# Test if already installed and
# install and enable XDEBUG <latest>
# RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN bash -c '[[ -n "$(pecl list | grep xdebug)" ]]\
 || (pecl install xdebug && docker-php-ext-enable xdebug)'
# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/htdoc