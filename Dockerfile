FROM bitnami/laravel:10.0.4

WORKDIR /project

COPY . /project

RUN composer install

CMD ["php", "artisan","serve"]


