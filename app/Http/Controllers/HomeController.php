<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // berita utama
        $featured = News::latest()
            ->first();
        // berita terbaru
        $latestNews = News::latest()
            ->get();

        return view('pages.home', compact('featured', 'latestNews'));
    }
}
