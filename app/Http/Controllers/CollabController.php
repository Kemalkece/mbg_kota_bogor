<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collab;

class CollabController extends Controller
{
    public function index()
    {
        $collabs = Collab::all();
        return view('components.logo-bar', compact('collabs'));
    }
}
