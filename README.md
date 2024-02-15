# SETUP
- Run `composer require laravel/sanctum`
- Run `composer update`
- Generate your application encryption key using `php artisan key:generate`.
- Run `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"`
- Run `php artisan migrate`
  - Answer `yes` to create it
- Run `./vendor/bin/sail up`

- The app should now be up and running. If there are any issues, you may want to peek at the `.env` file.

# USING THE APP
- First, you can try to access cats and it will prompt you to register. This is the token-based auth it is waiting for.
- From there, you are able to see cats, vote on cats, and even see the most recent votes.

The way it works is essentially:
  - The cats and the votes are protected by token-based auth.
  - Once the token is authenticated, then the middleware will allow you through.
  - There is a service for the Cat API calls.
    - Votes are also part of this service.
  - The Cat controller takes care of routing and serves as the middleman between the Cat service and the views (UI).
  - The votes are cached with Laravel.
  - The votes are also protected by token auth.

# COMPLICATIONS
- Docker configuration with the database took up a huge amount of time.
- Weird issue in .env where in order to make migrations the host was set to `localhost` but when interacting with DB through ORM it would have to be set to `host.docker.internal`
- Lot of troubleshooting and Googling. You may notice in the gap in time.
