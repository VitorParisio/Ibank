<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Register\RegisterDAO;
use Illuminate\Support\Facades\App;

class RegisterServiceProvider extends ServiceProvider
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
        App::bind('register', function(){
            return new RegisterDAO();
        });
    }
}
