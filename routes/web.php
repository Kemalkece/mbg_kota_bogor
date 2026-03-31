<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SasaranController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\DataPenyaluranController;
use App\Http\Controllers\PetaController;

// Redirect login ke Filament
Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

// Change Password Routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/change-password', [ChangePasswordController::class, 'show'])->name('change-password.show');
    Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('change-password.update');
});

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

Route::get('/detail-data', [DataPenyaluranController::class, 'apiDataPenyaluran'])->name('detail_data');

Route::get('/detail-regulasi', [RegulasiController::class, 'index'])->name('detail_regulasi');
Route::get('/api/map-data', [PetaController::class, 'getMapsData'])->name('api.map-data');

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

    // Logout agar user bisa login ulang dengan status terverifikasi
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    // Redirect ke halaman login
    return redirect()->route('filament.admin.auth.login')->with('status', 'Email berhasil diverifikasi! Silakan login kembali.');
})->middleware(['signed'])->name('verification.verify');

// ROUTE KIRIM ULANG MANUAL (Supaya tombol 'Kirim ulang' berfungsi)
Route::post('/admin/email-verification/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Group route admin with session timeout and an endpoint used by our tab-management script.
Route::middleware(['web', \App\Http\Middleware\SessionTimeout::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('activate-tab', function (Request $request) {
            $tabId = $request->input('tabId');

            Log::debug('activate-tab called', [
                'old_session' => $request->session()->getId(),
                'tabId' => $tabId,
            ]);

            $request->session()->regenerate();
            Log::debug('session regenerated to', [$request->session()->getId()]);

            if ($tabId) {
                $request->session()->put('active_tab', $tabId);
            }

            return response()->json(['success' => true]);
        });
    });
});
