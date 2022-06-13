#
# Build Composer Base Image
#
FROM composer as composer

# Local proxy config (remove for server deployment)
# ENV http_proxy=http://198.161.14.25:8080

ENV COMPOSER_MEMORY_LIMIT=-1

WORKDIR /app
COPY . /app

RUN composer update --ignore-platform-reqs
RUN composer require kalnoy/nestedset --ignore-platform-reqs
RUN composer require doctrine/dbal --ignore-platform-reqs
RUN composer require awobaz/compoships --ignore-platform-reqs
RUN chgrp -R 0 /app && \
    chmod -R g=u /app

#
# Build Server Deployment Image
#
FROM php:8.0-apache

# Local proxy config (remove for server deployment)
# ENV http_proxy=http://198.161.14.25:8080

RUN apt-get update -y && apt -y upgrade && apt-get install -y \
    openssl

RUN apt-get install -y \
    ssh-client \
    zip \
    unzip

RUN echo '\
  opcache.interned_strings_buffer=16\n\
  opcache.load_comments=Off\n\
  opcache.max_accelerated_files=16000\n\
  opcache.save_comments=Off\n\
  ' >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

RUN echo "deb https://packages.sury.org/php/ buster main" | tee /etc/apt/sources.list.d/php.list
RUN docker-php-ext-install pdo pdo_mysql opcache

USER root

COPY --chown=www-data:www-data --from=composer /app /var/www/html

# Copy Server Config files (Apache / PHP)
COPY --chown=www-data:www-data server_files/apache2.conf /etc/apache2/apache2.conf
COPY --chown=www-data:www-data server_files/ports.conf /etc/apache2/ports.conf
COPY --chown=www-data:www-data server_files/.htaccess /var/www/html/public/.htaccess
COPY --chown=www-data:www-data server_files/php.ini /usr/local/etc/php/php.ini
COPY --chown=www-data:www-data server_files/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY --chown=www-data:www-data server_files/mods-enabled/expires.load /etc/apache2/mods-enabled/expires.load
COPY --chown=www-data:www-data server_files/mods-enabled/headers.load /etc/apache2/mods-enabled/headers.load
COPY --chown=www-data:www-data server_files/mods-enabled/rewrite.load /etc/apache2/mods-enabled/rewrite.load

EXPOSE 8000

ENTRYPOINT ["apachectl", "-D", "FOREGROUND"]
