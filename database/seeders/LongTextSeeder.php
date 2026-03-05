<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Regulasi;
use App\Models\Sasaran;
use App\Models\Berita;
use App\Models\FAQ;
use App\Models\DataPenyaluran;
use App\Models\Kolaborasi;

class LongTextSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        Regulasi::all()->each(function($r) use ($faker) {
            $r->update(['deskripsi' => $faker->paragraphs(5, true)]);
        });

        Sasaran::all()->each(function($s) use ($faker) {
            $s->update(['deskripsi' => $faker->paragraphs(5, true)]);
        });

        Berita::where('tipe', 'berita')->get()->each(function($b) use ($faker) {
            $b->update(['deskripsi' => $faker->paragraphs(5, true)]);
        });

        FAQ::all()->each(function($q) use ($faker) {
            $q->update(['jawaban' => $faker->paragraphs(3, true)]);
        });

        DataPenyaluran::all()->each(function($d) use ($faker) {
            $d->update(['deskripsi' => $faker->paragraphs(4, true)]);
        });

        // kolaborasi usually only has image so skip text
    }
}
