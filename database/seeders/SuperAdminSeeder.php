<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek jika super admin sudah ada
        if (User::where('email', 'superadmin@mbg.com')->exists()) {
            $this->command->info('Super Admin sudah ada.');
            return;
        }

        // Buat super admin user
        User::create([
            'name' => 'Super Administrator',
            'email' => 'superadmin@mbg.com',
            'password' => bcrypt('superpass123'),
            'role' => 'super_admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info('Super Admin telah dibuat dengan email: superadmin@mbg.com dan password: superpass123');
    }
}
