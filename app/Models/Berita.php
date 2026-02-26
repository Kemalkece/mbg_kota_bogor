<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
        'tipe',
    ];

    protected static function booted()
    {
        static::addGlobalScope('berita', function ($builder) {
            $builder->where('tipe', 'berita');
        });

        static::creating(function ($model) {
            $model->tipe = 'berita';
        });
    }
}
