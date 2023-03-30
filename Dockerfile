FROM bitnami/laravel:10.0.4
COPY ./ /app/

RUN composer install
RUN composer require aerni/laravel-spotify
RUN php artisan vendor:publish --provider="Aerni\Spotify\Providers\SpotifyServiceProvider"
RUN php artisan key:generate

EXPOSE 8000
CMD ["php", "artisan","serve", "--port=8000", "--host=0.0.0.0"]
