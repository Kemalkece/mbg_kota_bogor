<?php

namespace App\Console\Commands;

use App\Models\ActivityLog;
use Illuminate\Console\Command;
use Carbon\Carbon;

class DeleteOldActivityLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activity-log:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus activity log yang lebih tua dari 1 bulan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Ambil jumlah hari dari config
        $retentionDays = config('activity_log.retention_days', 30);
        
        // Hitung tanggal berdasarkan retention days
        $cutoffDate = Carbon::now()->subDays($retentionDays);

        // Hitung jumlah record yang akan dihapus
        $count = ActivityLog::where('created_at', '<', $cutoffDate)->count();

        if ($count === 0) {
            $this->info("Tidak ada activity log yang perlu dihapus (retention: $retentionDays hari).");
            return 0;
        }

        // Hapus activity log
        ActivityLog::where('created_at', '<', $cutoffDate)->delete();

        $this->info("Berhasil menghapus $count activity log yang lebih tua dari $retentionDays hari.");
        return 0;
    }
}
