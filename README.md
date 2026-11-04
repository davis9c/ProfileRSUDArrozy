# RSUD Ar Rozy — Website Profil dan Informasi

Website profil resmi RSUD Ar Rozy Kota Probolinggo. Aplikasi ini menampilkan informasi layanan, berita, kegiatan PKRS, dokumen PPID, profil rumah sakit, serta panel admin untuk mengelola konten.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)
![TailwindCSS](https://img.shields.io/badge/Tailwind-4.x-38B2AC?style=flat-square&logo=tailwind-css)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=flat-square&logo=alpine.js)

## Dokumentasi

- [System Requirements](docs/system-requirements.md)
- [Instalasi Native - Linux](docs/installation-native.md)
- [Instalasi Docker](docs/installation-docker.md)

## Fitur

### Halaman Publik

- **Beranda** — hero, informasi layanan, pencarian dokter, jadwal praktik, berita terbaru, dan kegiatan PKRS.
- **Berita** — daftar berita, berita unggulan, halaman detail, dan galeri gambar berita.
- **PKRS** — artikel, galeri foto, dan video edukasi kesehatan dengan filter kategori.
- **PPID** — informasi publik, struktur organisasi, alur permohonan informasi, dan kontak.
- **Profil** — profil rumah sakit, struktur organisasi, dan layanan unggulan.
- **Info Layanan (`/dashboard`)** — ringkasan kunjungan dan ketersediaan tempat tidur. Data diambil dari API SIMRS eksternal; lihat bagian [Catatan](#catatan).

### Panel Admin

- Login admin.
- Dashboard ringkasan dokter, berita, dan PKRS.
- CRUD dokter beserta jadwal praktik.
- CRUD berita beserta gambar tambahan.
- CRUD kategori PKRS.
- CRUD post PKRS (artikel, galeri, dan video).
- CRUD galeri foto PKRS.
- Pengaturan identitas situs, kontak, dan media sosial.

## Tech Stack

| Teknologi | Kegunaan |
|---|---|
| Laravel 12 | Framework backend |
| Blade | Template engine |
| Tailwind CSS 4 | Styling |
| Alpine.js 3 | Interaktivitas frontend |
| AOS | Animasi scroll |
| MySQL 8 | Database |
| Vite 7 | Bundling asset |
| ApexCharts / Chart.js | Grafik pada halaman info layanan |

## Kebutuhan Sistem

- PHP 8.2+ (disarankan 8.5)
- Composer 2.7+
- MySQL 8.0+
- Node.js 20.19+ atau 22.12+ (opsional, hanya untuk mengubah CSS/JavaScript)
- Ekstensi PHP: `pdo_mysql`, `mbstring`, `xml`, `curl`, `gd`, `zip`, `bcmath`
- `pdo_sqlite` hanya diperlukan jika menjalankan test dengan konfigurasi default `phpunit.xml`

Rincian lengkap ada di [docs/system-requirements.md](docs/system-requirements.md).

## Quick Start

### Instalasi Native

1. **Clone repository**

   ```bash
   git clone <URL_REPOSITORY_ANDA> ProfileRSUDArrozy
   cd ProfileRSUDArrozy
   ```

2. **Install dependency PHP**

   ```bash
   composer install
   ```

3. **Siapkan environment**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database** di `.env`

   ```env
   APP_PORT=8000
   APP_URL=http://localhost:${APP_PORT}
   SERVER_PORT="${APP_PORT}"

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_ar_profile
   DB_USERNAME=profile
   DB_PASSWORD=profile123
   ```

   Cukup ubah `APP_PORT` untuk mengganti port aplikasi; `APP_URL` dan `SERVER_PORT` mengikuti nilai tersebut.

5. **Jalankan migrasi dan seeder**

   ```bash
   php artisan migrate --seed
   ```

   `DatabaseSeeder` akan membuat admin, pengaturan situs RSUD, data dokter, berita, kategori PKRS, post PKRS, dan galeri PKRS.

6. **Buat symlink storage**

   ```bash
   ln -sfn ../storage/app/public public/storage
   ```

   Symlink tidak disertakan di repository.

7. **Build asset (opsional)** — `public/build` sudah tersedia.

   ```bash
   npm install
   npm run build
   ```

8. **Jalankan aplikasi**

   ```bash
   php artisan serve
   ```

   Port mengikuti `SERVER_PORT` yang diturunkan dari `APP_PORT`.

9. **Buka aplikasi**
   - Frontend: `http://localhost:8000`
   - Admin: `http://localhost:8000/admin/login`

### Instalasi Docker

```bash
cp .env.example .env
docker compose up -d --build
docker compose exec rsud php artisan key:generate
docker compose exec rsud php artisan migrate --seed
docker compose exec rsud sh -c 'ln -sfn ../storage/app/public public/storage'
docker compose exec rsud php artisan optimize:clear
```

Panduan lengkap ada di [docs/installation-docker.md](docs/installation-docker.md).

## Kredensial Admin Default

```text
Email    : admin@company.com
Password : password
```

> Ganti kredensial ini setelah login pertama.

## Struktur Proyek

```text
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Controller panel admin
│   │   ├── Concerns/        # Trait upload file
│   │   └── Frontend/        # Controller halaman publik
│   ├── Http/Middleware/     # Middleware locale
│   ├── Http/Requests/       # Validasi form PKRS
│   └── Models/              # Model Eloquent
├── database/
│   ├── migrations/          # Skema database
│   └── seeders/             # Data awal (admin, dokter, berita, PKRS)
├── docs/                    # Dokumentasi instalasi
├── public/
│   ├── build/               # Asset Vite hasil build
│   ├── css/                 # CSS tambahan
│   ├── img/                 # Gambar statis
│   ├── js/                  # JavaScript halaman publik
│   └── vid/                 # Video harian
├── resources/
│   ├── css/                 # Sumber CSS Tailwind
│   ├── js/                  # Sumber JavaScript (Alpine, AOS)
│   └── views/
│       ├── admin/           # Tampilan panel admin
│       └── frontend/        # Tampilan halaman publik
└── routes/
    └── web.php              # Routing web
```

## Seeder

`DatabaseSeeder` menjalankan seeder berikut secara berurutan:

1. `CompanySettingSeeder` — identitas dan kontak RSUD Ar Rozy.
2. `DoctorSeeder` — data dokter dan jadwal praktik.
3. `NewsSeeder` — berita contoh.
4. `NewsImageSeeder` — gambar tambahan berita utama.
5. `PkrsCategorySeeder` — kategori PKRS.
6. `PkrsPostSeeder` — post PKRS (artikel, galeri, video).
7. `PkrsGallerySeeder` — galeri foto post PKRS.

Untuk mengulang dari database kosong:

```bash
php artisan migrate:fresh --seed
```

## Catatan

- **Dashboard `/dashboard` membutuhkan API SIMRS eksternal.** Jika API tidak dapat diakses, KPI dan grafik akan tampil kosong. Endpoint API dikonfigurasi langsung di `public/js/chartkunjungan.js` dan `public/js/info.js`.
- **Panel admin belum memiliki role/permission.** Saat ini hanya ada autentikasi admin tunggal; belum ada pembatasan akses per role.
- **Rating Google Review** di beranda diatur melalui `GOOGLE_REVIEW_RATING` di `.env` dan perlu diperbarui manual secara berkala.
- **Node.js bersifat opsional.** Asset hasil build sudah tersedia di `public/build`; Node.js hanya diperlukan untuk mengubah CSS/JavaScript.
- **Test menggunakan SQLite in-memory** sesuai `phpunit.xml`. Pastikan ekstensi `pdo_sqlite` aktif sebelum menjalankan `php artisan test`.
- File `.env` tidak boleh di-commit. Gunakan `.env.example` sebagai template.

## Kontribusi

1. Fork repository.
2. Buat branch fitur (`git checkout -b feature/nama-fitur`).
3. Commit perubahan.
4. Push branch dan buka Pull Request.
