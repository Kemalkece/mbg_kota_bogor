<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickSasaranSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [];
        for ($i = 1; $i <= 6; $i++) {
            $rows[] = [
                'klasifikasi' => 'Sasaran ' . $i,
                'judul_deskripsi' => 'Judul ' . $i,
                'deskripsi' => 'Deskripsi sasaran ' . $i,
                'gambar' => 'sasaran/dummy-sd.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('sasaran')->insert($rows);
    }
}
