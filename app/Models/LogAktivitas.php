<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'aktivitas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function record($aktivitas)
    {
        return self::create([
            'user_id' => auth()->id(),
            'aktivitas' => $aktivitas,
        ]);
    }

    protected static function booted()
    {
        static::updating(function ($logAktivitas) {
            throw new \Exception('Keamanan: Log Aktivitas tidak dapat dimodifikasi.');
        });

        static::deleting(function ($logAktivitas) {
            throw new \Exception('Keamanan: Log Aktivitas tidak dapat dihapus.');
        });
    }
}
