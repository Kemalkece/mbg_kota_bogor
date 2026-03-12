<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class QuickRegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make sure there are at least 6 entries
        $records = [];
        for ($i = 1; $i <= 6; $i++) {
            $records[] = [
                'judul' => 'Regulasi ' . $i,
                'deskripsi' => 'Contoh deskripsi ' . $i,
                'file_pdf' => 'regulasi/dummy.pdf',
                'kategori_id' => 1,
                'status' => 'Aktif',
                'tahun' => now(),
                'urutan' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('regulasi')->insert($records);
    }
}
