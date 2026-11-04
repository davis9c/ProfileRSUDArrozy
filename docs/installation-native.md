# Instalasi Native - Linux

Panduan ini menjelaskan instalasi tanpa Docker pada Linux (Ubuntu/Debian). Untuk WSL2, ikuti langkah yang sama di dalam distro Linux.

## 1. Install Dependency Sistem

```bash
sudo apt update
sudo apt install -y git unzip curl software-properties-common
```

Untuk Ubuntu 22.04, tambahkan PPA PHP agar mendapatkan PHP 8.5:

```bash
sudo add-apt-repository -y ppa:ondrej/php
sudo apt update
```

Install PHP dan ekstensi yang dibutuhkan:

```bash
sudo apt install -y \
  php8.5-cli \
  php8.5-common \
  php8.5-mysql \
  php8.5-mbstring \
  php8.5-xml \
  php8.5-curl \
  php8.5-gd \
  php8.5-zip \
  php8.5-bcmath
```

Jika ingin menjalankan test dengan konfigurasi bawaan `phpunit.xml` (SQLite in-memory), tambahkan:

```bash
sudo apt install -y php8.5-sqlite3
```

Verifikasi:

```bash
php -v
php -m | grep -E 'pdo_mysql|mbstring|xml|curl|gd|zip|bcmath'
```

## 2. Install Composer

```bash
curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer -V
```

## 3. Install dan Siapkan MySQL

```bash
sudo apt install -y mysql-server
sudo systemctl enable --now mysql
sudo mysql
```

Di dalam prompt MySQL, jalankan:

```sql
CREATE DATABASE IF NOT EXISTS db_ar_profile
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'profile'@'%' IDENTIFIED BY 'profile123';
ALTER USER 'profile'@'%' IDENTIFIED BY 'profile123';

GRANT ALL PRIVILEGES ON db_ar_profile.* TO 'profile'@'%';
FLUSH PRIVILEGES;

EXIT;
```

Catatan:

- Host `%` dipakai agar koneksi lewat TCP dari aplikasi lokal maupun container dapat masuk. Untuk production, batasi host sesuai kebutuhan.
- Jika MySQL hanya untuk aplikasi native di mesin yang sama, Anda dapat memakai `'profile'@'localhost'`.

Verifikasi koneksi:

```bash
mysql -h 127.0.0.1 -P 3306 -u profile -p -e "SHOW DATABASES;"
```

Masukkan password `profile123` saat diminta.

## 4. Ambil Source Code

```bash
git clone <repository-url> ProfileRSUDArrozy
cd ProfileRSUDArrozy
```

Jika project sudah ada di mesin, cukup masuk ke direktori project.

## 5. Install Dependency PHP

```bash
composer install
```

## 6. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

`.env.example` sudah memakai konfigurasi lokal berikut:

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

`APP_PORT` adalah port aplikasi. `APP_URL` dan `SERVER_PORT` mengikuti nilai tersebut, jadi cukup ubah `APP_PORT` jika ingin memakai port lain.

Jika database atau kredensial berbeda, ubah bagian `DB_*` sesuai kondisi Anda.

## 7. Migrasi dan Seeder

```bash
php artisan migrate --seed
```

`DatabaseSeeder` akan membuat:

- User admin (`admin@company.com` / `password`).
- Pengaturan situs RSUD Ar Rozy.
- Data dokter dan jadwal praktik.
- Berita contoh dan gambar tambahan.
- Kategori PKRS.
- Post PKRS (artikel, galeri, dan video).
- Galeri foto PKRS.

Semua gambar dan video contoh memakai aset yang sudah tersedia di folder `public/`, sehingga tidak perlu membuat file placeholder tambahan.

## 8. Storage Link

Symlink `public/storage` **tidak disertakan di repository** karena diabaikan oleh Git. Buat setelah clone:

```bash
rm -f public/storage
ln -s ../storage/app/public public/storage
```

Pastikan symlink mengarah ke `storage/app/public`:

```bash
ls -la public/storage
```

## 9. Asset Frontend

Asset hasil build sudah tersedia di `public/build`, jadi langkah ini opsional. Jalankan hanya jika Anda mengubah CSS/JavaScript atau ingin memastikan asset terbaru:

```bash
npm install
npm run build
```

Untuk development dengan hot reload:

```bash
npm run dev
```

Jalankan `npm run dev` di terminal terpisah dari `php artisan serve`.

## 10. Bersihkan Cache dan Jalankan Aplikasi

```bash
php artisan optimize:clear
php artisan serve --host=0.0.0.0
```

Port mengikuti `SERVER_PORT` yang diturunkan dari `APP_PORT` di `.env`.

Buka:

- Frontend: `http://localhost:8000` (atau port sesuai `APP_PORT`)
- Admin: `http://localhost:8000/admin/login` (atau port sesuai `APP_PORT`)
- Email: `admin@company.com`
- Password: `password`

## Reset Database

Untuk mengulang dari awal (menghapus seluruh data):

```bash
php artisan migrate:fresh --seed
```

Seluruh data dokter, berita, kategori PKRS, post PKRS, dan galeri akan dibuat ulang oleh `DatabaseSeeder`.

## Catatan Dashboard

Halaman `/dashboard` menampilkan data kunjungan dari API SIMRS eksternal yang dikonfigurasi langsung di `public/js/chartkunjungan.js` dan `public/js/info.js`. Jika API tidak dapat diakses, KPI dan grafik akan tampil kosong. Aplikasi ini tidak menyimpan tabel SIMRS secara lokal.

## Troubleshooting

### `could not find driver`

Ekstensi `pdo_mysql` belum aktif. Install `php8.5-mysql`, lalu restart PHP/web server.

### `SQLSTATE[HY000] [2002] Connection refused`

- Pastikan MySQL berjalan: `sudo systemctl status mysql`.
- Pastikan host dan port benar: `127.0.0.1:3306`.
- Cek apakah MySQL mendengarkan TCP: `ss -ltnp | grep 3306`.

### `Access denied for user 'profile'@'...'`

- Pastikan user dan password sesuai: `profile` / `profile123`.
- Pastikan host user di MySQL cocok. Untuk koneksi TCP lokal, gunakan `'profile'@'%'` atau buat user untuk `127.0.0.1`.

### `The stream or file ... could not be opened in append mode`

Perbaiki permission:

```bash
sudo chown -R "$USER":"$USER" storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### `Vite manifest not found`

Jalankan:

```bash
npm install
npm run build
```

Atau pastikan folder `public/build` ada.

### Test gagal karena `could not find driver (sqlite)`

`phpunit.xml` memakai SQLite in-memory. Install ekstensi `pdo_sqlite`:

```bash
sudo apt install -y php8.5-sqlite3
```

### Port 8000 sudah dipakai

Ubah `APP_PORT` di `.env`, misalnya menjadi `8001`:

```env
APP_PORT=8001
```

`APP_URL` dan `SERVER_PORT` akan mengikuti nilai tersebut. Bersihkan cache lalu jalankan ulang:

```bash
php artisan optimize:clear
php artisan serve --host=0.0.0.0
```
