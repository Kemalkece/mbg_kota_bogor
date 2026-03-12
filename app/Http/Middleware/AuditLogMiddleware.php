<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuditLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // 1. Catat Kesalahan Kontrol Akses (403 Forbidden)
        if ($response->getStatusCode() === 403) {
            \App\Models\LogAktivitas::create([
                'user_id' => \Illuminate\Support\Facades\Auth::id(),
                'aktivitas' => 'Kesalahan Kontrol Akses: User mencoba mengakses halaman/aksi terlarang (403 Forbidden)',
            ]);
        }

        // 2. Catat Kesalahan Validasi Input (422 Unprocessable Entity)
        if ($response->getStatusCode() === 422 || ($response->isRedirection() && session()->has('errors'))) {
            $errors = session()->get('errors');
            $errorMessage = 'Kesalahan Validasi Input';

            if ($errors && method_exists($errors, 'all')) {
                $errorMessage .= ': ' . implode(', ', $errors->all());
            }

            \App\Models\LogAktivitas::create([
                'user_id' => \Illuminate\Support\Facades\Auth::id(),
                'aktivitas' => $errorMessage,
            ]);
        }

        return $response;
    }
}
