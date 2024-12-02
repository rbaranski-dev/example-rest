#!/bin/sh

composer install

cp -f .env.example .env

./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate

./vendor/bin/sail artisan test