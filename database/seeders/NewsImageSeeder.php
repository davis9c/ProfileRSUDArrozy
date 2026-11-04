<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Database\Seeder;

class NewsImageSeeder extends Seeder
{
    public function run(): void
    {
        $news = News::where('slug', 'rsud-ar-rozy-kembangkan-e-clinical-pathway-cp-smart-ozy-untuk-perkuat-kendali-mutu-dan-biaya-pelayanan')->first();

        if (! $news) {
            $this->command->warn('Berita utama belum ada. Jalankan NewsSeeder terlebih dahulu.');
            return;
        }

        $images = [
            [
                'image_path' => '/img/news/clinical-news1.jpg',
                'caption' => 'Suasana Bimbingan Teknis Penyusunan Clinical Pathways di RSUD Ar Rozy.',
                'order' => 1,
            ],
            [
                'image_path' => '/img/news/clinical-news2.jpg',
                'caption' => 'Tim DPJP dan tenaga mutu rumah sakit mengikuti sesi evaluasi Clinical Pathways.',
                'order' => 2,
            ],
        ];

        foreach ($images as $image) {
            NewsImage::updateOrCreate(
                [
                    'news_id' => $news->id,
                    'order' => $image['order'],
                ],
                $image
            );
        }
    }
}
