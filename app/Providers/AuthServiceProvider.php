<?php

namespace App\Providers;
use User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-category', function ($user, $category) {
            //return $user->owns($category);
            return $user->id == $category->user_id;
        });

        Gate::define('show-product', function ($user, $products) {
           
            return $user->id == $products->user_id;
        });

        Gate::define('show-ingredient', function ($user, $ingredient) {
            
            return $user->id == $ingredient->user_id;
        });

    }
}
