# Legolas

"Membership Management for HackerspaceSG"

### Specifications
[wiki/specifications](https://github.com/hackerspacesg/members-accounting/wiki/specifications)

## Initial Setup

Currently, the system works on localhost. It should be accesible via http://localhost/public (unless you are using vhosts)

Steps to get you started:

0. For Mac system, compile MCrypt. Follow instructions here: http://coolestguidesontheplanet.com/install-mcrypt-php-mac-osx-10-9-mavericks-development-server/
1. Install PHP Composer: https://getcomposer.org/doc/00-intro.md#installation-nix
2. Install Laravel: http://laravel.com/docs/installation
3. Clone this repo.
4. Open terminal and change directory to the project root folder.
5. Setup initial database:

	```
    php artisan migrate:install
    php artisan migrate
```

6. As for development purposes (so far), we are using sqlite. You may use [SQLite Manager (Firefox addon)](https://addons.mozilla.org/en-US/firefox/addon/sqlite-manager/) to view the database which should be located at: /app/database/production.sqlite 

Note: do not commit the production.sqlite file.
