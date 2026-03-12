<?php

return [
    /*
     * Durasi penyimpanan activity log dalam hari
     * Default: 30 hari (1 bulan)
     * Ubah nilai ini sesuai kebutuhan aplikasi
     * Contoh: 7 = 7 hari, 60 = 2 bulan, 365 = 1 tahun
     */
    'retention_days' => env('ACTIVITY_LOG_RETENTION_DAYS', 30),

    /*
     * Waktu eksekusi pembersihan log setiap hari (format 24 jam)
     * Default: 02:00 (jam 2 pagi)
     */
    'cleanup_time' => env('ACTIVITY_LOG_CLEANUP_TIME', '02:00'),
];
