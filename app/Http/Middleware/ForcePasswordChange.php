<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \App\Models\User|null $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user && $user->force_password_change) {
            // 1. Tentukan rute yang boleh diakses
            $allowedRoutes = [
                'filament.admin.auth.profile',
                'filament.admin.auth.logout',
                'filament.admin.auth.email-verification.prompt',
                'filament.admin.auth.email-verification.verify',
                'filament.admin.auth.email-verification.resend',
                'livewire.update',
                'livewire.upload-file',
                'livewire.preview-file',
            ];

            $routeName = $request->route()?->getName();

            // 2. Jika rute saat ini ada dalam daftar atau rute Livewire, biarkan lewat.
            if ($routeName && (in_array($routeName, $allowedRoutes) || str_starts_with($routeName, 'livewire.'))) {
                return $next($request);
            }

            // 3. Bypass untuk semua request Livewire dan aset Filament agar tidak macet.
            if ($request->is('livewire/*', 'filament/*') || $request->ajax() || $request->prefetch()) {
                return $next($request);
            }

            // 4. Cegah redirect berulang jika sudah berada di path /admin/profile atau /admin/email-verification
            if ($request->is('admin/profile*', 'admin/email-verification*')) {
                return $next($request);
            }

            // 5. Hanya redirect (alihkan) jika ini adalah navigasi utama (GET).
            if ($request->isMethod('GET')) {
                return redirect()->route('filament.admin.auth.profile');
            }
        }

        return $next($request);
    }
}
