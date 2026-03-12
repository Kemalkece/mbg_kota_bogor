<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::serving(function () {
            // Previously we pushed a middleware and included a custom JS asset
            // to enforce a "single tab" restriction.  That mechanism regenerated
            // the session on each activation call, which led to CSRF tokens
            // expiring mid-edit and produced "page has expired" errors.  The
            // deduplication logic is no longer needed, so we avoid registering it
            // at all.
            //
            // $this->app['router']->pushMiddlewareToGroup('web', \App\Http\Middleware\EnsureTabIsActive::class);
            // FilamentAsset::register([
            //     Js::make('admin-single-tab', asset('js/admin-single-tab.js')),
            // ]);
            //
            // FilamentAsset::registerScriptData([
            //     'logoutUrl' => Filament::getLogoutUrl(),
            // ]);

        });
    }
}
