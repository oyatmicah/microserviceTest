FROM php:8.0-cli

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install -y git zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json composer.lock ./
RUN composer install

COPY . .

EXPOSE 9000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
