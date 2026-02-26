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

Route::get('/detail-data', function () {
    return view('components.detail.detail_data');
})->name('detail_data');

Route::get('/detail-regulasi', [RegulasiController::class, 'index'])->name('detail_regulasi');

Route::get('/detail-faq', [\App\Http\Controllers\FAQController::class, 'index'])->name('detail_faq');

Route::get('/aksebilitas', function () {
    return view('components.aksebilitas');
});
