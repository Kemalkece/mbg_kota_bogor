<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeUser extends Command
{
    protected $description = 'Create a new user for Filament admin panel with role';
    protected $signature = 'make:filament-user {name? : The name of the user} {email? : The email address of the user} {--password= : The password for the user} {--role=admin : The role of the user (admin, super_admin, user)}';

    public function handle(): int
    {
        $name = $this->argument('name') ?? $this->ask('Name');
        $email = $this->argument('email') ?? $this->ask('Email');
        $password = $this->option('password') ?? $this->secret('Password');
        $role = $this->option('role') ?? $this->choice('Role', ['admin', 'super_admin', 'user'], 'admin');

        // Validasi role
        if (!in_array($role, ['admin', 'super_admin', 'user'])) {
            $this->error('Role must be admin, super_admin, or user');
            return self::FAILURE;
        }

        // Cek jika user sudah ada
        if (User::where('email', $email)->exists()) {
            $this->error("User with email {$email} already exists!");
            return self::FAILURE;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->info("User created successfully!");
        $this->info("Name: {$name}");
        $this->info("Email: {$email}");
        $this->info("Role: {$role}");

        if ($role === 'admin' || $role === 'super_admin') {
            $this->info("This user can access the Filament admin panel.");
        }

        return self::SUCCESS;
    }
}
