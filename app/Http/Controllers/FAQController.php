<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::orderBy('urutan', 'asc')->get();
        return view('components.detail.faq-detail', compact('faqs'));
    }
}
