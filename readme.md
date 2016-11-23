# Laravel Chat

Laravel chat playing with Laravel Echo and redis.

## Build and run

    $ docker-compose build
    $ docket-compose up -d

## Develop

    $ docker-compose exec php sh
    # su laravel
    $ composer update
    $ php artisan migrate

## Environment

    APP_URL=...
    APP_KEY=...

    DB_CONNECTION=mysql
    BROADCAST_DRIVER=redis
    SESSION_DRIVER=redis
    QUEUE_DRIVER=redis

## Deploy

    vendor/bin/envoy run deploy
