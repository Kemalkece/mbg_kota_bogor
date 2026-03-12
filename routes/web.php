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

// ROUTE VERIFIKASI MANUAL (Supaya link email berfungsi tanpa mengunci dashboard)
Route::get('/admin/verify-email/{id}/{hash}', function ($id, $hash) {
    $user = \App\Models\User::findOrFail($id);

    // Validasi token hash untuk keamanan
    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403, 'Link verifikasi tidak valid.');
    }

    // Jika belum diverifikasi, tandai sebagai terverifikasi
    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
        event(new \Illuminate\Auth\Events\Verified($user));
    }

    // Logout agar user bisa login ulang dengan status terverifikasi (Sesuai Permintaan Bos)
    \Illuminate\Support\Facades\Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    // Redirect ke halaman login
    return redirect()->route('filament.admin.auth.login')->with('status', 'Email berhasil diverifikasi! Silakan login kembali.');
})->middleware(['signed'])->name('verification.verify');

// ROUTE KIRIM ULANG MANUAL (Supaya tombol 'Kirim ulang' berfungsi)
Route::post('/admin/email-verification/resend', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
