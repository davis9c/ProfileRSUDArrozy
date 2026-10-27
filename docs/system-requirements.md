# System Requirements

Dokumen ini berisi kebutuhan sistem minimum dan rekomendasi untuk menjalankan aplikasi RSUD Ar Rozy.

## Requirement Minimum dan Rekomendasi

| Komponen | Minimum | Rekomendasi |
|---|---|---|
| Sistem operasi | Linux Ubuntu 22.04 / Debian 12 | Ubuntu 24.04 LTS |
| PHP | 8.2 | 8.5 |
| Composer | 2.7 | Composer 2.x terbaru |
| MySQL | 8.0 | MySQL 8.4 |
| Node.js | 20.19 atau 22.12 | Node.js 22 LTS |
| npm | 10 | npm terbaru |
| Docker Engine | 24 | versi terbaru |
| Docker Compose | v2.20 | versi terbaru |
| Git | 2.30 | versi terbaru |
| RAM | 2 GB | 4 GB atau lebih |
| Ruang disk | 2 GB | 5 GB atau lebih |
| Port aplikasi | 8000 | 8000 (dapat diubah via `APP_PORT`) |
| Port MySQL | 3306 | 3306 |

Node.js dan npm bersifat opsional untuk menjalankan aplikasi, karena asset Vite hasil build sudah tersedia di `public/build`. Keduanya diperlukan jika Anda ingin mengubah CSS/JavaScript atau menjalankan Vite dev server.

## Ekstensi PHP yang Dibutuhkan

Ekstensi berikut harus aktif:

- `bcmath`
- `ctype`
- `curl`
- `dom`
- `fileinfo`
- `filter`
- `gd`
- `hash`
- `mbstring`
- `openssl`
- `pcre`
- `pdo`
- `pdo_mysql`
- `session`
- `tokenizer`
- `xml`
- `zip`

Ekstensi opsional:

- `exif` untuk metadata gambar
- `intl` untuk dukungan internasionalisasi tambahan
- `pcntl` untuk queue worker

## Verifikasi Environment

Jalankan perintah berikut untuk memastikan semua kebutuhan terpenuhi:

```bash
php -v
php -m | grep -E 'bcmath|ctype|curl|dom|fileinfo|filter|gd|hash|mbstring|openssl|pcre|pdo|pdo_mysql|session|tokenizer|xml|zip'
composer -V
mysql --version
node -v
npm -v
docker --version
docker compose version
git --version
```

Jika ada ekstensi yang belum aktif, install paket PHP yang sesuai. Contoh untuk Ubuntu/Debian:

```bash
sudo apt install -y php8.5-mysql php8.5-mbstring php8.5-xml php8.5-curl php8.5-gd php8.5-zip php8.5-bcmath
```

Sesuaikan `php8.5` dengan versi PHP yang terpasang.

## Kebutuhan Port Aplikasi

Port aplikasi dikonfigurasi melalui `.env`:

```env
APP_PORT=8000
APP_URL=http://localhost:${APP_PORT}
SERVER_PORT="${APP_PORT}"
```

`APP_PORT` adalah nilai utama. `APP_URL` dan `SERVER_PORT` mengikuti nilai tersebut, sehingga cukup ubah `APP_PORT` jika port `8000` sudah dipakai. Untuk Docker, `docker-compose.yaml` memetakan `APP_PORT` ke port container yang sama.

## Kebutuhan Database

Aplikasi menggunakan MySQL dengan konfigurasi default:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_ar_profile
DB_USERNAME=profile
DB_PASSWORD=profile123
```

Untuk instalasi Docker, MySQL dijalankan secara eksternal (di host atau container terpisah). Konfigurasi `DB_HOST` pada mode Docker menggunakan `host.docker.internal`.

## Kebutuhan Jaringan

- Aplikasi diakses melalui `http://localhost:${APP_PORT}`. Dengan nilai default, alamatnya `http://localhost:8000`.
- MySQL harus dapat diakses dari aplikasi.
- Jika aplikasi berjalan di Docker dan MySQL berjalan native di host Linux, pastikan MySQL mendengarkan koneksi dari container. Jika MySQL hanya bind ke `127.0.0.1`, container tidak dapat terhubung. Gunakan `bind-address = 0.0.0.0` atau jalankan MySQL di container terpisah dengan port `3306` dipublikasikan.
- Jika memakai CDN untuk font/icon (Google Fonts, Font Awesome, Swiper), koneksi internet diperlukan agar tampilan ikon dan font sempurna. Aplikasi tetap dapat berjalan tanpa CDN tersebut.

## Catatan Produksi

Konfigurasi di atas ditujukan untuk pengembangan lokal. Untuk production:

- Set `APP_ENV=production` dan `APP_DEBUG=false`.
- Gunakan password database yang kuat.
- Arahkan web server ke folder `public/`.
- Jalankan `npm run build` dan `php artisan optimize`.
- Jangan expose port MySQL ke publik.
