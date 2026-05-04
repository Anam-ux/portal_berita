<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Banner;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('categories', Category::all());

        // bannner iklan
        $today = now()->toDateString();

        // tarik banner yang aktif dan sesuai dengan tanggal hari ini
        $activeBanners = Banner::where('is_active', true)
            ->where(function ($query) use ($today) {
                $query->whereNull('start_date')->orWhere('start_date', '<=', $today);
            })
            ->where(function ($query) use ($today) {
                $query->whereNull('end_date')->orWhere('end_date', '>=', $today);
            })
            ->get()
            ->groupBy('position'); // kelompokkan berdasarkan posisi

        View::share('activeBanners', $activeBanners);
    }
}
