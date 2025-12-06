# Swirl & Twist Laundry Shop

Swirl & Twist is a Laravel-based multi-role web app (Admin, Staff, Customer) to manage laundry bookings, payments, equipment, and customer operations with a modern responsive UI.

## Setup Instructions
- Requirements: PHP 8.1+, Composer, Node 18+, MySQL (or compatible)
- Clone and install
  - composer install
  - npm install
- Environment
  - Copy .env.example to .env and configure DB, APP_URL
  - php artisan key:generate
- Database
  - php artisan migrate --seed (optional seeding if provided)
- Run
  - php artisan serve (backend)
  - npm run dev (Vite dev) or npm run build (production)
- Caches (if needed)
  - php artisan config:clear && php artisan cache:clear && php artisan view:clear

## Screenshots / Examples
- Homepage: resources/views/welcome.blade.php (public landing)
- Customer dashboard and sidebar: resources/views/layouts/NavigationPartials/
- Profile page: resources/views/profile/edit.blade.php

## Features (with CRUD mapping)
- Bookings (Customer)
  - Create: booking.create/store
  - Read/List: booking.index, show
  - Update: booking.edit/update
  - Delete/Cancel: booking.cancel (custom) or destroy if implemented
- Payments / Billings (Customer/Admin/Staff)
  - billing.* and payment.* resource routes handle create/read/update; admin/staff approval routes manage workflow
- Admin Management
  - Services: service.* (CRUD)
  - Equipments: equipment.* (CRUD)
  - Users: user.* (CRUD)
  - Booking approvals: confirmBooking.* (+ extra routes for rejected/cancelled, tracking)
  - Payment approvals: adminPaymentApproval.* (and completed list)
- Staff Operations
  - Assigned bookings: assignedBooking.* (+ trackBookings)
  - Equipment Monitoring: equipmentMonitoring.*

## Code Structure
- Backend: app/Http/Controllers, app/Models, routes/web.php, database/migrations|seeders
- Frontend: resources/views (Blade), resources/css & resources/js (Vite), resources/img
- Public web root: public/

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
