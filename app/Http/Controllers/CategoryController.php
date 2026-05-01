<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $newsList = News::where('category_id', $category->id)
            ->latest()
            ->paginate(6);

        return view('pages.category', compact('category', 'newsList'));
    }
}
