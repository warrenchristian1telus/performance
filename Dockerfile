FROM php:8.0-apache

COPY --chown=www-data:www-data server_files/apache2.conf /etc/apache2/apache2.conf
COPY --chown=www-data:www-data server_files/index.php /var/www/html/public/index.php
