FROM php:7.4-cli
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /home/app
WORKDIR /home/app

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
