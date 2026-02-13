<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Sasaran;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->limit(5)->get();
        $sasarans = Sasaran::all();
        return view("pages.beranda", compact("beritas", "sasarans"));

        
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view("components.detail.detail_berita", compact("berita"));
    }
}
