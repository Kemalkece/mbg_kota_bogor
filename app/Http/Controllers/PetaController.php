<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetaController extends Controller
{
        public function index()
{
    $response = Http::get('https://jsonplaceholder.typicode.com/posts');

    $posts = $response->json();

    return view('posts.index', compact('posts'));
}
}
