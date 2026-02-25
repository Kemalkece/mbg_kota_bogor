<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Berita;
use App\Models\Sasaran;
use App\Models\Regulasi;
use App\Models\DataPenyaluran;

class BeritaController extends Controller
{
    public function index()
    {
        return view('pages.beranda', [
            // 🔥 INI YANG KURANG DARI TADI
            'about' => About::first(),

            // DATA LAIN (SUDAH ADA DARI QUERY LOG)
            'beritas' => Berita::where('type', 'berita')
                ->latest()
                ->take(5)
                ->get(),

            'sasarans' => Sasaran::all(),

            'regulasis' => Regulasi::orderBy('urutan')->get(),

            'dataPenyalurans' => Berita::where('type', 'penyaluran')->get(),
        ]);
    }
}