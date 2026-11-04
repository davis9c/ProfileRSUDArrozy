<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\News;
use App\Models\PkrsPost;
use App\Models\PkrsCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'doctors' => Doctor::count(),
            'active_doctors' => Doctor::where('is_active', 1)->count(),
            'news' => News::count(),
            'published_news' => News::where('status', 'published')->count(),
            'draft_news' => News::where('status', 'draft')->count(),
            'pkrs_posts' => PkrsPost::count(),
            'pkrs_categories' => PkrsCategory::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
