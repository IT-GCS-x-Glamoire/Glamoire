<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;
use App\Models\Brand;


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
        View::composer('user.layouts.navbar', function ($view) {
            $categories = CategoryProduct::all();
            $brands     = Brand::all();
            $view->with('categories', $categories)->with('brands', $brands);
        });
    }
}
