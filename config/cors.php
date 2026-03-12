<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Cross-Origin Resource Sharing (CORS)
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat mengatur konfigurasi untuk berbagi sumber daya lintas
    | asal (CORS). Ini menentukan operasi lintas asal apa yang dapat dijalankan
    | di browser web. Gunakan daftar domain terpercaya, jangan gunakan "*" atau
    | "null" karena dapat membuka celah keamanan.
    |
    | Referensi: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    // Daftar path/endpoint yang menerapkan aturan CORS ini.
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Metode HTTP yang diizinkan dari origin luar.
    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],

    // Daftar domain yang diizinkan mengakses API.
    // Nilai diambil dari env CORS_ALLOWED_ORIGINS (pisahkan dengan koma jika lebih dari satu domain).
    // Contoh: CORS_ALLOWED_ORIGINS=https://domain-anda.com,https://www.domain-anda.com
    // JANGAN gunakan "*" atau "null" karena membuka akses dari semua domain.
    'allowed_origins' => array_filter(
        explode(',', env('CORS_ALLOWED_ORIGINS', env('APP_URL', 'http://localhost')))
    ),

    // Pola regex untuk domain yang diizinkan (kosongkan jika tidak diperlukan).
    'allowed_origins_patterns' => [],

    // Header HTTP yang diizinkan dikirim oleh client.
    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'Accept', 'X-CSRF-TOKEN'],

    // Header yang boleh diekspos ke browser (kosongkan jika tidak diperlukan).
    'exposed_headers' => [],

    // Durasi cache preflight request dalam detik (0 = tidak di-cache).
    'max_age' => 0,

    // Izinkan pengiriman cookie/kredensial dalam request lintas domain.
    'supports_credentials' => true,

];
