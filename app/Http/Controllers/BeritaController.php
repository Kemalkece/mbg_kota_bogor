<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Sasaran;
use App\Models\Regulasi;
use App\Models\Kolaborasi;
use App\Models\Tentang;
use App\Models\DataPenyaluran;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->limit(5)->get();
        $sasarans = Sasaran::all();
        $regulasis = Regulasi::orderBy('urutan', 'asc')->get();
        $faqs = \App\Models\FAQ::orderBy('urutan', 'asc')->get();
        $kolaborasi = Kolaborasi::all();
        $dataPenyalurans = DataPenyaluran::all();
        $tentang = Tentang::first();
        return view("pages.beranda", compact("beritas", "sasarans", "regulasis", "faqs", "kolaborasi", "dataPenyalurans", "tentang"));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view("components.detail.detail_berita", compact("berita"));
    }
}
