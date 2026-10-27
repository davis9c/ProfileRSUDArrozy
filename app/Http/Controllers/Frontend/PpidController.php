<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PpidController extends Controller
{

    public function index()
    {
        return view('frontend.ppid', [
            'title' => 'PPID | RSUD Ar Rozy'
        ]);
    }

}