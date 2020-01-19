#!/usr/bin/env bash

cp .env.example .env
docker-compose exec app composer install
docker-compose exec app php artisan passport:install
docker-compose exec app yarn
docker exec -it mongodb mongo admin --eval "db.createUser({ user: 'user', pwd: 'pass', roles: [ { role: 'userAdminAnyDatabase', db: 'admin' } ] });"
