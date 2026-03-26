<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Traits\LogActivity;

class SingleDeviceLogin
{
    /**
     * Handle an incoming request.
     * Enforce single device login - one user can't be logged in from multiple devices simultaneously
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cacheKey = "user_device_{$user->id}";
            $currentSessionId = session()->getId();
            $deviceHash = $this->getDeviceHash($request);

            // Get stored session/device info
            $storedData = Cache::get($cacheKey);

            if ($storedData) {
                // Jika session berbeda dengan yang stored = user login dari device lain
                if (
                    $storedData['session_id'] !== $currentSessionId ||
                    $storedData['device_hash'] !== $deviceHash
                ) {
                    // Log attempted concurrent login
                    LogActivity::logActivity(
                        action: 'concurrent_login_attempt',
                        modelName: 'Authentication',
                        modelId: $user->id,
                        description: substr("Percobaan login dari device berbeda. Device lama: {$storedData['device_info']}, Device baru: " . $request->userAgent(), 0, 250)
                    );

                    // Logout user dari session saat ini
                    Auth::logout();
                    $request->session()->invalidate();

                    return redirect('/admin/login')->with('error', 'Akun Anda telah login dari device lain. Silakan login kembali.');
                }
            } else {
                // Store current session/device info
                Cache::put($cacheKey, [
                    'session_id' => $currentSessionId,
                    'device_hash' => $deviceHash,
                    'device_info' => $this->getDeviceInfo($request),
                    'ip_address' => $request->ip(),
                    'login_time' => now(),
                ], now()->addHours(24));
            }
        }

        return $next($request);
    }

    /**
     * Generate device hash based on user agent and IP
     */
    private function getDeviceHash(Request $request): string
    {
        return hash('sha256', $request->userAgent() . $request->ip());
    }

    /**
     * Get device info for logging
     */
    private function getDeviceInfo(Request $request): string
    {
        return substr($request->userAgent(), 0, 100);
    }
}
