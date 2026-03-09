<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SasaranController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\ChangePasswordController;

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

Route::get('/detail-data', function () {
    return view('components.detail.detail_data');
})->name('detail_data');

Route::get('/detail-regulasi', [RegulasiController::class, 'index'])->name('detail_regulasi');

Route::get('/detail-faq', [\App\Http\Controllers\FAQController::class, 'index'])->name('detail_faq');

Route::get('/aksebilitas', function () {
    return view('components.aksebilitas');
});

// Group route admin with session timeout and an endpoint used by our
// tab-management script. the route is intentionally simple so it can be
// reached during feature tests (Filament may not be "serving" in that
// context).
Route::middleware(['web', \App\Http\Middleware\SessionTimeout::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('activate-tab', function (\Illuminate\Http\Request $request) {
            $tabId = $request->input('tabId');

            // keep a small log trace to aid debugging when we review logs later
            \Log::debug('activate-tab called', [
                'old_session' => $request->session()->getId(),
                'tabId' => $tabId,
            ]);

            $request->session()->regenerate();
            \Log::debug('session regenerated to', [$request->session()->getId()]);

            if ($tabId) {
                $request->session()->put('active_tab', $tabId);
            }

            return response()->json(['success' => true]);
        });

        // Other admin routes can live here, or Filament may register its own
        // automatically.
    });
});

