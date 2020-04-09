# API-Laravel

This is a API project for 'keiron'.
For detailed explanation on how things work, checkout [Laravel docs](https://laravel.com/docs/).

## How to use

Required:

-   php
-   mysql
-   composer

```bash
# init project
$ git clone https://github.com/Dpezz/test_keiro_api.git
$ cd test_keiro_api
$ composer install
$ cp .env.example .env
$ php artisan key:generate

# make migration and seeders
$ configure database .env
$ php artisan migrate
$ php artisan db:seed

# init passport
$ php artisan passport:install

# up server at localhost:8000
$ php artisan serve

```

start server [https://localhost:8000/api](https://localhost:8000/api)

## Authors

Developed by [Daniel Jara Pezzuoli](http://dpezz.me).
For help, please contact the [mail](mailto:jara.pezzuoli@gmail.com).

:-)
