<?php

namespace Database\Seeders;

use App\Models\NewsImage;
use Illuminate\Database\Seeder;

class NewsImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'news_id' => 1,
                'image_path' => '/img/news/clinical-news1.jpg',
                'caption' => 'Suasana Bimbingan Teknis Penyusunan Clinical Pathways di RSUD Ar Rozy.',
                'order' => 1,
            ],
            [
                'news_id' => 1,
                'image_path' => '/img/news/clinical-news2.jpg',
                'caption' => 'Tim DPJP dan tenaga mutu rumah sakit mengikuti sesi evaluasi Clinical Pathways.',
                'order' => 2,
            ],
        ];

        foreach ($images as $image) {
            NewsImage::create($image);
        }
    }
}