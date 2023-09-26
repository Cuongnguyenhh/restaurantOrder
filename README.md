1. ~composer install.
2. ~cp .env.example .env
3. ~php artisan key:generate
4. ~php artisan migrate
5.~php artisan db:seed --class=storesSeeder

now you can run this with php artisan serve.