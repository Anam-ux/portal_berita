<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsView;
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

        $popularNews = News::withCount('views')
            ->orderBy('views_count', 'desc')
            ->take(4)
            ->get();

        return view('pages.home', compact('featured', 'latestNews', 'popularNews'));
    }
}
