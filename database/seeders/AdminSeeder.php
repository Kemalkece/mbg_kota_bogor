<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek jika admin sudah ada
        if (User::where('email', 'admin@mbg.com')->exists()) {
            $this->command->info('Admin biasa sudah ada.');
            return;
        }

        // Buat admin biasa user
        User::create([
            'name' => 'Admin MBG',
            'email' => 'admin@mbg.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin biasa telah dibuat dengan email: admin@mbg.com dan password: password123');
    }
}
