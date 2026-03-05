<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {
        // timeout in seconds; fixed 10 minutes (600 seconds)
        $timeout = 600; // 10min

        if (Auth::check()) {
            $lastActivity = session('last_activity');
            $now = time();
            // debugging info for unexpected short logout
            \Log::debug('SessionTimeout check', [
                'timeout' => $timeout,
                'last_activity' => $lastActivity,
                'delta' => $lastActivity ? ($now - $lastActivity) : null,
            ]);

            if ($lastActivity && ($now - $lastActivity > $timeout)) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();
                return redirect()->route('filament.auth.login')->withErrors([
                    'email' => 'Sesi Anda telah berakhir, silakan login kembali.'
                ]);
            }
            session(['last_activity' => $now]);
        }
        return $next($request);
    }
}
