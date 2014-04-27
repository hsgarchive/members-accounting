# Legolas

"Membership Management for HackerspaceSG"

### Specifications
[wiki/specifications](https://github.com/hackerspacesg/members-accounting/wiki/specifications)

## Initial Setup

Steps to get you started:

1. Install PHP 5.4
2. Install [mcrypt](http://coolestguidesontheplanet.com/install-mcrypt-php-mac-osx-10-9-mavericks-development-server/) and [composer](https://getcomposer.org/doc/00-intro.md#installation-nix)
3. In the project root folder, run

    ```bash
    composer install
```
4. Setup initial database:

    ```bash
    php artisan migrate:install
    php artisan migrate
```
5. Start server

    ```bash
    php -S localhost:4000 server.php
```

6. As for development purposes (so far), we are using sqlite. You may use [SQLite Manager (Firefox addon)](https://addons.mozilla.org/en-US/firefox/addon/sqlite-manager/) to view the database which should be located at: /app/database/production.sqlite 

Note: do not commit the production.sqlite file.
