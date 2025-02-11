# Laravel Blog SportPointApp

## 📌 Overview
Laravel Blog Project adalah aplikasi berbasis web yang dibuat menggunakan Laravel. Aplikasi ini memiliki fitur daftar artikel, kategori, dan tampilan yang modern serta responsif.

## 🛠️ Installation
### 1. Clone Repository
```sh
git clone https://github.com/agungkartika/sportspointapp
cd sportspointapp
```

### 2. Install Dependencies
```sh
composer install
npm install
```

### 3. Setup Environment
Copy file `.env.example` menjadi `.env` dan konfigurasi database sesuai kebutuhan:
```sh
cp .env.example .env
```
Lalu, generate application key:
```sh
php artisan key:generate
```

### 4. Migrate Database
```sh
php artisan migrate
php artisan db:seed --class=usersSeeder  
php artisan db:seed --class=categoriesSeeder  
php artisan db:seed --class=postSeeder  
```

### 5. Run Development Server
```sh
php artisan serve
npm run dev
```
Akses aplikasi melalui `http://127.0.0.1:8000`

## 🚀 Features
- List Artikel
- Kategori dengan Slug
- Trending Artikel
- Responsif & Modern UI

## 📜 License
This project is licensed under the MIT License.
