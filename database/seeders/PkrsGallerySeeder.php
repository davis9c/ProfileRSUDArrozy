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

                PkrsGallery::create([
                    'pkrs_post_id' => $post->id,
                    'image' => "dummy/gallery{$i}.jpg",
                    'sort_order' => $i,
                ]);

            }
        }
    }
}