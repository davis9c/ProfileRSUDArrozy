# Dokumentasi RSUD Ar Rozy

Dokumentasi ini menjelaskan cara menjalankan website profil dan informasi RSUD Ar Rozy di lingkungan lokal, baik tanpa Docker (native) maupun dengan Docker.

## Daftar Isi

1. [System Requirements](system-requirements.md)
2. [Instalasi Native - Linux](installation-native.md)
3. [Instalasi Docker](installation-docker.md)

## Konfigurasi Default

```env
APP_PORT=8000
APP_URL=http://localhost:${APP_PORT}
SERVER_PORT="${APP_PORT}"
APP_TIMEZONE=Asia/Jakarta

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
- Untuk aplikasi Docker, `docker-compose.yaml` memakai `network_mode: host`, sehingga `DB_HOST=127.0.0.1` dapat digunakan untuk MySQL di host maupun MySQL di container lain yang mem-publish port `3306` ke host.
- Jika database berada di server lain, ganti `DB_HOST` dengan IP database tersebut (misalnya `10.0.0.212`).
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
ln -sfn ../storage/app/public public/storage
php artisan optimize:clear
php artisan serve --host=0.0.0.0
```

`php artisan migrate --seed` sudah menjalankan seluruh seeder: pengaturan situs, dokter, berita, kategori PKRS, post PKRS, dan galeri PKRS.

Port mengikuti `SERVER_PORT` yang diturunkan dari `APP_PORT` di `.env`.

Langkah lengkap, termasuk pembuatan database, ada di [installation-native.md](installation-native.md).

### Docker

```bash
cp .env.example .env
# DB_HOST=127.0.0.1 (default) untuk MySQL di host/container yang publish port 3306,
# atau ganti dengan IP database jika MySQL berada di server lain.
docker compose up -d --build
docker compose exec rsud php artisan key:generate
docker compose exec rsud php artisan migrate --seed
docker compose exec rsud sh -c 'ln -sfn ../storage/app/public public/storage'
docker compose exec rsud php artisan optimize:clear
```

Langkah lengkap ada di [installation-docker.md](installation-docker.md).

## Catatan Penting

- Aplikasi menggunakan MySQL. Konfigurasi test bawaan (`phpunit.xml`) menggunakan SQLite in-memory dan memerlukan ekstensi `pdo_sqlite`.
- Port aplikasi dikonfigurasi melalui `APP_PORT` di `.env`. Docker Compose memakai host networking, sehingga aplikasi langsung listen di port tersebut pada host.
- Asset frontend hasil build sudah tersedia di `public/build`. Node.js hanya diperlukan jika Anda mengubah CSS/JavaScript lalu menjalankan `npm run build` atau `npm run dev`.
- Seeder bawaan sudah membuat kategori PKRS, post PKRS, dan galeri PKRS.
- Halaman `/dashboard` membutuhkan API SIMRS eksternal. Jika API tidak dapat diakses, KPI dan grafik akan tampil kosong.
- Panel admin belum memiliki role/permission; saat ini hanya ada autentikasi admin tunggal.
- Rating Google Review di beranda diatur melalui `GOOGLE_REVIEW_RATING` di `.env` dan perlu diperbarui manual secara berkala.
- File `.env` tidak boleh di-commit. Gunakan `.env.example` sebagai template.
- Folder `storage/app/public` terhubung ke `public/storage` melalui symlink relatif (`../storage/app/public`). Symlink tidak disertakan di repository; buat setelah clone seperti pada panduan instalasi.
