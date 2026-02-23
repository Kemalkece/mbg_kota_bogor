<?php

namespace App\Http\Controllers;

use App\Models\DataPenyaluran;
use Illuminate\Http\Request;

class DataPenyaluranController extends Controller
{
    public function index()
    {
        $dataPenyalurans = DataPenyaluran::all();
        return view('components.data', compact('dataPenyalurans'));
    }
}
