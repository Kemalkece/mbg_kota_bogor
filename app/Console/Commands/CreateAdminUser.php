<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user {--name= : Admin name} {--email= : Admin email} {--password= : Admin password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat akun admin baru';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name') ?? $this->ask('Nama Admin');
        $email = $this->option('email') ?? $this->ask('Email Admin');
        $password = $this->option('password') ?? $this->secret('Password Admin');

        if (User::where('email', $email)->exists()) {
            $this->error("Email {$email} sudah terdaftar!");
            return 1;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        $this->info("✓ Akun admin berhasil dibuat!");
        $this->info("Email: {$email}");
        $this->info("Password: {$password}");
        $this->info("Role: super_admin");
        
        return 0;
    }
}
