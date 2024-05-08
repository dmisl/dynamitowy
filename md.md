Hi, I have a problem when dockerising a project with Laravel Reverb, I get the following error:
```
echo.js:6 WebSocket connection to 'ws://localhost:8080/app/vubkg9ccrgssnkjt7w6d?protocol=7&client=js&version=8.4.0-rc2&flash=false' failed: 
pusher-js.js?v=43d47d4c:3268 WebSocket connection to 'wss://localhost:8080/app/vubkg9ccrgssnkjt7w6d?protocol=7&client=js&version=8.4.0-rc2&flash=false' failed: 
```

Here are my docker files and env (php, mysql, nodejs work correctly, the problem is only with reverb)

.env
```
REVERB_APP_ID=590252
REVERB_APP_KEY=vubkg9ccrgssnkjt7w6d
REVERB_APP_SECRET=yimosrpuruwi2qkfzgy4
REVERB_HOST="localhost"
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
```
docker-compose.yml
```
version: "3.9"
services:
    php:
        build:
            context: .
            target: php
            args:
                - APP_ENV=${APP_ENV}
        environment:
            - APP_ENV=${APP_ENV}
            - CONTAINER_ROLE=app
        working_dir: /var/www
        volumes:
            - ./:/var/www
            - ./.env:/var/www/.env
        ports:
            - 8000:8000
        depends_on:
            - database
    # Database Server
    database:
        ---
    node:
        ---

volumes:
    db-data: ~
```
Dockerfile
```
FROM php:8.2 as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath
RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl

WORKDIR /var/www
COPY . .

COPY --from=composer:2.7.1 /usr/bin/composer /usr/bin/composer

ENV PORT=8000
ENTRYPOINT [ "docker/entrypoint.sh" ]
```
entrypoint.sh
```
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

php artisan key:generate
php artisan serve --port=$PORT --host=0.0.0.0 --env=.env

php artisan config:clear
php artisan migrate --seed

php artisan reverb:start

exec docker-php-entrypoint "$@"
```
Please help a beginner in this area, guides from the Internet do not help :(
