<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Filament\Admin\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default() // ⬅️ WAJIB di Filament v4
            ->id('admin')
            ->path('admin')
            ->login(\App\Filament\Admin\Pages\Auth\Login::class)
            ->passwordReset(resetAction: \App\Filament\Admin\Pages\Auth\ResetPassword::class)
            ->emailVerification()
            ->profile(\App\Filament\Admin\Pages\Auth\EditProfile::class)
            ->brandName('MBG Kota Bogor')
            ->brandLogo(fn() => view('components.filament.brand-logo'))
            ->favicon(asset('images/logo.png'))
            ->colors([
                'primary' => '#D1B06C',
                'gray' => Color::Slate,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth('full')
            ->discoverResources(
                in: app_path('Filament/Admin/Resources'),
                for: 'App\Filament\Admin\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Admin/Pages'),
                for: 'App\Filament\Admin\Pages'
            )
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(
                in: app_path('Filament/Admin/Widgets'),
                for: 'App\Filament\Admin\Widgets'
            )
            ->widgets([
                //
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                // our custom tab-checker must run while the session is active
                \App\Http\Middleware\EnsureTabIsActive::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \App\Http\Middleware\AuditLogMiddleware::class,
                // Security middleware
                \App\Http\Middleware\EnforcePasswordExpiry::class,
                \App\Http\Middleware\SingleDeviceLogin::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                \App\Http\Middleware\ForcePasswordChange::class,
            ]);
    }
}
