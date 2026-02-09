# Laboratory Assignment - Laravel Application

This Laravel application implements user authentication and a dashboard page with the following features:

- Database migrations with custom user fields
- Model factories and seeders with 100 user records
- Authentication scaffolding using Laravel Breeze
- Protected dashboard route with post-login redirection
- Responsive dashboard view with Bootstrap styling

## Setup Instructions

1. Clone the repository
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Set up the database (using SQLite as configured):
   ```bash
   # Make sure the database file exists
   touch database/database.sqlite
   ```
6. Run migrations:
   ```bash
   php artisan migrate
   ```
7. Seed the database:
   ```bash
   php artisan db:seed
   ```
8. Install and build frontend assets:
   ```bash
   npm install
   npm run build
   ```
9. Start the development server:
   ```bash
   php artisan serve
   ```

## Sample Login Credentials

The seeder creates several test users with known credentials:

| Username   | Email              | Password    |
|------------|--------------------|-------------|
| testuser   | test@example.com   | password123 |
| admin      | admin@example.com  | admin123    |
| john_doe   | john@example.com   | john123     |

Additional users with random data were also created (100 total users).

## Features Implemented

1. **Database Migration**: Modified users table with username (unique), is_active (boolean, default: true), and last_login (timestamp, nullable) fields
2. **Factories and Seeders**: Created UserFactory and seeded 100 users with realistic data
3. **Authentication**: Implemented using Laravel Breeze with login, registration, and logout functionality
4. **Routing**: Created protected /dashboard route with proper middleware
5. **Redirection**: Configured post-login redirect to /dashboard
6. **Dashboard View**: Clean, responsive dashboard displaying user's name/username and welcome message using Tailwind CSS

## Directory Structure

- `database/migrations/` - Database migration files
- `database/factories/` - Model factories
- `database/seeders/` - Database seeders
- `routes/web.php` - Web routes
- `resources/views/` - Blade templates
- `app/Models/User.php` - User model with custom fields