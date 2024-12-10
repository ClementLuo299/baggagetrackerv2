<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Gate::before(function($user,$ability) {
            return $user->hasRole('Admin') ? true : null;
        });

        if (true) {
            DB::listen(function ($query) {
                Log::info(
                    $query->sql, $query->bindings, $query->time
                );
            });
        }
    }
}
