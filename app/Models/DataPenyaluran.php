<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenyaluran extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        "judul",
        "gambar",
        "deskripsi",
        "tipe",
    ];

    protected static function booted()
    {
        static::addGlobalScope('penyaluran', function ($builder) {
            $builder->where('tipe', 'penyaluran');
        });

        static::creating(function ($model) {
            $model->tipe = 'penyaluran';
        });
    }
}
