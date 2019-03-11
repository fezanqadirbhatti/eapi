<?php

namespace App\Providers;

use App\Repository\Category\CategoryEloquent;
use App\Repository\Category\CategoryRepository;
use App\Repository\Product\ProductEloquent;
use App\Repository\Product\ProductRepository;
use App\Repository\Review\ReviewEloquent;
use App\Repository\Review\ReviewRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductRepository::class, ProductEloquent::class);
        $this->app->singleton(ReviewRepository::class, ReviewEloquent::class);
        $this->app->singleton(CategoryRepository::class, CategoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
