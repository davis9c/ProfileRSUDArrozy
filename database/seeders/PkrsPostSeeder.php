<?php

namespace Database\Seeders;

use App\Models\PkrsCategory;
use App\Models\PkrsPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PkrsPostSeeder extends Seeder
{
    public function run(): void
    {
        $categories = PkrsCategory::all();

        if ($categories->isEmpty()) {
            $this->command->warn('Kategori PKRS belum ada. Jalankan PkrsCategorySeeder terlebih dahulu.');
            return;
        }

        foreach ($categories as $category) {

            $types = [
                'image',
                'image',
                'gallery',
                'gallery',
                'video',
            ];

            foreach ($types as $index => $type) {

                $number = $index + 1;

                $title = "Post PKRS {$category->name} {$number}";

                PkrsPost::updateOrCreate(
                    ['slug' => Str::slug($title)],
                    [
                        'pkrs_category_id' => $category->id,
                        'title' => $title,
                        'excerpt' => 'Ini adalah ringkasan edukasi kesehatan untuk kebutuhan dummy seeder.',
                        'content' => '
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <p>
                                Konten ini hanya digunakan sebagai data dummy PKRS.
                            </p>
                        ',
                        'thumbnail' => '/img/news/clinical' . (($index % 3) + 1) . '.jpg',
                        'type' => $type,
                        'video' => $type === 'video' ? '/vid/senin.mp4' : null,
                        'video_cover' => $type === 'video' ? '/img/news/clinical2.jpg' : null,
                        'featured' => $number === 1,
                        'is_published' => true,
                        'published_at' => now()->subDays(rand(1, 30)),
                    ]
                );
            }
        }
    }
}
