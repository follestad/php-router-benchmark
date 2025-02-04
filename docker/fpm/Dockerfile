FROM php:8.4-fpm-alpine

# Install necessary PHP extensions
RUN docker-php-ext-install opcache

# Copy the custom php.ini configuration file from the local directory to the container
COPY ./docker/fpm/php.ini /usr/local/etc/php/conf.d/zz-custom-fpm-php.ini

# Set working directory
WORKDIR /code

EXPOSE 9000

CMD php-fpm
