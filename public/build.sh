#!/bin/bash

echo "Starting Laravel build..."

composer install --no-dev --optimize-autoloader

php artisan config:clear
php artisan cache:clear
php artisan route:clear

echo "Build finished"