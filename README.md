# Legolas

"Membership Management for HackerspaceSG"

### Specifications
[wiki/specifications](https://github.com/hackerspacesg/members-accounting/wiki/specifications)

## Initial Setup

Steps to get you started:

1. Install PHP 5.4 with `mcrypt` and `phpunit`
2. Install [composer](https://getcomposer.org/doc/00-intro.md#installation-nix)
3. Then run `composer install` in the project root folder
4. Setup initial database `app/database/production.sqlite`:

    ```bash
    php artisan migrate:install
    php artisan migrate
```
5. Ensure all tests are running smoothly

    ```bash
    phpunit
```
or if you prefer to use `composer`'s phpunit

    ```bash
    vendor/bin/phpunit
```

6. Start server

    ```bash
    php artisan serve
```
