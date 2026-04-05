# 🔍 Lost & Found System — Laravel Activity

## Project Description
A web-based Lost & Found System built with Laravel. Users can report lost or found items, while admins have full control over all records. Implements CRUD, Laravel Breeze authentication, Role-Based Access Control (RBAC), and a responsive Bootstrap 5 UI.

---

## 📋 Requirements
- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL or SQLite database
- Laravel 10 or 11

---

## ⚙️ Setup Instructions

### Step 1 — Create a new Laravel project (if starting fresh)
```bash
composer create-project laravel/laravel lost-and-found
cd lost-and-found
```

### Step 2 — Copy the provided files
Copy all files from this zip into your Laravel project, matching the folder structure.

### Step 3 — Install Laravel Breeze
```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run dev
```

### Step 4 — Configure your database
Edit your `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lost_found_db
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5 — Run migrations
```bash
php artisan migrate
```

### Step 6 — Register Middleware (Laravel 10)
In `app/Http/Kernel.php`, add inside `$routeMiddleware`:
```php
'admin' => \App\Http\Middleware\AdminMiddleware::class,
```

For **Laravel 11**, add inside `bootstrap/app.php`:
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ]);
})
```

### Step 7 — Seed the Admin account
```bash
php artisan db:seed --class=AdminSeeder
```
Admin credentials:
- **Email:** admin@lostandfound.com
- **Password:** password

### Step 8 — Create storage symlink (for image uploads)
```bash
php artisan storage:link
```

### Step 9 — Start the development server
```bash
php artisan serve
```
Visit: http://127.0.0.1:8000

---

## 👤 Roles

| Role  | Permissions |
|-------|-------------|
| Admin | Full CRUD on all items, access to Admin Panel/Dashboard |
| User  | Can report items, edit/delete only their own items, view all |

---

## 📁 File Structure (files provided)

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── ItemController.php      ← CRUD controller
│   │   └── AdminController.php     ← Admin dashboard
│   └── Middleware/
│       └── AdminMiddleware.php     ← RBAC middleware
└── Models/
    ├── User.php                    ← Updated with role + isAdmin()
    └── Item.php                    ← Item model

database/
├── migrations/
│   ├── ...create_items_table.php
│   └── ...add_role_to_users_table.php
└── seeders/
    └── AdminSeeder.php

resources/views/
├── layouts/
│   ├── app.blade.php              ← Main layout
│   └── navbar.blade.php           ← Navbar with active links
├── home.blade.php                 ← Home/landing page
├── items/
│   ├── index.blade.php            ← List all items (Read)
│   ├── create.blade.php           ← Report new item (Create)
│   ├── edit.blade.php             ← Edit item (Update)
│   └── show.blade.php             ← View single item
└── admin/
    └── dashboard.blade.php        ← Admin panel with stats

routes/
└── web.php                        ← All routes
```

---

## ✅ Features Checklist
- [x] CRUD (Create, Read, Update, Delete) for Lost/Found Items
- [x] Laravel Breeze Login & Registration
- [x] Logout functionality
- [x] Protected routes (auth required)
- [x] Role-Based Access Control (Admin / User)
- [x] Admin-only dashboard with stats
- [x] Navbar on all pages
- [x] Active link highlighting
- [x] Bootstrap 5 responsive UI
- [x] Image upload for items
- [x] Flash success/error messages
- [x] Delete confirmation dialog
