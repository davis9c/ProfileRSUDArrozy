<?php

namespace Database\Seeders;

use App\Models\PkrsGallery;
use App\Models\PkrsPost;
use Illuminate\Database\Seeder;

class PkrsGallerySeeder extends Seeder
{
    public function run(): void
    {
        $posts = PkrsPost::where('type', 'gallery')->get();

        foreach ($posts as $post) {

            for ($i = 1; $i <= 5; $i++) {

                PkrsGallery::updateOrCreate(
                    [
                        'pkrs_post_id' => $post->id,
                        'sort_order' => $i,
                    ],
                    [
                        'image' => '/img/news/clinical' . (($i - 1) % 3 + 1) . '.jpg',
                    ]
                );

            }
        }
    }
}
