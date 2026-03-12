<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model AccessToken
 *
 * Merepresentasikan tabel `access_tokens` di database.
 * Setiap baris menyimpan satu token API yang dikeluarkan untuk user tertentu.
 *
 * Kolom:
 *  - user_id    : ID user pemilik token (FK ke tabel users)
 *  - token      : Hash SHA-256 dari token mentah (bukan teks biasa!)
 *  - revoked    : Flag apakah token sudah dicabut (logout/deaktivasi)
 *  - expires_at : Waktu kedaluwarsa token (null = tidak ada batas waktu)
 */
class AccessToken extends Model
{
    /**
     * Nama tabel database.
     */
    protected $table = 'access_tokens';

    /**
     * Kolom yang boleh diisi secara massal (mass assignment).
     */
    protected $fillable = [
        'user_id',
        'token',
        'revoked',
        'expires_at',
    ];

    /**
     * Konversi tipe data kolom secara otomatis.
     *   - revoked    → boolean (true/false)
     *   - expires_at → Carbon datetime
     */
    protected $casts = [
        'revoked'    => 'boolean',
        'expires_at' => 'datetime',
    ];

    /**
     * Relasi: token ini dimiliki oleh satu user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: filter hanya token yang masih aktif
     * (belum dicabut dan belum kedaluwarsa).
     *
     * Contoh penggunaan:
     *   AccessToken::active()->where('user_id', $id)->first();
     */
    public function scopeActive($query)
    {
        return $query
            ->where('revoked', false)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            });
    }
}
