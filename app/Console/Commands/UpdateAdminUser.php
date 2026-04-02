<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-admin-user {--email= : Email admin yang ingin diupdate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user admin dengan role super_admin dan is_active true';

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

        $user->update([
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        $this->info("✓ User {$email} berhasil diupdate!");
        $this->info("Role: super_admin");
        $this->info("Active: true");
        
        return 0;
    }
}
