<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Hapus activity log yang lebih tua dari durasi retention setiap hari
// Durasi dapat dikonfigurasi di config/activity_log.php
Schedule::command('activity-log:delete-old')
    ->daily()
    ->at(config('activity_log.cleanup_time', '02:00'))
    ->description('Hapus activity log yang lebih tua dari retention period');

