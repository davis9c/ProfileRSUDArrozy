# Instalasi Docker

Panduan ini menjalankan aplikasi Laravel di Docker, sedangkan MySQL dijalankan secara eksternal (di host atau container MySQL terpisah). Service MySQL sengaja tidak dimasukkan ke `docker-compose.yaml`.

## 1. Prasyarat

- Docker Engine 24+ dengan dukungan host networking (Linux), atau Docker Desktop yang host networking-nya aktif
- Docker Compose v2.20+
- MySQL 8.0+ yang dapat diakses dari container aplikasi
- Port `APP_PORT` (default `8000`) tersedia di host
- Port `3306` MySQL dipublikasikan ke host jika MySQL berjalan di container

Verifikasi:

```bash
docker --version
docker compose version
```

## 2. Siapkan MySQL Eksternal

Pilih salah satu opsi berikut.

### Opsi A - MySQL Native di Host Linux

Install MySQL di host:

```bash
sudo apt install -y mysql-server
sudo systemctl enable --now mysql
sudo mysql
```

Buat database dan user:

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

Karena aplikasi memakai `network_mode: host`, container berbagi network dengan host. MySQL native cukup mendengarkan `127.0.0.1` (konfigurasi default) dan tidak perlu diubah menjadi `0.0.0.0`. Pastikan tidak ada service lain yang memakai port `3306`.

Untuk penggunaan lokal, port `3306` sebaiknya hanya dapat diakses dari mesin sendiri atau gunakan firewall.

### Opsi B - MySQL di Container Terpisah

Jalankan MySQL di luar compose aplikasi:

```bash
docker run -d \
  --name rsud-mysql \
  --restart unless-stopped \
  -e MYSQL_DATABASE=db_ar_profile \
  -e MYSQL_USER=profile \
  -e MYSQL_PASSWORD=profile123 \
  -e MYSQL_ROOT_PASSWORD=root \
  -p 127.0.0.1:3306:3306 \
  -v rsud_mysql_data:/var/lib/mysql \
  mysql:8.4
```

Cek status:

```bash
docker ps --filter name=rsud-mysql
docker exec -it rsud-mysql mysql -uprofile -pprofile123 -e "SHOW DATABASES;"
```

Container ini independen dari `docker-compose.yaml` aplikasi.

## 3. Konfigurasi Environment

Dari root project:

```bash
cp .env.example .env
```

Ubah `.env` khusus untuk Docker:

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

`docker-compose.yaml` memakai `network_mode: host`, sehingga container aplikasi berbagi network dengan host. Artinya:

- `DB_HOST=127.0.0.1` dapat dipakai untuk MySQL native di host **atau** MySQL di container lain yang mem-publish port `3306` ke host.
- Gunakan `127.0.0.1`, bukan `localhost`, agar PHP memakai koneksi TCP dan tidak mencoba Unix socket yang tidak tersedia di container.

Jika database berada di server lain, cukup ganti `DB_HOST` dengan IP database tersebut:

```env
DB_HOST=10.0.0.212
DB_PORT=3306
```

`APP_PORT` adalah port tempat aplikasi listen langsung di host (tidak ada port mapping). `APP_URL` serta `SERVER_PORT` mengikuti nilai tersebut, jadi cukup ubah `APP_PORT` jika port `8000` sudah dipakai.

Jika host networking tidak tersedia di server, gunakan mode bridge sebagai fallback: hapus `network_mode: host`, tambahkan kembali port mapping dan `extra_hosts`, lalu set `DB_HOST=host.docker.internal` (MySQL di host) atau `DB_HOST=<nama-container>` dengan network bersama (MySQL di container).

Catatan: container membaca konfigurasi dari file `.env` yang di-mount ke `/var/www/html/.env`. Jika Anda mengubah `.env`, jalankan ulang container agar perubahan diterapkan:

```bash
docker compose up -d --force-recreate
```

## 4. Build dan Jalankan Aplikasi

```bash
docker compose build --no-cache
docker compose up -d
```

Cek container:

```bash
docker compose ps
docker compose logs -f rsud
```

Jika container sudah berjalan, buka `http://localhost:8000` (atau port sesuai `APP_PORT`). Jika aplikasi belum dikonfigurasi, lanjutkan ke langkah berikut.

## 5. Setup Pertama di Dalam Container

Generate application key:

```bash
docker compose exec rsud php artisan key:generate
```

Jalankan migrasi dan seluruh seeder:

```bash
docker compose exec rsud php artisan migrate --seed
```

`DatabaseSeeder` akan membuat admin, pengaturan situs RSUD, dokter, berita, kategori PKRS, post PKRS, dan galeri PKRS.

## 6. Storage Link

Symlink `public/storage` **tidak disertakan di repository** karena diabaikan oleh Git. Buat dengan path relatif di dalam container:

```bash
docker compose exec rsud sh -c 'rm -f public/storage && ln -s ../storage/app/public public/storage'
```

Verifikasi:

```bash
docker compose exec rsud ls -la public/storage
```

Gunakan symlink relatif agar tidak bergantung pada path host atau path container.

## 7. Bersihkan Cache

```bash
docker compose exec rsud php artisan optimize:clear
```

## 8. Akses Aplikasi

- Frontend: `http://localhost:8000` (atau port sesuai `APP_PORT`)
- Admin: `http://localhost:8000/admin/login` (atau port sesuai `APP_PORT`)
- Email: `admin@company.com`
- Password: `password`

Segera ganti password admin setelah login.

## 9. Log dan Stop

Lihat log:

```bash
docker compose logs -f rsud
```

Stop aplikasi:

```bash
docker compose down
```

Stop sekaligus menghapus container aplikasi (volume MySQL eksternal tidak terhapus):

```bash
docker compose down -v
```

## 10. Reset Database

Untuk mengulang dari database kosong:

```bash
docker compose exec rsud php artisan migrate:fresh --seed
```

Seluruh data dokter, berita, kategori PKRS, post PKRS, dan galeri akan dibuat ulang oleh `DatabaseSeeder`.

Untuk menghapus database MySQL eksternal:

```bash
docker exec -it rsud-mysql mysql -uroot -proot -e "
  DROP DATABASE IF EXISTS db_ar_profile;
  CREATE DATABASE db_ar_profile CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
"
```

Sesuaikan kredensial jika MySQL bukan container `rsud-mysql`.

## Catatan Dashboard

Halaman `/dashboard` menampilkan data kunjungan dari API SIMRS eksternal yang dikonfigurasi langsung di `public/js/chartkunjungan.js` dan `public/js/info.js`. Jika API tidak dapat diakses, KPI dan grafik akan tampil kosong. Container aplikasi harus memiliki akses jaringan ke API tersebut.

## Troubleshooting

### `SQLSTATE[HY000] [2002] Connection refused` atau `No such file or directory`

- Pastikan MySQL berjalan dan port `3306` terbuka atau dipublikasikan ke host.
- Pastikan `DB_HOST=127.0.0.1` (TCP), bukan `localhost`. Hostname `localhost` membuat PHP mencoba Unix socket yang tidak tersedia di container.
- Pastikan `docker-compose.yaml` memakai `network_mode: host` dan host networking aktif di Docker/Linux/Docker Desktop.
- Cek koneksi dari container:

```bash
docker compose exec rsud mysql -h 127.0.0.1 -u profile -pprofile123 -e "SELECT 1;"
```

### `Access denied for user 'profile'@'...'`

- Pastikan user MySQL memakai host `%` atau host yang sesuai dengan asal koneksi container.
- Pastikan password di `.env` sama dengan password MySQL.

### Host networking tidak aktif

Jika muncul error bahwa host networking tidak didukung:

- Di Docker Desktop, aktifkan host networking pada pengaturan Docker Desktop.
- Di Linux, gunakan Docker Engine yang mendukung `network_mode: host`.
- Jika tetap tidak tersedia, gunakan mode bridge sebagai fallback: hapus `network_mode: host`, tambahkan port mapping dan `extra_hosts`, lalu gunakan `DB_HOST=host.docker.internal` atau nama container MySQL pada network bersama.

### Permission denied pada `storage` atau `bootstrap/cache`

Container berjalan sebagai root dan dapat membuat file milik root di host. Perbaiki dari host:

```bash
sudo chown -R "$USER":"$USER" storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### Port 8000 sudah dipakai

Ubah `APP_PORT` di `.env`, misalnya menjadi `8001`:

```env
APP_PORT=8001
```

`APP_URL` dan `SERVER_PORT` akan mengikuti nilai tersebut. Jalankan ulang container dan bersihkan cache:

```bash
docker compose up -d --force-recreate
docker compose exec rsud php artisan optimize:clear
```

Tidak perlu mengubah `docker-compose.yaml`; aplikasi langsung listen di port `APP_PORT` pada host.

### `Vite manifest not found`

Asset build sudah tersedia di `public/build`. Jika folder tersebut hilang, jalankan di host:

```bash
npm install
npm run build
```

Atau build di container Node terpisah jika Node tidak tersedia di host.
