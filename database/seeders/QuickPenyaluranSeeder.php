<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickPenyaluranSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [];
        for ($i = 1; $i <= 6; $i++) {
            $rows[] = [
                'judul' => 'Penyaluran ' . $i,
                'deskripsi' => 'Contoh penyaluran ' . $i,
                'gambar' => 'penyaluran/dummy.jpg',
                'tipe' => 'penyaluran',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('berita')->insert($rows);
    }
}
