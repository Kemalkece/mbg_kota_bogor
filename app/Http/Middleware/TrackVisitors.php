<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't track console/artisan requests
        if (app()->runningInConsole()) {
            return $next($request);
        }

        // Track user
        $ip = $request->ip();
        $today = now()->toDateString();

        try {
            Visitor::updateOrCreate(
                [
                    'ip_address' => $ip,
                    'visited_date' => $today,
                ],
                [
                    'last_active_at' => now(),
                ]
            );
        } catch (\Exception $e) {
            // Handle race condition with unique constraint
            // Try to update directly if insert fails
            Visitor::where('ip_address', $ip)
                ->where('visited_date', $today)
                ->update(['last_active_at' => now()]);
        }

        return $next($request);
    }
}
