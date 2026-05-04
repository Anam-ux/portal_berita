<?php

namespace App\Http\Controllers;
use App\Models\NewsView;

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
        $userIp =\request()->ip();
        $today = now()->toDateString();
        $hasViewed = NewsView::where('news_id', $news->id)
            ->where('ip_address', request()->ip())
            ->where('viewed_at', 'like', $today . '%')
            ->exists();
        if (!$hasViewed) {
            NewsView::create([
                'news_id' => $news->id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'viewed_at' => now(),
            ]);
        }
        return view('pages.detail', compact('news', 'relatedNews'));
    }
}
