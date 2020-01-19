# Figured Starter

This is a starter for Laravel, running under Docker with MongoDB.
 
## Get started

To run, you need docker and docker compose & to be able to run bash scripts.  

a) cd to the working project directory and run

    ./start-app.sh

b) once all docker images are downloaded and initialised 

    ./init-app.sh

Wait for composer, yarn and Mongo setup to complete.

Then you just need to copy the `secret` from the `ouath_clients` table and paste it on the file:

    ./resources/js/pags/Auth/SignIn.vue

This will allow the client to make request to the BE, and also make sure the `client_id` matches the right record.

A basic laravel app should then be available at http://localhost:8080

## Running laravel commands

Because we are running under an image called app we have to use docker-compose exec. For example:

    docker-compose exec app php artisan key:generate 

## Running yarn

    docker-compose exec app yarn

## Running composer

    docker-compose exec app composer install
    
## Running tests

As above, we need to run tests using exec, E.g.

    docker-compose exec app ./vendor/bin/phpunit
