<div align="center">

# 🎓 UGK FSH Website Laravel

### Website Resmi Fakultas Ilmu Sosial & Humaniora  
### Universitas Gunung Kidul

[![Laravel](https://img.shields.io/badge/Laravel-Framework-red?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.x-blue?style=flat-square&logo=php)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange?style=flat-square&logo=mysql)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)

**Platform digital modern untuk Fakultas Ilmu Sosial & Humaniora — dibangun di atas Laravel dengan antarmuka responsif yang elegan.**

🌐 **[Lihat Live Website →](http://soshum.ugk.ac.id/)**

</div>

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| 🏛️ **Profil Fakultas** | Manajemen informasi dan profil institusi secara dinamis |
| 📚 **Program Studi** | Halaman lengkap setiap program studi yang tersedia |
| 👩‍🏫 **Dosen & Staf** | Direktori lengkap civitas akademika FSH |
| 📰 **Berita & Pengumuman** | Sistem publikasi konten terintegrasi |
| 📋 **Informasi Akademik** | Halaman informasi akademik yang terstruktur |
| 📱 **UI Responsif** | Tampilan optimal di semua ukuran perangkat |
| 🔧 **Admin Dashboard** | Panel admin untuk manajemen konten yang mudah |

---

## 🛠️ Tech Stack

```
Laravel          →  PHP Framework (MVC)
PHP              →  Server-side scripting
MySQL            →  Relational database
Blade Template   →  Laravel templating engine
Bootstrap / CSS  →  UI styling & responsiveness
```

---

## 🚀 Cara Instalasi

### Prasyarat
Pastikan kamu sudah menginstall:
- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM *(opsional, untuk asset compilation)*

### Langkah-langkah

**1. Clone repository**
```bash
git clone https://github.com/Yefta2404-Ind/ugk-fsh-website-laravel.git
cd ugk-fsh-website-laravel
```

**2. Install dependencies PHP**
```bash
composer install
```

**3. Salin file environment**
```bash
cp .env.example .env
```

**4. Konfigurasi database**

Buka file `.env` dan sesuaikan:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_kamu
DB_USERNAME=root
DB_PASSWORD=password_kamu
```

**5. Generate application key**
```bash
php artisan key:generate
```

**6. Jalankan migrasi database**
```bash
php artisan migrate
```

> *(Opsional)* Jalankan seeder untuk data awal:
> ```bash
> php artisan db:seed
> ```

**7. Jalankan development server**
```bash
php artisan serve
```

Akses aplikasi di: **http://localhost:8000**

---

## 📸 Screenshots

> *Tambahkan screenshot proyek di sini untuk memberikan gambaran visual kepada kontributor dan pengguna.*

| Halaman Utama | Dashboard Admin |
|:---:|:---:|
| *(coming soon)* | *(coming soon)* |

---

## 📁 Struktur Proyek

```
ugk-fsh-website-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Logic controller
│   │   └── Middleware/      # Middleware
│   └── Models/              # Eloquent models
├── database/
│   ├── migrations/          # Migrasi database
│   └── seeders/             # Data seeder
├── public/                  # Asset publik
├── resources/
│   ├── views/               # Blade templates
│   └── css/                 # Stylesheet
├── routes/
│   └── web.php              # Routing aplikasi
└── .env.example             # Contoh konfigurasi environment
```

---

## 🤝 Kontribusi

Kontribusi sangat disambut! Berikut caranya:

1. **Fork** repository ini
2. Buat **branch** fitur baru: `git checkout -b fitur/nama-fitur`
3. **Commit** perubahanmu: `git commit -m 'Menambahkan fitur X'`
4. **Push** ke branch: `git push origin fitur/nama-fitur`
5. Buat **Pull Request**

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

## 👨‍💻 Pengembang

<div align="center">

**Dikembangkan dengan ❤️ oleh**

### JEFTA ADITYA
*Full-stack Developer · Universitas Gunung Kidul*

---

<sub>© 2024 Fakultas Ilmu Sosial & Humaniora — Universitas Gunung Kidul</sub>

</div>
