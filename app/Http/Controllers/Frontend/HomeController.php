<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\News;
use App\Models\PkrsPost;
use Illuminate\Support\Facades\Route;

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

        // 1. Ambil 1 Berita Terbaru & 1 Kegiatan PKRS Terbaru
        $heroLatestNews = News::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->first();

        $heroLatestPkrs = PkrsPost::where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->first();

        $heroNewsList = collect();

        // 2. Format Data Berita
        if ($heroLatestNews) {
            $heroNewsList->push((object) [
                'title'          => $heroLatestNews->title,
                'thumbnail_url'  => $heroLatestNews->thumbnail_url ?? null,
                'category_label' => 'Berita Terbaru',
                'published_at'   => $heroLatestNews->published_at,
                'url'            => Route::has('news.show')
                    ? route('news.show', $heroLatestNews->slug)
                    : url('/news/' . $heroLatestNews->slug),
            ]);
        }

        // 3. Format Data PKRS (Disesuaikan dengan kolom 'thumbnail' dari Seeder)
        if ($heroLatestPkrs) {
            $pkrsImage = null;

            if (!empty($heroLatestPkrs->thumbnail)) {
                // Jika sudah berupa URL lengkap (misal http/https)
                if (filter_var($heroLatestPkrs->thumbnail, FILTER_VALIDATE_URL)) {
                    $pkrsImage = $heroLatestPkrs->thumbnail;
                } else {
                    // Jika tersimpan path relatif (seperti 'dummy/gallery1.jpg')
                    // Cek jika file ada di storage, gunakan Storage::url(), jika tidak gunakan asset()
                    $pkrsImage = asset('storage/' . $heroLatestPkrs->thumbnail);
                }
            } elseif (!empty($heroLatestPkrs->video_cover)) {
                // Fallback jika berupa postingan video
                $pkrsImage = filter_var($heroLatestPkrs->video_cover, FILTER_VALIDATE_URL)
                    ? $heroLatestPkrs->video_cover
                    : asset('storage/' . $heroLatestPkrs->video_cover);
            }

            $heroNewsList->push((object) [
                'title'          => $heroLatestPkrs->title,
                'thumbnail_url'  => $pkrsImage,
                'category_label' => 'Kegiatan PKRS',
                'published_at'   => $heroLatestPkrs->published_at,
                'url'            => Route::has('pkrs.show')
                    ? route('pkrs.show', $heroLatestPkrs->slug ?? $heroLatestPkrs->id)
                    : url('/pkrs/' . ($heroLatestPkrs->slug ?? $heroLatestPkrs->id)),
            ]);
        }

        // 4. Urutkan berdasarkan tanggal rilis paling baru
        $heroNewsList = $heroNewsList->sortByDesc('published_at')->values();

        return view('frontend.home', [
            'title'           => 'RSUD Ar Rozy',
            'active'          => 'home',
            'rawatJalan'      => $rawatJalan,
            'penunjang'       => $penunjang,
            'latestNews'      => $latestNews,
            'latestPkrsPosts' => $latestPkrsPosts,
            'heroNewsList'    => $heroNewsList,
        ]);
    }
}
