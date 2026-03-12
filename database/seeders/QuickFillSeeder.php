<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickFillSeeder extends Seeder
{
    public function run(): void
    {
        // berita
        $berita = [];
        for ($i = 1; $i <= 6; $i++) {
            $berita[] = [
                'judul' => 'Berita ' . $i,
                'deskripsi' => 'Isi berita contoh ' . $i,
                'gambar' => 'berita/dummy' . (($i % 3) + 1) . '.jpg',
                'tipe' => 'berita',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('berita')->insert($berita);

        // data penyaluran
        $data = [];
        for ($i = 1; $i <= 6; $i++) {
            $data[] = [
                'judul' => 'Penyaluran ' . $i,
                'deskripsi' => 'Deskripsi penyaluran ' . $i,
                'gambar' => 'penyaluran/dummy.jpg',
                'tipe' => 'penyaluran',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('data_penyaluran')->insert($data);

        // faq
        $faqs = [];
        for ($i = 1; $i <= 6; $i++) {
            $faqs[] = [
                'pertanyaan' => 'FAQ ' . $i,
                'jawaban' => 'Jawaban ' . $i,
                'urutan' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('faq')->insert($faqs);

        // kolaborasi
        $kol = [];
        for ($i = 1; $i <= 6; $i++) {
            $kol[] = [
                'gambar' => 'kolaborasi/logo' . $i . '.png',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('kolaborasi')->insert($kol);
    }
}
