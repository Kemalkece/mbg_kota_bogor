<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sasaran;
use App\Models\Berita;

class SasaranController extends Controller
{
    public function index()
    {
        $sasarans = Sasaran::all();
        $beritas = Berita::latest()->limit(5)->get();
        return view('pages.beranda', compact('sasarans', 'beritas'));
    }
}
