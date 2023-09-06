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
# 'mysql-client' so we can log into mysql from the PHP container with the command 'mysql -h mysql -u root -p' where mysql is the service name
RUN apt-get update \
    && apt-get install -y libssl-dev wget git unzip default-mysql-client

RUN pecl apt update \
    && apt install libzip-dev -y \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Required for MySQL to work in PHP
RUN docker-php-ext-install mysqli && \
    docker-php-ext-install pdo_mysql

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
&&  docker-php-ext-enable redis \
&&  docker-php-ext-enable pdo_mysql

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

# our repo is in var/www/htdoc
# COPY init_repo.sh /var/www/htdoc/

# Set the working directory in the container
WORKDIR /var/www/htdoc

# start out script that runs composer install, but ONLY if /vendor/ does not exist
# WARNING: the commands below crash CodeSpaces. Not using for now.
#RUN chmod +x /var/www/htdoc/init_repo.sh
#ENTRYPOINT ["/var/www/htdoc/init_repo.sh"]