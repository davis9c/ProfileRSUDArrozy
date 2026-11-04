<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\News;
use App\Models\PkrsPost;

class HomeController extends Controller
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

        $latestNews = News::with(['images' => function ($query) {
            $query->orderBy('order')->orderBy('id');
        }])
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();
        $latestPkrsPosts = PkrsPost::with('category')
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('frontend.home', [
            'title'           => 'RSUD Ar Rozy',
            'active'          => 'home',
            'rawatJalan'      => $rawatJalan,
            'penunjang'       => $penunjang,
            'latestNews'      => $latestNews,
            'latestPkrsPosts' => $latestPkrsPosts,
        ]);
    }
}
