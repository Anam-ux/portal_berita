<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('partials.navbar', function ($view) {
            $categories = Category::orderBy('name', 'asc')->get();
            $view->with('categories', $categories);
        });
    }
}
