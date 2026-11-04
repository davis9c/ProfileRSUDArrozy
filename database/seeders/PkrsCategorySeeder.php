<?php

namespace Database\Seeders;

use App\Models\PkrsCategory;
use Illuminate\Database\Seeder;

class PkrsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Quotes', 'slug' => 'quotes', 'icon' => 'fa-quote-left'],
            ['name' => 'Promosi Kesehatan', 'slug' => 'promosi-kesehatan', 'icon' => 'fa-bullhorn'],
            ['name' => 'Artikel Kesehatan', 'slug' => 'artikel-kesehatan', 'icon' => 'fa-newspaper'],
            ['name' => 'Kegiatan PKRS', 'slug' => 'kegiatan-pkrs', 'icon' => 'fa-calendar-check'],
        ];

        foreach ($categories as $category) {
            PkrsCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
