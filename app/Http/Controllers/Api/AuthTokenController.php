<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccessToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * AuthTokenController
 *
 * Controller ini menangani dua hal:
 *  1. Login API → mengeluarkan token baru jika kredensial valid.
 *  2. Logout API → mencabut (revoke) token yang sedang dipakai.
 *
 * Token yang dikirim ke client adalah token MENTAH (plain-text).
 * Yang disimpan di database adalah HASH SHA-256-nya saja,
 * sehingga even jika database bocor, token aslinya tidak bisa dipakai.
 */
class AuthTokenController extends Controller
{
    /**
     * Login API – mengeluarkan access token.
     *
     * Request body (JSON):
     *  - email    : string (required)
     *  - password : string (required)
     *
     * Response (JSON):
     *  - access_token : token mentah yang harus disimpan oleh client
     *  - token_type   : "Bearer"
     *  - expires_at   : waktu kedaluwarsa token (ISO 8601)
     *  - message      : pesan sukses
     */
    public function login(Request $request)
    {
        // Validasi input dasar sebelum menyentuh database.
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Cari user berdasarkan email.
        $user = User::where('email', $request->email)->first();

        // Jika user tidak ditemukan atau password salah → tolak.
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau kata sandi tidak valid.',
            ], 401);
        }

        // Buat token acak 32 byte (menghasilkan 64 karakter hex).
        $plainToken  = bin2hex(random_bytes(32));

        // Hash token mentah menggunakan SHA-256 sebelum disimpan ke database.
        $hashedToken = hash('sha256', $plainToken);

        // Masa berlaku token: 12 jam dari sekarang.
        $expiresAt   = now()->addHours(12);

        // Simpan token (sudah di-hash) ke tabel access_tokens.
        AccessToken::create([
            'user_id'    => $user->id,
            'token'      => $hashedToken,
            'name'       => 'Token API ' . request()->userAgent(), // beri label otomatis dari user agent
            'revoked'    => false,
            'expires_at' => $expiresAt,
        ]);

        // Kembalikan token MENTAH ke client (hanya sekali, tidak pernah disimpan di DB).
        return response()->json([
            'success'      => true,
            'message'      => 'Login berhasil. Simpan access_token dengan aman!',
            'access_token' => $plainToken,
            'token_type'   => 'Bearer',
            'expires_at'   => $expiresAt->toIso8601String(),
        ], 201);
    }

    /**
     * Logout API – mencabut (revoke) token yang sedang dipakai.
     *
     * Middleware CheckAccessToken akan memvalidasi token terlebih dahulu.
     * Jika lolos, kita tandai token tersebut sebagai revoked = true.
     */
    public function logout(Request $request)
    {
        // Ambil data token yang sudah diletakkan di request oleh middleware.
        $accessToken = $request->input('accessToken');

        if ($accessToken) {
            // Tandai token sebagai sudah dicabut sehingga tidak bisa dipakai lagi.
            $accessToken->update(['revoked' => true]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil. Token sudah dicabut.',
        ]);
    }
}
