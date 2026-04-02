<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class VerifyAdminEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:verify-admin-email {--email= : Email admin yang ingin diverifikasi}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifikasi email admin sehingga bisa akses panel tanpa harus klik link verifikasi';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email') ?? 'admin@mbg.id';

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User dengan email {$email} tidak ditemukan!");
            return 1;
        }

        if ($user->hasVerifiedEmail()) {
            $this->info("✓ Email {$email} sudah terverifikasi sebelumnya!");
            return 0;
        }

        $user->markEmailAsVerified();

        $this->info("✓ Email {$email} berhasil diverifikasi!");
        $this->info("Admin sekarang bisa akses panel tanpa harus klik link verifikasi.");
        
        return 0;
    }
}
