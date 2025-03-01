# Personal Blog Application 

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

## About Project

This is a Laravel-based web application that includes modern features such as authentication, database migrations, and payment processing with Laravel Cashier.

## Requirements

Before starting, ensure you have the following installed:

- PHP 8.3+
- Composer
- NPM & Node.js
- MySQL 
- Redis (Optional, for caching)
- Laravel Cashier (For Stripe payments)

## Installation
<pre>
<code>
composer install
npm install && npm run dev
cp .env.example .env    
php artisan key:generate
composer require laravel/cashier
php artisan vendor:publish --tag="cashier-config"
php artisan serve
php artisan migrate
</code>
</pre>



### 1. Clone the Repository

```bash
git clone  git@github.com:ashikurweb/codeshaper-blog-app.git 
