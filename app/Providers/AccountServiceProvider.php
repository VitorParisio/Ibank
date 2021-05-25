<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Account\AccountDAO;
use Illuminate\Support\Facades\App;

class AccountServiceProvider extends ServiceProvider
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
        App::bind('account', function(){
            return new AccountDAO();
        });
    }
}
