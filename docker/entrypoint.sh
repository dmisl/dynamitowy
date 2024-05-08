#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "creating env"
    cp .env.example .env
else
    echo "exists env"
fi

php artisan config:clear
php artisan migrate --seed

php artisan key:generate
php artisan serve --port=$PORT --host=0.0.0.0 --env=.env

exec docker-php-entrypoint "$@"
