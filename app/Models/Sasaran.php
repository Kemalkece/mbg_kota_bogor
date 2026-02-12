<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    protected $table = 'sasarans';
    protected $fillable = [
        'image',
        'klasifikasi',
        'title_deskripsi',
        'deskripsi',
    ];
}
