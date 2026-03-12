<?php

use App\Http\Controllers\Api\AuthTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route di sini bisa diakses melalui /api/<nama-route>.
| Contoh: POST /api/login, POST /api/logout
|
| Route yang TIDAK dilindungi middleware (public):
|   - POST /api/login → untuk mendapatkan token
|
| Route yang DILINDUNGI middleware 'check.access.token' (hanya bisa diakses
| dengan token valid di header Authorization: Bearer <token>):
|   - POST /api/logout → untuk mencabut token aktif
|   - GET  /api/user   → contoh endpoint data yang dilindungi
|--------------------------------------------------------------------------
*/

/*
 * === ROUTE PUBLIK ===
 * Tidak memerlukan token. Dipakai oleh client untuk mendapatkan token pertama kali.
 */

// Login API: terima email + password, keluarkan token jika valid.
Route::post('/login', [AuthTokenController::class, 'login']);

/*
 * === ROUTE YANG DILINDUNGI TOKEN ===
 * Semua route di dalam group ini akan divalidasi oleh middleware
 * `check.access.token`. Request tanpa token atau dengan token tidak valid
 * akan mendapat respons 401/403 secara otomatis.
 */
Route::middleware('check.access.token')->group(function () {

    // Logout: cabut (revoke) token yang sedang dipakai.
    Route::post('/logout', [AuthTokenController::class, 'logout']);

    // Contoh: endpoint data user yang sedang login (identitas dari token).
    Route::get('/user', function (Request $request) {
        // accessToken sudah diinjeksi oleh middleware CheckAccessToken.
        $accessToken = $request->input('accessToken');

        // Muat relasi user dari token.
        $user = $accessToken->user;

        return response()->json([
            'success' => true,
            'data'    => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
            ],
        ]);
    });

    /*
     * Tambahkan route API lainnya di sini.
     * Semua route di dalam group ini otomatis memerlukan token yang valid.
     *
     * Contoh:
     *   Route::get('/data-penyaluran',  [DataPenyaluranController::class, 'index']);
     *   Route::get('/berita',           [BeritaController::class, 'apiIndex']);
     */

});
