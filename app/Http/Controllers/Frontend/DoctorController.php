<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\News;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index()
    {
        $rawatJalan = Doctor::with('schedules')
            ->where('category', 'rawat_jalan')
            ->where('is_active', 1)
            ->orderBy('id')
            ->get();

        $penunjang = Doctor::with('schedules')
            ->where('category', 'pelayanan_penunjang')
            ->where('is_active', 1)
            ->orderBy('id')
            ->get();

        return view('frontend.home', [
            'title' => 'RSUD Ar Rozy',
            'active' => 'home',

            'rawatJalan' => $rawatJalan,
            'penunjang'  => $penunjang,
        ]);
    }
}
