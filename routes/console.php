<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Illuminate\Support\Facades\Schedule;

// Bersihkan backup lama setiap hari jam 01:00
Schedule::command('backup:clean')->daily()->at('01:00');

// Jalankan backup baru setiap hari jam 01:30
Schedule::command('backup:run')->daily()->at('01:30');
