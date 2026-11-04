<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsData = [
            [
                'title' => 'RSUD Ar Rozy Kembangkan e-Clinical Pathway "CP SMART OZY" untuk Perkuat Kendali Mutu dan Biaya Pelayanan',
                'category' => 'Kegiatan',
                'content' => '<p>RSUD Ar Rozy Kota Probolinggo terus berkomitmen meningkatkan mutu pelayanan kesehatan melalui transformasi digital. Salah satu langkah strategis yang dilakukan adalah penyelenggaraan Bimbingan Teknis Penyusunan, Penerapan, dan Evaluasi Clinical Pathways Diagnosa Multipel pada 19–20 Mei 2025 di Ruang Pertemuan RSUD Ar Rozy.</p><p>Kegiatan ini diikuti oleh seluruh dokter penanggung jawab pelayanan (DPJP) dan tim mutu rumah sakit, dengan tujuan menyeragamkan standar pelayanan sekaligus mengendalikan biaya perawatan pasien.</p><p>Melalui sistem e-Clinical Pathway "CP SMART OZY", diharapkan proses pelayanan medis menjadi lebih terstruktur, terukur, dan efisien tanpa mengurangi kualitas perawatan kepada pasien.</p>',
                'thumbnail' => '/img/news/clinical.jpg',
                'author' => 'Admin RSUD',
                'status' => 'published',
                'featured' => true,
                'views' => 324,
            ],
            [
                'title' => 'Pelayanan Kesehatan Masyarakat Semakin Optimal dengan Layanan Terpadu',
                'category' => 'Kegiatan',
                'content' => '<p>Dalam rangka meningkatkan kualitas pelayanan kepada masyarakat, RSUD Ar Rozy menghadirkan sistem layanan terpadu satu pintu yang memudahkan pasien dalam proses pendaftaran, pemeriksaan, hingga pengambilan obat.</p><p>Inovasi ini diharapkan dapat memangkas waktu tunggu pasien secara signifikan dan meningkatkan kepuasan masyarakat terhadap layanan kesehatan di Kota Probolinggo.</p>',
                'thumbnail' => '/img/news/clinical1.jpg',
                'author' => 'Admin RSUD',
                'status' => 'published',
                'featured' => false,
                'views' => 218,
            ],
            [
                'title' => 'Sosialisasi Pencegahan Stunting bagi Ibu Hamil dan Balita',
                'category' => 'Kesehatan',
                'content' => '<p>RSUD Ar Rozy bekerja sama dengan Dinas Kesehatan Kota Probolinggo menggelar sosialisasi pencegahan stunting yang menyasar ibu hamil dan orang tua balita. Kegiatan ini bertujuan meningkatkan kesadaran masyarakat akan pentingnya asupan gizi seimbang pada 1000 hari pertama kehidupan.</p><p>Dalam kegiatan tersebut, tim gizi rumah sakit turut memberikan edukasi mengenai pola makan sehat dan pemantauan tumbuh kembang anak secara berkala.</p>',
                'thumbnail' => '/img/news/clinical2.jpg',
                'author' => 'Tim Humas',
                'status' => 'published',
                'featured' => false,
                'views' => 156,
            ],
            [
                'title' => 'Peningkatan Kapasitas Tenaga Medis Melalui Pelatihan BTCLS',
                'category' => 'Pelatihan',
                'content' => '<p>Sebagai upaya meningkatkan kompetensi tenaga medis dalam penanganan kegawatdaruratan, RSUD Ar Rozy mengadakan pelatihan Basic Trauma Cardiac Life Support (BTCLS) bagi perawat dan tenaga kesehatan lainnya.</p><p>Pelatihan ini menghadirkan instruktur bersertifikat nasional dan diikuti oleh puluhan peserta dari berbagai unit pelayanan rumah sakit.</p>',
                'thumbnail' => '/img/news/clinical3.jpg',
                'author' => 'Tim Diklat',
                'status' => 'published',
                'featured' => false,
                'views' => 189,
            ],
            [
                'title' => 'RSUD Ar Rozy Raih Predikat Akreditasi Paripurna',
                'category' => 'Prestasi',
                'content' => '<p>Kabar membanggakan datang dari RSUD Ar Rozy Kota Probolinggo yang berhasil meraih predikat Akreditasi Paripurna dari Komisi Akreditasi Rumah Sakit (KARS). Pencapaian ini merupakan hasil kerja keras seluruh jajaran manajemen dan tenaga kesehatan dalam memenuhi standar mutu pelayanan nasional.</p><p>Predikat ini diharapkan semakin meningkatkan kepercayaan masyarakat terhadap layanan kesehatan yang diberikan.</p>',
                'thumbnail' => '/img/news/clinical1.jpg',
                'author' => 'Admin RSUD',
                'status' => 'published',
                'featured' => false,
                'views' => 412,
            ],
            [
                'title' => 'Layanan Skrining Kesehatan Gratis untuk Lansia',
                'category' => 'Kesehatan',
                'content' => '<p>Dalam rangka memperingati Hari Lanjut Usia Nasional, RSUD Ar Rozy membuka layanan skrining kesehatan gratis bagi warga lansia di wilayah Kota Probolinggo. Pemeriksaan meliputi tekanan darah, gula darah, dan kolesterol.</p><p>Kegiatan ini disambut antusias oleh masyarakat dan diharapkan dapat menjadi agenda rutin setiap tahunnya.</p>',
                'thumbnail' => '/img/news/clinical2.jpg',
                'author' => 'Tim Humas',
                'status' => 'published',
                'featured' => false,
                'views' => 275,
            ],
            [
                'title' => 'Penambahan Fasilitas Ruang Rawat Inap Kelas III',
                'category' => 'Fasilitas',
                'content' => '<p>Guna meningkatkan akses layanan bagi masyarakat kurang mampu, RSUD Ar Rozy resmi menambah kapasitas ruang rawat inap kelas III. Penambahan fasilitas ini merupakan bagian dari komitmen rumah sakit dalam mendukung program Jaminan Kesehatan Nasional (JKN).</p>',
                'thumbnail' => '/img/news/clinical3.jpg',
                'author' => 'Admin RSUD',
                'status' => 'published',
                'featured' => false,
                'views' => 198,
            ],
            [
                'title' => 'Edukasi Cuci Tangan Pakai Sabun untuk Siswa Sekolah Dasar',
                'category' => 'Edukasi',
                'content' => '<p>Tim promosi kesehatan RSUD Ar Rozy mengunjungi beberapa sekolah dasar di Kota Probolinggo untuk memberikan edukasi pentingnya cuci tangan pakai sabun sebagai upaya pencegahan penyakit menular.</p><p>Kegiatan ini dikemas secara interaktif dan menyenangkan agar mudah dipahami oleh anak-anak.</p>',
                'thumbnail' => '/img/news/clinical1.jpg',
                'author' => 'Tim Promkes',
                'status' => 'published',
                'featured' => false,
                'views' => 143,
            ],
            [
                'title' => 'Rencana Pengembangan Layanan Hemodialisa Tahap Kedua',
                'category' => 'Kegiatan',
                'content' => '<p>RSUD Ar Rozy tengah mempersiapkan pengembangan tahap kedua layanan hemodialisa guna memenuhi tingginya kebutuhan pasien cuci darah di wilayah Probolinggo dan sekitarnya. Penambahan mesin dan tenaga medis terlatih menjadi fokus utama dalam pengembangan ini.</p>',
                'thumbnail' => '/img/news/clinical2.jpg',
                'author' => 'Admin RSUD',
                'status' => 'published',
                'featured' => false,
                'views' => 231,
            ],
        ];

        foreach ($newsData as $data) {
            News::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'excerpt' => Str::limit(strip_tags($data['content']), 150),
                    'thumbnail' => $data['thumbnail'],
                    'category' => $data['category'],
                    'author' => $data['author'],
                    'status' => $data['status'],
                    'featured' => $data['featured'],
                    'views' => $data['views'],
                    'meta_title' => $data['title'],
                    'meta_description' => Str::limit(strip_tags($data['content']), 160),
                    'meta_keywords' => $data['category'] . ', RSUD Ar Rozy, Kesehatan Probolinggo',
                    'published_at' => now()->subDays(rand(0, 30)),
                ]
            );
        }
    }
}