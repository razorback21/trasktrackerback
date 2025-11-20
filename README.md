# Intruction

1. Run `composer install`
2. Run `npm install`
3. Rename `.env.example` to `.env`
4. set APP_URL=http://localhost:8000
5. Generate APP_KEY - `php artisan key:generate`
6. Create a new database file inside the database folder name it `database.sqlite`
7. Run migration - `php artisan migrate`
8. Seed database - `php artisan db:seed`
9. run the application - `php artisan serve` or `composer run dev`
