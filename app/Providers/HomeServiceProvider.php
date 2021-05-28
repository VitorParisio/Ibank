<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Home\HomeDAO;
use Illuminate\Support\Facades\App;

class HomeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('home', function(){
            return new HomeDAO();
        });
    }
}
