<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\DoctorSchedule;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $doctors = [

            [
                'name' => 'dr. Novita Lavi Nikmah, Sp.PD',
                'clinic' => 'Klinik Penyakit Dalam',
                'photo' => 'dr. Novita Lavi Nikmah, Sp. PD.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Selasa', '09:00', '11:00'],
                    ['Rabu', '09:00', '11:00'],
                ]
            ],

            [
                'name' => 'dr. Dicky Febrianto, Sp.PD',
                'clinic' => 'Klinik Penyakit Dalam',
                'photo' => 'dr. Dicky Febrianto, Sp.PD.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Selasa', '08:00', '11:00'],
                    ['Rabu', '08:00', '13:00'],
                    ['Jumat', '08:30', '13:00'],
                ]
            ],

            [
                'name' => 'dr. Eliza L. Pramugaria, Sp.PD., FINASIM',
                'clinic' => 'Klinik Penyakit Dalam',
                'photo' => 'dr. Elieza L Pramugaria, Sp. PD.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Senin', '08:30', '13:00'],
                    ['Kamis', '08:30', '13:00'],
                    ['Jumat', '08:00', '11:00'],
                ]
            ],

            [
                'name' => 'dr. Mohammad Ali Yusni, Sp.B. FINACS',
                'clinic' => 'Klinik Bedah',
                'photo' => 'dr. Mohammad Ali Yusni Sp.B.FINACS.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Selasa', '08:30', '13:00'],
                ]
            ],

            [
                'name' => 'dr. Abraar HS Kuddah, M.Si.,Med.,Sp.B',
                'clinic' => 'Klinik Bedah',
                'photo' => 'dr. Abraar HS Kuddah, M.Si.,Med.,Sp.B.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Senin', '08:30', '13:00'],
                    ['Rabu', '08:30', '13:00'],
                ]
            ],

            [
                'name' => 'dr. Risa Yolanda Matullesy, Sp.B',
                'clinic' => 'Klinik Bedah',
                'photo' => 'dr. Risa Yolanda Matullessy, Sp.B.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Kamis', '08:30', '13:00'],
                    ['Jumat', '08:00', '11:00'],
                ]
            ],

            [
                'name' => 'dr. Maria Diah Zakiyah, Sp.OG, M.H.',
                'clinic' => 'Klinik Kebidanan & Kandungan',
                'photo' => 'dr. Maria Diah Zakiyah, Sp.OG.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Selasa', '08:30', '13:00'],
                    ['Kamis', '08:30', '13:00'],
                    ['Jumat', '08:00', '11:00'],
                ]
            ],

            [
                'name' => 'dr. Adrian Yusdianto Sp.P',
                'clinic' => 'Klinik Paru',
                'photo' => 'dr. Adrian Yusdianto Sp.P.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Senin', '08:00', '11:00'],
                    ['Jumat', '08:00', '11:00'],
                ]
            ],

            [
                'name' => 'dr. Muhammad Andrie Wibowo Sp.OT',
                'clinic' => 'Klinik Orthopaedi & Traumatologi',
                'photo' => 'dr. Muhammad Andrie Wibowo Sp.OT.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Selasa', '08:00', '11:00'],
                    ['Jumat', '07:30', '09:30'],
                ]
            ],

            [
                'name' => 'dr. Normayanti, Sp.KG',
                'clinic' => 'Klinik Konservasi Gigi',
                'photo' => 'drg. Normayanti, Sp.KG.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Selasa', '10:30', '12:00'],
                    ['Jumat', '10:00', '11:30'],
                ]
            ],

            [
                'name' => 'dr. Cik Kahadi, Sp.JP.,FIHA',
                'clinic' => 'Klinik Jantung & Pembuluh Darah',
                'photo' => 'dr. Cik Kahadi, Sp.JP.,FIHA.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Selasa', '07:30', '09:30'],
                    ['Jumat', '07:30', '09:30'],
                ]
            ],

            [
                'name' => 'dr. Dwi Agustina Ramadani, Sp.A',
                'clinic' => 'Klinik Anak',
                'photo' => 'dr dwi agustina.png',
                'category' => 'rawat_jalan',
                'schedule' => [
                    ['Senin', '07:30', '08:50'],
                    ['Rabu', '07:30', '08:50'],
                    ['Jumat', '07:30', '08:50'],
                ]
            ],

            // ===============================
            // Pelayanan Penunjang
            // ===============================

            [
                'name' => 'dr. Lilis Catur Setyawati, Sp.Rad',
                'clinic' => 'Instalasi Radiologi',
                'photo' => 'dr. Lilis Catur Setyawati, Sp.Rad.png',
                'category' => 'pelayanan_penunjang',
                'schedule' => []
            ],

            [
                'name' => 'dr. Boby Mulyadi, Sp.PK',
                'clinic' => 'Instalasi Laboratorium',
                'photo' => 'dr. Boby Mulyadi, Sp.PK.png',
                'category' => 'pelayanan_penunjang',
                'schedule' => []
            ],

            [
                'name' => 'dr. Pandu Suprobo Sp.An.TI',
                'clinic' => 'Dokter Anestesi',
                'photo' => 'dr pandu.png',
                'category' => 'pelayanan_penunjang',
                'schedule' => []
            ],

            [
                'name' => 'Instalasi Farmasi',
                'clinic' => 'Instalasi Farmasi',
                'photo' => 'instfar.png',
                'category' => 'pelayanan_penunjang',
                'schedule' => []
            ],

        ];

        foreach ($doctors as $item) {

            $doctor = Doctor::updateOrCreate(
                ['name' => $item['name']],
                [
                    'clinic' => $item['clinic'],
                    'photo' => $item['photo'],
                    'category' => $item['category'],
                    'is_active' => true,
                ]
            );

            $doctor->schedules()->delete();

            foreach ($item['schedule'] as $schedule) {

                DoctorSchedule::create([
                    'doctor_id' => $doctor->id,
                    'day' => $schedule[0],
                    'start_time' => $schedule[1],
                    'end_time' => $schedule[2],
                ]);
            }
        }
    }
}
