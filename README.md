## HOW TO INSTALL


- `git clone https://github.com/zakuurr/test-coalition.git`
- `cd test-coalition/`
- `composer install`
- `cp .env.example .env`
- `create database`
- Update `.env` change DB_DATABASE to database name
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan serve`
