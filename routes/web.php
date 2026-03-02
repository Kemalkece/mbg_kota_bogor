<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SasaranController;
use App\Http\Controllers\RegulasiController;

// Redirect login ke Filament
Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

// POST ubah password (versi popup sederhana)
Route::post('/ubah-password', function (Request $request) {

    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'Email tidak ditemukan.'], 422);
    }

    $user->password = Hash::make($request->password);
    $user->password_changed_at = now();
    $user->save();

    return response()->json(['message' => 'Password berhasil diubah!']);

})->name('password.update');

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