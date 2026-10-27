# Dokumentasi RSUD Ar Rozy

Dokumentasi ini menjelaskan cara menjalankan aplikasi Company Profile RSUD Ar Rozy di lingkungan lokal, baik tanpa Docker (native) maupun dengan Docker.

## Daftar Isi

1. [System Requirements](system-requirements.md)
2. [Instalasi Native - Linux](installation-native.md)
3. [Instalasi Docker](installation-docker.md)

## Konfigurasi Default

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

Catatan:

- `APP_PORT` adalah port aplikasi. `APP_URL` dan `SERVER_PORT` mengikuti nilai ini, jadi cukup ubah `APP_PORT`.
- Jika port diubah, jalankan `php artisan optimize:clear` atau restart server agar konfigurasi baru dipakai.
- `127.0.0.1` adalah localhost melalui TCP. Ini lebih aman daripada hostname `localhost` karena PHP dapat mencoba Unix socket yang tidak tersedia ketika MySQL berjalan di container.
- Untuk aplikasi yang berjalan di Docker sedangkan MySQL berada di host, gunakan `DB_HOST=host.docker.internal`.
- Ganti password default sebelum digunakan di production.

## Kredensial Admin Default

```text
URL      : http://localhost:8000/admin/login
Email    : admin@company.com
Password : password
```

Segera ganti kredensial ini setelah login pertama.

## Ringkasan Cara Menjalankan

### Native (Linux)

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan db:seed --class=DoctorSeeder
php artisan db:seed --class=NewsImageSeeder
# buat kategori PKRS terlebih dahulu (lihat panduan)
php artisan db:seed --class=PkrsPostSeeder
php artisan db:seed --class=PkrsGallerySeeder
ln -sfn ../storage/app/public public/storage
php artisan optimize:clear
php artisan serve --host=0.0.0.0
```

Port mengikuti `SERVER_PORT` yang diturunkan dari `APP_PORT` di `.env`.

Langkah lengkap, termasuk pembuatan database dan kategori PKRS, ada di [installation-native.md](installation-native.md).

### Docker

```bash
cp .env.example .env
# ubah DB_HOST menjadi host.docker.internal
docker compose up -d --build
docker compose exec rsud php artisan key:generate
docker compose exec rsud php artisan migrate --seed
docker compose exec rsud sh -c 'ln -sfn ../storage/app/public public/storage'
docker compose exec rsud php artisan optimize:clear
```

Langkah lengkap ada di [installation-docker.md](installation-docker.md).

## Catatan Penting

- Project ini menggunakan MySQL, bukan SQLite.
- Port aplikasi dikonfigurasi melalui `APP_PORT` di `.env`. Docker Compose memakai nilai yang sama untuk port host dan container.
- Asset frontend hasil build sudah tersedia di `public/build`. Node.js hanya diperlukan jika Anda mengubah CSS/JavaScript lalu menjalankan `npm run build` atau `npm run dev`.
- Data dari seeder adalah data demo. Seeder bawaan belum membuat kategori PKRS; ikuti langkah tambahan di panduan instalasi.
- File `.env` tidak boleh di-commit. Gunakan `.env.example` sebagai template.
- Folder `storage/app/public` terhubung ke `public/storage` melalui symlink relatif (`../storage/app/public`). Buat ulang symlink jika belum ada; lihat panduan instalasi.
