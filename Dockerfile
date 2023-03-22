FROM bitnami/laravel:10.0.4
COPY . /app

RUN composer install
RUN php artisan key:generate

CMD ["php", "artisan","serve"]
