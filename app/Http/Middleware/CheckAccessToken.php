<?php

namespace App\Http\Middleware;

use App\Models\AccessToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CheckAccessToken
 *
 * Middleware ini memverifikasi token yang dikirim oleh client melalui
 * header HTTP `Authorization: Bearer <token>`. Token mentah (plain-text)
 * yang diterima dari client di-hash menggunakan SHA-256 sebelum
 * dibandingkan dengan nilai yang tersimpan di database, sehingga
 * token asli tidak pernah tersimpan dalam teks biasa.
 *
 * Alur verifikasi:
 *  1. Cek keberadaan header Authorization dengan format Bearer.
 *  2. Ekstrak token mentah → hitung hash SHA-256.
 *  3. Cari hash di tabel `access_tokens`:
 *     - revoked = false  (token belum dicabut)
 *     - expires_at NULL atau masih di masa depan
 *  4. Jika cocok → lanjutkan request.
 *     Jika tidak → tolak dengan status 401/403.
 */
class CheckAccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): \Symfony\Component\HttpFoundation\Response  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil nilai header Authorization dari request.
        $authHeader = $request->header('Authorization');

        // Pastikan header ada dan formatnya dimulai dengan "Bearer ".
        // Tanpa ini, kita tidak tahu token mana yang harus divalidasi.
        if (! $authHeader || ! str_starts_with($authHeader, 'Bearer ')) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak ditemukan. Sertakan header Authorization: Bearer <token>.',
            ], 401);
        }

        // Hapus prefiks "Bearer " (7 karakter) untuk mendapatkan token mentah.
        $plainToken  = substr($authHeader, 7);

        // Hash token mentah dengan SHA-256.
        // Ini adalah nilai yang akan kita cari di database.
        $hashedToken = hash('sha256', $plainToken);

        // Cari token yang cocok di database.
        // Kondisi:
        //   - token  : cocok dengan hash yang baru dihitung
        //   - revoked: false → token belum dicabut/di-logout
        //   - expires_at: null (tidak ada masa berlaku) ATAU masih di masa depan
        $accessToken = AccessToken::where('token', $hashedToken)
            ->where('revoked', false)
            ->where(function ($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->first();

        // Jika token tidak ditemukan atau sudah tidak valid → tolak request.
        if (! $accessToken) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak valid, sudah dicabut, atau sudah kedaluwarsa.',
            ], 403);
        }

        // Simpan data token ke dalam request agar bisa diakses di controller.
        // Misal: $request->accessToken->user_id
        $request->merge(['accessToken' => $accessToken]);

        // Token valid → lanjutkan ke middleware atau handler berikutnya.
        return $next($request);
    }
}
