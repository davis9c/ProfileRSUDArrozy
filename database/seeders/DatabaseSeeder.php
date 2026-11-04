<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@company.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            CompanySettingSeeder::class,
            DoctorSeeder::class,
            NewsSeeder::class,
            NewsImageSeeder::class,
            PkrsCategorySeeder::class,
            PkrsPostSeeder::class,
            PkrsGallerySeeder::class,
        ]);
    }
}
