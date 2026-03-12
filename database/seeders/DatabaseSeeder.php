<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin MBG',
            'email' => 'admin@mbg.com',
            'password' => 'password', // Password akan di-hash otomatis oleh model User (hashed cast)
        ]);

        $this->call([
            ProjectDataSeeder::class,
        ]);
    }
}
