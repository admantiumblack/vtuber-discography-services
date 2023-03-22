FROM bitnami/laravel:10.0.4

WORKDIR /project

COPY . /project

RUN composer install

RUN cp .env.example .env

RUN php artisan key:generate

CMD ["php", "artisan","serve"]
