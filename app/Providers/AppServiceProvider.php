<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Listeners\LogSuccessfulLogin;
use App\Listeners\LogSuccessfulLogout;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Models\Berita;
use App\Models\Sasaran;
use App\Models\FAQ;
use App\Models\Regulasi;
use App\Models\DataPenyaluran;
use App\Models\Kolaborasi;
use App\Models\Kategori;
use App\Models\User;
use App\Observers\GlobalModelObserver;

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
        VerifyEmail::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });

        // Listen to login event
        Event::listen(
            Login::class,
            LogSuccessfulLogin::class,
        );

        // Listen to logout event
        Event::listen(
            Logout::class,
            LogSuccessfulLogout::class,
        );

        // Register Observers for Activity Logging
        Berita::observe(GlobalModelObserver::class);
        Sasaran::observe(GlobalModelObserver::class);
        FAQ::observe(GlobalModelObserver::class);
        Regulasi::observe(GlobalModelObserver::class);
        DataPenyaluran::observe(GlobalModelObserver::class);
        Kolaborasi::observe(GlobalModelObserver::class);
        Kategori::observe(GlobalModelObserver::class);
        User::observe(GlobalModelObserver::class);
    }
}
