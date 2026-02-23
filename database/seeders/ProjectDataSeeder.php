<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Collab;
use App\Models\DataPenyaluran;
use App\Models\FAQ;
use App\Models\Kategori;
use App\Models\Regulasi;
use App\Models\Sasaran;
use Illuminate\Database\Seeder;

class ProjectDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Kategori Regulasi
        $kategori1 = Kategori::create(['nama_kategori' => 'Peraturan Daerah']);
        $kategori2 = Kategori::create(['nama_kategori' => 'Keputusan Walikota']);
        $kategori3 = Kategori::create(['nama_kategori' => 'Instruksi Presiden']);

        // 2. Regulasi
        Regulasi::create([
            'title' => 'Perwali No. 45 Tahun 2026 tentang Petunjuk Teknis MBG',
            'description' => 'Pedoman operasional pelaksanaan pemberian makan bergizi tahap awal di wilayah Kota Bogor.',
            'pdf_file' => 'regulasi/dummy.pdf',
            'kategori_id' => $kategori2->id,
            'status' => 'Berlaku',
            'tahun' => '2026-01-01',
            'urutan' => 1,
        ]);

        Regulasi::create([
            'title' => 'Perda Ketahanan Pangan Kota Bogor No. 12/2025',
            'description' => 'Peraturan daerah yang mendasari sistem distribusi pangan bergizi untuk masyarakat rentan.',
            'pdf_file' => 'regulasi/dummy.pdf',
            'kategori_id' => $kategori1->id,
            'status' => 'Aktif',
            'tahun' => '2025-05-10',
            'urutan' => 2,
        ]);

        // 3. Sasaran
        Sasaran::create([
            'klasifikasi' => 'Siswa Sekolah Dasar',
            'title_deskripsi' => 'Fokus Utama Generasi Emas',
            'deskripsi' => 'Pemberian makan bergizi bagi siswa SD di seluruh kecamatan untuk menunjang daya konsentrasi belajar.',
            'image' => 'sasaran/dummy-sd.jpg',
        ]);

        Sasaran::create([
            'klasifikasi' => 'Ibu Hamil & Menyusui',
            'title_deskripsi' => 'Pencegahan Stunting Sejak Dini',
            'deskripsi' => 'Nutrisi tambahan untuk ibu hamil guna memastikan tumbuh kembang janin yang optimal dan sehat.',
            'image' => 'sasaran/dummy-ibu.jpg',
        ]);

        // 4. FAQ
        FAQ::create([
            'pertanyaan' => 'Apa itu Program Makan Bergizi Gratis?',
            'jawaban' => 'Program pemerintah Kota Bogor untuk meningkatkan kualitas gizi masyarakat melalui pemberian makanan sehat standar tinggi.',
            'urutan' => 1,
        ]);

        FAQ::create([
            'pertanyaan' => 'Siapa saja yang berhak menerima?',
            'jawaban' => 'Siswa sekolah, ibu hamil, balita, dan masyarakat kategori rentan yang terdata di wilayah Kota Bogor.',
            'urutan' => 2,
        ]);

        // 5. Berita
        Berita::create([
            'title' => 'Peluncuran Pilot Project MBG di Bogor Tengah',
            'deskripsi' => 'Walikota Bogor meresmikan dapur umum pertama yang akan melayani 10 sekolah di Bogor Tengah.',
            'image' => 'berita/dummy1.jpg',
            'type' => 'berita',
        ]);

        Berita::create([
            'title' => 'Kunjungan Mendikbud ke SPPG Kota Bogor',
            'deskripsi' => 'Menteri mengapresiasi efisiensi distribusi makanan bergizi yang menggunakan sistem QR Code.',
            'image' => 'berita/dummy2.jpg',
            'type' => 'berita',
        ]);

        // 6. Data Penyaluran
        DataPenyaluran::create([
            'title' => 'Penyaluran Bogor Selatan',
            'deskripsi' => 'Total 5.200 porsi telah didistribusikan ke 15 titik sekolah dasar di Bogor Selatan minggu ini.',
            'image' => 'penyaluran/dummy-geo1.jpg',
            'type' => 'penyaluran',
        ]);

        DataPenyaluran::create([
            'title' => 'Cakupan Wilayah Terluar',
            'deskripsi' => 'Memastikan akses gizi merata hingga wilayah perbatasan kota dengan bantuan unit distribusi mobile.',
            'image' => 'penyaluran/dummy-geo2.jpg',
            'type' => 'penyaluran',
        ]);

        // 7. Collabs (Logos)
        Collab::create(['image' => 'collabs/logo-dummy1.png']);
        Collab::create(['image' => 'collabs/logo-dummy2.png']);
        Collab::create(['image' => 'collabs/logo-dummy3.png']);
    }
}
