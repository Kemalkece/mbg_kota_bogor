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
        // 1. Kategori Regulasi
        $kategori1 = Kategori::create(['nama_kategori' => 'Peraturan Daerah']);
        $kategori2 = Kategori::create(['nama_kategori' => 'Keputusan Walikota']);
        $kategori3 = Kategori::create(['nama_kategori' => 'Instruksi Presiden']);

        // 2. Regulasi
        Regulasi::create([
            'judul' => 'Perwali No. 45 Tahun 2026 tentang Petunjuk Teknis MBG',
            'deskripsi' => 'Pedoman operasional pelaksanaan pemberian makan bergizi tahap awal di wilayah Kota Bogor.',
            'file_pdf' => 'regulasi/dummy.pdf',
            'kategori_id' => $kategori2->id,
            'status' => 'Berlaku',
            'tahun' => '2026-01-01',
            'urutan' => 1,
        ]);

        Regulasi::create([
            'judul' => 'Perda Ketahanan Pangan Kota Bogor No. 12/2025',
            'deskripsi' => 'Peraturan daerah yang mendasari sistem distribusi pangan bergizi untuk masyarakat rentan.',
            'file_pdf' => 'regulasi/dummy.pdf',
            'kategori_id' => $kategori1->id,
            'status' => 'Aktif',
            'tahun' => '2025-05-10',
            'urutan' => 2,
        ]);

        // 3. Sasaran
        Sasaran::create([
            'klasifikasi' => 'Siswa Sekolah Dasar',
            'judul_deskripsi' => 'Fokus Utama Generasi Emas',
            'deskripsi' => 'Pemberian makan bergizi bagi siswa SD di seluruh kecamatan untuk menunjang daya konsentrasi belajar.',
            'gambar' => 'sasaran/dummy-sd.jpg',
        ]);

        Sasaran::create([
            'klasifikasi' => 'Ibu Hamil & Menyusui',
            'judul_deskripsi' => 'Pencegahan Stunting Sejak Dini',
            'deskripsi' => 'Nutrisi tambahan untuk ibu hamil guna memastikan tumbuh kembang janin yang optimal dan sehat.',
            'gambar' => 'sasaran/dummy-ibu.jpg',
        ]);

        // 3.5 Tentang
        Tentang::create([
            'judul' => 'Makan Bergizi Gratis (MBG)',
            'deskripsi_1' => 'Program inovatif Pemerintah Kota Bogor untuk meningkatkan kualitas gizi masyarakat melalui pemberian makanan sehat standar tinggi yang didistribusikan secara merata ke seluruh wilayah.',
            'deskripsi_2' => 'Dengan fokus pada generasi muda dan kelompok rentan, program ini bertujuan menciptakan masyarakat yang sehat, produktif, dan berkualitas.',
            'list' => ['Pemberian makan bergizi gratis', 'Distribusi merata ke seluruh kecamatan', 'Kolaborasi dengan sekolah dan puskesmas', 'Monitoring kualitas nutrisi'],
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
            'judul' => 'Peluncuran Pilot Project MBG di Bogor Tengah',
            'deskripsi' => 'Walikota Bogor meresmikan dapur umum pertama yang akan melayani 10 sekolah di Bogor Tengah.',
            'gambar' => 'berita/dummy1.jpg',
            'tipe' => 'berita',
        ]);

        Berita::create([
            'judul' => 'Kunjungan Mendikbud ke SPPG Kota Bogor',
            'deskripsi' => 'Menteri mengapresiasi efisiensi distribusi makanan bergizi yang menggunakan sistem QR Code.',
            'gambar' => 'berita/dummy2.jpg',
            'tipe' => 'berita',
        ]);

        // 6. Data Penyaluran
        DataPenyaluran::create([
            'judul' => 'Penyaluran Bogor Selatan',
            'deskripsi' => 'Total 5.200 porsi telah didistribusikan ke 15 titik sekolah dasar di Bogor Selatan minggu ini.',
            'gambar' => 'penyaluran/dummy-geo1.jpg',
            'tipe' => 'penyaluran',
        ]);

        DataPenyaluran::create([
            'judul' => 'Cakupan Wilayah Terluar',
            'deskripsi' => 'Memastikan akses gizi merata hingga wilayah perbatasan kota dengan bantuan unit distribusi mobile.',
            'gambar' => 'penyaluran/dummy-geo2.jpg',
            'tipe' => 'penyaluran',
        ]);

        // 7. Kolaborasi (Logos)
        Kolaborasi::create(['gambar' => 'kolaborasi/logo-dummy1.png']);
        Kolaborasi::create(['gambar' => 'kolaborasi/logo-dummy2.png']);
        Kolaborasi::create(['gambar' => 'kolaborasi/logo-dummy3.png']);
    }
}
