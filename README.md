# Installation

## Backend
- cd backend
- cp .env.example .env
- set DB connection to env file
- set VUE_APP_URL to env
- php artisan config:cache
- composer install
- php artisan key:generate
- php artisan migrate --seed
- php artisan serve

## Frontend

- cd frontend
- cp .env.example .env
- set config in env file
- npm install
- npm run serve
