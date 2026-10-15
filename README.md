# Joul Rental - Car Rental Service Platform

A modern web-based vehicle rental system built with PHP, MySQL, HTML5, Vanilla CSS, and JavaScript.

## Features
- **Landing & Catalog Showcase:** Browse rental cars, passenger vans, urban scooters, and bicycles.
- **City Car Fleet:** Dedicated browsing view for city cars with pricing and specifications.
- **Interactive Cart & Booking:** Slide-out drawer with dynamic quantity adjustment and reservation flow.
- **User Authentication:** Sign up with credential validation and login with secure password verification and session management.
- **Analytics & Dashboard:** Store metrics, orders overview, top rental items, and recent activity feed.

## Prerequisites
- **PHP** 8.0 or higher (with `mysqli` and `session` extensions enabled)
- **MySQL / MariaDB** (e.g. XAMPP, Laragon, or standalone MySQL service)

## Database Setup
1. Ensure MySQL is running on `localhost:3306`.
2. Create or verify database `rentalKH`:
```sql
CREATE DATABASE IF NOT EXISTS rentalKH;
USE rentalKH;

CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_admin TINYINT(1) DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1
);
```

## Running the Application
Start the built-in PHP development server:
```bash
php -S 127.0.0.1:8000
```
Open your browser at:
```
http://127.0.0.1:8000/
```