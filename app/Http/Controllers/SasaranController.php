<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sasaran;

class SasaranController extends Controller
{
    public function index()
    {
        $sasarans = Sasaran::all();
        return view('sasaran.index', compact('sasarans'));
    }
}
