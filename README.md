# Intruction

1. Run `composer install`
2. Run `npm install`
3. Rename `.env.example` to `.env`
4. set APP_URL=http://localhost:8000
5. Generate APP_KEY - `php artisan key:generate`
6. Create a new SQLite database file inside the database folder name it `database.sqlite`
7. Run migration - `php artisan migrate`
8. Seed database - `php artisan db:seed`
9. run the application - `php artisan serve` or `composer run dev`

# API Filter

1. Filter by due_date:
   `ex. http://localhost:8000/api/tasks?due_date=2025-12-20`
2. Filter by status:
   `http://localhost:8000/api/tasks?status=completed`
