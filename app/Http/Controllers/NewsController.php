<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = News::with('tags')->where('slug', $slug)->firstOrFail();

        $relatedNews = News::where('id', '!=', $news->id)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.detail', compact('news', 'relatedNews'));
    }
}
