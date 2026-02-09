<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // Dá acesso total ao ADMIN independente da permissão definida na rota
        Gate::before(function ($user, $ability) {
            return $user->hasRole('ADMIN') ? true : null;
        });
    }
}
