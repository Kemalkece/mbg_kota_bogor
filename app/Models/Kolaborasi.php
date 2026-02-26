<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kolaborasi extends Model
{
    protected $table = 'kolaborasi';

    protected $fillable = [
        'nama_instansi',
        'gambar',
    ];
}
