<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateSuperAdmin extends Command
{
    protected $signature = 'admin:create-super-admin {--name="Super Admin" : Nama Super Admin} {--email="superadmin@example.com" : Email Super Admin} {--password="password" : Password Super Admin}';
    protected $description = 'Buat user Super Admin';

    public function handle(): int
    {
        $name = $this->option('name');
        $email = $this->option('email');
        $password = $this->option('password');

        // Cek jika user dengan email yang sama sudah ada
        if (User::where('email', $email)->exists()) {
            $this->error("User dengan email {$email} sudah ada!");
            return self::FAILURE;
        }

        // Buat super admin user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => 'super_admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->info("Super Admin telah dibuat!");
        $this->line("Email: {$email}");
        $this->line("Password: {$password}");
        $this->line("Silakan ubah password setelah login pertama kali.");

        return self::SUCCESS;
    }
}
