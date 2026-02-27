<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Kolaborasi;
use App\Models\DataPenyaluran;
use App\Models\FAQ;
use App\Models\Kategori;
use App\Models\Regulasi;
use App\Models\Tentang;
use App\Models\Sasaran;
use Illuminate\Database\Seeder;

class ProjectDataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // 1. Kategori Regulasi (reuse or create some fixed ones)
        $kategori1 = Kategori::firstOrCreate(['nama_kategori' => 'Peraturan Daerah']);
        $kategori2 = Kategori::firstOrCreate(['nama_kategori' => 'Keputusan Walikota']);
        $kategori3 = Kategori::firstOrCreate(['nama_kategori' => 'Instruksi Presiden']);

        // generate 10 regulasi
        for ($i = 1; $i <= 10; $i++) {
            Regulasi::create([
                'judul' => 'Regulasi Contoh ' . $i,
                'deskripsi' => $faker->sentence(15),
                'file_pdf' => 'regulasi/dummy.pdf',
                'kategori_id' => [$kategori1->id, $kategori2->id, $kategori3->id][$i % 3],
                'status' => $i % 2 === 0 ? 'Aktif' : 'Berlaku',
                'tahun' => $faker->date('Y-m-d'),
                'urutan' => $i,
            ]);
        }

        // generate 10 sasaran
        for ($i = 1; $i <= 10; $i++) {
            Sasaran::create([
                'klasifikasi' => $faker->randomElement(['Siswa SD', 'Ibu Hamil', 'Lansia', 'Penyandang Disabilitas']),
                'judul_deskripsi' => 'Sasaran ' . $i,
                'deskripsi' => $faker->sentence(20),
                'gambar' => 'sasaran/dummy-sd.jpg',
            ]);
        }

        // generate 10 tentang (overwrite single record list style)
        for ($i = 1; $i <= 10; $i++) {
            Tentang::create([
                'judul' => 'Tentang MBG #' . $i,
                'deskripsi_1' => $faker->paragraph(),
                'deskripsi_2' => $faker->paragraph(),
                'list' => [$faker->sentence(), $faker->sentence(), $faker->sentence()],
            ]);
        }

        // generate 10 faq
        for ($i = 1; $i <= 10; $i++) {
            FAQ::create([
                'pertanyaan' => 'Pertanyaan contoh ' . $i,
                'jawaban' => $faker->sentence(20),
                'urutan' => $i,
            ]);
        }

        // generate 10 berita
        for ($i = 1; $i <= 10; $i++) {
            Berita::create([
                'judul' => 'Berita Contoh ' . $i,
                'deskripsi' => $faker->sentence(15),
                'gambar' => 'berita/dummy' . (($i % 3) + 1) . '.jpg',
                'tipe' => 'berita',
            ]);
        }

        // generate 10 data penyaluran
        for ($i = 1; $i <= 10; $i++) {
            DataPenyaluran::create([
                'judul' => 'Penyaluran #' . $i,
                'deskripsi' => $faker->sentence(20),
                'gambar' => 'penyaluran/dummy-geo' . (($i % 2) + 1) . '.jpg',
                'tipe' => 'penyaluran',
            ]);
        }

        // generate 10 kolaborasi logos
        for ($i = 1; $i <= 10; $i++) {
            Kolaborasi::create(['gambar' => 'kolaborasi/logo-dummy' . (($i % 3) + 1) . '.png']);
        }
    }
}
