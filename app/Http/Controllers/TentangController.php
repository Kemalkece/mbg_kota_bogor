<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use App\Models\Berita;
use App\Models\Sasaran;
use App\Models\Regulasi;
use App\Models\DataPenyaluran;

class TentangController extends Controller
{
    public function index()
    {
        return view('pages.beranda', [
            'tentang' => Tentang::first(),
            'beritas' => Berita::latest()->take(5)->get(),
            'sasarans' => Sasaran::all(),
            'regulasis' => Regulasi::orderBy('urutan')->get(),
            'dataPenyalurans' => DataPenyaluran::all(),
        ]);
    }
}
