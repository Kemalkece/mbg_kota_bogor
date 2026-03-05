<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickFAQContentSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = DB::table('faq')->get();
        foreach ($faqs as $faq) {
            DB::table('faq')->where('id', $faq->id)->update([
                'pertanyaan' => 'Apa itu Program Nasional MBG?',
                'jawaban' => 'Program Nasional Makan Bergizi Gratis (MBG) bertujuan menyediakan makanan bergizi bagi masyarakat yang membutuhkan untuk meningkatkan kesehatan, mencegah stunting, dan membangun generasi emas yang produktif.',
            ]);
        }
    }
}
