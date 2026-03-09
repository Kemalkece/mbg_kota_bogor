<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EnforcePasswordExpiry
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check jika password sudah tidak diubah selama 1 tahun (365 hari)
            if ($user->password_changed_at) {
                $daysSinceChange = $user->password_changed_at->diffInDays(now());
                
                if ($daysSinceChange >= 365) {
                    // Redirect ke password change page
                    if (!$request->is('admin/change-password*') && !$request->is('change-password*')) {
                        session()->flash('warning', 'Kata sandi Anda sudah berlaku 1 tahun. Silakan ubah kata sandi Anda sekarang.');
                        return redirect()->route('change-password.show');
                    }
                }
                
                // Warn jika sudah 330 hari (30 hari sebelum expire)
                if ($daysSinceChange >= 330 && $daysSinceChange < 365) {
                    session()->flash('info', 'Kata sandi Anda akan berlaku habis dalam ' . (365 - $daysSinceChange) . ' hari. Segera ubah kata sandi Anda.');
                }
            }
        }

        return $next($request);
    }
}
