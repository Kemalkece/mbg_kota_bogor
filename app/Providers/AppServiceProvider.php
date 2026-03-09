<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Listeners\LogSuccessfulLogin;
use App\Listeners\LogSuccessfulLogout;

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
        // Listen to login event
        \Illuminate\Support\Facades\Event::listen(
            Login::class,
            LogSuccessfulLogin::class,
        );

        // Listen to logout event
        \Illuminate\Support\Facades\Event::listen(
            Logout::class,
            LogSuccessfulLogout::class,
        );
    }
}
