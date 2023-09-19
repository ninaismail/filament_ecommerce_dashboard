<?php

namespace App\Providers;

use App\Models\User;
use Gate;
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
    Gate::define('use-translation-manager', function (?User $user) {
        // Your authorization logic
        return $user !== null && $user->hasRole('admin');
    });
    }

}
