<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Login\LoginDAO;
use Illuminate\Support\Facades\App;

class LoginServiceProvider extends ServiceProvider
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
        App::bind('login', function(){
            return new LoginDAO();
        });
    }
}
