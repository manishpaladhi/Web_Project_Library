<?php

namespace App\Providers;

use App\Articles\EloquentSearchRepository;
use App\Articles\SearchRepository;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * 
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * 
     */
    public function boot()
    {
        //
    }
}


