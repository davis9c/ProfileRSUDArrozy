<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = CompanySetting::first() ?? new CompanySetting();

        $settings->fill([
            'company_name' => 'RSUD Ar Rozy',
            'tagline' => 'Melayani dengan Sepenuh Hati',
            'description' => 'RSUD Ar Rozy Kota Probolinggo adalah rumah sakit umum daerah yang berkomitmen memberikan pelayanan kesehatan bermutu bagi masyarakat.',
            'email' => 'rsudarrozy@probolinggokota.go.id',
            'phone' => '(0335) 4490009',
            'address' => 'Kota Probolinggo, Jawa Timur',
            'facebook' => config('ppid.facebook'),
            'instagram' => config('ppid.instagram'),
            'twitter' => null,
            'linkedin' => null,
            'youtube' => null,
            'whatsapp' => '+6281131196002',
        ]);

        $settings->save();
    }
}
