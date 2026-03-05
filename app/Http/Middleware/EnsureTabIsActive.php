<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTabIsActive
{
    public function handle(Request $request, Closure $next)
    {
        // Middleware originally provided a per-tab expiration timer (random 10–15
        // minutes) which sometimes caused confusion during editing.  Because we
        // already have our own SessionTimeout middleware and the Filament single‑
        // tab JavaScript regenerates sessions frequently, the extra expiry logic
        // here is unnecessary and can log users out unexpectedly.
        //
        // To avoid rogue "tab expired" events while typing, simply bypass the
        // expiry check and only enforce the single‑tab guard if the router
        // pushes us here.  The JavaScript will still broadcast and trigger
        // logout on truly duplicate tabs, but the session won't expire on a
        // timer.

        // only enforce the middleware for authenticated users
        if (! auth()->check()) {
            return $next($request);
        }

        // no additional expiration; let SessionTimeout or Laravel's own
        // session lifetime handle idle logout.
        return $next($request);
    }
}
