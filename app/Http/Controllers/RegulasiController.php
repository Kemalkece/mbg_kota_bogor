<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regulasi;

class RegulasiController extends Controller
{
    public function index()
    {
        $regulasis = Regulasi::with('kategori')->orderBy('urutan', 'asc')->get();
        $kategoris = \App\Models\Kategori::all();
        return view('components.detail.regulasi_detail', compact('regulasis', 'kategoris'));
    }
}
