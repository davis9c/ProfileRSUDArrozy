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

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_ar_profile
DB_USERNAME=profile
DB_PASSWORD=profile123
```

`APP_PORT` adalah port aplikasi. `APP_URL` dan `SERVER_PORT` mengikuti nilai tersebut, jadi cukup ubah `APP_PORT` jika ingin memakai port lain.

Jika database atau kredensial berbeda, ubah bagian `DB_*` sesuai kondisi Anda.

## 7. Migrasi dan Seeder Dasar

```bash
php artisan migrate --seed
```

Seeder bawaan akan membuat:

- User admin
- Data demo company profile
- Berita
- Service, portfolio, team, dan testimonial demo

Jika muncul peringatan bahwa kategori PKRS belum ada, abaikan dulu. Kategori akan dibuat pada langkah berikut.

## 8. Seeder Tambahan

Jalankan seeder dokter dan gambar berita:

```bash
php artisan db:seed --class=DoctorSeeder
php artisan db:seed --class=NewsImageSeeder
```

Buat kategori PKRS:

```bash
mysql -h 127.0.0.1 -u profile -p db_ar_profile <<'SQL'
INSERT INTO pkrs_categories (name, slug, created_at, updated_at) VALUES
  ('Quotes', 'quotes', NOW(), NOW()),
  ('Promosi Kesehatan', 'promosi-kesehatan', NOW(), NOW()),
  ('Artikel Kesehatan', 'artikel-kesehatan', NOW(), NOW()),
  ('Kegiatan PKRS', 'kegiatan-pkrs', NOW(), NOW())
ON DUPLICATE KEY UPDATE
  name = VALUES(name),
  updated_at = VALUES(updated_at);
SQL
```

Masukkan password `profile123` saat diminta. Setelah kategori tersedia, jalankan:

```bash
php artisan db:seed --class=PkrsPostSeeder
php artisan db:seed --class=PkrsGallerySeeder
```

## 9. Lengkapi Gambar Placeholder

Beberapa seeder merujuk gambar placeholder yang tidak disertakan di repository. Buat salinannya:

```bash
cp public/img/news/clinical.jpg public/img/news/clinical1.jpg
cp public/img/news/clinical.jpg public/img/news/clinical2.jpg
cp public/img/news/clinical.jpg public/img/news/clinical3.jpg

mkdir -p storage/app/public/dummy
for i in 1 2 3 4 5; do
  cp public/img/news/clinical.jpg "storage/app/public/dummy/gallery${i}.jpg"
done
```

Gambar ini hanya placeholder untuk data demo. Ganti melalui admin panel jika diperlukan.

## 10. Storage Link

Symlink relatif sudah tersedia di repository. Buat ulang jika belum ada:

```bash
rm -f public/storage
ln -s ../storage/app/public public/storage
```

Pastikan symlink mengarah ke `storage/app/public`:

```bash
ls -la public/storage
```

## 11. Asset Frontend

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

## 12. Bersihkan Cache dan Jalankan Aplikasi

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
php artisan db:seed --class=DoctorSeeder
php artisan db:seed --class=NewsImageSeeder
```

Ulangi langkah pembuatan kategori PKRS, `PkrsPostSeeder`, dan `PkrsGallerySeeder` setelahnya.

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
