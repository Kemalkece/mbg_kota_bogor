<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kolaborasi;

class KolaborasiController extends Controller
{
    public function index()
    {
        $kolaborasi = Kolaborasi::all();
        return view('components.logo-bar', compact('kolaborasi'));
    }
}
