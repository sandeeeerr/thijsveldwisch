#!/bin/bash
set -e

echo "Deployment started ..."

# Onderhoudsmodus inschakelen
(php artisan down) || true

# Pull de laatste wijzigingen van de main branch
git pull origin main

# Composer dependencies installeren
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Cache opnieuw instellen
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Frontend assets compileren (indien nodig)
npm install
npm run prod

# Database migraties uitvoeren
php artisan migrate --force

# Onderhoudsmodus uitschakelen
php artisan up

echo "Deployment finished!"
