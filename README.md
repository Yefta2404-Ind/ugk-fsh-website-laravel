<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=0:1a3c6e,100:2196f3&height=200&section=header&text=UGK%20FSH%20Website&fontSize=42&fontColor=ffffff&fontAlignY=38&desc=Fakultas%20Ilmu%20Sosial%20%26%20Humaniora%20%E2%80%94%20Universitas%20Gunung%20Kidul&descAlignY=58&descSize=16&descColor=cce4ff" width="100%"/>

<br/>

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-UI-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-MIT-22c55e?style=for-the-badge)](LICENSE)

<br/>

> 🎓 **Platform digital resmi** Fakultas Ilmu Sosial & Humaniora UGK —  
> dibangun dengan Laravel, tampilan modern & responsif untuk semua perangkat.

<br/>

[![Live Website](https://img.shields.io/badge/🌐%20LIHAT%20LIVE%20WEBSITE-soshum.ugk.ac.id-1a3c6e?style=for-the-badge)](http://soshum.ugk.ac.id/)

<br/>

</div>

---

## ✨ Fitur Unggulan

<table>
  <tr>
    <td align="center" width="220">
      <img src="https://img.shields.io/badge/🏛️-Profil%20Fakultas-1a3c6e?style=flat-square"/><br/>
      <sub>Manajemen informasi & profil institusi secara dinamis</sub>
    </td>
    <td align="center" width="220">
      <img src="https://img.shields.io/badge/📚-Program%20Studi-2563eb?style=flat-square"/><br/>
      <sub>Halaman lengkap tiap program studi yang tersedia</sub>
    </td>
    <td align="center" width="220">
      <img src="https://img.shields.io/badge/👩‍🏫-Dosen%20%26%20Staf-7c3aed?style=flat-square"/><br/>
      <sub>Direktori lengkap civitas akademika FSH</sub>
    </td>
  </tr>
  <tr>
    <td align="center" width="220">
      <img src="https://img.shields.io/badge/📰-Berita%20%26%20Pengumuman-0891b2?style=flat-square"/><br/>
      <sub>Sistem publikasi konten yang terintegrasi</sub>
    </td>
    <td align="center" width="220">
      <img src="https://img.shields.io/badge/📱-UI%20Responsif-16a34a?style=flat-square"/><br/>
      <sub>Tampilan optimal di semua ukuran perangkat</sub>
    </td>
    <td align="center" width="220">
      <img src="https://img.shields.io/badge/🔧-Admin%20Dashboard-dc2626?style=flat-square"/><br/>
      <sub>Panel manajemen konten yang mudah digunakan</sub>
    </td>
  </tr>
</table>

---

## 🛠️ Tech Stack

<div align="center">

| Layer | Teknologi | Fungsi |
|:---:|:---:|:---|
| 🔴 | **Laravel** | PHP Framework — MVC Architecture |
| 🟣 | **PHP 8.x** | Server-side scripting |
| 🔵 | **MySQL** | Relational database |
| 🟠 | **Blade Template** | Laravel templating engine |
| 💜 | **Bootstrap + CSS** | UI styling & responsiveness |

</div>

---

## 🚀 Instalasi & Setup

### ⚙️ Prasyarat

Pastikan tools berikut sudah terinstall di sistemmu:

![PHP](https://img.shields.io/badge/PHP-≥%208.0-777BB4?logo=php&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-Latest-885630?logo=composer&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Latest-4479A1?logo=mysql&logoColor=white)
![Node.js](https://img.shields.io/badge/Node.js-Opsional-339933?logo=node.js&logoColor=white)

---

### 📋 Langkah-langkah

**① Clone repository**
```bash
git clone https://github.com/Yefta2404-Ind/ugk-fsh-website-laravel.git
cd ugk-fsh-website-laravel
```

**② Install dependencies**
```bash
composer install
```

**③ Salin & konfigurasi environment**
```bash
cp .env.example .env
```

Buka `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ugk_fsh_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

**④ Generate application key**
```bash
php artisan key:generate
```

**⑤ Migrasi database**
```bash
php artisan migrate

# Opsional: isi data awal
php artisan db:seed
```

**⑥ Jalankan server**
```bash
php artisan serve
```

> 🟢 Buka browser dan akses: **[http://localhost:8000](http://localhost:8000)**

---

## 📸 Screenshots

> 📌 *Tambahkan screenshot proyek di sini agar kontributor mendapat gambaran visual yang jelas.*

| Halaman Utama | Dashboard Admin |
|:---:|:---:|
| *(coming soon)* | *(coming soon)* |

---

## 📁 Struktur Proyek

```
ugk-fsh-website-laravel/
│
├── 📂 app/
│   ├── 📂 Http/
│   │   ├── 📂 Controllers/      ← Logic controller
│   │   └── 📂 Middleware/       ← Middleware
│   └── 📂 Models/               ← Eloquent models
│
├── 📂 database/
│   ├── 📂 migrations/           ← Skema database
│   └── 📂 seeders/              ← Data awal
│
├── 📂 public/                   ← Asset publik (css, js, img)
│
├── 📂 resources/
│   ├── 📂 views/                ← Blade templates
│   └── 📂 css/                  ← Stylesheet
│
├── 📂 routes/
│   └── 📄 web.php               ← Routing aplikasi
│
└── 📄 .env.example              ← Template konfigurasi
```

---

## 🤝 Kontribusi

Kontribusi sangat disambut! Ikuti langkah berikut:

```
1. 🍴  Fork repository ini
2. 🌿  Buat branch baru       →  git checkout -b fitur/nama-fitur
3. ✍️  Commit perubahanmu    →  git commit -m 'Menambahkan fitur X'
4. 📤  Push ke branch         →  git push origin fitur/nama-fitur
5. 🔁  Buat Pull Request
```

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah **[MIT License](LICENSE)** — bebas digunakan, dimodifikasi, dan didistribusikan.

---

<div align="center">

## 👨‍💻 Pengembang

**Dikembangkan dengan ❤️ oleh**

<br/>

[![Jefta Aditya](https://img.shields.io/badge/👨‍💻%20JEFTA%20ADITYA-Full--stack%20Developer-1a3c6e?style=for-the-badge)](https://github.com/Yefta2404-Ind)

*Universitas Gunung Kidul · Fakultas Ilmu Sosial & Humaniora*

<br/>

<img src="https://capsule-render.vercel.app/api?type=waving&color=0:2196f3,100:1a3c6e&height=100&section=footer" width="100%"/>

</div>
