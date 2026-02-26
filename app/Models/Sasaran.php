<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    protected $table = 'sasaran';
    protected $fillable = [
        'gambar',
        'klasifikasi',
        'judul_deskripsi',
        'deskripsi',
    ];
}
