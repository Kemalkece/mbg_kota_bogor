<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditionalFAQSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [];
        for ($i = 1; $i <= 6; $i++) {
            $faqs[] = [
                'pertanyaan' => 'Pertanyaan MBG ' . $i,
                'jawaban' => 'Penjelasan panjang seputar MBG nomor ' . $i . ' dengan informasi lengkap.',
                'urutan' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('faq')->insert($faqs);
    }
}
