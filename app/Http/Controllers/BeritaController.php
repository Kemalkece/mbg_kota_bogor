<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Sasaran;
use App\Models\Regulasi;
use App\Models\Collab;
use App\Models\DataPenyaluran;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->limit(5)->get();
        $sasarans = Sasaran::all();
        $regulasis = Regulasi::orderBy('urutan', 'asc')->get();
        $faqs = \App\Models\FAQ::orderBy('urutan', 'asc')->get();
        $collabs = Collab::all();
        $dataPenyalurans = DataPenyaluran::all();
        return view("pages.beranda", compact("beritas", "sasarans", "regulasis", "faqs", "collabs", "dataPenyalurans"));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view("components.detail.detail_berita", compact("berita"));
    }
}
