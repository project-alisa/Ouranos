# Ouranos
The next generation websystem for Million Live Portal

## Setup
```
composer install

# Generate APP_KEY
php artisan key:generate

# Fill .env
cp .env.example .env && nano .env

# Laravel-admin install
php artisan admin:install

# Deploy background,tachie and icon image files
cp -r /path/to/images ./public/image
```

たぶんこれでいいはず
