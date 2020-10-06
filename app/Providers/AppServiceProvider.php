<?php

namespace App\Providers;
use App\Models\category;
use App\Models\skill;
use App\Models\page;



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
        Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories',category::get());
        view()->share('skills',skill::get());
        view()->share('pages',page::get());


    }
}
