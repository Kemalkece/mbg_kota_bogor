<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SasaranController;
use App\Http\Controllers\RegulasiController;

Route::get('/', [BeritaController::class, 'index'])->name('beranda');
Route::get('/home', [BeritaController::class, 'index'])->name('home');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/sasaran', [SasaranController::class, 'index'])->name('sasaran');
Route::get('/hero', [BeritaController::class, 'index'])->name('hero');

Route::get('/data-detail', function () {
    return view('components.detail.data_detail');
})->name('data_detail');

Route::get('/regulasi-detail', [RegulasiController::class, 'index'])->name('regulasi_detail');

Route::get('/faq-detail', [\App\Http\Controllers\FAQController::class, 'index'])->name('faq-detail');

Route::get('/aksebilitas', function () {
    return view('components.aksebilitas');
});
