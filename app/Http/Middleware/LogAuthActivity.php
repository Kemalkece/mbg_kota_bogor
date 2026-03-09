<?php

namespace App\Http\Middleware;

use App\Traits\LogActivity;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAuthActivity
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Log logout saat session dihapus
        if ($request->session()->pull('logout')) {
            LogActivity::logLogout();
        }

        return $response;
    }
}
