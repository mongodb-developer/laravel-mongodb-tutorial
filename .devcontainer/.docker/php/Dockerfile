# defined in docker-compose.yml, from docker-env.env
ARG RUNTIME_PHP_IMAGE

# Use the specified image as the base
FROM ${RUNTIME_PHP_IMAGE}

# create the log file and provide permission to the www-data user
RUN touch /tmp/xdebug.log && chown www-data:www-data /tmp/xdebug.log

# same thing for the PHP error log
RUN touch /var/log/php-errors.log && chown www-data:www-data /var/log/php-errors.log

# Update the packages
# Install system packages required for MongoDB extension
RUN apt-get update \
    && apt-get install -y libssl-dev wget git unzip 

RUN pecl apt update \
    && apt install libzip-dev -y \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Required for MySQL to work in PHP
RUN docker-php-ext-install mysqli

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

# install Redis PHP driver
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

# Task: copy rep's PHP .ini files to be automatically parsed
#
# directory is related to the PHP service context
# dot NOT use ./filename.ext for root files
#         use filename.ext
COPY docker-php.ini /usr/local/etc/php/conf.d/
COPY xdebug.ini /usr/local/etc/php/conf.d/

# Install Composer
# ----------------------------------------------------------
# download composer
RUN curl -sS https://getcomposer.org/installer | php
# copy composer to a place where it can be globally executed
RUN mv composer.phar /usr/local/bin/composer

# NOT REQUIRED
# Change to non-root privilege
# USER www-data

# Enable Error-logging in the PHP container
# ----------------------------------------------------------

# RUN echo "error_log = /var/log/php-fpm.log" >> /usr/local/etc/php-fpm.d/docker.conf

#RUN echo "php_admin_value[error_log] = /var/log/php-fpm/www-error.log" >> /usr/local/etc/php-fpm.d/www.conf && \
#    echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf && \
#    echo "catch_workers_output = yes" >> /usr/local/etc/php-fpm.d/www.conf

