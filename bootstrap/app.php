<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',   // Daftarkan route API
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Middleware global: tambahkan security headers ke semua response.
        $middleware->append(\App\Http\Middleware\SecurityHeadersMiddleware::class);

        // Tambahkan CORS middleware ke API group.
        $middleware->api(prepend: [
            \Illuminate\Http\Middleware\HandleCors::class,
        ]);

        // Alias middleware sehingga bisa dipakai dengan nama pendek di route.
        // Contoh penggunaan: Route::middleware('check.access.token')->group(...)
        $middleware->alias([
            'check.access.token' => \App\Http\Middleware\CheckAccessToken::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
