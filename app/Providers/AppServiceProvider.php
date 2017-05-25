<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use App\User;
use Auth;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $client = User::find(Auth::id());
        View::share('client', $client);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
