<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenyaluran extends Model
{
    protected $table = "beritas";

    protected $fillable = [
        "title",
        "image",
        "deskripsi",
        "type",
    ];

    protected static function booted()
    {
        static::addGlobalScope('penyaluran', function ($builder) {
            $builder->where('type', 'penyaluran');
        });

        static::creating(function ($model) {
            $model->type = 'penyaluran';
        });
    }
}
