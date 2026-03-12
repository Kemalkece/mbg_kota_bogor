<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OptionalEmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && ! $user->hasVerifiedEmail()) {
            // Cek apakah ada sesi lain yang aktif
            $hasActiveSession = DB::table('sessions')
                ->where('user_id', $user->getAuthIdentifier())
                ->where('id', '!=', session()->getId())
                ->where('last_activity', '>=', time() - (config('session.lifetime') * 60))
                ->exists();

            // Jika ada sesi lain (Login ganda), barulah arahkan ke verifikasi
            if ($hasActiveSession) {
                return redirect()->route('filament.admin.auth.email-verification.prompt');
            }
        }

        return $next($request);
    }
}
