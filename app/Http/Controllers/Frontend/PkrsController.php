<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PkrsPost;
use Illuminate\Http\Request;

class PkrsController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | POSTS UNTUK HALAMAN / PAGINATION
        |--------------------------------------------------------------------------
        */
        $posts = PkrsPost::query()
            ->with([
                'category',
                'galleries' => function ($query) {
                    $query->orderBy('sort_order');
                },
            ])
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);


        /*
        |--------------------------------------------------------------------------
        | SEMUA POSTS UNTUK POPUP PKRS
        |--------------------------------------------------------------------------
        |
        | Tidak menggunakan paginate karena JavaScript membutuhkan
        | seluruh post untuk filter berdasarkan kategori.
        |
        */
        $allPosts = PkrsPost::query()
            ->with([
                'category',
                'galleries' => function ($query) {
                    $query->orderBy('sort_order');
                },
            ])
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->get();


        $title = 'PKRS - RSUD Ar Rozy';


        return view('frontend.pkrs', compact(
            'posts',
            'allPosts',
            'title'
        ));
    }


    public function show($id)
    {
        /*
        |--------------------------------------------------------------------------
        | DETAIL POST
        |--------------------------------------------------------------------------
        */
        $post = PkrsPost::query()
            ->with([
                'category',
                'galleries' => function ($query) {
                    $query->orderBy('sort_order');
                },
            ])
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | POSTS UNTUK HALAMAN
        |--------------------------------------------------------------------------
        */
        $posts = PkrsPost::query()
            ->with([
                'category',
                'galleries' => function ($query) {
                    $query->orderBy('sort_order');
                },
            ])
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);


        /*
        |--------------------------------------------------------------------------
        | SEMUA POSTS UNTUK POPUP
        |--------------------------------------------------------------------------
        */
        $allPosts = PkrsPost::query()
            ->with([
                'category',
                'galleries' => function ($query) {
                    $query->orderBy('sort_order');
                },
            ])
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->get();


        $title = 'PKRS - RSUD Ar Rozy';


        return view('frontend.pkrs', compact(
            'posts',
            'allPosts',
            'post',
            'title'
        ));
    }
}
