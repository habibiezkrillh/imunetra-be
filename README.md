# Imunetra - Backend

![Laravel](https://img.shields.io/badge/Laravel-F72C1F?style=flat&logo=laravel&logoColor=white)
![REST API](https://img.shields.io/badge/API-RESTful-0052CC?style=flat&logo=api&logoColor=white)

Ini adalah backend service dari aplikasi **Imunetra**, sebuah platform deteksi dini pneumonia pada anak-anak di wilayah terpencil. Backend ini dibangun dengan menggunakan **Laravel** untuk menyediakan RESTful API yang mendukung fitur autentikasi, manajemen data anak, laporan gejala, dan integrasi peran relawan serta tenaga kesehatan.

---

## 🚀 Fitur Backend

- Otentikasi pengguna dengan token. 
- Pengiriman data hasil pemeriksaan anak secara terstruktur. 
- Pengambilan data diagnosis dari server secara berkala. 

---
## Requirements

- Laravel 11 (PHP Framework)
- Authentication: Laravel Sanctum 🔑

---

## Install

1. Clone this repository:
```bash
git clone https://github.com/habibiezkrillh/imunetra-be.git
cd imunetra-backend
```

2. Install dependency composer:
```bash
composer install
```

3. Make environment file & database configuration:
```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=imunetra
DB_USERNAME=root
DB_PASSWORD=
```

4. Generate APP KEY:
```bash
php artisan key:generate
```

5. Run the server:
```bash
php artisan serve
```

---

## 👥 Tim Pengembang

- Aurelia Davine Putri Nata
- Leonard Widjaja
- Muhammad Habbibie Zikrillah
