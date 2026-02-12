<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {   
        // return view('berita.index');
        $beritas = Berita::all();
        return view("pages.beranda", compact("beritas"));


    }
}
