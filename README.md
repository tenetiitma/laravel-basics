## Prerequisites
- Composer version ^2.*
- Laravel: https://laravel.com/docs/10.x/deployment#server-requirements
- Node:  ^17.*
## Initial setup
- `git clone`
- `composer install`
- `npm install`
- `cp .env.example .env`
- Adjust `.env` DB_ variables
- `php artisan migrate`

## DB connection

### Local database connection (WSL)
- make sure that the SQL server is running `sudo service mysql status`
- if the SQL service is not running `sudo service mysql start`


## 1. App setup, database migrations and basic artisan commands
