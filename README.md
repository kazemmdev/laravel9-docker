
* composer require laravel/sanctum
* run composer update
* Generate your application encryption key using `php artisan key:generate`.
* php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
* php artisan migrate
    * yes create it
* run ./vendor/bin/sail up
